@extends('layouts.inner')
@section('content')
<div class="teacher-banner">
    <div class="container">
        <div class="banner-text">
            <h1>Make a global impact</h1>
            <p>Create an online video course and earn money by<br> teaching people around the world.</p>

            <a class="btn btn-primary" href="{{URL::to('teacher-signup')}}">Become an Instructor</a></span>

        </div>
    </div>
</div>
</div>

<section class="potential-section">
    <div class="container">
        <h2 class="main-title">Discover Your Potential</h2>
        <div class="potential-main-bx">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="potential-icon">
                            {{HTML::image('public/img/front/earn-money-icon.png', SITE_TITLE,array('class'=>''))}}
                            
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Earn Money</h5>
                            <p class="card-text">Earn money every time a student purchases your course. Get paid monthly through PayPal or Payoneer, it’s your choice.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="potential-icon">
                            {{HTML::image('public/img/front/inspire-students-icon.png', SITE_TITLE,array('class'=>''))}}
                            
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Inspire Students</h5>
                            <p class="card-text">Earn money every time a student purchases your course. Get paid monthly through PayPal or Payoneer, it’s your choice.</p>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="potential-icon">
                            {{HTML::image('public/img/front/community-icon.png', SITE_TITLE,array('class'=>''))}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Join Our Community</h5>
                            <p class="card-text">Earn money every time a student purchases your course. Get paid monthly through PayPal or Payoneer, it’s your choice.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="help-service-section">
    <div class="help-service-left">
        <div class="book-posts aos-init aos-animate" data-aos="fade-up">
            <div class="my-contact2">
                <div class="help-service-bxa">
                    <h2 class="ser-subtitle">We're Here To Help</h2>
                    <p>Our Instructor Support Team is here for you 24/7 to help you through your course creation needs. Use our Teaching Center, a 
                        resource center to help you through the process. Join Studio U and get peer-to-peer support from our engaged instructor community. 
                        This community group is always on, always there, and always helpful.</p>
                </div>
            </div>   
        </div>
    </div>
    <div class="help-service-right-banner">
    </div>
</section>
<section class="Opportunities-section" data-aos="fade-up">
    <div class="container">
        <div class="Opportunities-main">
            <h2>Exceptional Opportunities</h2>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-3"> 
                    <div class="Opportunities-bx"> 
                        <div class="counting-bx"> 
                            <strong class="counting" data-count="50">50m</strong>
                            <span>m</span>
                        </div>
                        <span>Students Worldwide</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-3"> 
                    <div class="Opportunities-bx"> 
                        <div class="counting-bx"> 
                            <strong class="counting" data-count="40">40+</strong>
                            <span>+</span>
                        </div>
                        <span>Different Languages</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-3"> 
                    <div class="Opportunities-bx"> 
                        <div class="counting-bx"> 
                            <strong class="counting" data-count="295">295m</strong>
                            <span>m</span>
                        </div>
                        <span>Course Enrollments</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-3"> 
                    <div class="Opportunities-bx"> 
                        <div class="counting-bx"> 
                            <strong class="counting" data-count="120">120+</strong>
                            <span>+</span>
                        </div>
                        <span>Countries Taught</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@if(!$testimonils->isEmpty()) 
<section class="expand-section">
    <div class="container">
        <h2>Expand Your Reach</h2>
        <div class="expand-bx">
            <div class="row">
                @foreach($testimonils as $allrecord)
                <div class="col-xs-12 col-md-12 col-lg-4"> 
                    <div class="expand-card"> 
                        <div class="expand-text"> 
                            <h3>{{$allrecord->client_name}}</h3>
                            <h5>{{$allrecord->country}}</h5>
                        </div>
                        <div class="expand-img">
                            {{HTML::image(TESTIMONIAL_SMALL_DISPLAY_PATH.$allrecord->image, SITE_TITLE)}}
                        </div>
                        <p>{!! str_limit($allrecord->description, $limit = 120, $end = '...') !!}</p>
                    </div>
                </div>
                @endforeach  


            </div>
        </div>
</section>
@endif

<section class="become-section">
    <div class="container">
        <h2>Become an Instuctor Today</h2>
        <p>Join the world's largest online learning marketplace.</p>
        <a href="{{URL::to('teacher-signup')}}" class="btn btn-primary">Get Started</a>
    </div>
</section>
@endsection