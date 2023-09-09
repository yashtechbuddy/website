<?php 
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");

	 
	//Add banner
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		
		$process_image="";
		if($_FILES['process_image']['name']!="")
		{	
			$process_image="Process-".rand(0,99999)."_".$_FILES['process_image']['name'];
			$tpath1='images/process/'.$process_image; 			 
			move_uploaded_file($_FILES["process_image"]["tmp_name"], $tpath1);
				
        }	
		
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_process order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1;  
		  
       $data = array( 
				'title'  =>  addslashes($_POST['title']),
				'process_desc'  => addslashes($_POST['process_desc']),
				'alt_tag'  =>  $_POST['alt_tag'],
				'text_color'  =>  $_POST['text_color'],
				'image' => $process_image,
				'position_order' => $position_order
			    );		

 		$qry = Insert('tbl_process',$data);	

		$_SESSION['msg']="10"; 
		header( "Location:manage_process.php");
		exit;		
	}
	
	//Fetch selected banner detail
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM tbl_process where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	
	//Edit Banner
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
		 
		 if($_FILES['process_image']['name']!="")
		 {		


				$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_process WHERE id='.$_GET['edit_id'].'');
			    $img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['image']!="")
		        {
					unlink('images/process/'.$img_res_row['image']);
			    }

	            $process_image="Process-".rand(0,99999)."_".$_FILES['process_image']['name'];
			    $tpath1='images/process/'.$process_image; 			 
			    move_uploaded_file($_FILES["process_image"]["tmp_name"], $tpath1);
					
			

				$data = array(
					'title'  =>  addslashes($_POST['title']),
				'process_desc'  => addslashes($_POST['process_desc']),
				'alt_tag'  =>  $_POST['alt_tag'],
				'text_color'  =>  $_POST['text_color'],
				'image' => $process_image,
					);

				$category_edit=Update('tbl_process', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		 else
		 {

					 $data = array(
						'title'  =>  addslashes($_POST['title']),
						'process_desc'  => addslashes($_POST['process_desc']),
						'alt_tag'  =>  $_POST['alt_tag'],  
						'text_color'  =>  $_POST['text_color']
						);	
 
			         $category_edit=Update('tbl_process', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }

		     
		$_SESSION['msg']="11"; 
		header( "Location:manage_process.php");
		exit;
 
	}


?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Process</h2>
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
                    <label class="col-sm-3 col-form-label">Title :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="title" id="title" value="<?php if(isset($_GET['edit_id'])){echo $row['title'];}?>" class="form-control" required>
                    </div>
                  </div> 
					 <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Career Description :-</label>
                    <div class="col-sm-9">
					<div class="fileupload_block" >
					  <textarea  name="process_desc" id="tinymce-example" class="form-control"><?php if(isset($_GET['edit_id'])){echo $row['process_desc'];}?></textarea>
					  </div>
	                </div>
                  </div>  
                       
				  	<div class="form-group row">
                    <label class="col-sm-3 col-form-label">Color :-</label>
                    <div class="col-sm-9">
                      <input type="color" name="text_color" id="text_color" value="<?php if(isset($_GET['edit_id'])){echo $row['text_color'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Image :- </label>

                    <div class="col-sm-9">
                      <div class="fileupload_block">
							<input type="file" name="process_image" value="fileupload" id="fileupload" />
                            <?php if(isset($_GET['edit_id']) and $row['image']!="") {?><img type="image" src="images/process/<?php echo $row['image'];?>" alt="process image" style="height: 102px;width:auto;margin-bottom:10px;"/>
                        	<?php } else {?>
							<img type="image" style="height: 102px;width:auto;margin-bottom:10px;" src="assets/images/add-image.png" alt="process image" />
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