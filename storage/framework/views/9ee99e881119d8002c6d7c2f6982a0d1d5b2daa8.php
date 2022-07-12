<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($title.TITLE_FOR_LAYOUT); ?></title>
        <?php
$cookie_name = "XSRF-TOKEN";
$cookie_value = csrf_token();
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "Secure"); // 86400 = 1 day
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "HttpOnly"); // 86400 = 1 day
?>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>
        <link rel="icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>
        
        <?php echo e(HTML::style('public/css/front/bootstrap.min.css')); ?>

        <?php echo e(HTML::style('public/css/front/style.css?ver=1.1')); ?>

        <?php echo e(HTML::style('public/css/front/font-awesome.css')); ?>

        <?php echo e(HTML::style('public/css/front/aos.css')); ?>

        

        <?php echo e(HTML::script('public/js/jquery.min.js')); ?>

        <?php echo e(HTML::script('public/js/front/bootstrap.min.js')); ?>

        <?php echo e(HTML::script('public/js/jquery.validate.js')); ?>

        <?php echo e(HTML::script('public/js/front/aos.js')); ?>

    </head>
    <body>
        <div id="pages">
        <?php echo $__env->make('elements.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?> 
        <?php echo $__env->make('elements.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div id="toTop"><?php echo e(HTML::image('public/img/front/arrow-top.png', SITE_TITLE)); ?></div>
      

<script type="text/javascript">
            AOS.init({
                duration: 1200, once: true
            });
        </script>
        <script>
            $(window).scroll(function () {
                if ($(this).scrollTop() > 5) {
                    $(".header-inner").addClass("fixed-me");
                } else {
                    $(".header-inner").removeClass("fixed-me");
                }
            });
        </script>
        <script type="text/javascript">
            $(window).scroll(function () {
                if ($(this).scrollTop() > 0) {
                    $('#toTop').fadeIn();
                } else {
                    $('#toTop').fadeOut();
                }
            });
            $('#toTop').click(function () {
                $('body,html').animate({scrollTop: 0}, 800);
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ftdrop1').click(function () {
                    if ($('.ftdrop1').hasClass('ftopen1')) {
                        $('.ftdrop1').removeClass('ftopen1');
                    } else {
                        $('.ftdrop1').addClass('ftopen1');
                    }
                    $(".ftblock1").slideToggle();
                });
                $('.ftdrop2').click(function () {
                    if ($('.ftdrop2').hasClass('ftopen2')) {
                        $('.ftdrop2').removeClass('ftopen2');
                    } else {
                        $('.ftdrop2').addClass('ftopen2');
                    }
                    $(".ftblock2").slideToggle();
                });
                $('.ftdrop3').click(function () {
                    if ($('.ftdrop3').hasClass('ftopen3')) {
                        $('.ftdrop3').removeClass('ftopen3');
                    } else {
                        $('.ftdrop3').addClass('ftopen3');
                    }
                    $(".ftblock3").slideToggle();
                });
                $('.ftdrop4').click(function () {
                    if ($('.ftdrop4').hasClass('ftopen4')) {
                        $('.ftdrop4').removeClass('ftopen4');
                    } else {
                        $('.ftdrop4').addClass('ftopen4');
                    }
                    $(".ftblock4").slideToggle();
                });
            });
        </script>
    </body>
</html>