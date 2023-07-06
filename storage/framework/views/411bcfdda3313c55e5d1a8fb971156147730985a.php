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
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.createcoupon')); ?></a>
									</div>
								</div>
								<?php if(auth()->guard('admin')->user()->can('coupon-list')): ?>
												<a style="margin-top:10px;" href="<?php echo e(url('gwc/coupon')); ?>" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-list-ul"></i><?php echo e(__('adminMessage.listcoupon')); ?></a> <?php endif; ?>
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
										<h3 class="kt-portlet__head-title"><?php echo e(__('adminMessage.createcoupon')); ?></h3>
									</div>
									
								</div>				
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('coupon-create')): ?>
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('coupon.store')); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
																							
                                                <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.title_en')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title_en')): ?> is-invalid <?php endif; ?>" name="title_en"
                                                               value="<?php echo e(old('title_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_en')); ?>*" />
                                                               <?php if($errors->has('title_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.title_ar')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title_ar')): ?> is-invalid <?php endif; ?>" name="title_ar"
                                                               value="<?php echo e(old('title_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_ar')); ?>*" />
                                                               <?php if($errors->has('title_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_ar')); ?></div>
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
                                                    <label class="col-3 col-form-label"><?php echo e(__('adminMessage.freeshipping')); ?></label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox"  name="is_free"  id="is_free" value="1"/>
																<span></span>
															</label>
														</span>
													</div>
													
												   </div>
                                                </div>
                                            </div>
                                            
                                            
                                         
                                         <div class="form-group row">
                                                <div class="col-lg-2">
                                                <label><?php echo e(__('adminMessage.coupon_code')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('coupon_code')): ?> is-invalid <?php endif; ?>" name="coupon_code" value="<?php echo e(old('coupon_code')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_coupon_code')); ?>*" />
                                                               <?php if($errors->has('coupon_code')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('coupon_code')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-2">
                                                <label><?php echo e(__('adminMessage.coupon_type')); ?></label>
                                                <select class="form-control <?php if($errors->has('coupon_type')): ?> is-invalid <?php endif; ?>" name="coupon_type" >
                                                <option value=""><?php echo e(__('adminMessage.choosetype')); ?>*</option>
                                                <option value="amt" <?php if(old('coupon_type') && old('coupon_type')=='amt'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.amountkd')); ?></option>
                                                <option value="per" <?php if(old('coupon_type') && old('coupon_type')=='per'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.percentage')); ?></option>
                                                </select>
                                                <?php if($errors->has('coupon_code')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('coupon_code')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                <div class="col-lg-2">
                                                <label><?php echo e(__('adminMessage.coupon_value')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('coupon_value')): ?> is-invalid <?php endif; ?>" name="coupon_value"
                                                               value="<?php echo e(old('coupon_value')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_coupon_value')); ?>*" />
                                                               <?php if($errors->has('coupon_value')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('coupon_value')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.date_range')); ?></label>
													<div class="input-group">
														<input type="text" class="datepick form-control <?php if($errors->has('start_date')): ?> is-invalid <?php endif; ?>" name="start_date" value="<?php echo e(old('start_date')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.start_date')); ?>*" />
														<input type="text" class=" datepick form-control <?php if($errors->has('end_date')): ?> is-invalid <?php endif; ?>" name="end_date"
                                                               value="<?php echo e(old('end_date')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.end_date')); ?>*" />
													</div>
                                                    <?php if($errors->has('start_date')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('start_date')); ?></div>
                                                    <?php endif; ?>
                                                    <?php if($errors->has('end_date')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('end_date')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.price_range')); ?></label>
													<div class="input-group">
														<input type="text" class="form-control <?php if($errors->has('price_start')): ?> is-invalid <?php endif; ?>" name="price_start" value="<?php echo e(old('price_start')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.price_start')); ?>*" />
														<input type="text" class="form-control <?php if($errors->has('price_end')): ?> is-invalid <?php endif; ?>" name="price_end"
                                                               value="<?php echo e(old('price_end')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.price_end')); ?>*" />
													</div>
                                                   
                                                    <?php if($errors->has('price_start')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('price_start')); ?></div>
                                                    <?php endif; ?>
                                                    <?php if($errors->has('price_end')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('price_end')); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                                
                                            </div>
                                               
                                               <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.usage_limit')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('usage_limit')): ?> is-invalid <?php endif; ?>" name="usage_limit" value="<?php echo e(old('usage_limit')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_usage_limit')); ?>*" />
                                                               <?php if($errors->has('usage_limit')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('usage_limit')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-2">
                                                <label><?php echo e(__('adminMessage.coupon_for')); ?></label>
                                                <select class="form-control <?php if($errors->has('is_for')): ?> is-invalid <?php endif; ?>" name="is_for" >
                                                <option value="web" <?php if(old('is_for') && old('is_for')=='web'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.web')); ?></option>
                                                <option value="app" <?php if(old('is_for') && old('is_for')=='app'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.app')); ?></option>
                                                </select>
                                                <?php if($errors->has('is_for')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('is_for')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                                                              
                                                
                                            </div>
                                                  
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.save')); ?></button>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/coupon')); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
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
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/coupon/create.blade.php ENDPATH**/ ?>