<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>
        test
    </title>

</head>
<body>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card text-black">
                    <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                    <img
                            src="<?php echo e(asset('uploads/product/'.$row->image)); ?>"
                            class="card-img-top"
                            alt="Apple Computer"
                    />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title"><?php echo e($row->title_en); ?></h5>
                            <p class="text-muted mb-4"><?php echo $row->details_en; ?></p>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between">
                                <span>Price</span><span><?php echo e($row->retail_price); ?></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Converted</span><span>
                                    <?php $__currentLoopData = $getCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($currency['currency_code']); ?>

                                        <?php
                                        echo  round($row['retail_price']/$currency['exchange_rate'],2);
                                        ?><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span>
                            </div>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\tikbazar\resources\views/website/test-show/product.blade.php ENDPATH**/ ?>