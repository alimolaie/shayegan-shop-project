<!DOCTYPE html>
<html lang="en">
@php
    $setting=\App\Settings::find(1);
 @endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>

    {{$setting->name_ar}}
    </title>


    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description"
          content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('website_assets/assets/images/icons/favicon.png')}}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'website_assets/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{asset('website_assets/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('website_assets/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('website_assets/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{asset('website_assets/assets/fonts/wolmart87d5.woff')}}?png09e" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('website_assets/assets/vendor/fontawesome-free/css/all.min.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('website_assets/assets/vendor/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website_assets/assets/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website_assets/assets/vendor/magnific-popup/magnific-popup.min.css')}}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('website_assets/assets/css/demo2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website_assets/assets/css/style-rtl.min.css')}}">
    @yield('style')
</head>

<body class="home">
<div class="page-wrapper">
    <h1 class="d-none">فروشگاه اقساطی  شایگان</h1>
    <!-- Start of Header -->
    @yield('content')
{{--    @include('front.website.partials.header')--}}
    <!-- End of Header -->
{{--    <main class="main">--}}
{{--        <div class="intro-section">--}}
{{--            <div class="swiper-container swiper-theme nav-inner pg-inner animation-slider pg-xxl-hide pg-show nav-xxl-show nav-hide"--}}
{{--                 data-swiper-options="{--}}
{{--                    'slidesPerView': 1,--}}
{{--                    'autoplay': {--}}
{{--                        'delay': 4000,--}}
{{--                        'disableOnInteraction': false--}}
{{--                    }--}}
{{--                }">--}}
{{--                <div class="swiper-wrapper row gutter-no cols-1">--}}
{{--                    <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"--}}
{{--                         style="background-image: url(website_assets/assets/images/demos/demo2/slides/slide-1.jpg); background-color: #f1f0f0;">--}}
{{--                        <div class="container">--}}
{{--                            <figure class="slide-image floating-item slide-animate" data-animation-options="{--}}
{{--                                    'name': 'fadeInDownShorter', 'duration': '1s'--}}
{{--                                }" data-options="{'relativeInput':true,'clipRelativeInput':true,'invertX':true,'invertY':true}"--}}
{{--                                    data-child-depth="0.2">--}}
{{--                                <img src="website_assets/assets/images/demos/demo2/slides/ski.png" alt="Ski" width="729"--}}
{{--                                     height="570" />--}}
{{--                            </figure>--}}
{{--                            <div class="banner-content text-right y-50 ml-auto">--}}
{{--                                <h5 class="banner-subtitle text-uppercase font-weight-bold mb-2 slide-animate"--}}
{{--                                    data-animation-options="{--}}
{{--                                        'name': 'fadeInUpShorter', 'duration': '1s'--}}
{{--                                    }">معاملات و تبلیغات</h5>--}}
{{--                                <h3 class="banner-title ls-25 mb-6 slide-animate" data-animation-options="{--}}
{{--                                        'name': 'fadeInUpShorter', 'duration': '1s'--}}
{{--                                    }">مدل  <span class="text-primary">لباس اسکی </span> برای هواداران پرشور ورزش--}}
{{--                                </h3>--}}
{{--                                <a href="shop-banner-sidebar.html"--}}
{{--                                   class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"--}}
{{--                                   data-animation-options="{--}}
{{--                                        'name': 'fadeInUpShorter', 'duration': '1s'--}}
{{--                                    }">--}}
{{--                                    اکنون بخرید <i class="w-icon-long-arrow-left"></i></a>--}}
{{--                            </div>--}}
{{--                            <!-- End of .banner-content -->--}}
{{--                        </div>--}}
{{--                        <!-- End of .container -->--}}
{{--                    </div>--}}
{{--                    <!-- End of .intro-slide1 -->--}}

{{--                    <div class="swiper-slide banner banner-fixed intro-slide intro-slide2"--}}
{{--                         style="background-image: url(website_assets/assets/images/demos/demo2/slides/slide-2.jpg); background-color: #d9ddd9;">--}}
{{--                        <div class="container">--}}
{{--                            <figure class="slide-image floating-item slide-animate" data-animation-options="{--}}
{{--                                    'name': 'fadeInUpShorter', 'duration': '1s'--}}
{{--                                }" data-options="{'relativeInput':true,'clipRelativeInput':true,'invertX':true,'invertY':true}"--}}
{{--                                    data-child-depth="0.2">--}}
{{--                                <img src="website_assets/assets/images/demos/demo2/slides/woman.png" alt="Ski" width="865"--}}
{{--                                     height="732" />--}}
{{--                            </figure>--}}
{{--                            <div class="banner-content y-50">--}}
{{--                                <h5 class="banner-subtitle text-uppercase font-weight-bold mb-2 slide-animate"--}}
{{--                                    data-animation-options="{--}}
{{--                                        'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.5s'--}}
{{--                                    }">اخبار و الهام</h5>--}}
{{--                                <h3 class="banner-title ls-25 mb-2 text-uppercase lh-1 slide-animate"--}}
{{--                                    data-animation-options="{--}}
{{--                                        'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.7s'--}}
{{--                                    }">صدای طبیعی</h3>--}}
{{--                                <div class="banner-price-info font-weight-bold text-dark ls-25 slide-animate"--}}
{{--                                     data-animation-options="{--}}
{{--                                        'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.9s'--}}
{{--                                    }">فروش تا--}}
{{--                                    <span class="text-primary font-weight-bolder text-uppercase ls-normal">30%--}}
{{--                                            تخفیف</span></div>--}}
{{--                                <p class="font-weight-normal text-default ls-25 slide-animate"--}}
{{--                                   data-animation-options="{--}}
{{--                                        'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '1.1s'--}}
{{--                                    }">بازگشت رایگان تا 30 روز پس از تحویل افزایش یافت</p>--}}
{{--                                <a href="shop-banner-sidebar.html"--}}
{{--                                   class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"--}}
{{--                                   data-animation-options="{--}}
{{--                                        'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '1.3s'--}}
{{--                                    }">--}}
{{--                                    اکنون بخرید <i class="w-icon-long-arrow-left"></i></a>--}}
{{--                            </div>--}}
{{--                            <!-- End of .banner-content -->--}}
{{--                        </div>--}}
{{--                        <!-- End of .container -->--}}
{{--                    </div>--}}
{{--                    <!-- End of .intro-slide2 -->--}}

{{--                    <div class="swiper-slide banner banner-fixed intro-slide intro-slide3"--}}
{{--                         style="background-image: url(website_assets/assets/images/demos/demo2/slides/slide-3.jpg); background-color: #d0cfcb;">--}}
{{--                        <div class="container">--}}
{{--                            <figure class="slide-image floating-item slide-animate" data-animation-options="{--}}
{{--                                    'name': 'fadeInRightShorter', 'duration': '1s'--}}
{{--                                }" data-options="{'relativeInput':true,'clipRelativeInput':true,'invertX':true,'invertY':true}"--}}
{{--                                    data-child-depth="0.2">--}}
{{--                                <img src="website_assets/assets/images/demos/demo2/slides/man.png" alt="Ski" width="527"--}}
{{--                                     height="481" />--}}
{{--                            </figure>--}}
{{--                            <div class="banner-content y-50">--}}
{{--                                <h5 class="banner-subtitle text-uppercase font-weight-bold slide-animate"--}}
{{--                                    data-animation-options="{--}}
{{--                                        'name': 'fadeInRightShorter', 'duration': '1s'--}}
{{--                                    }">برترین فروشنده ماهانه</h5>--}}
{{--                                <h4 class="banner-title ls-25 slide-animate" data-animation-options="{--}}
{{--                                        'name': 'fadeInRightShorter', 'duration': '1s'--}}
{{--                                    }">سامسونگ 52 اینچ فول اچ دی <span class="text-primary">تلویزیون لمسی</span> LG </h4>--}}
{{--                                <p class="font-weight-normal text-dark slide-animate" data-animation-options="{--}}
{{--                                        'name': 'fadeInRightShorter', 'duration': '1s'--}}
{{--                                    }">فقط تا پایان این هفته</p>--}}
{{--                                <a href="shop-banner-sidebar.html"--}}
{{--                                   class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"--}}
{{--                                   data-animation-options="{--}}
{{--                                        'name': 'fadeInRightShorter', 'duration': '1s'--}}
{{--                                    }">اکنون بخرید <i class="w-icon-long-arrow-left"></i></a>--}}
{{--                            </div>--}}
{{--                            <!-- End of .banner-content -->--}}
{{--                        </div>--}}
{{--                        <!-- End of .container -->--}}
{{--                    </div>--}}
{{--                    <!-- End of .intro-slide3 -->--}}
{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--                <button class="swiper-button-next"></button>--}}
{{--                <button class="swiper-button-prev"></button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of .intro-section -->--}}

{{--        <div class="container">--}}
{{--            <div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mt-6 mb-10"--}}
{{--                 data-swiper-options="{--}}
{{--                    'loop': true,--}}
{{--                    'slidesPerView': 1,--}}
{{--                    'autoplay': {--}}
{{--                        'delay': 4000,--}}
{{--                        'disableOnInteraction': false--}}
{{--                    },--}}
{{--                    'breakpoints': {--}}
{{--                        '576': {--}}
{{--                            'slidesPerView': 2--}}
{{--                        },--}}
{{--                        '768': {--}}
{{--                            'slidesPerView': 3--}}
{{--                        },--}}
{{--                        '1200': {--}}
{{--                            'slidesPerView': 4--}}
{{--                        }--}}
{{--                    }--}}
{{--                }">--}}
{{--                <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">--}}
{{--                    <div class="swiper-slide icon-box icon-box-side text-dark">--}}
{{--                            <span class="icon-box-icon icon-shipping">--}}
{{--                                <i class="w-icon-truck"></i>--}}
{{--                            </span>--}}
{{--                        <div class="icon-box-content">--}}
{{--                            <h4 class="icon-box-title">ارسال رایگان و مرجوعی</h4>--}}
{{--                            <p class="text-default">برای تمام سفارشات بیش از 99 دلار</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide icon-box icon-box-side text-dark">--}}
{{--                            <span class="icon-box-icon icon-payment">--}}
{{--                                <i class="w-icon-bag"></i>--}}
{{--                            </span>--}}
{{--                        <div class="icon-box-content">--}}
{{--                            <h4 class="icon-box-title">پرداخت امن</h4>--}}
{{--                            <p class="text-default">ما تضمین می کنیم</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide icon-box icon-box-side text-dark icon-box-money">--}}
{{--                            <span class="icon-box-icon icon-money">--}}
{{--                                <i class="w-icon-money"></i>--}}
{{--                            </span>--}}
{{--                        <div class="icon-box-content">--}}
{{--                            <h4 class="icon-box-title">تضمین بازگشت پول</h4>--}}
{{--                            <p class="text-default">پس از 30 روز بازگشت</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide icon-box icon-box-side text-dark icon-box-chat">--}}
{{--                            <span class="icon-box-icon icon-chat">--}}
{{--                                <i class="w-icon-chat"></i>--}}
{{--                            </span>--}}
{{--                        <div class="icon-box-content">--}}
{{--                            <h4 class="icon-box-title">پشتیبانی مشتری</h4>--}}
{{--                            <p class="text-default">24/7 با ما تماس بگیرید یا ایمیل بزنید</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End of Iocn Box Wrapper -->--}}

{{--            <div class="title-link-wrapper mb-3 appear-animate">--}}
{{--                <h2 class="title title-deals mb-1">معاملات روز</h2>--}}
{{--                <div class="product-countdown-container font-size-sm text-dark align-items-center">--}}
{{--                    <label>پیشنهاد به پایان می رسد در: </label>--}}
{{--                    <div class="product-countdown countdown-compact ml-1 font-weight-bold" data-until="+10d"--}}
{{--                         data-relative="true" data-compact="true">10روز,00:00:00</div>--}}
{{--                </div>--}}
{{--                <a href="shop-boxed-banner.html" class="font-weight-bold ls-25">محصولات بیشتر <i--}}
{{--                            class="w-icon-long-arrow-left"></i></a>--}}
{{--            </div>--}}
{{--            <!-- End of .title-link-wrapper -->--}}

{{--            <div class="swiper-container swiper-theme product-deals-wrapper appear-animate mb-7"--}}
{{--                 data-swiper-options="{--}}
{{--                    'spaceBetween': 20,--}}
{{--                    'slidesPerView': 2,--}}
{{--                    'breakpoints': {--}}
{{--                        '576': {--}}
{{--                            'slidesPerView': 3--}}
{{--                        },--}}
{{--                        '768': {--}}
{{--                            'slidesPerView': 4--}}
{{--                        },--}}
{{--                        '992': {--}}
{{--                            'slidesPerView': 5--}}
{{--                        }--}}
{{--                    }--}}
{{--                }">--}}
{{--                <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-2">--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-1-1.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-1-2.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                                <div class="product-label-group">--}}
{{--                                    <label class="product-label label-new">جدید </label>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">تسلی دهنده زنانه</a></h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">48000 تومان - 89000 تومان</ins>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-2.jpg" alt="Product" width="300"--}}
{{--                                         height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                                <div class="product-label-group">--}}
{{--                                    <label class="product-label label-new">جدید </label>--}}
{{--                                    <label class="product-label label-discount">-35%</label>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">سفید ولیز </a></h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">80000 تومان </ins><span class="old-price">89000 تومان</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-3-1.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-3-2.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">کفش چرم قهوه ای </a></h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 80%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(6 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">48000 تومان - 89000 تومان</ins>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-4.jpg" alt="Product" width="300"--}}
{{--                                         height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                                <div class="product-label-group">--}}
{{--                                    <label class="product-label label-new">جدید </label>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">چراغ قوه قابل حمل</a></h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">89000 تومان</ins><del class="old-price">118000 تومان</del>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-5.jpg" alt="Product" width="300"--}}
{{--                                         height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">شارژر USB</a></h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">19000 تومان</ins><del class="old-price">40000 تومان</del>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}
{{--            <!-- End of Product Deals Warpper -->--}}

{{--            <div class="row category-wrapper electronics-cosmetics appear-animate mb-7">--}}
{{--                <div class="col-md-6 mb-4">--}}
{{--                    <div class="banner banner-fixed br-sm">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/categories/1-1.jpg" alt="Category Banner"--}}
{{--                                 width="640" height="200" style="background-color: #25282D;" />--}}
{{--                        </figure>--}}
{{--                        <div class="banner-content y-50">--}}
{{--                            <h3 class="banner-title text-white ls-25 mb-0">الکترونیک </h3>--}}
{{--                            <div class="banner-price-info text-white font-weight-bold text-uppercase mb-1">شروع در--}}
{{--                                <strong class="text-secondary">125000 تومان</strong>--}}
{{--                            </div>--}}
{{--                            <hr class="banner-divider bg-white" />--}}
{{--                            <a href="shop-banner-sidebar.html"--}}
{{--                               class="btn btn-white btn-link btn-underline btn-icon-right">--}}
{{--                                اکنون بخرید <i class="w-icon-long-arrow-left"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 mb-4">--}}
{{--                    <div class="banner banner-fixed br-sm">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/categories/1-2.jpg" alt="Category Banner"--}}
{{--                                 width="640" height="200" style="background-color: #eeedec;" />--}}
{{--                        </figure>--}}
{{--                        <div class="banner-content y-50">--}}
{{--                            <h3 class="banner-title ls-25 text-capitalize mb-0">ست لوازم آرایش</h3>--}}
{{--                            <div class="banner-price-info font-weight-bold text-uppercase mb-1">فروش تا--}}
{{--                                <strong class="text-secondary">30% تخفیف</strong>--}}
{{--                            </div>--}}
{{--                            <hr class="banner-divider bg-dark" />--}}
{{--                            <a href="shop-banner-sidebar.html"--}}
{{--                               class="btn btn-dark btn-link btn-underline btn-icon-right">--}}
{{--                                اکنون بخرید <i class="w-icon-long-arrow-left"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End of Category Wrapper -->--}}

{{--            <h2 class="title mb-5 appear-animate">فروشندگان برتر هفتگی</h2>--}}
{{--            <div class="swiper-container swiper-theme vendor-wrapper mb-4 appear-animate" data-swiper-options="{--}}
{{--                    'spaceBetween': 20,--}}
{{--                    'slidesPerView': 1,--}}
{{--                    'breakpoints': {--}}
{{--                        '576': {--}}
{{--                            'slidesPerView': 2--}}
{{--                        },--}}
{{--                        '768': {--}}
{{--                            'slidesPerView': 3--}}
{{--                        },--}}
{{--                        '1200': {--}}
{{--                            'slidesPerView': 4--}}
{{--                        }--}}
{{--                    }--}}
{{--                }">--}}
{{--                <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1">--}}
{{--                    <div class="swiper-slide vendor-widget vendor-widget-1">--}}
{{--                        <div class="vendor-products grid-type">--}}
{{--                            <div class="vendor-product lg-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-1.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                            <div class="vendor-product sm-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-2.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                            <div class="vendor-product sm-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-3.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="vendor-details">--}}
{{--                            <figure class="vendor-logo">--}}
{{--                                <a href="vendor-dokan-store.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/vendor-logo/1.jpg" alt="Vendor Logo"--}}
{{--                                         width="70" height="70">--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <div class="vendor-personal">--}}
{{--                                <h4 class="vendor-name">--}}
{{--                                    <a href="vendor-dokan-store.html">فروشنده 1</a>--}}
{{--                                </h4>--}}
{{--                                <span class="vendor-product-count">(27 محصول)</span>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Vendor Widget -->--}}
{{--                    <div class="swiper-slide vendor-widget vendor-widget-1">--}}
{{--                        <div class="vendor-products grid-type">--}}
{{--                            <div class="vendor-product lg-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-4.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                            <div class="vendor-product sm-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-5.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                            <div class="vendor-product sm-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-6.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="vendor-details">--}}
{{--                            <figure class="vendor-logo">--}}
{{--                                <a href="vendor-dokan-store.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/vendor-logo/2.jpg" alt="Vendor Logo"--}}
{{--                                         width="70" height="70">--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <div class="vendor-personal">--}}
{{--                                <h4 class="vendor-name">--}}
{{--                                    <a href="vendor-dokan-store.html">فروشنده 2</a>--}}
{{--                                </h4>--}}
{{--                                <span class="vendor-product-count">(20 محصول)</span>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Vendor Widget -->--}}
{{--                    <div class="swiper-slide vendor-widget vendor-widget-1">--}}
{{--                        <div class="vendor-products grid-type">--}}
{{--                            <div class="vendor-product lg-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-7.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                            <div class="vendor-product sm-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-8.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                            <div class="vendor-product sm-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-9.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="vendor-details">--}}
{{--                            <figure class="vendor-logo">--}}
{{--                                <a href="vendor-dokan-store.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/vendor-logo/3.jpg" alt="Vendor Logo"--}}
{{--                                         width="70" height="70">--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <div class="vendor-personal">--}}
{{--                                <h4 class="vendor-name">--}}
{{--                                    <a href="vendor-dokan-store.html">فروشنده 3</a>--}}
{{--                                </h4>--}}
{{--                                <span class="vendor-product-count">(16 محصول)</span>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Vendor Widget -->--}}
{{--                    <div class="swiper-slide vendor-widget vendor-widget-1">--}}
{{--                        <div class="vendor-products grid-type">--}}
{{--                            <div class="vendor-product lg-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-10.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                            <div class="vendor-product sm-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-11.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                            <div class="vendor-product sm-item">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/2-12.jpg" alt="Vendor Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="vendor-details">--}}
{{--                            <figure class="vendor-logo">--}}
{{--                                <a href="vendor-dokan-store.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/vendor-logo/4.jpg" alt="Vendor Logo"--}}
{{--                                         width="70" height="70">--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <div class="vendor-personal">--}}
{{--                                <h4 class="vendor-name">--}}
{{--                                    <a href="vendor-dokan-store.html">فروشنده 4</a>--}}
{{--                                </h4>--}}
{{--                                <span class="vendor-product-count">(23 محصول)</span>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Vendor Widget -->--}}
{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}
{{--            <!-- End of Vendor Wrapper -->--}}
{{--            <div class="tab tab-with-title tab-nav-boxed appear-animate">--}}
{{--                <h2 class="title">لوازم الکترونیکی مصرفی</h2>--}}
{{--                <ul class="nav nav-tabs" role="tablist">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" href="#tab-1">تازه رسیده ها </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#tab-2">کتاب پرفروش </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#tab-3">محبوبترین </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#tab-4">نمایش همه </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <!-- End of Tab Title-->--}}
{{--            <div class="tab-content appear-animate">--}}
{{--                <div class="tab-pane active" id="tab-1">--}}
{{--                    <div class="row grid-type products">--}}
{{--                        <div class="product-wrap lg-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-1-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-1-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-label-group">--}}
{{--                                        <label class="product-label label-discount">-15%</label>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">جعبه شارژر مغناطیسی</a>--}}
{{--                                    </h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">79000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-2-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-2-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-label-group">--}}
{{--                                        <label class="product-label label-new">جدید </label>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">ساعت طلا </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">19000 تومان</ins><del class="old-price">25000 تومان</del>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-3-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-3-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">پهپاد بی سیم</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">89000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-4-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-4-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">پخش کننده موسیقی چند رنگ</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(6 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">40000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-5-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-5-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">دستگاه شارژ و دزدگیر</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">25000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-6-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-6-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">گوشی مینی بی سیم </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(9 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">25000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-7-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-7-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">صفحه نمایش تبلت با کیفیت بالا </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(5 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">173000 تومان </ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tab-pane" id="tab-2">--}}
{{--                    <div class="row grid-type products">--}}
{{--                        <div class="product-wrap lg-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-2-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-2-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">ساعت طلا </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">19000 تومان</ins><del class="old-price">25000 تومان</del>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-5-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-5-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">دستگاه شارژ و دزدگیر</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">25000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-1-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-1-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">جعبه شارژر مغناطیسی</a>--}}
{{--                                    </h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">79000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-4-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-4-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">پخش کننده موسیقی چند رنگ</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(6 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">40000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-7-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-7-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">صفحه نمایش تبلت با کیفیت بالا </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(5 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">173000 تومان </ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-6-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-6-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">گوشی مینی بی سیم </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(9 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">25000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-3-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-3-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">پهپاد بی سیم</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">89000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tab-pane" id="tab-3">--}}
{{--                    <div class="row grid-type products">--}}
{{--                        <div class="product-wrap lg-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-5-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-5-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">دستگاه شارژ و دزدگیر</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">25000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-4-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-4-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">پخش کننده موسیقی چند رنگ</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(6 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">40000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-1-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-1-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">جعبه شارژر مغناطیسی</a>--}}
{{--                                    </h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">79000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-3-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-3-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">پهپاد بی سیم</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">89000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-7-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-7-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">صفحه نمایش تبلت با کیفیت بالا </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(5 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">173000 تومان </ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-6-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-6-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">گوشی مینی بی سیم </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(9 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">25000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-2-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-2-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">ساعت طلا </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">19000 تومان</ins><del class="old-price">25000 تومان</del>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tab-pane" id="tab-4">--}}
{{--                    <div class="row grid-type products">--}}
{{--                        <div class="product-wrap lg-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-3-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-3-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">پهپاد بی سیم</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 60%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">89000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-2-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-2-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">ساعت طلا </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">19000 تومان</ins><del class="old-price">25000 تومان</del>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-6-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-6-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">گوشی مینی بی سیم </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(9 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">25000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-5-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-5-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">دستگاه شارژ و دزدگیر</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">25000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-4-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-4-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">پخش کننده موسیقی چند رنگ</a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(6 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">40000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-7-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-7-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">صفحه نمایش تبلت با کیفیت بالا </a></h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 80%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(5 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">173000 تومان </ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-wrap sm-item">--}}
{{--                            <div class="product text-center">--}}
{{--                                <figure class="product-media">--}}
{{--                                    <a href="product-default.html">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-1-1.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                        <img src="website_assets/assets/images/demos/demo2/products/3-1-2.jpg" alt="Product"--}}
{{--                                             width="300" height="338">--}}
{{--                                    </a>--}}
{{--                                    <div class="product-action-vertical">--}}
{{--                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                           title="افزودن به سبد "></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                           title="افزودن به علاقه مندیها"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                           title="نمایش سریع"></a>--}}
{{--                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                           title="افزودن برای مقایسه"></a>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                                <div class="product-details">--}}
{{--                                    <h4 class="product-name"><a href="product-default.html">جعبه شارژر مغناطیسی</a>--}}
{{--                                    </h4>--}}
{{--                                    <div class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width: 100%;"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-price">--}}
{{--                                        <ins class="new-price">79000 تومان</ins>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End of Tab Content -->--}}

{{--            <div class="sale-banner banner br-sm appear-animate">--}}
{{--                <div class="banner-content">--}}
{{--                    <h4--}}
{{--                            class="content-left banner-subtitle text-uppercase mb-8 mb-md-0 mr-0 mr-md-4 text-secondary ls-25">--}}
{{--                        <span class="text-dark font-weight-bold lh-1 ls-normal">با <br>بیش از </span>70% تخفیف</h4>--}}
{{--                    <div class="content-right">--}}
{{--                        <h3 class="banner-title text-uppercase font-weight-normal mb-4 mb-md-0 ls-25 text-white">--}}
{{--                                <span>فقط برای پرداخت--}}
{{--                                    <strong class="mr-10 pr-lg-10">لوازم الکترونیکی دوست داشتنی شما</strong>--}}
{{--                                    فقط برای پرداخت--}}
{{--                                    <strong class="mr-10 pr-lg-10">لوازم الکترونیکی دوست داشتنی شما</strong>--}}
{{--                                    فقط برای پرداخت--}}
{{--                                    <strong class="mr-10 pr-lg-10">لوازم الکترونیکی دوست داشتنی شما</strong>--}}
{{--                                </span>--}}
{{--                        </h3>--}}
{{--                        <a href="#" class="btn btn-white btn-rounded">اکنون بخرید--}}
{{--                            <i class="w-icon-long-arrow-left"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End of بنر فروش -->--}}

{{--            <div class="banner-product-wrapper appear-animate row mb-8">--}}
{{--                <div class="col-xl-5col col-md-4 mb-4">--}}
{{--                    <div class="categories h-100">--}}
{{--                        <h2 class="title text-left">لباس و پوشاک مد</h2>--}}
{{--                        <ul class="list-style-none mb-4">--}}
{{--                            <li><a href="shop-banner-sidebar.html">تجهیزات جانبی </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">بدنه </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">لباس و دامن</a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">شلوار جین </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">جامپرها </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">لباس بافتنی </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">سالن و لباس زیر</a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">کفش ها </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">تی شرت  </a></li>--}}
{{--                        </ul>--}}
{{--                        <a href="shop-boxed-banner.html"--}}
{{--                           class="btn btn-dark btn-link btn-underline btn-icon-right font-weight-bolder text-capitalize ls-50">--}}
{{--                            جستجوی همه <i class="w-icon-long-arrow-left"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-5col4 col-md-8 mb-4">--}}
{{--                    <div class="banner br-sm mb-4" style="background-image: url(website_assets/assets/images/demos/demo2/banners/1.jpg);--}}
{{--                            background-color: #EEF0EF;">--}}
{{--                        <div class="banner-content d-block d-lg-flex align-items-center">--}}
{{--                            <div class="content-left mr-auto">--}}
{{--                                <h5--}}
{{--                                        class="banner-subtitle font-weight-normal text-capitalize texyt-dark ls-25 mb-0">--}}
{{--                                    فروش فلش <strong class="text-uppercase text-secondary">50% تخفیف </strong>--}}
{{--                                </h5>--}}
{{--                                <h3 class="banner-title text-capitalize ls-25">فروش اسکیت فیگور مد</h3>--}}
{{--                                <p class="text-dark">فقط تا پایان این هفته</p>--}}
{{--                            </div>--}}
{{--                            <a href="shop-banner-sidebar.html" class="content-left btn btn-dark btn btn-outline--}}
{{--                                    btn-rounded btn-icon-right mt-4 mt-lg-0">اکنون بخرید<i--}}
{{--                                        class="w-icon-long-arrow-right"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Banner -->--}}
{{--                    <div class="swiper-container swiper-theme" data-swiper-options="{--}}
{{--                            'spaceBetween': 20,--}}
{{--                            'slidesPerView': 2,--}}
{{--                            'breakpoints': {--}}
{{--                                '576': {--}}
{{--                                    'slidesPerView': 3--}}
{{--                                },--}}
{{--                                '768': {--}}
{{--                                    'slidesPerView': 2--}}
{{--                                },--}}
{{--                                '992': {--}}
{{--                                    'slidesPerView': 3--}}
{{--                                },--}}
{{--                                '1200': {--}}
{{--                                    'slidesPerView': 4--}}
{{--                                }--}}
{{--                            }--}}
{{--                        }">--}}
{{--                        <div class="swiper-wrapper row cols-xl-4 cols-lg-3">--}}
{{--                            <div class="swiper-slide product-wrap">--}}
{{--                                <div class="product text-center">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="product-default.html">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/4-1-1.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/4-1-2.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                        </a>--}}
{{--                                        <div class="product-action-vertical">--}}
{{--                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                               title="افزودن به سبد "></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                               title="افزودن به علاقه مندیها"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                               title="نمایش سریع"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                               title="افزودن برای مقایسه"></a>--}}
{{--                                        </div>--}}
{{--                                    </figure>--}}
{{--                                    <div class="product-details">--}}
{{--                                        <h4 class="product-name"><a href="product-default.html">کیف مدرسه سفید</a>--}}
{{--                                        </h4>--}}
{{--                                        <div class="ratings-container">--}}
{{--                                            <div class="ratings-full">--}}
{{--                                                <span class="ratings" style="width: 100%;"></span>--}}
{{--                                                <span class="tooltiptext tooltip-top"></span>--}}
{{--                                            </div>--}}
{{--                                            <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-price">--}}
{{--                                            <ins class="new-price">58000 تومان</ins>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-slide product-wrap">--}}
{{--                                <div class="product text-center">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="product-default.html">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/4-2-1.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/4-2-2.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                        </a>--}}
{{--                                        <div class="product-action-vertical">--}}
{{--                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                               title="افزودن به سبد "></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                               title="افزودن به علاقه مندیها"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                               title="نمایش سریع"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                               title="افزودن برای مقایسه"></a>--}}
{{--                                        </div>--}}
{{--                                    </figure>--}}
{{--                                    <div class="product-details">--}}
{{--                                        <h4 class="product-name"><a href="product-default.html">تسلی دهنده زنانه</a>--}}
{{--                                        </h4>--}}
{{--                                        <div class="ratings-container">--}}
{{--                                            <div class="ratings-full">--}}
{{--                                                <span class="ratings" style="width: 80%;"></span>--}}
{{--                                                <span class="tooltiptext tooltip-top"></span>--}}
{{--                                            </div>--}}
{{--                                            <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-price">--}}
{{--                                            <ins class="new-price">58000 تومان</ins><del class="old-price">99000 تومان</del>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-slide product-wrap">--}}
{{--                                <div class="product text-center">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="product-default.html">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/4-3.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                        </a>--}}
{{--                                        <div class="product-action-vertical">--}}
{{--                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                               title="افزودن به سبد "></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                               title="افزودن به علاقه مندیها"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                               title="نمایش سریع"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                               title="افزودن برای مقایسه"></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-label-group">--}}
{{--                                            <label class="product-label label-new">جدید </label>--}}
{{--                                        </div>--}}
{{--                                    </figure>--}}
{{--                                    <div class="product-details">--}}
{{--                                        <h4 class="product-name"><a href="product-default.html">کفش آموزشی آبی </a>--}}
{{--                                        </h4>--}}
{{--                                        <div class="ratings-container">--}}
{{--                                            <div class="ratings-full">--}}
{{--                                                <span class="ratings" style="width: 60%;"></span>--}}
{{--                                                <span class="tooltiptext tooltip-top"></span>--}}
{{--                                            </div>--}}
{{--                                            <a href="product-default.html" class="rating-reviews">(6 نظر )</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-price">--}}
{{--                                            <ins class="new-price">96000 تومان</ins>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-slide product-wrap">--}}
{{--                                <div class="product text-center">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="product-default.html">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/4-4.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                        </a>--}}
{{--                                        <div class="product-action-vertical">--}}
{{--                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                               title="افزودن به سبد "></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                               title="افزودن به علاقه مندیها"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                               title="نمایش سریع"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                               title="افزودن برای مقایسه"></a>--}}
{{--                                        </div>--}}
{{--                                    </figure>--}}
{{--                                    <div class="product-details">--}}
{{--                                        <h4 class="product-name"><a href="product-default.html">فراتر از پیراهن OTP</a>--}}
{{--                                        </h4>--}}
{{--                                        <div class="ratings-container">--}}
{{--                                            <div class="ratings-full">--}}
{{--                                                <span class="ratings" style="width: 100%;"></span>--}}
{{--                                                <span class="tooltiptext tooltip-top"></span>--}}
{{--                                            </div>--}}
{{--                                            <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-price">--}}
{{--                                            <ins class="new-price">96000 تومان</ins>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-pagination"></div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Swiper -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End of Banner Product Wrapper -->--}}

{{--            <div class="row category-wrapper sports-fashion mb-8 appear-animate">--}}
{{--                <div class="col-md-6 mb-4">--}}
{{--                    <div class="banner banner-fixed br-sm">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/categories/2-1.jpg" alt="Category Banner"--}}
{{--                                 width="640" height="200" style="background-color: #EAEAEA;" />--}}
{{--                        </figure>--}}
{{--                        <div class="banner-content y-50 text-right">--}}
{{--                            <h5 class="banner-subtitle text-uppercase font-weight-bold">تازه رسیده ها </h5>--}}
{{--                            <h3 class="banner-title text-capitalize ls-25">لباس های ورزشی</h3>--}}
{{--                            <hr class="banner-divider bg-dark ml-auto mb-3">--}}
{{--                            <div class="banner-price-info text-dark">--}}
{{--                                از <span class="text-secondary font-weight-bolder ls-25">15000 تومان</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 mb-4">--}}
{{--                    <div class="banner banner-fixed br-sm">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/categories/2-2.jpg" alt="Category Banner"--}}
{{--                                 width="640" height="200" style="background-color: #181411;" />--}}
{{--                        </figure>--}}
{{--                        <div class="banner-content y-50">--}}
{{--                            <h5 class="banner-subtitle text-uppercase font-weight-normal text-white"> ساعت های هوشمند--}}
{{--                            </h5>--}}
{{--                            <h3 class="banner-title text-white ls-25">فروش تا 20% تخفیف</h3>--}}
{{--                            <hr class="banner-divider bg-white">--}}
{{--                            <div class="banner-price-info text-white">--}}
{{--                                شروع از  <span class="text-secondary font-weight-bolder ls-25">58000 تومان</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End of Category Wrapper -->--}}

{{--            <div class="banner-product-wrapper appear-animate row mb-8">--}}
{{--                <div class="col-xl-5col col-md-4 mb-4">--}}
{{--                    <div class="categories h-100">--}}
{{--                        <h2 class="title text-left">کامپیوترها و فناوری ها</h2>--}}
{{--                        <ul class="list-style-none mb-4">--}}
{{--                            <li><a href="shop-banner-sidebar.html">کامپیوتر رومیزی </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html"> هدفون </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">لپ تاپ </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">مانیتور </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">گوشی های هوشمند </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">اسپیکر  </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">ذخیره سازی و حافظه </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">تبلت </a></li>--}}
{{--                            <li><a href="shop-banner-sidebar.html">ساعت </a></li>--}}
{{--                        </ul>--}}
{{--                        <a href="shop-boxed-banner.html"--}}
{{--                           class="btn btn-dark btn-link btn-underline btn-icon-right font-weight-bolder text-capitalize ls-50">--}}
{{--                            جستجوی همه <i class="w-icon-long-arrow-left"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-5col4 col-md-8 mb-4">--}}
{{--                    <div class="banner br-sm mb-4 pt-9" style="background-image: url(website_assets/assets/images/demos/demo2/banners/2.jpg);--}}
{{--                            background-color: #E0E1E5;">--}}
{{--                        <div class="banner-content">--}}
{{--                            <h5 class="banner-subtitle font-weight-normal text-capitalize texyt-dark ls-25 mb-0">--}}
{{--                                از فروشگاه اینترنتی--}}
{{--                            </h5>--}}
{{--                            <h3 class="banner-title text-capitalize ls-25 mb-4">--}}
{{--                                ایکس باکس وان <span class="text-primary">محدود </span> نسخه--}}
{{--                            </h3>--}}
{{--                            <a href="shop-boxed-banner.html"--}}
{{--                               class="btn btn-dark btn-link btn-underline btn-icon-right">--}}
{{--                                نمایش جزئیات <i class="w-icon-long-arrow-left"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Banner -->--}}
{{--                    <div class="swiper-container swiper-theme" data-swiper-options="{--}}
{{--                            'spaceBetween': 20,--}}
{{--                            'slidesPerView': 2,--}}
{{--                            'breakpoints': {--}}
{{--                                '576': {--}}
{{--                                    'slidesPerView': 3--}}
{{--                                },--}}
{{--                                '768': {--}}
{{--                                    'slidesPerView': 2--}}
{{--                                },--}}
{{--                                '992': {--}}
{{--                                    'slidesPerView': 3--}}
{{--                                },--}}
{{--                                '1200': {--}}
{{--                                    'slidesPerView': 4--}}
{{--                                }--}}
{{--                            }--}}
{{--                        }">--}}
{{--                        <div class="swiper-wrapper row cols-xl-4 cols-lg-3">--}}
{{--                            <div class="swiper-slide product-wrap">--}}
{{--                                <div class="product text-center">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="product-default.html">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/5-1-1.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/5-1-2.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                        </a>--}}
{{--                                        <div class="product-action-vertical">--}}
{{--                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                               title="افزودن به سبد "></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                               title="افزودن به علاقه مندیها"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                               title="نمایش سریع"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                               title="افزودن برای مقایسه"></a>--}}
{{--                                        </div>--}}
{{--                                    </figure>--}}
{{--                                    <div class="product-details">--}}
{{--                                        <h4 class="product-name"><a href="product-default.html">ضبط موسیقی بلوتوث</a></h4>--}}
{{--                                        <div class="ratings-container">--}}
{{--                                            <div class="ratings-full">--}}
{{--                                                <span class="ratings" style="width: 100%;"></span>--}}
{{--                                                <span class="tooltiptext tooltip-top"></span>--}}
{{--                                            </div>--}}
{{--                                            <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-price">--}}
{{--                                            <ins class="new-price">88000 تومان</ins>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-slide product-wrap">--}}
{{--                                <div class="product text-center">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="product-default.html">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/5-2.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                        </a>--}}
{{--                                        <div class="product-action-vertical">--}}
{{--                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                               title="افزودن به سبد "></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                               title="افزودن به علاقه مندیها"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                               title="نمایش سریع"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                               title="افزودن برای مقایسه"></a>--}}
{{--                                        </div>--}}
{{--                                    </figure>--}}
{{--                                    <div class="product-details">--}}
{{--                                        <h4 class="product-name"><a href="product-default.html">جعبه شارژر مغناطیسی</a>--}}
{{--                                        </h4>--}}
{{--                                        <div class="ratings-container">--}}
{{--                                            <div class="ratings-full">--}}
{{--                                                <span class="ratings" style="width: 80%;"></span>--}}
{{--                                                <span class="tooltiptext tooltip-top"></span>--}}
{{--                                            </div>--}}
{{--                                            <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-price">--}}
{{--                                            <ins class="new-price">79000 تومان</ins>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-slide product-wrap">--}}
{{--                                <div class="product text-center">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="product-default.html">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/5-3-1.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/5-3-2.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                        </a>--}}
{{--                                        <div class="product-action-vertical">--}}
{{--                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                               title="افزودن به سبد "></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                               title="افزودن به علاقه مندیها"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                               title="نمایش سریع"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                               title="افزودن برای مقایسه"></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-label-group">--}}
{{--                                            <label class="product-label label-new">جدید </label>--}}
{{--                                        </div>--}}
{{--                                    </figure>--}}
{{--                                    <div class="product-details">--}}
{{--                                        <h4 class="product-name"><a href="product-default.html">نشانگر صدای نرم</a>--}}
{{--                                        </h4>--}}
{{--                                        <div class="ratings-container">--}}
{{--                                            <div class="ratings-full">--}}
{{--                                                <span class="ratings" style="width: 100%;"></span>--}}
{{--                                                <span class="tooltiptext tooltip-top"></span>--}}
{{--                                            </div>--}}
{{--                                            <a href="product-default.html" class="rating-reviews">(5 نظر )</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-price">--}}
{{--                                            <ins class="new-price">22000 تومان</ins><del class="old-price">99000 تومان</del>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-slide product-wrap">--}}
{{--                                <div class="product text-center">--}}
{{--                                    <figure class="product-media">--}}
{{--                                        <a href="product-default.html">--}}
{{--                                            <img src="website_assets/assets/images/demos/demo2/products/5-4.jpg" alt="Product"--}}
{{--                                                 width="300" height="338">--}}
{{--                                        </a>--}}
{{--                                        <div class="product-action-vertical">--}}
{{--                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                               title="افزودن به سبد "></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                               title="افزودن به علاقه مندیها"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                               title="نمایش سریع"></a>--}}
{{--                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                               title="افزودن برای مقایسه"></a>--}}
{{--                                        </div>--}}
{{--                                    </figure>--}}
{{--                                    <div class="product-details">--}}
{{--                                        <h4 class="product-name"><a href="product-default.html">ساعت مشکی مردانه</a>--}}
{{--                                        </h4>--}}
{{--                                        <div class="ratings-container">--}}
{{--                                            <div class="ratings-full">--}}
{{--                                                <span class="ratings" style="width: 100%;"></span>--}}
{{--                                                <span class="tooltiptext tooltip-top"></span>--}}
{{--                                            </div>--}}
{{--                                            <a href="product-default.html" class="rating-reviews">(9 نظر )</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-price">--}}
{{--                                            <ins class="new-price">99000 تومان</ins><del class="old-price">145000 تومان</del>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-pagination"></div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Swiper -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End of Banner Product Wrapper -->--}}

{{--            <div class="banner br-sm banner-electronics appear-animate" style="background-image: url(website_assets/assets/images/demos/demo2/banners/3.jpg);--}}
{{--                    background-color: #333;">--}}
{{--                <div class="banner-content mr-10 pr-1">--}}
{{--                    <div class="banner-price-info text-white font-weight-normal ls-25">--}}
{{--                        ذخیره کنید با <span class="font-weight-bolder text-secondary text-uppercase">50% تخفیف</span>--}}
{{--                    </div>--}}
{{--                    <h3 class="banner-title text-white mb-0 ls-25">فروش دوربین و لنز</h3>--}}
{{--                </div>--}}
{{--                <a href="shop-banner-sidebar.html" class="btn btn-white btn-rounded btn-icon-right mt-1">اکنون بخرید<i--}}
{{--                            class="w-icon-long-arrow-left"></i></a>--}}
{{--            </div>--}}
{{--            <!-- End of Banner -->--}}

{{--            <div class="title-link-wrapper mb-2 appear-animate">--}}
{{--                <h2 class="title">محصولات دارای رتبه برتر</h2>--}}
{{--                <a href="shop-boxed-banner.html" class="font-weight-bold ls-25">محصولات بیشتر <i--}}
{{--                            class="w-icon-long-arrow-left"></i></a>--}}
{{--            </div>--}}

{{--            <div class="swiper-container swiper-theme top-products mb-6 appear-animate" data-swiper-options="{--}}
{{--                    'spaceBetween': 20,--}}
{{--                    'slidesPerView': 2,--}}
{{--                    'breakpoints': {--}}
{{--                        '576': {--}}
{{--                            'slidesPerView': 3--}}
{{--                        },--}}
{{--                        '768': {--}}
{{--                            'slidesPerView': 4--}}
{{--                        },--}}
{{--                        '992': {--}}
{{--                            'slidesPerView': 5--}}
{{--                        }--}}
{{--                    }--}}
{{--                }">--}}
{{--                <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/4-1-1.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/4-1-2.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-label-group">--}}
{{--                                    <label class="product-label label-discount">-15%</label>--}}
{{--                                </div>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                                <div class="product-countdown-container">--}}
{{--                                    <div class="product-countdown countdown-compact" data-until="2021, 9, 9"--}}
{{--                                         data-format="DHMS" data-compact="false"--}}
{{--                                         data-labels-short="Days, Hours, Mins, Secs">--}}
{{--                                        00:00:00:00</div>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">کیف مدرسه سفید</a></h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">58000 تومان</ins>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-1-1.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-1-2.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                                <div class="product-label-group">--}}
{{--                                    <label class="product-label label-new">جدید </label>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">تسلی دهنده زنانه</a></h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">48000 تومان - 89000 تومان</ins>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/3-2-1.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/3-2-2.jpg" alt="Product"--}}
{{--                                         width="300" height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">ساعت طلا </a></h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 80%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(3 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">19000 تومان</ins><del class="old-price">25000 تومان</del>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/1-4.jpg" alt="Product" width="300"--}}
{{--                                         height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                                <div class="product-label-group">--}}
{{--                                    <label class="product-label label-new">جدید </label>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">چراغ قوه قابل حمل</a></h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">89000 تومان</ins><del class="old-price">118000 تومان</del>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="product-default.html">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/6-1.jpg" alt="Product" width="300"--}}
{{--                                         height="338">--}}
{{--                                </a>--}}
{{--                                <div class="product-action-vertical">--}}
{{--                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"--}}
{{--                                       title="افزودن به سبد "></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"--}}
{{--                                       title="افزودن به علاقه مندیها"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"--}}
{{--                                       title="نمایش سریع"></a>--}}
{{--                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"--}}
{{--                                       title="افزودن برای مقایسه"></a>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                            <div class="product-details">--}}
{{--                                <h4 class="product-name"><a href="product-default.html">مانتو اصلی مد روز</a>--}}
{{--                                </h4>--}}
{{--                                <div class="ratings-container">--}}
{{--                                    <div class="ratings-full">--}}
{{--                                        <span class="ratings" style="width: 100%;"></span>--}}
{{--                                        <span class="tooltiptext tooltip-top"></span>--}}
{{--                                    </div>--}}
{{--                                    <a href="product-default.html" class="rating-reviews">(8 نظر )</a>--}}
{{--                                </div>--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">145000 تومان</ins>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}
{{--            <!-- End of Swiper Container -->--}}

{{--            <h2 class="title text-left text-capitalize mb-5 appear-animate">بازدید های اخیر </h2>--}}
{{--            <div class="swiper-container swiper-theme appear-animate viewed-products mb-7" data-swiper-options="{--}}
{{--                    'spaceBetween': 20,--}}
{{--                    'slidesPerView': 2,--}}
{{--                    'breakpoints': {--}}
{{--                        '576': {--}}
{{--                            'slidesPerView': 3--}}
{{--                        },--}}
{{--                        '768': {--}}
{{--                            'slidesPerView': 5--}}
{{--                        },--}}
{{--                        '992': {--}}
{{--                            'slidesPerView': 6--}}
{{--                        },--}}
{{--                        '1200': {--}}
{{--                            'slidesPerView': 8--}}
{{--                        }--}}
{{--                    }--}}
{{--                }">--}}
{{--                <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-2">--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center product-absolute">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/3-5-1.jpg" alt="Category image"--}}
{{--                                         width="300" height="338" style="background-color: #fff" />--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <h4 class="product-name">--}}
{{--                                <a href="product-default.html">دستگاه شارژ و دزدگیر</a>--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Product Wrap -->--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center product-absolute">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/4-2-1.jpg" alt="Category image"--}}
{{--                                         width="300" height="338" style="background-color: #fff" />--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <h4 class="product-name">--}}
{{--                                <a href="product-default.html">تسلی دهنده زنانه</a>--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Product Wrap -->--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center product-absolute">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/3-2-1.jpg" alt="Category image"--}}
{{--                                         width="300" height="338" style="background-color: #fff" />--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <h4 class="product-name">--}}
{{--                                <a href="product-default.html">ساعت طلا </a>--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Product Wrap -->--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center product-absolute">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/3-6-1.jpg" alt="Category image"--}}
{{--                                         width="300" height="338" style="background-color: #fff" />--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <h4 class="product-name">--}}
{{--                                <a href="product-default.html">گوشی مینی بی سیم </a>--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Product Wrap -->--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center product-absolute">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/4-1-1.jpg" alt="Category image"--}}
{{--                                         width="300" height="338" style="background-color: #fff" />--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <h4 class="product-name">--}}
{{--                                <a href="product-default.html">کیف مدرسه سفید</a>--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Product Wrap -->--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center product-absolute">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/3-7-1.jpg" alt="Category image"--}}
{{--                                         width="300" height="338" style="background-color: #fff" />--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <h4 class="product-name">--}}
{{--                                <a href="product-default.html">صفحه نمایش تبلت با کیفیت بالا </a>--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Product Wrap -->--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center product-absolute">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/4-4.jpg" alt="Category image"--}}
{{--                                         width="300" height="338" style="background-color: #fff" />--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <h4 class="product-name">--}}
{{--                                <a href="product-default.html">فراتر از پیراهن OTP</a>--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Product Wrap -->--}}
{{--                    <div class="swiper-slide product-wrap">--}}
{{--                        <div class="product text-center product-absolute">--}}
{{--                            <figure class="product-media">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="website_assets/assets/images/demos/demo2/products/4-3.jpg" alt="Category image"--}}
{{--                                         width="300" height="338" style="background-color: #fff" />--}}
{{--                                </a>--}}
{{--                            </figure>--}}
{{--                            <h4 class="product-name">--}}
{{--                                <a href="product-default.html">کفش آموزشی آبی </a>--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of Product Wrap -->--}}
{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}
{{--            <!-- End of Swiper Container -->--}}

{{--            <h2 class="title text-left mb-5 appear-animate">مشتریان ما </h2>--}}
{{--            <div class="swiper-container swiper-theme brands-wrapper br-sm mb-10 appear-animate"--}}
{{--                 data-swiper-options="{--}}
{{--                    'loop': true,--}}
{{--                    'spaceBetween': 20,--}}
{{--                    'slidesPerView': 2,--}}
{{--                    'autoplay': {--}}
{{--                        'delay': 4000,--}}
{{--                        'disableOnInteraction': false--}}
{{--                    },--}}
{{--                    'breakpoints': {--}}
{{--                        '576': {--}}
{{--                            'slidesPerView': 3--}}
{{--                        },--}}
{{--                        '768': {--}}
{{--                            'slidesPerView': 4--}}
{{--                        },--}}
{{--                        '992': {--}}
{{--                            'slidesPerView': 6--}}
{{--                        },--}}
{{--                        '1200': {--}}
{{--                            'slidesPerView': 8--}}
{{--                        }--}}
{{--                    }--}}
{{--                }">--}}
{{--                <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-sm-3 cols-2">--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/brands/1.png" alt="Brand" width="290"--}}
{{--                                 height="100" />--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/brands/2.png" alt="Brand" width="290"--}}
{{--                                 height="100" />--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/brands/3.png" alt="Brand" width="290"--}}
{{--                                 height="100" />--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/brands/4.png" alt="Brand" width="290"--}}
{{--                                 height="100" />--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/brands/5.png" alt="Brand" width="290"--}}
{{--                                 height="100" />--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/brands/6.png" alt="Brand" width="290"--}}
{{--                                 height="100" />--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/brands/7.png" alt="Brand" width="290"--}}
{{--                                 height="100" />--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <figure>--}}
{{--                            <img src="website_assets/assets/images/demos/demo2/brands/8.png" alt="Brand" width="290"--}}
{{--                                 height="100" />--}}
{{--                        </figure>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End of Brands Wrapper -->--}}

{{--            <h2 class="title text-left mb-5 pt-1 appear-animate">از وبلاگ ما </h2>--}}
{{--            <div class="swiper-container swiper-theme post-wrapper mb-10 mb-lg-5 appear-animate"--}}
{{--                 data-swiper-options="{--}}
{{--                    'spaceBetween': 20,--}}
{{--                    'slidesPerView': 1,--}}
{{--                    'breakpoints': {--}}
{{--                        '576': {--}}
{{--                            'slidesPerView': 2--}}
{{--                        },--}}
{{--                        '768': {--}}
{{--                            'slidesPerView': 3--}}
{{--                        },--}}
{{--                        '992': {--}}
{{--                            'slidesPerView': 4--}}
{{--                        }--}}
{{--                    }--}}
{{--                }">--}}
{{--                <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1">--}}
{{--                    <div class="swiper-slide post">--}}
{{--                        <figure class="post-media br-sm">--}}
{{--                            <a href="post-single.html">--}}
{{--                                <img src="website_assets/assets/images/demos/demo2/blog/1.jpg" alt="Post" width="620" height="398"--}}
{{--                                     style="background-color: #898078;">--}}
{{--                            </a>--}}
{{--                            <div class="post-calendar">--}}
{{--                                <span class="post-day">05</span>--}}
{{--                                <span class="post-month">اردیبهشت </span>--}}
{{--                            </div>--}}
{{--                        </figure>--}}
{{--                        <div class="post-details">--}}
{{--                            <h4 class="post-title"><a href="post-single.html">ما می‌خواهیم متفاوت باشیم، و مد این امکان را به من می‌دهد</a></h4>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است..</p>--}}
{{--                            </div>--}}
{{--                            <a href="post-single.html" class="btn btn-link btn-dark btn-underline">ادامه مطلب <i--}}
{{--                                        class="w-icon-long-arrow-left"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide post">--}}
{{--                        <figure class="post-media br-sm">--}}
{{--                            <a href="post-single.html">--}}
{{--                                <img src="website_assets/assets/images/demos/demo2/blog/2.jpg" alt="Post" width="620" height="398"--}}
{{--                                     style="background-color: #EDEFEE;">--}}
{{--                            </a>--}}
{{--                            <div class="post-calendar">--}}
{{--                                <span class="post-day">14</span>--}}
{{--                                <span class="post-month">اردیبهشت </span>--}}
{{--                            </div>--}}
{{--                        </figure>--}}
{{--                        <div class="post-details">--}}
{{--                            <h4 class="post-title"><a href="post-single.html">کاوش مد برای زنان در</a></h4>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.--}}
{{--                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است..</p>--}}
{{--                            </div>--}}
{{--                            <a href="post-single.html" class="btn btn-link btn-dark btn-underline">ادامه مطلب <i--}}
{{--                                        class="w-icon-long-arrow-left"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide post">--}}
{{--                        <figure class="post-media br-sm">--}}
{{--                            <a href="post-single.html">--}}
{{--                                <img src="website_assets/assets/images/demos/demo2/blog/3.jpg" alt="Post" width="620" height="398"--}}
{{--                                     style="background-color: #A1A09E;">--}}
{{--                            </a>--}}
{{--                            <div class="post-calendar">--}}
{{--                                <span class="post-day">25</span>--}}
{{--                                <span class="post-month">اردیبهشت </span>--}}
{{--                            </div>--}}
{{--                        </figure>--}}
{{--                        <div class="post-details">--}}
{{--                            <h4 class="post-title"><a href="post-single.html">مد از دیدگاه بیرونی به شما می گوید که چه کسی هستید</a></h4>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است..</p>--}}
{{--                            </div>--}}
{{--                            <a href="post-single.html" class="btn btn-link btn-dark btn-underline">ادامه مطلب <i--}}
{{--                                        class="w-icon-long-arrow-left"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide post">--}}
{{--                        <figure class="post-media br-sm">--}}
{{--                            <a href="post-single.html">--}}
{{--                                <img src="website_assets/assets/images/demos/demo2/blog/4.jpg" alt="Post" width="620" height="398"--}}
{{--                                     style="background-color: #EDF1F2;">--}}
{{--                            </a>--}}
{{--                            <div class="post-calendar">--}}
{{--                                <span class="post-day">16</span>--}}
{{--                                <span class="post-month">اردیبهشت </span>--}}
{{--                            </div>--}}
{{--                        </figure>--}}
{{--                        <div class="post-details">--}}
{{--                            <h4 class="post-title"><a href="post-single.html">فقط لباس جین نهایی را پیدا کردم </a>--}}
{{--                            </h4>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.--}}
{{--                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است..</p>--}}
{{--                            </div>--}}
{{--                            <a href="post-single.html" class="btn btn-link btn-dark btn-underline">ادامه مطلب <i--}}
{{--                                        class="w-icon-long-arrow-left"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End of Container -->--}}
{{--    </main>--}}

    <!-- End of Main -->

    <!-- Start of Footer -->
{{--    <footer class="footer appear-animate" data-animation-options="{--}}
{{--            'name': 'fadeIn'--}}
{{--        }">--}}
{{--        <div class="footer-newsletter bg-primary pt-6 pb-6">--}}
{{--            <div class="container">--}}
{{--                <div class="row justify-content-center align-items-center">--}}
{{--                    <div class="col-xl-5 col-lg-6">--}}
{{--                        <div class="icon-box icon-box-side text-white">--}}
{{--                            <div class="icon-box-icon d-inline-flex">--}}
{{--                                <i class="w-icon-envelop3"></i>--}}
{{--                            </div>--}}
{{--                            <div class="icon-box-content">--}}
{{--                                <h4 class="icon-box-title text-white text-uppercase mb-0">مشترک شدن در خبرنامه ما</h4>--}}
{{--                                <p class="text-white">تمام آخرین اطلاعات در مورد رویدادها، فروش ها و پیشنهادات را دریافت کنید.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">--}}
{{--                        <form action="#" method="get"--}}
{{--                              class="input-wrapper input-wrapper-inline input-wrapper-rounded">--}}
{{--                            <input type="email" class="form-control mr-2 bg-white" name="email" id="email"--}}
{{--                                   placeholder="آدرس ایمیل " />--}}
{{--                            <button class="btn btn-dark btn-rounded" type="submit">اشتراک در <i--}}
{{--                                        class="w-icon-long-arrow-left"></i></button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <div class="footer-top">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-4 col-sm-6">--}}
{{--                        <div class="widget widget-about">--}}
{{--                            <a href="demo2.html" class="logo-footer">--}}
{{--                                <img src="website_assets/assets/images/demos/demo2/footer-logo.png" alt="logo-footer" width="144"--}}
{{--                                     height="45" />--}}
{{--                            </a>--}}
{{--                            <div class="widget-body">--}}
{{--                                <p class="widget-about-title">سوالی دارید؟ تماس بگیرید</p>--}}
{{--                                <a href="tel:18005707777" class="widget-about-call">1-800-570-7777</a>--}}
{{--                                <p class="widget-about-desc">برای دریافت بروز رسانی با ما هماهنگ شوید.--}}
{{--                                </p>--}}

{{--                                <div class="social-icons social-icons-colored">--}}
{{--                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>--}}
{{--                                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>--}}
{{--                                    <a href="#" class="social-icon social-instagram w-icon-instagram"></a>--}}
{{--                                    <a href="#" class="social-icon social-youtube w-icon-youtube"></a>--}}
{{--                                    <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-sm-6">--}}
{{--                        <div class="widget">--}}
{{--                            <h3 class="widget-title">کمپانی </h3>--}}
{{--                            <ul class="widget-body">--}}
{{--                                <li><a href="about-us.html">درباره ما </a></li>--}}
{{--                                <li><a href="#">اعضای تیم </a></li>--}}
{{--                                <li><a href="#">شغل </a></li>--}}
{{--                                <li><a href="contact-us.html">تماس با ما </a></li>--}}
{{--                                <li><a href="#">وابسته </a></li>--}}
{{--                                <li><a href="#">تاریخچه سفارش ها </a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-sm-6">--}}
{{--                        <div class="widget">--}}
{{--                            <h4 class="widget-title">حساب کاربری </h4>--}}
{{--                            <ul class="widget-body">--}}
{{--                                <li><a href="#">پیگیر سفارشات من </a></li>--}}
{{--                                <li><a href="cart.html">سبد خرید </a></li>--}}
{{--                                <li><a href="login.html">ورود </a></li>--}}
{{--                                <li><a href="#">راهنما </a></li>--}}
{{--                                <li><a href="wishlist.html">علاقه مندیهای من  </a></li>--}}
{{--                                <li><a href="#">سیاست حفظ حریم خصوصی </a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-sm-6">--}}
{{--                        <div class="widget">--}}
{{--                            <h4 class="widget-title">خدمات مشتری </h4>--}}
{{--                            <ul class="widget-body">--}}
{{--                                <li><a href="#">روش های پرداخت </a></li>--}}
{{--                                <li><a href="#">تضمین بازگشت پول! </a></li>--}}
{{--                                <li><a href="#">محصول بازگشتی </a></li>--}}
{{--                                <li><a href="#">مرکز پشتیبانی </a></li>--}}
{{--                                <li><a href="#">حمل دریایی </a></li>--}}
{{--                                <li><a href="#">مدت و شرایط</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="footer-middle">--}}
{{--                <div class="widget widget-category">--}}
{{--                    <div class="category-box">--}}
{{--                        <h6 class="category-name">مصرف کننده برق:</h6>--}}
{{--                        <a href="#">تلویزیون</a>--}}
{{--                        <a href="#">وضعیت هوا </a>--}}
{{--                        <a href="#">یخچال </a>--}}
{{--                        <a href="#">ماشین لباسشویی </a>--}}
{{--                        <a href="#">بلندگوی صوتی </a>--}}
{{--                        <a href="#">دوربین امنیتی </a>--}}
{{--                        <a href="#">نمایش همه </a>--}}
{{--                    </div>--}}
{{--                    <div class="category-box">--}}
{{--                        <h6 class="category-name">پوشاک و لباس:</h6>--}}
{{--                        <a href="#">تیشرت مردانه</a>--}}
{{--                        <a href="#">لباس </a>--}}
{{--                        <a href="#">کفش ورزشی مردانه </a>--}}
{{--                        <a href="#">کوله پشتی چرمی </a>--}}
{{--                        <a href="#">ساعت </a>--}}
{{--                        <a href="#">شلوار جین </a>--}}
{{--                        <a href="#">عینک آفتابی </a>--}}
{{--                        <a href="#">چکمه </a>--}}
{{--                        <a href="#">ریبان </a>--}}
{{--                        <a href="#">تجهیزات جانبی </a>--}}
{{--                    </div>--}}
{{--                    <div class="category-box">--}}
{{--                        <h6 class="category-name">خانه، باغ و آشپزخانه:</h6>--}}
{{--                        <a href="#">کاناپه </a>--}}
{{--                        <a href="#">صندلی </a>--}}
{{--                        <a href="#">اتاق خواب </a>--}}
{{--                        <a href="#">هال </a>--}}
{{--                        <a href="#">وسایل آشپزی </a>--}}
{{--                        <a href="#">وسایل آشپزی </a>--}}
{{--                        <a href="#">مخلوط کن </a>--}}
{{--                        <a href="#"> تجهیزات باغبانی </a>--}}
{{--                        <a href="#">دکور </a>--}}
{{--                        <a href="#">کتابخانه </a>--}}
{{--                    </div>--}}
{{--                    <div class="category-box">--}}
{{--                        <h6 class="category-name">سلامت و زیبایی:</h6>--}}
{{--                        <a href="#">مراقبت از پوست </a>--}}
{{--                        <a href="#">دوش بدن </a>--}}
{{--                        <a href="#">آرایش </a>--}}
{{--                        <a href="#">مراقبت از مو </a>--}}
{{--                        <a href="#">رژ لب </a>--}}
{{--                        <a href="#">عطر </a>--}}
{{--                        <a href="#">نمایش همه </a>--}}
{{--                    </div>--}}
{{--                    <div class="category-box">--}}
{{--                        <h6 class="category-name">جواهرات و ساعت:</h6>--}}
{{--                        <a href="#">گردن بند </a>--}}
{{--                        <a href="#">آویز </a>--}}
{{--                        <a href="#">حلقه الماس </a>--}}
{{--                        <a href="#">گوشواره نقره </a>--}}
{{--                        <a href="#">ناظر چرم </a>--}}
{{--                        <a href="#">رولکس </a>--}}
{{--                        <a href="#">گوچی </a>--}}
{{--                        <a href="#">عقیق استرالیایی </a>--}}
{{--                        <a href="#">آمولیت </a>--}}
{{--                        <a href="#">خورشید پیریت </a>--}}
{{--                    </div>--}}
{{--                    <div class="category-box">--}}
{{--                        <h6 class="category-name">کامپیوتر و فناوری:</h6>--}}
{{--                        <a href="#">لپ تاپ </a>--}}
{{--                        <a href="#">ایمک </a>--}}
{{--                        <a href="#">گوشی هوشمند </a>--}}
{{--                        <a href="#">تبلت </a>--}}
{{--                        <a href="#">اپل </a>--}}
{{--                        <a href="#">ایسوس </a>--}}
{{--                        <a href="#">درون </a>--}}
{{--                        <a href="#">اسپیکر بی سیم </a>--}}
{{--                        <a href="#">کنترل کننده بازی </a>--}}
{{--                        <a href="#">نمایش همه </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="footer-bottom">--}}
{{--                <div class="footer-left">--}}
{{--                    <p class="copyright">کپی رایت © 1401 فروشگاه وولمارت. تمامی حقوق محفوظ است..</p>--}}
{{--                </div>--}}
{{--                <div class="footer-right">--}}
{{--                    <span class="payment-label mr-lg-8">ما از پرداخت مطمئن استفاده می کنیم</span>--}}
{{--                    <figure class="payment">--}}
{{--                        <img src="website_assets/assets/images/payment.png" alt="payment" width="159" height="25" />--}}
{{--                    </figure>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
    <!-- End of Footer -->
</div>
<!-- End of .page-wrapper -->

<!-- Start of Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
    <a href="demo2.html" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>خانه</p>
    </a>
    <a href="shop-banner-sidebar.html" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>فروشگاه </p>
    </a>
    <a href="my-account.html" class="sticky-link">
        <i class="w-icon-account"></i>
        <p>حساب کاربری </p>
    </a>
    <div class="cart-dropdown dir-up">
        <a href="cart.html" class="sticky-link">
            <i class="w-icon-cart"></i>
            <p>سبد خرید </p>
        </a>
        <div class="dropdown-box">
            <div class="products">
                <div class="product product-cart">
                    <div class="product-detail">
                        <h3 class="product-name">
                            <a href="product-default.html">ما از پرداخت مطمئن استفاده می کنیم<br>کفش دونده تیک</a>
                        </h3>
                        <div class="price-box">
                            <span class="product-quantity">1</span>
                            <span class="product-price">25600 تومان</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="{{asset('website_assets/assets/images/cart/product-1.jpg')}}" alt="product" height="84" width="94" />
                        </a>
                    </figure>
                    <button class="btn btn-link btn-close" aria-label="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="product product-cart">
                    <div class="product-detail">
                        <h3 class="product-name">
                            <a href="product-default.html">پینا کاربردی آبی<br>لباس جین جلو</a>
                        </h3>
                        <div class="price-box">
                            <span class="product-quantity">1</span>
                            <span class="product-price">32000 تومان</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="{{asset('website_assets/assets/images/cart/product-2.jpg')}}" alt="product" width="84" height="94" />
                        </a>
                    </figure>
                    <button class="btn btn-link btn-close" aria-label="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="cart-total">
                <label>مجموع: </label>
                <span class="price">58000 تومان</span>
            </div>

            <div class="cart-action">
                <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">سبد خرید </a>
                <a href="checkout.html" class="btn btn-primary  btn-rounded">پرداخت </a>
            </div>
        </div>
        <!-- End of Dropdown Box -->
    </div>

    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="w-icon-search"></i>
            <p>جستجو </p>
        </a>
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="جستجو"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
    </div>
</div>
<!-- End of Sticky Footer -->

<!-- Start of Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
            version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
        <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
    </svg> </a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="جستجو"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">منوی اصلی </a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">دسته بندیها </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="demo2.html">خانه </a></li>
                    <li>
                        <a href="shop-banner-sidebar.html">فروشگاه </a>
                        <ul>
                            <li>
                                <a href="#">صفحات فروشگاه </a>
                                <ul>
                                    <li><a href="shop-banner-sidebar.html">بنر با نوار کناری</a></li>
                                    <li><a href="shop-boxed-banner.html">بنر باکسی </a></li>
                                    <li><a href="shop-fullwidth-banner.html">بنر تمام عرض </a></li>
                                    <li><a href="shop-horizontal-filter.html">فیلتر افقی <span
                                                    class="tip tip-hot">داغ </span></a></li>
                                    <li><a href="shop-off-canvas.html">بدون نوار کناری <span
                                                    class="tip tip-new">جدید </span></a></li>
                                    <li><a href="shop-infinite-scroll.html"> اسکرول بی نهایت آژاکس</a></li>
                                    <li><a href="shop-right-sidebar.html">سایدبار چپ </a></li>
                                    <li><a href="shop-both-sidebar.html">هر دو نوار کناری </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">چیدمان فروشگاه </a>
                                <ul>
                                    <li><a href="shop-grid-3cols.html">3 حالت ستون ها </a></li>
                                    <li><a href="shop-grid-4cols.html">4 حالت ستون ها </a></li>
                                    <li><a href="shop-grid-5cols.html">5 حالت ستون ها </a></li>
                                    <li><a href="shop-grid-6cols.html">6 حالت ستون ها </a></li>
                                    <li><a href="shop-grid-7cols.html">7 حالت ستون ها </a></li>
                                    <li><a href="shop-grid-8cols.html">8 حالت ستون ها </a></li>
                                    <li><a href="shop-list.html">حالت فهرست</a></li>
                                    <li><a href="shop-list-sidebar.html">حالت فهرست با نوار کناری</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">صفحات محصول  </a>
                                <ul>
                                    <li><a href="product-variable.html">محصول متغیر </a></li>
                                    <li><a href="product-featured.html">ویژه و جذاب </a></li>
                                    <li><a href="product-accordion.html">داده ها در آکاردئون</a></li>
                                    <li><a href="product-section.html">داده ها در بخش ها </a></li>
                                    <li><a href="product-swatch.html">نمونه تصویر </a></li>
                                    <li><a href="product-extended.html">اطلاعات گسترده </a>
                                    </li>
                                    <li><a href="product-without-sidebar.html">بدون نوار کناری </a></li>
                                    <li><a href="product-video.html">360<sup>درجه </sup>  ویدئو <span
                                                    class="tip tip-new">جدید </span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">چیدمان محصول </a>
                                <ul>
                                    <li><a href="product-default.html">پیشفرض <span
                                                    class="tip tip-hot">داغ </span></a></li>
                                    <li><a href="product-vertical.html">شست عمودی </a></li>
                                    <li><a href="product-grid.html">تصاویر شبکه ای </a></li>
                                    <li><a href="product-masonry.html">ساختمانی </a></li>
                                    <li><a href="product-gallery.html">گالری </a></li>
                                    <li><a href="product-sticky-info.html">اطلاعات چسبناک </a></li>
                                    <li><a href="product-sticky-thumb.html">تصویر چسبناک </a></li>
                                    <li><a href="product-sticky-both.html">هردو چسبناک </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="vendor-dokan-store.html">فروشنده </a>
                        <ul>
                            <li>
                                <a href="#">لیست فروشگاه </a>
                                <ul>
                                    <li><a href="vendor-dokan-store-list.html">فهرست فروشگاه  1</a></li>
                                    <li><a href="vendor-wcfm-store-list.html">فهرست فروشگاه  2</a></li>
                                    <li><a href="vendor-wcmp-store-list.html">فهرست فروشگاه  3</a></li>
                                    <li><a href="vendor-wc-store-list.html">فهرست فروشگاه  4</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">فروشگاه فروشنده </a>
                                <ul>
                                    <li><a href="vendor-dokan-store.html">فروشگاه فروشنده  1</a></li>
                                    <li><a href="vendor-wcfm-store-product-grid.html">فروشگاه فروشنده  2</a></li>
                                    <li><a href="vendor-wcmp-store-product-grid.html">فروشگاه فروشنده  3</a></li>
                                    <li><a href="vendor-wc-store-product-grid.html">فروشگاه فروشنده  4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog.html">بلاگ </a>
                        <ul>
                            <li><a href="blog.html">کلاسیک </a></li>
                            <li><a href="blog-listing.html">لیستی </a></li>
                            <li>
                                <a href="#">گرید </a>
                                <ul>
                                    <li><a href="blog-grid-2cols.html">شبکه 2 ستون</a></li>
                                    <li><a href="blog-grid-3cols.html">شبکه 3 ستون</a></li>
                                    <li><a href="blog-grid-4cols.html">شبکه 4ستون</a></li>
                                    <li><a href="blog-grid-sidebar.html">سایدبار شبکه ای </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">ساختمانی </a>
                                <ul>
                                    <li><a href="blog-masonry-2cols.html">ساختمانی 2 ستون </a></li>
                                    <li><a href="blog-masonry-3cols.html">ساختمانی 3 ستون </a></li>
                                    <li><a href="blog-masonry-4cols.html">ساختمانی 4ستون </a></li>
                                    <li><a href="blog-masonry-sidebar.html">نوار کناری ساختمانی </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">ماسک </a>
                                <ul>
                                    <li><a href="blog-mask-grid.html">ماسک وبلاگ گرید </a></li>
                                    <li><a href="blog-mask-masonry.html">ماسک وبلاگ ساختمانی </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="post-single.html">تک نوشته </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="about-us.html">صفحات </a>
                        <ul>

                            <li><a href="about-us.html">درباره ما </a></li>
                            <li><a href="become-a-vendor.html">فروشنده شوید </a></li>
                            <li><a href="contact-us.html">تماس با ما </a></li>
                            <li><a href="login.html">ورود </a></li>
                            <li><a href="faq.html">نقل و قل </a></li>
                            <li><a href="error-404.html">ارور 404</a></li>
                            <li><a href="coming-soon.html">به زودی </a></li>
                            <li><a href="wishlist.html">علاقه مندیها </a></li>
                            <li><a href="cart.html">سبد خرید </a></li>
                            <li><a href="checkout.html">پرداخت </a></li>
                            <li><a href="my-account.html">حساب من </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="elements.html">المنت ها </a>
                        <ul>
                            <li><a href="element-products.html">محصولات </a></li>
                            <li><a href="element-titles.html">عناوین </a></li>
                            <li><a href="element-typography.html">تایپوگرافی </a></li>
                            <li><a href="element-categories.html">دسته بندی محصول </a></li>
                            <li><a href="element-buttons.html">دکمه ها </a></li>
                            <li><a href="element-accordions.html">آکاردئون </a></li>
                            <li><a href="element-alerts.html">هشدار و اعلان</a></li>
                            <li><a href="element-tabs.html">زبانه ها </a></li>
                            <li><a href="element-testimonials.html">مشتریان </a></li>
                            <li><a href="element-blog-posts.html">پست های وبلاگ </a></li>
                            <li><a href="element-instagrams.html">اینستاگرام </a></li>
                            <li><a href="element-cta.html">دکمه اقدام تماس</a></li>
                            <li><a href="element-vendors.html">فروشندگان </a></li>
                            <li><a href="element-icon-boxes.html">آیکن باکس </a></li>
                            <li><a href="element-icons.html">آیکن ها </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-tshirt2"></i>مدل
                        </a>
                        <ul>
                            <li>
                                <a href="#">زنانه </a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">تازه رسیده ها </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">پرفروش ترین ها </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">پر طرفدار </a></li>
                                    <li><a href="shop-fullwidth-banner.html">تن پوش </a></li>
                                    <li><a href="shop-fullwidth-banner.html">کفش ها </a></li>
                                    <li><a href="shop-fullwidth-banner.html">کیسه ها </a></li>
                                    <li><a href="shop-fullwidth-banner.html">تجهیزات جانبی </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">جواهر و
                                            ساعت </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">زنانه </a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">تازه رسیده ها </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">پرفروش ترین ها </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">پر طرفدار </a></li>
                                    <li><a href="shop-fullwidth-banner.html">تن پوش </a></li>
                                    <li><a href="shop-fullwidth-banner.html">کفش ها </a></li>
                                    <li><a href="shop-fullwidth-banner.html">کیسه ها </a></li>
                                    <li><a href="shop-fullwidth-banner.html">تجهیزات جانبی </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">جواهر و
                                            ساعت </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-home"></i>خانه و باغ
                        </a>
                        <ul>
                            <li>
                                <a href="#">اتاق خواب </a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">تخت، قاب و پایه</a></li>
                                    <li><a href="shop-fullwidth-banner.html">کمد </a></li>
                                    <li><a href="shop-fullwidth-banner.html"> میزهای خواب </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">تخت و تخت کودک</a></li>
                                    <li><a href="shop-fullwidth-banner.html">اسلحه </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">هال </a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">میز های قهوه </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">صندلی </a></li>
                                    <li><a href="shop-fullwidth-banner.html">جداول </a></li>
                                    <li><a href="shop-fullwidth-banner.html">فوتون و مبل تختخواب شو</a></li>
                                    <li><a href="shop-fullwidth-banner.html">کابینت و صندوقچه</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">دفتر </a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">صندلی های اداری </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">میز </a></li>
                                    <li><a href="shop-fullwidth-banner.html">قفسه های کتاب </a></li>
                                    <li><a href="shop-fullwidth-banner.html">قفسه پوشه ها </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html"> اتاق استراحت
                                            جداول </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">آشپزخانه و غذاخوری</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">ست های غذاخوری </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">کابینت های نگهداری آشپزخانه</a></li>
                                    <li><a href="shop-fullwidth-banner.html">قفسه های بشرز </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">صندلی های غذاخوری </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">اتاق غذاخوری جداول </a></li>
                                    <li><a href="shop-fullwidth-banner.html">چهارپایه بار </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-electronics"></i>الکترونیک
                        </a>
                        <ul>
                            <li>
                                <a href="#">لپ تاپ و کامپیوتر</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">کامپیوترهای رومیزی</a></li>
                                    <li><a href="shop-fullwidth-banner.html">مانیتور </a></li>
                                    <li><a href="shop-fullwidth-banner.html">لپ تاپ </a></li>
                                    <li><a href="shop-fullwidth-banner.html">هارد دیسک و فضای ذخیره سازی</a></li>
                                    <li><a href="shop-fullwidth-banner.html">کامپیوتر تجهیزات جانبی </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">تلویزیون و ویدئو</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">تلویزیون ها </a></li>
                                    <li><a href="shop-fullwidth-banner.html">بلندگوهای صوتی خانگی</a></li>
                                    <li><a href="shop-fullwidth-banner.html">پروژکتورها </a></li>
                                    <li><a href="shop-fullwidth-banner.html">دستگاه های پخش رسانه</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">دوربین های دیجیتال</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">دوربین های دیجیتال SLR</a></li>
                                    <li><a href="shop-fullwidth-banner.html">دوربین های ورزشی و اکشن</a></li>
                                    <li><a href="shop-fullwidth-banner.html">لنزهای دوربین  </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">چاپگر عکس </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">کارت های حافظه دیجیتال</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">تلفن های همراه </a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">تلفن های حامل </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">گوشی های قفل نشده </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">قاب های گوشی و موبایل</a></li>
                                    <li><a href="shop-fullwidth-banner.html">شارژر تلفن همراه</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-furniture"></i> مبلمان
                        </a>
                        <ul>
                            <li>
                                <a href="#">مبلمان </a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">مبل و کاناپه</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">صندلی </a></li>
                                    <li><a href="shop-fullwidth-banner.html">چارچوب های تخت </a></li>
                                    <li><a href="shop-fullwidth-banner.html">میزهای کنار تخت </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">میز آرایش</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">نورپردازی </a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">لامپ </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">لامپ ها </a></li>
                                    <li><a href="shop-fullwidth-banner.html">چراغ های سقفی </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">چراغ های دیواری </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">حمام نورپردازی </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">خانه تجهیزات جانبی </a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">تجهیزات جانبی تزئینی </a></li>
                                    <li><a href="shop-fullwidth-banner.html">شمع و نگهدارنده</a></li>
                                    <li><a href="shop-fullwidth-banner.html">عطر خانگی </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">آینه </a></li>
                                    <li><a href="shop-fullwidth-banner.html">ساعت ها </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">باغ و فضای باز</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">مبلمان باغ </a></li>
                                    <li><a href="shop-fullwidth-banner.html">ماشین های چمن زنی </a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">واشرهای تحت فشار</a></li>
                                    <li><a href="shop-fullwidth-banner.html">تمام ابزار باغبانی</a></li>
                                    <li><a href="shop-fullwidth-banner.html">غذاخوری در فضای باز</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-heartbeat"></i>سلامت و زیبایی
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-gift"></i>ایده های هدیه
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-gamepad"></i>اسباب بازی و بازی
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ice-cream"></i>آشپزی
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ios"></i>گوشی های هوشمند
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-camera"></i>دوربین و عکس
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ruby"></i>تجهیزات جانبی
                        </a>
                    </li>
                    <li>
                        <a href="shop-banner-sidebar.html"
                           class="font-weight-bold text-primary text-uppercase ls-25">
                            نمایش همه دسته بندیها <i class="w-icon-angle-left"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->

<!-- Start of Newsletter popup -->
<div class="newsletter-popup mfp-hide">
    <div class="newsletter-content">
        <h4 class="text-uppercase font-weight-normal ls-25">دریافت کنید<span class="text-primary">25% تخفیف</span></h4>
        <h2 class="ls-25">در وولمارت ثبت نام کنید</h2>
        <p class="text-light ls-10">برای دریافت به‌روزرسانی‌های پیشنهادات ویژه، در خبرنامه بازار وولمارت مشترک شوید.</p>
        <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
            <input type="email" class="form-control email font-size-md" name="email" id="email2"
                   placeholder="آدرس ایمیل شما " required="">
            <button class="btn btn-dark" type="submit">ارسال </button>
        </form>
        <div class="form-checkbox d-flex align-items-center">
            <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                   required="">
            <label for="hide-newsletter-popup" class="font-size-sm text-light">دیگر این پنجره بازشو نشان داده نشود.</label>
        </div>
    </div>
</div>
<!-- End of Newsletter popup -->

<!-- Start of Quick View -->
<div class="product product-single product-popup">
    <div class="row gutter-lg">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-gallery product-gallery-sticky">
                <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                    <div class="swiper-wrapper row cols-1 gutter-no">
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{asset('website_assets/assets/images/products/popup/1-440x494.jpg')}}"
                                     data-zoom-image="{{asset('website_assets/assets/images/products/popup/1-440x494.jpg')}}"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{asset('website_assets/assets/images/products/popup/2-440x494.jpg')}}"
                                     data-zoom-image="{{asset('website_assets/assets/images/products/popup/2-800x900.jpg')}}"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{asset('website_assets/assets/images/products/popup/3-440x494.jpg')}}"
                                     data-zoom-image="{{asset('website_assets/assets/images/products/popup/3-800x900.jpg')}}"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{asset('website_assets/assets/images/products/popup/4-440x494.jpg')}}"
                                     data-zoom-image="{{asset('website_assets/assets/images/products/popup/4-800x900.jpg')}}"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                    </div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button>
                </div>
                <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                        'navigation': {
                            'nextEl': '.swiper-button-next',
                            'prevEl': '.swiper-button-prev'
                        }
                    }">
                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                        <div class="product-thumb swiper-slide">
                            <img src="{{asset('website_assets/assets/images/products/popup/1-103x116.jpg')}}" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="{{asset('website_assets/assets/images/products/popup/2-103x116.jpg')}}" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="{{asset('website_assets/assets/images/products/popup/3-103x116.jpg')}}" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="{{asset('website_assets/assets/images/products/popup/4-103x116.jpg')}}" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                    </div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button>
                </div>
            </div>
        </div>
        <div class="col-md-6 overflow-hidden p-relative">
            <div class="product-details scrollable pl-0">
                <h2 class="product-title">ساعت مچی مشکی الکترونیکی</h2>
                <div class="product-bm-wrapper">
                    <figure class="brand">
                        <img src="{{asset('website_assets/assets/images/products/brand/brand-1.jpg')}}" alt="Brand" width="102" height="48" />
                    </figure>
                    <div class="product-meta">
                        <div class="product-categories">
                            دسته بندی:
                            <span class="product-category"><a href="#">الکترونیک </a></span>
                        </div>
                        <div class="product-sku">
                            کد:  <span>MS46891340</span>
                        </div>
                    </div>
                </div>

                <hr class="product-divider">

                <div class="product-price">80000 تومان </div>

                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#" class="rating-reviews">(3 نظر )</a>
                </div>

                <div class="product-short-desc">
                    <ul class="list-type-check list-style-none">
                        <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است..</li>
                        <li>چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی.</li>
                        <li>مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</li>
                    </ul>
                </div>

                <hr class="product-divider">

                <div class="product-form product-variation-form product-color-swatch">
                    <label>رنگ :</label>
                    <div class="d-flex align-items-center product-variations">
                        <a href="#" class="color" style="background-color: #ffcc01"></a>
                        <a href="#" class="color" style="background-color: #ca6d00;"></a>
                        <a href="#" class="color" style="background-color: #1c93cb;"></a>
                        <a href="#" class="color" style="background-color: #ccc;"></a>
                        <a href="#" class="color" style="background-color: #333;"></a>
                    </div>
                </div>
                <div class="product-form product-variation-form product-size-swatch">
                    <label class="mb-1">سایز :</label>
                    <div class="flex-wrap d-flex align-items-center product-variations">
                        <a href="#" class="size">کوچک </a>
                        <a href="#" class="size">متوسط </a>
                        <a href="#" class="size">بزرگ </a>
                        <a href="#" class="size">خبلی بزرگ </a>
                    </div>
                    <a href="#" class="product-variation-clean">پاک کردن همه </a>
                </div>

                <div class="product-variation-price">
                    <span></span>
                </div>

                <div class="product-form">
                    <div class="product-qty-form">
                        <div class="input-group">
                            <input class="quantity form-control" type="number" min="1" max="10000000">
                            <button class="quantity-plus w-icon-plus"></button>
                            <button class="quantity-minus w-icon-minus"></button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cart">
                        <i class="w-icon-cart"></i>
                        <span>افزودن به سبد  </span>
                    </button>
                </div>

                <div class="social-links-wrapper">
                    <div class="social-links">
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                            <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                        </div>
                    </div>
                    <span class="divider d-xs-show"></span>
                    <div class="product-link-wrapper d-flex">
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                        <a href="#"
                           class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Quick view -->

<!-- Plugin JS File -->
<script src="{{asset('website_assets/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('website_assets/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
<script src="{{asset('website_assets/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('website_assets/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('website_assets/assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
<script src="{{asset('website_assets/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('website_assets/assets/vendor/floating-parallax/parallax.min.js')}}"></script>
<script src="{{asset('website_assets/assets/vendor/zoom/jquery.zoom.js')}}"></script>

<!-- Main Js -->
<script src="{{asset('website_assets/assets/js/main.min.js')}}"></script>
<script>
    const p = document.getElementById('p');
    var html="<p>دریافت مجدد کد از طریق<span><a>  پیامک</a></span> یا <span><a>  تماس</a></span></p>";


    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
            else if(--timer==0){
                p.style.visibility = 'hidden';
                var el = document.getElementById('thingy'),
                    // Make a new div
                    elChild = document.createElement("div");

                // Give the new div some content
                elChild.innerHTML = html;

                // Chug in into the parent element
                el.appendChild(elChild);
            }
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 60 * 2,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script>
</body>


</html>