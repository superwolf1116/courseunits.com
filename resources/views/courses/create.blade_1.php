@extends('layouts.inner')
@section('content')
</div>
{{ HTML::script('public/js/ckeditor/ckeditor.js')}}
<script type="text/javascript">

    $(document).ready(function () {

$("#step_2").prop("disabled", false);
        $("#addform").validate();
        $("#category_id").change(function () {
            var catid = $("#category_id").val();
            $("#subcategory").load('<?php echo HTTP_PATH . '/courses/getsubcategorylist/' ?>' + catid);
        });
        CKEDITOR.replace('description', {
            toolbar:
                    [
                        ['ajaxsave'],
                        ['Styles', 'Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-'],
                        ['Cut', 'Copy', 'Paste', 'PasteText'],
                        ['Undo', 'Redo', '-', 'RemoveFormat'],
                        ['TextColor', 'BGColor'],
                        ['Maximize', 'Image', 'Table', 'Link', 'Unlink']
                    ],
            filebrowserUploadUrl: '<?php echo HTTP_PATH; ?>/admin/pages/pageimages',
            language: '',
            height: 300,
            //uiColor: '#884EA1'
        });
        CKEDITOR.replace('description0', {
            toolbar:
                    [
                        ['ajaxsave'],
                        ['Styles', 'Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-'],
                        ['Cut', 'Copy', 'Paste', 'PasteText'],
                        ['Undo', 'Redo', '-', 'RemoveFormat'],
                        ['TextColor', 'BGColor'],
                        ['Maximize', 'Image', 'Table', 'Link', 'Unlink']
                    ],
            filebrowserUploadUrl: '<?php echo HTTP_PATH; ?>/admin/pages/pageimages',
            language: '',
            height: 300,
            //uiColor: '#884EA1'
        });
    });</script>

<script>
    $(document).ready(function () {

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    alert();
                    $('#ShowImage').attr('src', e.target.result);
//                    $('#ShowImage_div').addClass('hide_img_add');
                    $('.close_btn').show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function () {
            if (imageValidation("image") != false) {
                readURL(this);
            }
        });
        $(".close_btn").on("click", function () {
            var img = $('#ShowImage').attr('src');
            if (img) {
                $('#ShowImage').attr('src', '<?php echo HTTP_PATH . '/public/img/front/no_image.png' ?>');
            }
            $('.close_btn').hide();
//            $('#ShowImage_div').removeClass('hide_img_add');
        });
    });
    function in_array(needle, haystack) {
        for (var i = 0, j = haystack.length; i < j; i++) {
            if (needle == haystack[i])
                return true;
        }
        return false;
    }

    function getExt(filename) {
        var dot_pos = filename.lastIndexOf(".");
        if (dot_pos == -1)
            return "";
        return filename.substr(dot_pos + 1).toLowerCase();
    }

    function imageValidation(imageId) {
        $('#no_image_div').css("display", "none");
        $('#selectIcon').css("display", "none");
        $('#undoIcon').css("display", "block");
        var filename = document.getElementById(imageId).value;
        var filetype = ['jpg', 'jpeg', 'png', 'gif'];
        if (filename != '') {
            var ext = getExt(filename);
            ext = ext.toLowerCase();
            var checktype = in_array(ext, filetype);
            if (!checktype) {
                alert(ext + " file not allowed.");
                document.getElementById(imageId).value = '';
                return false;
            } else {
                var fi = document.getElementById(imageId);
                var filesize = fi.files[0].size; //check uploaded file size
                if (filesize > 8388608) {
                    alert('Maximum 8MB file size allowed.');
                    document.getElementById(imageId).value = '';
                    return false;
                }
            }
        }
    }

    function addmore() {

        var timestamp = Number(new Date()); // current time as number
        newItem = timestamp;
        var secnav = '<div class="card">';
        secnav += '<div class="card-head" id="heading' + newItem + '">';
        secnav += '<h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse' + newItem + '" aria-expanded="false" aria-controls="collapse' + newItem + '">';
        secnav += '<a href="javascript:void(0)" onclick="deletecourse(' + newItem + ')"><i class="fa fa-trash"></i></a>';
        secnav += '<input minlength="5" class="form-control required" placeholder="Section Title" autocomplete="off" name="section_title[' + newItem + ']" type="text">';
        secnav += '</h2>';
        secnav += '</div>';
        secnav += '<div id="collapse' + newItem + '" class="collapse" aria-labelledby="heading' + newItem + '" data-parent="#accordionExample">';
        secnav += '<div class="card-body">';
        secnav += '<div class="course-contant">';
        secnav += '<h3>Lecture Title</h3>';
        secnav += '<p>';
        secnav += '<input minlength="5" class="form-control required" placeholder="Lecture Title" autocomplete="off" name="lecture_title[' + newItem + ']" type="text">';
        secnav += '</p>';
        secnav += '</div>';

        secnav += '<div class="course-contant course-contant-discriptions">';
        secnav += '<h3>Lecture Description</h3>';
        secnav += '<p><textarea id="description' + newItem + '" minlength="120" maxlength="1200" class="form-control required" placeholder="Lecture Description" name="lecture_description[' + newItem + ']" cols="50" rows="10"></textarea></p>';
        secnav += '</div>';
        
        secnav += '<div class="course-contant course-contant-video">';
        secnav += '<h3>Lecture Video</h3>';	
        secnav += '<input class="form-control" id="video' + newItem + '" name="video[' + newItem + ']" type="file">';
        secnav += '</div>';
        
        secnav += '</div>';
        secnav += '</div>';
        secnav += '</div>';

        $(".text_fileld_wrap_req").append(secnav);
        
        CKEDITOR.replace('description'+newItem, {
            toolbar:
                    [
                        ['ajaxsave'],
                        ['Styles', 'Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-'],
                        ['Cut', 'Copy', 'Paste', 'PasteText'],
                        ['Undo', 'Redo', '-', 'RemoveFormat'],
                        ['TextColor', 'BGColor'],
                        ['Maximize', 'Image', 'Table', 'Link', 'Unlink']
                    ],
            filebrowserUploadUrl: '<?php echo HTTP_PATH; ?>/admin/pages/pageimages',
            language: '',
            height: 300,
            //uiColor: '#884EA1'
        });
//    setCourseNumbering();
    }
    function setCourseNumbering() {
        var total_requirement = $('.req_lbl').length;
        for (var r = 0; r < total_requirement; r++) {
            var r_no = r + 1;
            $(".req_lbl:eq(" + r + ")").html("REQUIREMENT #" + r_no);
        }
    }
    
    function deletecourse(idval) {
        if (idval == 1) {
            alert("You can't delete this course!");
        } else {
            if ($("#course_box_" + idval).length > 0) {
                $("#course_box_" + idval).remove();
//                setCourseNumbering();
            }
        }

    }
