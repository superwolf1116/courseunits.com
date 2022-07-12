<?php $__env->startSection('content'); ?>
<div class="main_dashboard">
    <section class="main-categories-section">
	  <div class="container">
	 <h1 class="explore">Explore Gigs by Categories</h1>
                <div class="tiltee">Find best gig by category </div>
				</div>
	</section>
    <section class="gigs-category">
    <div class="container">
        <div class="jobs_itle">
           
            <div class="categories-main-bx">
                        <div class="row">
                    <?php if($globalCategories): ?>
                        <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(URL::to('courses/'.$cat->slug)); ?>">
                            <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right">
                                <div class="card">
                                    <div class="card-img">
                                        <?php echo e(HTML::image(CATEGORY_FULL_DISPLAY_PATH.$cat->home_image, SITE_TITLE,array('class'=>'card-img-top'))); ?>

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="<?php echo e(URL::to('courses/'.$cat->slug)); ?>"><?php echo $cat->name; ?></a></h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>