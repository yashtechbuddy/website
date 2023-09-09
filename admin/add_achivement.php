<?php 
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	 
	//Add banner
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		
		$image="";
		if($_FILES['image']['name']!="")
		{	
			$image="Achivement-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/achivement/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"],$tpath1);
		}				
         	
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_achivements order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1;  
		
		$data = array( 
			'title'  =>  $_POST['title'],
			'image'  =>  $image, 
			'alt_tag'  =>  $_POST['alt_tag'],
			'long_desc'  =>  $_POST['desc'],
			'number'  =>  $_POST['number'],
			'animation'  =>  $_POST['animation'],
			'position_order' => $position_order,
			'color' => $_POST['color']
		);		

 		$qry = Insert('tbl_achivements',$data);	

 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_achivement.php");
		exit;	

		 
		
	}
	
	//Fetch selected Achivement detail
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM tbl_achivements where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	
	//Edit Achivement
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
		 
		 if($_FILES['image']['name']!="")
		 {		


			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_achivements WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['image']!="")
			{
				unlink('images/achivement/'.$img_res_row['image']);
			}

			$image="Achivement-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/achivement/'.$image; 			 
			/* compress_image($_FILES["image"]["tmp_name"], $tpath1, 80); */
			move_uploaded_file($_FILES["image"]["tmp_name"],$tpath1);		
				
		

			$data = array(
				'title'  =>  $_POST['title'],
				'image'  =>  $image,
			    'alt_tag'  =>  $_POST['alt_tag'],
				'long_desc'  =>  $_POST['desc'],
				'number'  =>  $_POST['number'],
				'animation'  =>  $_POST['animation'],
				'color' => $_POST['color']

				);

			$category_edit=Update('tbl_achivements', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		 else
		 {

			 $data = array(
				'title'  =>  $_POST['title'],
			    'alt_tag'  =>  $_POST['alt_tag'],
				'long_desc'  =>  $_POST['desc'],
				'number'  =>  $_POST['number'],
				'animation'  =>  $_POST['animation'],
				'color' => $_POST['color']

				);	

			 $category_edit=Update('tbl_achivements', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }

		     
		$_SESSION['msg']="11"; 
		header( "Location:manage_achivement.php");
		exit;
 
	}


?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Achivement</h2>
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
                    <label class="col-sm-3 col-form-label">Achivement Title :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="title" id="title" value="<?php if(isset($_GET['edit_id'])){echo $row['title'];}?>" class="form-control" required>
                    </div>
                  </div>    
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Achivement Number :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="number" id="number" value="<?php if(isset($_GET['edit_id'])){echo $row['number'];}?>" class="form-control" required>
                    </div>
                  </div>  
				  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Achivement Animation :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="animation" id="animation" value="<?php if(isset($_GET['edit_id'])){echo $row['animation'];}?>" class="form-control" required>
                    </div>
                  </div>  
                  <!--div class="form-group row">
                    <label class="col-sm-3 col-form-label">Achivement Color :-</label>
                    <div class="col-sm-9">
					              <input type="color" name="color" class="form-control input-lg" value="<?php if(isset($_GET['edit_id'])){echo $row['color'];}?>"/>
                    </div>
                  </div-->       
				
                  <div class="form-group row row">
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