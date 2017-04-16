<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Validator;

class ImportsController extends AdminController
{

    public $model = 'imports';

    public $validator = [
        'supplier_id' => 'required',
        'product_id' => 'required',
        'product_quantity' => 'required',
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

        return view('admin.' . $this->model . '.index', compact('contents', 'searchContent'))->with('model', $this->model);
    }

    public function create()
    {
        $modelClass = $this->init();
        $content = new $modelClass;
        return view('admin.' . $this->model . '.form', compact('content'))->with('model', $this->model);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validator);
        if ($validator->fails()) {
            return redirect('admin/' . $this->model . '/create')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->all();

        $import_items = [];

        foreach ($data['product_id'] as $k => $product_id) {
            $product = Product::find($product_id);
            if (!empty($data['product_quantity'][$k]) && $product->supplier_id == $data['supplier_id'] && $product->status) {
                $import_items[$product_id] = intval($data['product_quantity'][$k]);
            }
        }

        if ($import_items) {

            $now = Carbon::now()->toDateTimeString();

            DB::beginTransaction();

            try {
                $import_id = DB::table('imports')->insertGetId([
                    'user_id' => session('admin_login')->id,
                    'supplier_id' => $data['supplier_id'],
                    'note' => $data['note'],
                    'created_at' => $now,
                    'updated_at' => $now,
                    'status' => 'create'
                ]);

                foreach ($import_items as $productId => $quantity) {
                    DB::table('import_items')->insertGetId([
                        'import_id' => $import_id,
                        'product_id' => $productId,
                        'quantity' => $quantity,
                        'created_at' => $now,
                        'updated_at' => $now
                    ]);
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                \Log::info('Failed to create import! ' . $e->getMessage());

                $validator->getMessageBag()->add('import', 'Failed to create import!');
                return redirect('admin/' . $this->model . '/create')
                    ->withErrors($validator)
                    ->withInput();
            }
        } else {
            $validator->getMessageBag()->add('import', 'Not enough data to create import!');
            return redirect('admin/' . $this->model . '/create')
                ->withErrors($validator)
                ->withInput();
        }
        flash()->success('Success created!');
        return redirect('admin/' . $this->model);
    }

    //only can edit import with status = create
    public function edit($id)
    {
        $modelClass = $this->init();
        $content = $modelClass::find($id);

        if ($content->status != 'create') {
            flash()->error('Can not edit import which complete or cancel!');
            return redirect('admin/' . $this->model);
        }
        return view('admin.' . $this->model . '.form', compact('content'))->with('model', $this->model);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), $this->validator);
        if ($validator->fails()) {
            return redirect('admin/' . $this->model . '/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->all();
        $modelClass = $this->init();
        $content = $modelClass::find($id);

        if ($content->status != 'create') {
            $validator->getMessageBag()->add('import', 'Failed to edit import which complete or cancel!');
            return redirect('admin/' . $this->model . '/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $import_items = [];

        foreach ($data['product_id'] as $k => $product_id) {
            $product = Product::find($product_id);
            if (!empty($data['product_quantity'][$k]) && $product->supplier_id == $data['supplier_id'] && $product->status) {
                $import_items[$product_id] = intval($data['product_quantity'][$k]);
            }
        }

        if ($import_items) {
            $data['user_id'] = session('admin_login')->id;
            $now = Carbon::now()->toDateTimeString();
            DB::beginTransaction();

            try {

                $content->update($data);

                DB::table('import_items')
                    ->where('import_id', $content->id)
                    ->delete();

                foreach ($import_items as $productId => $quantity) {
                    DB::table('import_items')->insertGetId([
                        'import_id' => $content->id,
                        'product_id' => $productId,
                        'quantity' => $quantity,
                        'created_at' => $now,
                        'updated_at' => $now
                    ]);
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                \Log::info('Failed to update import! ' . $e->getMessage());
                $validator->getMessageBag()->add('import', 'Failed to update import!');
                return redirect('admin/' . $this->model . '/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput();
            }
        } else {
            $validator->getMessageBag()->add('import', 'Not have enough data for edit import!');
            return redirect('admin/' . $this->model . '/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        flash()->success('Success edited!');
        return redirect('admin/' . $this->model);
    }

    public function import($id)
    {
        $modelClass = $this->init();
        $content = $modelClass::find($id);
        if ($content->status == 'create') {
            $now = Carbon::now()->toDateTimeString();
            DB::beginTransaction();
            try {
                $content->update([
                    'status' => 'complete'
                ]);
                foreach ($content->import_items as $item) {
                    for ($i = 0; $i < $item->quantity; $i ++) {
                        $stock_product_id = DB::table('stock_products')->insertGetId([
                            'product_id' => $item->product_id,
                            'in_stock' => true,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ]);

                        DB::table('import_item_logs')->insert([
                            'import_id' => $content->id,
                            'stock_product_id' => $stock_product_id,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ]);
                    }

                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::info('import failed! '.$e->getMessage());
                flash()->error('Failed Import! '.$e->getMessage());
            }
        } else {
            flash()->error('Can not import which is cancel or complete!');
        }

        return redirect('admin/'.$this->model);
    }


    public function cancel($id)
    {
        $modelClass = $this->init();
        $content = $modelClass::find($id);
        if ($content->status == 'create') {
            $content->update([
                'status' => 'cancel'
            ]);
        } elseif ($content->status == 'complete') {
            //check if any in_stock product out of stock or not.
            //find all in_stock for this import.
            $count = DB::table('imports')
                ->join('import_item_logs', 'imports.id', '=', 'import_item_logs.import_id')
                ->join('stock_products', 'stock_products.id', '=', 'import_item_logs.stock_product_id')
                ->where('imports.id', $content->id)
                ->where('stock_products.in_stock', false)
                ->count();

            if ($count > 0) {
                flash()->error('Can not cancel import which have stock product which export!');
                return redirect('admin/'.$this->model);
            } else {
                DB::beginTransaction();

                try {
                    $content->update(['status' => 'cancel']);
                    $totalStockProductIds = DB::table('import_item_logs')->where('import_id', $content->id)->pluck('stock_product_id')->all();
                    DB::table('stock_products')
                        ->whereIn('id', $totalStockProductIds)
                        ->delete();
                    DB::table('import_item_logs')
                        ->where('import_id', $content->id)
                        ->delete();
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    \Log::info('Failed to cancel Import! '.$e->getMessage());

                    flash()->error('Can not cancel import! '.$e->getMessage());
                    return redirect('admin/'.$this->model);
                }
            }

        } else {
            flash()->error('Can not cancel import which already cancel!');
            return redirect('admin/'.$this->model);
        }

        flash()->success('Success Cancel!');
        return redirect('admin/'.$this->model);
    }
}
