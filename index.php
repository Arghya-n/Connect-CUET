<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include('admin/db_connect.php');
ob_start();
$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
    if (!is_numeric($key)) {
        $_SESSION['system'][$key] = $value;
    }

}
ob_end_flush();
include('header.php');


?>


<style>
    header.masthead {
        background: url(admin/assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
        background-repeat: no-repeat;
        background-size: cover;
    }

    a.jqte_tool_label.unselectable {
        height: auto !important;
        min-width: 4rem !important;
        padding: 5px
    }

    /* body, footer {
    background: #000000e6 !important;
} */



    /*
a.jqte_tool_label.unselectable {
    height: 22px !important;
}*/
</style>

<body id="page-top" class ="new">
    <!-- Navigation-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3 " id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger " href="./">
                <?php echo $_SESSION['system']['name'] ?>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-5 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger"
                            href="index.php?page=alumni_list">Alumni</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=gallery">Gallery</a>
                    </li>
                    <?php if (isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=careers">Jobs</a>
                        </li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=forum">Forums</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a>
                    </li>

                    <?php if (!isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#login"
                                href="#">Login</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <div class="float-right">
                                <div class=" dropdown mr-4">
                                    <a href="#" class="nav-link js-scroll-trigger" id="account_settings"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $_SESSION['login_name'] ?> <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                                        <a class="dropdown-item" href="index.php?page=my_account" id="manage_my_account"><i
                                                class="fa fa-cog"></i> Manage Account</a>
                                        <a class="dropdown-item" href="admin/ajax.php?action=logout2"><i
                                                class="fa fa-power-off"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>

    </nav>




    <!-- Modals -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="my-2 d-none alert alert-success" >
					<strong id ="result"></strong>
				</div>
                    <div class="container-fluid">
                        <form action="" id="login-frm">
                            <div class="form-group">
                                <label for="" class="control-label">Email</label>
                                <input type="email" name="username" required="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Password</label>
                                <input type="password" name="password" required="" minlength="5" class="form-control">
                                <small><a href="index.php?page=signup" id="new_account">Create New Account</a></small>
                            </div>
                            <button class="button btn btn-info btn-sm">Login</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- jobs modal -->
    <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='submit'
                        onclick="$('#uni_modal form').submit()">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- modal ends here -->


    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "home";
    include $page . '.php';
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
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>

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
        $y = date("Y");
        ?>

        <div class="container">
            <div class="small text-center text-muted">Copyright ©
                <?php echo "$y"; ?> - CUET Alumni Association | All Rights Reserved.
            </div>
        </div>
    </footer>

    <?php include('footer.php') ?>
</body>
<script>
    $('#login-frm').submit(function (e) {
        e.preventDefault()
        $('#login-frm button[type="submit"]').attr('disabled', true).html('Logging in...');
        if ($(this).find('.alert-danger').length > 0)
            $(this).find('.alert-danger').remove();
        
        $.ajax({
            url: 'admin/ajax.php?action=login2',
            method: 'POST',
            data: $(this).serialize(),
            error: err => {
                console.log(err)
                $('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

            },
            success: function (resp) {
                $("#result").html(resp);
                if (resp == 1) {

                    location.href = '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
                } else if (resp == 2) {
                    $('#login-frm').prepend('<div class="alert alert-danger">Your account is not yet verified.</div>')
                    $('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
                } else {
                    $('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
                    $('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
                }
            }
        })
    })
</script>

</html>