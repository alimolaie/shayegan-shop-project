<?php
use Illuminate\Support\Facades\Cookie;

$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.product')); ?></title>
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
                $Categories = App\Http\Controllers\AdminProductController::getCategories();
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.productlisting')); ?></h3>
									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
									<div class="kt-subheader__breadcrumbs">
 <?php if(!empty($sectionsInfo->title_en)): ?> for <a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e($sectionsInfo->title_en); ?>'</a> <?php endif; ?>
 <?php if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==1): ?>><a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(trans('adminMessage.published')); ?></a><?php endif; ?>
 <?php if(!empty(Cookie::get('item_status')) && Cookie::get('item_status')==2): ?>><a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(trans('adminMessage.publishedpreorder')); ?></a><?php endif; ?>
 <?php if(Cookie::get('item_status')==-1): ?> > <a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(trans('adminMessage.notpublished')); ?></a><?php endif; ?>
									</div>
								</div>
								<div class="kt-subheader__toolbar">
                                 <div class="btn-group">
                                    <select name="manufacturer_id" id="manufacturer_id" class="form-control" >  
                                                <option value="0">All Manufacturers</option>  						
                                                <?php if(!empty($manufacturerLists) && count($manufacturerLists)>0): ?>
                                                <?php $__currentLoopData = $manufacturerLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($categoryList->id); ?>" <?php if($categoryList->id==Request()->manufacturer_id): ?> selected <?php endif; ?>><?php echo e($categoryList->title_en); ?></option>  		
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>   
                                    </select> 
                                    </div>
                                    <div class="btn-group">
                                    <select name="brand_id" id="brand_id" class="form-control" >  
                                                <option value="0">All Brands</option>  						
                                                <?php if(!empty($brandLists) && count($brandLists)>0): ?>
                                                <?php $__currentLoopData = $brandLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brandList->id); ?>" <?php if($brandList->id==Request()->brand_id): ?> selected <?php endif; ?>><?php echo e($brandList->title_en); ?></option>  		
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>   
                                    </select> 
                                    </div>
									<form class="kt-margin-l-20" id="kt_subheader_search_form" action="<?php echo e(url('gwc/product')); ?>">
											<div class="kt-input-icon kt-input-icon--right kt-subheader__search">
												<input value="<?php if(Request()->q): ?><?php echo e(Request()->q); ?><?php endif; ?>" type="text" class="form-control" placeholder="<?php echo e(__('adminMessage.searchhere')); ?>" id="searchCat" name="q">
                                                <?php if(!empty(Request()->category)): ?> 
                                                <input type="hidden" name="category" value="<?php echo e(Request()->category); ?>">
                                                <?php endif; ?>
                                                <?php if(!empty(Request()->tag)): ?> 
                                                <input type="hidden" name="tag" value="<?php echo e(Request()->tag); ?>">
                                                <?php endif; ?>
												<button style="border:0;" class="kt-input-icon__icon kt-input-icon__icon--right">
													<span>
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
															</g>
														</svg>

														<!--<i class="flaticon2-search-1"></i>-->
													</span>
												</button>
											</div>
										</form>
									<div class="btn-group">
                                        <?php if(auth()->guard('admin')->user()->can('product-create')): ?>
										<a href="<?php echo e(url('gwc/product/create')); ?>" class="btn btn-brand btn-info btn-bold" title="<?php echo e(__('adminMessage.createnew')); ?>"><i class="la la-plus"></i></a>
                                        <a href="<?php echo e(url('gwc/product/addQuick')); ?>" class="btn btn-brand btn-success btn-bold" title="<?php echo e(__('adminMessage.createnew')); ?>(Quick)"><i class="la la-plus"></i></a>
                                        <?php endif; ?>
										<button type="button" class="btn btn-brand btn-info btn-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<ul class="kt-nav">
                                                
                                                
                                                <?php if(!empty($sectionsLists) && count($sectionsLists)>0): ?>
                                                <li class="kt-nav__item"><hr></li>
                                                <?php $__currentLoopData = $sectionsLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectionsList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="kt-nav__item">
													<a href="javascript:;" class="kt-nav__link filterBySections" id="<?php echo e($sectionsList->id); ?>">
														<i class="kt-nav__link-icon flaticon-search"></i>
														<span class="kt-nav__link-text"><?php echo e($sectionsList->title_en); ?></span>
													</a>
												</li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <li class="kt-nav__item"><hr></li>
                                                <li class="kt-nav__item">
												<a href="javascript:;" class="kt-nav__link filterByStatus"  id="1">
												<i class="kt-nav__link-icon flaticon-alert"></i>
												<span class="kt-nav__link-text"><?php echo e(__('adminMessage.published')); ?></span>
												</a>
                                                </li>
                                                <li class="kt-nav__item">
												<a href="javascript:;" class="kt-nav__link filterByStatus"  id="2">
												<i class="kt-nav__link-icon flaticon-alert"></i>
												<span class="kt-nav__link-text"><?php echo e(__('adminMessage.publishedpreorder')); ?></span>
												</a>
                                                </li>
                                                 <li class="kt-nav__item">
											     <a href="javascript:;" class="kt-nav__link filterByStatus" id="-1">
												 <i class="kt-nav__link-icon flaticon-alert-off"></i>
												 <span class="kt-nav__link-text"><?php echo e(__('adminMessage.notpublished')); ?></span>
												 </a>
												 </li>
                                                 <li class="kt-nav__item"><hr></li>
                                                 <li class="kt-nav__item">
											     <a href="javascript:;" class="kt-nav__link filterByOutofStock" id="1">
												 <i class="kt-nav__link-icon flaticon-search"></i>
												 <span class="kt-nav__link-text"><?php echo e(__('adminMessage.outofstock')); ?></span>
												 </a>
												 </li>
                                                 <li class="kt-nav__item"><hr></li>
                                                 <li class="kt-nav__item">
											     <a href="javascript:;" class="kt-nav__link btn-warning resetProductFilters" id="1">
												 <i class="kt-nav__link-icon flaticon-delete"></i>
												 <span class="kt-nav__link-text"><?php echo e(__('adminMessage.resetfilyeration')); ?></span>
												 </a>
												 </li>
                                                 <li class="kt-nav__item">
													<a href="<?php echo e(url('gwc/product/createqrcode')); ?>" class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon-file-2"></i>
														<span class="kt-nav__link-text"><?php echo e(__('adminMessage.generateqrcode')); ?></span>
													</a>
												</li>
                                                 
                                                 
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
							<div class="kt-portlet kt-portlet--mobile">
								
                                <?php if(auth()->guard('admin')->user()->can('product-list')): ?>
									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
										<thead>
											<tr>
												<th width="10">#</th>
                                                <th width="50"><?php echo e(__('adminMessage.image')); ?></th>
                                                <th width="350"><?php echo e(__('adminMessage.details')); ?></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
                                        <?php if(count($productLists)): ?>
                                        <?php $p=1; $quantity=0; ?>
                                        <?php $__currentLoopData = $productLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$productList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $retail_price    = App\Http\Controllers\AdminProductController::getPriceFormat($productList->retail_price);
                                        $old_price       = App\Http\Controllers\AdminProductController::getPriceFormat($productList->old_price);
										$quantity        = App\Http\Controllers\AdminProductController::getQuantity($productList->id);
                                        ?>
                                        
											<tr class="search-body">
												<td align="center">
                                                <?php echo e($productLists->firstItem() + $key); ?>

                                                 <br><br>
                                                 <span style="overflow: visible; position: relative; width: 80px;">
                                                 <div class="dropdown">
                                                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="flaticon-more-1"></i></a>
                                                 <div class="dropdown-menu dropdown-menu-left">
                                                 <ul class="kt-nav">
                                                 <?php if(auth()->guard('admin')->user()->can('product-duplicate')): ?>
                                                 <li class="kt-nav__item"><a  href="javascript:;" data-toggle="modal" data-target="#kt_modal_duplicate_<?php echo e($productList->id); ?>"   class="kt-nav__link"><i class="kt-nav__link-icon flaticon-background"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.duplicate')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 
                                                 <?php if(auth()->guard('admin')->user()->can('product-edit')): ?>
                                                 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/product/'.$productList->id.'/edit')); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-contract"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.edit')); ?></span></a></li>
                                                 <?php endif; ?>
												 
                                                 <?php if(auth()->guard('admin')->user()->can('product-delete')): ?>
                                                 <li class="kt-nav__item"><a href="javascript:;" data-toggle="modal" data-target="#kt_modal_<?php echo e($productList->id); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.delete')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 </ul>
                                                 </div>
                                                 </div>
                                                 <br><br>
                                                 <a title="<?php echo e(trans('adminMessage.openlink')); ?>" class="btn btn-sm btn-clean btn-icon btn-icon-md mt-10" target="_blank" href="<?php echo e(url('details/'.$productList->id.'/'.$productList->slug)); ?>"><i class="fa fa-link"></i></a>
                                                 
                                                 </span>
                                                 <!--duplicate item-->
                                                 <div class="modal fade" id="kt_modal_duplicate_<?php echo e($productList->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelkt_modal_duplicate_<?php echo e($productList->id); ?>" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title"><?php echo e(__('adminMessage.alert')); ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																</button>
															</div>
															<div class="modal-body">
																<h6 class="modal-title"><?php echo __('adminMessage.aresuretodplicateitem'); ?></h6>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('adminMessage.no')); ?></button>
																<button type="button" class="btn btn-danger"  onClick="Javascript:window.location.href='<?php echo e(url('gwc/product/duplicate/'.$productList->id)); ?>'"><?php echo e(__('adminMessage.yes')); ?></button>
															</div>
														</div>
													</div>
												</div>
                                                 
                                                 <!--Delete modal -->
												<div class="modal fade" id="kt_modal_<?php echo e($productList->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelkt_modal_<?php echo e($productList->id); ?>" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title"><?php echo e(__('adminMessage.alert')); ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																</button>
															</div>
															<div class="modal-body">
																<h6 class="modal-title"><?php echo __('adminMessage.alertDeleteMessage'); ?></h6>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('adminMessage.no')); ?></button>
																<button type="button" class="btn btn-danger"  onClick="Javascript:window.location.href='<?php echo e(url('gwc/product/delete/'.$productList->id)); ?>'"><?php echo e(__('adminMessage.yes')); ?></button>
															</div>
														</div>
													</div>
												</div>
												<!--end delete -->
												<!--update qucik quantity-->
												<div class="modal fade" id="kt_modal_quantity_<?php echo e($productList->id); ?>" tabindex="-1" role="dialog" aria-labelledby="kt_modal_quantity_<?php echo e($productList->id); ?>" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title"><?php echo e(__('adminMessage.editquantity')); ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																</button>
															</div>
															<div class="modal-body">
															<?php if(empty($productList->is_attribute)): ?>
															<div class="form-group row">
															<div class="col-lg-6">
															<input type="text" class="form-control" name="quantity_<?php echo e($productList->id); ?>" id="quantity_<?php echo e($productList->id); ?>"
																		   value="<?php echo e($productList->quantity); ?>" autocomplete="off" />
															</div>
															<div class="col-lg-6"><input id="<?php echo e($productList->id); ?>" type="button" class="btn btn-brand btn-bold updatesingleqty" value="<?php echo e(__('adminMessage.save')); ?>"> <img id="qty_gif_<?php echo e($productList->id); ?>" style="position:absolute;margin-top:-35px;display:none;" src="<?php echo e(url('assets/images/loader.svg')); ?>" width="100"></div>
															</div>
															<span id="qtyedit-<?php echo e($productList->id); ?>"></span>
															
															<?php endif; ?>	
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('adminMessage.cancel')); ?></button>
															</div>
														</div>
													</div>
												</div>
												<!--update end qty -->
                                                
                                                </td>
                                                <td align="center">
                                                <?php if($productList->image): ?>
                                                <img style="border:1px #CCCCCC solid;" src="<?php echo url('uploads/product/thumb/'.$productList->image); ?>" width="40">
                                                <?php endif; ?>
                                                <?php if($productList->rollover_image): ?><br><br>
                                                <img style="border:1px #CCCCCC solid;" src="<?php echo url('uploads/product/thumb/'.$productList->rollover_image); ?>" width="40">
                                                <?php endif; ?>
                                                <br><br>
                                                <a target="_blank" href="<?php echo e(url('uploads/product/qr/'.$productList->item_code.'.png')); ?>"><img width="40" src="<?php echo e(url('uploads/product/qr/'.$productList->item_code.'.png')); ?>" style="border:1px #CCCCCC solid;"></a>
                                                
                                                <br><br>
                                                Views<br> <?php echo e($productList->most_visited_count); ?>

                                                </td>
                                                
                                                <td>
                                                <table width="100%">
                                                <tr><td width="120"><?php echo e(__('adminMessage.item_code')); ?>:</td><td><b><?php echo e($productList->item_code); ?></b></td></tr>
                                                <?php if(!empty($productList->sku_no)): ?>
                                                <tr><td width="120"><?php echo e(__('adminMessage.sku_no')); ?>:</td><td><?php echo e($productList->sku_no); ?></td></tr>
                                                <?php endif; ?>
                                                <?php if(!empty($productList->caption_en)): ?>
												<tr><td width="120"><?php echo e(__('adminMessage.caption_name')); ?>:</td><td><?php echo e($productList->caption_en); ?></td></tr>
												<?php endif; ?>
                                               
												<tr><td width="120"><?php echo e(__('adminMessage.quantity')); ?>:</td><td>
                                                <span id="q-<?php echo e($productList->id); ?>"><?php echo e($quantity); ?></span>
												<?php if(empty($productList->is_attribute)): ?>
												<a title="Edit Quantity" href="javascript:;" data-toggle="modal" data-target="#kt_modal_quantity_<?php echo e($productList->id); ?>" class="float-right"><i class="kt-nav__link-icon flaticon2-contract"></i></span>
                                                </a>
											
                                                </td></tr>
												<?php endif; ?>
                                               
												<tr><td width="120"><?php echo e(__('adminMessage.retail_price')); ?>:</td><td><?php echo e($retail_price); ?><?php if($old_price): ?><a class="pull-right"><s><?php echo e($old_price); ?></s></a><?php endif; ?></td></tr>
                                                <?php if($productList->cost_price): ?>
                                                <tr><td width="120"><?php echo e(__('adminMessage.cost_price')); ?>:</td><td>KD <?php echo e($productList->cost_price); ?></td></tr>
                                                <?php endif; ?>
                                                <?php if($productList->wholesale_price): ?>
                                                <tr><td width="120"><?php echo e(__('adminMessage.wholesale_price')); ?>:</td><td>KD <?php echo e($productList->wholesale_price); ?></td></tr>
                                                <?php endif; ?>
                                                <?php if($productList->weight): ?>
                                                <tr><td width="120"><?php echo e(__('adminMessage.weight')); ?>:</td><td><?php echo e($productList->weight); ?> Kilo</td></tr>
                                                <?php endif; ?>
												
                                                <?php if(!empty($productList->brand->title_en)): ?>
												<tr><td width="120"><?php echo e(__('adminMessage.brand')); ?>:</td><td><?php echo e($productList->brand->title_en); ?></td></tr>
												<?php endif; ?>
                                                <tr><td width="120"><?php echo e(__('adminMessage.status')); ?>:</td><td><select style="width:120px;" class="form-control prodstatus" name="prodstatus" id="<?php echo e($productList->id); ?>">
                                                <option value="0" <?php if($productList->is_active==0): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.notpublished')); ?></option>
                                                <option value="1" <?php if($productList->is_active==1): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.published')); ?></option>
                                                <option value="2" <?php if($productList->is_active==2): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.publishedpreorder')); ?></option>
                                                </select></td></tr>
                                                <tr><td width="120"><?php echo e(__('adminMessage.export')); ?>:</td><td><span class="kt-switch"><label><input value="<?php echo e($productList->id); ?>" <?php echo e(!empty($productList->is_export_active)?'checked':''); ?> type="checkbox"  id="productexport" class="change_status"><span></span></label></span></td></tr>
                                                </table>
												
												</td>
                                               
												<td>
                                                <table width="100%">
                                                <tr><td colspan="2">
                                                <?php if($productList->title_en): ?><b><?php echo $productList->title_en; ?></b><?php endif; ?>
                                                <br>
                                                <?php if(!empty($productList->productcat) && count($productList->productcat)): ?>
                                                <?php $__currentLoopData = $productList->productcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cattree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="badge badge-warning"><?php echo e($cattree->name_en); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                </td>
                                                </tr>
                                                <?php if(!empty($productList->warranty)): ?>
                                                  <?php
                                                  $warrantyDetails = App\Http\Controllers\webCartController::getWarrantyDetails($productList->warranty);
                                                  ?>
                                                <tr><td width="120"><?php echo e(__('adminMessage.warranty')); ?>:</td><td><?php echo e(!empty($warrantyDetails->title_en)?$warrantyDetails->title_en:'--'); ?></td></tr>
                                                <?php endif; ?> 
                                                
                                                <?php if(!empty($productList->tags_en)): ?>
                                                <tr><td width="120"><?php echo e(trans('adminMessage.tags')); ?>:</td><td><?php echo e($productList->tags_en); ?></td></tr>
                                                <?php endif; ?>
                                                
                                                  <?php if(!empty($productList->seokeywords_en)): ?>
                                                  <tr><td width="120"><?php echo e(__('adminMessage.seokeywords_en')); ?>:</td><td><?php echo e($productList->seokeywords_en); ?></td></tr>
                                                  <?php endif; ?>
                                                  <?php if(!empty($productList->seodescription_en)): ?>
                                                  <tr><td width="120"><?php echo e(__('adminMessage.seodescription_en')); ?>:</td><td><?php echo e($productList->seodescription_en); ?></td></tr>
                                                  <?php endif; ?>
                                                  <?php if(!empty($productList->youtube_url)): ?>
                                                  <tr><td width="120"><?php echo e(trans('adminMessage.youtube')); ?>:</td><td><?php echo e($productList->youtube_url); ?></td></tr>
                                                  <?php endif; ?>
                                          
                                          
                                                </table>
                                                </td>
												
                                               
												
												
                                               
											</tr>
                                         
                                        <?php $p++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                        <tr><td colspan="10" class="text-center"><?php echo e($productLists->links()); ?></td></tr> 
                                        <?php else: ?>
                                        <tr><td colspan="10" class="text-center"><?php echo e(__('adminMessage.recordnotfound')); ?></td></tr>
                                        <?php endif; ?>    
										</tbody>
									</table>
                            <?php else: ?>
                            <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text"><?php echo e(__('adminMessage.youdonthavepermission')); ?></div>
							</div>
                            <?php endif; ?>
									<!--end: Datatable -->
								
							</div>
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

		<!-- begin::Quick Panel -->
		

		<!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- js files -->
		<?php echo $__env->make('gwc.js.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo url('admin_assets/assets/plugins/jstree/dist/jstree.min.js'); ?>" type="text/javascript"></script>
       
  
    <script type="text/javascript">
	$(document).ready(function(){
	 $(document).on("change","#manufacturer_id",function(){
	 var manufacturer_id = $(this).val();
	 var brand_id = $("#brand_id").val();
	 window.location.href = "/gwc/product?manufacturer_id="+manufacturer_id+"&brand_id="+brand_id+"&tag=<?php echo e(Request()->tag); ?>";
	 });
	 $(document).on("change","#brand_id",function(){
	  var manufacturer_id = $("#manufacturer_id").val();
	  var brand_id = $(this).val();
	 window.location.href = "/gwc/product?brand_id="+brand_id+"&manufacturer_id="+manufacturer_id+"&tag=<?php echo e(Request()->tag); ?>";
	 });
	 
	});
	</script>
	</body>
	<!-- end::Body -->
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/product/index.blade.php ENDPATH**/ ?>