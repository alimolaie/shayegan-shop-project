<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.editsinglepages')); ?></title>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.singlepages')); ?></h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('admin/home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.editsinglepages')); ?></a>
									</div>
								</div>
								<?php if(auth()->guard('admin')->user()->can('singlepages-list')): ?>
												<a style="margin-top:10px;" href="<?php echo e(url('gwc/singlepages')); ?>" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-list-ul"></i><?php echo e(__('adminMessage.listsinglepages')); ?></a> <?php endif; ?>
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
										<h3 class="kt-portlet__head-title"><?php echo e(__('adminMessage.editsinglepages')); ?></h3>
									</div>
									
								</div>				
										<!--begin::Form-->
					<?php if(auth()->guard('admin')->user()->can('singlepages-edit')): ?>
                    <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('singlepages.update',$editsinglepages->id)); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											<div class="kt-portlet__body">
									
                                            													
                                             
                                                <div class="form-group row">
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.title_en')); ?></label>
                                                <input type="text" class="form-control <?php if($errors->has('title_en')): ?> is-invalid <?php endif; ?>" name="title_en"
                                                               value="<?php echo e($editsinglepages->title_en?$editsinglepages->title_en:old('title_en')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_en')); ?>*" />
                                                               <?php if($errors->has('title_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.title_ar')); ?></label>
                                                <input dir="rtl" type="text" class="form-control <?php if($errors->has('title_ar')): ?> is-invalid <?php endif; ?>" name="title_ar"
                                                               value="<?php echo e($editsinglepages->title_ar?$editsinglepages->title_ar:old('title_ar')); ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_title_ar')); ?>*" />
                                                               <?php if($errors->has('title_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('title_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                            </div>
                                            
                                              
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.details_en')); ?></label>
                                                        <textarea rows="3" id="details_en" name="details_en" class="kt-tinymce-4 form-control <?php if($errors->has('details_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_en')); ?>"><?php echo $editsinglepages->details_en?$editsinglepages->details_en:old('details_en'); ?></textarea>
                                                               <?php if($errors->has('details_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.details_ar')); ?></label>
                                                        <textarea dir="rtl"   rows="3" id="details_ar" name="details_ar" class="kt-tinymce-4 form-control <?php if($errors->has('details_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enter_details_ar')); ?>"><?php echo $editsinglepages->details_ar?$editsinglepages->details_ar:old('details_ar'); ?></textarea>
                                                               <?php if($errors->has('details_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('details_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                            </div>
                                        
                                      <div class="form-group row">
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.seokeywords_en')); ?></label>
                                                        <textarea rows="3" name="seo_keywords_en" class="form-control <?php if($errors->has('seo_keywords_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseokeywords_en')); ?>"><?php echo e($editsinglepages->seo_keywords_en?$editsinglepages->seo_keywords_en:old('seo_keywords_en')); ?></textarea>
                                                               <?php if($errors->has('seo_keywords_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('seo_keywords_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.seokeywords_ar')); ?></label>
                                                        <textarea dir="rtl" rows="3" name="seo_keywords_ar" class="form-control <?php if($errors->has('seo_keywords_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseokeywords_ar')); ?>"><?php echo e($editsinglepages->seo_keywords_ar?$editsinglepages->seo_keywords_ar:old('seo_keywords_ar')); ?></textarea>
                                                               <?php if($errors->has('seo_keywords_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('seo_keywords_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                            </div>       
                                    <!--categories SEO description-->
                                            
                                    <div class="form-group row">
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.seodescription_en')); ?></label>
                                                        <textarea  rows="3" name="seo_description_en" class="form-control <?php if($errors->has('seo_description_en')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseodescription_ar')); ?>"><?php echo e($editsinglepages->seo_description_en?$editsinglepages->seo_description_en:old('seo_description_en')); ?></textarea>
                                                               <?php if($errors->has('seo_description_en')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('seo_description_en')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-lg-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.seodescription_ar')); ?></label>
                                                        <textarea dir="rtl" rows="3" name="seo_description_ar" class="form-control <?php if($errors->has('seo_description_ar')): ?> is-invalid <?php endif; ?>" autocomplete="off" placeholder="<?php echo e(__('adminMessage.enterseodescription_ar')); ?>"><?php echo e($editsinglepages->seo_description_ar?$editsinglepages->seo_description_ar:old('seo_description_ar')); ?></textarea>
                                                               <?php if($errors->has('seo_description_ar')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('seo_description_ar')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                </div>
                                            </div>
                                            
                                         <!-- friendly url , status , sorting -->   
                                         <div class="form-group row">
                                                
                                                <div class="col-lg-6">
                                                <label><?php echo e(trans('theme')['theme'.$theme]['single_page_image']); ?></label>
                                                <div class="custom-file <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>">
												<input type="file" class="custom-file-input <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>"  id="image" name="image">
												<label class="custom-file-label" for="image"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                               <?php if($errors->has('image')): ?>
                                                               <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
                                                               <?php endif; ?>
                                                </div>
                                                <div class="col-lg-2">
                                                <?php if($editsinglepages->image): ?>
                                                <img src="<?php echo url('uploads/singlepages/thumb/'.$editsinglepages->image); ?>" width="40">
                                                <a href="<?php echo e(url('gwc/singlepages/deletesinglepagesImage/'.$editsinglepages->id)); ?>"  class="btn btn-brand btn-danger btn-icon-sm btn-sm"><i class="la la-trash"></i><?php echo e(__('adminMessage.delete')); ?></a>
                                                <?php endif; ?>
                                                </div>
                                                <div class="col-lg-4">
                                                <div class="form-group row">
													<label class="col-4 col-form-label"><?php echo e(__('adminMessage.isactive')); ?></label>
													<div class="col-3">
														<span class="kt-switch">
															<label>
																<input type="checkbox" <?php echo e($editsinglepages->is_active==1?'checked':''); ?> name="is_active"  id="is_active" value="1"/>
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
													<button type="button" onClick="Javascript:window.location.href='<?php echo e(url('gwc/singlepages')); ?>'"  class="btn btn-secondary cancelbtn"><?php echo e(__('adminMessage.cancel')); ?></button>
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
        
        <!--begin::Page Vendors(used by this page) -->
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
		  height: 300
		});
		});
       </script>
	</body>

	<!-- end::Body -->
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/singlepages/edit.blade.php ENDPATH**/ ?>