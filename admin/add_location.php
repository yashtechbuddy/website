<?php include("includes/header.php");

require("includes/function.php");
require("language/language.php");


//Add
if (isset($_POST['submit']) and isset($_GET['add'])) {
	$icon = "";
	if ($_FILES['icon']['name'] != "") {
		$icon = "Icon-" . rand(0, 99999) . "_" . $_FILES['icon']['name'];
		$tpath1 = 'images/location/' . $icon;
		move_uploaded_file($_FILES["icon"]["tmp_name"], $tpath1);
	}

	$image = "";
	if ($_FILES['image']['name'] != "") {
		$image="location-".rand(0,99999)."_".$_FILES['image']['name'];			
// 		$image = $_POST['browse_image'];
		$tpath1 = 'images/location/' . $image;
		move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
	}

	/*COUNT LAST INSERTED POSITION NO */
	$qry_order = "SELECT * FROM tbl_location order by position_order ASC";
	$result_order = mysqli_query($mysqli, $qry_order);
	$position_order = mysqli_num_rows($result_order) + 1;

	$data = array(
		'title'  =>  $_POST['title'],
		'day_night' => $_POST['day_night'],
		'image' => $image,
		'icon'  =>  $icon,
		'alt_tag'  =>  $_POST['alt_tag'],
		'price' => $_POST['price'],
		'adults' => $_POST['adults'],
		'from_date' => $_POST['from_date'],
		'to_date' => $_POST['to_date'],
		'flaticon' => $_POST['flaticon'],
		'position_order' => $position_order
	);

	$qry = Insert('tbl_location', $data);


	$_SESSION['msg'] = "10";
	header("Location:manage_location.php");
	exit;
}

//Fetch selected location detail
if (isset($_GET['edit_id'])) {

	$qry = "SELECT * FROM tbl_location where id='" . $_GET['edit_id'] . "'";
	$result = mysqli_query($mysqli, $qry);
	$row = mysqli_fetch_assoc($result);
}
//Edit location
if (isset($_POST['submit']) and isset($_POST['edit_id'])) {


	if ($_FILES['image']['name'] != "" && $_FILES['icon']['name'] != "") {


		$img_res = mysqli_query($mysqli, 'SELECT * FROM tbl_location WHERE id=' . $_GET['edit_id'] . '');
		$img_res_row = mysqli_fetch_assoc($img_res);


		if ($img_res_row['image'] != "") {
			unlink('images/location/' . $img_res_row['image']);
		}

		if ($img_res_row['icon'] != "") {
			unlink('images/location/' . $img_res_row['icon']);
		}


		$icon = "Icon-" . rand(0, 99999) . "_" . $_FILES['icon']['name'];
		$tpath1 = 'images/location/' . $icon;
		move_uploaded_file($_FILES["icon"]["tmp_name"], $tpath1);

		$image="location-".rand(0,99999)."_".$_FILES['image']['name'];			
// 		$image = $_POST['browse_image'];
		$tpath1 = 'images/location/' . $image;
		
		move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);



		$data = array(
			'title'  =>  $_POST['title'],
			'day_night' => $_POST['day_night'],
			'image' => $image,
			'icon'  =>  $icon,
			'alt_tag'  =>  $_POST['alt_tag'],
			'price' => $_POST['price'],
			'adults' => $_POST['adults'],
			'from_date' => $_POST['from_date'],
			'to_date' => $_POST['to_date'],
			'flaticon' => $_POST['flaticon'],
		);
		$category_edit = Update('tbl_location', $data, "WHERE id = '" . $_POST['edit_id'] . "'");
	}
	elseif ($_FILES['image']['name'] != "") {

		$img_res = mysqli_query($mysqli, 'SELECT * FROM tbl_location WHERE id=' . $_GET['edit_id'] . '');
		$img_res_row = mysqli_fetch_assoc($img_res);


		if ($img_res_row['image'] != "") {
			unlink('images/location/' . $img_res_row['image']);
		}


		//$image="location-".rand(0,99999)."_".$_FILES['image']['name'];			
		$image = $_POST['browse_image'];
		$tpath1 = 'images/location/' . $image;
		/* compress_image($_FILES["image"]["tmp_name"], $tpath1, 80); */
		move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);



		$data = array(
			'title'  =>  $_POST['title'],
			'day_night' => $_POST['day_night'],
			'image' => $image,
			'alt_tag'  =>  $_POST['alt_tag'],
			'price' => $_POST['price'],
			'adults' => $_POST['adults'],
			'from_date' => $_POST['from_date'],
			'to_date' => $_POST['to_date'],
			'flaticon' => $_POST['flaticon'],
		);
		$category_edit = Update('tbl_location', $data, "WHERE id = '" . $_POST['edit_id'] . "'");
	} elseif ($_FILES['icon']['name'] != "") {


		$img_res = mysqli_query($mysqli, 'SELECT * FROM tbl_location WHERE id=' . $_GET['edit_id'] . '');
		$img_res_row = mysqli_fetch_assoc($img_res);

		if ($img_res_row['icon'] != "") {
			unlink('images/location/' . $img_res_row['icon']);
		}


		$icon = "Icon-" . rand(0, 99999) . "_" . $_FILES['icon']['name'];
		$tpath1 = 'images/location/' . $icon;
		move_uploaded_file($_FILES["icon"]["tmp_name"], $tpath1);


		$data = array(
			'title'  =>  $_POST['title'],
			'day_night' => $_POST['day_night'],
			'icon' => $icon,
			'alt_tag'  =>  $_POST['alt_tag'],
			'price' => $_POST['price'],
			'adults' => $_POST['adults'],
			'from_date' => $_POST['from_date'],
			'to_date' => $_POST['to_date'],
			'flaticon' => $_POST['flaticon']
		);

		$category_edit = Update('tbl_location', $data, "WHERE id = '" . $_POST['edit_id'] . "'");
	} else {
		$data = array(
			'title'  =>  $_POST['title'],
			'day_night' => $_POST['day_night'],
			'alt_tag'  =>  $_POST['alt_tag'],
			'price' => $_POST['price'],
			'adults' => $_POST['adults'],
			'from_date' => $_POST['from_date'],
			'to_date' => $_POST['to_date'],
			'flaticon' => $_POST['flaticon']
		);

		$category_edit = Update('tbl_location', $data, "WHERE id = '" . $_POST['edit_id'] . "'");
	}


	$_SESSION['msg'] = "11";
	header("Location:manage_location.php");
	exit;
}


