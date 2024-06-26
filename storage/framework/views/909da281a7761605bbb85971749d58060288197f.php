<!DOCTYPE html>
<html lang="en">
<?php
    $setting=\App\Settings::find(1);
 ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>

    <?php echo e($setting->name_ar); ?>

    </title>


    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description"
          content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('website_assets/assets/images/icons/favicon.png')); ?>">

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

    <link rel="preload" href="<?php echo e(asset('website_assets/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')); ?>" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="<?php echo e(asset('website_assets/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')); ?>" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="<?php echo e(asset('website_assets/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')); ?>" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="<?php echo e(asset('website_assets/assets/fonts/wolmart87d5.woff')); ?>?png09e" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('website_assets/assets/vendor/fontawesome-free/css/all.min.css')); ?>">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('website_assets/assets/vendor/swiper/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('website_assets/assets/vendor/animate/animate.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('website_assets/assets/vendor/magnific-popup/magnific-popup.min.css')); ?>">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('website_assets/assets/css/demo2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('website_assets/assets/css/style-rtl.min.css')); ?>">
    <?php echo $__env->yieldContent('style'); ?>
</head>

<body class="home">
<div class="page-wrapper">
    <h1 class="d-none">فروشگاه اقساطی  شایگان</h1>
    <!-- Start of Header -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- End of Header -->






















































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































    <!-- End of Main -->

    <!-- Start of Footer -->

























































































































































































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
                            <img src="<?php echo e(asset('website_assets/assets/images/cart/product-1.jpg')); ?>" alt="product" height="84" width="94" />
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
                            <img src="<?php echo e(asset('website_assets/assets/images/cart/product-2.jpg')); ?>" alt="product" width="84" height="94" />
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
                                <img src="<?php echo e(asset('website_assets/assets/images/products/popup/1-440x494.jpg')); ?>"
                                     data-zoom-image="<?php echo e(asset('website_assets/assets/images/products/popup/1-440x494.jpg')); ?>"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="<?php echo e(asset('website_assets/assets/images/products/popup/2-440x494.jpg')); ?>"
                                     data-zoom-image="<?php echo e(asset('website_assets/assets/images/products/popup/2-800x900.jpg')); ?>"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="<?php echo e(asset('website_assets/assets/images/products/popup/3-440x494.jpg')); ?>"
                                     data-zoom-image="<?php echo e(asset('website_assets/assets/images/products/popup/3-800x900.jpg')); ?>"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="<?php echo e(asset('website_assets/assets/images/products/popup/4-440x494.jpg')); ?>"
                                     data-zoom-image="<?php echo e(asset('website_assets/assets/images/products/popup/4-800x900.jpg')); ?>"
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
                            <img src="<?php echo e(asset('website_assets/assets/images/products/popup/1-103x116.jpg')); ?>" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="<?php echo e(asset('website_assets/assets/images/products/popup/2-103x116.jpg')); ?>" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="<?php echo e(asset('website_assets/assets/images/products/popup/3-103x116.jpg')); ?>" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="<?php echo e(asset('website_assets/assets/images/products/popup/4-103x116.jpg')); ?>" alt="Product Thumb" width="103"
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
                        <img src="<?php echo e(asset('website_assets/assets/images/products/brand/brand-1.jpg')); ?>" alt="Brand" width="102" height="48" />
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
<script src="<?php echo e(asset('website_assets/assets/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('website_assets/assets/vendor/jquery.plugin/jquery.plugin.min.js')); ?>"></script>
<script src="<?php echo e(asset('website_assets/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('website_assets/assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('website_assets/assets/vendor/jquery.countdown/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(asset('website_assets/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('website_assets/assets/vendor/floating-parallax/parallax.min.js')); ?>"></script>
<script src="<?php echo e(asset('website_assets/assets/vendor/zoom/jquery.zoom.js')); ?>"></script>

<!-- Main Js -->
<script src="<?php echo e(asset('website_assets/assets/js/main.min.js')); ?>"></script>
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


</html><?php /**PATH E:\shayegan_project\shop\resources\views/front/master.blade.php ENDPATH**/ ?>