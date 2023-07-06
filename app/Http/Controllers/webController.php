<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Settings;
use App\Slideshow;
use App\Banner;
use App\Section;
use App\Product;
use App\ProductAttribute;
use App\ProductCategory;
use App\Categories;
use App\ProductGallery;
use App\SinglePages;
use App\Size;
use App\Color;
use App\OrdersTemp;
use App\Faq;
use App\Newsletter;
use App\Subjects;
use App\Contactus;
use App\Customers;
use App\ProductReview;
use App\ProductInquiry;
use App\Brand;
use App\Manufacturer;
use App\Warranty;
//rules
use App\Rules\Name;
use App\Rules\Mobile;
//email
use App\Mail\SendGrid;
use Mail;
use DB;
use App\Currency;
class webController extends Controller
{
   
    
	public static function ajax_post_slidecount(Request $request){
	if(!empty($request->id)){
	$slideshow = Slideshow::find($request->id);
	$slideshow->web_views = ($slideshow->web_views+1);
	$slideshow->save();
	}
	return ["status"=>200];
	}
	
	public static function ajax_post_bannercount(Request $request){
	if(!empty($request->id)){
	$Banner = Banner::find($request->id);
	$Banner->web_views = ($Banner->web_views+1);
	$Banner->save();
	}
	return ["status"=>200];
	}
	
	public static function ajax_post_categorycount($id){
	if(!empty($id)){
	$Categories = Categories::find($id);
	$Categories->web_views = ($Categories->web_views+1);
	$Categories->save();
	}
	}
	
	public function listProductsByTags(Request $request,$tags){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	
	if(empty($tags)){abort(404);}
	
	$settingInfo     = Settings::where("keyname","setting")->first();
	//get sorting option
	if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="popular"){
	$sortKeyName='gwc_products.most_visited_count';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="max-price"){
	$sortKeyName='gwc_products.retail_price';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="min-price"){
	$sortKeyName='gwc_products.retail_price';
	$sortKey='ASC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="a-z"){
	$sortKeyName=$strLang=="en"?'gwc_products.title_en':'gwc_products.title_ar';
	$sortKey='ASC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="z-a"){
	$sortKeyName=$strLang=="en"?'gwc_products.title_en':'gwc_products.title_ar';
	$sortKey='DESC';
	}else{
	$sortKeyName='gwc_products.id';
	$sortKey='DESC';
	}
	//load items per page
	if(!empty(Cookie::get('product_per_page'))){
	$recordPerPage = Cookie::get('product_per_page');
	}else{
	$recordPerPage = $settingInfo->item_per_page_front;
	}
	//product listings
	if(!empty(Cookie::get('filter_by_size')) && empty(Cookie::get('filter_by_color'))){
	$size_id=Cookie::get('filter_by_size');
	$productLists = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where(['gwc_products_attribute.size_id'=>$size_id])
	->where('gwc_products.is_active','!=',0);
	}else if(empty(Cookie::get('filter_by_size')) && !empty(Cookie::get('filter_by_color'))){
	$color_id=Cookie::get('filter_by_color');
	$productLists = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where(['gwc_products_attribute.color_id'=>$color_id])
	->where('gwc_products.is_active','!=',0);
	}else if(!empty(Cookie::get('filter_by_size')) && !empty(Cookie::get('filter_by_color'))){
	$color_id=Cookie::get('filter_by_color');
	$size_id=Cookie::get('filter_by_size');
	$productLists = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where(['gwc_products_attribute.size_id'=>$size_id,'gwc_products_attribute.color_id'=>$color_id])
	->where('gwc_products.is_active','!=',0);
	}else{
	$productLists = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->where('gwc_products.is_active','!=',0)->whereNotNull('gwc_products.tags_en');
	}
	//filter by tags

	if(!empty($tags)){
	$productLists=$productLists->whereRaw("FIND_IN_SET(?,gwc_products.tags_en)", [$tags]);
	}
	
	//filter by price range
	if(!empty(Cookie::get('rangeprice'))){
	$explodePrice = explode('-',Cookie::get('rangeprice'));	
	$productLists=$productLists->where('gwc_products.retail_price','>=', $explodePrice[0])
	->where('gwc_products.retail_price','<=', $explodePrice[1]);
	}
	//price range
	$retailPriceRanges=$productLists->max('gwc_products.retail_price');
	
	$productLists=$productLists->orderBy($sortKeyName,$sortKey)
	->paginate($recordPerPage);
	
	//check subcategoris exit or not
	$productCategoriesLists = [];
	
	//get sizes
	$prodSizes= DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.id','gwc_products_attribute.*','gwc_sizes.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products.id','=','gwc_products_attribute.product_id')
	->join('gwc_sizes','gwc_sizes.id','=','gwc_products_attribute.size_id')
	->where(['gwc_sizes.is_active' =>1])
	->where('gwc_products.is_active','!=',0);
	if(!empty($tags)){
	$prodSizes=$prodSizes->whereRaw("find_in_set('".$tags."',gwc_products.tags_en)");
	}
	
	$prodSizes=$prodSizes->where('size_id','!=',0)->groupBy('gwc_products_attribute.size_id')
	->get();
	
	//get colors
	$prodColors= DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.id','gwc_products_attribute.*','gwc_colors.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products.id','=','gwc_products_attribute.product_id')
	->join('gwc_colors','gwc_colors.id','=','gwc_products_attribute.color_id')
	->where(['gwc_colors.is_active' =>1])
	->where('gwc_products.is_active','!=',0);
	
	if(!empty($tags)){
	$prodColors=$prodColors->whereRaw("find_in_set('".$tags."',gwc_products.tags_en)");
	}
	
	$prodColors=$prodColors->where('gwc_products_attribute.color_id','!=',0);
	
	if(!empty(Cookie::get('filter_by_size'))){
	$prodColors->where('gwc_products_attribute.size_id','=',Cookie::get('filter_by_size'));	
	}
	$prodColors=$prodColors->groupBy('gwc_products_attribute.color_id')->get();
	//get most popular items 
	$mostpopularitems    = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->where('gwc_products.is_active','!=',0);
	
	if(!empty($tags)){
	$mostpopularitems=$mostpopularitems->whereRaw("find_in_set('".$tags."',gwc_products.tags_en)");
	}
	
	$mostpopularitems=$mostpopularitems->orderBy('most_visited_count','DESC')
	->limit(5)
	->get();
	
	//get product tags
	$cattags=[];
	$prodtags = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id');
	
	if(!empty($tags)){
	$prodtags=$prodtags->whereRaw("find_in_set('".$tags."',gwc_products.tags_en)");
	}
	
	$prodtags=$prodtags->where('gwc_products.is_active','!=',0)
  	->get();
	
	if(!empty($prodtags) && count($prodtags)>0){
	  $tags='';
	foreach($prodtags as $prodtag){
	  if($strLang=='en' && !empty($prodtag->tags_en)){
	  $tags.=$prodtag->tags_en.',';
	  }else if($strLang=='ar' && !empty($prodtag->tags_ar)){
	  $tags.=$prodtag->tags_ar.',';
	  }
	 }
	 $ftags = trim($tags,',');
	 $arrTags = explode(",",$ftags);
	 $cattags = array_unique($arrTags);
	}
	//get filter history
	$filterHistory = $this->filterHistory();
	$categoryDetails = [];
	