?>
<div class="breadcrumbbar">
	<div class="row align-items-center">
		<div class="col-md-8 col-lg-8">
			<h2 class="page-title"><?php if (isset($_GET['edit_id'])) { ?>Edit<?php } else { ?>Add<?php } ?> Location</h2>
		</div>
	</div>
</div>
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
							<label class="col-sm-3 col-form-label">Title :-</label>
							<div class="col-sm-9">
								<input type="text" name="title" id="title" value="<?php if (isset($_GET['edit_id'])) {
																						echo $row['title'];
																					} ?>" class="form-control" required>
							</div>
						</div>



						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Image :- </label>
							<div class="col-sm-9">
								<div class="fileupload_block">
									<input type="file" name="image" id="fileupload" onchange="setImage(this.value);">
									<input type="hidden" name="browse_image" id="browse_image" class="form-control">

									<?php if (isset($_GET['edit_id']) and $row['image'] != "") { ?><img type="image" src="images/location/<?php echo $row['image']; ?>" alt="product image" style="height: 102px;width:auto;margin-bottom:10px;" />
									<?php } else { ?>
										<img type="image" style="height: 102px;width:auto;margin-bottom:10px;" src="assets/images/add-image.png" alt="product image" />
									<?php } ?>
									<input type="text" name="alt_tag" id="alt_tag" placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if (isset($_GET['edit_id'])) {
																																													echo $row['alt_tag'];
																																												} ?>" class="form-control" />
								</div>
							</div>
						</div>
								<div class="form-group row">
							<label class="col-sm-3 col-form-label">Icon :- </label>
							<div class="col-sm-9">
								<div class="fileupload_block">
									<input type="file" name="icon" id="fileupload" onchange="setImage(this.value);">
									<input type="hidden" name="browse_image" id="browse_image" class="form-control">

									<?php if (isset($_GET['edit_id']) and $row['icon'] != "") { ?><img type="image" src="images/location/<?php echo $row['icon']; ?>" alt="product image" style="height: 102px;width:auto;margin-bottom:10px;" />
									<?php } else { ?>
										<img type="image" style="height: 102px;width:auto;margin-bottom:10px;" src="assets/images/add-image.png" alt="product image" />
									<?php } ?>
									<input type="text" name="alt_tag" id="alt_tag" placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if (isset($_GET['edit_id'])) {
																																													echo $row['alt_tag'];
																																												} ?>" class="form-control" />
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Day/Night :- <br><span>(eg. 5 Days 4 Nights)</span></label>
							<div class="col-sm-9">
								<input type="text" name="day_night" id="day_night" value="<?php if (isset($_GET['edit_id'])) {
																								echo $row['day_night'];
																							} ?>" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Adults :- <br><span></span></label>
							<div class="col-sm-9">
								<input type="text" name="adults" id="adults" value="<?php if (isset($_GET['edit_id'])) {
																						echo $row['adults'];
																					} ?>" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Price :- <br><span></span></label>
							<div class="col-sm-9">
								<input type="text" name="price" id="price" value="<?php if (isset($_GET['edit_id'])) {
																						echo $row['price'];
																					} ?>" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">From Date :- <br><span></span></label>
							<div class="col-sm-9">
								<input type="date" name="from_date" id="from date" value="<?php if (isset($_GET['edit_id'])) {
																								echo $row['from_date'];
																							} ?>" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">To Date :- <br><span></span></label>
							<div class="col-sm-9">
								<input type="date" name="to_date" id="price" value="<?php if (isset($_GET['edit_id'])) {
																						echo $row['to_date'];
																					} ?>" class="form-control">
							</div>
						</div>
							<div class="form-group row">
							<label class="col-sm-3 col-form-label">Flaticon :-</label>
							<div class="col-sm-9">
								<input type="text" name="flaticon" id="flaticon" value="<?php if (isset($_GET['edit_id'])) {
																						echo $row['flaticon'];
																					} ?>" class="form-control" required>
							</div>
						</div>


						<div class="form-group row">
							<div class="col-md-9 col-md-offset-3">
								<button type="submit" name="submit" class="btn btn-primary">Save</button>
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