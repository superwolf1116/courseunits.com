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
<div class="slider">
    <header>
        <div class="header header-inner">
            <div class="header-top">
                <div class="container container-header">
                    <div class="row">
                        <div class="col-xs-12 col-md-3 col-lg-2"> 

                            <a class="navbar-brand" href="<?php echo HTTP_PATH; ?>"> <?php echo e(HTML::image(HOME_LOGO_PATH, SITE_TITLE)); ?></a>
                        </div>
                        <div class="col-xs-12 col-md-5 col-lg-4">
                            <div class="search-bar">
                                <?php echo e(Form::open(array('url' => url('courses'), 'method' => 'post', 'class' => 'searchform1', 'id' => 'searchform1'))); ?>

                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input class="required form-control" type="search" name="title" autocomplete="off" placeholder="Search Course" aria-label="Search">


                                <?php echo e(Form::close()); ?>


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
                                                    <?php if($globalCategories): ?>
                                                    <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($globalSubCategories[$cat->id])): ?>
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item dropdown-toggle" href="<?php echo e(URL::to( 'courses/'.$cat->slug)); ?>"><?php echo $cat->name; ?></a>

                                                        <ul class="dropdown-menu">
                                                            <?php $__currentLoopData = $globalSubCategories[$cat->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                                            <?php if(isset($globalSubSubCategories[$subCat->id])): ?>
                                                            <li class="dropdown-submenu">
                                                                <a class="dropdown-item dropdown-toggle" href="<?php echo e(URL::to( 'courses/'.$cat->slug.'/'.$subCat->slug)); ?>"><?php echo $subCat->name; ?></a>
                                                                <ul class="dropdown-menu">
                                                                    <?php $__currentLoopData = $globalSubSubCategories[$subCat->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                                    <li><a class="dropdown-item" href="<?php echo e(URL::to( 'courses/'.$cat->slug.'/'.$subCat->slug.'/'.$subsubCat->slug)); ?>"><?php echo $subsubCat->name; ?></a></li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </li>
                                                            <?php else: ?> 
                                                            <a class="dropdown-item" href="<?php echo e(URL::to( 'courses/'.$cat->slug.'/'.$subCat->slug)); ?>"><?php echo $subCat->name; ?></a>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>

                                                    </li>
                                                    <?php else: ?> 
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="<?php echo e(URL::to( 'courses/'.$cat->slug)); ?>"><?php echo $cat->name; ?></a>                                                               
                                                    </li>
                                                    <?php endif; ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                    <?php endif; ?>
                                                </ul>

                                            </li>
                                        </ul>
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('/')); ?>">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo e(URL::to('teaching')); ?>">Tutors</a></li>
                                              <li class="nav-item dropdown dropdown-categories">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Help
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-help" aria-labelledby="navbarDropdown">
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="<?php echo e(URL::to( 'help-center')); ?>">Help Center</a>
                                                        <a class="dropdown-item" href="<?php echo e(URL::to( 'place-track-order')); ?>">Place & Track Order</a>
                                                        <a class="dropdown-item" href="<?php echo e(URL::to( 'order-cancellation')); ?>">Order Cancellation</a>
                                                        <a class="dropdown-item" href="<?php echo e(URL::to( 'returns-refunds')); ?>">Returns & Refunds</a>
                                                        <a class="dropdown-item" href="<?php echo e(URL::to( 'payment-course-units-account')); ?>">Payment & Course Units Account</a>
                                                    </li>
                                                </ul>

                                            </li>
                                            <li class="nav-item updthdrdt" id="update_cart">
                                            <a class="nav-link" href="<?php echo e(URL::to('viewcart')); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="crtcnt"><?php echo isset($cartCount) ? $cartCount : 0; ?></span></a></li>

                                            <?php if(session()->has('user_id')): ?>

                                            <?php else: ?> 
                                            <?php if(str_contains(Request::fullUrl(), 'teach')): ?>
                                            <li class="nav-item"><a class="nav-link login-text" href='<?php echo e(URL::to('teacher-login')); ?>'>My Account</a></li>
                                            <li class="nav-item"><a class="nav-link btn btn-primary" href='<?php echo e(URL::to('teacher-signup')); ?>'> Sign up</a></li>
                                            <?php else: ?>
                                            <li class="nav-item"><a class="nav-link login-text" href='<?php echo e(URL::to('login')); ?>'>Login</a></li>
                                            <li class="nav-item"><a class="nav-link btn btn-primary" href='<?php echo e(URL::to('register')); ?>'> Sign up</a></li>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </ul>

                                        <ul class="navbar-nav ml-auto" style="display: none">

                                            <?php if(session()->has('user_id')): ?>

                                            <li class="nav-item dropdown dropdown-home">
                                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href='#'>
                                                    <i class="profiles-picher dfgrfgrf">
                                                        <?php $userHInfo = DB::table('users')->where('id', session()->get('user_id'))->first(); ?>
                                                        <?php if(isset($userHInfo->profile_image)): ?>
                                                        <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$userHInfo->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?>

                                                        <?php else: ?>
                                                        <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?>

                                                        <?php endif; ?>
                                                    </i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a class="nav-link" href='<?php echo e(URL::to('logout')); ?>'>Logout</a></li>
                                                </ul>
                                            </li>
                                            <?php endif; ?>

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

</div>


