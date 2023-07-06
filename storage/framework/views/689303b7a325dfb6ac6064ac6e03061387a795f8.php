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
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.orders')); ?></title>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.orders')); ?></h3>
									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.orderlisting')); ?></a>
                                        
									</div>
								</div>
								<div class="kt-subheader__toolbar">
                                <?php if(Cookie::get('order_filter_dates')): ?>
                                <button type="button" class="btn btn-danger btn-bold resetorderdaterange"><?php echo e(__('adminMessage.reset')); ?></button>
                                <?php endif; ?>
                                <div class="kt-subheader__wrapper">
										<div class="kt-input-icon kt-input-icon--right kt-subheader__search">
										<input type="text" class="form-control"  name="kt_daterangepicker_range" id="kt_daterangepicker_range"  placeholder="Select Date Range" value="<?php if(Cookie::get('order_filter_dates')): ?><?php echo e(Cookie::get('order_filter_dates')); ?><?php endif; ?>">
                                        <button id="filterBydatesId" style="border:0;" class="kt-input-icon__icon kt-input-icon__icon--right">
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
                                </div>        
									<form class="kt-margin-l-20" method="get" id="kt_subheader_search_form" action="<?php echo e(url('gwc/orders')); ?>">
											<div class="kt-input-icon kt-input-icon--right kt-subheader__search">
												<input value="<?php echo e(Request()->q); ?>" type="text" class="form-control" placeholder="<?php echo e(__('adminMessage.searchhere')); ?>" id="q" name="q">
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
										<button type="button" class="btn btn-warning btn-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php if(Cookie::get('order_filter_status')): ?><?php echo e(strtoupper(Cookie::get('order_filter_status'))); ?><?php else: ?><?php echo e(strtoupper(__('adminMessage.all'))); ?><?php endif; ?></button>
										<div class="dropdown-menu dropdown-menu-right">
                                            
											<ul class="kt-nav">
												<li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link orderstatus" id="all"><?php echo e(__('adminMessage.all')); ?></a></li>
                                                <li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link orderstatus" id="completed"><?php echo e(__('adminMessage.completed')); ?></a></li>
                                                <li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link orderstatus" id="pending"><?php echo e(__('adminMessage.pending')); ?></a></li>
                                                <li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link orderstatus" id="canceled"><?php echo e(__('adminMessage.canceled')); ?></a></li>
                                                <li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link orderstatus" id="returned"><?php echo e(__('adminMessage.returned')); ?></a></li>
											</ul>
										</div>
									</div>
                                    <div class="btn-group">
										<button type="button" class="btn btn-success btn-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php if(Cookie::get('pay_filter_status')): ?><?php echo e(strtoupper(Cookie::get('pay_filter_status'))); ?><?php else: ?><?php echo e(strtoupper(__('adminMessage.all'))); ?><?php endif; ?></button>
										<div class="dropdown-menu dropdown-menu-right">
                                            
											<ul class="kt-nav">
												<li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link paystatus" id="all"><?php echo e(__('adminMessage.all')); ?></a></li>
                                                <li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link paystatus" id="paid"><?php echo e(__('adminMessage.paid')); ?></a></li>
                                                <li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link paystatus" id="notpaid"><?php echo e(__('adminMessage.notpaid')); ?></a></li>
                                                
											</ul>
										</div>
									</div>
									<div class="btn-group">
										
										<select name="order_customers" id="order_customers" class="form-control">
										<option value="0"><?php echo e(__('adminMessage.allcustomers')); ?></option>
										<?php if(!empty($customersLists)): ?>
											<?php $__currentLoopData = $customersLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customersList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										    <option value="<?php echo e($customersList->id); ?>" <?php if(!empty(Cookie::get('order_customers')) && Cookie::get('order_customers')==$customersList->id): ?> selected <?php endif; ?>><?php echo e($customersList->name); ?></option>
										    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										</select>
										
									</div>	
								</div>
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
							<div class="kt-portlet kt-portlet--mobile">
								
                                <?php if(auth()->guard('admin')->user()->can('order-list')): ?>
									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
										<thead>
											<tr>
												<th width="10">#</th>
												<th width="100"><?php echo e(__('adminMessage.orderid')); ?></th>
                                                <th><?php echo e(__('adminMessage.name')); ?></th>
												<th width="100"><?php echo e(__('adminMessage.mobile')); ?></th>
												<th width="90"><?php echo e(__('adminMessage.total')); ?></th>
												<th width="120"><?php echo e(__('adminMessage.orderstatus')); ?></th>
												<th width="150"><?php echo e(__('adminMessage.paymode_status')); ?></th>
                                                <th width="155"><?php echo e(__('adminMessage.date')); ?></th>
												<th width="10"><?php echo e(__('adminMessage.actions')); ?></th>
											</tr>
										</thead>
										<tbody>
                                        <?php if(count($orderLists)): ?>
                                        <?php $p=1; $orderStatus='';?>
                                        <?php $__currentLoopData = $orderLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$orderList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        if(!empty($orderList->is_paid)){
                                        $ispaid ='<span class="kt-pull-right kt-badge kt-badge--inline kt-badge--success">'.__('adminMessage.yes').'</span>';
                                        }else{
                                        $ispaid ='<span class="kt-pull-right kt-badge kt-badge--inline kt-badge--danger">'.__('adminMessage.no').'</span>';
                                        }
                                        
                                        if(!empty($orderList->order_status) && $orderList->order_status=="pending"){
                                        $orderStatus ='<span class="kt-badge kt-badge--inline kt-badge--warning">'.$orderList->order_status.'</span>';
                                        }elseif(!empty($orderList->order_status) && $orderList->order_status=="completed"){
                                        $orderStatus ='<span class="kt-badge kt-badge--inline kt-badge--success">'.$orderList->order_status.'</span>';
                                        }elseif(!empty($orderList->order_status) && $orderList->order_status=="canceled"){
                                        $orderStatus ='<span class="kt-badge kt-badge--inline kt-badge--danger">'.$orderList->order_status.'</span>';
                                        }elseif(!empty($orderList->order_status) && $orderList->order_status=="returned"){
                                        $orderStatus ='<span class="kt-badge kt-badge--inline kt-badge--info">'.$orderList->order_status.'</span>';
                                        }
                                        
                                        $totalAmounts = App\Http\Controllers\AdminCustomersController::getOrderAmounts($orderList->id);
                                        
                                        $sellerDetails = App\Http\Controllers\AdminCustomersController::getCustomerDetails($orderList->customer_id);
                                        
                                        ?>
											<tr class="search-body">
												<td><?php echo e($orderLists->firstItem() + $key); ?></td>
												<td><?php echo e($orderList->order_id); ?><?php if(!empty($orderList->is_removed)): ?><br><span class="kt-badge kt-badge--inline kt-badge--danger"><?php echo e(__('adminMessage.removed')); ?></span><?php endif; ?>
                                                <?php if(!empty($sellerDetails) && !empty($sellerDetails->name)): ?>
                                                <br>Seller : <?php echo e($sellerDetails->name); ?>

                                                <?php endif; ?>
                                                </td>
                                                <td>
                                                <strong>NAME :</strong> <?php echo e($orderList->name); ?>

                                                <br>
                                                <strong>DEVICE :</strong> (<?php echo e($orderList->device_type); ?>)
                                                
                                                <br>
                                                <strong>IP ADDR :</strong> <?php echo e(!empty($orderList->order_ip)?$orderList->order_ip:'NA'); ?>

                                                
                                                </td>
												<td><?php echo e($orderList->mobile); ?></td>
                                                <td><?php echo e($settingInfo->base_currency.' '.number_format($totalAmounts,3)); ?></td>
												<td><?php echo $orderStatus; ?></td>
												<td><?php echo e($orderList->pay_mode); ?><?php echo $ispaid; ?></td>
												<td>
                                                <?php echo e($orderList->created_at); ?>

                                                <?php if($orderList->delivery_date): ?><br><br><font color="#CC3300"><?php echo e($orderList->delivery_date); ?></font><?php endif; ?>
                                                </td>
												
                                                <td class="kt-datatable__cell">
                                                 <span style="overflow: visible; position: relative; width: 80px;">
                                                 <div class="dropdown">
                                                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="flaticon-more-1"></i></a>
                                                 <div class="dropdown-menu dropdown-menu-right">
                                                 <ul class="kt-nav">
                                                 
                                                
                                                 <?php if(auth()->guard('admin')->user()->can('order-view')): ?>
                                                 <!--<li class="kt-nav__item"><a href="<?php echo e(url('gwc/pos/'.$orderList->id)); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon-edit"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.edit')); ?></span></a></li>-->
                                                 
                                                 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/orders/'.$orderList->id.'/view')); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon-eye"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.view')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 <?php if(auth()->guard('admin')->user()->can('order-view')): ?>
                                                 <li class="kt-nav__item"><a target="_blank" href="<?php echo e(url('order-print/'.$orderList->order_id_md5)); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-print"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.print')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 <?php if(auth()->guard('admin')->user()->can('trackhistory-list')): ?>
                                                 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/orders-track/'.$orderList->id)); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon-clock"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.trackhistory')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 
                                                 <?php if(auth()->guard('admin')->user()->can('order-edit-status')): ?>
                                                 <li class="kt-nav__item"><a href="javascript:;" data-toggle="modal" data-target="#kt_modal_edit_<?php echo e($orderList->id); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon-edit"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.changeorderstatus')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 
                                                 <?php if(auth()->guard('admin')->user()->can('order-delete')): ?>
                                                 <li class="kt-nav__item"><a href="javascript:;" data-toggle="modal" data-target="#kt_modal_<?php echo e($orderList->id); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.delete')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 
                                                 <?php if(!empty($settingDetailsMenu->is_dezorder_active)): ?>
                                                 <li class="kt-nav__item">
                                                 <a href="javascript:;" data-toggle="modal" data-target="#kt_modal_dezorder_<?php echo e($orderList->id); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-delivery-truck"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.dezorder')); ?></span>
                                                 <?php if(!empty($orderList->is_for_dezorder)): ?>
                                                 <span class="kt-pull-right kt-badge kt-badge--inline kt-badge--success"><?php echo e(__('adminMessage.sent')); ?></span>
                                                 <?php endif; ?>
                                                 </a>
                                                 </li>
                                                 <?php endif; ?>
                                                 
                                                 </ul>
                                                 </div>
                                                 </div>
                                                 </span>
                                                 
                                                 <!-- copy -->
                                                 <div id="copy-<?php echo e($orderList->id); ?>" style="display:none;text-align:left;">
                                                <?php echo e(!empty($settings->owner_name)?$settings->owner_name:$settings->name_en); ?> order - <?php echo e($orderList->pay_mode); ?> 
                                                
                                                ORDER ID : <?php echo e($orderList->order_id); ?>

                                                
                                                NAME : <?php echo e($orderList->name); ?>

                                                
                                                <?php if(!empty($orderList->area->name_en)): ?><?php echo e($orderList->area->name_en); ?><?php endif; ?> <?php if(!empty($orderList->block)): ?> Block : <?php echo e($orderList->block); ?>,<?php endif; ?> <?php if(!empty($orderList->street)): ?> Street : <?php echo e($orderList->street); ?> ,<?php endif; ?> <?php if(!empty($orderList->block)): ?> House : <?php echo e($orderList->house); ?> ,<?php endif; ?> <?php if(!empty($orderList->floor)): ?> Foor : <?php echo e($orderList->floor); ?> ,<?php endif; ?>
                                                
                                                <?php if(!empty($orderList->delivery_time_en)): ?>DELIVERY TIME : <?php echo e($orderList->delivery_time_en); ?><?php endif; ?>
                                                
                                                MOBILE : <?php echo e($orderList->mobile); ?>

                                                
                                                AMOUNT : <?php echo e($settingInfo->base_currency.' '.number_format($totalAmounts,3)); ?>

                                                 </div>
                                                 <!-- end copy -->
                                                 
                                                 <a href="javascript:;" data-toggle="modal" data-target="#kt_modal_short_<?php echo e($orderList->id); ?>" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="flaticon2-copy"></i></a>
                                 
                                 
                                 <div class="modal fade" id="kt_modal_short_<?php echo e($orderList->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
                                        <div class="modal-header">
											<h5 class="modal-title">Short Details</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
                                        <div class="form-group row">
                                                <div class="col-lg-12">
                                                <?php echo e(!empty($settings->owner_name)?$settings->owner_name:$settings->name_en); ?> order - <?php echo e($orderList->pay_mode); ?> 
                                                <br>ORDER ID : <?php echo e($orderList->order_id); ?><br>NAME : <?php echo e($orderList->name); ?><br><?php if(!empty($orderList->area->name_en)): ?><?php echo e($orderList->area->name_en); ?><?php endif; ?> <?php if(!empty($orderList->block)): ?> Block : <?php echo e($orderList->block); ?>,<?php endif; ?> <?php if(!empty($orderList->street)): ?> Street : <?php echo e($orderList->street); ?> ,<?php endif; ?> <?php if(!empty($orderList->block)): ?> House : <?php echo e($orderList->house); ?> ,<?php endif; ?> <?php if(!empty($orderList->floor)): ?> Foor : <?php echo e($orderList->floor); ?> ,<?php endif; ?> <?php if(!empty($orderList->delivery_time_en)): ?> <br> DELIVERY TIME : <?php echo e($orderList->delivery_time_en); ?><?php endif; ?> <br> MOBILE : <?php echo e($orderList->mobile); ?> <br> AMOUNT : <?php echo e($settingInfo->base_currency.' '.number_format($totalAmounts,3)); ?> </div>
                                                
                                           </div> 
										</div>
									</div>
								</div>
							    </div>
                                
                                                
                                <div class="modal fade" id="kt_modal_dezorder_<?php echo e($orderList->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
                                        <div class="modal-header">
											<h5 class="modal-title"><?php echo e(__('adminMessage.editorderstatus')); ?></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
                                        <div class="form-group row">
                                                <div class="col-lg-8">
                                                <label><?php echo e(__('adminMessage.movetodezorder')); ?></label> 
                                                </div>
                                                <div class="col-lg-4" align="right">
                                            <span class="kt-switch"><label><input value="<?php echo e($orderList->id); ?>" <?php echo e(!empty($orderList->is_for_dezorder)?'checked':''); ?> type="checkbox"  id="dezorder" class="change_status"><span></span></label></span>
                                                </div>
                                           </div> 
										</div>
									</div>
								</div>
							    </div>
                            
                          <!--edit order status -->
                          <div class="modal fade" id="kt_modal_edit_<?php echo e($orderList->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title"><?php echo e(__('adminMessage.editorderstatus')); ?></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<div class="form-group row">
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.order_status')); ?></label>
                                                <select id="order_status<?php echo e($orderList->id); ?>" name="order_status" class="form-control">
                                                <option value="pending"   <?php if($orderList->order_status=='pending'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.pending')); ?></option>      
                                                <option value="completed" <?php if($orderList->order_status=='completed'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.completed')); ?></option> 
                                                <option value="canceled" <?php if($orderList->order_status=='canceled'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.canceled')); ?></option> 
                                                <option value="returned" <?php if($orderList->order_status=='returned'): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.returned')); ?></option>   
                                                </select>
                                                </div>
                                                <div class="col-lg-6">
                                                <label><?php echo e(__('adminMessage.pay_status')); ?></label>
                                                <select id="pay_status<?php echo e($orderList->id); ?>" name="pay_status" class="form-control">
                                                <option value="1" <?php if(!empty($orderList->is_paid)): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.paid')); ?></option>      
                                                <option value="0" <?php if(empty($orderList->is_paid)): ?> selected <?php endif; ?>><?php echo e(__('adminMessage.notpaid')); ?></option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-12"><textarea name="extra_comment" id="extra_comment<?php echo e($orderList->id); ?>" class="form-control"><?php if(!empty($orderList->extra_comment)): ?><?php echo $orderList->extra_comment; ?><?php endif; ?></textarea></div>
                                            </div>
										</div>
										<div class="modal-footer">
                                           <span id="OrderStatusMsg<?php echo e($orderList->id); ?>"></span>
											<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('adminMessage.cancel')); ?></button>
											<button type="button" id="<?php echo e($orderList->id); ?>" class="btn btn-danger changeorderstatus"><?php echo e(__('adminMessage.change')); ?></button>
                                            
                                            
										</div>
									</div>
								</div>
							</div>                       
                                                 <!--Delete modal -->
                        <div class="modal fade" id="kt_modal_<?php echo e($orderList->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
											<button type="button" class="btn btn-danger"  onClick="Javascript:window.location.href='<?php echo e(url('gwc/orders/delete/'.$orderList->id)); ?>'"><?php echo e(__('adminMessage.yes')); ?></button>
										</div>
									</div>
								</div>
							</div>
                                                </td>
											</tr>
                                        
                                        <?php $p++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                        <tr><td colspan="10" class="text-center"><?php echo e($orderLists->links()); ?></td></tr> 
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

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- js files -->
		<?php echo $__env->make('gwc.js.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

 <script>
$(function() {
  $('input[name="kt_daterangepicker_range"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});

function copyToClipboard(elementId) {

  // Create a "hidden" input
  var aux = document.createElement("input");

  // Assign it the value of the specified element
  aux.setAttribute("value", document.getElementById(elementId).innerHTML);

  // Append it to the body
  document.body.appendChild(aux);

  // Highlight its content
  aux.select();

  // Copy the highlighted text
  document.execCommand("copy");

  // Remove it from the body
  document.body.removeChild(aux);
  
  
  
  toastr.success("Order Text Message Has Been Coppied");
}
</script>
	</body>
	<!-- end::Body -->
</html><?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/gwc/orders/index.blade.php ENDPATH**/ ?>