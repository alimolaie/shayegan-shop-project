<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.createproduct')); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		<?php echo $__env->make('gwc.css.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <link href="<?php echo e(url('admin_assets/assets/css/pages/wizard/wizard-1.css')); ?>" rel="stylesheet" type="text/css" />
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
                $warrantyLists = App\Http\Controllers\AdminProductController::getWarrantLists();
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.product')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('gwc/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.createproduct')); ?></a>
									</div>
								</div>
								<div class="kt-subheader__toolbar">
									<div class="btn-group">
                                        <?php if(auth()->guard('admin')->user()->can('product-list')): ?>
												<a href="<?php echo e(url('gwc/product')); ?>" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-list-ul"></i><?php echo e(__('adminMessage.listproduct')); ?></a> <?php endif; ?>
										
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
						<div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_projects_add" data-ktwizard-state="step-first">
									<div class="kt-grid__item">

											<!--begin: Form Wizard Nav -->
											<div class="kt-wizard-v1__nav">
												<div class="kt-wizard-v1__nav-items">

													<!--doc: Replace A tag with SPAN tag to disable the step link click -->
													<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.info'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.details')); ?>

															</div>
														</div>
													</div>
                                                   
                                                    <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.options'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.options')); ?>

															</div>
														</div>
													</div>
                                                    <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.category'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.categories')); ?>

															</div>
														</div>
													</div>
													<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.gallery'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.gallery')); ?>

															</div>
														</div>
													</div>
                                                    
													<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.seo'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.seoandtags')); ?>

															</div>
														</div>
													</div>
													
                                                    <div class="kt-wizard-v1__nav-item" >
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.finish'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.finish')); ?>

															</div>
														</div>
													</div>
												</div>
											</div>

											<!--end: Form Wizard Nav -->
										</div>
                                     </div>
												
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('product-create')): ?>
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('product.store')); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
																					
                                           <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.item_code')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('item_code')): ?> is-invalid <?php endif; ?>" name="item_code"
                                                               value="<?php echo e(old('item_code')?old('item_code'):$serialNumber); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_item_code')); ?>*" />
                                                               <?php if($errors->has('item_code')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('item_code')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.sku_no')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('sku_no')): ?> is-invalid <?php endif; ?>" name="sku_no"
                                                               value="<?php echo e(old('sku_no')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_sku_no')); ?>" />
                                                               <?php if($errors->has('sku_no')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('sku_no')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.weight')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('weight')): ?> is-invalid <?php endif; ?>" name="weight"  value="<?php echo e(old('weight')?old('weight'):''); ?>" autocomplete="off"   placeholder="<?php echo e(__('adminMessage.enter_weight')); ?>"/>
                                                               <?php if($errors->has('weight')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('weight')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.displayorder')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('display_order')): ?> is-invalid <?php endif; ?>" name="display_order"  value="<?php echo e(old('display_order')?old('display_order'):$lastOrder); ?>" autocomplete="off" />
                                                               <?php if($errors->has('display_order')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('display_order')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                                 
                                                <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_en')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title_en')): ?> is-invalid <?php endif; ?>" name="title_en"
                                                               value="<?php echo e(old('title_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_en')); ?>*" />
                                                               <?php if($errors->has('title_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_ar')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title_ar')): ?> is-invalid <?php endif; ?>" name="title_ar"
                                                               value="<?php echo e(old('title_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_ar')); ?>*" />
                                                               <?php if($errors->has('title_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.extra_title_en')); ?></label>
                                                <input  type="text" class="form-control <?php if($errors->has('extra_title_en')): ?> is-invalid <?php endif; ?>" name="extra_title_en"
                                                               value="<?php echo e(old('extra_title_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_en')); ?>" />
                                                               <?php if($errors->has('extra_title_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('extra_title_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.extra_title_ar')); ?></label>
                                                <input  type="text" class="form-control <?php if($errors->has('extra_title_ar')): ?> is-invalid <?php endif; ?>" name="extra_title_ar"
                                                               value="<?php echo e(old('extra_title_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_ar')); ?>" />
                                                               <?php if($errors->has('extra_title_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('extra_title_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.sdetails_en')); ?></label>
                                                        <textarea rows="3" id="sdetails_en" name="sdetails_en" class="form-control <?php if($errors->has('sdetails_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_sdetails_en')); ?>"><?php echo e(old('sdetails_en')); ?></textarea>
                                                               <?php if($errors->has('sdetails_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('sdetails_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.sdetails_ar')); ?></label>
                                                        <textarea   rows="3" id="sdetails_ar" name="sdetails_ar" class="form-control <?php if($errors->has('sdetails_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_sdetails_ar')); ?>"><?php echo e(old('sdetails_ar')); ?></textarea>
                                                               <?php if($errors->has('sdetails_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('sdetails_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                      <!--categories description -->          
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.details_en')); ?></label>
                                                        <textarea rows="3" id="details_en" name="details_en" class="kt-tinymce-4 form-control <?php if($errors->has('details_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_en')); ?>"><?php echo e(old('details_en')); ?></textarea>
                                                               <?php if($errors->has('details_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.details_ar')); ?></label>
                                                        <textarea   rows="3" id="details_ar" name="details_ar" class="kt-tinymce-4 form-control <?php if($errors->has('details_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_ar')); ?>"><?php echo e(old('details_ar')); ?></textarea>
                                                               <?php if($errors->has('details_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                    
                                           <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.retail_price')); ?>*</label>
                                                <input type="text" class="form-control <?php if($errors->has('retail_price')): ?> is-invalid <?php endif; ?>" name="retail_price"
                                                               value="<?php echo e(old('retail_price')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_retail_price')); ?>" />
                                                               <?php if($errors->has('retail_price')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('retail_price')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.old_price')); ?>(e.g : <s>KD 000</s>)</label>
                                                <input type="text" class="form-control <?php if($errors->has('old_price')): ?> is-invalid <?php endif; ?>" name="old_price"
                                                               value="<?php echo e(old('old_price')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_old_price')); ?>" />
                                                               <?php if($errors->has('old_price')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('old_price')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.cost_price')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('cost_price')): ?> is-invalid <?php endif; ?>" name="cost_price"
                                                               value="<?php echo e(old('cost_price')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_cost_price')); ?>" />
                                                               <?php if($errors->has('cost_price')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('cost_price')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.wholesale_price')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('wholesale_price')): ?> is-invalid <?php endif; ?>" name="wholesale_price"
                                                               value="<?php echo e(old('wholesale_price')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_wholesale_price')); ?>" />
                                                               <?php if($errors->has('wholesale_price')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('wholesale_price')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                               
                                            </div>
                                          
                                            <div class="form-group row">
                                               
                                                <div class="col-lg-4">
                                                        <label><?php echo e(trans('theme')['theme'.$theme]['product_image']); ?>*</label>
                                                        <div class="custom-file <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>"  id="image" name="image">
														<label class="custom-file-label" for="image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                               <?php if($errors->has('image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                        <label><?php echo e(trans('theme')['theme'.$theme]['product_rollover_image']); ?></label>
                                                        <div class="custom-file <?php if($errors->has('rollover_image')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('rollover_image')): ?> is-invalid <?php endif; ?>"  id="rollover_image" name="rollover_image">
														<label class="custom-file-label" for="rollover_image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                               <?php if($errors->has('rollover_image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('rollover_image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-4">
                                                        <label><?php echo e(trans('theme')['theme'.$theme]['attachfile']); ?></label>
                                                        <div class="custom-file <?php if($errors->has('attachfile')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('attachfile')): ?> is-invalid <?php endif; ?>"  id="attachfile" name="attachfile">
														<label class="custom-file-label" for="rollover_image"><?php echo e(__('adminMessage.choosefile')); ?></label>
													    </div>
                                                               <?php if($errors->has('attachfile')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('attachfile')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-8">
                                                <label><?php echo e(__('adminMessage.slug')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('slug')): ?> is-invalid <?php endif; ?>" name="slug"
                                                               value="<?php echo e(old('slug')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_slug')); ?>" />
                                                               <?php if($errors->has('slug')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('slug')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-4">
                                                <label><?php echo e(__('adminMessage.warranty')); ?></label>
                                                <select class="form-control <?php if($errors->has('warranty')): ?> is-invalid <?php endif; ?>" name="warranty">
                                                <option value="0"><?php echo e(__('adminMessage.choosewarranty')); ?></option>
                                                <?php if(!empty($warrantyLists) && count($warrantyLists)>0): ?>
                                                <?php $__currentLoopData = $warrantyLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warrantyList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($warrantyList->id); ?>"><?php echo e($warrantyList->title_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                </select>
                                                               <?php if($errors->has('warranty')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('warranty')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                      
                                                     
                                                     
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.next')); ?><i class="la la-angle-double-right"></i></button>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/product')); ?>'"  class="btn btn-secondary cancelbtn kt-pull-right"><?php echo e(__('adminMessage.cancel')); ?></button>
                                                    
                                                    <label for="redirect_to_listing"><input type="checkbox" name="redirect_to_listing" id="redirect_to_listing" value="1">&nbsp;<?php echo e(__('adminMessage.saveandredirecttolisting')); ?></label>
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
</html><?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/gwc/product/create.blade.php ENDPATH**/ ?>