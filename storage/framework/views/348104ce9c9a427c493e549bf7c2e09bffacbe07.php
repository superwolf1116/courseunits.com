<?php $__env->startSection('content'); ?>

<div class="after-login-banner">
    <div class="container">
        <div class="banner-text">
            <h1>Plan on Progress</h1>
            <p>Choose from thousands of expert-led <br>
                courses now.</p>

        </div>
    </div>
</div>
</div>

<section class="mylearning-section">
    <div class="container">
        <h2>Let's Start Learning, <?php echo $loginuser->first_name.' '.$loginuser->last_name; ?></h2>
        <div class="mylearning-bx">
            <div id="popular-topics"  class="owl-carousel">

                <?php if($courseslist): ?>
                <?php $i = 0; ?>
                    <?php $__currentLoopData = $courseslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($i < 5): ?>
                            <div class="card">
                                <div class="learning-img">
                                    <?php
                                            $gigimgname = '';
                                            if (isset($allrecord->image) && !empty($allrecord->image)) {
                                                $path = COURSE_FULL_UPLOAD_PATH . $allrecord->image;
                                                if (file_exists($path) && !empty($allrecord->image)) {
                                                    $gigimgname = COURSE_FULL_DISPLAY_PATH . $allrecord->image;
                                                }
                                            }
                                            if ($gigimgname == '') {
                                                $gigimgname = HTTP_PATH . '/public/img/front/dummy.png';
                                            }
                                            ?>
                                            <img class="card-img-top lazy" src="<?php echo e(HTTP_PATH); ?>/public/img/loading2.gif" data-original="<?php echo e($gigimgname); ?>">
                                    <a href="<?php echo e(URL::to( 'course-details/'.$allrecord->slug)); ?>"><i aria-hidden="true" class="fa fa-play"></i></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($allrecord->title); ?></h5>
                                    <p class="card-text"><?php echo e($allrecord->sub_title); ?></p>
                                    <!--<span><strong>Lecture</strong> . 2min</span>-->
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>



            </div>
        </div>
    </div>
