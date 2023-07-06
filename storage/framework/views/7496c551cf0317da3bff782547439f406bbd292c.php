<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.sendresetlink')); ?></title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		<?php echo $__env->make('gwc.css.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--token -->     
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<style>
		.is-invalid{border:1px #FF0000 solid !important;}
		</style>
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
								<img alt="<?php echo e(__('adminMessage.websiteName')); ?>" src="<?php echo url('uploads/logo/'.$settingDetailsMenu['logo']); ?>" />
                                <?php endif; ?>
							    </a>
							</div>
                         <?php if(request()->token): ?>
                         <div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title"><?php echo e(__('adminMessage.resetforgotpass')); ?></h3>
								</div>
   
								<form class="kt-form"  name="AdmfpForm" id="AdmfpForm" method="POST" action='<?php echo e(route("gwc.token",request()->token)); ?>'>
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
										<input value="<?php echo e(old('email')); ?>" class="form-control  <?php if($errors->has('email')): ?> is-invalid <?php endif; ?>" type="text" placeholder="<?php echo e(__('adminMessage.enter_email')); ?>" name="email" id="email" autocomplete="off">
                                        <?php if($errors->has('email')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                                        <?php endif; ?>
									</div>
                                    
                                    <div class="input-group">
										<input value="<?php echo e(old('new_password')); ?>" class="form-control  <?php if($errors->has('new_password')): ?> is-invalid <?php endif; ?>" type="password" placeholder="<?php echo e(__('adminMessage.enter_new_password')); ?>" name="new_password" id="new_password" autocomplete="off">
                                        <?php if($errors->has('new_password')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('new_password')); ?></div>
                                        <?php endif; ?>
									</div>
                                    
                                    <div class="input-group">
										<input value="<?php echo e(old('confirm_password')); ?>" class="form-control  <?php if($errors->has('confirm_password')): ?> is-invalid <?php endif; ?>" type="password" placeholder="<?php echo e(__('adminMessage.enter_confirm_password')); ?>" name="confirm_password" id="confirm_password" autocomplete="off">
                                        <?php if($errors->has('confirm_password')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('confirm_password')); ?></div>
                                        <?php endif; ?>
									</div>
																		
									<div class="kt-login__actions">
										<button type="submit" id="" class="btn btn-pill btn-success"><?php echo e(__('adminMessage.changenow')); ?></button>
                                        
									</div>
                                    
                                    <div class="row"><div class="col-md-12"></div></div>
								</form>
							</div>
                         <?php else: ?>   
   				         <div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title"><?php echo e(__('adminMessage.sendresetlink')); ?></h3>
								</div>
   
								<form class="kt-form"  name="AdmfpForm" id="AdmfpForm" method="POST" action='<?php echo e(route("gwc.email")); ?>'>
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
										<input value="<?php echo e(old('email')); ?>" class="form-control  <?php if($errors->has('email')): ?> is-invalid <?php endif; ?>" type="text" placeholder="<?php echo e(__('adminMessage.enter_email')); ?>" name="email" id="email" autocomplete="off">
                                        <?php if($errors->has('email')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                                        <?php endif; ?>
									</div>
																		
									<div class="kt-login__actions">
										<button type="submit" id="" class="btn btn-pill btn-success"><?php echo e(__('adminMessage.sendlink')); ?></button>
                                        <button type="button" onClick="window.location='<?php echo e(url('gwc/')); ?>'" class="btn btn-pill  btn-info" style="color:#FFFFFF;"><?php echo e(__('adminMessage.backtologin')); ?></button>
									</div>
                                    
                                    <div class="row"><div class="col-md-12"></div></div>
								</form>
							</div>
                            <?php endif; ?>
                            
                            
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
</html><?php /**PATH E:\shayegan_project\shop\resources\views/gwc/forgot.blade.php ENDPATH**/ ?>