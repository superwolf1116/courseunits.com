@extends('layouts.dashboard')
@section('content')
<section class="static_section">
    <!--@include('elements.topcategories')-->
    <div class="container">
    <div class="st_pages">
        <h1>{!! $pageInfo->title !!}</h1>
        <div class="st_pages_cnt">{!! $pageInfo->description !!}</div>
    </div>
    </div>
</section>
@endsection