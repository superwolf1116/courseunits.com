<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $.validator.addMethod("alpha", function(value, element) {
            return this.optional(element) || /^[a-z&,<br> ]+$/i.test(value);
        }, "Letters only please");
        $("#adminForm").validate();
    });
 </script>
 
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Category</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(URL::to('admin/admins/dashboard')); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo e(URL::to('admin/categories')); ?>"><i class="fa fa-sitemap"></i> <span>Manage Categories</span></a></li>
            <li class="active"> Add Category</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">&nbsp;</h3>
            </div>
            <div class="ersu_message"><?php echo $__env->make('elements.admin.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
            <?php echo e(Form::open(array('method' => 'post', 'id' => 'adminForm', 'enctype' => "multipart/form-data"))); ?>

            <div class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name <span class="require">*</span></label>
                        <div class="col-sm-10">
                            <?php echo e(Form::text('name', null, ['class'=>'form-control required ', 'placeholder'=>'Name', 'autocomplete' => 'off'])); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description <span class="require"></span></label>
                        <div class="col-sm-10">
                            <?php echo e(Form::text('description', null, ['class'=>'form-control alpha', 'placeholder'=>'Short description', 'autocomplete' => 'off'])); ?>

                            <span class="help-text">Short description for home page</span>
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label class="col-sm-2 control-label">Image <span class="require">*</span></label>
                        <div class="col-sm-10">
                            <?php echo e(Form::file('image', ['class'=>'form-control required', 'accept'=>IMAGE_EXT])); ?>

                            <span class="help-text"> Supported File Types: jpg, jpeg, png (Max. <?php echo e(MAX_IMAGE_UPLOAD_SIZE_DISPLAY); ?>) (must be 48 x 48 pixels)</span>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Image <span class="require">*</span></label>
                        <div class="col-sm-10">
                            <?php echo e(Form::file('home_image', ['class'=>'form-control required', 'accept'=>IMAGE_EXT])); ?>

                            <span class="help-text"> Supported File Types: jpg, jpeg, png (Max. <?php echo e(MAX_IMAGE_UPLOAD_SIZE_DISPLAY); ?>) (must be 269 x 174 pixels)</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Meta title <span class="require"></span></label>
                        <div class="col-sm-10">
                            <?php echo e(Form::text('meta_title', null, ['class'=>'form-control ', 'placeholder'=>'Meta title', 'autocomplete' => 'off'])); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Meta description <span class="require"></span></label>
                        <div class="col-sm-10">
                            <?php echo e(Form::text('meta_description', null, ['class'=>'form-control ', 'placeholder'=>'Meta description', 'autocomplete' => 'off'])); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Meta keyword <span class="require"></span></label>
                        <div class="col-sm-10">
                            <?php echo e(Form::text('meta_keyword', null, ['class'=>'form-control ', 'placeholder'=>'Meta keyword', 'autocomplete' => 'off'])); ?>

                        </div>
                    </div>
                    <div class="box-footer">
                        <label class="col-sm-2 control-label" for="inputPassword3">&nbsp;</label>
                        <?php echo e(Form::submit('Submit', ['class' => 'btn btn-info'])); ?>

                        <?php echo e(Form::reset('Reset', ['class' => 'btn btn-default canlcel_le'])); ?>

                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>