<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    var img_path = "<?php echo HTTP_PATH; ?>/public/img";
</script>
<?php echo e(HTML::script('public/js/jquery.raty.min.js')); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#ratesellerform").validate();
    });
</script>
<style>
    .player {
        width: 100%;
        height: 60vh;
    }
</style>
<div class="video-banner" id="video-banner">
    <div class="container">
        <div class="video-banner-acedamy" id="videoDiv">
            <video
                controls
                crossorigin
                playsinline
                data-poster="<?php echo e(COURSE_FULL_DISPLAY_PATH.$recordInfo->image); ?>"
                id="player"
                class="player"
                >
                <!-- Video files -->
                <source
                    src="<?php echo e(COURSE_VIDEO_FULL_DISPLAY_PATH.$recordInfo->sample_video); ?>"
                    type="video/mp4"
                    size="576"
                    />
                <source
                    src="<?php echo e(COURSE_VIDEO_FULL_DISPLAY_PATH.$recordInfo->sample_video); ?>"
                    type="video/mp4"
                    size="720"
                    />
                <source
                    src="<?php echo e(COURSE_VIDEO_FULL_DISPLAY_PATH.$recordInfo->sample_video); ?>"
                    type="video/mp4"
                    size="1080"
                    />

            </video>
        </div>
    </div>
    <div class="video-course-btn" id="video-course-btn" onclick="myFunction()"><i class="fa fa-long-arrow-left"></i><span>Course content</span></div>
    <div class="video-course" id="myDIV">
        <h2>Course content <div class="video-course-show-btn" onclick="myFunction()"><i class="fa fa-times"></i></div></h2>
        <div id="main-video">
            <div class="accordion" id="faq">
                <?php if(!$sections->isEmpty()): ?>
                <?php $i=1; $j=1; ?>
                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-header" id="faqhead<?php echo e($section->id); ?>">
                        <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq<?php echo e($section->id); ?>"
                           aria-expanded="true" aria-controls="faq<?php echo e($section->id); ?>">
                            <span>Section <?php echo e($j); ?>: <?php echo e($section->section_title); ?></span>
                            <?php
                            
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
                            <small><?php echo e($sum); ?></small>
                        </a>
                    </div>

                    <div id="faq<?php echo e($section->id); ?>" class="collapse" aria-labelledby="faqhead<?php echo e($section->id); ?>" data-parent="#faq">
                        <div class="card-body">
                            <?php $contents = DB::table('coursecontents')->where('section_id', $section->id)->where('course_id', $recordInfo->id)->get(); ?>

                            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="select-videos" onclick="getVideo('<?php echo e($content->video); ?>')">
                               
                                <label>
                                    <?php echo e($i); ?>. <?php echo e($content->lecture_title); ?>

                                    <span><i class="fa fa-play-circle"></i> <?php echo e($content->video_time); ?></span>
                                </label>
                            </div>
                            <?php $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
                <?php $j++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

        </div>
        <div>
        </div>
    </div>
