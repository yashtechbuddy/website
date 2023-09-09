<?php

	include("includes/header.php");
	require("includes/function.php");
	require("language/language.php");
	
    
	//Add category
	if(isset($_POST['submit']) and isset($_GET['add']))
	{

		/*CREATE SINGLE PAGE FILE*/
		
		$filename=strtolower($_POST['page_name']);	/* OR  $filename=str_replace(" ","-",$text).".php";  */
				
		//copy("../image-detail.php","../images/".$filename);
		
		$content ="<?php include_once('../product-categories-detail.php'); ?>"; 
		$fh = fopen("../package-category/".$filename, "w");
		fwrite($fh, $content);
		fclose($fh);
		
		
		//CHECK DUPLICATION
		$qry1="SELECT * FROM tbl_product_category";
		$result1=mysqli_query($mysqli,$qry1);	
		
		while($row1=mysqli_fetch_array($result1))
		{
			if($row1['page_name']==$filename)
			{
				$_SESSION['errormsg']="10"; 
				header( "Location:manage_product_category.php");
				exit;
			}
		}
		
		
		/*START META TAG INSERT */
		
			include_once('seo_add_form.php');
		
		/*END META TAG INSERT */
			 
		$image="";
		if($_FILES['image']['name']!="")
		{			
			$image="product_category-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/product_category/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
		}			
			
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_product_category order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1;  
			  
        $data = array( 
			    'title'  =>  $_POST['title'],
			    'long_desc'  => addslashes($_POST['long_desc']),
			    'image'  =>  $image,
			    'alt_tag'  =>  $_POST['alt_tag'],
				'page_name'  =>  $filename,
				'meta_tag_id' => $meta_row1['id'],				
				'position_order' => $position_order,
			    'page_name'  =>  $filename
			    );		

 		$qry = Insert('tbl_product_category',$data);	
		$_SESSION['msg']="10";
		header( "Location:manage_product_category.php");
		exit;	

	}
	
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM tbl_product_category where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);
			
			$meta_qry="SELECT * FROM tbl_meta_tag where id='".$row['meta_tag_id']."'";
			$meta_result=mysqli_query($mysqli,$meta_qry);
			$meta_row=mysqli_fetch_assoc($meta_result);

	}
	
	
	if(isset($_POST['submit']) and isset($_GET['edit_id']))
	{
		
		/*START META TAG UPDATE */
		
			include_once('seo_edit_form.php');
		
		/*END META TAG UPDATE */
		 
		 if($_FILES['image']['name']!="")
		 {		
			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_product_category WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
			

			  if($img_res_row['image']!="")
		       {
				unlink('images/product_category/'.$img_res_row['image']);
			   }

				$image="product_category-".rand(0,99999)."_".$_FILES['image']['name'];
				$tpath1='images/product_category/'.$image; 			 
				move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
		
                $data = array( 
				'title'  =>  $_POST['title'],
				'long_desc'  => addslashes($_POST['long_desc']),
				'image'  =>  $image,
				'alt_tag'  =>  $_POST['alt_tag']
				);	
		 }
		 else
		 {
				$data = array(
			    'title'  =>  $_POST['title'],
			    'long_desc'  => addslashes($_POST['long_desc']),
				'alt_tag'  =>  $_POST['alt_tag']
				);	  
		 }
		 
		 $category_edit=Update('tbl_product_category', $data, "WHERE id = '".$_GET['edit_id']."'");
		
		$_SESSION['msg']="11"; 
		header( "Location:manage_product_category.php");
		exit;
	}


?>

