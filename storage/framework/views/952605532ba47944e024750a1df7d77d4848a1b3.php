   
<?php if(!empty($childs) && count($childs)>0): ?>
    <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <option value="<?php echo e($child->id); ?>" <?php if($child->id==$listCategory->category_id): ?> selected <?php endif; ?> >
         <?php for($i = 0; $i <= $level; $i++): ?>            
         <?php echo e($ParentName); ?> >
         <?php endfor; ?>
          <?php echo e($child->name_en); ?></option>

            <?php if(!empty($child->childs) && count($child->childs)): ?>

                <?php echo $__env->make('gwc.product.dropdown_edit_childs',['ParentName'=>$child->name_en,'childs' => $child->childs,'level'=>($level+1),'listCategory'=>$listCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php /**PATH /home/kashkha/private/resources/views/gwc/product/dropdown_edit_childs.blade.php ENDPATH**/ ?>