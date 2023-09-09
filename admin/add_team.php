<?php include("includes/header.php");

require("includes/function.php");
require("language/language.php");
date_default_timezone_set('Asia/Calcutta');

//Add
if (isset($_POST['submit']) and isset($_GET['add'])) {

	$image = "";
	if ($_FILES['image']['name'] != "") {
		$image="Team-".rand(0,99999)."_".$_FILES['image']['name'];			
		$tpath1 = 'images/team/' . $image;
		move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
	}

	/*COUNT LAST INSERTED POSITION NO */
	$qry_order = "SELECT * FROM tbl_team order by position_order ASC";
	$result_order = mysqli_query($mysqli, $qry_order);
	$position_order = mysqli_num_rows($result_order) + 1;

	$data = array(
		'name'  =>  $_POST['name'],
		'design'  =>  $_POST['design'],
		'image'  =>  $image,
		'alt_tag'  =>  $_POST['alt_tag'],
		'sort_desc'  =>  $_POST['sort_desc'],
		'facebook_link'  =>  $_POST['facebook_link'],
		'twitter_link'  =>  $_POST['twitter_link'],
		'linkedin_link'  =>  $_POST['linkedin_link'],
		'googleplus_link'  =>  $_POST['googleplus_link'],
		'instagram_link'  =>  $_POST['instagram_link'],
		'youtube_link'  =>  $_POST['youtube_link'],
		'long_desc'  =>  $_POST['long_desc'],
		'meta_tag_id' => $meta_row1['id'],
		'position_order' => $position_order,
		'performance_text' => addslashes($_POST['performance_text']),
		'performance_per' => $_POST['performance_per'],
		'performance_text1' => addslashes($_POST['performance_text1']),
		'performance_per1' => $_POST['performance_per1'],
		'performance_text2' => addslashes($_POST['performance_text2']),
		'performance_per2' => $_POST['performance_per2'],
		'performance_text3' => addslashes($_POST['performance_text3']),
		'performance_per3' => $_POST['performance_per3']
	);

	$qry = Insert('tbl_team', $data);


	$_SESSION['msg'] = "10";
	header("Location:manage_team.php");
	exit;
}

//Fetch selected service detail
if (isset($_GET['edit_id'])) {

	$qry = "SELECT * FROM tbl_team where id='" . $_GET['edit_id'] . "'";
	$result = mysqli_query($mysqli, $qry);
	$row = mysqli_fetch_assoc($result);

}

//Edit
if (isset($_POST['submit']) and isset($_POST['edit_id'])) {


	if ($_FILES['image']['name'] != "") {
		$img_res = mysqli_query($mysqli, 'SELECT * FROM tbl_team WHERE id=' . $_GET['edit_id'] . '');
		$img_res_row = mysqli_fetch_assoc($img_res);

		if ($img_res_row['image'] != "") {
			unlink('images/team/' . $img_res_row['image']);
		}

		$image="Team-".rand(0,99999)."_".$_FILES['image']['name'];			
	
		$tpath1 = 'images/team/' . $image;
		move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);

		$data = array(
			'name'  =>  $_POST['name'],
			'design'  =>  $_POST['design'],
			'image'  =>  $image,
			'alt_tag'  =>  $_POST['alt_tag'],
			'sort_desc'  =>  $_POST['sort_desc'],
			'facebook_link'  =>  $_POST['facebook_link'],
			'twitter_link'  =>  $_POST['twitter_link'],
			'linkedin_link'  =>  $_POST['linkedin_link'],
			'googleplus_link'  =>  $_POST['googleplus_link'],
			'instagram_link'  =>  $_POST['instagram_link'],
			'youtube_link'  =>  $_POST['youtube_link'],
			'long_desc'  =>  $_POST['long_desc'],
			'performance_text' => addslashes($_POST['performance_text']),
			'performance_per' => $_POST['performance_per'],
			'performance_text1' => addslashes($_POST['performance_text1']),
			'performance_per1' => $_POST['performance_per1'],
			'performance_text2' => addslashes($_POST['performance_text2']),
			'performance_per2' => $_POST['performance_per2'],
			'performance_text3' => addslashes($_POST['performance_text3']),
			'performance_per3' => $_POST['performance_per3']
		);

		$category_edit = Update('tbl_team', $data, "WHERE id = '" . $_POST['edit_id'] . "'");
	} else {


		$data = array(
			'name'  =>  $_POST['name'],
			'design'  =>  $_POST['design'],
			'alt_tag'  =>  $_POST['alt_tag'],
			'sort_desc'  =>  $_POST['sort_desc'],
			'facebook_link'  =>  $_POST['facebook_link'],
			'twitter_link'  =>  $_POST['twitter_link'],
			'linkedin_link'  =>  $_POST['linkedin_link'],
			'googleplus_link'  =>  $_POST['googleplus_link'],
			'instagram_link'  =>  $_POST['instagram_link'],
			'youtube_link'  =>  $_POST['youtube_link'],
			'long_desc'  =>  $_POST['long_desc'],
			'performance_text' => addslashes($_POST['performance_text']),
			'performance_per' => $_POST['performance_per'],
			'performance_text1' => addslashes($_POST['performance_text1']),
			'performance_per1' => $_POST['performance_per1'],
			'performance_text2' => addslashes($_POST['performance_text2']),
			'performance_per2' => $_POST['performance_per2'],
			'performance_text3' => addslashes($_POST['performance_text3']),
			'performance_per3' => $_POST['performance_per3']
		);

		$category_edit = Update('tbl_team', $data, "WHERE id = '" . $_POST['edit_id'] . "'");
	}


	$_SESSION['msg'] = "11";
	header("Location:manage_team.php");
	exit;
}


