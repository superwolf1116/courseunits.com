<?php $__env->startSection('content'); ?>
<?php echo e(HTML::script('public/js/facebox.js')); ?>

<?php echo e(HTML::style('public/css/facebox.css')); ?>

<script type="text/javascript">
    $(document).ready(function ($) {
        $('.close_image').hide();
        $('a[rel*=facebox]').facebox({
            closeImage: '<?php echo HTTP_PATH; ?>/public/img/close.png'
        });
    });
</script>
<div class="cart-banner">
    <div class="container container-header">
        <h1>My courses</h1>
    </div>
</div>
<section class="search-categories-section">
    <div class="container ">
        <div class="courses-main-bx active" id="activeproduct">
        <div class="row">


            <div class="main_loader" id="loaderID"><?php echo e(HTML::image("public/img/website_load.svg", SITE_TITLE)); ?></div>

            <?php if(!$allrecords->isEmpty()): ?> 
            <?php global $serviceDays; ?>
            <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right">
                <div class="card">
                    <div class="card-img">
                        <?php
                        //echo '<pre>';print_r($allrecord);exit;
                        $gigimgname = '';
                        if ($allrecord->Course->image) {
                            $path = COURSE_FULL_UPLOAD_PATH . $allrecord->Course->image;
                            if (file_exists($path) && !empty($allrecord->Course->image)) {
                                $gigimgname = COURSE_FULL_DISPLAY_PATH . $allrecord->Course->image;
                            }
                        }
                        ?>
                        <?php echo e(HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->Course->title,'class'=>'card-img-top'])); ?>

                        <a href="<?php echo e(URL::to( 'course-dashboard/'.$allrecord->Course->slug)); ?>" class="course-category"><i class="fa fa-bookmark-o"></i> <?php echo e($allrecord->Course->Category->name); ?></a>
                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php echo e(URL::to( 'course-dashboard/'.$allrecord->Course->slug)); ?>"><?php echo e(mb_substr($allrecord->Course->title,0,40)); ?></a></h5>                    
                        <div class="course-rate-price">
                            <div class="rating">
                                <?php
                                    $course_id = $allrecord->Course->id;
//                                    $reviews = DB::table('reviews')->where('course_id', $course_id)->count();
$overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id', $course_id)->first(); 
       $allRate = $overallrating->rating;
       $allRwCnt = $overallrating->reviewcnt;
                                    ?>
                                    <span><?php echo number_format(round($allRate), 1); ?></span>
                                    <a href="<?php echo e(URL::to( 'course-dashboard/'.$allrecord->Course->slug)); ?>"><?php echo $allRwCnt; ?> Ratings</a>    
                            </div>
                            <div class="price"><?php echo e(CURR); ?><?php echo e($allrecord->amount); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
            <div class="col-md-12"><div class="management-full">No courses found. </div></div>
            <?php endif; ?>



        </div>
    </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>