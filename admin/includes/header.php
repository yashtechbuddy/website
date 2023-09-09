<?php include("includes/connection.php");
      include("includes/session_check.php");
      
      //Get file name
      $currentFile = $_SERVER["SCRIPT_NAME"];
      $parts = Explode('/', $currentFile);
      $currentFile = $parts[count($parts) - 1];       
  
  
	  $new_parts = Explode('?', $currentFile); // explode (ex.. add_section.php?add=yes)
      $currentFile = $new_parts[0];       
  

	/*START CHECK USER PAGE ACCESS PERMISSION */
		$qry="SELECT * FROM tbl_superadmin_setting where page_name='".$currentFile."' and visibility_status=1";
		$result=mysqli_query($mysqli,$qry);
		$row=mysqli_fetch_array($result);
		$count=mysqli_num_rows($result);
		 
		if(USER_TYPE!="superadmin" && $count>0)
		{
			echo "<script> alert('Permission Denied !'); window.location.href='home.php'; </script>";
		} 
		else
		{
			//echo "<script> alert('Permission Granted !'); </script>";
		}
    /*END CHECK USER PAGE ACCESS PERMISSION */ 
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title>
		<?php
		$qry="SELECT * FROM tbl_superadmin_setting where page_name='".$currentFile."'";
		$result=mysqli_query($mysqli,$qry);
		$row=mysqli_fetch_array($result);
		if(isset($_GET['add']))
		{
			$text=explode("Add/Edit ",$row['page_title']);
			echo "Add ".$text[1]." | ".APP_NAME;
		}
		elseif(isset($_GET['edit_id']))
		{
			$text=explode("Add/Edit ",$row['page_title']);
			echo "Edit ".$text[1]." | ".APP_NAME;
		}
		else
		{
			echo $row['page_title']." | ".APP_NAME;
		}
		?>
	</title>  
	<!-- Fevicon -->
    <link rel="shortcut icon" href="images/logo/<?php echo APP_ICON;?>">
	
    <!-- Start css -->
	<!--DB CSS-->
	<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Switchery css -->
   <!-- <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet"> -->
	    <!-- Nestable css -->
	<link href="assets/plugins/nestable/jquery.nestable.min.css" rel="stylesheet" type="text/css">
    <!-- Apex css -->
    <!-- <link href="assets/plugins/apexcharts/apexcharts.css" rel="stylesheet"> -->
    <!-- Slick css -->
    <link href="assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="assets/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- End css -->
	<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<!-- Responsive Datatable css -->
	<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<!-- Responsive Datatable css End-->
	<link href="assets/plugins/colorpicker/bootstrap-colorpicker.css" rel="stylesheet" type="text/css">

</head>
<style>
 body {
    min-height: 100vh;
    background: rgba(0, 0, 0, 0) url(images/<?php echo $back_image ?>)!important;
    background-repeat: no-repeat!important;
    background-size: cover!important;
    overflow-x: hidden!important;
}

.btn.btn-success {
    color: white;
    border-color: <?php echo $button1_color ?>!important;
    border-bottom-color: <?php echo $button1_color ?>!important;
    background-color:<?php echo $button1_color ?>!important;
        padding: 5px 10px!important;
    /*box-shadow: 0 2px 3px rgba(41, 199, 95, 0.3);*/
}
.btn.btn-danger {
    color: white;
  border-color: <?php echo $button1_color ?>!important;
    border-bottom-color: <?php echo $button1_color ?>!important;
    background-color:<?php echo $button1_color ?>!important;
    padding: 5px 10px!important;
    /*box-shadow: 0 2px 3px rgba(231, 76, 60, 0.3);*/
}

.btn.btn-primary {
    border-color: <?php echo $button2_color ?>!important;
    border-bottom-color: <?php echo $button2_color ?>!important;
    background-color: <?php echo $button2_color ?>!important;
    /*box-shadow: 0 2px 3px rgba(9, 80, 119, 0.3);*/
}
.add_btn_primary a {
    background-color: <?php echo $button2_color ?>!important;
}
.leftbar {
background-image: linear-gradient(45deg,<?php echo $back_color1 ?>,<?php echo $back_color2 ?>);
}
.navbar .navbar-collapse .navbar-nav{
  color:<?php echo $sidebar_icon_title_color ?>!important;  
}
.topbar{
background-image: linear-gradient(55deg,<?php echo $back_color2 ?>,<?php echo $back_color1 ?>)!important;
}
.footerbar{
	background-image: linear-gradient(55deg,<?php echo $back_color2 ?>,<?php echo $back_color1 ?>);
	color:<?php echo $sidebar_icon_title_color ?>!important;
}

