<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.orderdetails')); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?php echo url('admin_assets/assets/css/pages/invoices/invoice-1.css'); ?>" rel="stylesheet" type="text/css" />
        <!--css files -->
		<?php echo $__env->make('gwc.css.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--begin::Page Custom Styles(used by this page) -->
		

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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.orderdetails')); ?></h3>
									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.orderdetails')); ?></a>
									</div>
								</div>
								<div class="kt-subheader__toolbar"><a href="<?php echo e(url('gwc/orders')); ?>" class="btn btn-default btn-bold"><?php echo e(__('adminMessage.back')); ?></a>
								</div>
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
                        <?php if(auth()->guard('admin')->user()->can('order-view')): ?>
                        
                        <?php
                        $addr=strtoupper($orderDetails->name).'<br>';
                        $addr.=strtoupper($orderDetails->mobile).'<br>';
                        if(!empty($orderDetails->area_id)){
                        $areaName = App\Http\Controllers\AdminCustomersController::getCountryStatesArea($orderDetails->area_id);
                        $addr.='Area='.$areaName. ',&nbsp;';
                        }
                        
                        if(!empty($orderDetails->block)){
                        $addr.='Block='.$orderDetails->block. ',&nbsp;';
                        }
                        if(!empty($orderDetails->street)){
                        $addr.='Street='.$orderDetails->street. ',&nbsp;';
                        }
                        if(!empty($orderDetails->avenue)){
                        $addr.='Avenue='.$orderDetails->avenue. ',&nbsp;';
                        }
                        if(!empty($orderDetails->house)){
                        $addr.='House='.$orderDetails->house. ', &nbsp;';
                        }
                        if(!empty($orderDetails->floor)){
                        $addr.='Floor='.$orderDetails->floor. ',&nbsp; ';
                        }
                        if(!empty($orderDetails->landmark)){
                        $addr.='Land Mrk='.$orderDetails->landmark. ', &nbsp;';
                        }
                        
                        if(!empty($orderDetails->latitude) && !empty($orderDetails->longitude)){
                        $addr.='<br><a target="_blank" href="https://www.google.com/maps/place/'.$orderDetails->latitude.','.$orderDetails->longitude.'" class="btn btn-info btn-small"><i class="flaticon2-map"></i></a>';
                        }
                        
                        
                        ?>
						    <!--Begin:: Portlet-->
							<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
							<div class="kt-portlet">
								<div class="kt-portlet__body kt-portlet__body--fit">
									<div class="kt-invoice-1">
										<div class="kt-invoice__head" style="background-image: url(<?php echo e(url('admin_assets/assets/media/bg/bg-6.jpg')); ?>);">
											<div class="kt-invoice__container" style="width:100%;">
												<div class="kt-invoice__brand">
													<h1 class="kt-invoice__title"><?php echo e(strtoupper(__('adminMessage.invoice'))); ?></h1>
													<div class="kt-invoice__logo">
                                                        <?php if($settingInfo->logo): ?>
														<a href="javascript:;"><img style="max-width:190px;" src="<?php echo e(url('uploads/logo/'.$settingInfo->logo)); ?>"></a>
                                                        <?php endif; ?>
                                                        <?php if($settingInfo->address_en): ?>
														<div class="kt-invoice__desc">
															<?php echo nl2br($settingInfo->address_en); ?>

														</div>
                                                        <?php endif; ?>
													</div>
												</div>
												<div class="kt-invoice__items">
													<div class="kt-invoice__item">
														<span class="kt-invoice__subtitle"><?php echo e(strtoupper(__('adminMessage.date'))); ?></span>
														<span class="kt-invoice__text"><?php echo e($orderDetails->created_at); ?><br><?php echo e($orderDetails->device_type); ?></span>
													</div>
													<div class="kt-invoice__item">
														<span class="kt-invoice__subtitle"><?php echo e(strtoupper(__('adminMessage.orderid'))); ?></span>
														<span class="kt-invoice__text"><?php echo e($orderDetails->order_id); ?></span>
													</div>
													<div class="kt-invoice__item">
														<span class="kt-invoice__subtitle"><?php echo e(strtoupper(__('adminMessage.invoiceto'))); ?></span>
														<span class="kt-invoice__text"><?php echo $addr; ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-invoice__body">
											<div class="kt-invoice__container" style="width:100%;">
												<div class="table-responsive" >
                                                <?php if(!empty($orderLists) && count($orderLists)>0): ?>
													<table class="table table-striped-  table-hover table-checkable" >
														<thead>
															<tr>
                                                                <th><?php echo e(__('adminMessage.image')); ?></th>
																<th style="text-align:left;"><?php echo e(__('adminMessage.details')); ?></th>
																<th style="text-align:center;"><?php echo e(__('adminMessage.unit_price')); ?></th>
																<th style="text-align:center;"><?php echo e(__('adminMessage.quantty')); ?></th>
																<th style="text-align:center;"><?php echo e(__('adminMessage.subtotal')); ?></th>
															</tr>
														</thead>
														<tbody>
                    <?php
                    $unitprice=0;
                    $subtotalprice=0;
                    $totalprice=0;
                    ?>
                    <?php $__currentLoopData = $orderLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $productDetails =App\Http\Controllers\webCartController::getProductDetails($orderList->product_id);
                    if($productDetails->image){
                    $prodImage = url('uploads/product/thumb/'.$productDetails->image);
                    }else{
                    $prodImage = url('uploads/no-image.png');
                    }
                    if(!empty($orderList->size_id)){
                    $sizeName =App\Http\Controllers\webCartController::sizeNameStatic($orderList->size_id,'en');
                    $sizeName = '<br>'.trans('webMessage.size').':'.$sizeName.'';
                    }else{$sizeName='';}
                    if(!empty($orderList->color_id)){
                    $colorName =App\Http\Controllers\webCartController::colorNameStatic($orderList->color_id,'en');
                    $colorName = '<br>'.trans('webMessage.color').':'.$colorName.'';
                    //color image
                    $colorImageDetails = App\Http\Controllers\webCartController::getColorImage($orderList->product_id,$orderList->color_id);
                    if(!empty($colorImageDetails->color_image)){
                    $prodImage = url('uploads/product/colors/thumb/'.$colorImageDetails->color_image);
                    }
                    }else{$colorName='';}
					$optionsdetails = App\Http\Controllers\webCartController::getOptionsDtailsOrderBr($orderList->id);
                    $unitprice = $orderList->unit_price;
                    $subtotalprice = $unitprice*$orderList->quantity;
                    
                    $warrantyTxt='';
                    if(!empty($productDetails->warranty)){
                    $warrantyDetails = App\Http\Controllers\webCartController::getWarrantyDetails($productDetails->warranty);
                    $warrantyTxt     = $warrantyDetails->title_en;
                    }
                    
                    $vendortxt='';
                    if(!empty($orderList->vendor->shop_name_en)){
                    $vendortxt='<br>'.trans('webMessage.vendor').':<a href="'.url('vendor/'.$orderList->vendor->slug).'">'.$orderList->vendor->shop_name_en.'</a>';
                    }
                    
                    ?>
                            <tr id="cart-<?php echo e($orderList->id); ?>">
							<td><img src="<?php echo e($prodImage); ?>" width="50"><br><small><?php echo e($productDetails['item_code']); ?></small></td>
							<td style="text-align:left;"><?php if(!empty($productDetails['title_en'])): ?><?php echo e($productDetails['title_en']); ?><?php endif; ?> <span style="font-size:12px; font-weight:normal;"><?php echo $sizeName; ?> <?php echo $colorName; ?> <?php echo $optionsdetails; ?> <br><?php echo $warrantyTxt; ?> <?php echo $vendortxt; ?></span></td>
							<td><div align="center"><?php echo e(number_format($unitprice,3)); ?></div></td>
							<td align="center" <?php if($orderList->quantity>1): ?> style="color:#ff0000;text-align:center;" <?php endif; ?>><div align="center"><?php echo e($orderList->quantity); ?></div></td>
							<td align="center"><div align="center"><?php echo e(number_format($subtotalprice,3)); ?></div></td>
						    </tr>
                        <?php
                        $totalprice+=$subtotalprice;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</tbody>
													</table>
                                                   <?php endif; ?> 
												</div>
											</div>
										</div>
										<div class="kt-invoice__footer">
											<div class="kt-invoice__container" style="width:100%;">
												<div class="kt-invoice__bank">
													<?php if(!empty($orderDetails->order_id)): ?>
													<?php
													$TransDetails = App\Http\Controllers\webCartController::TransDetails($orderDetails->order_id);	
													?>	
													<?php if(!empty($TransDetails->id)): ?>		
													<div class="kt-invoice__title"><?php echo e(strtoupper(__('adminMessage.transdetails'))); ?></div>
													<div class="kt-invoice__item">
														<span class="kt-invoice__label"><?php echo e(__('adminMessage.result')); ?>:</span>
														<span class="kt-invoice__value" <?php if($TransDetails->presult=='CAPTURED'): ?>style="color:#009900" <?php else: ?> style="color:#ff0000" <?php endif; ?>><?php echo e($TransDetails->presult); ?></span>
													</div>
													<div class="kt-invoice__item">
														<span class="kt-invoice__label"><?php echo e(__('adminMessage.paymentid')); ?>:</span>
														<span class="kt-invoice__value"><?php echo e($TransDetails->payment_id); ?></span>
													</div>
                                                    <?php if(!empty($TransDetails->tranid)): ?>
													<div class="kt-invoice__item">
														<span class="kt-invoice__label"><?php echo e(__('adminMessage.transid')); ?>:</span>
														<span class="kt-invoice__value"><?php echo e($TransDetails->tranid); ?></span>
													</div>
                                                    <?php endif; ?>
                                                    <?php if(!empty($TransDetails->paypal_cart)): ?>
													<div class="kt-invoice__item">
														<span class="kt-invoice__label"><?php echo e(__('adminMessage.transid')); ?>:</span>
														<span class="kt-invoice__value"><?php echo e($TransDetails->paypal_cart); ?></span>
													</div>
                                                    <?php endif; ?>
													<div class="kt-invoice__item">
														<span class="kt-invoice__label"><?php echo e(__('adminMessage.trackid')); ?>:</span>
														<span class="kt-invoice__value"><?php echo e($TransDetails->trackid); ?></span>
													</div>
													<div class="kt-invoice__item">
														<span class="kt-invoice__label"><?php echo e(__('adminMessage.amount')); ?>:</span>
														<span class="kt-invoice__value"><?php echo e(round($TransDetails->udf2,3)); ?> <?php echo e($settingInfo->base_currency); ?>

                                                        <?php if(!empty($TransDetails->amt_dollar)): ?>(<?php echo e(trans('webMessage.usd')); ?> <?php echo e(round($TransDetails->amt_dollar,3)); ?>)<?php endif; ?>
                                                        </span>
													</div>
													<?php endif; ?>
													<?php endif; ?>
												</div>
                                                
												<div class="kt-invoice__total">
													<span class="kt-invoice__title"><?php echo e(strtoupper(__('adminMessage.total'))); ?></span>
													<span class="kt-invoice__price"><?php echo e(number_format($totalprice,3)); ?> <?php echo e($settingInfo->base_currency); ?> </span>
                                                    
                                                    <?php if(!empty($orderDetails->seller_discount)): ?> 
													<span class="kt-invoice__notice"><?php echo e(strtoupper(__('webMessage.seller_discount'))); ?></span>
                                                    <span class="kt-invoice__price">-<?php echo e(number_format($orderDetails->seller_discount,3)); ?> <?php echo e($settingInfo->base_currency); ?> </span>
                                                    <?php
                                                    $totalprice=$totalprice-$orderDetails->seller_discount;
                                                    ?> 
                                                    <?php endif; ?>
                                                    
                                                    
                                                    <?php if(!empty($orderDetails->coupon_code) && empty($orderDetails->coupon_free)): ?> 
													<span class="kt-invoice__notice"><?php echo e(strtoupper(__('adminMessage.coupon_discount'))); ?></span>
                                                    <span class="kt-invoice__price">-<?php echo e(number_format($orderDetails->coupon_amount,3)); ?> <?php echo e($settingInfo->base_currency); ?> </span>
                                                    <?php
                                                    $totalprice=$totalprice-$orderDetails->coupon_amount;
                                                    ?> 
                                                    <?php endif; ?>
                                                    
                                                    <?php if(!empty($orderDetails->coupon_code) && !empty($orderDetails->coupon_free)): ?>
                                                    <span class="kt-invoice__notice"><?php echo e(strtoupper(__('adminMessage.coupon_discount'))); ?></span>
                                                    <span class="kt-invoice__price"><?php echo e(__('adminMessage.free_delivery')); ?></span>
                                                    <?php endif; ?>
                                                    
                                                    <?php if(empty($orderDetails->delivery_charges)): ?>
                                                    <span class="kt-invoice__notice"><?php echo e(strtoupper(__('adminMessage.delivery_charge'))); ?></span>
                                                    <span class="kt-invoice__price"><?php echo e(__('adminMessage.free_delivery')); ?></span>
                                                    <?php endif; ?>
                                                    
                                                    <?php if(!empty($orderDetails['delivery_charges']) && empty($orderDetails['coupon_free'])): ?>
                                                    <span class="kt-invoice__notice"><?php echo e(strtoupper(__('adminMessage.delivery_charge'))); ?></span>
                                                    <span class="kt-invoice__price"><?php echo e(number_format($orderDetails['delivery_charges'],3)); ?> <?php echo e($settingInfo->base_currency); ?></span>
                                                    <?php
                                                    $totalprice=$totalprice+$orderDetails['delivery_charges'];
                                                    ?>
                                                    <?php endif; ?>
                                                    <span class="kt-invoice__title"><?php echo e(strtoupper(__('adminMessage.grandtotal'))); ?></span>
													<span class="kt-invoice__price"><?php echo e(number_format($totalprice,3)); ?> <?php echo e($settingInfo->base_currency); ?> </span>
                                                    
												</div>
											</div>
										</div>
                                        <?php
                                        if(!empty($orderDetails->delivery_date)){
                                        $delivery_date = $orderDetails->delivery_date;
                                        }else{
                                        $delivery_date = date('Y-m-d');
                                        }
                                        ?>
                                        <input type="hidden"  name="oid" id="oid" value="<?php echo e($orderDetails->id); ?>">
										<div class="kt-invoice__actions">
											<div class="kt-invoice__container" style="width:100%;">
                                            <div class="row" style="width:100%;">
                                            <div class="col-lg-6">
                                            <a href="<?php echo e(url('order-print/'.$orderDetails->order_id_md5)); ?>" style="color:#FFFFFF;" target="_blank" class="btn btn-warning btn-bold"  title="<?php echo e(__('adminMessage.printinvoice')); ?>"><i class="flaticon2-print"></i></a>
                                            <?php if(empty($orderDetails->is_paid)): ?>
                                            <!--<a href="javascript:void(0);" style="color:#FFFFFF;" target="_blank" class="btn btn-info btn-bold"  title="<?php echo e(__('adminMessage.sendpaymentlinkbysms')); ?>"><i class="flaticon-paper-plane"></i></a>
                                            <a href="javascript:void(0);" style="color:#FFFFFF;" target="_blank" class="btn btn-success btn-bold"  title="<?php echo e(__('adminMessage.sendpaymentlinkbyemail')); ?>"><i class="flaticon-mail-1"></i></a>-->
                                            <?php endif; ?>
                                            </div>
                                            <?php if($orderDetails->pay_mode=='COD'): ?>
                                            <div class="col-lg-2"><input placeholder="<?php echo e(trans('webMessage.delivery_date')); ?>" class="form-control" type="text" value="<?php echo e($delivery_date); ?>" name="delivery_date" id="delivery_date"></div>
                                            <div class="col-lg-2"><input required placeholder="<?php echo e(trans('webMessage.seller_discount')); ?>" class="form-control" type="text" value="<?php if(!empty($orderDetails->seller_discount)): ?><?php echo e($orderDetails->seller_discount); ?><?php endif; ?>" name="seller_discount" id="seller_discount"></div>
                                            <div class="col-lg-2"><input id="applydiscountamount" type="button" value="<?php echo e(trans('adminMessage.save')); ?>" class="btn btn-brand btn-bold" ></div>
                                            <?php endif; ?>
                                            </div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- end:: Content -->

							<!--End:: Portlet-->	
                            <?php else: ?>
                            <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text"><?php echo e(__('adminMessage.youdonthavepermission')); ?></div>
							</div>
                            <?php endif; ?>

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
    $("#delivery_date").datepicker({format:"yyyy-mm-dd"});
  });
</script>
	</body>
	<!-- end::Body -->
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/orders/view.blade.php ENDPATH**/ ?>