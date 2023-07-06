<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.customers')); ?></title>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.customers')); ?></h3>
									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link"><?php echo e(__('adminMessage.customerslistings')); ?></a>
                                        
									</div>
								</div>
								<div class="kt-subheader__toolbar">
									<form class="kt-margin-l-20" method="get" id="kt_subheader_search_form" action="<?php echo e(url('gwc/customers')); ?>">
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
                                        <?php if(auth()->guard('admin')->user()->can('customers-create')): ?>
										<a href="<?php echo e(url('gwc/customers/create')); ?>" class="btn btn-brand btn-bold"><i class="la la-plus"></i>&nbsp;<?php echo e(__('adminMessage.createnew')); ?></a>
                                        <?php endif; ?>
										
									</div>
								</div>
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
							<div class="kt-portlet kt-portlet--mobile">
								
                                <?php if(auth()->guard('admin')->user()->can('customers-list')): ?>
									<!--begin: Datatable -->
									<table class="table table-striped-table-bordered table-hover table-checkable " id="kt_table_1">
										<thead>
											<tr>
												<th width="10">#</th>
												<th><?php echo e(__('adminMessage.details')); ?></th>
												<th></th>
												<th width="10"><?php echo e(__('adminMessage.actions')); ?></th>
											</tr>
										</thead>
										<tbody>
                                        <?php if(count($customersLists)): ?>
                                        <?php $p=1; ?>
                                        <?php $__currentLoopData = $customersLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$customersList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr class="search-body">
												<td><?php echo e($customersLists->firstItem() + $key); ?></td>
												<td>
                                                <table class="table table-striped-table-bordered">
                                                <tr><td width="160"><?php echo e(__('adminMessage.name')); ?></td><td><?php echo e($customersList->name); ?></td></tr>
                                                <tr><td><?php echo e(__('adminMessage.username')); ?></td><td><?php echo e($customersList->username); ?></td></tr>
                                                <tr><td><?php echo e(__('adminMessage.email')); ?></td><td><?php echo e($customersList->email); ?></td></tr>
                                                <tr><td><?php echo e(__('adminMessage.mobile')); ?></td><td><?php echo e($customersList->mobile); ?></td></tr>
                                                <tr><td><?php echo e(__('adminMessage.device_type')); ?></td><td><?php echo e($customersList->register_from); ?></td></tr>
                                                <tr><td><?php echo e(__('adminMessage.registered_ip')); ?></td><td><?php echo e(!empty($customersList->register_ip)?$customersList->register_ip:'NA'); ?></td></tr>
                                                
                                                </table>
                                                </td>
                                                
												<td>
                                                <table class="table table-striped-table-bordered">
                                                <tr><td><?php echo e(__('adminMessage.image')); ?></td><td><?php if($customersList->image): ?>
                                                <img src="<?php echo url('uploads/customers/thumb/'.$customersList->image); ?>" width="30">
                                                <?php else: ?>
                                                <img src="<?php echo url('uploads/customers/no-image.png'); ?>" width="30">
                                                <?php endif; ?></td></tr>
                                                <tr><td><?php echo e(__('adminMessage.status')); ?></td><td><span class="kt-switch"><label><input value="<?php echo e($customersList->id); ?>" <?php echo e(!empty($customersList->is_active)?'checked':''); ?> type="checkbox"  id="customers" class="change_status"><span></span></label></span></td></tr>
                                                <tr><td><?php echo e(__('adminMessage.seller')); ?></td><td><span class="kt-switch"><label><input value="<?php echo e($customersList->id); ?>" <?php echo e(!empty($customersList->is_seller)?'checked':''); ?> type="checkbox"  id="customers-seller" class="change_status"><span></span></label></span></td></tr>
                                                <tr><td><?php echo e(__('adminMessage.createdat')); ?></td><td><?php echo $customersList->created_at; ?></td></tr>
                                                </table>
                                                
                                                </td>
											
                                                <td class="kt-datatable__cell">
                                                 <span style="overflow: visible; position: relative; width: 80px;">
                                                 <div class="dropdown">
                                                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="flaticon-more-1"></i></a>
                                                 <div class="dropdown-menu dropdown-menu-right">
                                                 <ul class="kt-nav">
                                                 <?php if(auth()->guard('admin')->user()->can('wish-view')): ?>
                                                 <li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link viewcustomerwish" id="<?php echo e($customersList->id); ?>"><i class="kt-nav__link-icon flaticon-list"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.wishitems')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 
                                                 <?php if(auth()->guard('admin')->user()->can('order-view')): ?>
                                                 <li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link viewcustomerorder" id="<?php echo e($customersList->id); ?>"><i class="kt-nav__link-icon flaticon-list"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.orders')); ?></span></a></li>
                                                 <?php endif; ?>
                                                
                                                 <?php if(auth()->guard('admin')->user()->can('customers-view')): ?>
                                                 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/customers/'.$customersList->id.'/view')); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon-eye"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.view')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 
                                                 <?php if(auth()->guard('admin')->user()->can('customers-edit')): ?>
                                                 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/customers/'.$customersList->id.'/edit')); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-contract"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.edit')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 
                                                 <?php if(auth()->guard('admin')->user()->can('customers-change-password')): ?>
                                                 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/customers/changepass/'.$customersList->id)); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-lock"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.password')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 
                                                 
                                                 <?php if(auth()->guard('admin')->user()->can('customers-delete')): ?>
                                                 <li class="kt-nav__item"><a href="javascript:;" data-toggle="modal" data-target="#kt_modal_<?php echo e($customersList->id); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.delete')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 
                                                 </ul>
                                                 </div>
                                                 </div>
                                                 </span>
                                                 
                                                 <!--Delete modal -->
 <div class="modal fade" id="kt_modal_<?php echo e($customersList->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
											<button type="button" class="btn btn-danger"  onClick="Javascript:window.location.href='<?php echo e(url('gwc/customers/delete/'.$customersList->id)); ?>'"><?php echo e(__('adminMessage.yes')); ?></button>
										</div>
									</div>
								</div>
							</div>
                                                </td>
											</tr>
                                        
                                        <?php $p++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                        <tr><td colspan="10" class="text-center"><?php echo e($customersLists->links()); ?></td></tr> 
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
        
  
    <script type="text/javascript">
	$(document).ready(function(){
	 $('#searchCat').keyup(function(){
	  // Search text
	  var text = $(this).val();
	  // Hide all content class element
	  $('.search-body').hide();
	  // Search 
	   $('.search-body').each(function(){
	 
		if($(this).text().indexOf(""+text+"") != -1 ){
		 $(this).closest('.search-body').show();
		 
		}
	  });
	 
	 });
	});
	</script>
	</body>
	<!-- end::Body -->
</html><?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/gwc/customers/index.blade.php ENDPATH**/ ?>