</div>
<?php global $level; ?>
<section class="mydetails-section mydetails-section-new" id="mydetails-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="about-detail">
                    <h2>About This Course</h2>
                    <p><?php echo $recordInfo->sub_title; ?></p>

                </div>
                <div class="overview-skills-detail">
                    <div class="overview-skills">
                        <label>By the numbers</label>
                        <div class="skills-div">
                            <ul>
                                <li>Skill level: <?php echo e($level[$recordInfo->level]); ?></li>
                                <?php $lacturCount = DB::table('coursecontents')->where('course_id', $recordInfo->id)->count(); ?>
                                <li>Lectures: <?php echo e($lacturCount); ?></li>
                                <?php $studentCount = DB::table('payments')->where('course_id', $recordInfo->id)->count(); ?>
                                <li>Students: <?php echo e($studentCount); ?></li>
                                <!--<li>Video: 2 total hours</li>-->
                                <!--<li>Languages: English</li>-->	
                            </ul>
                        </div>
                    </div>
                    <!--                    <div class="overview-skills">
                                            <label>Features</label>
                                            <div class="skills-div">
                                                <p>Available on <strong>iOS</strong> and <strong>Android</strong></p>
                                            </div>
                                        </div>-->

                    <div class="overview-skills">
                        <label>Description</label>
                        <div class="skills-div">
                            <p><?php echo $recordInfo->description; ?></p>
                        </div>
                    </div>

                    <div class="overview-skills">
                        <label>Instructor</label>
                        <div class="skills-div">
                            <div class="skills-div-user">
                                <?php if(isset($userInfo->profile_image)): ?>
                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$userInfo->profile_image, SITE_TITLE, ['id'=> ''])); ?>

                                <?php else: ?>
                                <?php echo e(HTML::image('public/img/front/user-1.png', SITE_TITLE, ['id'=> ''])); ?>

                                <?php endif; ?>
                            </div>
                            <div class="skills-div-text">
                                <h3><?php echo e($userInfo->first_name.' '.$userInfo->last_name); ?></h3>
                                <p><?php echo e($userInfo->about_short); ?></p>
                            </div>
                            <!--                            <div class="social-scills">
                                                            <a href="#"><i aria-hidden="true" class="fa fa-facebook"></i></a>
                                                            <a href="#"><i aria-hidden="true" class="fa fa-twitter"></i></a>
                                                            <a href="#"><i aria-hidden="true" class="fa fa-instagram"></i></a>
                                                            <a href="#"><i aria-hidden="true" class="fa fa-linkedin"></i></a>
                            
                                                        </div>-->
                            <p><?php echo $userInfo->about; ?><p>
                        </div>
                    </div>

                    <?php if($userInfo->id != Session::get('user_id')): ?>
                    <div class="rating_sect"> 
                        <?php if($myorderInfo->status == 1 && $myorderInfo->is_buyer_rate != 1): ?>
                        <div class="req_dtl_head">Give Review/Rating</div> 
                        <div class="comment-form reviewrate">
                            <div class="ee er_msg postfrm"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>   
                            <?php echo e(Form::open(array('method' => 'post', 'id' => 'ratesellerform'))); ?>

                            <div class="input textarea">
                                <?php echo e(Form::textarea('comment', null, ['class'=>'form-control required', 'placeholder'=>"Write your comment", 'autocomplete' => 'off', 'rows'=>5, 'id'=>'description'])); ?>

                            </div>   
                            <div class="giverate">
                                <div class="giverate_str">
                                    <script>
                                        $(function() {
                                            $('#avgRating0').raty({
                                                starOn: 'star-on.png',
                                                starOff: 'star-off.png',
                                                start: 0,
                                                number: 5,
                                                half: true,
                                                click: function(score, evt) {
                                                $("#selectrating").val(score);
                                                }
                                            });
                                        });
                                    </script>
                                    <?php echo e(Form::hidden('rating', null, ['class'=>'form-control required', 'id'=>'selectrating'])); ?>

                                    <span id="avgRating0"></span>
                                </div>
                                <div class="giverate_btn"><input class="btn btn-success" value="Submit" type="submit"></div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                        <?php elseif($myorderInfo->status == 1 && $myorderInfo->is_buyer_rate == 1): ?>   
                        <div class="req_dtl_head">You already rate this order</div> 
                        <div class="comment-form reviewrate">
                            <div class="al_comment"><?php echo e(isset($oldRatingInfo->comment)?$oldRatingInfo->comment:''); ?></div>
                            <div class="al_rate">
                                <script>
                                    $(function() {
                                    $('#avgRating224').raty({
                                    starOn:    'star-on.png',
                                            starOff:   'star-off.png',
                                            start: <?php echo e(isset($oldRatingInfo->rating)?$oldRatingInfo->rating:0); ?>,
                                            readOnly: true
                                    });
                                    });
                                </script>
                                <span id="avgRating224"></span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                </div>


            </div>

        </div>
    </div>
</section>
</div>
<script>
    function getVideo(val){
    var videoFile = '<?php echo COURSE_VIDEO_FULL_DISPLAY_PATH; ?>' + val
            $('#videoDiv video source').attr('src', videoFile);
    $("#videoDiv video")[0].load();
    }

    function myFunction() {
    var x = document.getElementById("myDIV");
    var y = document.getElementById("video-course-btn");
    if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    $('#video-banner').width('74%')
            $('#mydetails-section').width('74%')
    } else {
    x.style.display = "none";
    y.style.display = "block";
    $('#video-banner').width('100%')
            $('#mydetails-section').width('100%')
    }
    }
</script>
<script>
    $(window).scroll(function () {
    if ($(this).scrollTop() > 5) {
    $(".video-course").addClass("video-course-fixed-me");
    } else {
    $(".video-course").removeClass("video-course-fixed-me");
    }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>