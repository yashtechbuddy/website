<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

 
	$cat_qry="SELECT * FROM tbl_image_category ORDER BY title";
	$cat_result=mysqli_query($mysqli,$cat_qry); 
	
	if(isset($_POST['submit']))
	{
		/*CREATE SINGLE PAGE FILE*/
		
		$filename=strtolower($_POST['page_name']);	/* OR      $filename=str_replace(" ","-",$text).".php";  */

		//copy("../team-detail.php","../team/".$filename);
		
		$content ="<?php include_once('../portfolio-detail.php'); ?>"; 
		$fh = fopen("../portfolio/".$filename, "w");
		fwrite($fh, $content);
		fclose($fh);						
		
		
		//CHECK DUPLICATION
		$qry1="SELECT * FROM tbl_image_gallery";
		$result1=mysqli_query($mysqli,$qry1);	
		
		while($row1=mysqli_fetch_array($result1))
		{
			if($row1['page_name']==$filename)
			{
				$_SESSION['errormsg']="10"; 
				header( "Location:manage_image_gallery.php");
				exit;
			}
			
		}
		
		/*START META TAG INSERT */
		
			include_once('seo_add_form.php');
		
		/*END META TAG INSERT */
		
		$cat_id=$_POST['cat_id'];
		$qry11=mysqli_query($mysqli,'SELECT * FROM tbl_image_category WHERE id='.$cat_id.'');
		$row11=mysqli_fetch_assoc($qry11);
		$cat_title=$row11['title'];	
		
		$count = count($_FILES['image']['name']);
		for($i=0;$i<$count;$i++)
		{ 
				
			
			/*COUNT LAST INSERTED POSITION NO */
			$qry_order="SELECT * FROM tbl_image_gallery order by position_order ASC";
			$result_order=mysqli_query($mysqli,$qry_order); 				
			$position_order=mysqli_num_rows($result_order);  
			$position_order=$position_order+1;
				
			$image=$cat_title."-".rand(0,99999)."_".$_FILES['image']['name'][$i];
			$tpath1='images/image_gallery/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"][$i], $tpath1);
			
			if($_FILES['image']['name'][$i]=="")
			{
				$image="";			
			}				
		
			$data = array( 		
	
			'cat_id'  => implode(',',$_POST['cat_id']),
			'page_name'  =>  $filename,
			'title'  =>  $_POST['title'],
            'image_desc' => addslashes($_POST['image_desc']),
			'image_type'  =>  $_POST['image_type'],
			'image'  =>  $image,
			'client_id' => $_POST['client'],
			'alt_tag'  =>  $_POST['alt_tag'],
			'link'  =>  $_POST['link'],
			'position_order' => $position_order,
			'meta_tag_id' => $meta_row1['id'],
			);		

			$qry = Insert('tbl_image_gallery',$data);	

 	    }			

		$_SESSION['msg']="10";
 
		header( "Location:manage_image_gallery.php");
		exit;	

		 
	}
	
	  
?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Image Gallery</h2>
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
						
						var text=" | RnD Technosoft";
						document.getElementById("meta_title").value =  txt.value+text;  //create  meta Title
						
						var res1 = res.split(" ").join("-");	 //replace space with - sign	
						document.getElementById("page_name").value = res1+".php";  //create webpage name
					
						var url="https://www.rndtechnosoft.com/portfolio/";
						document.getElementById("meta_url").value = url+res1+".php";  //create  meta url
						
						document.getElementById("meta_canonical").value = url+res1+".php";  //create  meta canonical url
						
						
					}
					
					function OnWebpageName(txt)
					{
						var str = txt.value; 
							
						var resOld = str.replace(/[&\/\\#,+()$~%'":*?!@_^`|\[\];=<>{}]/g,''); //replace special charactor with     blanck space
						var res = resOld.toLowerCase();
						
						var res1 = res.split(" ").join("-");
						
						var url="https://www.rndtechnosoft.com/portfolio/";
						document.getElementById("meta_url").value = url+res1;  //create  meta url
						
						
					} 
					
					function OnDesc(txt) {
						
						var str = txt.value; 
						document.getElementById("meta_desc").value =  txt.value;  //create  meta Description
						
					}
					
					
					function setImage(val)
					{
						
					   	var url1="https://www.rndtechnosoft.com/admin/images/image_gallery/";
						var url2 = "portfolio-"+Math.floor((Math.random() * 99999) + 1)+"_";
						
						var fileName = val.substr(val.lastIndexOf("\\")+1, val.length); //get browse image name
						
						
						document.getElementById("browse_image").value = url2+fileName;  // add image name to text box
					   
					   
					    document.getElementById("meta_image").value = url1+url2+fileName;  // add image name to meta_image with comlete URl
					    
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
                    <label class="col-sm-3 col-form-label">Category :-</label>
                    <div class="col-sm-9">
                      <select name="cat_id[]" class="form-control" id="formControlSelect" required>
                        <option value="">--Select Category--</option>
          							<?php
										while($cat_row=mysqli_fetch_array($cat_result))
										{
          							?>          						 
          							<option value="<?php echo $cat_row['id'];?>"><?php echo $cat_row['title'];?></option>	          							 
          							<?php
          								}
          							?>
                      </select>
                    </div>
                  </div>
				  
				   <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Image Title :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="title" id="title" <?php if(isset($_GET['add'])){?>onkeyup="OnTitle(this);"<?php } ?>  class="form-control" required>
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
                      <input type="text" name="page_type" id="page_type" value="<?php if(isset($_GET['add'])){?>portfolio<?php } ?><?php echo $meta_row['page_type'];?>" class="form-control" readonly >
                    </div>
                  </div>
				 <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description :-</label>
                    <div class="col-sm-9">
					<div class="fileupload_block" >
					  <textarea  name="image_desc" id="tinymce-example" class="form-control"><?php echo $row['desc'];?></textarea>					  
                    </div>
					</div>
                  </div>
				  
				  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Client :-</label>
                    <div class="col-sm-9">
						<select name="client" class="form-control" id="formControlSelect" required>
                        <option value="">--Select Client--</option>
						<?php						
							$data_qry="SELECT * FROM tbl_client ORDER BY position_order";
							$data_result=mysqli_query($mysqli,$data_qry); 
							while($data_row=mysqli_fetch_array($data_result))
							{
								?>          						 
								<option value="<?php echo $data_row['id'];?>"><?php echo $data_row['name'];?></option>		 
								<?php
							}
						?>	
						</select>
                    </div>
                  </div>
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gallery Image :-
                    </label>
                    <div class="col-sm-9">
                      <div class="fileupload_block">
                        <input type="file" name="image[]" value="" id="fileupload" multiple onchange="setImage(this.value);">
						<img type="image" style="width: 90px; height:auto;margin-bottom:10px;" src="assets/images/add-image.png" alt="image" />
					   
							<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['edit_id'])){echo $row['alt_tag'];}?>" class="form-control" />
							
                      </div>
                    </div>
                  </div>
				  
				  
				   <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Website Link :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="link" id="link" class="form-control">
                    </div>
                  </div>
									 <?php include_once('seo.php'); ?>
                                    <div class="form-group row row row">
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