<?php
if(isset(Request()->catid)){$catidtop=Request()->catid;}else{$catidtop=0;}
$shopcategoriesLists = App\Http\Controllers\webController::getProductCategories($catidtop);
$settingInfo = App\Http\Controllers\webController::settings();
?>
<?php if(!empty($shopcategoriesLists) && count($shopcategoriesLists)>0): ?>
    <div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-block-title">
                <?php if($settingInfo->theme==2): ?>
				<h3 class="tt-title tt-title-span"><span><a href="<?php echo e(!empty($link)?$link:'#'); ?>"><?php echo e(trans('webMessage.shopbycategory')); ?></a></span></h3>
                <?php else: ?> 
                <h1 class="tt-title noborder "><a href="<?php echo e(!empty($link)?$link:'#'); ?>"><?php echo e(strtoupper(trans('webMessage.shopbycategory'))); ?></a></h1>
                <?php endif; ?>
              <div class="tt-description">&nbsp;</div>
			</div>
			<div class="tt-carousel-products row arrow-location-tab arrow-location-tab01 tt-alignment-img tt-collection-listing slick-animated-show-js">
			<?php $__currentLoopData = $shopcategoriesLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shopcategoriesList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
               if($shopcategoriesList->cimage){
               $imagecats=url('uploads/category/thumb/'.$shopcategoriesList->cimage);
               }else{
               $imagecats=url('uploads/category/no-image.png');
               }
               ?>
                <div class="col-2 col-md-4 col-lg-3">
                    <div class="tt-product thumbprod-center">
						<div class="tt-image-box">
							<a href="<?php echo e(url('/products/'.$shopcategoriesList->cid.'/'.$shopcategoriesList->friendly_url)); ?>"><img src="<?php echo e(url('hakum_assets/images/loader.svg')); ?>" data-src="<?php echo e($imagecats); ?>" alt=""></a>                       
						</div>
						<div class="tt-description">
							<h2 class="tt-title"><a href="<?php echo e(url('/products/'.$shopcategoriesList->cid.'/'.$shopcategoriesList->friendly_url)); ?>">
                            <?php if(app()->getLocale()=="en" && !empty($shopcategoriesList->name_en)): ?><?php echo e($shopcategoriesList->name_en); ?><?php endif; ?>
                            <?php if(app()->getLocale()=="ar" && !empty($shopcategoriesList->name_ar)): ?><?php echo e($shopcategoriesList->name_ar); ?><?php endif; ?></a></h2>
						</div>
					</div>
				</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
   <?php endif; ?> <?php /**PATH C:\Users\Lenovo\Downloads\well-known\resources\views/website/includes/shop_by_categories_scrolling.blade.php ENDPATH**/ ?>