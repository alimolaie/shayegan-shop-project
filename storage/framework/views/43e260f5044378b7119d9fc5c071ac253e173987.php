<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?> | <?php echo e(__('adminMessage.generalsettings')); ?></title>
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
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.generalsettings')); ?></a>
									</div>
								</div>

							</div>
						</div>


						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                          <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if(auth()->guard('admin')->user()->can('general-settings-edit')): ?>
                           <form name="tFrm"  id="form_validation"  method="post"
                          class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('general-settings.update',$settingDetails->keyname)); ?>">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="row">
								<div class="col-md-6">

									<!--begin::Portlet-->
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													<?php echo e(__('adminMessage.storedetails')); ?>

												</h3>
											</div>
										</div>

										<!--begin::Form-->

											<div class="kt-portlet__body">
                                            <div class="form-group "><h5><?php echo e(__('adminMessage.websitesetting')); ?></h5></div>

                                          <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_admin_menu_minimize')); ?> <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_admin_menu_minimize_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_admin_menu_minimize)?'checked':''); ?> type="checkbox"  id="is_admin_menu_minimize" name="is_admin_menu_minimize"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div>
                                                
                                                
                                            <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_show_tags')); ?> <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_show_tags_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_show_tags)?'checked':''); ?> type="checkbox"  id="is_show_tags" name="is_show_tags"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div>

                                          <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_review_active')); ?> <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_review_active_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_review_active)?'checked':''); ?> type="checkbox"  id="is_review_active" name="is_review_active"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div>
                                                
                                                
                                            <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_more_menu')); ?> <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_more_menu_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_more_menu)?'checked':''); ?> type="checkbox"  id="is_more_menu" name="is_more_menu"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div>
                                                
                                             <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_offer_menu')); ?> <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_offer_menu_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_offer_menu)?'checked':''); ?> type="checkbox"  id="is_offer_menu" name="is_offer_menu"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div>
                                                
                                                   
                                            <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_cart_popup')); ?> <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_cart_popup_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_cart_popup)?'checked':''); ?> type="checkbox"  id="is_cart_popup" name="is_cart_popup"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div>
                                                
                                                
                                              <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_float_whatsapp')); ?> <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_float_whatsapp_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_float_whatsapp)?'checked':''); ?> type="checkbox"  id="is_float_whatsapp" name="is_float_whatsapp"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div>

                                              <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_new_item_active')); ?> <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_new_item_active_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_new_item_active)?'checked':''); ?> type="checkbox"  id="is_new_item_active" name="is_new_item_active"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div>

												<div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_language_active')); ?><a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_language_active_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_lang)?'checked':''); ?> type="checkbox"  id="is_lang" name="is_lang"><span></span>
															</label>
														</span>
													</div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-10"><?php echo e(__('adminMessage.is_brand_active')); ?><a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.is_brand_active_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
														<span class="kt-switch">
                                                <label><input value="1" <?php echo e(!empty($settingDetails->is_brand_active)?'checked':''); ?> type="checkbox"  id="is_brand_active" name="is_brand_active"><span></span></label>
														</span>
													</div>
                                                   </div>
                                                </div>

                                                <div class="form-group">
                                                <div class="input-group row">
												 <label class="col-8"><?php echo e(__('adminMessage.showbrandimagetitle')); ?><a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.note')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.showbrandimagetitle_note')); ?>"><?php echo trans('svgicon.help'); ?></a></label>
													<div class="col-2" align="right">
                                                    <label>Logo</label>
														<span class="kt-switch">
                                                <label><input value="image" <?php echo e(!empty($settingDetails->is_brand_image_name) && $settingDetails->is_brand_image_name=='image'?'checked':''); ?> type="radio"  id="is_brand_active" name="is_brand_image_name"><span></span></label>
														</span>
													</div>
                                                    <div class="col-2" align="right">
                                                        <label>Name</label>
														<span class="kt-switch">
                                                <label><input value="title" <?php echo e(!empty($settingDetails->is_brand_image_name) && $settingDetails->is_brand_image_name=='title'?'checked':''); ?> type="radio"  id="is_brand_active" name="is_brand_image_name"><span></span></label>
														</span>
													</div>
                                                   </div>
                                                </div>

												<div class="form-group">
                                                <div class="row">
								                    <div class="col-md-6">
													<label><?php echo e(__('adminMessage.websitename_en')); ?></label>
													<input type="text"  class="form-control <?php if($errors->has('name_en')): ?> is-invalid <?php endif; ?>" name="name_en" placeholder="<?php echo e(__('adminMessage.enter_websitename_en')); ?>" value="<?php if($settingDetails->name_en): ?><?php echo e($settingDetails->name_en); ?><?php endif; ?>">
                                                    <?php if($errors->has('name_en')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('name_en')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-6">
													<label><?php echo e(__('adminMessage.websitename_ar')); ?></label>
													<input dir="rtl" type="text"  class="form-control <?php if($errors->has('name_ar')): ?> is-invalid <?php endif; ?>" name="name_ar" placeholder="<?php echo e(__('adminMessage.enter_websitename_ar')); ?>" value="<?php if($settingDetails->name_ar): ?><?php echo e($settingDetails->name_ar); ?><?php endif; ?>">
                                                    <?php if($errors->has('name_ar')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('name_ar')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                    </div>
												</div>
                                                <!--website logo -->
                                                <div class="form-group">
                                                <div class="row">
								                    <div class="col-md-10">
                                                    <label><?php echo e(trans('theme')['theme'.$theme]['logo_image']); ?></label>
                                                        <div class="custom-file <?php if($errors->has('logo')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('logo')): ?> is-invalid <?php endif; ?>"  id="logo" name="logo">
														<label class="custom-file-label" for="logo"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                        <?php if($errors->has('logo')): ?>
                                                        <div class="invalid-feedback"><?php echo e($errors->first('logo')); ?></div>
                                                        <?php endif; ?>
                                                </div>
                                                <div class="col-md-2">
                                                <?php if($settingDetails->logo): ?>
                                                <img src="<?php echo url('uploads/logo/'.$settingDetails->logo); ?>" width="40">
                                                <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.alert')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.areyousuretodelete')); ?><br><br><a href='<?php echo e(url('gwc/settings/deleteLogo/')); ?>' class='btn btn-brand btn-danger btn-icon-sm btn-sm'><?php echo e(__('adminMessage.yes')); ?></a>" class="btn btn-brand btn-danger btn-icon-sm btn-sm"><i class="la la-trash"></i><?php echo e(__('adminMessage.delete')); ?></a>
                                                <?php endif; ?>
                                                </div>
                                                    </div>
												</div>
                                                <div class="form-group">
                                                <div class="row">
								                    <div class="col-md-10">
                                                    <label><?php echo e(trans('theme')['theme'.$theme]['footer_logo_image']); ?></label>
                                                        <div class="custom-file <?php if($errors->has('footerlogo')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('footerlogo')): ?> is-invalid <?php endif; ?>"  id="footerlogo" name="footerlogo">
														<label class="custom-file-label" for="footerlogo"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                        <?php if($errors->has('footerlogo')): ?>
                                                        <div class="invalid-feedback"><?php echo e($errors->first('footerlogo')); ?></div>
                                                        <?php endif; ?>
                                                </div>
                                                <div class="col-md-2">
                                                <?php if($settingDetails->footerlogo): ?>
                                                <img src="<?php echo url('uploads/logo/'.$settingDetails->footerlogo); ?>" width="40">
                                                <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.alert')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.areyousuretodelete')); ?><br><br><a href='<?php echo e(url('gwc/settings/deleteFooterLogo/')); ?>' class='btn btn-brand btn-danger btn-icon-sm btn-sm'><?php echo e(__('adminMessage.yes')); ?></a>" class="btn btn-brand btn-danger btn-icon-sm btn-sm"><i class="la la-trash"></i><?php echo e(__('adminMessage.delete')); ?></a>
                                                <?php endif; ?>
                                                </div>
                                                    </div>
												</div>
                                                <!--email logo-->
                                                <div class="form-group">
                                                <div class="row">
								                    <div class="col-md-10">
                                                    <label><?php echo e(trans('theme')['theme'.$theme]['email_logo_image']); ?></label>
                                                        <div class="custom-file <?php if($errors->has('emaillogo')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('emaillogo')): ?> is-invalid <?php endif; ?>"  id="emaillogo" name="emaillogo">
														<label class="custom-file-label" for="emaillogo"><?php echo e(__('adminMessage.chooseImage')); ?></label>
													    </div>
                                                        <?php if($errors->has('emaillogo')): ?>
                                                        <div class="invalid-feedback"><?php echo e($errors->first('emaillogo')); ?></div>
                                                        <?php endif; ?>
                                                </div>
                                                <div class="col-md-2">
                                                <?php if($settingDetails->emaillogo): ?>
                                                <img src="<?php echo url('uploads/logo/'.$settingDetails->emaillogo); ?>" width="40">
                                                <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.alert')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.areyousuretodelete')); ?><br><br><a href='<?php echo e(url('gwc/settings/deleteEmailLogo/')); ?>' class='btn btn-brand btn-danger btn-icon-sm btn-sm'><?php echo e(__('adminMessage.yes')); ?></a>" class="btn btn-brand btn-danger btn-icon-sm btn-sm"><i class="la la-trash"></i><?php echo e(__('adminMessage.delete')); ?></a>
                                                <?php endif; ?>
                                                </div>
                                                    </div>
												</div>
                                                <!--favicon -->
                                                <div class="form-group">
                                                <div class="row">
								                    <div class="col-md-10">
                                                    <label><?php echo e(__('adminMessage.favicon')); ?></label>
                                                        <div class="custom-file <?php if($errors->has('favicon')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('favicon')): ?> is-invalid <?php endif; ?>"  id="favicon" name="favicon">
														<label class="custom-file-label" for="image"><?php echo e(__('adminMessage.chooseImageFavicon')); ?></label>
													    </div>
                                                        <?php if($errors->has('favicon')): ?>
                                                        <div class="invalid-feedback"><?php echo e($errors->first('favicon')); ?></div>
                                                        <?php endif; ?>
                                                </div>
                                                <div class="col-md-2">
                                                <?php if($settingDetails->favicon): ?>
                                                <img src="<?php echo url('uploads/logo/'.$settingDetails->favicon); ?>" width="40">
                                                <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.alert')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.areyousuretodelete')); ?><br><br><a href='<?php echo e(url('gwc/settings/deletefavicon/')); ?>' class='btn btn-brand btn-danger btn-icon-sm btn-sm'><?php echo e(__('adminMessage.yes')); ?></a>" class="btn btn-brand btn-danger btn-icon-sm btn-sm"><i class="la la-trash"></i><?php echo e(__('adminMessage.delete')); ?></a>
                                                <?php endif; ?>
                                                </div>
                                                    </div>
												</div>
                                                <!--default header image -->
                                                <div class="form-group">
                                                <div class="row">
								                    <div class="col-md-10">
                                                    <label><?php echo e(trans('theme')['theme'.$theme]['default_header_image']); ?></label>
                                                        <div class="custom-file <?php if($errors->has('header_image')): ?> is-invalid <?php endif; ?>">
														<input type="file" class="custom-file-input <?php if($errors->has('header_image')): ?> is-invalid <?php endif; ?>"  id="header_image" name="header_image">
														<label class="custom-file-label" for="header_image"><?php echo e(__('adminMessage.chooseImageHeader')); ?></label>
													    </div>
                                                        <?php if($errors->has('header_image')): ?>
                                                        <div class="invalid-feedback"><?php echo e($errors->first('header_image')); ?></div>
                                                        <?php endif; ?>
                                                </div>
                                                <div class="col-md-2">
                                                <?php if($settingDetails->header_image): ?>
                                                <img src="<?php echo url('uploads/logo/'.$settingDetails->header_image); ?>" width="40">
                                                <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.alert')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.areyousuretodelete')); ?><br><br><a href='<?php echo e(url('gwc/settings/deleteheaderimg/')); ?>' class='btn btn-brand btn-danger btn-icon-sm btn-sm'><?php echo e(__('adminMessage.yes')); ?></a>" class="btn btn-brand btn-danger btn-icon-sm btn-sm"><i class="la la-trash"></i><?php echo e(__('adminMessage.delete')); ?></a>
                                                <?php endif; ?>
                                                </div>
                                                    </div>
												</div>

                                                 <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.is_watermark')); ?></span></div>
                                                <div class="form-control" align="right" style="border:0;">
												<span class="kt-switch" style="margin-top:-6px;"><label>
												<input value="1" <?php echo e(!empty($settingDetails->is_watermark)?'checked':''); ?> type="checkbox"  id="is_watermark" name="is_watermark"><span></span></label></span>
                                                </div>

												</div>
                                                </div>


                                                <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-10">
                                                <label><?php echo e(trans('theme')['theme'.$theme]['watermarkimage']); ?></label>
                                                    <div class="custom-file <?php if($errors->has('watermark_img')): ?> is-invalid <?php endif; ?>">
                                                    <input type="file" class="custom-file-input <?php if($errors->has('watermark_img')): ?> is-invalid <?php endif; ?>"  id="watermark_img" name="watermark_img">               <label class="custom-file-label" for="watermark_img"><?php echo e(__('adminMessage.chooseImagewatermark')); ?></label>
                                                    </div>
                                                    <?php if($errors->has('watermark_img')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('watermark_img')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <?php if($settingDetails->watermark_img): ?>
                                                    <img src="<?php echo url('uploads/logo/'.$settingDetails->watermark_img); ?>" width="40">
                                                    <a href="javascript:;" data-toggle="kt-popover" data-trigger="focus" title="<?php echo e(__('adminMessage.alert')); ?>" data-html="true" data-content="<?php echo e(__('adminMessage.areyousuretodelete')); ?><br><br><a href='<?php echo e(url('gwc/settings/deletewatermark/')); ?>' class='btn btn-brand btn-danger btn-icon-sm btn-sm'><?php echo e(__('adminMessage.yes')); ?></a>" class="btn btn-brand btn-danger btn-icon-sm btn-sm"><i class="la la-trash"></i><?php echo e(__('adminMessage.delete')); ?></a>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                                </div>


                                                <div class="form-group "><h5><?php echo e(__('adminMessage.seo')); ?></h5></div>
                                                <div class="form-group">
													<label><?php echo e(__('adminMessage.seodescription_en')); ?></label>
													<textarea rows="5" type="text" class="form-control  <?php if($errors->has('seo_description_en')): ?> is-invalid <?php endif; ?>" name="seo_description_en" placeholder="<?php echo e(__('adminMessage.enterseodescription_en')); ?>"><?php if($settingDetails->seo_description_en): ?><?php echo $settingDetails->seo_description_en; ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('seo_description_en')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('seo_description_en')); ?></div>
                                                    <?php endif; ?>
												</div>
                                                <div class="form-group">
													<label><?php echo e(__('adminMessage.seodescription_ar')); ?></label>
													<textarea rows="5" dir="rtl" type="text" class="form-control  <?php if($errors->has('seo_description_ar')): ?> is-invalid <?php endif; ?>" name="seo_description_ar" placeholder="<?php echo e(__('adminMessage.enterseodescription_ar')); ?>"><?php if($settingDetails->seo_description_ar): ?><?php echo $settingDetails->seo_description_ar; ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('seo_description_ar')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('seo_description_ar')); ?></div>
                                                    <?php endif; ?>
												</div>

                                                <div class="form-group">
													<label><?php echo e(__('adminMessage.seokeywords_en')); ?></label>
													<input type="text" class="form-control  <?php if($errors->has('seo_keywords_en')): ?> is-invalid <?php endif; ?>" name="seo_keywords_en" placeholder="<?php echo e(__('adminMessage.enterseokeywords_en')); ?>" value="<?php if($settingDetails->seo_keywords_en): ?><?php echo e($settingDetails->seo_keywords_en); ?><?php endif; ?>">
                                                    <?php if($errors->has('seo_keywords_en')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('seo_keywords_en')); ?></div>
                                                    <?php endif; ?>
												</div>
                                                <div class="form-group">
													<label><?php echo e(__('adminMessage.seokeywords_ar')); ?></label>
													<input dir="rtl" type="text" class="form-control  <?php if($errors->has('seo_keywords_ar')): ?> is-invalid <?php endif; ?>" name="seo_keywords_ar" placeholder="<?php echo e(__('adminMessage.enterseokeywords_ar')); ?>" value="<?php if($settingDetails->seo_keywords_ar): ?><?php echo e($settingDetails->seo_keywords_ar); ?><?php endif; ?>">
                                                    <?php if($errors->has('seo_keywords_ar')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('seo_keywords_ar')); ?></div>
                                                    <?php endif; ?>
												</div>

                                                <div class="form-group">
                                                <div class="row">
								                    <div class="col-md-12">
													<label><?php echo e(__('adminMessage.extra_meta_tags')); ?></label>
													<textarea rows="10" class="form-control  <?php if($errors->has('extra_meta_tags')): ?> is-invalid <?php endif; ?>" rows="3" name="extra_meta_tags" placeholder="<?php echo e(__('adminMessage.enter_extra_meta_tags')); ?>"><?php if($settingDetails->extra_meta_tags): ?><?php echo $settingDetails->extra_meta_tags; ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('extra_meta_tags')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('extra_meta_tags')); ?></div>
                                                    <?php endif; ?>
                                                    </div>

                                                    </div>
												</div>


                                                <div class="form-group "><h5><?php echo e(__('adminMessage.address')); ?></h5></div>
                                                <div class="form-group">
													<label><?php echo e(__('adminMessage.owner_name')); ?></label>
													<input type="text" class="form-control  <?php if($errors->has('owner_name')): ?> is-invalid <?php endif; ?>" name="owner_name" placeholder="<?php echo e(__('adminMessage.enterowner_name')); ?>" value="<?php if($settingDetails->owner_name): ?><?php echo e($settingDetails->owner_name); ?><?php endif; ?>">
                                                    <?php if($errors->has('owner_name')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('owner_name')); ?></div>
                                                    <?php endif; ?>
												</div>
                                                <div class="form-group">
													<label><?php echo e(__('adminMessage.map_embed_url')); ?></label>
													<input type="text" class="form-control  <?php if($errors->has('map_embed_url')): ?> is-invalid <?php endif; ?>" name="map_embed_url" placeholder="<?php echo e(__('adminMessage.enter_map_embed_url')); ?>" value="<?php if($settingDetails->map_embed_url): ?><?php echo e($settingDetails->map_embed_url); ?><?php endif; ?>">
                                                    <?php if($errors->has('map_embed_url')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('map_embed_url')); ?></div>
                                                    <?php endif; ?>
												</div>


                                                <div class="form-group">
                                                <div class="row">
								                    <div class="col-md-6">
													<label><?php echo e(__('adminMessage.address_en')); ?></label>
													<textarea class="form-control  <?php if($errors->has('address_en')): ?> is-invalid <?php endif; ?>" rows="3" name="address_en" placeholder="<?php echo e(__('adminMessage.enter_address_en')); ?>"><?php if($settingDetails->address_en): ?><?php echo $settingDetails->address_en; ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('address_en')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('address_en')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-6">
													<label><?php echo e(__('adminMessage.address_ar')); ?></label>
													<textarea dir="rtl" class="form-control  <?php if($errors->has('address_ar')): ?> is-invalid <?php endif; ?>" rows="3" name="address_ar" placeholder="<?php echo e(__('adminMessage.enter_address_ar')); ?>"><?php if($settingDetails->address_ar): ?><?php echo $settingDetails->address_ar; ?><?php endif; ?></textarea>
                                                    <?php if($errors->has('address_ar')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('address_ar')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                    </div>
												</div>

                                                <div class="form-group">
                                                <div class="row">
								                    <div class="col-md-6">
													<label><?php echo e(__('adminMessage.email')); ?></label>
													<input type="text" class="form-control  <?php if($errors->has('email')): ?> is-invalid <?php endif; ?>" name="email" placeholder="<?php echo e(__('adminMessage.enter_email')); ?>" value="<?php if($settingDetails->email): ?><?php echo e($settingDetails->email); ?><?php endif; ?>">
                                                    <?php if($errors->has('email')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-6">
													<label><?php echo e(__('adminMessage.mobile')); ?></label>
													<input type="text" class="form-control  <?php if($errors->has('mobile')): ?> is-invalid <?php endif; ?>" name="mobile" placeholder="<?php echo e(__('adminMessage.enter_mobile')); ?>" value="<?php if($settingDetails->mobile): ?><?php echo e($settingDetails->mobile); ?><?php endif; ?>">
                                                    <?php if($errors->has('mobile')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('mobile')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                    </div>
												</div>
                                                <div class="form-group">
                                                <div class="row">
								                    <div class="col-md-12">
													<label><?php echo e(__('adminMessage.phone')); ?></label>
													<input type="text" class="form-control  <?php if($errors->has('phone')): ?> is-invalid <?php endif; ?>" name="phone" placeholder="<?php echo e(__('adminMessage.enter_phone')); ?>" value="<?php if($settingDetails->phone): ?><?php echo e($settingDetails->phone); ?><?php endif; ?>">
                                                    <?php if($errors->has('phone')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('phone')); ?></div>
                                                    <?php endif; ?>
                                                    </div>

                                                    </div>
												</div>
                                                <div class="form-group">
                                                <div class="row">

                                                    <div class="col-md-6">
													<label><?php echo e(__('adminMessage.office_hours_en')); ?></label>
													<input type="text" class="form-control  <?php if($errors->has('office_hours_en')): ?> is-invalid <?php endif; ?>" name="office_hours_en" placeholder="<?php echo e(__('adminMessage.enter_office_hours_en')); ?>" value="<?php if($settingDetails->office_hours_en): ?><?php echo e($settingDetails->office_hours_en); ?><?php endif; ?>">
                                                    <?php if($errors->has('office_hours_en')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('office_hours_en')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-6">
													<label><?php echo e(__('adminMessage.office_hours_ar')); ?></label>
													<input dir="rtl" type="text" class="form-control  <?php if($errors->has('office_hours_ar')): ?> is-invalid <?php endif; ?>" name="office_hours_ar" placeholder="<?php echo e(__('adminMessage.enter_office_hours_ar')); ?>" value="<?php if($settingDetails->office_hours_ar): ?><?php echo e($settingDetails->office_hours_ar); ?><?php endif; ?>">
                                                    <?php if($errors->has('office_hours_ar')): ?>
                                                    <div class="invalid-feedback"><?php echo e($errors->first('office_hours_ar')); ?></div>
                                                    <?php endif; ?>
                                                    </div>
                                                    </div>
												</div>

                                                <?php if(count($sociallinks)): ?>
                                                <input type="hidden" name="socialsfields" value="<?php echo e(implode(',',$sociallinks)); ?>">
                                                <div class="form-group "><h5><?php echo e(__('adminMessage.sociallinks')); ?></h5></div>
                                                <?php $__currentLoopData = $sociallinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sociallinks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:100px;"><?php echo e(__('adminMessage.'.$sociallinks)); ?></span></div>

                                                <input placeholder="<?php echo e(__('adminMessage.'.$sociallinks.'_place')); ?>" type="text" class="form-control" name="social_<?php echo e($sociallinks); ?>" value="<?php if($settingDetails->social_facebook && $sociallinks=='facebook'): ?><?php echo e($settingDetails->social_facebook); ?><?php elseif($settingDetails->social_twitter && $sociallinks=='twitter'): ?><?php echo e($settingDetails->social_twitter); ?><?php elseif($settingDetails->social_instagram && $sociallinks=='instagram'): ?><?php echo e($settingDetails->social_instagram); ?><?php elseif($settingDetails->social_linkedin && $sociallinks=='linkedin'): ?><?php echo e($settingDetails->social_linkedin); ?><?php elseif($settingDetails->social_youtube && $sociallinks=='youtube'): ?><?php echo e($settingDetails->social_youtube); ?><?php elseif($settingDetails->social_whatsapp && $sociallinks=='whatsapp'): ?><?php echo e($settingDetails->social_whatsapp); ?><?php endif; ?>">

												</div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <div class="form-group "><h5><?php echo e(__('adminMessage.googleanalytics')); ?></h5></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <label><?php echo e(__('adminMessage.googleanalyticseokbed')); ?></label>
												<textarea rows="15" class="form-control  <?php if($errors->has('address_en')): ?> is-invalid <?php endif; ?>" rows="3" name="google_analytics" placeholder="<?php echo e(__('adminMessage.enter_google_analytics')); ?>"><?php if($settingDetails->google_analytics): ?><?php echo $settingDetails->google_analytics; ?><?php endif; ?></textarea>
                                                <?php if($errors->has('google_analytics')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('google_analytics')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
												</div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><?php echo e(__('adminMessage.google_profileid')); ?></span></div>
												<input type="text" class="form-control <?php if($errors->has('google_profileid')): ?> is-invalid <?php endif; ?>" name="google_profileid" value="<?php if($settingDetails->google_profileid): ?><?php echo e($settingDetails->google_profileid); ?><?php endif; ?>" placeholder="Enter Google Analytics Profile ID">
                                                <?php if($errors->has('google_profileid')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('google_profileid')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><?php echo e(__('adminMessage.google_analyticsemail')); ?></span></div>
												<input type="text" class="form-control <?php if($errors->has('google_profileid')): ?> is-invalid <?php endif; ?>" name="google_analyticsemail" value="<?php if($settingDetails->google_analyticsemail): ?><?php echo e($settingDetails->google_analyticsemail); ?><?php endif; ?>" placeholder="Enter Google Analytics Email">
                                                <?php if($errors->has('google_analyticsemail')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('google_analyticsemail')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><?php echo e(__('adminMessage.keysp12')); ?></span></div>

												<div class="custom-file <?php if($errors->has('gakeys')): ?> is-invalid <?php endif; ?>">
												<input type="file" class="custom-file-input <?php if($errors->has('header_image')): ?> is-invalid <?php endif; ?>"  id="gakeys" name="gakeys">
                                                <label class="custom-file-label" for="gakeys"><?php echo e(__('adminMessage.chooseFile')); ?></label>
                                                </div>
                                                <?php if($errors->has('gakeys')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('gakeys')); ?></div>
                                                <?php endif; ?>
												</div>
                                                <?php if($settingDetails->gakeys): ?><?php echo e($settingDetails->gakeys); ?><?php endif; ?>
                                                </div>




                                                <div class="form-group "><h5><?php echo e(__('adminMessage.appversion')); ?></h5></div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.IOS')); ?>(OLD)</span></div>
												<input type="text" class="form-control <?php if($errors->has('ios_old_version')): ?> is-invalid <?php endif; ?>" name="ios_old_version" value="<?php if($settingDetails->ios_old_version): ?><?php echo e($settingDetails->ios_old_version); ?><?php endif; ?>" placeholder="Enter Previous Version">
                                                <?php if($errors->has('ios_old_version')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('ios_old_version')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>
                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.IOS')); ?>(NEW)</span></div>
												<input type="text" class="form-control <?php if($errors->has('ios_new_version')): ?> is-invalid <?php endif; ?>" name="ios_new_version" value="<?php if($settingDetails->ios_new_version): ?><?php echo e($settingDetails->ios_new_version); ?><?php endif; ?>" placeholder="Enter Current Version">
                                                <?php if($errors->has('ios_new_version')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('ios_new_version')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.Android')); ?>(OLD)</span></div>
												<input type="text" class="form-control <?php if($errors->has('android_old_version')): ?> is-invalid <?php endif; ?>" name="android_old_version" value="<?php if($settingDetails->android_old_version): ?><?php echo e($settingDetails->android_old_version); ?><?php endif; ?>" placeholder="Enter Previous Version">
                                                <?php if($errors->has('android_old_version')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('android_old_version')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>
                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.Android')); ?>(NEW)</span></div>
												<input type="text" class="form-control <?php if($errors->has('android_new_version')): ?> is-invalid <?php endif; ?>" name="android_new_version" value="<?php if($settingDetails->android_new_version): ?><?php echo e($settingDetails->android_new_version); ?><?php endif; ?>" placeholder="Enter Current Version">
                                                <?php if($errors->has('android_new_version')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('android_new_version')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:100px;"><?php echo e(__('adminMessage.ios_url')); ?></span></div>
												<input type="text" class="form-control <?php if($errors->has('ios_url')): ?> is-invalid <?php endif; ?>" name="ios_url" value="<?php if($settingDetails->ios_url): ?><?php echo e($settingDetails->ios_url); ?><?php endif; ?>" placeholder="Enter IOS App Url">
                                                <?php if($errors->has('ios_url')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('ios_url')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>
                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:100px;"><?php echo e(__('adminMessage.android_url')); ?></span></div>
												<input type="text" class="form-control <?php if($errors->has('android_url')): ?> is-invalid <?php endif; ?>" name="android_url" value="<?php if($settingDetails->android_url): ?><?php echo e($settingDetails->android_url); ?><?php endif; ?>" placeholder="Enter Android App Url">
                                                <?php if($errors->has('android_url')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('android_url')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group"><h5><?php echo e(__('adminMessage.freedelivery')); ?></h5><small><?php echo e(__('adminMessage.freedelivery_note')); ?></small></div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:100px;height:40px;"><?php echo e(__('adminMessage.amount')); ?></span></div>
												<input type="text" style="width:200px;height:40px;padding:5px;border:1px #ccc solid;" class=" <?php if($errors->has('free_delivery_amount')): ?> is-invalid <?php endif; ?>" name="free_delivery_amount" value="<?php if($settingDetails->free_delivery_amount): ?><?php echo e($settingDetails->free_delivery_amount); ?><?php endif; ?>" placeholder="Enter Amount">
                                                <?php if($errors->has('free_delivery_amount')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('free_delivery_amount')); ?></div>
                                                <?php endif; ?>
                                                <div class="input-group-prepend"><span class="input-group-text" style="width:100px;height:40px;">Active&nbsp;<input <?php if(!empty($settingDetails->is_free_delivery)): ?> checked <?php endif; ?>  type="checkbox" class="form-control" name="is_free_delivery" value="1" style="width:30px;padding:5px;border:0;"></span></div>
												</div>
                                                </div>

                                                 <div class="form-group"><h5><?php echo e(__('adminMessage.instafeed')); ?></h5><small><?php echo e(__('adminMessage.instafeed_note')); ?></small></div>
                                                 <div class="form-group ">

												<input type="text" class="form-control <?php if($errors->has('instagram_token')): ?> is-invalid <?php endif; ?>" name="instagram_token" value="<?php if($settingDetails->instagram_token): ?><?php echo e($settingDetails->instagram_token); ?><?php endif; ?>" placeholder="Enter Instagram Token">
                                                <?php if($errors->has('instagram_token')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('instagram_token')); ?></div>
                                                <?php endif; ?>

                                                </div>
																								<div class="form-group ">

											 <input type="text" class="form-control <?php if($errors->has('instagram_clientId')): ?> is-invalid <?php endif; ?>" name="instagram_clientId" value="<?php if($settingDetails->instagram_clientId): ?><?php echo e($settingDetails->instagram_clientId); ?><?php endif; ?>" placeholder="Enter Instagram Client Id">
																							 <?php if($errors->has('instagram_clientId')): ?>
																							 <div class="invalid-feedback"><?php echo e($errors->first('instagram_clientId')); ?></div>
																							 <?php endif; ?>
											 
																							 </div>
																							 <div class="form-group ">

											<input type="text" class="form-control <?php if($errors->has('instagram_userId')): ?> is-invalid <?php endif; ?>" name="instagram_userId" value="<?php if($settingDetails->instagram_userId): ?><?php echo e($settingDetails->instagram_userId); ?><?php endif; ?>" placeholder="Enter Instagram User id">
																							<?php if($errors->has('instagram_userId')): ?>
																							<div class="invalid-feedback"><?php echo e($errors->first('instagram_userId')); ?></div>
																							<?php endif; ?>

																							</div>
                                                <div class="form-group"><h5><?php echo e(__('adminMessage.item_list_box')); ?></h5><small><?php echo e(__('adminMessage.item_list_box_note')); ?></small></div>
                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:138px;height:40px;">Columns(3)&nbsp;<input <?php if(!empty($settingDetails->column_list) && $settingDetails->column_list==1): ?> checked <?php endif; ?>  type="radio" class="form-control" name="column_list" value="1" style="width:30px;padding:5px;border:0;"></span></div>
                                                <div class="input-group-prepend"><span class="input-group-text" style="width:138px;height:40px;">Columns(4)&nbsp;<input <?php if(!empty($settingDetails->column_list)  && $settingDetails->column_list==2): ?> checked <?php endif; ?>  type="radio" class="form-control" name="column_list" value="2" style="width:30px;padding:5px;border:0;"></span></div>
                                                <div class="input-group-prepend"><span class="input-group-text" style="width:138px;height:40px;">Columns(6)&nbsp;<input <?php if(!empty($settingDetails->column_list)  && $settingDetails->column_list==3): ?> checked <?php endif; ?>  type="radio" class="form-control" name="column_list" value="3" style="width:30px;padding:5px;border:0;"></span></div>
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
								<div class="col-md-6">

									<!--begin::Portlet-->
									   <div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													<?php echo e(__('adminMessage.basicsettings')); ?>

												</h3>
											</div>
										</div>

										<!--begin::Form-->

											<div class="kt-portlet__body">

                                                <div class="form-group "><h5><?php echo e(__('adminMessage.productsettings')); ?></h5></div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.prefix')); ?>(XYZ)</span></div>
												<input type="text" class="form-control <?php if($errors->has('prefix')): ?> is-invalid <?php endif; ?>" name="prefix" value="<?php if($settingDetails->prefix): ?><?php echo e($settingDetails->prefix); ?><?php endif; ?>" placeholder="XYZ">
                                                <?php if($errors->has('prefix')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('prefix')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.item_code_digits')); ?></span></div>
												<input type="text" class="form-control <?php if($errors->has('item_code_digits')): ?> is-invalid <?php endif; ?>" name="item_code_digits" value="<?php if($settingDetails->item_code_digits): ?><?php echo e($settingDetails->item_code_digits); ?><?php endif; ?>">
                                                <?php if($errors->has('item_code_digits')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('item_code_digits')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.min_order_amount')); ?></span></div>
												<input type="text" class="form-control <?php if($errors->has('min_order_amount')): ?> is-invalid <?php endif; ?>" name="min_order_amount" value="<?php if($settingDetails->min_order_amount): ?><?php echo e($settingDetails->min_order_amount); ?><?php endif; ?>">
                                                <?php if($errors->has('min_order_amount')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('min_order_amount')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.flat_rate')); ?></span></div>
												<input type="text" class="form-control <?php if($errors->has('flat_rate')): ?> is-invalid <?php endif; ?>" name="flat_rate" value="<?php if($settingDetails->flat_rate): ?><?php echo e($settingDetails->flat_rate); ?><?php endif; ?>">
                                                <?php if($errors->has('flat_rate')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('flat_rate')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.base_currency')); ?></span></div>

                                                <select name="base_currency" class="form-control <?php if($errors->has('base_currency')): ?> is-invalid <?php endif; ?>">
                                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($currency); ?>" <?php echo e($settingDetails->base_currency==$currency?'selected':''); ?>><?php echo e($currency); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php if($errors->has('default_sort')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('default_sort')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

												<div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.item_per_page_front')); ?></span></div>
												<input type="number" class="form-control <?php if($errors->has('item_per_page_front')): ?> is-invalid <?php endif; ?>" name="item_per_page_front" value="<?php if($settingDetails->item_per_page_front): ?><?php echo e($settingDetails->item_per_page_front); ?><?php endif; ?>">
                                                <?php if($errors->has('item_per_page_front')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('item_per_page_front')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.item_per_page_back')); ?></span></div>
												<input type="number" class="form-control <?php if($errors->has('item_per_page_back')): ?> is-invalid <?php endif; ?>" name="item_per_page_back" value="<?php if($settingDetails->item_per_page_back): ?><?php echo e($settingDetails->item_per_page_back); ?><?php endif; ?>">
                                                <?php if($errors->has('item_per_page_back')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('item_per_page_back')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:300px;"><?php echo e(__('adminMessage.default_sort')); ?></span></div>

                                                <select name="default_sort" class="form-control <?php if($errors->has('default_sort')): ?> is-invalid <?php endif; ?>">
                                                <?php $__currentLoopData = $sortings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sorting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sorting); ?>" <?php echo e($settingDetails->default_sort==$sorting?'selected':''); ?>><?php echo e($sorting); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>

                                                <?php if($errors->has('default_sort')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('default_sort')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>


                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:200px;"><?php echo e(__('adminMessage.image_thumb_wh')); ?></span></div>
												<input type="number" class="form-control <?php if($errors->has('image_thumb_w')): ?> is-invalid <?php endif; ?>" name="image_thumb_w" value="<?php if($settingDetails->image_thumb_w): ?><?php echo e($settingDetails->image_thumb_w); ?><?php endif; ?>">
                                                <input type="number" class="form-control <?php if($errors->has('image_thumb_h')): ?> is-invalid <?php endif; ?>" name="image_thumb_h" value="<?php if($settingDetails->image_thumb_h): ?><?php echo e($settingDetails->image_thumb_h); ?><?php endif; ?>">

                                                <?php if($errors->has('image_thumb_w')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('image_thumb_w')); ?></div>
                                                <?php endif; ?>
                                                <?php if($errors->has('image_thumb_h')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('image_thumb_h')); ?></div>
                                                <?php endif; ?>

												</div>
                                                </div>

                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:200px;"><?php echo e(__('adminMessage.image_big_wh')); ?></span></div>
												<input type="number" class="form-control <?php if($errors->has('image_big_w')): ?> is-invalid <?php endif; ?>" name="image_big_w" value="<?php if($settingDetails->image_big_w): ?><?php echo e($settingDetails->image_big_w); ?><?php endif; ?>">
                                                <input type="number" class="form-control <?php if($errors->has('image_big_h')): ?> is-invalid <?php endif; ?>" name="image_big_h" value="<?php if($settingDetails->image_big_h): ?><?php echo e($settingDetails->image_big_h); ?><?php endif; ?>">

                                                <?php if($errors->has('image_big_w')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('image_big_w')); ?></div>
                                                <?php endif; ?>
                                                <?php if($errors->has('image_big_h')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('image_big_h')); ?></div>
                                                <?php endif; ?>
												</div>
                                                </div>




                                                <?php if(count($paymentslink)): ?>
                                                <?php
                                                $payments = explode(",",$settingDetails->payments);
                                                ?>
                                                <div class="form-group "><h5><?php echo e(__('adminMessage.availablepayments')); ?></h5></div>
                                                <?php $__currentLoopData = $paymentslink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentlink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group ">
												<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text" style="width:370px;"><?php echo e(__('adminMessage.'.$paymentlink)); ?></span></div>

                                                <input <?php if(in_array($paymentlink,$payments)): ?> checked <?php endif; ?>  type="checkbox" class="form-control" name="payments[]" value="<?php echo e($paymentlink); ?>">

												</div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                               <div class="form-group "><h5><?php echo e(__('adminMessage.note_for_new_customer')); ?></h5></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
												<textarea class="form-control  <?php if($errors->has('note_for_new_customer_en')): ?> is-invalid <?php endif; ?>" rows="3" name="note_for_new_customer_en" placeholder="<?php echo e(__('adminMessage.enter_note_for_new_customer_en')); ?>"><?php if($settingDetails->note_for_new_customer_en): ?><?php echo $settingDetails->note_for_new_customer_en; ?><?php endif; ?></textarea>
                                                <?php if($errors->has('note_for_new_customer_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('note_for_new_customer_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(Ar)</label>
												<textarea dir="rtl" class="form-control  <?php if($errors->has('note_for_new_customer_ar')): ?> is-invalid <?php endif; ?>" rows="3" name="note_for_new_customer_ar" placeholder="<?php echo e(__('adminMessage.enter_note_for_new_customer_ar')); ?>"><?php if($settingDetails->note_for_new_customer_ar): ?><?php echo $settingDetails->note_for_new_customer_ar; ?><?php endif; ?></textarea>
                                                <?php if($errors->has('note_for_new_customer_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('note_for_new_customer_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>

                                                <div class="form-group "><h5><?php echo e(__('adminMessage.note_for_newsletter')); ?></h5></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
												<textarea class="form-control  <?php if($errors->has('newsletter_note_en')): ?> is-invalid <?php endif; ?>" rows="3" name="newsletter_note_en" placeholder="<?php echo e(__('adminMessage.enter_newsletter_note_en')); ?>"><?php if($settingDetails->newsletter_note_en): ?><?php echo $settingDetails->newsletter_note_en; ?><?php endif; ?></textarea>
                                                <?php if($errors->has('newsletter_note_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('newsletter_note_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
												<textarea dir="rtl" class="form-control  <?php if($errors->has('newsletter_note_ar')): ?> is-invalid <?php endif; ?>" rows="3" name="newsletter_note_ar" placeholder="<?php echo e(__('adminMessage.enter_newsletter_note_ar')); ?>"><?php if($settingDetails->newsletter_note_ar): ?><?php echo $settingDetails->newsletter_note_ar; ?><?php endif; ?></textarea>
                                                <?php if($errors->has('newsletter_note_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('newsletter_note_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>

                                                <div class="form-group "><h5><?php echo e(__('adminMessage.home_note_1')); ?></h5></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
                                                <input name="home_note1_title_en" type="text" class="form-control  <?php if($errors->has('home_note1_title_en')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.title_en')); ?>"  value="<?php if($settingDetails->home_note1_title_en): ?><?php echo $settingDetails->home_note1_title_en; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note1_title_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note1_title_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(Ar)</label>
                                                <input dir="rtl" name="home_note1_title_ar" type="text" class="form-control  <?php if($errors->has('home_note1_title_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.title_ar')); ?>"  value="<?php if($settingDetails->home_note1_title_ar): ?><?php echo $settingDetails->home_note1_title_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note1_title_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note1_title_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
                                                <input name="home_note1_details_en" type="text" class="form-control  <?php if($errors->has('home_note1_details_en')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.details_en')); ?>"  value="<?php if($settingDetails->home_note1_details_en): ?><?php echo $settingDetails->home_note1_details_en; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note1_details_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note1_details_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(Ar)</label>
                                                <input dir="rtl" name="home_note1_details_ar" type="text" class="form-control  <?php if($errors->has('home_note1_details_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.details_ar')); ?>"  value="<?php if($settingDetails->home_note1_details_ar): ?><?php echo $settingDetails->home_note1_details_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note1_details_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note1_details_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>

                                                <div class="form-group "><h5><?php echo e(__('adminMessage.home_note_2')); ?></h5></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
                                                <input name="home_note2_title_en" type="text" class="form-control  <?php if($errors->has('home_note2_title_en')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.title_en')); ?>"  value="<?php if($settingDetails->home_note2_title_en): ?><?php echo $settingDetails->home_note2_title_en; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note2_title_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note2_title_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(Ar)</label>
                                                <input dir="rtl" name="home_note2_title_ar" type="text" class="form-control  <?php if($errors->has('home_note2_title_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.title_ar')); ?>"  value="<?php if($settingDetails->home_note2_title_ar): ?><?php echo $settingDetails->home_note2_title_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note2_title_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note2_title_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
                                                <input name="home_note2_details_en" type="text" class="form-control  <?php if($errors->has('home_note2_details_en')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.details_en')); ?>"  value="<?php if($settingDetails->home_note2_details_en): ?><?php echo $settingDetails->home_note2_details_en; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note2_details_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note2_details_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(Ar)</label>
                                                <input dir="rtl" name="home_note2_details_ar" type="text" class="form-control  <?php if($errors->has('home_note2_details_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.details_ar')); ?>"  value="<?php if($settingDetails->home_note2_details_ar): ?><?php echo $settingDetails->home_note2_details_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note2_details_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note2_details_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>

                                                <div class="form-group "><h5><?php echo e(__('adminMessage.home_note_3')); ?></h5></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
                                                <input name="home_note3_title_en" type="text" class="form-control  <?php if($errors->has('home_note3_title_en')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.title_en')); ?>"  value="<?php if($settingDetails->home_note3_title_en): ?><?php echo $settingDetails->home_note3_title_en; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note3_title_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note3_title_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(Ar)</label>
                                                <input dir="rtl" name="home_note3_title_ar" type="text" class="form-control  <?php if($errors->has('home_note3_title_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.title_ar')); ?>"  value="<?php if($settingDetails->home_note3_title_ar): ?><?php echo $settingDetails->home_note3_title_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note3_title_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note3_title_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
                                                <input name="home_note3_details_en" type="text" class="form-control  <?php if($errors->has('home_note3_details_en')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.details_en')); ?>"  value="<?php if($settingDetails->home_note3_details_en): ?><?php echo $settingDetails->home_note3_details_en; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note3_details_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note3_details_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(Ar)</label>
                                                <input dir="rtl" name="home_note3_details_ar" type="text" class="form-control  <?php if($errors->has('home_note3_details_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.details_ar')); ?>"  value="<?php if($settingDetails->home_note3_details_ar): ?><?php echo $settingDetails->home_note3_details_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note3_details_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note3_details_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>
                                                <div class="form-group "><h5><?php echo e(__('adminMessage.home_note_4')); ?></h5></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
                                                <input name="home_note4_title_en" type="text" class="form-control  <?php if($errors->has('home_note4_title_en')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.title_en')); ?>"  value="<?php if($settingDetails->home_note4_title_en): ?><?php echo $settingDetails->home_note4_title_en; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note4_title_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note4_title_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(Ar)</label>
                                                <input dir="rtl" name="home_note4_title_ar" type="text" class="form-control  <?php if($errors->has('home_note4_title_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.title_ar')); ?>"  value="<?php if($settingDetails->home_note4_title_ar): ?><?php echo $settingDetails->home_note4_title_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note4_title_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note4_title_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>

                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(En)</label>
                                                <input name="home_note4_details_en" type="text" class="form-control  <?php if($errors->has('home_note4_details_en')): ?> is-invalid <?php endif; ?>"  placeholder="<?php echo e(__('adminMessage.details_en')); ?>" value="<?php if($settingDetails->home_note4_details_en): ?><?php echo $settingDetails->home_note4_details_en; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note4_details_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note4_details_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(trans('adminMessage.details')); ?>(Ar)</label>
                                                <input dir="rtl" name="home_note4_details_ar" type="text" class="form-control  <?php if($errors->has('home_note4_details_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.details_ar')); ?>"  value="<?php if($settingDetails->home_note4_details_ar): ?><?php echo $settingDetails->home_note4_details_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('home_note4_details_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('home_note4_details_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>

                                                <!--top header note -->
                                                <div class="form-group"><h4><?php echo e(__('adminMessage.top_header_note')); ?></h4></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <input name="top_header_note_en" type="text" class="form-control  <?php if($errors->has('top_header_note_en')): ?> is-invalid <?php endif; ?>"  placeholder="<?php echo e(__('adminMessage.details_en')); ?>" value="<?php if($settingDetails->top_header_note_en): ?><?php echo $settingDetails->top_header_note_en; ?><?php endif; ?>">
                                                <?php if($errors->has('top_header_note_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('top_header_note_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <input dir="rtl" name="top_header_note_ar" type="text" class="form-control  <?php if($errors->has('top_header_note_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.details_ar')); ?>"  value="<?php if($settingDetails->top_header_note_ar): ?><?php echo $settingDetails->top_header_note_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('top_header_note_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('top_header_note_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>
                                                
                                                <!--top header note -->
                                                <div class="form-group"><h4><?php echo e(__('adminMessage.order_note')); ?></h4></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <textarea name="order_note_en" type="text" class="form-control  <?php if($errors->has('order_note_en')): ?> is-invalid <?php endif; ?>"  placeholder="<?php echo e(__('adminMessage.details_en')); ?>" ><?php if($settingDetails->order_note_en): ?><?php echo $settingDetails->order_note_en; ?><?php endif; ?></textarea>
                                                <?php if($errors->has('order_note_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('order_note_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <textarea dir="rtl" name="order_note_ar" type="text" class="form-control  <?php if($errors->has('order_note_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.details_ar')); ?>"><?php if($settingDetails->order_note_ar): ?><?php echo $settingDetails->order_note_ar; ?><?php endif; ?></textarea>
                                                <?php if($errors->has('order_note_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('order_note_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>
                                                <div class="form-group"><h4><?php echo e(__('adminMessage.email_template')); ?></h4></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-6">
                                                <span class="kt-switch"><label>
												<input value="1" <?php echo e(!empty($settingDetails->invoice_template) && $settingDetails->invoice_template==1?'checked':''); ?> type="radio"  id="invoice_template1" name="invoice_template"><span></span></label></span>
                                                <br>
                                                <a href="<?php echo e(url('uploads/screen1.pmg')); ?>" target="_blank"><img width="200" src="<?php echo e(url('uploads/screen1.png')); ?>"></a>
                                                </div>
                                                <div class="col-md-6">
                                                <span class="kt-switch"><label>
												<input value="2" <?php echo e(!empty($settingDetails->invoice_template) && $settingDetails->invoice_template==2?'checked':''); ?> type="radio"  id="invoice_template2" name="invoice_template"><span></span></label></span>
                                                <br>
                                                <a href="<?php echo e(url('uploads/screen2.pmg')); ?>" target="_blank"><img width="200"  src="<?php echo e(url('uploads/screen2.png')); ?>"></a>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="form-group "><h5><?php echo e(__('adminMessage.note_for_quantity_updating')); ?></h5></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-6">
												<textarea class="form-control  <?php if($errors->has('quantit_update_notification_en')): ?> is-invalid <?php endif; ?>" rows="3" name="quantit_update_notification_en" placeholder="<?php echo e(__('adminMessage.enter_quantit_update_notification_en')); ?>"><?php if($settingDetails->quantit_update_notification_en): ?><?php echo $settingDetails->quantit_update_notification_en; ?><?php endif; ?></textarea>
                                                <?php if($errors->has('quantit_update_notification_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('quantit_update_notification_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                <div class="col-md-6">
												<textarea dir="rtl" class="form-control  <?php if($errors->has('quantit_update_notification_ar')): ?> is-invalid <?php endif; ?>" rows="3" name="quantit_update_notification_ar" placeholder="<?php echo e(__('adminMessage.enter_quantit_update_notification_ar')); ?>"><?php if($settingDetails->quantit_update_notification_ar): ?><?php echo $settingDetails->quantit_update_notification_ar; ?><?php endif; ?></textarea>
                                                <?php if($errors->has('quantit_update_notification_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('quantit_update_notification_ar')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
												</div>

                                                 <!--top header note -->
                                                <div class="form-group"><h4><?php echo e(__('adminMessage.fromemailandname')); ?></h4></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <input name="from_email" type="text" class="form-control  <?php if($errors->has('from_email')): ?> is-invalid <?php endif; ?>"  placeholder="<?php echo e(__('adminMessage.fromemail')); ?>" value="<?php if($settingDetails->from_email): ?><?php echo $settingDetails->from_email; ?><?php endif; ?>">
                                                <?php if($errors->has('from_email')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('from_email')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <input name="from_name" type="text" class="form-control  <?php if($errors->has('from_name')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.fromname')); ?>"  value="<?php if($settingDetails->from_name): ?><?php echo $settingDetails->from_name; ?><?php endif; ?>">
                                                <?php if($errors->has('from_name')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('from_name')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>

                                                <div class="form-group"><h4><?php echo e(__('adminMessage.pushnotificationsetting')); ?></h4></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.web_server_key')); ?></label>
                                                <input name="web_server_key" type="text" class="form-control  <?php if($errors->has('web_server_key')): ?> is-invalid <?php endif; ?>"   value="<?php if($settingDetails->web_server_key): ?><?php echo $settingDetails->web_server_key; ?><?php endif; ?>">
                                                <?php if($errors->has('web_server_key')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('web_server_key')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label><?php echo e(__('adminMessage.pushy_api_token')); ?></label>
                                                <input name="pushy_api_token" type="text" class="form-control  <?php if($errors->has('pushy_api_token')): ?> is-invalid <?php endif; ?>" value="<?php if($settingDetails->pushy_api_token): ?><?php echo $settingDetails->pushy_api_token; ?><?php endif; ?>">
                                                <?php if($errors->has('pushy_api_token')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('pushy_api_token')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                </div>
												</div>


                                                 <div class="form-group"><h4><?php echo e(__('adminMessage.websitecopyrightstext')); ?></h4></div>
                                                <div class="form-group">
                                                <div class="row">
								                <div class="col-md-12">
                                                <div class="form-group">
                                                <input name="copyrights_en" type="text" class="form-control  <?php if($errors->has('copyrights_en')): ?> is-invalid <?php endif; ?>"  placeholder="<?php echo e(__('adminMessage.copyrights_enter_en')); ?>" value="<?php if($settingDetails->copyrights_en): ?><?php echo $settingDetails->copyrights_en; ?><?php endif; ?>">
                                                <?php if($errors->has('copyrights_en')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('copyrights_en')); ?></div>
                                                <?php endif; ?>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <input dir="rtl" name="copyrights_ar" type="text" class="form-control  <?php if($errors->has('copyrights_ar')): ?> is-invalid <?php endif; ?>" placeholder="<?php echo e(__('adminMessage.copyrights_enter_ar')); ?>"  value="<?php if($settingDetails->copyrights_ar): ?><?php echo $settingDetails->copyrights_ar; ?><?php endif; ?>">
                                                <?php if($errors->has('copyrights_ar')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('copyrights_ar')); ?></div>
                                                <?php endif; ?>
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
	</body>

	<!-- end::Body -->
</html>
<?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/gwc/setting/adminSettingsForm.blade.php ENDPATH**/ ?>