</section>
<section class="learn-categories-section">
    <div class="container">
        <div class="categories-header" data-aos="zoom-in">
            <h2 class="main-title">What to Learn Next</h2>

        </div>
        <div class="courses-main-bx">
            <div class="row">
                <?php if($courseslist): ?>
                            <?php $__currentLoopData = $courseslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right">
                                <div class="card">
                                    <div class="card-img">
                                        <?php
                                        $gigimgname = '';
                                        if (isset($allrecord->image) && !empty($allrecord->image)) {
                                            $path = COURSE_FULL_UPLOAD_PATH . $allrecord->image;
                                            if (file_exists($path) && !empty($allrecord->image)) {
                                                $gigimgname = COURSE_FULL_DISPLAY_PATH . $allrecord->image;
                                            }
                                        }
                                        if ($gigimgname == '') {
                                            $gigimgname = HTTP_PATH . '/public/img/front/dummy.png';
                                        }
                                        ?>
                                        <img class="card-img-top lazy" src="<?php echo e(HTTP_PATH); ?>/public/img/loading2.gif" data-original="<?php echo e($gigimgname); ?>">
                                        <a href="<?php echo e(URL::to( 'courses/'.$allrecord->Category->slug)); ?>" class="course-category"><i class="fa fa-bookmark-o"></i> <?php echo e($allrecord->Category->name); ?></a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="<?php echo e(URL::to( 'course-details/'.$allrecord->slug)); ?>"><?php echo e($allrecord->title); ?></a></h5>
                                        <p class="card-text">by <a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->User->slug)); ?>"><?php echo e($allrecord->User->first_name.' '.$allrecord->User->last_name); ?></a></p>
                                        <div class="course-rate-price">
                                            <div class="rating">
                                                <?php
                                                $course_id = $allrecord->id;
                                                $overallrating = DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id', $course_id)->first();
                                                $allRate = $overallrating->rating;
                                                $allRwCnt = $overallrating->reviewcnt;
                                                ?>
                                                <span><?php echo number_format(round($allRate), 1); ?></span>
                                                <a href="<?php echo e(URL::to( 'course-details/'.$allrecord->slug)); ?>"><?php echo $allRwCnt; ?> Ratings</a>                      
                                            </div>
                                            <div class="price">$<?php echo e($allrecord->price); ?></div>
                                        </div>
                                        <div class="course-cart">
                                <div class="course_like">
                                    <?php echo $__env->make('elements.likeunlike', ['cid'=>$allrecord->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                                <div class="cart_listbtn">
                                    <?php
                                    $user_id = Session::get('user_id');
                                    if (!empty($user_id)) {
                                        $purchsedInfo = DB::table('orderitems')->where('buyer_id', $user_id)->where('course_id', $allrecord->id)->first(); //echo '<pre>';print_r($purchsedInfo->created_at);exit;
                                        if ($purchsedInfo) {
                                            ?>
                                            <a href="<?php echo e(URL::to( 'course-dashboard/'.$allrecord->id.'-'.$allrecord->slug)); ?>" class="cart_btn">Go to course</a>
                                        <?php } else { ?>
                                            <?php
                                            if (Session::get('user_id')) {
                                                $user_sess_id = Session::get('user_id');
                                            } else {
                                                $user_sess_id = 0;
                                            }
                                            $getcart = DB::table('carts')->where('course_id', $allrecord->id)->where('user_id', $user_sess_id)->first();

                                            if (isset($getcart->course_id)) {
                                                if ($getcart->course_id == $allrecord->id) {
                                                    ?>
                                                    <a class="cart_btn" href='<?php echo e(URL::to( 'viewcart')); ?>' id='gotocart'>Go to Cart</a>
                                                <?php } else { ?>
                                                    <a class="cart_btn" href='javascript:void();' id = 'addtocartnew_<?php echo $allrecord->id; ?>' onclick = 'addtocart("<?php echo $allrecord->id; ?>")'>Add to cart</a>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <a class="cart_btn" href='javascript:void();' id = 'addtocartnew_<?php echo $allrecord->id; ?>' onclick = 'addtocart("<?php echo $allrecord->id; ?>")'>Add to cart</a>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php
                                        if (Session::get('user_id')) {
                                            $user_sess_id = Session::get('user_id');
                                        } else {
                                            $user_sess_id = 0;
                                        }
                                        $getcart = DB::table('carts')->where('course_id', $allrecord->id)->where('user_id', $user_sess_id)->first();

                                        if (isset($getcart->course_id)) {
                                            if ($getcart->course_id == $allrecord->id) {
                                                ?>
                                                <a class="cart_btn" href='<?php echo e(URL::to( 'viewcart')); ?>' id='gotocart'>Go to Cart</a>
                                            <?php } else { ?>
                                                <a class="cart_btn" href='javascript:void();' id = 'addtocartlist_<?php echo $allrecord->id; ?>' onclick = 'addtocart("<?php echo $allrecord->id; ?>")'>Add to cart</a>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <a class="cart_btn" href='javascript:void();' id = 'addtocartlist_<?php echo $allrecord->id; ?>' onclick = 'addtocart("<?php echo $allrecord->id; ?>")'>Add to cart</a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>

                            </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right">
                                <div class="management-full">No record found.</div>
                            </div>
                            <?php endif; ?>
                

            </div>
        </div>
    </div>

</section>
 <script>
            $(function () {
                $('#popular-topics').owlCarousel({
                    rtl: false,
                    loop: true,
                    nav: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    smartSpeed: 500,
                    slideSpeed: 3000,
                    autoplayHoverPause: true,
                    goToFirstSpeed: 100,
                    margin: 15,
                    responsive: {
                        0: {items: 1},
                        479: {items: 1},
                        500: {items: 1},
                        766: {items: 2},
                        1000: {items: 3},
                        1280: {items: 3}
                    }

                })

            });
        </script>
<script>

    function addtocart(cid) {
        $.ajax({
            type: 'GET',
            url: "<?php echo HTTP_PATH; ?>/addtocart/" + cid,
            cache: false,
//            data: $('#AddToCartMain' + cid).serialize(),            
            success: function (result) {

                $("#addtocartnew_" + cid).removeAttr("onclick");
                $("#addtocartlist_" + cid).removeAttr("onclick");
                $("#addtocartnew_" + cid).addClass("ato_card");
                $("#addtocartlist_" + cid).addClass("ato_card");
                $("#addtocartnew_" + cid).html("Go To Cart");
                $("#addtocartlist_" + cid).html("Go To Cart");
                $("#addtocartnew_" + cid).attr('href', "<?php echo HTTP_PATH ?>/viewcart");
                $("#addtocartlist_" + cid).attr('href', "<?php echo HTTP_PATH ?>/viewcart");
                updateHeaderCount();
            },
            error: function () {

            }
        });


    }

    function updateHeaderCount() {
        $.ajax({
            type: 'GET',
            url: "<?php echo HTTP_PATH; ?>/updateCount",
            cache: false,
            data: {},
            success: function (result) {
                if (result) {
                    $("#update_cart").html(result);
                }
            }
        });
    }


</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>