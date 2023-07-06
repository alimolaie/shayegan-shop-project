<?php
$settingInfo = App\Http\Controllers\webController::settings();
if(app()->getLocale()=="en"){$strLang="en";}else{$strLang="ar";}
if(!empty(Auth::guard('webs')->user()->is_seller)){$userType=1;}else{$userType=0;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.shoppingcart')); ?></title>
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
			<li><?php echo e(__('webMessage.shoppingcart')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.shoppingcart')); ?></h1>
			<?php if(session('session_msg')): ?>
            <div class="alert-danger"><?php echo session('session_msg'); ?></div>
            <?php endif; ?>
            <?php if(!empty($tempOrders) && count($tempOrders)>0): ?>
            <span id="result_reponse_cart"></span>
			<div class="tt-shopcart-table-02">
				<table>
                    <thead class="tt-hidden-mobile">
                    <tr>
                    <th><?php echo e(__('webMessage.image')); ?></th>
                    <th><?php echo e(__('webMessage.details')); ?></th>
                    <th><?php echo e(__('webMessage.unit_price')); ?></th>
                    <th><?php echo e(__('webMessage.quantity')); ?></th>
                    <th><?php echo e(__('webMessage.subtotal')); ?></th>
                    <th><?php echo e(__('webMessage.remove')); ?></th>
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
					$optionsDetailstxt = App\Http\Controllers\webCartController::getOptionsDtails($tempOrder->id);
                    
                    $unitprice = $tempOrder->unit_price;
                    $subtotalprice = round(($unitprice*$tempOrder->quantity),3);
                    $aquantity = App\Http\Controllers\webCartController::getProductQuantity($tempOrder->product_id,$tempOrder->size_id,$tempOrder->color_id);
                    ?>
						<tr id="cart-<?php echo e($tempOrder->id); ?>">
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

									<?php echo $optionsDetailstxt; ?>

                                    <?php echo $warrantyTxt; ?>

								</ul>
								<ul class="tt-list-parameters">
									<li>
										<div class="tt-price">
											 <?php echo e($unitprice); ?><?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?>

										</div>
									</li>
									<li>
										<div class="detach-quantity-mobile"></div>
									</li>
									<li>
										<div class="tt-price subtotal">
											 <span class="subtotal_result<?php echo e($tempOrder->id); ?>"><?php echo e($subtotalprice); ?></span><?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?>

										</div>
									</li>
								</ul>
							</td>
							<td>
								<div class="tt-price">
									 <?php echo e($unitprice); ?> <?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?>

								</div>
							</td>
							<td>
								<div class="detach-quantity-desctope">
									<div class="tt-input-counter style-01">
										<span class="minus-btn" id="<?php echo e($tempOrder->id); ?>"></span>
										<input size="<?php echo e($aquantity); ?>" type="text" value="<?php echo e($tempOrder->quantity); ?>"  name="quantity<?php echo e($tempOrder->id); ?>" id="quantity<?php echo e($tempOrder->id); ?>">
										<span class="plus-btn" id="<?php echo e($tempOrder->id); ?>"></span>
									</div>
								</div>
							</td>
							<td align="center">
								<div class="tt-price subtotal" align="center">
									 <span class="subtotal_result<?php echo e($tempOrder->id); ?>"><?php echo e($subtotalprice); ?></span> <?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?>

								</div>
							</td>
							<td>
								<a href="javascript:;" id="<?php echo e($tempOrder->id); ?>" class="tt-btn-close deleteFromCart"></a>
							</td>
						</tr>
                        <?php
                        $totalprice+=$subtotalprice;
                        $productid = $tempOrder->product_id;
                        ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
                        <?php
                        $lastshoppinglink=App\Http\Controllers\webCartController::getShoppingLink($productid);
                        ?>				
					</tbody>
				</table>
                <input type="hidden" name="checkout_totalprice" id="checkout_totalprice" value="<?php echo e($totalprice); ?>">
                
				<div class="tt-shopcart-btn">
					<div class="col-left">
						<a class="btn-link" href="<?php echo e($lastshoppinglink); ?>"><i class="icon-e-19"></i><?php echo e(strtoupper(__('webMessage.continueshopping'))); ?></a>
					</div>
					<div class="col-right">
						<a class="btn-link" href="javascript:;" data-toggle="modal" data-target="#modalCartAlert"><i class="icon-h-02"></i><?php echo e(strtoupper(__('webMessage.clearshoppingcart'))); ?></a>
					</div>
				</div>
			</div>
			<div class="tt-shopcart-col">
				<div class="row">
					<div class="col-md-6 col-lg-8">
                        <div class="tt-shopcart-box tt-boredr-large">
                                    <div class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.checkdeliverycharges'))); ?></div>
                                    <?php
                                    $areaid=!empty(Cookie::get('area'))?Cookie::get('area'):'0';
                                    $areatxt = App\Http\Controllers\webCartController::get_kuwait_areas($areaid);
                                    ?>      
                                    <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-2"><label for="area"><?php echo e(__('webMessage.area')); ?></label></div>
                                    <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                    <select name="area"  class="form-control area_checkoutcart" id="area_checkout" >
                                    <option value="0"><?php echo e(__('webMessage.choosearea')); ?></option>
                                    <?php echo $areatxt; ?>

                                    </select>
                                    </div>
                                    </div>
                                    </div>
                                    <?php if(empty($userType)): ?>
                                    <div class="tt-collapse-title"><?php echo e(strtoupper(__('webMessage.applycoupon'))); ?></div>
                                    
                                    <div class="row form-default">
                                    <div class="col-xs-12 col-md-4 col-lg-4">
										<div class="form-group">
										<input style="background-color:#FFFFFF;" type="text" name="coupon_code"  class="form-control" id="coupon_code" placeholder="<?php echo e(__('webMessage.enter_coupon_code')); ?>" autcomplete="off" value="<?php if(Cookie::get('gb_coupon_code')): ?> <?php echo e(Cookie::get('gb_coupon_code')); ?> <?php endif; ?>">
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
										<td> <span class="total_result"><?php echo e($totalprice); ?></span> <?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?></td>
									</tr>
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
										<td><?php echo e($deliveryCharge); ?> <?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?></td>
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
										<td><span class="total_result"><?php echo e($totalprice); ?></span> <?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?></td>
									</tr>
								</tfoot>
							</table>
							<a href="<?php echo e(url('/checkout')); ?>" class="btn btn-lg"><span class="icon icon-check_circle"></span><?php echo e(strtoupper(__('webMessage.proceedtocheckout'))); ?></a>
						</div>
					</div>
				</div>
			</div>
            <?php else: ?>
            <div align="center"><p><?php echo e(__('webMessage.yourcartisempty')); ?></p></div>
            <?php endif; ?>
		</div>
	</div>
</div>
<!--footer-->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--show alert box -->
<div class="modal  fade"  id="modalCartAlert" tabindex="-1" role="dialog" aria-label="modalCartAlert" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="tt-modal-addtocart mobile">
					<div class="tt-modal-messages">
						<?php echo e(__('webMessage.areyousuretoremove')); ?>

					</div>
			        <a href="javascript:;" class="btn-link removemycart"><?php echo e(__('webMessage.remove')); ?></a>
				</div>
                <?php echo e(__('webMessage.areyousuretoremove')); ?>

                <a href="javascript:;" class="btn-link removemycart"><?php echo e(__('webMessage.remove')); ?></a>
			</div>
		</div>
	</div>
</div>

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

<script>
$(document).ready(function(){
BASE_URL='';
$(".plus-btn").click(function(){
 var id = $(this).attr("id");
 var quantity = $("#quantity"+id).val();
    $.ajax({
	 type: "GET",
	 url: BASE_URL+"/ajax_change_cart_quantity",
	 data: "type=a&id="+id+"&quantity="+quantity,
	 dataType: "json",
	 cache: false,
	 processData:false,
	 success: function(msg){
	 if(msg.status=="200"){
	 $(".subtotal_result"+id).html(msg.subtotal);
	 $(".total_result").html(msg.total);
	 //$("#result_reponse_cart").html(msg.message);
	 if(msg.status==200){
	 toastr.success(msg.message);
	 }else{
	 toastr.error(msg.message);
	 }
	 }else{
	 //$("#result_reponse_cart").html(msg.message);
	 toastr.error(msg.message);
	 }
	 },
	 error: function(msg){
	 //$("#result_reponse_cart").html('<div class="alert-danger">Something was wrong</div>');
	 toastr.error('Oops! Something went wrong while processing');	 
	 } 
	 });  
 });
 
 //
 $(".minus-btn").click(function(){
 var id = $(this).attr("id");
 var quantity = $("#quantity"+id).val();
    $.ajax({
	 type: "GET",
	 url: BASE_URL+"/ajax_change_cart_quantity",
	 data: "type=m&id="+id+"&quantity="+quantity,
	 dataType: "json",
	 cache: false,
	 processData:false,
	 success: function(msg){
	 if(msg.status=="200"){
	 $(".subtotal_result"+id).html(msg.subtotal);
	 $(".total_result").html(msg.total);
	 //$("#result_reponse_cart").html(msg.message);
	  if(msg.status==200){
	 toastr.success(msg.message);
	 }else{
	 toastr.error(msg.message);
	 }
	 }else{
	 //$("#result_reponse_cart").html(msg.message);
	 toastr.error(msg.message);
	 }
	 },
	 error: function(msg){
	 //$("#result_reponse_cart").html('<div class="alert-danger">Something was wrong</div>');
	 toastr.error('Oops! Something went wrong while processing');	 
	 } 
	 });  
 });
 
});
</script>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/cart.blade.php ENDPATH**/ ?>