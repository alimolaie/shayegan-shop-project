<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.createbanner')); ?></title>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.banner')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('gwc/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.createbanner')); ?></a>
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
										<h3 class="kt-portlet__head-title"><?php echo e(__('adminMessage.createbanner')); ?></h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												
												<?php if(auth()->guard('admin')->user()->can('banner-list')): ?>
												<a href="<?php echo e(url('gwc/banner')); ?>" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-list-ul"></i><?php echo e(__('adminMessage.listbanner')); ?></a> <?php endif; ?>
											</div>
										</div>
									</div>
								</div>				
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('banner-create')): ?>
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('banner.store')); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
																					
                                       <!--categories name -->         
                                               
                                               <div class="form-group row">  
                                                <div class="col-lg-4">
                                                <label><?php echo e(__('adminMessage.title_en')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title_en')): ?> is-invalid <?php endif; ?>" name="title_en"
                                                               value="<?php echo e(old('title_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_en')); ?>" />
                                                 <?php if($errors->has('title_en')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('title_en')); ?></div>
                                                 <?php endif; ?>
                                                </div>
                                                <div class="col-lg-4">
                                                <label><?php echo e(__('adminMessage.title_ar')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title_ar')): ?> is-invalid <?php endif; ?>" name="title_ar"
                                                               value="<?php echo e(old('title_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_ar')); ?>" />
                                                               <?php if($errors->has('title_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-4">
                                                <label><?php echo e(__('adminMessage.link')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('link')): ?> is-invalid <?php endif; ?>" name="link"
                                                               value="<?php echo e(old('link')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_link')); ?>" />
                                                               <?php if($errors->has('link')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('link')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                   <div class="form-group row">
											<div class="col-lg-4">
                                                <label><?php echo e(__('adminMessage.type')); ?></label>
											<select class="form-control <?php if($errors->has('link_type')): ?> is-invalid <?php endif; ?>" name="link_type">
											<option value="web">Web</option>
											<option value="category">Category</option>
											<option value="product">Product</option>
											</select>
                                                               <?php if($errors->has('link_type')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('link_type')); ?></div>
                                                               <?php endif; ?>	
												
										    </div>		
											<div class="col-lg-4">
                                                <label><?php echo e(__('adminMessage.link')); ?> or ID</label>
                                                <input type="text" class="form-control <?php if($errors->has('link_id')): ?> is-invalid <?php endif; ?>" name="link_id"
                                                               value="<?php echo e(old('link_id')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_link')); ?>" />
                                                               <?php if($errors->has('link_id')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('link_id')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            <?php if($theme==8 || $theme==10): ?>    
                                            <div class="col-lg-2">  
                                            <label><?php echo e(__('adminMessage.image_size')); ?></label> 
                                            <select name="image_size" class="form-control">
                                            <option value="1">296 X 254</option>
                                            <option value="2">296 X 520</option>
                                            <option value="3">612 X 256</option>
                                            </select> 
                                            </div> 
                                            <div class="col-lg-2">  
                                            <label><?php echo e(__('adminMessage.location')); ?></label>  
                                            <select name="box" class="form-control">
                                            <?php for($i=1;$i<=6;$i++): ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                            <?php endfor; ?>
                                            </select>
                                            </div>  
                                            <?php endif; ?> 
											</div>

												<div class="form-group row">
													<div class="col-lg-6">
														<label><?php echo e(__('adminMessage.details_en')); ?></label>
														<textarea   rows="3" id="details_en" name="details_en" class="tinymce-editor form-control" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_en')); ?>"><?php echo e(old('details_en')); ?></textarea>
													</div>
													<div class="col-lg-6">
														<label><?php echo e(__('adminMessage.details_ar')); ?></label>
														<textarea   rows="2" id="details_ar" name="details_ar" class="tinymce-editor form-control" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_ar')); ?>"><?php echo e(old('details_ar')); ?></textarea>
													</div>
												</div>
                                         <div class="form-group row">
                                                <div class="col-lg-6">
                                                        <label>
                                                        <?php if($theme<>8): ?>
                                                        <?php echo e(trans('theme')['theme'.$theme]['banner_image']); ?>

                                                        <?php else: ?>
                                                        <?php echo e(trans('adminMessage.image')); ?>

                                                        
                                                        <?php endif; ?>
                                                        *</label>
                                                        <div class="custom-file <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>"  id="image" name="image">
														<label class="custom-file-label" for="image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                               <?php if($errors->has('image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group row mt-4">
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
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/banner')); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
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

		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script type="text/javascript">
			tinymce.init({
				selector: 'textarea.tinymce-editor',
				height: 300,
				menubar: false,
				plugins: [
					'advlist autolink lists link image charmap print preview anchor',
					'searchreplace visualblocks code fullscreen',
					'insertdatetime media table paste code help wordcount', 'image'
				],
				toolbar: 'undo redo | formatselect | ' +
						'bold italic backcolor | alignleft aligncenter ' +
						'alignright alignjustify | bullist numlist outdent indent | ' +
						'removeformat | help',
				content_css: '//www.tiny.cloud/css/codepen.min.css'
			});
		</script>
	</body>

	<!-- end::Body -->
</html><?php /**PATH E:\shayegan_project\shop\resources\views/gwc/banner/create.blade.php ENDPATH**/ ?>