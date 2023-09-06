<?php
    $setting=\App\Settings::find(1);

 ?>
<footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">

    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="<?php echo e(url('/')); ?>" class="logo-footer">
                            <img src="<?php echo e(asset('uploads/logo/'.$setting->logo)); ?>" alt="logo-footer" width="144"
                                 height="45" />
                        </a>
                        <div class="widget-body">
                            <p class="widget-about-title">سوالی دارید؟ تماس بگیرید</p>
                            <a href="tel:<?php echo e($setting->phone); ?>" class="widget-about-call"><?php echo e($setting->phone); ?></a>
                            <p class="widget-about-desc">برای دریافت بروز رسانی با ما هماهنگ شوید.
                            </p>

                            <div class="social-icons social-icons-colored">
                                <a href="<?php echo e($setting->	social_instagram); ?>" class="social-icon social-instagram w-icon-instagram"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">لینک های سریع</h3>
                        <ul class="widget-body">
                            <li><a href="about-us.html">درباره ما </a></li>
                            <li><a href="#">اعضای تیم </a></li>
                            <li><a href="#">شغل </a></li>
                            <li><a href="contact-us.html">تماس با ما </a></li>
                            <li><a href="#">وابسته </a></li>
                            <li><a href="#">تاریخچه سفارش ها </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">حساب کاربری </h4>
                        <ul class="widget-body">
                            <li><a href="#">پیگیر سفارشات من </a></li>
                            <li><a href="cart.html">سبد خرید </a></li>
                            <li><a href="login.html">ورود </a></li>
                            <li><a href="#">راهنما </a></li>
                            <li><a href="wishlist.html">علاقه مندیهای من  </a></li>
                            <li><a href="#">سیاست حفظ حریم خصوصی </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">خدمات مشتری </h4>
                        <ul class="widget-body">
                            <li><a href="#">روش های پرداخت </a></li>
                            <li><a href="#">تضمین بازگشت پول! </a></li>
                            <li><a href="#">محصول بازگشتی </a></li>
                            <li><a href="#">مرکز پشتیبانی </a></li>
                            <li><a href="#">حمل دریایی </a></li>
                            <li><a href="#">مدت و شرایط</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="widget widget-category">
                <div class="category-box">
                    <h6 class="category-name">مصرف کننده برق:</h6>
                    <a href="#">تلویزیون</a>
                    <a href="#">وضعیت هوا </a>
                    <a href="#">یخچال </a>
                    <a href="#">ماشین لباسشویی </a>
                    <a href="#">بلندگوی صوتی </a>
                    <a href="#">دوربین امنیتی </a>
                    <a href="#">نمایش همه </a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">پوشاک و لباس:</h6>
                    <a href="#">تیشرت مردانه</a>
                    <a href="#">لباس </a>
                    <a href="#">کفش ورزشی مردانه </a>
                    <a href="#">کوله پشتی چرمی </a>
                    <a href="#">ساعت </a>
                    <a href="#">شلوار جین </a>
                    <a href="#">عینک آفتابی </a>
                    <a href="#">چکمه </a>
                    <a href="#">ریبان </a>
                    <a href="#">تجهیزات جانبی </a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">خانه، باغ و آشپزخانه:</h6>
                    <a href="#">کاناپه </a>
                    <a href="#">صندلی </a>
                    <a href="#">اتاق خواب </a>
                    <a href="#">هال </a>
                    <a href="#">وسایل آشپزی </a>
                    <a href="#">وسایل آشپزی </a>
                    <a href="#">مخلوط کن </a>
                    <a href="#"> تجهیزات باغبانی </a>
                    <a href="#">دکور </a>
                    <a href="#">کتابخانه </a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">سلامت و زیبایی:</h6>
                    <a href="#">مراقبت از پوست </a>
                    <a href="#">دوش بدن </a>
                    <a href="#">آرایش </a>
                    <a href="#">مراقبت از مو </a>
                    <a href="#">رژ لب </a>
                    <a href="#">عطر </a>
                    <a href="#">نمایش همه </a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">جواهرات و ساعت:</h6>
                    <a href="#">گردن بند </a>
                    <a href="#">آویز </a>
                    <a href="#">حلقه الماس </a>
                    <a href="#">گوشواره نقره </a>
                    <a href="#">ناظر چرم </a>
                    <a href="#">رولکس </a>
                    <a href="#">گوچی </a>
                    <a href="#">عقیق استرالیایی </a>
                    <a href="#">آمولیت </a>
                    <a href="#">خورشید پیریت </a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">کامپیوتر و فناوری:</h6>
                    <a href="#">لپ تاپ </a>
                    <a href="#">ایمک </a>
                    <a href="#">گوشی هوشمند </a>
                    <a href="#">تبلت </a>
                    <a href="#">اپل </a>
                    <a href="#">ایسوس </a>
                    <a href="#">درون </a>
                    <a href="#">اسپیکر بی سیم </a>
                    <a href="#">کنترل کننده بازی </a>
                    <a href="#">نمایش همه </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright"><?php echo e($setting->copyrights_ar); ?></p>
            </div>
        </div>
    </div>
</footer><?php /**PATH E:\shayegan_project\shop\resources\views/front/website/partials/footer.blade.php ENDPATH**/ ?>