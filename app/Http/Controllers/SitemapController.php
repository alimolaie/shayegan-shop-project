<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Product;
use App\Categories;
use App\Brand;
//email
use App\Mail\SendGrid;
use Mail;
use DB;
class SitemapController extends Controller
{
   
     
  public function index()
    {
	  $staticsx[]=['loc'=>url("/")];
	  $staticsx[]=['loc'=>url("/offers")];
	  $staticsx[]=['loc'=>url("/about-us")];
	  $staticsx[]=['loc'=>url("/contactus")];
	  $staticsx[]=['loc'=>url("/login")];
	  $staticsx[]=['loc'=>url("/register")];
	  $staticsx[]=['loc'=>url("/faq")];
	  $brands     = Brand::where('is_active',1)->orderBy('id','DESC')->get();
	  $products   = Product::where('is_active',1)->orderBy('id','DESC')->get();
	  $categories = Categories::where('is_active',1)->where('parent_id',0)->orderBy('id','DESC')->get();
	  return response()->view('website.sitemap.index',[
          'products' => $products,
          'categories' => $categories,
		  'brands'=>$brands,
		  'staticsx'=>$staticsx
      ])->header('Content-Type', 'text/xml'); 				
    }
	
}
