<div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mt-6 mb-10"
     data-swiper-options="{
                    'loop': true,
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    },
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }">
    <?php
    $intro=\Illuminate\Support\Facades\DB::table('intro_sections')->get();

 ?>

        <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
            <?php $__currentLoopData = $intro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide icon-box icon-box-side text-dark">
                            <span class="icon-box-icon icon-shipping">
                                <i class="<?php echo e($i->icon); ?>"></i>
                            </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title"><?php echo e($i->title); ?></h4>
                    <p class="text-default"><?php echo e($i->description); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


</div>
<?php /**PATH E:\shayegan_project\shop\resources\views/front/website/partials/icon-box.blade.php ENDPATH**/ ?>