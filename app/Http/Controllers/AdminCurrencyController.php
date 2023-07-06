<?php

namespace App\Http\Controllers;

use App\Settings;
use App\Currency;
use  Image;
use File;
use Illuminate\Http\Request;

class AdminCurrencyController extends Controller
{
    public function index(Request $request)
    {

        $settingInfo = Settings::where("keyname","setting")->first();
        $currencyLists = Currency::orderBy('display_order', $settingInfo->default_sort)->paginate($settingInfo->item_per_page_back);
        return view('gwc.currency.index',['currencyLists' => $currencyLists]);
    }


    /**
    Display the slideshow listings
     **/
    public function create()
    {

        $lastOrderInfo = Currency::OrderBy('display_order','desc')->first();
        if(!empty($lastOrderInfo->display_order)){
            $lastOrder=($lastOrderInfo->display_order+1);
        }else{
            $lastOrder=1;
        }
        return view('gwc.currency.create')->with(['lastOrder'=>$lastOrder]);
    }



    /**
    Store New slideshow Details
     **/
    public function store(Request $request)
    {


        $settingInfo = Settings::where("keyname","setting")->first();

        $image_thumb_w = 450;
        $image_thumb_h = 188;

        $image_big_w = 1920;
        $image_big_h = 800;

        //field validation
        $this->validate($request, [
            'currency_code'     => 'nullable|min:3|max:190|string|unique:gwc_currencies,currency_code',

            'image'        => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);



        try{

            //upload image
            $imageName="";
            if($request->hasfile('image')){
                $imageName = 'b-'.md5(time()).'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/currency'), $imageName);
                // open file a image resource
                //$imgbig = Image::make(public_path('uploads/slideshow/'.$imageName));
                //resize image
                //$imgbig->resize($image_big_w,$image_big_h);//Fixed w,h
                //if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
                // insert watermark at bottom-right corner with 10px offset
                //$imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
                //}
                // save to imgbig thumb
                //$imgbig->save(public_path('uploads/slideshow/'.$imageName));

                //create thumb
                // open file a image resource
                $img = Image::make(public_path('uploads/currency/'.$imageName));
                //resize image
                $img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
                // save to thumb
                $img->save(public_path('uploads/currency/thumb/'.$imageName));
            }

            $currency = new Currency();

            $currency->currency_code=$request->input('currency_code');
            $currency->exchange_rate=$request->input('exchange_rate');
            $currency->is_active=!empty($request->input('is_active'))?$request->input('is_active'):'0';
            $currency->display_order=!empty($request->input('display_order'))?$request->input('display_order'):'0';
            $currency->image=$imageName;
            $currency->save();



            return redirect('/gwc/currency')->with('message-success','A record is added successfully');

        }catch (\Exception $e) {
            return redirect()->back()->with('message-error',$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editCurrency = Currency::find($id);
        return view('gwc.currency.edit',compact('editCurrency'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $settingInfo = Settings::where("keyname","setting")->first();

        $image_thumb_w = 450;
        $image_thumb_h = 188;

        $image_big_w = 1920;
        $image_big_h = 800;


        //field validation
        $this->validate($request, [
            'currency_code'     => 'nullable|min:3|max:190|string|unique:gwc_currencies,currency_code,'.$id,

            'image'        => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);



        try{


            $currency = Currency::find($id);
            $imageName='';
            //upload image
            if($request->hasfile('image')){
                //delete image from folder
                if(!empty($currency->image)){
                    $web_image_path = "/uploads/currency/".$currency->image;
                    $web_image_paththumb = "/uploads/currency/thumb/".$currency->image;
                    if(File::exists(public_path($web_image_path))){
                        File::delete(public_path($web_image_path));
                        File::delete(public_path($web_image_paththumb));
                    }
                }
                //
                $imageName = 'b-'.md5(time()).'.'.$request->image->getClientOriginalExtension();

                $request->image->move(public_path('uploads/currency'), $imageName);
                //create thumb
                // open file a image resource
                //$imgbig = Image::make(public_path('uploads/slideshow/'.$imageName));
                //resize image
                //$imgbig->resize($image_big_w,$image_big_h);//Fixed w,h

                //if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
                // insert watermark at bottom-right corner with 10px offset
                //$imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
                //}
                // save to imgbig thumb
                //$imgbig->save(public_path('uploads/slideshow/'.$imageName));

                //create thumb
                // open file a image resource
                $img = Image::make(public_path('uploads/currency/'.$imageName));
                //resize image
                $img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
                // save to thumb
                $img->save(public_path('uploads/currency/thumb/'.$imageName));

            }else{
                $imageName = $currency->image;
            }


            $currency->currency_code=$request->input('currency_code');
            $currency->exchange_rate=$request->input('exchange_rate');
            $currency->is_active=!empty($request->input('is_active'))?$request->input('is_active'):'0';
            $currency->display_order=!empty($request->input('display_order'))?$request->input('display_order'):'0';
            $currency->image=$imageName;
            $currency->save();




            return redirect('/gwc/currency')->with('message-success','Information is updated successfully');

        }catch (\Exception $e) {
            return redirect()->back()->with('message-error',$e->getMessage());
        }
    }

    /**
     * Delete the Image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteImage($id){
        $currency = Currency::find($id);
        //delete image from folder
        if(!empty($currency->image)){
            $web_image_path = "/uploads/currency/".$currency->image;
            $web_image_paththumb = "/uploads/currency/thumb/".$currency->image;
            if(File::exists(public_path($web_image_path))){
                File::delete(public_path($web_image_path));
                File::delete(public_path($web_image_paththumb));
            }
        }

        $currency->image='';
        $currency->save();



        return redirect()->back()->with('message-success','Image is deleted successfully');
    }

    /**
     * Delete slideshow along with childs via ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //check param ID
        if(empty($id)){
            return redirect('/gwc/currency')->with('message-error','Param ID is missing');
        }
        //get cat info
        $currency = Currency::find($id);
        //check cat id exist or not
        if(empty($currency->id)){
            return redirect('/gwc/currency')->with('message-error','No record found');
        }

        //delete parent cat mage
        if(!empty($currency->image)){
            $web_image_path = "/uploads/currency/".$currency->image;
            $web_image_paththumb = "/uploads/currency/thumb/".$currency->image;
            if(File::exists(public_path($web_image_path))){
                File::delete(public_path($web_image_path));
                File::delete(public_path($web_image_paththumb));
            }
        }



        $currency->delete();
        return redirect()->back()->with('message-success','Currency is deleted successfully');
    }




    //update status
    public function updateStatusAjax(Request $request)
    {
        $recDetails = Currency::where('id',$request->id)->first();
        if($recDetails['is_active']==1){
            $active=0;
        }else{
            $active=1;
        }



        $recDetails->is_active=$active;
        $recDetails->save();
        return ['status'=>200,'message'=>'Status is modified successfully'];
    }

}
