<?php
if (Cookie::get('cookname_broserId') != '') {
    $browser_session_id = Cookie::get('cookname_broserId');
} else {
    $browser_session_id = Session::getId();
    Cookie::queue('cookname_broserId', $browser_session_id, time() + 60 * 60 * 24 * 7, "/");
}

$user_id = Session::get('user_id');

if (!empty($user_id)) {
    $cartCount = DB::table('carts')->where('user_id', $user_id)->orWhere('session_id',$browser_session_id)->count();
} else {
    $cartCount = DB::table('carts')->where('user_id', 0)->where('session_id',$browser_session_id)->count();
}

?>

<header>
    <div class="header header-inner">
        <div class="header-top">
            <div class="container container-header">
                <div class="row">
                    <div class="col-xs-12 col-md-3 col-lg-2"> 

                        <a class="navbar-brand" href="{!! HTTP_PATH !!}"> {{HTML::image(HOME_LOGO_PATH, SITE_TITLE)}}</a>
                    </div>
                    <div class="col-xs-12 col-md-5 col-lg-4">
                        <div class="search-bar">
                            {{ Form::open(array('url' => url('courses'), 'method' => 'post', 'class' => 'searchform1', 'id' => 'searchform1')) }}
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <?php isset($olftitle)?$olftitle:$olftitle = '';?>
                            <input class="required form-control" type="search" name="title" autocomplete="off" placeholder="Search Course" aria-label="Search" value="{{$olftitle}}">


                            {{ Form::close()}}

                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-6">
                        <div class="nevication_bar">
                            <nav class="navbar navbar-expand-lg navbar-light feedart-menu nevication-bar">
                                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                                    <div class="toggle position-relative">
                                        <div class="line top position-absolute"></div>
                                        <div class="line middle cross1 position-absolute"></div>
                                        <div class="line middle cross2 position-absolute"></div>
                                        <div class="line bottom position-absolute"></div>
                                    </div>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item dropdown dropdown-categories">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Categories
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                @if($globalCategories)
                                                @foreach($globalCategories as $cat)
                                                @if(isset($globalSubCategories[$cat->id]))
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item dropdown-toggle" href="{{URL::to( 'courses/'.$cat->slug)}}">{!! $cat->name !!}</a>

                                                    <ul class="dropdown-menu">
                                                        @foreach($globalSubCategories[$cat->id] as $subCat)   
                                                        @if(isset($globalSubSubCategories[$subCat->id]))
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-item dropdown-toggle" href="{{URL::to( 'courses/'.$cat->slug.'/'.$subCat->slug)}}">{!! $subCat->name !!}</a>
                                                            <ul class="dropdown-menu">
                                                                @foreach($globalSubSubCategories[$subCat->id] as $subsubCat)  
                                                                <li><a class="dropdown-item" href="{{URL::to( 'courses/'.$cat->slug.'/'.$subCat->slug.'/'.$subsubCat->slug)}}">{!! $subsubCat->name !!}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        @else 
                                                        <a class="dropdown-item" href="{{URL::to( 'courses/'.$cat->slug.'/'.$subCat->slug)}}">{!! $subCat->name !!}</a>
                                                        @endif
                                                        @endforeach
                                                    </ul>

                                                </li>
                                                @else 
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item" href="{{URL::to( 'courses/'.$cat->slug)}}">{!! $cat->name !!}</a>                                                               
                                                </li>
                                                @endif

                                                @endforeach 
                                                @endif
                                            </ul>
                                            <!--                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                            <li><a class="dropdown-item" href="#">Development</a></li>
                                                                                            <li><a class="dropdown-item" href="#">Business</a></li>
                                                                                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu</a>
                                                                                                <ul class="dropdown-menu">
                                                                                                    <li><a class="dropdown-item" href="#">Submenu action</a></li>
                                                                                                    <li><a class="dropdown-item" href="#">Another submenu action</a></li>
                                            
                                            
                                                                                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
                                                                                                        <ul class="dropdown-menu">
                                                                                                            <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                                                                                                            <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>
                                                                                                        <ul class="dropdown-menu">
                                                                                                            <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                                                                                                            <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                            
                                            
                                            
                                                                                                </ul>
                                                                                            </li>
                                                                                        </ul>-->

                                        </li>
                                    </ul>
                                    <ul class="navbar-nav ml-auto right-menus">
                                        <li class="nav-item"><a class="nav-link" href="{{URL::to('/')}}">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{URL::to('teaching')}}">Tutors</a></li>
                                        <li class="nav-item dropdown dropdown-categories">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Help
                                                </a>

                                                  <ul class="dropdown-menu dropdown-menu-help" aria-labelledby="navbarDropdown">
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="{{URL::to( 'help-center')}}">Help Center</a>
                                                        <a class="dropdown-item" href="{{URL::to( 'place-track-order')}}">Place & Track Order</a>
                                                        <a class="dropdown-item" href="{{URL::to( 'order-cancellation')}}">Order Cancellation</a>
                                                        <a class="dropdown-item" href="{{URL::to( 'returns-refunds')}}">Returns & Refunds</a>
                                                        <a class="dropdown-item" href="{{URL::to( 'payment-course-units-account')}}">Payment & Course Units Account</a>
                                                    </li>
                                                </ul>

                                            </li>
                                        @if(session()->has('user_id'))
                                        <li class="nav-item"><a class="nav-link" href="{{URL::to('my-courses')}}">My Courses</a></li>
                                        <li class="nav-item wishlist_llc"><a class="nav-link" href="{{URL::to('wishlist')}}"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                        <li class="nav-item updthdrdt" id="update_cart">
                                            <a class="nav-link" href="{{URL::to('viewcart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="crtcnt"><?php echo isset($cartCount) ? $cartCount : 0; ?></span></a></li>
                                        <li class="nav-item dropdown notification-b">
                                            <a class="nav-link" href="{{URL::to( 'users/notifications')}}"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                                            <ul class="dropdown-menu notification displaynonenot" id="msgcontaine">
                            </ul>
                                        </li>
                                        
                                        <li class="nav-item dropdown users-dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="user-profile-img">
                                                    <?php $userHInfo = DB::table('users')->where('id', session()->get('user_id'))->first(); ?>
                                                    @if(isset($userHInfo->profile_image) && $userHInfo->profile_image!='' && file_exists(PROFILE_SMALL_UPLOAD_PATH.$userHInfo->profile_image))
                                                    {{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$userHInfo->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}
                                                    @else
                                                    {{HTML::image('public/img/front/no_profile.png', SITE_TITLE, ['id'=> 'pimage'])}}
                                                    @endif
                                                </span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <div class="top_scc">
                                                    <a href="{{URL::to('users/myaccount')}}" class="user-profile-dropdown">
                                                        <span class="user-profile-img">
                                                           @if(isset($userHInfo->profile_image) && $userHInfo->profile_image!='' && file_exists(PROFILE_SMALL_UPLOAD_PATH.$userHInfo->profile_image))
                                                            {{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$userHInfo->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}
                                                            @else
                                                            {{HTML::image('public/img/front/no_profile.png', SITE_TITLE, ['id'=> 'pimage'])}}
                                                            @endif
                                                        </span>
                                                        <div class="user-dropdown-sub">
                                                            <div style="width: 100%;">
                                                                <div class="heading-md">{{$userHInfo->first_name.' '.$userHInfo->last_name}}</div>
                                                                <div class="heading-email">{{$userHInfo->email_address}}</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="clear-all"></div>
                                                <a class="dropdown-item" href="{{URL::to('my-courses')}}">My Courses </a>
                                                <a class="dropdown-item" href="{{URL::to('viewcart')}}">My Cart </a>
                                                <a class="dropdown-item" href="{{URL::to('wishlist')}}">Wishlist </a>
                                                <div class="clear-all"></div>
                                                <a class="dropdown-item" href="{{URL::to('courses/management')}}">Manage Courses </a>
                                                <a class="dropdown-item" href="{{URL::to('selling-orders')}}">Selling Courses </a>
                                                <a class="dropdown-item" href="{{URL::to('purchase-history')}}">Purchase History </a>
                                                <div class="clear-all"></div>
                                                <a class="dropdown-item" href="{{URL::to('users/myaccount')}}">My Account </a>
                                                <a class="dropdown-item" href="{{URL::to('users/settings')}}">Edit Profile</a>
                                                <a class="dropdown-item" href="{{URL::to('logout')}}">Logout</a>
                                            </div>
                                        </li>



                                        @else 
                                        <li class="nav-item updthdrdt" id="update_cart">
                                            <a class="nav-link" href="{{URL::to('viewcart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="crtcnt"><?php echo isset($cartCount) ? $cartCount : 0; ?></span></a></li>
                                        @if (str_contains(Request::fullUrl(), 'teach'))
                                        <li class="nav-item"><a class="nav-link login-text" href='{{URL::to('teacher-login')}}'>My Account</a></li>
                                        <li class="nav-item"><a class="nav-link btn btn-primary" href='{{URL::to('teacher-signup')}}'> Sign up</a></li>
                                        @else
                                        <li class="nav-item"><a class="nav-link login-text" href='{{URL::to('login')}}'>Login</a></li>
                                        <li class="nav-item"><a class="nav-link btn btn-primary" href='{{URL::to('register')}}'> Sign up</a></li>
                                        @endif
                                        @endif
                                    </ul>


                                </div>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>




