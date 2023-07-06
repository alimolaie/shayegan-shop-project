<?php
$settings = App\Http\Controllers\AdminSettingsController::getSetting();
$theme    = $settings->theme;
?>
<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.tags')); ?></title>
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
									<h3 class="kt-subheader__title"><?php echo e(__('adminMessage.tags')); ?></h3>
									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
								</div>
								
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <?php echo $__env->make('gwc.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
							<div class="kt-portlet kt-portlet--mobile">
							
                                <?php if(auth()->guard('admin')->user()->can('tags-list')): ?>
									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable " id="kt_table_1">
										<thead>
											<tr>
												<th width="10">#</th>
                                                <th width="100"><?php echo e(__('adminMessage.tag_name_en')); ?></th>
                                                <th width="50"><?php echo e(__('adminMessage.items')); ?></th>
                                                <th width="50"><?php echo e(__('adminMessage.image')); ?></th>
                                                <th width="100">(30 X 30)</th>
                                                <th width="10"><?php echo e(__('adminMessage.actions')); ?></th>
											</tr>
										</thead>
										<tbody>
                                        <?php if(count($tagslists_en)>0): ?>
                                        <?php $p=1; $tagImage='';$countItems='0'; ?>
                                        <?php $__currentLoopData = $tagslists_en; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($tag)): ?>
                                        <?php
                                        $tagImage   = App\Http\Controllers\AdminProductController::getTagsDetails($tag);
                                        $countItems = App\Http\Controllers\AdminProductController::getItemCountsByTag($tag);
                                        ?>
											<tr class="search-body">
												<td><?php echo e($p); ?></td>
                                                
                                                <td><?php if(!empty($tag)): ?><?php echo e($tag); ?><?php endif; ?></td>
                                                <td><a href="<?php echo e(url('gwc/product?tag='.$tag)); ?>"><?php echo e($countItems); ?></a></td>
                                                <td>
                                                <?php if(!empty($tagImage->image)): ?><img src="<?php echo e(url('uploads/product/'.$tagImage->image)); ?>" width="30"><?php endif; ?></td>
                                                <td>
                                                <form method="post" name="tagsName" id="tagsName<?php echo e($p); ?>" enctype="multipart/form-data" action="<?php echo e(route('tagsPost')); ?>">
                                                <input type="hidden" name="tag_name_en" value="<?php if(!empty($tag)): ?><?php echo e($tag); ?><?php endif; ?>">
                                                <input type="hidden" name="tag_name_ar" value="">
                                         
                                                
                                                <input class="form-control uploadsImage" type="file" name="tag_image" id="<?php echo e($p); ?>">
                                                </form>
                                                </td>
                                                <td align="center"><a href="<?php echo e(url('gwc/product-delete-tags/'.$tag)); ?>"><i class="kt-nav__link-icon flaticon2-trash"></i></a></td>
												
											</tr>
                                        
                                        <?php $p++; ?>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                        
                                        <?php else: ?>
                                        <tr><td colspan="9" class="text-center"><?php echo e(__('adminMessage.recordnotfound')); ?></td></tr>
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
	 $('.uploadsImage').change(function(){
	 var id = $(this).attr('id');
	 $("#tagsName"+id).submit();
	 });
	});
	</script>
	</body>
	<!-- end::Body -->
</html><?php /**PATH /home/gulfwebi/tikbazar.gulfweb.ir/resources/views/gwc/product/tags.blade.php ENDPATH**/ ?>