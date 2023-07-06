<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Endroid\QrCode\QrCode;

use App\Product;
use App\ProductGallery;
use App\ProductAttribute;
use App\ProductCategory;
use App\Categories;
use App\Settings;
use App\Color;
use App\Size;
use App\Section;
use App\ProductReview;
use App\Manufacturer;
use App\Warranty;
use App\Brand;
use App\ProductInquiry;
use App\ProductOptions;
use App\ProductOptionsCustom;
use App\ProductOptionsCustomChild;
use App\ProductOptionsCustomChosen;
use App\Tags;
use Image;
use File;
use Response;
use App\Services\ProductSlug;
use App\Services\SectionSlug;
use PDF;
use Auth;

use App\Mail\SendGrid;
use Mail;

use DB;



class AdminProductController extends Controller
{
    
	
	
	
	//Add Quick Item
	public function addQuick(){
	$settingInfo   = Settings::where("keyname","setting")->first();
	$serialNumber  = $this->serialNumber();
	$lastOrderInfo = Product::OrderBy('display_order','desc')->first();
	if(!empty($lastOrderInfo->display_order)){
	$lastOrder=($lastOrderInfo->display_order+1);
	}else{
	$lastOrder=1;
	}
	
	$categoryLists = Categories::where('parent_id',0)->orderBy('name_en','asc')->get();
	$brandLists    = Brand::where('is_active',1)->orderBy('title_en', 'ASC')->get();
	$listSections  = Section::where('section_type','regular')->orderBy('display_order','desc')->get();
	return view('gwc.product.addQuick',compact('settingInfo','serialNumber','lastOrder','categoryLists','brandLists','listSections'));
	}
	
	public function PostaddQuick(Request $request){
	
	//field validation
	    $this->validate($request, [
		    'item_code'      => 'required|min:3|max:30|string|unique:gwc_products,item_code',
			'title_en'       => 'required|min:3|max:190|string',
			'title_ar'       => 'required|min:3|max:190|string',
			'slug'           => 'nullable|max:190|string|unique:gwc_products,slug',
			'details_en'     => 'required|string|min:3',
			'details_ar'     => 'required|string|min:3',
			'retail_price'   => 'required|string|min:1',
			'image'          => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'rollover_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
		
		
	try{
	
	    $settingInfo = Settings::where("keyname","setting")->first();

		if(!empty($settingInfo->image_thumb_w) && !empty($settingInfo->image_thumb_h)){
		$image_thumb_w = $settingInfo->image_thumb_w;
		$image_thumb_h = $settingInfo->image_thumb_h;
		}else{
		$image_thumb_w = 280;
		$image_thumb_h = 280;
		}
		
		if(!empty($settingInfo->image_big_w) && !empty($settingInfo->image_big_h)){
		$image_big_w = $settingInfo->image_big_w;
		$image_big_h = $settingInfo->image_big_h;
		}else{
		$image_big_w = 990;
		$image_big_h = 990;
		}
	
		
		
		//upload image
		$imageName="";
		if($request->hasfile('image')){
		$imageName = 'p-'.md5(time()).'.'.$request->image->getClientOriginalExtension();
		//$request->image->move(public_path('uploads/product'), $imageName);
		$request->image->move(public_path('uploads/product/original'), $imageName);
		// open file a image resource
		$imgbig = Image::make(public_path('uploads/product/original/'.$imageName));
		//resize image
		$imgbig->resize($image_big_w,$image_big_h,function($constraint){
		$constraint->aspectRatio();
		});//Fixed w,h
		if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
		// insert watermark at bottom-right corner with 10px offset
		$imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
		}
		// save to imgbig thumb
		$imgbig->save(public_path('uploads/product/'.$imageName));
		
		//create thumb
		// open file a image resource
		$img = Image::make(public_path('uploads/product/original/'.$imageName));
		//resize image
		$img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
		// save to thumb
		$img->save(public_path('uploads/product/thumb/'.$imageName));
		}
        //rollover image
		$imageName_roll="";
		if($request->hasfile('rollover_image')){
		$imageName_roll = 'rollover-'.md5(time()).'.'.$request->rollover_image->getClientOriginalExtension();
		//$request->rollover_image->move(public_path('uploads/product'), $imageName_roll);
		$request->rollover_image->move(public_path('uploads/product/original'), $imageName_roll);
		// open file a image resource
		$imgbig = Image::make(public_path('uploads/product/original/'.$imageName_roll));
		//resize image
		$imgbig->resize($image_big_w,$image_big_h,function($constraint){
		$constraint->aspectRatio();
		});//Fixed w,h
		if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
		// insert watermark at bottom-right corner with 10px offset
		$imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
		}
		// save to imgbig thumb
		$imgbig->save(public_path('uploads/product/'.$imageName_roll));
		
		//create thumb
		// open file a image resource
		$img = Image::make(public_path('uploads/product/original/'.$imageName_roll));
		//resize image
		$img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
		// save to thumb
		$img->save(public_path('uploads/product/thumb/'.$imageName_roll));
		}

				
		$product = new Product;
		//slug
		if(!empty($request->slug)){
		$product->slug=$request->slug;
		}else{
		$slug = new ProductSlug;
		$product->slug=$slug->createSlug($request->title_en);
		}
		
		$product->warranty      = $request->input('warranty');
		$product->item_code     = $request->input('item_code');
		$product->sku_no        = $request->input('sku_no');
		$product->title_en      = $request->input('title_en');
		$product->title_ar      = $request->input('title_ar');
		$product->extra_title_en      = $request->input('extra_title_en');
		$product->extra_title_ar      = $request->input('extra_title_ar');
		$product->details_en    = $request->input('details_en');
		$product->details_ar    = $request->input('details_ar');
		$product->sdetails_en   = $request->input('sdetails_en');
		$product->sdetails_ar   = $request->input('sdetails_ar');
		
		$product->seokeywords_en = !empty($request->input('title_en'))?$request->input('title_en'):'';
		$product->seokeywords_ar = !empty($request->input('title_ar'))?$request->input('title_ar'):'';
		
		$product->seodescription_en = !empty($request->input('sdetails_en'))?$request->input('sdetails_en'):'';
		$product->seodescription_ar = !empty($request->input('sdetails_ar'))?$request->input('sdetails_ar'):'';
		
		$product->youtube_url  = !empty($request->input('youtube_url'))?$request->input('youtube_url'):'';
		
		$product->is_attribute = !empty($request->input('is_attribute'))?$request->input('is_attribute'):'0';
		$product->quantity     = !empty($request->input('squantity'))?$request->input('squantity'):'0';
		
		$product->brand_id     = !empty($request->input('brand'))?$request->input('brand'):'0';
		$product->homesection  = !empty($request->input('homesection'))?$request->input('homesection'):'0';
		$product->is_active    = !empty($request->input('prodstatus'))?$request->input('prodstatus'):'0';
		
		$product->retail_price    = $request->input('retail_price');
		$product->old_price       = $request->input('old_price');
		$product->cost_price      = $request->input('cost_price');
		$product->wholesale_price = $request->input('wholesale_price');
		$product->weight          = $request->input('weight');
		
		if(!empty($request->input('old_price'))){
		$product->is_offer=1;
		}else{
		$product->is_offer=0;
		}
		
		$product->is_export_active=1;
		$product->display_order = !empty($request->input('display_order'))?$request->input('display_order'):'0';
		$product->image         = $imageName;
		$product->rollover_image=$imageName_roll;
		
		if(!empty($request->input('tags_en'))){
		$product->tags_en   = $this->buildtags($request->input('tags_en'));
		}
		if(!empty($request->input('tags_ar'))){
		$product->tags_ar   = $this->buildtags($request->input('tags_ar'));
		}
	
		$product->save();
        
		//add category
		$this->productCategoryUpdate($request,$product->id);
		//upload gallery
		$this->productGalleryUpdalod($request,$product->id);
        //generate QR 
		$qrtext = $product->id.'-'.$product->item_code;
		self::QrCodes($qrtext,$product->item_code);
        //save logs
		$key_name   = "product";
		$key_id     = $product->id;
		$message    = "A new record for product is added. (".$product->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		
		if(empty($request->input('is_attribute'))){
		return redirect('/gwc/product')->with('message-success','A new record is added successfully');
		}else{
        return redirect('/gwc/product/'.$product->id.'/options')->with('message-success','A new record is added successfully');
		}
		
		}catch (\Exception $e) {
	  return redirect()->back()->with('message-error',$e->getMessage());	
	 }
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	
	public function index(Request $request) //Request $request
    {
       
	    if(!empty($request->clear)){
		Cookie::queue('item_sections', '', 0);
        Cookie::queue('item_status', '', 0);
        Cookie::queue('item_outofstock', '', 0);
		return redirect('/gwc/product');
		}
	   
	    $settingInfo = Settings::where("keyname","setting")->first();
		//check search queries
		if(!empty($request->get('q'))){
        $q = $request->get('q');
        }else{
        $q = $request->q;
        }
        
        if(!empty($request->category)){
		$productLists = Product::with('brand','productcat');
		$productLists = $productLists->select('gwc_products.*','gwc_products_category.product_id','gwc_products_category.category_id');
		$productLists = $productLists->join('gwc_products_category','gwc_products_category.product_id','=','gwc_products.id');
		if(!empty($q)){
		$productLists = $productLists->where(function($sq) use ($q){
		                             $sq->where('gwc_products.item_code','LIKE','%'.$q.'%')
		                             ->orwhere('gwc_products.title_en','LIKE','%'.$q.'%')
									 ->orwhere('gwc_products.title_ar','LIKE','%'.$q.'%')
									 ->orwhere('gwc_products.sku_no','LIKE','%'.$q.'%');});
		 }
		 
		if(!empty($request->brand_id)){
		$productLists = $productLists->where('gwc_products.brand_id',$request->brand_id);		
		} 
		if(!empty($request->manufacturer_id)){
		$productLists = $productLists->where('gwc_products.manufacturer_id',$request->manufacturer_id);		
		} 
		 
		if(!empty($request->tag)){
		$tag = $request->tag;
		$productLists = $productLists->whereRaw("FIND_IN_SET(?,gwc_products.tags_en)",[$tag]);		
		}  
		 
		$sectionsInfo=[];
		if(!empty(Cookie::get('item_sections'))){
		$sectionsInfo = Section::where("id",Cookie::get('item_sections'))->first();
	    $productLists=$productLists->where('gwc_products.homesection','=',Cookie::get('item_sections'));
	    }
		//by statis
		if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==1){
	    $productLists=$productLists->where('gwc_products.is_active','=',Cookie::get('item_status'));
	    }else if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==2){
	    $productLists=$productLists->where('gwc_products.is_active','=',Cookie::get('item_status'));
	    }else if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==-1){
	    $productLists=$productLists->where('gwc_products.is_active','=',0);
	    }
		//by out of stock 
		if(!empty(Cookie::get('item_outofstock'))){
	    $productLists=$productLists->where('gwc_products.quantity','=',0);
	    } 							 
		
		$productLists = $productLists->where('gwc_products_category.category_id',$request->category)->orderBy('id','DESC')
		                            ->paginate(3);
		$productLists->appends(['category' => $request->category]);	
		if(!empty($q)){
		$productLists->appends(['q' => $q]);	
		}
		
