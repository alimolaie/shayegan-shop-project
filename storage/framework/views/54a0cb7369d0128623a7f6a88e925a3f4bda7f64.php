<!--start new items display -->
<?php if($settingInfo->is_new_item_active==1): ?>
<?php
$newitems = App\Http\Controllers\webController::getNewProducts();
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
?>
<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-block-title">
               
				<h1 class="tt-title noborder"><?php echo e(strtoupper(trans('webMessage.latestproducts'))); ?></h1>
              <div class="tt-description">&nbsp;</div>
			</div>
			<div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js">
				<?php $__currentLoopData = $newitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				//$ratingsproducts = App\Http\Controllers\webController::getProductRatings($newitem->id);
				$isStock = App\Http\Controllers\webCartController::IsAvailableQuantity($newitem->id);
				?>
                <div class="col-2 col-md-4 col-lg-3">
                    <div class="tt-product thumbprod-center">
						<div class="tt-image-box">
							<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal" data-tooltip="<?php echo e(__('webMessage.quickview')); ?>" data-tposition="<?php echo e(__('webMessage.align')); ?>" id="<?php echo e($newitem->id); ?>"></a>
							<a href="javascript:;" class="tt-btn-wishlist addtowishlistquick" data-tooltip="<?php echo e(__('webMessage.addtowishlist')); ?>" <?php echo e(__('webMessage.align')); ?> id="<?php echo e($newitem->id); ?>"></a>
							<a href="<?php echo e(url('details/'.$newitem->id.'/'.$newitem->slug)); ?>">
								<span class="tt-img"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($newitem->image): ?> <?php echo e(url('uploads/product/thumb/'.$newitem->image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($newitem->title_en); ?> <?php else: ?> <?php echo e($newitem->title_ar); ?> <?php endif; ?>"></span>
                                <?php if($newitem->rollover_image): ?> 
								<span class="tt-img-roll-over"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($newitem->rollover_image): ?> <?php echo e(url('uploads/product/thumb/'.$newitem->rollover_image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($newitem->title_en); ?> <?php else: ?> <?php echo e($newitem->title_ar); ?> <?php endif; ?>"></span>
                                <?php endif; ?>
								<span class="tt-label-location">
								<?php if(empty($isStock)): ?><span class="tt-label-sale"><?php echo e(__('webMessage.outofstock')); ?></span><?php endif; ?>
								<?php if(!empty($newitem->caption_en)): ?><span class="tt-label-sale" style="background-color:<?php echo e($newitem['caption_color']); ?>;"><?php echo e($newitem['caption_'.$strLang]); ?></span><?php endif; ?>
								</span>
							</a>
                          <!--countdown-->
                         <?php if(!empty($newitem->countdown_datetime) && strtotime($newitem->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 
                         <div class="tt-countdown_box">
								<div class="tt-countdown_inner">
									<div class="tt-countdown" 
                                    data-date="<?php echo e($newitem->countdown_datetime); ?>" 
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
                        <span id="responseMsg-<?php echo e($newitem->id); ?>"></span> 
						    
							<h2 class="tt-title"><a href="<?php echo e(url('details/'.$newitem->id.'/'.$newitem->slug)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($newitem->title_en); ?> <?php else: ?> <?php echo e($newitem->title_ar); ?> <?php endif; ?></a></h2>
							<div class="tt-price">
							<?php if(!empty($newitem->countdown_datetime) && strtotime($newitem->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 	                            <span class="new-price"><?php echo e(__('webMessage.kd')); ?> <?php echo e($newitem->countdown_price); ?></span>
                            <?php if(!empty($newitem->retail_price)): ?>
							<span class="old-price"> <?php echo e(__('webMessage.kd')); ?> <?php echo e($newitem->retail_price); ?> </span>
							<?php endif; ?>
                            <input type="hidden" id="pixel_price_<?php echo e($newitem->id); ?>" value="<?php echo e($newitem->countdown_price); ?>">
                            <?php else: ?>
                            <span class="new-price"> <?php echo e(__('webMessage.kd')); ?> <?php echo e($newitem->retail_price); ?> </span>
                            <input type="hidden" id="pixel_price_<?php echo e($newitem->id); ?>" value="<?php echo e($newitem->retail_price); ?>">
						    <?php if(!empty($newitem->old_price)): ?>
							<span class="old-price"> <?php echo e(__('webMessage.kd')); ?> <?php echo e($newitem->old_price); ?> </span>
							<?php endif; ?>
                            <?php endif; ?>
							</div>
							<div class="tt-product-inside-hover">
								<div class="tt-row-btn">
                                    <?php if($newitem->is_attribute): ?>
                                    <a href="<?php echo e(url('details/'.$newitem->id.'/'.$newitem->slug)); ?>" class="tt-btn-addtocart thumbprod-button-bg" id="<?php echo e($newitem->id); ?>"><?php echo e(__('webMessage.details')); ?></a>
                                    <?php else: ?>
									<?php if(!empty($isStock)): ?>
                                    <?php if($newitem->is_active=='2'): ?>
                                    <a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="<?php echo e($newitem->id); ?>"><?php echo e(__('webMessage.preorder')); ?></a>
                                    <?php else: ?>
									<a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="<?php echo e($newitem->id); ?>"><?php echo e(__('webMessage.addtocart_btn')); ?></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
									<?php endif; ?>
								</div>
								<div class="tt-row-btn">
									<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal"  id="<?php echo e($newitem->id); ?>"></a>
									<?php if(!empty($isStock)): ?>
									<a href="javascript:;"  class="tt-btn-wishlist addtocartsingle addToCartPixelButton" id="<?php echo e($newitem->id); ?>"></a>
								    <?php endif; ?>
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
<!--end new items display -->    
<?php
$homesetions = App\Http\Controllers\webController::getSections();
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
?>

<?php if($settingInfo->theme==1 || $settingInfo->theme==4 || $settingInfo->theme==5  || $settingInfo->theme==6): ?>

<?php if(!empty($homesetions)): ?>
<?php $__currentLoopData = $homesetions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homesetion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$homesetionsprods = App\Http\Controllers\webController::getSectionsProducts($homesetion->id);
?>
<?php if(!empty($homesetionsprods) && count($homesetionsprods)>0): ?>
<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-block-title">
               
				<h1 class="tt-title noborder"><a href="<?php echo e(url('allsections/'.$homesetion->id.'/'.$homesetion->slug)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e(strtoupper($homesetion->title_en)); ?> <?php else: ?> <?php echo e($homesetion->title_ar); ?> <?php endif; ?></a></h1>
              <div class="tt-description">&nbsp;</div>
			</div>
			<div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js">
				<?php $__currentLoopData = $homesetionsprods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homesetionsprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				//$ratingsproducts = App\Http\Controllers\webController::getProductRatings($homesetionsprod->id);
				$isStock = App\Http\Controllers\webCartController::IsAvailableQuantity($homesetionsprod->id);
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
								<?php if(empty($isStock)): ?><span class="tt-label-sale"><?php echo e(__('webMessage.outofstock')); ?></span><?php endif; ?>
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
						    
							<h2 class="tt-title"><a href="<?php echo e(url('details/'.$homesetionsprod->id.'/'.$homesetionsprod->slug)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($homesetionsprod->title_en); ?> <?php else: ?> <?php echo e($homesetionsprod->title_ar); ?> <?php endif; ?></a></h2>
							<div class="tt-price">
							<?php if(!empty($homesetionsprod->countdown_datetime) && strtotime($homesetionsprod->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 	                            <span class="new-price"><?php echo e(__('webMessage.kd')); ?> <?php echo e($homesetionsprod->countdown_price); ?></span>
                            <?php if(!empty($homesetionsprod->retail_price)): ?>
							<span class="old-price"> <?php echo e(__('webMessage.kd')); ?> <?php echo e($homesetionsprod->retail_price); ?> </span>
							<?php endif; ?>
                            <input type="hidden" id="pixel_price_<?php echo e($homesetionsprod->id); ?>" value="<?php echo e($homesetionsprod->countdown_price); ?>">
                            <?php else: ?>
                            <span class="new-price"> <?php echo e(__('webMessage.kd')); ?> <?php echo e($homesetionsprod->retail_price); ?> </span>
                            <input type="hidden" id="pixel_price_<?php echo e($homesetionsprod->id); ?>" value="<?php echo e($homesetionsprod->retail_price); ?>">
						    <?php if(!empty($homesetionsprod->old_price)): ?>
							<span class="old-price"> <?php echo e(__('webMessage.kd')); ?> <?php echo e($homesetionsprod->old_price); ?> </span>
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
                                    <a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="<?php echo e($homesetionsprod->id); ?>"><?php echo e(__('webMessage.preorder')); ?></a>
                                    <?php else: ?>
									<a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="<?php echo e($homesetionsprod->id); ?>"><?php echo e(__('webMessage.addtocart_btn')); ?></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
									<?php endif; ?>
								</div>
								<div class="tt-row-btn">
									<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal"  id="<?php echo e($homesetionsprod->id); ?>"></a>
									<?php if(!empty($isStock)): ?>
									<a href="javascript:;"  class="tt-btn-wishlist addtocartsingle addToCartPixelButton" id="<?php echo e($homesetionsprod->id); ?>"></a>
								    <?php endif; ?>
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
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
 <?php endif; ?>   
 <?php endif; ?>
 <?php if($settingInfo->theme==2): ?>
 <?php if(!empty($homesetions)): ?>
<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-tab-wrapper text-center">
				<ul class="nav nav-tabs tt-tabs-default text-center" role="tablist">
                    <?php $__currentLoopData = $homesetions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$homesetion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$homesetionsprodsTab = App\Http\Controllers\webController::getSectionsProducts($homesetion->id);
?>
<?php if(!empty($homesetionsprodsTab) && count($homesetionsprodsTab)>0): ?>
					<li class="nav-item">
						<a class="nav-link  <?php if($key==0): ?> active <?php endif; ?>" data-toggle="tab" href="#tt-tab01-<?php echo e($homesetion->id); ?>"><?php if(app()->getLocale()=="en" && !empty($homesetion->title_en)): ?> <?php echo e(strtoupper($homesetion->title_en)); ?> <?php elseif(app()->getLocale()=="ar" && !empty($homesetion->title_ar)): ?> <?php echo e($homesetion->title_ar); ?> <?php endif; ?></a>
					</li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
				<div class="tab-content">
                <?php $__currentLoopData = $homesetions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$homesetion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="tab-pane <?php if($key==0): ?> active <?php endif; ?>" id="tt-tab01-<?php echo e($homesetion->id); ?>">
						<div class="row arrow-location-tab tt-layout-product-item">
 <?php
$homesetionsprods = App\Http\Controllers\webController::getSectionsProducts($homesetion->id);
?>
<?php if(!empty($homesetionsprods) && count($homesetionsprods)>0): ?>
                <?php $__currentLoopData = $homesetionsprods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homesetionsprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				//$ratingsproducts = App\Http\Controllers\webController::getProductRatings($homesetionsprod->id);
				$isStock = App\Http\Controllers\webCartController::IsAvailableQuantity($homesetionsprod->id);
				?>
							<div class="col-6 col-md-4 col-lg-3">
								<div class="tt-product product-nohover">
									<div class="tt-image-box">
							<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal" data-tooltip="<?php echo e(__('webMessage.quickview')); ?>" data-tposition="<?php echo e(__('webMessage.align')); ?>" id="<?php echo e($homesetionsprod->id); ?>"></a>
							<a href="javascript:;" class="tt-btn-wishlist addtowishlistquick" data-tooltip="<?php echo e(__('webMessage.addtowishlist')); ?>" <?php echo e(__('webMessage.align')); ?> id="<?php echo e($homesetionsprod->id); ?>"></a>
							<a href="<?php echo e(url('details/'.$homesetionsprod->id.'/'.$homesetionsprod->slug)); ?>">
								<span class="tt-img"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($homesetionsprod->image): ?> <?php echo e(url('uploads/product/thumb/'.$homesetionsprod->image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($homesetionsprod->title_en); ?> <?php else: ?> <?php echo e($homesetionsprod->title_ar); ?> <?php endif; ?>"></span>
                                <?php if($homesetionsprod->rollover_image): ?> 
								<span class="tt-img-roll-over"><img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php if($homesetionsprod->rollover_image): ?> <?php echo e(url('uploads/product/thumb/'.$homesetionsprod->rollover_image)); ?> <?php else: ?> <?php echo e(url('uploads/no-image.png')); ?> <?php endif; ?>" alt="<?php if(app()->getLocale()=='en'): ?> <?php echo e($homesetionsprod->title_en); ?> <?php else: ?> <?php echo e($homesetionsprod->title_ar); ?> <?php endif; ?>"></span>
                                <?php endif; ?>
								<span class="tt-label-location">
								<?php if(empty($isStock)): ?><span class="tt-label-sale"><?php echo e(__('webMessage.outofstock')); ?></span><?php endif; ?>
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
						    
							<h2 class="tt-title tt-title-custom"><a href="<?php echo e(url('details/'.$homesetionsprod->id.'/'.$homesetionsprod->slug)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($homesetionsprod->title_en); ?> <?php else: ?> <?php echo e($homesetionsprod->title_ar); ?> <?php endif; ?></a></h2>
							<div class="tt-price">
							<?php if(!empty($homesetionsprod->countdown_datetime) && strtotime($homesetionsprod->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 	                            <span class="new-price"><?php echo e(__('webMessage.kd')); ?> <?php echo e($homesetionsprod->countdown_price); ?></span>
                            <?php if(!empty($homesetionsprod->retail_price)): ?>
							<span class="old-price"> <?php echo e(__('webMessage.kd')); ?> <?php echo e($homesetionsprod->retail_price); ?> </span>
							<?php endif; ?>
                            <input type="hidden" id="pixel_price_<?php echo e($homesetionsprod->id); ?>" value="<?php echo e($homesetionsprod->countdown_price); ?>">
                            <?php else: ?>
                            <span class="new-price"> <?php echo e(__('webMessage.kd')); ?> <?php echo e($homesetionsprod->retail_price); ?> </span>
                            <input type="hidden" id="pixel_price_<?php echo e($homesetionsprod->id); ?>" value="<?php echo e($homesetionsprod->retail_price); ?>">
						    <?php if(!empty($homesetionsprod->old_price)): ?>
							<span class="old-price"> <?php echo e(__('webMessage.kd')); ?> <?php echo e($homesetionsprod->old_price); ?> </span>
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
                                    <a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="<?php echo e($homesetionsprod->id); ?>"><?php echo e(__('webMessage.preorder')); ?></a>
                                    <?php else: ?>
									<a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle addToCartPixelButton" id="<?php echo e($homesetionsprod->id); ?>"><?php echo e(__('webMessage.addtocart_btn')); ?></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
									<?php endif; ?>
								</div>
								<div class="tt-row-btn">
									<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal"  id="<?php echo e($homesetionsprod->id); ?>"></a>
									<?php if(!empty($isStock)): ?>
									<a href="javascript:;"  class="tt-btn-wishlist addtocartsingle addToCartPixelButton" id="<?php echo e($homesetionsprod->id); ?>"></a>
								    <?php endif; ?>
								</div>
                                
							</div>
						</div>
								</div>
							</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>  
							
						</div>
					</div>
					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					
				</div>
			</div>
		</div>
	</div>
   <?php endif; ?> 
 <?php endif; ?><?php /**PATH /home/kashkha/private/resources/views/website/includes/homesection.blade.php ENDPATH**/ ?>