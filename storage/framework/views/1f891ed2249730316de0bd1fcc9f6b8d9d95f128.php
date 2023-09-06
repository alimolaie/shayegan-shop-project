<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.website.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="main login-page ml-auto mr-auto">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">حساب کاربری</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">کد تایید را وارد کنید</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                <div class="form-group">
                                    <label>کد تایید برای شماره <?php echo e($data['mobile']); ?> پیامک شد *</label>
                                    <input type="text" class="form-control" name="username" id="username" required>
                                </div>
                                <br>
                                <div id="thingy"></div>
                                <p id="p"> <span id="time">02:00</span> مانده تا دریافت مجدد کد</p>

                                <a href="#" class="btn btn-primary">تایید </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php echo $__env->make('front.website.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\shayegan_project\shop\resources\views/front/website/confirm_code_otp.blade.php ENDPATH**/ ?>