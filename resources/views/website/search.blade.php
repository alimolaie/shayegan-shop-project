@php
$settingInfo = App\Http\Controllers\webController::settings();
use Illuminate\Support\Facades\Cookie;
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
$pixelids=[];
$boxlist='';
if(!empty($settingInfo->column_list) && $settingInfo->column_list==3){
$boxlist = 'col-lg-2';
}else if(!empty($settingInfo->column_list) && $settingInfo->column_list==2){
$boxlist = 'col-lg-3';
}else if(!empty($settingInfo->column_list) && $settingInfo->column_list==1){
$boxlist = 'col-lg-4';
}else{
$boxlist = 2;
}
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@if(app()->getLocale()=="en") {{$settingInfo->name_en}} @else {{$settingInfo->name_ar}} @endif | {{__('webMessage.searchResults')}}</title>
<meta name="description" content="@if(app()->getLocale()=="en") {{$settingInfo->seo_description_en}} @else {{$settingInfo->seo_description_ar}} @endif" />
<meta name="abstract" content="@if(app()->getLocale()=="en") {{$settingInfo->seo_description_en}} @else {{$settingInfo->seo_description_ar}} @endif">
<meta name="keywords" content="@if(app()->getLocale()=="en") {{$settingInfo->seo_keywords_en}} @else {{$settingInfo->seo_keywords_ar}} @endif" />
<meta name="Copyright" content="{{$settingInfo->name_en}}, Kuwait Copyright 2020 - {{date('Y')}}" />
<META NAME="Geography" CONTENT="@if(app()->getLocale()=="en") {{$settingInfo->address_en}} @else {{$settingInfo->address_ar}} @endif">
@if($settingInfo->extra_meta_tags) {!!$settingInfo->extra_meta_tags!!} @endif
@if($settingInfo->favicon)
<link rel="icon" href="{{url('uploads/logo/'.$settingInfo->favicon)}}">
@endif
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@include("website.includes.css")
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!--preloader -->
@include("website.includes.preloader")
<!--end preloader -->
<!--header -->
@include("website.includes.header")
<!--end header -->
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{url('/')}}">{{__('webMessage.home')}}</a></li>
			<li><a href="javascript:;">{{__('webMessage.searchResults')}}</a></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="row">
				@include('website.includes.search_filter_left_panel')
				<div class="col-md-12">
					<div class="content-indent">
						<div class="tt-filters-options desctop-no-sidebar">
							<h1 class="tt-title">
								{{__('webMessage.searchResults')}} <span class="tt-title-total">({{count($productLists)}})</span>
							</h1>
                           
							<div class="tt-btn-toggle">
								<a href="javascript:;">{{strtoupper(__('webMessage.filter'))}}</a>
							</div>
                           
                            
							<div class="tt-sort">
						<select name="search_sort_by" id="search_sort_by">
                        <option value="">{{__('webMessage.latestitems')}}</option>
                        <option value="popular" @if(Cookie::get('search_sort_by')=="popular") selected @endif>{{__('webMessage.mostpopular')}}</option>
						<option value="max-price" @if(Cookie::get('search_sort_by')=="max-price") selected @endif>{{__('webMessage.max_price')}}</option>
						<option value="min-price" @if(Cookie::get('search_sort_by')=="min-price") selected @endif>{{__('webMessage.min_price')}}</option>
						<option value="a-z" @if(Cookie::get('search_sort_by')=="a-z") selected @endif>{{__('webMessage.atoz')}}</option>
                        <option value="z-a" @if(Cookie::get('search_sort_by')=="z-a") selected @endif>{{__('webMessage.ztoa')}}</option>
						</select>
						<select name="search_per_page" id="search_per_page">
						<option value="12" @if(Cookie::get('search_per_page')=="12") selected @endif>{{__('webMessage.show')}}</option>
						<option value="24" @if(Cookie::get('search_per_page')=="24") selected @endif>24</option>
						<option value="48" @if(Cookie::get('search_per_page')=="48") selected @endif>48</option>
						<option value="96" @if(Cookie::get('search_per_page')=="96") selected @endif>96</option>
						</select>
							</div>
							<div class="tt-quantity">
								<a href="#" class="tt-col-one" data-value="tt-col-one"></a>
								<a href="#" class="tt-col-two" data-value="tt-col-two"></a>
								<a href="#" class="tt-col-three" data-value="tt-col-three"></a>
								<a href="#" class="tt-col-four" data-value="tt-col-four"></a>
								<a href="#" class="tt-col-six" data-value="tt-col-six"></a>
							</div>
						</div>
                        @if(!empty($productLists) && count($productLists)>0)
						<div class="tt-product-listing row">
                         @php $tagsDetails=''; @endphp
                        @foreach($productLists as $productList)
						@php
                        $pixelids[]=$productList->id;
						$isStock = App\Http\Controllers\webCartController::IsAvailableQuantity($productList->id);
                        $tagsDetails = App\Http\Controllers\webCartController::getTagsName($productList->tags_en,$productList->tags_ar);
						@endphp
							<div class="col-6 col-md-4 {{$boxlist}} tt-col-item">
								<div class="tt-product thumbprod-center">
									<div class="tt-image-box">
										<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal" data-tooltip="{{__('webMessage.quickview')}}" {{__('webMessage.align')}} id="{{$productList->id}}"></a>
							<a href="javascript:;" class="tt-btn-wishlist addtowishlistquick" data-tooltip="{{__('webMessage.addtowishlist')}}" {{__('webMessage.align')}} id="{{$productList->id}}"></a>
							<a href="{{url('details/'.$productList->id.'/'.$productList->slug)}}">
								<span class="tt-img"><img src="{{url('assets/images/loader.svg')}}" data-src="@if($productList->image) {{url('uploads/product/thumb/'.$productList->image)}} @else {{url('uploads/no-image.png')}} @endif" alt="@if(app()->getLocale()=='en') {{$productList->title_en}} @else {{$productList->title_ar}} @endif"></span>
                                @if($productList->rollover_image) 
								<span class="tt-img-roll-over"><img src="{{url('assets/images/loader.svg')}}" data-src="@if($productList->rollover_image) {{url('uploads/product/thumb/'.$productList->rollover_image)}} @else {{url('uploads/no-image.png')}} @endif" alt="@if(app()->getLocale()=='en') {{$productList->title_en}} @else {{$productList->title_ar}} @endif"></span>
                                @endif
								<span class="tt-label-location">
								@if(empty($isStock))<span class="tt-label-sale">{{__('webMessage.outofstock')}}</span>@endif
								@if(!empty($productList->caption_en) && $strLang=="en") 
                                <span class="tt-label" style="background-color:{{$productList->caption_color}};color:#fff;border-radius:5px;font-size:12px;padding:3px;">{{$productList->caption_en}}</span> 
                                @else 
                                <span class="tt-label" style="background-color:{{$productList->caption_color}};color:#fff;border-radius:5px;font-size:12px;padding:3px;">{{$productList->caption_ar}} </span> 
                                @endif
								</span>
							</a>
                            <!--countdown-->
                         @if(!empty($productList->countdown_datetime) && strtotime($productList->countdown_datetime)>strtotime(date('Y-m-d'))) 
                         <div class="tt-countdown_box">
								<div class="tt-countdown_inner">
									<div class="tt-countdown" 
                                    data-date="{{$productList->countdown_datetime}}" 
                                    data-year="{{__('webMessage.Yrs')}}" 
                                    data-month="{{__('webMessage.Mths')}}" 
                                    data-week="{{__('webMessage.Wk')}}" 
                                    data-day="{{__('webMessage.Day')}}" 
                                    data-hour="{{__('webMessage.Hrs')}}" 
                                    data-minute="{{__('webMessage.Min')}}" 
                                    data-second="{{__('webMessage.Sec')}}">
                                    </div>
								</div>
						 </div>
                         @endif  
                         <!--end countdown-->
									</div>
									<div class="tt-description">
                        <span id="responseMsg-{{$productList->id}}"></span> 
							
							<h2 class="tt-title"><a href="{{url('details/'.$productList->id.'/'.$productList->slug)}}">{!!Common::getLangString($productList->title_en,$productList->title_ar)!!}{!!Common::getLangStringExtra($productList->extra_title_en,$productList->extra_title_ar)!!}</a></h2>
                            @if(!empty($tagsDetails)){!!$tagsDetails!!}@endif
							<div class="tt-price">
							@if(!empty($productList->countdown_datetime) && strtotime($productList->countdown_datetime)>strtotime(date('Y-m-d'))) 	 
							<span class="new-price price_red">{{$productList->countdown_price}} {{__('webMessage.kd')}}</span>
                            <input type="hidden" id="pixel_price_{{$productList->id}}" value="{{$productList->countdown_price}}">
                            <span class="old-price price_black">{{$productList->retail_price}} {{__('webMessage.kd')}}</span>
                            @else
                            <span class="new-price @if($productList->old_price) price_red @endif">{{$productList->retail_price}} {{__('webMessage.kd')}}</span>
                            <input type="hidden" id="pixel_price_{{$productList->id}}" value="{{$productList->retail_price}}">
						    @if(!empty($productList->old_price))
							<span class="old-price price_black">{{$productList->old_price}} {{__('webMessage.kd')}}</span>
							@endif
                            @endif
							</div>
							<div class="tt-product-inside-hover">
								<div class="tt-row-btn">
                                    @if($productList->is_attribute)
                                    <a href="{{url('details/'.$productList->id.'/'.$productList->slug)}}" class="tt-btn-addtocart thumbprod-button-bg" id="{{$productList->id}}">{{__('webMessage.details')}}</a>
                                    @else
                                     @if(!empty($isStock))
									@if($productList->is_active=='2')
									<a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="{{$productList->id}}">{{__('webMessage.preorder')}}</a>
                                    @else
                                    <a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="{{$productList->id}}">{{__('webMessage.addtocart_btn')}}</a>
                                    @endif
									@endif
                                    @endif
								</div>
								<div class="tt-row-btn">
									<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal"  id="{{$productList->id}}"></a>
									<a href="javascript:;"  class="tt-btn-wishlist addtowishlistquick" id="{{$productList->id}}"></a>
								</div>
                                
							</div>
						</div>
								</div>
							</div>
                           @endforeach
						</div>
						<div class="text-center tt_product_showmore">
                           {!!$productLists->links()!!}
						</div>
                        @else
                        <div class="text-center tt_product_showmore">
                        {{__('webMessage.norecordfound')}}
						</div>
                        @endif 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--footer-->
@include("website.includes.footer")
<!-- modal (quickViewModal) -->
@include("website.includes.quickview_modal")
<!--default modal -->
@include("website.includes.addtocart_modal")

@if(!empty($settingInfo->facebook_pixel))
@if(Request()->sq)
@if($pixelids)
@php
$pixl = json_encode($pixelids);
@endphp
<script>
fbq('track', 'Search', { 
  search_string: '{{Request()->sq}}',
  content_ids: {{$pixl}}, // top 5-10 search results
  content_type: 'product'
});
</script>
@endif
@endif
@endif
<script src="{{url('assets/external/jquery/jquery.min.js')}}"></script>
<script src="{{url('assets/external/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/external/slick/slick.min.js')}}"></script>
<script src="{{url('assets/external/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{url('assets/external/panelmenu/panelmenu.js')}}"></script>
<script src="{{url('assets/external/instafeed/instafeed.min.js')}}"></script>
<script src="{{url('assets/external/countdown/jquery.plugin.min.js')}}"></script>
<script src="{{url('assets/external/countdown/jquery.countdown.min.js')}}"></script>
<script src="{{url('assets/external/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{url('assets/external/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{url('assets/external/lazyLoad/lazyload.min.js')}}"></script>
<script src="{{url('assets/js/main.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script defer src="{{url('hakum_assets/js/bundle.js')}}"></script>
<script src="{{url('assets/js/gulfweb.js')}}"></script>
@if(!empty($settingInfo->facebook_pixel))
<script type="text/javascript">
  $( '.addToCartPixelButton' ).click(function() {
    var id = $(this).attr("id");
	var price = $("#pixel_price_"+id).val();
    fbq('track', 'AddToCart', {
      content_ids: [id],
      content_type: 'product',
      value: price,
      currency: 'USD' 
    });  
  });
</script>
@endif
</body>
</html>