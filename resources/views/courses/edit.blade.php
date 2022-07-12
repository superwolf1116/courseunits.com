@extends('layouts.inner')
@section('content')
</div>
{{ HTML::script('public/js/ckeditor/ckeditor.js')}}

{{ HTML::style('public/css/front/sweetalert.min.css')}}
{{ HTML::script('public/js/front/sweetalert.min.js')}}

<?php
if ($courseDetail->status == 1) {
    $is_step_1 = 'current';
    $is_step_2 = '';
    $active1 = 'active';
    $active2 = '';
    $stepcount = 1;
    $disable_button = 'step_2';
    $show_step_id = 'gig_overview';
} else {
    $is_step_1 = 'current';
    $is_step_2 = 'current';
    $active1 = '';
    $active2 = 'active';
    $stepcount = 2;
    $disable_button = 'step_3';
    $show_step_id = 'course_content';
}
?>
<script type="text/javascript">

    $(document).ready(function () {

        $('.step_form_inner').hide();
        $('#<?php echo $show_step_id; ?>').show();
//        $("#editform").validate();
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

    });</script>
<style>
    .swal-button--confirm {
      background-color: #fe4a55;
    }
  </style>
<script>
    $(document).ready(function () {

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
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

    function videoValidation(videoId) {
        var filename = document.getElementById(videoId).value;
        var filetype = ['mp4'];
        if (filename != '') {
            var ext = getExt(filename);
            ext = ext.toLowerCase();
            var checktype = in_array(ext, filetype);
            if (!checktype) {
                alert(ext + " file not allowed.");
                document.getElementById(videoId).value = '';
                return false;
            } else {
                var fi = document.getElementById(videoId);
                var filesize = fi.files[0].size; //check uploaded file size
                if (filesize > 8388608) {
                    alert('Maximum 8MB file size allowed.');
                    document.getElementById(videoId).value = '';
                    return false;
                }
            }
        }
    }

    function addmore() {

        var timestamp = Number(new Date()); // current time as number
        newItem = timestamp;
        var video = 'video' + newItem;
        var secnav = '<div class="card" id="card_' + newItem + '">';
        secnav += '<div class="card-head" id="heading' + newItem + '">';
        secnav += '<h2 class="mb-0">';
        secnav += '<a href="javascript:void(0)" title="Remove Section" onclick="deletesection(' + newItem + ')"><i class="fa fa-trash"></i></a>';
        secnav += '<input minlength="5" class="form-control required" placeholder="Section Title" autocomplete="off" name="section_title[' + newItem + '][name]" type="text">';
        secnav += '</h2>';
        secnav += '<span class="collp_sec" id="coll_main' + newItem + '" onclick="showhidesec(' + newItem + ')">';
        secnav += '<i class="fa fa-angle-up" aria-hidden="true"></i>';
        secnav += '</span>';
        secnav += '</div>';
        secnav += '<div id="collapse' + newItem + '" class="collapse show" >';
        secnav += '<div class="card-body lct_cont_mainn lct_cont_main' + newItem + '"  id="lecturCon' + newItem + '">';
        secnav += '<div class="contant-main">';
        secnav += '<div class="course-contant">';
        secnav += '<h3>Lecture Title</h3>';
        secnav += '<p>';
        secnav += '<input minlength="5" class="form-control required" placeholder="Lecture Title" autocomplete="off" name="section_title[' + newItem + '][' + newItem + '][lecture_title]" type="text">';
        secnav += '</p>';
        secnav += '<span class="collp_sub" id="coll_sub0" onclick="showhidesub(' + newItem + ')">';
        secnav += '<i class="fa fa-angle-up" aria-hidden="true"></i>';
        secnav += '</span>';
        secnav += '</div>';
        secnav += '<div class="lct_cont show"  id="lecturSub' + newItem + '">';


        secnav += '<div class="course-contant course-contant-discriptions">';
        secnav += '<h3>Lecture Description</h3>';
        secnav += '<p><textarea id="description' + newItem + '" minlength="20" maxlength="50" class="form-control required" placeholder="Lecture Description" name="section_title[' + newItem + '][' + newItem + '][lecture_description]" cols="50" rows="10"></textarea></p>';
        secnav += '</div>';

        secnav += '<div class="course-contant course-contant-video">';
        secnav += '<h3>Lecture Video</h3>';
        secnav += '<input class="form-control" id="video' + newItem + '" name="section_title[' + newItem + '][' + newItem + '][video]" type="file" onchange="videoValidation(this.id)">';
        secnav += '</div>';
        secnav += '</div>';

        secnav += '</div>';
        secnav += '</div>';
        secnav += '<button aria-label="New Content" type="button" class="add-item-main">';
        secnav += '<span onclick="addcontent(' + newItem + ',' + newItem + ')" class="add-item-con" title="Add Content">+</span>';
        secnav += '</button>';
        secnav += '</div>';


        secnav += '</div>';

        $('.collapse').collapse();
        $(".text_fileld_wrap_req").append(secnav);

//        CKEDITOR.replace('description' + newItem, {
//            toolbar:
//                    [
//                        ['ajaxsave'],
//                        ['Styles', 'Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-'],
//                        ['Cut', 'Copy', 'Paste', 'PasteText'],
//                        ['Undo', 'Redo', '-', 'RemoveFormat'],
//                        ['TextColor', 'BGColor'],
//                        ['Maximize', 'Image', 'Table', 'Link', 'Unlink']
//                    ],
//            filebrowserUploadUrl: '<?php echo HTTP_PATH; ?>/admin/pages/pageimages',
//            language: '',
//            height: 300,
//            //uiColor: '#884EA1'
//        });
//    setCourseNumbering();
    }

    function addcontent(val, id) {

        var timestamp = Number(new Date()); // current time as number 'name'=>'section_title[0][0][lecture_title]',
        newItem = timestamp;

        secnav = '<div class="contant-main" id="conetnet_' + newItem + '">';
        secnav += '<div class="course-contant">';
        secnav += '<h3>Lecture Title</h3>';
        secnav += '<p>';
        secnav += '<input minlength="5" class="form-control required" placeholder="Lecture Title" autocomplete="off" name="section_title[' + val + '][' + newItem + '][lecture_title]" type="text">';
        secnav += '</p>';
        secnav += '<span class="collp_sub" id="coll_sub' + newItem + '" onclick="showhidesub(' + newItem + ')">';
        secnav += '<i class="fa fa-angle-down" aria-hidden="true"></i>';
        secnav += '</span>';
        secnav += '</div>';
        secnav += '<div class="lct_cont show"  id="lecturSub' + newItem + '">';
        secnav += '<div class="course-contant course-contant-discriptions">';
        secnav += '<h3>Lecture Description</h3>';
        secnav += '<p><textarea id="description' + newItem + '" minlength="20" maxlength="50" class="form-control required" placeholder="Lecture Description" name="section_title[' + val + '][' + newItem + '][lecture_description]" cols="50" rows="10"></textarea></p>';
        secnav += '</div>';
        secnav += '<div class="course-contant course-contant-video">';
        secnav += '<h3>Lecture Video</h3>';
        secnav += '<span>';
        secnav += '</span>';
        secnav += '<input class="form-control" id="video' + newItem + '" name="section_title[' + val + '][' + newItem + '][video]" type="file" onchange="videoValidation(this.id)">';
        secnav += '</div>';
        secnav += '</div>';
        secnav += '</div>';
        secnav += '</div>';

        $(".lct_cont_main" + id + "").append(secnav);

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

    function deletesection(idval) {
        
        if (idval != "") {
            swal({
              title: "Are you sure?",
              text: "You want to remove this section!",
              icon: "warning",
              buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
              ],
              dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                  $.ajax({
                        type: 'GET',
                        url: "<?php echo HTTP_PATH; ?>/courses/deletesection/" + idval,
                        cache: false,
                        success: function (data) {
                            $("#card_" + idval).remove();
                            swal({
                  title: 'Removed!',
                  text: 'Section are successfully removed!',
                  icon: 'success'
                });
                        },
                        error: function (data) {
                            console.log("error");
                            console.log(data);
                        }
                    });
                
              }
            });

        }

    }

    function deletecontent(idval) { 

if (idval != "") {
            swal({
              title: "Are you sure?",
              text: "You want to remove this content!",
              icon: "warning",
              buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
              ],
              dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                  $.ajax({
                        type: 'GET',
                        url: "<?php echo HTTP_PATH; ?>/courses/deletecontent/" + idval,
                        cache: false,
                        success: function (data) {
                            $("#conetnet_" + idval).remove();
                            swal({
                  title: 'Removed!',
                  text: 'Content are successfully removed!',
                  icon: 'success'
                });
                        },
                        error: function (data) {
                            console.log("error");
                            console.log(data);
                        }
                    });
                
              }
            });

        }
