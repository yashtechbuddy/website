<?php 
	
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	
  	//Add
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		
		$image="";
		if($_FILES['image']['name']!="")
		{	
			$image="Choose_Us-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/chooseus/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
		}				
		
		
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_chooseus order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
		$position_order=mysqli_num_rows($result_order);  
		$position_order=$position_order+1;

			
		$data = array(
				'name'  =>  $_POST['name'],
				'image'  =>  $image,
			    'alt_tag'  =>  $_POST['alt_tag'],
			    'long_desc'  => addslashes($_POST['long_desc']),
				'position_order'  =>  $position_order
			);		

 		$qry = Insert('tbl_chooseus',$data);	

 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_choose_us.php");
		exit;	
	
	}
	
    //Fetch selected service detail
	if(isset($_GET['edit_id']))
	{
			$qry="SELECT * FROM tbl_chooseus where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);
	}
	
	//Edit
	
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
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
	
			$category_edit=Update('tbl_chooseus', $data, "WHERE id = '".$_POST['edit_id']."'");
	  
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
								 	<input  type="hidden" name="edit_id" value="<?php echo $_GET['edit_id'];?>" />	 

									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Choose Us Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="name" id="name"  value="<?php if(isset($_GET['edit_id'])){echo $row['name'];}?>">
                                        </div>
                                    </div>
									
									  <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Choose Us Image :-</label>
                                        <div class="col-sm-9">
                                          <div class="fileupload_block">
                    							<input type="file" name="image" value="fileupload" id="fileupload" />
                                                <?php if(isset($_GET['edit_id']) and $row['image']!="") {?><img type="image" src="images/chooseus/<?php echo $row['image'];?>" alt="image" style="width: 172px;height:auto;margin-bottom:10px;"/>
                                            	<?php } else {?>
                    							<img type="image" style="height: 90px;width:auto;margin-bottom:10px;" src="images/add-image.png" alt="image" />
                                            	<?php }?>
                    							<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['edit_id'])){echo $row['alt_tag'];}?>" class="form-control" />
                                          </div>
                                        </div>
                                      </div>
									
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label">Choose Us Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="tinymce-editor" id="tinymce-example" name="long_desc"><?php if(isset($_GET['edit_id'])){echo $row['long_desc'];}?></textarea>
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