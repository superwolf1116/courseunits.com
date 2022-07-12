@extends('layouts.home')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {

        $('.search-area').on("keyup click", function () {
            $(".search-bar-panel").show();
            $(".is_service_selected").val(0);
            //alert();
            //if (e.which == 13) {
            keyword = $('.search-area').val();
            if (keyword) {
                $(".dlt-keyword").show();
                var currentRequest = null;
                $.ajaxSetup({cache: false}); // assures the cache is empty
                if (currentRequest != null) {
                    currentRequest.abort();
                    currentRequest = null;
                }
                currentRequest = $.ajax({
                    type: 'POST',
                    url: "<?php echo HTTP_PATH . '/gigs/getkeyword'; ?>",
                    data: {'keyword': keyword, "_token": "{{ csrf_token() }}"},
                    cache: false,

                    beforeSend: function () {

                    },
                    success: function (data) {
                        //  $("#wrkr_srch_ldr").hide();
                        //NProgress.done();
                        $(".searchgig").html('');
                        $(".searchgig").html(data);

                    },
                    error: function (data) {
                        console.log("error");
                        console.log(data);
                    }
                });

            } else {
                $(".dlt-keyword").hide();
                $(".searchgig").html("");
                $(".is_service_selected").val(0);
            }
            return false;    //<---- Add this line
            // }
        });

        $('.dlt-keyword').on("click", function () {
            $(".searchgig").html("");
            $(".search-area").val("").focus();
            $(".is_service_selected").val(0);
            $(".dlt-keyword").hide();
        });
        $(".searchform").validate();
        $(".searchform").submit(function (event) {
            //alert(1);
            if ($('ul.user-ul li').hasClass('selected')) {
                //alert(2);
                userslug = $('ul.user-ul li.selected').attr('id');
                //alert(userslug);
                location.href = "{{HTTP_PATH}}/public-profile/" + userslug;
                event.preventDefault();
            }

        });
        $(document).on('click', function (event) {
            if (!$(event.target).closest('.center_seacrh').length && !$(event.target).closest('.search-bar-panel').length) {
                $(".search-bar-panel").hide();
            }
        });
    });
</script>


