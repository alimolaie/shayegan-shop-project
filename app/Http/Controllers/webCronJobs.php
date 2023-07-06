<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Response;
use App\Settings;
use App\Slideshow;
use App\Banner;
use App\Section;
use App\Product;
use App\ProductAttribute;
use App\ProductCategory;
//option
use App\ProductOptions;
use App\ProductOptionsCustom;
use App\ProductOptionsCustomChild;
use App\ProductOptionsCustomChosen;

use App\Categories;
use App\ProductGallery;
use App\SinglePages;
use App\Size;
use App\Color;
use App\OrdersTemp;
use App\Orders;
use App\OrdersDetails;
use App\OrdersTrack;
use App\OrdersTempOption;
use App\OrdersOption;
use App\Faq;
use App\Newsletter;
use App\Subjects;
use App\Brand;
use App\Contactus;
use App\CustomersWish;
use App\CustomersAddress;
use App\User;
use App\ProductReview;
use App\Coupon;
use App\Country;
use App\State;
use App\Area;
use App\NotificationEmails;
use App\Transaction;
use App\Warranty;
use Curl;
use Hash;
//email
use App\Mail\SendGrid;
use App\Mail\SendGridOrder;
use Mail;
use DB;

class webCronJobs extends Controller
{
/*SEND EMAIL NOTIFICATION to ADMIN after reaching the min qty alert*/   

public function CronMinQtyEmailAlert(){
$joinproducts = Product::where('is_active','!=',0)
                         ->where('is_alert_min_qty',0)
						 ->limit(5)
						 ->get();
if(!empty($joinproducts) && count($joinproducts)>0){
foreach($joinproducts as $joinproduct){
//self::SendNotification($joinproduct->id);
}
}						 
}
   	
}