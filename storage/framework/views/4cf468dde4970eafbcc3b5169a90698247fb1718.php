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
						
												
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('product-create')): ?>
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('product.addQuick')); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
                                            <div class="form-group row">
											<h5><?php echo e(trans('adminMessage.details')); ?></h5>
                                            </div>										
                                           <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.item_code')); ?>*</label>
                                                <input required type="text" class="form-control <?php if($errors->has('item_code')): ?> is-invalid <?php endif; ?>" name="item_code"
                                                               value="<?php echo e(old('item_code')?old('item_code'):$serialNumber); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_item_code')); ?>" />
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
                                                <label><?php echo e(__('adminMessage.displayorder')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('display_order')): ?> is-invalid <?php endif; ?>" name="display_order"  value="<?php echo e(old('display_order')?old('display_order'):$lastOrder); ?>" autocomplete="off" />
                                                               <?php if($errors->has('display_order')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('display_order')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.weight')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('weight')): ?> is-invalid <?php endif; ?>" name="weight"
                                                               value="<?php echo e(old('weight')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_weight')); ?>" />
                                                               <?php if($errors->has('weight')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('weight')); ?></div>
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
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_en')); ?>*</label>
                                                <input required type="text" class="form-control <?php if($errors->has('title_en')): ?> is-invalid <?php endif; ?>" name="title_en"
                                                               value="<?php echo e(old('title_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_en')); ?>" />
                                                               <?php if($errors->has('title_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_ar')); ?>*</label>
                                                <input required type="text" class="form-control <?php if($errors->has('title_ar')): ?> is-invalid <?php endif; ?>" name="title_ar"
                                                               value="<?php echo e(old('title_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_ar')); ?>" />
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
                                                <label><?php echo e(__('adminMessage.details_en')); ?>*</label>
                                                        <textarea rows="3" id="details_en" name="details_en" class="kt-tinymce-4 form-control <?php if($errors->has('details_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_en')); ?>"><?php echo e(old('details_en')); ?></textarea>
                                                               <?php if($errors->has('details_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.details_ar')); ?>*</label>
                                                        <textarea   rows="3" id="details_ar" name="details_ar" class="kt-tinymce-4 form-control <?php if($errors->has('details_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_ar')); ?>"><?php echo e(old('details_ar')); ?></textarea>
                                                               <?php if($errors->has('details_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                    
                                          
                                            
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.item_has_an_attribute')); ?></label>
                                                <select class="form-control <?php if($errors->has('is_attribute')): ?> is-invalid <?php endif; ?>" name="is_attribute" id="is_attribute">
                                                <option value="1" <?php if(old('is_attribute')==1): ?> selected <?php endif; ?> ><?php echo e(__('adminMessage.yes')); ?></option>
                                                <option value="0" <?php if(old('is_attribute')==0): ?> selected <?php endif; ?> ><?php echo e(__('adminMessage.no')); ?></option>
                                                </select>
                                                               <?php if($errors->has('is_attribute')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('is_attribute')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                                <div class="col-lg-2"  id="box-quantity" <?php if(!empty(old('is_attribute'))): ?> style="display:none;" <?php else: ?>  style="display:block;" <?php endif; ?>>
                                                <label><?php echo e(__('adminMessage.quantity')); ?></label>
                                                <input type="number" class="form-control <?php if($errors->has('squantity')): ?> is-invalid <?php endif; ?>" name="squantity"
                                                               value="<?php echo e(old('squantity')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_quantity')); ?>" />
                                                               <?php if($errors->has('squantity')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('squantity')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                 <label><?php echo e(__('adminMessage.youtube_url')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('youtube_url')): ?> is-invalid <?php endif; ?>" name="youtube_url" value="<?php echo e(old('youtube_url')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_youtube_url')); ?>" />
                                                               <?php if($errors->has('youtube_url')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('youtube_url')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-3">
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
                                              
                                              <div class="form-group row">
                                                 <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.brand')); ?></label>
                                                <select class="form-control" name="brand">
                                                <option value="0"><?php echo e(__('adminMessage.none')); ?></option>
                                                <?php if(!empty($brandLists) && count($brandLists)>0): ?> 
                                                <?php $__currentLoopData = $brandLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brandList->id); ?>" <?php if(old('brand')==$brandList->id): ?> selected <?php endif; ?>><?php echo e($brandList->title_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                </select>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.sectionhome')); ?></label>
                                                <select class="form-control" name="homesection">
                                                <option value="0" <?php if(old('homesection')==0): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.none')); ?></option>
                                                <?php if(!empty($listSections)): ?>
                                                <?php $__currentLoopData = $listSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($listSection->id); ?>" <?php if(old('homesection')==$listSection->id): ?> selected <?php endif; ?>><?php echo e($listSection->title_en); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                
                                                </select>
                                                </div>
                                                <div class="col-lg-3">
                                                <label><?php echo e(__('adminMessage.status')); ?></label>
                                                <select class="form-control" name="prodstatus">
                                                <option value="0" <?php if(old('is_active')==0): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.notpublished')); ?></option>
                                                <option value="1" <?php if(old('is_active')==1): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.published')); ?></option>
                                                <option value="2" <?php if(old('is_active')==2): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.publishedpreorder')); ?></option>
                                                </select>
                                                </div>
                                                
                                              </div>
                                              
                                              <div class="form-group">
											<h5><?php echo e(trans('adminMessage.defaultimage')); ?></h5>
                                            </div>
                                              
                                              <div class="form-group row">
                                                <div class="col-lg-6">
                                                        <label><?php echo e(trans('theme')['theme'.$theme]['product_image']); ?>*</label>
                                                        <div class="custom-file <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>">
														<input required type="file" class="custom-file-input <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>"  id="image" name="image">
														<label class="custom-file-label" for="image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                               <?php if($errors->has('image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                                <div class="col-lg-6">
                                                        <label><?php echo e(trans('theme')['theme'.$theme]['product_rollover_image']); ?></label>
                                                        <div class="custom-file <?php if($errors->has('rollover_image')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('rollover_image')): ?> is-invalid <?php endif; ?>"  id="rollover_image" name="rollover_image">
														<label class="custom-file-label" for="rollover_image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                               <?php if($errors->has('rollover_image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('rollover_image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
											<h5><?php echo e(trans('adminMessage.gallery')); ?></h5>
                                            </div>
                                            <div class="form-group">
                                              <div id="kt_repeater_gallery_1">
												<div class="form-group form-group-last row">
													<div data-repeater-list="attach" class="col-lg-12">
														<div data-repeater-item class="form-group row align-items-center repeatbox">
															<div class="col-md-3">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
																	<input type="text" class="form-control" name="atitle_en" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_en')); ?>" />
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
															<div class="col-md-3">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
																		<input type="text" class="form-control" name="atitle_ar" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_ar')); ?>" />
																	</div>
																</div>
																<div class="d-md-none kt-margin-b-10"></div>
															</div>
                                                            
															<div class="col-md-5">
																<div>
														       <input  type="file" class="form-control  <?php if($errors->has('attach_file')): ?> is-invalid <?php endif; ?>"   name="attach_file" id="attach_file">
                                                               <?php if($errors->has('attach_file')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('attach_file')); ?></div>
                                                               <?php endif; ?>
													            </div>
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
                                            
                                            <div class="form-group">
											<h5><?php echo e(trans('adminMessage.categories')); ?></h5>
                                            </div>
                                            <div class="form-group"> 
                                              <div id="kt_repeater_1">
												<div class="form-group form-group-last row">
													<div data-repeater-list="attach" class="col-lg-12">
														<div data-repeater-item class="form-group row align-items-center repeatbox">
															<div class="col-md-11">
																<div class="kt-form__group--inline">
																	<div class="kt-form__control">
                                                                        <select name="category" class="form-control">
                                                                        <option value="0" selected><?php echo e(__('adminMessage.chooseCategory')); ?></option>
                                                                        <?php $__currentLoopData = $categoryLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option style="font-size:20px;"  value="<?php echo e($category->id); ?>"><?php echo e($category->name_en); ?></option>
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
                                              
                                             <!--tags -->
                                             <div class="form-group"><h5><?php echo e(__('adminMessage.tags')); ?></h5></div> 
                                               <div class="form-group row"><div class="col-lg-12 alert" style="background-color:#DDEEFF;"><?php echo trans('adminMessage.tags_note'); ?></div></div> 
                                                <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.tags_en')); ?></label>
                                                <textarea name="tags_en" autofocus class=" <?php if($errors->has('tags_en')): ?> is-invalid <?php endif; ?>" id="tags_en" placeholder="<?php echo e(__('adminMessage.entertags_en')); ?>" autocomplete="off"><?php echo e(old('tags_en')); ?></textarea>
                                                <?php if($errors->has('tags_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('tags_en')); ?></div>
                                                 <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.tags_ar')); ?></label>
                                                <textarea name="tags_ar" id="tags_ar" class=" <?php if($errors->has('tags_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.entertags_ar')); ?>" autocomplete="off"><?php echo e(old('tags_ar')); ?></textarea>
                                                 <?php if($errors->has('tags_ar')): ?>
                                                 <div class="invalid-feedback"><?php echo e($errors->first('tags_ar')); ?></div>
                                                 <?php endif; ?>
                                                </div>
                                                </div> 
                                              
                                                     
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.save')); ?></button>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/product')); ?>'"  class="btn btn-secondary"><?php echo e(__('adminMessage.cancel')); ?></button>
                                                    
                                                    
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
		
		$('#kt_repeater_1').repeater({
		initEmpty: false,
		defaultValues:{
		'category': '0'
		},
		defaultName: {
		'text-input': 'foo',
		},
		show: function () {
		$(this).slideDown();
		},
		hide: function (deleteElement) {  
		  $(this).slideUp(deleteElement);   
		 }   
	    });
		
		$('#kt_repeater_gallery_1').repeater({
		initEmpty: false,
		defaultName: {
		'text-input': 'foo',
		},
		show: function () {
		$(this).slideDown();
		},
		hide: function (deleteElement) {  
		  $(this).slideUp(deleteElement);   
		 }   
	    });
		
		
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
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/product/addQuick.blade.php ENDPATH**/ ?>