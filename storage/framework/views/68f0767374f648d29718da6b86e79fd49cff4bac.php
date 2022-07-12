<?php if(Session::get('user_id')): ?> 
    <?php if(in_array($cid, $mysavecourses)): ?>
         <button type="button" class="btn btn-secondary" title="Remove from wishlist" onclick="addtolike(<?php echo e($cid); ?>, 0)">
             <i class="fa fa-heart"></i>
         </button>
     <?php else: ?> 
     <button type="button" class="btn btn-secondary" title="Add to wishlist" onclick="addtolike(<?php echo e($cid); ?>, 1)">
             <i class="fa fa-heart-o"></i>
         </button>
     <?php endif; ?>
 <?php else: ?>
     <button type="button" class="btn btn-secondary" title="Add to wishlist" onclick="javascript:alert('You must login to save this course in your wishlist.')">
         <i class="fa fa-heart-o"></i>
     </button>
 <?php endif; ?>