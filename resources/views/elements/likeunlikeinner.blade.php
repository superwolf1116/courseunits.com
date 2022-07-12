@if(Session::get('user_id')) 
    @if(in_array($cid, $mysavecourses))
         <button type="button" class="btn btn-secondary" title="Remove from wishlist" onclick="addtolike({{$cid}}, 0)">
             <i class="fa fa-heart"></i>
         </button>
     @else 
     <button type="button" class="btn btn-secondary" title="Add to wishlist" onclick="addtolike({{$cid}}, 1)">
             <i class="fa fa-heart-o"></i>
         </button>
     @endif
 @else
     <button type="button" class="btn btn-secondary" title="Add to wishlist" onclick="javascript:alert('You must login to save this course in your wishlist.')">
         <i class="fa fa-heart-o"></i>
     </button>
 @endif