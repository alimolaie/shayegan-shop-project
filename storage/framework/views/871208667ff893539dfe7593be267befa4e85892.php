<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود مدیران</title>
    <link type="text/css" href="<?php echo e(asset('admin-login/css/font-awesome.min.css')); ?>" rel="stylesheet" />
    <link type="text/css" href="<?php echo e(asset('admin-login/css/style.css')); ?>" rel="stylesheet" />
</head>
<body>
<div class="bg-contact2" style="background-image: url('admin-login/pics/bg-01.jpg');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <form class="contact2-form" method="post" action="<?php echo e(url('gwc/login')); ?>">
                <?php echo csrf_field(); ?>
						<span class="contact2-form-title">
							ورود مدیران
						</span>

                <div class="wrap-input2">
                    <input class="input2" type="text" name="login_username">
                    <span class="focus-input2" data-placeholder="نام کاربری"></span>
                </div>
                <div class="wrap-input2">
                    <input class="input2" type="password" name="login_password">
                    <span class="focus-input2" data-placeholder="رمز عبور"></span>
                </div>
                <div class="col">
                    <label class="kt-checkbox">
                        <input  type="checkbox" name="remember_me" id="remember_me" value="1"> مرا به خاطر بسپار
                        <span></span>
                    </label>
                    <br>
                    <a style="color:#000000;" href="http://127.0.0.1:8000/gwc/forgot" class="pull-right">رمز عبور را فراموش کرده اید؟</a>
                </div>
<br>
<br>

                <div class="container-contact2-form-btn">
                    <div class="wrap-contact2-form-btn">
                        <div class="contact2-form-bgbtn"></div>
                        <button class="contact2-form-btn">
                            ورود
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('admin-login/js/jquery-3.1.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin-login/js/scripts.js')); ?>"></script>
</body>
</html>
<?php /**PATH E:\shayegan_project\shop\resources\views/admin.blade.php ENDPATH**/ ?>