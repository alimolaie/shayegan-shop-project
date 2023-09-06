<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.createcoupon')); ?></title>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.coupon')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('gwc/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e("Create Intro"); ?></a>
									</div>
								</div>
								<?php if(auth()->guard('admin')->user()->can('coupon-list')): ?>
												<a style="margin-top:10px;" href="<?php echo e(url('admin/intro')); ?>" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-list-ul"></i><?php echo e("List Intro"); ?></a> <?php endif; ?>
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                           <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      
							<!--begin::Portlet-->
									<div class="kt-portlet">
						<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title"><?php echo e("Create Intro"); ?></h3>
									</div>
									
								</div>				
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('coupon-create')): ?>
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('intro.store')); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
																							
                                                <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e("title"); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title')): ?> is-invalid <?php endif; ?>" name="title"
                                                               value="<?php echo e(old('title')); ?>" autocomplete="off" placeholder="title*" />
                                                               <?php if($errors->has('title')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e("icon"); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('icon')): ?> is-invalid <?php endif; ?>" name="icon"
                                                               value="<?php echo e(old('icon')); ?>" autocomplete="off" placeholder="icon*" />
                                                               <?php if($errors->has('icon')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('icon')); ?></div>
                                                               <?php endif; ?>
                                                </div>
													<div class="col-lg-3">
														<label><?php echo e("description"); ?></label>
														<textarea type="text" class="form-control <?php if($errors->has('description')): ?> is-invalid <?php endif; ?>" name="description"
																 autocomplete="off" placeholder="description*" ><?php echo e(old('description')); ?></textarea>
														<?php if($errors->has('description')): ?>
															<div class="invalid-feedback"><?php echo e($errors->first('description')); ?></div>
														<?php endif; ?>
													</div>

													<div class="col-lg-6">
                                                <div class="form-group row">
													<label class="col-3 col-form-label"><?php echo e(__('adminMessage.isactive')); ?></label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox" checked="checked" name="is_active"  id="is_active" value="1"/>
																<span></span>
															</label>
														</span>
													</div>

													
												   </div>
                                                </div>
                                            </div>
                                            
                                            
                                         


											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.save')); ?></button>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('admin/intro')); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
												</div>
											</div>
										</form>
                                  
                            <?php else: ?>
                            <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text"><?php echo e(__('adminMessage.youdonthavepermission')); ?></div>
							</div>
                            <?php endif; ?>
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
        
      
       
       <!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo e(url('admin_assets/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>
        <script>
		$('.datepick').datepicker({format:"yyyy-mm-dd"});
		</script>
	</body>

	<!-- end::Body -->
</html><?php /**PATH E:\shayegan_project\shop\resources\views/gwc/intro/create.blade.php ENDPATH**/ ?>