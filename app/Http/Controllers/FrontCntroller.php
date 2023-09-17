<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Categories;
use App\Product;
use App\ProductAttribute;
use App\Slideshow;
use Illuminate\Http\Request;

class FrontCntroller extends Controller
{
    public function index()
    {
        $categories=Categories::where('is_active',1)->take(10)->get();
        $slideShows=Slideshow::where('is_active',1)->get();
        $offerProduct=Product::where('is_active',1)->latest()->take(5)->get();
        $banners=Banner::where('is_active',1)->latest()->take(2)->get();
        $Popular_products=Product::where('is_active',1)->inRandomOrder()->take(5)->get();
        return view('front.website.index',compact('categories','slideShows','offerProduct','Popular_products','banners'));
    }
    function adminLogin()
    {
        return view('admin');
    }

    public function productDetails($id)
    {

        $product=Product::with("productcat","brand")->find($id);
        $lastProduct=Product::where('is_active',1)->latest()->take(4)->get();
        $radonProduct1=Product::where('is_active',1)->inRandomOrder()->take(3)->get();
        $radonProduct2=Product::where('is_active',1)->inRandomOrder()->take(3)->get();
//        $productColor=ProductAttribute::with("productColor")->whereProduct_id($product->id)->whereHas('productColor', function($q){
//            $q->where('color_code','!=', null);
//        })->get();
        $productColor=ProductAttribute::with("productColor")->whereProduct_id($product->id)->get();
        return view('front.website.product-details',compact('product','productColor','lastProduct','radonProduct1','radonProduct2'));
    }
}
