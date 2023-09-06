@extends('front.master')
@section('content')
    @include('front.website.partials.header')
    <main class="main">
@include('front.website.partials.intro')
        <div class="container">

            @include('front.website.partials.icon-box')
            @include('front.website.partials.offers')
            <!-- End of Product Deals Warpper -->
            @include('front.website.partials.cate_image')

            <!-- End of Category Wrapper -->

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
            <!-- End of Vendor Wrapper -->
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
            <!-- End of Banner Product Wrapper -->


            <!-- End of Banner -->
{{--@include('front.website.partials.banner2')--}}
@include('front.website.partials.product2')

            <!-- End of Swiper Container -->

            <!-- End of Swiper Container -->

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
        </div>
        <!-- End of Container -->
    </main>

    @include('front.website.partials.footer')
@endsection