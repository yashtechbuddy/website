<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	date_default_timezone_set('Asia/Calcutta');
			 
	//Add
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		
        	
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_menu order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1;  
		  
		$data = array( 
			'page_name'  =>  $_POST['page_name'],
			'page_link'  =>  $_POST['page_link'],
			'section_link'  =>  $_POST['section_link'],
			'visibility_status'  =>  $_POST['visibility_status'],
			'position_order' => $position_order	
			);		

 		$qry = Insert('tbl_menu',$data);	

 	  //  echo "<script>alert('".json_encode($data)."')</script>";
		$_SESSION['msg']="10"; 
		header( "Location:header_setting.php");
		exit;	

		 
		
	}
	
	//Fetch selected service detail
	if(isset($_GET['edit_id']))
	{
			 
		$qry="SELECT * FROM tbl_menu where id='".$_GET['edit_id']."'";
		$result=mysqli_query($mysqli,$qry);
		$row=mysqli_fetch_assoc($result);

	}
	
	//Edit
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
			
		$data = array( 
			'page_name'  =>  $_POST['page_name'],
			'page_link'  =>  $_POST['page_link'],
			'section_link'  =>  $_POST['section_link'],
			'visibility_status'  =>  $_POST['visibility_status']	
			);		

		 $category_edit=Update('tbl_menu', $data, "WHERE id = '".$_POST['edit_id']."'");
		     
		$_SESSION['msg']="11"; 
		header( "Location:header_setting.php");
		exit;
 
	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Menu</h2>
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
                    <label class="col-sm-3 col-form-label">Page Name :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="page_name" id="page_name" value="<?php if(isset($_GET['edit_id'])){echo $row['page_name'];}?>" class="form-control" required>
                    </div>
                  </div>    
				  				                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Link :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="page_link" id="page_link" value="<?php if(isset($_GET['edit_id'])){echo $row['page_link'];}?>" class="form-control">
                    </div>
                  </div>    		
				  			                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Section Link :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="section_link" id="section_link" value="<?php if(isset($_GET['edit_id'])){echo $row['section_link'];}?>" class="form-control">
                    </div>
                  </div>    		
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Visibility Status :-</label>
                    <div class="col-sm-9">
                      <input type="radio" id="enable" name="visibility_status" value="0" <?php if(isset($_GET['edit_id'])){if($row['visibility_status']=='0'){ echo "checked";}}else{ echo "checked";}?> /> <label for="enable"> Enable</label>  
                      <input type="radio" id="disable" name="visibility_status" value="1" <?php if(isset($_GET['edit_id'])){if($row['visibility_status']=='1'){ echo "checked";}}?> /> <label for="disable"> Disable</label>  
					   <br>  <br> 
                    </div>
                  </div>  
                  <div class="form-group row row">
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