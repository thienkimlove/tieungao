<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function checkout()
    {
        return view('web.checkout');
    }

    public function order()
    {

        $msg = null;

        $order_items = [
            [
                'product_id' => 1,
                'quantity' => 2,

            ],
            [
                'product_id' => 2,
                'quantity' => 2,

            ]
         ];

        DB::beginTransaction();

        $now = Carbon::now()->toDateTimeString();

        try {
           $orderId = DB::table('orders')->insertGetId([
                'billing_name' => 'Do Quan',
                'billing_address' => '123 Abc Street',
                'billing_district' => '123 Abc Street',
                'billing_province' => '123 Abc Street',
                'billing_phone' => '234234234',
                'billing_email' => 'tieungao@test.com',
                'shipping_name' => 'Do Quan',
                'shipping_address' => '123 Abc Street',
                'shipping_district' => '123 Abc Street',
                'shipping_province' => '123 Abc Street',
                'shipping_phone' => '234234234',
                'shipping_email' => 'tieungao@test.com',
                'customer_note' => 'Giao hang tan nha',
                'status' => 0,
               'created_at' => $now,
               'updated_at' => $now,
            ]);

           foreach ($order_items as $item) {
               $product = Product::find($item['product_id']);
               DB::table('order_items')->insert([
                   'order_id' => $orderId,
                   'product_id' => $item['product_id'],
                   'quantity' => $item['quantity'],
                   'product_current_price' => ($product->promotion_price) ? $product->promotion_price : $product->seller_price,
                   'product_current_vat' => ($product->seller_vat) ? $product->seller_vat : 10,
                   'created_at' => $now,
                   'updated_at' => $now,
               ]);

           }
            DB::commit();

           $msg = 'Complete';

        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            $msg = $e->getMessage();
            DB::rollback();
        }

        return response()->json(['msg' => $msg]);
    }

    public function main($value)
    {

        if (preg_match('/([a-z0-9\-]+)-([\d])\.html/', $value, $matches)) {

            //product details.
            $product = Product::find($matches[2]);
            return view('web.product', compact('product'));

        } else {
             //category
            if (preg_match('/([a-z0-9\-]+)-([\d])/', $value, $matches)) {
                $category = Category::find($matches[2]);
                return view('web.category', compact('category'));
            }

        }
    }
}
