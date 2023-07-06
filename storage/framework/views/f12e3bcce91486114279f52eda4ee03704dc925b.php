<?php if(!empty($category->childs) && count($category->childs)>0): ?>

<li>
<a href="<?php echo e(url('products/'.$category->id.'/'.$category->friendly_url)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($category->name_en); ?> <?php else: ?> <?php echo e($category->name_ar); ?> <?php endif; ?></a>
      <ul>
        <?php $__currentLoopData = $category->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo $__env->make('website.includes.mobilemenu', $category, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
 </li>
 
 <?php else: ?>
 
<li>
<a href="<?php echo e(url('products/'.$category->id.'/'.$category->friendly_url)); ?>"><?php if(app()->getLocale()=="en"): ?> <?php echo e($category->name_en); ?> <?php else: ?> <?php echo e($category->name_ar); ?> <?php endif; ?></a>
 </li>
  
 <?php endif; ?><?php /**PATH D:\laravel projects\tikbazar\resources\views/website/includes/mobilemenu.blade.php ENDPATH**/ ?>