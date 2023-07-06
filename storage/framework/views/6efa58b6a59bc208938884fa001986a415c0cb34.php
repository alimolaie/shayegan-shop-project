<?php
$settingInfo = App\Http\Controllers\webController::settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.signin')); ?></title>
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
			<li><?php echo e(__('webMessage.signin')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.alreadyregistered')); ?></h1>
			<div class="tt-login-form">
            <?php if(session('session_msg')): ?>
            <div class="alert-success"><?php echo e(session('session_msg')); ?></div>
            <?php endif; ?>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="tt-item">
							<h2 class="tt-title"><?php echo e(__('webMessage.newcustomer')); ?></h2>
							<p><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->note_for_new_customer_en); ?> <?php else: ?> <?php echo e($settingInfo->note_for_new_customer_ar); ?> <?php endif; ?></p>
							<div class="form-group">
								<a href="<?php echo e(url('/register')); ?>" class="btn btn-top btn-border"><?php echo e(__('webMessage.createanaccount')); ?></a>
							</div>
						</div>
					</div>
   <?php
   use Illuminate\Support\Facades\Cookie;
   ?>
					<div class="col-xs-12 col-md-6">
						<div class="tt-item">
							<h2 class="tt-title"><?php echo e(__('webMessage.signin')); ?></h2>
                            <?php echo e(__('webMessage.ifyouhaveanaccountwithus')); ?>

							<div class="form-default form-top">
                
                
								<form id="customer_login_form" method="post" action="<?php echo e(route('loginform')); ?>">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
									<div class="form-group">
									<label for="login_username"><?php echo e(__('webMessage.username_or_email')); ?>*</label>
									<input type="text" name="login_username"  class="form-control <?php if($errors->has('login_username')): ?> error <?php endif; ?>" id="login_username" placeholder="<?php echo e(__('webMessage.enter_username_or_email')); ?>" autcomplete="off" value="<?php if(Cookie::get('xlogin_username')): ?> <?php echo e(Cookie::get('xlogin_username')); ?> <?php elseif(old('login_username')): ?> <?php echo e(old('login_username')); ?> <?php endif; ?>">
                                    <?php if($errors->has('login_username')): ?>
                                    <label id="login_username" class="error" for="login_username"><?php echo e($errors->first('login_username')); ?></label>
                                    <?php endif; ?>
									</div>
									<div class="form-group">
									<label for="login_password"><?php echo e(__('webMessage.password_login_txt')); ?>*</label>
									<input type="password" name="login_password"  class="form-control <?php if($errors->has('login_password')): ?> error <?php endif; ?>" id="login_password" placeholder="<?php echo e(__('webMessage.enter_password')); ?>" autcomplete="off"  value="<?php if(Cookie::get('xlogin_password')): ?> <?php echo e(Cookie::get('xlogin_password')); ?> <?php elseif(old('login_password')): ?> <?php echo e(old('login_password')); ?> <?php endif; ?>">
                                    <?php if($errors->has('login_password')): ?>
                                    <label id="login_password" class="error" for="login_username"><?php echo e($errors->first('login_password')); ?></label>
                                    <?php endif; ?>
									</div>
                                    
                                    <div class="form-group">
                                    <div class="checkbox-group">
									<input type="checkbox" id="remember_me" name="remember_me" <?php if(Cookie::get('xremember_me')): ?> checked <?php endif; ?>  value="1">
									<label for="remember_me"><span class="check"></span><span class="box"></span>&nbsp;<?php echo e(__('webMessage.remember_me_txt')); ?></label>
								    </div>
									</div>
									<div class="row">
										<div class="col-auto <?php if(app()->getLocale()=="en"): ?> mr-auto <?php else: ?> align-self-end <?php endif; ?>">
											<div class="form-group">
												<button class="btn btn-border" type="submit"><?php echo e(__('webMessage.login')); ?></button>
											</div>
										</div>
										<div class="col-auto <?php if(app()->getLocale()=="ar"): ?> mr-auto <?php else: ?> align-self-end <?php endif; ?> ">
											<div class="form-group">
												<ul class="additional-links">
													<li><a href="<?php echo e(url('/password/reset')); ?>"><?php echo e(__('webMessage.forgot_password_txt')); ?></a></li>
												</ul>
											</div>
										</div>
									</div>
                                    <?php if(session('session_msg')): ?>
                                    <div class="alert-success"><?php echo e(session('session_msg')); ?></div>
                                    <?php endif; ?>
                                    <?php if(session('session_msg_error')): ?>
                                    <div class="alert-danger"><?php echo e(session('session_msg_error')); ?></div>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>

</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/login.blade.php ENDPATH**/ ?>