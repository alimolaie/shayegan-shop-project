<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.login')); ?></title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		<?php echo $__env->make('gwc.css.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--token -->     
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		
	</head>

	<!-- end::Head -->
<?php
$settingDetailsMenu = App\Http\Controllers\AdminDashboardController::getSettingsDetails();
?>
	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed <?php if(!empty($settings->is_admin_menu_minimize)): ?> kt-aside--minimize <?php endif; ?>  kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo url('admin_assets/assets/media/bg/bg-1.jpg'); ?>);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="<?php echo e(url('/gwc/home')); ?>">
                                <?php if($settingDetailsMenu['logo']): ?>
								<img  style="max-width:200px;" alt="<?php echo e(__('adminMessage.websiteName')); ?>" src="<?php echo url('uploads/logo/'.$settingDetailsMenu['logo']); ?>" />
                                <?php endif; ?>
							    </a>
							</div>
   <?php
   use Illuminate\Support\Facades\Cookie;
   ?> 
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title"><?php echo e(__('adminMessage.signinadminpanel')); ?></h3>
								</div>
   
								<form class="kt-form"  name="AdmloginForm" id="AdmloginForm" method="POST" action='<?php echo e(route("adminlogin")); ?>'>
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            
                                
                                <?php if($errors->has('invalidlogin')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo e($errors->first('invalidlogin')); ?>

                                </div>
                                <?php endif; ?>
                                
                                <?php if(session('info')): ?>
                                <div class="alert alert-success" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <?php echo e(session('info')); ?>

                                </div>
                                <?php endif; ?> 
                           
									<div class="input-group">
										<input value="<?php if(Cookie::get('login_username')): ?> <?php echo e(Cookie::get('login_username')); ?> <?php endif; ?>" class="form-control  <?php if($errors->has('login_username')): ?> is-invalid <?php endif; ?>" type="text" placeholder="<?php echo e(__('adminMessage.enter_username')); ?>" name="login_username" id="login_username" autocomplete="off">
                                        <?php if($errors->has('login_username')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('login_username')); ?></div>
                                        <?php endif; ?>
									</div>
									<div class="input-group ">
										<input value="<?php if(Cookie::get('login_password')): ?> <?php echo e(Cookie::get('login_password')); ?> <?php endif; ?>" class="form-control <?php if($errors->has('login_password')): ?> is-invalid <?php endif; ?>" type="password" placeholder="<?php echo e(__('adminMessage.enter_password')); ?>" name="login_password" id="login_password" autocomplete="off">
                                        <?php if($errors->has('login_password')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('login_password')); ?></div>
                                        <?php endif; ?>
									</div>
									<div class="row kt-login__extra">
										<div class="col">
											<label class="kt-checkbox">
												<input <?php if(Cookie::get('remember_me')): ?> checked <?php endif; ?> type="checkbox" name="remember_me" id="remember_me" value="1"> <?php echo e(__('adminMessage.rememberme')); ?>

												<span></span>
											</label>
                                            <a style="color:#FFFFFF;" href="<?php echo e(url('gwc/forgot')); ?>" class="pull-right"><?php echo e(__('adminMessage.forgot_password')); ?>?</a>
										</div>
									</div>
									<div class="kt-login__actions">
										<button type="submit" id="" class="btn btn-pill kt-login__btn-primary"><?php echo e(__('adminMessage.signin')); ?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->
        <!-- js files -->
		<?php echo $__env->make('gwc.js.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
	</body>

	<!-- end::Body -->
</html><?php /**PATH C:\xampp\htdocs\tikbazar\resources\views/gwc/home.blade.php ENDPATH**/ ?>