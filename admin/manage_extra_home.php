<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	
	$qry="SELECT * FROM tbl_extra_home where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
  
	if(isset($_POST['card1']))
	{
		
			$data = array(
				'field1'  =>  $_POST['field1'],
				'icon1' => $_POST['icon1'],
				'phone_no' =>  $_POST['phone_no'],
				'short_desc1'  => addslashes($_POST['short_desc1'])
			);			
		
	
		$settings_edit=Update('tbl_extra_home', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_extra_home.php");
		exit;
		  
	}
 if(isset($_POST['card2']))
	{
			
			$data = array(
				'field2'  =>  $_POST['field2'],
				'icon2' => $_POST['icon2'],
				'btn_name' => $_POST['btn_name'],
				'btn_link' => $_POST['btn_link'],
				'short_desc2'  => addslashes($_POST['short_desc2'])
			);			
		
	
		$settings_edit=Update('tbl_extra_home', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_extra_home.php");
		exit;
		  
	}
if(isset($_POST['card3']))
	{
		
		
			
			$data = array(
				'field3'  =>  $_POST['field3'],
				'icon3'  =>  $_POST['icon3'],
				'mon-fri'  =>  $_POST['mon-fri'],
				'sat'  =>  $_POST['sat'],
				'sun'  =>  $_POST['sun'],
				'short_desc3'  => addslashes($_POST['short_desc3'])
			);			
		
	
		$settings_edit=Update('tbl_extra_home', $data, "WHERE id=1");
	  
		$_SESSION['msg']="11";
		header( "Location:manage_extra_home.php");
		exit;
		  
	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Card1, Card2, Card3</h2>
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
                                        <a class="nav-link active" id="pills-card1-tab-justified" data-toggle="pill" href="#pills-card1-justified" role="tab" aria-controls="pills-card1" aria-selected="true">Card 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-card2-tab-justified" data-toggle="pill" href="#pills-card2-justified" role="tab" aria-controls="pills-card2" aria-selected="false">Card 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-card3-tab-justified" data-toggle="pill" href="#pills-card3-justified" role="tab" aria-controls="pills-card3" aria-selected="false">Card 3</a>
                                    </li>
                                </ul>
								
								 <div class="tab-content" id="pills-tab-justifiedContent">
                                 <div class="tab-pane fade show active" id="pills-card1-justified" role="tabpanel" aria-labelledby="pills-card1-tab-justified">
								    <div class="card-body">
                                      <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
									     <div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Title :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="field1" id="field1" value="<?php echo $settings_row['field1'];?>" >
                                        </div>
                                    </div>
                                    
									     <div class="form-group row">
                                        <label for="icon1" class="col-sm-3 col-form-label">Icon :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="icon1" id="icon1" value="<?php echo $settings_row['icon1'];?>" >
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
                                        <label for="short_desc1" class="col-sm-3 col-form-label">Description :-</label>
                                        <div class="col-sm-9">
									
                                            <textarea class="form-control" id="description" name="short_desc1"><?php echo stripslashes($settings_row['short_desc1']);?></textarea>
										
                                        </div>
                                    </div>
                                    
                                        <div class="form-group row">
                                        <label for="phone_no" class="col-sm-3 col-form-label">Phone No :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="phone_no" id="phone_no" value="<?php echo $settings_row['phone_no'];?>" >
                                        </div>
                                    </div>
                                   
                                        <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="card1" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                   </form>
                                    </div>
								 </div>
								
								   <div class="tab-pane fade" id="pills-card2-justified" role="tabpanel" aria-labelledby="pills-card2-tab-justified">
                                     <div class="card-body">
                                      <form action="" name="editprofile" method="post" enctype="multipart/form-data">
                                             
    									 <div class="form-group row">
                                            <label for="field2" class="col-sm-3 col-form-label">Title  :-</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="field2" id="field2" value="<?php echo $settings_row['field2'];?>" >
                                            </div>
                                        </div>
    									
    									 <div class="form-group row">
                                            <label for="icon2" class="col-sm-3 col-form-label">Icon  :-</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="icon2" id="icon2" value="<?php echo $settings_row['icon2'];?>" >
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
                                            <label for="short_desc2" class="col-sm-3 col-form-label">Description :-</label>
                                           <div class="col-sm-9">
									
                                            <textarea class="form-control" id="description" name="short_desc2"><?php echo stripslashes($settings_row['short_desc2']);?></textarea>
										
                                        </div>
                                        </div>
                                        
                                         <div class="form-group row">
                                            <label for="btn_name" class="col-sm-3 col-form-label">Button Name  :-</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="btn_name" id="btn_name" value="<?php echo $settings_row['btn_name'];?>" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="btn_link" class="col-sm-3 col-form-label">Button Link  :-</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="btn_link" id="btn_link" value="<?php echo $settings_row['btn_link'];?>" >
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" name="card2" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                            </div>
                                        </div>
                                   </form>
                                 </div>
    								 
                                   </div>
                                   
								   <div class="tab-pane fade" id="pills-card3-justified" role="tabpanel" aria-labelledby="pills-card3-tab-justified">
                                     <div class="card-body">
								      <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
									<div class="form-group row">
                                        <label for="field3" class="col-sm-3 col-form-label">Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="field3" id="field3" value="<?php echo $settings_row['field3'];?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="icon3" class="col-sm-3 col-form-label">Icon  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="icon3" id="icon3" value="<?php echo $settings_row['icon3'];?>" >
                                        </div>
                                    </div>
									
									 <!--<div class="form-group row">-->
          <!--                              <label for="goals_image" class="col-sm-3 col-form-label">Image :-</label>-->
          <!--                              <div class="col-sm-9">-->
										<!--<div class="fileupload_block" >-->
          <!--                                   <input type="file" name="goals_image" id="fileupload" >-->
										<!--	<img type="image" height="150" width="150" style="object-fit:cover;" src="images/about-us/<?php echo $settings_row['goals_image'];?>" alt="About Us image" />-->
										<!--	</div>-->
										<!--</div>-->
          <!--                          </div>-->
									
                                    <div class="form-group row">
                                        <label for="short_desc3" class="col-sm-3 col-form-label">Description :-</label>
                                        <div class="col-sm-9">
									
                                            <textarea class="form-control" id="description" name="short_desc3"><?php echo stripslashes($settings_row['short_desc3']);?></textarea>
										
                                        </div>
                                    </div>
                                    
                                     <div class="form-group row">
                                        <label for="mon-fri" class="col-sm-3 col-form-label">Monday - Friday  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="mon-fri" id="mon-fri" value="<?php echo $settings_row['mon-fri'];?>" >
                                        </div>
                                    </div>
                                    
                                     <div class="form-group row">
                                        <label for="sat" class="col-sm-3 col-form-label">Saturday  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="sat" id="sat" value="<?php echo $settings_row['sat'];?>" >
                                        </div>
                                    </div>
                                    
                                     <div class="form-group row">
                                        <label for="sun" class="col-sm-3 col-form-label">Sunday  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="sun" id="sun" value="<?php echo $settings_row['sun'];?>" >
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="card3" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                                     </div>
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