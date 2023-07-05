<?php
    include 'db_connect.php' ;
    if(isset($_GET['id'])){
        $qry = $conn->query("SELECT * FROM forum_topics where id=".$_GET['id'])->fetch_array();
        foreach($qry as $k =>$v){
            $$k = $v;
        }
    }

?>

<div class="container-fluid">

<form action="" id="manage-forum">
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>" class="form-control">
        <label class="control-label">Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo isset($title) ? $title:'' ?>">
    </div>
    
    <div class="form-group">
        <label class="control-label">Description</label>
        <textarea name="description" class="text-jqte"><?php echo isset($description) ? $description : '' ?></textarea>
    </div>

</form>
</div>




<script>
    $('.text-jqte').jqte();
    $('#manage-forum').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_forum',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert("Data successfully saved.")
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
</script>