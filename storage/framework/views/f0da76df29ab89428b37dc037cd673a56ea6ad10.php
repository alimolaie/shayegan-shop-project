<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?> | <?php echo e(__('adminMessage.facebooksettings')); ?></title>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.systems')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('gwc/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.smssettings')); ?></a>
									</div>
								</div>
								
							</div>
						</div>
                        

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        
                          <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          
                         <?php if(auth()->guard('admin')->user()->can('sms-setting-edit')): ?>  
                           <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('smssettingpost',$settingDetails->keyname)); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            
							<div class="row">
								<div class="col-md-12">
                       
									<!--begin::Portlet-->
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													<?php echo e(__('adminMessage.smssettings')); ?>

												</h3>
											</div>
										</div>

										<!--begin::Form-->
                                       
											<div class="kt-portlet__body">
                                            <?php if(!empty($smsDetails['sms_points'])): ?>
                                            <div class="form-group">
                                            <div class="row">
                                             <div class="col-lg-4">Status : <?php echo e($smsDetails['status']); ?></div>
                                             <div class="col-lg-4">SMS Points : <?php echo e($smsDetails['sms_points']); ?></div>
                                             <div class="col-lg-4">SMS Points : <?php echo e($smsDetails['expiry_date']); ?></div>
                                            </div>
                                            </div>
                                            <?php endif; ?>
                                            
                                            
                                            <div class="row">
                                             <div class="col-lg-3">
												<div class="form-group">
                                                <div class="input-group row">
												 <label class="col-6"><?php echo e(__('adminMessage.enable_sms_notification')); ?>*</label>
													<div class="col-6">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e((!empty(old('is_sms_active')) || !empty($settingDetails->is_sms_active))?'checked':''); ?> type="checkbox"  id="is_sms_active" name="is_sms_active"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div> 
                                               </div> 
                                               <div class="col-lg-3">
                                                 <div class="form-group">
                                                    <label for="sms_userid"><?php echo e(__('adminMessage.sms_userid')); ?>*</label>
													<input id="sms_userid"   name="sms_userid" class="form-control  <?php if($errors->has('sms_userid')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.enter_sms_userid')); ?>" value="<?php if(!empty(old('sms_userid'))): ?><?php echo e(old('sms_userid')); ?><?php elseif($settingDetails->sms_userid): ?><?php echo e($settingDetails->sms_userid); ?><?php endif; ?>">
                                                    <?php if($errors->has('sms_userid')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_userid')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                               <div class="col-lg-3">
                                               <div class="form-group">
                                                    <label for="sms_sender_name"><?php echo e(__('adminMessage.sms_sender_name')); ?>*</label>
													<input id="sms_sender_name"   name="sms_sender_name" class="form-control  <?php if($errors->has('sms_sender_name')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.enter_sms_sender_name')); ?>" value="<?php if(!empty(old('sms_sender_name'))): ?><?php echo e(old('sms_sender_name')); ?><?php elseif($settingDetails->sms_sender_name): ?><?php echo e($settingDetails->sms_sender_name); ?><?php endif; ?>">
                                                    <?php if($errors->has('sms_sender_name')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_sender_name')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                               <div class="col-lg-3">
                                                  <div class="form-group">
                                                    <label for="sms_api_key"><?php echo e(__('adminMessage.sms_api_key')); ?>*</label>
													<input id="sms_api_key"   name="sms_api_key" class="form-control  <?php if($errors->has('sms_api_key')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.enter_sms_api_key')); ?>" value="<?php if(!empty(old('sms_api_key'))): ?><?php echo e(old('sms_api_key')); ?><?php elseif($settingDetails->sms_api_key): ?><?php echo e($settingDetails->sms_api_key); ?><?php endif; ?>">
                                                    <?php if($errors->has('sms_api_key')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_api_key')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                               
                                               
                                          </div>                                                
                                         <div class="form-group"><i><?php echo __('adminMessage.dezsmsnotes'); ?></i></div>
                
                                                
                                             <!-- sms box -->
                                               <div class="form-group">
                                               <h5><?php echo e(__('adminMessage.notificationafterorderplaced_cod')); ?></h5>
                                               <div class="row">
                                               <div class="col-lg-5">
                                                  <div class="form-group">
													<textarea name="sms_text_cod_en" class="form-control  <?php if($errors->has('sms_text_cod_en')): ?> is-invalid <?php endif; ?>" id="sms_text_cod_en" placeholder="<?php echo e(__('adminMessage.sms_text')); ?>(En)*"><?php if(!empty(old('sms_text_cod_en'))): ?><?php echo e(old('sms_text_cod_en')); ?><?php elseif($settingDetails->sms_text_cod_en): ?><?php echo e($settingDetails->sms_text_cod_en); ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('sms_text_cod_en')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_text_cod_en')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                               <div class="col-lg-5">
                                                  <div class="form-group">
													<textarea name="sms_text_cod_ar" class="form-control  <?php if($errors->has('sms_text_cod_ar')): ?> is-invalid <?php endif; ?>" id="sms_text_cod_ar" placeholder="<?php echo e(__('adminMessage.sms_text')); ?>(Ar)*"><?php if(!empty(old('sms_text_cod_ar'))): ?><?php echo e(old('sms_text_cod_ar')); ?><?php elseif($settingDetails->sms_text_cod_ar): ?><?php echo e($settingDetails->sms_text_cod_ar); ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('sms_text_cod_ar')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_text_cod_ar')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                                <div class="col-lg-2" align="right">
                                                  <span class="kt-switch"><label>
												<input value="1" <?php echo e((!empty(old('sms_text_cod_active')) || !empty($settingDetails->sms_text_cod_active))?'checked':''); ?> type="checkbox"  id="sms_text_cod_active" name="sms_text_cod_active"><span></span>
															</label>
														</span>
                                                  </div>
                                                 </div>  
                                                </div>
                                               <!--end sms box --> 
                                               
                                               
                                               <!-- sms box -->
                                               <div class="form-group">
                                               <h5><?php echo e(__('adminMessage.notificationafterorderplaced_knet')); ?></h5>
                                               <div class="row">
                                               <div class="col-lg-5">
                                                  <div class="form-group">
													<textarea name="sms_text_knet_en" class="form-control  <?php if($errors->has('sms_text_knet_en')): ?> is-invalid <?php endif; ?>" id="sms_text_knet_en" placeholder="<?php echo e(__('adminMessage.sms_text')); ?>(En)*"><?php if(!empty(old('sms_text_knet_en'))): ?><?php echo e(old('sms_text_knet_en')); ?><?php elseif($settingDetails->sms_text_knet_en): ?><?php echo e($settingDetails->sms_text_knet_en); ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('sms_text_knet_en')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_text_knet_en')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                               <div class="col-lg-5">
                                                  <div class="form-group">
													<textarea name="sms_text_knet_ar" class="form-control  <?php if($errors->has('sms_text_knet_ar')): ?> is-invalid <?php endif; ?>" id="sms_text_knet_ar" placeholder="<?php echo e(__('adminMessage.sms_text')); ?>(Ar)*"><?php if(!empty(old('sms_text_knet_ar'))): ?><?php echo e(old('sms_text_knet_ar')); ?><?php elseif($settingDetails->sms_text_knet_ar): ?><?php echo e($settingDetails->sms_text_knet_ar); ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('sms_text_knet_ar')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_text_knet_ar')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                                <div class="col-lg-2" align="right">
                                                  <span class="kt-switch"><label>
												<input value="1" <?php echo e((!empty(old('sms_text_knet_active')) || !empty($settingDetails->sms_text_knet_active))?'checked':''); ?> type="checkbox"  id="sms_text_knet_active" name="sms_text_knet_active"><span></span>
															</label>
														</span>
                                                  </div>
                                                 </div>  
                                                </div>
                                               <!--end sms box -->
                                               
                                               <!-- sms box -->
                                               <div class="form-group">
                                               <h5><?php echo e(__('adminMessage.notificationafterordertrack')); ?></h5>
                                               <div class="row">
                                               <div class="col-lg-5">
                                                  <div class="form-group">
													<textarea name="sms_text_track_order_en" class="form-control  <?php if($errors->has('sms_text_track_order_en')): ?> is-invalid <?php endif; ?>" id="sms_text_track_order_en" placeholder="<?php echo e(__('adminMessage.sms_text')); ?>(En)*"><?php if(!empty(old('sms_text_track_order_en'))): ?><?php echo e(old('sms_text_track_order_en')); ?><?php elseif($settingDetails->sms_text_track_order_en): ?><?php echo e($settingDetails->sms_text_track_order_en); ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('sms_text_track_order_en')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_text_track_order_en')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                               <div class="col-lg-5">
                                                  <div class="form-group">
													<textarea name="sms_text_track_order_ar" class="form-control  <?php if($errors->has('sms_text_track_order_ar')): ?> is-invalid <?php endif; ?>" id="sms_text_track_order_ar" placeholder="<?php echo e(__('adminMessage.sms_text')); ?>(Ar)*"><?php if(!empty(old('sms_userid'))): ?><?php echo e(old('sms_userid')); ?><?php elseif($settingDetails->sms_text_track_order_ar): ?><?php echo e($settingDetails->sms_text_track_order_ar); ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('sms_text_track_order_ar')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_text_track_order_ar')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                                <div class="col-lg-2" align="right">
                                                  <span class="kt-switch"><label>
												<input value="1" <?php echo e((!empty(old('sms_text_track_order_active')) || !empty($settingDetails->sms_text_track_order_active))?'checked':''); ?> type="checkbox"  id="sms_text_track_order_active" name="sms_text_track_order_active"><span></span>
															</label>
														</span>
                                                  </div>
                                                 </div>  
                                                </div>
                                               <!--end sms box -->
                                               
                                               <!-- sms box -->
                                               <div class="form-group">
                                               <h5><?php echo e(__('adminMessage.notificationforoutofstock')); ?></h5>
                                               <div class="row">
                                               <div class="col-lg-5">
                                                  <div class="form-group">
													<textarea name="sms_text_outofstock_en" class="form-control  <?php if($errors->has('sms_text_outofstock_en')): ?> is-invalid <?php endif; ?>" id="sms_text_outofstock_en" placeholder="<?php echo e(__('adminMessage.sms_text')); ?>(En)*"><?php if(!empty(old('sms_text_outofstock_en'))): ?><?php echo e(old('sms_text_outofstock_en')); ?><?php elseif($settingDetails->sms_text_outofstock_en): ?><?php echo e($settingDetails->sms_text_outofstock_en); ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('sms_text_outofstock_en')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_text_outofstock_en')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                               <div class="col-lg-5">
                                                  <div class="form-group">
													<textarea name="sms_text_outofstock_ar" class="form-control  <?php if($errors->has('sms_text_outofstock_ar')): ?> is-invalid <?php endif; ?>" id="sms_text_outofstock_ar" placeholder="<?php echo e(__('adminMessage.sms_text')); ?>(Ar)*"><?php if(!empty(old('sms_text_outofstock_ar'))): ?><?php echo e(old('sms_text_outofstock_ar')); ?><?php elseif($settingDetails->sms_text_outofstock_ar): ?><?php echo e($settingDetails->sms_text_outofstock_ar); ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('sms_text_outofstock_ar')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('sms_text_outofstock_ar')); ?></div>
                                                    <?php endif; ?>
												 </div>
                                               </div>
                                                <div class="col-lg-2" align="right">
                                                  <span class="kt-switch"><label>
												<input value="1" <?php echo e((!empty(old('sms_text_outofstock_active')) || !empty($settingDetails->sms_text_outofstock_active))?'checked':''); ?> type="checkbox"  id="sms_text_outofstock_active" name="sms_text_outofstock_active"><span></span>
															</label>
														</span>
                                                  </div>
                                                 </div>  
                                                </div>
                                               <!--end sms box -->
                                               
                                           
                                               
                                          	
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.save')); ?></button>
												</div>
											</div>
										

										<!--end::Form-->
									</div>

									<!--end::Portlet-->

								</div>
								
                                
							</div>
                            </form>
                            <?php else: ?>
                            <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text"><?php echo e(__('adminMessage.youdonthavepermission')); ?></div>
							</div>
                            <?php endif; ?>
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
</html><?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/gwc/setting/adminSmsForm.blade.php ENDPATH**/ ?>