</script>
<section class="main-categories-section">
    <div class="container">
        <h1>Add Course</h1>
    </div>
</section>
<div class="dashboard-menu dashboard-menu-gigs">
        <div class="navbar navbar-default">
            <nav class="navbar navbar-me">
                <div class="container">
                    <div class="nevicatio-menu">
                        <ul class="top_tab" data-mode="wizard">
                            <li class="step hint--bottom">
                                <a href="#!" id="tab_step_1" class="valid current active" >
                                    <span>1</span> Overview
                                </a>
                            </li>
                            <li class="step hint--bottom">
                                <a href="#!" id="tab_step_2" class="valid">
                                    <span>2</span>  Course Content
                                </a>
                            </li>
                            
                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </div>
<section class="addcourse-section">
    <div class="container">
        {{ Form::open(array('method' => 'post', 'name' => 'addform', 'id' => 'addform', 'class' => 'form form-signin', 'enctype'=>'multipart/form-data')) }}  

        <div class="step_form_inner step_account1" id="gig_overview">
            
        
        <div class="add-course-bx">
            <div class="add-course-type left_col">
                <h2 class="main-title">Course Title</h2>
                <div class="course-names">
                    {{Form::text('title', null, ['minlength' => 5, 'class'=>'form-control required', 'placeholder'=>"Title", 'autocomplete' => 'off'])}}
                </div>
            </div>

            <div class="add-course-type left_col right_col">
                <h2 class="main-title">Course Sub Title</h2>
                <div class="course-names">
                    {{Form::text('sub_title', null, ['minlength' => 5, 'class'=>'form-control required', 'placeholder'=>"Sub Title", 'autocomplete' => 'off'])}}
                </div>
            </div>

            <div class="add-course-type left_col">
                <h2 class="main-title">Category</h2>
                <div class="course-names">
                    <span class="drop_down_arow">
                        {{Form::select('category_id', $catList,null, ['class' => 'form-control required','placeholder' => '-- Select Category --','id' => 'category_id'])}}
                    </span>

                </div>
            </div>

            <div class="add-course-type left_col right_col">
                <h2 class="main-title">Sub Category</h2>
                <div class="course-names">
                    <span class="drop_down_arow" id="subcategory">
                        {{Form::select('subcategory_id', array(),null, ['class' => 'form-control required','placeholder' => '-- Select Sub Category --','id'=>'subcategory_id'])}}
                    </span>
                </div>
            </div>

            <div class="add-course-type left_col">
                <h2 class="main-title">3 Level Category</h2>
                <div class="course-names">
                    <span class="drop_down_arow" id="subsubcategory">
                        {{Form::select('subsubcategory_id', array(),null, ['class' => 'form-control','placeholder' => '-- Select 3 Level Category --'])}}
                    </span>
                </div>
            </div>

            <div class="add-course-type left_col right_col">
                <h2 class="main-title">Level</h2>
                <div class="course-names">
                    <span class="drop_down_arow">
