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
                                <a href="<?php echo e(url('users/login')); ?>" class="nav-link active">ورود / ثبت نام</a>
                            </li>
                        </ul>
                        <form action="<?php echo e(url('confirm-code')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="tab-content">
                                <div class="tab-pane active" id="sign-in">
                                    <div class="form-group">
                                        <label>لطفا شماره موبایل خود را وارد کنید *</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">ورود </button>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php echo $__env->make('front.website.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\shayegan_project\shop\resources\views/front/website/login.blade.php ENDPATH**/ ?>