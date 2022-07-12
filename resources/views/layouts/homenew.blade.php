<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{$title.TITLE_FOR_LAYOUT}}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="{!! FAVICON_PATH !!}" type="image/x-icon"/>
        <link rel="icon" href="{!! FAVICON_PATH !!}" type="image/x-icon"/>

        {{ HTML::style('public/css/front/home.css')}}
        {{ HTML::style('public/css/front/media.css')}}
        {{ HTML::style('public/css/front/font-awesome.css')}}
		 {{ HTML::style('public/css/front/aos.css')}}
        
        {{ HTML::script('public/js/jquery-2.1.0.min.js')}}
        {{ HTML::script('public/js/jquery.validate.js')}} 
        {{ HTML::script('public/js/front/bootstrap.min.js')}}
        {{ HTML::script('public/js/front/aos.js')}}		
    </head>
    <body>
        
        @yield('content') 
       
      
    </body>
	<script type="text/javascript">
            AOS.init({
                duration: 1200, once: true
            });
        </script>
</html>