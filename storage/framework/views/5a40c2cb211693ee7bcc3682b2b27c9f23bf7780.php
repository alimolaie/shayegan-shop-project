<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.createstate')); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		<?php echo $__env->make('gwc.css.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!-- token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed  kt-page--loading">

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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.state')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('gwc/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                        <span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="<?php echo e(url('gwc/country')); ?>" class="kt-subheader__breadcrumbs-link"><?php echo e($countryInfo->name_en); ?></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.createstate')); ?></a>
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
										<h3 class="kt-portlet__head-title"><?php echo e(__('adminMessage.createstate')); ?></h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												
												<?php if(auth()->guard('admin')->user()->can('state-list')): ?>
												<a href="<?php echo e(url('gwc/'.Request()->parent_id.'/state')); ?>" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-list-ul"></i><?php echo e(__('adminMessage.liststate')); ?></a> <?php endif; ?>
											</div>
										</div>
									</div>
								</div>				
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('state-create')): ?>
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('state.store',Request()->parent_id)); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
																					
                                       <!--categories name -->         
                                                <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.name_en')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('name_en')): ?> is-invalid <?php endif; ?>" name="name_en"
                                                               value="<?php echo e(old('name_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_name_en')); ?>*" />
                                                               <?php if($errors->has('name_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('name_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.name_ar')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('name_ar')): ?> is-invalid <?php endif; ?>" name="name_ar"
                                                               value="<?php echo e(old('name_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_name_ar')); ?>*" />
                                                               <?php if($errors->has('name_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('name_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                   
                                            
                                         <div class="form-group row">
                                                
                                                
                                                
                                                <div class="col-lg-8">
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
                                                
                                                
                                            </div>
                                            
                                                     
                                                     
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.save')); ?></button>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/'.Request()->parent_id.'/state')); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
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
		<script src="<?php echo e(url('admin_assets/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>
        <script>
		$('#news_date').datepicker({format:"yyyy-mm-dd"});
		</script>
	</body>

	<!-- end::Body -->
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/state/create.blade.php ENDPATH**/ ?>