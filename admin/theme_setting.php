<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	
	$qry="SELECT * FROM tbl_theme_setting where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
  if(isset($_POST['theme_setting']))
	{
         if($_FILES['back_image']['name']!=""){
				unlink('images/'.$img_row['back_image']);   

	    $back_image=rand(0,99999)."_".$_FILES['back_image']['name'];
	    $back_image = str_replace(" ", "", $back_image);
		$tpath1='images/'.$back_image; 			 
		move_uploaded_file($_FILES["back_image"]["tmp_name"], $tpath1);

				
		$data = array(
			'back_color1'  =>  $_POST['back_color1'],
			'back_color2'  =>  $_POST['back_color2'],
			'sidebar_icon_title_color'  =>  $_POST['sidebar_icon_title_color'],
	        'active_sidebar_icon_title_color'  =>  $_POST['active_sidebar_icon_title_color'],
	        'back_image'  =>  $back_image,
	        'button2_color'  =>  $_POST['button2_color'],
	        'button1_color'  =>  $_POST['button1_color'],
	        'theme_color'  =>  $_POST['theme_color'],
	        'dashbord_count1_color'  =>  $_POST['dashbord_count1_color'],
	        'dashbord_count2_color'  =>  $_POST['dashbord_count2_color'],
			'sidebar_icon_active_color' => $_POST['sidebar_icon_active_color'],
			'sidebar_icon_color' => $_POST['sidebar_icon_color'],
		);
         }
         else{
             	$data = array(
			'back_color1'  =>  $_POST['back_color1'],
			'back_color2'  =>  $_POST['back_color2'],
			'sidebar_icon_title_color'  =>  $_POST['sidebar_icon_title_color'],
	        'active_sidebar_icon_title_color'  =>  $_POST['active_sidebar_icon_title_color'],
	        'button2_color'  =>  $_POST['button2_color'],
	        'button1_color'  =>  $_POST['button1_color'],
	        'theme_color'  =>  $_POST['theme_color'],
	        'sidebar_icon_active_color' => $_POST['sidebar_icon_active_color'],
			'sidebar_icon_color' => $_POST['sidebar_icon_color'],
		);
         }
         
		$settings_edit=Update('tbl_theme_setting', $data,"where id=1");

		if ($settings_edit > 0)
		{
			$_SESSION['msg']="11";
			header( "Location:theme_setting.php");
			exit;
		}   

	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Theme Setting</h2>
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
                    <label class="col-sm-3 col-form-label">Side Bar and top Bar Background:-</label>
                    <div class="col-sm-4">
                      <input style="height: 50px;" type="color" name="back_color1" id="back_color1" value="<?php echo $settings_row['back_color1'];?>" class="form-control">
                    </div>
                    <div class="col-sm-4">
                      <input style="height: 50px;" type="color" name="back_color2" id="back_color2" value="<?php echo $settings_row['back_color2'];?>" class="form-control">
                    </div>
                 </div>
                    
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sidebar Title Color :-</label>
                    <div class="col-sm-9">
                      <input style="height: 50px;" type="color" name="sidebar_icon_title_color" id="sidebar_icon_title_color" value="<?php echo $settings_row['sidebar_icon_title_color'];?>" class="form-control">
                    </div>
                 </div>
                
				<div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sidebar Icon Color :-</label>
                    <div class="col-sm-9">
                      <input type="number" name="sidebar_icon_color" id="sidebar_icon_color" value="<?php echo $settings_row['sidebar_icon_color'];?>" class="form-control">
                    </div>
                 </div>
				 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Active Sidebar Title Color:-</label>
                    <div class="col-sm-9">
                      <input style="height: 50px;" type="color" name="active_sidebar_icon_title_color" id="active_sidebar_icon_title_color" value="<?php echo $settings_row['active_sidebar_icon_title_color'];?>" class="form-control">
                    </div>
                </div>
                 
				 <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sidebar Icon Active Color :-</label>
                    <div class="col-sm-9">
                      <input type="number" name="sidebar_icon_active_color" id="sidebar_icon_active_color" value="<?php echo $settings_row['sidebar_icon_active_color'];?>" class="form-control">
                    </div>
                 </div>
				 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Button 1 Color:-</label>
                    <div class="col-sm-9">
                      <input style="height: 50px;" type="color" name="button1_color" id="button1_color" value="<?php echo $settings_row['button1_color'];?>" class="form-control">
                    </div>
                </div>
                 
                 <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Button 2 Color:-</label>
                    <div class="col-sm-9">
                      <input style="height: 50px;" type="color" name="button2_color" id="button2_color" value="<?php echo $settings_row['button2_color'];?>" class="form-control">
                    </div>
                </div>
                 
                 <!--div class="form-group row">
                    <label class="col-sm-3 col-form-label">Theme Color:-</label>
                    <div class="col-sm-9">
                      <input style="height: 50px;" type="color" name="theme_color" id="theme_color" value="<?php echo $settings_row['theme_color'];?>" class="form-control">
                    </div>
                </div-->
                
                 <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Background Image :-</label>
                    <div class="col-sm-9">
                      <div class="fileupload_block">
                        <input type="file" name="back_image" id="fileupload">
                        	<img type="image" src="images/<?php echo $settings_row['back_image'];?>" alt="image" style="width:130px; height:auto;"	 />
                      </div>
                    </div>
                  </div>
                                    
                                   
                                    <div class="form-group row row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="theme_setting" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
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