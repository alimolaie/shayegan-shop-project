<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Settings;
use App\Product;
use Image;
use File;
use Response;
use App\Services\ManufacturerSlug;
use PDF;
use Auth;

class AdminManufacturerController extends Controller
{
    
	public static function countmanufactureProduct($mfid){
	return Product::where('manufacturer_id',$mfid)->get()->count();
	}
	
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	
	public function index(Request $request) //Request $request
    {
       
	    $settingInfo = Settings::where("keyname","setting")->first();
        $manufacturerLists = Manufacturer::orderBy('display_order', $settingInfo->default_sort)->paginate($settingInfo->item_per_page_back);
        return view('gwc.manufacturer.index',['manufacturerLists' => $manufacturerLists]);
    }
	
	
	/**
	Display the manufacturer listings
	**/
	public function create()
    {
	
	$lastOrderInfo = Manufacturer::OrderBy('display_order','desc')->first();
	if(!empty($lastOrderInfo->display_order)){
	$lastOrder=($lastOrderInfo->display_order+1);
	}else{
	$lastOrder=1;
	}
	return view('gwc.manufacturer.create')->with(['lastOrder'=>$lastOrder]);
	}
	

	
	/**
	Store New manufacturer Details
	**/
	public function store(Request $request)
    {
	
	$settingInfo = Settings::where("keyname","setting")->first();

		$image_thumb_w = 360;
		$image_thumb_h = 239;
	
		$image_big_w = 600;
		$image_big_h = 399;
	
		//field validation
	    $this->validate($request, [
			'title_en'     => 'required|min:3|max:190|string|unique:gwc_manufacturers,title_en',
			'title_ar'     => 'required|min:3|max:190|string|unique:gwc_manufacturers,title_ar',
			'details_en'   => 'nullable|string',
			'details_ar'   => 'nullable|string',
			'image'        => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		
		
	  try{
		
		
		//upload image
		$imageName="";
		if($request->hasfile('image')){
		$imageName = 'b-'.md5(time()).'.'.$request->image->getClientOriginalExtension();
		$request->image->move(public_path('uploads/manufacturer'), $imageName);
		// open file a image resource
		$imgbig = Image::make(public_path('uploads/manufacturer/'.$imageName));
		//resize image
		$imgbig->resize($image_big_w,$image_big_h);//Fixed w,h
		//if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
		// insert watermark at bottom-right corner with 10px offset
		//$imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
		//}
		// save to imgbig thumb
		$imgbig->save(public_path('uploads/manufacturer/'.$imageName));
		
		//create thumb
		// open file a image resource
		$img = Image::make(public_path('uploads/manufacturer/'.$imageName));
		//resize image
		$img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
		// save to thumb
		$img->save(public_path('uploads/manufacturer/thumb/'.$imageName));
		}

		$manufacturer = new Manufacturer;
		//slug
		$slug = new ManufacturerSlug;
		
		$manufacturer->slug=$slug->createSlug($request->title_en);
		$manufacturer->title_en=$request->input('title_en');
		$manufacturer->title_ar=$request->input('title_ar');
		$manufacturer->details_en=$request->input('details_en');
		$manufacturer->details_ar=$request->input('details_ar');
		$manufacturer->is_active=!empty($request->input('is_active'))?$request->input('is_active'):'0';
		$manufacturer->display_order=!empty($request->input('display_order'))?$request->input('display_order'):'0';
		$manufacturer->image=$imageName;
		$manufacturer->save();

        //save logs
		$key_name   = "manufacturer";
		$key_id     = $manufacturer->id;
		$message    = "A new record for manufacturer is added. (".$manufacturer->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
        return redirect('/gwc/manufacturer')->with('message-success','A new record is added successfully');
		
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
	    $editmanufacturer = Manufacturer::find($id);
        return view('gwc.manufacturer.edit',compact('editmanufacturer'));
    }
	
	
	 /**
     * Show the details of the manufacturer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
		$manufacturerDetails = Manufacturer::find($id);
        return view('gwc.manufacturer.view',compact('manufacturerDetails'));
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
	    //if(!empty($settingInfo->image_thumb_w) && !empty($settingInfo->image_thumb_h)){
		//$image_thumb_w = $settingInfo->image_thumb_w;
		//$image_thumb_h = $settingInfo->image_thumb_h;
		//}else{
		$image_thumb_w = 360;
		$image_thumb_h = 239;
		//}
		
		//if(!empty($settingInfo->image_big_w) && !empty($settingInfo->image_big_h)){
		//$image_big_w = $settingInfo->image_big_w;
		//$image_big_h = $settingInfo->image_big_h;
		//}else{
		$image_big_w = 600;
		$image_big_h = 399;
		//}
		
	 //field validation  
	   $this->validate($request, [
			'title_en'     => 'required|min:3|max:190|string|unique:gwc_manufacturers,title_en,'.$id,
			'title_ar'     => 'required|min:3|max:190|string|unique:gwc_manufacturers,title_ar,'.$id,
			'details_en'   => 'nullable|string',
			'details_ar'   => 'nullable|string',
			'image'        => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		
	  try{
	 
		
	$manufacturer = Manufacturer::find($id);
	$imageName='';
	//upload image
	if($request->hasfile('image')){
	//delete image from folder
	if(!empty($manufacturer->image)){
	$web_image_path = "/uploads/manufacturer/".$manufacturer->image;
	$web_image_paththumb = "/uploads/manufacturer/thumb/".$manufacturer->image;
	if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	   File::delete(public_path($web_image_paththumb));
	 }
	}
	//
	$imageName = 'b-'.md5(time()).'.'.$request->image->getClientOriginalExtension();
	
	$request->image->move(public_path('uploads/manufacturer'), $imageName);
	//create thumb
	// open file a image resource
    $imgbig = Image::make(public_path('uploads/manufacturer/'.$imageName));
	//resize image
	$imgbig->resize($image_big_w,$image_big_h);//Fixed w,h
	
	//if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
	// insert watermark at bottom-right corner with 10px offset
    //$imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
	//}
	// save to imgbig thumb
	$imgbig->save(public_path('uploads/manufacturer/'.$imageName));
	
	//create thumb
	// open file a image resource
    $img = Image::make(public_path('uploads/manufacturer/'.$imageName));
	//resize image
	$img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
	// save to thumb
	$img->save(public_path('uploads/manufacturer/thumb/'.$imageName));
	
	}else{
	$imageName = $manufacturer->image;
	}
	
	//slug
		$slug = new ManufacturerSlug;
		
		$manufacturer->slug=$slug->createSlug($request->title_en,$id);
		$manufacturer->title_en=$request->input('title_en');
		$manufacturer->title_ar=$request->input('title_ar');
		$manufacturer->details_en=$request->input('details_en');
		$manufacturer->details_ar=$request->input('details_ar');
		
		$manufacturer->is_active=!empty($request->input('is_active'))?$request->input('is_active'):'0';
		$manufacturer->display_order=!empty($request->input('display_order'))?$request->input('display_order'):'0';
		$manufacturer->image=$imageName;
		$manufacturer->save();
		
		
		//save logs
		$key_name   = "news";
		$key_id     = $manufacturer->id;
		$message    = "Record for manufacturer is edited. (".$manufacturer->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
	    return redirect('/gwc/manufacturer')->with('message-success','Information is updated successfully');
		
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
	$manufacturer = Manufacturer::find($id);
	//delete image from folder
	if(!empty($manufacturer->image)){
	$web_image_path = "/uploads/manufacturer/".$manufacturer->image;
	$web_image_paththumb = "/uploads/manufacturer/thumb/".$manufacturer->image;
	if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	   File::delete(public_path($web_image_paththumb));
	 }
	}
	
	$manufacturer->image='';
	$manufacturer->save();
	
	   //save logs
		$key_name   = "news";
		$key_id     = $manufacturer->id;
		$message    = "Image is removed. (".$manufacturer->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
	return redirect()->back()->with('message-success','Image is deleted successfully');	
	}
	
	/**
     * Delete manufacturer along with childs via ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function destroy($id){
	 //check param ID
	 if(empty($id)){
	 return redirect('/gwc/manufacturer')->with('message-error','Param ID is missing'); 
	 }
	 //get cat info
	 $manufacturer = Manufacturer::find($id);
	 //check cat id exist or not
	 if(empty($manufacturer->id)){
	 return redirect('/gwc/manufacturer')->with('message-error','No record found'); 
	 }

	 //delete parent cat mage
	 if(!empty($manufacturer->image)){
	 $web_image_path = "/uploads/manufacturer/".$manufacturer->image;
	 $web_image_paththumb = "/uploads/manufacturer/thumb/".$manufacturer->image;
	 if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	   File::delete(public_path($web_image_paththumb));
	  }
	 }
	 
	 //save logs
		$key_name   = "news";
		$key_id     = $manufacturer->id;
		$message    = "A record is removed. (".$manufacturer->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
	 //end deleting parent cat image
	 $manufacturer->delete();
	 return redirect()->back()->with('message-success','manufacturer is deleted successfully');	
	 }
	 
	 
	 
		//download pdf
	
	public function downloadPDF(){
	  $manufacturer = Manufacturer::get();
      $pdf = PDF::loadView('gwc.manufacturer.pdf', compact('manufacturer'));
      return $pdf->download('manufacturer.pdf');
    }
	
    //update status
	public function updateStatusAjax(Request $request)
    {
		$recDetails = Manufacturer::where('id',$request->id)->first(); 
		if($recDetails['is_active']==1){
			$active=0;
		}else{
			$active=1;
		}
		
		//save logs
		$key_name   = "news";
		$key_id     = $recDetails->id;
		$message    = "manufacturer status is changed to ".$active." (".$recDetails->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
		$recDetails->is_active=$active;
		$recDetails->save();
		return ['status'=>200,'message'=>'Status is modified successfully'];
	} 
	
}
