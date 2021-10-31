<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <?php echo $__env->make('template/meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('template/seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <title>Tiberias Boston Management - <?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->yieldContent('css_before'); ?>

    <?php echo $__env->make('template/link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('css_after'); ?>

    <?php echo $__env->yieldContent('js_before'); ?>

    <?php echo $__env->make('template/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>
    <?php echo $__env->make('template/loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->yieldContent('js_after'); ?>

    <?php echo $__env->make('template/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script 
        src="<?php echo e(asset('/js/main.app.js')); ?>?v=1"
        type="module">
    </script>
</body>
</html><?php /**PATH /Users/yosuakristianto/Documents/Tiberias/diakonia-mgmt/resources/views/template/master.blade.php ENDPATH**/ ?>