<?php 
	
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	
	$qry="SELECT * FROM tbl_chooseus where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
  
	if(isset($_POST['submit']))
	{
		if($_FILES['image']['name']!="")
		{
			$image="chooseus-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/chooseus/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
				
			$data = array(
				'name'  =>  $_POST['name'],
				'image'  =>  $image,
			    'alt_tag'  =>  $_POST['alt_tag'],
				'long_desc'  => addslashes($_POST['long_desc'])
			);			
		}
		else
		{
			
			$data = array(
				'name'  =>  $_POST['name'],
			    'alt_tag'  =>  $_POST['alt_tag'],
				'long_desc'  => addslashes($_POST['long_desc'])
			);			
		}
	
		$settings_edit=update('tbl_chooseus', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_choose_us.php");
		exit;
	  
	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Choose Us</h2>
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
                                        <label for="inputusername" class="col-sm-3 col-form-label">Choose Us Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="name" id="name" value="<?php echo $settings_row['name'];?>" >
                                        </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label for="inputimage" class="col-sm-3 col-form-label">Choose Us Image :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                             <input type="file" name="image" id="fileupload" >
											<img type="image" height="150" width="150" style="object-fit:cover;" src="images/chooseus/<?php echo $settings_row['image'];?>" alt="choose us image" />
											<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Logo Alternate text" title="Enter Logo Alternate text here !" value="<?php echo $settings_row['alt_tag'];?>" class="form-control" />
											</div>
										</div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label">Choose Us Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="form-control" id="tinymce-example" name="long_desc"><?php echo stripslashes($settings_row['long_desc']);?></textarea>
											</div>
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