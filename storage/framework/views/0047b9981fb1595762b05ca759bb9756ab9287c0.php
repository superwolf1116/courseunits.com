<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($title.TITLE_FOR_LAYOUT); ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>
        <link rel="icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>

       <?php echo e(HTML::style('public/css/front/bootstrap.min.css')); ?>

        <?php echo e(HTML::style('public/css/front/style.css?ver=1.5')); ?>

        <?php echo e(HTML::style('public/css/front/font-awesome.css')); ?>

        <?php echo e(HTML::style('public/css/front/aos.css')); ?>

        <?php echo e(HTML::style('public/css/front/owl.theme.default.min.css')); ?>

        <?php echo e(HTML::style('public/css/front/owl.carousel.min.css')); ?>

        

        <?php echo e(HTML::script('public/js/jquery.min.js')); ?>

        <?php echo e(HTML::script('public/js/front/bootstrap.min.js')); ?>

        <?php echo e(HTML::script('public/js/front/owl.carousel.js')); ?>

        <?php echo e(HTML::script('public/js/jquery.validate.js')); ?>

        <?php echo e(HTML::script('public/js/front/aos.js')); ?>

    </head>
    <body>
        <div id="pages">
            <div class="slider">
        <?php echo $__env->make('elements.header_inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?> 
        <?php echo $__env->make('elements.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
            <div id="toTop"><img src="img/arrow-top.png" alt="top"></div>
        <script type="text/javascript">
            AOS.init({
                duration: 1200, once: true
            });
        </script>
    </body>
</html>