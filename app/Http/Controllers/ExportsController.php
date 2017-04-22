<?php

namespace App\Http\Controllers;

use App\Export;
use App\Order;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Validator;

class ExportsController extends AdminController
{

    public $model = 'exports';

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

    public function cancel($id)
    {
        $export = Export::find($id);
        if ($export->status == false) {
            flash()->error('Export already be canceled!');
            return redirect('admin/'.$this->model);
        } else {
            DB::beginTransaction();

            try {

                $stockProductForThisExport = DB::table('export_item_logs')
                    ->where('export_id', $export->id)
                    ->pluck('stock_product_id')
                    ->all();

                DB::table('stock_products')->whereIn('id', $stockProductForThisExport)->update([
                    'in_stock' => true,
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);

                DB::table('export_item_logs')
                    ->where('export_id', $export->id)
                    ->delete();
                $export->update(['status' => false]);
                Order::find($export->order_id)->update(['status' => 'cancel']);
                DB::commit();
                flash()->success('Cancel Complete');
                return redirect('admin/'.$this->model);
            } catch (\Exception $e) {
                \Log::info($e->getMessage());
                DB::rollback();
                flash()->error('Failed to cancel export! '.$e->getMessage());
                return redirect('admin/'.$this->model);
            }

        }
    }
}
