<?php 
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	 
	//Add banner
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		
		$document="";
		if($_FILES['image']['name']!="")
		{	
			$document="Journal-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/journal/'.$document; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"],$tpath1);
		}				
         	
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_journal_club order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1;  
		
		$data = array( 
				'presenter'  =>  $_POST['presenter'],
			    'topic'  =>  $_POST['topic'],
				'perform_date'  =>  $_POST['perform_date'],
				'file'  =>  $document,
    			'position_order' => $position_order
		);		

 		$qry = Insert('tbl_journal_club',$data);	

 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_journal_club.php");
		exit;	

		 
		
	}
	
	//Fetch selected Achivement detail
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM tbl_journal_club where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}
	
	//Edit Achivement
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
		 
		 if($_FILES['image']['name']!="")
		 {		


			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_journal_club WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['image']!="")
			{
				unlink('images/journal/'.$img_res_row['image']);
			}

			$document="journal-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/journal/'.$document; 			 
			/* compress_image($_FILES["image"]["tmp_name"], $tpath1, 80); */
			move_uploaded_file($_FILES["image"]["tmp_name"],$tpath1);		
				
		

			$data = array(
				'presenter'  =>  $_POST['presenter'],
			    'topic'  =>  $_POST['topic'],
				'perform_date'  =>  $_POST['perform_date'],
				'file'  =>  $document
				);

			$category_edit=Update('tbl_journal_club', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		 else
		 {

			 $data = array(
				'presenter'  =>  $_POST['presenter'],
			    'topic'  =>  $_POST['topic'],
				'perform_date'  =>  $_POST['perform_date']

				);	

			 $journal_edit=Update('tbl_journal_club', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }

		     
		$_SESSION['msg']="11"; 
		header( "Location:manage_journal_club.php");
		exit;
 
	}


?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Journal</h2>
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
                    <label class="col-sm-3 col-form-label">Presenter:-</label>
                    <div class="col-sm-9">
                      <input type="text" name="presenter" id="presenter" value="<?php if(isset($_GET['edit_id'])){echo $row['presenter'];}?>" class="form-control" required>
                    </div>
                  </div>    
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Topic :-</label>
                    <div class="col-sm-9">
                     <textarea name="topic" class="form-control" value="<?php if(isset($_GET['edit_id'])){echo $row['topic'];}?>"><?php if(isset($_GET['edit_id'])){echo $row['topic'];}?></textarea>
                    </div>
                  </div>  
				  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Perform Date:-</label>
                    <div class="col-sm-9">
                      <input type="date" name="perform_date" id="date" value="<?php if(isset($_GET['edit_id'])){echo $row['perform_date'];}?>" class="form-control" required>
                    </div>
                  </div>
                  
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">File:-</label>
    
                        <div class="col-sm-9">
                          <div class="fileupload_block">
    							<input type="file" name="image" value="fileupload" id="fileupload" onchange="setImage(this.value);" />
                                <?php if(isset($_GET['edit_id']) and $row['file']!="") {?><img type="image" src="images/journal/<?php echo $row['file'];?>" alt="image" style="width: 172px;height:auto;margin-bottom:10px;"/>
                            	<?php } else {?>
    							<img type="image" style="height: 90px;width:auto;margin-bottom:10px;" src="images/add-image.png" alt="image" />
                            	<?php }?>
                          </div>
    					  	
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