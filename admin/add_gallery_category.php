<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

 
	
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM `tbl_gallery_category` where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);
	}
		//Add
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		
		$data = array( 
			'category_name'  =>  $_POST['category']
			);		

 		$qry = Insert('tbl_gallery_category',$data);	

 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_gallery_category.php");
		exit;	

		 
		
	}
	
	 		//edit
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
		
		$data = array( 
			'category_name'  =>  $_POST['category']
			);		

 		$category_edit=Update('tbl_gallery_category', $data, "WHERE id = '".$_POST['edit_id']."'");
 	   
		$_SESSION['msg']="11"; 
		header( "Location:manage_gallery_category.php");
		exit;	

		 
		
	} 
	  
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Image Category</h2>
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
                                        <label class="col-sm-3 col-form-label">Category :-</label>
                                        <div class="col-sm-9">
                                          <input type="text" name="category" id="title" class="form-control" value="<?php if(isset($_GET['edit_id'])){ echo $row['category_name'];} ?>" required>
                                        </div>
                                  </div>
				  
                                    <div class="form-group row row row">
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