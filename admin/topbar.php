<style>

</style>

<nav class="navbar fixed-top bg-info" style="padding:0rem;max-height:1 rem">
  <div class="container-fluid mt-2">
  	<div class="col-lg-12 d-flex">
  		
      <div class="col-md-4 text-white" style ="margin-left: 2rem;">
        <large><b><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?></b></large>
      </div>
	  	<div class="ml-auto mb-3 mx-5">
        <div class=" dropdown ">
            <a href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
              </div>
        </div>
      </div>
  </div>
  
</nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>