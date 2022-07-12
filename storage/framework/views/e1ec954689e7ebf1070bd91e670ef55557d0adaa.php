
<?php if(isset($allrecord->User->slug)): ?>
<?php global $level; ?>

    <div class="col-xs-12 col-md-12 col-lg-12 searchin-bx">
        <div class="card">
            <div class="search-card-img">
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
                <?php echo $__env->make('elements.likeunlikelist', ['cid'=>$allrecord->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><a href="<?php echo e(URL::to( 'course-details/'.$allrecord->slug)); ?>"><?php echo e($allrecord->title); ?></a></h5>
                <div class="price-courses">$<?php echo e($allrecord->price); ?></div>
                <p class="card-text"><?php echo e($allrecord->title); ?></p>
                <h6><span></span> <?php echo e($allrecord->User->first_name.' '.$allrecord->User->last_name); ?></h6>
                <?php
                    $course_id = $allrecord->id;
                    $overallrating = DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id', $course_id)->first();
                    if(isset($overallrating->rating) && $overallrating->rating > 0){
                        $allRate = $overallrating->rating;
                    }else{
                        $allRate = 0;
                    }
                    
                    $allRwCnt = $overallrating->reviewcnt;
                    
                    ?>
                <div class="courses-rating">
                    <?php //if($allRate > 0){ ?>
                    <script>
                        $(function() {
                        $('#avgRating2<?php echo $allrecord->id; ?>').raty({
                        starOn:    'star-on.png',
                                starOff:   'star-off.png',
                                start: <?php echo e($allRate); ?>,
                                readOnly: true
                        });
                        });</script>
                    <span class="pprate gigdtlrat" id="avgRating2<?php echo $allrecord->id; ?>"></span>
                    <span><?php echo number_format(round($allRate), 1); ?>  (<?php echo $allRwCnt; ?>)</span>
                    <?php // } ?>
                    <?php $studentCount = DB::table('payments')->where('course_id', $allrecord->id)->count(); ?>
                    <strong><?php echo e($studentCount); ?> students</strong>
                </div>
                  
                <?php
                $contents = DB::table('coursecontents')->where('course_id', $allrecord->id)->get();
                $contentCount = DB::table('coursecontents')->where('course_id', $allrecord->id)->count();

                $timeArray = DB::table('coursecontents')
                        ->select(DB::raw('video_time'))
                        ->where('course_id', $allrecord->id)
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
                <ul class="search-funslity">
                    <li><?php echo e($sum); ?> total</li>
                    <li><?php echo e($contentCount); ?> Lectures</li>
                    <li><?php echo e($level[$allrecord->level]); ?></li>

                </ul>
                <div class="cart_btn_dv">
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
                                    <a class="cart_btn" href='javascript:void();' id = 'addtocartlist_<?php echo $allrecord->id; ?>' onclick = 'addtocart("<?php echo $allrecord->id; ?>")'>Add to cart</a>
                                <?php }
                            } else {
                                ?>
                                <a class="cart_btn" href='javascript:void();' id = 'addtocartlist_<?php echo $allrecord->id; ?>' onclick = 'addtocart("<?php echo $allrecord->id; ?>")'>Add to cart</a>
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
                            <?php }
                        } else {
                            ?>
                            <a class="cart_btn" href='javascript:void();' id = 'addtocartlist_<?php echo $allrecord->id; ?>' onclick = 'addtocart("<?php echo $allrecord->id; ?>")'>Add to cart</a>
    <?php } ?>
<?php } ?>

                </div>
            </div>
        </div>
    </div>




<?php endif; ?>