
<style>
	
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=gallery" class="nav-item nav-gallery"><span class='icon-field'><i class="fa fa-image"></i></span> Gallery </a>
				<a href="index.php?page=courses" class="nav-item nav-courses"><span class='icon-field'><i class="fa fa-list-alt"></i></i></span> Course List</a>
				<a href="index.php?page=alumni" class="nav-item nav-alumni"><span class='icon-field'><i class="fa fa-users"></i></span> Alumni List</a>
				<a href="index.php?page=jobs" class="nav-item nav-jobs"><span class='icon-field'><i class="fa fa-briefcase"></i></span> Jobs</a>
				<a href="index.php?page=events" class="nav-item nav-events"><span class='icon-field'><i class="fa fa-calendar-day"></i></span> Events</a>
				<a href="index.php?page=forums" class="nav-item nav-forums"><span class='icon-field'><i class="fa fa-comments"></i></span> Forum</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fas fa-wrench"></i></i></span> System Settings</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	
</script>
