@extends('layouts.admin')
@section('content')
<script type="text/javascript">
    // $(document).ready(function () {
    //     $.validator.addMethod("alpha", function(value, element) {
    //         return this.optional(element) || /^[a-z& ]+$/i.test(value);
    //     }, "Letters only please");
    //     $("#adminForm").validate();
    // });
 </script>
 
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add {!! $catInfo->name !!} States</h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::to('admin/admins/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="{{URL::to('admin/states/subcity/'.$catInfo->slug)}}"><i class="fa fa-sitemap"></i> <span>States</span></a></li>
            <li class="active"> Add State</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">&nbsp;</h3>
            </div>
            <div class="ersu_message">@include('elements.admin.errorSuccessMessage')</div>
            {{ Form::open(array('method' => 'post', 'id' => 'adminForm', 'enctype' => "multipart/form-data")) }}
            <div class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Select Country <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::select('country_id', $countryList,$catInfo->id, ['class' => 'form-control required','placeholder' => 'Select Country'])}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('name', null, ['class'=>'form-control required alpha', 'placeholder'=>'Name', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="box-footer">
                        <label class="col-sm-2 control-label" for="inputPassword3">&nbsp;</label>
                        {{Form::submit('Submit', ['class' => 'btn btn-info'])}}
                        {{Form::reset('Reset', ['class' => 'btn btn-default canlcel_le'])}}
                    </div>
                </div>
            </div>
            {{ Form::close()}}
        </div>
    </section>
@endsection