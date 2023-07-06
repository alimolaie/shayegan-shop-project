<?php
$settingInfo = App\Http\Controllers\webController::settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php if(app()->getLocale()=="en"): ?> <?php echo e($settingInfo->name_en); ?> <?php else: ?> <?php echo e($settingInfo->name_ar); ?> <?php endif; ?> | <?php echo e(__('webMessage.dashboard')); ?></title>
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
			<li><?php echo e(__('webMessage.dashboard')); ?></li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container container-fluid-custom-mobile-padding">
			<h1 class="tt-title-subpages noborder"><?php echo e(__('webMessage.dashboard')); ?></h1>
			<div class="tt-shopping-layout">
				
				<ul class="list-form-inline">
				<li><a class="btn-link" href="<?php echo e(url('/account')); ?>"><i class="icon-f-94"></i> <?php echo e(__('webMessage.dashboard')); ?></a></li>
				<li><a class="btn-link" href="<?php echo e(url('/changepass')); ?>"><i class="icon-g-40"></i> <?php echo e(__('webMessage.changepassword')); ?></a></li>
				<li><a class="btn-link" href="<?php echo e(url('/editprofile')); ?>"><i class="icon-01"></i> <?php echo e(__('webMessage.editprofile')); ?></a></li>
                <li><a class="btn-link" href="<?php echo e(url('/myorders')); ?>"><i class="icon-f-68"></i> <?php echo e(__('webMessage.myorders')); ?></a></li>
                <li><a class="btn-link" href="<?php echo e(url('/wishlist')); ?>"><i class="icon-n-072"></i> <?php echo e(__('webMessage.wishlists')); ?></a></li>
                </ul>
				
				<div class="tt-wrapper">
					<h3 class="tt-title"><?php echo e(__('webMessage.accountdetails')); ?> <a title="<?php echo e(__('webMessage.editprofile')); ?>" href="<?php echo e(url('/editprofile')); ?>" class="btn-link <?php if(app()->getLocale()=='en'): ?> float-right <?php else: ?> float-left <?php endif; ?>"><i class="icon-01"></i></a></h3>
					<div class="tt-table-responsive">
						<table class="tt-table-shop-02">
							<tbody>
                                <?php if(Auth::guard('webs')->user()->name): ?>
								<tr>
									<td><?php echo e(__('webMessage.name')); ?>:</td>
									<td><?php echo e(Auth::guard('webs')->user()->name); ?> <?php if(!empty(Auth::guard('webs')->user()->is_seller)): ?>(SELLER)<?php endif; ?></td>
								</tr>
                                <?php endif; ?>
								<?php if(Auth::guard('webs')->user()->email): ?>
								<tr>
									<td><?php echo e(__('webMessage.email')); ?>:</td>
									<td><?php echo e(Auth::guard('webs')->user()->email); ?></td>
								</tr>
                                <?php endif; ?>
                                <?php if(Auth::guard('webs')->user()->mobile): ?>
								<tr>
									<td><?php echo e(__('webMessage.mobile')); ?>:</td>
									<td><?php echo e(Auth::guard('webs')->user()->mobile); ?></td>
								</tr>
                                <?php endif; ?>
                                <?php if(Auth::guard('webs')->user()->username): ?>
								<tr>
									<td><?php echo e(__('webMessage.username')); ?>:</td>
									<td><?php echo e(Auth::guard('webs')->user()->username); ?></td>
								</tr>
                                <?php endif; ?>
                                <?php if(Auth::guard('webs')->user()->created_at): ?>
								<tr>
									<td><?php echo e(__('webMessage.created')); ?>:</td>
									<td><?php echo e(\Carbon\Carbon::parse(Auth::guard('webs')->user()->created_at)->diffForHumans()); ?></td>
								</tr>
                                <?php endif; ?>
							</tbody>
						</table>
					</div>
					
					<a href="<?php echo e(url('newaddress')); ?>" class="btn btn-border"><?php echo e(__('webMessage.addnewaddress')); ?></a>
					<?php if(session('session_msg')): ?> <br clear="all"><br clear="all">
                    <div class="alert-success"><?php echo e(session('session_msg')); ?></div>
                    <?php endif; ?>
					<?php if(session('session_msg_f')): ?> <br clear="all"><br clear="all">
                                    <div class="alert-danger"><?php echo e(session('session_msg_f')); ?></div>
                                    <?php endif; ?>
					<?php if(!empty($customerAddress) && count($customerAddress)>0): ?>
					<br clear="all"><br clear="all">
					<div class="row">
					<?php $__currentLoopData = $customerAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customerAddr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
					$address = App\Http\Controllers\accountController::getCustAddress($customerAddr->id);
					?>
					<div class="col-lg-4" <?php if(!empty($customerAddr->is_default)): ?> style="border:2px #0000FF solid;" <?php endif; ?>>
					<br clear="all">
					<h3 class="tt-title"><?php echo e($customerAddr->title); ?> 
					<a title="<?php echo e(__('webMessage.edit')); ?>" href="<?php echo e(url('editaddress/'.$customerAddr->id)); ?>" class="<?php if(app()->getLocale()=='en'): ?> float-right <?php else: ?> float-left <?php endif; ?> btn-link" title="<?php echo e(__('webMessage.edit')); ?>"><i class="icon-01"></i></a>
					<a  title="<?php echo e(__('webMessage.delete')); ?>" href="<?php echo e(url('addressdelete/'.$customerAddr->id)); ?>" id="<?php echo e($customerAddr->id); ?>" class="deletemyAddress <?php if(app()->getLocale()=='en'): ?> float-right <?php else: ?> float-left <?php endif; ?> btn-link" title="<?php echo e(__('webMessage.delete')); ?>"><i class="icon-02"></i></a></h3>
					<?php echo $address; ?>

					</div>	
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
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

</body>
</html><?php /**PATH /home/kashkha/private/resources/views/website/account.blade.php ENDPATH**/ ?>