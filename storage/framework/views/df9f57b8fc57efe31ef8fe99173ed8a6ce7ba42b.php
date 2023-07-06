<?php if((count($category->children) > 0) AND ($category->parent_id > 0)): ?>

<?php else: ?>
<?php
if($category->link=='javascript:;'){
$link = $category->link;
}else{
$link = url('gwc/'.$category->link);
}


?>
    <li class="kt-menu__item  kt-menu__item--submenu"  aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="<?php echo e($link); ?>" class="kt-menu__link <?php if($category->link=='javascript:;'): ?> kt-menu__toggle <?php endif; ?>"><?php if($category->parent_id==0): ?><i class="kt-menu__link-icon <?php echo e($category->icon); ?>"></i> <?php else: ?> <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><?php endif; ?><span class="kt-menu__link-text"><?php echo e($category->name); ?></span><i class="kt-menu__ver-arrow <?php if($category->link=="javascript:;"): ?> la la-angle-right  <?php endif; ?> "></i></a>
<div class="kt-menu__submenu ">

<?php endif; ?>

    <?php if(count($category->children) > 0): ?>

        <ul class="kt-menu__subnav">

        <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo $__env->make('gwc.includes.menu', $category, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

    <?php endif; ?>
</div>
 </li><?php /**PATH C:\xampp\htdocs\tikbazar\resources\views/gwc/includes/menu.blade.php ENDPATH**/ ?>