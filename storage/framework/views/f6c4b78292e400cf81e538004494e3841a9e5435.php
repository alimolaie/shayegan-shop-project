<?php $__currentLoopData = $slideShows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slideShow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="intro-section">
        <div class="swiper-container swiper-theme nav-inner pg-inner animation-slider pg-xxl-hide pg-show nav-xxl-show nav-hide"
             data-swiper-options="{
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    }
                }">
            <div class="swiper-wrapper row gutter-no cols-1">
                <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                     style="background-image: url(website_assets/assets/images/white_bg.jpg); background-color: #f1f0f0;">
                    <div class="container">
                        <figure class="slide-image floating-item slide-animate" data-animation-options="{
                                    'name': 'fadeInDownShorter', 'duration': '1s'
                                }" data-options="{'relativeInput':true,'clipRelativeInput':true,'invertX':true,'invertY':true}"
                                data-child-depth="0.2">
                            <img src="<?php echo e(asset('uploads/slideshow/'.$slideShow->image)); ?>" alt="Ski" width="729"
                                 height="570" />
                        </figure>
                        <div class="banner-content text-right y-50 ml-auto">
                            <h3 class="banner-title ls-25 mb-6 slide-animate" data-animation-options="{
                                        'name': 'fadeInUpShorter', 'duration': '1s'
                                    }"><?php echo $slideShow->title_ar; ?>

                            </h3>
                            <a href="<?php echo e(url($slideShow->link)); ?>"
                               class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                               data-animation-options="{
                                        'name': 'fadeInUpShorter', 'duration': '1s'
                                    }">
                                اکنون بخرید <i class="w-icon-long-arrow-left"></i></a>
                        </div>
                        <!-- End of .banner-content -->
                    </div>
                    <!-- End of .container -->
                </div>
                <!-- End of .intro-slide1 -->

                <!-- End of .intro-slide2 -->

                <!-- End of .intro-slide3 -->
            </div>
            <div class="swiper-pagination"></div>
            <button class="swiper-button-next"></button>
            <button class="swiper-button-prev"></button>
        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\shayegan_project\shop\resources\views/front/website/partials/intro.blade.php ENDPATH**/ ?>