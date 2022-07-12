<?php $__env->startSection('content'); ?>
<section class="main-categories-section">
    <div class="container">
        <h1>Course Management</h1>
        <div class="main-search-categories">
            <ul>
                <li><a class="active" href="#activeproduct" aria-controls="activeproduct" role="tab" data-toggle="tab">Active</a></li>
                <li><a href="#draft" aria-controls="draft" role="tab" data-toggle="tab">Draft</a></li>
                <!--<li><a href="#">Unpublished</a></li>-->
            </ul>
        </div>
        <div class="add_secc">
            <a href="<?php echo e(URL::to('courses/create')); ?>">Add Course</a>
        </div>
    </div>
</section>
<section class="search-categories-section">
    <div class="container " id="mng_course">
        <?php echo $__env->make('elements.courses.management', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</section>

<script>
    
    
    function updatecon(id) {
        updaterecords();
    }
    
    function updateconh(id) {
        updaterecords();
    }

    function courseloadmore() {
        $('#coursepage').val($('#coursepage').val() * 1 + 1 * 1);
        updaterecords();
    }

    function updaterecords() {
        $.ajax({
            url: "<?php echo HTTP_PATH; ?>/courses/management",
            type: "POST",
            data: $('#coursemanagementform').serialize(),
            beforeSend: function () {
                $("#loaderID").show();
            },
            complete: function () {
                $("#loaderID").hide();
            },
            success: function (result) {
                if ($('#coursepage').val() == 1) {
                    $('#mng_course').html(result);
                    $('#id_fil').val('');
                } else {
                    $('#mng_course').append(result);
                    $('#id_fil').val('');
                }
            }
        });
    }
    
    
</script>



<style>
.container>.courses-main-bx {
 display:none
}
.container>.active {
 display:block;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>