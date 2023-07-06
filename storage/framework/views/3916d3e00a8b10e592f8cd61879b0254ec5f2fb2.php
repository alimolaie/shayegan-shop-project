<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?> | <?php echo e(__('adminMessage.exportimport')); ?></title>
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
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.exportimport')); ?></a>
									</div>
								</div>
								
							</div>
						</div>
                        

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        
                          <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          
                         <?php if(auth()->guard('admin')->user()->can('export-import-edit')): ?>  
                           
							<div class="row">
								<div class="col-md-6">
                          
									<!--begin::Portlet-->
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													<?php echo e(__('adminMessage.export')); ?>

												</h3>
											</div>
										</div>

										<!--begin::Form-->
                                       
											<div class="kt-portlet__body">
												                                                
                                                <!-- sms box -->
                                               <div class="form-group">
                                               <div class="row">
                                               <div class="col-lg-8">
                                                  <div class="form-group">
												  <label><?php echo e(__('adminMessage.product_table')); ?></label>
                                                   </div>
                                               </div>
                                               
                                                <div class="col-lg-4" align="right">
                                                  <a href="<?php echo e(url('gwc/export_product')); ?>" class="btn btn-success btn-sm pull-right"><?php echo e(__('adminMessage.export')); ?></a>
                                                  </div>
                                                 </div>  
                                                 
                                                 <div class="row">
                                               <div class="col-lg-8">
                                                  <div class="form-group">
												  <label><?php echo e(__('adminMessage.export_for_facebook')); ?></label>
                                                   </div>
                                               </div>
                                               
                                                 <div class="col-lg-2 text-center">
                                                  <a href="<?php echo e(url('gwc/export_product_facebook/en')); ?>" class="btn btn-success btn-sm pull-right"><?php echo e(__('adminMessage.export')); ?>(En)</a>
                                                  </div>
                                                  <div class="col-lg-2 text-center">
                                                  <a style="margin-left:5px;" href="<?php echo e(url('gwc/export_product_facebook/ar')); ?>" class="btn btn-success btn-sm pull-right"><?php echo e(__('adminMessage.export')); ?>(Ar)</a>
                                                  </div>
                                                 </div>
                                                 
                                                 <div class="row">
                                               <div class="col-lg-8">
                                                  <div class="form-group">
												  <label><?php echo e(__('adminMessage.export_for_google')); ?></label>
                                                   </div>
                                               </div>
                                               
                                                 <div class="col-lg-2 text-center">
                                                  <a href="<?php echo e(url('gwc/export_product_google/en')); ?>" class="btn btn-success btn-sm pull-right"><?php echo e(__('adminMessage.export')); ?>(En)</a>
                                                  </div>
                                                  <div class="col-lg-2 text-center">
                                                  <a style="margin-left:5px;" href="<?php echo e(url('gwc/export_product_google/ar')); ?>" class="btn btn-success btn-sm pull-right"><?php echo e(__('adminMessage.export')); ?>(Ar)</a>
                                                  </div>
                                                 </div>
                                                 
                                                </div>
                                               <!--end sms box --> 
                                               
                                             
                                               
                                          	
											</div>
											
										

										<!--end::Form-->
									</div>

									<!--end::Portlet-->

								</div>
								<div class="col-md-6">
                          
									<!--begin::Portlet-->
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													<?php echo e(__('adminMessage.import')); ?>

												</h3>
											</div>
										</div>

										<!--begin::Form-->
                                       
											<div class="kt-portlet__body">
												     
                                                                                                
                                                <!-- box -->
                                               <form action="<?php echo e(route('import_product')); ?>" name="import_product_form" id="import_product_form" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                               <div class="form-group">
                                               <div class="row">
                                               <div class="col-lg-4">
                                                  <div class="form-group"><label><?php echo e(__('adminMessage.product_table')); ?><br><a href="<?php echo e(url('admin_assets/assets/demo.xlsx')); ?>" target="_blank"><?php echo e(__('adminMessage.demoexample')); ?></a></label></div>
                                               </div>
                                               <div class="col-lg-6">
                                                  <div class="form-group">
                                                  <input type="file" name="file_product" class="form-control">                                                  
                                                   </div>
                                               </div>
                                               
                                                <div class="col-lg-2" align="right">
                                                  <button type="submit" class="btn btn-info btn-sm pull-right"><?php echo e(__('adminMessage.import')); ?></button>
                                                  </div>
                                                 </div>  
                                                 <div class="row">
                                                 <div class="col-lg-12"><?php echo __('adminMessage.importnote'); ?></div>
                                                 </div>
                                                </div>
                                                </form>
                                               <!--end sms box --> 
                                               
                                             
                                               
                                          	
											</div>
											
										

										<!--end::Form-->
									</div>

									<!--end::Portlet-->

								</div>
                                
							</div>
                       
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
</html><?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/gwc/setting/adminExportImportForm.blade.php ENDPATH**/ ?>