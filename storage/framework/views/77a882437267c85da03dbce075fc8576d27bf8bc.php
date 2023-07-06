<?php
if(isset(Request()->catid)){$catidtop=Request()->catid;}else{$catidtop=0;}
$shopcategoriesLists = App\Http\Controllers\webController::getProductCategories($catidtop);
?>
<?php if(!empty($shopcategoriesLists) && count($shopcategoriesLists)>0): ?>
<div class="container-indent" style="margin-bottom:50px;">
		<div class="container">
			<div class="row tt-layout-promo02">
                <?php $__currentLoopData = $shopcategoriesLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shopcategoriesList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
               if($shopcategoriesList->cimage){
               $imagecats=url('uploads/category/thumb/'.$shopcategoriesList->cimage);
               }else{
               $imagecats=url('uploads/category/no-image.png');
               }
               ?>
				<div class="col-sm-12 col-md-6 col-lg-3">
					<div class="tt-promo02">
						<div class="image-box"><a href="<?php echo e(url('/products/'.$shopcategoriesList->cid.'/'.$shopcategoriesList->friendly_url)); ?>"><img src="<?php echo e(url('hakum_assets/images/loader.svg')); ?>" data-src="<?php echo e($imagecats); ?>" alt=""></a></div>
						<div class="tt-description">
							<a href="<?php echo e(url('/products/'.$shopcategoriesList->cid.'/'.$shopcategoriesList->friendly_url)); ?>" class="tt-title">
								<div class="tt-title-large">
                                <?php if(app()->getLocale()=="en" && !empty($shopcategoriesList->name_en)): ?><?php echo e($shopcategoriesList->name_en); ?><?php endif; ?>
                                <?php if(app()->getLocale()=="ar" && !empty($shopcategoriesList->name_ar)): ?><?php echo e($shopcategoriesList->name_ar); ?><?php endif; ?>
                                </div>
							</a>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
   <?php endif; ?> <?php /**PATH /home/kashkha/private/resources/views/website/includes/shop_by_categories_product.blade.php ENDPATH**/ ?>