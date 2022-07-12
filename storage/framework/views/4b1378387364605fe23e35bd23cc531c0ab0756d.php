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
        <h1>Purchase History</h1>
    </div>
</div>
<section class="search-categories-section">
    <div class="container ">
        <div class="courses-main-bx active" id="activeproduct">
            <div class="row">
                <?php if(!$allrecords->isEmpty()): ?>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="payment-details">
                        <div class="pay-details">
                            <div class="product_hhd">
                                <div class="product_th product-title-head">
                                    Purchase history
                                </div>
                                <div class="product_th product-date-head">
                                    Date
                                </div>

                                <div class="product_th product-price-head">
                                    Total Price
                                </div>
                                <div class="product_th payment-type-head">
                                    Payment Type
                                </div>
                                <div class="product_th product-date-head">
                                    Transaction ID
                                </div>
                            </div>

                            <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product_tr">
                                <div class="product_td product-title-head">
                                    <?php if($allrecord->Order->quantity == 1): ?>
                                    <?php
                                    $gigimgname = '';
                                    if ($allrecord->Course->image) {
                                        $path = COURSE_FULL_UPLOAD_PATH . $allrecord->Course->image;
                                        if (file_exists($path) && !empty($allrecord->Course->image)) {
                                            $gigimgname = COURSE_FULL_DISPLAY_PATH . $allrecord->Course->image;
                                        }
                                    }
                                    ?>
                                    <?php echo e(HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->Course->title,'class'=>''])); ?>

                                    <a href="<?php echo e(URL::to( 'course-details/'.$allrecord->Course->slug)); ?>"><?php echo e($allrecord->Course->title); ?></a>
                                    <?php else: ?>
                                    
                                    <?php echo e(HTML::image("public/img/front/cart_image.png", SITE_TITLE,['title'=>$allrecord->Order->quantity.' Courses purchased','class'=>'cart_image'])); ?>

                                    <div class="courses-purchased">
                                        <span><?php echo e($allrecord->Order->quantity); ?> Courses purchased</span><br><button href="#collapse<?php echo e($allrecord->id); ?>" class="nav-toggle">Show courses</button>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_td product-date-head">
                                    <?php echo e($allrecord->created_at->format('M d, Y')); ?>

                                </div>

                                <div class="product_td product-price-head">
                                    <span><i class="fa fa-dollar" aria-hidden="true"></i> <?php echo e(number_format($allrecord->amount,2)); ?></span>
                                </div>
                                <div class="product_td payment-type-head">
                                    <span><i class="fa fa-dollar" aria-hidden="true"></i> <?php echo e(number_format($allrecord->amount,2)); ?> <?php echo e($allrecord->Order->pay_type); ?></span>
                                </div>
                                <div class="product_td product-date-head">
                                    <?php echo e($allrecord->transaction_id); ?>

                                </div>
                                <?php if($allrecord->Order->quantity > 1): ?>
                                <div class="product_td section_more"  id="collapse<?php echo e($allrecord->id); ?>" >
                                    
                                    <?php $itemsInfo = DB::table('orderitems')->where('order_id', $allrecord->order_id)->get(); ?>
                                    <?php $__currentLoopData = $itemsInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $courseInfo = DB::table('courses')->where('id', $itemInfo->course_id)->first(); ?>
                                    <div class="showfst">
                                        <div class="img_prt">
                                            <?php
                                            $imgname = '';
                                            if ($courseInfo->image) {
                                                $path = COURSE_FULL_UPLOAD_PATH . $courseInfo->image;
                                                if (file_exists($path) && !empty($courseInfo->image)) {
                                                    $imgname = COURSE_FULL_DISPLAY_PATH . $courseInfo->image;
                                                }
                                            }
                                            ?>
                                            <?php echo e(HTML::image($imgname, SITE_TITLE,['title'=>$courseInfo->title,'class'=>''])); ?>

                                            <a href="<?php echo e(URL::to( 'course-details/'.$courseInfo->slug)); ?>"><?php echo e($courseInfo->title); ?></a>
                                        </div>
                                        <div class="prc_prt">
                                            <i class="fa fa-dollar" aria-hidden="true"></i> <?php echo e(number_format($itemInfo->amount,2)); ?>

                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </div>
                                <?php endif; ?>

                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>


                </div>
                <?php else: ?>
                <div class="col-md-12"><div class="management-full">No record found.</div></div>
                
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script>

$(document).ready(function() {
		  $('.nav-toggle').click(function(){
			//get collapse content selector
			var collapse_content_selector = $(this).attr('href');

			//make the collapse content to be shown or hide
			var toggle_switch = $(this);
			$(collapse_content_selector).toggle(function(){
			  if($(this).css('display')=='none'){
                                //change the button label to be 'Show'
				toggle_switch.html('Show courses');
			  }else{
                                //change the button label to be 'Hide'
				toggle_switch.html('Hide courses');
			  }
			});
		  });

		});</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>