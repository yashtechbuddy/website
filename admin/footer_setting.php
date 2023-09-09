<?php
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	
	$qry="SELECT * FROM tbl_footer_setting where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
  
	if(isset($_POST['contact_submit']))
	{				
		$data = array(
			'address'  =>  $_POST['address'],
			'address1'  =>  $_POST['address1'],
			'email1'  =>  $_POST['email1'],
			'email2'  =>  $_POST['email2'],
			'email3'  =>  $_POST['email3'],
			'phone1'  =>  $_POST['phone1'],
			'phone2'  =>  $_POST['phone2'],
			'phone3'  =>  $_POST['phone3'],
			'time'  =>  $_POST['time']
		);			
	
		$settings_edit=Update('tbl_footer_setting', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:footer_setting.php");
		exit;
        
	}

	if(isset($_POST['social_submit']))
	{				
		$data = array(
			 				
			'facebook_link'  =>  $_POST['facebook_link'], 
			'twitter_link'  =>  $_POST['twitter_link'], 
			'linkedin_link'  =>  $_POST['linkedin_link'], 
			'googleplus_link'  =>  $_POST['googleplus_link'], 
			'instagram_link'  =>  $_POST['instagram_link'], 
			'youtube_link'  =>  $_POST['youtube_link'], 
			'dribbble_link'  =>  $_POST['dribbble_link']
		);			
	
		$settings_edit=Update('tbl_footer_setting', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:footer_setting.php");
		exit;
        
	}
if(isset($_GET['s_id']))
	{ 
		$data = array( 
			'quick_link_visibility'  =>  $_GET['status']
			);		
		$category_edit=Update('tbl_menu', $data, "WHERE id = '".$_GET['s_id']."'");
	}
	
 if(isset($_GET['pro_id']))
	{ 
		$data1 = array( 
			'footer_visibility'  =>  $_GET['status']
			);		
		$category_edit=Update('tbl_products', $data1, "WHERE id = '".$_GET['pro_id']."'");
	}

	if(isset($_POST['logo_submit']))
	{		
		if($_FILES['logo']['name']!="")
		{						

			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_footer_setting WHERE id=1');
			$img_res_row=mysqli_fetch_assoc($img_res);
		
			if($img_res_row['logo']!="")
			{
				unlink('images/footer/'.$img_res_row['logo']);
			}			
			
			$logo="Logo-".rand(0,99999)."_".$_FILES['logo']['name'];
			$tpath1='images/footer/'.$logo; 			 
			move_uploaded_file($_FILES["logo"]["tmp_name"], $tpath1);
				
			$data = array(
				'name'  =>  $_POST['name'],
				'logo'  =>  $logo,
			    'alt_tag'  =>  $_POST['alt_tag'],
				'about_us'  =>  addslashes($_POST['about_us'])
			);			

		}	
		else
		{				
			$data = array(
				'name'  =>  $_POST['name'],
			    'alt_tag'  =>  $_POST['alt_tag'],
				'about_us'  =>  addslashes($_POST['about_us'])
			);			
		}
	
		$settings_edit=Update('tbl_footer_setting', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:footer_setting.php");
		exit;
        
	}
 
?>
<script>	
	function changeStatus(id, status)
	{										  
	  $.ajax({
			url:"footer_setting.php",
			type:'get',
			data:{s_id:id,status:status},
			success:function(){
				//alert('Status change successfully');
				window.location.reload();
			}
		});
	}
	
	function changeStatus1(id, status)
	{										  
	  $.ajax({
			url:"footer_setting.php",
			type:'get',
			data:{pro_id:id,status:status},
			success:function(){
				//alert('Status change successfully');
				window.location.reload();
			}
		});
	}
	</script>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Footer Section</h2>
      </div>
   </div>
</div>
    
	<div class="contentbar">
                <!-- Start row -->
                <div class="row">
	 <!-- Start col -->
				<div class="col-md-12 col-lg-12">
                      <div class="card m-b-30">
                            
                            <div class="card-body">
                                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-about-tab-justified" data-toggle="pill" href="#pills-about-justified" role="tab" aria-controls="pills-about" aria-selected="true">About Us</a>
                                    </li>
                                     <li class="nav-item">
                                        <a class="nav-link" id="pills-quicklink-tab-justified" data-toggle="pill" href="#pills-quicklink-justified" role="tab" aria-controls="pills-quicklink" aria-selected="false">Quick Link</a>
                                    </li>
									<!--<li class="nav-item">-->
         <!--                               <a class="nav-link" id="pills-product_cat-tab-justified" data-toggle="pill" href="#pills-product_cat-justified" role="tab" aria-controls="pills-product_cat" aria-selected="false">Products</a>-->
         <!--                           </li>-->
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab-justified" data-toggle="pill" href="#pills-contact-justified" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                                    </li>
									<li class="nav-item">
                                        <a class="nav-link" id="pills-social-tab-justified" data-toggle="pill" href="#pills-social-justified" role="tab" aria-controls="pills-social" aria-selected="false">Social Media</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tab-justifiedContent">
                                    <div class="tab-pane fade show active" id="pills-about-justified" role="tabpanel" aria-labelledby="pills-about-tab-justified">
                                       
									   <form action="" name="settings_from" method="post" enctype="multipart/form-data">
								 
								
									<div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Footer Name :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="name" value="<?php echo $settings_row['name'];?>" >
                                        </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label for="logo" class="col-sm-3 col-form-label">Footer Logo :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                             <input type="file" name="logo" id="fileupload" >
											<img type="logo"  style="object-fit:cover; height:100px;weight:100px" src="images/footer/<?php echo $settings_row['logo'];?>" alt="image"  />
											<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Favicon Alternate text" title="Enter Logo Alternate text here !" value="<?php echo $settings_row['alt_tag']; ?>" class="form-control" />
											</div>
										</div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label for="about_us" class="col-sm-3 col-form-label">About Us Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea  id="tinymce-example" class="tinymce-editor" name="about_us"><?php echo stripslashes($settings_row['about_us']);?></textarea>
											</div>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="logo_submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-quicklink-justified" role="tabpanel" aria-labelledby="pills-quicklink-tab-justified">
                                 
								 <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 <div class="row">
								 <?php
									$permission_id="";
									$qry1="SELECT * FROM tbl_menu order by id asc";
									$result1=mysqli_query($mysqli,$qry1);
									
									while($row1=mysqli_fetch_array($result1))
									{
										$permission_id=$permission_id.$row1['id'].",";
										
								?>
                                       <?php 
                                 if($row1['quick_link_visibility']=="0")
                                 { //approved
                                 ?>	
							<div class="col-sm-3 custom-control custom-switch" style="padding: 12px 50px;">
							
                                    <input type="checkbox" class="custom-control-input" onclick="changeStatus(<?php echo $row1['id'];?>,1);" id="customSwitch<?php echo $row1['id'];?>" checked>
									<label class="custom-control-label js-switch-primary" for="customSwitch<?php echo $row1['id'];?>"><?php echo $row1['page_name']; ?> </label>
								</div>	
                              <?php
                                 }
                                 else{ 
                                 ?>	
									<div class="col-sm-3 custom-control custom-switch" style="padding: 12px 50px;">
                                    <input type="checkbox" class="custom-control-input" onclick="changeStatus(<?php echo $row1['id'];?>,0);" id="customSwitch<?php echo $row1['id'];?>" >
									<label class="custom-control-label" for="customSwitch<?php echo $row1['id'];?>"><?php echo $row1['page_name']; ?> </label>
								</div>
                              <?php
                                 }
								?>	
								<?php							 
                                  	}
									?>
									</div>
                                </form>
                                    </div>
									
									<div class="tab-pane fade" id="pills-product_cat-justified" role="tabpanel" aria-labelledby="pills-product_cat-tab-justified">
                                 
								 <form action="" name="pro" method="post" enctype="multipart/form-data">
								 <div class="row">
								 <?php
									$qry_pro="SELECT * FROM tbl_courses";
									$result_pro=mysqli_query($mysqli,$qry_pro);
									
									while($row_pro=mysqli_fetch_array($result_pro))
									{
										
								?>
                                       <?php 
                                 if($row_pro['footer_visibility']=="0")
                                 { //approved
                                 ?>	
							<div class="col-sm-4 custom-control custom-switch" style="padding: 12px 50px;">
							
                                    <input type="checkbox" class="custom-control-input" onclick="changeStatus1(<?php echo $row_pro['id'];?>,1);" id="customSwitch_<?php echo $row_pro['id'];?>" checked>
									<label class="custom-control-label js-switch-primary" for="customSwitch_<?php echo $row_pro['id'];?>"><?php echo $row_pro['title']; ?> </label>
								</div>	
                              <?php
                                 }
                                 else{ 
                                 ?>	
									<div class="col-sm-3 custom-control custom-switch" style="padding: 12px 50px;">
                                    <input type="checkbox" class="custom-control-input" onclick="changeStatus1(<?php echo $row_pro['id'];?>,0);" id="customSwitch_<?php echo $row_pro['id'];?>" >
									<label class="custom-control-label" for="customSwitch_<?php echo $row_pro['id'];?>"><?php echo $row_pro['title']; ?> </label>
								</div>
                              <?php
                                 }
								?>	
								<?php							 
                                  	}
									?>
									</div>
                                </form>
                                    </div>
									
									<div class="tab-pane fade" id="pills-contact-justified" role="tabpanel" aria-labelledby="pills-contact-tab-justified">
                                       <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
									<div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">Address  :-</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address"><?php echo stripslashes($settings_row['address']);?></textarea>
											
                                        </div>
                                    </div>
									<!--div class="form-group row">
                                        <label for="address1" class="col-sm-3 col-form-label">Address  :-</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address1"><?php echo stripslashes($settings_row['address1']);?></textarea>
											
                                        </div>
                                    </div-->
									<div class="form-group row">
                                        <label for="email1" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email1"  name="email1" value="<?php echo $settings_row['email1'];?>">
                                        </div>
                                    </div>
									 <div class="form-group row">
                                        <label for="phone1" class="col-sm-3 col-form-label">Contact</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="phone1"  name="phone1" value="<?php echo $settings_row['phone1'];?>">
                                        </div>
                                    </div>
									
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="contact_submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                                    </div>
									<div class="tab-pane fade" id="pills-social-justified" role="tabpanel" aria-labelledby="pills-social-tab-justified">
                                        <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
									<div class="form-group row">
                                        <label for="facebook_link" class="col-sm-3 col-form-label">Facebook Link :-</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="facebook_link" value="<?php echo $settings_row['facebook_link'];?>" class="form-control" >
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="twitter_link" class="col-sm-3 col-form-label">Twitter Link :-</label>
                                        <div class="col-sm-9">
                                           <input type="text" name="twitter_link" value="<?php echo $settings_row['twitter_link'];?>" class="form-control" >
                                        </div>
                                    </div>
									 <div class="form-group row">
                                        <label for="linkedin_link" class="col-sm-3 col-form-label">Linkedin Link :-</label>
                                        <div class="col-sm-9">
                                           <input type="text" name="linkedin_link" value="<?php echo $settings_row['linkedin_link'];?>" class="form-control" >
                                        </div>
                                    </div>
									
									<div class="form-group row">
                                        <label for="googleplus_link" class="col-sm-3 col-form-label">Google+ Link :-</label>
                                        <div class="col-sm-9">
                                           <input type="text" name="googleplus_link" value="<?php echo $settings_row['googleplus_link'];?>" class="form-control" >
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="instagram_link" class="col-sm-3 col-form-label">Instagram Link :-</label>
                                        <div class="col-sm-9">
                                           <input type="text" name="instagram_link" value="<?php echo $settings_row['instagram_link'];?>" class="form-control" >
                                        </div>
                                    </div>
									<!--div class="form-group row">
                                        <label for="youtube_link" class="col-sm-3 col-form-label">Youtube Link :-</label>
                                        <div class="col-sm-9">
                                           <input type="text" name="youtube_link" value="<?php echo $settings_row['youtube_link'];?>" class="form-control" >
                                        </div>
                                    </div-->
									
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="social_submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
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