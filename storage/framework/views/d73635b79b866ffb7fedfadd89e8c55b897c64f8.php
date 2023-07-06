<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?> | Menus</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--css files -->
		<?php echo $__env->make('gwc.css.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
									<h3 class="kt-subheader__title">Menus</h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="<?php echo e(url('home')); ?>" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="javascript:;" class="kt-subheader__breadcrumbs-link">Menus listing</a>
									</div>
								</div>
								
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											Menus
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
												<?php if(auth()->guard('admin')->user()->can('menu-create')): ?>												
												<a href="<?php echo e(url('gwc/menus/new')); ?>" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-plus"></i>New Record</a><?php endif; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="kt-portlet__body">
                                <?php if(auth()->guard('admin')->user()->can('menu-list')): ?>
									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Link</th>
												<th>Icon</th>
												<th>Sort Order</th>
												<th>Status</th>
												<th>Created At</th>
												<th>Updated At</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
                                        <?php if(count($menusLists)): ?>
                                        <?php $p=1; ?>
                                        <?php $__currentLoopData = $menusLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$menusList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($menusLists->firstItem() + $key); ?></td>
												<td><?php echo $menusList->name; ?></td>
												<td><?php echo $menusList->link; ?></td>
												<td><?php echo $menusList->icon; ?></td>
												<td><?php echo $menusList->display_order; ?></td>
												<td>
                                                <span class="kt-switch"><label><input value="<?php echo e($menusList['id']); ?>" <?php echo e(!empty($menusList->is_active)?'checked':''); ?> type="checkbox"  id="menus" class="change_status"><span></span></label></span>
                                                </td>
												<td><?php echo $menusList->created_at; ?></td>
												<td><?php echo $menusList->updated_at; ?></td>
                                                <td class="kt-datatable__cell">
                                                 <span style="overflow: visible; position: relative; width: 80px;">
                                                 <div class="dropdown">
                                                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="flaticon-more-1"></i></a>
                                                 <div class="dropdown-menu dropdown-menu-right">
                                                 <ul class="kt-nav">
                                                 <?php if(auth()->guard('admin')->user()->can('menu-edit')): ?>
                                                 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/menus/edit/'.$menusList->id)); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-contract"></i><span class="kt-nav__link-text">Edit</span></a></li>
                                                 <?php endif; ?>
                                                 <?php if(auth()->guard('admin')->user()->can('menu-delete')): ?>
                                                 <li class="kt-nav__item"><a href="javascript:;" data-toggle="modal" data-target="#kt_modal_<?php echo e($menusList->id); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text">Delete</span></a></li>
                                                 <?php endif; ?>
                                                 </ul>
                                                 </div>
                                                 </div>
                                                 </span>
                                                 
                                                 <!--Delete modal -->
 <div class="modal fade" id="kt_modal_<?php echo e($menusList->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Alert !</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<h6 class="modal-title">Are you sure to delete this record? <br>Note : Once you delete the record it can not be rollback.</h6>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
											<button type="button" class="btn btn-danger"  onClick="Javascript:window.location.href='<?php echo e(url('gwc/menus/delete/'.$menusList->id)); ?>'">Yes</button>
										</div>
									</div>
								</div>
							</div>
                                                </td>
											</tr>
                                        <?php if(count($menusList->submenu)>0): ?>
                                        <?php $c=1; ?>
                                        <?php $__currentLoopData = $menusList->submenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                           <tr>
												<td><?php echo e($p); ?>><?php echo e($c); ?></td>
												<td><?php echo $submenu->name; ?></td>
												<td><?php echo $submenu->link; ?></td>
												<td><?php echo $submenu->icon; ?></td>
												<td><?php echo $submenu->display_order; ?></td>
												<td>
                                                <span class="kt-switch"><label><input value="<?php echo e($submenu['id']); ?>" <?php echo e(!empty($submenu->is_active)?'checked':''); ?> type="checkbox"  id="menus" class="change_status"><span></span></label></span>
                                                </td>
												<td><?php echo $submenu->created_at; ?></td>
												<td><?php echo $submenu->updated_at; ?></td>
<td class="kt-datatable__cell">
 <span style="overflow: visible; position: relative; width: 80px;">
 <div class="dropdown">
 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="flaticon-more-1"></i></a>
 <div class="dropdown-menu dropdown-menu-right">
 <ul class="kt-nav">
 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/menus/edit/'.$submenu->id)); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-contract"></i><span class="kt-nav__link-text">Edit</span></a></li>
 <li class="kt-nav__item"><a href="javascript:;" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo e($submenu->id); ?>"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text">Delete</span></a></li>
 </ul>
 </div>
 </div>
 </span>
 <!--Delete modal -->
 <div class="modal fade" id="kt_modal_<?php echo e($submenu->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Alert !</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<h6>Are you sure to delete this record? <br>Note : Once you delete the record it can not be rollback.</h6>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
											<button type="button" class="btn btn-danger"  onClick="Javascript:window.location.href='<?php echo e(url('gwc/menus/delete/'.$submenu->id)); ?>'">Yes</button>
										</div>
									</div>
								</div>
							</div>
                            
 </td>
											</tr>
                                            <?php $c++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        <?php endif; ?>
                                        <?php $p++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                        <?php else: ?>
                                        <tr><td colspan="9" class="text-center">No Record(s) Found</td></tr>
                                        <?php endif; ?>    
										</tbody>
									</table>
                              <?php else: ?>
                              <div class="alert alert-light alert-warning" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
								<div class="alert-text">You don't have permission to view this page</div>
							</div>
                              <?php endif; ?>
									<!--end: Datatable -->
								</div>
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
		<?php echo $__env->make('gwc.js.menus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
	</body>

	<!-- end::Body -->
</html><?php /**PATH /home/kashkha/private/resources/views/gwc/menus/adminMenus.blade.php ENDPATH**/ ?>