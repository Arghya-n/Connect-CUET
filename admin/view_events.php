<?php
include('db_connect.php');
if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM events where id=" . $_GET['id'])->fetch_array();
    foreach ($qry as $k => $v) {
        $$k = $v;
    }
}
?>
<style>
    #uni_modal .modal-footer.display {
        display: block;

    }

    #uni_modal .modal-footer {
        display: none;
    }
</style>

<div class="container">
    <h3 class="d-flex justify-content-center">
        <?php echo $title ?>
    </h3>
    <div>
        <small class="d-flex justify-content-center">
            <p><b><i class="fa fa-calendar"></i>
                    <?php echo date("F d, Y h:i A", strtotime($schedule)) ?>
                </b></p>
        </small>
    </div>
    <div class="container d-flex justify-content-center">
        
        <?php if ($banner): ?>
            <img  src="assets/uploads/<?php echo $banner; ?>" style="  min-height: 400px; min-width: 600px;">
        <?php endif; ?>
        
    </div>
    <div class="container">
        <p class="mt-2">
            <?php echo html_entity_decode($content); ?>
        </p>
    </div>
    
    
    

</div>
<div class="modal-footer display">
    <div class="row">
        <div class="col-md-12">
            <button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>