<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

<?php $__currentLoopData = $staticsx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staticsy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e($staticsy['loc']); ?></loc>
            <lastmod><?php echo e(date('Y-m-d H:i:s')); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/')); ?>/details/<?php echo e($product->id); ?>/<?php echo e($product->slug); ?></loc>
            <lastmod><?php echo e($product->created_at->tz('UTC')->toAtomString()); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/')); ?>/products/<?php echo e($category->id); ?>/<?php echo e($category->friendly_url); ?></loc>
            <lastmod><?php echo e($category->created_at->tz('UTC')->toAtomString()); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/')); ?>/brands/<?php echo e($brand->slug); ?></loc>
            <lastmod><?php echo e($brand->created_at->tz('UTC')->toAtomString()); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</sitemapindex><?php /**PATH /home/kashkha/private/resources/views/website/sitemap/index.blade.php ENDPATH**/ ?>