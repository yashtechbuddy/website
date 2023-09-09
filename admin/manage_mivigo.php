<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	
	 error_reporting(E_ALL);
	 ini_set('display_errors', 1);
	
	$qry="SELECT * FROM tbl_about_us where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
  
	if(isset($_POST['mission_submit']))
	{
		
			
			$data = array(
				'mission_title'  =>  $_POST['mission_title'],
				'mission_icon' => $_POST['mission_icon'],
				'mission_description'  => addslashes($_POST['mission_description'])
			);
	
		$settings_edit=Update('tbl_about_us', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_mivigo.php");
		exit;
		  
	}
 if(isset($_POST['vission_submit']))
	{
		

			
			$data = array(
				'vission_title'  =>  $_POST['vission_title'],
				'vission_icon' => $_POST['vission_icon'],
				'vission_description'  => addslashes($_POST['vission_description'])
			);			
		
	
		$settings_edit=Update('tbl_about_us',$data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_mivigo.php");
		exit;
		  
		  
	}
if(isset($_POST['goals_submit']))
	{
		

			
			$data = array(
				'goals_title'  =>  $_POST['goals_title'],
				'goals_icon'  =>  $_POST['goals_icon'],
				'goals_description'  => addslashes($_POST['goals_description'])
			);			

	
		$settings_edit=Update('tbl_about_us', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_mivigo.php");
		exit;
		  
	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Mission, Vision, Goals</h2>
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
                                 <ul class="nav nav-pills nav-justified mb-3" id="pills-tab-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-mission-tab-justified" data-toggle="pill" href="#pills-mission-justified" role="tab" aria-controls="pills-mission" aria-selected="true">Mission</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-vission-tab-justified" data-toggle="pill" href="#pills-Vision-justified" role="tab" aria-controls="pills-Vision" aria-selected="false">Vision</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-goals-tab-justified" data-toggle="pill" href="#pills-goals-justified" role="tab" aria-controls="pills-goals" aria-selected="false">Goals</a>
                                    </li>
                                </ul>
								
								 <div class="tab-content" id="pills-tab-justifiedContent">
                                    <div class="tab-pane fade show active" id="pills-mission-justified" role="tabpanel" aria-labelledby="pills-mission-tab-justified">
								 <div class="card-body">
                                 <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Mission Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="mission_title" id="mission_title" value="<?php echo $settings_row['mission_title'];?>" >
                                        </div>
                                    </div>
                                    
									<div class="form-group row">
                                        <label for="mission_icon" class="col-sm-3 col-form-label">Mission Icon  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="mission_icon" id="mission_icon" value="<?php echo $settings_row['mission_icon'];?>" >
                                        </div>
                                    </div>
									 <!--<div class="form-group row">-->
          <!--                              <label for="mission_image" class="col-sm-3 col-form-label">Mission Image :-</label>-->
          <!--                              <div class="col-sm-9">-->
										<!--<div class="fileupload_block" >-->
          <!--                                   <input type="file" name="mission_image" id="fileupload" >-->
										<!--	<img type="image" height="150" width="150" style="object-fit:cover;" src="images/about-us/<?php echo $settings_row['mission_image'];?>" alt="About Us image" />-->
										<!--	</div>-->
										<!--</div>-->
          <!--                          </div>-->
									
                                    <div class="form-group row">
                                        <label for="mission_description" class="col-sm-3 col-form-label">Mission Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="tinymce-editor" id="description" name="mission_description"><?php echo stripslashes($settings_row['mission_description']);?></textarea>
											</div>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="mission_submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
								</div>
								
								<div class="tab-pane fade" id="pills-Vision-justified" role="tabpanel" aria-labelledby="pills-Vision-tab-justified">
                                 
								 <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
								
									<div class="form-group row">
                                        <label for="vission_title" class="col-sm-3 col-form-label">Vision Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="vission_title" id="vission_title" value="<?php echo $settings_row['vission_title'];?>" >
                                        </div>
                                    </div>
									
									<div class="form-group row">
                                        <label for="vission_icon" class="col-sm-3 col-form-label">Vision Icon  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="vission_icon" id="vission_icon" value="<?php echo $settings_row['vission_icon'];?>" >
                                        </div>
                                    </div>
									 <!--<div class="form-group row">-->
          <!--                              <label for="mission_image" class="col-sm-3 col-form-label">Vision Image :-</label>-->
          <!--                              <div class="col-sm-9">-->
										<!--<div class="fileupload_block" >-->
          <!--                                   <input type="file" name="vission_image" id="fileupload" >-->
										<!--	<img type="image" height="150" width="150" style="object-fit:cover;" src="images/about-us/<?php echo $settings_row['vission_image'];?>" alt="About Us image" />-->
										<!--	</div>-->
										<!--</div>-->
          <!--                          </div>-->
									
                                    <div class="form-group row">
                                        <label for="vission_description" class="col-sm-3 col-form-label">Vision Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="tinymce-editor" id="tinymce-example" name="vission_description"><?php echo stripslashes($settings_row['vission_description']);?></textarea>
											</div>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="vission_submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                                    </div>
								<div class="tab-pane fade" id="pills-goals-justified" role="tabpanel" aria-labelledby="pills-goals-tab-justified">
                                 
								<form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
									<div class="form-group row">
                                        <label for="goals" class="col-sm-3 col-form-label">Goals Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="goals_title" id="goals_title" value="<?php echo $settings_row['goals_title'];?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="goals_icon" class="col-sm-3 col-form-label">Goals Icon  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="goals_icon" id="goals_icon" value="<?php echo $settings_row['goals_icon'];?>" >
                                        </div>
                                    </div>
									
									 <!--<div class="form-group row">-->
          <!--                              <label for="goals_image" class="col-sm-3 col-form-label">Goals Image :-</label>-->
          <!--                              <div class="col-sm-9">-->
										<!--<div class="fileupload_block" >-->
          <!--                                   <input type="file" name="goals_image" id="fileupload" >-->
										<!--	<img type="image" height="150" width="150" style="object-fit:cover;" src="images/about-us/<?php echo $settings_row['goals_image'];?>" alt="About Us image" />-->
										<!--	</div>-->
										<!--</div>-->
          <!--                          </div>-->
									
                                    <div class="form-group row">
                                        <label for="goals_description" class="col-sm-3 col-form-label">Goals Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="tinymce-editor" id="tinymce-example" name="goals_description"><?php echo stripslashes($settings_row['goals_description']);?></textarea>
											</div>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="goals_submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
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