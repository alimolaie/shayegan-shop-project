<?php
$settingInfo = App\Http\Controllers\webController::settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.changepassword')); ?></title>
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
			<li><?php echo e(__('webMessage.changepassword')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.changepassword')); ?></h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							
							<div class="form-default">
								<form id="customer_reg_form" method="post" action="<?php echo e(route('changepass')); ?>" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    
									<div class="form-group">
										<label for="oldpassword"><?php echo e(__('webMessage.oldpassword')); ?>*</label>
										<input type="password" name="oldpassword" class="form-control <?php if($errors->has('oldpassword')): ?> error <?php endif; ?>" id="oldpassword" placeholder="<?php echo e(__('webMessage.enter_oldpassword')); ?>" value="<?php echo e(old('oldpassword')); ?>">
                                    <?php if($errors->has('oldpassword')): ?>
                                    <label class="error" for="oldpassword"><?php echo e($errors->first('oldpassword')); ?></label>
                                    <?php endif; ?>
									</div>
                                    <div class="form-group">
										<label for="newpassword"><?php echo e(__('webMessage.newpassword')); ?>*</label>
										<input type="newpassword" name="newpassword" class="form-control <?php if($errors->has('newpassword')): ?> error <?php endif; ?>" id="newpassword" placeholder="<?php echo e(__('webMessage.enter_newpassword')); ?>" value="<?php echo e(old('newpassword')); ?>">
                                    <?php if($errors->has('newpassword')): ?>
                                    <label class="error" for="newpassword"><?php echo e($errors->first('newpassword')); ?></label>
                                    <?php endif; ?>
									</div>
                                    <div class="form-group">
										<label for="confirmpassword"><?php echo e(__('webMessage.confirmpassword')); ?>*</label>
										<input type="text" name="confirmpassword" class="form-control <?php if($errors->has('confirmpassword')): ?> error <?php endif; ?>" id="confirmpassword" placeholder="<?php echo e(__('webMessage.enter_confirmpassword')); ?>" value="<?php echo e(old('confirmpassword')); ?>">
                                    <?php if($errors->has('confirmpassword')): ?>
                                    <label class="error" for="confirmpassword"><?php echo e($errors->first('confirmpassword')); ?></label>
                                    <?php endif; ?>
									</div>
                                    
									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit"><?php echo e(__('webMessage.save_changes')); ?></button>
											</div>
										</div>
									</div>
                                    <?php if(session('session_msg')): ?>
                                    <div class="alert-success"><?php echo e(session('session_msg')); ?></div>
                                    <?php endif; ?>
								</form>
							</div>
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


<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>

</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/changepass.blade.php ENDPATH**/ ?>