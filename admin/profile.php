<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");
	 
	
	if(isset($_SESSION['id']))
	{
			 
		$qry="select * from tbl_admin where id='".$_SESSION['id']."'";
		 
		$result=mysqli_query($mysqli,$qry);
		$row=mysqli_fetch_assoc($result);

	}
	
	if(isset($_POST['submit']))
	{
	
		if($_FILES['image']['name']!="")
		{
			
			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_admin WHERE id='.$_SESSION['id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['image']!="")
			{
				unlink('images/profile/'.$img_res_row['image']);
			}
			
			
			$image="Profile-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/profile/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
		
		
			$data = array( 
				'username'  =>  $_POST['username'],
				'email'  =>  $_POST['email'],
				'image'  =>  $image,
				'password'=>$_POST['password'],
				);
			
			$channel_edit=Update('tbl_admin', $data, "WHERE id = '".$_SESSION['id']."'"); 

		}
		else
		{
			$data = array( 
				'username'  =>  $_POST['username'],
				'email'  =>  $_POST['email'] ,
				'password'=>$_POST['password'],
				);
			
			$channel_edit=Update('tbl_admin', $data, "WHERE id = '".$_SESSION['id']."'"); 
		}

		$_SESSION['msg']="11"; 
		header( "Location:profile.php");
		exit;
		 
	}


?>
 <!-- Start Breadcrumbbar -->                    
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h2 class="page-title">Admin Profile</h2>
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
                                        <label for="inputprofile" class="col-sm-3 col-form-label">Profile Image </label>
                                        <div class="col-sm-9">
                                             <input type="file" name="image" id="fileupload" >
											<img type="image" height="70" width="70" src="images/profile/<?php echo $row['image'];?>" alt="profile image" />
										</div>
                                    </div>
								 
								 
									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputusername"  name="username" value="<?php echo $row['username'];?>">
                                        </div>
                                    </div>
								 
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="inputEmail3"  name="email" value="<?php echo $row['email'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="password" value="<?php echo $row['password'];?>">
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