//        if (idval != "") {
//            $.ajax({
//                type: 'GET',
//                url: "<?php echo HTTP_PATH; ?>/courses/deletecontent/" + idval,
//                cache: false,
//                success: function (data) {
//                    $("#conetnet_" + idval).remove();
//                },
//                error: function (data) {
//                    console.log("error");
//                    console.log(data);
//                }
//            });
//        }
    }

    function deleteimage(id) {
        if (id != "") {
            $.ajax({
                type: 'GET',
                url: "<?php echo HTTP_PATH; ?>/courses/deleteimage/" + id,
                //data:{'files': $('#attachmentfiles').val()},
                cache: false,
                beforeSend: function () {
                    //NProgress.start(); 
                },
                success: function (data) {
                    // NProgress.done(); 

                },
                error: function (data) {
                    console.log("error");
                    console.log(data);
                }
            });
        }
    }

    $(document).ready(function () {

        $("#<?php echo $disable_button; ?>").prop("disabled", false);

        $.validator.addMethod("yturl", function (value, element) {
            return  this.optional(element) || /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/.test(value);
        }, "Youtube video url is not valid!");

        $('.step_form_inner').hide();
        $('#<?php echo $show_step_id; ?>').show();



        $("#editform").validate({
            submitHandler: function (form) {
                var step = $('#stepcnt').val();
                var savecnt = $('#savecnt').val();


                if (savecnt == 1) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo HTTP_PATH; ?>/courses/edit/<?php echo $courseDetail->slug; ?>",
                                                data: $('#editform').serialize(),
                                                cache: false,
                                                beforeSend: function () {
                                                    $('#loaderSaveID').show();
                                                },
                                                success: function (data) {


                                                    is_error = '0';
                                                    err_html = '';
                                                    if (data.errors !== undefined) {
                                                        jQuery.each(data.errors, function (key, value) {
                                                            if (value != '') {
                                                                is_error = 1;
                                                                err_html = err_html + value + '<br/>';
                                                            }

                                                        });
                                                    }

                                                    if (is_error == '1') {
                                                        //if(data.errors!==undefined){
                                                        jQuery('.er_msg').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + err_html + '</div>');
                                                        setTimeout("hideerrorsucc()", 4000);
                                                    } else {
//																if(data.errors!==undefined){
//                                                                jQuery.each(data.message, function (key, value) {
//                                                                    jQuery('.er_msg').html('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + value + '</div>');
//                                                                    // setTimeout("hideerrorsucc()", 4000);
//                                                                });}

                                                        $('#loaderSaveID').hide();
                                                        $('#loaderSuccess').show();
                                                        $('#savecnt').val('0');

                                                        setTimeout("hideloader()", 6000);
                                                    }
                                                },
                                                error: function (data) {
                                                    $('#loaderSaveID').hide();
                                                    jQuery.each(data.errors, function (key, value) {
                                                        is_error = 1;
                                                        err_html = err_html + value + '<br/>';
                                                    });
                                                    if (is_error == '1') {
                                                        jQuery('.er_msg').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + err_html + '</div>');
                                                        setTimeout("hideerror()", 4000);
                                                    }
                                                }
                                            });
                                        } else if (step) {

                                            if (step == 1) {

                                                var form = $('#editform');
                                                var formdata = false;
                                                if (window.FormData) {
                                                    formdata = new FormData(form[0]);
                                                }

                                                $.ajax({
                                                    type: 'POST',
                                                    url: "<?php echo HTTP_PATH; ?>/courses/edit/<?php echo $courseDetail->slug; ?>",
                                                                                data: formdata ? formdata : form.serialize(),
                                                                                cache: false,
                                                                                contentType: false,
                                                                                processData: false,
                                                                                beforeSend: function () {
                                                                                    $('#loaderID').show();
                                                                                },
                                                                                success: function (data) {

                                                                                    $('#loaderID').hide();
                                                                                    is_error = '0';
                                                                                    err_html = '';
                                                                                    if (data.errors !== undefined) {
                                                                                        jQuery.each(data.errors, function (key, value) {
                                                                                            if (value != '') {
                                                                                                is_error = 1;
                                                                                                err_html = err_html + value + '<br/>';
                                                                                            }

                                                                                        });
                                                                                    }

                                                                                    if (is_error == '1') {
                                                                                        //if(data.errors!==undefined){
                                                                                        jQuery('.er_msg').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + err_html + '</div>');
                                                                                        setTimeout("hideerrorsucc()", 4000);
                                                                                    } else {
                                                                                        if (data.errors !== undefined) {
                                                                                            jQuery.each(data.message, function (key, value) {
                                                                                                jQuery('.er_msg').html('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + value + '</div>');
                                                                                                // setTimeout("hideerrorsucc()", 4000);
                                                                                            });
                                                                                        }


                                                                                        $('#stepcnt').val('2');
                                                                                        $(".step_form_inner").hide();
                                                                                        $(".step_account2").show();

                                                                                        $(".valid").removeClass('current');
                                                                                        $(".valid").removeClass('active');
                                                                                        $("#tab_step_2").addClass('active');
                                                                                        $("#tab_step_1,#tab_step_2").addClass('current');

                                                                                        $('#tab_step_1').attr("onclick", "accesspage('1')");
                                                                                        $('#tab_step_1').attr("href", "javascript:void(0)");
                                                                                    }
                                                                                },
                                                                                error: function (data) {
                                                                                    $('#loaderID').hide();
                                                                                    jQuery.each(data.errors, function (key, value) {
                                                                                        is_error = 1;
                                                                                        err_html = err_html + value + '<br/>';
                                                                                    });
                                                                                    if (is_error == '1') {
                                                                                        jQuery('.er_msg').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + err_html + '</div>');
                                                                                        setTimeout("hideerror()", 4000);
                                                                                    }
                                                                                }
                                                                            });

                                                                        } else if (step == 2) {

                                                                            var form = $('#editform');
                                                                            var formdata = false;
                                                                            if (window.FormData) {
                                                                                formdata = new FormData(form[0]);
                                                                            }
                                                                            $.ajax({
                                                                                type: 'POST',
                                                                                url: "<?php echo HTTP_PATH; ?>/courses/edit/<?php echo $courseDetail->slug; ?>",
                                                                                                            data: formdata ? formdata : form.serialize(),
                                                                                                            cache: false,
                                                                                                            contentType: false,
                                                                                                            processData: false,
                                                                                                            beforeSend: function () {
                                                                                                                $('#loaderID').show();
                                                                                                            },
                                                                                                            success: function (data) {
                                                                                                                console.log("dataa: " + data.errors);
                                                                                                                $('#loaderID').hide();
                                                                                                                is_error = 0;
                                                                                                                err_html = '';
                                                                                                                if (data.errors !== undefined) {
                                                                                                                    jQuery.each(data.errors, function (key, value) {
                                                                                                                        if (value != '') {
                                                                                                                            is_error = 1;
                                                                                                                            err_html = err_html + value + '<br/>';
                                                                                                                        }

                                                                                                                    });
                                                                                                                }
                                                                                                                if (is_error == '1') {
                                                                                                                    jQuery('.er_msg').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + err_html + '</div>');
                                                                                                                    setTimeout("hideerrorsucc()", 4000);
                                                                                                                } else {
                                                                                                                    if (data.message !== undefined) {
                                                                                                                        jQuery.each(data.message, function (key, value) {
                                                                                                                            jQuery('.er_msg').html('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + value + '</div>');
                                                                                                                            // setTimeout("hideerrorsucc()", 4000);
                                                                                                                        });
                                                                                                                    }
                                                                                                                    $('#stepcnt').val('3');
                                                                                                                    $(".step_form_inner").hide();
                                                                                                                    $(".step_account3").show();
                                                                                                                    $(".active").removeClass('active');
                                                                                                                    $("#tab_step_3").addClass('active');
                                                                                                                    $(".current").removeClass('current');
                                                                                                                    $("#tab_step_1,#tab_step_2,#tab_step_3").addClass('current');

                                                                                                                    $('#tab_step_2').attr("onclick", "accesspage('2')");
                                                                                                                    $('#tab_step_2').attr("href", "javascript:void(0)");

                                                                                                                }
                                                                                                            },
                                                                                                            error: function (data) {
                                                                                                                $('#loaderID').hide();
                                                                                                                jQuery.each(data.errors, function (key, value) {
                                                                                                                    is_error = 1;
                                                                                                                    err_html = err_html + value + '<br/>';
                                                                                                                });
                                                                                                                if (is_error == '1') {
                                                                                                                    jQuery('.er_msg').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + err_html + '</div>');
                                                                                                                    setTimeout("hideerror()", 4000);
                                                                                                                }
                                                                                                            }
                                                                                                        });

                                                                                                    } else {
                                                                                                        if (confirm('Are you sure to publish this course?')) {
                                                                                                            form.submit();
                                                                                                            return true;
                                                                                                        } else {
                                                                                                            return false;
                                                                                                        }

                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        });

                                                                                        $("#backstep_1").click(function () {
                                                                                            $('#stepcnt').val('1');
                                                                                            $(".step_form_inner").hide();
                                                                                            $(".step_account1").show();

                                                                                            $(".active").removeClass('active');
                                                                                            $("#tab_step_1").addClass('active');


                                                                                            $(".current").removeClass('current');
                                                                                            $("#tab_step_1").addClass('current');

                                                                                            $('#tab_step_1').removeAttr("onclick");
                                                                                            $('#tab_step_1').attr("href", "#!");
                                                                                        });
                                                                                        //2
                                                                                        $("#backstep_2").click(function () {
                                                                                            $('#stepcnt').val('2');
                                                                                            $(".step_form_inner").hide();
                                                                                            $(".step_account2").show();

                                                                                            $(".active").removeClass('active');
                                                                                            $("#tab_step_2").addClass('active');

                                                                                            $(".current").removeClass('current');
                                                                                            $("#tab_step_1,#tab_step_2").addClass('current');

                                                                                            $('#tab_step_2').removeAttr("onclick");
                                                                                            $('#tab_step_2').attr("href", "#!");
                                                                                        });

                                                                                        $("#category_id").change(function () {
                                                                                            var catid = $("#category_id").val();
                                                                                            $("#subcategory").load('<?php echo HTTP_PATH . '/courses/getsubcategorylist/' ?>' + catid);
                                                                                        });

                                                                                        $("#subcategory_id").change(function () {
                                                                                            var catid = $("#category_id").val();
                                                                                            var subcatid = $("#subcategory_id").val();
                                                                                            $("#additional_section").load('<?php echo HTTP_PATH . '/courses/getadditionaldata/' ?>' + catid + '/' + subcatid);
                                                                                        });
                                                                                    });
