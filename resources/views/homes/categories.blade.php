@extends('layouts.dashboard')
@section('content')
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
                    @if($globalCategories)
                        @foreach($globalCategories as $cat)
                        <a href="{{URL::to('courses/'.$cat->slug)}}">
                            <div class="col-xs-12 col-md-6 col-lg-3" data-aos="fade-right">
                                <div class="card">
                                    <div class="card-img">
                                        {{HTML::image(CATEGORY_FULL_DISPLAY_PATH.$cat->home_image, SITE_TITLE,array('class'=>'card-img-top'))}}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{URL::to('courses/'.$cat->slug)}}">{!! $cat->name !!}</a></h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        @endforeach                    
                    @endif
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
@endsection