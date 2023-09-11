<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.website.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Start of Main -->
    <main class="main checkout">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="cart.html">فروشگاه پینگ سبد خرید </a></li>
                    <li class="active"><a href="checkout.html">پرداخت </a></li>
                    <li><a href="order.html">سفارش کامل شد</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->


        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">

                <div class="coupon-toggle">
                    کد تخفیف دارید؟ <a href="#"
                                       class="show-coupon font-weight-bold text-uppercase text-dark">کد را وارد کنید </a>
                </div>
                <div class="coupon-content mb-4">
                    <p>اگر کد کوپن دارید، لطفاً آن را در زیر اعمال کنید.</p>
                    <div class="input-wrapper-inline">
                        <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2" placeholder="کد تخفیف" id="coupon_code">
                        <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="اعمال کد">اعمال کد</button>
                    </div>
                </div>
                <form class="form checkout-form" action="#" method="post">
                    <div class="row mb-9">
                        <div class="col-lg-7 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                جزئیات صورتحساب
                            </h3>
                            <div class="form-group">
                                <label>نام و نام خانوادگی</label>
                                <input type="text" class="form-control form-control-md" name="company-name">
                            </div>
                            <div class="form-group">
                                <label>آدرس   *</label>
                                <input type="text" placeholder="شماره خانه و نام خیابان"
                                       class="form-control form-control-md mb-2" name="street-address-1" required>
                            </div>
                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> استان  *</label>
                                        <div class="select-box">
                                            <select name="state_id" class="form-control form-control-md">
                                                <option value="default" selected="selected">استان را انتخاب کنید </option>
                                            <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($states->id); ?>"><?php echo e($states->name); ?></option>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> کد پستی *</label>
                                        <input type="text" class="form-control form-control-md" name="zip" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> شهر  *</label>
                                        <div class="select-box">
                                            <select name="area_id" class="form-control form-control-md">
                                                <option value="default" selected="selected">شهر را انتخاب کنید </option>
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> تلفن  *</label>
                                        <input type="text" class="form-control form-control-md" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-7">
                                <label>آدرس ایمیل *</label>
                                <input type="email" class="form-control form-control-md" name="email" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="order-notes">یادداشت های سفارش (اختیاری)</label>
                                <textarea class="form-control mb-0" id="order-notes" name="order-notes" cols="30"
                                          rows="4"
                                          placeholder="یادداشتی بنویسید شاید لازم شد."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                            <div class="order-summary-wrapper sticky-sidebar">
                                <h3 class="title text-uppercase ls-10">سفارش شما</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <thead>
                                        <tr>
                                            <th colspan="2">
                                                <b>محصول</b>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bb-no">
                                            <td class="product-name">کت چاپ نخل <i
                                                        class="fas fa-times"></i> <span
                                                        class="product-quantity">1</span></td>
                                            <td class="product-total">80000 تومان </td>
                                        </tr>
                                        <tr class="bb-no">
                                            <td class="product-name">کوله پشتی قهوه ای <i class="fas fa-times"></i>
                                                <span class="product-quantity">1</span></td>
                                            <td class="product-total">50000 تومان</td>
                                        </tr>
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>مجموع</b>
                                            </td>
                                            <td>
                                                <b>100000 تومان</b>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr class="shipping-methods">
                                            <td colspan="2" class="text-left">
                                                <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">حمل و نقل
                                                </h4>
                                                <ul id="shipping-method" class="mb-4">
















                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="flat-rate"
                                                                   class="custom-control-input" name="shipping" checked disabled>
                                                            <label for="flat-rate"
                                                                   class="custom-control-label color-dark">نرخ ثابت: 78000 تومان</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>
                                                <b>جمع کل</b>
                                            </th>
                                            <td>
                                                <b>100000 تومان</b>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>




















































                                    <div class="form-group place-order pt-6">
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">سفارش</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
    <?php echo $__env->make('front.website.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\shayegan_project\shop\resources\views/front/website/checkout.blade.php ENDPATH**/ ?>