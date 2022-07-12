
@extends('layouts.inner')

@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $("#adminForm").validate();
    });
    function showhidetime(value) {
        
        $.each($("input[name='" + value + "']:checked"), function () {
            $("#"+value+"_time_from").show();
            $("#"+value+"_time_to").show();
        });
        $.each($("input[name='" + value + "']:unchecked"), function () {
            $("#"+value+"_time_from").val('');
            $("#"+value+"_time_to").val('');
            $("#"+value+"_time_from").hide();
            $("#"+value+"_time_to").hide();
        });
    }
    
</script>
<style type="text/css">
    .pull-right{
        font-size: 20px !important;
    }
</style>
<section class="profile-section">
    <div class="container">
        <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
                <div class="my-profile-part">
                    <h2>Your Profile Information</h2>
                    <div class="edit-info-sec">
                        <div class="edit-info"><a href="{{ URL::to( 'users/settings')}}"><i class="fa fa-pencil"></i></a></div>
                        <div class="profile-info">
                            <label>Name</label>
                            <span>@if(isset($recordInfo->first_name))
                            {!! $recordInfo->first_name.' '.$recordInfo->last_name !!}
                            @else
                            {{'N/A'}}
                            @endif</span>
                        </div>
                        <div class="profile-info">
                            <label>Email</label>
                            <span>{!! $recordInfo->email_address !!}</span>
                        </div>
                        <div class="profile-info">
                            <label>User Type</label>
                            <span>{!! $recordInfo->user_type !!}</span>
                        </div>
                        <div class="profile-info">
                            <label>Contact Number</label>
                            <span>{!! $recordInfo->contact?$recordInfo->contact:'N/A' !!}</span>
                        </div>
                        <div class="profile-info">
                            <label>Short Bio</label>
                            <span>{!! $recordInfo->about_short?$recordInfo->about_short:'N/A' !!}</span>
                        </div>
                        <div class="profile-info">
                            <label>About Me</label>
                            <span>{!! $recordInfo->about?$recordInfo->about:'N/A' !!}</span>
                        </div>

                        <div class="profile-info">
                            <label>Profile Picture</label>
                            <span>
                                <div class="profile-img">
                                @if(!empty($recordInfo->profile_image) && file_exists(PROFILE_SMALL_UPLOAD_PATH.$recordInfo->profile_image))
                                {{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->profile_image, SITE_TITLE, ['id'=> 'pimage', 'class'=> 'pimage_id'])}}
                                @else
                                {{HTML::image('public/img/front/no_profile.png', SITE_TITLE, ['id'=> 'pimage', 'class'=> 'pimage_id'])}}
                                @endif
                            </div>
                            </span>
                            
                        </div>




                </div>
            </div>
      
</section>
@endsection