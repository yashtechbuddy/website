<?php
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	
	$qry="SELECT * FROM tbl_header_setting where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
  
 
	//Update Logo Section
	if(isset($_POST['logo_submit']))
	{		


		if($_FILES['logo']['name']!="" && $_FILES['icon']['name']!="")
		{						

			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_header_setting WHERE id=1');
			$img_res_row=mysqli_fetch_assoc($img_res);
			if($img_res_row['logo']!="")
			{
				unlink('images/header/'.$img_res_row['logo']);
			}			
			if($img_res_row['icon']!="")
			{
				unlink('images/header/'.$img_res_row['icon']);
			}
			
			
			$logo="Logo-".rand(0,99999)."_".$_FILES['logo']['name'];
			$tpath1='images/header/'.$logo; 			 
			move_uploaded_file($_FILES["logo"]["tmp_name"],$tpath1);
				
			$icon="Favicon-".rand(0,99999)."_".$_FILES['icon']['name'];
			$tpath1='images/header/'.$icon; 			 
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath1);
			
			
			$data = array(
				'name'  =>  $_POST['name'],
				'logo'  =>  $logo,				
			    'logo_alt_tag'  =>  $_POST['logo_alt_tag'],
				'icon'  =>  $icon,
			    'icon_alt_tag'  =>  $_POST['icon_alt_tag']
			);			

		}
		elseif($_FILES['logo']['name']!="")
		{						

			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_header_setting WHERE id=1');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['logo']!="")
			{
				unlink('images/header/'.$img_res_row['logo']);
			}
			
			
			$logo="Logo-".rand(0,99999)."_".$_FILES['logo']['name'];
			$tpath1='images/header/'.$logo; 			 			
			move_uploaded_file($_FILES["logo"]["tmp_name"],$tpath1);
				
			$data = array(
				'name'  =>  $_POST['name'],
				'logo'  =>  $logo,
				'logo_alt_tag'  =>  $_POST['logo_alt_tag'],
				'icon_alt_tag'  =>  $_POST['icon_alt_tag']
			);			

		}
		elseif($_FILES['icon']['name']!="")
		{						

			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_header_setting WHERE id=1');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['icon']!="")
			{
				unlink('images/header/'.$img_res_row['icon']);
			}
			
			
			$icon="Favicon-".rand(0,99999)."_".$_FILES['icon']['name'];
			$tpath1='images/header/'.$icon; 		
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath1);
				
			$data = array(
				'name'  =>  $_POST['name'],
				'logo_alt_tag'  =>  $_POST['logo_alt_tag'],
			    'icon'  =>  $icon,
				'icon_alt_tag'  =>  $_POST['icon_alt_tag']
			);			

		}
		else
		{				
			$data = array(
				'name'  =>  $_POST['name'], 
				'logo_alt_tag'  =>  $_POST['logo_alt_tag'],
			    'icon_alt_tag'  =>  $_POST['icon_alt_tag']
			);			
		}
	
		$settings_edit=Update('tbl_header_setting', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:header_setting.php");
		exit;
        
	}
	//Update Contact Detail
	if(isset($_POST['contact_submit']))
	{				
		$data = array(
			'address'  =>  $_POST['address'],
			'email'  =>  $_POST['email'],
			'phone'  =>  $_POST['phone'],
			'time'  =>  $_POST['time']
		);			
	
		$settings_edit=Update('tbl_header_setting', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:header_setting.php");
		exit;
        
	}
	//Update Social Media
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
	
		$settings_edit=Update('tbl_header_setting', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:header_setting.php");
		exit;
        
	}
	
	//Delete menu 	
	if(isset($_GET['menu_id']))
	{ 
		Delete('tbl_menu','id='.$_GET['menu_id'].'');
      
		$_SESSION['msg']="12";
		header( "Location:header_setting.php");
		exit;
		
	}	
	
	if(isset($_GET['s_id']))
	{ 
		$data = array( 
			'visibility_status'  =>  $_GET['status']
			);		
		$category_edit=Update('tbl_menu', $data, "WHERE id = '".$_GET['s_id']."'");
	}
?>
<script>	
	function changeStatus(id, status)
	{										  
	  $.ajax({
			url:"header_setting.php",
			type:'get',
			data:{s_id:id,status:status},
			success:function(){
				//alert('Status change successfully');
				window.location.reload();
			}
		});
	}
	</script>
	<!--SCRIPT FOR POSITION ORDER-->					  
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
			
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Header Section</h2>
      </div>
	    <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
			<a href="add_menu.php?add=yes" >
			<button class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Add Menu</button>	
			</a>
            </div>                        
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
                                        <a class="nav-link active" id="pills-menu-tab-justified" data-toggle="pill" href="#pills-menu-justified" role="tab" aria-controls="pills-menu" aria-selected="true">Menu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-logo-tab-justified" data-toggle="pill" href="#pills-logo-justified" role="tab" aria-controls="pills-logo" aria-selected="false">Logo</a>
                                    </li>
                                    <!--li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab-justified" data-toggle="pill" href="#pills-contact-justified" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                                    </li>
									<li class="nav-item">
                                        <a class="nav-link" id="pills-social-tab-justified" data-toggle="pill" href="#pills-social-justified" role="tab" aria-controls="pills-social" aria-selected="false">Social Media</a>
                                    </li-->
                                </ul>
                                <div class="tab-content" id="pills-tab-justifiedContent">
                                    <div class="tab-pane fade show active" id="pills-menu-justified" role="tabpanel" aria-labelledby="pills-menu-tab-justified">
                                         <div class="card m-b-30">
            <div class="card-body">
               <div class="table-responsive">
			   		
                  <table id="default-datatable" class="display table table-striped table-bordered">
                     <thead>
								<tr>                  
								  <th>#</th>
								  <th>Page Name</th>
								  <th>Page Link</th>	
								  <!--th>Section Link</th-->	
								  <th>Visibility Status</th>				  
								  <th class="cat_action_list">Action</th>
								</tr>
                     </thead>
                     <tbody class="row_position1">
                        <?php	
                           $qry="SELECT * FROM tbl_menu order by position_order ASC";
                           $result=mysqli_query($mysqli,$qry);
                           $count=mysqli_num_rows($result);
                           if($count==0)
                           {
                           ?>	
                        <tr>
                           <td style="text-align:center; padding:60px;" colspan="6">No Record Found !</td>
                        </tr>
                        <?php	
                           }
                           
                           
                           $i=0;
                           while($row=mysqli_fetch_array($result))
                           {					
                           ?>
                        <tr id="<?php echo $row['id']; ?>">
                           <td><?php echo $row['position_order'];?></td>
								  <td><?php echo $row['page_name'];?></td>
								
										  
								  <td><?php echo $row['page_link'];?></td>
								 <!--td><?php echo $row['section_link'];?></td-->	
                           <td>
                              <?php 
                                 if($row['visibility_status']=="0")
                                 { //approved
                                 ?>			  
                              	
							  <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" onclick="changeStatus(<?php echo $row['id'];?>,1);" id="customSwitch<?php echo $row['id'];?>" checked>
									<label class="custom-control-label" for="customSwitch<?php echo $row['id'];?>"></label>
                                </div>
                              <?php
                                 }
                                 else{ 
                                 ?>			  
                              <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" onclick="changeStatus(<?php echo $row['id'];?>,0);" id="customSwitch<?php echo $row['id'];?>" >
									<label class="custom-control-label" for="customSwitch<?php echo $row['id'];?>"></label>
                                </div>
                              <?php
                                 }						  
                                  ?>
                           </td>
                           <td>
                              <a href="add_menu.php?edit_id=<?php echo $row['id'];?>" class="btn btn-dark"><i class="feather ion ion-md-create"></i>   Edit</a>
                              <a href="?menu_id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?');"><i class="feather icon-trash-2 mr-2"></i> Delete</a>
                           </td>
                        </tr>
                        <?php
                           $i++;
                           }
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-logo-justified" role="tabpanel" aria-labelledby="pills-logo-tab-justified">
                                 
								 <form action="" name="editprofile" method="post" enctype="multipart/form-data">
									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Website Name :-  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="name" id="name" value="<?php echo $settings_row['name'];?>" >
                                        </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label for="inputimage" class="col-sm-3 col-form-label">Website Logo  :- </label>
                                        <div class="col-sm-9">
											<div class="fileupload_block" >
                                             <input type="file" name="logo" id="fileupload" >
											<img type="image" height="70" width="auto" style="object-fit:cover;" src="images/header/<?php echo $settings_row['logo'];?>" alt="RND" />
										</div>
										<input type="text" name="logo_alt_tag" id="logo_alt_tag"  placeholder="Enter Image Alternate text" title="Enter Logo Alternate text here !" value="<?php echo $settings_row['logo_alt_tag']; ?>" class="form-control" />
										</div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label for="inputimage" class="col-sm-3 col-form-label">Website Favicon Icon  :- </label>
                                        <div class="col-sm-9">
										<div class="fileupload_block">
                                             <input type="file" name="icon" id="fileupload" >
											<img type="image" height="50" width="auto" style="object-fit:cover;" src="images/header/<?php echo $settings_row['icon'];?>" alt="image" />
											</div>
											<input type="text" name="icon_alt_tag" id="icon_alt_tag"  placeholder="Enter Favicon Alternate text" title="Enter Logo Alternate text here !" value="<?php echo $settings_row['icon_alt_tag']; ?>" class="form-control" />
										</div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="logo_submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
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
									<div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3"  name="email" value="<?php echo $settings_row['email'];?>">
                                        </div>
                                    </div>
									 <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">Contact</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="phone"  name="phone" value="<?php echo $settings_row['phone'];?>">
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
									<div class="form-group row">
                                        <label for="youtube_link" class="col-sm-3 col-form-label">Youtube Link :-</label>
                                        <div class="col-sm-9">
                                           <input type="text" name="youtube_link" value="<?php echo $settings_row['youtube_link'];?>" class="form-control" >
                                        </div>
                                    </div>
									
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
<script type="text/javascript">
									$( ".row_position1" ).sortable({
										delay: 150,
										stop: function() {
											var DatabaseName = 'tbl_menu';
											var selectedData = new Array();
											$('.row_position1>tr').each(function() {
												selectedData.push($(this).attr("id"));
											});
											updateOrder(selectedData,DatabaseName);
										}
									});


									function updateOrder(data,DatabaseName) {
										$.ajax({
											url:"position-ajaxPro.php",
											type:'post',
											data:{position:data,dataBase:DatabaseName},
											success:function(){
												//alert('your change successfully saved');
												window.location.reload();
											}
										})
									}
								</script>
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