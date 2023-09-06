<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Melipayamak;

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
    function addToCart($id)
    {
        $product = Product::find($id);
        if (Auth::check()==true)
        {
            if(!$product) {
                abort(404);
            }
            $cart = session()->get('cart');
            // if cart is empty then this the first product
            if(!$cart) {
                $cart = [
                    $id => [
                        "product_id" => $product->id,
                        "user_id" => Auth::id(),
                        "product_name" => $product->name,
                        "qty" => 1,
                        "height" => $product->height,
                        "width" => $product->width,
                        "altitude" => $product->altitude,
                        "category_id" => $product->category_id,
                        "price" => $product->price,
                        "file" => $product->file,
                        "image" => $product->image,
                        "created_at"=>Carbon::now()
                    ]
                ];
                session()->put('cart', $cart);
                DB::table('carts')->insert($cart[$id]);
                return redirect()->back();
            }
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {
                $qtyplus=$cart[$id]['qty']++;
                session()->put('cart', $cart);
                DB::table('carts')->where('user_id',Auth::id())->where('product_id',$id)->update(['qty'=>$qtyplus]);
                return redirect()->back();
            }
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "product_id" => $product->id,
                "user_id" => Auth::id(),
                "product_name" => $product->name,
                "qty" => 1,
                "height" => $product->height,
                "width" => $product->width,
                "altitude" => $product->altitude,
                "category_id" => $product->category_id,
                "price" => $product->price,
                "file" => $product->file,
                "image" => $product->image,
                "created_at"=>Carbon::now()

            ];
            session()->put('cart', $cart);
            DB::table('carts')->insert($cart[$id]);
            return redirect()->back();
        }
        else
        {
            return redirect('users/login');
        }
    }
}
