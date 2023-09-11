@extends('front.master')
@section('content')
    @include('front.website.partials.header')
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
                                            @foreach($state as $states)
                                                    <option value="{{$states->id}}">{{$states->name}}</option>

                                                @endforeach

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
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->name}}</option>

                                                @endforeach

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
{{--                                                    <li>--}}
{{--                                                        <div class="custom-radio">--}}
{{--                                                            <input type="radio" id="free-shipping"--}}
{{--                                                                   class="custom-control-input" name="shipping">--}}
{{--                                                            <label for="free-shipping"--}}
{{--                                                                   class="custom-control-label color-dark">ارسال رایگان</label>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="custom-radio">--}}
{{--                                                            <input type="radio" id="local-pickup"--}}
{{--                                                                   class="custom-control-input" name="shipping">--}}
{{--                                                            <label for="local-pickup"--}}
{{--                                                                   class="custom-control-label color-dark">وانت محلی</label>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
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

{{--                                    <div class="payment-methods" id="payment_method">--}}
{{--                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-1">روش های پرداخت </h4>--}}
{{--                                        <div class="accordion payment-accordion">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-header">--}}
{{--                                                    <a href="#cash-on-delivery" class="collapse">انتقال مستقیم بانکی</a>--}}
{{--                                                </div>--}}
{{--                                                <div id="cash-on-delivery" class="card-body expanded">--}}
{{--                                                    <p class="mb-0">--}}
{{--                                                        پرداخت خود را مستقیماً به حساب بانکی ما انجام دهید. لطفا از شناسه سفارش خود به عنوان مرجع پرداخت استفاده کنید. سفارش شما تا زمانی که وجوه در حساب ما تسویه نشده باشد ارسال نخواهد شد.--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-header">--}}
{{--                                                    <a href="#payment" class="expand">پرداخت ها را چک کنید </a>--}}
{{--                                                </div>--}}
{{--                                                <div id="payment" class="card-body collapsed">--}}
{{--                                                    <p class="mb-0">--}}
{{--                                                        لطفا یک چک به نام فروشگاه، خیابان فروشگاه، شهرک فروشگاه، ایالت/شهرستان فروشگاه، کدپستی فروشگاه ارسال کنید.--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-header">--}}
{{--                                                    <a href="#delivery" class="expand">پرداخت نقدی هنگام تحویل</a>--}}
{{--                                                </div>--}}
{{--                                                <div id="delivery" class="card-body collapsed">--}}
{{--                                                    <p class="mb-0">--}}
{{--                                                        پرداخت نقدی هنگام تحویل.--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="card p-relative">--}}
{{--                                                <div class="card-header">--}}
{{--                                                    <a href="#paypal" class="expand">پی پال </a>--}}
{{--                                                </div>--}}
{{--                                                <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup" class="text-primary paypal-que"--}}
{{--                                                   onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal',--}}
{{--                                                        'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700');--}}
{{--                                                        return false;">پی پال چیست؟--}}
{{--                                                </a>--}}
{{--                                                <div id="paypal" class="card-body collapsed">--}}
{{--                                                    <p class="mb-0">--}}
{{--                                                        پرداخت از طریق پی پال، اگر حساب پی پال ندارید، می توانید با کارت اعتباری خود پرداخت کنید.--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

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
    @include('front.website.partials.footer')
@endsection