<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Product Category</h2>
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
								 
								<script type="text/javascript">
				
					function OnTitle(txt) 
					{
							var str = txt.value; 
								
							var resOld = str.replace(/[&\/\\#,+()$~%.'":*?!@_^`|\[\];=<>{}]/g,''); //replace special charactor with     blanck space
							var res = resOld.toLowerCase();
							
							var text=" | Ace Packaging";
							document.getElementById("meta_title").value =  txt.value+text;  //create  meta Title
							
							var res1 = res.split(" ").join("-");	 //replace space with - sign	
							document.getElementById("page_name").value = res1+".php";  //create webpage name
						
				// 			var url="http://acepack.co.in/product-category/";
							document.getElementById("meta_url").value = res1+".php";  //create  meta url
							
							document.getElementById("meta_canonical").value = res1+".php";  //create  meta canonical url
					}
					
					function OnWebpageName(txt)
					{
						var str = txt.value; 
							
						var resOld = str.replace(/[&\/\\#,+()$~%'":*?!@_^`|\[\];=<>{}]/g,''); //replace special charactor with     blanck space
						var res = resOld.toLowerCase();
						
						var res1 = res.split(" ").join("-");
						
				// 		var url="http://acepack.co.in/product-category/";
						document.getElementById("meta_url").value = res1;  //create  meta url
						
						
					} 
					
					function OnDesc(txt) {
						
						var str = txt.value; 
						document.getElementById("meta_desc").value =  txt.value;  //create  meta Description
						
					}
					
					
					function setImage(val)
					{
					   //	var url1="http://acepack.co.in/admin/images/product_category/";
						var url2 = "Product-"+Math.floor((Math.random() * 99999) + 1)+"_";
						
						var fileName = val.substr(val.lastIndexOf("\\")+1, val.length); //get browse image name
						
						
						document.getElementById("browse_image").value = url2+fileName;  // add image name to text box
					   
					   
					    document.getElementById("meta_image").value = url2+fileName;  // add image name to meta_image with comlete URl
					    
					}
										
					function onWebPage()
					{
						if(document.getElementById("web_page").checked)
						{
							document.getElementById("page_name").readOnly = true;
						}
						else
						{
							document.getElementById("page_name").readOnly = false;
						}
					}
					
				  </script>
	
				<div class="form-group row">
                    <label class="col-sm-3 col-form-label">Category Title :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="title" id="title" <?php if(isset($_GET['add'])){?>onkeyup="OnTitle(this);"<?php } ?> value="<?php if(isset($_GET['edit_id'])){echo $row['title'];}?>" class="form-control" required>
                    </div>
                  </div>
				  
				   <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Name :- <br> [ex- page-name.php]</label>
                    <div class="col-sm-9">
                      <input type="text" name="page_name" id="page_name"  <?php if(isset($_GET['add'])){?>onkeyup="OnWebpageName(this);"<?php } ?> pattern="[a-z0-9._%+-]+\.php" title="Must contain have lowercase letter, use - as special charactor and ednding with .php extension" value="<?php if(isset($_GET['edit_id'])){echo $row['page_name'];}?>" class="form-control" required <?php if(isset($_GET['edit_id'])){echo "readonly";}?> readonly>
                    </div>
					
					<?php if(isset($_GET['add'])){?>
						<div class="col-md-2">
						<input onclick="onWebPage();" type="checkbox" id="web_page" checked /> <label for="web_page"> Readonly Text</label>   
						</div>
					<?php } ?>

                  </div>  
				  
				   <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Type :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="page_type" id="page_type" value="product-categories" class="form-control" readonly >
                    </div>
                  </div>
				  
                  <!--div class="form-group row">
                    <label class="col-sm-3 col-form-label">Category Image :-<p class="control-label-help">(Image Size : 500x500)</p>
                     </label>
                     
                    <div class="col-sm-9">
                      <div class="fileupload_block">
                        <input type="file" name="image" value="fileupload" id="fileupload">
                        <?php if(isset($_GET['edit_id']) and $row['image']!="") {?>
                        	<img style="width: 90px; height:auto;margin-bottom:10px;" src="images/product_category/<?php echo $row['image'];?>" alt="category image" />
                        	<?php } else {?>
							<img style="width: 90px; height:auto;margin-bottom:10px;" src="images/add-image.png" alt="category image" />
                        	<?php }?>
							
							<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['edit_id'])){echo $row['alt_tag'];}?>" class="form-control" />
						
                      </div>
                    </div>
                  </div>
				  	<div class="form-group row">
								<label class="col-sm-3 col-form-label">Description :-</label>
								<div class="col-sm-9">
									<div class="fileupload_block" >
									  <textarea  name="long_desc" id="tinymce-example" class="form-control"><?php if(isset($_GET['edit_id'])){echo $row['long_desc'];}?></textarea>
									</div>
								</div>
							</div-->  
				  <?php include_once('seo.php'); ?>
				  
				  	  
                                    <div class="form-group row row row row">
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