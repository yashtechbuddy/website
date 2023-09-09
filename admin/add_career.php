<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	//Add product
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		$career_image="";
		if($_FILES['career_image']['name']!="")
		{	
			$career_image="Career-".rand(0,99999)."_".$_FILES['career_image']['name'];
			$tpath1='images/career/'.$career_image; 			 
			move_uploaded_file($_FILES["career_image"]["tmp_name"], $tpath1);
				
        }
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_career order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1;  
		
				
		$data = array( 
				'designation'  =>  $_POST['designation'],
				'career_image' => $career_image,
				'education'  =>  $_POST['education'],
				'position_order' => $position_order,
			'description'  =>  addslashes($_POST['description']),
			'sort_desc'  =>  addslashes($_POST['sort_desc']),
			'location'  =>  addslashes($_POST['location']),
			'posted_on'  =>  addslashes($_POST['posted_on'])	
			    );		

 		$qry = Insert('tbl_career',$data);	

 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_career.php");
		exit;	

		 
		
	}
	
	//Fetch selected product detail
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM tbl_career where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	
	//Edit Banner
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
		if($_FILES['career_image']['name']!="")
		 {		


				$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_career WHERE id='.$_GET['edit_id'].'');
			    $img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['career_image']!="")
		        {
					unlink('images/career/'.$img_res_row['career_image']);
			    }

 				$career_image="career-".rand(0,99999)."_".$_FILES['career_image']['name'];
				$tpath1='images/career/'.$career_image; 			 
				move_uploaded_file($_FILES["career_image"]["tmp_name"], $tpath1);
					
			

			$data = array(
			'designation'  =>  $_POST['designation'],
			'career_image' => $career_image,
			'education'  =>  $_POST['education'],
			'description'  =>  addslashes($_POST['description']),
			'sort_desc'  =>  addslashes($_POST['sort_desc']),
			'location'  =>  addslashes($_POST['location']),
			'posted_on'  =>  addslashes($_POST['posted_on'])	
			);

				$category_edit=Update('tbl_career', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		 else
		 {
		 $data = array(
			'designation'  =>  $_POST['designation'],
			'education'  =>  $_POST['education'],
			'description'  =>  addslashes($_POST['description']),
			'sort_desc'  =>  addslashes($_POST['sort_desc']),
			'location'  =>  addslashes($_POST['location']),
			'posted_on'  =>  addslashes($_POST['posted_on'])	
			);	

		 $category_edit=Update('tbl_career', $data, "WHERE id = '".$_POST['edit_id']."'");
		 }
		$_SESSION['msg']="11"; 
		header( "Location:manage_career.php");
		exit;
 
	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Career</h2>
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
                    <label class="col-sm-3 col-form-label">Career Designation :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="designation" id="designation" value="<?php if(isset($_GET['edit_id'])){echo $row['designation'];}?>" class="form-control" required>
                    </div>
                  </div>    
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Career Education :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="education" id="education" value="<?php if(isset($_GET['edit_id'])){echo $row['education'];}?>" class="form-control" required>
                    </div>
                  </div>    
				  
				  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">short Description :-</label>
                    <div class="col-sm-9">
					  <textarea  name="sort_desc" id="sort_desc" class="form-control" col='3'><?php if(isset($_GET['edit_id'])){echo $row['sort_desc'];}?></textarea>
	                </div>
                  </div> 

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Location :-</label>
                  <div class="col-sm-9">
                   <input type="text" name="location" id="location" value="<?php if(isset($_GET['edit_id'])){echo $row['location'];}?>" class="form-control" >
                  </div>
            </div>          

             <div class="form-group row">
                <label class="col-sm-3 col-form-label">Posted On :-</label>
                  <div class="col-sm-9">
                   <input type="date" name="posted_on" id="posted_on" value="<?php if(isset($_GET['edit_id'])){echo $row['posted_on'];}?>" class="form-control" >
                  </div>
            </div>          
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Career Description :-</label>
                    <div class="col-sm-9">
					<div class="fileupload_block" >
					  <textarea  name="description" id="tinymce-example" class="form-control"><?php if(isset($_GET['edit_id'])){echo $row['description'];}?></textarea>
					  </div>
	                </div>
                  </div>   
				  
                  <div class="form-group row row">
                    <label class="col-sm-3 col-form-label">Career Image :-</label>

                    <div class="col-sm-9">
                      <div class="fileupload_block">
							<input type="file" name="career_image" value="fileupload" id="fileupload" />
                            <?php if(isset($_GET['edit_id']) and $row['career_image']!="") {?><img type="image" src="images/career/<?php echo $row['career_image'];?>" alt="image" style="width:100px;height:auto;margin-bottom:10px;"/>
                        	<?php } else {?>
							<img type="image" style="width:100px;height:auto;margin-bottom:10px;" src="assets/images/add-image.png" alt="image" />
                        	<?php }?>
							
                      </div>
					  	
                    </div>
										
                  </div>
                 
                  <div class="form-group row row">
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