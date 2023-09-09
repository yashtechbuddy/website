<?php 
	include ("includes/header.php");
	require ("includes/function.php");
	require ("language/language.php");
   
   //Section menu
   if (isset($_GET['section_id']))
   {
       Delete('tbl_home_section', 'id=' . $_GET['section_id'] . '');
   
       $_SESSION['msg'] = "12";
       header("Location:page_setting.php");
       exit;
   
   }
   
   if (isset($_GET['s_id']))
   {
       $data = array(
           'visibility_status' => $_GET['status']
       );
       $category_edit = Update('tbl_home_section', $data, "WHERE id = '" . $_GET['s_id'] . "'");
   }
   
   ?>
<script>	
   function changeStatus(id, status)
   {										  
     $.ajax({
   		url:"manage_home.php",
   		type:'get',
   		data:{s_id:id,status:status},
   		success:function(){
   			//alert('Status change successfully');
   			window.location.reload();
   		}
   	});
   }
</script>

<!-- Responsive Datatable css -->
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title">Manage Home Page</h2>
      </div>
	  <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
							<a href="add_section.php?add=yes" >
						   <button class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Add Home List</button>	
						   </a>
                        </div>                        
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
                           <th>Section Title</th>
                           <!--th>Section Link</th-->
                           <th>Visibility</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php	
                           $qry="SELECT * FROM tbl_home_section order by id ASC";
                           $result=mysqli_query($mysqli,$qry);
                           $count=mysqli_num_rows($result);
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
                           <td><?php echo $row['section_title'];?></td>
                           <!--td><?php echo $row['section_link'];?></td-->
                           <td>
                              <?php 
                                 if($row['visibility_status']=="0")
                                 { //approved
                                 ?>			  
                              	
							  <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" onclick="changeStatus(<?php echo $row['id'];?>,1);" id="customSwitch<?php echo $row['id'];?>" checked>
									<label class="custom-control-label" for="customSwitch<?php echo $row['id'];?>"></label>
                                </div>
                              <?php
                                 }
                                 else{ 
                                 ?>			  
                              <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" onclick="changeStatus(<?php echo $row['id'];?>,0);" id="customSwitch<?php echo $row['id'];?>" >
									<label class="custom-control-label" for="customSwitch<?php echo $row['id'];?>"></label>
                                </div>
                              <?php
                                 }						  
                                  ?>
                           </td>
                           <td>
                              <a href="add_section.php?edit_id=<?php echo $row['id'];?>" class="btn btn-dark"><i class="feather ion ion-md-create"></i>  Edit</a>
                              <!--a href="?section_id=<?php echo $row['id'];?>" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this ?');">Delete</a-->
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