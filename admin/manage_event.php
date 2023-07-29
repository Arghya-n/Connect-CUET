<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM events where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>

	
	
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<form action="" id="manage-event">
					<input type="hidden" name="id" value="<?php echo isset($id) ? $id :'' ?>">
					<div class="form-group row">
						<div class="col-md-5">
							<label for="" class="control-label">Event</label>
							<input type="text" class="form-control" name="title"  value="<?php echo isset($title) ? $title :'' ?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-5">
							<label for="" class="control-label">Schedule</label>
							<input type="text" class="form-control datetimepicker" name="schedule"  value="<?php echo isset($schedule) ? date("Y-m-d H:i",strtotime($schedule)) :'' ?>" required autocomplete="off">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-10">
							<label for="" class="control-label">Description</label>
							<textarea name="content" id="content" class="form-control jqte" cols="30" rows="5" required><?php echo isset($content) ? html_entity_decode($content) : '' ?></textarea>
						</div>
					</div>
					<div class=" row form-group">
						<div class="col-md-5">
							<label for="" class="control-label">Banner Image</label>
							<input type="file" class="form-control" name="banner" onchange="displayImg2(this,$(this))">
						</div>

						<div class="col-md-5">
							<img src="<?php echo isset($banner) ? 'assets/uploads/'.$banner :'' ?>" alt="" id="banner-field" style="max-height: 200px; max-width: 300px;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-sm btn-block btn-primary col-sm-2"> Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	
	$('.jqte').jqte();

	$('#manage-event').submit(function(e){
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_event',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					swal("Data successfully saved","",'success')
					setTimeout(function(){
						location.href = "index.php?page=events"
					},1500)

				}
				
			}
		})
	})
	
</script>