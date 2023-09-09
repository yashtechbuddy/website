<head>
<?php 
$pageName = $_SERVER['PHP_SELF'];

// Use basename() to extract the filename from the path
$currentPage = basename($pageName);

?>
 <?php 
$page_status="false";
			$path="";
			
			//Get file name
			$currentFile = $_SERVER["SCRIPT_NAME"];
			$parts = Explode('/', $currentFile);
			$currentFile = $parts[count($parts) - 1];       
			$current_page=$currentFile;

  $seo_qry="SELECT * FROM tbl_meta_tag where page_name='".$currentFile."'";	
			$seo_result=mysqli_query($mysqli,$seo_qry); 
			$seo_row=mysqli_fetch_array($seo_result);	
			$page_result=$seo_result;

			$qry="SELECT * FROM tbl_header_setting where id=1";				 
			$result=mysqli_query($mysqli,$qry); 
			$header_row=mysqli_fetch_array($result);
			
			?>
			<?php define("PAGE_BANNER_IMAGE",$seo_row['banner_image']); ?>
			<?php define("PAGE_BANNER_ALT_TAG",$seo_row['alt_tag']); ?>
            
		<!-- MOBILE SPECIFIC -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
			<title><?php echo $seo_row['meta_title']; ?> | SANDRA SHROFF ROFEL COLLEGE OF NURSING</title>
			<meta name="description" content="<?php echo $seo_row['meta_desc']; ?>" />
			<meta name="keywords" content="<?php echo $seo_row['meta_keyword']; ?>" />
			<link rel="author" href="<?php echo $seo_row['meta_author']; ?>" title="RnD Technosoft" />
			<link rel="publisher" href="<?php echo $seo_row['meta_publisher']; ?>" title="RnD Technosoft"  />
			<link rel="canonical" href="<?php echo $seo_row['meta_canonical']; ?>" />
			<meta property="og:url" content="<?php echo $seo_row['meta_url']; ?>" />
			<meta property="og:type" content="website">
			<meta property="og:title" content="<?php echo $seo_row['meta_title']; ?>" />
			<meta property="og:description" content="<?php echo $seo_row['meta_desc']; ?>" />
			<meta property="og:image" content="<?php echo $seo_row['meta_image']; ?>" />
			<meta name="language" content="<?php echo $seo_row['meta_language']; ?>" />
			<meta name="revisit-after" content="<?php echo $seo_row['meta_revisit']; ?>" />
			<meta name="owner" content="<?php echo $seo_row['meta_owner']; ?>"/>
			<meta name="copyright" content="<?php echo $seo_row['meta_copyright']; ?>" />
			<meta name="contact_addr" content="<?php echo $seo_row['meta_contact_addr']; ?>"/>
			<meta http-equiv="Expires" content="<?php echo $seo_row['meta_expires']; ?>" />
			<meta name="google-site-verification" content="<?php echo $seo_row['meta_google_verification']; ?>" />
			<meta name="p:domain_verify" content="<?php echo $seo_row['meta_domain_verification']; ?>" />
			<meta name="norton-safeweb-site-verification" content="<?php echo $seo_row['meta_safeweb_verification']; ?>" />
			<meta http-equiv="Content-Type" content="<?php echo $seo_row['meta_content_type']; ?>" />
			<meta name="rating" content="<?php echo $seo_row['meta_rating']; ?>" />
			<meta name="robots" content="<?php echo $seo_row['meta_robots']; ?>"/>
			<meta name="googlebot" content="<?php echo $seo_row['meta_googlebot']; ?>" />
			<meta name="distribution" content="<?php echo $seo_row['meta_distribution']; ?>" />
			<meta name="classification" content="<?php echo $seo_row['meta_classification']; ?>"/>
			<meta http-equiv="reply-to" content="<?php echo $seo_row['meta_reply']; ?>"/>
		<?php 
		//if folder is open or not
		if($seo_row['page_type']=="courses" or $seo_row['page_type']=="blog")
		{
			$page_status="true";
			$path="../";
		}
	?>
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="<?php echo $path;?>admin/images/header/<?php echo $header_row['icon']; ?>" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo $path;?>admin/images/header/<?php echo $header_row['icon']; ?>" />	
	<script src="<?php echo $path;?>assets/js/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&amp;family=Roboto:wght@400;700&amp;display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="<?php echo $path;?>assets/css/libraries.css">
  <link rel="stylesheet" href="<?php echo $path;?>assets/css/style.css">
</head>
<style>
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	left:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
    font-size:30px;
	box-shadow: 2px 2px 3px #999;
    z-index:100;
}

.my-float{
	margin-top:16px;
}


</style>
<script>
  $(document).ready(function() {
    // When a filter button is clicked
    $(".filter-button").on("click", function() {
      // Get the data-filter value from the clicked button
      var filterValue = $(this).attr("data-filter");
      
      // If the filter is "all", show all images, otherwise hide non-matching images
      if (filterValue === "all") {
        $(".gallery_product").show();
      } else {
        $(".gallery_product").hide();
        $(".filter." + filterValue).show();
      }

      // Remove and add "active" class to the clicked button for styling
      $(".filter-button").removeClass("active");
      $(this).addClass("active");
    });
  });
</script>
