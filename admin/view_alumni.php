<?php include 'db_connect.php';

if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT a.*,c.course,Concat(a.lastname,', ',a.firstname,' ',a.middlename) as name from alumnus_bio a inner join courses c on c.id = a.course_id where a.id= " . $_GET['id']);
    foreach ($qry->fetch_array() as $k => $val) {
        $$k = $val;
    }
}
?>

<style>
    #uni_modal .modal-footer{
		display: none
	}
    
</style>

<div>
    <div class="avatar d-flex justify-content-center">
        <img src="assets/uploads/<?php echo $avatar ?>" class="" alt="" style="height:200px;width:200px;">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <p>Name: <b>
                <?php echo $name ?>
            </b></p>
        <p>Email: <b>
                <?php echo $email ?>
            </b></p>
        <p>Batch: <b>
                <?php echo $batch ?>
            </b></p>
        <p>Course: <b>
                <?php echo $course ?>
            </b></p>
    </div>
    <div class="col-md-6">
        <p>Gender: <b>
                <?php echo $gender ?>
            </b></p>
        <p>Account Status: <b>
                <?php echo $status == 1 ? '<span class="badge badge-primary">Verified</span>' : '<span class="badge badge-secondary">Unverified</span>' ?>
            </b></p>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
        <?php if ($status == 1): ?>
            <button class="btn float-right btn-primary update mr-2" data-status='0' type="button"
                data-dismiss="modal">Unverify Account</button>
        <?php else: ?>
            <button class="btn float-right btn-primary update mr-2" data-status='1' type="button"
                data-dismiss="modal">Verify Account</button>
        <?php endif; ?>
    </div>
</div>



<script>
    $('.update').click(function(){
		start_load()
		$.ajax({
			url:'ajax.php?action=update_alumni_acc',
			method:"POST",
			data:{id:<?php echo $id ?>,status:$(this).attr('data-status')},
			success:function(resp){
				if(resp == 1){
                    swal("Alumni account status successfully updated.","","success")
					
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
</script>