.vertical-menu > li > a > img{
    /*filter: invert(0.6) sepia(1) saturate(18) hue-rotate(<?php echo $sidebar_icon_color ?>deg)!important;*/
}
.vertical-menu > li.active > a img{
   filter: invert(0.7) sepia(1) saturate(18) hue-rotate(<?php echo $sidebar_icon_active_color ?>deg)!important;  
}
.vertical-menu > li > a{
color:<?php echo $sidebar_icon_title_color ?>!important;
}
.vertical-menu > li.active > a{
color:<?php echo $active_sidebar_icon_title_color ?>!important;}

.vertical-menu .vertical-submenu > li.active > a{
      color:<?php echo  $active_sidebar_icon_title_color ?>!important;
}
.vertical-menu > li > a:hover{
      color:<?php echo  $active_sidebar_icon_title_color ?>!important;
}
.vertical-menu .vertical-submenu > li> a:hover{
      color:<?php echo  $active_sidebar_icon_title_color ?>!important;
}
.badge-primary-inverse {
    /*background-color: none;
    filter: invert(0.7) sepia(1) saturate(18) hue-rotate(<?php echo $sidebar_icon_color ?>deg)!important;*/
}
body::-webkit-scrollbar {
  width: 1em;
}
 
body::-webkit-scrollbar-track {
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
 
body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
</style>
<body class="vertical-layout">    
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        <div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a class="logo logo-large"><img src="images/logo/<?php echo APP_LOGO;?>" class="img-fluid" alt="logo"></a>
                    <a class="logo logo-small"><img src="images/logo/<?php echo APP_ICON;?>" class="img-fluid" alt="logo"></a>
                </div>
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
						<li>
					        <a href="home.php">
                                <img src="assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Dashboard</span>
                            </a>
                        </li>
						<li>
                            <a href="javaScript:void();">
                              <img src="assets/images/svg-icon/components.svg" class="img-fluid" alt="Home"><span>Home</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="manage_home.php">Home List</a></li>
                                <li><a href="manage_banner.php">Banner</a></li>
								<li><a href="manage_extra_home.php">Extra</a></li>
                            </ul>
                        </li>
						<li>
						
                        <li>
                            <a href="javaScript:void();">
                              <img src="assets/images/svg-icon/basic.svg" class="img-fluid" alt="about us"><span>About Us</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="manage_about_us.php">About Us</a></li>
                                <li><a href="manage_mivigo.php">Mission,Vision,Goals</a></li>
								<li><a href="choose_us.php">Choose Us</a></li>
                                <li><a href="manage_certificate.php">Certificates</a></li>
                                <!-- <li><a href="manage_map.php">Map</a></li> -->
                                <li><a href="manage_team.php">Faculty</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="javaScript:void();">
                              <img src="assets/images/svg-icon/basic.svg" class="img-fluid" alt="about us"><span>Facility & Course</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="manage_facility.php">Facility</a></li>
                                <li><a href="manage_courses.php">Course</a></li>
                            </ul>
                        </li>
      <!--                  <li>-->
					 <!--       <a href="manage_facility.php">-->
      <!--                          <img src="assets/images/svg-icon/collapse.svg" class="img-fluid" alt="facility"><span>Facility</span>-->
      <!--                      </a>-->
      <!--                  </li>-->
                        
						<!--<li>-->
					 <!--       <a href="manage_courses.php">-->
      <!--                          <img src="assets/images/svg-icon/collapse.svg" class="img-fluid" alt="Course"><span>Course</span>-->
      <!--                      </a>-->
      <!--                  </li>-->
                        
                        <li>
					        <a href="manage_blog.php">
                                <img src="assets/images/svg-icon/pages.svg" class="img-fluid" alt="Banner"><span>Blog</span>
                            </a>
                        </li>
                        
						<!--<li>-->
					 <!--       <a href="manage_services.php">-->
      <!--                          <img src="assets/images/svg-icon/collapse.svg" class="img-fluid" alt="Services"><span>Services</span>-->
      <!--                      </a>-->
      <!--                  </li>-->
                        
                        
                        <li>
                            <a href="javaScript:void();">
                                <img src="assets/images/svg-icon/widgets.svg" class="img-fluid" alt="Portfolio"><span>Gallery</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
								 <li><a href="manage_gallery_category.php">Categories</a></li> 
                                <li><a href="manage_gallery.php">Image</a></li>
                                <!-- <li><a href="manage_products_application.php">Products Applications</a></li> -->
                            </ul>
                        </li>
						
					    
                        <!--<li>-->
                        <!--    <a href="manage_location.php">-->
                        <!--        <img src="assets/images/svg-icon/collapse.svg" class="img-fluid" alt="Location"><span>Location</span>-->
                        <!--    </a>-->
                        <!--</li>   -->
						
						
						
						<li>
                            <a href="manage_contact_us.php">
                                <img src="assets/images/svg-icon/apps.svg" class="img-fluid" alt="Contact us"><span>Contact Us</span>
                            </a>
                            <!--ul class="vertical-submenu">
                                <li><a href="manage_contact_us.php">Contact Us</a></li>
                                <li><a href="manage_support.php">Support</a></li>
                            </ul-->
                        </li>
						
                        <li>
                            <a href="javaScript:void();">
                                <img src="assets/images/svg-icon/advanced.svg" class="img-fluid" alt="advanced"><span>Others</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="manage_journal_club.php">Journal Club</a></li>                                
                                <li><a href="manage_testimonial.php">Testimonial</a></li>
                                <!--<li><a href="manage_client.php">Clients</a></li>-->
                                <!--<li><a href="manage_achivement.php">Achivment</a></li>-->
                                
                            </ul>
                        </li>
						<li>
					        <a href="manage_seo.php">
                                <img src="assets/images/svg-icon/form_elements.svg" class="img-fluid" alt="SEO"><span>SEO</span>
                            </a>
                        </li>	
                        <li>
                            <a href="javaScript:void();">
                                <img src="assets/images/svg-icon/settings.svg" class="img-fluid" alt="advanced"><span>Settings</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">     
                                <li><a href="header_setting.php">Header Setting</a></li>
                                <li><a href="footer_setting.php">Footer Setting</a></li>
								<li><a href="settings.php">Main Setting</a></li>  
								<li><a href="theme_setting.php">Theme Setting</a></li>
                            </ul>
                        </li>
                                                       
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>
        <!-- End Leftbar -->
        <!-- Start Rightbar -->
        <div class="rightbar">
            <!-- Start Topbar Mobile -->
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a class="mobile-logo"><img src="images/logo/<?php echo APP_LOGO;?>" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <img src="assets/images/svg-icon/horizontal.svg" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                            <img src="assets/images/svg-icon/verticle.svg" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                         </a>
                                     </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                            <img src="assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                         </a>
                                     </div>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Topbar -->
            <div class="topbar">
                <!-- Start row -->
                <div class="row align-items-center">
                    <!-- Start col -->
                    <div class="col-md-12 align-self-center">
                        <div class="togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                           <img src="assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                           <img src="assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                         </a>
                                     </div>
                                </li>
                               <li class="list-inline-item">
                                   <h4><?php echo APP_NAME;?></h4>
                                </li>
                            </ul>
                        </div>
                        <div class="infobar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="settingbar">
                                        <a href="settings.php"  class="infobar-icon">
                                            <img src="assets/images/svg-icon/settings.svg" class="img-fluid" alt="settings">
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="profilebar">
                                        <div class="dropdown">
                                          <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										  <?php if(PROFILE_IMG){?>
										  <img class="profile-img" src="images/profile/<?php echo PROFILE_IMG;?>">
										<?php }else{?>
										<img class="profile-img" src="assets/images/profile.png">
										<?php }?>
										<span class="feather icon-chevron-down live-icon"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                                <div class="dropdown-item">
                                                    <div class="profilename">
                                                      <h5><?php echo APP_NAME; ?></h5>
                                                    </div>
                                                </div>
                                                <div class="userbox">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="media dropdown-item">
                                                            <a href="profile.php" class="profile-icon"><img src="assets/images/svg-icon/user.svg" class="img-fluid" alt="user">My Profile</a>
                                                        </li>

                                                        <li class="media dropdown-item">
                                                            <a href="logout.php" class="profile-icon"><img src="assets/images/svg-icon/logout.svg" class="img-fluid" alt="logout">Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End col -->
                </div> 
                <!-- End row -->
            </div>
            <!-- End Topbar -->