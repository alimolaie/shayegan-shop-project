<?php if($settingInfo->theme==1 || $settingInfo->theme==5  || $settingInfo->theme==6  || $settingInfo->theme==7): ?> 
<?php echo $__env->make("website.includes.banner_theme1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if($settingInfo->theme==2): ?> 
<?php echo $__env->make("website.includes.banner_theme2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if($settingInfo->theme==3): ?> 
<?php echo $__env->make("website.includes.banner_theme3", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if($settingInfo->theme==4): ?> 
<?php echo $__env->make("website.includes.banner_theme4", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if($settingInfo->theme==8): ?> 
<?php echo $__env->make("website.includes.banner_theme8", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if($settingInfo->theme==10): ?> 
<?php echo $__env->make("website.includes.banner_theme10", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/kashkha/private/resources/views/website/includes/banner.blade.php ENDPATH**/ ?>