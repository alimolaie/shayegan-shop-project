<?php
$slideshows = App\Http\Controllers\webController::getSlideshow();
?>
<?php if(!empty($slideshows) && count($slideshows)>0): ?>
	<div class="container-indent nomargin">
		<div class="container-fluid">
			<div class="row">
				<div class="slider-revolution revolution-default">
					<div class="tp-banner-container">
						<div class="tp-banner revolution">
							<ul>
                            <?php $__currentLoopData = $slideshows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slideshow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            if(!empty($slideshow->link)){$lnks=$slideshow->link;}else{$lnks="";}
                            ?> 
								<li data-thumb="<?php echo e(url('uploads/slideshow/'.$slideshow->image)); ?>" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide" class="openmyLink" id="<?php echo e($lnks); ?>" myatt="<?php echo e($slideshow->id); ?>">
                                    
									<img src="<?php echo e(url('uploads/slideshow/'.$slideshow->image)); ?>"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"   >
									<div class="tp-caption tp-caption1 lfr str"
										data-x="right"
										data-y="center"
										data-hoffset="-351"
										data-voffset="-20"
										data-speed="600"
										data-start="900"
										data-easing="Power4.easeOut"
										data-endeasing="Power4.easeIn">
										<div class="tp-caption1-wd-1"><span class="tt-base-color"><?php if(app()->getLocale()=="en" && $slideshow->title_en): ?> <?php echo nl2br($slideshow->title_en); ?> <?php elseif(app()->getLocale()=="ar" && $slideshow->title_ar): ?> <?php echo $slideshow->title_ar; ?> <?php endif; ?></span></div>
									</div>
                                    
								</li>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 <?php endif; ?>   <?php /**PATH C:\xampp\htdocs\tikbazar\resources\views/website/includes/slideshow.blade.php ENDPATH**/ ?>