	return view('website.productstags',compact('productLists','categoryDetails','productCategoriesLists','retailPriceRanges','prodSizes','prodColors','mostpopularitems','cattags','filterHistory'));	
	}
	
	
	//get random banner
	public static function getRandomBanner($image_size,$location){
	return  Banner::where("image_size",$image_size)->where("box",$location)->first();
	}
	 
    public function index()
    {
	  Common::api_context();
	  
	  $settingInfo      = Settings::where("keyname","setting")->first();
      if($settingInfo->theme==1){
	  return view('website.theme.theme1');
	  }else if($settingInfo->theme==2){
	  return view('website.theme.theme2');
	  }else if($settingInfo->theme==3){
	  return view('website.theme.theme3');
	  }else if($settingInfo->theme==4){
	  return view('website.theme.theme4');
	  }else if($settingInfo->theme==5){
	  return view('website.theme.theme5');
	  }else if($settingInfo->theme==6){
	  return view('website.theme.theme6');
	  }else if($settingInfo->theme==7){ //alkadikw8.com
	  return view('website.theme.theme7');
	  }else if($settingInfo->theme==8){ //mrk-q8.com
	  return view('website.theme.theme8');
	  }else if($settingInfo->theme==9){ //mrk-q8.com
	  return view('website.theme.theme9');
	  }else if($settingInfo->theme==10){ //mrk-q8.com
	  return view('website.theme.theme10');
	  }else{
      return view('website.index');
	  }
    }
	
	//show categories
	public function showCategories(){
	return view('website.categories');
	}
	
	public function listCategoriesVueJs()
    {
    	$data = Categories::where('parent_id',0)->where('is_active',1)->paginate(12);

    	return response()->json($data);
    }
	
	
	
	//view contact 
	public function viewcontact()
	{
		$subjectLists = Subjects::where('is_active',1)->get();
		return view('website.contact',compact('subjectLists'));
	}
   public static function getSubjectName($subjectid){
   $recDetails = Subjects::where('id',$subjectid)->first(); 
   return $recDetails['title_en'];
   }
	//store contact us details
	public function contactform(Request $request){
	
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	$settingInfo      = Settings::where("keyname","setting")->first();
	
	      $validator = Validator::make($request->all(),[
            'name'    => ['required','string','min:4','max:190',new Name],
            'email'   => 'required|email',
			'mobile'  => ['required',new Mobile],
			'subject' => 'required',
			'message' => 'required|string|min:10|max:900',
            ],
            [ 
			'name.required'    => trans('webMessage.name_required'),
			'email.required'   => trans('webMessage.email_required'),
			'mobile.required'  => trans('webMessage.mobile_required'),
			'subject.required' => trans('webMessage.subject_required'),
			'message.required' => trans('webMessage.message_required')
			]
			);
	    if ($validator->fails()) {
            return redirect('/contactus')
                        ->withErrors($validator)
                        ->withInput();
        }
		
     $grecaptcharesponse = !empty($request->input('g-recaptcha-response'))?$request->input('g-recaptcha-response'):'';
	 if(empty($grecaptcharesponse)){
	 return redirect('/contactus')
                        ->withErrors(['recaptchaError'=>trans('webMessage.choose_captcha_validation')])
                        ->withInput();
	 }
	 
	 
	try{
	
	
	 
	 $recaptchaValidate = Common::VerifyCaptcha($grecaptcharesponse);
	 if($recaptchaValidate){		
			
	 $contact = new Contactus;		
	 $contact->name       = strip_tags($request->input('name'));
	 $contact->email      = $request->input('email');
	 $contact->mobile     = $request->input('mobile');
	 $contact->subject    = $request->input('subject');
	 $contact->message    = strip_tags($request->input('message'));
	 $contact->cip        = $_SERVER['REMOTE_ADDR'];
	 $contact->created_at = date("Y-m-d H:i:s");
	 $contact->updated_at = date("Y-m-d H:i:s");
	 $contact->save();	
	 //send email notification
	 if(!empty($request->input('email'))){
	 $data = [
	 'dear'            => trans('webMessage.dear').' '.strip_tags($request->input('name')),
	 'footer'          => trans('webMessage.email_footer'),
	 'message'         => trans('webMessage.contactus_body'),
	 'subject'         => self::getSubjectName($request->input('subject')),
	 'email_from'      => $settingInfo->from_email,
	 'email_from_name' => $settingInfo->from_name
	 ];
     Mail::to($request->input('email'))->send(new SendGrid($data));
	 }
	 //
	 if(!empty($settingInfo->email)){
	 $appendMessage ="";
	 $appendMessage .= "<br><b>".trans('webMessage.name')." : </b>".strip_tags($request->input('name'));
	 $appendMessage .= "<br><b>".trans('webMessage.email')." : </b>".$request->input('email');
	 $appendMessage .= "<br><b>".trans('webMessage.mobile')." : </b>".$request->input('mobile');
	 $appendMessage .= "<br><b>".trans('webMessage.subject')." : </b>".self::getSubjectName($request->input('subject'));
	 $appendMessage .= "<br><b>".trans('webMessage.message')." : </b>".strip_tags($request->input('message'));
	 $dataadmin = [
	 'dear'            => trans('webMessage.dearadmin'),
	 'footer'          => trans('webMessage.email_footer'),
	 'message'         => trans('webMessage.contactus_admin_body')."<br><br>".$appendMessage,
	 'subject'         => self::getSubjectName($request->input('subject')),
	 'email_from'      => $settingInfo->from_email,
	 'email_from_name' => $settingInfo->from_name
	 ];
     Mail::to($settingInfo->email)->send(new SendGrid($dataadmin));	 
	 }
	 //end sending email	
	 return redirect('/contactus')->with('session_msg',trans('webMessage.contact_message_sent'));		
	 }else{
	 return redirect('/contactus')->withErrors(['recaptchaError'=>trans('webMessage.invalid_captcha_validation')])->withInput();	
	 }
	 
	 }catch (\Exception $e) {
	 return redirect()->back()->with('recaptchaError',$e->getMessage());	
	 }
		
	}
	//static functions
	
	//get product details
	public static function getProductDetails($id){
	$prodDetails = Product::where('id',$id)->first();
	return $prodDetails;
	}


    //faq
	public static function faq(){
	$settingInfo = Settings::where("keyname","setting")->first();
	$faqs = Faq::where("is_active",1)->orderBy('display_order',$settingInfo->default_sort)->get();
	return view('website.faq',compact('faqs'));
	}
	//settings
	public static function settings(){
	  $settingInfo = Settings::where("keyname","setting")->first();
	  return $settingInfo;
	}
	//slideshow
	public static function getSlideshow(){
	  $settingInfo = Settings::where("keyname","setting")->first();
	  $slideInfo   = Slideshow::where("is_active","1")->orderBy('display_order',$settingInfo->default_sort)->get();
	  return $slideInfo;
	}
	//banners
	public static function banners(){
		$bannerInfo   = Banner::where("is_active","1")->get();
		return $bannerInfo;
	}
	//home sections
	public static function getSections(){
	  $settingInfo = Settings::where("keyname","setting")->first();
	  $sectionInfo   = Section::where("is_active","1")->orderBy('display_order',$settingInfo->default_sort)->get();
	  return $sectionInfo;
	}
	//home sections products
	public static function getSectionsProducts($section_id){
	$settingInfo   = Settings::where("keyname","setting")->first();
	$sectionInfo   = Product::where("is_active","!=","0")->where('homesection',$section_id)->orderBy('updated_at','DESC')->limit(8)->get();
	return $sectionInfo;
	}
	
	//home sections products
	public static function getBrandsProducts($brand_id){
	$settingInfo   = Settings::where("keyname","setting")->first();
	$sectionInfo   = Product::where("is_active","!=","0")->where('brand_id',$brand_id)->orderBy('updated_at','DESC')->limit(8)->get();
	return $sectionInfo;
	}
	
	public static function getNewProducts(){
	$sectionInfo   = Product::where("is_active","!=","0")->orderBy('updated_at','DESC')->limit(20)->get();
	return $sectionInfo;
	}
	
	//get product category details
	public static function getProductCatName($productid){
	$ProdCat=[];
	$ProdCatInfo = ProductCategory::where("product_id",$productid)->orderBy('category_id','desc')->first();
	if(!empty($ProdCatInfo->category_id)){
	$ProdCat = Categories::where("id",$ProdCatInfo->category_id)->first();
	}
	return $ProdCat;
	}
	//get customer dtails
	public static function getCustomerDetails($id){
	$customer=[];
	if(!empty($id)){
	$customer = Customers::where('id',$id)->first();
	}
	return $customer;
	}
	//get ratings
	public static function getRatings($ratings){
	$ratingstxt='<i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>';
	
	if($ratings>=5){
	$ratingstxt='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>';
	}
	if($ratings>=4.5 && $ratings<5){
	$ratingstxt='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-half"></i>';
	}
	if($ratings>=4 && $ratings<4.5){
	$ratingstxt='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i>';
	}
	if($ratings>=3.5 && $ratings<4){
	$ratingstxt='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-half"></i><i class="icon-star-empty"></i>';
	}
	if($ratings>=3 && $ratings<3.5){
	$ratingstxt='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>';
	}
	if($ratings>=2.5 && $ratings<3){
	$ratingstxt='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-half"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>';
	}
	if($ratings>=2 && $ratings<2.5){
	$ratingstxt='<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>';
	}
	if($ratings>=1.5 && $ratings<2){
	$ratingstxt='<i class="icon-star"></i><i class="icon-star-half"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>';
	}
	if($ratings>=1 && $ratings<1.5){
	$ratingstxt='<i class="icon-star"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>';
	}
	if($ratings>0 && $ratings<1){
	$ratingstxt='<i class="icon-star-half"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>';
	}
	return $ratingstxt;
	}
	
	public static function getProductRatings($product_id){
	$ratings =0;
	$reviewsCount = ProductReview::where('product_id',$product_id)->get()->count();
	if(!empty($reviewsCount)){
	$reviewsSum   = ProductReview::where('product_id',$product_id)->get()->sum('ratings');
	$ratings = round(($reviewsSum/$reviewsCount),1);
	}
	$ratingtxt = self::getRatings($ratings);
	return $ratingtxt;
	}
	
	//single page
	public function singlePage($slug){
		$singleInfo   = SinglePages::where("is_active","1")->where('slug',$slug)->first();
		return view('website.singlepage',compact('singleInfo'));
	}
	
	   //get single text
   public static function singlePageDetails($id){
		$singleInfo   = SinglePages::where("is_active","1")->where('id',$id)->first();
		return $singleInfo;
	}
	//news letter 
	public function ajax_newsletter_subscribe(Request $request){
	
	if(empty($request->newsletter_email)) {
	$message='<label class="error">'.trans('webMessage.email_required').'</label>';
	return ["status"=>400,"message"=>$message];
	}
	if(filter_var($request->newsletter_email, FILTER_VALIDATE_EMAIL)===false) {
	$message='<label class="error">'.trans('webMessage.email_valid_required').'</label>';
	return ["status"=>400,"message"=>$message];
	}
	$newsletter = Newsletter::where("newsletter_email",$request->newsletter_email)->first();
	if(empty($newsletter->id)){
	$newsletter = new Newsletter;
	$newsletter->newsletter_email=$request->newsletter_email;
	$newsletter->save();
	}
	$message='<label class="error" style="background-color:#009900;">'.trans('webMessage.subscribed_successfully').'</label>';
	return ["status"=>200,"message"=>$message];
	}
	
	
	public static function getChildCatName($id){
	$txt='';
	 if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
	 $ProdCat = Categories::where("id",$id)->first();
	 if(!empty($ProdCat->parent_id)){
	 $txt.=self::getChildCatName($ProdCat->parent_id);
	 }
	 if(!empty($ProdCat->id)){
	 $txt.='<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" ><a itemprop="item" href="'.url('products/'.$ProdCat->id.'/'.$ProdCat->friendly_url).'"><span itemprop="name">'.$ProdCat['name_'.$strLang].'</span></a><meta itemprop="position" content="2" /></li>';
	 }
	 return $txt;
	}
	
	public static function getChildCatNameCms($id){
	$txt='';
	 if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
	 $ProdCat = Categories::where("id",$id)->first();
	 if(!empty($ProdCat->parent_id)){
	 $txt.=self::getChildCatNameCms($ProdCat->parent_id);
	 }
	 if(!empty($ProdCat->id)){
	 $txt.=$ProdCat['name_'.$strLang].' > ';
	 }
	 return $txt;
	}
	
	//get categories
	public  static function getCatTreeNameByPid($productid){
	$txt ='';
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
	$catInfo1 = self::getProductCatName($productid);
	if(!empty($catInfo1->parent_id)){
	$txt.=self::getChildCatName($catInfo1->parent_id);
	}
	if(!empty($catInfo1->id)){
	$txt.='<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item"  href="'.url('products/'.$catInfo1->id.'/'.$catInfo1->friendly_url).'"><span itemprop="name">'.$catInfo1['name_'.$strLang].'</span></a><meta itemprop="position" content="3" /></li>';
	}
	return $txt;
	}
	//cms item listings
	public  static function getCatTreeNameByPidCms($productid){
	$txt ='';
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
	$catInfo1 = self::getProductCatName($productid);
	if(!empty($catInfo1->parent_id)){
	$txt.=self::getChildCatNameCms($catInfo1->parent_id);
	}
	if(!empty($catInfo1->id)){
	$txt.=$catInfo1['name_'.$strLang].' > ';
	}
	return $txt;
	}
   //generate social links
   public static function createSocialLinks($social_name,$url,$text,$image=""){
	if($social_name=="facebook"){
	$links = "https://www.facebook.com/sharer/sharer.php?u=".urlencode($url);	
	}
	if($social_name=="twitter"){
	$links = "https://twitter.com/intent/tweet?url=".urlencode($url)."&text=".urlencode($text);
	}
	if($social_name=="googleplus"){
	$links = "https://plus.google.com/share?url=".urlencode($url);
	}
	if($social_name=="pinterest"){
	$links = "http://pinterest.com/pin/create/button/?url=".urlencode($url)."&media=".urlencode($image)."&description=".urlencode($text);
	}
	if($social_name=="linkedin"){
	$links = "http://www.linkedin.com/shareArticle?mini=true&url=".urlencode($url)."&title=".urlencode($text);
	}
	return $links;
   }
   ///post product reviews
   //store review us details
	public function reviewForm(Request $request){
	
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	
	if(!empty(Auth::guard('webs')->user()->id)){$customer_id=Auth::guard('webs')->user()->id;}else{$customer_id=0;}
	
	$settingInfo      = Settings::where("keyname","setting")->first();
	
	      $validator = Validator::make($request->all(),[
		    'product_id'=>'required',
		    'ratings' => 'required',
            'name'    => ['required','string','min:4','max:190',new Name],
            'email'   => 'required|email',
			'message' => 'required|string|min:10|max:900',
            ],
            [ 
			'product_id.required' => trans('webMessage.product_id_required'),
			'ratings.required' => trans('webMessage.ratings_required'),
			'name.required'    => trans('webMessage.name_required'),
			'email.required'   => trans('webMessage.email_required'),
			'message.required' => trans('webMessage.message_required')
			]
			);
	    if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
		
	 $grecaptcharesponse = !empty($request->input('g-recaptcha-response'))?$request->input('g-recaptcha-response'):'';
	 if(empty($grecaptcharesponse)){
	 return redirect()->back()->withErrors(['recaptchaError'=>trans('webMessage.choose_captcha_validation')])->withInput();
	 }
	 
	 
	try{
	
	
	 
	 $recaptchaValidate = Common::VerifyCaptcha($grecaptcharesponse);
	 if($recaptchaValidate){
	 
	 $productDetails = self::getProductDetails($request->input('product_id'));
     $getCurrency=Currency::where('is_active,1')->get()->toArray();
			
	 $reviews = new ProductReview;		
	 $reviews->name       = $request->input('name');
	 $reviews->email      = $request->input('email');
	 $reviews->customer_id= $customer_id;
	 $reviews->product_id = $request->input('product_id');
	 $reviews->message    = strip_tags($request->input('message'));
	 $reviews->ratings    = $request->input('ratings');
	 $reviews->is_active  = 0;
	 $reviews->created_at = date("Y-m-d H:i:s");
	 $reviews->updated_at = date("Y-m-d H:i:s");
	 $reviews->save();	
	 //send email notification
	 if(!empty($request->input('email'))){
	 $data = [
	 'dear'    => trans('webMessage.dear').' '.$request->input('name'),
	 'footer'  => trans('webMessage.email_footer'),
	 'message' => trans('webMessage.reviews_body')."<br><img src='".url('uploads/product/'.$productDetails['image'])."' width='150'><br><h2>".$productDetails['title_'.$strLang]."</h2>",
	 'subject' =>"Product Review Notification",
	 'email_from' =>$settingInfo->from_email,
	 'email_from_name' =>$settingInfo->from_name
	 ];
     Mail::to($request->input('email'))->send(new SendGrid($data));
	 }
	 //
	 if(!empty($settingInfo->email)){
	 $appendMessage ="";
	 $appendMessage .= "<br><b>".trans('webMessage.name')." : </b>".$request->input('name');
	 $appendMessage .= "<br><b>".trans('webMessage.email')." : </b>".$request->input('email');
	 $appendMessage .= "<br><b>".trans('webMessage.productname')." : </b>".$productDetails['title_'.$strLang];
	 $appendMessage .= "<br><b>".trans('webMessage.message')." : </b>".strip_tags($request->input('message'));
	 $dataadmin = [
	 'dear' => trans('webMessage.dearadmin'),
	 'footer' => trans('webMessage.email_footer'),
	 'message' => trans('webMessage.review_admin_body')."<br><img src='".url('uploads/product/'.$productDetails['image'])."' width='150'><br><h2>".$productDetails['title_'.$strLang]."</h2>"."<br><br>".$appendMessage,
	 'subject' =>"Product Review Notification",
	 'email_from' =>$settingInfo->from_email,
	 'email_from_name' =>$settingInfo->from_name
	 ];
     Mail::to($settingInfo->email)->send(new SendGrid($dataadmin));	 
	 }
	 //end sending email	
	 return redirect()->back()->with('session_msg',trans('webMessage.review_message_sent'));	
	 }else{
	 return redirect()->back()->withErrors(['recaptchaError'=>trans('webMessage.invalid_captcha_validation')])->withInput();	
	 }
	 
	 }catch (\Exception $e) {
	 return redirect()->back()->with('recaptchaError',$e->getMessage());	
	 }
	 	
	}
	
	
	//post product inquiry
	public function ajax_post_inquiry(Request $request){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	
	if(!empty(Auth::guard('webs')->user()->id)){$customer_id=Auth::guard('webs')->user()->id;}else{$customer_id=0;}
	
	$settingInfo      = Settings::where("keyname","setting")->first();
	if(empty($request->product_id)){
	$message ='<div class="alert-danger">'.trans('webMessage.idmissing').'</div>';
	return ["status"=>200,"message"=>$message];	
	}
	/*
	if(empty($request->inquiry_name)){
	$message ='<div class="alert-danger">'.trans('webMessage.name_required').'</div>';
	return ["status"=>200,"message"=>$message];	
	}
	*/
	
	if(empty($request->inquiry_email) && empty($request->inquiry_mobile)){
	$message ='<div class="alert-danger">'.trans('webMessage.email_required').'/'.trans('webMessage.mobile_required').'</div>';
	return ["status"=>200,"message"=>$message];	
	}
	
	if(!empty($request->inquiry_email) && !filter_var($request->inquiry_email, FILTER_VALIDATE_EMAIL)){
	$message ='<div class="alert-danger">'.trans('webMessage.email_valid_required').'</div>';
	return ["status"=>200,"message"=>$message];	
	}
	/*
	if(empty($request->inquiry_mobile)){
	$message ='<div class="alert-danger">'.trans('webMessage.mobile_required').'</div>';
	return ["status"=>200,"message"=>$message];	
	}*/
	$isValidMobile = Common::checkMobile($request->inquiry_mobile);
	if(!empty($request->inquiry_mobile) && empty($isValidMobile)){
	$message ='<div class="alert-danger">'.trans('webMessage.mobile_invalid').'</div>';
	return ["status"=>200,"message"=>$message];	
	}
	/*
	if(empty($request->inquiry_message)){
	$message ='<div class="alert-danger">'.trans('webMessage.message_required').'</div>';
	return ["status"=>200,"message"=>$message];	
	}*/
	
	 $productDetails = self::getProductDetails($request->input('product_id'));	
	 //check duplicate record
	 $reviewDuplicate = ProductInquiry::where('name',$request->input('inquiry_name'))->where('email',$request->input('inquiry_email'))->where('mobile',$request->input('inquiry_mobile'))->first();
	 if(empty($reviewDuplicate->id)){
	 		
	 $reviews = new ProductInquiry;		
	 $reviews->name=$request->input('inquiry_name');
	 $reviews->email=$request->input('inquiry_email');
	 $reviews->mobile=$request->input('inquiry_mobile');
	 $reviews->customer_id=$customer_id;
	 $reviews->product_id=$request->input('product_id');
	 $reviews->message=$request->input('inquiry_message');
	 $reviews->strLang=$strLang;
	 $reviews->created_at=date("Y-m-d H:i:s");
	 $reviews->updated_at=date("Y-m-d H:i:s");
	 $reviews->save();	
	 //send email notification
	 if(!empty($request->input('inquiry_email'))){
	 $data = [
	 'dear'    => trans('webMessage.dear').' '.$request->input('inquiry_name'),
	 'footer'  => trans('webMessage.email_footer'),
	 'message' => trans('webMessage.inquiry_body')."<br><img src='".url('uploads/product/'.$productDetails['image'])."' width='150'><br><h2>".$productDetails['title_'.$strLang]."</h2>",
	 'subject' =>"Product Inquiry Notification",
	 'email_from' =>$settingInfo->from_email,
	 'email_from_name' =>$settingInfo->from_name
	 ];
     Mail::to($request->input('inquiry_email'))->send(new SendGrid($data));
	 }
	 //
	 if(!empty($settingInfo->email)){
	 $appendMessage ="";
	 $appendMessage .= "<br><b>".trans('webMessage.name')." : </b>".$request->input('inquiry_name');
	 $appendMessage .= "<br><b>".trans('webMessage.email')." : </b>".$request->input('inquiry_email');
	 $appendMessage .= "<br><b>".trans('webMessage.productname')." : </b>".$productDetails['title_'.$strLang];
	 $appendMessage .= "<br><b>".trans('webMessage.message')." : </b>".$request->input('inquiry_message');
	 $dataadmin = [
	 'dear' => trans('webMessage.dearadmin'),
	 'footer' => trans('webMessage.email_footer'),
	 'message' => trans('webMessage.inquiry_admin_body')."<br><img src='".url('uploads/product/'.$productDetails['image'])."' width='150'><br><h2>".$productDetails['title_'.$strLang]."</h2>"."<br><br>".$appendMessage,
	 'subject' =>"Product Inquiry Notification",
	 'email_from' =>$settingInfo->from_email,
	 'email_from_name' =>$settingInfo->from_name
	 ];
     Mail::to($settingInfo->email)->send(new SendGrid($dataadmin));	 
	 }
	 //end sending email	
	 $message ='<div class="alert-success">'.trans('webMessage.inquiry_message_sent').'</div>';
	 return ["status"=>200,"message"=>$message];
	 }else{
	 $message ='<div class="alert-danger">'.trans('webMessage.request_already_exist').'</div>';
	 return ["status"=>200,"message"=>$message];
	 }
	}
	
	//products listings
	public function listProducts(Request $request,$catid){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	
	$settingInfo     = Settings::where("keyname","setting")->first();
	$categoryDetails = Categories::where('id', $catid)->first();
	
	self::ajax_post_categorycount($catid);
	
	//get sorting option
	if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="popular"){
	$sortKeyName='gwc_products.most_visited_count';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="max-price"){
	$sortKeyName='gwc_products.retail_price';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="min-price"){
	$sortKeyName='gwc_products.retail_price';
	$sortKey='ASC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="a-z"){
	$sortKeyName=$strLang=="en"?'gwc_products.title_en':'gwc_products.title_ar';
	$sortKey='ASC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="z-a"){
	$sortKeyName=$strLang=="en"?'gwc_products.title_en':'gwc_products.title_ar';
	$sortKey='DESC';
	}else{
	$sortKeyName='gwc_products.id';
	$sortKey='DESC';
	}
	//load items per page
	if(!empty(Cookie::get('product_per_page'))){
	$recordPerPage = Cookie::get('product_per_page');
	}else{
	$recordPerPage = $settingInfo->item_per_page_front;
	}
	//product listings
	if(!empty(Cookie::get('filter_by_size')) && empty(Cookie::get('filter_by_color'))){
	$size_id=Cookie::get('filter_by_size');
	$productLists = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where(['category_id'=>$catid,'gwc_products_attribute.size_id'=>$size_id])
	->where('gwc_products.is_active','!=',0);
	}else if(empty(Cookie::get('filter_by_size')) && !empty(Cookie::get('filter_by_color'))){
	$color_id=Cookie::get('filter_by_color');
	$productLists = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where(['category_id'=>$catid,'gwc_products_attribute.color_id'=>$color_id])
	->where('gwc_products.is_active','!=',0);
	}else if(!empty(Cookie::get('filter_by_size')) && !empty(Cookie::get('filter_by_color'))){
	$color_id=Cookie::get('filter_by_color');
	$size_id=Cookie::get('filter_by_size');
	$productLists = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where(['category_id'=>$catid,'gwc_products_attribute.size_id'=>$size_id,'gwc_products_attribute.color_id'=>$color_id])
	->where('gwc_products.is_active','!=',0);
	}else{
	$productLists = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->where(['category_id'=>$catid])
	->where('gwc_products.is_active','!=',0);
	}
	//filter by tags
	if(!empty(Cookie::get('filter_by_tags'))){
	$search = Cookie::get('filter_by_tags');
	$productLists=$productLists->whereRaw("find_in_set('".$search."',gwc_products.tags_en)")
	->whereRaw("find_in_set('".$search."',gwc_products.tags_ar)");
	}
	//filter by price range
	if(!empty(Cookie::get('rangeprice'))){
	$explodePrice = explode('-',Cookie::get('rangeprice'));	
	$productLists=$productLists->where('gwc_products.retail_price','>=', $explodePrice[0])
	->where('gwc_products.retail_price','<=', $explodePrice[1]);
	}
	//price range
	$retailPriceRanges=$productLists->max('gwc_products.retail_price');
	
	$productLists=$productLists->orderBy($sortKeyName,$sortKey)
	->paginate($recordPerPage);

	//check subcategoris exit or not
	$productCategoriesLists = Categories::where('is_active',1)->where('parent_id',$catid)->orderBy('name_en','ASC')->get();
	
	//get sizes
	$prodSizes= DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.id','gwc_products_attribute.*','gwc_sizes.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products.id','=','gwc_products_attribute.product_id')
	->join('gwc_sizes','gwc_sizes.id','=','gwc_products_attribute.size_id')
	->where(['gwc_products_category.category_id'=>$catid,'gwc_sizes.is_active' =>1])
	->where('gwc_products.is_active','!=',0)
	->where('size_id','!=',0)->groupBy('gwc_products_attribute.size_id')
	->get();
	
	//get colors
	$prodColors= DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.id','gwc_products_attribute.*','gwc_colors.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_products_attribute','gwc_products.id','=','gwc_products_attribute.product_id')
	->join('gwc_colors','gwc_colors.id','=','gwc_products_attribute.color_id')
	->where(['gwc_products_category.category_id'=>$catid,'gwc_colors.is_active' =>1])
	->where('gwc_products.is_active','!=',0)
	->where('gwc_products_attribute.color_id','!=',0);
	
	if(!empty(Cookie::get('filter_by_size'))){
	$prodColors->where('gwc_products_attribute.size_id','=',Cookie::get('filter_by_size'));	
	}
	$prodColors=$prodColors->groupBy('gwc_products_attribute.color_id')->get();
	//get most popular items 
	$mostpopularitems    = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->where(['category_id'=>$catid])
	->where('gwc_products.is_active','!=',0)
	->orderBy('most_visited_count','DESC')
	->limit(5)
	->get();
	//get product tags
	$cattags=[];
	$prodtags = DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->where('gwc_products_category.category_id','=',$catid)->where('gwc_products.is_active','!=',0)
  	->get();
	if(!empty($prodtags) && count($prodtags)>0){
	  $tags='';
	foreach($prodtags as $prodtag){
	  if($strLang=='en' && !empty($prodtag->tags_en)){
	  $tags.=$prodtag->tags_en.',';
	  }else if($strLang=='ar' && !empty($prodtag->tags_ar)){
	  $tags.=$prodtag->tags_ar.',';
	  }
	 }
	 $ftags = trim($tags,',');
	 $arrTags = explode(",",$ftags);
	 $cattags = array_unique($arrTags);
	}
	//get filter history
	$filterHistory = $this->filterHistory();
    $getCurrency=Currency::all();
	return view('website.products',compact('productLists','categoryDetails','productCategoriesLists','retailPriceRanges','prodSizes','prodColors','mostpopularitems','cattags','filterHistory','getCurrency'));
	}
	
	public static function getSectionDetails($secid){
	$sectionDetails  = Section::where('id', $secid)->first();
	return $sectionDetails;
	}
	//show items from sectionInfo
	
	
	public function listSectionsProducts(Request $request,$secid){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	
	$settingInfo     = Settings::where("keyname","setting")->first();
	$sectionDetails  = Section::where('id', $secid)->first();
	//get sorting option
	if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="popular"){
	$sortKeyName='gwc_products.most_visited_count';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="max-price"){
	$sortKeyName='gwc_products.retail_price';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="min-price"){
	$sortKeyName='gwc_products.retail_price';
	$sortKey='ASC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="a-z"){
	$sortKeyName=$strLang=="en"?"title_en":"title_ar";
	$sortKey='ASC';
	}else if(!empty(Cookie::get('product_sort_by')) && Cookie::get('product_sort_by')=="z-a"){
	$sortKeyName=$strLang=="en"?"title_en":"title_ar";
	$sortKey='DESC';
	}else{
	$sortKeyName='gwc_products.id';
	$sortKey='DESC';
	}
	//load items per page
	if(!empty(Cookie::get('product_per_page'))){
	$recordPerPage = Cookie::get('product_per_page');
	}else{
	$recordPerPage = $settingInfo->item_per_page_front;
	}
	//product listings
	if(!empty(Cookie::get('filter_by_size')) && empty(Cookie::get('filter_by_color'))){
	$size_id=Cookie::get('filter_by_size');
	$productLists = DB::table('gwc_products')
	->select('gwc_products.id','gwc_products.*')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where(['gwc_products.homesection'=>$secid,'gwc_products_attribute.size_id'=>$size_id])
	->where('gwc_products.is_active','!=',0);
	}else if(empty(Cookie::get('filter_by_size')) && !empty(Cookie::get('filter_by_color'))){
	$color_id=Cookie::get('filter_by_color');
	$productLists = DB::table('gwc_products')
	->select('gwc_products.id','gwc_products.*')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where(['gwc_products.homesection'=>$secid,'gwc_products_attribute.color_id'=>$color_id])
	->where('gwc_products.is_active','!=',0);
	}else if(!empty(Cookie::get('filter_by_size')) && !empty(Cookie::get('filter_by_color'))){
	$color_id=Cookie::get('filter_by_color');
	$size_id=Cookie::get('filter_by_size');
	$productLists = DB::table('gwc_products')
	->select('gwc_products.id','gwc_products.*')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where(['gwc_products.homesection'=>$secid,'gwc_products_attribute.size_id'=>$size_id,'gwc_products_attribute.color_id'=>$color_id])
	->where('gwc_products.is_active','!=',0);
	}else{
	$productLists = DB::table('gwc_products')
	->select('gwc_products.*')
	->where(['homesection'=>$secid])
	->where('gwc_products.is_active','!=',0);
	}
	//filter by tags
	if(!empty(Cookie::get('filter_by_tags'))){
	$search = Cookie::get('filter_by_tags');
	$productLists=$productLists->whereRaw("find_in_set('".$search."',gwc_products.tags_en)")
	->whereRaw("find_in_set('".$search."',gwc_products.tags_ar)");
	}
	//filter by price range
	if(!empty(Cookie::get('rangeprice'))){
	$explodePrice = explode('-',Cookie::get('rangeprice'));	
	$productLists=$productLists->where('gwc_products.retail_price','>=', $explodePrice[0])
	->where('gwc_products.retail_price','<=', $explodePrice[1]);
	}
	//price range
	$retailPriceRanges=$productLists->max('gwc_products.retail_price');
	
	$productLists=$productLists->orderBy($sortKeyName,$sortKey)
	->paginate($recordPerPage);

	//check subcategoris exit or not
	
	
	$productCategoriesLists= DB::table('gwc_products')
	->select('gwc_products.id','gwc_products.homesection','gwc_products.id','gwc_products_category.category_id','gwc_products_category.product_id','gwc_categories.*')
	->join('gwc_products_category','gwc_products.id','=','gwc_products_category.product_id')
	->join('gwc_categories','gwc_categories.id','=','gwc_products_category.category_id')
	->where(['gwc_products.homesection'=>$secid,'gwc_categories.is_active' =>1])
	->where('gwc_products.is_active','!=',0)
	->groupBy('gwc_products_category.category_id')
	->get();
	
	//get sizes
	$prodSizes= DB::table('gwc_products')
	->select('gwc_products.id','gwc_products.homesection','gwc_products.id','gwc_products_attribute.*','gwc_sizes.*')
	->join('gwc_products_attribute','gwc_products.id','=','gwc_products_attribute.product_id')
	->join('gwc_sizes','gwc_sizes.id','=','gwc_products_attribute.size_id')
	->where(['gwc_products.homesection'=>$secid,'gwc_sizes.is_active' =>1])
	->where('gwc_products.is_active','!=',0)
	->where('size_id','!=',0)->groupBy('gwc_products_attribute.size_id')
	->get();
	
	//get colors
	$prodColors= DB::table('gwc_products')
	->select('gwc_products.id','gwc_products.homesection','gwc_products.id','gwc_products_attribute.*','gwc_colors.*')
	->join('gwc_products_attribute','gwc_products.id','=','gwc_products_attribute.product_id')
	->join('gwc_colors','gwc_colors.id','=','gwc_products_attribute.color_id')
	->where(['gwc_products.homesection'=>$secid,'gwc_colors.is_active' =>1])
	->where('gwc_products.is_active','!=',0)
	->where('gwc_products_attribute.color_id','!=',0);
	
	if(!empty(Cookie::get('filter_by_size'))){
	$prodColors->where('gwc_products_attribute.size_id','=',Cookie::get('filter_by_size'));	
	}
	$prodColors=$prodColors->groupBy('gwc_products_attribute.color_id')->get();
	//get most popular items 
	$mostpopularitems    = DB::table('gwc_products')
	->select('gwc_products.*')
	->where(['homesection'=>$secid])
	->where('is_active','!=',0)
	->orderBy('most_visited_count','DESC')
	->limit(5)
	->get();
	//get product tags
	$cattags=[];
	$prodtags = DB::table('gwc_products')
	->select('gwc_products.*')
	->where('homesection','=',$secid)->where('is_active','!=',0)
  	->get();
	if(!empty($prodtags) && count($prodtags)>0){
	  $tags='';
	foreach($prodtags as $prodtag){
	  if($strLang=='en' && !empty($prodtag->tags_en)){
	  $tags.=$prodtag->tags_en.',';
	  }else if($strLang=='ar' && !empty($prodtag->tags_ar)){
	  $tags.=$prodtag->tags_ar.',';
	  }
	 }
	 $ftags = trim($tags,',');
	 $arrTags = explode(",",$ftags);
	 $cattags = array_unique($arrTags);
	}
	//get filter history
	$filterHistory = $this->filterHistory();
	
	return view('website.sections',compact('productLists','sectionDetails','productCategoriesLists','retailPriceRanges','prodSizes','prodColors','mostpopularitems','cattags','filterHistory'));	
	}
	
	
	/////////////////////////////////////////////////show search results//////////////////////////////////////////////
	
	public function searchResults(Request $request){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	$prodSizes=[];
	$settingInfo     = Settings::where("keyname","setting")->first();
	//get sorting option
	if(!empty(Cookie::get('search_sort_by')) && Cookie::get('search_sort_by')=="popular"){
	$sortKeyName='most_visited_count';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('search_sort_by')) && Cookie::get('search_sort_by')=="max-price"){
	$sortKeyName='retail_price';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('search_sort_by')) && Cookie::get('search_sort_by')=="min-price"){
	$sortKeyName='retail_price';
	$sortKey='ASC';
	}else if(!empty(Cookie::get('search_sort_by')) && Cookie::get('search_sort_by')=="a-z"){
	$sortKeyName='title_'.$strLang;
	$sortKey='ASC';
	}else if(!empty(Cookie::get('search_sort_by')) && Cookie::get('search_sort_by')=="z-a"){
	$sortKeyName='title_'.$strLang;
	$sortKey='DESC';
	}else{
	$sortKeyName='id';
	$sortKey='DESC';
	}
	//load items per page
	if(!empty(Cookie::get('search_per_page'))){
	$recordPerPage = Cookie::get('search_per_page');
	}else{
	$recordPerPage = !empty($settingInfo->item_per_page_front)?$settingInfo->item_per_page_front:12;
	}
	$search = $request->sq;
	$explode_search = explode(' ',$search);
	
	if(!empty($search)){
	$productLists = Product::where('gwc_products.is_active','!=',0);
	//filter by size
	if(!empty(Cookie::get('search_by_size')) && empty(Cookie::get('search_by_color'))){
	$size_id = Cookie::get('search_by_size');
	$productLists = $productLists->select('gwc_products_attribute.product_id','gwc_products_attribute.size_id','gwc_products.*')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where('gwc_products_attribute.size_id','=',$size_id);
	}else if(empty(Cookie::get('search_by_size')) && !empty(Cookie::get('search_by_color'))){
	$color_id = Cookie::get('search_by_color');
	$productLists = $productLists->select('gwc_products_attribute.product_id','gwc_products_attribute.color_id','gwc_products.*')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where('gwc_products_attribute.color_id','=',$color_id);
	}else if(!empty(Cookie::get('search_by_size')) && !empty(Cookie::get('search_by_color'))){
	$size_id = Cookie::get('search_by_size');
	$color_id = Cookie::get('search_by_color');
	$productLists = $productLists->select('gwc_products_attribute.product_id','gwc_products_attribute.size_id','gwc_products_attribute.color_id','gwc_products.*')
	->join('gwc_products_attribute','gwc_products_attribute.product_id','=','gwc_products.id')
	->where('gwc_products_attribute.size_id','=',$size_id)->where('gwc_products_attribute.color_id','=',$color_id);
	}
	//filter by tags
	if(!empty(Cookie::get('search_by_tags'))){
	$searchTags = Cookie::get('search_by_tags');
	if($strLang=="en"){
	$productLists=$productLists->whereRaw("find_in_set('".$searchTags."',gwc_products.tags_en)");
	}else{
	$productLists=$productLists->whereRaw("find_in_set('".$searchTags."',gwc_products.tags_ar)");
	}
	}
	//filter by price range
	if(!empty(Cookie::get('search_rangeprice'))){
	$explodePrice = explode('-',Cookie::get('search_rangeprice'));	
	$productLists=$productLists->where('gwc_products.retail_price','>=', $explodePrice[0])
	->where('gwc_products.retail_price','<=', $explodePrice[1]);
	}	
	$productLists = $productLists->where(function($q) use ($search,$strLang){
	$explode_search = explode(' ',$search);
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	$q->where('gwc_products.title_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('gwc_products.details_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('gwc_products.item_code', 'LIKE', '%' .$search . '%');
	if(count($explode_search)>1 && !empty($productLists)){
	foreach($explode_search as $searchword){
	$productLists=$productLists->orwhere('title_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('gwc_products.details_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('gwc_products.item_code', 'LIKE', '%' .$searchword . '%');	
	 }
	}
	});
	
	//get max price
	$retailPriceRanges=$productLists->max('gwc_products.retail_price');
	
	$productLists=$productLists->orderBy('gwc_products.most_visited_count','DESC')
	->paginate($recordPerPage);
	
	
	$productLists->appends(['sq' => $search]);
	//get categories lists
	$productCategoriesLists = $this->getSearchCategories($search,$strLang);
	$prodSizes              = $this->getSizeBySearch($search,$strLang);
	$prodColors             = $this->getColorBySearch($search,$strLang);
	$mostpopularitems       = $this->getPopularItemsBySearch($search,$strLang);
	$cattags                = $this->getTagsBySearch($search,$strLang);
	}else{
	$productLists = [];
	$productCategoriesLists=[];
	$prodSizes=[];
	$prodColors=[];
	$mostpopularitems=[];
	$cattags  =[];
	}
	
	$filterHistory = $this->filterSearchHistory();
	return view('website.search',compact('productLists','productCategoriesLists','retailPriceRanges','prodSizes','prodColors','mostpopularitems','cattags','filterHistory'));
	}
	
	///////count items by category////////
	public static function countProductsByCatId($catid){
	$countProducts= DB::table('gwc_products_category')
	->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_products.id','gwc_products.*')
	->join('gwc_products','gwc_products.id','=','gwc_products_category.product_id')
	->where(['gwc_products_category.category_id'=>$catid])
	->where('gwc_products.is_active','!=',0)
	->get()->count();	
	return $countProducts;
	}
	//save lat & long 
	public function ajax_post_latlong(Request $request){
	$minutes=3600;
	//sort by 
	if(!empty($request->longitude)){
	Cookie::queue('longitude', $request->longitude, $minutes);
	}
	if(!empty($request->latitude)){
	Cookie::queue('latitude', $request->latitude, $minutes);
	}
	return ["status"=>200,"message"=>''];
	}
	///////sort by product
	public function ajax_store_value_in_cookies(Request $request){
	$minutes=3600;
	//sort by 
	if(!empty($request->offer_sort_by)){
	Cookie::queue('offer_sort_by', $request->offer_sort_by, $minutes);
	}
	//record per page
	if(!empty($request->offer_per_page)){
	Cookie::queue('offer_per_page', $request->offer_per_page, $minutes);
	}
	//sort by 
	if(!empty($request->brand_sort_by)){
	Cookie::queue('brand_sort_by', $request->brand_sort_by, $minutes);
	}
	//record per page
	if(!empty($request->brand_per_page)){
	Cookie::queue('brand_per_page', $request->brand_per_page, $minutes);
	}
	//sort by 
	if(!empty($request->product_sort_by)){
	Cookie::queue('product_sort_by', $request->product_sort_by, $minutes);
	}
	//record per page
	if(!empty($request->product_per_page)){
	Cookie::queue('product_per_page', $request->product_per_page, $minutes);
	}
	//price range
	if(!empty($request->rangeprice)){
	Cookie::queue('rangeprice', $request->rangeprice, $minutes);
	}
	//filter by tags
    if(!empty($request->filter_by_tags)){
	Cookie::queue('filter_by_tags', $request->filter_by_tags, $minutes);
	}
	//filter by color
	if(!empty($request->filter_by_color)){
	Cookie::queue('filter_by_color', $request->filter_by_color, $minutes);
	}
	//filter by size
	if(!empty($request->filter_by_size)){
	Cookie::queue('filter_by_size', $request->filter_by_size, $minutes);
	}
    //search
	//sort by 
	if(!empty($request->search_sort_by)){
	Cookie::queue('search_sort_by', $request->search_sort_by, $minutes);
	}
	//record per page
	if(!empty($request->search_per_page)){
	Cookie::queue('search_per_page', $request->search_per_page, $minutes);
	}
	//price range
	if(!empty($request->search_rangeprice)){
	Cookie::queue('search_rangeprice', $request->search_rangeprice, $minutes);
	}
	//search by tags
    if(!empty($request->search_by_tags)){
	Cookie::queue('search_by_tags', $request->search_by_tags, $minutes);
	}
	//search by color
	if(!empty($request->search_by_color)){
	Cookie::queue('search_by_color', $request->search_by_color, $minutes);
	}
	//search by size
	if(!empty($request->search_by_size)){
	Cookie::queue('search_by_size', $request->search_by_size, $minutes);
	}
	return ["status"=>200,"message"=>''];
	}
	//get filter history
	public function filterHistory(){
	$lists=[];
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	
	if(!empty(Cookie::get('filter_by_size'))){
	$sizedetails = $this->sizeDetails(Cookie::get('filter_by_size'));
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.size').' : '.$sizedetails['title_'.$strLang].'</a></li>';
	}
	if(!empty(Cookie::get('filter_by_color'))){
	$colordetails = $this->colorDetails(Cookie::get('filter_by_color'));
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.color').' : '.$colordetails['title_'.$strLang].'</a></li>';
	}
	if(!empty(Cookie::get('filter_by_tags'))){
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.tags').' : '.Cookie::get('filter_by_tags').'</a></li>';
	}
	if(!empty(Cookie::get('rangeprice'))){
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.pricerange').' : '.Cookie::get('rangeprice').'</a></li>';
	}
	if(!empty(Cookie::get('product_per_page'))){
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.recordsperpage').' : '.Cookie::get('product_per_page').'</a></li>';
	}
	if(!empty(Cookie::get('product_sort_by'))){
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.sortby').' : '.Cookie::get('product_sort_by').'</a></li>';
	}
	return $lists;
	}
	//search history
	public function filterSearchHistory(){
	$lists=[];
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	
	if(!empty(Cookie::get('search_by_size'))){
	$sizedetails = $this->sizeDetails(Cookie::get('search_by_size'));
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.size').' : '.$sizedetails['title_'.$strLang].'</a></li>';
	}
	if(!empty(Cookie::get('search_by_color'))){
	$colordetails = $this->colorDetails(Cookie::get('search_by_color'));
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.color').' : '.$colordetails['title_'.$strLang].'</a></li>';
	}
	if(!empty(Cookie::get('search_by_tags'))){
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.tags').' : '.Cookie::get('search_by_tags').'</a></li>';
	}
	if(!empty(Cookie::get('search_rangeprice'))){
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.pricerange').' : '.Cookie::get('search_rangeprice').'</a></li>';
	}
	if(!empty(Cookie::get('search_product_per_page'))){
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.recordsperpage').' : '.Cookie::get('search_product_per_page').'</a></li>';
	}
	if(!empty(Cookie::get('search_product_sort_by'))){
	$lists[]='<li><a href="javascript:;">'.trans('webMessage.sortby').' : '.Cookie::get('search_product_sort_by').'</a></li>';
	}
	return $lists;
	}
	//color details
	public function colorDetails($id){
	$Details   = Color::where('id',$id)->first();
	return $Details;
	}
	//size details
	public function sizeDetails($id){
	$Details   = Size::where('id',$id)->first();
	return $Details;
	}
	////clear all filters
	public function ajax_product_filter(){
	Cookie::queue('product_sort_by', '', 0);	
	Cookie::queue('product_per_page', '', 0);
	Cookie::queue('rangeprice', '', 0);
	Cookie::queue('filter_by_tags', '', 0);
	Cookie::queue('filter_by_size', '', 0);
	Cookie::queue('filter_by_color', '', 0);
	return ["status"=>200,"message"=>''];
	}
	//
	public function ajax_product_search(){
	Cookie::queue('search_sort_by', '', 0);	
	Cookie::queue('search_per_page', '', 0);
	Cookie::queue('search_rangeprice', '', 0);
	Cookie::queue('search_by_tags', '', 0);
	Cookie::queue('search_by_size', '', 0);
	Cookie::queue('search_by_color', '', 0);
	return ["status"=>200,"message"=>''];
	}
	
	///collect tags
	public function collecttags($prodtags){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	$cattags=[];
	if(!empty($prodtags) && count($prodtags)>0){
	  $tags='';
	foreach($prodtags as $prodtag){
	  if($strLang=='en' && !empty($prodtag->tags_en)){
	  $tags.=$prodtag->tags_en.',';
	  }else if($strLang=='ar' && !empty($prodtag->tags_ar)){
	  $tags.=$prodtag->tags_ar.',';
	  }
	 }
	 $ftags = trim($tags,',');
	 $arrTags = explode(",",$ftags);
	 $cattags = array_unique($arrTags);
	}	
	return $cattags;
	}
	
	//list items by brand
	public function listItemsByBrand(Request $request,$brandkey){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	$settingInfo = Settings::where("keyname","setting")->first();
	$brandInfo   = Brand::where('slug',$brandkey)->first();
	//get sorting option
	if(!empty(Cookie::get('brand_sort_by')) && Cookie::get('brand_sort_by')=="popular"){
	$sortKeyName='gwc_products.most_visited_count';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('brand_sort_by')) && Cookie::get('brand_sort_by')=="max-price"){
	$sortKeyName='gwc_products.retail_price';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('brand_sort_by')) && Cookie::get('brand_sort_by')=="min-price"){
	$sortKeyName='gwc_products.retail_price';
	$sortKey='ASC';
	}else if(!empty(Cookie::get('brand_sort_by')) && Cookie::get('brand_sort_by')=="a-z"){
	$sortKeyName=$strLang=="en"?'gwc_products.title_en':'gwc_products.title_ar';
	
	$sortKey='ASC';
	}else if(!empty(Cookie::get('brand_sort_by')) && Cookie::get('brand_sort_by')=="z-a"){
	$sortKeyName=$strLang=="en"?'gwc_products.title_en':'gwc_products.title_ar';
	$sortKey='DESC';
	}else{
	$sortKeyName='gwc_products.id';
	$sortKey='DESC';
	}
	//load items per page
	if(!empty(Cookie::get('brand_per_page'))){
	$recordPerPage = Cookie::get('brand_per_page');
	}else{
	$recordPerPage = !empty($settingInfo->item_per_page_front)?$settingInfo->item_per_page_front:12;
	}
	
	$brandProductLists = DB::table('gwc_products')
	->select('gwc_brands.*','gwc_products.*')
	->join('gwc_brands','gwc_products.brand_id','=','gwc_brands.id')
	->where(['gwc_brands.slug'=>$brandkey, 'gwc_brands.is_active' =>1])->where('gwc_products.is_active','!=',0)->orderBy($sortKeyName,$sortKey)->paginate($recordPerPage);	
	return view('website.brands',compact('brandProductLists','brandInfo'));
	}
	//
	public function offers(Request $request){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
	$settingInfo = Settings::where("keyname","setting")->first();
	//get sorting option
	if(!empty(Cookie::get('offer_sort_by')) && Cookie::get('offer_sort_by')=="popular"){
	$sortKeyName='most_visited_count';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('offer_sort_by')) && Cookie::get('offer_sort_by')=="max-price"){
	$sortKeyName='retail_price';
	$sortKey='DESC';
	}else if(!empty(Cookie::get('offer_sort_by')) && Cookie::get('offer_sort_by')=="min-price"){
	$sortKeyName='retail_price';
	$sortKey='ASC';
	}else if(!empty(Cookie::get('offer_sort_by')) && Cookie::get('offer_sort_by')=="a-z"){
	$sortKeyName=$strLang=="en"?'title_en':'title_ar';
	$sortKey='ASC';
	}else if(!empty(Cookie::get('offer_sort_by')) && Cookie::get('offer_sort_by')=="z-a"){
	$sortKeyName=$strLang=="en"?'title_en':'title_ar';
	$sortKey='DESC';
	}else{
	$sortKeyName='id';
	$sortKey='DESC';
	}
	//load items per page
	if(!empty(Cookie::get('offer_per_page'))){
	$recordPerPage = Cookie::get('offer_per_page');
	}else{
	$recordPerPage = !empty($settingInfo->item_per_page_front)?$settingInfo->item_per_page_front:12;
	}
	
	$offerProductLists = DB::table('gwc_products')->where('is_active','!=',0)->where('is_offer',1)->orderBy($sortKeyName,$sortKey)->paginate($recordPerPage);
	return view('website.offers',compact('offerProductLists'));
	}
	//get manufacturer
	public static function ManufacturerList(){
    $manufacturerLists = Manufacturer::where('is_active',1)->orderBy('display_order', 'ASC')->get();
	return $manufacturerLists;
	}
	//get brands
	public static function BrandsList(){
	$brandLists = DB::table('gwc_brands')
	           ->select('gwc_products.brand_id','gwc_products.is_active','gwc_brands.*')
	           ->join('gwc_products','gwc_products.brand_id','=','gwc_brands.id')
			   ->where('gwc_products.is_active','!=',0)->where('gwc_brands.is_active',1)
			   ->orderBy('gwc_brands.display_order','asc')->groupBy('gwc_products.brand_id')->get();
			   
	return $brandLists;
	}
	
	public static function BrandsDetails($id){
    $brandLists = Brand::where('id',$id)->first();
	return $brandLists;
	}
	
	///////get categories for search//////
	public function getSearchCategories($search,$strLang="en"){
	$listQuery = DB::table('gwc_products')
	           ->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_categories.name_en','gwc_categories.name_ar','gwc_categories.friendly_url','gwc_categories.id as cid','gwc_products.*')
	           ->join('gwc_products_category','gwc_products.id','=','gwc_products_category.product_id')
			   ->join('gwc_categories','gwc_categories.id','=','gwc_products_category.category_id')
			   ->where('gwc_products.is_active','!=',0);
    //search part start
	$listQuery = $listQuery
	->where('gwc_products.title_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('gwc_products.details_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('gwc_products.item_code', '=', '%' .$search . '%');
	$explode_search = explode(' ',$search);
	if(count($explode_search)>1){
	foreach($explode_search as $searchword){
	$listQuery=$listQuery->orwhere('gwc_products.title_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('gwc_products.details_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('gwc_products.item_code', '=', '%' .$searchword . '%');	
	 }
	}
	//end search part			   
	$listQuery = $listQuery->where('gwc_categories.is_active',1)->groupBy('gwc_categories.id')->get();	
	return $listQuery;	   
	}
	/////////////////////////////////////////////get sizes from search////////////////////////////////////////
	public function getSizeBySearch($search,$strLang){
	//get sizes
	$listQuery= DB::table('gwc_products')
	->select('gwc_products.id','gwc_products_attribute.*','gwc_sizes.*')
	->join('gwc_products_attribute','gwc_products.id','=','gwc_products_attribute.product_id')
	->join('gwc_sizes','gwc_sizes.id','=','gwc_products_attribute.size_id')
	->where(['gwc_sizes.is_active' =>1])->where('gwc_products.is_active','!=',0);
	//search part start
	$listQuery = $listQuery
	->where('gwc_products.title_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('gwc_products.details_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('gwc_products.item_code', '=', '%' .$search . '%');
	$explode_search = explode(' ',$search);
	if(count($explode_search)>1){
	foreach($explode_search as $searchword){
	$listQuery=$listQuery->orwhere('gwc_products.title_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('gwc_products.details_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('gwc_products.item_code', '=', '%' .$searchword . '%');	
	 }
	}
	//end search part	
	$listQuery=$listQuery->where('gwc_products_attribute.size_id','!=',0)->groupBy('gwc_products_attribute.size_id')
	->get();
	return $listQuery;	
	}
	
	/////////////////////////////////////////////get color from search////////////////////////////////////////
	public function getColorBySearch($search,$strLang){
	//get sizes
	$listQuery= DB::table('gwc_products')
	->select('gwc_products.id','gwc_products_attribute.*','gwc_colors.*')
	->join('gwc_products_attribute','gwc_products.id','=','gwc_products_attribute.product_id')
	->join('gwc_colors','gwc_colors.id','=','gwc_products_attribute.color_id')
	->where(['gwc_colors.is_active' =>1])->where('gwc_products.is_active','!=',0);
	//search part start
	$listQuery = $listQuery
	->where('gwc_products.title_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('gwc_products.details_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('gwc_products.item_code', '=', '%' .$search . '%');
	$explode_search = explode(' ',$search);
	if(count($explode_search)>1){
	foreach($explode_search as $searchword){
	$listQuery=$listQuery->orwhere('gwc_products.title_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('gwc_products.details_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('gwc_products.item_code', '=', '%' .$searchword . '%');	
	 }
	}
	//end search part	
	$listQuery=$listQuery->where('gwc_products_attribute.color_id','!=',0)->groupBy('gwc_products_attribute.color_id')
	->get();
	return $listQuery;	
	}
	/////////////////////////////get popular items by search /////////////////////////////
	public function getPopularItemsBySearch($search,$strLang){
	$explode_search = explode(' ',$search);
	$listQuery = Product::where('is_active','!=',0)
	->where('title_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('details_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('item_code', '=', '%' .$search . '%');
	if(count($explode_search)>1){
	foreach($explode_search as $searchword){
	$listQuery=$listQuery->orwhere('title_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('details_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('item_code', '=', '%' .$searchword . '%');	
	 }
	}
	$listQuery=$listQuery->orderBy('most_visited_count','DESC')
	->limit(5)
	->get();
	return $listQuery;
	}
	//get tags by search
	public function getTagsBySearch($search,$strLang){
	//get product tags
	$explode_search = explode(' ',$search);
	$prodtags = Product::where('is_active','!=',0)
	->where('title_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('details_'.$strLang, 'like', '%' .$search . '%')
	->orwhere('item_code', '=', '%' .$search . '%');
	if(count($explode_search)>1){
	foreach($explode_search as $searchword){
	$prodtags=$prodtags->orwhere('title_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('details_'.$strLang, 'like', '%' .$searchword . '%')
	->orwhere('item_code', '=', '%' .$searchword . '%');	
	 }
	}
	$prodtags=$prodtags->get();
	$cattags=[];
	if(!empty($prodtags) && count($prodtags)>0){
	  $tags='';
	foreach($prodtags as $prodtag){
	  if($strLang=='en' && !empty($prodtag->tags_en)){
	  $tags.=$prodtag->tags_en.',';
	  }else if($strLang=='ar' && !empty($prodtag->tags_ar)){
	  $tags.=$prodtag->tags_ar.',';
	  }
	 }
	 $ftags = trim($tags,',');
	 $arrTags = explode(",",$ftags);
	 $cattags = array_unique($arrTags);
	}
	return $cattags;
	}
   
   //get warranty
   public static function getWarrantyDetails($id){
   $w = Warranty::where('id',$id)->first();
   return $w;
   }
   
   public static function getProductCategories($parent=0){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}	
	$listQuery = DB::table('gwc_products')
	           ->select('gwc_products_category.product_id','gwc_products_category.category_id','gwc_categories.image as cimage','gwc_categories.name_en','gwc_categories.name_ar','gwc_categories.friendly_url','gwc_categories.id as cid','gwc_products.*')
	           ->join('gwc_products_category','gwc_products.id','=','gwc_products_category.product_id')
			   ->join('gwc_categories','gwc_categories.id','=','gwc_products_category.category_id')
			   ->where('gwc_products.is_active','!=',0);
		   
	$listQuery = $listQuery->where('gwc_categories.is_active',1)->where('gwc_categories.parent_id',$parent)->groupBy('gwc_categories.id')->orderBy('gwc_categories.display_order','ASC')->get();	
	return $listQuery;	   
	}
	
	///get best seller brands
	//get brands
	public static function BestSellerBrandsList(){
    $brandLists = new Brand;
	$brandLists = $brandLists->select('gwc_brands.*','gwc_products.brand_id','gwc_products.homesection')
	                         ->join('gwc_products','gwc_products.brand_id','=','gwc_brands.id');
	$brandLists = $brandLists->where('gwc_brands.is_active',1)->where('gwc_brands.is_home',1)
	                       ->where('gwc_products.homesection',1)->groupBy('gwc_products.brand_id')->orderBy('gwc_brands.display_order', 'ASC')->get();
	return $brandLists;
	}
	
	public static function ShopByBrandsList(){
    $brandLists = new Brand;
	$brandLists = $brandLists->select('gwc_brands.*','gwc_products.brand_id')
	                         ->join('gwc_products','gwc_products.brand_id','=','gwc_brands.id');
	$brandLists = $brandLists->where('gwc_brands.is_active',1)->where('gwc_brands.is_home',1)->groupBy('gwc_products.brand_id')->orderBy('gwc_brands.display_order', 'ASC')->get();
	return $brandLists;
	}
}
