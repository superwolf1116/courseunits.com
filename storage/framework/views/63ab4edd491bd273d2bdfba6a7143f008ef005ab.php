<?php $__env->startSection('content'); ?>
<?php echo e(HTML::script('public/js/ckeditor/ckeditor.js')); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $.validator.addMethod("passworreq", function (input) {
            var reg = /[0-9]/; //at least one number
            var reg2 = /[a-z]/; //at least one small character
            var reg3 = /[A-Z]/; //at least one capital character
            //var reg4 = /[\W_]/; //at least one special character
            return reg.test(input) && reg2.test(input) && reg3.test(input);
        }, "Password must be a combination of Numbers, Uppercase & Lowercase Letters.");
        $("#changepassword").validate();
        $("#changeemail").validate();
        
        CKEDITOR.replace('about', {
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
    });
</script>
<section class="dashboard-section">
    <div class="container">
        <div class="your-setting">
            <div class="your-setting-bx">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="ch_paypalemail">
                            <div class="section_heading">Edit Profile</div>
                            <div class="passmsg" id="emailmsg"></div>
                            <?php echo e(Form::model($recordInfo, ['method' => 'post', 'name' => 'changeemail', 'id' => 'changeemail', 'enctype' => "multipart/form-data"])); ?> 
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::text('first_name', $recordInfo->first_name, ['class'=>'form-control required', 'placeholder'=>'First Name', 'autocomplete' => 'off', 'id'=>'first_name'])); ?>

                                </div>
                            </div>
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::text('last_name', $recordInfo->last_name, ['class'=>'form-control required', 'placeholder'=>'Last Name', 'autocomplete' => 'off', 'id'=>'last_name'])); ?>

                                </div>
                            </div>
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::text('contact', $recordInfo->contact, ['class'=>'form-control required', 'placeholder'=>'Contact Number', 'autocomplete' => 'off', 'id'=>'contact','maxlenght'=>'15'])); ?>

                                </div>
                            </div>
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::text('about_short', $recordInfo->about_short, ['class'=>'form-control required', 'placeholder'=>'Short Bio', 'autocomplete' => 'off'])); ?>

                                </div>
                            </div>
                            
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::text('paypal_email', $recordInfo->paypal_email, ['class'=>'form-control required email', 'placeholder'=>'Enter paypal email for payment', 'autocomplete' => 'off', 'id'=>'paypal_email'])); ?>

                                    <span class="help-text">If you don't have PayPal email address, <a href="https://www.paypal.com" target="_blank">click here</a> to create PayPal email address.</span>
                                </div>
                            </div>
                            <div class="setting-input">
                            <div class="user-profile-imgag">
                                <?php if(!empty($recordInfo->profile_image) && file_exists(PROFILE_SMALL_UPLOAD_PATH.$recordInfo->profile_image)): ?>
                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->profile_image, SITE_TITLE, ['id'=> 'pimage', 'class'=> 'pimage_id'])); ?>

                                <?php else: ?>
                                <?php echo e(HTML::image('public/img/front/no_profile.png', SITE_TITLE, ['id'=> 'pimage', 'class'=> 'pimage_id'])); ?>

                                <?php endif; ?>
                            </div>
                                <div class="form-group">
                                    <?php echo e(Form::file('profile_image', ['class'=>'form-control', 'accept'=>IMAGE_EXT, 'id'=>'profile_image'])); ?>

                                </div>
                                <span class="ploader" id="ploader"><?php echo e(HTML::image('public/img/loading.gif', SITE_TITLE)); ?></span>
                            </div>
                            
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::textarea('about', null, ['id'=>'about','minlength' => 120, 'maxlength' => 1200, 'class'=>'form-control required', 'placeholder'=>"About Me"])); ?>

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="setting-btn">
                                    <?php echo e(Form::submit('Save Changes', ['class' => 'succbtn', 'id'=>'emailbtn'])); ?>

                                    <div class="passloader" id="emailloader"><?php echo e(HTML::image("public/img/loading.gif", SITE_TITLE)); ?></div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>            
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-6">
                        <div class="ch_password">
                            <div class="section_heading">Change Password</div>
                            <div class="passmsg" id="passmsg"></div>
                            <?php echo e(Form::open(array('method' => 'post', 'id' => 'changepassword'))); ?>

                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::password('old_password', ['class'=>'form-control required', 'placeholder'=>'Current password', 'id'=>'old_password'])); ?>

                                </div>
                            </div>
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::password('new_password', ['class'=>'form-control required passworreq', 'placeholder'=>'New password', 'id'=>'newpassword', 'minlength'=>8])); ?>

                                    <span class="help-text">8 characters or longer and combination of upper, lowercase letters and numbers.</span>
                                </div>
                            </div>
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::password('confirm_password', ['class'=>'form-control required', 'placeholder'=>'Confirm password', 'equalTo' => '#newpassword', 'id'=>'confirm_password'])); ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="setting-btn">
                                    <button type="button" class="succbtn" id="passbtn">Save Changes</button>
                                    <div class="passloader" id="passloader"><?php echo e(HTML::image("public/img/loading.gif", SITE_TITLE)); ?></div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>            
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $("#passbtn").click(function () {
        if ($("#changepassword").valid()) {
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/users/updatesettings",
                type: "POST",
                data: {"old_password": $('#old_password').val(), "newpassword": $('#newpassword').val(), "confirm_password": $('#confirm_password').val(), _token: '<?php echo e(csrf_token()); ?>'},
                beforeSend: function () {
                    $("#passloader").show();
                },
                complete: function () {
                    $("#passloader").hide();
                },
                success: function (result) {
                    if (result == 1) {
                        $('#passmsg').html('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button> You have successfully changed your account password.</div>');
                    } else {
                        $('#passmsg').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + result + '</div>');
                    }
                }
            });
        }
    });
    
    $('#changepassword').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
$('#changeemail').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>