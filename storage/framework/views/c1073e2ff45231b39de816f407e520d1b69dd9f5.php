<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.website.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">حساب کاربری</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo e(url('/')); ?>">خانه </a></li>
                    <li>حساب کاربری</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        <li class="nav-item">
                            <a href="#account-dashboard" class="nav-link active">داشبرد</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-orders" class="nav-link">سفارشات </a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-downloads" class="nav-link">دانلودها </a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-addresses" class="nav-link">آدرس ها  </a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-details" class="nav-link">جزئیات حساب </a>
                        </li>

                    </ul>

                    <div class="tab-content mb-6">
                        <div class="tab-pane active in" id="account-dashboard">
                            <?php
                                use Illuminate\Support\Facades\Auth;

                     ?>
                            <p class="greeting">
                                سلام
                                <span class="text-dark font-weight-bold"><?php echo e(Auth::guard('member')->user()->full_name); ?> </span>
                                ( شما نیستید آقای
                                <span class="text-dark font-weight-bold"><?php echo e(Auth::guard('member')->user()->full_name); ?> </span>?
                                <a href="#" class="text-primary">خروج </a>)
                            </p>

                            <p class="mb-4">
                                از داشبورد حساب خود می توانید خود را مشاهده کنید <a href="#account-orders"
                                                                                    class="text-primary link-to-tab">سفارشات اخیر </a>,
                                مدیریت شما روی <a href="#account-addresses" class="text-primary link-to-tab">آدرس حمل و نقلها  </a>, و
                                <a href="#account-details" class="text-primary link-to-tab">رمز عبور و جزئیات حساب خود را ویرایش کنید.</a>
                            </p>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-orders" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">سفارشات </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-downloads" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-download">
                                                    <i class="w-icon-download"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">دانلود ها </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-addresses" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-address">
                                                    <i class="w-icon-map-marker"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">آدرس ها </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-details" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">جزئیات حساب </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="wishlist.html" class="link-to-tab">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">علاقه مندیها </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#">
                                        <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i class="w-icon-logout"></i>
                                                </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">خروج </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane mb-4" id="account-orders">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">سفارشات </h4>
                                </div>
                            </div>

                            <table class="shop-table account-orders-table mb-6">
                                <thead>
                                <tr>
                                    <th class="order-id">سفارش </th>
                                    <th class="order-date">تاریخ </th>
                                    <th class="order-status">وضعیت </th>
                                    <th class="order-total">مجموع </th>
                                    <th class="order-actions">اقدامات </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="order-id">#2321</td>
                                    <td class="order-date">خرداد 5</td>
                                    <td class="order-status">در حال پردازش </td>
                                    <td class="order-total">
                                        <span class="order-price">780000 تومان</span> برای
                                        <span class="order-quantity"> 1</span> آیتم
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">نمایش </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2321</td>
                                    <td class="order-date">خرداد 5</td>
                                    <td class="order-status">در حال پردازش </td>
                                    <td class="order-total">
                                        <span class="order-price">15000 تومان</span> برای
                                        <span class="order-quantity"> 1</span> آیتم
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">نمایش </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2319</td>
                                    <td class="order-date">خرداد 5</td>
                                    <td class="order-status">در حال پردازش </td>
                                    <td class="order-total">
                                        <span class="order-price">450000 تومان</span> برای
                                        <span class="order-quantity"> 1</span> آیتم
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">نمایش </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2318</td>
                                    <td class="order-date">خرداد 5</td>
                                    <td class="order-status">در حال پردازش </td>
                                    <td class="order-total">
                                        <span class="order-price">720000 تومان</span> برای
                                        <span class="order-quantity"> 1</span> آیتم
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                           class="btn btn-outline btn-default btn-block btn-sm btn-rounded">نمایش </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">برو فروشگاه <i class="w-icon-long-arrow-left"></i></a>
                        </div>

                        <div class="tab-pane" id="account-downloads">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-downloads mr-2">
                                        <i class="w-icon-download"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title ls-normal">دانلود ها </h4>
                                </div>
                            </div>
                            <p class="mb-4">هنوز دانلودی در دسترس نیست.</p>
                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">برو فروشگاه <i class="w-icon-long-arrow-left"></i></a>
                        </div>

                        <div class="tab-pane" id="account-addresses">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">آدرس ها </h4>
                                </div>
                            </div>
                            <p>آدرس های زیر به طور پیش فرض در صفحه پرداخت استفاده می شود.</p>
                            <div class="row">
                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address billing-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">آدرس قبض </h4>
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                <tr>
                                                    <th>نام:</th>
                                                    <td>جعفر خان </td>
                                                </tr>
                                                <tr>
                                                    <th>شرکت: </th>
                                                    <td>راست چین </td>
                                                </tr>
                                                <tr>
                                                    <th>آدرس: </th>
                                                    <td>پاناما </td>
                                                </tr>
                                                <tr>
                                                    <th>شهر:</th>
                                                    <td>پاناما </td>
                                                </tr>
                                                <tr>
                                                    <th>کشور:</th>
                                                    <td>پاناما </td>
                                                </tr>
                                                <tr>
                                                    <th>کد پستی :</th>
                                                    <td>92020</td>
                                                </tr>
                                                <tr>
                                                    <th>تلفن: </th>
                                                    <td>1112223334</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                        <a href="#"
                                           class="btn btn-link btn-underline btn-icon-right text-primary">آدرس صورتحساب خود را ویرایش کنید<i class="w-icon-long-arrow-left"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address shipping-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">آدرس حمل و نقل
                                            <address class="mb-4">
                                                <table class="address-table">
                                                    <tbody>
                                                    <tr>
                                                        <th>نام:</th>
                                                        <td>جعفر خان </td>
                                                    </tr>
                                                    <tr>
                                                        <th>شرکت: </th>
                                                        <td>راست چین </td>
                                                    </tr>
                                                    <tr>
                                                        <th>آدرس: </th>
                                                        <td>پاناما </td>
                                                    </tr>
                                                    <tr>
                                                        <th>شهر:</th>
                                                        <td>پاناما </td>
                                                    </tr>
                                                    <tr>
                                                        <th>کشور:</th>
                                                        <td>پاناما </td>
                                                    </tr>
                                                    <tr>
                                                        <th>کد پستی :</th>
                                                        <td>92020</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </address>
                                            <a href="#"
                                               class="btn btn-link btn-underline btn-icon-right text-primary">آدرس حمل و نقل خود را ویرایش کنید<i class="w-icon-long-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="account-details">
                            <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">جزئیات حساب </h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname"> نام کوچک*</label>
                                            <input type="text" id="firstname" name="firstname" placeholder="جعفر"
                                                   class="form-control form-control-md">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname"> نام خانوادگی  *</label>
                                            <input type="text" id="lastname" name="lastname" placeholder="عباسی"
                                                   class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="display-name">نام نمایشی *</label>
                                    <input type="text" id="display-name" name="display_name" placeholder="جعفر خان"
                                           class="form-control form-control-md mb-0">
                                    <p>به این ترتیب نام شما در بخش حساب و در بررسی ها نمایش داده می شود</p>
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email_1">آدرس ایمیل*</label>
                                    <input type="email" id="email_1" name="email_1"
                                           class="form-control form-control-md">
                                </div>

                                <h4 class="title title-password ls-25 font-weight-bold">تغییر رمز </h4>
                                <div class="form-group">
                                    <label class="text-dark" for="cur-password">رمز عبور فعلی را خالی بگذارید تا بدون تغییر باقی بماند</label>
                                    <input type="password" class="form-control form-control-md"
                                           id="cur-password" name="cur_password">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="new-password">رمز عبور جدید را خالی بگذارید تا بدون تغییر باقی بماند</label>
                                    <input type="password" class="form-control form-control-md"
                                           id="new-password" name="new_password">
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark" for="conf-password">تایید رمز عبور </label>
                                    <input type="password" class="form-control form-control-md"
                                           id="conf-password" name="conf_password">
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">ذخیره تغییرات </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <?php echo $__env->make('front.website.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\shayegan_project\shop\resources\views/front/member_panel/dashboard.blade.php ENDPATH**/ ?>