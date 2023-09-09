<?php include("includes/header.php");

error_reporting(E_ALL);
ini_set('display_errors',1);

$qry="SELECT sum(no_of_visit) as num FROM tbl_visitor";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_visitors = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_banner";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_1 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_products";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_2 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_courses";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_3 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_image_gallery";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_4 = $total['num'];

// $qry="SELECT COUNT(*) as num FROM tbl_video_gallery";
// $total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
// $total_5 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_blog";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_6 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_news";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_7 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_team";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_8 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_testimonial";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_9 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_client";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_10 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_achivements";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_11 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_features";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_12 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_chooseus";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_12 = $total['num'];


$qry="SELECT COUNT(*) as num FROM tbl_pages";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_13 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_career";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_14 = $total['num'];

$qry="SELECT COUNT(*) as num FROM tbl_meta_tag";
$total= mysqli_fetch_array(mysqli_query($mysqli,$qry));
$total_15 = $total['num'];


?>
 
	<div class="breadcrumbbar">
        <div class="row align-items-center">
           <div class="col-md-8 col-lg-8">
            <h2 class="page-title">Dashboard</h2>
            </div>
        </div>          
    </div>
  
	<!-- Start Contentbar -->    
            <div class="contentbar">                
                 <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <!--div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="fa fa-users"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">Visitors</h5>
                                                <h4 class="mb-0"><?php echo $total_visitors; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                        </div>            
                    </div-->
                    <!-- End col --> 
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                             <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="fa fa-user-secret"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">Clients</h5>
                                                <h4 class="mb-0"><?php echo $total_10; ?></h4>
                                            </div>
                                        </div>
                            </div>
                        </div>            
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <!--div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                             <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-grid"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">Services</h5>
                                                <h4 class="mb-0"><?php echo $total_3; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                        </div>            
                    </div-->
                    <!-- End col --> 
                    <!-- Start col -->
                    <!--div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                             <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="dripicons-blog"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">Blogs</h5>
                                                <h4 class="mb-0"><?php echo $total_6; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                        </div>            
                    </div-->
                    <!-- End col --> 
					 <!-- Start col -->
                    <div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                             <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="fa fa-user-circle-o"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">Testimonials</h5>
                                                <h4 class="mb-0"><?php echo $total_9; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                        </div>            
                    </div>
                    <!-- End col -->
                     
                    <!-- Start col -->
                    <div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                             <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-layers"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">SEO</h5>
                                                <h4 class="mb-0"><?php echo $total_15; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                        </div>            
                    </div>
                    <!-- End col --> 
					<!-- Start col -->
                    <div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                             <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="feather icon-grid"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">Courses</h5>
                                                <h4 class="mb-0"><?php echo $total_3; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                        </div>            
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
				 <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <!--div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="fa fa-tasks"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">Careers</h5>
                                                <h4 class="mb-0"><?php echo $total_14; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                        </div>            
                    </div-->
                    <!-- End col --> 
                    <!-- Start col -->
                    <!--div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                             <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="fa fa-user-circle-o"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">Testimonials</h5>
                                                <h4 class="mb-0"><?php echo $total_9; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                        </div>            
                    </div-->
                    <!-- End col -->
                    <!-- Start col -->
                    <!--div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30">
                             <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <span class="action-icon badge badge-primary-inverse mr-0"><i class="dripicons-user-group"></i></span>
                                            </div>
                                            <div class="col-7 text-right">
                                                <h5 class="card-title font-14">Team</h5>
                                                <h4 class="mb-0"><?php echo $total_8; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                        </div>            
                    </div-->
                    <!-- End col -->
                </div>
                <!-- End row -->
				
			</div>	
 <?php 
	include("includes/footer.php");
?>       
			</div>
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->
    </div>
	
</body>
</html>	