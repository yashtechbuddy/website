<?php
    include("includes/connection.php");
		include("language/language.php");

	if(isset($_SESSION['admin_name']))
	{ 
		header("Location:home.php");
		exit;
	}
?>
<!DOCTYPE html>
<style>
 body {
    min-height: 100vh;
    background: rgba(0, 0, 0, 0) url(images/<?php echo $back_image ?>)!important;
    background-repeat: no-repeat!important;
    background-size: cover!important;
    overflow-x: hidden!important;
}
.authenticate-bg {
    background:none!important;
}

.authenticate-bg {
    background:none!important;
}

.card{
    background: rgba(255, 255, 255,1)!important;
    border: 1px solid #000!important;
    box-shadow: 0 20px 40px 0 rgba(0, 0, 0, 0.1), 0 10px 20px 0 rgba(0, 0, 0, 0.2);
    }
.login{
    background-color: #335588!important;
    border-color: #fff!important;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12)!important;
    font-weight: 600!important;
}
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login | <?php echo APP_NAME;?></title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="images/logo/<?php echo APP_ICON;?>">
    <!-- Start css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout loginbody">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
			<?php if(isset($_SESSION['msg'])){?>
			 <div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong><?php echo $client_lang[$_SESSION['msg']]; ?> </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
              </div> 
			<?php unset($_SESSION['msg']);}?>
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-5 col-lg-4">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <form action="login_db.php" method="post">
                                        <div class="form-head">
                                           <img src="images/logo/<?php echo APP_LOGO;?>" class="img-fluid" alt="logo" style="margin-bottom: 20px;">
                                        </div>
										
                                        <div class="form-group" >
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username here" style="    border: 1px solid #c8d1d3;" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password here" style="    border: 1px solid #c8d1d3;" required>
                                        </div>
                                                                
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18 login">Log in</button>
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->        
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <!-- End js -->
</body>
</html>