?>
<div class="breadcrumbbar">
	<div class="row align-items-center">
		<div class="col-md-8 col-lg-8">
			<h2 class="page-title"><?php if (isset($_GET['edit_id'])) { ?>Edit<?php } else { ?>Add<?php } ?> Team</h2>
		</div>
	</div>
</div>
<?php if (isset($_SESSION['msg'])) { ?>

	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong><?php echo $client_lang[$_SESSION['msg']]; ?> </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php unset($_SESSION['msg']);
} ?>
<!-- End Breadcrumbbar -->
<div class="contentbar">
	<!-- Start row -->
	<div class="row">
		<!-- Start col -->
		<div class="col-lg-12">
			<div class="card m-b-30">

				<div class="card-body">
					<form action="" name="editprofile" method="post" enctype="multipart/form-data">
					    		<input type="hidden" name="edit_id" value="<?php echo $_GET['edit_id']; ?>" />
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Team Name :-</label>
							<div class="col-sm-9">
								<input type="text" name="name" id="name" <?php if (isset($_GET['add'])) { ?>onkeyup="OnTitle(this);" <?php } ?> value="<?php if (isset($_GET['edit_id'])) {
																																						echo $row['name'];
																																					} ?>" class="form-control" required>
							</div>
						</div>
					

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Team Designation :-</label>
							<div class="col-sm-9">
								<input type="text" name="design" id="design" value="<?php if (isset($_GET['edit_id'])) {
																						echo $row['design'];
																					} ?>" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Team Image :- </label>
							<div class="col-sm-9">
								<div class="fileupload_block">

									<input type="hidden" name="browse_image" id="browse_image" class="form-control">

									<input type="file" name="image" value="fileupload" id="fileupload" onchange="setImage(this.value);">
									<?php if (isset($_GET['edit_id']) and $row['image'] != "") { ?><img style="width: 90px; height:auto;margin-bottom:10px;" type="image" src="images/team/<?php echo $row['image']; ?>" alt="banner image" />
									<?php } else { ?><img type="image" src="assets/images/add-image.png" />
									<?php } ?>


									<input type="text" name="alt_tag" id="alt_tag" placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if (isset($_GET['edit_id'])) {
																																													echo $row['alt_tag'];
																																												} ?>" class="form-control" />

								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Short Description:-</label>
							<div class="col-sm-9">
							 <textarea name="sort_desc" id="short_desc"  rows="3" value="<?php if (isset($_GET['edit_id'])) {
																						echo $row['sort_desc'];
								
																			} ?>" class="form-control">
							 </textarea>
							</div>
							
						</div>

                            <div class="form-group row row">
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