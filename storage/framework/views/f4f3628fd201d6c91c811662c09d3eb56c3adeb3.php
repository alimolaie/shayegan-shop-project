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

<?php $__env->startSection('style'); ?>
    <style>
        .wrapper {
            width: 350px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2);
        }

        .wrapper .title {
            color: #fff;
            line-height: 65px;
            text-align: center;
            background: #233;
            font-size: 25px;
            font-weight: 500;
            border-radius: 10px 10px 0 0;
        }

        .wrapper .box {
            padding: 20px 30px;
            background: #fff;
            border-radius: 10px;
        }

        .wrapper .box label {
            display: flex;
            height: 53px;
            width: 100%;
            align-items: center;
            border: 1px solid lightgrey;
            border-radius: 50px;
            margin: 10px 0;
            padding-left: 20px;
            cursor: default;
            transition: all 0.3s ease;
        }

        #option-1:checked~.option-1,
        #option-2:checked~.option-2,
        #option-3:checked~.option-3,
        #option-4:checked~.option-4 {
            background: #333;
            border-color: #333;
        }

        .wrapper .box label .dot {
            height: 20px;
            width: 20px;
            background: #d9d9d9;
            border-radius: 50%;
            position: relative;
            transition: all 0.3s ease;
        }

        #option-1:checked~.option-1 .dot,
        #option-2:checked~.option-2 .dot,
        #option-3:checked~.option-3 .dot,
        #option-4:checked~.option-4 .dot {
            background: #fff;
        }

        .box label .dot::before {
            position: absolute;
            content: "";
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(2);
            width: 9px;
            height: 9px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        #option-1:checked~.option-1 .dot::before,
        #option-2:checked~.option-2 .dot::before,
        #option-3:checked~.option-3 .dot::before,
        #option-4:checked~.option-4 .dot::before {
            background: #333;
            transform: translate(-50%, -50%) scale(1);
        }

        .wrapper .box label .text {
            color: #333;
            font-size: 18px;
            font-weight: 400;
            padding-left: 10px;
            transition: color 0.3s ease;
        }

        #option-1:checked~.option-1 .text,
        #option-2:checked~.option-2 .text,
        #option-3:checked~.option-3 .text,
        #option-4:checked~.option-4 .text {
            color: #fff;
        }

        .wrapper .box input[type="radio"] {
            display: none;
        }
    </style>
        <?php $__env->stopSection(); ?>
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
                <form class="form checkout-form" action="<?php echo e(url('users/submit-order')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-9">
                        <div class="col-lg-7 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                جزئیات صورتحساب
                            </h3>
                            <div class="form-group">
                                <label>نام و نام خانوادگی</label>
                                <input type="text" class="form-control form-control-md" name="name">
                            </div>
                            <div class="form-group">
                                <label>کد ملی</label>
                                <input type="text" class="form-control form-control-md" name="code_meli">
                            </div>
                            <div class="form-group">
                                <label>آدرس   *</label>
                                <input type="text" placeholder="شماره خانه و نام خیابان"
                                       class="form-control form-control-md mb-2" name="full_address" required>
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
                                        <input type="text" class="form-control form-control-md" name="mobile" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-7">
                                <label>آدرس ایمیل *</label>
                                <input type="email" class="form-control form-control-md" name="email" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="order-notes">یادداشت های سفارش (اختیاری)</label>
                                <textarea class="form-control mb-0" id="order-notes" name="order_details" cols="30"
                                          rows="4"
                                          placeholder="یادداشتی بنویسید شاید لازم شد."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                            <?php if(session('cart')): ?>
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
                                            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="bb-no">
                                                <td class="product-name"><?php echo e(str_limit($details['title_ar'],50)); ?> <i
                                                            class="fas fa-times"></i> <span
                                                            class="product-quantity"><?php echo e($details['qty']); ?></span></td>
                                                <td class="product-total"><?php echo e(number_format($details['retail_price'])); ?> تومان </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="cart-subtotal bb-no">
                                                <td>
                                                    <b>مجموع</b>
                                                </td>
                                                <td>
                                                    <b><?php echo e(number_format(array_sum(array_column(session('cart'), 'retail_price')))); ?> تومان</b>
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
                                                                       class="custom-control-label color-dark">نرخ ثابت: <?php echo e(number_format($setting->post_price)); ?> تومان</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>

                                            <tr class="order-total">

                                                <div class="wrapper col-12 mb-4">
                                                    <div class="title"><p style="margin: auto;width: 60%;padding: 10px;font-size: large">روش پرداخت</p></div>
                                                    <div class="box">
                                                        <input type="radio" name="pay_mode" id="option-1" value="1">
                                                        <input type="radio" name="pay_mode" id="option-2" value="2">

                                                        <label for="option-1" class="option-1">
                                                            <div class="dot"></div>
                                                            <div class="text"><p style="margin: auto;width: 60%;padding: 10px;font-size: large">نقدی</p></div>
                                                        </label>
                                                        <label for="option-2" class="option-2">
                                                            <div class="dot"></div>
                                                            <div class="text"><p style="margin: auto;width: 60%;padding: 10px;font-size: large">اقساطی</p></div>
                                                        </label>

                                                    </div>
                                                </div>


                                            </tr>
                                            <?php
                                                $resultPrice=100000;
                                                ?>
                                            <input type="hidden" name="total_amount" value="<?php echo e($resultPrice); ?>">

                                            <tr class="order-total">
                                                <th>
                                                    <b>جمع کل</b>
                                                </th>
                                                <td>
                                                    <b><?php echo e(number_format($resultPrice)); ?> تومان</b>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>

                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        

                                        <div class="form-group place-order pt-6">
                                            <button type="submit" class="btn btn-dark btn-block btn-rounded">سفارش</button>
                                        </div>
                                    </div>
                                </div>

                            <?php endif; ?>

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