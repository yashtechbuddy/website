<?php 
	
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	
	$qry="SELECT * FROM tbl_about_us where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
  
	if(isset($_POST['submit']))
	{
	   // if($_POST['file_type']=="Image")
	    
	        
	   
    		if(isset($_POST['submit']))
	{
		
		if($_FILES['image']['name']!="")
		{
			$image="Aboutus-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/about-us/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
				
			$data = array(
				'title'  =>  $_POST['title'],
				'small_title'  => addslashes($_POST['small_title']),
				'image'  =>  $image,
			    'alt_tag'  =>  $_POST['alt_tag'],
				'description'  => addslashes($_POST['description'])
			);			
		}
		else
		{
			
			$data = array(
				'title'  =>  $_POST['title'],
				'small_title'  => addslashes($_POST['small_title']),
			    'alt_tag'  =>  $_POST['alt_tag'],
				'description'  => addslashes($_POST['description'])
			);			
		}
	
		$settings_edit=Update('tbl_about_us', $data, "WHERE id=1");
		$_SESSION['msg']="11";
		header( "Location:manage_about_us.php");
		exit;
		  
	}
 
    		
    		
	    
	    
	   //  if($_POST['file_type']=="Video")
	   // {
	        
	
    // 		if($_FILES['video_link']['name']!="")
    // 		{	
    // 			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_about_us where id=1');
    // 			$img_res_row=mysqli_fetch_assoc($img_res);
    			
    
    // 			    if($img_res_row['video_link']!="")
    // 		        {
    // 					unlink('images/about-us/'.$img_res_row['video_link']);
    // 			    }
        				
    //     			$video_link="Aboutus-".rand(0,99999)."_".$_FILES['video_link']['name'];
    //     			$tpath2='images/about-us/'.$video_link; 			 
    //     			move_uploaded_file($_FILES["video_link"]["tmp_name"], $tpath2);
        				
    //     			$data = array(
    //     				'title'  =>  addslashes($_POST['title']),
    //     				'small_title'  =>  addslashes($_POST['small_title']),
    //     				'video_link'  =>  $video_link,
    //     				'file_type' => $_POST['file_type'],
    //     				'description'  => addslashes($_POST['description']),
    //     				'special1' => $_POST['special1'],
    //     				'special2' => $_POST['special2'],
    //     				'year' => $_POST['year']
    //     			);
    			
    // 		$settings_edit=update('tbl_about_us', $data, "WHERE id=1");	
    			
    // 		}
    // 		else
    // 		{
    			
    // 			$data = array(
    // 				'title'  =>  $_POST['title'],
    // 				'small_title'  =>  addslashes($_POST['small_title']),				
    // 			    'alt_tag'  =>  $_POST['alt_tag'],
    // 				'description'  => addslashes($_POST['description']),
    // 				'special1' => $_POST['special1'],
    // 				'special2' => $_POST['special2'],
    // 				'year' => $_POST['year']
    // 			);	
    			
    // 			$settings_edit=update('tbl_about_us', $data, "WHERE id=1");
    // 		}
    	
	   
	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">About Us</h2>
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
                                        <label for="inputusername" class="col-sm-3 col-form-label">About Us Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="title" id="title" value="<?php echo $settings_row['title'];?>" >
                                        </div>
                                    </div>
									
									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">About Us Small Title :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="small_title" id="small_title" value="<?php echo $settings_row['small_title'];?>" >
                                        </div>
                                    </div>
									<!--<div class="form-group row">-->
         <!--                               <label class="col-sm-3 col-form-label">About-us File Type :-</label>-->
         <!--                                <div class="col-sm-9">-->
         <!--                                 <select name="file_type" id="file_type" class="form-control" onchange="bannerType()" required>-->
         <!--                                   	<option value="">--Select Banner File Type--</option>-->
         <!--                                   	<option value="Video"  <?php  if($settings_row['file_type']=="Video") { echo "selected"; }  ?> >Video</option>-->
         <!--                                   	<option value="Image"  <?php  if($settings_row['file_type']=="Image") { echo "selected"; }  ?> >Image</option>          							-->
         <!--                                 </select>-->
         <!--                               </div>-->
         <!--                            </div>-->
                                    
              
                           <!--         <div class="form-group row" id="image" <?php if($settings_row['file_type']=="Image") { ?>style="display:flex;"<?php }else{ ?>style="display:none;"<?php }?> >-->
                           <!--             <label class="col-sm-3 col-form-label">About-us Image :-</label>-->
                    
                           <!--             <div class="col-sm-9">-->
                           <!--               <div class="fileupload_block">-->
                    							<!--<input type="file" name="image" value="fileupload" id="fileupload" />-->
                           <!--                     <?php if($settings_row['image']!="") {?><img type="image" src="images/about-us/<?php echo $settings_row['image'];?>" alt="banner image" style="height: 102px;width:auto;margin-bottom:10px;"/>-->
                           <!--                 	<?php } else {?>-->
                    							<!--<img type="image" style="height: 102px;width:auto;margin-bottom:10px;" src="images/add-image.png" alt="about-us image" />-->
                           <!--                 	<?php }?>-->
                    							
                    							<!--<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php echo $settings_row['alt_tag'];?>" class="form-control" />-->
                    						
                           <!--               </div>-->
                    					  	
                           <!--             </div>-->
                    										
                           <!--         </div>-->
                                    
                         <!--           <div class="form-group row" id="video" <?php if($settings_row['file_type']=="Video") { ?>style="display:flex;"<?php }else{ ?>style="display:none;"<?php }?>>-->
                         <!--               <label class="col-sm-3 col-form-label">About-us Video :- </label>-->
                    
                         <!--               <div class="col-sm-9">-->
                    					<!--<div class="fileupload_block">-->
                         <!--                   <input type="file" name="video_link" value="fileupload" id="fileupload" >-->
                         <!--                       <?php if($settings_row['video_link']!="") {?>-->
                         <!--                   	  <div class="fileupload_img">-->
                    					<!--				<br>-->
                    					<!--				<video controls style="width:200px; height:auto;">-->
                    					<!--					<source src="images/about-us/<?php echo $settings_row['video_link'];?>" type="video/mp4">-->
                    					<!--				</video>-->
                    					
                    					<!--		  </div>-->
                         <!--                   	<?php } ?>-->
                    							
                         <!--               </div>-->
                    										
                         <!--             </div>-->
                         <!--			</div>-->
                
									 <div class="form-group row">
                                        <label for="inputimage" class="col-sm-3 col-form-label">About Us Image :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                             <input type="file" name="image" id="fileupload" >
											<img type="image" height="150" width="150" style="object-fit:cover;" src="images/about-us/<?php echo $settings_row['image'];?>" alt="About Us image" />
											<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Logo Alternate text" title="Enter Logo Alternate text here !" value="<?php echo $settings_row['alt_tag'];?>" class="form-control" />
										</div>
										</div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label">About Us Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="tinymce-editor" id="tinymce-example" name="description"><?php echo stripslashes($settings_row['description']);?></textarea>
											</div>
                                        </div>
                                    </div>
                                    	<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">special1 :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="special1" id="special1" value="<?php echo $settings_row['special1'];?>" >
                                        </div>
                                    </div>
										<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">special2 :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="special2" id="special2" value="<?php echo $settings_row['special2'];?>" >
                                        </div>
                                    </div>
										<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">year :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="year" id="year" value="<?php echo $settings_row['year'];?>" >
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

// <script>
//  	function bannerType(type)
//                   	{
//                   		var type = document.getElementById("file_type").value;
                  		
//                   		if(type=="Video")
//                   		{
                  		                   			
//                   		    document.getElementById("image").style.display = "none";
//                   		    document.getElementById("video").style.display = "flex";   
//                 		}                		
//                   		if(type=="Image")
//                   		{
                  		                    		
//                   		    document.getElementById("image").style.display = "flex";
//                   		    document.getElementById("video").style.display = "none";    
//                   		}                  		
                  		            	
//                   	}                 	
                  
// </script>
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