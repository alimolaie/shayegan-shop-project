<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.editcustomers')); ?></title>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.customers')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('gwc/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                        <span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="<?php echo e(url('gwc/customers')); ?>" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.customers')); ?></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.editcustomers')); ?></a>
									</div>
								</div>
                                <div class="kt-subheader__toolbar">
                                <a href="<?php echo e(url('gwc/customers')); ?>" class="btn btn-default btn-bold"><?php echo e(__('adminMessage.back')); ?></a>
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
										<h3 class="kt-portlet__head-title"><?php echo e(__('adminMessage.editcustomers')); ?></h3>
									</div>
									
								</div>				
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('customers-edit')): ?>
                    <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('customers.update',$editcustomers->id)); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
                                          
                                           
                                           
                                           <div class="form-group"><h5><?php echo e(__('adminMessage.basicinformation')); ?></h5></div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.name')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('name')): ?> is-invalid <?php endif; ?>" name="name"
                                                               value="<?php echo e($editcustomers->name?$editcustomers->name:old('name')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_name')); ?>*" />
                                                               <?php if($errors->has('name')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('name')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.email')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('email')): ?> is-invalid <?php endif; ?>" name="email"
                                                               value="<?php echo e($editcustomers->email?$editcustomers->email:old('email')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_email')); ?>*" />
                                                               <?php if($errors->has('email')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                           											
                                     
                                            
                                         <!-- friendly url , status , sorting -->   
                                         <div class="form-group row">
                                                <div class="col-lg-4">
                                                <label><?php echo e(__('adminMessage.mobile')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('mobile')): ?> is-invalid <?php endif; ?>" name="mobile"
                                                               value="<?php echo e($editcustomers->mobile?$editcustomers->mobile:old('mobile')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_mobile')); ?>*" />
                                                               <?php if($errors->has('mobile')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('mobile')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-4">
                                                <label><?php echo e(trans('theme')['theme'.$theme]['customer_profile_image']); ?></label>
                                                        <div class="custom-file <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>"  id="image" name="image">
														<label class="custom-file-label" for="image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                               <?php if($errors->has('image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-2">
                                                <?php if($editcustomers->image): ?>
                                                <img src="<?php echo url('uploads/customers/thumb/'.$editcustomers->image); ?>" width="40">
                                                <a href="<?php echo e(url('gwc/customers/deletecustomersImage/'.$editcustomers->id)); ?>" class="btn btn-brand btn-danger btn-icon-sm btn-sm"><i class="la la-trash"></i><?php echo e(__('adminMessage.delete')); ?></a>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group"><h5><?php echo e(__('adminMessage.status')); ?></h5></div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <div class="form-group row">
													<label class="col-3 col-form-label"><?php echo e(__('adminMessage.isactive')); ?></label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox" <?php echo e($editcustomers->is_active==1?'checked':''); ?> name="is_active"  id="is_active" value="1"/>
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
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/customers')); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
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
	</body>

	<!-- end::Body -->
</html><?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/gwc/customers/edit.blade.php ENDPATH**/ ?>