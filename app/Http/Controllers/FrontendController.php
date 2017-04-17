<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function checkout()
    {

    }

    public function main($value, Request $request)
    {

        if (preg_match('/([a-z0-9\-]+)-([\d])\.html/', $value, $matches)) {

            //product details.
            $product = Product::find($matches[2]);

            return view('web.product', compact('product'));


        } else {
             //category

        }
    }
}
