<?php

namespace App\Http\Controllers;

use App\Export;
use App\Order;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Validator;

class StockProductsController extends AdminController
{

    public $model = 'stock_products';

    public $validator = [

    ];
    private function init()
    {
        return '\\App\\StockProduct';
    }
    public function index(Request $request)
    {

        $searchContent = '';
        $modelClass = $this->init();

        $contents = $modelClass::latest('created_at');


        $contents = $contents->paginate(10);

        return view('admin.'.$this->model.'.index', compact('contents', 'searchContent'))->with('model', $this->model);
    }

}
