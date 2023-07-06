<?php
$settingInfo = App\Http\Controllers\webController::settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.signup')); ?></title>
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
			<li><?php echo e(__('webMessage.signup')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.createanaccount')); ?></h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							
							<div class="form-default">
								<form id="customer_reg_form" method="post" action="<?php echo e(route('registerform')); ?>">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <h2 class="tt-title"><?php echo e(__('webMessage.personal_information')); ?></h2>
									<div class="form-group">
										<label for="name"><?php echo e(__('webMessage.name')); ?>*</label>
										<input type="text" name="name" class="form-control <?php if($errors->has('name')): ?> error <?php endif; ?>" id="name" placeholder="<?php echo e(__('webMessage.enter_name')); ?>" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                    <label class="error" for="name"><?php echo e($errors->first('name')); ?></label>
                                    <?php endif; ?>
									</div>
                                    <div class="form-group">
										<label for="email"><?php echo e(__('webMessage.email')); ?>*</label>
										<input type="email" name="email" class="form-control <?php if($errors->has('email')): ?> error <?php endif; ?>" id="email" placeholder="<?php echo e(__('webMessage.enter_email')); ?>"  value="<?php echo e(old('email')); ?>">
                                        <?php if($errors->has('email')): ?>
                                    <label class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                                    <?php endif; ?>
									</div>
                                    <div class="form-group">
										<label for="mobile"><?php echo e(__('webMessage.mobile')); ?>*</label>
										<input type="text" name="mobile" class="form-control <?php if($errors->has('mobile')): ?> error <?php endif; ?>" id="mobile" placeholder="<?php echo e(__('webMessage.enter_mobile')); ?>"  value="<?php echo e(old('mobile')); ?>">
                                        <?php if($errors->has('mobile')): ?>
                                    <label class="error" for="mobile"><?php echo e($errors->first('mobile')); ?></label>
                                    <?php endif; ?>
									</div>
                                    <h2 class="tt-title"><?php echo e(__('webMessage.login_information')); ?></h2>
									
									<div class="form-group">
										<label for="username"><?php echo e(__('webMessage.username')); ?>*</label>
										<input type="text" name="username" class="form-control <?php if($errors->has('username')): ?> error <?php endif; ?>" id="username" placeholder="<?php echo e(__('webMessage.enter_username')); ?>"  value="<?php echo e(old('username')); ?>">
                                        <?php if($errors->has('username')): ?>
                                    <label class="error" for="username"><?php echo e($errors->first('username')); ?></label>
                                    <?php endif; ?>
									</div>
									<div class="form-group">
										<label for="password"><?php echo e(__('webMessage.password')); ?>*</label>
										<input type="password" name="password" class="form-control <?php if($errors->has('password')): ?> error <?php endif; ?>" id="password" placeholder="<?php echo e(__('webMessage.enter_password')); ?>"  value="<?php echo e(old('password')); ?>">
                                        <?php if($errors->has('password')): ?>
                                    <label class="error" for="password"><?php echo e($errors->first('password')); ?></label>
                                    <?php endif; ?>
									</div>
                                    
                                    <div class="form-group">
                                    <div class="checkbox-group">
									<input type="checkbox" id="is_newsletter_active" name="is_newsletter_active"  value="1">
									<label for="is_newsletter_active"><span class="check"></span><span class="box"></span>&nbsp;<?php echo e(__('webMessage.subscribe_for_newletter')); ?></label>
								    </div>
									</div>
                                    
									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit"><?php echo e(__('webMessage.create')); ?></button>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>

</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/register.blade.php ENDPATH**/ ?>