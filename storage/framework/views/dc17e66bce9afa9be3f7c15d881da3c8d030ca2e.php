<?php
$settingInfo = App\Http\Controllers\webController::settings();
if(app()->getLocale()=="en"){$strLang="en";}else{$strLang="ar";}
use Illuminate\Support\Facades\Cookie;

if(!empty(Auth::guard('webs')->user()->is_seller)){
$userType=1;
}else{
$userType=0;
}
$pixelids =[];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.checkout')); ?></title>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
			<li><?php echo e(__('webMessage.checkout')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.checkout')); ?></h1>
			<form style="margin-top:0;" id="checkoutform" class="contact-form" method="post" novalidate action="<?php echo e(route('checkoutconfirmform')); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">   
            <?php if(!empty($tempOrders) && count($tempOrders)>0): ?>
            <div class="tt-collapse-block">
		
		    <div class="row">
            <div class="col-lg-12">
            <a style="padding-left:10px;padding-right:10px;background-color: #FFB900;" href="<?php echo e(url('/cart')); ?>" class="btn btn-lg float-<?php echo e(__('webMessage.align')); ?>"><span class="icon icon-check_circle"></span><?php echo e(strtoupper(__('webMessage.backtoshoppingcart'))); ?></a>
            <button style="padding-left:10px;padding-right:10px;" type="submit" class="btn btn-lg float-<?php echo e(__('webMessage.oalign')); ?>"><?php echo e(strtoupper(__('webMessage.orderconfirm'))); ?></button>
		    </div>
            </div>
             <!--end shopping cart start -->
<?php if($errors->any()): ?>
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="alert alert-danger"><?php echo e($error); ?></div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
            <div class="row" style="border:1px #CCCCCC solid;margin-top:20px;padding:20px;border-radius:5px;">
            <div class="col-lg-12">
            <h4 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.shoppingcart'))); ?></h4>
            <span id="result_reponse_cart"></span>
            
            <div class="tt-shopcart-table-02">
				<table>
                    <thead class="tt-hidden-mobile">
                    <tr>
                    <th style="border-top:1px #FFFFFF solid;"><?php echo e(__('webMessage.image')); ?></th>
                    <th style="border-top:1px #FFFFFF solid;"><?php echo e(__('webMessage.details')); ?></th>
                    <th style="border-top:1px #FFFFFF solid;"><?php echo e(__('webMessage.unit_price')); ?></th>
                    <th style="border-top:1px #FFFFFF solid;"><?php echo e(__('webMessage.quantity')); ?></th>
                    <th style="border-top:1px #FFFFFF solid;"><?php echo e(__('webMessage.subtotal')); ?></th>
                    </tr>
                    </thead>
					<tbody>
                    <?php
                    $unitprice=0;
                    $subtotalprice=0;
                    $totalprice=0;
                    
                    ?>
                    <?php $__currentLoopData = $tempOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $productDetails =App\Http\Controllers\webCartController::getProductDetails($tempOrder->product_id);
                    $pixelids[]=$tempOrder->product_id;
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
                    
					$optionsDetails = App\Http\Controllers\webCartController::getOptionsDtails($tempOrder->id);
                    
                    if(!empty($tempOrder->size_id)){
                    $sizeName =App\Http\Controllers\webCartController::sizeNameStatic($tempOrder->size_id,$strLang);
                    $sizeName = '<li>'.trans('webMessage.size').':'.$sizeName.'</li>';
                    }else{$sizeName='';}
                    if(!empty($tempOrder->color_id)){
                    $colorName =App\Http\Controllers\webCartController::colorNameStatic($tempOrder->color_id,$strLang);
                    $colorName = '<li>'.trans('webMessage.color').':'.$colorName.'</li>';
                    //color image
                    $colorImageDetails = App\Http\Controllers\webCartController::getColorImage($tempOrder->product_id,$tempOrder->color_id);
                    if(!empty($colorImageDetails->color_image)){
                    $prodImage = url('uploads/product/colors/thumb/'.$colorImageDetails->color_image);
                    }
                    }else{$colorName='';}
                    $unitprice = $tempOrder->unit_price;
                    $subtotalprice = round(($unitprice*$tempOrder->quantity),3);
                    $aquantity = App\Http\Controllers\webCartController::getProductQuantity($tempOrder->product_id,$tempOrder->size_id,$tempOrder->color_id);
                    ?>
						<tr id="cart-<?php echo e($tempOrder->id); ?>" <?php if(empty($aquantity)): ?> style="background-color:#FF6633;" <?php endif; ?> >
							<td><a href="<?php echo e(url('details/'.$productDetails->id.'/'.$productDetails->slug)); ?>">
								<div class="tt-product-img">
									<img src="<?php echo e(url('assets/images/loader.svg')); ?>" data-src="<?php echo e($prodImage); ?>" alt="<?php if(!empty($productDetails['title_'.$strLang])): ?><?php echo e($productDetails['title_'.$strLang]); ?><?php endif; ?>">
								</div></a>
							</td>
							<td>
								<h2 class="tt-title">
									<a href="<?php echo e(url('details/'.$productDetails->id.'/'.$productDetails->slug)); ?>"><?php if(!empty($productDetails['title_'.$strLang])): ?><?php echo e($productDetails['title_'.$strLang]); ?><?php endif; ?></a>
								</h2>
								<ul class="tt-list-description">
									<?php echo $sizeName; ?>

									<?php echo $colorName; ?>

									<?php echo $optionsDetails; ?>

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
											<?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <span class="subtotal_result<?php echo e($tempOrder->id); ?>"><?php echo e($subtotalprice); ?></span>
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
										<?php echo e($tempOrder->quantity); ?>

									</div>
								</div>
							</td>
							<td align="center">
								<div class="tt-price subtotal" align="center">
									<?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <span class="subtotal_result<?php echo e($tempOrder->id); ?>"><?php echo e($subtotalprice); ?></span>
								</div>
							</td>
							
						</tr>
                        <?php
                        $totalprice+=$subtotalprice;
                        ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                        					
					</tbody>
				</table>
                <?php
                $checktotal = $totalprice;
                ?>
				<input type="hidden" name="checkout_totalprice" id="checkout_totalprice" value="<?php echo e($totalprice); ?>">
			</div>
            <div class="tt-shopcart-col">
				<div class="row">
					<div class="col-md-6 col-lg-8">
                    <div class="tt-shopcart-box tt-boredr-large">
                                    <?php if(!empty($userType)): ?>
                                    <?php
                                    $cdate = date("Y-m-d");
                                    $defaultDeliveryDate = date("Y-m-d",strtotime($cdate.'+1 day'));
                                    ?>
                                    <div class="row form-default">
                                    <div class="col-xs-12 col-md-3 col-lg-3">
										<div class="form-group">
                                        <label><?php echo e(__('webMessage.delivery_date')); ?>*</label>
										<input type="text" name="delivery_date"  class="form-control" id="delivery_date" placeholder="<?php echo e(__('webMessage.enter_delivery_date')); ?>" autcomplete="off" value="<?php if(Cookie::get('gb_delivery_date')): ?><?php echo e(Cookie::get('gb_delivery_date')); ?><?php else: ?><?php echo e($defaultDeliveryDate); ?><?php endif; ?>">
										</div>
                                    </div>
                                    <div class="col-xs-12 col-md-3 col-lg-3">
										<div class="form-group">
                                        <label><?php echo e(__('webMessage.seller_discount')); ?>*</label>
										<input type="text" name="seller_discount"  class="form-control" id="seller_discount" placeholder="<?php echo e(__('webMessage.enter_seller_discount')); ?>" autcomplete="off" value="<?php if(Cookie::get('gb_seller_discount')): ?><?php echo e(Cookie::get('gb_seller_discount')); ?><?php endif; ?>">
										</div>
                                    </div>
                                    <div class="col-xs-12 col-md-2 col-lg-2">
                                       <div class="form-group">
										<button style="margin-top:24px;" class="btn btn-border applyselletdiscountbtn" type="button"><?php echo e(__('webMessage.apply')); ?></button>
                                        </div>                                        
                                    </div>
                                    <div class="col-xs-12 col-md-4 col-lg-4">
								
										<span id="result_coupon"></span>
									
                                    </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.applycoupon'))); ?></div>
                                    
                                    <div class="row form-default">
                                    <div class="col-xs-12 col-md-4 col-lg-4">
										<div class="form-group">
										<input type="text" name="coupon_code"  class="form-control" id="coupon_code" placeholder="<?php echo e(__('webMessage.enter_coupon_code')); ?>" autcomplete="off" value="<?php if(Cookie::get('gb_coupon_code')): ?><?php echo e(Cookie::get('gb_coupon_code')); ?><?php endif; ?>">
										</div>
                                    </div>
                                    <div class="col-xs-12 col-md-4 col-lg-4">
										<button style="margin-top:0;" class="btn btn-border applycouponbtn" type="button"><?php echo e(__('webMessage.apply')); ?></button>
                                    </div>
                                    <div class="col-xs-12 col-md-4 col-lg-4">
										<div class="form-group">
										<span id="result_coupon"></span>
										</div>
                                    </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    
                        </div>
                    </div>
					<div class="col-md-6 col-lg-4">
						<div class="tt-shopcart-box tt-boredr-large" id='checktotalbox'>
							<table class="tt-shopcart-table01">
								<tbody>
									<tr>
										<th><?php echo e(strtoupper(__('webMessage.subtotal'))); ?></th>
										<td><?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <span class="total_result"><?php echo e($totalprice); ?></span></td>
									</tr>
                                    
                                    
                                   <?php if(!empty(Cookie::get('gb_seller_discount'))): ?>
                                   <?php
                                   $totalprice=$totalprice-Cookie::get('gb_seller_discount');
                                   ?>
                                   <tr>
										<th><?php echo e(strtoupper(__('webMessage.seller_discount'))); ?></th>
										<td><font color="#FF0000">-<?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <?php echo e(Cookie::get('gb_seller_discount')); ?></font></td>
									</tr>
                                   <?php endif; ?>
                                   
                                   <?php if(!empty(Cookie::get('gb_coupon_code')) && empty(Cookie::get('gb_coupon_free'))): ?> 
                                    <tr>
										<th><?php echo e(strtoupper(__('webMessage.coupon_discount'))); ?></th>
										<td><font color="#FF0000">-<?php echo e(Cookie::get('gb_coupon_discount_text')); ?></font></td>
									</tr>
                                   <?php
                                   $totalprice=$totalprice-Cookie::get('gb_coupon_discount');
                                   ?> 
                                   <?php endif; ?> 
                                   
                                   <?php if(!empty($settingInfo->is_free_delivery) && $totalprice>=$settingInfo->free_delivery_amount): ?>
                                   <tr>
										<th><?php echo e(strtoupper(__('webMessage.delivery_charge'))); ?></th>
										<td><font color="#FF0000"><?php echo e(strtoupper(__('webMessage.free_delivery'))); ?></font></td>
									</tr>
                                   <?php else: ?>
                                   <?php if(!empty(Cookie::get('gb_coupon_code')) && !empty(Cookie::get('gb_coupon_free'))): ?>
                                   <tr>
										<th><?php echo e(strtoupper(__('webMessage.coupon_discount'))); ?></th>
										<td><font color="#FF0000"><?php echo e(strtoupper(__('webMessage.free_delivery'))); ?></font></td>
									</tr>
                                   <?php endif; ?>
                                   
                                   <?php if((!empty(Cookie::get('area')) || !empty($userAddress->area_id)) && empty(Cookie::get('gb_coupon_free'))): ?>
                                   <?php
							       if(!empty(Cookie::get('area'))){ $areaid = Cookie::get('area'); }else if(!empty($userAddress->area_id)){ $areaid = $userAddress->area_id; }
                                   $deliveryCharge = App\Http\Controllers\webCartController::get_delivery_charge($areaid);
                                   ?>
                                    <tr>
										<th><?php echo e(strtoupper(__('webMessage.delivery_charge'))); ?></th>
										<td><?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <?php echo e($deliveryCharge); ?></td>
									</tr>
                                    <?php
                                   $totalprice=$totalprice+$deliveryCharge;
                                   ?>
                                   <?php endif; ?>
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
            <?php if(!empty($settingInfo->min_order_amount) && $settingInfo->min_order_amount>$checktotal): ?>
            <div class="row" style="border:1px #CCCCCC solid;margin-top:20px;padding:20px;border-radius:5px; background-color: #FFE7CE">
            <div class="col-lg-12 text-center">
            <h3><?php echo trans('webMessage.minimumordermessage'); ?> <font color="#FF6600"><?php echo e(number_format($settingInfo->min_order_amount,3)); ?> <?php echo e(trans('webMessage.kd')); ?></font></h3>
            <p>
            <a style="background-color: #FFB900;" href="<?php echo e(url('/cart')); ?>" class="btn btn-lg btn-info"><span class="icon icon-check_circle"></span><?php echo e(strtoupper(__('webMessage.backtoshoppingcart'))); ?></a>
            </p>
            </div>
            </div>
            <?php else: ?>
            <!--end shopping cart start -->
            <?php if(!empty($userType)): ?>
            <div class="row" style="border:1px #CCCCCC solid;margin-top:20px;padding:20px;border-radius:5px;">
            <div class="col-lg-12">
            <!--deliveryaddress start-->
            <h4 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.deliveryaddress'))); ?></h4>
                                    <?php if(empty($userType)): ?>
                                    <?php
                                    $customerAddress = App\Http\Controllers\webCartController::customerAddress();
                                    ?>
                                    <?php if(!empty($customerAddress) && count($customerAddress)>0): ?>
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <select name="myaddress" id="myaddress" class="form-control" >
                                    <option value="0"><?php echo e(__('webMessage.chooseaddress')); ?></option>
                                    <?php $__currentLoopData = $customerAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($custaddress->id); ?>" <?php if((!empty(Cookie::get('address_id')) && $custaddress->id==Cookie::get('address_id')) || (!empty($address->id) && $custaddress->id==$address->id)): ?> selected <?php endif; ?> > <?php echo e($custaddress->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                    </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
									<?php
                                    if(!empty($userType)){
                                    $name = 'Customer';
                                    }else if(old('name')){
                                    $name = old('name');
                                    }elseif(!empty($userDetailsCheckout->name)){
                                    $name = $userDetailsCheckout->name;
                                    }elseif(Cookie::get('name')){
                                    $name = Cookie::get('name');
                                    }
                                    ?>
            
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="name"><?php echo e(__('webMessage.name')); ?><font color="#FF0000">*</font></label>
									<input type="text" name="name"  class="form-control" id="name" placeholder="<?php echo e(__('webMessage.enter_name')); ?>" autcomplete="off" value="<?php echo e($name); ?>">
                                    <?php if($errors->has('name')): ?>
                                    <label id="name-error" class="error" for="name"><?php echo e($errors->first('name')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="email"><?php echo e(__('webMessage.email')); ?></label>
                                    <input type="text" name="email"  class="form-control" id="email" placeholder="<?php echo e(__('webMessage.enter_email')); ?>" autcomplete="off" value="<?php if(old('email')): ?><?php echo e(old('email')); ?><?php endif; ?>">
                                    <?php if($errors->has('email')): ?>
                                    <label id="email-error" class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="mobile"><?php echo e(__('webMessage.mobile')); ?><font color="#FF0000">*</font></label>
                                    <input  type="text" name="mobile"  class="form-control" id="mobile" placeholder="<?php echo e(__('webMessage.enter_mobile')); ?>" autcomplete="off" value="<?php if(old('mobile')): ?><?php echo e(old('mobile')); ?><?php endif; ?>">
                                    <?php if($errors->has('mobile')): ?>
                                    <label id="mobile-error" class="error" for="mobile"><?php echo e($errors->first('mobile')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    </div>
                                    
                                    
                                    <?php
                                    $countryid=0;
                                    $countryLists = App\Http\Controllers\webCartController::get_country($countryid);
                                    $defaultcountry=2;
                                    ?>       
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="country"><?php echo e(__('webMessage.country')); ?><font color="#FF0000">*</font></label>
									<select name="country"  class="form-control country_checkout_form" id="country" >
                                    <option value="0"><?php echo e(__('webMessage.choosecountry')); ?></option>
                                    <?php if(!empty($countryLists) && count($countryLists)>0): ?>
                                    <?php $__currentLoopData = $countryLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($countryList->id); ?>" <?php if((!empty(old('country')) && old('country')==$countryList->id) || (!empty($address->country_id) && $address->country_id==$countryList->id) || (!empty(Cookie::get('country')) && Cookie::get('country')==$countryList->id) || (!empty($defaultcountry) && $defaultcountry==$countryList->id) ): ?> selected <?php endif; ?> ><?php echo e($countryList['name_'.$strLang]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </select>
                                    <?php if($errors->has('country')): ?>
                                    <label id="country-error" class="error" for="country"><?php echo e($errors->first('country')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="state"><?php echo e(__('webMessage.state')); ?><font color="#FF0000">*</font></label>
									<select name="state"  class="form-control state_checkout_form" id="state" >
                                    <option value="0"><?php echo e(__('webMessage.choosestate')); ?></option>
                                    <?php if(!empty(Cookie::get('country')) || !empty(old('country')) || !empty($defaultcountry)): ?>
                                    <?php
                                    if(!empty(old('country'))){$country_id=old('country');}elseif(!empty(Cookie::get('country'))){$country_id=Cookie::get('country');}else{$country_id=$defaultcountry;}
                                    $stateLists = App\Http\Controllers\webCartController::get_country($country_id);
                                    ?>
                                    <?php $__currentLoopData = $stateLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stateList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($stateList->id); ?>" <?php if((!empty(old('state')) && old('state')==$stateList->id)): ?> ||(!empty(Cookie::get('state')) && Cookie::get('state')==$stateList->id)) selected <?php endif; ?> ><?php echo e($stateList['name_'.$strLang]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </select>
                                    <?php if($errors->has('state')): ?>
                                    <label id="state-error" class="error" for="state"><?php echo e($errors->first('state')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="area"><?php echo e(__('webMessage.area')); ?><font color="#FF0000">*</font></label>
									<select name="area"  class="form-control area_checkout" id="area" >
                                    <option value="0"><?php echo e(__('webMessage.choosearea')); ?></option>
                                    <?php if(!empty(Cookie::get('state')) || !empty(old('state')) || !empty($address->state_id)): ?>
                                    <?php
                                    if(!empty(old('state'))){$state_id=old('state');}else{$state_id=Cookie::get('state');}
                                    $areaLists = App\Http\Controllers\webCartController::get_country($state_id);
                                    ?>
                                    <?php $__currentLoopData = $areaLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $areaList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($areaList->id); ?>" <?php if((!empty(old('area')) && old('area')==$areaList->id)): ?> ||(!empty(Cookie::get('area')) && Cookie::get('area')==$areaList->id)) selected <?php endif; ?> ><?php echo e($areaList['name_'.$strLang]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </select>
                                    <?php if($errors->has('area')): ?>
                                    <label id="area-error" class="error" for="area"><?php echo e($errors->first('area')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    </div>
                                    
                
                                   <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="block"><?php echo e(__('webMessage.block')); ?></label>
									<input type="text" name="block"  class="form-control" id="block" placeholder="<?php echo e(__('webMessage.enter_block')); ?>" autcomplete="off" value="<?php if(old('block')): ?><?php echo e(old('block')); ?><?php endif; ?>">
                                    <?php if($errors->has('block')): ?>
                                    <label id="block-error" class="error" for="block"><?php echo e($errors->first('block')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="street"><?php echo e(__('webMessage.street')); ?></label>
                                    <input type="text" name="street"  class="form-control" id="street" placeholder="<?php echo e(__('webMessage.enter_street')); ?>" autcomplete="off" value="<?php if(old('street')): ?><?php echo e(old('street')); ?><?php endif; ?>">
                                    <?php if($errors->has('street')): ?>
                                    <label id="street-error" class="error" for="street"><?php echo e($errors->first('street')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="avenue"><?php echo e(__('webMessage.avenue')); ?></label>
                                    <input type="text" name="avenue"  class="form-control" id="avenue" placeholder="<?php echo e(__('webMessage.enter_avenue')); ?>" autcomplete="off" value="<?php if(old('avenue')): ?><?php echo e(old('avenue')); ?><?php endif; ?>">
                                    <?php if($errors->has('avenue')): ?>
                                    <label id="avenue-error" class="error" for="avenue"><?php echo e($errors->first('avenue')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    </div>
                
                
                            <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="house"><?php echo e(__('webMessage.house')); ?></label>
                                    <input type="text" name="house"  class="form-control" id="house" placeholder="<?php echo e(__('webMessage.enter_house')); ?>" autcomplete="off" value="<?php if(old('house')): ?><?php echo e(old('house')); ?><?php endif; ?>">
                                    <?php if($errors->has('house')): ?>
                                    <label id="house-error" class="error" for="house"><?php echo e($errors->first('house')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="floor"><?php echo e(__('webMessage.floor')); ?></label>
									<input type="text" name="floor"  class="form-control" id="floor" placeholder="<?php echo e(__('webMessage.enter_floor')); ?>" autcomplete="off" value="<?php if(old('floor')): ?><?php echo e(old('floor')); ?><?php endif; ?>">
                                    <?php if($errors->has('floor')): ?>
                                    <label id="floor-error" class="error" for="floor"><?php echo e($errors->first('floor')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="landmark"><?php echo e(__('webMessage.landmark')); ?></label>
                                    <input type="text" name="landmark"  class="form-control" id="landmark" placeholder="<?php echo e(__('webMessage.enter_landmark')); ?>" autcomplete="off" value="<?php if(old('landmark')): ?><?php echo e(old('landmark')); ?><?php endif; ?>">
                                    <?php if($errors->has('landmark')): ?>
                                    <label id="landmark-error" class="error" for="landmark"><?php echo e($errors->first('landmark')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                            </div> 
                 					
                                    <?php
                                    $deliverytimeslists = App\Http\Controllers\webCartController::listDeliveryTimes();
                                    ?>
                                    <?php if(!empty($deliverytimeslists) && count($deliverytimeslists)>0): ?>
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                     <label for="delivery_time"><?php echo e(__('webMessage.deliverytime')); ?></label>
                                    <select name="delivery_time" id="delivery_time" class="form-control" >
                                    <option value="0"><?php echo e(__('webMessage.choosedeliverytimes')); ?></option>
                                    <?php $__currentLoopData = $deliverytimeslists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliverytimeslist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($deliverytimeslist->id); ?>" ><?php echo e($strLang=="en"?$deliverytimeslist->title_en:$deliverytimeslist->title_ar); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                    </div>
                                    </div>
                                    <?php endif; ?>        
                                    	 
            <!--end deliveryaddress start-->
            </div>
            </div>
            <?php else: ?>
			<div class="row" style="border:1px #CCCCCC solid;margin-top:20px;padding:20px;border-radius:5px;">
            <div class="col-lg-12">
            <!--deliveryaddress start-->
            <h4 class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.deliveryaddress'))); ?></h4>
                                    <?php if(empty($userType)): ?>
                                    <?php
                                    $customerAddress = App\Http\Controllers\webCartController::customerAddress();
                                    ?>
                                    <?php if(!empty($customerAddress) && count($customerAddress)>0): ?>
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <select name="myaddress" id="myaddress" class="form-control" >
                                    <option value="0"><?php echo e(__('webMessage.chooseaddress')); ?></option>
                                    <?php $__currentLoopData = $customerAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($custaddress->id); ?>" <?php if((!empty(Cookie::get('address_id')) && $custaddress->id==Cookie::get('address_id')) || (!empty($address->id) && $custaddress->id==$address->id)): ?> selected <?php endif; ?> ><?php echo e($custaddress->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                    </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
									<?php
                                    $name='';
                                    if(!empty($userType)){
                                    $name = 'Customer';
                                    }else if(old('name')){
                                    $name = old('name');
                                    }elseif(!empty($userDetailsCheckout->name)){
                                    $name = $userDetailsCheckout->name;
                                    }elseif(Cookie::get('name')){
                                    $name = Cookie::get('name');
                                    }
                                    ?>
            
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="name"><?php echo e(__('webMessage.name')); ?><font color="#FF0000">*</font></label>
									<input type="text" name="name"  class="form-control" id="name" placeholder="<?php echo e(__('webMessage.enter_name')); ?>" autcomplete="off" value="<?php echo e($name); ?>">
                                    <?php if($errors->has('name')): ?>
                                    <label id="name-error" class="error" for="name"><?php echo e($errors->first('name')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="email"><?php echo e(__('webMessage.email')); ?></label>
                                    <input type="text" name="email"  class="form-control" id="email" placeholder="<?php echo e(__('webMessage.enter_email')); ?>" autcomplete="off" value="<?php if(old('email')): ?><?php echo e(old('email')); ?><?php elseif(!empty($userDetailsCheckout->email)): ?><?php echo e($userDetailsCheckout->email); ?><?php elseif(Cookie::get('email')): ?><?php echo e(Cookie::get('email')); ?><?php endif; ?>">
                                    <?php if($errors->has('email')): ?>
                                    <label id="email-error" class="error" for="email"><?php echo e($errors->first('email')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label for="mobile"><?php echo e(__('webMessage.mobile')); ?><font color="#FF0000">*</font></label>
                                    <input maxlength="8" size="8" type="text" name="mobile"  class="form-control" id="mobile" placeholder="<?php echo e(__('webMessage.enter_mobile')); ?>" autcomplete="off" value="<?php if(old('mobile')): ?><?php echo e(old('mobile')); ?><?php elseif(!empty($userDetailsCheckout->mobile)): ?><?php echo e($userDetailsCheckout->mobile); ?><?php elseif(Cookie::get('mobile')): ?><?php echo e(Cookie::get('mobile')); ?><?php endif; ?>">
                                    <?php if($errors->has('mobile')): ?>
                                    <label id="mobile-error" class="error" for="mobile"><?php echo e($errors->first('mobile')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    </div>
                                    
                                    
                                    <?php
                                    $areaid  = !empty(Cookie::get('area'))?Cookie::get('area'):(!empty($userDetailsCheckout->area)?$userDetailsCheckout->area:'0');
                                    $areatxt = App\Http\Controllers\webCartController::get_kuwait_areas($areaid);
                                    ?>       
                                    <div class="row">
                                    
                                    <div class="col-xs-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                    <label for="area"><?php echo e(__('webMessage.area')); ?><font color="#FF0000">*</font></label>
									<select name="area"  class="form-control area_checkout" id="area" >
                                    <option value="0"><?php echo e(__('webMessage.choosearea')); ?></option>
                                    <?php echo $areatxt; ?>

                                    </select>
                                    <?php if($errors->has('area')): ?>
                                    <label id="area-error" class="error" for="area"><?php echo e($errors->first('area')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                    <label for="block"><?php echo e(__('webMessage.block')); ?><font color="#FF0000">*</font></label>
									<input type="text" name="block"  class="form-control" id="block" placeholder="<?php echo e(__('webMessage.enter_block')); ?>" autcomplete="off" value="<?php if(old('block')): ?><?php echo e(old('block')); ?><?php elseif(!empty($address->block)): ?><?php echo e($address->block); ?><?php elseif(Cookie::get('block')): ?><?php echo e(Cookie::get('block')); ?><?php endif; ?>">
                                    <?php if($errors->has('block')): ?>
                                    <label id="block-error" class="error" for="block"><?php echo e($errors->first('block')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                    <label for="street"><?php echo e(__('webMessage.street')); ?><font color="#FF0000">*</font></label>
                                    <input type="text" name="street"  class="form-control" id="street" placeholder="<?php echo e(__('webMessage.enter_street')); ?>" autcomplete="off" value="<?php if(old('street')): ?><?php echo e(old('street')); ?><?php elseif(!empty($address->street)): ?><?php echo e($address->street); ?><?php elseif(Cookie::get('street')): ?><?php echo e(Cookie::get('street')); ?><?php endif; ?>">
                                    <?php if($errors->has('street')): ?>
                                    <label id="street-error" class="error" for="street"><?php echo e($errors->first('street')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                    <label for="avenue"><?php echo e(__('webMessage.avenue')); ?></label>
                                    <input type="text" name="avenue"  class="form-control" id="avenue" placeholder="<?php echo e(__('webMessage.enter_avenue')); ?>" autcomplete="off" value="<?php if(old('avenue')): ?><?php echo e(old('avenue')); ?><?php elseif(!empty($address->avenue)): ?><?php echo e($address->avenue); ?><?php elseif(Cookie::get('avenue')): ?><?php echo e(Cookie::get('avenue')); ?><?php endif; ?>">
                                    <?php if($errors->has('avenue')): ?>
                                    <label id="avenue-error" class="error" for="avenue"><?php echo e($errors->first('avenue')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    
                                    </div>
                                    
                
                                   <div class="row">
                                    
                                    <div class="col-xs-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                    <label for="house"><?php echo e(__('webMessage.house')); ?><font color="#FF0000">*</font></label>
                                    <input type="text" name="house"  class="form-control" id="house" placeholder="<?php echo e(__('webMessage.enter_house')); ?>" autcomplete="off" value="<?php if(old('house')): ?><?php echo e(old('house')); ?><?php elseif(!empty($address->house)): ?><?php echo e($address->house); ?><?php elseif(Cookie::get('house')): ?><?php echo e(Cookie::get('house')); ?><?php endif; ?>">
                                    <?php if($errors->has('house')): ?>
                                    <label id="house-error" class="error" for="house"><?php echo e($errors->first('house')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                    <label for="floor"><?php echo e(__('webMessage.floor')); ?></label>
									<input type="text" name="floor"  class="form-control" id="floor" placeholder="<?php echo e(__('webMessage.enter_floor')); ?>" autcomplete="off" value="<?php if(old('floor')): ?><?php echo e(old('floor')); ?><?php elseif(!empty($address->floor)): ?><?php echo e($address->floor); ?><?php elseif(Cookie::get('floor')): ?><?php echo e(Cookie::get('floor')); ?><?php endif; ?>">
                                    <?php if($errors->has('floor')): ?>
                                    <label id="floor-error" class="error" for="floor"><?php echo e($errors->first('floor')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                    <label for="landmark"><?php echo e(__('webMessage.landmark')); ?></label>
                                    <input type="text" name="landmark"  class="form-control" id="landmark" placeholder="<?php echo e(__('webMessage.enter_landmark')); ?>" autcomplete="off" value="<?php if(old('landmark')): ?><?php echo e(old('landmark')); ?><?php elseif(Cookie::get('landmark')): ?><?php echo e(Cookie::get('landmark')); ?><?php endif; ?>">
                                    <?php if($errors->has('landmark')): ?>
                                    <label id="landmark-error" class="error" for="landmark"><?php echo e($errors->first('landmark')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                                    <?php
                                    $deliverytimeslists = App\Http\Controllers\webCartController::listDeliveryTimes();
                                    ?>
                                    <?php if(!empty($deliverytimeslists) && count($deliverytimeslists)>0): ?>
                            
                                    <div class="col-xs-12 col-md-6 col-lg-3">
                                    <div class="form-group">
                                     <label for="delivery_time"><?php echo e(__('webMessage.deliverytime')); ?></label>
                                    <select name="delivery_time" id="delivery_time" class="form-control" >
                                    <option value="0"><?php echo e(__('webMessage.choosedeliverytimes')); ?></option>
                                    <?php $__currentLoopData = $deliverytimeslists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliverytimeslist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($deliverytimeslist->id); ?>" ><?php echo e($strLang=="en"?$deliverytimeslist->title_en:$deliverytimeslist->title_ar); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                    </div>
                                
                                    <?php endif; ?>
                            </div> 
                            
                                    
                                    
                         <!--register my account -->
						 <?php if(empty(Auth::guard('webs')->user())): ?>
						 <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
									<div class="form-group"><br clear='all'>
                                    <div class="checkbox-group">
									<input type="checkbox" id="register_me" name="register_me" <?php if(old('register_me')): ?> checked <?php endif; ?>  value="1">
									<label for="register_me"><span class="check"></span><span class="box"></span>&nbsp;<?php echo e(__('webMessage.createanaccount')); ?></label>
								    </div>
                                    </div>
									</div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group"  <?php if(old('register_me')): ?> style="display:block;" <?php else: ?> id="username_box" <?php endif; ?> >
									<input type="text" name="username"  class="form-control" id="username" placeholder="<?php echo e(__('webMessage.username')); ?>" autcomplete="off" value="<?php if(old('username')): ?><?php echo e(old('username')); ?><?php endif; ?>">
                                    <?php if($errors->has('username')): ?>
                                    <label id="username-error" class="error" for="username"><?php echo e($errors->first('username')); ?></label>
                                    <?php endif; ?>
									</div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group"  <?php if(old('register_me')): ?> style="display:block;" <?php else: ?> id="password_box" <?php endif; ?>>
                                    <input type="password" name="password"  class="form-control" id="password" placeholder="<?php echo e(__('webMessage.password')); ?>" autcomplete="off" value="<?php if(old('password')): ?><?php echo e(old('password')); ?><?php endif; ?>">
                                    <?php if($errors->has('password')): ?>
                                    <label id="password-error" class="error" for="password"><?php echo e($errors->first('password')); ?></label>
                                    <?php endif; ?>
                                    </div>
                                    </div>
                            </div> 
							<?php endif; ?>
                         <!-- end register -->						 
            <!--end deliveryaddress start-->
            </div>
            </div>
            
            <?php endif; ?>			
            <!-- payment start -->
            <div class="row" style="border:1px #CCCCCC solid;margin-top:20px;padding:20px;border-radius:5px;">
            <div class="col-lg-12">
            <h4 class="tt-collapse-title mb-3"><?php echo e(strtoupper(__('webMessage.paymentmethod'))); ?></h4>
                            <?php if(!empty($settingInfo->payments)): ?>
                            <?php
                            $payments = explode(",",$settingInfo->payments);
							$p=1;
                            ?>
                            
                            <div class="row">
                                    <?php $paytxt=''; ?>
                                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    if($payment=='COD'){
                                    $paytxt = trans('webMessage.payment_COD');
                                    }else if($payment=='KNET'){
                                    $paytxt = trans('webMessage.payment_KNET');
                                    }else if($payment=='TPAY'){
                                    $paytxt = trans('webMessage.payment_TPAY');
                                    }else if($payment=='GKNET'){
                                    $paytxt = trans('webMessage.payment_GKNET');
                                    }else if($payment=='GTPAY'){
                                    $paytxt = trans('webMessage.payment_GTPAY');
                                    }else if($payment=='TAH'){
                                    $paytxt = trans('webMessage.payment_TAH');
                                    }else if($payment=='MF'){
                                    $paytxt = trans('webMessage.payment_MF');
                                    }else if($payment=='PAYPAL'){
                                    $paytxt = trans('webMessage.payment_PAYPAL');
                                    }else if($payment=='POSTKNET'){
                                    $paytxt = trans('webMessage.payment_POSTKNET');
                                    }
                                    ?>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                    <label class="radio" for="<?php echo e($payment); ?>"><input <?php if($p==1): ?> checked <?php endif; ?> type="radio" name="payment_method"  id="<?php echo e($payment); ?>"  value="<?php echo e($payment); ?>"><span class="outer"><span class="inner"></span></span><img src="<?php echo e(url('uploads/paymenticons/'.strtolower($payment).'.png')); ?>" height="30" alt="<?php echo e(__('webMessage.payment_'.$payment)); ?>">&nbsp;<?php echo e($paytxt); ?></label>
									
									</div>
                                    </div>
									<?php $p++;?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    
                                    <?php endif; ?>
            </div>
            </div>
            <!--end payment end -->
            
                        <div class="row">
                            <div class="col-lg-12">
                            <a style="padding-left:10px;padding-right:10px;background-color: #FFB900;" href="<?php echo e(url('/cart')); ?>" class="btn btn-lg btn-info float-<?php echo e(__('webMessage.align')); ?>"><span class="icon icon-check_circle"></span><?php echo e(strtoupper(__('webMessage.backtoshoppingcart'))); ?></a>
                            <button  style="padding-left:10px;padding-right:10px;"  type="submit" class="confirmcheckbutton btn btn-lg float-<?php echo e(__('webMessage.oalign')); ?>"><?php echo e(strtoupper(__('webMessage.orderconfirm'))); ?><img id="loader-details-gif" src="<?php echo e(url('assets/images/loader.svg')); ?>" style="position:absolute;margin-left:2%;display:none;margin-top:-1px;"></button>
							</div>
                            </div>
                            
                            
           <?php endif; ?>               
                            
                    
                            
                            
                            
                            
                            
						</div>
            <?php else: ?>
            <div align="center"><p><?php echo e(__('webMessage.yourcartisempty')); ?></p></div>
            <?php endif; ?>
			</form>
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
<script defer src="<?php echo e(url('hakum_assets/js/bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/gulfweb.js')); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  <!--end pixel code -->
  $(function() {
    $("#delivery_date").datepicker({dateFormat:"yy-mm-dd"});
  });
</script>
<script>
<?php if(Cookie::get('latitude') && Cookie::get('longitude')): ?>
getAddress(<?php echo e(Cookie::get('latitude')); ?>, <?php echo e(Cookie::get('longitude')); ?>)
<?php else: ?>
initGeolocation();
<?php endif; ?>
function getAddress(latitude,longitude) {//console.log(latitude,longitude)
    return new Promise(function (resolve, reject) {
        var request = new XMLHttpRequest();
        var method = 'GET';
        var url = 'https://api.tomtom.com/search/2/reverseGeocode/'+latitude+','+longitude+'.json?returnRoadUse=true&key=GhtGgtGebr8bs9J92nDIb6JsLHK0hZpU';
        var async = true;
        request.open(method, url, async);
        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                if (request.status == 200) {
                    var data = JSON.parse(request.responseText);
                    var address = data.addresses[0]['address']['municipality']; //console.log(address);
					if(address!="" || address!=null || address !=''){
					///$("#landmark").val(address);	
					}
                   // resolve(address);
                }
                else {
                    reject(request.status);
                }
            }
        };
        request.send();
    });
};

///end parent jquery
   function initGeolocation()
     {
        if( navigator.geolocation )
        {
           navigator.geolocation.getCurrentPosition( success, fail );
        }
		else
        {
		   console.log("Sorry, your browser does not support geolocation services.");
        }
     }

   function success(position)
     {
		 var BASE_URL ="";
		 if(position.coords.longitude!="" && position.coords.latitude!=""){
		 $.ajax({
		 type: "GET",
		 url: BASE_URL+"/ajax_post_latlong",
		 data: "longitude="+position.coords.longitude+"&latitude="+position.coords.latitude,
		 dataType: "json",
		 cache: false,
		 processData:false,
		 success: function(msg){
		 console.log("Latitude and Longitude are saved");
		 },
		 error: function(msg){
		 console.log("Error found while saving Latitude & Longitude");	 
		 } 
		 });  
		 }
     }

     function fail()
     {
        console.log("Sorry, your browser does not support geolocation services.");
     }
</script>

</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/checkout.blade.php ENDPATH**/ ?>