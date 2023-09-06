<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?> | <?php if(Request::segment(2)=='editprofile'): ?> <?php echo e(__('adminMessage.editprofile')); ?> <?php else: ?> <?php echo e(__('adminMessage.changepassword')); ?> <?php endif; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		<?php echo $__env->make('gwc.css.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!-- token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed  <?php if(!empty($settings->is_admin_menu_minimize)): ?> kt-aside--minimize <?php endif; ?>  kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<?php
                $settingDetailsMenu = App\Http\Controllers\AdminDashboardController::getSettingsDetails();
                ?>
                <a href="<?php echo e(url('/gwc/home')); ?>">
                <?php if($settingDetailsMenu['logo']): ?>
				<img alt="<?php echo e(__('adminMessage.websiteName')); ?>" src="<?php echo url('uploads/logo/'.$settingDetailsMenu['logo']); ?>" height="40" />
                <?php endif; ?>
			   </a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<?php echo $__env->make('gwc.includes.leftmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<?php echo $__env->make('gwc.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title"><?php if(Request::segment(2)=='editprofile'): ?> <?php echo e(__('adminMessage.editprofile')); ?> <?php else: ?> <?php echo e(__('adminMessage.changepassword')); ?> <?php endif; ?></h3>
								</div>
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

							<!--begin::Portlet-->
									<div class="kt-portlet">
										
										<!--begin::Form-->
						
                      
                         
                         <div class="kt-portlet__head">
									<div class="kt-portlet__head-toolbar">
										<ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
											<li class="nav-item">
												<a class="nav-link <?php if(Request::segment(2)=='editprofile'): ?> active <?php endif; ?>"  href="<?php echo e(url('gwc/editprofile')); ?>" role="tab">
													<i class="flaticon-avatar"></i> <?php echo e(__('adminMessage.profile')); ?>

												</a>
											</li>
											<?php if(auth()->guard('admin')->user()->can('user-changepass')): ?>
											<li class="nav-item">
												<a class="nav-link <?php if(Request::segment(2)=='changepassword'): ?> active <?php endif; ?>"  href="<?php echo e(url('gwc/changepassword')); ?>" role="tab">
													<i class="flaticon-lock"></i> <?php echo e(__('adminMessage.changepassword')); ?>

												</a>
											</li>
											<?php endif; ?>
                                            <?php if(auth()->guard('admin')->user()->can('user-shopdetails')): ?>
											<li class="nav-item">
												<a class="nav-link <?php if(Request::segment(3)=='shopedit'): ?> active <?php endif; ?>"  href="<?php echo e(url('gwc/editshop')); ?>" role="tab">
													<i class="flaticon-home"></i> <?php echo e(__('adminMessage.shopdetails')); ?>

												</a>
											</li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
<?php
$userDetails = App\Http\Controllers\AdminUserController::getUserDetails(auth()->guard('admin')->user()->id);
?>  
                         <div class="kt-portlet__body">
                         
										<div class="tab-content">
											<div class="tab-pane <?php if(Request::segment(2)=='editprofile'): ?> active <?php endif; ?>" id="kt_user_edit_tab_1" role="tabpanel">
												<div class="kt-form kt-form--label-right">
                        <form name="tFrmProfile" id="tFrmProfile"  method="post"
                          class="uk-form-stacked" enctype="multipart/form-data" action="<?php echo e(route('adminSaveEditProfile')); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                          <input type="hidden" name="id" value="<?php echo e($userDetails->id); ?>" >
													<div class="kt-form__body">
														<div class="kt-section kt-section--first">
															<div class="kt-section__body">
                         <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
																
																<div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-form-label"><?php echo e(__('adminMessage.avatar')); ?></label>
																	<div class="col-lg-9 col-xl-6">
																		<div class="kt-avatar kt-avatar--outline kt-avatar--circle- <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>" id="kt_user_edit_avatar">
                        <?php if(isset($userDetails->image) && !empty($userDetails->image)): ?> 
                        <div class="kt-avatar__holder" style="background-image: url('<?php echo URL::asset('/uploads/users/'.$userDetails->image); ?>');"></div>
                        <?php else: ?> 
                        <div class="kt-avatar__holder" style="background-image: url('<?php echo url('admin_assets/assets/media/users/default.jpg'); ?>');"></div>
                        <?php endif; ?>
																			
																			<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
																				<i class="fa fa-pen"></i>
																				<input type="file" name="image" accept=".png, .jpg, .jpeg" >
																			</label>
																			<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
																				<i class="fa fa-times"></i>
																			</span>
																		</div>
                                                                        
                                                               <?php if($errors->has('image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
                                                               <?php endif; ?>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-form-label"><?php echo e(__('adminMessage.name')); ?></label>
																	<div class="col-lg-9 col-xl-6">
																		<input class="form-control <?php if($errors->has('name')): ?> is-invalid <?php endif; ?>" type="text" value="<?php echo e($userDetails->name); ?>" name="name" id="name" >
                                                               <?php if($errors->has('name')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('name')); ?></div>
                                                               <?php endif; ?>
																	</div>
																</div>
															
																<div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-form-label"><?php echo e(__('adminMessage.mobile')); ?></label>
																	<div class="col-lg-9 col-xl-6">
																		<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
																			<input type="text" class="form-control <?php if($errors->has('mobile')): ?> is-invalid <?php endif; ?>" value="<?php echo e($userDetails->mobile); ?>" placeholder="Mobile" name="mobile" aria-describedby="basic-addon1">
                                                               <?php if($errors->has('mobile')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('mobile')); ?></div>
                                                               <?php endif; ?>
																		</div>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-form-label"><?php echo e(__('adminMessage.email')); ?></label>
																	<div class="col-lg-9 col-xl-6">
																		<div class="input-group">
																			<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
																			<input type="text" class="form-control <?php if($errors->has('email')): ?> is-invalid <?php endif; ?>" value="<?php echo e($userDetails->email); ?>" placeholder="Email" aria-describedby="basic-addon1" name="email">
                                                               <?php if($errors->has('email')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                                                               <?php endif; ?>
																		</div>
																	</div>
																</div>
                                                               
                                                              
                                            
                                                                
                                                                
                                                   <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
													<div class="kt-form__actions">
														<div class="row">
															<div class="col-xl-3"></div>
															<div class="col-lg-9 col-xl-6">
																<button type="submit" class="btn btn-success btn-bold"><?php echo e(__('adminMessage.save')); ?></button>
                                                                <button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/users')); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
															</div>
														</div>
													</div>
															</div>
														</div>
													</div>
                                                    </form>
                                                  
												</div>
											</div>
                         <div class="tab-pane <?php if(Request::segment(2)=='changepassword'): ?> active <?php endif; ?>" id="kt_user_edit_tab_2" role="tabpanel">
                         <div class="kt-form kt-form--label-right">
                         <form name="tFrmpass" id="tFrmpass"  method="post"
                          class="uk-form-stacked" enctype="multipart/form-data" action="<?php echo e(route('adminChangePass')); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                          <input type="hidden" name="id" value="<?php echo e($userDetails->id); ?>" >
													<div class="kt-form__body">
														<div class="kt-section kt-section--first">
															<div class="kt-section__body">
																<?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
																
																<div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-form-label"><?php echo e(__('adminMessage.currentpassword')); ?></label>
																	<div class="col-lg-9 col-xl-6">
																		<input type="password" name="current_password" class="form-control <?php if($errors->has('current_password')): ?> is-invalid <?php endif; ?>" value="<?php echo e(old('current_password')); ?>" placeholder="<?php echo e(__('adminMessage.entercurrentpassword')); ?>">                                                               <?php if($errors->has('current_password')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('current_password')); ?></div>
                                                               <?php endif; ?>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-xl-3 col-lg-3 col-form-label"><?php echo e(__('adminMessage.newpassword')); ?></label>
																	<div class="col-lg-9 col-xl-6">
																		<input type="password" name="new_password" class="form-control <?php if($errors->has('new_password')): ?> is-invalid <?php endif; ?>" value="<?php echo e(old('new_password')); ?>" placeholder="<?php echo e(__('adminMessage.enternewpassword')); ?>">                                                               <?php if($errors->has('new_password')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('new_password')); ?></div>
                                                               <?php endif; ?>
																	</div>
																</div>
																<div class="form-group form-group-last row">
																	<label class="col-xl-3 col-lg-3 col-form-label"><?php echo e(__('adminMessage.confirmpassword')); ?></label>
																	<div class="col-lg-9 col-xl-6">
																		<input type="password" name="confirm_password" class="form-control <?php if($errors->has('confirm_password')): ?> is-invalid <?php endif; ?>" value="<?php echo e(old('confirm_password')); ?>" placeholder="<?php echo e(__('adminMessage.enterconfirmpassword')); ?>">                                                               <?php if($errors->has('confirm_password')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('confirm_password')); ?></div>
                                                               <?php endif; ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
                                                    <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
													<div class="kt-form__actions">
														<div class="row">
															<div class="col-xl-3"></div>
															<div class="col-lg-9 col-xl-6">
																<button type="submit" class="btn btn-success  btn-bold"><?php echo e(__('adminMessage.save')); ?></button>
                                                                <button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/users')); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
															</div>
														</div>
													</div>
                                                    </form>
													
												</div>
											</div>
                                            
                                       
                         
                                            
                                                 
											
										</div>
									
                                    </div>
                         
                                  
										<!--end::Form-->
									</div>

									<!--end::Portlet-->
                                    
                                    
						</div>

						<!-- end:: Content -->
					</div>

					<!-- begin:: Footer -->
					<?php echo $__env->make('gwc.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->


		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

	
		<!-- js files -->
		<?php echo $__env->make('gwc.js.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</body>

	<!-- end::Body -->
</html><?php /**PATH E:\shayegan_project\shop\resources\views/gwc/user/adminEditProfileForm.blade.php ENDPATH**/ ?>