<section class="courses-section">
    <div class="courses-section-tops">
        <div class="container">
         <div class="courses-header" data-aos="zoom-in">
            <h2 class="main-title">The World's Largest Selection of Courses</h2>
            <p>Choose from 120,000 online video courses with new additions published every month</p>
        </div>
        </div>
    </div>
    <div class="container">
       
        <div class="courses-main-bx">
            <ul class="nav courses-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">All</a>
                </li>
                @if($categorylist)
                @foreach($categorylist as $key => $category)
                <li class="nav-item">
                    <a class="nav-link" id="{{$key}}-tab" data-toggle="tab" href="#tab{{$key}}" role="tab" aria-controls="profile" aria-selected="false">{{ucfirst($category)}}</a>
                </li>
                @endforeach
                @endif

            </ul>
            <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="courses-tab-bx">
                        <div class="row">
                            @if($courseslist)
                            @foreach($courseslist as $courses)
                            @foreach($courses as $allrecord)
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
                                        <img class="card-img-top lazy" src="{{HTTP_PATH}}/public/img/loading2.gif" data-original="{{$gigimgname}}">
                                        <a href="{{ URL::to( 'courses/'.$allrecord->Category->slug)}}" class="course-category"><i class="fa fa-bookmark-o"></i> {{$allrecord->Category->name}}</a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{ URL::to( 'course-details/'.$allrecord->slug)}}">{{$allrecord->title}}</a></h5>
                                        <p class="card-text">by <a href="{{ URL::to( 'public-profile/'.$allrecord->User->slug)}}">{{$allrecord->User->first_name.' '.$allrecord->User->last_name}}</a></p>
                                        <div class="course-rate-price">
                                            <div class="rating">
                                                <?php
                                                $course_id = $allrecord->id;
                                                $overallrating = DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id', $course_id)->first();
                                                $allRate = $overallrating->rating;
                                                $allRwCnt = $overallrating->reviewcnt;
                                                ?>
                                                <span><?php echo number_format(round($allRate), 1); ?></span>
                                                <a href="{{ URL::to( 'course-details/'.$allrecord->slug)}}"><?php echo $allRwCnt; ?> Ratings</a>                      
                                            </div>
                                            <div class="price">${{$allrecord->price}}</div>
                                        </div>
                                        <div class="course-cart">
                                <div class="course_like">
                                    @include('elements.likeunlike', ['cid'=>$allrecord->id])
                                </div>
                                <div class="cart_listbtn">
                                    <?php
                                    $user_id = Session::get('user_id');
                                    if (!empty($user_id)) {
                                        $purchsedInfo = DB::table('orderitems')->where('buyer_id', $user_id)->where('course_id', $allrecord->id)->first(); //echo '<pre>';print_r($purchsedInfo->created_at);exit;
                                        if ($purchsedInfo) {
                                            ?>
                                            <a href="{{URL::to( 'course-dashboard/'.$allrecord->id.'-'.$allrecord->slug)}}" class="cart_btn">Go to course</a>
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
                                                    <a class="cart_btn" href='{{URL::to( 'viewcart')}}' id='gotocart'>Go to Cart</a>
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
                                                <a class="cart_btn" href='{{URL::to( 'viewcart')}}' id='gotocart'>Go to Cart</a>
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
                            @endforeach
                            @endforeach
                            @else
                              <div class="col-xs-12 col-md-12 col-lg-12" data-aos="fade-right">
                                <div class="management-full-home">No record found.</div>
                            </div>
                          
                            @endif
                        </div>
                    </div>
                </div>
                @if($categorylist)
                @foreach($categorylist as $key => $category)
                <div class="tab-pane fade" id="tab{{$key}}" role="tabpanel" aria-labelledby="{{$key}}-tab">
                    <div class="courses-tab-bx">
                        <div class="row">
                            @if(isset($courseslist[$key]))
                            @foreach($courseslist[$key] as $allrecord)
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
                                        <img class="card-img-top lazy" src="{{HTTP_PATH}}/public/img/loading2.gif" data-original="{{$gigimgname}}">
                                        <a href="{{ URL::to( 'courses/'.$allrecord->Category->slug)}}" class="course-category"><i class="fa fa-bookmark-o"></i> {{$allrecord->Category->name}}</a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{ URL::to( 'course-details/'.$allrecord->slug)}}">{{$allrecord->title}}</a></h5>
                                        <p class="card-text">by <a href="{{ URL::to( 'public-profile/'.$allrecord->User->slug)}}">{{$allrecord->User->first_name.' '.$allrecord->User->last_name}}</a></p>
                                        <div class="course-rate-price">
                                            <div class="rating">
                                                <?php
                                                $course_id = $allrecord->id;
                                                $overallrating = DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id', $course_id)->first();
                                                $allRate = $overallrating->rating;
                                                $allRwCnt = $overallrating->reviewcnt;
                                                ?>
                                                <span><?php echo number_format(round($allRate), 1); ?></span>
                                                <a href="{{ URL::to( 'course-details/'.$allrecord->slug)}}"><?php echo $allRwCnt; ?> Ratings</a>                      
                                            </div>
                                            <div class="price">${{$allrecord->price}}</div>
                                        </div>
                                        <div class="course-cart">
                                <div class="course_like">
                                    @include('elements.likeunlike', ['cid'=>$allrecord->id])
                                </div>
                                <div class="cart_listbtn">
                                    <?php
                                    $user_id = Session::get('user_id');
                                    if (!empty($user_id)) {
                                        $purchsedInfo = DB::table('orderitems')->where('buyer_id', $user_id)->where('course_id', $allrecord->id)->first(); //echo '<pre>';print_r($purchsedInfo->created_at);exit;
                                        if ($purchsedInfo) {
                                            ?>
                                            <a href="{{URL::to( 'course-dashboard/'.$allrecord->id.'-'.$allrecord->slug)}}" class="cart_btn">Go to course</a>
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
                                                    <a class="cart_btn" href='{{URL::to( 'viewcart')}}' id='gotocart'>Go to Cart</a>
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
                                                <a class="cart_btn" href='{{URL::to( 'viewcart')}}' id='gotocart'>Go to Cart</a>
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
                            @endforeach
                            @else
                            <div class="col-xs-12 col-md-12 col-lg-12" data-aos="fade-right">
                                <div class="management-full-home">No record found.</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

        </div>
    </div>
</section>


<section class="personal-step-section" data-aos="fade-up">
    <div class="container">
        <div class="personal-step-main">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6"> 
                    <div class="personal-step-img"> 
                        {{HTML::image('public/img/front/personal-step.png', SITE_TITLE)}}
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <div class="personal-step"> 
                        <h2><strong>Take the next step</strong> toward your personal
                            and professional goals with <?php echo SITE_TITLE;?>.</h2>
                        <p>Select Your Course</p>
                        <a href="{{URL::to('courses')}}" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="categories-section" data-aos="fade-up">
    <div class="container">
        <div class="courses-header">
            <h2 class="main-title">Top Categories</h2>
        </div>
        <div class="categories-main-bx">
            <div class="row">

                @if($globalCategories)
                @foreach($globalCategories as $cat)
                <a href="{{URL::to('courses/'.$cat->slug)}}">
                    <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right">
                        <div class="card">
                            <div class="card-img">
                                {{HTML::image(CATEGORY_FULL_DISPLAY_PATH.$cat->home_image, SITE_TITLE,array('class'=>'card-img-top'))}}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{URL::to('courses/'.$cat->slug)}}">{!! $cat->name !!}</a></h5>
                            </div>
                        </div>
                    </div>
                </a>


                @if($loop->iteration == 8)
                @php break @endphp
                @endif
                @endforeach                    
                @endif


            </div>
            <div class="seemore" data-aos="zoom-in">
                <a href="{{URL::to('categories')}}"><span>Show More</span><i>
                        {{HTML::image('public/img/front/arrow.png', SITE_TITLE)}}
                    </i></a>
            </div>
            <div class="ls-acadmy-conting" data-aos="fade-up">
                <ul>
                    <li>
                        2000<span>Students</span>
                    </li>
                    <li>
                        850<span>Courses</span>
                    </li>
                    <li>
                        6290<span>Hours video</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="instructor-section">
    <div class="container">
        <div class="instructor-main">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6" data-aos="fade-right"> 
                    <div class="instructor-img"> 
                        {{HTML::image('public/img/front/about-me-profile.jpg', SITE_TITLE)}}
                    </div>
                    <div class="maxcoach-img"> 
                        {{HTML::image('public/img/front/maxcoach.png', SITE_TITLE)}}
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6" data-aos="fade-left">
                    <div class="instructor-bx"> 
                        <h2>Become an Instructor</h2>
                        <p>Top instructors from around the world teach millions of 
                            students on <?php echo SITE_TITLE;?>. We provide the tools and skills 
                            to teach what you love.</p>
                        <a href="{{URL::to('teaching')}}" class="btn btn-primary">Start teaching today</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
@endsection