		if(!empty($request->manufacturer_id)){
		$productLists->appends(['manufacturer_id' => $request->manufacturer_id]);	
		}
		if(!empty($request->brand_id)){
		$productLists->appends(['brand_id' => $request->brand_id]);	
		}
		if(!empty($request->tag)){
		$productLists->appends(['tag' => $request->tag]);	
		}
							   
		}else{
        //menus records
        if(!empty($q)){
        $productLists = Product::with('brand','productcat')->where(function($sq) use ($q){
		                             $sq->where('item_code','LIKE','%'.$q.'%')
		                             ->orwhere('title_en','LIKE','%'.$q.'%')
									 ->orwhere('title_ar','LIKE','%'.$q.'%')
									 ->orwhere('sku_no','LIKE','%'.$q.'%');});
		
		if(!empty($request->brand_id)){
		$productLists = $productLists->where('brand_id',$request->brand_id);		
		} 
		if(!empty($request->manufacturer_id)){
		$productLists = $productLists->where('manufacturer_id',$request->manufacturer_id);		
		} 
		
		if(!empty($request->tag)){
		$tag = $request->tag;
		$productLists = $productLists->whereRaw("FIND_IN_SET(?,tags_en)",[$tag]);		
		} 
		
		//by sections
		$sectionsInfo=[];
		if(!empty(Cookie::get('item_sections'))){
		$sectionsInfo = Section::where("id",Cookie::get('item_sections'))->first();
	    $productLists=$productLists->where('homesection','=',Cookie::get('item_sections'));
	    }
		//by status
		if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==1){
	    $productLists=$productLists->where('is_active','=',Cookie::get('item_status'));
	    }else if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==2){
	    $productLists=$productLists->where('is_active','=',Cookie::get('item_status'));
	    }else if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==-1){
	    $productLists=$productLists->where('is_active','=',0);
	    }
		//by out of stock 
		if(!empty(Cookie::get('item_outofstock'))){
	    $productLists=$productLists->where('quantity','=',0);
	    }
		                           
		$productLists = $productLists->orderBy('id', 'DESC')
		                             ->paginate($settingInfo->item_per_page_back);  						 
        $productLists->appends(['q' => $q]);
		
		if(!empty($request->manufacturer_id)){
		$productLists->appends(['manufacturer_id' => $request->manufacturer_id]);	
		}
		if(!empty($request->brand_id)){
		$productLists->appends(['brand_id' => $request->brand_id]);	
		}
		if(!empty($request->tag)){
		$productLists->appends(['tag' => $request->tag]);	
		}
		
        }else{
        $productLists = Product::with('brand','productcat');
		
		if(!empty($request->brand_id)){
		$productLists = $productLists->where('brand_id',$request->brand_id);		
		} 
		if(!empty($request->manufacturer_id)){
		$productLists = $productLists->where('manufacturer_id',$request->manufacturer_id);		
		}
		 
		if(!empty($request->tag)){
		$tag = $request->tag;
		$productLists = $productLists->whereRaw("FIND_IN_SET(?,tags_en)",[$tag]);		
		} 
		
		//by section
		$sectionsInfo=[];
		if(!empty(Cookie::get('item_sections'))){
		$sectionsInfo = Section::where("id",Cookie::get('item_sections'))->first();
	    $productLists=$productLists->where('homesection','=',Cookie::get('item_sections'));
	    }
		//by statis
		if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==1){
	    $productLists=$productLists->where('is_active','=',Cookie::get('item_status'));
	    }else if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==2){
	    $productLists=$productLists->where('is_active','=',Cookie::get('item_status'));
	    }else if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==-1){
	    $productLists=$productLists->where('is_active','=',0);
	    }
		//by out of stock 
		if(!empty(Cookie::get('item_outofstock'))){
	    $productLists=$productLists->where('quantity','=',0);
	    }
		
		$productLists=$productLists->orderBy('id','DESC')
		                           ->paginate($settingInfo->item_per_page_back);
	
		if(!empty($request->manufacturer_id)){
		$productLists->appends(['manufacturer_id' => $request->manufacturer_id]);	
		}						   
		if(!empty($request->brand_id)){
		$productLists->appends(['brand_id' => $request->brand_id]);	
		}
		if(!empty($request->tag)){
		$productLists->appends(['tag' => $request->tag]);	
		}
		
		}
		}
		
		//section
		$sectionsLists = Section::where("is_active",1)->get();
		
		
		$manufacturerLists = Manufacturer::select('gwc_manufacturers.*','gwc_products.manufacturer_id')->join('gwc_products','gwc_products.manufacturer_id','=','gwc_manufacturers.id')->groupBy('gwc_products.manufacturer_id')->get();
		$brandLists = Brand::select('gwc_brands.*','gwc_products.brand_id')->join('gwc_products','gwc_products.brand_id','=','gwc_brands.id')->groupBy('gwc_products.brand_id')->get();

		
        return view('gwc.product.index',compact('productLists','sectionsLists','sectionsInfo','manufacturerLists','brandLists'));
    }
	
	
   public function deleteTags(Request $request){
   if(empty($request->tag)){ abort(404);}
   $tag = trim($request->tag);
   $productTags = Product::whereRaw("FIND_IN_SET(?,tags_en)",[$tag])->get();	
   if(!empty($productTags) && count($productTags)>0){
      foreach($productTags as $productTag){
	    $explodeTags = explode(",",$productTag->tags_en);
	    $tags = self::array_remove_by_value($explodeTags,$tag);
		if(!empty($tags)){
		$productTagy = Product::find($productTag->id);
		$productTagy->tags_en = implode(",",$tags);
		$productTagy->save();
		}else{
		$productTagy = Product::find($productTag->id);
		$productTagy->tags_en = '';
		$productTagy->save();
		}
	  }   
    }  
	return redirect('/gwc/tags')->with('message-success','Tags are removed successfully'); 
   }	
	
   public static function array_remove_by_value($array, $value)
	{
		return array_values(array_diff($array, array($value)));
	}	
	
	//reset filteration
   public static function resetProductFilteration(){
   Cookie::queue('item_sections', '', 0);
   Cookie::queue('item_status', '', 0);
   Cookie::queue('item_outofstock', '', 0);
   return ["status"=>200,"message"=>""];
   }
	
	/**
	Display the product listings
	**/
	public function create()
    {
	$serialNumber = $this->serialNumber();
	$lastOrderInfo = Product::OrderBy('display_order','desc')->first();
	if(!empty($lastOrderInfo->display_order)){
	$lastOrder=($lastOrderInfo->display_order+1);
	}else{
	$lastOrder=1;
	}
	return view('gwc.product.create')->with(['lastOrder'=>$lastOrder,'serialNumber'=>$serialNumber]);
	}
	
	//count iotem via section
	public static function countItemBySections($secid){
	$counts = Product::where("homesection",$secid)->get()->count();
	return $counts;
	}
	//generate serial number with prefix
	public function serialNumber(){
	$settingInfo = Settings::where("keyname","setting")->first();
	$productInfo = Product::orderBy("id","desc")->first();
	if(!empty($productInfo->id)){
	if($settingInfo->theme==8){
	$itemcode   = substr($productInfo->item_code,3);
	$lastProdId = ($itemcode+1);
	}else{
	$lastProdId = ($productInfo->id+1);
	}
	}else{
	$lastProdId = 1;
	}
	$seriamNum = $settingInfo->prefix.sprintf('%0'.$settingInfo->item_code_digits.'s', $lastProdId);
	return $seriamNum;
	}

	
	/**
	Store New product Details
	**/
	public function store(Request $request)
    {
	
	 $settingInfo = Settings::where("keyname","setting")->first();

		if(!empty($settingInfo->image_thumb_w) && !empty($settingInfo->image_thumb_h)){
		$image_thumb_w = $settingInfo->image_thumb_w;
		$image_thumb_h = $settingInfo->image_thumb_h;
		}else{
		$image_thumb_w = 280;
		$image_thumb_h = 280;
		}
		
		if(!empty($settingInfo->image_big_w) && !empty($settingInfo->image_big_h)){
		$image_big_w = $settingInfo->image_big_w;
		$image_big_h = $settingInfo->image_big_h;
		}else{
		$image_big_w = 990;
		$image_big_h = 990;
		}
	
	
	//field validation
	    $this->validate($request, [
		    'item_code'      => 'required|min:3|max:30|string|unique:gwc_products,item_code',
			'title_en'       => 'required|min:3|max:190|string',
			'title_ar'       => 'required|min:3|max:190|string',
			'slug'           => 'nullable|max:190|string|unique:gwc_products,slug',
			'details_en'     => 'required|string|min:3',
			'details_ar'     => 'required|string|min:3',
			'retail_price'   => 'required|string|min:1',
			'image'          => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'rollover_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
			'attachfile'     => "nullable|mimetypes:application/pdf|max:10000"
        ]);
		
		
	    try{
		
		//upload image
		$imageName="";
		if($request->hasfile('image')){
		$imageName = 'p-'.md5(time()).'.'.$request->image->getClientOriginalExtension();
		//$request->image->move(public_path('uploads/product'), $imageName);
		$request->image->move(public_path('uploads/product/original'), $imageName);
		// open file a image resource
		$imgbig = Image::make(public_path('uploads/product/original/'.$imageName));
		//resize image
		$imgbig->resize($image_big_w,$image_big_h,function($constraint){
		$constraint->aspectRatio();
		});//Fixed w,h
		if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
		// insert watermark at bottom-right corner with 10px offset
		$imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
		}
		// save to imgbig thumb
		$imgbig->save(public_path('uploads/product/'.$imageName));
		
		//create thumb
		// open file a image resource
		$img = Image::make(public_path('uploads/product/original/'.$imageName));
		//resize image
		$img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
		// save to thumb
		$img->save(public_path('uploads/product/thumb/'.$imageName));
		}
        //rollover image
		$imageName_roll="";
		if($request->hasfile('rollover_image')){
		$imageName_roll = 'rollover-'.md5(time()).'.'.$request->rollover_image->getClientOriginalExtension();
		//$request->rollover_image->move(public_path('uploads/product'), $imageName_roll);
		$request->rollover_image->move(public_path('uploads/product/original'), $imageName_roll);
		// open file a image resource
		$imgbig = Image::make(public_path('uploads/product/original/'.$imageName_roll));
		//resize image
		$imgbig->resize($image_big_w,$image_big_h,function($constraint){
		$constraint->aspectRatio();
		});//Fixed w,h
		if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
		// insert watermark at bottom-right corner with 10px offset
		$imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
		}
		// save to imgbig thumb
		$imgbig->save(public_path('uploads/product/'.$imageName_roll));
		
		//create thumb
		// open file a image resource
		$img = Image::make(public_path('uploads/product/original/'.$imageName_roll));
		//resize image
		$img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
		// save to thumb
		$img->save(public_path('uploads/product/thumb/'.$imageName_roll));
		}

		//upload attach
		$attachfileName='';
		if($request->hasfile('attachfile')){
		$attachfileName = 'attach-'.md5(time()).'.'.$request->attachfile->getClientOriginalExtension();
		$request->attachfile->move(public_path('uploads/product'), $attachfileName);
		}
		
		$product = new Product;
		//slug
		if(!empty($request->slug)){
		$product->slug=$request->slug;
		}else{
		$slug = new ProductSlug;
		$product->slug=$slug->createSlug($request->title_en);
		}
		
		$product->warranty      = $request->input('warranty');
		$product->item_code     = $request->input('item_code');
		$product->sku_no        = $request->input('sku_no');
		$product->title_en      = $request->input('title_en');
		$product->title_ar      = $request->input('title_ar');
		$product->extra_title_en = $request->input('extra_title_en');
		$product->extra_title_ar = $request->input('extra_title_ar');
		$product->details_en    = $request->input('details_en');
		$product->details_ar    = $request->input('details_ar');
		$product->sdetails_en   = $request->input('sdetails_en');
		$product->sdetails_ar   = $request->input('sdetails_ar');
		$product->retail_price  = $request->input('retail_price');
		$product->old_price     = $request->input('old_price');
		$product->cost_price      = $request->input('cost_price');
		$product->wholesale_price = $request->input('wholesale_price');
		$product->weight          = $request->input('weight');
		
		if(!empty($request->input('old_price'))){
		$product->is_offer=1;
		}else{
		$product->is_offer=0;
		}
		
		$product->is_active=0;
		$product->is_export_active=1;
		$product->display_order = !empty($request->input('display_order'))?$request->input('display_order'):'0';
		$product->image         = $imageName;
		$product->rollover_image=$imageName_roll;
		$product->attachfile    = $attachfileName;
		$product->save();
 
        //generate QR 
		$qrtext = $product->id.'-'.$product->item_code;
		self::QrCodes($qrtext,$product->item_code);
        //save logs
		$key_name   = "product";
		$key_id     = $product->id;
		$message    = "A new record for product is added. (".$product->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		if(!empty($request->input('redirect_to_listing'))){
		return redirect('/gwc/product')->with('message-success','A new record is added successfully');
		}else{
        return redirect('/gwc/product/'.$product->id.'/options')->with('message-success','A new record is added successfully');
		}
		
		
		}catch (\Exception $e) {
	    return redirect()->back()->with('message-error',$e->getMessage());	
	     }
	}
	
	//view gallery form
	public function productGallery($id){
	$editproduct = Product::find($id);
	$listGalleries = ProductGallery::where('product_id',$id)->get();
    return view('gwc.product.edit',compact('editproduct','listGalleries'));
	}
	//upload multiple images
	public function productGalleryUpdalod(Request $request,$id){
	 
	   try{
	   
		$settingInfo = Settings::where("keyname","setting")->first();
		//edit gallery
		$listGalleries = ProductGallery::where('product_id',$id)->get();
		if(!empty($listGalleries) && count($listGalleries)>0){
		foreach($listGalleries as $gallery){
		$galleryImg = ProductGallery::where('id',$gallery->id)->first();
		$galleryImg->title_en = $request->input('atitle_en_'.$gallery->id);
		$galleryImg->title_ar = $request->input('atitle_ar_'.$gallery->id);
		$galleryImg->display_order = $request->input('display_order_'.$gallery->id);
		$galleryImg->save();
		}
		}
		//end

		if(!empty($settingInfo->image_thumb_w) && !empty($settingInfo->image_thumb_h)){
		$image_thumb_w = $settingInfo->image_thumb_w;
		$image_thumb_h = $settingInfo->image_thumb_h;
		}else{
		$image_thumb_w = 280;
		$image_thumb_h = 280;
		}
		
		if(!empty($settingInfo->image_big_w) && !empty($settingInfo->image_big_h)){
		$image_big_w = $settingInfo->image_big_w;
		$image_big_h = $settingInfo->image_big_h;
		}else{
		$image_big_w = 990;
		$image_big_h = 990;
		}
		
		
	 if(!empty($id) && !empty($request->file('attach')) && count($request->file('attach'))>0)
         {
            
			$i=0;
			foreach($request->file('attach') as $key=>$file)
            {
			    $title_en = $request->attach[$key]['atitle_en'];
				$title_ar = $request->attach[$key]['atitle_ar'];
				
				if($file['attach_file']){
			    $filerec= new ProductGallery;
                $imageName=$key.'-'.md5(time()).'.'.$file['attach_file']->getClientOriginalExtension();
                $file['attach_file']->move(public_path('uploads/product/original/'),$imageName); 
				//upload images
				// open file a image resource
				$imgbig = Image::make(public_path('uploads/product/original/'.$imageName));
				//resize image
				$imgbig->resize($image_big_w,$image_big_h,function($constraint){
		        $constraint->aspectRatio();
		        });//Fixed w,h
				if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
				// insert watermark at bottom-right corner with 10px offset
				$imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
				}
				// save to imgbig thumb
				$imgbig->save(public_path('uploads/product/'.$imageName));
				
				//create thumb
				// open file a image resource
				$img = Image::make(public_path('uploads/product/original/'.$imageName));
				//resize image
				$img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
				// save to thumb
				$img->save(public_path('uploads/product/thumb/'.$imageName));
				//end upload images 
				$filerec->product_id= $id;
				$filerec->image     = $imageName;
				$filerec->title_en  = $title_en;
				$filerec->title_ar  = $title_ar;
				$filerec->save(); 
				$i++;
				}
            }
				 	
         }
		 
		if(!empty($request->input('redirect_to_listing'))){
		return redirect('/gwc/product')->with('message-success','Gallery images are updated');
		}else{ 
		return redirect('/gwc/product/'.$id.'/seo-tags');
		}
		
		}catch (\Exception $e) {
	    return redirect()->back()->with('message-error',$e->getMessage());	
	     }	 
	}
	
	
	public function upload(Request $request,$id)
    {
	
	 $image_thumb_w = 280;
	 $image_thumb_h = 280;
		
	 $image_big_w = 990;
	 $image_big_h = 990;
     $image_code = '';
	 $imageName  = '';
	 $title_en   = $request->title_en;
	 $title_ar   = $request->title_ar;
	 $category   = $request->category;
	 $addedon    = $request->addedon;
     $images     = $request->file('file');
	 if(!empty($images)){
     foreach($images as $key=>$image)
     {
		$imageName='';
		$gallery = new ProductGallery;  
		$imageName = $key.'g-'.md5(time()).'.'.$image->getClientOriginalExtension();
		$image->move(public_path('uploads/product'), $imageName);
		// open file a image resource
		$imgbig = Image::make(public_path('uploads/product/'.$imageName));
		//resize image
		$imgbig->resize($image_big_w,$image_big_h,function($constraint){$constraint->aspectRatio();});//Fixed w,h
		// save to imgbig thumb
		$imgbig->save(public_path('uploads/product/'.$imageName));
		//create thumb
		// open file a image resource
		$img = Image::make(public_path('uploads/product/'.$imageName));
		//resize image
		$img->resize($image_thumb_w,$image_thumb_h,function($constraint){$constraint->aspectRatio();});//Fixed w,h
		// save to thumb
		$img->save(public_path('uploads/product/thumb/'.$imageName));
		
		$gallery->image       = $imageName;
		$gallery->title_en    = $title_en;
		$gallery->title_ar    = $title_ar;
		$gallery->product_id  = $id;
		$gallery->is_active   = 1;
		$gallery->save();
     $image_code .= '<div class="col-md-3" style="margin-bottom:24px;"><img src="'.url('uploads/product/thumb/'.$imageName).'" class="img-thumbnail" /></div>';
     }
     
	 
	    if(!empty($request->input('redirect_to_listing'))){
		$redirect =  url('/gwc/product');
		}else{ 
		$redirect =  url('/gwc/product/'.$id.'/seo-tags');
		}
		
		
     $output = array(
      'success'  => 'Images are uploaded successfully',
      'image'    => $image_code,
	  'redirect' => $redirect
     );

     return response()->json($output);
	 }else{
	 
	 if(!empty($request->input('redirect_to_listing'))){
	 $redirect =  url('/gwc/product');
	 }else{ 
	 $redirect =  url('/gwc/product/'.$id.'/seo-tags');
	 }
	 $output = array(
      'success'  => 1,
      'image'    => '',
	  'redirect' => $redirect
     );

     return response()->json($output);
	 }
    }
	
	
	 
	///delete gallery images
	public function deleteGalleryImage($product_id,$id){
	
	   $attachimg = ProductGallery::where('id',$id)->where('product_id',$product_id)->first();
	   $productInfo = Product::where('id',$product_id)->first();
		//delete image from folder
		if(!empty($attachimg->file_name)){
		$web_image_path = "/uploads/product/".$attachimg->file_name;
		$web_image_thumb_path = "/uploads/product/thumb/".$attachimg->file_name;
		$web_image_origin_path = "/uploads/product/original/".$attachimg->file_name;
		if(File::exists(public_path($web_image_path))){
		   File::delete(public_path($web_image_path));
		   File::delete(public_path($web_image_thumb_path));
		   File::delete(public_path($web_image_origin_path));
		 }
		}
		
		//save logs
		$key_name   = "product-gallery";
		$key_id     = $attachimg->id;
		$message    = "Gallery image is removed for (".$productInfo->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		$attachimg->delete();

		return redirect()->back()->with('message-success','Image is deleted successfully');
		
		
	} 
	 
	 //update gallery title
	 public function updateProductGalleryAjax(Request $request){
	
	 $filerec = ProductGallery::find($request->id);
	 $filerec->title_en  = $request->title_en;
	 $filerec->title_ar  = $request->title_ar;
	 $filerec->display_order  = $request->display_order;
	 
	 $filerec->save();
				
	return ['status'=>200,'message'=>'Information is updated successfully'];
	}
	 
	 //view attribuet form
	 public function productOptions($id){
	 
	 $editproduct    = Product::find($id);
	 $listAttributes = ProductAttribute::where('product_id',$id)->get();
	 //list color
	 $listColors     = Color::where('is_active',1)->orderBy('display_order','ASC')->get();
	 //list size
	 $listSizes     = Size::where('is_active',1)->orderBy('display_order','ASC')->get();
	 //get custom option
	 $customOptionsLists  = ProductOptionsCustom::where('is_active',1)->orderBy('display_order','ASC')->get();
	 //get chosen options
	 $chosenCustomOptions = DB::table('gwc_products_option_custom_chosen')
	->select('gwc_products_option_custom.id as option_id','gwc_products_option_custom.*')
	->join('gwc_products_option_custom','gwc_products_option_custom.id','=','gwc_products_option_custom_chosen.custom_option_id')
	->where('gwc_products_option_custom_chosen.product_id',$id)
	->get();
	 
     return view('gwc.product.edit',compact(
	 'editproduct',
	 'listAttributes',
	 'listColors',
	 'listSizes',
	 'customOptionsLists',
	 'chosenCustomOptions'
	 ));
	 }
	 
	 //delete option if attribute set to no
	 public static function deleteOptionsForItems($customoptionid,$productid){
	    $customOptionChosens = ProductOptions::where("product_id",$productid)->where("custom_option_id",$customoptionid)->get();	 
		 if(!empty($customOptionChosens) && count($customOptionChosens)>0){
		 foreach($customOptionChosens as $customOptionChosen){
		 $parentOption = ProductOptions::where("id",$customOptionChosen->id)->first();
		 $parentOption->delete();
		 }
		 }
	 }
	 //delete attribute if attribute set to no
	 public static function deleteAttributeForItems($customoptionid,$productid){
	    $customOptionChosens = ProductAttribute::where("product_id",$productid)->where("custom_option_id",$customoptionid)->get();	 
		 if(!empty($customOptionChosens) && count($customOptionChosens)>0){
		 foreach($customOptionChosens as $customOptionChosen){
		 $parentOption = ProductAttribute::where("id",$customOptionChosen->id)->first();
		 $parentOption->delete();
		 }
		 }
	 }
	
	 //upload options
	 public function productAttributeUpdate(Request $request,$id){
	 try{
		 $settingInfo = Settings::where("keyname","setting")->first();
		 $i=1;
		
		 if(empty($request->is_attribute)){
		 $product = Product::where("id",$id)->first();	 
		 $product->is_attribute = 0;
		 if(!empty($product->old_price)){
		 $product->is_offer=1;
		 }else{
		 $product->is_offer=0;
		 }
		 $product->quantity     = !empty($request->input('squantity'))?$request->input('squantity'):'0';
		 $product->save();
		 //delete options if  exist
		 $customOptionChosens = ProductOptionsCustomChosen::where("product_id",$id)->get();	 
		 if(!empty($customOptionChosens) && count($customOptionChosens)>0){
		 foreach($customOptionChosens as $customOptionChosen){
		 $parentOption = ProductOptionsCustomChosen::where("id",$customOptionChosen->id)->first();
		 self::deleteOptionsForItems($customOptionChosen->custom_option_id,$customOptionChosen->product_id);
		 self::deleteAttributeForItems($customOptionChosen->custom_option_id,$customOptionChosen->product_id);
		 $parentOption->delete();
		 }
		 }
		 
		 }else{ // if attribute available
		
		 //check custom option is exist or not
		 $customOptionChosens = ProductOptionsCustomChosen::where("product_id",$id)->get();	 
		 if(!empty($customOptionChosens) && count($customOptionChosens)>0){
		 foreach($customOptionChosens as $customOptionChosen){
		 //update required status
		 $parentOption = ProductOptionsCustomChosen::where("id",$customOptionChosen->id)->first();
		 $parentOption->is_required = !empty($request->input('is_option_required'.$customOptionChosen->custom_option_id))?$request->input('is_option_required'.$customOptionChosen->custom_option_id):'0';
		 $parentOption->save();
		 //
		 if($customOptionChosen->custom_option_id<=3){
		 self::updateSizeColorCustomOption($request->attach[$customOptionChosen->custom_option_id],$customOptionChosen->custom_option_id,$id);
		 }else{
		 self::updateOtherCustomOption($request->attach[$customOptionChosen->custom_option_id],$customOptionChosen->custom_option_id,$id);
		 }//end other option
		 
		 }//end froeach	 
		 
		 
		 }else{
		 return redirect('/gwc/product/'.$id.'/options')->with('message-error','Please add at least one option');
		 }
			
		 }
	   
	    //update quantity from option
		self::updateBasicQuantity($id);
		//end
		//send email/sms notification if qty is added
		
		//self::sendQtyUpdateNotification($id);
		
	    if(!empty($request->input('redirect_to_listing'))){
		return redirect('/gwc/product')->with('message-success','Options are updated successfully');
		}else{
		return redirect('/gwc/product/'.$id.'/categories'); 
		}
		
		}catch (\Exception $e) {
	    return redirect()->back()->with('message-error',$e->getMessage());	
	     }
	}
	
	//get child custom option
	
	public static function getOptionValueNames($optionid){
	$chuildOptionLists = ProductOptionsCustomChild::where('custom_option_id',$optionid)->get();
	return $chuildOptionLists;
	}
	
	///other custom options
	public static function updateOtherCustomOption($attach,$optionid,$product_id){
	
	if(!empty($product_id) && !empty($attach) && count($attach)>=0)
         {
           
			$i=0;$m=0;$quantity=0;$retail_price=0;$old_price=0;$is_qty_deduct=0;$sku_no='';$weight=0;
			foreach($attach as $key=>$file)
            {
			    
				//edit the existing
			
				if(!empty($attach[$key]['hiddencustomattrid'])){
			
				$filerec = ProductOptions::where('id',$attach[$key]['hiddencustomattrid'])->where('custom_option_id',$optionid)->first();
				
				$quantity          = !empty($attach[$key]['quantity'])?$attach[$key]['quantity']:'0';
				$retail_price      = !empty($attach[$key]['retail_price'])?$attach[$key]['retail_price']:'0';
				$is_price_add      = !empty($attach[$key]['is_price_add'])?$attach[$key]['is_price_add']:'0';
				$is_deduct         = !empty($attach[$key]['is_deduct'])?$attach[$key]['is_deduct']:'0';
				$sku_no            = !empty($attach[$key]['sku_no'])?$attach[$key]['sku_no']:'0';
				$weight            = !empty($attach[$key]['weight'])?$attach[$key]['weight']:'0';
				$option_value_name = !empty($attach[$key]['option_value_name'])?$attach[$key]['option_value_name']:'0';
		
			    $filerec->custom_option_id = $optionid;
				$filerec->product_id       = $product_id;
				$filerec->option_value_id  = $option_value_name;
				$filerec->quantity         = $quantity;
				$filerec->retail_price     = $retail_price;
				$filerec->sku_no           = $sku_no;
				$filerec->is_price_add     = $is_price_add;
				$filerec->is_deduct        = $is_deduct;
				$filerec->weight           = $weight;
				$filerec->save(); 
				}else{
				//check color or size is not empty
				
				if(!empty($attach[$key]['option_value_name'])){
				$quantity     = !empty($attach[$key]['quantity'])?$attach[$key]['quantity']:'0';
				$retail_price = !empty($attach[$key]['retail_price'])?$attach[$key]['retail_price']:'0';
				$is_price_add = !empty($attach[$key]['is_price_add'])?$attach[$key]['is_price_add']:'0';
				$is_deduct    = !empty($attach[$key]['is_deduct'])?$attach[$key]['is_deduct']:'0';
				$sku_no       = !empty($attach[$key]['sku_no'])?$attach[$key]['sku_no']:'0';
				$weight       = !empty($attach[$key]['weight'])?$attach[$key]['weight']:'0';
				$option_value_name = !empty($attach[$key]['option_value_name'])?$attach[$key]['option_value_name']:'0';
				
				//end img
				$filerec= new ProductOptions;
			    $filerec->custom_option_id = $optionid;
				$filerec->product_id       = $product_id;
				$filerec->option_value_id  = $option_value_name;
				$filerec->quantity         = $quantity;
				$filerec->retail_price     = $retail_price;
				$filerec->sku_no           = $sku_no;
				$filerec->is_price_add     = $is_price_add;
				$filerec->is_deduct        = $is_deduct;
				$filerec->weight           = $weight;
				$filerec->save(); 
				}
				
				
			  }
            }
				 	
         }
	}
	
	///custom option for size and color
	public static function updateSizeColorCustomOption($attach,$optionid,$product_id){
	
	if(!empty($product_id) && !empty($attach) && count($attach)>=0)
         {
           
			$i=0;$color_id=0;$size_id=0;$m=0;$quantity=0;$retail_price=0;$old_price=0;$is_qty_deduct=0;$sku_no='';$weight=0;
			foreach($attach as $key=>$file)
            {
			    
				//edit the existing
				if(!empty($attach[$key]['hiddencustomattrid'])){
				$editCustomAttrOptions = ProductAttribute::where('id',$attach[$key]['hiddencustomattrid'])->first();
				
				if(!empty($attach[$key]['color'])){
				$color_id = $attach[$key]['color'];
				}
				if(!empty($attach[$key]['size'])){
				$size_id  = $attach[$key]['size'];
				}
				$quantity     = !empty($attach[$key]['quantity'])?$attach[$key]['quantity']:'0';
				$retail_price = !empty($attach[$key]['retail_price'])?$attach[$key]['retail_price']:'0';
				$old_price    = !empty($attach[$key]['old_price'])?$attach[$key]['old_price']:'0';
				
				$is_qty_deduct= !empty($attach[$key]['is_qty_deduct'])?$attach[$key]['is_qty_deduct']:'0';
				$sku_no       = !empty($attach[$key]['sku_no'])?$attach[$key]['sku_no']:'0';
				$weight       = !empty($attach[$key]['weight'])?$attach[$key]['weight']:'0';
				
				//color image
				if(!empty($attach[$key]['color_image'])){
				
				if(!empty($editCustomAttrOptions->color_image)){
				$web_image_paththumb = "/uploads/product/colors/thumb/".$editCustomAttrOptions->color_image;
				$web_image_pathoriginal = "/uploads/product/colors/".$editCustomAttrOptions->color_image;
				if(File::exists(public_path($web_image_pathoriginal))){
				   File::delete(public_path($web_image_paththumb));
				   File::delete(public_path($web_image_pathoriginal));
				 }
				}
	
	
				$imageName='color-'.$key.'-'.md5(time()).'.'.$file['color_image']->getClientOriginalExtension();
                $file['color_image']->move(public_path('uploads/product/colors/'),$imageName); 
				// open file a image resource
				$imgbig = Image::make(public_path('uploads/product/colors/'.$imageName));
				//resize image
				$imgbig->resize(990,990,function($constraint){$constraint->aspectRatio();});//Fixed w,h
				// save to imgbig
				$imgbig->save(public_path('uploads/product/colors/'.$imageName));
				// open file a image resource
				$img = Image::make(public_path('uploads/product/colors/'.$imageName));
				//resize image
				$img->resize(250,250);//Fixed w,h
				// save to thumb
				$img->save(public_path('uploads/product/colors/thumb/'.$imageName));			
				}else{
				$imageName=$editCustomAttrOptions->color_image;
				}
				//end img
			
			    $editCustomAttrOptions->custom_option_id = $optionid;
				$editCustomAttrOptions->product_id       = $product_id;
				$editCustomAttrOptions->color_id         = $color_id;
				$editCustomAttrOptions->size_id          = $size_id;
				$editCustomAttrOptions->color_image      = $imageName;
				$editCustomAttrOptions->quantity         = $quantity;
				$editCustomAttrOptions->retail_price     = $retail_price;
				$editCustomAttrOptions->old_price        = $old_price;
				$editCustomAttrOptions->sku_no           = $sku_no;
				$editCustomAttrOptions->is_qty_deduct    = $is_qty_deduct;
				$editCustomAttrOptions->weight           = $weight;
				$editCustomAttrOptions->save(); 
				
				if(!empty($old_price)){
				$m++;
				}
				
				}else{
				
				//check color or size is not empty
				if(!empty($attach[$key]['color']) || !empty($attach[$key]['size'])){
				
				if(!empty($attach[$key]['color'])){
				$color_id = $attach[$key]['color'];
				}
				if(!empty($attach[$key]['size'])){
				$size_id  = $attach[$key]['size'];
				}
				
				$quantity     = !empty($attach[$key]['quantity'])?$attach[$key]['quantity']:'0';
				$retail_price = !empty($attach[$key]['retail_price'])?$attach[$key]['retail_price']:'0';
				$old_price    = !empty($attach[$key]['old_price'])?$attach[$key]['old_price']:'0';
				
				$is_qty_deduct= !empty($attach[$key]['is_qty_deduct'])?$attach[$key]['is_qty_deduct']:'0';
				$sku_no       = !empty($attach[$key]['sku_no'])?$attach[$key]['sku_no']:'0';
				$weight       = !empty($attach[$key]['weight'])?$attach[$key]['weight']:'0';
				
				//color image
				if(!empty($attach[$key]['color_image'])){
				$imageName='color-'.$key.'-'.md5(time()).'.'.$file['color_image']->getClientOriginalExtension();
                $file['color_image']->move(public_path('uploads/product/colors/'),$imageName); 
				// open file a image resource
				$imgbig = Image::make(public_path('uploads/product/colors/'.$imageName));
				//resize image
				$imgbig->resize(990,990,function($constraint){$constraint->aspectRatio();});//Fixed w,h
				// save to imgbig
				$imgbig->save(public_path('uploads/product/colors/'.$imageName));
				// open file a image resource
				$img = Image::make(public_path('uploads/product/colors/'.$imageName));
				//resize image
				$img->resize(250,250);//Fixed w,h
				// save to thumb
				$img->save(public_path('uploads/product/colors/thumb/'.$imageName));			
				}else{
				$imageName='';
				}
				//end img
				$filerec= new ProductAttribute;
			    $filerec->custom_option_id = $optionid;
				$filerec->product_id       = $product_id;
				$filerec->color_id         = $color_id;
				$filerec->size_id          = $size_id;
				$filerec->color_image      = $imageName;
				$filerec->quantity         = $quantity;
				$filerec->retail_price     = $retail_price;
				$filerec->old_price        = $old_price;
				$filerec->sku_no           = $sku_no;
				$filerec->is_qty_deduct    = $is_qty_deduct;
				$filerec->weight           = $weight;
				$filerec->save(); 
				
				if(!empty($old_price)){
				$m++;
				}
				$i++;
				}
			  }
            }
				 	
         }
		 //update quantity
		 $product = Product::find($product_id);	 
	     $product->is_attribute = 1;
	     $product->quantity     = 0;
		 if(!empty($o) || !empty($m)){
		 $product->is_offer=1;
		 }else{
		 $product->is_offer=0;
		 }
	     $product->save();
		 
	}
	
	//get list fo custom option of size color for editing
	 public static function getChosenCustomSizeColors($product_id,$option_id){
	 $filerec = ProductAttribute::where('custom_option_id',$option_id)->where('product_id',$product_id)->get();
	 return $filerec;
	 }
	//delete attribute
	///delete gallery images
	public function deleteAttribute(Request $request){
	
	   if(empty($request->optionChildId)){
	   return ['status'=>400,'message'=>'Invalid ID']; 
	   }
	   
	   $attachiInfo = ProductAttribute::where('id',$request->optionChildId)->first();
	   if(empty($attachiInfo->id)){
	   return ['status'=>400,'message'=>'Invalid Information']; 
	   }
	   $productInfo = Product::where('id',$attachiInfo->product_id)->first();
			
		if(!empty($attachiInfo->color_image)){
		$web_image_path = "/uploads/product/colors/".$attachiInfo->color_image;
		$web_image_paththumb = "/uploads/product/colors/thumb/".$attachiInfo->color_image;
		if(File::exists(public_path($web_image_path))){
		   File::delete(public_path($web_image_path));
		   File::delete(public_path($web_image_paththumb));
		 }
		}	
		//save logs
		$key_name   = "product-attribute";
		$key_id     = $productInfo->id;
		$message    = "An attribute is removed for (".$productInfo->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		$attachiInfo->delete();
		return ['status'=>200,'message'=>'Record is removed successfully']; 
	} 
	
	//seo - tags
	public function productseotags($id){
    $editproduct = Product::find($id);
	$tags_en_js = self::availableTags("en");
    $tags_ar_js = self::availableTags("ar");
    return view('gwc.product.edit',compact('editproduct','tags_en_js','tags_ar_js'));
	}
	
	
	
	//get previous tags
	public static function availableTags($strLang){
	$tags_en_array_unique = [];
	if($strLang=="en"){
	$productTags = Product::where('tags_en','!=','')->get();
	if(!empty($productTags) && count($productTags)>0){
	 $tags_en='';
	 foreach($productTags as $productTag){
	  if(!empty($productTag->tags_en)){
	   $tags_en.=$productTag->tags_en.",";
	  }
	 }
	 $tags_ens = trim($tags_en,",");
	 $tags_en_array = explode(",",$tags_ens);
	 $tags_en_array_unique = array_values(array_unique($tags_en_array));
	}
	return $tags_en_array_unique;
	}else{
	$productTags = Product::where('tags_ar','!=','')->get();
	if(!empty($productTags) && count($productTags)>0){
	 $tags_en='';
	 foreach($productTags as $productTag){
	  if(!empty($productTag->tags_en)){
	   $tags_en.=$productTag->tags_en.",";
	  }
	 }
	 $tags_ens = trim($tags_en,",");
	 $tags_en_array = explode(",",$tags_ens);
	 $tags_en_array_unique = array_values(array_unique($tags_en_array));
	}
	return $tags_en_array_unique;
	}
	}
	
	
	///////////////////////////////////////////save seo - tags//////////////////////////////////////////////////////////////////////
	public function productseotagsSave(Request $request,$id){
	$this->validate($request, [
			'seokeywords_en'     => 'nullable|min:3|max:900|string',
			'seokeywords_ar'     => 'nullable|min:3|max:900|string',
			'seodescription_en'  => 'nullable|string|min:3|max:900',
			'seodescription_ar'  => 'nullable|string|min:3|max:900',
        ]);
		
	try{
	
	   
		$product = Product::find($id);
		$product->seokeywords_en      = $request->input('seokeywords_en');
		$product->seokeywords_ar      = $request->input('seokeywords_ar');
		$product->seodescription_en   = $request->input('seodescription_en');
		$product->seodescription_ar   = $request->input('seodescription_ar');
		$product->tags_en   = $this->buildtags($request->input('tags_en'));
		$product->tags_ar   = $this->buildtags($request->input('tags_ar'));
		$product->save();
		if(!empty($request->input('redirect_to_listing'))){
		return redirect('/gwc/product')->with('message-success','Information are updated successfully');
		}else{ 
		return redirect('/gwc/product/'.$id.'/finish');
		}
		
	}catch (\Exception $e) {
	    return redirect()->back()->with('message-error',$e->getMessage());	
	     }
		 	
	}
	//strip extra values from tags
	public function buildtags($tags){
	$findstr=array('[',']','{','}','"',':','value');
	$tags = str_replace($findstr,"",$tags);
	return $tags;
	}
	
	
	//view product categories
	public function productCategory($id){
	$Categories     = Categories::where('parent_id',0)->orderBy('display_order','desc')->get();
	$listCategories = ProductCategory::where('product_id',$id)->orderBy('category_id','asc')->get();
	$editproduct    = Product::find($id);
    return view('gwc.product.edit',compact('editproduct','listCategories','Categories'));
	}
	
	///////////////////////////////////////////////save product categories/////////////////////////////////////////////////
	public function productCategoryUpdate(Request $request,$id){
	try{
	
	$i=1;
	 		
	 $settingInfo = Settings::where("keyname","setting")->first();
	 //edit existing categories
	 $listCategories = ProductCategory::where('product_id',$id)->get();
	 if(!empty($listCategories) && count($listCategories)>0){
	  foreach($listCategories as $listCategory){
	   $catgoryedit = ProductCategory::where('id',$listCategory->id)->first();
	   if(!empty($request->input('category-'.$listCategory->id))){
	   $catgoryedit->category_id = $request->input('category-'.$listCategory->id);
	   $catgoryedit->save();
	   }
	  }
	 }
	 //end	
	 if(!empty($id) && !empty($request->attach) && count($request->attach)>0)
         {
           
			$i=0;$j=0;$txt='';
			foreach($request->attach as $key=>$file)
            {   
			    if(!empty($file['category'])){
			    $category = $request->attach[$key]['category'];
			    if(!empty($category)){
				if($this->isCategoryExist($id,$category)){
				$j++;
				}else{
				$filerec= new ProductCategory;
				$filerec->product_id    = $id;
				$filerec->category_id   = $category;
				$filerec->save(); 
				//update upper tree cat
				self::updateUpperCateory($id,$category);
				$i++;
				}
				}
				}
				
            }
			 if(!empty($j)){ $txt=' '.$j.' is already exist.';}	 	
         }
		 
	   if(!empty($request->input('redirect_to_listing'))){
		return redirect('/gwc/product')->with('message-success','Categories are updated successfully('.$txt.')');
		}else{
		return redirect('/gwc/product/'.$id.'/gallery');
		}
		
		}catch (\Exception $e) {
	    return redirect()->back()->with('message-error',$e->getMessage());	
	     }
	}
	
	public static function updateUpperCateory($id,$category){

	$upperCategory = Categories::where("id",$category)->first();
	if(!empty($upperCategory->parent_id)){
	    $upperParentCategory = Categories::where("id",$upperCategory->parent_id)->first();
	    if(empty(self::isCategoryExists($id,$upperParentCategory->id))){
	            $filerec= new ProductCategory;
				$filerec->product_id    = $id;
				$filerec->category_id   = $upperParentCategory->id;
				$filerec->save(); 
				//
				if(!empty($upperParentCategory->id)){
				self::updateUpperCateory($id,$upperParentCategory->id);
				}
	    }
	 }	
	}
	//check category exist or not for an item
	public function isCategoryExist($product_id,$category_id){
	$filerec= ProductCategory::where('product_id',$product_id)->where('category_id',$category_id)->first();
	if(!empty($filerec->id)){
	return 1;
	}else{
	return 0;
	}
	}
	
	public static function isCategoryExists($product_id,$category_id){
	$filerec= ProductCategory::where('product_id',$product_id)->where('category_id',$category_id)->first();
	if(!empty($filerec->id)){
	return 1;
	}else{
	return 0;
	}
	}
	
	//delete product chosen category
	public function deleteProdcategory($product_id,$id){
	
	   $attachimg = ProductCategory::where('id',$id)->where('product_id',$product_id)->first();
	   $productInfo = Product::where('id',$product_id)->first();
			
		//save logs
		$key_name   = "product-category";
		$key_id     = $attachimg->id;
		$message    = "A category is removed for (".$productInfo->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		$attachimg->delete();

		return redirect()->back()->with('message-success','Category is deleted successfully');
		
		
	} 
	
	
	//update chosen category
	 public function updateProductCategoryAjax($id,$category){
	 
	 $filerec = ProductCategory::find($id);
	 $filerec->category_id = $category;
	 $filerec->save();
	 
	    $productInfo = Product::where('id',$filerec->product_id)->first();
		$catInfo     = Categories::where('id',$filerec->category_id)->first();
	    //save logs
		$key_name   = "product-category";
		$key_id     = $filerec->id;
		$message    = "A product category is changed for (".$productInfo->title_en.") to (".$catInfo->name_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
				
	return ['status'=>200,'message'=>'Information is updated successfully'];
	}
	
	 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $editproduct = Product::find($id);
        return view('gwc.product.edit',compact('editproduct'));
    }
	
	
	 /**
     * Show the details of the product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
		$productDetails = Product::find($id);
        return view('gwc.product.view',compact('productDetails'));
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
	
	//field validation  
	   $this->validate($request, [
	        'item_code'    => 'required|min:3|max:190|string|unique:gwc_products,item_code,'.$id,
			'title_en'     => 'required|min:3|max:190|string',
			'title_ar'     => 'required|min:3|max:190|string',
			'slug'         => 'nullable|max:190|string|unique:gwc_products,slug,'.$id,
			'details_en'   => 'required|string|min:3',
			'details_ar'   => 'required|string|min:3',
			'retail_price' => 'required|string|min:1',
			'image'        => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
			'rollover_image'=> 'mimes:jpeg,png,jpg,gif,svg|max:2048',
			'attachfile'   => "nullable|mimetypes:application/pdf|max:10000"
        ]);
		
		
	  try{
	  
	    $settingInfo = Settings::where("keyname","setting")->first();
	    if(!empty($settingInfo->image_thumb_w) && !empty($settingInfo->image_thumb_h)){
		$image_thumb_w = $settingInfo->image_thumb_w;
		$image_thumb_h = $settingInfo->image_thumb_h;
		}else{
		$image_thumb_w = 280;
		$image_thumb_h = 280;
		}
		
		if(!empty($settingInfo->image_big_w) && !empty($settingInfo->image_big_h)){
		$image_big_w = $settingInfo->image_big_w;
		$image_big_h = $settingInfo->image_big_h;
		}else{
		$image_big_w = 990;
		$image_big_h = 990;
		}
		
	 
		
	$product = Product::find($id);
	$imageName='';
	//upload image
	if($request->hasfile('image')){
	//delete image from folder
	if(!empty($product->image)){
	$web_image_path = "/uploads/product/".$product->image;
	$web_image_paththumb = "/uploads/product/thumb/".$product->image;
	$web_image_pathoriginal = "/uploads/product/original/".$product->image;
	if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	   File::delete(public_path($web_image_paththumb));
	   File::delete(public_path($web_image_pathoriginal));
	 }
	}
	//
	$imageName = 'p-'.md5(time()).'.'.$request->image->getClientOriginalExtension();
	
	//$request->image->move(public_path('uploads/product'), $imageName);
	$request->image->move(public_path('uploads/product/original'), $imageName);
	//create thumb
	// open file a image resource
    $imgbig = Image::make(public_path('uploads/product/original/'.$imageName));
	//resize image
	$imgbig->resize($image_big_w,$image_big_h,function($constraint){
		$constraint->aspectRatio();
		});//Fixed w,h
	
	if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
	// insert watermark at bottom-right corner with 10px offset
    $imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
	}
	// save to imgbig thumb
	$imgbig->save(public_path('uploads/product/'.$imageName));
	
	//create thumb
	// open file a image resource
    $img = Image::make(public_path('uploads/product/original/'.$imageName));
	//resize image
	$img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
	// save to thumb
	$img->save(public_path('uploads/product/thumb/'.$imageName));
	
	}else{
	$imageName = $product->image;
	}
	
	///
	$imageName_roll='';
	//upload image
	if($request->hasfile('rollover_image')){
	//delete image from folder
	if(!empty($product->rollover_image)){
	$web_image_path = "/uploads/product/".$product->rollover_image;
	$web_image_paththumb = "/uploads/product/thumb/".$product->rollover_image;
	$web_image_pathoriginal = "/uploads/product/original/".$product->rollover_image;
	if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	   File::delete(public_path($web_image_paththumb));
	   File::delete(public_path($web_image_pathoriginal));
	 }
	}
	//
	$imageName_roll = 'rollover-'.md5(time()).'.'.$request->rollover_image->getClientOriginalExtension();
	$request->rollover_image->move(public_path('uploads/product/original'), $imageName_roll);
	//$request->rollover_image->move(public_path('uploads/product'), $imageName_roll);
	//create thumb
	// open file a image resource
    $imgbig = Image::make(public_path('uploads/product/original/'.$imageName_roll));
	//resize image
	$imgbig->resize($image_big_w,$image_big_h,function($constraint){
		$constraint->aspectRatio();
		});//Fixed w,h
	
	if($settingInfo->is_watermark==1 && !empty($settingInfo->watermark_img)){
	// insert watermark at bottom-right corner with 10px offset
    $imgbig->insert(public_path('uploads/logo/'.$settingInfo->watermark_img), 'bottom-right', 10, 10);
	}
	// save to imgbig thumb
	$imgbig->save(public_path('uploads/product/'.$imageName_roll));
	
	//create thumb
	// open file a image resource
    $img = Image::make(public_path('uploads/product/original/'.$imageName_roll));
	//resize image
	$img->resize($image_thumb_w,$image_thumb_h);//Fixed w,h
	// save to thumb
	$img->save(public_path('uploads/product/thumb/'.$imageName_roll));
	
	}else{
	$imageName_roll = $product->rollover_image;
	}
	
	if($request->hasfile('attachfile')){
	//delete image from folder
	if(!empty($product->attachfile)){
	$web_image_path = "/uploads/product/".$product->attachfile;
	if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	 }
	}
	//
	$attachfileName = 'attach-'.md5(time()).'.'.$request->attachfile->getClientOriginalExtension();
	$request->attachfile->move(public_path('uploads/product'), $attachfileName);
	}else{
	$attachfileName = $product->attachfile;
	}
	//slug
	    if(!empty($request->slug)){
		$product->slug=$request->slug;
		}else{
		$slug = new ProductSlug;
		$product->slug=$slug->createSlug($request->title_en,$id);
		}
		
		$product->warranty      = $request->input('warranty');
		$product->item_code     = $request->input('item_code');
		$product->sku_no        = $request->input('sku_no');
		$product->title_en      = $request->input('title_en');
		$product->title_ar      = $request->input('title_ar');
		$product->extra_title_en = $request->input('extra_title_en');
		$product->extra_title_ar = $request->input('extra_title_ar');
		$product->details_en    = $request->input('details_en');
		$product->details_ar    = $request->input('details_ar');
		$product->sdetails_en   = $request->input('sdetails_en');
		$product->sdetails_ar   = $request->input('sdetails_ar');
		$product->retail_price  = $request->input('retail_price');
		$product->old_price     = $request->input('old_price');
		$product->cost_price      = $request->input('cost_price');
		$product->wholesale_price = $request->input('wholesale_price');
		$product->weight          = $request->input('weight');
		if(!empty($request->input('old_price'))){
		$product->is_offer=1;
		}else{
		$product->is_offer=0;
		}
		$product->display_order = !empty($request->input('display_order'))?$request->input('display_order'):'0';
		$product->image         = $imageName;
		$product->rollover_image= $imageName_roll;
		$product->attachfile    = $attachfileName;
		
		$product->save();
		
		//generate QR 
		$qrtext = $product->id.'-'.$product->item_code;
		self::QrCodes($qrtext,$product->item_code);
		
		//save logs
		$key_name   = "product";
		$key_id     = $product->id;
		$message    = "Product details has edited. (".$product->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		if(!empty($request->input('redirect_to_listing'))){
		return redirect('/gwc/product')->with('message-success','Record is updated successfully');
		}else{
	    return redirect('/gwc/product/'.$product->id.'/options')->with('message-success','Information is updated successfully');
		}
		
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
	$product = Product::find($id);
	//delete image from folder
	if(!empty($product->image)){
	$web_image_path = "/uploads/product/".$product->image;
	$web_image_paththumb = "/uploads/product/thumb/".$product->image;
	$web_image_pathorigin = "/uploads/product/original/".$product->image;
	if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	   File::delete(public_path($web_image_paththumb));
	   File::delete(public_path($web_image_pathorigin));
	 }
	}
	
	$product->image='';
	$product->save();
	
	   //save logs
		$key_name   = "product";
		$key_id     = $product->id;
		$message    = "Image is removed. (".$product->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
	return redirect()->back()->with('message-success','Image is deleted successfully');	
	}
	
	public function deleteRolloverImage($id){
	$product = Product::find($id);
	//delete image from folder
	if(!empty($product->rollover_image)){
	$web_image_path = "/uploads/product/".$product->rollover_image;
	$web_image_paththumb = "/uploads/product/thumb/".$product->rollover_image;
	$web_image_pathorigin = "/uploads/product/original/".$product->rollover_image;
	if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	   File::delete(public_path($web_image_paththumb));
	   File::delete(public_path($web_image_pathorigin));
	 }
	}
	
	$product->rollover_image='';
	$product->save();
	
	   //save logs
		$key_name   = "product";
		$key_id     = $product->id;
		$message    = "Rollover Image is removed. (".$product->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
	return redirect()->back()->with('message-success','Image is deleted successfully');	
	}
	
	/**
     * Delete product along with childs via ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function destroy($id){
	 //check param ID
	 if(empty($id)){
	 return redirect('/gwc/product')->with('message-error','Param ID is missing'); 
	 }
	 //get cat info
	 $product = Product::find($id);
	 //check cat id exist or not
	 if(empty($product->id)){
	 return redirect('/gwc/product')->with('message-error','No record found'); 
	 }

	 //delete parent cat mage
	 if(!empty($product->image)){
	 $web_image_path = "/uploads/product/".$product->image;
	 $web_image_paththumb = "/uploads/product/thumb/".$product->image;
	 $web_image_pathorigin = "/uploads/product/original/".$product->image;
	 if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	   File::delete(public_path($web_image_paththumb));
	   File::delete(public_path($web_image_pathorigin));
	  }
	 }
	 
	 //delete rollover
	 if(!empty($product->rollover_image)){
	 $web_image_path = "/uploads/product/".$product->rollover_image;
	 $web_image_paththumb = "/uploads/product/thumb/".$product->rollover_image;
	 $web_image_pathorigin = "/uploads/product/original/".$product->rollover_image;
	 if(File::exists(public_path($web_image_path))){
	   File::delete(public_path($web_image_path));
	   File::delete(public_path($web_image_paththumb));
	   File::delete(public_path($web_image_pathorigin));
	  }
	 }
	    //save logs
		$key_name   = "product";
		$key_id     = $product->id;
		$message    = "An item is removed. (".$product->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
	 //remove gallery
	 $this->removeMultipleImages($product->id);
	 //remove attributes
	 $this->removeChosenAttributes($product->id);
	 //remove chosen categories
	 $this->removeChosenCategories($product->id);
	 
	 $product->delete();
	 return redirect()->back()->with('message-success','product is deleted successfully');	
	 }
	 
	 
	 /**
     * Delete reviews along with childs via ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function destroyReviews($id){
	 //check param ID
	 if(empty($id)){
	 return redirect()->back()->with('message-error','Param ID is missing'); 
	 }
	 //get cat info
	 $reviews = ProductReview::find($id);
	 //check cat id exist or not
	 if(empty($reviews->id)){
	 return redirect()->back()->with('message-error','No record found'); 
	 }

	    //save logs
		$key_name   = "productreviews";
		$key_id     = $reviews->id;
		$message    = "An review is removed. (".$reviews->message.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
	 
	 
	 $reviews->delete();
	 return redirect()->back()->with('message-success','Review is deleted successfully');	
	 }
	 
	 
	 //delete inquiry
	 
	  public function destroyInquiry($id){
	 //check param ID
	 if(empty($id)){
	 return redirect()->back()->with('message-error','Param ID is missing'); 
	 }
	 //get cat info
	 $reviews = ProductInquiry::find($id);
	 //check cat id exist or not
	 if(empty($reviews->id)){
	 return redirect()->back()->with('message-error','No record found'); 
	 }

	    //save logs
		$key_name   = "productinquiry";
		$key_id     = $reviews->id;
		$message    = "An inquiry is removed. (".$reviews->message.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
	 
	 
	 $reviews->delete();
	 return redirect()->back()->with('message-success','Record is deleted successfully');	
	 }
	 
	//removed multiple gallery images
	public function removeMultipleImages($product_id){
	    $attachimgs = ProductGallery::where('product_id',$product_id)->get();
		if(!empty($attachimgs) && count($attachimgs)>0){
		foreach($attachimgs as $attachimg){	
		$attachimgsingle = ProductGallery::find($attachimg->id);
		//delete image from folder
		if(!empty($attachimgsingle->file_name)){
		$web_image_path = "/uploads/product/".$attachimgsingle->file_name;
		$web_image_thumb_path = "/uploads/product/thumb/".$attachimgsingle->file_name;
		$web_image_origin_path = "/uploads/product/original/".$attachimgsingle->file_name;
		   if(File::exists(public_path($web_image_path))){
		   File::delete(public_path($web_image_path));
		   File::delete(public_path($web_image_thumb_path));
		   File::delete(public_path($web_image_origin_path));
		   }
		  }	
		  $attachimgsingle->delete();
		 }
		}
	}
	
	//remove chosen attributes
	public function removeChosenAttributes($product_id){
	    $attachimgs = ProductAttribute::where('product_id',$product_id)->get();
		if(!empty($attachimgs) && count($attachimgs)>0){
		foreach($attachimgs as $attachimg){	
		  $attachimgsingle = ProductAttribute::find($attachimg->id);
		  $attachimgsingle->delete();
		 }
		}
	}
	
	//remove chosen attributes
	public function removeChosenCategories($product_id){
	    $attachimgs = ProductCategory::where('product_id',$product_id)->get();
		if(!empty($attachimgs) && count($attachimgs)>0){
		foreach($attachimgs as $attachimg){	
		  $attachimgsingle = ProductCategory::find($attachimg->id);
		  $attachimgsingle->delete();
		 }
		}
	}
	 
		//download pdf
	
	public function downloadPDF(){
	  $product = Product::get();
      $pdf = PDF::loadView('gwc.product.pdf', compact('product'));
      return $pdf->download('product.pdf');
    }
	
    //update status
	public function updateStatusAjax(Request $request)
    {
		$recDetails = Product::where('id',$request->id)->first(); 
		
		if($recDetails->is_active==1){
		$active=0;
		}else{
		$active=1;
		}
		
		
		//save logs
		$key_name   = "product";
		$key_id     = $recDetails->id;
		$message    = "product status is changed to ".$active." (".$recDetails->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
		$recDetails->is_active=$active;
		$recDetails->save();
		return ['status'=>200,'message'=>'Status is modified successfully'];
	} 
	
	public function updateExportStatusAjax(Request $request)
    {
		$recDetails = Product::where('id',$request->id)->first(); 
		if($recDetails->is_export_active==1){
		$active=0;
		}else{
		$active=1;
		}
		
		//save logs
		$key_name   = "product";
		$key_id     = $recDetails->id;
		$message    = "product status is changed to ".$active." (".$recDetails->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
		$recDetails->is_export_active=$active;
		$recDetails->save();
		return ['status'=>200,'message'=>'Status is modified successfully'];
	} 
	
	
	
	//prepare price 
	public static function getPriceFormat($price){
	$settingInfo = Settings::where("keyname","setting")->first();
	if(!empty($settingInfo['base_currency']) && !empty($price)){
	$price  = $settingInfo['base_currency'].' '.$price;
	}
	return $price;
	}
	//finish view
	public function finishView($id){
	$listSections = Section::where('section_type','regular')->OrderBy('display_order','desc')->get();
    $editproduct  = Product::find($id);
	//manufacturers
	$manufacturerLists = Manufacturer::where('is_active',1)->orderBy('title_en', 'ASC')->get();
	//brands
	$brandLists        = Brand::where('is_active',1)->orderBy('title_en', 'ASC')->get();
	
    return view('gwc.product.edit',compact('editproduct','listSections','manufacturerLists','brandLists'));
	}
	//save finish 
	public function finishSave(Request $request,$id){
	$product = Product::find($id);
	$product->is_active = $request->prodstatus;
	$product->min_purchase_qty = !empty($request->input('min_purchase_qty'))?$request->input('min_purchase_qty'):'1';
	$product->max_purchase_qty = !empty($request->input('max_purchase_qty'))?$request->input('max_purchase_qty'):'0';
	$product->alert_min_qty    = !empty($request->input('alert_min_qty'))?$request->input('alert_min_qty'):'0';
	$product->homesection      = !empty($request->input('homesection'))?$request->input('homesection'):'0';
	$product->youtube_url      = !empty($request->input('youtube_url'))?$request->input('youtube_url'):'';
	$product->manufacturer_id  = !empty($request->input('manufacturer'))?$request->input('manufacturer'):'0';
	$product->brand_id         = !empty($request->input('brand'))?$request->input('brand'):'0';
	$product->countdown_datetime= !empty($request->input('countdown_datetime'))?$request->input('countdown_datetime'):'';
	$product->countdown_price  = !empty($request->input('countdown_price'))?$request->input('countdown_price'):'0';
	
	$product->caption_en       = !empty($request->input('caption_en'))?$request->input('caption_en'):'';
	$product->caption_ar       = !empty($request->input('caption_ar'))?$request->input('caption_ar'):'';
	$product->caption_color    = !empty($request->input('caption_color'))?$request->input('caption_color'):'';
	
	if(!empty($request->input('youtube_url'))){
	$product->youtube_url_id   = $this->extractYoutubeId($request->input('youtube_url'));
	}
	
	$product->save();
	return redirect('/gwc/product')->with('message-success','Information is saved successfully');	
	}
	
	//extract id from youtube
	public function extractYoutubeId($url){
	$url_string = parse_url($url, PHP_URL_QUERY);
    parse_str($url_string, $args);
    return isset($args['v']) ? $args['v'] : false;
	}
	//home sections
   public function showSections() //
    {
       
	    $settingInfo = Settings::where("keyname","setting")->first();
        //check search queries
        $SectionLists = Section::orderBy('id', 'DESC')->paginate($settingInfo->item_per_page_back);
		
		$lastOrderInfo = Section::OrderBy('display_order','desc')->first();
		if(!empty($lastOrderInfo->display_order)){
		$lastOrder=($lastOrderInfo->display_order+1);
		}else{
		$lastOrder=1;
		}
       
        return view('gwc.sections.index',['SectionLists' => $SectionLists,'lastOrder' => $lastOrder]);
    }
	
	//save Sections
	 public function saveSection(Request $request){
	 
	  //field validation
	    $this->validate($request, [
			'title_en'     => 'required|min:3|max:190|string|unique:gwc_sections,title_en',
			'title_ar'     => 'required|min:3|max:190|string|unique:gwc_sections,title_ar',
        ]);
		
		
	   try{
	   
	  
		$slug = new SectionSlug;
	    $Sections = new Section;
        $Sections->slug=$slug->createSlug($request->title_en);		
		$Sections->title_en=$request->input('title_en');
		$Sections->title_ar=$request->input('title_ar');
		$Sections->link=$request->input('link');
		$Sections->is_active=!empty($request->input('is_active'))?$request->input('is_active'):'0';
		$Sections->display_order=!empty($request->input('display_order'))?$request->input('display_order'):'0';
		$Sections->save();

        //save logs
		$key_name   = "Sections";
		$key_id     = $Sections->id;
		$message    = "A new Section is added.(".$Sections->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
        return redirect('/gwc/sections')->with('message-success','Section is added successfully');
		}catch (\Exception $e) {
	    return redirect()->back()->with('message-error',$e->getMessage());	
	     }	
	}
	//edit section
	public function saveEditSection(Request $request,$id){
	//field validation
	    $this->validate($request, [
			'title_en'     => 'required|min:3|max:190|string|unique:gwc_sections,title_en,'.$id,
			'title_ar'     => 'required|min:3|max:190|string|unique:gwc_sections,title_ar,'.$id,
        ]);
	 try{
	 
	   
	    $Sections = Section::where('id',$request->id)->first();	
		$slug = new SectionSlug;
        $Sections->slug=$slug->createSlug($request->title_en,$request->id);		
		$Sections->title_en=$request->input('title_en');
		$Sections->title_ar=$request->input('title_ar');
		$Sections->link=$request->input('link');
		$Sections->is_active=!empty($request->input('is_active'))?$request->input('is_active'):'0';
		$Sections->display_order=!empty($request->input('display_order'))?$request->input('display_order'):'0';
		$Sections->save();

        //save logs
		$key_name   = "Sections";
		$key_id     = $Sections->id;
		$message    = "A new Section is added.(".$Sections->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
        return redirect('/gwc/sections')->with('message-success','Information is updated successfully');
		}catch (\Exception $e) {
	    return redirect()->back()->with('message-error',$e->getMessage());	
	     }	
	}
	
	/**
     * Delete services along with childs via ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function destroySections($id){
	 //check param ID
	 if(empty($id)){
	 return redirect('/gwc/sections')->with('message-error','Param ID is missing'); 
	 }
	 //get cat info
	 $Sections = Section::find($id);
	 //check cat id exist or not
	 if(empty($Sections->id)){
	 return redirect('/gwc/sections')->with('message-error','No record found'); 
	 } 
	 
	 //save logs
		$key_name   = "Sections";
		$key_id     = $Sections->id;
		$message    = "A Section is removed.(".$Sections->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
	 //end deleting parent cat image
	 $Sections->delete();
	 return redirect()->back()->with('message-success','Section is deleted successfully');	
	 }
	 
	 //update status
	public function updateStatusSectionAjax(Request $request)
    {
		$recDetails = Section::where('id',$request->id)->first(); 
		if($recDetails['is_active']==1){
			$active=0;
		}else{
			$active=1;
		}
		
		//save logs
		$key_name   = "section";
		$key_id     = $recDetails->id;
		$message    = "Section status is changed to ".$active.".(".$recDetails->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
		$recDetails->is_active=$active;
		$recDetails->save();
		return ['status'=>200,'message'=>'Status is modified successfully'];
	} 
	
	public function updateStatusReviewsAjax(Request $request)
    {
		$recDetails = ProductReview::where('id',$request->id)->first(); 
		if($recDetails['is_active']==1){
			$active=0;
		}else{
			$active=1;
		}
		
		//save logs
		$key_name   = "reviews";
		$key_id     = $recDetails->id;
		$message    = "ProductReview status is changed to ".$active.".(".$recDetails->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
		$recDetails->is_active=$active;
		$recDetails->save();
		return ['status'=>200,'message'=>'Status is modified successfully'];
	} 
	
	
	
	
   //get subject name
   public static function getSubjectName($subjectid){
   $recDetails = Subjects::where('id',$subjectid)->first(); 
   return $recDetails['title_en'];
   }	
   
   //get subject name
   public static function getProductDetails($id){
   $recDetails = Product::where('id',$id)->first(); 
   return $recDetails;
   }
	 
	////////////////product review/////////////////////////
	 public function productReviews(Request $request) //Request $request
    {
       
	    $settingInfo = Settings::where("keyname","setting")->first();
		
        //check search queries
		if(!empty($request->get('q'))){
        $q = $request->get('q');
        }else{
        $q = $request->q;
        }
        
       
        //menus records
        if(!empty($q)){
        $reviewsLists = ProductReview::where('name','LIKE','%'.$q.'%')
		                             ->orwhere('email','LIKE','%'.$q.'%')
									 ->orwhere('message','LIKE','%'.$q.'%')
                                     ->orderBy('created_at', 'DESC')
                                     ->paginate($settingInfo->item_per_page_back);  
        $reviewsLists->appends(['q' => $q]);
		
        }else{
        $reviewsLists = ProductReview::orderBy('id', 'DESC')->paginate($settingInfo->item_per_page_back);
		}
        return view('gwc.product.reviews',compact('reviewsLists'));
    } 
	
	////////////////product Inquiry/////////////////////////
	 public function productInquiry(Request $request)
    {
       
	    $settingInfo = Settings::where("keyname","setting")->first();
		
        //check search queries
		if(!empty($request->get('q'))){
        $q = $request->get('q');
        }else{
        $q = $request->q;
        }
        
       
        //menus records
        if(!empty($q)){
        $inquiryLists = ProductInquiry::where('name','LIKE','%'.$q.'%')
		                             ->orwhere('email','LIKE','%'.$q.'%')
									 ->orwhere('message','LIKE','%'.$q.'%')
                                     ->orderBy('created_at', 'DESC')
                                     ->paginate($settingInfo->item_per_page_back);  
        $inquiryLists->appends(['q' => $q]);
		
        }else{
        $inquiryLists = ProductInquiry::orderBy('id', 'DESC')->paginate($settingInfo->item_per_page_back);
		}
        return view('gwc.product.product-inquiry',compact('inquiryLists'));
    } 
	
	
	//get manufacturer
	public static function ManufacturerList(){
    $manufacturerLists = Manufacturer::where('is_active',1)->orderBy('title_en', 'ASC')->get();
	return $manufacturerLists;
	}
	//get brands
	public static function BrandsList(){
    $brandLists = Brand::where('is_active',1)->orderBy('title_en', 'ASC')->get();
	return $brandLists;
	}
	//get product quantity
	
	public static function getQuantity($product_id){
	$qty=0;
	$productDetails   = Product::where('id',$product_id)->first();
	if(empty($productDetails['is_attribute'])){
	$qty   = $productDetails['quantity'];
	}else{
	$qty     = ProductAttribute::where('product_id',$product_id)->get()->sum('quantity');
	$optyQty = ProductOptions::where('product_id',$product_id)->get()->sum('quantity');//option
	$qty = $qty+$optyQty;
	//save qty
	$productDetails->quantity=$qty;
	$productDetails->save();
	}
	
	return $qty;
	}
	
	
	//update single quantity
	public function editsinglequantityAjax(Request $request)
    {
		$recDetails = Product::where('id',$request->id)->first(); 		
		//save logs
		$key_name   = "product";
		$key_id     = $recDetails->id;
		$message    = "product quantity is changed to ".$request->quantity." (".$recDetails->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		$recDetails->quantity=$request->quantity;
		$recDetails->save();
		
		//send notification
	    self::sendQtyUpdateNotification($request->id);
		
		
		return ['status'=>200,'message'=>'Quantity is changed successfully'];
	}
	
	///send email notification once qty is updated
   public static function sendQtyUpdateNotification($id){
     $settingInfo = Settings::where("keyname","setting")->first();
     if(!empty($id)){
     $productDetails  = Product::where("id",$id)->first();
	 $message  = '';
	 $message .= '<p><a href="'.url('details/'.$id.'/'.$productDetails->slug).'"><h2>'.$productDetails->title_en.'</h2></a></p>';
	 $message .= '<p><h5>#'.$productDetails->item_code.'</h5></p>';
	 $message .= '<p><a href="'.url('details/'.$id.'/'.$productDetails->slug).'"><img src="'.url("uploads/product/".$productDetails->image).'" width="400"></a></p>';
	 $strQtyNotifications = ProductInquiry::where("product_id",$id)->get();
	 if(!empty($strQtyNotifications) && count($strQtyNotifications)>0){
	       $mobile='';
		   foreach($strQtyNotifications as $notify){
		     //send sms notification
			if(!empty($settingInfo->sms_text_outofstock_active) && !empty($notify->mobile)){
			    if($notify->strLang=="en"){
				$smsMessage = $settingInfo->sms_text_outofstock_en;
				}else{
				$smsMessage = $settingInfo->sms_text_outofstock_ar;
				}
				$to      = $notify->mobile;
				$sms_msg = $smsMessage." #".$productDetails['item_code'];
				Common::SendSms($to,$sms_msg);
			}
			
			 
			 	
			 //send email 
		     $notifys = ProductInquiry::where("id",$notify->id)->first();
			 if(!empty($notify->email)){
			 
			 if($notify->strLang=="en"){
			 $txtMessage = $settingInfo->quantit_update_notification_en;
			 }else{
			 $txtMessage = $settingInfo->quantit_update_notification_ar;
			 }
			 
			 $data = [
			 'dear'            => '',
			 'footer'          => trans('webMessage.email_footer'),
			 'message'         => $txtMessage.$message,
			 'subject'         => "Quantity Update Notification",
			 'email_from'      => $settingInfo->from_email,
	         'email_from_name' => $settingInfo->from_name
			 ];
			  Mail::to($notify->email)->send(new SendGrid($data));
			  }
			  //remove after sending email
			  $notifys->delete();
			}
			
	     }
	  }
	 
   }
   ///////////////////////////////////////////////////////////OPTION////////////////////////////////////////////
   public function addchosenoption(Request $request){
        if(empty($request->product_id)){
		return ['status'=>400,'message'=>'Product ID is missing'];
		}
		if(empty($request->cust_options)){
		return ['status'=>400,'message'=>'Please choose an option'];
		}
		
		
        $recDetails = Product::where('id',$request->product_id)->first(); 	
		if(empty($recDetails->id)){
		return ['status'=>400,'message'=>'Invalid product information'];
		}
		
		//check record exist or not
		$recDetailsOptions = ProductOptionsCustomChosen::where('product_id',$request->product_id)->where('custom_option_id',$request->cust_options)->first();
		if(!empty($recDetailsOptions->id)){
		return ['status'=>400,'message'=>'The option is already chosen for this item'];
		}	
		$recDetailsOptions = new ProductOptionsCustomChosen;
		$recDetailsOptions->product_id = $request->product_id;
		$recDetailsOptions->custom_option_id = $request->cust_options;
		$recDetailsOptions->save();
		//save logs
		$key_name   = "product";
		$key_id     = $recDetails->id;
		$message    = "product option is added to ".$request->quantity." (".$recDetails->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		$recDetails->is_attribute=1;
		$recDetails->save();
		return ['status'=>200,'message'=>'Option is added successfully'];		
   }
   
   
   //check size , color 
   public static function checkSizeColorDisable($productid,$custoptionid){
   $recDetailsOptions = ProductOptionsCustomChosen::where('product_id',$productid)->where('custom_option_id',$custoptionid)->first();
   if(!empty($recDetailsOptions->id)){
   return 1;
   }
   return 0;
   }
   
   //generat qr code for all items 
   public function QrCodeAll(){
   $products = Product::orderBy('id','desc')->get();
   if(!empty($products) && count($products)>0){
   foreach($products as $product){
   //generate QR 
	$qrtext = $product->id.'-'.$product->item_code;
	self::QrCodes($qrtext,$product->item_code);
   }
   }
   return redirect('/gwc/product')->with('message-success','QR code is generated successfully');
   }
   
   //save QR code 
   public static function QrCodes($qrtext,$itemcode){
   $qrCode = new QrCode();
   $qrCode->setText($qrtext)
    ->setSize(300)
    ->setPadding(10)
    ->setErrorCorrection('high')
    ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
    // Path to your logo with transparency
    ->setLogo(public_path('uploads/logo/qr.png'))
    // Set the size of your logo, default is 48
    ->setLogoSize(98)
    ->setImageType(QrCode::IMAGE_TYPE_PNG);
     $qrCode->save(public_path('uploads/product/qr/'.$itemcode.".png"));
   }
   	
	///get required status for chosend option
	public static function getChoosenRequiredStatus($product_id,$custom_id){
	$parentOption = ProductOptionsCustomChosen::where("product_id",$product_id)->where("custom_option_id",$custom_id)->first();
	return $parentOption;
	}
	
	
	
	//delete parent option
	public function deleteParentOption(Request $request){
	
	if(empty($request->optionChildId) || empty($request->product_id)){
	return ['status'=>400,'message'=>'Invalid ID'];
	}
	$parentOption = ProductOptionsCustomChosen::where('custom_option_id',$request->optionChildId)->where('product_id',$request->product_id)->first();
	if(empty($parentOption->id)){
	return ['status'=>400,'message'=>'Invalid Information'];
	}
	
	if($parentOption->custom_option_id==1 || $parentOption->custom_option_id==2 || $parentOption->custom_option_id==3){
	self::deleteAttrOption($parentOption->product_id,$parentOption->custom_option_id);
	}else{
	self::deleteOtherParentOption($parentOption->product_id,$parentOption->custom_option_id);
	}
	$parentOption->delete();
	return ['status'=>200,'message'=>'Record is removed successfully'];
	}
	
	
	///delete parent attribute option
	public static function deleteAttrOption($product_id,$custom_option_id){
	$attachiInfos = ProductAttribute::where('product_id',$product_id)->where('custom_option_id',$custom_option_id)->get();
	 if(!empty($attachiInfos) && count($attachiInfos)>0){	
	   foreach($attachiInfos as $attachiInfo){	
	   $attrBute = ProductAttribute::where('id',$attachiInfo->id)->first();	
			if(!empty($attrBute->color_image)){
				$web_image_path = "/uploads/product/colors/".$attrBute->color_image;
				$web_image_paththumb = "/uploads/product/colors/thumb/".$attrBute->color_image;
				  if(File::exists(public_path($web_image_path))){
				   File::delete(public_path($web_image_path));
				   File::delete(public_path($web_image_paththumb));
				  }
			 }
		$attrBute->delete();	 
		}	
	  }	
	}
	
	public static function deleteOtherParentOption($product_id,$custom_option_id){
	$attachiInfos = ProductOptions::where('product_id',$product_id)->where('custom_option_id',$custom_option_id)->get();
	 if(!empty($attachiInfos) && count($attachiInfos)>0){	
	   foreach($attachiInfos as $attachiInfo){	
	    $attrBute = ProductOptions::where('id',$attachiInfo->id)->first();	
		$attrBute->delete();	 
		}	
	  }	
	}
	
	
	
	
	//delete other option
	public function deleteOtherOption(Request $request){
	
	   if(empty($request->optionChildId)){
	   return ['status'=>400,'message'=>'Invalid ID']; 
	   }
	   
	   $attachiInfo = ProductOptions::where('id',$request->optionChildId)->first();
	   if(empty($attachiInfo->id)){
	   return ['status'=>400,'message'=>'Invalid Information']; 
	   }
	   $productInfo = Product::where('id',$attachiInfo->product_id)->first();
			
		//save logs
		$key_name   = "product-options";
		$key_id     = $productInfo->id;
		$message    = "An option is removed for (".$productInfo->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		$attachiInfo->delete();
		return ['status'=>200,'message'=>'Record is removed successfully']; 
	} 
	
	
	///get other chosen option
	public static function getChosenOtherOptions($product_id,$custom_option_id){
	$parentOption = ProductOptions::where('custom_option_id',$custom_option_id)->where('product_id',$product_id)->get();
	return $parentOption;
	}
	
	////update basic qty
	public static function updateBasicQuantity($product_id){
	$qty=0;
	$productDetails   = Product::where('id',$product_id)->first();
	if(!empty($productDetails->id) && !empty($productDetails['is_attribute'])){
	$qty     = ProductAttribute::where('product_id',$product_id)->get()->sum('quantity');
	$optyQty = ProductOptions::where('product_id',$product_id)->get()->sum('quantity');//option
	$qty     = $qty+$optyQty;
	//save qty
	$productDetails->quantity=$qty;
	$productDetails->save();
	}
	}
	
	 //warranty
   public static function getWarrantLists(){
   $warrant = Warranty::where('is_active',1)->orderBy('display_order','ASC')->get();
   return $warrant;
   }
   ///duplicate and save items
   public function createDuplicateItem(Request $request){
   
   if(empty($request->id)){
   return redirect()->back()->with('message-error','Invalid product ID');
   }
   $productDetails   = Product::where('id',$request->id)->first();
   if(empty($productDetails->id)){
   return redirect()->back()->with('message-error','Information does not exist');
   }
        
        $productLastInfo = Product::orderBy("id","desc")->first();
		
		$product = new Product;
		//slug
		if(!empty($productDetails->slug)){
		$product->slug = ($productLastInfo->id+1).'-'.$productDetails->slug;
		}else{
		$slug = new ProductSlug;
		$product->slug = ($productLastInfo->id+1).'-'.$slug->createSlug($productDetails->title_en);
		}
		$serialNumber = $this->serialNumber();
		
		$product->warranty      = $productDetails->warranty;
		$product->item_code     = $serialNumber;
		$product->sku_no        = $productDetails->sku_no;
		$product->title_en      = $productDetails->title_en;
		$product->title_ar      = $productDetails->title_ar;
		$product->details_en    = $productDetails->details_en;
		$product->details_ar    = $productDetails->details_ar;
		$product->sdetails_en   = $productDetails->sdetails_en;
		$product->sdetails_ar   = $productDetails->sdetails_ar;
		$product->retail_price  = $productDetails->retail_price;
		$product->old_price     = $productDetails->old_price;
		$product->is_offer      = $productDetails->is_offer;
		
		$product->is_attribute  = $productDetails->is_attribute;
		$product->quantity      = $productDetails->quantity;
		$product->seokeywords_en    = $productDetails->seokeywords_en;
		$product->seokeywords_ar    = $productDetails->seokeywords_ar;
		$product->seodescription_en = $productDetails->seodescription_en;
		$product->seodescription_ar = $productDetails->seodescription_ar;
		$product->tags_en           = $productDetails->tags_en;
		$product->tags_ar          = $productDetails->tags_ar;
		$product->min_purchase_qty = $productDetails->min_purchase_qty;
		$product->max_purchase_qty = $productDetails->max_purchase_qty;
		$product->alert_min_qty    = $productDetails->alert_min_qty;
		$product->is_alert_min_qty = 0;
		$product->homesection      = $productDetails->homesection;
		$product->youtube_url      = $productDetails->youtube_url;
		$product->youtube_url_id   = $productDetails->youtube_url_id;
		$product->manufacturer_id  = $productDetails->manufacturer_id;
		$product->brand_id         = $productDetails->brand_id;

		$product->is_active     = 0;
		$product->display_order = !empty($productDetails->display_order)?($productDetails->display_order+1):'1';
		$product->image         = '';
		$product->rollover_image= '';
		$product->save();
		
		//update category
		$currentItemId = $product->id;
		$prevItemId    = $productDetails->id;
		self::duplicateCategoriesForItem($currentItemId,$prevItemId);
		return redirect()->back()->with('message-success','A duplicate item is created successfully');
   
   }
   //save duplicate cat for duplicate item
   public static function duplicateCategoriesForItem($currentItemId,$prevItemId){
   $prevCategoryLists = ProductCategory::where("product_id",$prevItemId)->get();
   if(!empty($prevCategoryLists) && count($prevCategoryLists)>0){
   foreach($prevCategoryLists as $prevCategoryList){
   $newitemscat = new ProductCategory;
   $newitemscat->product_id = $currentItemId;
   $newitemscat->category_id = $prevCategoryList->category_id;   
   $newitemscat->save();
    }   
    }   
   }
   
   ///get categories for path
   public static function getPathofCategories($product_id){
   $listCategories = ProductCategory::where('product_id',$product_id)->orderBy('category_id','asc')->get();
   return $listCategories;
   }
   public static function getCategories(){
   $Categories     = Categories::where('parent_id',0)->orderBy('display_order','desc')->get();
   return $Categories;
   }
   
   //sorting
  public function ajaxAsorting(Request $request)
    {
		$recDetails = Section::where('id',$request->id)->first(); 
		
		$display_order=$request->val;
		
		
		//save logs
		$key_name   = "product";
		$key_id     = $recDetails->id;
		$message    = "section sorting is changed to ".$display_order." (".$recDetails->title_en.")";
		$created_by = Auth::guard('admin')->user()->id;
		Common::saveLogs($key_name,$key_id,$message,$created_by);
		//end save logs
		
		
		$recDetails->display_order=$display_order;
		$recDetails->save();
		return ['status'=>200,'message'=>'Sorting is modified successfully'];
	} 
  ///update upper category manually
  public function updateUpperCategoryManually(){
     $listCategories = ProductCategory::get();
	 if(!empty($listCategories) && count($listCategories)>0){
	  foreach($listCategories as $listCategory){
	   self::updateUpperCateory($listCategory->product_id,$listCategory->category_id);
	  }
	 }
  }
  
  
  //update option for hakum
  
  public static function updateoptionsforhakum($productid){
  $optionId = 4;
  $optionExist = ProductOptionsCustomChosen::where("custom_option_id",$optionId)->where("product_id",$productid)->first();
  if(empty($optionExist->id)){
         $productDetails = Product::where('id',$productid)->first();
  
         $parentOption = new ProductOptionsCustomChosen;
		 $parentOption->custom_option_id = $optionId;
		 $parentOption->product_id       = $productid;
		 $parentOption->is_required      = '0';
		 $parentOption->save();
		
		 //
		 
		 $filerec= new ProductOptions;
		 $filerec->custom_option_id = $optionId;
		 $filerec->product_id       = $productid;
		 $filerec->option_value_id  = 1;
		 $filerec->quantity         = !empty($productDetails->quantity)?$productDetails->quantity:'0';
		 $filerec->retail_price     = 1;
		 $filerec->sku_no           = '';
		 $filerec->is_price_add     = 1;
		 $filerec->is_deduct        = 1;
		 $filerec->weight           = 0;
		 $filerec->is_active        = 1;
		 $filerec->save(); 
		 
   }		 	 
  }
  
 /////item tags
 public function tagslists(){
 $tagslists_en = self::availableTags("en");
 $tagslists_ar = self::availableTags("ar");
 return view('gwc.product.tags',compact('tagslists_en','tagslists_ar'));
 } 
 
 public function tagsPost(Request $request){

  $tagsDetails = Tags::where('tag_name_en',$request->tag_name_en)->first();
  if(!empty($tagsDetails->id)){
        $imageName="";
		if($request->hasfile('tag_image')){
		
		if(!empty($tagsDetails->image)){
		$web_image_path = "/uploads/product/".$tagsDetails->image;
		if(File::exists(public_path($web_image_path))){
		   File::delete(public_path($web_image_path));
		 }
		}
		//
		$imageName = 'tag-'.md5(time()).'.'.$request->tag_image->getClientOriginalExtension();
		$request->tag_image->move(public_path('uploads/product'), $imageName);
		$imgbig = Image::make(public_path('uploads/product/'.$imageName));
		$imgbig->resize(30,30);//Fixed w,h
		$imgbig->save(public_path('uploads/product/'.$imageName));
		
		$tagsDetails->image = $imageName;
		$tagsDetails->tag_name_en = $request->tag_name_en;
		$tagsDetails->tag_name_ar = $request->tag_name_ar;
		$tagsDetails->save();
		}
		
  }else{
        
        $imageName="";
		$p = $request->p;
		if($request->hasfile('tag_image')){
		$tagsDetails = new Tags;
		$imageName = 'tag-'.md5(time()).'.'.$request->tag_image->getClientOriginalExtension();
		$request->tag_image->move(public_path('uploads/product'), $imageName);
		$imgbig = Image::make(public_path('uploads/product/'.$imageName));
		$imgbig->resize(30,30);//Fixed w,h
		$imgbig->save(public_path('uploads/product/'.$imageName));
		
		$tagsDetails->image       = $imageName;
		$tagsDetails->tag_name_en = $request->tag_name_en;
		$tagsDetails->tag_name_ar = $request->tag_name_ar;
		$tagsDetails->save();
		}
  }
  
  return redirect()->back()->with('message-success','Image is uploaded successfully');		
		
 }
 
 public static function getTagsDetails($tag){
 return Tags::where('tag_name_en',$tag)->first();
 }
 
 public static function getItemCountsByTag($tag){
 return  DB::table('gwc_products')->whereRaw("FIND_IN_SET(?,tags_en)",[$tag])->get()->count();
 }
  
}	