<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.pos')); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		<?php echo $__env->make('gwc.css.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
		<!-- token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <style>
		.invoicetotal{
		width:300px; 
		border-bottom:1px #CCCCCC solid;
		}
		.totalamount{
		 font-size:14px;
		 font-weight:bold;
		}
		.deliveryfees{
		font-size:14px;
		}
		.discount{
		font-size:14px;
		color:#FF0000;
		}
		.grandtotal{
		 font-size:14px;
		 font-weight:bold;
		}
		.imagetd{
		width:60px;
		}
		.unitprice{
		 width:100px;
		 text-align:center;
		}
		.quantity{
		 width:80px;
		 text-align:center;
		}
		.subtotal{
		 width:100px;
		 text-align:center;
		}
		</style>
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
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content" style="margin-top:-50px;">

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="app">

							<!--Begin::App-->
							<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

								<!--Begin:: App Aside Mobile Toggle-->
								<button class="kt-app__aside-close" id="kt_chat_aside_close">
									<i class="la la-close"></i>
								</button>

								<!--End:: App Aside Mobile Toggle-->

								<!--Begin:: App Aside-->
								<div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--lg kt-app__aside--fit" id="kt_chat_aside">

                                    
                                    <products-component :locale="<?php echo e(json_encode(app()->getLocale())); ?>" :oid="<?php echo e(Request()->oid); ?>"></products-component>

									<!--end::Portlet-->
								</div>

								<!--End:: App Aside-->

								<!--Begin:: App Content-->
								<div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content">
									<div class="kt-chat">
										<div class="kt-portlet kt-portlet--head-lg kt-portlet--last">
											<div  style="min-height:30px !important; border:0;">
													
														<table class="table table-striped-  table-hover table-checkable" >
														<thead>
															<tr>
                                                                <th class="imagetd"><?php echo e(__('adminMessage.image')); ?></th>
																<th style="text-align:left;" ><?php echo e(__('adminMessage.details')); ?></th>
																<th style="text-align:center;" class="unitprice"><?php echo e(__('adminMessage.unit_price')); ?></th>
																<th style="text-align:center;" class="quantity"><?php echo e(__('adminMessage.quantty')); ?></th>
																<th style="text-align:center;" class="subtotal"><?php echo e(__('adminMessage.subtotal')); ?></th>
															</tr>
														</thead>
                                                        </table>
													
											</div>
											<div class="kt-portlet__body" style="padding:10px !important;">
												<div class="kt-scroll kt-scroll--pull ps ps--active-y" data-mobile-height="300" style="height: 89px; overflow: hidden;">
													<div class="kt-chat__messages">
													 <table class="table" >
                                                        <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
                                                         <tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr><tr id="cart-1">
                                                            <td class="imagetd"><span class="kt-media kt-media--quare"><img src="<?php echo e(url('admin_assets/assets/media/users/300_21.jpg')); ?>" alt="image"></span></td>
                                                            <td style="text-align:left;">Details goes here</td>
                                                            <td class="unitprice">100.000</td>
                                                            <td align="center" class="quantity"><div align="center">1</div></td>
                                                            <td align="center" class="subtotal"><div align="center">100.000</div></td>
                                                         </tr>
													</table>
														
														
													</div>
												<div class="ps__rail-x" style="left: 0px; bottom: -588px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 588px; height: 89px; right: -2px;"><div class="ps__thumb-y" tabindex="0" style="top: 30px; height: 40px;"></div></div></div>
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-invoice__total pull-right invoicetotal">
                                                    <div class="invoice-item totalamount">
													   <span class="kt-invoice__title">Total</span>
													   <span class="kt-invoice__price pull-right">100.000</span>
                                                    </div>
                                                    <div class="invoice-item discount">
													   <span class="kt-invoice__title">Discount</span>
													   <span class="kt-invoice__price pull-right">-1.000</span>
                                                    </div>
                                                    <div class="invoice-item deliveryfees">
													   <span class="kt-invoice__title">Delivery Fees</span>
													   <span class="kt-invoice__price pull-right">1.000</span>
                                                    </div>
                                                    <div class="invoice-item grandtotal">
													   <span class="kt-invoice__title">Grand Total</span>
													   <span class="kt-invoice__price pull-right">101.000</span>
                                                    </div>
                                                </div> 
                                                    
											</div>
										</div>
									</div>
								</div>

								<!--End:: App Content-->
							</div>

							<!--End::App-->
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
        
  
   <!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo e(url('admin_assets/assets/js/pages/custom/chat/chat.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('js/app.js')); ?>" ></script>
	</body>
	<!-- end::Body -->
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/pos/index.blade.php ENDPATH**/ ?>