<?php
include("includes/connection.php");
	$permission_qry="SELECT * FROM tbl_superadmin_setting where visibility_status=0 and page_name='manage_seo.php' order by id ASC";
		$permission_result=mysqli_query($mysqli,$permission_qry);
		$permission_count=mysqli_num_rows($permission_result);
	
	if($permission_count > 0) 
	{	

		$image="default/default-banner.jpg";
		if($_FILES['banner_image']['name']!="")
		{	
			$image="Banner-".rand(0,99999)."_".$_FILES['banner_image']['name'];			   			
			$tpath1='images/pageBanner/'.$image; 			 
			move_uploaded_file($_FILES["banner_image"]["tmp_name"], $tpath1);
		}	
				
		$meta_data = array( 
		'page_name'  =>  $filename,
		'page_type'  =>  $_POST['page_type'],
		'banner_image'  =>  $image, 
		'alt_tag'  =>  $_POST['banner_alt_tag'],
		'meta_title'  =>  $_POST['meta_title'],
		'meta_desc'  =>  $_POST['meta_desc'],
		'meta_url'  =>  $_POST['meta_url'],
		'meta_image'  =>  $_POST['meta_image'],
		'meta_keyword'  =>  $_POST['meta_keyword'],
			
		'meta_author'  =>  $_POST['meta_author'],
		'meta_publisher'  =>  $_POST['meta_publisher'],
		'meta_canonical'  =>  $_POST['meta_canonical'],
		'meta_language'  =>  $_POST['meta_language'],
		'meta_revisit'  =>  $_POST['meta_revisit'],
		'meta_owner'  =>  $_POST['meta_owner'],
		'meta_copyright'  =>  $_POST['meta_copyright'],
		'meta_contact_addr'  =>  $_POST['meta_contact_addr'],
		'meta_expires'  =>  $_POST['meta_expires'],
		'meta_google_verification'  =>  $_POST['meta_google_verification'],
		'meta_domain_verification'  =>  $_POST['meta_domain_verification'],
		'meta_safeweb_verification'  =>  $_POST['meta_safeweb_verification'],
		'meta_content_type'  =>  $_POST['meta_content_type'],
		'meta_rating'  =>  $_POST['meta_rating'],
		'meta_robots'  =>  $_POST['meta_robots'],
		'meta_googlebot'  =>  $_POST['meta_googlebot'],
		'meta_distribution'  =>  $_POST['meta_distribution'],
		'meta_classification'  =>  $_POST['meta_classification'],
		'meta_reply'  =>  $_POST['meta_reply']
			
		);	
		$metaqry = Insert('tbl_meta_tag',$meta_data);	
		
		$meta_qry1="SELECT * FROM tbl_meta_tag where page_name='".$filename."'";
		$meta_result1=mysqli_query($mysqli,$meta_qry1);
		$meta_row1=mysqli_fetch_assoc($meta_result1);
	   
	}
	else		
	{	


		$image="default/default-banner.jpg";
		if($_FILES['banner_image']['name']!="")
		{	
			$image="Banner-".rand(0,99999)."_".$_FILES['banner_image']['name'];			   			
			$tpath1='images/pageBanner/'.$image; 			 
			move_uploaded_file($_FILES["banner_image"]["tmp_name"], $tpath1);
		}	
				
		$meta_data = array( 
		'page_name'  =>  $filename,
		'page_type'  =>  $_POST['page_type'],
		'banner_image'  =>  $image, 
		'alt_tag'  =>  $_POST['banner_alt_tag'],
		'meta_title'  =>  $_POST['meta_title'],
		'meta_desc'  =>  $_POST['meta_desc']
		
		);	
		$metaqry = Insert('tbl_meta_tag',$meta_data);	
		
		$meta_qry1="SELECT * FROM tbl_meta_tag where page_name='".$filename."'";
		$meta_result1=mysqli_query($mysqli,$meta_qry1);
		$meta_row1=mysqli_fetch_assoc($meta_result1);



	}

?>