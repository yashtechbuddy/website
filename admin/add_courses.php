<?php include("includes/header.php");

	require("includes/function.php");
	require("language/language.php");

	 
	//Add
	if(isset($_POST['submit']) and isset($_GET['add']))
	{
		/*CREATE SINGLE PAGE FILE*/
		$text=strtolower($_POST['title']);
	
		$filename=strtolower($_POST['page_name']);	/* OR      $filename=str_replace(" ","-",$text).".php";  */
	
        
		//copy("../service-detail.php","../courses/".$filename);
		
		$content ="<?php include_once('../course-detail-page.php'); ?>"; 
		$fh = fopen("../courses/".$filename, "w");
		fwrite($fh, $content);
		fclose($fh);
			
		
		
		
		//CHECK DUPLICATION
		$qry1="SELECT * FROM tbl_courses";
		$result1=mysqli_query($mysqli,$qry1);	
		
		while($row1=mysqli_fetch_array($result1))
		{
			if($row1['page_name']==$filename)
			{
				$_SESSION['errormsg']="10"; 
				header( "Location:manage_courses.php");
				exit;
			}
			
		}
		
			
		/*START META TAG INSERT */
		
			include_once('seo_add_form.php');
		
		/*END META TAG INSERT */
			
		
		
		
		$icon="";
		if($_FILES['icon']['name']!="")
		{	
			$icon="Icon-".rand(0,99999)."_".$_FILES['icon']['name'];
			$tpath1='images/courses/'.$icon; 			 
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath1);
		}
		
			$syllabus="";
		if($_FILES['syllabus']['name']!="")
		{	
			$syllabus="syllabus-".rand(0,99999)."_".$_FILES['syllabus']['name'];
			$tpath2='images/courses/'.$syllabus; 			 
			move_uploaded_file($_FILES["syllabus"]["tmp_name"],$tpath2);
		}
		
		$image="";
		if($_FILES['image']['name']!="")
		{	
			//$image="Service-".rand(0,99999)."_".$_FILES['image']['name'];			
			$image=$_POST['browse_image'];
			$tpath2='images/courses/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"],$tpath2);
		}	
						
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_courses order by position_order ASC";
		$result_order=mysqli_query($mysqli,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1;  
		
       $data = array( 
				'title'  =>  $_POST['title'],
				'icon'  =>  $icon,
			    'icon_alt_tag'  =>  $_POST['icon_alt_tag'],
				'image'  =>  $image,
			    'image_alt_tag'  =>  $_POST['image_alt_tag'],
			    'syllabus'  =>  $syllabus,
			    'syllabus_alt_tag'  =>  $_POST['syllabus_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'], 
				'page_name'  =>  $filename,
				'meta_tag_id' => $meta_row1['id'],
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'], 
				'image_type' =>  $_POST['image_type'],
				'position_order' => $position_order
			    );		

 		$qry = Insert('tbl_courses',$data);	

 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_courses.php");
		exit;	

		 
		
	}
	
	//Fetch selected service detail
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM tbl_courses where id='".$_GET['edit_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

			$meta_qry="SELECT * FROM tbl_meta_tag where id='".$row['meta_tag_id']."'";
			$meta_result=mysqli_query($mysqli,$meta_qry);
			$meta_row=mysqli_fetch_assoc($meta_result);
			
	}
	
	//Edit service
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
		 
		
		
		/*START META TAG UPDATE */
		
			include_once('seo_edit_form.php');
		
		/*END META TAG UPDATE */
			
		

		 if($_FILES['image']['name']!="" && $_FILES['icon']['name']!="" && $_FILES['syllabus']['name']!="" )
		 {		


			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_courses WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['image']!="")
			{
				unlink('images/courses/'.$img_res_row['image']);
			}

			if($img_res_row['icon']!="")
			{
				unlink('images/courses/'.$img_res_row['icon']);
			}
			
			if($img_res_row['syllabus']!="")
			{
				unlink('images/courses/'.$img_res_row['syllabus']);
			}
			
			
			$syllabus="syllabus-".rand(0,99999)."_".$_FILES['syllabus']['name'];
			$tpath1='images/courses/'.$syllabus; 			 
			move_uploaded_file($_FILES["syllabus"]["tmp_name"],$tpath1);
			
			$icon="Icon-".rand(0,99999)."_".$_FILES['icon']['name'];
			$tpath2='images/courses/'.$icon; 			 
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath2);
		
			//$image="Service-".rand(0,99999)."_".$_FILES['image']['name'];			
			$image=$_POST['browse_image'];
			$tpath3='images/courses/'.$image; 			 
			/* compress_image($_FILES["image"]["tmp_name"], $tpath1, 80); */
			move_uploaded_file($_FILES["image"]["tmp_name"],$tpath3);		
				
		

			$data = array(
				'title'  =>  $_POST['title'],
				'icon'  =>  $icon,
			    'icon_alt_tag'  =>  $_POST['icon_alt_tag'],
				'image'  =>  $image,
			    'image_alt_tag'  =>  $_POST['image_alt_tag'],
			    'syllabus'  =>  $syllabus,
			    'syllabus_alt_tag'  =>  $_POST['syllabus_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'],
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'],
				'image_type' =>  $_POST['image_type'],
				);

			$category_edit=Update('tbl_courses', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		 
		 elseif($_FILES['image']['name']!="" && $_FILES['icon']['name']!="")
		 {		

			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_courses WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['image']!="")
			{
				unlink('images/courses/'.$img_res_row['image']);
			}
            
            if($img_res_row['icon']!="")
			{
			 unlink('images/courses/'.$img_res_row['icon']);
			}
			
			$icon="Icon-".rand(0,99999)."_".$_FILES['icon']['name'];
			$tpath2='images/courses/'.$icon; 			 
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath2);
			//$image="courses-".rand(0,99999)."_".$_FILES['image']['name'];			
			$image=$_POST['browse_image'];
			$tpath1='images/courses/'.$image; 			 
			/* compress_image($_FILES["image"]["tmp_name"], $tpath1, 80); */
			move_uploaded_file($_FILES["image"]["tmp_name"],$tpath1);		
				
		

			$data = array(
				'title'  =>  $_POST['title'],
				'image'  =>  $image,
			    'image_alt_tag'  =>  $_POST['image_alt_tag'],
			    'icon'  =>  $icon,
			    'icon_alt_tag'  =>  $_POST['icon_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'],
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'],
				'image_type' =>  $_POST['image_type'],
				);

			$category_edit=Update('tbl_courses', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		 
		 
		 elseif($_FILES['icon']['name']!="" && $_FILES['syllabus']['name']!="" )
		 {		


			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_courses WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		
			if($img_res_row['syllabus']!="")
			{
				unlink('images/courses/'.$img_res_row['syllabus']);
			}
			
				if($img_res_row['icon']!="")
			{
				unlink('images/courses/'.$img_res_row['icon']);
			}
			
			
			$icon="Icon-".rand(0,99999)."_".$_FILES['icon']['name'];
			$tpath1='images/courses/'.$icon; 			 
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath1);
			
			$syllabus="syllabus-".rand(0,99999)."_".$_FILES['syllabus']['name'];
			$tpath1='images/courses/'.$syllabus; 			 
			move_uploaded_file($_FILES["syllabus"]["tmp_name"],$tpath1);
		

			$data = array(
				'title'  =>  $_POST['title'],
				'icon'  =>  $icon,
			    'icon_alt_tag'  =>  $_POST['icon_alt_tag'],
			    'syllabus'  =>  $syllabus,
			    'syllabus_alt_tag'  =>  $_POST['syllabus_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'],
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'],
				'image_type' =>  $_POST['image_type'],
				);

			$category_edit=Update('tbl_courses', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }elseif($_FILES['image']['name']!="" && $_FILES['syllabus']['name']!="" )
		 {		


			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_courses WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		
			if($img_res_row['syllabus']!="")
			{
				unlink('images/courses/'.$img_res_row['syllabus']);
			}
			
				if($img_res_row['image']!="")
			{
				unlink('images/courses/'.$img_res_row['image']);
			}
			
			
			$image="image-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/courses/'.$image; 			 
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath1);
			
			$syllabus="syllabus-".rand(0,99999)."_".$_FILES['syllabus']['name'];
			$tpath2='images/courses/'.$syllabus; 			 
			move_uploaded_file($_FILES["syllabus"]["tmp_name"],$tpath2);
		

			$data = array(
				'title'  =>  $_POST['title'],
				'image'  =>  $image,
			    'image_alt_tag'  =>  $_POST['image_alt_tag'],
			    'syllabus'  =>  $syllabus,
			    'syllabus_alt_tag'  =>  $_POST['syllabus_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'],
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'],
				'image_type' =>  $_POST['image_type'],
				);

			$category_edit=Update('tbl_courses', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }elseif($_FILES['icon']['name']!="" && $_FILES['syllabus']['name']!="" )
		 {		


			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_courses WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		
			if($img_res_row['syllabus']!="")
			{
				unlink('images/courses/'.$img_res_row['syllabus']);
			}
			
				if($img_res_row['icon']!="")
			{
				unlink('images/courses/'.$img_res_row['icon']);
			}
			
			
			$icon="Icon-".rand(0,99999)."_".$_FILES['icon']['name'];
			$tpath1='images/courses/'.$icon; 			 
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath1);
			
			$syllabus="syllabus-".rand(0,99999)."_".$_FILES['syllabus']['name'];
			$tpath1='images/courses/'.$syllabus; 			 
			move_uploaded_file($_FILES["syllabus"]["tmp_name"],$tpath1);
		

			$data = array(
				'title'  =>  $_POST['title'],
				'icon'  =>  $icon,
			    'icon_alt_tag'  =>  $_POST['icon_alt_tag'],
			    'syllabus'  =>  $syllabus,
			    'syllabus_alt_tag'  =>  $_POST['syllabus_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'],
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'],
				'image_type' =>  $_POST['image_type'],
				);

			$category_edit=Update('tbl_courses', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }elseif($_FILES['icon']['name']!="")
		 {		


			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_courses WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		
			
				if($img_res_row['icon']!="")
			{
				unlink('images/courses/'.$img_res_row['icon']);
			}
			
			
			$icon="Icon-".rand(0,99999)."_".$_FILES['icon']['name'];
			$tpath1='images/courses/'.$icon; 			 
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath1);
			
		
		

			$data = array(
				'title'  =>  $_POST['title'],
				'icon'  =>  $icon,
			    'icon_alt_tag'  =>  $_POST['icon_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'],
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'],
				'image_type' =>  $_POST['image_type'],
				);

			$category_edit=Update('tbl_courses', $data, "WHERE id = '".$_POST['edit_id']."'");

		 } elseif($_FILES['syllabus']['name']!="" )
		 {		


			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_courses WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		
			if($img_res_row['syllabus']!="")
			{
				unlink('images/courses/'.$img_res_row['syllabus']);
			}
			
			$syllabus="syllabus-".rand(0,99999)."_".$_FILES['syllabus']['name'];
			$tpath1='images/courses/'.$syllabus; 			 
			move_uploaded_file($_FILES["syllabus"]["tmp_name"],$tpath1);
		

			$data = array(
				'title'  =>  $_POST['title'],
			    'syllabus'  =>  $syllabus,
			    'syllabus_alt_tag'  =>  $_POST['syllabus_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'],
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'],
				'image_type' =>  $_POST['image_type'],
				);

			$category_edit=Update('tbl_courses', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }elseif($_FILES['image']['name']!="")
		 {		


			$img_res=mysqli_query($mysqli,'SELECT * FROM tbl_courses WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		
			
			
				if($img_res_row['image']!="")
			{
				unlink('images/courses/'.$img_res_row['image']);
			}
			
			
			$image="image-".rand(0,99999)."_".$_FILES['image']['name'];
			$tpath1='images/courses/'.$image; 			 
			move_uploaded_file($_FILES["icon"]["tmp_name"],$tpath1);
			
			
		

			$data = array(
				'title'  =>  $_POST['title'],
				'image'  =>  $image,
			    'image_alt_tag'  =>  $_POST['image_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'],
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'],
				'image_type' =>  $_POST['image_type'],
				);

			$category_edit=Update('tbl_courses', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }else 
		 {

			 $data = array(
				'title'  =>  $_POST['title'],
			    'icon_alt_tag'  =>  $_POST['icon_alt_tag'],
			    'image_alt_tag'  =>  $_POST['image_alt_tag'],
				'sort_desc'  =>  $_POST['sort_desc'], 
				'long_desc'  =>  $_POST['long_desc'],				
				'btn1_name'  =>  $_POST['btn1_name'], 
				'btn1_link'  =>  $_POST['btn1_link'], 
				'btn2_name'  =>  $_POST['btn2_name'],  
				'btn2_link'  =>  $_POST['btn2_link'],
				'image_type' =>  $_POST['image_type'],
				);	

			 $category_edit=Update('tbl_courses', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }

		     
		$_SESSION['msg']="11"; 
		header( "Location:manage_courses.php");
		exit;
 
	}


?>
<div class="breadcrumbbar">
   <div class="row align-items-center">
      <div class="col-md-8 col-lg-8">
         <h2 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Course</h2>
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
							
							
							var res1 = res.split(" ").join("-");	 //replace space with - sign	
							document.getElementById("page_name").value = res1+".php";  //create webpage name
							document.getElementById("btn2_link").value = res1+".php";  //create Know More Btn Link
						
							var text=" | RnD Technosoft";
							document.getElementById("meta_title").value =  txt.value+text;  //create  meta Title
							
							var url="http://www.sscnvapi.org/courses/";
							document.getElementById("meta_url").value = url+res1+".php";  //create  meta url
						
							document.getElementById("meta_canonical").value = url+res1+".php";  //create  meta canonical url
							
						
					}
					
					function OnWebpageName(txt)
					{
						var str = txt.value; 
							
						var resOld = str.replace(/[&\/\\#,+()$~%'":*?!@_^`|\[\];=<>{}]/g,''); //replace special charactor with     blanck space
						var res = resOld.toLowerCase();
						
						var res1 = res.split(" ").join("-");
						
						var url="http://www.sscnvapi.org/courses/";
						document.getElementById("meta_url").value = url+res1;  //create  meta url
						
					} 
					
					function OnDesc(txt) {
						
						var str = txt.value; 
						document.getElementById("meta_desc").value =  txt.value;  //create  meta Description
						
					}
					
					
					function setImage(val)
					{
					   	var url1="http://www.sscnvapi.org/admin/images/courses/";
						var url2 = "Service-"+Math.floor((Math.random() * 99999) + 1)+"_";
						
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
	
				<input  type="hidden" name="edit_id" value="<?php echo $_GET['edit_id'];?>" />	
						 <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Course Title :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="title" id="title" <?php if(isset($_GET['add'])){?>onkeyup="OnTitle(this);"<?php } ?>  value="<?php if(isset($_GET['edit_id'])){echo $row['title'];}?>" class="form-control" required >
                    </div>
                  </div>    
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Page Name :- <br> [ex- page-name.php]</label>
                    <div class="col-sm-9">
                      <input type="text" name="page_name" id="page_name"  <?php if(isset($_GET['add'])){?>onkeyup="OnWebpageName(this);"<?php } ?> pattern="[a-z0-9._%+-]+\.php" title="Must contain have lowercase letter, use - as special charactor and ednding with .php extension" value="<?php if(isset($_GET['edit_id'])){echo $row['page_name'];}?>" class="form-control" required <?php if(isset($_GET['edit_id'])){echo "readonly";}?> readonly >
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
                      <input type="text" name="page_type" id="page_type" value="<?php if(isset($_GET['add'])){?>courses<?php } ?><?php echo $meta_row['page_type'];?>" class="form-control" readonly >
                    </div>
                  </div>
				  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Course Description :-</label>
                    <div class="col-sm-9">
					  <textarea  name="sort_desc" id="sort_desc" onkeyup="OnDesc(this);"  class="form-control"><?php if(isset($_GET['edit_id'])){echo $row['sort_desc'];}?></textarea>
					  <br>
                    </div>
                  </div>       
				  
				  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">image Type :-</label>
                    <div class="col-sm-9">
                      <select name="image_type" id="image_type" class="form-control"  required>
                        	<option value="">--Select image Type--</option>
                        	<option value="top"  <?php  if(isset($_GET['edit_id']) &&  $row['image_type']=="top") { echo "selected"; }  ?> >Top</option>
                        	<option value="bottom"  <?php  if(isset($_GET['edit_id']) &&  $row['image_type']=="bottom") { echo "selected"; }  ?> >Bottom</option>          							
                      </select> <br><br>
                    </div>
                </div>
                
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Course Icon :- <p class="control-label-help">(Image Size : 64x64)</p></label>
                    <div class="col-sm-9">
                      <div class="fileupload_block" >
							
							<input type="file" name="icon" id="fileupload" >
							
                            <?php if(isset($_GET['edit_id']) and $row['icon']!="") {?>
							<img type="image" style="width: 90px; height:auto;margin-bottom:10px;" src="images/courses/<?php echo $row['icon'];?>" alt="banner image"/>
                        	<?php } else {?>
							<img type="image" src="assets/images/add-image.png" />
                        	<?php }?>
							
							<input type="text" name="icon_alt_tag" id="icon_alt_tag"  placeholder="Enter Icon Alternate text" title="Enter Icon Alternate text here !" value="<?php if(isset($_GET['edit_id'])){echo $row['icon_alt_tag'];}?>" class="form-control" />
						
                      </div>
                    </div>
                  </div>
                    
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Course Image :- <p class="control-label-help">(Image Size : 900x600)</p></label>
                    <div class="col-sm-9">
                      <div class="fileupload_block">
					  
							<input type="file" name="image" id="fileupload" onchange="setImage(this.value);"  >
						
							<input type="hidden" name="browse_image" id="browse_image" class="form-control">
												
                            <?php if(isset($_GET['edit_id']) and $row['image']!="") {?>
                        	  <img type="image" style="width: 90px; height:auto;margin-bottom:10px;" src="images/courses/<?php echo $row['image'];?>" alt="banner image"/>
                        	<?php } else {?>
							<img type="image" src="assets/images/add-image.png" />
                        	<?php }?>
														
							<input type="text" name="image_alt_tag" id="image_alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['edit_id'])){echo $row['image_alt_tag'];}?>" class="form-control" />
						
                      </div>
                    </div>
                  </div>
                   
				   
				   <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Course Syllabus :- <p class="control-label-help">(Image Size : 64x64)</p></label>
                    <div class="col-sm-9">
                      <div class="fileupload_block" >
							
							<input type="file" name="syllabus" id="fileupload" >
							
                            <?php if(isset($_GET['edit_id']) and $row['syllabus']!="") {?>
							<img type="image" style="width: 90px; height:auto;margin-bottom:10px;" src="images/courses/<?php echo $row['syllabus'];?>" alt="syllabus file"/>
                        	<?php } else {?>
							<img type="image" src="assets/images/add-image.png" />
                        	<?php }?>
							
							<input type="text" name="syllabus_alt_tag" id="syllabus_alt_tag"  placeholder="Enter syllabus Alternate text" title="Enter syllabus Alternate text here !" value="<?php if(isset($_GET['edit_id'])){echo $row['syllabus_alt_tag'];}?>" class="form-control" />
						
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Single Page Description :-</label>
                    <div class="col-sm-9">
					<div class="fileupload_block" >
					  <textarea  name="long_desc" id="tinymce-example" class="tinymce-editor"><?php if(isset($_GET['edit_id'])){echo $row['long_desc'];}?></textarea>					  
                    </div>
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