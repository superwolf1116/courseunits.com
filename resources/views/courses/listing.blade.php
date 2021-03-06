@extends('layouts.dashboard')
@section('content')
<script type="text/javascript">
    var img_path = "{!! HTTP_PATH !!}/public/img";
</script>
{{ HTML::script('public/js/jquery.raty.min.js')}}
@if($trendings)
<section class="main-categories-section">
    <div class="container">
        <h1>{{$catInfo->name}} Courses</h1>
        <?php $subcats = DB::table('categories')->where('parent_id', $catInfo->id)->where('status', 1)->orderBy('name', 'DESC')->limit(5)->get(); ?>
        @if($subcats)
        <div class="main-search-categories">
            <ul>
                @foreach($subcats as $subcat)
                <li><a class="<?php echo $subcat->slug == $subcatslug ? 'active' : ''; ?>" href="{{ URL::to( 'courses/'.$catInfo->slug.'/'.$subcat->slug)}}">{{$subcat->name}}</a></li>
                @endforeach


            </ul>
        </div>
        @endif
    </div>
</section>
@if(!$trendings->isEmpty())
<section class="search-categories-section sfs">
    <div class="container">
        <div class="categories-header" data-aos="zoom-in">
            <h2 class="main-title">Trending</h2>

        </div>
        <div class="courses-main-bx">
            <div class="row">
                @forelse($trendings as $trending)
                @if(isset($trending->User->slug))
                <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right">
                    <div class="card">
                        <div class="card-img">
                            <?php
                            $gigimgname = '';
                            if (isset($trending->image) && !empty($trending->image)) {
                                $path = COURSE_FULL_UPLOAD_PATH . $trending->image;
                                if (file_exists($path) && !empty($trending->image)) {
                                    $gigimgname = COURSE_FULL_DISPLAY_PATH . $trending->image;
                                }
                            }
                            if ($gigimgname == '') {
                                $gigimgname = HTTP_PATH . '/public/img/front/dummy.png';
                            }
                            ?>
                            <img class="card-img-top lazy" src="{{HTTP_PATH}}/public/img/loading2.gif" data-original="{{$gigimgname}}">
                            <a href="{{ URL::to( 'courses/'.$trending->Category->slug.'/'.$trending->Subcategory->slug)}}" class="course-category"><i class="fa fa-bookmark-o"></i> {{$trending->Subcategory->name}}</a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ URL::to( 'course-details/'.$trending->slug)}}">{{$trending->title}}</a></h5>
                            <p class="card-text">by <a href="{{ URL::to( 'public-profile/'.$trending->User->slug)}}">{{$trending->User->first_name.' '.$trending->User->last_name}}</a></p>
                            <div class="course-rate-price">
                                <div class="rating">
                                    <?php
                                    $course_id = $trending->id;
