<!--start new items display -->
<?php if($settingInfo->is_new_item_active==1): ?>
<?php
$newitems = App\Http\Controllers\webController::getNewProducts();
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
?>
<?php if(!empty($newitems) && count($newitems)>0): ?>
<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-block-title">
                <?php if($settingInfo->theme!=2): ?>
				<h1 class="tt-title noborder"><a href="<?php echo e(!empty($link)?$link:'#'); ?>"><?php echo e(strtoupper(trans('webMessage.latestproducts'))); ?></a></h1>
                <?php else: ?>
                <h3 class="tt-title tt-title-span"><span><a href="<?php echo e(!empty($link)?$link:'#'); ?>"><?php echo e(trans('webMessage.latestproducts')); ?></a></span></h3>
                <?php endif; ?>
                
              <div class="tt-description">&nbsp;</div>
			</div>
			<div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js">
                <?php $tagsDetails=''; ?>
				<?php $__currentLoopData = $newitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				$isStock = App\Http\Controllers\webCartController::IsAvailableQuantity($newitem->id);
                $tagsDetails = App\Http\Controllers\webCartController::getTagsName($newitem->tags_en,$newitem->tags_ar);
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
								<?php if(empty($isStock)): ?><span class="tt-label-sale" style="background-color:#000000;color:#ffffff;"><?php echo e(strtoupper(__('webMessage.outofstock'))); ?></span><?php endif; ?>
                                <span class="tt-label-sale price_new"><?php echo e(__('webMessage.new')); ?></span>
								<?php if(!empty($newitem->caption_en)): ?><span class="tt-label-sale" style="background-color:<?php echo e($newitem['caption_color']); ?>;"><?php echo e(strtoupper($newitem['caption_'.$strLang])); ?></span><?php endif; ?>
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
						    
							<h2 class="tt-title" style="min-height:50px;"><a href="<?php echo e(url('details/'.$newitem->id.'/'.$newitem->slug)); ?>"><?php echo Common::getLangString($newitem->title_en,$newitem->title_ar); ?><?php echo Common::getLangStringExtra($newitem->extra_title_en,$newitem->extra_title_ar); ?></a></h2>
                            <?php if(!empty($tagsDetails)): ?><?php echo $tagsDetails; ?><?php endif; ?>
							<div class="tt-price">
							<?php if(!empty($newitem->countdown_datetime) && strtotime($newitem->countdown_datetime)>strtotime(date('Y-m-d'))): ?> 	 
							<span class="new-price price_red"><?php echo e($newitem->countdown_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <input type="hidden" id="pixel_price_<?php echo e($newitem->id); ?>" value="<?php echo e($newitem->countdown_price); ?>">
                            <span class="old-price price_black"><?php echo e($newitem->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <?php else: ?>
                            <span class="new-price <?php if($newitem->old_price): ?> price_red <?php endif; ?>"><?php echo e($newitem->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                            <input type="hidden" id="pixel_price_<?php echo e($newitem->id); ?>" value="<?php echo e($newitem->retail_price); ?>">
						    <?php if(!empty($newitem->old_price)): ?>
							<span class="old-price price_black"><?php echo e($newitem->old_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
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
                                    <a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle <?php if(!empty($settingInfo->facebook_pixel)): ?> addToCartPixelButton <?php endif; ?>" id="<?php echo e($newitem->id); ?>"><?php echo e(__('webMessage.preorder')); ?></a>
                                    <?php else: ?>
									<a href="javascript:;" class="tt-btn-addtocart thumbprod-button-bg addtocartsingle <?php if(!empty($settingInfo->facebook_pixel)): ?> addToCartPixelButton <?php endif; ?>" id="<?php echo e($newitem->id); ?>"><?php echo e(__('webMessage.addtocart_btn')); ?></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
									<?php endif; ?>
								</div>
								<div class="tt-row-btn">
									<a href="javascript:;" class="tt-btn-quickview loadquickviewmodal"  id="<?php echo e($newitem->id); ?>"></a>
									<?php if(!empty($isStock)): ?>
									<a href="javascript:;"  class="tt-btn-wishlist addtocartsingle <?php if(!empty($settingInfo->facebook_pixel)): ?> addToCartPixelButton <?php endif; ?>" id="<?php echo e($newitem->id); ?>"></a>
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
<?php endif; ?> 
<!--end new items display -->    
<?php /**PATH /home/kashkha/private/resources/views/website/includes/latestproducts.blade.php ENDPATH**/ ?>