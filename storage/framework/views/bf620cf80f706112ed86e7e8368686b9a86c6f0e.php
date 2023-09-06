<div class="title-link-wrapper mb-2 appear-animate">
    <h2 class="title">محصولات محبوب</h2>
    <a href="shop-boxed-banner.html" class="font-weight-bold ls-25">محصولات بیشتر <i
                class="w-icon-long-arrow-left"></i></a>
</div>
<div class="swiper-container swiper-theme top-products mb-6 appear-animate" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 5
                        }
                    }
                }">
    <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">




            <?php $__currentLoopData = $Popular_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="swiper-slide product-wrap">
                <div class="product text-center">
                    <figure class="product-media">

                            <a href="<?php echo e(url('product/'.$product->id)); ?>">
                                <img src="<?php echo e(asset('uploads/product/'.$product->image)); ?>" alt="Product"
                                     width="300" height="338">
                                <img src="<?php echo e(asset('uploads/product/'.$product->image)); ?>" alt="Product"
                                     width="300" height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                               title="افزودن به سبد "></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                               title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                               title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                               title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="<?php echo e(url('product/'.$product->id)); ?>"><?php echo e($product->title_ar); ?></a></h4>

                        <div class="product-price">
                            <ins class="new-price"><?php echo e(number_format($product->retail_price)); ?> تومان</ins>
                            <?php if($product->old_price!=null): ?>
                                <del class="old-price"><?php echo e(number_format($product->old_price)); ?> تومان</del>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <div class="swiper-pagination"></div>
</div><?php /**PATH E:\shayegan_project\shop\resources\views/front/website/partials/product2.blade.php ENDPATH**/ ?>