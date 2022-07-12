<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{$title.TITLE_FOR_LAYOUT}}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="{!! FAVICON_PATH !!}" type="image/x-icon"/>
        <link rel="icon" href="{!! FAVICON_PATH !!}" type="image/x-icon"/>

       {{ HTML::style('public/css/front/bootstrap.min.css')}}
        {{ HTML::style('public/css/front/style.css?ver=1.4')}}
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
            @include('elements.header_inner')
        @yield('content') 
        @include('elements.footer')
        </div>
            <div id="toTop"><img src="img/arrow-top.png" alt="top"></div>
        <script type="text/javascript">
            AOS.init({
                duration: 1200, once: true
            });
        </script>
    </body>
</html>