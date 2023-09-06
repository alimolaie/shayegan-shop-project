<div class="row category-wrapper electronics-cosmetics appear-animate mb-7">
    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 mb-4">
            <div class="banner banner-fixed br-sm">
                <figure>
                    <img src="<?php echo e(asset('uploads/banner/'.$banner->image)); ?>" alt="Category Banner"
                         width="640" height="200" style="background-color: #25282D;" />
                </figure>
                <div class="banner-content y-50">
                    <h3 class="banner-title text-white ls-25 mb-0"><?php echo e($banner->title_ar); ?> </h3>
                    <div class="banner-price-info text-white font-weight-bold text-uppercase mb-1">
                    <?php echo $banner->details_ar; ?>

                    </div>
                    <hr class="banner-divider bg-white" />
                    <a href="<?php echo e(url($banner->link)); ?>"
                       class="btn btn-white btn-link btn-underline btn-icon-right">
                        اکنون بخرید <i class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php /**PATH E:\shayegan_project\shop\resources\views/front/website/partials/cate_image.blade.php ENDPATH**/ ?>