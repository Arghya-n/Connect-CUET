<?php
include("db_connect.php");
if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM careers where id=" . $_GET['id'])->fetch_array();
    foreach ($qry as $k => $v) {
        $$k = $v;
    }
}




?>


<form action="" id="manage-career">
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>" class="form-control">
        <label class="control-label">Company</label>
        <input type="text" name="company" class="form-control" value="<?php echo isset($company) ? $company : '' ?>">
    </div>
    <div class="form-group">
        <label class="control-label">Job Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo isset($job_title) ? $job_title : '' ?>">
    </div>
    <div class="form-group">
        <label class="control-label">Location</label>
        <input type="text" name="location" class="form-control" value="<?php echo isset($location) ? $location : '' ?>">
    </div>
    <div class="form-group">
        <label class="control-label">Description</label>
        <textarea name="description" class="text-jqte"><?php echo isset($description) ? $description : '' ?></textarea>
    </div>

</form>


<script>
    $('.text-jqte').jqte();
    $('#manage-career').submit(function (e) {
        e.preventDefault()
        start_load()
        $.ajax({
            url: 'ajax.php?action=save_career',
            method: 'POST',
            data: $(this).serialize(),
            success: function (resp) {
                if (resp == 1) {
                    swal('Data saved Successfully','','success')
                   
                    setTimeout(function () {
                        location.reload()
                    }, 1000)
                }
            }
        })
    })

   
</script>
