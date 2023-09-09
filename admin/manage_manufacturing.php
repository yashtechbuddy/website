<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	
	$qry="SELECT * FROM tbl_quilty_manu where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
  
	if(isset($_POST['manufacturing_submit']))
	{
		
		if($_FILES['manufacturing_image']['name']!="")
		{	
			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_quilty_manu where id=1');
			$img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['manufacturing_image']!="")
		        {
					unlink('images/about-us/'.$img_res_row['manufacturing_image']);
			    }
				
			$manufacturing_image="Manufacturing-".rand(0,99999)."_".$_FILES['manufacturing_image']['name'];
			$tpath1='images/about-us/'.$manufacturing_image; 			 
			move_uploaded_file($_FILES["manufacturing_image"]["tmp_name"], $tpath1);
				
			$data = array(
				'manufacturing_title'  =>  $_POST['manufacturing_title'],
				'manufacturing_image'  =>  $manufacturing_image,
				'manufacturing_description'  => addslashes($_POST['manufacturing_description'])
			);			
		}
		else
		{
			
			$data = array(
				'manufacturing_title'  =>  $_POST['manufacturing_title'],
				'manufacturing_description'  => addslashes($_POST['manufacturing_description'])
			);			
		}
	
		$settings_edit=Update('tbl_quilty_manu', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_manufacturing.php");
		exit;
		  
	}
	
	if(isset($_POST['quilty_submit']))
	{
		
		if($_FILES['quilty_image']['name']!="")
		{	
			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_quilty_manu where id=1');
			$img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['quilty_image']!="")
		        {
					unlink('images/about-us/'.$img_res_row['quilty_image']);
			    }
				
			$quilty_image="Quilty-".rand(0,99999)."_".$_FILES['quilty_image']['name'];
			$tpath1='images/about-us/'.$quilty_image; 			 
			move_uploaded_file($_FILES["quilty_image"]["tmp_name"], $tpath1);
				
			$data = array(
				'quilty_title'  =>  $_POST['quilty_title'],
				'quilty_image'  =>  $quilty_image,
				'quilty_description'  => addslashes($_POST['quilty_description'])
			);			
		}
		else
		{
			
			$data = array(
				'quilty_title'  =>  $_POST['quilty_title'],
				'quilty_description'  => addslashes($_POST['quilty_description'])
			);			
		}
	
		$settings_edit=Update('tbl_quilty_manu', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_manufacturing.php");
		exit;
		  
	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Manufacturing Capabilities & Quality Assurance
</h2>
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
                                 <ul class="nav nav-pills nav-justified mb-3" id="pills-tab-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-Manufacturing-tab-justified" data-toggle="pill" href="#pills-Manufacturing-justified" role="tab" aria-controls="pills-Manufacturing" aria-selected="true">Manufacturing Capabilities</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-quilty-tab-justified" data-toggle="pill" href="#pills-quilty-justified" role="tab" aria-controls="pills-quilty" aria-selected="false">Quality Assurance</a>
                                    </li>
                                   
                                </ul>
								
								 <div class="tab-content" id="pills-tab-justifiedContent">
                                    <div class="tab-pane fade show active" id="pills-Manufacturing-justified" role="tabpanel" aria-labelledby="pills-Manufacturing-tab-justified">
								 <div class="card-body">
                                 <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Manufacturing Title :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="manufacturing_title" id="manufacturing_title" value="<?php echo $settings_row['manufacturing_title'];?>" >
                                        </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label for="Manufacturing_image" class="col-sm-3 col-form-label">Manufacturing Image :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                             <input type="file" name="manufacturing_image" id="fileupload" >
											<img type="image" height="150" width="150" style="object-fit:cover;" src="images/about-us/<?php echo $settings_row['manufacturing_image'];?>" alt="About Us image" />
											</div>
										</div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label for="manufacturing_description" class="col-sm-3 col-form-label">Manufacturing Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="form-control" id="tinymce-example" name="manufacturing_description"><?php echo stripslashes($settings_row['manufacturing_description']);?></textarea>
											</div>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="manufacturing_submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
								</div>
								
								<div class="tab-pane fade" id="pills-quilty-justified" role="tabpanel" aria-labelledby="pills-quilty-tab-justified">
                                 
								 <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
								
									<div class="form-group row">
                                        <label for="quilty_title" class="col-sm-3 col-form-label">Quality Assurance Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="quilty_title" id="vission_title" value="<?php echo $settings_row['quilty_title'];?>" >
                                        </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label for="quilty_image" class="col-sm-3 col-form-label">Quality Assurance Image :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                             <input type="file" name="quilty_image" id="fileupload" >
											<img type="image" height="150" width="150" style="object-fit:cover;" src="images/about-us/<?php echo $settings_row['quilty_image'];?>" alt="About Us image" />
											</div>
										</div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label for="quilty_description" class="col-sm-3 col-form-label">Quality Assurance Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="form-control" id="tinymce-example" name="quilty_description"><?php echo stripslashes($settings_row['quilty_description']);?></textarea>
											</div>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="quilty_submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                                    </div>
								
								
								</div>
								
								
								
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