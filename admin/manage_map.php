<?php 
	
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	
	$qry="SELECT * FROM tbl_about_us where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
  
	if(isset($_POST['submit']))
	{
		if($_FILES['map_image']['name']!="")
		{	
			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_about_us where id=1');
			$img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['map_image']!="")
		        {
					unlink('images/about-us/'.$img_res_row['map_image']);
			    }
				
			$map_image="Aboutus-".rand(0,99999)."_".$_FILES['map_image']['name'];
			$tpath1='images/about-us/'.$map_image; 			 
			move_uploaded_file($_FILES["map_image"]["tmp_name"], $tpath1);
				
			$data = array(
				'map_title'  =>  $_POST['map_title'],
				'map_image'  =>  $map_image,
				'map_description'  => addslashes($_POST['map_description'])
			);			
		}
		else
		{
			
			$data = array(
				'map_title'  =>  $_POST['map_title'],
				'map_description'  => addslashes($_POST['map_description'])
			);			
		}
	
		$settings_edit=update('tbl_about_us', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_map.php");
		exit;
	  
	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Map</h2>
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
                                            <input class="form-control" type="text" name="map_title" id="map_title" value="<?php echo $settings_row['map_title'];?>" >
                                        </div>
                                    </div>
									
									
									 <div class="form-group row">
                                        <label for="inputimage" class="col-sm-3 col-form-label">Map Image :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                             <input type="file" name="map_image" id="fileupload" >
											<img type="image" height="150" width="150" style="object-fit:cover;" src="images/about-us/<?php echo $settings_row['map_image'];?>" alt="Map image" />
										</div>
										</div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label">Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="form-control" id="tinymce-example" name="map_description"><?php echo stripslashes($settings_row['map_description']);?></textarea>
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