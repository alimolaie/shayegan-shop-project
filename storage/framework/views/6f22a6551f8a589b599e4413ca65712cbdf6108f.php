<?php
$settingInfo = App\Http\Controllers\webController::settings();
$slideshows = App\Http\Controllers\webController::getSlideshow();
$slidetxt='';
if(!empty($slideshows) && count($slideshows)>0){
foreach($slideshows as $slideshow){
$slidetxt.='"'.url('/uploads/slideshow/'.$slideshow->image).'",';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.contactus')); ?></title>
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
<style>.g-recaptcha {transform:scale(0.90);transform-origin:0 0;}</style>

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Restaurant",
      "image": [
        <?php echo trim($slidetxt,','); ?>

       ],
      "@id": "<?php echo e(url('/contactus')); ?>",
      "name": "Kash5aStore",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo !empty($settingInfo->address_en)?$settingInfo->name_en:''; ?>",
        "addressLocality": "Kuwait City",
        "addressRegion": "Kuwait",
        "postalCode": "00000",
        "addressCountry": "KW"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "<?php echo e(rand(1,5)); ?>",
          "bestRating": "<?php echo e(rand(1,5)); ?>"
        },
        "author": {
          "@type": "Person",
          "name": "Gulfweb"
        }
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 48.0037848,
        "longitude": 29.3391489
      },
      "url": "<?php echo e(url('/')); ?>",
      "telephone": "<?php if($settingInfo->mobile): ?><?php echo e($settingInfo->mobile); ?><?php endif; ?>",
      "servesCuisine": "American",
      "priceRange": "1.5-50",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": [
            "Monday",
            "Thursday"
          ],
          "opens": "9:30",
          "closes": "20:00"
        }
      ],
      "menu": "<?php echo e(url('/')); ?>",
      "acceptsReservations": "True"
    }
    </script>
    
    
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
			<li><?php echo e(__('webMessage.contactus')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
  <?php if($settingInfo->map_embed_url): ?>
	<div class="container-indent">
		<div class="container">
			<div class="contact-map">
				<iframe src="<?php echo $settingInfo->map_embed_url; ?>" width="1180" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
	</div>
    <?php endif; ?>
    <div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<div class="tt-contact02-col-list">
				<div class="row">
					<div class="col-sm-12 col-md-4 ml-sm-auto mr-sm-auto">
						<div class="tt-contact-info">
							<i class="tt-icon icon-f-93"></i>
							<h6 class="tt-title"><?php echo e(__('webMessage.letshavechat')); ?></h6>
							<address>
								<?php if($settingInfo->mobile): ?><?php echo e($settingInfo->mobile); ?><br><?php endif; ?>
								<?php if($settingInfo->phone): ?><?php echo e($settingInfo->phone); ?><br><?php endif; ?>
                                <?php if($settingInfo->email): ?><?php echo e($settingInfo->email); ?><br><?php endif; ?>
							</address>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="tt-contact-info">
							<i class="tt-icon icon-f-24"></i>
							<h6 class="tt-title"><?php echo e(__('webMessage.visitourlocation')); ?></h6>
							<address>
								<?php if(app()->getLocale()=="en" && !empty($settingInfo->address_en)): ?> <?php echo $settingInfo->address_en; ?> <?php endif; ?>
                                <?php if(app()->getLocale()=="ar" && !empty($settingInfo->address_ar)): ?> <?php echo $settingInfo->address_ar; ?> <?php endif; ?>
							</address>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="tt-contact-info">
							<i class="tt-icon icon-f-92"></i>
							<h6 class="tt-title"><?php echo e(__('webMessage.officehours')); ?></h6>
							<address>
								<?php if(app()->getLocale()=="en" && !empty($settingInfo->office_hours_en)): ?> <?php echo $settingInfo->office_hours_en; ?> <?php endif; ?>
                                <?php if(app()->getLocale()=="ar" && !empty($settingInfo->office_hours_ar)): ?> <?php echo $settingInfo->office_hours_ar; ?> <?php endif; ?>
							</address>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<form id="contactformtxt" class="contact-form form-default" method="post" novalidate action="<?php echo e(route('contactform')); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input autocomplete="off" type="text" name="name" class="form-control" id="name" placeholder="<?php echo e(__('webMessage.enter_your_name')); ?>*" value="<?php echo e(old('name')); ?>">
                               <?php if($errors->has('name')): ?>
                                <label id="name-error" class="error" for="name"><?php echo e($errors->first('name')); ?></label>
                                <?php endif; ?>
						</div>
						<div class="form-group">
							<input autocomplete="off" type="email" name="email" class="form-control" id="email" placeholder="<?php echo e(__('webMessage.enter_your_email')); ?>*" value="<?php echo e(old('email')); ?>">
                            <?php if($errors->has('email')): ?>
                                <label id="email-error" class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                                <?php endif; ?>
						</div>
                        <div class="form-group">
							<input autocomplete="off" type="text" name="mobile" class="form-control" id="mobile" placeholder="<?php echo e(__('webMessage.enter_your_mobile')); ?>*" value="<?php echo e(old('mobile')); ?>">
                            <?php if($errors->has('mobile')): ?>
                                <label id="mobile-error" class="error" for="mobile"><?php echo e($errors->first('mobile')); ?></label>
                                <?php endif; ?>
						</div>
						<div class="form-group">
							<select name="subject" id="subject" class="form-control">
                                    <option disabled="disabled" selected><?php echo e(__('webMessage.choose_your_subject')); ?>*</option>
                                    <?php if(count($subjectLists)): ?>
                                    <?php $__currentLoopData = $subjectLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjectList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($subjectList->id); ?>" <?php echo e(old('subject')==$subjectList->id?'selected':''); ?>><?php echo e($subjectList->title_en); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php if($errors->has('subject')): ?>
                                <label id="subject-error" class="error" for="subject"><?php echo e($errors->first('subject')); ?></label>
                                <?php endif; ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<textarea  class="form-control" rows="7" name="message"  id="message" placeholder="<?php echo e(__('webMessage.write_some_text')); ?>*"><?php echo e(old('message')); ?></textarea>
                            <?php if($errors->has('message')): ?>
                            <label id="message-error" class="error" for="message"><?php echo e($errors->first('message')); ?></label>
                            <?php endif; ?>
						</div>
					</div>
				</div> 
                <div class="row"><div class="col-lg-12"><div class="g-recaptcha" data-sitekey="6LeMueQUAAAAAJ-ZUe9ZqGK3pma9VwbeoaYDgJte"></div>
                <?php if($errors->has('recaptchaError')): ?>
                <label id="message-error" class="error" for="message"><?php echo e($errors->first('recaptchaError')); ?></label>
                <?php endif; ?>
                </div></div>
				<div class="text-center">
					<button type="submit" class="btn"><?php echo e(__('webMessage.sendnow')); ?></button>
				</div>
                 <?php if(session('session_msg')): ?>
                 <div class="alert-success"><?php echo e(session('session_msg')); ?></div>
                 <?php endif; ?>
			</form>
		</div>
	</div>
    
    
</div>
<!--footer-->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- sugnout modal (ModalSubsribeGood) -->
<?php echo $__env->make("website.includes.signout_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<!--recaptcha-->
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/contact.blade.php ENDPATH**/ ?>