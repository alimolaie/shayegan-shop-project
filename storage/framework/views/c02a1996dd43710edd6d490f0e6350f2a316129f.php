   

    <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <option value="<?php echo e($child->id); ?>" <?php echo e(!empty($editcategory->parent_id) && $editcategory->parent_id==$child->id?'selected':''); ?>>
         <?php for($i = 0; $i <= $level; $i++): ?>            
         -
         <?php endfor; ?>
          <?php echo e($child->name_en); ?></option>

            <?php if(count($child->childs)): ?>

                <?php echo $__env->make('gwc.category.dropdown_childs',['childs' => $child->childs,'level'=>($level+1),'editcategory'=>!empty($editcategory) && $editcategory?$editcategory:[]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH /home/kashkha/private/resources/views/gwc/category/dropdown_childs.blade.php ENDPATH**/ ?>