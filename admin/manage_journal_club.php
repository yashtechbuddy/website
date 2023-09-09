<?php 
	include ("includes/header.php");
	require ("includes/function.php");
	require ("language/language.php");
   
		     
     $qry="SELECT * FROM tbl_journal_club order by position_order ASC";
     $result=mysqli_query($mysqli,$qry); 	
	
	
	//Delete row
	if(isset($_GET['delete_id']))
	{
 
		$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_journal_club WHERE id='.$_GET['delete_id'].'');
		$cat_res_row=mysqli_fetch_assoc($cat_res);

// 		if($cat_res_row['image']!="")
// 	    {
// 	    	unlink('images/testimonial/'.$cat_res_row['image']);
// 		}
 
		Delete('tbl_journal_club','id='.$_GET['delete_id'].'');
      
		$_SESSION['msg']="12";
		header( "Location:manage_testimonial.php");
		exit;
		
	}
?>

<!-- Responsive Datatable css -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Manage Journal</h2>
      </div>
	  <div class="col-md-4 col-lg-4">
          <div class="widgetbar">
			  <a href="add_journal.php?add=yes" >
					  <button class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Add Journal</button>	
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
                              <th>Presenter</th>
                              <th>Topic</th>
                              <th>Date</th>
                              <th>file</th>
                              <th class="cat_action_list">Action</th>
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
						
					
						$i=1;
						while($row=mysqli_fetch_array($result))
						{					
				?>
				<tr id="<?php echo $row['id']; ?>">                 
                <td><?php echo $i; ?></td>
                  <td><?php echo $row['presenter'];?></td>
                  <td><?php echo $row['topic'];?></td>
				  <td>
				      <?php echo $row['perform_date'];?>
				  </td>
				  <td>
				      <a href="images/journal/<?php echo $row['file']; ?>" target="_black"><?php echo $row['file']; ?></a>
				  </td>
                  <td>
				  <a href="add_journal.php?edit_id=<?php echo $row['id'];?>" class="btn btn-dark"><i class="feather ion ion-md-create"></i>  Edit</a>
                    <a href="?delete_id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?');"><i class="feather icon-trash-2 mr-2"></i>  Delete</a>
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
							var DatabaseName = 'tbl_journal_club';
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