$overallrating =  DB::table('reviews')->select(DB::raw('AVG(rating) as rating'), DB::raw('count(*) as reviewcnt'))->where('course_id', $course_id)->first(); 
       $allRate = $overallrating->rating;
       $allRwCnt = $overallrating->reviewcnt;
                                    ?>
                                    <span><?php echo number_format(round($allRate), 1); ?></span>
                                    <a href="{{ URL::to( 'course-details/'.$trending->slug)}}"><?php echo $allRwCnt; ?> Ratings</a>                      
                                </div>
                                <div class="price">${{$trending->price}}</div>
                            </div>
                            <div class="course-cart">
                                <div class="course_like">
                                    @include('elements.likeunlike', ['cid'=>$trending->id])
                                </div>
                                <div class="cart_listbtn">
                                    <?php
                                    $user_id = Session::get('user_id');
                                    if (!empty($user_id)) {
                                        $purchsedInfo = DB::table('orderitems')->where('buyer_id', $user_id)->where('course_id', $trending->id)->first(); //echo '<pre>';print_r($purchsedInfo->created_at);exit;
                                        if ($purchsedInfo) {
                                            ?>
                                            <a href="{{URL::to( 'course-dashboard/'.$trending->id.'-'.$trending->slug)}}" class="cart_btn">Go to course</a>
                                        <?php } else { ?>
                                            <?php
                                            if (Session::get('user_id')) {
                                                $user_sess_id = Session::get('user_id');
                                            } else {
                                                $user_sess_id = 0;
                                            }
                                            $getcart = DB::table('carts')->where('course_id', $trending->id)->where('user_id', $user_sess_id)->first();

                                            if (isset($getcart->course_id)) {
                                                if ($getcart->course_id == $trending->id) {
                                                    ?>
                                                    <a class="cart_btn" href='{{URL::to( 'viewcart')}}' id='gotocart'>Go to Cart</a>
                                                <?php } else { ?>
                                                    <a class="cart_btn" href='javascript:void();' id = 'addtocartnew_<?php echo $trending->id; ?>' onclick = 'addtocart("<?php echo $trending->id; ?>")'>Add to cart</a>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <a class="cart_btn" href='javascript:void();' id = 'addtocartnew_<?php echo $trending->id; ?>' onclick = 'addtocart("<?php echo $trending->id; ?>")'>Add to cart</a>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php
                                        if (Session::get('user_id')) {
                                            $user_sess_id = Session::get('user_id');
                                        } else {
                                            $user_sess_id = 0;
                                        }
                                        $getcart = DB::table('carts')->where('course_id', $trending->id)->where('user_id', $user_sess_id)->first();

                                        if (isset($getcart->course_id)) {
                                            if ($getcart->course_id == $trending->id) {
                                                ?>
                                                <a class="cart_btn" href='{{URL::to( 'viewcart')}}' id='gotocart'>Go to Cart</a>
                                            <?php } else { ?>
                                                <a class="cart_btn" href='javascript:void();' id = 'addtocartlist_<?php echo $trending->id; ?>' onclick = 'addtocart("<?php echo $trending->id; ?>")'>Add to cart</a>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <a class="cart_btn" href='javascript:void();' id = 'addtocartlist_<?php echo $trending->id; ?>' onclick = 'addtocart("<?php echo $trending->id; ?>")'>Add to cart</a>
                                        <?php } ?>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @empty
                <div class="no_record">No more records found.</div>
                @endforelse

            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($globalSubSubCategories[$catInfo->id]))
<section class="popular-topics-section" data-aos="fade-up">
    <div class="container">
        <div class="courses-header">
            <h2 class="main-title">Popular Topics</h2>
        </div>
        <div class="categories-main-bx">
            <div id="popular-topics"  class="owl-carousel">
                @if($globalSubSubCategories[$catInfo->id]) 
                @foreach($globalSubSubCategories[$catInfo->id] as $cat) 
                <?php //echo '<pre>';print_r($cat);exit;  ?>
                <div class="popular-topics-slides" data-aos="fade-right">
                    <div class="card">
                        <div class="card-img">
                            <?php
                            $catimgname = '';
                            if (isset($cat->home_image) && !empty($cat->home_image)) {
                                $path = CATEGORY_FULL_UPLOAD_PATH . $cat->home_image;
                                if (file_exists($path) && !empty($cat->home_image)) {
                                    $catimgname = CATEGORY_FULL_DISPLAY_PATH . $cat->home_image;
                                }
                            }
                            if ($catimgname == '') {
                                $catimgname = HTTP_PATH . '/public/img/front/category-img1.png';
                            }
                            ?>
                            <img class="card-img-top" src="{{$catimgname}}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-logo">
                                <a href="{{ URL::to( 'courses/'.$cat->slug)}}">{{$cat->name}}</a>
                            </h5>
                        </div>
                    </div>
                </div>
                @endforeach 
                @endif

            </div>
        </div>
    </div>
</section>
@endif
@endif

<!--<section class="search-categories-section">
    <div class="container">
        <div class="categories-header" data-aos="zoom-in">
            <h2 class="main-title">Trending</h2>

        </div>
        </div>
        </section>-->
{{ Form::open(array('method' => 'post', 'id' => 'searchform')) }}
<section class="search-categories-section search-categories--list-section">
    @if($catInfo)
    <div class="courses-header development-courses-header">
        <div class="container">
            <h2 class="main-title">All {{$catInfo->name}} Courses</h2>
        </div>
    </div>
    @else  
    <div class="courses-header search-courses-header">
        <div class="container">
            <h2 class="main-title">
                {{$allrecordcount}}
                @if($olftitle)
                results for "{{$olftitle}}"
                @else
                top results
                @endif
            </h2>
        </div>
    </div>
    @endif



    @include('elements.courses.filters')

    <div class="search-courses-main-bx">
        <div class="container">
            <div class="searchloader displaynone" id="searchloader">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
            <div class="search-courses-bx" id="loadcourses">
                @include('elements.courses.listing')
            </div>
        </div>
    </div>
</section>
{{ Form::close()}}
<script>

    function addtocart(cid) {
        $.ajax({
            type: 'GET',
            url: "<?php echo HTTP_PATH; ?>/addtocart/" + cid,
            cache: false,
//            data: $('#AddToCartMain' + cid).serialize(),            
            success: function (result) {

                $("#addtocartnew_" + cid).removeAttr("onclick");
                $("#addtocartlist_" + cid).removeAttr("onclick");
                $("#addtocartnew_" + cid).addClass("ato_card");
                $("#addtocartlist_" + cid).addClass("ato_card");
                $("#addtocartnew_" + cid).html("Go To Cart");
                $("#addtocartlist_" + cid).html("Go To Cart");
                $("#addtocartnew_" + cid).attr('href', "<?php echo HTTP_PATH ?>/viewcart");
                $("#addtocartlist_" + cid).attr('href', "<?php echo HTTP_PATH ?>/viewcart");
                updateHeaderCount();
            },
            error: function () {

            }
        });


    }

    function updateHeaderCount() {
        $.ajax({
            type: 'GET',
            url: "<?php echo HTTP_PATH; ?>/updateCount",
            cache: false,
            data: {},
            success: function (result) {
                if (result) {
                    $("#update_cart").html(result);
                }
            }
        });
    }


</script>
<script>
    $(function () {
        $('#popular-topics').owlCarousel({
            rtl: false,
            loop: true,
            nav: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 500,
            slideSpeed: 3000,
            autoplayHoverPause: true,
            goToFirstSpeed: 100,
            margin: 15,
            responsive: {
                0: {items: 1},
                479: {items: 1},
                500: {items: 1},
                766: {items: 2},
                1000: {items: 3},
                1280: {items: 4}
            }

        })

    });
</script>

<script> 
    $(document).ready(function () {
        
        $(".deltime").click('change', function (event) {
            updateresult ();
        });
        $(".deltimesub").click('change', function (event) {
            updateresult ();
        });
        $(".langg").click('change', function (event) {
            updateresult ();
        });
        $(document).on('click', '.ajaxpagee a', function () {
            
            var npage = $(this).html();
            var pageidd = $('#pageidd').val();
            if ($(this).html() == '??') {
                npage = parseInt(pageidd) + 1;
            } else if ($(this).html() == '??') {
                npage = parseInt(pageidd) - 1;
            }
            $('#pageidd').val(npage);
            updateresult ();
            return false;
        });
        
        $(".numbrreg").keypress(function (event) {
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault(); //stop character from entering input
            }
        });
    });
    function applyfilter(){ 
        updateresult()
    }
    
    function updateresult(){ 
        var thisHref = $(location).attr('href');
        $.ajax({
            url: thisHref,
            type: "POST",
            data: $('#searchform').serialize(),
            beforeSend: function () { $("#searchloader").show();},
            complete: function () {$("#searchloader").hide();},
            success: function (result) {
               $('#loadcourses').html(result);
            }
        });
    }  
    
    function clearfilter(){
        window.location.href = window.location.protocol;
    }
    
</script>
@endsection