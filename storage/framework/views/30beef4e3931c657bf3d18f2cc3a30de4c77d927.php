<?php
$settingInfo = App\Http\Controllers\webController::settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?></title>
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
    <!--web push notification -->
    <script type='text/javascript' src='https://www.gstatic.com/firebasejs/7.4.0/firebase-app.js'></script>
    <script type='text/javascript' src='https://www.gstatic.com/firebasejs/7.4.0/firebase-messaging.js'></script>
    <script type='text/javascript' src='https://www.gstatic.com/firebasejs/7.4.0/firebase-analytics.js'></script>
    <script type='text/javascript' src='https://code.jquery.com/jquery-3.3.1.js'></script>
    <script src="<?php echo e(url('assets/webpush/webpush.js')); ?>"></script>
    <?php if($settingInfo->logo): ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "<?php echo e(url('/')); ?>",
      "logo": "<?php echo e(url('uploads/logo/'.$settingInfo->logo)); ?>"
    }
    </script>
    <?php endif; ?>
</head>
<body>  
<!--preloader -->
<?php echo $__env->make("website.includes.preloader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- top header -->
<?php echo $__env->make("website.includes.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="tt-pageContent">
<!--home slideshow -->
<?php echo $__env->make("website.includes.slideshow", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($settingInfo->theme==1 || $settingInfo->theme==4 || $settingInfo->theme==6): ?> 
<!--home banner -->
<?php echo $__env->make("website.includes.banner", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--shop by category -->
<?php if($settingInfo->theme==6): ?>)	
<?php echo $__env->make("website.includes.shop_by_categories_scrolling", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
<?php echo $__env->make("website.includes.best_seller_by_brands", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--home section & items -->
<?php echo $__env->make("website.includes.homesection", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--home short note -->
<?php echo $__env->make("website.includes.homeshorttext", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
<?php endif; ?>
<?php if($settingInfo->theme==2): ?> 
<!--shop by category -->	
<?php echo $__env->make("website.includes.shop_by_categories", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
<!--home sections -->
<?php echo $__env->make("website.includes.homesection", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--shop by age -->
<?php echo $__env->make("website.includes.shop_by_age", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--fav brands -->
<?php echo $__env->make("website.includes.shop_by_brands", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
<!--home short note -->
<?php echo $__env->make("website.includes.homeshorttext", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end short note -->	
<!--banner -->
<?php echo $__env->make("website.includes.banner", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
<?php endif; ?>

<?php if($settingInfo->theme==3): ?> 
<!--home banner -->
<?php echo $__env->make("website.includes.banner", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
</div>
<!--footer -->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
<!-- modal (AddToCartProduct) -->
<?php echo $__env->make("website.includes.addtocart_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- modal (quickViewModal) -->
<?php echo $__env->make("website.includes.quickview_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>
<?php if(!empty($settingInfo->facebook_pixel)): ?>
<script type="text/javascript">
  $( '.addToCartPixelButton' ).click(function() {
    var id = $(this).attr("id");
	var price = $("#pixel_price_"+id).val();
    fbq('track', 'AddToCart', {
      content_ids: [id],
      content_type: 'product',
      value: price,
      currency: 'USD' 
    });  
  });
</script>
<?php endif; ?>

</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/index.blade.php ENDPATH**/ ?>