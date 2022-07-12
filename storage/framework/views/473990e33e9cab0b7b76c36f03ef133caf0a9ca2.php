<?php $__env->startSection('content'); ?>
<section class="main-categories-section">
    <div class="container">
        <h1>Wishlist</h1>
        <div class="main-search-categories">

        </div>
    </div>
</section>
<section class="search-categories-section">
    <div class="container " id="mng_course">
        <div class="courses-main-bx active" id="activeproduct">
            <div class="row">

                <div class="main_loader" id="loaderID wish_loader"><?php echo e(HTML::image("public/img/website_load.svg", SITE_TITLE)); ?></div>

                <?php if(!$allrecords->isEmpty()): ?> 
                <?php global $serviceDays; ?>
                <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right" id="coursediv<?php echo e($allrecord->id); ?>">
                    <div class="card">
                        <div class="card-img">
                            <?php
                            $gigimgname = '';
                            if ($allrecord->image) {
                                $path = COURSE_FULL_UPLOAD_PATH . $allrecord->image;
                                if (file_exists($path) && !empty($allrecord->image)) {
                                    $gigimgname = COURSE_FULL_DISPLAY_PATH . $allrecord->image;
                                }
                            }
                            ?>
                            <?php echo e(HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title,'class'=>'card-img-top'])); ?>

                            <a href="<?php echo e(URL::to( 'courses/'.$allrecord->Category->slug)); ?>" class="course-category"><i class="fa fa-bookmark-o"></i> <?php echo e($allrecord->Category->name); ?></a>
                            <div class="edit-categoris">
                                <a href="javascript:void();" title="Remove From Wishlist" onclick="removesavedgig(<?php echo e($allrecord->id); ?>)"><i class="fa fa-close"></i> </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php echo e(URL::to( 'course-details/'.$allrecord->slug)); ?>"><?php echo e(mb_substr($allrecord->title,0,40)); ?></a></h5>                    
                            <div class="course-rate-price">
                                <div class="rating">
                                    <?php
                                    $course_id = $allrecord->id;
$overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id', $course_id)->first(); 
       $allRate = $overallrating->rating;
       $allRwCnt = $overallrating->reviewcnt;
                                    ?>
                                    <span><?php echo number_format(round($allRate), 1); ?></span>
                                    <a href="<?php echo e(URL::to( 'course-details/'.$allrecord->slug)); ?>"><?php echo $allRwCnt; ?> Ratings</a>                       
                                </div>
                                <div class="price"><?php echo e(CURR); ?><?php echo e($allrecord->price); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
<div class="col-md-12"><div class="management-full">No record found.</div></div>
                
                <?php endif; ?>



            </div>
        </div>
    </div>
</section>
<script>
    function removesavedgig(cid) {
        if (confirm('Are you sure you want to remove course from wishlist?') == true) {
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/users/deletelikeunlike",
                type: "POST",
                data: {'cid': cid, _token: '<?php echo e(csrf_token()); ?>'},
                beforeSend: function () {
                    $('#wish_loader').show();
                },
                complete: function () {
                    $('#wish_loader').hide();
                },
                success: function (result) {
                    $('#coursediv' + cid).remove();
                }
            });
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>