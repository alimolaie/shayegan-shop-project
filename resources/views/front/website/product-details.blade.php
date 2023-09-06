@extends('front.master')
@section('content')
    @include('front.website.partials.header')
    <main class="main mb-10 pb-1">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav container">
            <ul class="breadcrumb bb-no">
                <li><a href="{{url('/')}}">خانه </a></li>
                <li>محصول </li>
            </ul>
            <ul class="product-nav list-style-none">
                <li class="product-nav-prev">
                    <a href="#">
                        <i class="w-icon-angle-right"></i>
                    </a>
                    <span class="product-nav-popup">
                            <img src="{{asset('website_assets/assets/images/products/product-nav-next.jpg')}}" alt="Product" width="110"
                                 height="110" />
                            <span class="product-name">نرم صدا ساز</span>
                        </span>
                </li>
                <li class="product-nav-next">                         <a href="#">                            <i class="w-icon-angle-left"></i>
                    </a>
                    <span class="product-nav-popup">
                            <img src="{{asset('website_assets/assets/images/products/product-nav-next.jpg')}}" alt="Product" width="110"
                                 height="110" />
                            <span class="product-name">بلندگوی صدای فوق العاده</span>
                        </span>
                </li>
            </ul>
        </nav>
        <!-- End of Breadcrumb -->
<?php

$gallarys=\Illuminate\Support\Facades\DB::table('gwc_products_gallery')->where('product_id',$product->id)->get();
?>
        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky">
                                    <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                        <div class="swiper-wrapper row cols-1 gutter-no">
                                            @if(\Illuminate\Support\Facades\DB::table('gwc_products_gallery')->where('product_id',$product->id)->exists())
                                            @foreach($gallarys as $gallary)
                                            <div class="swiper-slide">
                                                <figure class="product-image">
                                                    <img src="{{asset('uploads/product/thumb/'.$gallary->image)}}"
                                                         data-zoom-image="{{asset('uploads/product/thumb/'.$gallary->image)}}"
                                                         alt="ساعت مچی مشکی الکترونیکی" width="800" height="900">
                                                </figure>
                                            </div>
                                                @endforeach
                                            @else
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="{{asset('uploads/product/original/'.$product->image)}}"
                                                             data-zoom-image="{{asset('uploads/product/original/'.$product->image)}}"
                                                             alt="ساعت مچی مشکی الکترونیکی" width="800" height="900">
                                                    </figure>
                                                </div>
                                       @endif

                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                        <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                    </div>
                                    <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                            @if(\Illuminate\Support\Facades\DB::table('gwc_products_gallery')->where('product_id',$product->id)->exists())
                                                @foreach($gallarys as $gallary)
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{asset('uploads/product/thumb/'.$gallary->image)}}"
                                                         alt="Product Thumb" width="800" height="900">
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="product-thumb swiper-slide">
                                                    <img src="{{asset('uploads/product/original/'.$product->image)}}"
                                                         alt="Product Thumb" width="800" height="900">
                                                </div>
                                            @endif



                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h1 class="product-title">{{$product->title_ar}}</h1>
                                    <div class="product-bm-wrapper">
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                دسته بندی:
{{--                                                <span class="product-category"><a href="#">{{$product[0]->productcat->name_ar}} </a></span>--}}
                                                <span class="product-category"><a href="#">موبایل</a></span>
                                            </div>
                                            <div class="product-sku">
                                                کد:  <span>{{$product->sku_no}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-price"><ins class="new-price">{{number_format($product->retail_price)}} تومان </ins></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3
                                            نظر )</a>
                                    </div>

                                    <div class="product-short-desc">
                                        <ul class="list-type-check list-style-none">

                                            {{$product->sdetails_ar}}
                                        </ul>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-form product-variation-form product-color-swatch">
                                        <label>رنگ :</label>
                                        <div class="d-flex align-items-center product-variations">
{{--                                            @foreach($productColor->productColor as $color)--}}
{{--                                                <a href="#" class="color" style="background-color: {{$color->color_code}}"></a>--}}

