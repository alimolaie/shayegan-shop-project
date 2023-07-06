<?php
$brandBestSellers = App\Http\Controllers\webController::BestSellerBrandsList();
?>

<?php if(!empty($settingInfo->is_brand_active) && !empty($brandBestSellers) && count($brandBestSellers)>0): ?>
<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
            <div class="tt-block-title">
               <?php if($settingInfo->theme==2): ?>
				<h3 class="tt-title tt-title-span"><span><a href="<?php echo e(!empty($link)?$link:'#'); ?>"><?php echo e(strtoupper(trans('webMessage.bestsellerof'))); ?></a></span></h3>
                <?php else: ?> 
                <h1 class="tt-title noborder "><a href="<?php echo e(!empty($link)?$link:'#'); ?>"><?php echo e(strtoupper(trans('webMessage.bestsellerof'))); ?></a></h1>
                <?php endif; ?>
              <div class="tt-description">&nbsp;</div>
              <br clear="all" /><br clear="all" />
			</div>
           
			<div class="tt-tab-wrapper text-center">
				<ul class="nav nav-tabs tt-tabs-default text-center" role="tablist">
                    <?php $__currentLoopData = $brandBestSellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$brandBestSeller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


					<li class="nav-item">
						<a class="nav-link  <?php if($key==0): ?> active <?php endif; ?>" data-toggle="tab" href="#tt-tab01-<?php echo e($brandBestSeller->id); ?>"><?php if(app()->getLocale()=="en" && !empty($brandBestSeller->title_en)): ?> <?php echo e(strtoupper($brandBestSeller->title_en)); ?> <?php elseif(app()->getLocale()=="ar" && !empty($brandBestSeller->title_ar)): ?> <?php echo e($brandBestSeller->title_ar); ?> <?php endif; ?></a>
					</li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
				<div class="tab-content">
                <?php $__currentLoopData = $brandBestSellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$brandBestSellery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="tab-pane <?php if($key==0): ?> active <?php endif; ?>" id="tt-tab01-<?php echo e($brandBestSellery->id); ?>">
						<div class="row arrow-location-tab tt-layout-product-item">
 <?php
$homesetionsprods = App\Http\Controllers\webController::getBrandsProducts($brandBestSellery->id);
?>
<?php if(!empty($homesetionsprods) && count($homesetionsprods)>0): ?>
                <?php $tagsDetails=''; ?>
                <?php $__currentLoopData = $homesetionsprods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homesetionsprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				$isStock = App\Http\Controllers\webCartController::IsAvailableQuantity($homesetionsprod->id);
                $tagsDetails = App\Http\Controllers\webCartController::getTagsName($homesetionsprod->tags_en,$homesetionsprod->tags_ar);
				?>
							<div class="col-6 col-md-4 col-lg-3">
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
									<div class="tt-description" >
                        <span id="responseMsg-<?php echo e($homesetionsprod->id); ?>"></span> 
						    
							<h2 class="tt-title tt-title-custom"><a href="<?php echo e(url('details/'.$homesetionsprod->id.'/'.$homesetionsprod->slug)); ?>"><?php if(app()->getLocale()=="en"): ?><?php echo e($homesetionsprod->title_en); ?><?php else: ?><?php echo e($homesetionsprod->title_ar); ?><?php endif; ?></a></h2>
                            <?php if(!empty($tagsDetails)): ?><?php echo $tagsDetails; ?><?php endif; ?>
							<div class="tt-price">
							<?php if(!empty($homesetionsprod->countdown_datetime) && strtotime($homesetionsprod->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 	 
							<span class="new-price price_red"><?php echo e($homesetionsprod->countdown_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <input type="hidden" id="pixel_price_<?php echo e($homesetionsprod->id); ?>" value="<?php echo e($homesetionsprod->countdown_price); ?>">
                            <span class="old-price price_black"><?php echo e($homesetionsprod->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <?php else: ?>
                            <span class="new-price <?php if($homesetionsprod->old_price): ?> price_red <?php endif; ?>"><?php echo e($homesetionsprod->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <input type="hidden" id="pixel_price_<?php echo e($homesetionsprod->id); ?>" value="<?php echo e($homesetionsprod->retail_price); ?>">
						    <?php if(!empty($homesetionsprod->old_price)): ?>
							<span class="old-price price_black"><?php echo e($homesetionsprod->old_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
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
									<a href="javascript:;"  class="tt-btn-wishlist addtowishlistquick" id="<?php echo e($homesetionsprod->id); ?>"></a>
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
    <?php endif; ?><?php /**PATH /home/kashkha/private/resources/views/website/includes/best_seller_by_brands.blade.php ENDPATH**/ ?>