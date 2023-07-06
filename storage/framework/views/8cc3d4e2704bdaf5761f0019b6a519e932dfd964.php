<?php
$settingInfo = App\Http\Controllers\webController::settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.wishlist')); ?></title>
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
			<li><?php echo e(__('webMessage.wishlist')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.wishlist')); ?></h1>
			<div class="tt-wishlist-box" id="js-wishlist-removeitem">
            <?php if(!empty($wishLists) && count($wishLists)>0): ?>
                <span id="responseMsgwish"></span>
				<div class="tt-wishlist-list">
                <?php $__currentLoopData = $wishLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $prodDetails = App\Http\Controllers\webCartController::getProductDetails($wishList->product_id);
                ?>
                <?php if(!empty($prodDetails->id)): ?>
					<div class="tt-item" id="wishdiv<?php echo e($wishList->id); ?>">
						<div class="tt-col-description">
							<div class="tt-img">
                               <?php if(!empty($prodDetails->image)): ?>
								<img src="<?php echo e(url('uploads/product/thumb/'.$prodDetails->image)); ?>" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(url('uploads/no-image.png')); ?>" alt="">
                                <?php endif; ?>
							</div>
							<div class="tt-description">
								<h2 class="tt-title"><a href="<?php echo e(url('details/'.$prodDetails->id.'/'.$prodDetails->slug)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($prodDetails->title_en); ?> <?php else: ?> <?php echo e($prodDetails->title_ar); ?> <?php endif; ?></a></h2>
								<div class="tt-price">
									<span class="new-price"> <?php echo e($prodDetails->retail_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                                    <?php if($prodDetails->old_price): ?>
									<span class="old-price"> <?php echo e($prodDetails->old_price); ?> <?php echo e(__('webMessage.kd')); ?></span>
                                    <?php endif; ?>
								</div>
							</div>
						</div>
						<div class="tt-col-btn">
							<a class="btn-link" href="<?php echo e(url('details/'.$prodDetails->id.'/'.$prodDetails->slug)); ?>" data-toggle="modal" data-target="#ModalquickView"><i class="icon-f-73"></i><?php echo e(__('webMessage.details')); ?></a>
							<a class="btn-link removeitem" id="<?php echo e($wishList->id); ?>" href="javascript:;"><i class="icon-h-02"></i><?php echo e(__('webMessage.remove')); ?></a>
						</div>
					</div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  <div><?php echo e($wishLists->links()); ?></div>					
				</div>
                <?php else: ?>
                <div class="tt-wishlist-list"><?php echo e(__('webMessage.noiteminwishlist')); ?></div>
                <?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!--footer-->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- modal (AddToCartProduct) -->
<?php echo $__env->make("website.includes.addtocart_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/wishlist.blade.php ENDPATH**/ ?>