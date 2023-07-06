<?php
$brandMenus = App\Http\Controllers\webController::ShopByBrandsList();
?>
<?php if(!empty($settingInfo->is_brand_active) && !empty($brandMenus) && count($brandMenus)>0): ?>

    <div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-block-title">
                <?php if($settingInfo->theme!=2): ?>
				<h1 class="tt-title noborder"><a href="<?php echo e(!empty($link)?$link:'#'); ?>"><?php echo e(strtoupper(trans('webMessage.favoritebrands'))); ?></a></h1>
                <?php else: ?>
				<h3 class="tt-title tt-title-span"><span><a href="<?php echo e(!empty($link)?$link:'#'); ?>"><?php echo e(trans('webMessage.favoritebrands')); ?></a></span></h3>
                <?php endif; ?>
              <div class="tt-description">&nbsp;</div>
			</div>
			<div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js">
			<?php $__currentLoopData = $brandMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
               if($brandMenu->image){
               $imagebrand=url('uploads/brand/thumb/'.$brandMenu->image);
               }else{
               $imagebrand=url('uploads/brand/no-image.png');
               }
               if($brandMenu->bgimage){
               $bgimagebrand=url('uploads/brand/'.$brandMenu->bgimage);
               }else{
               $bgimagebrand=url('uploads/brand/no-image.png');
               }
               ?>
                <div class="col-2 col-md-2 col-lg-2">
                    <div class="tt-product thumbprod-center">
						<div class="tt-image-box" align="center">
							<a href="<?php echo e(url('/brands/'.$brandMenu->slug)); ?>" class="tt-promo-box tt-one-child">
	                <img src="<?php echo e(url('hakum_assets/images/loader.svg')); ?>" data-src="<?php echo e($imagebrand); ?>" alt="" style="max-height:200px !important;max-width:200px !important;"></a>                    
						</div>
					</div>
				</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
 <?php endif; ?>   <?php /**PATH D:\laravel projects\tikbazar\resources\views/website/includes/shop_by_brands_scrolling.blade.php ENDPATH**/ ?>