<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	
	$qry="SELECT * FROM tbl_contact_us where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
	
	if(isset($_POST['submit']))
	{
				
		$data = array(
			'support_title'  =>  $_POST['support_title'],
			'support_description'  =>  $_POST['support_description'],
			'support_phone'  =>  $_POST['support_phone'],
			'whatsapp_link'  =>  $_POST['whatsapp_link'],
		);	

		$settings_edit=Update('tbl_contact_us', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_support.php");
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
                                        <label for="inputusername" class="col-sm-3 col-form-label">Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="support_title" id="support_title" value="<?php echo $settings_row['support_title'];?>" >
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label">Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="form-control" id="tinymce-example" name="support_description"><?php echo stripslashes($settings_row['support_description']);?></textarea>
											</div>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Phone No:-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="support_phone" id="support_phone" value="<?php echo $settings_row['support_phone'];?>" >
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Whatsapp Link:-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="whatsapp_link" id="whatsapp_link" value="<?php echo $settings_row['whatsapp_link'];?>" >
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