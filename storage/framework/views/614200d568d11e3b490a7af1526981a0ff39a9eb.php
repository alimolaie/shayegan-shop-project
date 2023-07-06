<?php
$leftbanners = App\Http\Controllers\webController::banners();
?>
<?php if(!empty($leftbanners) && count($leftbanners)>0): ?>
<div class="container-indent nomargin">
		<div class="container-fluid-custom">
			<div class="row tt-list-sm-shift">
				<div class="col-12 col-md-12 col-12">
					<div class="row">
                    <?php $__currentLoopData = $leftbanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leftbanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-4 col-md-4 col-12">
                        <?php if(!empty($leftbanner->image)): ?>
							<a href="<?php if(!empty($leftbanner->link)): ?> <?php echo e($leftbanner->link); ?> <?php else: ?> javascript:; <?php endif; ?> " class="tt-promo-box tt-one-child bannerCounts" id="<?php echo e($leftbanner->id); ?>" >
								<img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php echo e(url('uploads/banner/'.$leftbanner->image)); ?>" alt="">
								<?php if(!empty($leftbanner->title_en) && app()->getLocale()=="en"): ?>
                                <div class="tt-description">
									<div class="tt-description-wrapper">
										<div class="tt-background"></div>
										<div class="tt-title-small"><?php echo e($leftbanner->title_en); ?></div>
									</div>
								</div>
                                <?php elseif(!empty($leftbanner->title_ar) && app()->getLocale()=="ar"): ?>
                                <div class="tt-description">
									<div class="tt-description-wrapper">
										<div class="tt-background"></div>
										<div class="tt-title-small"><?php echo e($leftbanner->title_ar); ?></div>
									</div>
								</div>
                                <?php endif; ?>
							</a>
                         <?php endif; ?>   
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tikbazar\resources\views/website/includes/banner_theme1.blade.php ENDPATH**/ ?>