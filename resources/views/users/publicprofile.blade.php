@extends('layouts.dashboard')
@section('content')
<script type="text/javascript">
    var img_path = "{!! HTTP_PATH !!}/public/img";
</script>
{{ HTML::script('public/js/jquery.raty.min.js')}}
<div class="cart-banner">
    <div class="container container-header">
        <h1>Public Profile</h1>
    </div>
</div>
<section class="search-categories-section">
    <div class="container ">
        
        <div class="courses-main-bx profile-banner active" id="activeproduct">
            <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-8">
                <div class="product-detail-text publicprofile-detail">
                    <h2>{{$recordInfo->first_name.' '.$recordInfo->last_name}}</h2>
                    <div class="review-details">
                        <div class="product-rivews">
                            <div class="courses-rating">
                                <script>
                                                    $(function() {
                                                    $('#avgRating23').raty({
                                                    starOn:    'star-on.png',
                                                            starOff:   'star-off.png',
                                                            start: {{$recordInfo -> average_rating}},
                                                            readOnly: true
                                                    });
                                                    });</script>
                                <span class="pprate gigdtlrat" id="avgRating23"></span>
                                <span><?php echo number_format($recordInfo->average_rating,1); ?>  (<?php echo $recordInfo->total_review; ?>)</span>
                                <strong>
                                    <?php $studentCount = DB::table('orderitems')->where('seller_id', $recordInfo->id)->count(); ?>
                                    {{$studentCount}} students</strong>
                            </div>
                            
                        </div>
                    </div>

                    <div class="about-me">
                        <div class="product-rivews">
                            {!! $recordInfo->about !!}
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="detal-video-bx">
                    <div class="card">
                        <div class="learning-img">
                            <?php
                            $gigimgname = '';
                            if ($recordInfo->profile_image) {
                                $path = PROFILE_FULL_UPLOAD_PATH . $recordInfo->profile_image;
                                if (file_exists($path) && !empty($recordInfo->profile_image)) {
                                    $gigimgname = PROFILE_FULL_DISPLAY_PATH . $recordInfo->profile_image;
                                }
                            }
                            ?>
                            {{HTML::image($gigimgname, SITE_TITLE,['title'=>$recordInfo->first_name.' '.$recordInfo->last_name,'class'=>'card-img-top'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
                @php global $level; @endphp
                @if(!$mycourses->isEmpty()) 
                <?php global $serviceDays; ?>
                @foreach($mycourses as $allrecord) 
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
                            <a href="{{ URL::to( 'courses/'.$allrecord->Category->slug.'/'.$allrecord->Subcategory->slug)}}" class="course-category"><i class="fa fa-bookmark-o"></i> {{$allrecord->Subcategory->name}}</a>
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
                <div class="col-md-12"><div class="management-full">No courses found. </div></div>
                @endif



            </div>
        </div>
    </div>
</section>
@endsection