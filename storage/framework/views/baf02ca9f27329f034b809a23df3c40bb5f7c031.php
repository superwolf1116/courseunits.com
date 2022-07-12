<div class="likeunlike">
    <div class="liukeloader" id="lik<?php echo e($cid); ?>"><?php echo e(HTML::image("public/img/loading.gif", SITE_TITLE)); ?></div>
    <div class="likeunlike_in" id="likeunlikeid<?php echo e($cid); ?>">
        <?php echo $__env->make('elements.likeunlikeinner', ['cid'=>$cid], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>