<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.createnewcategory')); ?></title>
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
				<a href="index.html">
					<img alt="Logo" src="<?php echo url('admin_assets/assets/media/logos/logo-light.png'); ?>" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.categories')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('gwc/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.createnewcategory')); ?></a>
									</div>
								</div>
								<div class="btn-group" style="margin-top:10px;">
                                <?php if(auth()->guard('admin')->user()->can('category-create')): ?>
								<a href="<?php echo e(url('gwc/category')); ?>" class="btn btn-brand  btn-icon-sm"><i class="la la-list-ul"></i><?php echo e(__('adminMessage.listcategories')); ?></a> <?php endif; ?>
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
										<h3 class="kt-portlet__head-title"><?php echo e(__('adminMessage.createnewcategory')); ?></h3>
									</div>
									
								</div>				
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('category-create')): ?>
                    
                         <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('category.store')); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
										<!--parent categories dropdown -->	
                                           <div class="form-group row">
                                                <div class="col-lg-12">
                                                   <select class="form-control" name="parent_id">
                                                    <option value="0"><?php echo e(__('adminMessage.parentcategory')); ?></option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($category->id); ?>"><?php echo e($category->name_en); ?></option>
                                                       <?php if(count($category->childs)): ?>
                                                            <?php echo $__env->make('gwc.category.dropdown_childs',['childs' => $category->childs,'level'=>0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                       <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </select>
                                                </div>
                                                </div>
                                                <div class="form-group row">
                                                <div class="col-lg-12">
                                                <div class="form-group row">
                                                <label class="col-3 col-form-label"><?php echo e(__('adminMessage.is_full_width')); ?></label>
													<div class="col-1">
														<span class="kt-switch">
															<label>
																<input type="checkbox" checked="checked" name="is_full_width"  id="is_full_width" value="1"/>
																<span></span>
															</label>
														</span>
													</div>
													<label class="col-2 col-form-label"><?php echo e(__('adminMessage.isactive')); ?></label>
													<div class="col-2">
														<span class="kt-switch">
															<label>
																<input type="checkbox" checked="checked" name="is_active"  id="is_active" value="1"/>
																<span></span>
															</label>
														</span>
													</div>
													<label class="col-2 col-form-label"><?php echo e(__('adminMessage.displayorder')); ?></label>
													<div class="col-2">
														<input type="text" class="form-control <?php if($errors->has('display_order')): ?> is-invalid <?php endif; ?>" name="display_order"  value="<?php echo e(old('display_order')?old('display_order'):$lastOrder); ?>" autocomplete="off" />
                                                               <?php if($errors->has('display_order')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('display_order')); ?></div>
                                                               <?php endif; ?>
													</div>
												   </div>
                                                </div>
                                            </div>
                                            													
                                       <!--categories name -->         
                                                <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.categoryname_en')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('name_en')): ?> is-invalid <?php endif; ?>" name="name_en"
                                                               value="<?php echo e(old('name_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.entercategoryname_en')); ?>*" />
                                                               <?php if($errors->has('name_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('name_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.categoryname_ar')); ?></label>
                                                        <input dir="rtl" type="text" class="form-control <?php if($errors->has('name_ar')): ?> is-invalid <?php endif; ?>" name="name_ar"
                                                               value="<?php echo e(old('name_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.entercategoryname_ar')); ?>*" />
                                                               <?php if($errors->has('name_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('name_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                      <!--categories description -->          
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.categorydescription_en')); ?></label>
                                                        <textarea rows="3" name="details_en" class="form-control <?php if($errors->has('details_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseodescription_en')); ?>"><?php echo e(old('details_en')); ?></textarea>
                                                               <?php if($errors->has('details_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.categorydescription_ar')); ?></label>
                                                        <textarea dir="rtl" rows="3" name="details_ar" class="form-control <?php if($errors->has('details_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseodescription_ar')); ?>"><?php echo e(old('details_ar')); ?></textarea>
                                                               <?php if($errors->has('details_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                        <!-- categories SEO keywords -->   
                                      <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.seokeywords_en')); ?></label>
                                                        <textarea rows="3" name="seo_keywords_en" class="form-control <?php if($errors->has('seo_keywords_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseokeywords_en')); ?>"><?php echo e(old('seo_keywords_en')); ?></textarea>
                                                               <?php if($errors->has('seo_keywords_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('seo_keywords_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.seokeywords_ar')); ?></label>
                                                        <textarea dir="rtl" rows="3" name="seo_keywords_ar" class="form-control <?php if($errors->has('seo_keywords_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseokeywords_ar')); ?>"><?php echo e(old('seo_keywords_ar')); ?></textarea>
                                                               <?php if($errors->has('seo_keywords_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('seo_keywords_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>       
                                    <!--categories SEO description-->
                                            
                                    <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.seodescription_en')); ?></label>
                                                        <textarea rows="3" name="seo_description_en" class="form-control <?php if($errors->has('seo_description_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseodescription_ar')); ?>"><?php echo e(old('seo_description_en')); ?></textarea>
                                                               <?php if($errors->has('seo_description_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('seo_description_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.seodescription_ar')); ?></label>
                                                        <textarea dir="rtl" rows="3" name="seo_description_ar" class="form-control <?php if($errors->has('seo_description_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseodescription_ar')); ?>"><?php echo e(old('seo_description_ar')); ?></textarea>
                                                               <?php if($errors->has('seo_description_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('seo_description_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                         <!-- friendly url , status , sorting -->   
                                                <div class="form-group row">
                                                <div class="col-lg-12">
                                                <label><?php echo e(__('adminMessage.friendlyurl')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('friendly_url')): ?> is-invalid <?php endif; ?>" name="friendly_url"
                                                               value="<?php echo e(old('friendly_url')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterfirednlyurl')); ?>*" />
                                                               <?php if($errors->has('friendly_url')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('friendly_url')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(trans('theme')['theme'.$theme]['category_image']); ?></label>
                                                <div class="custom-file <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>">
												<input type="file" class="custom-file-input <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>"  id="image" name="image">
												<label class="custom-file-label" for="image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
											    </div>
                                                               <?php if($errors->has('image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(trans('theme')['theme'.$theme]['category_header_image']); ?></label>
                                                        <div class="custom-file <?php if($errors->has('header_image')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('header_image')): ?> is-invalid <?php endif; ?>"  id="header_image" name="header_image">
														<label class="custom-file-label" for="header_image"><?php echo e(__('adminMessage.chooseImageHeader')); ?></label>
													    </div>
                                                               <?php if($errors->has('header_image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('header_image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                                     
                                                     
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.save')); ?></button>
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/category')); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
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
	</body>

	<!-- end::Body -->
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/category/create.blade.php ENDPATH**/ ?>