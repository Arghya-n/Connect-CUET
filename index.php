
<?php
    session_start();
    include('admin/db_connect.php');
     ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key)){
             $_SESSION['system'][$key] = $value;
          }
           
        }
    ob_end_flush();
    include('header.php');

	
    ?>
<!DOCTYPE html>
<html lang="en">
    

    <style>
    	header.masthead {
		  background: url(admin/assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}

  /* body, footer {
    background: #000000e6 !important;
} */
 


/*
a.jqte_tool_label.unselectable {
    height: 22px !important;
}*/
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3 "id="mainNav"  >
            <div class="container" >
                <a class="navbar-brand js-scroll-trigger " href="./"><?php echo $_SESSION['system']['name']?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-5 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=alumni_list">Alumni</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=gallery">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=jobs">Jobs</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=forum">Forums</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php" id="login">Login</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/login.php" id="admin">Admin</a></li>

                    </ul>
                </div>
                
            </div>
                
        </nav>
       
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       


  <div id="preloader"></div>
        <footer class=" py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0 text-primary">Contact us</h2>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-mobile fa-3x mb-3 text-muted"></i>
                        <a class="d-block" href="tel:01708753556">+8801708753556</a>
                        
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <a class="d-block" href="mailto:sakib.hb7@gmail.com">sakib.hb7@gmail.com</a>
                    </div>
                </div>
            </div>
            <br>
            <?php
                $y=date("Y");
            ?>

            <div class="container"><div class="small text-center text-muted">Copyright © <?php echo "$y";?> - CUET Alumni Association | All Rights Reserved.
		 </div>
		     </div>
        </footer>
        
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
    </script>

</html>
