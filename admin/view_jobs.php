<?php
include('./db_connect.php');
if (isset($_GET['id'])) {
	$qry = $conn->query("SELECT * FROM careers where id=" . $_GET['id'])->fetch_array();
	foreach ($qry as $k => $v) {
		$$k = $v;
	}
}
?>


<div class="container">
	<p>Company: <b>
			<large>
				<?php echo($company) ?>
			</large>
		</b></p>
	<p>Job Title: <b>
			<large>
				<?php echo ucwords($job_title) ?>
			</large>
		</b></p>
	<p>Location: <i class="fa fa-map-marker"></i> <b>
			<large>
				<?php echo $company ?>
			</large>
		</b></p>
	<hr class="divider " style="max-width: calc(80%)">
	<?php echo html_entity_decode($description) ?>
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-md-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>

<style>
	
	#uni_modal .modal-footer.display{
		display:block;	

	}
	#uni_modal .modal-footer {
		display: none;
	}
</style>