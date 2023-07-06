<?php
$settingInfo = App\Http\Controllers\webController::settings();
if(!empty(Auth::guard('webs')->user()->is_seller)){
$userType=1;
}else{
$userType=0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.myorders')); ?></title>
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
			<li><?php echo e(__('webMessage.myorders')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.myorders')); ?></h1>
            <?php if(!empty($myorderLists) && count($myorderLists)>0): ?>
            <!--order search box start -->
            <form name="myordersSearch_form" id="myordersSearch_form" method="get" action="<?php echo e(url('/myorders')); ?>">
            <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4">
            <div class="form-group">
            <input type="text" name="q"  class="form-control" id="q" placeholder="<?php echo e(__('webMessage.search_here')); ?>" autcomplete="off" value="<?php if(Request()->q): ?><?php echo e(Request()->q); ?><?php endif; ?>">
            </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4">
            <div class="form-group">
            <input type="text" name="filter_date"  class="form-control" id="filter_date" placeholder="<?php echo e(__('webMessage.date')); ?>" autcomplete="off" value="<?php if(Request()->filter_date): ?><?php echo e(Request()->filter_date); ?><?php endif; ?>">
            </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4">
            <div class="form-group">
            <button class="btn btn-border" type="submit"><?php echo e(__('webMessage.search_btn')); ?></button>
            </div>
            </div>
            </div>
            </form>
            <!--order search box end -->
            <p>&nbsp;</p>
			<div class="tt-wishlist-box" id="js-wishlist-removeitem">
            
                <span id="responseMsgOrder"></span>
				<div class="tt-wishlist-list">
                <?php $__currentLoopData = $myorderLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myorderList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $getProperties = App\Http\Controllers\webCartController::getMyOrdersProperties($myorderList->id);
                    $sellerDetails = App\Http\Controllers\AdminCustomersController::getCustomerDetails($myorderList->customer_id);
                    ?>
					<div class="tt-item" id="orderdiv<?php echo e($myorderList->id); ?>">
						<div class="tt-col-title">
							<b><?php echo e(__('webMessage.orderid')); ?> : </b><?php echo e($myorderList->order_id); ?>

                            <br>
                            <b><?php echo e(__('webMessage.name')); ?> : </b><?php echo e($myorderList->name); ?>

                            <?php if($myorderList->mobile): ?><br><b><?php echo e(__('webMessage.mobile')); ?> : </b><?php echo e($myorderList->mobile); ?><?php endif; ?>
                            <?php if(!empty($sellerDetails) && !empty($sellerDetails->name) && !empty($userType)): ?>
                            <br>Seller : <?php echo e($sellerDetails->name); ?>

                           <?php endif; ?>
						</div>
                        
                     
                        <div class="tt-col-title">
							<b><?php echo e(__('webMessage.paymentmethod')); ?> : </b><?php echo e($myorderList->pay_mode); ?>

							(<?php if(!empty($myorderList->is_paid)): ?> <font color='#009900'><?php echo e(trans('webMessage.paid')); ?></font> <?php else: ?> <font color='#ff0000'><?php echo e(trans('webMessage.notpaid')); ?></font> <?php endif; ?>)
                            <br>
                            <b><?php echo e(__('webMessage.order_status')); ?> : </b><span class="<?php echo e($myorderList->order_status); ?>"><?php echo e(__('webMessage.'.$myorderList->order_status)); ?></span>
                            <br>
                            <b><?php echo e(__('webMessage.date')); ?> : </b><?php echo e($myorderList->created_at); ?>

							
						</div>
                        <div class="tt-col-title">
							<b><?php echo e(__('webMessage.delivery_date')); ?> : </b><?php echo e($myorderList->delivery_date); ?>

                            <br>
                            <b><?php echo e(__('webMessage.grandtotal')); ?> : </b><?php echo e(__('webMessage.'.$settingInfo->base_currency)); ?> <?php echo e(number_format($getProperties['totalAmt'],3)); ?>

                            <?php if(!empty($getProperties['totalAmt'])): ?>
                            <br>
                            <b><?php echo e(__('webMessage.grandtotal')); ?> : </b><?php echo e(__('webMessage.usd')); ?> <?php echo e(number_format($getProperties['totalAmt_dollar'],2)); ?>

                            <?php endif; ?>
						</div>
						<div class="tt-col-btn">
							<a class="btn-link" href="<?php echo e(url('orderdetails/'.$myorderList->order_id)); ?>"><i class="icon-f-73"></i><?php echo e(__('webMessage.details')); ?></a>
							<a class="btn-link removemyorder" id="<?php echo e($myorderList->id); ?>" href="javascript:;"><i class="icon-h-02"></i><?php echo e(__('webMessage.remove')); ?></a>
						</div>
					</div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  <div><?php echo e($myorderLists->links()); ?></div>					
				</div>
                
			</div>
                <?php else: ?>
                <div class="tt-wishlist-list text-center"><?php echo e(__('webMessage.norecordfound')); ?></div>
                <?php endif; ?>
		</div>
	</div>
</div>
<!--footer-->
<?php echo $__env->make("website.includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- modal (AddToCartProduct) -->
<?php echo $__env->make("website.includes.addtocart_modal", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function() {
    $("#filter_date").datepicker({dateFormat:"yy-mm-dd"});
  });
</script>
</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/myorders.blade.php ENDPATH**/ ?>