<?php 
    error_reporting(0);
    session_start();
    include "connection.php";

      // ADMIN LOGIN ERROR MESSAGE
      if($_SESSION['adminloginMessage']){
        $adminloginMessage = $_SESSION['adminloginMessage'];
        echo "<script type='text/javascript'>
            alert('$adminloginMessage');
        </script>";
    }
    unset($_SESSION['adminloginMessage']);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Shift Booking System</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

	<link href="assets/css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/login-register.js" type="text/javascript"></script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="styles.css"/>
</head>
<body style="background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;">
    <header class="main-header">
        <nav>
            
            <div class="nav-links">
                <a href="" class="nav-link">Home</a>
                <a href="" class="nav-link">About </a>
                <a href="" class="nav-link">Services</a>
                <a href="" class="nav-link">Contacts</a>
            </div>
            
        </nav>
    </header>
    <div class="welcome-message">
        <p>Welcome to the Kadama Health Centre III Health Staff Shift Booking System. <br> Log In to continue</p>
    </div>
    <!-- BOOTSTRAP FORMS -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 link-btns">
                 <a style="margin-left: 5rem;" class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a>
            <div class="col-sm-4"></div>
        </div>


		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Staff Login</h4>
                    </div>
                    <div class="modal-body">
                        <!-- LOG IN BOX -->
                        <div class="box">
                             <div class="content">
                                
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="POST" action="staff_login.php" >
                                    <input id="email" class="form-control" type="text" placeholder="Username" name="username">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                    <button class="btn btn-default btn-login">Login</button>
                                    </form>
                                </div>
                             </div>
                        </div>
                        <!-- ADMIN LOGIN  BOX -->
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="POST" html="{:multipart=>true}"  action="admin_login.php">
                                <input id="name" class="form-control" type="text" placeholder="Username" name="username" required>
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password" required>
                                <button class="btn btn-default btn-register">Login</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>You are
                                 <a href="javascript: showRegisterForm();">Admin</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Not an Admin ?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
    		      </div>
		      </div>
		  </div>
    </div>
<script type="text/javascript">
    // $(document).ready(function(){
    //     openLoginModal();
    // });
</script>
</body>
</html>