@extends('layouts.inner')
@section('content')
{{ HTML::script('public/js/facebox.js')}}
{{ HTML::style('public/css/facebox.css')}}
<script type="text/javascript">
    $(document).ready(function ($) {
        $('.close_image').hide();
        $('a[rel*=facebox]').facebox({
            closeImage: '{!! HTTP_PATH !!}/public/img/close.png'
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

                            @foreach($allrecords as $allrecord)
                            <div class="product_tr">
                                <div class="product_td product-title-head">
                                    @if($allrecord->Order->quantity == 1)
                                    <?php
                                    $gigimgname = '';
                                    if ($allrecord->Course->image) {
                                        $path = COURSE_FULL_UPLOAD_PATH . $allrecord->Course->image;
                                        if (file_exists($path) && !empty($allrecord->Course->image)) {
                                            $gigimgname = COURSE_FULL_DISPLAY_PATH . $allrecord->Course->image;
                                        }
                                    }
                                    ?>
                                    {{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->Course->title,'class'=>''])}}
                                    <span>{{$allrecord->Course->title}}</span>
                                    @else
                                    
                                    {{HTML::image("public/img/front/cart_image.png", SITE_TITLE,['title'=>$allrecord->Order->quantity.' Courses purchased','class'=>'cart_image'])}}
                                    <div class="courses-purchased">
                                        <span>{{$allrecord->Order->quantity}} Courses purchased</span><br><button href="#collapse1" class="nav-toggle">Show courses</button>
                                    </div>
                                    @endif
                                </div>
                                <div class="product_td product-date-head">
                                    {{$allrecord->created_at->format('M d, Y')}}
                                </div>

                                <div class="product_td product-price-head">
                                    <span><i class="fa fa-dollar" aria-hidden="true"></i> {{number_format($allrecord->amount,2)}}</span>
                                </div>
                                <div class="product_td payment-type-head">
                                    <span><i class="fa fa-dollar" aria-hidden="true"></i> {{number_format($allrecord->amount,2)}} {{$allrecord->Order->pay_type}}</span>
                                </div>
                                <div class="product_td product-date-head">
                                    {{$allrecord->transaction_id}}
                                </div>
                                <div class="product_td section_more"  id="collapse1" style="display:none">
                                    @if($allrecord->Order->quantity > 1)
                                    <?php $itemsInfo = DB::table('orderitems')->where('order_id', $allrecord->order_id)->get(); ?>
                                    @foreach($itemsInfo as $itemInfo)
                                    <?php $courseInfo = DB::table('courses')->where('id', $itemInfo->course_id)->first(); ?>
                                    <div class="showfst">
                                        <div class="img_prt">
                                            <?php
                                            $gigimgname = '';
                                            if ($courseInfo->image) {
                                                $path = COURSE_FULL_UPLOAD_PATH . $courseInfo->image;
                                                if (file_exists($path) && !empty($courseInfo->image)) {
                                                    $gigimgname = COURSE_FULL_DISPLAY_PATH . $courseInfo->image;
                                                }
                                            }
                                            ?>
                                            {{HTML::image($gigimgname, SITE_TITLE,['title'=>$courseInfo->title,'class'=>''])}}
                                            <span>{{$courseInfo->title}}</span>
                                        </div>
                                        <div class="prc_prt">
                                            {{number_format($itemInfo->amount,2)}}
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                            </div>

                            @endforeach
                        </div>

                    </div>


                </div>
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
@endsection