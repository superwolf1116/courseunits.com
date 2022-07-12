<?php $__env->startSection('content'); ?>
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
        <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="my-profile-part">
                    <h2>Your Profile Information</h2>
                    <div class="edit-info-sec">
                        <div class="edit-info"><a href="<?php echo e(URL::to( 'users/settings')); ?>"><i class="fa fa-pencil"></i></a></div>
                        <div class="profile-info">
                            <label>Name</label>
                            <span><?php if(isset($recordInfo->first_name)): ?>
                            <?php echo $recordInfo->first_name.' '.$recordInfo->last_name; ?>

                            <?php else: ?>
                            <?php echo e('N/A'); ?>

                            <?php endif; ?></span>
                        </div>
                        <div class="profile-info">
                            <label>Email</label>
                            <span><?php echo $recordInfo->email_address; ?></span>
                        </div>
                        <div class="profile-info">
                            <label>User Type</label>
                            <span><?php echo $recordInfo->user_type; ?></span>
                        </div>
                        <div class="profile-info">
                            <label>Contact Number</label>
                            <span><?php echo $recordInfo->contact?$recordInfo->contact:'N/A'; ?></span>
                        </div>
                        <div class="profile-info">
                            <label>Short Bio</label>
                            <span><?php echo $recordInfo->about_short?$recordInfo->about_short:'N/A'; ?></span>
                        </div>
                        <div class="profile-info">
                            <label>About Me</label>
                            <span><?php echo $recordInfo->about?$recordInfo->about:'N/A'; ?></span>
                        </div>

                        <div class="profile-info">
                            <label>Profile Picture</label>
                            <span>
                                <div class="profile-img">
                                <?php if(!empty($recordInfo->profile_image) && file_exists(PROFILE_SMALL_UPLOAD_PATH.$recordInfo->profile_image)): ?>
                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->profile_image, SITE_TITLE, ['id'=> 'pimage', 'class'=> 'pimage_id'])); ?>

                                <?php else: ?>
                                <?php echo e(HTML::image('public/img/front/no_profile.png', SITE_TITLE, ['id'=> 'pimage', 'class'=> 'pimage_id'])); ?>

                                <?php endif; ?>
                            </div>
                            </span>
                            
                        </div>




                </div>
            </div>
      
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>