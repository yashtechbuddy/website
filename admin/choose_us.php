<?php 
	
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	
  	//Add
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		
		$image="";
		if($_FILES['image']['name']!="")
		{	
			$image="Choose_Us-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/chooseus/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
		}				
		
		
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_chooseus order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
		$position_order=mysqli_num_rows($result_order);  
		$position_order=$position_order+1;

			
		$data = array(
				'name'  =>  $_POST['name'],
				'image'  =>  $image,
			    'alt_tag'  =>  $_POST['alt_tag'],
			    'long_desc'  => addslashes($_POST['long_desc']),
				'position_order'  =>  $position_order
			);		

 		$qry = Insert('tbl_chooseus',$data);	

 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_choose_us.php");
		exit;	
	
	}
	
    //Fetch selected service detail

			$qry="SELECT * FROM tbl_chooseus where id='1'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);
	
	
	//chooseus
	if(isset($_POST['chooseus']))
	{
		if($_FILES['image']['name']!="")
		{
			$image="chooseus-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/chooseus/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
				
			$data = array(
				'name'  =>  $_POST['name'],
				'image'  =>  $image,
			    'alt_tag'  =>  $_POST['alt_tag'],
			    'long_desc'  => addslashes($_POST['long_desc']),
			    'b1' => $_POST['b1'],
			    'b2' => $_POST['b2'],
			    'b3' => $_POST['b3'],
			    'b4' => $_POST['b4'],
			    'b5' => $_POST['b5'],
			    'b6' => $_POST['b6']
			);			
		}
		else
		{
			
			$data = array(
				'name'  =>  $_POST['name'],
			    'alt_tag'  =>  $_POST['alt_tag'],
			    'long_desc'  => addslashes($_POST['long_desc']),
			    'b1' => $_POST['b1'],
			    'b2' => $_POST['b2'],
			    'b3' => $_POST['b3'],
			    'b4' => $_POST['b4'],
			    'b5' => $_POST['b5'],
			    'b6' => $_POST['b6']
			);			
		}
	
		$chouse_edit=Update('tbl_chooseus', $data, "WHERE id = '1'");
	  
		$_SESSION['msg']="11";
		header( "Location:choose_us.php");
		exit;
	  
	}
	
	//cards
	if(isset($_POST['cards'])){
	   
	   	$data = array(
			    'title1' => $_POST['title1'],
			    'icon1' => $_POST['icon1'],
			    'title2' => $_POST['title2'],
			    'icon2' => $_POST['icon2'],
			    'title3' => $_POST['title3'],
			    'icon3' => $_POST['icon3']
			);	
			
		
		$chouse_edit=Update('tbl_chooseus', $data, "WHERE id = '1'");
	  
		$_SESSION['msg']="11";
		header( "Location:choose_us.php");
		exit;	
	}
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Choose Us</h2>
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
                                        <a class="nav-link active" id="pills-chooseus-tab-justified" data-toggle="pill" href="#pills-chooseus-justified" role="tab" aria-controls="pills-chooseus" aria-selected="true">Choose us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-choosecard-tab-justified" data-toggle="pill" href="#pills-choosecard-justified" role="tab" aria-controls="pills-choosecard" aria-selected="false">Choose us card</a>
                                    </li>
                                </ul>
                              <div class="tab-content" id="pills-tab-justifiedContent">
                                  
                                 <!-- choose us lift-->
                                <div class="tab-pane fade show active" id="pills-chooseus-justified" role="tabpanel" aria-labelledby="pills-chooseus-tab-justified"> 
                                  <div class="card-body">
                                     <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								  

									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Choose Us Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="name" id="name"  value="<?php echo $row['name'];?>">
                                        </div>
                                    </div>
									
									  <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Choose Us Image :-</label>
                                        <div class="col-sm-9">
                                          <div class="fileupload_block">
                    							<input type="file" name="image" value="fileupload" id="fileupload" />
                                                <?php if($row['image']!="") {?><img type="image" src="images/chooseus/<?php echo $row['image'];?>" alt="image" style="width: 172px;height:auto;margin-bottom:10px;"/>
                                            	<?php } else {?>
                    							<img type="image" style="height: 90px;width:auto;margin-bottom:10px;" src="images/add-image.png" alt="image" />
                                            	<?php }?>
                    							<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php echo $row['alt_tag'];?>" class="form-control" />
                                          </div>
                                        </div>
                                      </div>
									
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label">Choose Us Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="tinymce-editor" id="tinymce-example" name="long_desc"><?php echo $row['long_desc'];?></textarea>
											</div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="b1" class="col-sm-3 col-form-label">Bullet 1  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="b1" id="b1"  value="<?php echo $row['b1'];?>">
                                        </div>
                                    </div>
                                    
                                     <div class="form-group row">
                                        <label for="b2" class="col-sm-3 col-form-label">Bullet 2  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="b2" id="b2"  value="<?php echo $row['b2'];?>">
                                        </div>
                                    </div>
                                    
                                     <div class="form-group row">
                                        <label for="b3" class="col-sm-3 col-form-label">Bullet 3  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="b3" id="b3"  value="<?php echo $row['b3'];?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="b4" class="col-sm-3 col-form-label">Bullet 4  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="b4" id="b4"  value="<?php echo $row['b4'];?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="b5" class="col-sm-3 col-form-label">Bullet 5  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="b5" id="b5"  value="<?php echo $row['b5'];?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="b6" class="col-sm-3 col-form-label">Bullet 6  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="b6" id="b6"  value="<?php echo $row['b6'];?>">
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="chooseus" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                                  </div>
                                </div>
                                
                                <!-- choose us cards-->
                                <div class="tab-pane fade " id="pills-choosecard-justified" role="tabpanel" aria-labelledby="pills-choosecard-tab-justified"> 
                                  <div class="card-body">
                                    <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 

									<div class="form-group row">
                                        <label for="title1" class="col-sm-3 col-form-label">Card 1 Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="title1" id="title1"  value="<?php echo $row['title1'];?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="icon1" class="col-sm-3 col-form-label">Card 1 icon  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="icon1" id="icon1"  value="<?php echo $row['icon1'];?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="title2" class="col-sm-3 col-form-label">Card 2 Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="title2" id="title2"  value="<?php echo $row['title2'];?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="icon2" class="col-sm-3 col-form-label">Card 2 icon  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="icon2" id="icon1"  value="<?php echo $row['icon2'];?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="title3" class="col-sm-3 col-form-label">Card 3 Title  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="title3" id="title3"  value="<?php echo $row['title3'];?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="icon3" class="col-sm-3 col-form-label">Card 3 icon  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="icon3" id="icon1"  value="<?php echo $row['icon3'];?>">
                                        </div>
                                    </div>
									
									 
                                   
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="cards" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
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