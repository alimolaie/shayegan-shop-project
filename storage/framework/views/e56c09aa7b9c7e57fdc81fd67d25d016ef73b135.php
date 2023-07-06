<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.categorydetails')); ?></title>
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
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.categorydetails')); ?></a>
									</div>
								</div>
						<div class="kt-subheader__toolbar">
                        <a href="<?php echo e(url('gwc/category')); ?>" class="btn btn-default btn-bold"><?php echo e(__('adminMessage.back')); ?></a>
                         <?php if(auth()->guard('admin')->user()->can('category-create')): ?>
                        <a href="<?php echo e(url('gwc/category/create')); ?>" class="btn btn-brand btn-bold"><i class="la la-plus"></i>&nbsp;<?php echo e(__('adminMessage.createnew')); ?></a>
                        <?php endif; ?>
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
										<h3 class="kt-portlet__head-title"><?php echo e(__('adminMessage.categorydetails')); ?></h3>
									</div>
								</div>	
                                			
										<!--begin::Form-->
					        <?php if(auth()->guard('admin')->user()->can('category-view')): ?>
                    
                             <!--begin:: Portlet-->
							<div class="kt-portlet ">
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
											<div class="kt-widget__media kt-hidden-">
                                                <?php if($categoryDetails->image): ?>
												<img src="<?php echo url('uploads/category/thumb/'.$categoryDetails->image); ?>" alt="<?php echo e($categoryDetails->name_en); ?>">
                                                <?php else: ?>
                                                <img src="<?php echo url('uploads/no-image.png'); ?>" alt="<?php echo e($categoryDetails->name_en); ?>">
                                                <?php endif; ?>
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
													<a href="#" class="kt-widget__title"><?php echo e($categoryDetails->name_en); ?></a>
												</div>
												<div class="kt-widget__info">
													<div class="kt-widget__desc">
														<?php echo $categoryDetails->details_en; ?>

													</div>
													
													<div class="kt-widget__stats d-flex align-items-center flex-fill">
														<div class="kt-widget__item">
															<span class="kt-widget__date">
																<?php echo e(__('adminMessage.createdon')); ?>

															</span>
															<div class="kt-widget__label">
																<span class="btn btn-label-brand btn-sm btn-bold btn-upper"><?php echo e($categoryDetails->created_at); ?></span>
															</div>
														</div>
														<div class="kt-widget__item">
															<span class="kt-widget__date">
																<?php echo e(__('adminMessage.subcategories')); ?>

															</span>
															<div class="kt-widget__label">
																<span class="btn btn-label-danger btn-sm btn-bold btn-upper"><?php echo e($categoryDetails->updated_at); ?></span>
															</div>
														</div>
													
													</div>
												</div>
											</div>
										</div>
										<div class="kt-widget__bottom">
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-map"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title"><?php echo e(__('adminMessage.subcategories')); ?></span>
													<span class="kt-widget__value"><?php echo e($countCats); ?></span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-squares-3"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title"><?php echo e(__('adminMessage.products')); ?></span>
													<span class="kt-widget__value"><?php echo e(count($countProducts)); ?></span>
												</div>
											</div>
									   </div>
									</div>
								</div>
							</div>
                       <!-- offer for category -->
                             
                      <?php if(auth()->guard('admin')->user()->can('category-add-offer')): ?>
                      <div class="kt-portlet__body">
                      <h5><?php echo e(__('adminMessage.offer')); ?></h5>
                      
                      </div>
                    <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('categoryoffer',$categoryDetails->id)); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
										<!--parent categories dropdown -->	
                                           <div class="form-group row">
                                                <div class="col-lg-6">
                                                <div class="form-group row">
													<label class="col-3 col-form-label"><?php echo e(__('adminMessage.isactive')); ?></label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox" value="1" <?php echo e($categoryDetails->is_offer==1?'checked':''); ?> name="is_offer"  id="is_offer"/>
																<span></span>
															</label>
														</span>
													</div>
												
												</div>
                                                </div>
                                            </div>
                                            													
                                       <!--categories name -->  
                                       <div class="form-group row">
                                                <div class="col-lg-6">
                                               <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_1_en')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('title_1_en')): ?> is-invalid <?php endif; ?>" name="title_1_en"
                                                               value="<?php echo e($categoryDetails->title_1_en?$categoryDetails->title_1_en:old('title_1_en')); ?>" autocomplete="off" />
                                                               <?php if($errors->has('title_1_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_1_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_1_ar')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('title_1_ar')): ?> is-invalid <?php endif; ?>" name="title_1_ar"
                                                               value="<?php echo e($categoryDetails->title_1_ar?$categoryDetails->title_1_ar:old('title_1_ar')); ?>" autocomplete="off"  />
                                                               <?php if($errors->has('title_1_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_1_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_2_en')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('title_2_en')): ?> is-invalid <?php endif; ?>" name="title_2_en"
                                                               value="<?php echo e($categoryDetails->title_2_en?$categoryDetails->title_2_en:old('title_2_en')); ?>" autocomplete="off" />
                                                               <?php if($errors->has('title_2_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_2_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_2_ar')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('title_2_ar')): ?> is-invalid <?php endif; ?>" name="title_2_ar"
                                                               value="<?php echo e($categoryDetails->title_2_ar?$categoryDetails->title_2_ar:old('title_2_ar')); ?>" autocomplete="off"  />
                                                               <?php if($errors->has('title_2_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_2_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_3_en')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('title_3_en')): ?> is-invalid <?php endif; ?>" name="title_3_en"
                                                               value="<?php echo e($categoryDetails->title_3_en?$categoryDetails->title_3_en:old('title_3_en')); ?>" autocomplete="off" />
                                                               <?php if($errors->has('title_3_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_3_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_3_ar')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('title_3_ar')): ?> is-invalid <?php endif; ?>" name="title_3_ar"
                                                               value="<?php echo e($categoryDetails->title_3_ar?$categoryDetails->title_3_ar:old('title_3_ar')); ?>" autocomplete="off"  />
                                                               <?php if($errors->has('title_3_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_3_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_4_en')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('title_4_en')): ?> is-invalid <?php endif; ?>" name="title_4_en"
                                                               value="<?php echo e($categoryDetails->title_4_en?$categoryDetails->title_4_en:old('title_4_en')); ?>" autocomplete="off" />
                                                               <?php if($errors->has('title_4_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_4_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.title_4_ar')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('title_4_ar')): ?> is-invalid <?php endif; ?>" name="title_4_ar"
                                                               value="<?php echo e($categoryDetails->title_4_ar?$categoryDetails->title_4_ar:old('title_4_ar')); ?>" autocomplete="off"  />
                                                               <?php if($errors->has('title_4_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_4_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                <label><?php echo e(__('adminMessage.link')); ?></label>
                                                        <input type="text" class="form-control <?php if($errors->has('offer_link')): ?> is-invalid <?php endif; ?>" name="offer_link"
                                                               value="<?php echo e($categoryDetails->offer_link?$categoryDetails->offer_link:old('offer_link')); ?>" autocomplete="off" />
                                                               <?php if($errors->has('offer_link')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('offer_link')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                
                                                <div class="col-lg-8">
                                                <label><?php echo e(__('adminMessage.promo_image')); ?></label>
                                                        <div class="custom-file <?php if($errors->has('offer_image')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('offer_image')): ?> is-invalid <?php endif; ?>"  id="offer_image" name="offer_image">
														<label class="custom-file-label" for="offer_image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                        <?php if($errors->has('offer_image')): ?>
                                                        <div class="invalid-feedback"><?php echo e($errors->first('offer_image')); ?></div>
                                                        <?php endif; ?>
                                                </div>
                                                <div class="col-lg-2">
                                                <?php if($categoryDetails->offer_image): ?>
                                                <img src="<?php echo url('uploads/category/'.$categoryDetails->offer_image); ?>" width="150">
                                                <?php endif; ?>
                                                </div>
                                                
                                            </div>
                                                </div>
                                                 <div class="col-lg-6">
                                               <div class="form-group row">
                                                <div class="col-lg-6">
                                                 <div <?php if($categoryDetails->offer_image): ?> style="background-image:url(<?php echo url('uploads/category/'.$categoryDetails->offer_image); ?>)" <?php endif; ?> class="kt-portlet kt-portlet--height-fluid btn btn-label-brand btn-bold btn-sm btn-label-success kt-text-center">
                                                 <p><h5><?php echo e($categoryDetails->title_1_en?$categoryDetails->title_1_en:old('title_1_en')); ?></h5></p>
                                                 <p><h1><?php echo e($categoryDetails->title_2_en?$categoryDetails->title_2_en:old('title_2_en')); ?></h1></p>
                                                 <p><?php echo e($categoryDetails->title_3_en?$categoryDetails->title_3_en:old('title_3_en')); ?></p>
                                                 <p><span class="btn btn-label-brand btn-bold btn-sm"><?php echo e($categoryDetails->title_4_en?$categoryDetails->title_4_en:old('title_4_en')); ?></span></p>
                                                 </div>
                                                </div>
                                                <div class="col-lg-6">
                                                 <div <?php if($categoryDetails->offer_image): ?> style="background-image:url(<?php echo url('uploads/category/'.$categoryDetails->offer_image); ?>)" <?php endif; ?> class="kt-portlet kt-portlet--height-fluid btn btn-label-brand btn-bold btn-sm kt-text-center">
                                                 <p><h5><?php echo e($categoryDetails->title_1_ar?$categoryDetails->title_1_ar:old('title_1_ar')); ?></h5></p>
                                                 <p><h1><?php echo e($categoryDetails->title_2_ar?$categoryDetails->title_2_ar:old('title_2_ar')); ?></h1></p>
                                                 <p><?php echo e($categoryDetails->title_3_ar?$categoryDetails->title_3_ar:old('title_3_ar')); ?></p>
                                                 <p><span class="btn btn-label-brand btn-bold btn-sm"><?php echo e($categoryDetails->title_4_ar?$categoryDetails->title_4_ar:old('title_4_ar')); ?></span></p>
                                                 </div>
                                                 </div>
                                                 </div>
                                                </div>
                                            </div>
                                                   
                                        
                                                     
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-success"><?php echo e(__('adminMessage.save')); ?></button>
													
												</div>
											</div>
										</form>
                                        
                         
                            <?php endif; ?> 
							<!--end:: Portlet-->           
                         
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
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/category/view.blade.php ENDPATH**/ ?>