{{--                                            @endforeach--}}
                                            <a href="#" class="color" style="background-color: #0923e6"></a>
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

                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <div class="product-qty-form">
                                                <div class="input-group">
                                                    <input class="quantity form-control" type="number" min="1"
                                                           max="10000000">
                                                    <button class="quantity-plus w-icon-plus"></button>
                                                    <button class="quantity-minus w-icon-minus"></button>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-cart">
                                                <i class="w-icon-cart"></i>
                                                <span>افزودن به سبد  </span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="social-links-wrapper">
                                        <div class="social-links">
                                            <div class="social-icons social-no-color border-thin">
                                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                <a href="#"
                                                   class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                <a href="#"
                                                   class="social-icon social-youtube fab fa-linkedin-in"></a>
                                            </div>
                                        </div>
                                        <span class="divider d-xs-show"></span>
                                        <div class="product-link-wrapper d-flex">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                            <a href="#"
                                               class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#product-tab-description" class="nav-link active">توضیحات</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-specification" class="nav-link">مشخصات </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#product-tab-reviews" class="nav-link">نظرات مشتریان (3)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-tab-description">
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-5">
                                            <h4 class="title tab-pane-title font-weight-bold mb-2">جزئیات </h4>
                                        {!! $product->details_ar !!}
                                        </div>
                                    </div>
                                    <div class="row cols-md-3">
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>ارسال رایگان و برگشت</h5>
                                            <p class="detail pl-5">ما برای سفارش های بالای 200 هزار تومان ارسال رایگان برای محصولات ارائه می دهیم و برای همه سفارش ها در ایالات متحده تحویل رایگان ارائه می دهیم.</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span>2.</span>بازگشت رایگان و آسان</h5>
                                            <p class="detail pl-5">ما محصولات خود را تضمین می کنیم و شما می توانید در 30 روز هر زمان که بخواهید تمام پول خود را پس بگیرید.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-tab-specification">
                                    <ul class="list-none">
                                        <li>
                                            <label>مودال </label>
                                            <p>سایت اسمان 320</p>
                                        </li>
                                        <li>
                                            <label>رنگ </label>
                                            <p>سیاه </p>
                                        </li>
                                        <li>
                                            <label>سایز</label>
                                            <p>کوچک - بزرگ</p>
                                        </li>
                                        <li>
                                            <label>زمان گارانتی</label>
                                            <p>3 ماه </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="product-tab-vendor">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-4">
                                            <figure class="vendor-banner br-sm">
                                                <img src="{{asset('website_assets/assets/images/products/vendor-banner.jpg')}}"
                                                     alt="Vendor Banner" width="610" height="295"
                                                     style="background-color: #353B55;" />
                                            </figure>
                                        </div>
                                        <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                            <div class="vendor-user">
                                                <figure class="vendor-logo mr-4">
                                                    <a href="#">
                                                        <img src="{{asset('website_assets/assets/images/products/vendor-logo.jpg')}}"
                                                             alt="Vendor Logo" width="80" height="80" />
                                                    </a>
                                                </figure>
                                                <div>
                                                    <div class="vendor-name"><a href="#">جان دئو</a></div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 90%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="#" class="rating-reviews">(32 نظر )</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="vendor-info list-style-none">
                                                <li class="store-name">
                                                    <label>نام فروشگاه:</label>
                                                    <span class="detail">فروشگاه OAIO</span>
                                                </li>
                                                <li class="store-address">
                                                    <label>آدرس: </label>
                                                    <span class="detail">ایران، ارومیه ، شاهین دژ / پلاک 11 منزل خیار</span>
                                                </li>
                                                <li class="store-phone">
                                                    <label>تلفن: </label>
                                                    <a href="#tel:">1234567890</a>
                                                </li>
                                            </ul>
                                            <a href="vendor-dokan-store.html"
                                               class="btn btn-dark btn-link btn-underline btn-icon-right">نمایش فروشگاه<i class="w-icon-long-arrow-left"></i></a>
                                        </div>
                                    </div>
                                    <p class="mb-5"><strong class="text-dark"> ل </strong>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..
                                    </p>
                                    <p class="mb-2"><strong class="text-dark"> ل </strong> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</p>
                                </div>
                                <div class="tab-pane" id="product-tab-reviews">
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-lg-5 mb-4">
                                            <div class="ratings-wrapper">
                                                <div class="avg-rating-container">
                                                    <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                                    <div class="avg-rating">
                                                        <p class="text-dark mb-1">میانگین امتیاز </p>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#" class="rating-reviews">(3 نظر )</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                        class="ratings-value d-flex align-items-center text-dark ls-25">
                                                        <span
                                                                class="text-dark font-weight-bold">66.7%</span>توصیه شده <span
                                                            class="count">(2 از 3)</span>
                                                </div>
                                                <div class="ratings-list">
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>70%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>30%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>40%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 40%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>0%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 20%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>0%</mark>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 mb-4">
                                            <div class="review-form-wrapper">
                                                <h3 class="title tab-pane-title font-weight-bold mb-1">نظر خود را ارسال کنید</h3>
                                                <p class="mb-3">آدرس ایمیل شما منتشر نخواهد شد. فیلدهای الزامی مشخص شده اند *</p>
                                                <form action="#" method="POST" class="review-form">
                                                    <div class="rating-form">
                                                        <label for="rating">امتیاز شما به این محصول :</label>
                                                        <span class="rating-stars">
                                                                <a class="star-1" href="#">1</a>
                                                                <a class="star-2" href="#">2</a>
                                                                <a class="star-3" href="#">3</a>
                                                                <a class="star-4" href="#">4</a>
                                                                <a class="star-5" href="#">5</a>
                                                            </span>
                                                        <select name="rating" id="rating" required=""
                                                                style="display: none;">
                                                            <option value="">امتیاز </option>
                                                            <option value="5">عالی </option>
                                                            <option value="4">خوب </option>
                                                            <option value="3">میانگین </option>
                                                            <option value="2">بد نیست</option>
                                                            <option value="1">خیلی بد</option>
                                                        </select>
                                                    </div>
                                                    <textarea cols="30" rows="6"
                                                              placeholder="نظر خود را اینجا بنویسید..." class="form-control"
                                                              id="review"></textarea>
                                                    <div class="row gutter-md">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                   placeholder="نام شما" id="author">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                   placeholder="ایمیل شما" id="email_1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="checkbox" class="custom-checkbox"
                                                               id="save-checkbox">
                                                        <label for="save-checkbox">برای دفعه بعد که نظر می دهم نام، ایمیل و وب سایت من را در این مرورگر ذخیره کنید.</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-dark">ارسال نظر</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a href="#show-all" class="nav-link active">نمایش همه </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#helpful-positive" class="nav-link">مفیدترین نکته مثبت</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#helpful-negative" class="nav-link">مفیدترین منفی</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#highest-rating" class="nav-link">بالاترین امتیاز</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#lowest-rating" class="nav-link">کمترین رتبه</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="show-all">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{asset('website_assets/assets/images/agents/1-100x100.png')}}"
                                                                     alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">جان دوو</a>
                                                                    <span class="comment-date">اردیبهشت 1401</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                  style="width: 60%;"></span>
                                                                        <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                       class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>مفید  (1)
                                                                    </a>
                                                                    <a href="#"
                                                                       class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>ضرر
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{asset('website_assets/assets/images/products/default/review-img-1.jpg')}}"
                                                                                     width="60" height="60"
                                                                                     alt="تصویر ضمیمه نقد جان دو در ساعت مچی مشکی الکترونیکی"
                                                                                     data-zoom-image="{{asset('website_assets/assets/images/products/default/review-img-1-800x900.jpg')}}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{asset('website_assets/assets/images/agents/2-100x100.png')}}"
                                                                     alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">جان دوو</a>
                                                                    <span class="comment-date">اردیبهشت 1401</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                  style="width: 80%;"></span>
                                                                        <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                       class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>مفید  (1)
                                                                    </a>
                                                                    <a href="#"
                                                                       class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>ضرر
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{asset('website_assets/assets/images/products/default/review-img-2.jpg')}}"
                                                                                     width="60" height="60"
                                                                                     alt="تصویر ضمیمه نقد جان دو در ساعت مچی مشکی الکترونیکی"
                                                                                     data-zoom-image="{{asset('website_assets/assets/images/products/default/review-img-2.jpg')}}" />
                                                                            </figure>
                                                                        </a>
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{asset('website_assets/assets/images/products/default/review-img-3.jpg')}}"
                                                                                     width="60" height="60"
                                                                                     alt="تصویر ضمیمه نقد جان دو در ساعت مچی مشکی الکترونیکی"
                                                                                     data-zoom-image="{{asset('website_assets/assets/images/products/default/review-img-3.jpg')}}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{asset('website_assets/assets/images/agents/3-100x100.png')}}"
                                                                     alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">جان دوو</a>
                                                                    <span class="comment-date">اردیبهشت 1401</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                  style="width: 60%;"></span>
                                                                        <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                       class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>مفید  (0)
                                                                    </a>
                                                                    <a href="#"
                                                                       class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>ضرر
                                                                        (1)
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="helpful-positive">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{asset('website_assets/assets/images/agents/1-100x100.png')}}"
                                                                     alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">جان دوو</a>
                                                                    <span class="comment-date">اردیبهشت 1401</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                  style="width: 60%;"></span>
                                                                        <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                       class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>مفید  (1)
                                                                    </a>
                                                                    <a href="#"
                                                                       class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>ضرر
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{asset('website_assets/assets/images/products/default/review-img-1.jpg')}}"
                                                                                     width="60" height="60"
                                                                                     alt="تصویر ضمیمه نقد جان دو در ساعت مچی مشکی الکترونیکی"
                                                                                     data-zoom-image="{{asset('website_assets/assets/images/products/default/review-img-1.jpg')}}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{asset('website_assets/assets/images/agents/2-100x100.png')}}"
                                                                     alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">جان دوو</a>
                                                                    <span class="comment-date">اردیبهشت 1401</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                  style="width: 80%;"></span>
                                                                        <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                       class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>مفید  (1)
                                                                    </a>
                                                                    <a href="#"
                                                                       class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>ضرر
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{asset('website_assets/assets/images/products/default/review-img-2.jpg')}}"
                                                                                     width="60" height="60"
                                                                                     alt="تصویر ضمیمه نقد جان دو در ساعت مچی مشکی الکترونیکی"
                                                                                     data-zoom-image="website_assets/assets/images/products/default/review-img-2-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{asset('website_assets/assets/images/products/default/review-img-3.jpg')}}"
                                                                                     width="60" height="60"
                                                                                     alt="تصویر ضمیمه نقد جان دو در ساعت مچی مشکی الکترونیکی"
                                                                                     data-zoom-image="website_assets/assets/images/products/default/review-img-3-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="helpful-negative">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{asset('website_assets/assets/images/agents/3-100x100.png')}}"
                                                                     alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">جان دوو</a>
                                                                    <span class="comment-date">اردیبهشت 1401</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                  style="width: 60%;"></span>
                                                                        <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                       class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>مفید  (0)
                                                                    </a>
                                                                    <a href="#"
                                                                       class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>ضرر
                                                                        (1)
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="highest-rating">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{asset('website_assets/assets/images/agents/2-100x100.png')}}"
                                                                     alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">جان دوو</a>
                                                                    <span class="comment-date">اردیبهشت 1401</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                  style="width: 80%;"></span>
                                                                        <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                       class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>مفید  (1)
                                                                    </a>
                                                                    <a href="#"
                                                                       class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>ضرر
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{asset('website_assets/assets/images/products/default/review-img-2.jpg')}}"
                                                                                     width="60" height="60"
                                                                                     alt="تصویر ضمیمه نقد جان دو در ساعت مچی مشکی الکترونیکی"
                                                                                     data-zoom-image="website_assets/assets/images/products/default/review-img-2-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{asset('website_assets/assets/images/products/default/review-img-3.jpg')}}"
                                                                                     width="60" height="60"
                                                                                     alt="تصویر ضمیمه نقد جان دو در ساعت مچی مشکی الکترونیکی"
                                                                                     data-zoom-image="website_assets/assets/images/products/default/review-img-3-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="lowest-rating">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{asset('website_assets/assets/images/agents/1-100x100.png')}}"
                                                                     alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">جان دوو</a>
                                                                    <span class="comment-date">اردیبهشت 1401</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                  style="width: 60%;"></span>
                                                                        <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد..</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                       class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>مفید  (1)
                                                                    </a>
                                                                    <a href="#"
                                                                       class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>ضرر
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{asset('website_assets/assets/images/products/default/review-img-3.jpg')}}"
                                                                                     width="60" height="60"
                                                                                     alt="تصویر ضمیمه نقد جان دو در ساعت مچی مشکی الکترونیکی"
                                                                                     data-zoom-image="website_assets/assets/images/products/default/review-img-3-800x900.jpg" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="related-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title">محصولات اخیر </h4>
                                <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">محصولات بیشتر<i class="w-icon-long-arrow-left"></i></a>
                            </div>
                            <div class="swiper-container swiper-theme" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 2,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 3
                                        },
                                        '768': {
                                            'slidesPerView': 4
                                        },
                                        '992': {
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                                <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                    @foreach($lastProduct as $last)
                                        <div class="swiper-slide product">
                                            <figure class="product-media">
                                                <a href="{{url('product/'.$last->id)}}">
                                                    <img src="{{asset('uploads/product/original/'.$last->image)}}" alt="Product"
                                                         width="300" height="338" />
                                                </a>
                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                       title="افزودن به سبد "></a>
                                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                       title="افزودن به علاقه مندیها"></a>
                                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                       title="افزودن برای مقایسه"></a>
                                                </div>
                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-quickview" title="نمایش سریع">نمایش سریع</a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name"><a href="{{url('product/'.$last->id)}}">{{$last->title_ar}} </a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="{{url('product/'.$last->id)}}" class="rating-reviews">(3 نظر )</a>
                                                </div>
                                                <div class="product-pa-wrapper">
                                                    <div class="product-price">
                                                        <ins class="new-price">{{number_format($last->retail_price)}} تومان</ins>
                                                        @if($last->old_price!=null)
                                                            <del class="old-price">{{number_format($last->old_price)}} تومان</del>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-icon-box mb-6">
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">ارسال رایگان و مرجوعی</h4>
                                            <p>برای تمام سفارشات بیش از 100 هزار تومان</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">پرداخت امن</h4>
                                            <p>ما تضمین می کنیم</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">تضمین بازگشت پول</h4>
                                            <p>پس از 30 روز بازگشت</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Icon Box -->

                                <!-- End of Widget Banner -->

                                <div class="widget widget-products">
                                    <div class="title-link-wrapper mb-2">
                                        <h4 class="title title-link font-weight-bold">محصولات بیشتر </h4>
                                    </div>

                                    <div class="swiper nav-top">
                                        <div class="swiper-container swiper-theme nav-top" data-swiper-options = "{
                                                'slidesPerView': 1,
                                                'spaceBetween': 20,
                                                'navigation': {
                                                    'prevEl': '.swiper-button-prev',
                                                    'nextEl': '.swiper-button-next'
                                                }
                                            }">
                                            <div class="swiper-wrapper">
                                                <div class="widget-col swiper-slide">
                                                    @foreach($radonProduct1 as $random1)
                                                        <div class="product product-widget">
                                                            <figure class="product-media">
                                                                <a href="{{url('product/'.$random1->id)}}">
                                                                    <img src="{{asset('uploads/product/original/'.$random1->image)}}" alt="Product"
                                                                         width="100" height="113" />
                                                                </a>
                                                            </figure>
                                                            <div class="product-details">
                                                                <h4 class="product-name">
                                                                    <a href="#">{{$random1->title_ar}} </a>
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 100%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    <ins class="new-price">{{number_format($random1->retail_price)}} تومان</ins>
                                                                    @if($random1->old_price!=null)
                                                                        <del class="old-price">{{number_format($random1->old_price)}} تومان</del>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                </div>
                                                <div class="widget-col swiper-slide">
                                                    @foreach($radonProduct2 as $random2)
                                                        <div class="product product-widget">
                                                            <figure class="product-media">
                                                                <a href="{{url('product/'.$random2->id)}}">
                                                                    <img src="{{asset('uploads/product/original/'.$random2->image)}}" alt="Product"
                                                                         width="100" height="113" />
                                                                </a>
                                                            </figure>
                                                            <div class="product-details">
                                                                <h4 class="product-name">
                                                                    <a href="#">{{$random2->title_ar}} </a>
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 100%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    <ins class="new-price">{{number_format($random2->retail_price)}} تومان</ins>
                                                                    @if($random2->old_price!=null)
                                                                        <del class="old-price">{{number_format($random2->old_price)}} تومان</del>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    @include('front.website.partials.footer')
@endsection