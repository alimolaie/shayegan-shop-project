<?php
if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
?>
<!--theme1 start-->
<?php if($settingInfo->theme==1 || $settingInfo->theme==4 || $settingInfo->theme==6 || $settingInfo->theme==7): ?> 
<?php echo $__env->make("website.includes.header_theme1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--theme1 end-->

<?php if($settingInfo->theme==5): ?> 
<!--theme2 start -->
<?php echo $__env->make("website.includes.header_theme5", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--theme2 end -->
<?php endif; ?>

<?php if($settingInfo->theme==2): ?> 
<!--theme2 start -->
<?php echo $__env->make("website.includes.header_theme2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--theme2 end -->
<?php endif; ?>
<!--theme1 start-->
<?php if($settingInfo->theme==3): ?> 
<?php if(Route::getCurrentRoute()->getActionName()=="App\Http\Controllers\webController@index"): ?>
<?php echo $__env->make("website.includes.header_theme3", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php echo $__env->make("website.includes.header_theme3_inner", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php endif; ?>

<!--theme 8-->
<?php if($settingInfo->theme==8): ?> 
<?php echo $__env->make("website.includes.header_theme8", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<!--theme 8-->
<?php if($settingInfo->theme==9): ?> 
<?php echo $__env->make("website.includes.header_theme9", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<!--theme 10-->
<?php if($settingInfo->theme==10): ?> 
<?php echo $__env->make("website.includes.header_theme10", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tikbazar\resources\views/website/includes/header.blade.php ENDPATH**/ ?>