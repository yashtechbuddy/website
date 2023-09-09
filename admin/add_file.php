<?php 
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");

	 
	//Add gallery
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		if($_POST['file_type']=="Image")
		{
		$gallery_image="";
		if($_FILES['gallery_image']['name']!="")
		{	
			$gallery_image="gallery-".rand(0,99999)."_".$_FILES['gallery_image']['name'];
			$tpath1='images/gallery/'.$gallery_image; 			 
			move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $tpath1);
				
        }	
		
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_gallery order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1;  
		  
       $data = array( 
				'category_id'  =>  $_POST['category_id'],
			    'file_type'  =>   $_POST['file_type'],
			    'gallery_image'  =>  $gallery_image,
			    'alt_tag'  =>  $_POST['alt_tag'],
				'position_order' => $position_order
			    );		
		}
		if($_POST['file_type']=="Video")
		{
		    $video_link= $_POST['video_link'];
		   	
				$data = array( 
				'category_id'  =>  $_POST['category_id'],
			    'file_type'  =>   $_POST['file_type'],
		        'video_link'  =>  $video_link,
				'position_order' => $position_order
			    );		
		        
	       	}
		
 		$qry = Insert('tbl_gallery',$data);	
		
 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_gallery.php");
		exit;	
        
		 
		
	}
	
	//Fetch selected gallery detail
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM tbl_gallery where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	
	//Edit gallery
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
		 if($_POST['file_type']=="Image")
		{
		 if($_FILES['gallery_image']['name']!="")
		 {		


				$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_gallery WHERE id='.$_GET['edit_id'].'');
			    $img_res_row=mysqli_fetch_assoc($img_res);
			

			    if($img_res_row['gallery_image']!="")
		        {
					unlink('images/gallery/'.$img_res_row['gallery_image']);
			    }

 				$gallery_image="gallery-".rand(0,99999)."_".$_FILES['gallery_image']['name'];
				$tpath1='images/gallery/'.$gallery_image; 			 
				move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $tpath1);
					
			

				$data = array(
					'category_id'  =>  $_POST['category_id'],
					'file_type'  =>   $_POST['file_type'],
					'gallery_image'  =>  $gallery_image,
					'alt_tag'  =>  $_POST['alt_tag']
					);

				$category_edit=Update('tbl_gallery', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		 else
		 {

					 $data = array(
						'category_id'  =>  $_POST['category_id'],
						'file_type'  =>   $_POST['file_type'],
						'alt_tag'  =>  $_POST['alt_tag']
						);	
 
			         $category_edit=Update('tbl_gallery', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		}
		if($_POST['file_type']=="Video")
		{
		    
	      		$data = array( 
			    'category_id'  =>  $_POST['category_id'],
			    'video_link'  =>   $_POST['video_link']
			   
			    );				
		      
		       $category_edit=Update('tbl_gallery', $data, "WHERE id = '".$_POST['edit_id']."'");

		   
		}
		     
		$_SESSION['msg']="11"; 
		header( "Location:manage_gallery.php");
		exit;
 
	}


?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Home gallery</h2>
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
                				 <input  type="hidden" name="edit_id" value="<?php echo $_GET['edit_id']; ?>" />	 
                								
                				  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                     <div class="col-sm-9">
                                      <select name="category_id" id="category_id" class="form-control" required>
                                          <option value="">--Select gallery File Type--</option>
                                          <?php  
                                            $category_stmt = "SELECT * from tbl_gallery_category";
                                            $data = mysqli_query($mysqli,$category_stmt);
                                            
                                            while($cat = mysqli_fetch_assoc($data))
                                            {
                                          ?>
                                        	<option value="<?php echo $cat['id']; ?>" <?php if(isset($_GET['edit_id']) && $cat['id']==$row['category_id']){ echo 'selected';} ?> ><?php echo $cat['category_name']; ?></option>  
                                        <?php 
                                        error_reporting(E_ALL);
                                        ini_set('display_errors', 1);
                                        }?>
                                      </select>
                                    </div>
                                  </div>
                                  
                				  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">gallery File Type :-</label>
                                     <div class="col-sm-9">
                                      <select name="file_type" id="file_type" class="form-control" onchange="galleryType()" required>
                                        	<option value="">--Select gallery File Type--</option>
                                        	<option value="Video"  <?php  if(isset($_GET['edit_id']) &&  $row['file_type']=="Video") { echo "selected"; }  ?> >Video</option>
                                        	<option value="Image"  <?php  if(isset($_GET['edit_id']) &&  $row['file_type']=="Image") { echo "selected"; }  ?> >Image</option>          							
                                      </select>
                                    </div>
                                  </div>
                                
                                <div class="form-group row" id="image" <?php if(isset($_GET['edit_id']) &&  $row['file_type']=="Image") { ?>style="display:flex;"<?php }else{ ?>style="display:none;"<?php }?> >
                                    <label class="col-sm-3 col-form-label">gallery Image :-</label>
                
                                    <div class="col-sm-9">
                                      <div class="fileupload_block">
                							<input type="file" name="gallery_image" value="fileupload" id="fileupload" />
                                            <?php if(isset($_GET['edit_id']) and $row['gallery_image']!="") {?><img type="image" src="images/gallery/<?php echo $row['gallery_image'];?>" alt="gallery image" style="height: 102px;width:auto;margin-bottom:10px;"/>
                                        	<?php } else {?>
                							<img type="image" style="height: 102px;width:auto;margin-bottom:10px;" src="assets/images/add-image.png" alt="gallery image" />
                                        	<?php }?>
                							
                							<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['edit_id'])){echo $row['alt_tag'];}?>" class="form-control" />
                						
                                      </div>
                					  	
                                    </div>
                										
                                </div>
                                 
                                <div class="form-group row" id="video" <?php if(isset($_GET['edit_id']) &&  $row['file_type']=="Video") { ?><?php }else{ ?>style="display:none;"<?php }?>>
                                    <label class="col-sm-3 col-form-label">gallery Video :- </label>
                
                                   <div class="col-sm-9">
                                      <div class="fileupload_block">
                							<input type="text" name="video_link" id="video_link"  placeholder="Enter video" title="Enter video Link!" value="<?php if(isset($_GET['edit_id'])){echo $row['video_link'];}?>" class="form-control" />
                						
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
 <script>
                  	
                  	function galleryType(type)
                  	{
                  		var type = document.getElementById("file_type").value;
                  		
                  		if(type=="Video")
                  		{
                  		    //alert("Video !");                  			
                  		    document.getElementById("image").style.display = "none";
                  		    document.getElementById("video").style.display = "flex";   
                		}                		
                  		if(type=="Image")
                  		{
                  		    //alert("Image !");                  		
                  		    document.getElementById("image").style.display = "flex";
                  		    document.getElementById("video").style.display = "none";    
                  		}                  		
                  		            	
                  	}
                  
                  </script>
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