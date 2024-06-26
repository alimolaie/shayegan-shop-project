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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.catalog')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('gwc/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.facebooksettings')); ?></a>
									</div>
								</div>
								
							</div>
						</div>
                        

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        
                          <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          
                         <?php if(auth()->guard('admin')->user()->can('facebook-setting-edit')): ?>  
                           <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('facebooksettingpost',$settingDetails->keyname)); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="row">
								<div class="col-md-6">
                          
									<!--begin::Portlet-->
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													<?php echo e(__('adminMessage.facebooksettings')); ?>

												</h3>
											</div>
										</div>

										<!--begin::Form-->
                                       
											<div class="kt-portlet__body">
												                                                
                                                <div class="form-group">
													<h5><?php echo e(__('adminMessage.facebookpixel')); ?></h5>
                                                    <p><i><?php echo __('adminMessage.facebook_pixel_note'); ?></i></p>
													<textarea  style="height:200px;"  name="facebook_pixel" class="form-control  <?php if($errors->has('facebook_pixel')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.enter_facebook_pixel')); ?>"><?php if($settingDetails->facebook_pixel): ?> <?php echo e($settingDetails->facebook_pixel); ?> <?php endif; ?></textarea>
                                                    <?php if($errors->has('facebook_pixel')): ?>
                                                  <div class="invalid-feedback"><?php echo e($errors->first('facebook_pixel')); ?></div>
                                                    <?php endif; ?>
												</div>
                                             
                                               <div class="form-group">
                                               <h5><?php echo e(__('adminMessage.microdata')); ?></h5>
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_title')); ?>*</label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input value="1" readonly <?php echo e(!empty($settingDetails->og_title)?'checked':''); ?> type="checkbox"  id="og_title" name="og_title"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_description')); ?>*</label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input value="1" readonly <?php echo e(!empty($settingDetails->og_description)?'checked':''); ?> type="checkbox"  id="og_description" name="og_description"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_url')); ?>*</label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input readonly value="1" <?php echo e(!empty($settingDetails->og_url)?'checked':''); ?> type="checkbox"  id="og_url" name="og_url"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_image')); ?>*</label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->og_image)?'checked':''); ?> type="checkbox"  id="og_image" name="og_image"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_brand')); ?></label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->og_brand)?'checked':''); ?> type="checkbox"  id="og_brand" name="og_brand"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_availability')); ?>*</label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input readonly value="1" <?php echo e(!empty($settingDetails->og_availability)?'checked':''); ?> type="checkbox"  id="og_availability" name="og_availability"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_category')); ?></label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->og_category)?'checked':''); ?> type="checkbox"  id="og_category" name="og_category"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_condition')); ?></label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->og_condition)?'checked':''); ?> type="checkbox"  id="og_condition" name="og_condition"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_gender')); ?></label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input readonly value="1" <?php echo e(!empty($settingDetails->og_gender)?'checked':''); ?> type="checkbox"  id="og_gender" name="og_gender"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_locale')); ?>*</label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->og_locale)?'checked':''); ?> type="checkbox"  id="og_locale" name="og_locale"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_retailer_item_id')); ?>*</label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input readonly value="1" <?php echo e(!empty($settingDetails->og_retailer_item_id)?'checked':''); ?> type="checkbox"  id="og_retailer_item_id" name="og_retailer_item_id"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_currency')); ?>*</label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input readonly value="1" <?php echo e(!empty($settingDetails->og_currency)?'checked':''); ?> type="checkbox"  id="og_currency" name="og_currency"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_amount')); ?>*</label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input readonly value="1" <?php echo e(!empty($settingDetails->og_amount)?'checked':''); ?> type="checkbox"  id="og_amount" name="og_amount"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_sale_price_dates_start')); ?></label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->og_sale_price_dates_start)?'checked':''); ?> type="checkbox"  id="og_sale_price_dates_start" name="og_sale_price_dates_start"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.og_sale_price_dates_end')); ?></label>
													<div class="col-2">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->og_sale_price_dates_end)?'checked':''); ?> type="checkbox"  id="og_sale_price_dates_end" name="og_sale_price_dates_end"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                   
                                                   
                                                </div>
                                          	
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
        
       
        <!--begin::Page Vendors(used by this page) -->
		<script src="<?php echo e(url('admin_assets/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')); ?>" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<script>
        ClassicEditor
        .create( document.querySelector( '#kt-ckeditor-1' ) )
        .catch( error => {
            console.error( error );
        } );
		
		ClassicEditor
        .create( document.querySelector( '#kt-ckeditor-2' ) )
        .catch( error => {
            console.error( error );
        } );
       </script>

	</body>

	<!-- end::Body -->
</html><?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/gwc/setting/adminFacebookForm.blade.php ENDPATH**/ ?>