<?php
$settingInfo = App\Http\Controllers\webController::settings();
if(app()->getLocale()=="en"){$strLang="en";}else{$strLang="ar";}
use Illuminate\Support\Facades\Cookie;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.orderdetails')); ?></title>
<meta name="description" content="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->seo_description_en); ?> <?php else: ?> <?php echo e($settingInfo->seo_description_ar); ?> <?php endif; ?>" />
<meta name="abstract" content="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->seo_description_en); ?> <?php else: ?> <?php echo e($settingInfo->seo_description_ar); ?> <?php endif; ?>">
<meta name="keywords" content="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->seo_keywords_en); ?> <?php else: ?> <?php echo e($settingInfo->seo_keywords_ar); ?> <?php endif; ?>" />
<meta name="Copyright" content="<?php echo e($settingInfo->name_en); ?>, Kuwait Copyright 2020 - <?php echo e(date('Y')); ?>" />
<META NAME="Geography" CONTENT="<?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->address_en); ?> <?php else: ?> <?php echo e($settingInfo->address_ar); ?> <?php endif; ?>">
<?php if($settingInfo->extra_meta_tags): ?> <?php echo $settingInfo->extra_meta_tags; ?> <?php endif; ?>
<?php if($settingInfo->favicon): ?>
<link rel="icon" href="<?php echo e(url('uploads/logo/'.$settingInfo->favicon)); ?>">
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php echo $__env->make("website.includes.css", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
<!--preloader -->
<?php echo $__env->make("website.includes.preloader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end preloader -->
<!--header -->
<?php echo $__env->make("website.includes.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end header -->
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('webMessage.home')); ?></a></li>
            <li><a href="<?php echo e(url('/myorders')); ?>"><?php echo e(__('webMessage.myorders')); ?></a></li>
			<li><?php echo e(__('webMessage.orderdetails')); ?></li>
            <li><?php echo e(Request()->orderid); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.orderdetails')); ?> <a target="_blank" href="<?php echo e(url('order-print/'.Request()->orderid)); ?>" class="btn-link float-right"><i class="icon-g-55"></i><?php echo e(__('webMessage.print')); ?></a></h1>
            <?php if(!empty($orderLists) && count($orderLists)>0): ?>
            <div class="tt-collapse-block">
            <?php if(session('session_msg')): ?>
            <div class="alert-success"><?php echo e(session('session_msg')); ?></div>
            <?php endif; ?>
			<?php if(session('session_msg_error')): ?>
            <div class="alert-danger"><?php echo e(session('session_msg_error')); ?></div>
            <?php endif; ?>
            
            
            
             <!-- order history -->
                          <?php if(!empty($trackLists) && count($trackLists)>0): ?>
                           <div class="row" style="border:1px #CCCCCC solid;margin-top:20px;padding:20px;border-radius:5px;">
                             <div class="col-lg-12">
								<h4 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.trackhistory'))); ?></h4>
								
                                
                                  <?php $__currentLoopData = $trackLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trackList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row" <?php if(empty($trackList->is_seen)): ?> style="font-weight:bold; color:#0066FF;" <?php endif; ?>>
                                    <div class="col-xs-12 col-md-2 col-lg-2"><div class="form-group"><h4 class="tt-title"><a href="javascript:;"><?php echo e($trackList->details_date); ?></a></h4></div></div>
                                    <div class="col-xs-12 col-md-10 col-lg-10"><div class="form-group"><?php if(app()->getLocale()=="en"): ?> <?php echo $trackList->details_en; ?> <?php else: ?> <?php echo $trackList->details_ar; ?> <?php endif; ?></div></div>
                                        
                                        
                                    </div>
                                    <?php
                                    $u=App\Http\Controllers\webCartController::updateSeendStatus($trackList->id);
                                    ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                </div>
                           </div>   
                           <?php endif; ?>  
                           <!--end order history -->
                           
                           
			          <!-- order status details -->
                      
						<div class="row" style="border:1px #CCCCCC solid;margin-top:20px;padding:20px;border-radius:5px;">
                                    <div class="col-xs-12 col-md-3 col-lg-2">
                                    <div class="form-group">
                                    <label for="orderid"><?php echo e(__('webMessage.orderid')); ?> : <?php if(!empty($orderDetails->order_id)): ?> <?php echo e($orderDetails->order_id); ?><?php else: ?> -- <?php endif; ?></label>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-3 col-lg-2">
                                    <div class="form-group">
                                    <label for="paymentmethod"><?php echo e(__('webMessage.paymentmethod')); ?> : <?php if(!empty($orderDetails->pay_mode)): ?> <?php echo e(__($orderDetails->pay_mode)); ?><?php else: ?> -- <?php endif; ?></label>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3 col-lg-2">
                                    <div class="form-group">
                                    <label for="is_paid"><?php echo e(__('webMessage.payment_status')); ?> : <?php if(!empty($orderDetails->is_paid)): ?> <font color="#009900"><?php echo e(strtoupper(__('webMessage.paid'))); ?></font><?php else: ?> <font color="#FF0000"><?php echo e(strtoupper(__('webMessage.notpaid'))); ?></font> <?php endif; ?></label>
                                    </div>
                                    </div>
                                    <?php 
									 if(!empty($orderDetails->order_status) && $orderDetails->order_status=='completed'){$color='#009900';}else{$color='#ff0000';}
									 ?>
                                    <div class="col-xs-12 col-md-3 col-lg-2">
                                    <div class="form-group">
                                    <label for="order_status"><?php echo e(__('webMessage.order_status')); ?> : <font color="<?php echo e($color); ?>"><?php echo e(strtoupper(__('webMessage.'.$orderDetails->order_status))); ?></font></label>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3 col-lg-2">
                                    <div class="form-group">
                                    <label for="date"><?php echo e(__('webMessage.date')); ?> : <?php echo e($orderDetails->created_at); ?></label>
                                    </div>
                                    </div>
                                    <?php if(!empty($orderDetails->delivery_time_en) && !empty($orderDetails->delivery_time_ar)): ?>
                                    <div class="col-xs-12 col-md-3 col-lg-2">
                                    <div class="form-group">
                                    <label for="date"><?php echo e(__('webMessage.deliverytime')); ?> : <?php echo e($strLang=="en"?$orderDetails->delivery_time_en:$orderDetails->delivery_time_ar); ?></label>
                                    </div>
                                    </div>
                                    <?php endif; ?>
                        </div>		
					  
                      <!-- order status details end -->
                           
                            <!--shopping cart start -->
                <div class="row" style="border:1px #CCCCCC solid;margin-top:20px;padding:20px;border-radius:5px;">
                    <div class="col-lg-12">
                        
                  <div class="tt-shopcart-table-02">
				<table>
                    <thead class="tt-hidden-mobile">
                    <tr>
                    <th style="border-top:1px solid #fff;"><?php echo e(__('webMessage.image')); ?></th>
                    <th style="border-top:1px solid #fff;"><?php echo e(__('webMessage.details')); ?></th>
                    <th style="border-top:1px solid #fff;"><?php echo e(__('webMessage.unit_price')); ?></th>
                    <th style="border-top:1px solid #fff;"><?php echo e(__('webMessage.quantity')); ?></th>
                    <th style="border-top:1px solid #fff;"><?php echo e(__('webMessage.subtotal')); ?></th>
                    </tr>
                    </thead>
					<tbody>
                    <?php if(!empty($orderLists) && count($orderLists)>0): ?>
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
                    
                    $warrantyTxt='';
                    if(!empty($productDetails->warranty)){
                    $warrantyDetails = App\Http\Controllers\webCartController::getWarrantyDetails($productDetails->warranty);
                    $warrantyTxt     = $strLang=="en"?"<br>".$warrantyDetails->title_en:"<br>".$warrantyDetails->title_ar;
                    }
                    
                    
                    if(!empty($orderList->size_id)){
                    $sizeName =App\Http\Controllers\webCartController::sizeNameStatic($orderList->size_id,$strLang);
                    $sizeName = '<li>'.trans('webMessage.size').':'.$sizeName.'</li>';
                    }else{$sizeName='';}
                    if(!empty($orderList->color_id)){
                    $colorName =App\Http\Controllers\webCartController::colorNameStatic($orderList->color_id,$strLang);
                    $colorName = '<li>'.trans('webMessage.color').':'.$colorName.'</li>';
                    //color image
                    $colorImageDetails = App\Http\Controllers\webCartController::getColorImage($orderList->product_id,$orderList->color_id);
                    if(!empty($colorImageDetails->color_image)){
                    $prodImage = url('uploads/product/colors/thumb/'.$colorImageDetails->color_image);
                    }
                    }else{$colorName='';}
					$optionsdetails = App\Http\Controllers\webCartController::getOptionsDtailsOrder($orderList->id);
					
                    $unitprice = $orderList->unit_price;
                    $subtotalprice = $unitprice*$orderList->quantity;
                    
                    ?>
						<tr id="cart-<?php echo e($orderList->id); ?>">
							<td>
                            <?php if(!empty($productDetails->id)): ?>
                            <a href="<?php echo e(url('details/'.$productDetails->id.'/'.$productDetails->slug)); ?>">
								<div class="tt-product-img">
									<img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php echo e($prodImage); ?>" alt="<?php if(!empty($productDetails['title_'.$strLang])): ?><?php echo e($productDetails['title_'.$strLang]); ?><?php endif; ?>">
								</div></a>
                                <?php else: ?>
                                <div class="tt-product-img">
									<img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php echo e(url('uploads/no-image.png')); ?>" alt="<?php if(!empty($productDetails['title_'.$strLang])): ?><?php echo e($productDetails['title_'.$strLang]); ?><?php endif; ?>">
								</div>
                                <?php endif; ?>
							</td>
							<td>
								<h2 class="tt-title">
                                <?php if(!empty($productDetails->id)): ?>
									<a href="<?php echo e(url('details/'.$productDetails->id.'/'.$productDetails->slug)); ?>"><?php if(!empty($productDetails['title_'.$strLang])): ?><?php echo e($productDetails['title_'.$strLang]); ?><?php endif; ?></a>
                                    <?php endif; ?>
								</h2>
								<ul class="tt-list-description">
									<?php echo $sizeName; ?>

									<?php echo $colorName; ?>

									<?php echo $optionsdetails; ?>

                                    <?php echo $warrantyTxt; ?>

								</ul>
								<ul class="tt-list-parameters">
									<li>
										<div class="tt-price">
											<?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <?php echo e($unitprice); ?>

										</div>
									</li>
									<li>
										<div class="detach-quantity-mobile"></div>
									</li>
									<li>
										<div class="tt-price subtotal">
											<?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <span class="subtotal_result<?php echo e($orderList->id); ?>"><?php echo e($subtotalprice); ?></span>
										</div>
									</li>
								</ul>
							</td>
							<td>
								<div class="tt-price">
									<?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <?php echo e($unitprice); ?>

								</div>
							</td>
							<td>
								<div class="detach-quantity-desctope">
									<div class="tt-input-counter style-01">
										<?php echo e($orderList->quantity); ?>

									</div>
								</div>
							</td>
							<td align="center">
								<div class="tt-price subtotal" align="center">
									<?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <span class="subtotal_result<?php echo e($orderList->id); ?>"><?php echo e($subtotalprice); ?></span>
								</div>
							</td>
							
						</tr>
                        <?php
                        $totalprice+=$subtotalprice;
                        ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                        <?php endif; ?>
                        					
					</tbody>
				</table>
				
			</div>
            <div class="tt-shopcart-col">
				<div class="row">
					<div class="col-md-6 col-lg-8">
			
			<?php if(!empty($orderDetails->order_id)): ?>
			
			<?php
            $TransDetails = App\Http\Controllers\webCartController::TransDetails($orderDetails->order_id);	
			
			?>	
            <?php if(!empty($TransDetails->id)): ?>					
						<div class="tt-shopcart-box">
							<h4 class="tt-collapse-title"><?php echo e(strtoupper(trans('webMessage.transactiondetails'))); ?></h4>
                            <br><br>
                            
							    <div class="row">
                                <?php if(!empty($TransDetails['payment_id'])): ?>
					            <div class="col-lg-6">
							    <div class="form-group">
									<label><?php echo e(trans('webMessage.paymentid')); ?> : <?php echo e($TransDetails['payment_id']); ?></label>
								</div>
								</div>
                                <?php endif; ?>
                                <?php if(!empty($TransDetails['trackid'])): ?>
								<div class="col-lg-6">
							    <div class="form-group">
									<label><?php echo e(trans('webMessage.trackid')); ?> : <?php echo e($TransDetails['trackid']); ?> </label>
								</div>
								</div>
                                <?php endif; ?>
                                <?php if(!empty($TransDetails['tranid'])): ?>
								<div class="col-lg-6">
							    <div class="form-group">
									<label><?php echo e(trans('webMessage.transid')); ?> : <?php echo e($TransDetails['tranid']); ?> </label>
								</div>
								</div>
						
                                <?php endif; ?>
                                <?php if(!empty($TransDetails['paypal_cart'])): ?>
								<div class="col-lg-6">
							    <div class="form-group">
									<label><?php echo e(trans('webMessage.transid')); ?> : <?php echo e($TransDetails['paypal_cart']); ?> </label>
								</div>
								</div>
						
                                <?php endif; ?>
								<?php 
                                if(!empty($TransDetails['presult']) && $TransDetails['presult']=='CAPTURED'){$color='#009900';}else{$color='#ff0000';}
                                ?>
						
					            <div class="col-lg-6">
							    <div class="form-group">
									<label><?php echo e(trans('webMessage.result')); ?> : <?php if(!empty($TransDetails['presult'])): ?> <font color="<?php echo e($color); ?>"> <?php echo e($TransDetails['presult']); ?> </font> <?php endif; ?></label>
								</div>
								</div>
                                <?php if(!empty($TransDetails['udf2'])): ?>
								<div class="col-lg-6">
							    <div class="form-group">
									<label><?php echo e(trans('webMessage.amount')); ?> :  <?php echo e($TransDetails['udf2'].' '.trans('webMessage.kd')); ?></label>
								</div>
								</div>
                                 <?php endif; ?>
                                 <?php if(!empty($TransDetails['amt_dollar'])): ?>
								<div class="col-lg-6">
							    <div class="form-group">
									<label><?php echo e(trans('webMessage.amount')); ?> : <font color="#009900"><?php echo e(trans('webMessage.usd').''.$TransDetails['amt_dollar']); ?></font></label>
								</div>
								</div>
                                 <?php endif; ?>
								<div class="col-lg-6">
							    <div class="form-group">
									<label><?php echo e(trans('webMessage.date')); ?> : <?php if(!empty($TransDetails['created_at'])): ?> <?php echo e($TransDetails['created_at']); ?> <?php endif; ?></label>
								</div>
								</div>
								</div>
								
						</div>
						
			         <?php endif; ?>
					 <?php endif; ?>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="tt-shopcart-box tt-boredr-large">
							<table class="tt-shopcart-table01">
								<tbody>
									<tr>
										<th><?php echo e(strtoupper(__('webMessage.subtotal'))); ?></th>
										<td><?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <?php echo e($totalprice); ?></td>
									</tr>
                                    <?php if(!empty($orderDetails->seller_discount)): ?> 
                                    <tr>
										<th><?php echo e(strtoupper(__('webMessage.seller_discount'))); ?></th>
										<td><font color="#FF0000">-<?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <?php echo e($orderDetails->seller_discount); ?></font></td>
									</tr>
                                    <?php
                                    $totalprice=$totalprice-$orderDetails->seller_discount;
                                    ?> 
                                    <?php endif; ?>
                                   <?php if(!empty($orderDetails->coupon_code) && empty($orderDetails->coupon_free)): ?> 
                                    <tr>
										<th><?php echo e(strtoupper(__('webMessage.coupon_discount'))); ?></th>
										<td><font color="#FF0000">-<?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <?php echo e($orderDetails->coupon_amount); ?></font></td>
									</tr>
                                   <?php
                                   $totalprice=$totalprice-$orderDetails['coupon_amount'];
                                   ?> 
                                   <?php endif; ?> 
                                   <?php if(!empty($orderDetails['coupon_code']) && !empty($orderDetails['coupon_free'])): ?>
                                   <tr>
										<th><?php echo e(strtoupper(__('webMessage.coupon_discount'))); ?></th>
										<td><font color="#FF0000"><?php echo e(strtoupper(__('webMessage.free_delivery'))); ?></font></td>
									</tr>
                                   <?php endif; ?>
                                   <?php if(empty($orderDetails->delivery_charges)): ?>
                                   <tr>
										<th><?php echo e(strtoupper(__('webMessage.delivery_charge'))); ?></th>
										<td><font color="#FF0000"><?php echo e(strtoupper(__('webMessage.free_delivery'))); ?></font></td>
									</tr>
                                   <?php endif; ?>
                                   
                                   <?php if(!empty($orderDetails['delivery_charges']) && empty($orderDetails['coupon_free'])): ?>
                                   <?php
                                   $deliveryCharge = $orderDetails['delivery_charges'];
                                   ?>
                                    <tr>
										<th><?php echo e(strtoupper(__('webMessage.delivery_charge'))); ?></th>
										<td><?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <?php echo e($deliveryCharge); ?></td>
									</tr>
                                    <?php
                                   $totalprice=$totalprice+$deliveryCharge;
                                   ?>
                                    <?php endif; ?>
								</tbody>
								<tfoot>
									<tr>
										<th><?php echo e(strtoupper(__('webMessage.grandtotal'))); ?></th>
										<td><?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <span class="total_result"><?php echo e($totalprice); ?></span></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
            
            </div>
                        </div>    
                            <!-- end shopping cart -->
                            
				<div class="row" style="border:1px #CCCCCC solid;margin-top:20px;padding:20px;border-radius:5px;">
                 <div class="col-lg-12">
                 <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="name"><?php echo e(__('webMessage.name')); ?> : <?php if($orderDetails->name): ?> <?php echo e($orderDetails->name); ?><?php else: ?> -- <?php endif; ?></label>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="email"><?php echo e(__('webMessage.email')); ?> : <?php if($orderDetails->email): ?> <?php echo e($orderDetails->email); ?><?php else: ?> -- <?php endif; ?></label>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="mobile"><?php echo e(__('webMessage.mobile')); ?> : <?php if($orderDetails->mobile): ?> <?php echo e($orderDetails->mobile); ?><?php else: ?> -- <?php endif; ?></label>
                                    </div>
                                    </div>
                                    </div>
                                    
                                    <?php
                                    $countryInfo = App\Http\Controllers\webCartController::get_csa_info($orderDetails->country_id);
                                    $stateInfo   = App\Http\Controllers\webCartController::get_csa_info($orderDetails->state_id);
                                    $areaInfo    = App\Http\Controllers\webCartController::get_csa_info($orderDetails->area_id);
                                    ?>       
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="country"><?php echo e(__('webMessage.country')); ?> : <?php if($orderDetails->country_id): ?> <?php echo e($countryInfo['name_'.$strLang]); ?><?php else: ?> -- <?php endif; ?></label>
									</div>
                                    </div>
                                     
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="state"><?php echo e(__('webMessage.state')); ?> : <?php if($orderDetails->state_id): ?> <?php echo e($stateInfo['name_'.$strLang]); ?><?php else: ?> -- <?php endif; ?></label>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="area"><?php echo e(__('webMessage.area')); ?> : <?php if($orderDetails->area_id): ?> <?php echo e($areaInfo['name_'.$strLang]); ?> <?php endif; ?></label>
									</div>
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="block"><?php echo e(__('webMessage.block')); ?> : <?php if($orderDetails->block): ?> <?php echo e($orderDetails['block']); ?><?php else: ?> -- <?php endif; ?></label>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="street"><?php echo e(__('webMessage.street')); ?> : <?php if($orderDetails->street): ?> <?php echo e($orderDetails['street']); ?><?php else: ?> -- <?php endif; ?></label>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="avenue"><?php echo e(__('webMessage.avenue')); ?> : <?php if($orderDetails->avenue): ?> <?php echo e($orderDetails['avenue']); ?><?php else: ?> -- <?php endif; ?></label>
                                    </div>
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="house"><?php echo e(__('webMessage.house')); ?> : <?php if($orderDetails['house']): ?> <?php echo e($orderDetails['house']); ?> <?php else: ?> -- <?php endif; ?></label>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="floor"><?php echo e(__('webMessage.floor')); ?> : <?php if($orderDetails['floor']): ?> <?php echo e($orderDetails['floor']); ?> <?php else: ?> -- <?php endif; ?></label>
									</div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="landmark"><?php echo e(__('webMessage.landmark')); ?> : <?php if($orderDetails->landmark): ?> <?php echo e($orderDetails['landmark']); ?> <?php else: ?> -- <?php endif; ?></label>
                                    </div>
                                    </div>
                                    </div>
                                    
                 </div>
                </div>			
	     </div>
            <?php else: ?>
            <div align="center"><p><?php echo e(__('webMessage.norecordfound')); ?></p></div>
            <?php endif; ?>
		</div>
	</div>
</div>
<!--footer-->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(url('assets/external/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/slick/slick.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/panelmenu/panelmenu.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/instafeed/instafeed.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/countdown/jquery.plugin.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/countdown/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/rs-plugin/js/jquery.themepunch.tools.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/rs-plugin/js/jquery.themepunch.revolution.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/external/lazyLoad/lazyload.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/main.js')); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>

</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/orderdetails.blade.php ENDPATH**/ ?>