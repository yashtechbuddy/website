<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	
	$qry="SELECT * FROM tbl_contact_us where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
	
	if(isset($_POST['submit']))
	{
				
		$data = array(
			'address'  =>  $_POST['address'],
			'google_map'  =>  $_POST['google_map'],
			'email'  =>  $_POST['email'],
			'phone'  =>  $_POST['phone'],
			'email1'  =>  $_POST['email1'],
			'phone1'  =>  $_POST['phone1'],
			'time'  =>  $_POST['time']           

		);	

		$settings_edit=Update('tbl_contact_us', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_contact_us.php");
		exit;
		 
   
 
	}
 
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Contact Us</h2>
      </div>
   </div>
</div>
                <?php if(isset($_SESSION['msg'])){?>
		    
			 <div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong><?php echo $client_lang[$_SESSION['msg']]; ?> </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>              
			</div>  
			<?php unset($_SESSION['msg']);}?>
            <!-- End Breadcrumbbar -->
		<div class="contentbar">
                <!-- Start row -->
                <div class="row">
	 <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            
                            <div class="card-body">
                                 <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
								
									<div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">Address  :-</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address"><?php echo stripslashes($settings_row['address']);?></textarea>
											
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="google_map" class="col-sm-3 col-form-label">Google Map Link  :-</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="google_map"><?php echo stripslashes($settings_row['google_map']);?></textarea>
											
                                        </div>
                                    </div>
                                    <!--div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">Address1  :-</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address1"><?php echo stripslashes($settings_row['address1']);?></textarea>
											
                                        </div>
                                    </div-->
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputEmail3"  name="email" value="<?php echo $settings_row['email'];?>">
                                        </div>
										<div class="col-sm-4">
                                            <input type="text" class="form-control"  name="email1" value="<?php echo $settings_row['email1'];?>">
                                        </div>
                                    </div>
									 <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">Contact</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="phone"  name="phone" value="<?php echo $settings_row['phone'];?>">
                                        </div>
										<div class="col-sm-4">
                                            <input type="text" class="form-control" name="phone1" value="<?php echo $settings_row['phone1'];?>">
                                        </div>
										
                                    </div>
									
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                    <!-- End col -->
				</div>
				</div>

<!-- End Contentbar -->
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