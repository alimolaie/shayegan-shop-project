<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Currency;
class ProductTestController extends Controller
{
        public function index(){
            $product=Product::all();
            $getCurrency=Currency::select('currency_code','exchange_rate')->get();
            return view('website.test-show.product',compact('product','getCurrency'));
        }
}