<?php global $level; ?>
                        {{Form::select('level', $level,null, ['class' => 'form-control required','placeholder' => '-- Select Level --'])}}
                    </span>
                </div>
            </div>

            <div class="add-course-type">
                <h2 class="main-title">Course Description</h2>
                <div class="course-names">
                    {{Form::textarea('description', null, ['id'=>'description','minlength' => 120, 'maxlength' => 1200, 'class'=>'form-control required', 'placeholder'=>"Course Description"])}}
                </div>
            </div>

            <div class="add-course-type">
                <div class="course-names">
                    <div class="filter-courses-select">
                        <span>
<?php global $package_price; ?>
                            {{Form::select('basic_price', $package_price,null, ['class' => 'form-control required','placeholder' => 'Select Price'])}}
                        </span>
                    </div>
                </div>
            </div>

            <div class="add-course-type">
                <div class="course-names">
                    <div class="course-video">
                        <a href="javascript: void(0)" class="btn btn-primary ad_cls_img close_btn" style="display:none;"><i class="fa fa-close"></i></a>
                        {{HTML::image('public/img/front/no_image.png', SITE_TITLE,array('class'=>'','id'=>'ShowImage'))}}
                        <div class="add-video">
                            {{Form::file('image[]', ['class' => 'images', 'id' => 'image', 'class'=>'form-control', 'accept'=>IMAGE_EXT])}}
                            <label for="image"></label>
                            <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-course-type">
                <h2 class="main-title">Course Content</h2>
                <div class="course-names">
                    <div class="accordion" id="accordionExample">
                        <div class="card text_fileld_wrap_req">
                            <div class="card-head" id="headingOne">
                                <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    {{Form::text('section_title[]', null, ['minlength' => 5, 'class'=>'form-control required', 'placeholder'=>"Section Title", 'autocomplete' => 'off'])}}
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="course-contant">
                                        <h3>Lecture Title</h3> 
                                        <p>{{Form::text('lecture_title[]', null, ['minlength' => 5, 'class'=>'form-control required', 'placeholder'=>"Lecture Title", 'autocomplete' => 'off'])}}</p>	   
                                    </div>

                                    <div class="course-contant course-contant-discriptions">
                                        <h3>Lecture Description</h3>    	
                                        <p>{{Form::textarea('lecture_description[]', null, ['id'=>'description0','minlength' => 120, 'maxlength' => 1200, 'class'=>'form-control required', 'placeholder'=>"Lecture Description"])}}</p>	   
                                    </div>
                                    <div class="course-contant course-contant-video">
                                        <h3>Lecture Video</h3>    	
                                        {{Form::file('video[]', ['class' => 'videos', 'id' => 'video0', 'class'=>'form-control'])}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="another">
                <a href="javascript:void(0)" onclick="addmore()"><b>+</b> Add more</a>
            </div>


            <div class="add-course-type">
                <a href="{{ URL::to( 'courses')}}" title="Cancel" class="btn btn-light">Cancel</a>
                {{Form::submit('Save & Continue', ['class' => 'btn btn-primary', 'disabled'=>'disabled', 'id'=>'step_2'])}}

            </div>
        </div>
            </div>

        {{ Form::close()}}
    </div>
</section>
@endsection