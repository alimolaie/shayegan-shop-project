<div class="kt-list-timeline__items">

    <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
         <div class="kt-list-timeline__item">
         <?php for($i = 0; $i <= $level; $i++): ?>            
         <span class="kt-list-timeline__badge"></span>
         <?php endfor; ?>
         <span class="kt-list-timeline__text"><a href="<?php echo e(url('gwc/product?category='.$child->id)); ?>"><?php echo e($child->name_en); ?>(<?php echo e(count($child->allproducts)); ?>)</a></span>
         
         <span class="kt-list-timeline__time">
         <?php if($child->image): ?>
         <img src="<?php echo url('uploads/category/thumb/'.$child->image); ?>" width="35">
         <?php endif; ?>
         </span>
         <span class="kt-list-timeline__time">
         <span class="kt-switch"><label><input value="<?php echo e($child->id); ?>" <?php echo e(!empty($child->is_active)?'checked':''); ?> type="checkbox"  id="category" class="change_status"><span></span></label></span>
         </span>
         <span class="kt-list-timeline__time"><?php echo e($child->display_order); ?></span>
         <span class="kt-list-timeline__time"><?php echo e($child->web_views); ?></span>
         <span class="kt-list-timeline__time"><?php echo e($child->app_views); ?></span>
         <span class="kt-list-timeline__time">
         <!--action-->
          <span style="overflow: visible; position: relative; width: 80px;">
                                                 <div class="dropdown">
                                                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown"><i class="flaticon-more-1"></i></a>
                                                 <div class="dropdown-menu dropdown-menu-right">
                                                 <ul class="kt-nav">
                                                 <?php if(auth()->guard('admin')->user()->can('category-edit')): ?>
                                                 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/category/'.$child->id.'/edit')); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-contract"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.edit')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 <?php if(auth()->guard('admin')->user()->can('category-view')): ?>
                                                 <li class="kt-nav__item"><a href="<?php echo e(url('gwc/category/'.$child->id.'/view')); ?>" class="kt-nav__link"><i class="kt-nav__link-icon la la-eye"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.view')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 <?php if(auth()->guard('admin')->user()->can('category-delete')): ?>
                                                 <li class="kt-nav__item"><a href="javascript:;" data-toggle="modal" data-target="#kt_modal_<?php echo e($child->id); ?>" class="kt-nav__link"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text"><?php echo e(__('adminMessage.delete')); ?></span></a></li>
                                                 <?php endif; ?>
                                                 </ul>
                                                 </div>
                                                 </div>
                                                 </span>
                                                 
                                                 <!--Delete modal -->
                          <div class="modal fade" id="kt_modal_<?php echo e($child->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title"><?php echo e(__('adminMessage.alert')); ?></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
											<h6 class="modal-title text-left"><?php echo __('adminMessage.alertDeleteMessage'); ?></h6>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('adminMessage.no')); ?></button>
											<button type="button" class="btn btn-danger"  onClick="Javascript:window.location.href='<?php echo e(url('gwc/category/delete/'.$child->id)); ?>'"><?php echo e(__('adminMessage.yes')); ?></button>
										</div>
									</div>
								</div>
							</div>
         <!--end action -->
         </span>
         </div>
<div class="kt-separator kt-separator--space-sm kt-separator--border-dashed"></div>
            <?php if(count($child->childs)): ?>
                <?php echo $__env->make('gwc.category.childs',['childs' => $child->childs,'level'=>($level+1)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>    
            
            <?php endif; ?>
              
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /home/kashkha/private/resources/views/gwc/category/childs.blade.php ENDPATH**/ ?>