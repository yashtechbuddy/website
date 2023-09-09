<?php 
	include ("includes/header.php");
	require ("includes/function.php");
	require ("language/language.php");
   
		     
    	//Add
	if(isset($_POST['submit']) and isset($_GET['product_id']) and $_GET['edit_id']=="") 
	{	


		$count = count($_FILES['image']['name']);
		for($i=0;$i<$count;$i++)
		{ 
						
			/*COUNT LAST INSERTED POSITION NO */
			$qry_order="SELECT * FROM tbl_portfolio_gallery where product_id=".$_GET['product_id']." order by position_order ASC";
			$result_order=mysqli_query($mysqli,$qry_order); 				
			$position_order=mysqli_num_rows($result_order);  
			$position_order=$position_order+1;
				
			$image="Image-".rand(0,99999)."_".$_FILES['image']['name'][$i];
			$tpath1='images/portfolio_gallery/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"][$i], $tpath1);
			
			if($_FILES['image']['name'][$i]=="")
			{
				$image="";			
			}				
				
			$data = array( 
			'product_id'  =>  $_POST['product_id'],
			'image'  =>  $image, 
			'alt_tag'  =>  $_POST['alt_tag'],
			'position_order' => $position_order
			);					

			$qry = Insert('tbl_portfolio_gallery',$data);	

 	    }			
	
		$_SESSION['msg']="10"; 
		header( "Location:portfolio_gallery.php?product_id=".$_GET['product_id']."");
		exit;	

	}
	
	
	//Fetch selected service detail
	if(isset($_GET['product_id']))
	{	
		$qry="SELECT * FROM tbl_portfolio_gallery where product_id='".$_GET['product_id']."' order by position_order ASC";
		$result=mysqli_query($mysqli,$qry);	
	
	}
	
	//edit
	if(isset($_POST['submit']) and isset($_GET['product_id']) and $_GET['edit_id']!="") 
	{	
		$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_portfolio_gallery WHERE id='.$_POST['edit_id'].'');
		$cat_res_row=mysqli_fetch_assoc($cat_res);

		if($cat_res_row['image']!="")
	    {
	    	unlink('images/portfolio_gallery/'.$cat_res_row['image']);
		}
		
	
		$image="Image-".rand(0,99999)."_".$_FILES['image']['name'];
		$tpath1='images/portfolio_gallery/'.$image; 			 
		move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
		
			
			$data = array( 
			'image'  =>  $image, 
			'alt_tag'  =>  $_POST['alt_tag']
			);					

			//$qry = Insert('tbl_portfolio_gallery',$data);	
			$edit=Update('tbl_portfolio_gallery', $data, "WHERE id = '".$_POST['edit_id']."'");

 	    			
	
		$_SESSION['msg']="11"; 
		header( "Location:portfolio_gallery.php?product_id=".$_POST['product_id']."");
		exit;	
		
	}
	
	
	//Fetch selected service detail
	if(isset($_GET['product_id']))
	{	
		$qry="SELECT * FROM tbl_portfolio_gallery where id='".$_GET['edit_id']."'";
		$edit_result=mysqli_query($mysqli,$qry);	
		$data_row=mysqli_fetch_array($edit_result);		
	}
	
		
	//Delete row
	
	if(isset($_GET['delete_id']))
	{
 
		$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_portfolio_gallery WHERE id='.$_GET['delete_id'].'');
		$cat_res_row=mysqli_fetch_assoc($cat_res);


		if($cat_res_row['image']!="")
	    {
	    	unlink('images/portfolio_gallery/'.$cat_res_row['image']);
		}

		Delete('tbl_portfolio_gallery','id='.$_GET['delete_id'].'');

		$_SESSION['msg']="12";
		header( "Location:portfolio_gallery.php?product_id=".$_GET['product_id'].""); 
		exit;
		
	}		
?>

<!-- Responsive Datatable css -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Portfolio Gallery</h2>
      </div>
	  </div>
</div>

<div class="contentbar">
                <!-- Start row -->
                <div class="row">
	 <!-- Start col -->
                    <div class="col-lg-12">
                        <div class="card ">                            
                        <div class="card-body">
                                 <form action="" method="post" enctype="multipart/form-data">
					<input  type="hidden" name="product_id" value="<?php echo $_GET['product_id'];?>" />
				<input  type="hidden" name="edit_id" value="<?php echo $_GET['edit_id'];?>" />
					<div class="form-group row">
                    <label class="col-sm-3 col-form-label">Image :-</label>

                    <div class="col-sm-9">
                      <div class="fileupload_block">
								<input type="file" name="<?php if($_GET['edit_id']){ echo"image"; }else{ echo"image[]"; } ?>" value="" id="fileupload" multiple required>
								<?php if(isset($_GET['edit_id']) and $data_row['image']!="") {?><img type="image" src="images/portfolio_gallery/<?php echo $data_row['image'];?>" alt="banner image" style="height: 102px;width:auto;margin-bottom:10px;" />
								<?php } else {?>
								<img type="image" src="assets/images/add-image.png" style="height: 102px;width:auto;margin-bottom:10px;"/>
								<?php }?>
								
								<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Icon Alternate text" title="Enter Icon Alternate text here !" value="<?php if(isset($_GET['product_id'])){echo $data_row['alt_tag'];}?>" class="form-control" />
						
                      </div>
					  	
                    </div>
										
                  </div>
                 <div class="form-group row">
                    <div class="col-md-9 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
				  
                                </form>
                            </div>
                    </div> 
                    <!-- End col -->
				</div>
				</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
				
   <!-- Start row -->
   <div class="row">
      <!-- Start col -->
      <div class="col-lg-12">
         <div class="card m-b-30">
            <div class="card-body">
               <div class="table-responsive">
			   		
                  <table id="default-datatable" class="display table table-striped table-bordered">
                     <thead>
                         <tr>                  
						  <th>#</th>
						  <th>Image</th>
						  <th class="cat_action_list" style="width: 20%;">Action</th>
						</tr>
                     </thead>
                     <tbody class="row_position">
              	<?php	$count=mysqli_num_rows($result);
					
						if($count==0)
						{
					?>	
						<tr>                 
							<td style="text-align:center; padding:60px;" colspan="5">No Record Found !</td>
						</tr>
					<?php	
						}
						
					
						$i=0;
						while($row=mysqli_fetch_array($result))
						{					
				?>
               <tr id="<?php echo $row['id']; ?>">                 
                  <td><?php echo $row['position_order'];?></td>
					
				  <td>
					<?php if($row['image']!=""){?>
						<span class="category_img"><img src="images/portfolio_gallery/<?php echo $row['image'];?>" style="height: 102px;width:auto;margin-bottom:10px;"/></span>
				    <?php }else{ ?>
						<span class="category_img"><img src="assets/images/add-image.png" /></span>
					<?php } ?>
				  </td>
				
			   
				<td>
					<a href="portfolio_gallery.php?product_id=<?php echo $_GET['product_id'];?>&edit_id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
				
					<a href="?product_id=<?php echo $_GET['product_id'];?>&delete_id=<?php echo $row['id'];?>" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this ?');">Delete</a>
					<br><br>
					
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
      <!-- End col -->
   </div>
   <!-- End row -->
</div>
<!-- End Contentbar -->
<script type="text/javascript">
					$( ".row_position" ).sortable({
						delay: 150,
						stop: function() {
							var DatabaseName = 'tbl_portfolio_gallery';
							var selectedData = new Array();
							$('.row_position>tr').each(function() {
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