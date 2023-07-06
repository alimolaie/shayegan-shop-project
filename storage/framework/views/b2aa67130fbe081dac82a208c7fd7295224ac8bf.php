<?php
$settingInfo = App\Http\Controllers\webController::settings();
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}

if(!empty($singleInfo['seo_description_'.$strLang])){
$seo_description = $singleInfo['seo_description_'.$strLang];
}else{
$seo_description = $settingInfo['seo_description_'.$strLang];
}
if(!empty($singleInfo['seo_keywords_'.$strLang])){
$seo_keywords = $singleInfo['seo_keywords_'.$strLang];
}else{
$seo_keywords = $settingInfo['seo_keywords_'.$strLang];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en" && !empty($settingInfo->name_en)): ?> <?php echo e($settingInfo->name_en); ?> <?php elseif(app()->getLocale()=="ar" && !empty($settingInfo->name_ar)): ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php if(app()->getLocale()=="en" && !empty($singleInfo->title_en)): ?> <?php echo e($singleInfo->title_en); ?> <?php elseif(app()->getLocale()=="ar" && !empty($singleInfo->title_ar)): ?> <?php echo e($singleInfo->title_ar); ?> <?php endif; ?></title>
<meta name="description" content="<?php echo e($seo_description); ?>" />
<meta name="abstract"    content="<?php echo e($seo_description); ?>">
<meta name="keywords"    content="<?php echo e($seo_keywords); ?>" />
<meta name="Copyright"   content="<?php echo e($settingInfo->name_en); ?>, Kuwait Copyright 2020 - <?php echo e(date('Y')); ?>" />
<META NAME="Geography"   CONTENT="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->address_en); ?> <?php else: ?> <?php echo e($settingInfo->address_ar); ?> <?php endif; ?>">
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
			<li><?php if(app()->getLocale()=="en" && !empty($singleInfo->title_en)): ?> <?php echo e($singleInfo->title_en); ?> <?php elseif(app()->getLocale()=="ar" && !empty($singleInfo->title_ar)): ?> <?php echo e($singleInfo->title_ar); ?> <?php endif; ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container" style="min-height:800px;">
			<h1 class="tt-title-subpages noborder"><?php if(app()->getLocale()=="en" && !empty($singleInfo->title_en)): ?> <?php echo e($singleInfo->title_en); ?> <?php elseif(app()->getLocale()=="ar" && !empty($singleInfo->title_ar)): ?> <?php echo e($singleInfo->title_ar); ?> <?php endif; ?></h1>
			<div class="tt-login-form">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="tt-item">
							<?php if(app()->getLocale()=="en" && !empty($singleInfo->details_en)): ?> <?php echo $singleInfo->details_en; ?> <?php elseif(app()->getLocale()=="ar" && !empty($singleInfo->details_ar)): ?> <?php echo $singleInfo->details_ar; ?> <?php endif; ?>							
						</div>
					</div>
				</div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/singlepage.blade.php ENDPATH**/ ?>