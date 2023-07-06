<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.editproduct')); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		<?php echo $__env->make('gwc.css.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <link href="<?php echo e(url('admin_assets/assets/css/pages/wizard/wizard-1.css')); ?>" rel="stylesheet" type="text/css" />
		
		<!--mini color -->
        <link href="<?php echo e(url('admin_assets/assets/plugins/minicolors/jquery.minicolors.css')); ?>" rel="stylesheet" type="text/css" />
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
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.editproduct')); ?></a>
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
													<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" <?php if(Request::is('gwc/product/*/categories')==true || Request::is('gwc/product/*/seo-tags')==true || Request::is('gwc/product/*/edit')==true || Request::is('gwc/product/*/gallery')==true || Request::is('gwc/product/*/attributes')==true  || Request::is('gwc/product/*/finish')==true || Request::is('gwc/product/*/options')==true || Request::is('gwc/product/*/editoptions/*')==true): ?> data-ktwizard-state="current" <?php endif; ?>>                                    <a href="<?php echo e(url('gwc/product/'.$editproduct->id.'/edit')); ?>">
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.info'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.details')); ?>

															</div>
														</div>
                                                        </a>
													</div>
                                                    <div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" <?php if(Request::is('gwc/product/*/categories')==true || Request::is('gwc/product/*/seo-tags')==true || Request::is('gwc/product/*/attributes')==true  || Request::is('gwc/product/*/finish')==true || Request::is('gwc/product/*/options')==true || Request::is('gwc/product/*/gallery')==true): ?> data-ktwizard-state="current" <?php endif; ?>>
                                                    <a href="<?php echo e(url('gwc/product/'.$editproduct->id.'/options')); ?>">
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.options'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.options')); ?>

															</div>
														</div>
                                                        </a>
													</div>
                                                    
                                                    <div class="kt-wizard-v1__nav-item" <?php if(Request::is('gwc/product/*/categories')==true || Request::is('gwc/product/*/seo-tags')==true || Request::is('gwc/product/*/gallery')==true || Request::is('gwc/product/*/finish')==true): ?> data-ktwizard-state="current" <?php endif; ?>>
                                                    <a href="<?php echo e(url('gwc/product/'.$editproduct->id.'/categories')); ?>">
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.category'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.categories')); ?>

															</div>
														</div>
                                                        </a>
													</div>
													<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" <?php if(Request::is('gwc/product/*/seo-tags')==true || Request::is('gwc/product/*/gallery')==true || Request::is('gwc/product/*/finish')==true): ?> data-ktwizard-state="current" <?php endif; ?>>
														<a href="<?php echo e(url('gwc/product/'.$editproduct->id.'/gallery')); ?>">
                                                        <div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.gallery'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.gallery')); ?>

															</div>
														</div>
                                                        </a>
													</div>
                                                    
													<div class="kt-wizard-v1__nav-item" <?php if(Request::is('gwc/product/*/seo-tags')==true || Request::is('gwc/product/*/finish')==true): ?> data-ktwizard-state="current" <?php endif; ?>>
														<a href="<?php echo e(url('gwc/product/'.$editproduct->id.'/seo-tags')); ?>">
                                                        <div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.seo'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.seoandtags')); ?>

															</div>
														</div>
                                                        </a>
													</div>
													
                                                    <div class="kt-wizard-v1__nav-item" <?php if(Request::is('gwc/product/*/finish')==true): ?> data-ktwizard-state="current" <?php endif; ?>>
                                                    <a href="<?php echo e(url('gwc/product/'.$editproduct->id.'/finish')); ?>">
														<div class="kt-wizard-v1__nav-body">
															<div class="kt-wizard-v1__nav-icon"><?php echo __('svgicon.finish'); ?></div>
															<div class="kt-wizard-v1__nav-label">
																<?php echo e(__('adminMessage.finish')); ?>

															</div>
														</div>
                                                        </a>
													</div>
												</div>
											</div>

											<!--end: Form Wizard Nav -->
										</div>
                                     </div>				
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('product-edit')): ?>
                    
                    <!-- product details start -->
                    <?php if(Request::is('gwc/product/*/edit')==true): ?>
                    <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('product.update',$editproduct->id)); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
										<div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.item_code')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('item_code')): ?> is-invalid <?php endif; ?>" name="item_code"
                                                               value="<?php echo e($editproduct->item_code?$editproduct->item_code:old('item_code')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_item_code')); ?>*" />
                                                               <?php if($errors->has('item_code')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('item_code')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.sku_no')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('sku_no')): ?> is-invalid <?php endif; ?>" name="sku_no"
                                                               value="<?php echo e($editproduct->sku_no?$editproduct->sku_no:old('sku_no')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_sku_no')); ?>" />
                                                               <?php if($errors->has('sku_no')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('sku_no')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.weight')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('weight')): ?> is-invalid <?php endif; ?>" name="weight"  value="<?php echo e($editproduct->weight?$editproduct->weight:old('weight')); ?>" autocomplete="off" />
                                                               <?php if($errors->has('weight')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('weight')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.displayorder')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('display_order')): ?> is-invalid <?php endif; ?>" name="display_order"  value="<?php echo e($editproduct->display_order?$editproduct->display_order:old('display_order')); ?>" autocomplete="off" />
                                                               <?php if($errors->has('display_order')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('display_order')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>        
                                                <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_en')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title_en')): ?> is-invalid <?php endif; ?>" name="title_en"
                                                               value="<?php echo e($editproduct->title_en?$editproduct->title_en:old('title_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_en')); ?>*" />
                                                               <?php if($errors->has('title_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_ar')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title_ar')): ?> is-invalid <?php endif; ?>" name="title_ar"
                                                               value="<?php echo e($editproduct->title_ar?$editproduct->title_ar:old('title_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_ar')); ?>*" />
                                                               <?php if($errors->has('title_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.extra_title_en')); ?></label>
                                                <input  type="text" class="form-control <?php if($errors->has('extra_title_en')): ?> is-invalid <?php endif; ?>" name="extra_title_en"
                                                               value="<?php echo e($editproduct->extra_title_en?$editproduct->extra_title_en:old('extra_title_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_en')); ?>" />
                                                               <?php if($errors->has('extra_title_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('extra_title_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.extra_title_ar')); ?></label>
                                                <input  type="text" class="form-control <?php if($errors->has('extra_title_ar')): ?> is-invalid <?php endif; ?>" name="extra_title_ar"
                                                               value="<?php echo e($editproduct->extra_title_ar?$editproduct->extra_title_ar:old('extra_title_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_ar')); ?>" />
                                                               <?php if($errors->has('extra_title_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('extra_title_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                      
                                          <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.sdetails_en')); ?></label>
                                                        <textarea rows="3" id="sdetails_en" name="sdetails_en" class="form-control <?php if($errors->has('sdetails_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_sdetails_en')); ?>"><?php echo $editproduct->sdetails_en?$editproduct->sdetails_en:old('sdetails_en'); ?></textarea>
                                                               <?php if($errors->has('sdetails_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('sdetails_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.sdetails_ar')); ?></label>
                                                        <textarea   rows="3" id="sdetails_ar" name="sdetails_ar" class="form-control <?php if($errors->has('sdetails_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_sdetails_ar')); ?>"><?php echo $editproduct->sdetails_ar?$editproduct->sdetails_ar:old('sdetails_ar'); ?></textarea>
                                                               <?php if($errors->has('sdetails_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('sdetails_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                                   
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.details_en')); ?></label>
                                                        <textarea rows="3" id="details_en" name="details_en" class="kt-tinymce-4 form-control <?php if($errors->has('details_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_en')); ?>"><?php echo $editproduct->details_en?$editproduct->details_en:old('details_en'); ?></textarea>
                                                               <?php if($errors->has('details_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.details_ar')); ?></label>
                                                        <textarea   rows="3" id="details_ar" name="details_ar" class="kt-tinymce-4 form-control <?php if($errors->has('details_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_ar')); ?>"><?php echo $editproduct->details_ar?$editproduct->details_ar:old('details_ar'); ?></textarea>
                                                               <?php if($errors->has('details_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.retail_price')); ?>*</label>
                                                <input type="text" class="form-control <?php if($errors->has('retail_price')): ?> is-invalid <?php endif; ?>" name="retail_price"
                                                               value="<?php echo e($editproduct->retail_price?$editproduct->retail_price:old('retail_price')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_retail_price')); ?>" />
                                                               <?php if($errors->has('retail_price')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('retail_price')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.old_price')); ?>(e.g : <s>KD 000</s>)</label>
                                                <input type="text" class="form-control <?php if($errors->has('old_price')): ?> is-invalid <?php endif; ?>" name="old_price"
                                                               value="<?php echo e($editproduct->old_price?$editproduct->old_price:old('old_price')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_old_price')); ?>" />
                                                               <?php if($errors->has('old_price')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('old_price')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.cost_price')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('cost_price')): ?> is-invalid <?php endif; ?>" name="cost_price"
                                                               value="<?php echo e($editproduct->cost_price?$editproduct->cost_price:old('cost_price')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_cost_price')); ?>" />
                                                               <?php if($errors->has('cost_price')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('cost_price')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.wholesale_price')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('wholesale_price')): ?> is-invalid <?php endif; ?>" name="wholesale_price"
                                                               value="<?php echo e($editproduct->wholesale_price?$editproduct->wholesale_price:old('wholesale_price')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_wholesale_price')); ?>" />
                                                               <?php if($errors->has('wholesale_price')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('wholesale_price')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                               
                                            </div>
                                         
                                            
                                            <div class="form-group row">
                                            <div class="col-lg-4">
                                                        <label><?php echo e(trans('theme')['theme'.$theme]['product_image']); ?></label>
                                                        <?php if($editproduct->image): ?>
                                                <img style="position:absolute;float:right;margin-top:-10px;margin-left:102px;" src="<?php echo url('uploads/product/thumb/'.$editproduct->image); ?>" width="35" height="35">
                                                
                                                <?php endif; ?>
                                                        <div class="custom-file <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>"  id="image" name="image">
														<label class="custom-file-label" for="image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                               <?php if($errors->has('image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                        <label><?php echo e(trans('theme')['theme'.$theme]['product_rollover_image']); ?>

                                                        
                                                        </label>
                                                        <?php if($editproduct->rollover_image): ?>
                                                        <img style="position:absolute;float:right;margin-top:-10px;margin-left:46px;" src="<?php echo url('uploads/product/thumb/'.$editproduct->rollover_image); ?>" width="35" height="35">
                                                        <?php endif; ?>
                                                        <div class="custom-file <?php if($errors->has('rollover_image')): ?> is-invalid <?php endif; ?>">
                                                        
														<input type="file" class="custom-file-input <?php if($errors->has('rollover_image')): ?> is-invalid <?php endif; ?>"  id="rollover_image" name="rollover_image">
														<label class="custom-file-label" for="rollover_image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                               <?php if($errors->has('rollover_image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('rollover_image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                        <label><?php echo e(trans('theme')['theme'.$theme]['attachfile']); ?><?php if(!empty($editproduct->attachfile)): ?> (<a href="<?php echo e(url('uploads/product/'.$editproduct->attachfile)); ?>" target="_blank">View</a>) <?php endif; ?></label>
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
                                                               value="<?php echo e($editproduct->slug?$editproduct->slug:old('slug')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_slug')); ?>" />
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
                                                <option value="<?php echo e($warrantyList->id); ?>" <?php if($editproduct->warranty==$warrantyList->id): ?> selected <?php endif; ?>><?php echo e($warrantyList->title_en); ?></option>
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
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/product')); ?>'"  class="btn btn-secondary kt-pull-right cancelbtn"><?php echo e(__('adminMessage.backtolisting')); ?></button>
                                                    
                                                    <label for="redirect_to_listing"><input type="checkbox" name="redirect_to_listing" id="redirect_to_listing" value="1">&nbsp;<?php echo e(__('adminMessage.saveandredirecttolisting')); ?></label>
												</div>
											</div>
										</form>
                                      <?php endif; ?>
                                      <!-- product details end -->
                                      
                                     
                                      
                                      <!-- product attributes -->
                                       <?php if(Request::is('gwc/product/*/options')==true): ?>
                                       
                                       
                                       <form name="tFrm"  id="form_validation"  method="post"
                                       class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('uploadAttribute',$editproduct->id)); ?>">
                                       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                       <input type="hidden" name="product_id" id="product_id" value="<?php echo e($editproduct->id); ?>">
                                       
											<div class="kt-portlet__body">
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                <label><?php echo e(__('adminMessage.item_has_an_attribute')); ?></label>
                                                <select class="form-control <?php if($errors->has('is_attribute')): ?> is-invalid <?php endif; ?>" name="is_attribute" id="is_attribute">
                                                <option value="1" <?php if($editproduct->is_attribute==1): ?> selected <?php endif; ?> ><?php echo e(__('adminMessage.yes')); ?></option>
                                                <option value="0" <?php if($editproduct->is_attribute==0): ?> selected <?php endif; ?> ><?php echo e(__('adminMessage.no')); ?></option>
                                                </select>
                                                               <?php if($errors->has('is_attribute')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('is_attribute')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                                <div class="col-lg-3"  id="box-quantity" <?php if($editproduct->is_attribute): ?> style="display:none;" <?php else: ?>  style="display:block;" <?php endif; ?>>
                                                <label><?php echo e(__('adminMessage.quantity')); ?></label>
                                                <input type="number" class="form-control <?php if($errors->has('quantity')): ?> is-invalid <?php endif; ?>" name="squantity"
                                                               value="<?php echo e($editproduct->quantity?$editproduct->quantity:old('quantity')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_quantity')); ?>" />
                                                               <?php if($errors->has('quantity')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('quantity')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3"  id="box-options" <?php if($editproduct->is_attribute): ?> style="display:;" <?php else: ?>  style="display:none;" <?php endif; ?>>
                                                <?php 
                                                $custoid1 = App\Http\Controllers\AdminProductController::checkSizeColorDisable($editproduct->id,1);
                                                $custoid2 = App\Http\Controllers\AdminProductController::checkSizeColorDisable($editproduct->id,2);
                                                $custoid3 = App\Http\Controllers\AdminProductController::checkSizeColorDisable($editproduct->id,3);
                                                ?>
                                                
                                                <label><?php echo e(__('adminMessage.options')); ?></label>
                                                <select class="form-control" name="cust_options" id="cust_options">
                                                <option value=""><?php echo e(trans('adminMessage.chooseanoption')); ?></option>
                                                <?php $disableMe=''; ?>
                                                <?php if(!empty($customOptionsLists) && count($customOptionsLists)>0): ?>
                                                <?php $__currentLoopData = $customOptionsLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customOptionsList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php 
                                                if($customOptionsList->id < 4 && (!empty($custoid1) || !empty($custoid2) || !empty($custoid3))){
                                                $custoid = App\Http\Controllers\AdminProductController::checkSizeColorDisable($editproduct->id,$customOptionsList->id);
                                                if(!empty($custoid) && !empty($custoid1)){
                                                $disableMe = '';
                                                }else if(!empty($custoid) && !empty($custoid2)){
                                                $disableMe = '';
                                                }else if(!empty($custoid) && !empty($custoid3)){
                                                $disableMe = '';
                                                }else{
                                                $disableMe = 'disabled';
                                                }
                                                }else{
                                                $disableMe = '';
                                                }
                                                ?>
                                                <option value="<?php echo e($customOptionsList->id); ?>"  <?php echo e($disableMe); ?>><?php echo e($customOptionsList->option_name_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <select>
                                                </div>
                                                
                                                
                                                <div class="col-lg-3"  id="box-options-button" <?php if($editproduct->is_attribute): ?> style="display:;" <?php else: ?>  style="display:none;" <?php endif; ?>>
                                                <label><br></label><br>
                                                <button type="button" class="btn btn-sm btn-info addcustomoption"><i class="flaticon2-add-1"></i><?php echo e(__('adminMessage.add')); ?></button>
                                                </div>
                                            </div>
                                            
                                             <!-- show existing data -->
                                        
                                             <?php if(!empty($chosenCustomOptions) && count($chosenCustomOptions)>0): ?>
                                             
                                             <div id="box-display-options" <?php if($editproduct->is_attribute): ?> style="display:block;" <?php else: ?> style="display:none;" <?php endif; ?>>
                                             
                                             <?php $__currentLoopData = $chosenCustomOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chosenCustomOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <?php
                                            
                          $isSelected = App\Http\Controllers\AdminProductController::getChoosenRequiredStatus($editproduct->id,$chosenCustomOption->id);
                    
                                             ?>
                                             <!--layout for size color -->
                                             <?php if($chosenCustomOption->id == 1 || $chosenCustomOption->id == 2 || $chosenCustomOption->id == 3): ?>
                                             
                                             <div class="kt-portlet__head kt-portlet__space-x">
											<div class="kt-portlet__head-label">
												<h5>
													<?php echo e($chosenCustomOption->option_name_en); ?>

												</h5>
											</div>
											<div class="kt-portlet__head-toolbar">
                                                  <div class="btn-label-danger">
                                                   <?php echo e(trans('adminMessage.required')); ?>

                                                   <select style="border:1px #CCCCCC solid;padding:3px;margin-right:5px;" name="is_option_required<?php echo e($chosenCustomOption->id); ?>" id="is_option_required<?php echo e($chosenCustomOption->id); ?>">
                                                    <option value="1" selected ><?php echo e(trans('adminMessage.yes')); ?></option>
                                                    <option value="0" disabled ><?php echo e(trans('adminMessage.no')); ?></option>
                                                    </select>
                                                  </div> 
                                                  
												<a href="javascript:;" id="<?php echo e($chosenCustomOption->id); ?>" class="btn btn-label-danger btn-sm btn-bold deleteParentOptions"><?php echo e(trans('delete')); ?></a>
											</div>
										</div>
                                        
                                             <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half" style="border:1px #ccc solid;padding:10px;">
										
										<div class="kt-portlet__body kt-portlet__body--fluid">
											
												<div id="kt_repeater_<?php echo e($chosenCustomOption->id); ?>" class="kt_repeater_1">
												<div class="form-group form-group-last row" >
													<div data-repeater-list="attach[<?php echo e($chosenCustomOption->id); ?>]" class="col-lg-12">
                          <?php
                          $customSizeColorOptions = App\Http\Controllers\AdminProductController::getChosenCustomSizeColors($editproduct->id,$chosenCustomOption->id);
                          ?>  
                          <?php if(!empty($customSizeColorOptions) && count($customSizeColorOptions)>0): ?>
                          <?php $__currentLoopData = $customSizeColorOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customSizeColorOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                          $skuno='';
                          if(!empty($customSizeColorOption->sku_no)){
                          $skuno=$customSizeColorOption->sku_no;
                          }else if(!empty($editproduct->sku_no)){
                          $skuno=$editproduct->sku_no;
                          }
                          ?>
                          <div data-repeater-item class="form-group row align-items-center repeatbox" id="optionChildId-<?php echo e($customSizeColorOption->id); ?>">
                           <input type="hidden" name="hiddencustomattrid" value="<?php echo e($customSizeColorOption->id); ?>">    
                                                    
                                                            <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
                          <input type="text" name="sku_no" id="sku_no" class="form-control" placeholder="<?php echo e(__('adminMessage.sku_no')); ?>" value="<?php echo e($skuno); ?>">
                          <input type="text" name="weight" id="weight" class="form-control" placeholder="<?php echo e(__('adminMessage.weight')); ?>" value="<?php echo e(!empty($customSizeColorOption->weight)?$customSizeColorOption->weight:''); ?>">										
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                          
                                                            
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	
																	<div class="kt-form__control">
                                                                    
                                                                    <?php if($chosenCustomOption->id == 3 || $chosenCustomOption->id == 1): ?>
                                                                    <select name="size" id="size" class="form-control">
                                                                    <option value="0" selected><?php echo e(__('adminMessage.chooseSize')); ?></option>
                                                                    <?php $__currentLoopData = $listSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($listSize->id); ?>" <?php if(!empty($customSizeColorOption->size_id) && $listSize->id==$customSizeColorOption->size_id): ?> selected <?php endif; ?>><?php echo e($listSize->title_en); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                    <?php endif; ?>
                                                                    
                                                                    <?php if($chosenCustomOption->id == 3 || $chosenCustomOption->id == 2): ?>
                                                                    <select name="color" id="color" class="form-control">
                                                                    <option value="0" selected><?php echo e(__('adminMessage.chooseColor')); ?></option>
                                                                    <?php $__currentLoopData = $listColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listColor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($listColor->id); ?>" <?php if(!empty($customSizeColorOption->color_id) && $listColor->id==$customSizeColorOption->color_id): ?> selected <?php endif; ?>><?php echo e($listColor->title_en); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                    <?php endif; ?>
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                           
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input name="quantity" id="quantity" class="form-control" placeholder="<?php echo e(__('adminMessage.qty')); ?>" value="<?php echo e(!empty($customSizeColorOption->quantity)?$customSizeColorOption->quantity:''); ?>">
                                                             <select name="is_qty_deduct" id="is_qty_deduct" class="form-control" >
                                                             <option value="1" <?php if(!empty($customSizeColorOption->is_qty_deduct)): ?> selected <?php endif; ?> ><?php echo e(trans('adminMessage.deduct')); ?></option>
                                                             <option value="0" <?php if(empty($customSizeColorOption->is_qty_deduct)): ?> selected <?php endif; ?>><?php echo e(trans('adminMessage.none')); ?></option>
                                                             </select>				
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
                                    <input type="text" name="retail_price" id="retail_price" class="form-control" placeholder="<?php echo e(__('adminMessage.retail_price')); ?>" value="<?php echo e(!empty($customSizeColorOption->retail_price)?$customSizeColorOption->retail_price:''); ?>">
                                    <input type="text" name="old_price" id="old_price" class="form-control" placeholder="<?php echo e(__('adminMessage.old_price')); ?>" value="<?php echo e(!empty($customSizeColorOption->old_price)?$customSizeColorOption->old_price:''); ?>">				
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            
                                                            <div class="col-md-3">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input type="file" name="color_image" id="color_image" class="form-control">
                                                             <?php
                                                             if(!empty($customSizeColorOption->color_image)){
                                                             $colorimage = url('uploads/product/colors/thumb/'.$customSizeColorOption->color_image);
                                                             }else{
                                                             $colorimage = url('uploads/no-image.png');
                                                             }
                                                             ?>	
                                                             <img src="<?php echo e($colorimage); ?>" width="40" height="40" style="position:absolute;margin-top: -40px;margin-left:210px;">				
																	</div>
                                                                    
                                                             
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            
															<div class="col-md-1">
																<a href="javascript:;" title="<?php echo e(__('adminMessage.delete')); ?>" class="btn-sm btn btn-label-danger btn-bold removeAttCustomOption" id="<?php echo e($customSizeColorOption->id); ?>">
																	<i class="la la-trash-o"></i>
																</a>
															</div>
														</div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>   
                          
                          <?php
                          $skuno='';
                          if(!empty($editproduct->sku_no)){
                          $skuno=$editproduct->sku_no;
                          }
                          ?>  
														<div data-repeater-item class="form-group row align-items-center repeatbox">
                                                        
                                                            <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input type="text" name="sku_no" id="sku_no" class="form-control" placeholder="<?php echo e(__('adminMessage.sku_no')); ?>" value="<?php echo e($skuno); ?>"><input type="text" name="weight" id="weight" class="form-control" placeholder="<?php echo e(__('adminMessage.weight')); ?>">										
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                          
                                                            
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	
																	<div class="kt-form__control">
                                                                    
                                                                    <?php if($chosenCustomOption->id == 3 || $chosenCustomOption->id == 1): ?>
                                                                    <select name="size" id="size" class="form-control">
                                                                    <option value="0" selected><?php echo e(__('adminMessage.chooseSize')); ?></option>
                                                                    <?php $__currentLoopData = $listSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($listSize->id); ?>"><?php echo e($listSize->title_en); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                    <?php endif; ?>
                                                                    
                                                                    <?php if($chosenCustomOption->id == 3 || $chosenCustomOption->id == 2): ?>
                                                                    <select name="color" id="color" class="form-control">
                                                                    <option value="0" selected><?php echo e(__('adminMessage.chooseColor')); ?></option>
                                                                    <?php $__currentLoopData = $listColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listColor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($listColor->id); ?>"><?php echo e($listColor->title_en); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                    <?php endif; ?>
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                           
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input name="quantity" id="quantity" class="form-control" placeholder="<?php echo e(__('adminMessage.qty')); ?>">
                                                             <select name="is_qty_deduct" id="is_qty_deduct" class="form-control" >
                                                             <option value="1" selected><?php echo e(trans('adminMessage.deduct')); ?></option>
                                                             <option value="0"><?php echo e(trans('adminMessage.none')); ?></option>
                                                             </select>				
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
                                    <input type="text" name="retail_price" id="retail_price" class="form-control" placeholder="<?php echo e(__('adminMessage.retail_price')); ?>">
                                    <input type="text" name="old_price" id="old_price" class="form-control" placeholder="<?php echo e(__('adminMessage.old_price')); ?>">				
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            
                                                            <div class="col-md-3">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input type="file" name="color_image" id="color_image" class="form-control">	
                                                             <img src="<?php echo e(url('uploads/no-image.png')); ?>" width="40" height="40" style="position:absolute;margin-top: -40px;margin-left:210px;">				
																	</div>
                                                                    
                                                             
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            
															<div class="col-md-1">
																<a href="javascript:;" title="<?php echo e(__('adminMessage.delete')); ?>" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
																	<i class="la la-trash-o"></i>
																</a>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group form-group-last row">
                                                
													<div class="col-lg-4">
														<a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
															<i class="la la-plus"></i> <?php echo e(__('adminMessage.add')); ?>

														</a>
                                                        
													</div>
                                                    
												</div>
											</div>												
											
										</div>
									</div>
                                    
                                    <!--layout for size color -->   
                                        <?php else: ?>
                           <?php
                           $optionvaluenamelists = App\Http\Controllers\AdminProductController::getOptionValueNames($chosenCustomOption->id);
                           $isSelected = App\Http\Controllers\AdminProductController::getChoosenRequiredStatus($editproduct->id,$chosenCustomOption->id);
                           
                           ?>     
                                             <!-- other option start here -->
                                        <div class="kt-portlet__head kt-portlet__space-x">
											<div class="kt-portlet__head-label">
												<h5>
													<?php echo e($chosenCustomOption->option_name_en); ?> 
                                                    
												</h5>
											</div>
											<div class="kt-portlet__head-toolbar">
                                                   <div class="btn-label-danger">
                                                   <?php echo e(trans('adminMessage.required')); ?>

                                                   <select style="border:1px #CCCCCC solid;padding:3px;margin-right:5px;" name="is_option_required<?php echo e($chosenCustomOption->id); ?>" id="is_option_required<?php echo e($chosenCustomOption->id); ?>">
                                                    <option value="1" <?php if($isSelected->is_required==1): ?> selected <?php endif; ?>><?php echo e(trans('adminMessage.yes')); ?></option>
                                                    <option value="0" <?php if($isSelected->is_required!=1): ?> selected <?php endif; ?>><?php echo e(trans('adminMessage.no')); ?></option>
                                                    </select>
                                                  </div>  
												<a href="javascript:;" class="btn btn-label-danger btn-sm btn-bold deleteParentOptions" id="<?php echo e($chosenCustomOption->id); ?>"><?php echo e(trans('adminMessage.delete')); ?></a>
											</div>
										</div>
                                        <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half" style="border:1px #ccc solid;padding:10px;">
										
										<div class="kt-portlet__body kt-portlet__body--fluid">
											
												<div id="kt_repeater_<?php echo e($chosenCustomOption->id); ?>" class="kt_repeater_1">
												<div class="form-group form-group-last row" >
													<div data-repeater-list="attach[<?php echo e($chosenCustomOption->id); ?>]" class="col-lg-12">
                                                    
                                                    
                          <?php
                          $customOtherOptions = App\Http\Controllers\AdminProductController::getChosenOtherOptions($editproduct->id,$chosenCustomOption->id);
                          ?>  
                          <?php if(!empty($customOtherOptions) && count($customOtherOptions)>0): ?>
                          <?php $__currentLoopData = $customOtherOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customOtherOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                          <?php
                          $skuno='';
                          if(!empty($customOtherOption->sku_no)){
                          $skuno=$customOtherOption->sku_no;
                          }else if(!empty($editproduct->sku_no)){
                          $skuno=$editproduct->sku_no;
                          }
                          ?>
                          <div data-repeater-item class="form-group row align-items-center repeatbox">
                         <input type="hidden" name="hiddencustomattrid" value="<?php echo e($customOtherOption->id); ?>"> 
                         
                                                        <div class="col-md-3">
																<div class="kt-form__group--inline">
																	
																	<div class="kt-form__control">
                                                                    <select name="option_value_name" id="option_value_name_<?php echo e($chosenCustomOption->id); ?>" class="form-control">
                                                                    <option value="0" selected><?php echo e(__('adminMessage.chooseoptionvalue')); ?></option>
                                                                    <?php $__currentLoopData = $optionvaluenamelists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionvaluenamelist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($optionvaluenamelist->id); ?>" <?php if($customOtherOption->option_value_id==$optionvaluenamelist->id): ?> selected <?php endif; ?> ><?php echo e($optionvaluenamelist->option_value_name_en); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            
                                                          <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input type="text" name="sku_no" id="sku_no" class="form-control" placeholder="<?php echo e(__('adminMessage.sku_no')); ?>" value="<?php echo e($skuno); ?>">					
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>    
                                                            <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input type="text" name="weight" id="weight" class="form-control" placeholder="<?php echo e(__('adminMessage.weight')); ?>" value="<?php echo e($customOtherOption->weight); ?>">						
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>                                                       
															
                                                           
                                                            
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input name="quantity" id="quantity" class="form-control" placeholder="<?php echo e(__('adminMessage.qty')); ?>" value="<?php echo e($customOtherOption->quantity); ?>">	
                                                             <select name="is_deduct" id="is_deduct" class="form-control" >
                                                             <option value="1" <?php if(!empty($customOtherOption->is_deduct)): ?> selected <?php endif; ?>><?php echo e(trans('adminMessage.deduct')); ?></option>
                                                             <option value="0" <?php if(empty($customOtherOption->is_deduct)): ?> selected <?php endif; ?>><?php echo e(trans('adminMessage.none')); ?></option>
                                                             </select>				
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
 <input type="text" name="retail_price" id="retail_price" class="form-control" placeholder="<?php echo e(__('adminMessage.retail_price')); ?>" value="<?php echo e($customOtherOption->retail_price); ?>">	
                                                             <select name="is_price_add" id="is_deduct" class="form-control" >
                                                             <option value="1" <?php if(!empty($customOtherOption->is_price_add) && $customOtherOption->is_price_add==1): ?> selected <?php endif; ?>>+</option>
                                                             <option value="2" <?php if(!empty($customOtherOption->is_price_add)  && $customOtherOption->is_price_add==2): ?> selected <?php endif; ?>>-</option>
                                                             <option value="0" <?php if(empty($customOtherOption->is_price_add)): ?> selected <?php endif; ?>><?php echo e(trans('adminMessage.none')); ?></option>
                                                             </select>			
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            
                                                            
                                                            
															<div class="col-md-1">
																<a href="javascript:;" title="<?php echo e(__('adminMessage.delete')); ?>" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold deleteOtherChosenOption" id="<?php echo e($customOtherOption->id); ?>">
																	<i class="la la-trash-o"></i>
																</a>
															</div>
														</div>
                                                        
                                                        
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>                   
                       
                        <?php
                          $skuno='';
                          if(!empty($editproduct->sku_no)){
                          $skuno=$editproduct->sku_no;
                          }
                          ?>                             
														<div data-repeater-item class="form-group row align-items-center repeatbox">
                         
                         
                                                        <div class="col-md-3">
																<div class="kt-form__group--inline">
																	
																	<div class="kt-form__control">
                                                                    <select name="option_value_name" id="option_value_name_<?php echo e($chosenCustomOption->id); ?>" class="form-control">
                                                                    <option value="0" selected><?php echo e(__('adminMessage.chooseoptionvalue')); ?></option>
                                                                    <?php $__currentLoopData = $optionvaluenamelists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionvaluenamelist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($optionvaluenamelist->id); ?>"><?php echo e($optionvaluenamelist->option_value_name_en); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            
                                                          <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input type="text" name="sku_no" id="sku_no" class="form-control" placeholder="<?php echo e(__('adminMessage.sku_no')); ?>" value="<?php echo e($skuno); ?>">					
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>    
                                                            <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input type="text" name="weight" id="weight" class="form-control" placeholder="<?php echo e(__('adminMessage.weight')); ?>">						
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>                                                       
															
                                                           
                                                            
															<div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										                     <input name="quantity" id="quantity" class="form-control" placeholder="<?php echo e(__('adminMessage.qty')); ?>">	
                                                             <select name="is_deduct" id="is_deduct" class="form-control" >
                                                             <option value="1" selected><?php echo e(trans('adminMessage.deduct')); ?></option>
                                                             <option value="0"><?php echo e(trans('adminMessage.none')); ?></option>
                                                             </select>				
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            <div class="col-md-2">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
 <input type="text" name="retail_price" id="retail_price" class="form-control" placeholder="<?php echo e(__('adminMessage.retail_price')); ?>">	
                                                             <select name="is_price_add" id="is_deduct" class="form-control" >
                                                             <option value="1" selected>+</option>
                                                             <option value="2" >-</option>
                                                             <option value="0"><?php echo e(trans('adminMessage.none')); ?></option>
                                                             </select>			
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            
                                                            
                                                            
															<div class="col-md-1">
																<a href="javascript:;" title="<?php echo e(__('adminMessage.delete')); ?>" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
																	<i class="la la-trash-o"></i>
																</a>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group form-group-last row">
                                                
													<div class="col-lg-4">
														<a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
															<i class="la la-plus"></i> <?php echo e(__('adminMessage.add')); ?>

														</a>
                                                        
													</div>
                                                    
												</div>
											</div>												
											
										</div>
									</div>
                                        
                                            
                                             <!-- other option start here -->
                                             <?php endif; ?> 
                                                                                  
                                             
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                             </div>                                           
                                             <?php endif; ?>
                                           
                                            <!--end showing existing data -->
                                           
                                            </div>
                                            <div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.next')); ?><i class="la la-angle-double-right"></i></button>
													<label for="redirect_to_listing"><input type="checkbox" name="redirect_to_listing" id="redirect_to_listing" value="1">&nbsp;<?php echo e(__('adminMessage.saveandredirecttolisting')); ?></label>
                                                    
                                                    <button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/product/'.request()->id.'/edit')); ?>'"  class="btn btn-secondary kt-pull-right cancelbtn"><?php echo e(__('adminMessage.backtodetails')); ?></button>
												</div>
											</div>
                                            </form>
                                       
                                       <?php endif; ?>
                                      <!-- product attributes end -->
                                      <!-- product categories -->
                                       <?php if(Request::is('gwc/product/*/categories')==true): ?>
                                       <form name="tFrm"  id="form_validation"  method="post"
                                       class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('uploadCategory',$editproduct->id)); ?>">
                                       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
                                            <div class="form-group row "><div class="col-lg-12 alert" style="background-color:#DDEEFF;"><?php echo __('adminMessage.categories_notes'); ?></div></div>
                                             <!-- show existing data -->
                                           
                                             <?php if($listCategories): ?>
                                             <div id="kt_repeater_1_exist">
												<div class="form-group form-group-last row">
													<div data-repeater-list="attach_exist" class="col-lg-12">
                                                     <?php $__currentLoopData = $listCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div  class="form-group row align-items-center">
															<div class="col-md-10">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control  col-form-label">
                                                                    
                                                                 
                                        <select name="category-<?php echo e($listCategory->id); ?>" id="category-<?php echo e($listCategory->id); ?>" class="form-control">
                                        <option value="0" selected><?php echo e(__('adminMessage.chooseCategory')); ?></option>
                                        <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option style="font-size:20px;" value="<?php echo e($category->id); ?>" <?php if($category->id==$listCategory->category_id): ?> selected <?php endif; ?> ><?php echo e($category->name_en); ?></option>
                                        <?php if(count($category->childs)): ?>
                                        <?php echo $__env->make('gwc.product.dropdown_edit_childs',['ParentName'=>$category->name_en,'childs' => $category->childs,'level'=>0,'listCategory'=>$listCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
															
															
															<div class="col-md-2">
                                                            <a href="javascript:;" title="<?php echo e(__('adminMessage.savechanges')); ?>"  class="btn-sm btn btn-label-info btn-bold updateCategoryDetails" id="<?php echo e($listCategory->id); ?>">
																	<i class="la la-check-circle"></i>
																</a>
																<a href="<?php echo e(url('gwc/product/'.$editproduct->id.'/deleteprodcategory/'.$listCategory->id)); ?>"  title="<?php echo e(__('adminMessage.delete')); ?>"  class="btn-sm btn btn-label-danger btn-bold">
																	<i class="la la-trash-o"></i>
																</a>
                                                                
															</div>
														</div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>
												</div>
												
											</div>
                                            <?php endif; ?>
                                            <!--end showing existing data -->
                                           
                                            <div id="kt_repeater_1">
												<div class="form-group form-group-last row" id="kt_repeater_1">
													<div data-repeater-list="attach" class="col-lg-12">
														<div data-repeater-item class="form-group row align-items-center repeatbox">
															<div class="col-md-10">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
										<select name="category" id="category" class="form-control">
                                        <option value="0" selected><?php echo e(__('adminMessage.chooseCategory')); ?></option>
                                        <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option style="font-size:20px;" value="<?php echo e($category->id); ?>"><?php echo e($category->name_en); ?></option>
                                        <?php if(count($category->childs)): ?>
                                        <?php echo $__env->make('gwc.product.dropdown_childs',['ParentName'=>$category->name_en,'childs' => $category->childs,'level'=>0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>							
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
															
															<div class="col-md-1">
																<a href="javascript:;" title="<?php echo e(__('adminMessage.delete')); ?>" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
																	<i class="la la-trash-o"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group form-group-last row">
													<div class="col-lg-4">
														<a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
															<i class="la la-plus"></i> <?php echo e(__('adminMessage.add')); ?>

														</a>
													</div>
                                                    
												</div>
											</div>
                                            
                                            </div>
                                            <div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.next')); ?><i class="la la-angle-double-right"></i></button>
                                                    <label for="redirect_to_listing"><input type="checkbox" name="redirect_to_listing" id="redirect_to_listing" value="1">&nbsp;<?php echo e(__('adminMessage.saveandredirecttolisting')); ?></label>
                                                    
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/product/'.request()->id.'/options')); ?>'"  class="btn btn-secondary kt-pull-right cancelbtn"><?php echo e(__('adminMessage.backtooptions')); ?></button>
												</div>
											</div>
                                            </form>
                                       
                                       <?php endif; ?>
                                      <!-- product categories end -->
                                       <!-- product gallery start-->
                                       <?php if(Request::is('gwc/product/*/gallery')==true): ?>
                                        <form id="galleryImageForm" method="post" action="<?php echo e(route('uploadgalleryimages',$editproduct->id)); ?>" enctype="multipart/form-data">
                                       <div class="kt-portlet__body">
                                            <div class="form-group row"><?php echo __('adminMessage.browse_images'); ?></div>
                                       
                                      
													<?php echo csrf_field(); ?>
													
													<div class="row form-group">
														<div class="col-md-6">
															<input placeholder="<?php echo e(trans('adminMessage.enter_title_en')); ?>" class="form-control" type="text" name="title_en" id="title_en"  />
														</div>
                                                        <div class="col-md-6">
															<input placeholder="<?php echo e(trans('adminMessage.enter_title_ar')); ?>" class="form-control" type="text" name="title_ar" id="title_ar"  />
														</div>
													</div>	
                                                    <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:450px;">Browse images from your computer</span></div>
												<input  class="form-control" type="file" name="file[]" id="file" accept="image/*" multiple />
                                                </div>
                                                </div>
                                                
													
												
                                                <div class="row form-group">
                                                <div class="col-md-12">
												<div class="progress">
													<div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
														0%
													</div>
												</div>
                                                </div>
                                                </div>
                                                <div class="row form-group">
												<div id="success" class="row"></div>
                                                </div>
												<div class="row form-group">
                                                <?php if($listGalleries): ?>
                                                <?php $__currentLoopData = $listGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listGallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($listGallery->image): ?>
                                                <div class="col-md-3" align="center" style="border:1px #CCCCCC solid;">
                                                <img src="<?php echo url('uploads/product/thumb/'.$listGallery->image); ?>" width="200" style="margin:3px;">
                                                <a href="<?php echo e(url('gwc/product/'.$editproduct->id.'/deletegallery/'.$listGallery->id)); ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                </div>
                                         </div>
                                         <div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.next')); ?><i class="la la-angle-double-right"></i></button>
                                                    <label for="redirect_to_listing"><input type="checkbox" name="redirect_to_listing" id="redirect_to_listing" value="1">&nbsp;<?php echo e(__('adminMessage.saveandredirecttolisting')); ?></label>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/product/'.request()->id.'/categories')); ?>'"  class="btn btn-secondary kt-pull-right cancelbtn"><?php echo e(__('adminMessage.backtocategory')); ?></button>
												</div>
											</div>
                                            </form>
                                       <?php endif; ?>
                                      <!-- product gallery end -->
                                      <!-- seo tags start -->
                                      <?php if(Request::is('gwc/product/*/seo-tags')==true): ?>
                                       <form name="tFrm"  id="form_validation"  method="post"
                                       class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('seotags',$editproduct->id)); ?>">
                                       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
                                            <div class="form-group"><h5><?php echo e(__('adminMessage.seo')); ?></h5></div>
                                            <div class="form-group row"><div class="col-lg-12 alert" style="background-color:#DDEEFF;"><?php echo trans('adminMessage.seo_key_note'); ?></div></div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.seokeywords_en')); ?></label>
                                                <textarea name="seokeywords_en" class="form-control <?php if($errors->has('seokeywords_en')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.enterseokeywords_en')); ?>" autocomplete="off"><?php echo e($editproduct->seokeywords_en?$editproduct->seokeywords_en:old('seokeywords_en')); ?></textarea>
                                                <?php if($errors->has('seokeywords_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('seokeywords_en')); ?></div>
                                                 <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.seokeywords_ar')); ?></label>
                                                <textarea name="seokeywords_ar" class="form-control <?php if($errors->has('seokeywords_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.enterseokeywords_ar')); ?>" autocomplete="off"><?php echo e($editproduct->seokeywords_ar?$editproduct->seokeywords_ar:old('seokeywords_ar')); ?></textarea>
                                                 <?php if($errors->has('seokeywords_ar')): ?>
                                                 <div class="invalid-feedback"><?php echo e($errors->first('seokeywords_ar')); ?></div>
                                                 <?php endif; ?>
                                                </div>
                                                </div>
                                             <div class="form-group row"><div class="col-lg-12 alert" style="background-color:#DDEEFF;"><?php echo trans('adminMessage.seo_details_note'); ?></div></div>   
                                                <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.seodescription_en')); ?></label>
                                                <textarea name="seodescription_en" class="form-control <?php if($errors->has('seodescription_en')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.enterseodescription_en')); ?>" autocomplete="off"><?php if(!empty($editproduct->sdetails_en)): ?><?php echo e($editproduct->sdetails_en); ?><?php else: ?><?php echo e($editproduct->seodescription_en?$editproduct->seodescription_en:old('seodescription_en')); ?><?php endif; ?></textarea>
                                                <?php if($errors->has('seodescription_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('seodescription_en')); ?></div>
                                                 <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.seodescription_ar')); ?></label>
                                                <textarea name="seodescription_ar" class="form-control <?php if($errors->has('seodescription_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.enterseodescription_ar')); ?>" autocomplete="off"><?php if(!empty($editproduct->sdetails_ar)): ?><?php echo e($editproduct->sdetails_ar); ?><?php else: ?><?php echo e($editproduct->seodescription_ar?$editproduct->seodescription_ar:old('seodescription_ar')); ?><?php endif; ?></textarea>
                                                 <?php if($errors->has('seodescription_ar')): ?>
                                                 <div class="invalid-feedback"><?php echo e($errors->first('seodescription_ar')); ?></div>
                                                 <?php endif; ?>
                                                </div>
                                                </div>
                                               <div class="form-group"><h5><?php echo e(__('adminMessage.tags')); ?></h5></div> 
                                               <div class="form-group row"><div class="col-lg-12 alert" style="background-color:#DDEEFF;"><?php echo trans('adminMessage.tags_note'); ?></div></div> 
                                                <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.tags_en')); ?></label>
                                                <textarea name="tags_en" autofocus class=" <?php if($errors->has('tags_en')): ?> is-invalid <?php endif; ?>" id="tags_en" placeholder="<?php echo e(__('adminMessage.entertags_en')); ?>" autocomplete="off"><?php echo e($editproduct->tags_en?$editproduct->tags_en:old('tags_en')); ?></textarea>
                                                <?php if($errors->has('tags_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('tags_en')); ?></div>
                                                 <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.tags_ar')); ?></label>
                                                <textarea name="tags_ar" id="tags_ar" class=" <?php if($errors->has('tags_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.entertags_ar')); ?>" autocomplete="off"><?php echo e($editproduct->tags_ar?$editproduct->tags_ar:old('tags_ar')); ?></textarea>
                                                 <?php if($errors->has('tags_ar')): ?>
                                                 <div class="invalid-feedback"><?php echo e($errors->first('tags_ar')); ?></div>
                                                 <?php endif; ?>
                                                </div>
                                                </div>
                                               
                                                
                                            </div>
                                            <div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.next')); ?><i class="la la-angle-double-right"></i></button>
                                                    <label for="redirect_to_listing"><input type="checkbox" name="redirect_to_listing" id="redirect_to_listing" value="1">&nbsp;<?php echo e(__('adminMessage.saveandredirecttolisting')); ?></label>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/product/'.request()->id.'/gallery')); ?>'"  class="btn btn-secondary kt-pull-right cancelbtn"><?php echo e(__('adminMessage.backtogallery')); ?></button>
												</div>
											</div>
                                            </form>
                                       
                                       <?php endif; ?>
                                      <!--seo tags end -->
                                      
                                       
                                      <!-- product finish start -->
                                      <?php if(Request::is('gwc/product/*/finish')==true): ?>
                                       <form name="tFrm"  id="form_validation"  method="post"
                                       class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('finishSave',$editproduct->id)); ?>">
                                       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
                                            
                                           <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.status')); ?></label>
                                                <select class="form-control" name="prodstatus">
                                                <option value="0" <?php if($editproduct->is_active==0): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.notpublished')); ?></option>
                                                <option value="1" <?php if($editproduct->is_active==1): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.published')); ?></option>
                                                <option value="2" <?php if($editproduct->is_active==2): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.publishedpreorder')); ?></option>
                                                </select>
                                                </div>
                                                <div class="col-lg-3">
                                                 <label><?php echo e(__('adminMessage.min_purchase_qty')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('min_purchase_qty')): ?> is-invalid <?php endif; ?>" name="min_purchase_qty" value="<?php echo e($editproduct->min_purchase_qty?$editproduct->min_purchase_qty:old('min_purchase_qty')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_min_purchase_qty')); ?>" />
                                                               <?php if($errors->has('min_purchase_qty')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('min_purchase_qty')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                 <label><?php echo e(__('adminMessage.max_purchase_qty')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('max_purchase_qty')): ?> is-invalid <?php endif; ?>" name="max_purchase_qty" value="<?php echo e($editproduct->max_purchase_qty?$editproduct->max_purchase_qty:old('max_purchase_qty')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_max_purchase_qty')); ?>" />
                                                               <?php if($errors->has('max_purchase_qty')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('max_purchase_qty')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                 <label><?php echo e(__('adminMessage.alert_min_qty')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('alert_min_qty')): ?> is-invalid <?php endif; ?>" name="alert_min_qty" value="<?php echo e($editproduct->alert_min_qty?$editproduct->alert_min_qty:old('alert_min_qty')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_alert_min_qty')); ?>" />
                                                               <?php if($errors->has('alert_min_qty')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('alert_min_qty')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.sectionhome')); ?></label>
                                                <select class="form-control" name="homesection">
                                                <option value="0" <?php if($editproduct->homesection==0): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.none')); ?></option>
                                                <?php if(!empty($listSections)): ?>
                                                <?php $__currentLoopData = $listSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($listSection->id); ?>" <?php if($editproduct->homesection==$listSection->id): ?> selected <?php endif; ?>><?php echo e($listSection->title_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                
                                                </select>
                                                </div>
                                               <?php if(!empty($manufacturerLists) && count($manufacturerLists)>0): ?> 
                                                 <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.manufacturer')); ?></label>
                                                <select class="form-control" name="manufacturer">
                                                <option value="0" <?php if($editproduct->manufacturer_id==0): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.none')); ?></option>
                                                <?php $__currentLoopData = $manufacturerLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacturerList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($manufacturerList->id); ?>" <?php if($editproduct->manufacturer_id==$manufacturerList->id): ?> selected <?php endif; ?>><?php echo e($manufacturerList->title_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                </div>
                                                <?php endif; ?>
                                                <?php if(!empty($brandLists) && count($brandLists)>0): ?> 
                                                 <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.brand')); ?></label>
                                                <select class="form-control" name="brand">
                                                <option value="0" <?php if($editproduct->brand_id==0): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.none')); ?></option>
                                              
                                                <?php $__currentLoopData = $brandLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brandList->id); ?>" <?php if($editproduct->brand_id==$brandList->id): ?> selected <?php endif; ?>><?php echo e($brandList->title_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                </div>
                                                <?php endif; ?>
                                                <div class="col-lg-3">
                                                 <label><?php echo e(__('adminMessage.youtube_url')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('youtube_url')): ?> is-invalid <?php endif; ?>" name="youtube_url" value="<?php echo e($editproduct->youtube_url?$editproduct->youtube_url:old('youtube_url')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_youtube_url')); ?>" />
                                                               <?php if($errors->has('youtube_url')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('youtube_url')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                            </div>
                                             <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.countdown_datetime')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('countdown_datetime')): ?> is-invalid <?php endif; ?>" name="countdown_datetime" value="<?php echo e($editproduct->countdown_datetime?$editproduct->countdown_datetime:old('countdown_datetime')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_countdown_datetime')); ?>" id="countdown_datetime" />
                                                <?php if($errors->has('countdown_datetime')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('countdown_datetime')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.countdown_price')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('countdown_price')): ?> is-invalid <?php endif; ?>" name="countdown_price" value="<?php echo e($editproduct->countdown_price?$editproduct->countdown_price:old('countdown_price')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_countdown_price')); ?>" />
                                                 <?php if($errors->has('countdown_price')): ?>
                                                 <div class="invalid-feedback"><?php echo e($errors->first('countdown_price')); ?></div>
                                                 <?php endif; ?>
                                                </div>
											
												<div class="col-lg-2">
                                                <label><?php echo e(__('adminMessage.caption_name')); ?>(En)</label>
                                                <input type="text" class="form-control <?php if($errors->has('caption_en')): ?> is-invalid <?php endif; ?>" name="caption_en" value="<?php echo e($editproduct->caption_en?$editproduct->caption_en:old('caption_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_caption_en')); ?>" id="caption_en" />
                                                <?php if($errors->has('caption_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('caption_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                <div class="col-lg-2">
                                                <label><?php echo e(__('adminMessage.caption_name')); ?>(Ar)</label>
                                                <input type="text" class="form-control <?php if($errors->has('caption_ar')): ?> is-invalid <?php endif; ?>" name="caption_ar" value="<?php echo e($editproduct->caption_ar?$editproduct->caption_ar:old('caption_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_caption_ar')); ?>" />
                                                 <?php if($errors->has('caption_ar')): ?>
                                                 <div class="invalid-feedback"><?php echo e($errors->first('caption_ar')); ?></div>
                                                 <?php endif; ?>
                                                </div>
												<div class="col-lg-2">
                                                <label><?php echo e(__('adminMessage.caption_color')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('caption_color')): ?> is-invalid <?php endif; ?> demo" name="caption_color" value="<?php echo e($editproduct->caption_color?$editproduct->caption_color:old('caption_color')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_caption_color')); ?>" data-control="hue"  id="hue-demo"/>
                                                 <?php if($errors->has('caption_color')): ?>
                                                 <div class="invalid-feedback"><?php echo e($errors->first('caption_color')); ?></div>
                                                 <?php endif; ?>
                                                </div>
												
                                             </div>  

                                             
											 
                                            
                                            </div>
                                            <div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit"  class="btn btn-success"><?php echo e(__('adminMessage.saveandfinish')); ?></button>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/product/'.request()->id.'/seo-tags')); ?>'"  class="btn btn-secondary kt-pull-right cancelbtn"><?php echo e(__('adminMessage.backtoseotags')); ?></button>
												</div>
											</div>
                                            </form>  
                                       <?php endif; ?>
                                      <!-- product finish end -->
                                        
                         
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
        <?php if(Request::is('gwc/product/*/edit')==true): ?>
        <!--begin::Page Vendors(used by this page) -->
		<?php endif; ?>
		<?php if(Request::is('gwc/product/*/finish')==true): ?>
		<!--begin::Page Vendors(used by this page) -->
		<script src="<?php echo e(url('admin_assets/assets/plugins/minicolors/jquery.minicolors.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('admin_assets/assets/plugins/minicolors/components-color-pickers.min.js')); ?>" type="text/javascript"></script>
        <?php endif; ?>
		<!--end::Page Vendors -->
       
        
		<script>
        jQuery(document).ready(function() {
		//
		$("#is_attribute").change(function(){
		var attribute_status = $(this).val();
		if(attribute_status==1){
		$("#box-options").show();
		$("#box-options-button").show();
		$("#box-quantity").hide();
		}else{
		$("#box-options").hide();
		$("#box-options-button").hide();
		$("#box-display-options").hide();
		$("#box-quantity").show();
		}
		});
		 <?php if(Request::is('gwc/product/*/edit')==true): ?>
	
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
		
       
		 <?php endif; ?>
		<?php
		$skuno='';
		if(!empty($editproduct->sku_no)){
        $skuno=$editproduct->sku_no;
        }
		?> 
		 <!--multiple fileds-->
		<?php if(!empty($chosenCustomOptions) && count($chosenCustomOptions)>0): ?>
		<?php $__currentLoopData = $chosenCustomOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chosenCustomOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		$('#kt_repeater_<?php echo e($chosenCustomOption->id); ?>').repeater({
		initEmpty: false,
		defaultValues:{
		'sku_no': '<?php echo $skuno; ?>'
		},
		defaultName: {
		'text-input': 'MyInputs',
		},
		show: function () {
		$(this).slideDown();
		},
		hide: function (deleteElement) {  
		  $(this).slideUp(deleteElement);   
		 }   
	    });
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
		
		$('#kt_repeater_gallery_1').repeater({
		initEmpty: false,
		defaultName: {
		'text-input': 'foo',
		},
		show: function () {
		$(this).slideDown();
		$('.doc_date').datepicker({format:"yyyy-mm-dd"});
		},
		hide: function (deleteElement) {  
		  $(this).slideUp(deleteElement);   
		 }   
	    });
		
		$('#kt_repeater_1').repeater({
		initEmpty: false,
		defaultName: {
		'text-input': 'foo',
		},
		show: function () {
		$(this).slideDown();
		$('.doc_date').datepicker({format:"yyyy-mm-dd"});
		},
		hide: function (deleteElement) {  
		  $(this).slideUp(deleteElement);   
		 }   
	    });
		
		
		$('#countdown_datetime').datepicker({format:"yyyy-mm-dd"});
		<?php if(empty($editproduct->countdown_datetime)): ?>
		$("#countdown_datetime").val('');
		<?php endif; ?>
		
		<?php if(Request::is('gwc/product/*/seo-tags')==true): ?>
		<!--tags -->
		var tags_en = document.getElementById('tags_en');
		<?php
		if(!empty($tags_en_js)){
		$tags_en_js_k = json_encode($tags_en_js,true);
		}else{
		$tags_en_js_k = "[]";
		}
		if(!empty($tags_ar_js)){
		$tags_ar_js_k = json_encode($tags_ar_js,true);
		}else{
		$tags_ar_js_k = "[]";
		}
		?>
		tagify_en = new Tagify(tags_en,{
                whitelist: <?php echo $tags_en_js_k; ?>,
                blacklist: []
            })
		var tags_ar = document.getElementById('tags_ar');
		tagify_ar = new Tagify(tags_ar,{
                whitelist: <?php echo $tags_ar_js_k; ?>,
                blacklist: []
            })
		<!--end tags -->
		  <?php endif; ?>
		});
       </script>
       
    <script src="<?php echo url('admin_assets/jquery.form.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript">
	
	$(document).ready(function(){
	 
	 $('#galleryImageForm').ajaxForm({
        beforeSend:function(){
            $('#success').empty();
            $('.progress-bar').text('0%');
            $('.progress-bar').css('width', '0%');
        },
        uploadProgress:function(event, position, total, percentComplete){
            $('.progress-bar').text(percentComplete + '0%');
            $('.progress-bar').css('width', percentComplete + '0%');
        },
        success:function(data)
        {
            if(data.success!='1')
            {
			    toastr.success(data.success);
                $('#success').html(data.image);
                $('.progress-bar').text('Uploaded');
                $('.progress-bar').css('width', '100%');
				$('#file').val('');
				window.setTimeout(function(){window.location.href=data.redirect;},5000);
            }else{
			    $('#success').hide();
                $('.progress-bar').hide();
				$('#file').val('');
			    window.setTimeout(function(){window.location.href=data.redirect;},1);
			}
        }
	  });
	});
	</script>
	 
	</body>

	<!-- end::Body -->
</html><?php /**PATH D:\laravel projects\tikbazar\resources\views/gwc/product/edit.blade.php ENDPATH**/ ?>