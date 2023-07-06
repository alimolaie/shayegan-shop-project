<?php
$settingInfo = App\Http\Controllers\webController::settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php if(request()->token): ?> <?php echo e(__('webMessage.resetforgotpassword')); ?> <?php else: ?> <?php echo e(__('webMessage.sendfplink')); ?> <?php endif; ?></title>
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
<link rel="stylesheet" href="<?php echo e(url('assets/css/theme.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('assets/css/gulfweb.css')); ?>">
<?php if(app()->getLocale()=="ar"): ?>
<link href="<?php echo e(url('assets/css/rtl.css')); ?>" rel="stylesheet">
<?php endif; ?>
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
			<li><?php if(request()->token): ?> <?php echo e(__('webMessage.resetforgotpassword')); ?> <?php else: ?> <?php echo e(__('webMessage.sendfplink')); ?> <?php endif; ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php if(request()->token): ?> <?php echo e(__('webMessage.resetforgotpassword')); ?> <?php else: ?> <?php echo e(__('webMessage.sendfplink')); ?> <?php endif; ?></h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							
							<div class="form-default">
                             <?php if(request()->token): ?>
                <form method="post" class="fpass-validation-active" id="fpass-form-main-form" action="<?php echo e(route('password.token',request()->token)); ?>">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                   <div class="form-group">
										<label for="email"><?php echo e(__('webMessage.email')); ?>*</label>
										<input type="email" name="email" class="form-control <?php if($errors->has('email')): ?> error <?php endif; ?>" id="email" placeholder="<?php echo e(__('webMessage.enter_email')); ?>"  value="<?php echo e(old('email')); ?>">
                                        <?php if($errors->has('email')): ?>
                                    <label class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                                    <?php endif; ?>
									</div>
                                    <div class="form-group">
										<label for="new_password"><?php echo e(__('webMessage.newpassword')); ?>*</label>
										<input type="password" name="new_password" class="form-control <?php if($errors->has('new_password')): ?> error <?php endif; ?>" id="new_password" placeholder="<?php echo e(__('webMessage.enter_new_password')); ?>"  value="<?php echo e(old('new_password')); ?>">
                                        <?php if($errors->has('new_password')): ?>
                                    <label class="error" for="new_password"><?php echo e($errors->first('new_password')); ?></label>
                                    <?php endif; ?>
									</div>
                                    <div class="form-group">
										<label for="confirm_password"><?php echo e(__('webMessage.confirmpassword')); ?>*</label>
										<input type="password" name="confirm_password" class="form-control <?php if($errors->has('confirm_password')): ?> error <?php endif; ?>" id="confirm_password" placeholder="<?php echo e(__('webMessage.enter_confirm_password')); ?>"  value="<?php echo e(old('confirm_password')); ?>">
                                        <?php if($errors->has('confirm_password')): ?>
                                    <label class="error" for="confirm_password"><?php echo e($errors->first('confirm_password')); ?></label>
                                    <?php endif; ?>
									</div>
                                    
									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit"><?php echo e(__('webMessage.save_changes')); ?></button>
											</div>
										</div>
										<div class="col-auto align-self-center">
											<div class="form-group">
												<ul class="additional-links">
													<li><?php echo e(__('webMessage.or')); ?> <a href="<?php echo e(url('/login')); ?>"><?php echo e(__('webMessage.returntosignin')); ?></a></li>
												</ul>
											</div>
										</div>
									</div>
                </form>
                             <?php else: ?>
								<form method="post" class="fpass-validation-active" id="fpass-form-main-form" action="<?php echo e(route('password.email')); ?>">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <div class="form-group">
										<label for="email"><?php echo e(__('webMessage.email')); ?>*</label>
										<input type="email" name="email" class="form-control <?php if($errors->has('email')): ?> error <?php endif; ?>" id="email" placeholder="<?php echo e(__('webMessage.enter_email')); ?>"  value="<?php echo e(old('email')); ?>">
                                        <?php if($errors->has('email')): ?>
                                    <label class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                                    <?php endif; ?>
									</div>
                                    
									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit"><?php echo e(__('webMessage.send_link_btn')); ?></button>
											</div>
										</div>
										<div class="col-auto align-self-center">
											<div class="form-group">
												<ul class="additional-links">
													<li><?php echo e(__('webMessage.or')); ?> <a href="<?php echo e(url('/login')); ?>"><?php echo e(__('webMessage.returntosignin')); ?></a></li>
												</ul>
											</div>
										</div>
									</div>
                <?php if(session('session_msg')): ?>
                <div class="alert alert-success"><?php echo e(session('session_msg')); ?></div>
                <?php endif; ?>
								</form>
                                <?php endif; ?>
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
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/password/sendlink.blade.php ENDPATH**/ ?>