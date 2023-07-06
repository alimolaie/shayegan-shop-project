<?php
$settingInfo = App\Http\Controllers\webController::settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?></title>
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
    <!--web push notification -->
    <script type='text/javascript' src='https://www.gstatic.com/firebasejs/7.4.0/firebase-app.js'></script>
    <script type='text/javascript' src='https://www.gstatic.com/firebasejs/7.4.0/firebase-messaging.js'></script>
    <script type='text/javascript' src='https://www.gstatic.com/firebasejs/7.4.0/firebase-analytics.js'></script>
    <script type='text/javascript' src='https://code.jquery.com/jquery-3.3.1.js'></script>
    <script src="<?php echo e(url('assets/webpush/webpush.js')); ?>"></script>
    <?php if($settingInfo->logo): ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "<?php echo e(url('/')); ?>",
      "logo": "<?php echo e(url('uploads/logo/'.$settingInfo->logo)); ?>"
    }
    </script>
    <?php endif; ?>
</head>
<body>  
<!--preloader -->
<?php echo $__env->make("website.includes.preloader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- top header -->
<?php echo $__env->make("website.includes.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="tt-pageContent">
<!--home slideshow -->
<?php echo $__env->make("website.includes.slideshow", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--load theme start -->
<?php
$homesetions = App\Http\Controllers\webController::getSections();
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
?>

<?php if(!empty($homesetions)): ?>
<?php $__currentLoopData = $homesetions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homesetion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if($homesetion->section_type=="static" && $homesetion->key_name=="shop_by_category"): ?>
<?php echo $__env->make("website.includes.shop_by_categories_scrolling", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($homesetion->section_type=="static" && $homesetion->key_name=="latest_product"): ?>
<?php echo $__env->make("website.includes.latestproducts", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($homesetion->section_type=="static" && $homesetion->key_name=="favorite_brands"): ?>
<?php echo $__env->make("website.includes.shop_by_brands_scrolling", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($homesetion->section_type=="static" && $homesetion->key_name=="shop_by_brands"): ?>
<?php echo $__env->make("website.includes.best_seller_by_brands", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($homesetion->section_type=="static" && $homesetion->key_name=="banner"): ?>
<?php echo $__env->make("website.includes.banner", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($homesetion->section_type=="static" && $homesetion->key_name=="short_text_boxes"): ?>
<?php echo $__env->make("website.includes.homeshorttext", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>

<?php
$homesetionsprods = App\Http\Controllers\webController::getSectionsProducts($homesetion->id);
?>
<?php if(!empty($homesetionsprods) && count($homesetionsprods)>0): ?>
<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-block-title">
				<h1 class="tt-title noborder"><a <?php if($settingInfo->theme==7): ?> style="color:#000; text-decoration:none !important;" <?php endif; ?> href="<?php echo e(url('allsections/'.$homesetion->id.'/'.$homesetion->slug)); ?>"><?php if(app()->getLocale()=="en"): ?><?php echo e(strtoupper($homesetion->title_en)); ?><?php else: ?><?php echo e($homesetion->title_ar); ?><?php endif; ?></a></h1>
              <div class="tt-description">&nbsp;</div>
			</div>
			<div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js">
            <?php $tagsDetails=''; ?>
				<?php $__currentLoopData = $homesetionsprods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homesetionsprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				$isStock = App\Http\Controllers\webCartController::IsAvailableQuantity($homesetionsprod->id);
                $tagsDetails = App\Http\Controllers\webCartController::getTagsName($homesetionsprod->tags_en,$homesetionsprod->tags_ar);
				?>
                <div class="col-2 col-md-4 col-lg-3">
                    <div class="tt-product thumbprod-center">
						<div class="tt-image-box">
							<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal" data-tooltip="<?php echo e(__('webMessage.quickview')); ?>" data-tposition="<?php echo e(__('webMessage.align')); ?>" id="<?php echo e($homesetionsprod->id); ?>"></a>
							<a href="javascript:;" class="tt-btn-wishlist addtowishlistquick" data-tooltip="<?php echo e(__('webMessage.addtowishlist')); ?>" <?php echo e(__('webMessage.align')); ?> id="<?php echo e($homesetionsprod->id); ?>"></a>
							<a href="<?php echo e(url('details/'.$homesetionsprod->id.'/'.$homesetionsprod->slug)); ?>">
								<span class="tt-img"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($homesetionsprod->image): ?> <?php echo e(url('uploads/product/thumb/'.$homesetionsprod->image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($homesetionsprod->title_en); ?> <?php else: ?> <?php echo e($homesetionsprod->title_ar); ?> <?php endif; ?>"></span>
                                <?php if($homesetionsprod->rollover_image): ?> 
								<span class="tt-img-roll-over"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($homesetionsprod->rollover_image): ?> <?php echo e(url('uploads/product/thumb/'.$homesetionsprod->rollover_image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($homesetionsprod->title_en); ?> <?php else: ?> <?php echo e($homesetionsprod->title_ar); ?> <?php endif; ?>"></span>
                                <?php endif; ?>
								<span class="tt-label-location">
								<?php if(empty($isStock)): ?><span class="tt-label-sale" style="background-color:#000000;color:#ffffff;"><?php echo e(__('webMessage.outofstock')); ?></span><?php endif; ?>
								<?php if(!empty($homesetionsprod->caption_en)): ?><span class="tt-label-sale" style="background-color:<?php echo e($homesetionsprod['caption_color']); ?>;"><?php echo e($homesetionsprod['caption_'.$strLang]); ?></span><?php endif; ?>
								</span>
							</a>
                          <!--countdown-->
                         <?php if(!empty($homesetionsprod->countdown_datetime) && strtotime($homesetionsprod->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 
                         <div class="tt-countdown_box">
								<div class="tt-countdown_inner">
									<div class="tt-countdown" 
                                    data-date="<?php echo e($homesetionsprod->countdown_datetime); ?>" 
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
                        <span id="responseMsg-<?php echo e($homesetionsprod->id); ?>"></span> 
							<h2 class="tt-title" style="min-height:70px;"><a href="<?php echo e(url('details/'.$homesetionsprod->id.'/'.$homesetionsprod->slug)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($homesetionsprod->title_en); ?> <?php else: ?> <?php echo e($homesetionsprod->title_ar); ?> <?php endif; ?></a></h2>
                            <?php if(!empty($tagsDetails)): ?><?php echo $tagsDetails; ?><?php endif; ?>
							<div class="tt-price">
							<?php if(!empty($homesetionsprod->countdown_datetime) && strtotime($homesetionsprod->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 	                            <span class="new-price"><?php echo e($homesetionsprod->countdown_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <?php if(!empty($homesetionsprod->retail_price)): ?><br />
							<span class="old-price"> <?php echo e($homesetionsprod->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
							<?php endif; ?>
                            <input type="hidden" id="pixel_price_<?php echo e($homesetionsprod->id); ?>" value="<?php echo e($homesetionsprod->countdown_price); ?>">
                            <?php else: ?>
                            <span class="new-price">  <?php echo e($homesetionsprod->retail_price); ?> <?php echo e(__('webMessage.kd')); ?> </span>
                            <input type="hidden" id="pixel_price_<?php echo e($homesetionsprod->id); ?>" value="<?php echo e($homesetionsprod->retail_price); ?>">
						    <?php if(!empty($homesetionsprod->old_price)): ?><br />
							<span class="old-price"> <?php echo e($homesetionsprod->old_price); ?> <?php echo e(__('webMessage.kd')); ?> </span>
							<?php endif; ?>
                            <?php endif; ?>
							</div>
							<div class="tt-product-inside-hover">
								<div class="tt-row-btn">
                                    <?php if($homesetionsprod->is_attribute): ?>
                                    <a href="<?php echo e(url('details/'.$homesetionsprod->id.'/'.$homesetionsprod->slug)); ?>" class="tt-btn-addtocart thumbprod-button-bg" id="<?php echo e($homesetionsprod->id); ?>"><?php echo e(__('webMessage.details')); ?></a>
                                    <?php else: ?>
									<?php if(!empty($isStock)): ?>
                                    <?php if($homesetionsprod->is_active=='2'): ?>
                                    <a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle <?php if(!empty($settingInfo->facebook_pixel)): ?> addToCartPixelButton <?php endif; ?>" id="<?php echo e($homesetionsprod->id); ?>"><?php echo e(__('webMessage.preorder')); ?></a>
                                    <?php else: ?>
									<a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle <?php if(!empty($settingInfo->facebook_pixel)): ?> addToCartPixelButton <?php endif; ?>" id="<?php echo e($homesetionsprod->id); ?>"><?php echo e(__('webMessage.addtocart_btn')); ?></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
									<?php endif; ?>
								</div>
								<div class="tt-row-btn">
									<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal"  id="<?php echo e($homesetionsprod->id); ?>"></a>
									<a href="javascript:;"  class="tt-btn-wishlist addtowishlistquick" id="<?php echo e($homesetionsprod->id); ?>"></a>
								</div>
                                
							</div>
						</div>
					</div>
					
				</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
 <?php endif; ?>  
 <?php endif; ?>  
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
 <?php endif; ?>
<!--end load theme -->
</div>
<!--footer -->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
<!-- modal (AddToCartProduct) -->
<?php echo $__env->make("website.includes.addtocart_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- modal (quickViewModal) -->
<?php echo $__env->make("website.includes.quickview_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

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
</html><?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/website/theme/theme1.blade.php ENDPATH**/ ?>