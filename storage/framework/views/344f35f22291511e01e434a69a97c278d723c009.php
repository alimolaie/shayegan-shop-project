<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.website.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a href="cart.html">فروشگاه پینگ سبد خرید </a></li>
                    <li><a href="checkout.html">پرداخت </a></li>
                    <li><a href="order.html">سفارش کامل شد</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
                            <thead>
                            <tr>
                                <th class="product-name"><span>محصول </span></th>
                                <th></th>
                                <th class="product-price"><span>قیمت </span></th>
                                <th class="product-quantity"><span>تعداد </span></th>
                                <th class="product-subtotal"><span>جمع فرعی </span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="product-default.html">
                                            <figure>
                                                <img src="assets/images/shop/12.jpg" alt="product"
                                                     width="300" height="338">
                                            </figure>
                                        </a>
                                        <button type="submit" class="btn btn-close"><i
                                                    class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="product-default.html">
                                        کوله پشتی ساده کلاسیک
                                    </a>
                                </td>
                                <td class="product-price"><span class="amount">80000 تومان </span></td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <input class="quantity form-control" type="number" min="1" max="100000">
                                        <button class="quantity-plus w-icon-plus"></button>
                                        <button class="quantity-minus w-icon-minus"></button>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">80000 تومان </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="product-default.html">
                                            <figure>
                                                <img src="assets/images/shop/13.jpg" alt="product"
                                                     width="300" height="338">
                                            </figure>
                                        </a>
                                        <button class="btn btn-close"><i class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="product-default.html">
                                        ساعت هوشمند
                                    </a>
                                </td>
                                <td class="product-price"><span class="amount">50000 تومان</span></td>
                                <td class="product-quantity">
                                    <div class="input-group">
                                        <input class="quantity form-control" type="number" min="1" max="100000">
                                        <button class="quantity-plus w-icon-plus"></button>
                                        <button class="quantity-minus w-icon-minus"></button>
                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">50000 تومان</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="cart-action mb-6">
                            <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>ادامه خرید کردن  </a>
                            <button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="پاک کردن سبد ">پاک کردن سبد </button>
                            <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart" value="بروز کردن سبد">بروز کردن سبد</button>
                        </div>

                        <form class="coupon">
                            <h5 class="title coupon-title font-weight-bold text-uppercase">جشنواره کوپن با </h5>
                            <input type="text" class="form-control mb-4" placeholder="کد تخفیف را وارد کنید..." required />
                            <button class="btn btn-dark btn-outline btn-rounded">اعمال کد</button>
                        </form>
                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">








































































                                <div class="order-total d-flex justify-content-between align-items-center">
                                    <label>مجموع</label>
                                    <span class="ls-50">100000 تومان</span>
                                </div>
                                <a href="#"
                                   class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                    پردازش و پرداخت<i class="w-icon-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>

    <?php echo $__env->make('front.website.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\shayegan_project\shop\resources\views/front/member_panel/carts.blade.php ENDPATH**/ ?>