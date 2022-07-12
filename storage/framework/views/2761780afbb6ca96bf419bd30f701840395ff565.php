<?php $__env->startSection('content'); ?>
<section class="static_section">
    <!--<?php echo $__env->make('elements.topcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>-->
    <div class="container">
    <div class="st_pages">
        <h1><?php echo $pageInfo->title; ?></h1>
        <div class="st_pages_cnt"><?php echo $pageInfo->description; ?></div>
    </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>