</script>
<section class="main-categories-section">
    <div class="container">
        <h1>Edit Course</h1>
    </div>
</section>
<div class="editloader displaynone" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
<div class="dashboard-menu dashboard-menu-courses dashboard-menu-gigs">
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
                        <li class="step hint--bottom">
                            <a href="#!" id="tab_step_3" class="valid">
                                <span>3</span>  Publish
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
        <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>

        {{Form::model($courseDetail, ['method' => 'post', 'name' => 'editform', 'id' => 'editform', 'enctype' => "multipart/form-data"]) }} 
        <input type="hidden" value="<?php echo $stepcount; ?>" name="stepcnt" id="stepcnt" />
        <input type="hidden" value="0" name="savecnt" id="savecnt" />
        <input type="hidden" name="isvideo" id="isdocupload" value="" />
        <input type="hidden" name="checkbutton" id="checkbutton" value="" />
        <div class="step_form_inner step_account1" id="gig_overview">


            <div class="add-course-bx">
                <div class="create-course">
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
                </div>

                <div class="create-course">
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
                                {{Form::select('subcategory_id', $subCatList,null, ['class' => 'form-control required','placeholder' => '-- Select Sub Category --','id'=>'subcategory_id'])}}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="create-course">
                    <div class="add-course-type left_col">
                        <h2 class="main-title">3 Level Category</h2>
                        <div class="course-names">
                            <span class="drop_down_arow" id="subsubcategory">
                                {{Form::select('subsubcategory_id', $subsubCatList,null, ['class' => 'form-control','placeholder' => '-- Select 3 Level Category --'])}}
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
                </div>

                <div class="add-course-type">
                    <h2 class="main-title">Course Description</h2>
                    <div class="course-names">
                        {{Form::textarea('description', null, ['id'=>'description','minlength' => 20, 'maxlength' => 50, 'class'=>'form-control required', 'placeholder'=>"Course Description"])}}
                    </div>
                </div>

                <div class="add-course-type">
                    <div class="course-names">
                        <div class="filter-courses-select">
                            <span>
                                <?php global $package_price; ?>
                                {{Form::select('price', $package_price,null, ['class' => 'form-control required','placeholder' => 'Select Price'])}}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="add-course-type">
                    <div class="course-names">
                        <div class="course-video">
                            <div class="create-course-video">
                                @if($courseDetail->image)
                                <a href="javascript: void(0)" class="close_btn" onclick="deleteimage(<?php echo $courseDetail->id; ?>)"><i class="fa fa-close"></i></a>
                                <?php
                                $filePath = COURSE_FULL_UPLOAD_PATH . $courseDetail->image;
                                ?>
                                @if(file_exists($filePath) && $courseDetail->image != '')
                                {{HTML::image(COURSE_SMALL_DISPLAY_PATH.$courseDetail->image, SITE_TITLE,['id' => 'ShowImage', 'style'=>"max-width: 100%", 'class' => 'umg_ahe'])}}
                                @else 
                                {{HTML::image('public/img/front/no_image.png', SITE_TITLE,['id' => 'ShowImage', 'style'=>"max-width: 100%", 'class' => 'umg_ahe'])}}
                                @endif
                                @endif
                                <!--{{HTML::image('public/img/front/no_image.png', SITE_TITLE,array('class'=>'','id'=>'ShowImage'))}}-->
                                <div class="add-video">
                                    {{Form::file('image', ['class' => 'images', 'id' => 'image', 'class'=>'form-control', 'accept'=>IMAGE_EXT])}}
                                    <label for="image"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="add-course-type">
                    <h3 class="main-title">Course Sample Video</h3>
                    <div class="course-names">
                        <div class="create-video edit-video">
                            <div class="video-url">
                                @if($courseDetail->sample_video)
                                <a href="javascript: void(0)" class="viedo_close_btn" onclick="deletevideo(<?php echo $courseDetail->id; ?>)"><i class="fa fa-close"></i></a>
                                <?php
                                $filePath = COURSE_VIDEO_FULL_UPLOAD_PATH . $courseDetail->sample_video;
                                ?>
                                @if(file_exists($filePath) && $courseDetail->sample_video != '')
                                {{COURSE_VIDEO_FULL_DISPLAY_PATH.$courseDetail->sample_video}}
                                @endif
                                @endif
                            </div>
                            {{Form::file('sample_video', ['class' => 'videos', 'id' => 'video', 'class'=>'form-control','onChange'=>'videoValidation("video")'])}}
                            <label for="video"></label>

                        </div>
                    </div>
                </div>


                <div class="add-course-type">
                    <a href="{{ URL::to( 'courses/management')}}" title="Cancel" class="btn btn-light">Cancel</a>
                    <!--                    <a href="javascript:void(0)" title="Save" onclick="savedata()" class="btn btn-primary
                                                            ">Save</a>-->
                    {{Form::submit('Save & Continue', ['class' => 'btn btn-primary', 'id'=>'step_2'])}}

                </div>
            </div>
        </div>

        <div class="step_form_inner second_page step_account2" id="course_content">
            <div class="add-course-type">
                <h2 class="main-title">Course Content</h2>
                <div class="course-names edit-course-names">
                    <div class="accordion" id="accordionExample">
                        <div class="text_fileld_wrap_req">
                            <?php
                            //pr($gigDetail['Gigrequirement']);
                            if (count($recordSectionInfo) > 0) {
                                $i = 0;
                                foreach ($recordSectionInfo as $rkey => $section) {
                                    $clls = '';
                                    if ($i == (count($recordSectionInfo) - 1)) {
                                        $clls = 'text_fileld_wrap_req';
                                    }
                                    ?>
                                    <div class="card" id="card_<?php echo $section->id; ?>">
                                        <div class="card-head" id="headingOne">
                                            <h2 class="mb-0" <?php echo $rkey; ?>" <?php echo $rkey; ?>">
                                                <a href="javascript:void(0)" title="Remove Section" onclick="deletesection('<?php echo $section->id; ?>')"><i class="fa fa-trash"></i></a>
                                                {{Form::text('section_title[' . $rkey . ']', $section->section_title, ['name'=>'section_title[' . $rkey . '][name]','minlength' => 5, 'class'=>'form-control required', 'placeholder'=>"Section Title", 'autocomplete' => 'off'])}}
                                                {{Form::hidden('id', $section->id, ['name'=>'section_title[' . $rkey . '][id]', 'class'=>'form-control'])}}
                                            </h2>
                                            <span class="collp_sec" id="coll_main<?php echo $rkey; ?>" onclick="showhidesec('<?php echo $rkey; ?>')">
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </span>
                                        </div>

                                        <div id="collapse<?php echo $rkey; ?>" class="collapse show">
                                            <div class="card-body lct_cont_mainn lct_cont_main<?php echo $rkey; ?>"  id="lecturCon<?php echo $rkey; ?>">
                                                <?php
                                                if (count($recordContentInfo) > 0) {
                                                    $j = 1;
                                                    foreach ($recordContentInfo[$section->id] as $content) {
                                                        $ckey = $j;
                                                        ?>
                                                <div class="contant-main" id="conetnet_<?php echo $content->id; ?>">
                                                            <div class="course-contant">
                                                                <h3>Lecture Title</h3> 
                                                                {{Form::hidden('id', $content->id, ['name'=>'section_title[' . $rkey . '][' . $ckey . '][id]', 'class'=>'form-control'])}}
                                                                <p>{{Form::text('lecture_title[' . $rkey . ']', $content->lecture_title, ['name'=>'section_title[' . $rkey . '][' . $ckey . '][lecture_title]','minlength' => 5, 'class'=>'form-control required', 'placeholder'=>"Lecture Title", 'autocomplete' => 'off'])}}</p>	   
                                                                <span class="dlt_cont">
                                                                <a href="javascript:void(0)" title="Remove Content" onclick="deletecontent('<?php echo $content->id; ?>')"><i class="fa fa-trash"></i></a>
                                                                </span>
                                                                <span class="collp_sub" id="coll_sub<?php echo $rkey . '-' . $ckey; ?>" onclick="showhidesub('<?php echo $rkey . '-' . $ckey; ?>')">
                                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                                </span>
                                                            </div>
                                                            <div class="lct_cont show"  id="lecturSub<?php echo $rkey . '-' . $ckey; ?>">
                                                                <div class="course-contant course-contant-discriptions">
                                                                    <h3>Lecture Description</h3>    	
                                                                    <p>{{Form::textarea('lecture_description[' . $rkey . ']', $content->lecture_description, ['name'=>'section_title[' . $rkey . '][' . $ckey . '][lecture_description]','id'=>'description0','minlength' => 20, 'maxlength' => 50, 'class'=>'form-control required', 'placeholder'=>"Lecture Description"])}}</p>	   
                                                                </div>
                                                                <div class="course-contant course-contant-video">
                                                                    <h3>Lecture Video</h3>   </br>
                                                                    <span><?php
                                                                        $attachment = $content->video;

                                                                        if (!empty($attachment)) {
                                                                            ?>
                                                                            <?php
                                                                            if (file_exists(COURSE_VIDEO_FULL_UPLOAD_PATH . $attachment)) {
                                                                                echo $attachment;
                                                                            }
                                                                            ?>

                <?php }
                ?>
                                                                    </span>                                      
                                                                    {{Form::file('video[' . $rkey . ']', ['name'=>'section_title[' . $rkey . '][' . $ckey . '][video]','class' => 'videos', 'id' => 'video' . $ckey . '', 'class'=>'form-control','onChange'=>'videoValidation("video' . $ckey . '")'])}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $j++;
                                                    }
                                                }
                                                ?>

                                            </div>
                                            <button aria-label="New Content" type="button" class="add-item-main">
                                                <span onclick="addcontent('<?php echo $rkey; ?>', '<?php echo $rkey; ?>')" class="add-item-con" title="Add Content">+</span>
                                            </button>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <div class="card">
                                    <div class="card-head" id="headingOned">
                                        <h2 class="mb-0">
                                            {{Form::text('section_title[]', null, ['name'=>'section_title[0][name]','minlength' => 5, 'class'=>'form-control required', 'placeholder'=>"Section Title", 'autocomplete' => 'off'])}}
                                        </h2>
                                        <span class="collp_sec" id="coll_main0" onclick="showhidesec('0')">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div id="collapse0" class="collapse show" >
                                        <div class="card-body lct_cont_mainn lct_cont_main0"  id="lecturCon0">
                                            <div class="contant-main ">
                                                <div class="course-contant">
                                                    <h3>Lecture Title</h3> 
                                                    <p>{{Form::text('lecture_title[0][]', null, ['name'=>'section_title[0][1][lecture_title]','minlength' => 5, 'class'=>'form-control required', 'placeholder'=>"Lecture Title", 'autocomplete' => 'off'])}}</p>	   
                                                    <span class="collp_sub" id="coll_sub0" onclick="showhidesub('0')">
                                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </span>
                                                </div>

                                                <div class="lct_cont show"  id="lecturSub0">
                                                    <div class="course-contant course-contant-discriptions">
                                                        <h3>Lecture Description</h3>    	
                                                        <p>{{Form::textarea('lecture_description[0][0]', null, ['name'=>'section_title[0][1][lecture_description]','id'=>'description0','minlength' => 20, 'maxlength' => 50, 'class'=>'form-control required', 'placeholder'=>"Lecture Description"])}}</p>	   
                                                    </div>
                                                    <div class="course-contant course-contant-video">
                                                        <h3>Lecture Video</h3> 
                                                        <p>													
                                                            {{Form::file('video[0][]', ['name'=>'section_title[0][1][video]','class' => 'videos', 'id' => 'video0', 'class'=>'form-control','onChange'=>'videoValidation("video0")'])}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <button aria-label="New Content" type="button" class="add-item-main">
                                            <span onclick="addcontent('0', '0')" class="add-item-con" title="Add Content">+</span>
                                        </button>
                                    </div>
                                </div>

<?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="another">
                <a href="javascript:void(0)" onclick="addmore()"><b>+</b> Add more</a>
            </div>

            <div class="add-course-type">
                {{Form::button('Back', ['class' => 'btn btn-light', 'id'=>'backstep_1'])}}
                <!--<a href="javascript:void(0)" title="Save" onclick="savedata()" class="btn btn-default save_btn">Save</a>-->
                {{Form::submit('Save & Continue', ['class' => 'btn btn-primary', 'id'=>'step_3'])}}

            </div>
        </div>

        <div class="step_form_inner fifth_page step_account3" id="course_publish">
            <div class="congratulation_content">
                <h2>Congratulations!</h2>
                <h3 class="alt">You’re almost done with your Course.</h3>
                <h4>Before you start selling on <?php echo SITE_TITLE; ?>, please confirm all details. <br>
                    </div>
                    <div class="simple_txt">If you agree with our <a href="javascript:void(0);" onclick="window.open('<?php echo HTTP_PATH ?>/privacy-policy', 'term', 'width=900,height=400,scrollbars=1')" >Privacy Policy</a> than please click on Save and Publish button</div>
                    <div class="add-course-type">
                        {{Form::button('Back', ['class' => 'btn btn-light', 'id'=>'backstep_2'])}}
                        <!--<a href="javascript:void(0)" title="Save" onclick="savedata()" class="btn btn-primary">Save</a>-->
                        {{Form::submit('Save & Publish', ['class' => 'btn btn-primary', 'id'=>'step_4'])}}
                        <div class="gig_loader" id="pub_ldr" style="display: none;" id="loaderID">{{HTML::image("public/img/loading.gif", SITE_TITLE)}}</div>

                    </div>
            </div>

            {{ Form::close()}}
        </div>
</section>

<script>
    function showhidesec(id) {

        if ($('#collapse' + id).hasClass("show")) {
            $('#coll_main' + id).html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
            $('#collapse' + id).removeClass('show');
            $('#collapse' + id).hide();
        } else {
            $('#coll_main' + id).html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
            $('#collapse' + id).addClass('show');
            $('#collapse' + id).show();
        }
    }


    function showhidesub(id) {

        if ($('#lecturSub' + id).hasClass("show")) {
            $('#coll_sub' + id).html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
            $('#lecturSub' + id).removeClass('show');
            $('#lecturSub' + id).hide();
        } else {
            $('#coll_sub' + id).html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
            $('#lecturSub' + id).addClass('show');
            $('#lecturSub' + id).show();
        }
    }
</script>

@endsection