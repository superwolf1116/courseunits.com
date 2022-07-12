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
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span>4.4  (2,912)</span>
                                <strong>73,801 students</strong>
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
                                <strong>Last updated {{$recordInfo->created_at->format('M/Y')}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb-details">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{$recordInfo->Category->name}}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$recordInfo->Subcategory->name}}</a></li>
                                <?php if(isset($recordInfo->Subsubcategory->name)){ ?>
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
                                <strong>${{$recordInfo->price}}</strong>
                                <span>$<?php echo number_format($recordInfo->price+200,2);?></span>
                                <div class="video-feverots"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                            </div>
                            <div class="video-addto">
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                                <a href="#" class="btn btn-light">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

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
                    <p>User Experience design is design that is user centered. The goal is to design artifacts that allow the users to meet their needs in the most effective efficient and satisfying manner. The LS Academy introduces the novice to a cycle of discovery and evaluation and a set of techniques that meet the user's needs.</p>
                    <p>This LS Academy is geared toward the novice. It is for learners that have heard about "user experience" or "user interface" design but don't really know much about these disciplines.   </p>
                    <p>In this LS Academy the learner is introduced to the four step user interface design cycle.These techniques are tools that are used in a standardized manner and give us use in our design.</p>


                </div>
                <div class="skills-detail">
                    <h3>SKILLS YOU WILL GAIN</h3>
                    <div class="my-skills">
                        <a href="#">Usability</a>
                        <a href="#">User Experience (UX)</a>
                        <a href="#">User Interface (UI)</a>
                    </div>


                </div>
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
                                <li><i aria-hidden="true" class="fa fa-star"></i><span>4.8 Instructor Rating</span></li>
                                <li><i aria-hidden="true" class="fa fa-certificate"></i><span>50,288 Reviews</span></li>
                                <li><i aria-hidden="true" class="fa fa-users"></i><span>10,205 Students</span></li>
                                <li><i aria-hidden="true" class="fa fa-play"></i><span>15 Courses</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="course-includes">
                    <h3>Course includes:</h3>
                    <ul>
                        <li><a href="#"><i>{{HTML::image('public/img/front/course-icon1.png', SITE_TITLE, ['id'=> ''])}}</i><span>12 hours on-demand video</span></a></li>
                        
                        <li><a href="#"><i>{{HTML::image('public/img/front/course-icon2.png', SITE_TITLE, ['id'=> ''])}}</i><span>69 downloadable resources</span></a></li>
                        <li><a href="#"><i>{{HTML::image('public/img/front/course-icon3.png', SITE_TITLE, ['id'=> ''])}}</i><span>Access on mobile and TV</span></a></li>
                        <li><a href="#"><i>{{HTML::image('public/img/front/course-icon4.png', SITE_TITLE, ['id'=> ''])}}</i><span>Assignments</span></a></li>
                        <li><a href="#"><i>{{HTML::image('public/img/front/course-icon5.png', SITE_TITLE, ['id'=> ''])}}</i><span>Beginner Level</span></a></li>
                        <li><a href="#"><i>{{HTML::image('public/img/front/course-icon6.png', SITE_TITLE, ['id'=> ''])}}</i><span>Language</span></a></li>
                        <li><a href="#"><i>{{HTML::image('public/img/front/course-icon7.png', SITE_TITLE, ['id'=> ''])}}</i><span>Certificate</span></a></li>
                        <li><a href="#"><i>{{HTML::image('public/img/front/course-icon8.png', SITE_TITLE, ['id'=> ''])}}</i><span>Lifetime access</span></a></li>
                        <li><a href="#"><i>{{HTML::image('public/img/front/course-icon9.png', SITE_TITLE, ['id'=> ''])}}</i><span>100% online</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection