<?php
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.searchResults')); ?></title>
<meta name="description" content="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->seo_description_en); ?> <?php else: ?> <?php echo e($settingInfo->seo_description_ar); ?> <?php endif; ?>" />
<meta name="abstract" content="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->seo_description_en); ?> <?php else: ?> <?php echo e($settingInfo->seo_description_ar); ?> <?php endif; ?>">
<meta name="keywords" content="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->seo_keywords_en); ?> <?php else: ?> <?php echo e($settingInfo->seo_keywords_ar); ?> <?php endif; ?>" />
<meta name="Copyright" content="<?php echo e($settingInfo->name_en); ?>, Kuwait Copyright 2020 - <?php echo e(date('Y')); ?>" />
<META NAME="Geography" CONTENT="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->address_en); ?> <?php else: ?> <?php echo e($settingInfo->address_ar); ?> <?php endif; ?>">
<?php if($settingInfo->extra_meta_tags): ?> <?php echo $settingInfo->extra_meta_tags; ?> <?php endif; ?>
<?php if($settingInfo->favicon): ?>
<link rel="icon" href="<?php echo e(url('uploads/logo/'.$settingInfo->favicon)); ?>">
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php echo $__env->make("website.includes.css", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
<!--preloader -->
<?php echo $__env->make("website.includes.preloader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end preloader -->
<!--header -->
<?php echo $__env->make("website.includes.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end header -->
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('webMessage.home')); ?></a></li>
			<li><a href="javascript:;"><?php echo e(__('webMessage.searchResults')); ?></a></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="row">
				<?php echo $__env->make('website.includes.search_filter_left_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="col-md-12">
					<div class="content-indent">
						<div class="tt-filters-options desctop-no-sidebar">
							<h1 class="tt-title">
								<?php echo e(__('webMessage.searchResults')); ?> <span class="tt-title-total">(<?php echo e(count($productLists)); ?>)</span>
							</h1>
                           
							<div class="tt-btn-toggle">
								<a href="javascript:;"><?php echo e(strtoupper(__('webMessage.filter'))); ?></a>
							</div>
                           
                            
							<div class="tt-sort">
						<select name="search_sort_by" id="search_sort_by">
                        <option value=""><?php echo e(__('webMessage.latestitems')); ?></option>
                        <option value="popular" <?php if(Cookie::get('search_sort_by')=="popular"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.mostpopular')); ?></option>
						<option value="max-price" <?php if(Cookie::get('search_sort_by')=="max-price"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.max_price')); ?></option>
						<option value="min-price" <?php if(Cookie::get('search_sort_by')=="min-price"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.min_price')); ?></option>
						<option value="a-z" <?php if(Cookie::get('search_sort_by')=="a-z"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.atoz')); ?></option>
                        <option value="z-a" <?php if(Cookie::get('search_sort_by')=="z-a"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.ztoa')); ?></option>
						</select>
						<select name="search_per_page" id="search_per_page">
						<option value="12" <?php if(Cookie::get('search_per_page')=="12"): ?> selected <?php endif; ?>><?php echo e(__('webMessage.show')); ?></option>
						<option value="24" <?php if(Cookie::get('search_per_page')=="24"): ?> selected <?php endif; ?>>24</option>
						<option value="48" <?php if(Cookie::get('search_per_page')=="48"): ?> selected <?php endif; ?>>48</option>
						<option value="96" <?php if(Cookie::get('search_per_page')=="96"): ?> selected <?php endif; ?>>96</option>
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
                        <?php if(!empty($productLists) && count($productLists)>0): ?>
						<div class="tt-product-listing row">
                         <?php $tagsDetails=''; ?>
                        <?php $__currentLoopData = $productLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
                        $pixelids[]=$productList->id;
						$isStock = App\Http\Controllers\webCartController::IsAvailableQuantity($productList->id);
                        $tagsDetails = App\Http\Controllers\webCartController::getTagsName($productList->tags_en,$productList->tags_ar);
						?>
							<div class="col-6 col-md-4 <?php echo e($boxlist); ?> tt-col-item">
								<div class="tt-product thumbprod-center">
									<div class="tt-image-box">
										<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal" data-tooltip="<?php echo e(__('webMessage.quickview')); ?>" <?php echo e(__('webMessage.align')); ?> id="<?php echo e($productList->id); ?>"></a>
							<a href="javascript:;" class="tt-btn-wishlist addtowishlistquick" data-tooltip="<?php echo e(__('webMessage.addtowishlist')); ?>" <?php echo e(__('webMessage.align')); ?> id="<?php echo e($productList->id); ?>"></a>
							<a href="<?php echo e(url('details/'.$productList->id.'/'.$productList->slug)); ?>">
								<span class="tt-img"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($productList->image): ?> <?php echo e(url('uploads/product/thumb/'.$productList->image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($productList->title_en); ?> <?php else: ?> <?php echo e($productList->title_ar); ?> <?php endif; ?>"></span>
                                <?php if($productList->rollover_image): ?> 
								<span class="tt-img-roll-over"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($productList->rollover_image): ?> <?php echo e(url('uploads/product/thumb/'.$productList->rollover_image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($productList->title_en); ?> <?php else: ?> <?php echo e($productList->title_ar); ?> <?php endif; ?>"></span>
                                <?php endif; ?>
								<span class="tt-label-location">
								<?php if(empty($isStock)): ?><span class="tt-label-sale"><?php echo e(__('webMessage.outofstock')); ?></span><?php endif; ?>
								<?php if(!empty($productList->caption_en) && $strLang=="en"): ?> 
                                <span class="tt-label" style="background-color:<?php echo e($productList->caption_color); ?>;color:#fff;border-radius:5px;font-size:12px;padding:3px;"><?php echo e($productList->caption_en); ?></span> 
                                <?php else: ?> 
                                <span class="tt-label" style="background-color:<?php echo e($productList->caption_color); ?>;color:#fff;border-radius:5px;font-size:12px;padding:3px;"><?php echo e($productList->caption_ar); ?> </span> 
                                <?php endif; ?>
								</span>
							</a>
                            <!--countdown-->
                         <?php if(!empty($productList->countdown_datetime) && strtotime($productList->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 
                         <div class="tt-countdown_box">
								<div class="tt-countdown_inner">
									<div class="tt-countdown" 
                                    data-date="<?php echo e($productList->countdown_datetime); ?>" 
                                    data-year="<?php echo e(__('webMessage.Yrs')); ?>" 
                                    data-month="<?php echo e(__('webMessage.Mths')); ?>" 
                                    data-week="<?php echo e(__('webMessage.Wk')); ?>" 
                                    data-day="<?php echo e(__('webMessage.Day')); ?>" 
                                    data-hour="<?php echo e(__('webMessage.Hrs')); ?>" 
                                    data-minute="<?php echo e(__('webMessage.Min')); ?>" 
                                    data-second="<?php echo e(__('webMessage.Sec')); ?>">
                                    </div>
								</div>
						 </div>
                         <?php endif; ?>  
                         <!--end countdown-->
									</div>
									<div class="tt-description">
                        <span id="responseMsg-<?php echo e($productList->id); ?>"></span> 
							
							<h2 class="tt-title"><a href="<?php echo e(url('details/'.$productList->id.'/'.$productList->slug)); ?>"><?php echo Common::getLangString($productList->title_en,$productList->title_ar); ?><?php echo Common::getLangStringExtra($productList->extra_title_en,$productList->extra_title_ar); ?></a></h2>
                            <?php if(!empty($tagsDetails)): ?><?php echo $tagsDetails; ?><?php endif; ?>
							<div class="tt-price">
							<?php if(!empty($productList->countdown_datetime) && strtotime($productList->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 	 
							<span class="new-price price_red"><?php echo e($productList->countdown_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <input type="hidden" id="pixel_price_<?php echo e($productList->id); ?>" value="<?php echo e($productList->countdown_price); ?>">
                            <span class="old-price price_black"><?php echo e($productList->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <?php else: ?>
                            <span class="new-price <?php if($productList->old_price): ?> price_red <?php endif; ?>"><?php echo e($productList->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <input type="hidden" id="pixel_price_<?php echo e($productList->id); ?>" value="<?php echo e($productList->retail_price); ?>">
						    <?php if(!empty($productList->old_price)): ?>
							<span class="old-price price_black"><?php echo e($productList->old_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
							<?php endif; ?>
                            <?php endif; ?>
							</div>
							<div class="tt-product-inside-hover">
								<div class="tt-row-btn">
                                    <?php if($productList->is_attribute): ?>
                                    <a href="<?php echo e(url('details/'.$productList->id.'/'.$productList->slug)); ?>" class="tt-btn-addtocart thumbprod-button-bg" id="<?php echo e($productList->id); ?>"><?php echo e(__('webMessage.details')); ?></a>
                                    <?php else: ?>
                                     <?php if(!empty($isStock)): ?>
									<?php if($productList->is_active=='2'): ?>
									<a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="<?php echo e($productList->id); ?>"><?php echo e(__('webMessage.preorder')); ?></a>
                                    <?php else: ?>
                                    <a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="<?php echo e($productList->id); ?>"><?php echo e(__('webMessage.addtocart_btn')); ?></a>
                                    <?php endif; ?>
									<?php endif; ?>
                                    <?php endif; ?>
								</div>
								<div class="tt-row-btn">
									<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal"  id="<?php echo e($productList->id); ?>"></a>
									<a href="javascript:;"  class="tt-btn-wishlist addtowishlistquick" id="<?php echo e($productList->id); ?>"></a>
								</div>
                                
							</div>
						</div>
								</div>
							</div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="text-center tt_product_showmore">
                           <?php echo $productLists->links(); ?>

						</div>
                        <?php else: ?>
                        <div class="text-center tt_product_showmore">
                        <?php echo e(__('webMessage.norecordfound')); ?>

						</div>
                        <?php endif; ?> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--footer-->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- modal (quickViewModal) -->
<?php echo $__env->make("website.includes.quickview_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--default modal -->
<?php echo $__env->make("website.includes.addtocart_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(!empty($settingInfo->facebook_pixel)): ?>
<?php if(Request()->sq): ?>
<?php if($pixelids): ?>
<?php
$pixl = json_encode($pixelids);
?>
<script>
fbq('track', 'Search', { 
  search_string: '<?php echo e(Request()->sq); ?>',
  content_ids: <?php echo e($pixl); ?>, // top 5-10 search results
  content_type: 'product'
});
</script>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<script src="<?php echo e(url('assets/external/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/slick/slick.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/panelmenu/panelmenu.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/instafeed/instafeed.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/countdown/jquery.plugin.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/countdown/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/rs-plugin/js/jquery.themepunch.tools.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/rs-plugin/js/jquery.themepunch.revolution.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/lazyLoad/lazyload.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/main.js')); ?>"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>
<?php if(!empty($settingInfo->facebook_pixel)): ?>
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
<?php endif; ?>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/search.blade.php ENDPATH**/ ?>