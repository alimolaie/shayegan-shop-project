<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.createtrackhistory')); ?></title>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.trackhistory')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('gwc/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.createtrackhistory')); ?></a>
                                        <span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link">#<?php echo e($OrderInfo->order_id); ?></a>
                                        
									</div>
								</div>
								
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
										<h3 class="kt-portlet__head-title"><?php echo e(__('adminMessage.createtrackhistory')); ?> </h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												
												<?php if(auth()->guard('admin')->user()->can('trackhistory-list')): ?>
												<a href="<?php echo e(url('gwc/orders-track/'.Request()->oid)); ?>" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-list-ul"></i><?php echo e(__('adminMessage.listtrackhistory')); ?></a> <?php endif; ?>
											</div>
										</div>
									</div>
								</div>				
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('trackhistory-create')): ?>
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('track-orders.postnewtrack',Request()->oid)); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
																					
                                  
                                            <!--categories description -->          
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.details_en')); ?>*</label>
                                                        <textarea rows="3" id="details_en" name="details_en" class="form-control <?php if($errors->has('details_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_en')); ?>"><?php if(!empty($settingInfo->is_sms_active) && !empty($settingInfo->sms_text_track_order_active) && !empty($settingInfo->sms_text_track_order_en)): ?><?php echo e($settingInfo->sms_text_track_order_en); ?><?php else: ?><?php echo e(old('details_en')); ?><?php endif; ?></textarea>
                                                               <?php if($errors->has('details_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.details_ar')); ?>*</label>
                                                        <textarea   rows="3" id="details_ar" name="details_ar" class="form-control <?php if($errors->has('details_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_ar')); ?>"><?php if(!empty($settingInfo->is_sms_active) && !empty($settingInfo->sms_text_track_order_active) && !empty($settingInfo->sms_text_track_order_ar)): ?><?php echo e($settingInfo->sms_text_track_order_ar); ?><?php else: ?><?php echo e(old('details_ar')); ?><?php endif; ?></textarea>
                                                               <?php if($errors->has('details_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                    
                                    
                                            
                                         <!-- friendly url , status , sorting -->   
                                         <div class="form-group row">
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
													<label class="col-3 col-form-label"><?php echo e(__('adminMessage.displayorder')); ?></label>
													<div class="col-3">
														<input type="text" class="form-control <?php if($errors->has('display_order')): ?> is-invalid <?php endif; ?>" name="display_order"  value="<?php echo e(old('display_order')?old('display_order'):$lastOrder); ?>" autocomplete="off" />
                                                               <?php if($errors->has('display_order')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('display_order')); ?></div>
                                                               <?php endif; ?>
													</div>
												   </div>
                                                </div>
                                                <div class="col-lg-3">
                                                 <div class="input-group date <?php if($errors->has('details_date')): ?> is-invalid <?php endif; ?>">
													<input type="text" class="form-control" placeholder="<?php echo e(__('adminMessage.datetime')); ?>*"  readonly="" name="details_date" value="<?php if(old('details_date')): ?><?php echo e(old('details_date')); ?><?php else: ?><?php echo e(date('Y-m-d H:i')); ?><?php endif; ?>" id="details_date">
													<div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-calendar glyphicon-th"></i>
														</span>
													</div>
												</div>              
                                                               
                                                <?php if($errors->has('details_date')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('details_date')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                           
                                                <select id="order_status" name="order_status" class="form-control">
                                                <option disabled><?php echo e(__('adminMessage.order_status')); ?></option>
                                                
                                                <option value="pending"   <?php if($OrderInfo->order_status=='pending'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.pending')); ?></option>      
                                                <option value="completed" <?php if($OrderInfo->order_status=='completed'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.completed')); ?></option> 
                                                <option value="canceled" <?php if($OrderInfo->order_status=='canceled'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.canceled')); ?></option> 
                                                <option value="returned" <?php if($OrderInfo->order_status=='returned'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.returned')); ?></option>   
                                                </select>
                                                
                                                </div>
                                                
                                            </div>
                                            
                                            <?php if(!empty($settingInfo->is_sms_active)): ?>
                                                <div class="form-group row">
													<label class="col-3 col-form-label"><?php echo e(__('adminMessage.sendsmsnotification')); ?></label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox" <?php if(!empty($settingInfo->sms_text_track_order_active)): ?> checked="checked" <?php endif; ?> name="is_sms_active"  id="is_sms_active" value="1"/>
																<span></span>
															</label>
														</span>
													</div>
												</div>
                                            <?php endif; ?>
                                                     
                                                     
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.save')); ?></button>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/orders-track/'.Request()->oid)); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
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
        
     
		<script>
        jQuery(document).ready(function() {
		$('.kt-tinymce-4').summernote({
		  toolbar: [
			// [groupName, [list of button]]
			['style', ['bold', 'italic', 'underline', 'clear']],
['fontname', ['fontname']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
		    ['table', ['table']],
		    ['insert', ['link', 'picture', 'video']],
		    ['view', ['fullscreen', 'codeview', 'help']],
		  ],
		  height:200
		});
		});
       </script>
       
       <!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo e(url('admin_assets/assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js')); ?>" type="text/javascript"></script>
        <script>
		$('#details_date').datetimepicker();
		</script>
	</body>

	<!-- end::Body -->
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/orders-track/create.blade.php ENDPATH**/ ?>