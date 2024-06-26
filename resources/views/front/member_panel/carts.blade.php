@extends('front.master')
@section('content')
    @include('front.website.partials.header')
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



{{--                                <ul class="shipping-methods mb-2">--}}
{{--                                    <li>--}}
{{--                                        <label--}}
{{--                                                class="shipping-title text-dark font-weight-bold">حمل و نقل</label>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="custom-radio">--}}
{{--                                            <input type="radio" id="free-shipping" class="custom-control-input"--}}
{{--                                                   name="shipping">--}}
{{--                                            <label for="free-shipping"--}}
{{--                                                   class="custom-control-label color-dark">حمل و نقل رایگان</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="custom-radio">--}}
{{--                                            <input type="radio" id="local-pickup" class="custom-control-input"--}}
{{--                                                   name="shipping">--}}
{{--                                            <label for="local-pickup"--}}
{{--                                                   class="custom-control-label color-dark">وانت محلی</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="custom-radio">--}}
{{--                                            <input type="radio" id="flat-rate" class="custom-control-input"--}}
{{--                                                   name="shipping">--}}
{{--                                            <label for="flat-rate" class="custom-control-label color-dark">نرخ ثابت:--}}
{{--                                                78000 تومان</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}

{{--                                <div class="shipping-calculator">--}}
{{--                                    <p class="shipping-destination lh-1">حمل و نقل به <strong>CA</strong>.</p>--}}

{{--                                    <form class="shipping-calculator-form">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <div class="select-box">--}}
{{--                                                <select name="country" class="form-control form-control-md">--}}
{{--                                                    <option value="default" selected="selected">ایالات متحده--}}
{{--                                                        (US)--}}
{{--                                                    </option>--}}
{{--                                                    <option value="us">ایالات متحده</option>--}}
{{--                                                    <option value="uk">انگلستان</option>--}}
{{--                                                    <option value="fr">فرانسه </option>--}}
{{--                                                    <option value="aus">استرالیا </option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <div class="select-box">--}}
{{--                                                <select name="state" class="form-control form-control-md">--}}
{{--                                                    <option value="default" selected="selected"> کالیفرنیا--}}
{{--                                                    </option>--}}
{{--                                                    <option value="ohaio">اوهایو</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input class="form-control form-control-md" type="text"--}}
{{--                                                   name="town-city" placeholder="خانه / شهر">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input class="form-control form-control-md" type="text"--}}
{{--                                                   name="zipcode" placeholder="کد پستی">--}}
{{--                                        </div>--}}
{{--                                        <button type="submit" class="btn btn-dark btn-outline btn-rounded">آپدیت مجموع</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}

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

    @include('front.website.partials.footer')
@endsection