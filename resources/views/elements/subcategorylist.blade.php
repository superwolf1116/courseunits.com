<script type="text/javascript">

    $(document).ready(function () {
        $("#subcategory_id").change(function () { 
            var catid = $("#subcategory_id").val();
            $("#subsubcategory").load('<?php echo HTTP_PATH . '/courses/getsubsubcategorylist/' ?>' + catid);
        });
    });
</script>
{{Form::select('subcategory_id', $subCatList,null, ['class' => 'form-control required','placeholder' => '-- Select Sub Category --','id'=>'subcategory_id'])}}