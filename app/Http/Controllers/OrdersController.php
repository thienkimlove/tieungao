<?php

namespace App\Http\Controllers;

use App\Export;
use App\Order;
use App\Site;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Validator;

class OrdersController extends AdminController
{

    public $model = 'orders';

    public $validator = [

    ];
    private function init()
    {
        return '\\App\\' . ucfirst(str_singular($this->model));
    }
    public function index(Request $request)
    {

        $searchContent = '';
        $modelClass = $this->init();

        $contents = $modelClass::latest('created_at');

        $contents = $contents->paginate(10);

        return view('admin.'.$this->model.'.index', compact('contents', 'searchContent'))->with('model', $this->model);
    }

    public function confirm($id)
    {
        $order = Order::find($id);

        if ($order->status != 'create') {
            flash()->error('Invalid Action!');
            return redirect('admin/' . $this->model);
        } else {
            $order->update(['status' => 'confirm']);
            return redirect('admin/' . $this->model);
        }
    }


    /**
     * Create export for orders
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function export($id)
    {
        $order = Order::find($id);
        if (!Site::enoughProductForOrder($order)) {
            flash()->error('Not have enough product in stock!');
            return redirect('admin/'.$this->model);
        } elseif ($order->status != 'confirm') {
            flash()->error('Must confirm this order before export!');
            return redirect('admin/'.$this->model);
        } else {
            DB::beginTransaction();

            try {

                $export = Export::create([
                    'user_id' => session()->get('admin_login')->id,
                    'order_id' => $order->id,
                    'status' => true
                ]);

                foreach ($order->orderItems as $item) {
                  $stockExportIds =  DB::table('stock_products')
                        ->where('in_stock', true)
                        ->where('product_id', $item->product_id)
                        ->orderBy('created_at')
                        ->limit($item->quantity)
                        ->pluck('id')
                        ->all();

                  foreach ($stockExportIds as $stockId) {
                      DB::table('export_item_logs')->insertGetId([
                          'export_id' => $export->id,
                          'stock_product_id' => $stockId
                      ]);
                  }
                    DB::table('stock_products')->whereIn('id', $stockExportIds)->update([
                        'in_stock' => false,
                        'updated_at' => Carbon::now()->toDateTimeString()
                    ]);
                }

                //update order status.
                $order->update([
                    'status' => 'export'
                ]);

                DB::commit();
                flash()->success('Export Complete');
                return redirect('admin/exports');
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
                DB::rollback();
                flash()->error('Failed to create export! '.$e->getMessage());
                return redirect('admin/'.$this->model);
            }
        }
    }
    //cancel order
    public function cancel($id)
    {
        $order = Order::find($id);

        if ($order->status == 'cancel') {
            flash()->error('Order already be canceled!');
            return redirect('admin/'.$this->model);
        } elseif ($order->status == 'confirm' || $order->status == 'create') {
            $order->update([
                'status' => 'cancel'
            ]);
            flash()->success('Order already be canceled!');
            return redirect('admin/'.$this->model);
        } else {
            //cancel exported order.
            DB::beginTransaction();
            try {
                $exportForOrder = Export::where('order_id', $order->id)->get()->first();

                $stockProductForThisExport = DB::table('export_item_logs')->where('export_id', $exportForOrder->id)->pluck('stock_product_id')->all();

                DB::table('stock_products')->whereIn('id', $stockProductForThisExport)->update([
                    'in_stock' => true,
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);

                DB::table('export_item_logs')
                    ->where('export_id', $exportForOrder->id)
                    ->delete();
                $exportForOrder->update(['status' => false]);

                $order->update(['status' => 'cancel']);

                DB::commit();
                flash()->success('Cancel Complete');
                return redirect('admin/'.$this->model);
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
                DB::rollback();
                flash()->error('Failed to cancel order! '.$e->getMessage());
                return redirect('admin/'.$this->model);
            }
        }
    }

}
