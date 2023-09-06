@php
$setting=\App\Settings::find(1);
@endphp
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg"> به فروشگاه ما خوش آمدید!</p>
            </div>
            <div class="header-right pr-0">
                <!-- End of DropDown Menu -->
@php
use Illuminate\Support\Facades\Auth;
 @endphp
                <!-- End of Dropdown Menu -->
                <span class="divider d-lg-show"></span>
{{--                <a href="blog.html" class="d-lg-show">بلاگ </a>--}}
                @if(Auth::guard('member')->check()==true)
                    <a href="{{url('users/my-account')}}" class="d-lg-show">حساب من </a>
                @else
                    <a href="{{url('users/login')}}" class="d-lg-show login sign-in"><i
                                class="w-icon-account"></i>ورود </a>
                @endif


{{--                <span class="delimiter d-lg-show">/</span>--}}
{{--                <a href="website_assets/assets/ajax/login.html" class="ml-0 d-lg-show login register">ثبت نام </a>--}}
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{url('/')}}" class="logo ml-lg-0">
                    <img src="{{asset('uploads/logo/'.$setting->logo)}}" alt="logo" width="144" height="45" />
                </a>
                <nav class="main-nav">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{url('/')}}">خانه </a>
                        </li>

                        <li>
                            <a href="demo2.html">بلاگ </a>
                        </li>
                        <li>
                            <a href="demo2.html">تماس با ما </a>
                        </li>
                        <li>
                            <a href="demo2.html">درباره ما </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-xl-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                           نیاز به مشاوره دارید </h4>
                        <a href="tel:{{$setting->mobile}}" class="phone-number font-weight-bolder ls-50">{{$setting->mobile}}</a>
                    </div>
                </div>
                <a class="wishlist label-down link d-xs-show" href="wishlist.html">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">علاقه مندیها </span>
                </a>
{{--                <a class="compare label-down link d-xs-show" href="compare.html">--}}
{{--                    <i class="w-icon-compare"></i>--}}
{{--                    <span class="compare-label d-lg-show">مقایسه کردن </span>--}}
{{--                </a>--}}
                <div class="dropdown cart-dropdown mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="#" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count">2</span>
                        </i>
                        <span class="cart-label">سبد </span>
                    </a>
                    <div class="dropdown-box">
                        <div class="products">
                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="product-default.html" class="product-name">الیس بافتنی بژ<br>کفش دونده تیک</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">25600 تومان</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="website_assets/assets/images/cart/product-1.jpg" alt="product" height="84"
                                             width="94" />
                                    </a>
                                </figure>
                                <button class="btn btn-link btn-close" aria-label="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="product-default.html" class="product-name">پینا کاربردی آبی<br>لباس جین جلویی پینا</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">32000 تومان</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="website_assets/assets/images/cart/product-2.jpg" alt="product" width="84"
                                             height="94" />
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
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left flex-1">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="true" data-display="static"
                           title="کاوش دسته بندیها ">
                            <i class="w-icon-category"></i>
                            <span>کاوش دسته بندیها </span>
                        </a>

                        <div class="dropdown-box">
                            <ul class="menu vertical-menu category-menu">
                                <li>
                                    <a href="shop-fullwidth-banner.html">
                                        <i class="w-icon-tshirt2"></i>مدل
                                    </a>
                                    <ul class="megamenu">
                                        <li>
                                            <h4 class="menu-title">زنانه </h4>
                                            <hr class="divider">
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
                                                <li><a href="shop-fullwidth-banner.html">جواهرات و ساعت</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h4 class="menu-title">زنانه </h4>
                                            <hr class="divider">
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
                                                <li><a href="shop-fullwidth-banner.html">جواهرات و ساعت</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="banner-fixed menu-banner menu-banner2">
                                                <figure>
                                                    <img src="website_assets/assets/images/menu/banner-2.jpg" alt="Menu Banner"
                                                         width="235" height="347" />
                                                </figure>
                                                <div class="banner-content">
                                                    <div class="banner-price-info mb-1 ls-normal">دریافت کنید
                                                        <strong
                                                                class="text-primary text-uppercase">20 % تخفیف</strong>
                                                    </div>
                                                    <h3 class="banner-title ls-normal">فروش داغ </h3>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="shop-fullwidth-banner.html">
                                        <i class="w-icon-home"></i>خانه و باغ
                                    </a>
                                    <ul class="megamenu">
                                        <li>
                                            <h4 class="menu-title">بدروم </h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="shop-fullwidth-banner.html">تخت، قاب و پایه</a></li>
                                                <li><a href="shop-fullwidth-banner.html">کمد </a></li>
                                                <li><a href="shop-fullwidth-banner.html"> میزهای خواب </a>
                                                </li>
                                                <li><a href="shop-fullwidth-banner.html">تخت کودک</a></li>
                                                <li><a href="shop-fullwidth-banner.html">اسلحه </a></li>
                                            </ul>

                                            <h4 class="menu-title mt-1">هال </h4>
                                            <hr class="divider">
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
                                            <h4 class="menu-title">دفتر </h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="shop-fullwidth-banner.html">صندلی های اداری </a>
                                                </li>
                                                <li><a href="shop-fullwidth-banner.html">میز </a></li>
                                                <li><a href="shop-fullwidth-banner.html">قفسه های کتاب </a></li>
                                                <li><a href="shop-fullwidth-banner.html">قفسه پوشه ها </a>
                                                </li>
                                                <li><a href="shop-fullwidth-banner.html">اتاق استراحت جداول </a></li>
                                            </ul>

                                            <h4 class="menu-title mt-1">آشپزخانه و غذاخوری</h4>
                                            <hr class="divider">
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
                                        <li>
                                            <div class="menu-banner banner-fixed menu-banner3">
                                                <figure>
                                                    <img src="website_assets/assets/images/menu/banner-3.jpg" alt="Menu Banner"
                                                         width="235" height="461" />
                                                </figure>
                                                <div class="banner-content">
                                                    <h4
                                                            class="banner-subtitle font-weight-normal text-white mb-1">
                                                        سرویس بهداشتی </h4>
                                                    <h3
                                                            class="banner-title font-weight-bolder text-white ls-normal">
                                                        فروش مبلمان </h3>
                                                    <div
                                                            class="banner-price-info text-white font-weight-normal ls-25">
                                                        تا <span
                                                                class="text-secondary text-uppercase font-weight-bold">25% تخفیف</span></div>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="shop-fullwidth-banner.html">
                                        <i class="w-icon-electronics"></i>الکترونیک
                                    </a>
                                    <ul class="megamenu">
                                        <li>
                                            <h4 class="menu-title">لپ تاپ و کامپیوتر</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="shop-fullwidth-banner.html">کامپیوترهای رومیزی</a></li>
                                                <li><a href="shop-fullwidth-banner.html">مانیتور </a></li>
                                                <li><a href="shop-fullwidth-banner.html">لپ تاپ </a></li>
                                                <li><a href="shop-fullwidth-banner.html">هارد دیسک و فضای ذخیره سازی</a></li>
                                                <li><a href="shop-fullwidth-banner.html">کامپیوتر تجهیزات جانبی </a></li>
                                            </ul>

                                            <h4 class="menu-title mt-1">تلویزیون و ویدئو</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="shop-fullwidth-banner.html">تلویزیون ها </a></li>
                                                <li><a href="shop-fullwidth-banner.html">بلندگوهای صوتی خانگی</a></li>
                                                <li><a href="shop-fullwidth-banner.html">پروژکتورها </a></li>
                                                <li><a href="shop-fullwidth-banner.html">دستگاه های پخش رسانه</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h4 class="menu-title">دوربین های دیجیتال </h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="shop-fullwidth-banner.html">دوربین های دیجیتال SLR</a></li>
                                                <li><a href="shop-fullwidth-banner.html">دوربین های ورزشی و اکشن</a></li>
                                                <li><a href="shop-fullwidth-banner.html">لنزهای دوربین  </a>
                                                </li>
                                                <li><a href="shop-fullwidth-banner.html">چاپگر عکس </a>
                                                </li>
                                                <li><a href="shop-fullwidth-banner.html">کارت های حافظه دیجیتال</a></li>
                                            </ul>

                                            <h4 class="menu-title mt-1">تلفن های همراه </h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="shop-fullwidth-banner.html">تلفن های حامل </a>
                                                </li>
                                                <li><a href="shop-fullwidth-banner.html">گوشی های قفل نشده </a>
                                                </li>
                                                <li><a href="shop-fullwidth-banner.html">قاب های گوشی و موبایل</a></li>
                                                <li><a href="shop-fullwidth-banner.html">شارژر تلفن همراه</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="menu-banner banner-fixed menu-banner4">
                                                <figure>
                                                    <img src="website_assets/assets/images/menu/banner-4.jpg" alt="Menu Banner"
                                                         width="235" height="433" />
                                                </figure>
                                                <div class="banner-content">
                                                    <h4 class="banner-subtitle font-weight-normal">معاملات هفته</h4>
                                                    <h3 class="banner-title text-white">صرفه جویی در گوشی هوشمند
                                                    </h3>
                                                    <div
                                                            class="banner-price-info text-secondary font-weight-bolder text-uppercase text-secondary">
                                                        20% تخفیف</div>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="shop-fullwidth-banner.html">
                                        <i class="w-icon-furniture"></i> مبلمان
                                    </a>
                                    <ul class="megamenu type2">
                                        <li class="row">
                                            <div class="col-md-3 col-lg-3 col-6">
                                                <h4 class="menu-title">مبلمان </h4>
                                                <hr class="divider" />
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
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-6">
                                                <h4 class="menu-title">نورپردازی </h4>
                                                <hr class="divider" />
                                                <ul>
                                                    <li><a href="shop-fullwidth-banner.html">لامپ </a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">لامپ ها </a></li>
                                                    <li><a href="shop-fullwidth-banner.html">چراغ های سقفی </a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">چراغ های دیواری </a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">روشنایی حمام</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-6">
                                                <h4 class="menu-title">لوازم جانبی خانه </h4>
                                                <hr class="divider" />
                                                <ul>
                                                    <li><a href="shop-fullwidth-banner.html">تجهیزات جانبی تزئینی </a></li>
                                                    <li><a href="shop-fullwidth-banner.html">شمع و نگهدارنده</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">عطر خانگی </a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">آینه </a></li>
                                                    <li><a href="shop-fullwidth-banner.html">ساعت ها </a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-6">
                                                <h4 class="menu-title">باغ و فضای باز</h4>
                                                <hr class="divider" />
                                                <ul>
                                                    <li><a href="shop-fullwidth-banner.html">تجهیزات باغی</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">ماشین های چمن زنی </a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-banner.html">واشرهای تحت فشار</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">تمام ابزار باغبانی</a></li>
                                                    <li><a href="shop-fullwidth-banner.html">غذاخوری در فضای باز</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-6">
                                                <div class="banner banner-fixed menu-banner5 br-xs">
                                                    <figure>
                                                        <img src="website_assets/assets/images/menu/banner-5.jpg" alt="Banner"
                                                             width="410" height="123"
                                                             style="background-color: #D2D2D2;" />
                                                    </figure>
                                                    <div class="banner-content text-right y-50">
                                                        <h4
                                                                class="banner-subtitle font-weight-normal text-default text-capitalize">
                                                            تازه رسیده ها </h4>
                                                        <h3
                                                                class="banner-title font-weight-bolder text-capitalize ls-normal">
                                                            مبل شگفت انگیز </h3>
                                                        <div
                                                                class="banner-price-info font-weight-normal ls-normal">
                                                            شروع از  <strong>125000 تومان</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="banner banner-fixed menu-banner5 br-xs">
                                                    <figure>
                                                        <img src="website_assets/assets/images/menu/banner-6.jpg" alt="Banner"
                                                             width="410" height="123"
                                                             style="background-color: #9F9888;" />
                                                    </figure>
                                                    <div class="banner-content y-50">
                                                        <h4
                                                                class="banner-subtitle font-weight-normal text-white text-capitalize">
                                                            پرفروش </h4>
                                                        <h3
                                                                class="banner-title font-weight-bolder text-capitalize text-white ls-normal">
                                                            صندلی و لامپ</h3>
                                                        <div
                                                                class="banner-price-info font-weight-normal ls-normal text-white">
                                                            از جانب <strong>165000 تومان</strong></div>
                                                    </div>
                                                </div>
                                            </div>
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
                    <form method="get" action="#"
                          class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper mr-4 ml-4">
                        <div class="select-box">
                            <select id="category" name="category">
                                <option value="">دسته بندیها </option>
                                <option value="4">مدل </option>
                                <option value="5">مبلمان </option>
                                <option value="6">کفش </option>
                                <option value="7">ورزشی </option>
                                <option value="8">بازی </option>
                                <option value="9">کامپیوتر </option>
                                <option value="10">الکترونیکی </option>
                                <option value="11">آشپرخانه </option>
                                <option value="12">لباس </option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="search" id="search"
                               placeholder="جستجو کنید ..." required />
                        <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                        </button>
                    </form>
                </div>
                <div class="header-right pr-0 ml-4">
                    <a href="#" class="d-xl-show mr-6"><i class="w-icon-map-marker mr-1"></i>پیگیری سفارش </a>
                </div>
            </div>
        </div>
    </div>
</header>
