<?php 
	include ("includes/header.php");
	require ("includes/function.php");
	require ("language/language.php");
   
		     
     $qry="SELECT * FROM tbl_meta_tag order by id ASC";
     $result=mysqli_query($mysqli,$qry); 	
     
     $qry_static="SELECT * FROM tbl_meta_tag_static where id=1";
     $result_static=mysqli_query($mysqli,$qry_static); 	
	 $row_static=mysqli_fetch_assoc($result_static);
	
	//Delete Meta Tag  	
	if(isset($_GET['meta_id']))
	{ 
		Delete('tbl_meta_tag','id='.$_GET['meta_id'].'');
      
		$_SESSION['msg']="12";
		header( "Location:manage_seo.php");
		exit;
		
	}
?>

<!-- Responsive Datatable css -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-7 col-lg-7">
         <h2 class="page-title">Manage SEO</h2>
      </div>
	  <div class="col-md-5 col-lg-5">
						<a href="manage_static_data.php">
						<button class="btn btn-info"><i class="feather icon-send mr-2"></i>Manage Static Data</button>	
						</a>
						<a href="add_seo.php?add=yes" >
						   <button class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Add SEO</button>	
						   </a>
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

			<?php if(isset($_SESSION['errormsg'])){?> 
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>This is already exist ! </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>              
			</div>  
                <?php unset($_SESSION['errormsg']);}?>
<div class="contentbar">
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
					  <th>Page Banner Image</th>	
					  <th>Meta Title</th>								 
					  <!--<th>Meta URL</th>	-->
					  <!--<th>Meta Image</th>	-->
					  <th class="cat_action_list">Action</th>
					</tr>
                     </thead>
                     <tbody class="row_position">
              	<?php	$count=mysqli_num_rows($result);
					
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
				<tr>                 
					<td><?php echo $row['id'];?></td>
                  <td>
					<?php if($row['page_name']!="index.php" && $row['banner_image']!=""){?>
						<img height="50" width="auto" style="object-fit:cover;" src="images/pageBanner/<?php echo $row['banner_image'];?>" />
				    <?php }else{ ?><img height="50" width="auto" style="object-fit:cover;" src="images/add-image.png" />
					<?php } ?>
				  </td>
				   <td>
				   <?php 
	
							$text=$row['meta_title'];
							$rest = substr($text, 0, 30);
							
							if(strlen($text)<=30)
							{	echo $text;	}
							else
							{	echo stripslashes($rest)."...";	}
						
						?>
					</td>								  
					  <!--<td><a href="<?php echo $row_static['meta_url']."/".$row['meta_url'];?>" target="_blank">				  -->
							<!--<span class="btn btn-info"><i class="fa fa-link" aria-hidden="true"></i> <span>View</span></span>-->
					  <!--</a></td>	-->
					  
					  <!--<td><a href="<?php echo $row['meta_image'];?>" target="_blank">				  -->
							<!--<span class="btn btn-info"><i class="fa fa-link" aria-hidden="true"></i> <span>View</span></span>-->
					  <!--</a></td>						 -->
                  <td>
				  <a href="add_seo.php?edit_id=<?php echo $row['id'];?>" class="btn btn-dark"><i class="feather ion ion-md-create"></i>  Edit</a>
                    <a href="?meta_id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?');"><i class="feather icon-trash-2 mr-2"></i>  Delete</a>
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