@extends('layouts.dashboard')
@section('content')

<!--<link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />

   If you'd like to support IE8 (for Video.js versions prior to v7) 
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<video
    id="my-video"
    class="video-js"
    controls
    preload="auto"
    width="640"
    height="264"
    poster="<?php echo COURSE_FULL_DISPLAY_PATH . $recordInfo->image; ?>"
    data-setup="{}"
  >
    <source src="{{COURSE_VIDEO_FULL_DISPLAY_PATH.$recordInfo->sample_video}}" type="video/mp4" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      > 
    </p>
  </video>-->
<script type="text/javascript">
    var img_path = "{!! HTTP_PATH !!}/public/img";
</script>
{{ HTML::script('public/js/jquery.raty.min.js')}}

<div class="detail-banner">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-8">
                <div class="product-detail-text">
                    <h2>{{$recordInfo->title}}</h2>
                    <p>{{$recordInfo->sub_title}}</p>
                    <div class="review-details">
                        <div class="product-rivews">
                            <div class="courses-rating">
                                <script>
                                                    $(function() {
                                                    $('#avgRating23').raty({
                                                    starOn:    'star-on.png',
                                                            starOff:   'star-off.png',
                                                            start: {{$recordInfo -> User -> average_rating}},
                                                            readOnly: true
                                                    });
                                                    });</script>
                                <span class="pprate gigdtlrat" id="avgRating23"></span>
                                <span><?php echo number_format($recordInfo->User->average_rating,1); ?>  (<?php echo $recordInfo->User->total_review; ?>)</span>
                                <strong>
                                    <?php $studentCount = DB::table('orderitems')->where('seller_id', Session::get('user_id'))->count(); ?>
                                    {{$studentCount}} students</strong>
                            </div>
                            
                        </div>
                    </div>

                    <div class="review-details">
                        <div class="product-rivews">
                            <div class="courses-rating">
                                <div class="rivew-user">
                                    @if(isset($recordInfo->User->profile_image))
                                    {{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->User->profile_image, SITE_TITLE, ['id'=> ''])}}
                                    @else
                                    {{HTML::image('public/img/front/user-1.png', SITE_TITLE, ['id'=> ''])}}
                                    @endif
                                </div>
                                <span>{{$recordInfo->User->first_name.' '.$recordInfo->User->last_name}}</span>
                                <strong>Last updated {{$recordInfo->created_at->format('m/Y')}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-details">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{URL::to( 'courses/'.$recordInfo->Category->slug)}}">{{$recordInfo->Category->name}}</a></li>
                                <li class="breadcrumb-item"><a href="{{URL::to( 'courses/'.$recordInfo->Subcategory->slug)}}">{{$recordInfo->Subcategory->name}}</a></li>
                                <?php if (isset($recordInfo->Subsubcategory->name)) { ?>
                                    <li class="breadcrumb-item active" aria-current="page">{{$recordInfo->Subsubcategory->name}}</li>
                                <?php } ?>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="detal-video-bx">
                    <div class="card">
                        <div class="learning-img">
                            <?php
                            $gigimgname = '';
                            if ($recordInfo->image) {
                                $path = COURSE_FULL_UPLOAD_PATH . $recordInfo->image;
                                if (file_exists($path) && !empty($recordInfo->image)) {
                                    $gigimgname = COURSE_FULL_DISPLAY_PATH . $recordInfo->image;
                                }
                            }
                            ?>
                            {{HTML::image($gigimgname, SITE_TITLE,['title'=>$recordInfo->title,'class'=>'card-img-top'])}}
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal"><i aria-hidden="true" class="fa fa-play"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="video-prices">
                                <?php
                                $user_id = Session::get('user_id');
                                if (!empty($user_id)) {
                                    $purchsedInfo = DB::table('orderitems')->where('buyer_id', $user_id)->where('course_id', $recordInfo->id)->first(); //echo '<pre>';print_r($purchsedInfo->created_at);exit;
                                    if ($purchsedInfo) {
                                        ?>
                                        <div class="sect_msg">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <h2 class="udlite-heading">You purchased this course on {{date('M d, Y',strtotime($purchsedInfo->created_at))}}</h2>
                                        </div>
                                    <?php } else { ?>
                                        <strong>${{$recordInfo->price}}</strong>
                                        <span>$<?php echo number_format($recordInfo->price + 200, 2); ?></span>
                                        <div class="video-feverots">@include('elements.likeunlike', ['cid'=>$recordInfo->id])</div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <strong>${{$recordInfo->price}}</strong>
                                    <span>$<?php echo number_format($recordInfo->price + 200, 2); ?></span>
                                    <div class="video-feverots">@include('elements.likeunlike', ['cid'=>$recordInfo->id])</div>
                                <?php } ?>
                            </div>
                            <div class="video-addto">
                                <?php
                                $user_id = Session::get('user_id');
                                if (!empty($user_id)) {
                                    $purchsedInfo = DB::table('orderitems')->where('buyer_id', $user_id)->where('course_id', $recordInfo->id)->first(); //echo '<pre>';print_r($purchsedInfo->created_at);exit;
                                    if ($purchsedInfo) {
                                        ?>
                                        <a href="{{URL::to( 'course-dashboard/'.$recordInfo->id.'-'.$recordInfo->slug)}}" class="btn btn-primary">Go to course</a>
                                    <?php } else { ?>
                                        <?php
                                        if (Session::get('user_id')) {
                                            $user_sess_id = Session::get('user_id');
                                        } else {
                                            $user_sess_id = 0;
                                        }
                                        $getcart = DB::table('carts')->where('course_id', $recordInfo->id)->where('user_id', $user_sess_id)->first();

                                        if (isset($getcart->course_id)) {
                                            if ($getcart->course_id == $recordInfo->id) {
                                                ?>
                                                <a class="btn btn-primary" href='{{URL::to( 'viewcart')}}' id='gotocart'>Go to Cart</a>
                                            <?php } else { ?>
                                                <a class="btn btn-primary" href='javascript:void();' id = 'addtocartlist_<?php echo $recordInfo->id; ?>' onclick = 'addtocart("<?php echo $recordInfo->id; ?>")'>Add to cart</a>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <a class="btn btn-primary" href='javascript:void();' id = 'addtocartlist_<?php echo $recordInfo->id; ?>' onclick = 'addtocart("<?php echo $recordInfo->id; ?>")'>Add to cart</a>
                                        <?php } ?>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <?php
                                    if (Session::get('user_id')) {
                                        $user_sess_id = Session::get('user_id');
                                    } else {
                                        $user_sess_id = 0;
                                    }
                                    $getcart = DB::table('carts')->where('course_id', $recordInfo->id)->where('user_id', $user_sess_id)->first();

                                    if (isset($getcart->course_id)) {
                                        if ($getcart->course_id == $recordInfo->id) {
                                            ?>
                                            <a class="btn btn-primary" href='{{URL::to( 'viewcart')}}' id='gotocart'>Go to Cart</a>
                                        <?php } else { ?>
                                            <a class="btn btn-primary" href='javascript:void();' id = 'addtocartlist_<?php echo $recordInfo->id; ?>' onclick = 'addtocart("<?php echo $recordInfo->id; ?>")'>Add to cart</a>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <a class="btn btn-primary" href='javascript:void();' id = 'addtocartlist_<?php echo $recordInfo->id; ?>' onclick = 'addtocart("<?php echo $recordInfo->id; ?>")'>Add to cart</a>
                                    <?php } ?>
                                    <!--<a href="#" class="btn btn-light">Buy Now</a>-->
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
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

<!-- Modal -->
<div id="myModal" class="modal video-modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$recordInfo->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="my-modal-video"><video
                        controls
                        crossorigin
                        playsinline
                        data-poster="{{COURSE_FULL_DISPLAY_PATH.$recordInfo->image}}"
                        id="player"
                        >
                        <!-- Video files -->
                        <source
                            src="{{COURSE_VIDEO_FULL_DISPLAY_PATH.$recordInfo->sample_video}}"
                            type="video/mp4"
                            size="576"
                            />
                        <source
                            src="{{COURSE_VIDEO_FULL_DISPLAY_PATH.$recordInfo->sample_video}}"
                            type="video/mp4"
                            size="720"
                            />
                        <source
                            src="{{COURSE_VIDEO_FULL_DISPLAY_PATH.$recordInfo->sample_video}}"
                            type="video/mp4"
                            size="1080"
                            />

                    </video></p>
            </div>
        </div>

    </div>
</div>

<section class="mydetails-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-8">
                <div class="about-detail">
                    <h2>About This Course</h2>
                    <!--<p>{{$recordInfo->description}}</p>-->
                    <p>{!! $recordInfo->description !!}</p>


                </div>
                <!--                <div class="skills-detail">
                                    <h3>SKILLS YOU WILL GAIN</h3>
                                    <div class="my-skills">
                                        <a href="#">Usability</a>
                                        <a href="#">User Experience (UX)</a>
                                        <a href="#">User Interface (UI)</a>
                                    </div>
                
                
                                </div>-->
                <div class="my-instructor">
                    <h3>Instructor</h3>
                    <h4>{{$recordInfo->User->first_name.' '.$recordInfo->User->last_name}}</h4>
                    <!--<p>Adobe Certified Instructor & Adobe Certified Exper</p>-->
                    <div class="my-instructor-detail">
                        <div class="my-instructor-img">
                            @if(isset($recordInfo->User->profile_image))
                            {{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->User->profile_image, SITE_TITLE, ['id'=> ''])}}
                            @else
                            {{HTML::image('public/img/front/user-1.png', SITE_TITLE, ['id'=> ''])}}
                            @endif
                        </div>
                        <div class="my-instructor-text">
                            <ul>
                                <li><i aria-hidden="true" class="fa fa-star"></i><span><?php echo number_format($recordInfo->User->average_rating,1); ?> Instructor Rating</span></li>
                                <li><i aria-hidden="true" class="fa fa-certificate"></i><span><?php echo $recordInfo->User->total_review; ?> Reviews</span></li>
                                <?php $studentCount = DB::table('orderitems')->where('seller_id', Session::get('user_id'))->count(); ?>

                                <li><i aria-hidden="true" class="fa fa-users"></i><span>{{$studentCount}} Students</span></li>
                                <?php $courseCount = DB::table('courses')->where('user_id', Session::get('user_id'))->count(); ?>
                                <li><i aria-hidden="true" class="fa fa-play"></i><span>{{$courseCount}} Courses</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="course-includes">
                    <h3>Course includes:</h3>
                    <ul>@php global $level; @endphp
                        <li><a href="javascript:void(0);"><i>{{HTML::image('public/img/front/course-icon1.png', SITE_TITLE, ['id'=> ''])}}</i><span>12 hours on-demand video</span></a></li>

                        <li><a href="javascript:void(0);"><i>{{HTML::image('public/img/front/course-icon2.png', SITE_TITLE, ['id'=> ''])}}</i><span>Downloadable resources</span></a></li>
                        <li><a href="javascript:void(0);"><i>{{HTML::image('public/img/front/course-icon3.png', SITE_TITLE, ['id'=> ''])}}</i><span>Access on mobile and TV</span></a></li>
                        <!--<li><a href="javascript:void(0);"><i>{{HTML::image('public/img/front/course-icon4.png', SITE_TITLE, ['id'=> ''])}}</i><span>Assignments</span></a></li>-->
                        <li><a href="javascript:void(0);"><i>{{HTML::image('public/img/front/course-icon5.png', SITE_TITLE, ['id'=> ''])}}</i><span>{{$level[$recordInfo->level]}}</span></a></li>
                        <!--<li><a href="javascript:void(0);"><i>{{HTML::image('public/img/front/course-icon6.png', SITE_TITLE, ['id'=> ''])}}</i><span>Language</span></a></li>-->
                        <li><a href="javascript:void(0);"><i>{{HTML::image('public/img/front/course-icon7.png', SITE_TITLE, ['id'=> ''])}}</i><span>Certificate</span></a></li>
                        <li><a href="javascript:void(0);"><i>{{HTML::image('public/img/front/course-icon8.png', SITE_TITLE, ['id'=> ''])}}</i><span>Lifetime access</span></a></li>
                        <li><a href="javascript:void(0);"><i>{{HTML::image('public/img/front/course-icon9.png', SITE_TITLE, ['id'=> ''])}}</i><span>100% online</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>


<div class="course-contant-section">
    <div class="container">
        <h2>Course Content</h2>

        <div class="course-names">
            <div class="accordion" id="accordionExample">
                @if(!$sections->isEmpty())
                @php $i=1; $j=1; @endphp
                @foreach($sections as $section)
                <?php
                $contents = DB::table('coursecontents')->where('section_id', $section->id)->where('course_id', $recordInfo->id)->get();
                $contentCount = DB::table('coursecontents')->where('section_id', $section->id)->where('course_id', $recordInfo->id)->count();

                $timeArray = DB::table('coursecontents')
                        ->select(DB::raw('video_time'))
                        ->where('section_id', $section->id)
                        ->where('course_id', $recordInfo->id)
                        ->get();
                $times = array();
                if ($timeArray) {
                    foreach ($timeArray as $timeArr) {
                        $times[] = $timeArr->video_time;
                    }
                }

                $sum = '';
                $times = array_filter($times);
                if(!empty($times)){
// pass the array to the function
                $hours = 0; //declare minutes either it gives Notice: Undefined variable
                $seconds = 0; //declare minutes either it gives Notice: Undefined variable
                // loop throught all the times
                foreach ($times as $time) {
                    list($minute, $second) = explode(':', $time);
                    $seconds += $minute * 60;
                    $seconds += $second;
                }

                $minutes = floor($seconds / 60);
                $seconds -= $minutes * 60;

                // returns the time already formatted
                if ($minutes == 00) {
                    $sum = '1min';
                } elseif($minutes >= 60){
                    $hours = floor($minutes / 60);
                    $minutes -= $hours * 60;
                    $sum = sprintf('%02dhr %02dmin', $hours, $minutes);
                } else {
                    $sum = sprintf('%02dmin %02dsec', $minutes, $seconds);
                }
                }
                ?>
                <div class="card">
                    <div class="card-head" id="heading{{$section->id}}">
                        <h2 class="mb-0" data-toggle="collapse" data-target="#collapse{{$section->id}}" aria-expanded="true" aria-controls="collapse{{$section->id}}">
                            {{$section->section_title}}<span>{{$contentCount}} Lectures . {{$sum}}</span>
                        </h2>
                    </div>

                    <div id="collapse{{$section->id}}" class="collapse" aria-labelledby="heading{{$section->id}}" data-pare                            nt="#accordionExample">
                        @foreach($contents as $content)
                        <div class="card-body">
                            <div class="course-contant course-contant-new">  	
                                <i class="fa fa-play-circle"></i>

                                <p>{{$j}}.{{$i}} {{$content->lecture_title}}</p>	                                	
                                <span class="tim_sec">{{$content->video_time}}</span>
                                <div class="desc_cls">{{$content->lecture_description}}</div>
                            </div>
                        </div>
                        @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
                @php $j++; @endphp
                @endforeach
                @endif


            </div>
        </div>


        <div class="requirements-bx">
            <h3>Requirements</h3>
            <ul>
                <li>You will need a copy of Adobe XD 2019 or above. A free trial can be downloaded from Adobe.</li>
                <li>No previous design experience is needed.</li>
                <li>No previous Adobe XD skills are needed.</li>
            </ul>
        </div>
    </div>
</div>

<section class="students-reviews-section">
    <div class="container">
        <h2>Students Reviews</h2>
        <div class="students-review-bx">
            <div class="row">
                @if(!$coursereviews->isEmpty())
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <div class="custumer-reting">
                        <div class="custumer-reting-user">
                            <script>
                                                    $(function() {
                                                    $('#avgRating22').raty({
                                                    starOn:    'star-on.png',
                                                            starOff:   'star-off.png',
                                                            start: {{$recordInfo -> User -> average_rating}},
                                                            readOnly: true
                                                    });
                                                    });</script>
                                        
                            <strong ><?php echo number_format($recordInfo->User->average_rating,1); ?></strong>
                            <div class="reting-user">
                                <span class="pprate gigdtlrat" id="avgRating22"></span>
                                <span><?php echo $recordInfo->User->total_review; ?> reviews</span>
                            </div>
                        </div>

                        <div class="stars-retings">
                            <?php 
                            $rate5 = array();
                            $per5 = $per4 = $per3 = $per2 = $per1 = 0;
                            $rate4 = array();
                            $rate3 = array();
                            $rate2 = array();
                            $rate1 = array();
                            $rate = array();
                            ?>
                            @foreach($coursereviews as $allrecord)
                                @if($allrecord -> rating > 4)
                                <?php $rate5[] = 1;$rate[] = 1;?>
                                @elseif($allrecord -> rating > 3)
                                <?php $rate4[] = 1;$rate[] = 1;?>
                                @elseif($allrecord -> rating > 2)
                                <?php $rate3[] = 1;$rate[] = 1;?>
                                @elseif($allrecord -> rating > 1)
                                <?php $rate2[] = 1;$rate[] = 1;?>
                                @else
                                <?php $rate1[] = 1;$rate[] = 1;?>
                                @endif
                            @endforeach
                            <div class="review_rating_fjs">
                                <?php 
                                if(array_sum($rate5) > 0){
                                    $per5 = round(((array_sum($rate5)*100)/array_sum($rate)),2);
                                }
                                ?>
                                <div class="star_num">5 stars</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$per5}}" aria-valuemin="0" aria-valuemax="{{$per5}}" style="width:{{$per5}}%">
                                    </div>
                                </div>
                                <div class="people_star_num">{{$per5}}%</div>
                            </div>

                            <div class="review_rating_fjs">
                                <?php 
                                if(array_sum($rate4) > 0){
                                    $per4 = round(((array_sum($rate4)*100)/array_sum($rate)),2);
                                }?>
                                
                                <div class="star_num">4 stars</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$per4}}" aria-valuemin="0" aria-valuemax="{{$per4}}" style="width:{{$per4}}%">
                                    </div>
                                </div>
                                <div class="people_star_num">{{$per4}}%</div>
                            </div>


                            <div class="review_rating_fjs">
                                <?php 
                                if(array_sum($rate3) > 0){
                                    $per3 = round(((array_sum($rate3)*100)/array_sum($rate)),2);
                                }?>
                                <div class="star_num">3 stars</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$per3}}" aria-valuemin="0" aria-valuemax="{{$per3}}" style="width:{{$per3}}%">
                                    </div>
                                </div>
                                <div class="people_star_num">{{$per3}}%</div>
                            </div>

                            <div class="review_rating_fjs">
                                <?php 
                                if(array_sum($rate2) > 0){
                                    $per2 = round(((array_sum($rate2)*100)/array_sum($rate)),2);
                                }?>
                                <div class="star_num">2 stars</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$per2}}" aria-valuemin="0" aria-valuemax="{{$per2}}" style="width:{{$per2}}%">
                                    </div>
                                </div>
                                <div class="people_star_num">{{$per2}}%</div>
                            </div>

                            <div class="review_rating_fjs">
                                <?php 
                                if(array_sum($rate1) > 0){
                                    $per1 = round(((array_sum($rate1)*100)/array_sum($rate)),2);
                                }?>
                                <div class="star_num">1 stars</div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$per1}}" aria-valuemin="0" aria-valuemax="{{$per1}}" style="width:{{$per1}}%">
                                    </div>
                                </div>
                                <div class="people_star_num">{{$per1}}%</div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-lg-8">
                    <div class="introduction-review">
                        <h4>Top Reviews From Introduction To User Experience Design</h4>
                        
                            @foreach($coursereviews as $allrecord)
                                <div class="introduction-review-bx">
                                    <script>
                                                            $(function() {
                                                            $('#lst{{$allrecord->id}}').raty({
                                                            starOn:    'star-on.png',
                                                                    starOff:   'star-off.png',
                                                                    start: {{$allrecord -> rating}},
                                                                    readOnly: true
                                                            });
                                                            });</script>
                                                <span class="lstreview lstreview_new" id="lst{{$allrecord->id}}"></span>
                                    <span>by AS {{$recordInfo->created_at->format('M d, Y')}}</span>
                                    <p>{{nl2br($allrecord->comment)}}</p>
                                </div>
                            @endforeach
                        

<!--                        <div class="see-rivews">
                            <a href="#">See More Reviews</a>
                        </div>-->
                    </div>
                </div>
                @else
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <div class="management-full">No reviews found. </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection