<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="{!! FAVICON_PATH !!}" type="image/x-icon"/>
        <link rel="icon" href="{!! FAVICON_PATH !!}" type="image/x-icon"/>
<?php
        $currentURl = url()->current();
        $pageLink = $currentURl;
        $checkUrl = substr($currentURl, -1);

        if ($checkUrl == '/') {
            $pageLink = substr($currentURl, 0, strrpos($currentURl, "/"));
        }
        ?>
        <link rel="canonical" href="<?php echo $pageLink; ?>" />
        <?php if (isset($subCatInfo) && !empty($subCatInfo->meta_title)) {
            ?>
            <title><?php echo $subCatInfo->meta_title; ?></title>
            <meta name="description" itemprop="description" content="<?php echo $subCatInfo->meta_description; ?>">
            <meta name="keywords" itemprop="keywords" content="<?php echo $subCatInfo->meta_keyword; ?>">
        <?php } else if (isset($catInfo) && !empty($catInfo->meta_title)) {
            ?>
            <title><?php echo $catInfo->meta_title; ?></title>
            <meta name="description" itemprop="description" content="<?php echo $catInfo->meta_description; ?>">
            <meta name="keywords" itemprop="keywords" content="<?php echo $catInfo->meta_keyword; ?>">
        <?php } else if (Request::segment(1) == 'courses') {
            ?>
            <title>{{$title.TITLE_FOR_LAYOUT}}</title>
            <meta name="description" itemprop="description" content="">
            <meta name="keywords" itemprop="keywords" content="">
<?php } else { ?>
            <title>{{$title.TITLE_FOR_LAYOUT}}</title>
        <?php }
         ?>
        {{ HTML::style('public/css/front/bootstrap.min.css')}}
        {{ HTML::style('public/css/front/style.css?ver=1.3')}}
        {{ HTML::style('public/css/front/font-awesome.css')}}
        {{ HTML::style('public/css/front/aos.css')}}
        {{ HTML::style('public/css/front/owl.theme.default.min.css')}}
        {{ HTML::style('public/css/front/owl.carousel.min.css')}}
        

        {{ HTML::script('public/js/jquery.min.js')}}
        {{ HTML::script('public/js/front/bootstrap.min.js')}}
        {{ HTML::script('public/js/front/owl.carousel.js')}}
        {{ HTML::script('public/js/jquery.validate.js')}}
        {{ HTML::script('public/js/front/aos.js')}}
        
        
    </head>
    <body>
        <div id="pages">
            <div class="slider">
        @include('elements.header_inner')
        @yield('content') 
        @include('elements.footer')
        </div>
         
    </body>
	<script type="text/javascript">
            AOS.init({
                duration: 1200, once: true
            });
        </script>
</html>