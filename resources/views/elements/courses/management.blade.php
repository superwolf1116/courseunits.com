<div class="courses-main-bx active" id="activeproduct">
    <div class="row">

        {{Form::hidden('page', $page, ['id'=>'gigpage'])}}

        <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>

        @if(!$allrecords->isEmpty()) 
        <?php global $serviceDays; ?>
        @foreach($allrecords as $allrecord)
        @if ($allrecord->status == 1)
        <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right">
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
                    {{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title,'class'=>'card-img-top'])}}
                    <a href="#" class="course-category"><i class="fa fa-bookmark-o"></i> {{$allrecord->Category->name}}</a>
                    <div class="edit-categoris">
                        <a href="{{ URL::to( 'course-dashboard/'.$allrecord->slug)}}"><i class="fa fa-eye"></i> </a>
                        <a href="{{ URL::to( 'courses/edit/'.$allrecord->slug)}}"><i class="fa fa-pencil"></i> </a>
                        <a href="{{ URL::to( 'courses/delete/'.$allrecord->slug)}}"><i class="fa fa-trash-o"></i> </a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ URL::to( 'course-details/'.$allrecord->slug)}}">{{ mb_substr($allrecord->title,0,40)}}</a></h5>                    
                    <div class="course-rate-price">
                        <div class="rating">
                            <span><?php echo number_format($allrecord->User->average_rating,1); ?></span>
                                <a href="{{ URL::to( 'course-dashboard/'.$allrecord->slug)}}"><?php echo $allrecord->User->total_review; ?> Ratings</a>                                                                
                        </div>
                        <div class="price">{{CURR}}{{$allrecord->price}}</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach

        @if($page == 1)

        @endif
        <script>$('#reqloaddiv').show();</script>
        @else
        @if($page == 1)
        <script>$('#reqloaddiv').hide();</script>
        <div class="col-md-12"><div class="management-full">No courses found. </div></div>
        @else
        <script>$('#reqloaddiv').hide();</script>
        @endif
        @endif
        @if(!$allrecords->isEmpty() && count($allrecords) >= $limit)
        <div class="loadmore" id="reqloaddiv">
            <span class="loadmorebtn" id="loadmorebtn" onclick="gigloadmore()">Load more...</span>
        </div>
        @endif



    </div>
</div>
<div role="tabpanel" class="courses-main-bx" id="draft">
    <div class="row">

        {{Form::hidden('page', $page, ['id'=>'gigpage'])}}

        <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>

        @if(!$allrecords->isEmpty()) 
        <?php global $serviceDays; ?>
        @foreach($allrecords as $allrecord)
        @if ($allrecord->status == 0)
        <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right">
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
                    {{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title,'class'=>'card-img-top'])}}
                    <a href="#" class="course-category"><i class="fa fa-bookmark-o"></i> {{$allrecord->Category->name}}</a>
                    <div class="edit-categoris">
                        <a href="{{ URL::to( 'courses/edit/'.$allrecord->slug)}}"><i class="fa fa-pencil"></i> </a>
                        <a href="{{ URL::to( 'courses/delete/'.$allrecord->slug)}}"><i class="fa fa-trash-o"></i> </a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ URL::to( 'course-details/'.$allrecord->slug)}}">{{ mb_substr($allrecord->title,0,40)}}</a></h5>                    
                    <div class="course-rate-price">
                        <div class="rating">
                            <span>4.4</span>
                            <a href="#">578 Ratings</a>                      
                        </div>
                        <div class="price">{{CURR}}{{$allrecord->price}}</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach

        @if($page == 1)

        @endif
        <script>$('#reqloaddiv').show();</script>
        @else
        @if($page == 1)
        <script>$('#reqloaddiv').hide();</script>
        <div class="col-md-12"><div class="management-full">No courses found. </div></div>
        @else
        <script>$('#reqloaddiv').hide();</script>
        @endif
        @endif
        @if(!$allrecords->isEmpty() && count($allrecords) >= $limit)
        <div class="loadmore" id="reqloaddiv">
            <span class="loadmorebtn" id="loadmorebtn" onclick="gigloadmore()">Load more...</span>
        </div>
        @endif



    </div>
</div>
