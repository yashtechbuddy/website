<?php 
	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	    
    $qry="SELECT * FROM tbl_products order by position_order desc";
    $result=mysqli_query($mysqli,$qry); 	
	 	
	if(isset($_GET['delete_id']))
	{ 
		$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_products WHERE id=\''.$_GET['delete_id'].'\'');
		$img_res_row=mysqli_fetch_assoc($img_res);

		if($img_res_row['image']!="")
		{
			unlink('images/product/'.$img_res_row['image']);
		}
		if($img_res_row['page_name']!="")
	    {
	    	unlink('../products/'.$img_res_row['page_name']);
		}
        
        //Gallery Imge Delete		
		$img_gallery=mysqli_query($mysqli,'SELECT * FROM tbl_portfolio_gallery WHERE product_id=\''.$_GET['delete_id'].'\'');
		while($img_gallery_row=mysqli_fetch_assoc($img_gallery)){
    		if($img_gallery_row['image']!="")
    		{
	    	    unlink('images/portfolio_gallery/'.$img_gallery_row['image']);
	    	}
		}
		
		//delete meta tag banner image
		$meta=mysqli_query($mysqli,'SELECT * FROM tbl_meta_tag WHERE id='.$cat_res_row['meta_tag_id'].'');
		$meta_row=mysqli_fetch_assoc($meta);
		
		if($meta_row['banner_image']!="" && $meta_row['banner_image']!="default/default-banner.jpg")
	    {
	    	unlink('images/pageBanner/'.$meta_row['banner_image']);
		}
		
		Delete('tbl_meta_tag','id='.$meta_row['id'].'');

		Delete('tbl_portfolio_gallery','product_id='.$_GET['delete_id'].'');
		
		Delete('tbl_products','id='.$_GET['delete_id'].'');
    
		$_SESSION['msg']="12";
		header( "Location:manage_products.php");
		exit;    
    }  
?>
	<!-- Responsive Datatable css -->
	<div class="breadcrumbbar">
	   <div class="row align-items-center">
		  <div class="col-md-8 col-lg-8">
			 <h2 class="page-title">Manage Products</h2>
		  </div>
		  <div class="col-md-4 col-lg-4">
			<div class="widgetbar">
				<a href="add_products.php?add=yes" >
			   <button class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Add Products</button>	
			   </a>
			</div>                        
		   </div>
	   </div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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
			<strong>This is already exist !</strong>
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
						   <th width="20%">Products Title</th>
						   <th>Image</th>
						   <th class="cat_action_list">Action</th>
						</tr>
                     </thead>
                     <tbody class="row_position">
					<?php	
						$count=mysqli_num_rows($result);
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
							<td><?php echo $row['title'];?></td>
							<td>
								<img height="70" width="70" style="object-fit:cover;" src="images/product/<?php echo $row['image'];?>" />
							</td>
							<td>
							  <a href="add_products.php?edit_id=<?php echo $row['id'];?>" class="btn btn-dark"><i class="feather ion ion-md-create"></i>  Edit</a>
							  <a href="?delete_id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?');"><i class="feather icon-trash-2 mr-2"></i>  Delete</a>
							  <a href="portfolio_gallery.php?product_id=<?php echo $row['id'];?>" class="btn btn-primary"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery</a>
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
			var DatabaseName = 'tbl_products';
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