<?php

namespace App\Http\Controllers;

use App\Member;
use App\Orders;
use App\OrdersDetails;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Melipayamak;
use App\Product;
use Carbon\Carbon;
use App\Lib\Helper;
class MemberController extends Controller
{
    function testLogin(Request $request)
    {
        $user=Member::whereMobile($request->mobile)->first();
        Auth::guard('member')->login($user);
        if (Auth::guard('member')->check()==true)
            echo 'login success';
        else
            echo 'not login';

    }
    public function sendOpt(Request $request)
    {
        $user=Member::whereMobile($request->mobile)->first();
        $userNotExist=Member::whereMobile($request->mobile)->doesntExist();
        $data=array();
        $data['mobile']=$request->mobile;
        $code = rand(100000, 900000);
        $data['otp_code']=$code;

        if ($userNotExist)
        {
            try {
                $sms = Melipayamak::sms();
                $to = $request->mobile;
                $from = '50004001396548';
                $text = '
                password:' . $code . '
                 کد تایید
                فروشگاه شایگان
                ';
                $response = $sms->send($to, $from, $text);
                $json = json_decode($response);
                DB::table('members')->insert($data);
                return view('front.website.confirm_code_otp',compact('data'));
            } catch (Exception $e) {
                echo $e->getMessage();

            }
        }
        else{
            try {
                $sms = Melipayamak::sms();
                $to = $user->mobile;
                $from = '50004001396548';
                $text = '
                password:' . $code . '
                 کد تایید
                فروشگاه شایگان
                ';
                $response = $sms->send($to, $from, $text);
                $json = json_decode($response);
                $user->otp_code=$code;
                $user->save();
                return view('front.website.confirm_code_otp',compact('data'));
            } catch (Exception $e) {
                echo $e->getMessage();

            }
        }
    }

    public function memberDashboard()
    {
        return view('front.member_panel.dashboard');
    }
    function addToCart(Request $request,$id)
    {
        $product = Product::find($id);
        if (Auth::guard('member')->check()==true)
        {
            if(!$product) {
                abort(404);
            }
            $cart = session()->get('cart',[]);
            // if cart is empty then this the first product
            if(!$cart) {
                $cart = [
                    $id => [
                        "product_id" => $product->id,
                        "member_id" => Auth::guard('member')->id(),
                        "title_ar" => $product->title_ar,
                        "qty" => $request->qty,
                        "retail_price" => $product->retail_price,
                        "image" => $product->image,
                        "created_at"=>Carbon::now()
                    ]
                ];
                session()->put('cart', $cart);
                toastr()->success('محصول با موفقیت یه سبد خرید اضاف شد');
                DB::table('carts')->insert($cart[$id]);
                return redirect()->back();
            }
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {
                $qtyplus=$cart[$id]['qty']++;
                session()->put('cart', $cart);
                toastr()->success('محصول با موفقیت یه سبد خرید اضاف شد');
                DB::table('carts')->where('member_id',Auth::id())->where('product_id',$id)->update(['qty'=>$qtyplus]);
                return redirect()->back();
            }
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "product_id" => $product->id,
                "member_id" => Auth::guard('member')->id(),
                "title_ar" => $product->title_ar,
                "qty" => $request->qty,
                "retail_price" => $product->retail_price,
                "image" => $product->image,
                "created_at"=>Carbon::now()

            ];
            session()->put('cart', $cart);
            toastr()->success('محصول با موفقیت یه سبد خرید اضاف شد');
            DB::table('carts')->insert($cart[$id]);
            return redirect()->back();
        }
        else
        {
            toastr()->error('برای خرید محصول باید اول به سیستم ورود کنید');
            return redirect('users/login');
        }
    }

    public function checkoutForm()
    {
        $setting=Settings::find(1);
        $state=DB::table('provinces')->get();
        $cities=DB::table('cities')->get();
        return view('front.website.checkout',compact('state','cities','setting'));
    }
        public function submitOrder(Request $request)
        {
            $request->replace(Helper::convertToEnNumberInputs($request->all(), ['email', 'code_meli',  'mobile','full_address','zip','order_details']));

            $order=array();
            $order['order_id']=rand(11,900000000000000000);
            if (session('cart')){
                foreach (session('cart') as $id => $details){
                    $productId[]=$details["product_id"];
                    $quantity[]=$details["qty"];
                    $unit_price[]=$details["retail_price"];

                }
                $data=array($order,$productId,$quantity,$unit_price);
                Orders::insert($data);
                $orderDetails=new OrdersDetails();
                $orderDetails->name=$request->input('name');
                $orderDetails->code_meli=$request->input('code_meli');
                $orderDetails->full_address=$request->input('full_address');
                $orderDetails->state_id=$request->input('state_id');
                $orderDetails->zip=$request->input('zip');
                $orderDetails->area_id=$request->input('area_id');
                $orderDetails->mobile=$request->input('mobile');
                $orderDetails->email=$request->input('email');
                $orderDetails->order_details=$request->input('order_details');
                $orderDetails->pay_mode=$request->input('pay_mode');
                $orderDetails->order_id=$order['order_id'];
                $orderDetails->save();
                toastr()->success('سفارش شما با موفقیت ثبت شد پس از بررسی سفارش با شما تماس گرفته میشود.');

                return back();
            }
            else{
                toastr()->error('برای خرید محصول باید اول به سیستم ورود کنید');
                return redirect('users/login');
            }

        }
}
