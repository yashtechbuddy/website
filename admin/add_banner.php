<?php 
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");

	 
	//Add banner
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		$banner_image="";
		if($_FILES['banner_image']['name']!="")
		{	
			$banner_image="Banner-".rand(0,99999)."_".$_FILES['banner_image']['name'];
			$tpath1='images/banner/'.$banner_image; 			 
			move_uploaded_file($_FILES["banner_image"]["tmp_name"], $tpath1);
				
        }	
		
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_banner order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1;  
		  
       $data = array(
				'banner_name'  =>  $_POST['banner_name'],
			    'banner_image'  =>  $banner_image,
			    'alt_tag'  =>  $_POST['alt_tag'],
				'position_order' => $position_order
			    );		
		
		
 		$qry = Insert('tbl_banner',$data);	
		
 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_banner.php");
		exit;	
        
	}
	
	//Fetch selected banner detail
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM tbl_banner where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	
	//Edit Banner
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
		 if($_FILES['banner_image']['name']!="")
		 {		
				$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_banner WHERE id='.$_GET['edit_id'].'');
			    $img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['banner_image']!="")
		        {
					unlink('images/banner/'.$img_res_row['banner_image']);
			    }

 				$banner_image="Banner-".rand(0,99999)."_".$_FILES['banner_image']['name'];
				$tpath1='images/banner/'.$banner_image; 			 
				move_uploaded_file($_FILES["banner_image"]["tmp_name"], $tpath1);
								

				$data = array(
				'banner_name'  =>  $_POST['banner_name'],
			    'banner_image'  =>  $banner_image,
			    'alt_tag'  =>  $_POST['alt_tag'],
					);

				$category_edit=Update('tbl_banner', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		 else
		 {
				$data = array(
						'banner_name'  =>  $_POST['banner_name'],
						'alt_tag'  =>  $_POST['alt_tag'],
						);	
 
			         $category_edit=Update('tbl_banner', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		    
		$_SESSION['msg']="11"; 
		header( "Location:manage_banner.php");
		exit;
 
	}


?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Home Banner</h2>
      </div>
   </div>
</div>
                
            <!-- End Breadcrumbbar -->
		<div class="contentbar">
                <!-- Start row -->
                <div class="row">
	 <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            
                        <div class="card-body">
                                 <form action="" method="post" enctype="multipart/form-data">
					<input  type="hidden" name="edit_id" value="<?php echo $_GET['edit_id'];?>" />	 
				  
					<div class="form-group row">
            <label class="col-sm-3 col-form-label">Banner Title :-</label>
            <div class="col-sm-9">
              <input type="text" name="banner_name" id="banner_name" value="<?php if(isset($_GET['edit_id'])){echo $row['banner_name'];}?>" class="form-control" required>
            </div>
          </div> 
					                  
                <div class="form-group row" id="image">
                    <label class="col-sm-3 col-form-label">Banner Image :-</label>

                    <div class="col-sm-9">
                      <div class="fileupload_block">
							<input type="file" name="banner_image" value="fileupload" id="fileupload" />
                            <?php if(isset($_GET['edit_id']) and $row['banner_image']!="") {?><img type="image" src="images/banner/<?php echo $row['banner_image'];?>" alt="banner image" style="height: 102px;width:auto;margin-bottom:10px;"/>
                        	<?php } else {?>
							<img type="image" style="height: 102px;width:auto;margin-bottom:10px;" src="assets/images/add-image.png" alt="banner image" />
                        	<?php }?>
							
							<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['edit_id'])){echo $row['alt_tag'];}?>" class="form-control" />
						
                      </div>
					  	
                    </div>
										
                  </div>
                 				    
				  
                  <div class="form-group row">
                    <div class="col-md-9 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
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