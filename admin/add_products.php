<?php
include("includes/header.php");
require("includes/function.php");
require("language/language.php");

$cat_qry = "SELECT * FROM tbl_product_category ORDER BY title";
$cat_result = mysqli_query($mysqli, $cat_qry);

//Add
if (isset($_POST['submit']) and isset($_GET['add'])) {
	/*CREATE SINGLE PAGE FILE*/
	$text = strtolower($_POST['title']);
	$filename = strtolower($_POST['page_name']);

	$content = "<?php include_once('../package-detail.php'); ?>";
	$fh = fopen("../package/" . $filename, "w");
	fwrite($fh, $content);
	fclose($fh);

	//CHECK DUPLICATION
	$qry1 = "SELECT * FROM tbl_products";
	$result1 = mysqli_query($mysqli, $qry1);

	while ($row1 = mysqli_fetch_array($result1)) {
		if ($row1['page_name'] == $filename) {
			$_SESSION['errormsg'] = "10";
			header("Location:manage_products.php");
			exit;
		}
	}

	/*START META TAG INSERT */
	include_once('seo_add_form.php');
	/*END META TAG INSERT */


	/*COUNT LAST INSERTED POSITION NO */
	$qry_order = "SELECT * FROM tbl_products order by position_order ASC";
	$result_order = mysqli_query($mysqli, $qry_order);
	$position_order = mysqli_num_rows($result_order) + 1;
	$image = "";
	if ($_FILES['image']['name'] != "") {
		$image = $_POST['browse_image'];
		$tpath1 = 'images/product/' . $image;
		move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
	}




	$data = array(
		'cat_id'  =>  $_POST['cat_id'],
		'title'  =>  $_POST['title'],
		'page_name'  =>  $filename,
		'sort_desc'  => $_POST['sort_desc'],
		'image' => $image,
		'alt_tag'  =>  $_POST['alt_tag'],
		'long_desc'  => addslashes($_POST['long_desc']),
		'specification'  => addslashes($_POST['specification']),
		'meta_tag_id' => $meta_row1['id'],
		'position_order' => $position_order
	);

	$qry = Insert('tbl_products', $data);

	$_SESSION['msg'] = "10";
	header("Location:manage_products.php");
	exit;
}

//Fetch selected detail
if (isset($_GET['edit_id'])) {
	$qry = "SELECT * FROM tbl_products where id='" . $_GET['edit_id'] . "'";
	$result = mysqli_query($mysqli, $qry);
	$row = mysqli_fetch_assoc($result);

	$meta_qry = "SELECT * FROM tbl_meta_tag where id='" . $row['meta_tag_id'] . "'";
	$meta_result = mysqli_query($mysqli, $meta_qry);
	$meta_row = mysqli_fetch_assoc($meta_result);
}

//Edit
if (isset($_POST['submit']) and isset($_POST['edit_id'])) {
	/*START META TAG UPDATE */
	include_once('seo_edit_form.php');
	/*END META TAG UPDATE */

	$image = "";
	if ($_FILES['image']['name'] != "") {
		$img_res = mysqli_query($mysqli, 'SELECT * FROM tbl_products WHERE id=' . $_GET['edit_id'] . '');
		$img_res_row = mysqli_fetch_assoc($img_res);

		if ($img_res_row['image'] != "") {
			unlink('images/product/' . $img_res_row['image']);
		}

		//$image="Products-".rand(0,99999)."_".$_FILES['image']['name'];
		$image = $_POST['browse_image'];
		$tpath1 = 'images/product/' . $image;
		move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);

		$data = array(
			'title'  =>  $_POST['title'],
			'sort_desc'  => $_POST['sort_desc'],
			'long_desc'  => addslashes($_POST['long_desc']),
			'specification'  => addslashes($_POST['specification']),
			'image' => $image,
			'alt_tag'  =>  $_POST['alt_tag'],
			'cat_id'  =>  $_POST['cat_id']
		);
		$category_edit = Update('tbl_products', $data, "WHERE id = '" . $_POST['edit_id'] . "'");
	} else {
		$data = array(
			'title'  =>  addslashes($_POST['title']),
			'sort_desc'  => $_POST['sort_desc'],
			'long_desc'  => addslashes($_POST['long_desc']),
			'specification'  => addslashes($_POST['specification']),
			'alt_tag'  =>  $_POST['alt_tag'],
			'cat_id'  =>  $_POST['cat_id']
		);
		$category_edit = Update('tbl_products', $data, "WHERE id = '" . $_POST['edit_id'] . "'");
	}
	$_SESSION['msg'] = "11";
	header("Location:manage_products.php");
	exit;
}

function get_cat($id)
{

	$cat_qry = "SELECT * FROM tbl_product_category where id='" . $id . "'";
	echo $cat_qry;
	$cat_result = mysqli_query($mysqli, $cat_qry);
	$cat_row = mysqli_fetch_array($cat_result);

	return $cat_row['title'];
}
?>
<div class="breadcrumbbar">
	<div class="row align-items-center">
		<div class="col-md-8 col-lg-8">
			<h2 class="page-title"><?php if (isset($_GET['edit_id'])) { ?>Edit<?php } else { ?>Add<?php } ?> Products</h2>
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

						<script type="text/javascript">
							function OnCat(cat) {
								var str = cat.value;

								var resOld = str.replace(/[&\/\\#,+()$~%.'":*?!@_^`|\[\];=<>{}]/g, ''); //replace special charactor with     blanck space
								var res = resOld.toLowerCase();

								var text = " | ";
								document.getElementById("title").value = cat.value + text;

							}

							function OnTitle(txt) {
								var str = txt.value;

								var resOld = str.replace(/[&\/\\#,+()$~%.'":*?!@_^`|\[\];=<>{}]/g, ''); //replace special charactor with     blanck space
								var res = resOld.toLowerCase();

								var text = " | Travelsaathi";
								document.getElementById("meta_title").value = txt.value + text; //create  meta Title
								
                                var url="package/";
								var res1 = res.split(" ").join("-"); //replace space with - sign	
								document.getElementById("page_name").value = res1 + ".php"; //create webpage name

								// 			var url="http://prestresssteel.com/products/";
								document.getElementById("meta_url").value = url+res1 + ".php"; //create  meta url

								document.getElementById("meta_canonical").value = res1 + ".php"; //create  meta canonical url
							}

							function OnWebpageName(txt) {
								var str = txt.value;

								var resOld = str.replace(/[&\/\\#,+()$~%'":*?!@_^`|\[\];=<>{}]/g, ''); //replace special charactor with     blanck space
								var res = resOld.toLowerCase();

								var res1 = res.split(" ").join("-");
                                    var url="package/";
								// 			var url="http://prestresssteel.com/products/";
								document.getElementById("meta_url").value = url+res1; //create  meta url

							}

							function OnDesc(txt) {
								var str = txt.value;
								document.getElementById("meta_desc").value = txt.value; //create  meta Description
							}

							function setImage(val) {
									var url1="admin/admin/images/product/";
								var url2 = "Product-" + Math.floor((Math.random() * 99999) + 1) + "_";

								var fileName = val.substr(val.lastIndexOf("\\") + 1, val.length); //get browse image name


								document.getElementById("browse_image").value = url2 + fileName; // add image name to text box


								document.getElementById("meta_image").value = url1+url2+fileName; // add image name to meta_image with comlete URl

							}

							function onWebPage() {
								if (document.getElementById("web_page").checked) {
									document.getElementById("page_name").readOnly = true;
								} else {
									document.getElementById("page_name").readOnly = false;
								}
							}
						</script>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Category :-</label>
							<div class="col-sm-9">
								<select name="cat_id" class="form-control" id="cat_id">
									<option value="">--Select Category--</option>
									<?php
									$cat_qry = "SELECT * FROM tbl_product_category ORDER BY position_order";
									$cat_result = mysqli_query($mysqli, $cat_qry);
									while ($cat_row = mysqli_fetch_array($cat_result)) {
									?>
										<option value="<?php echo $cat_row['id']; ?>" <?php
																						$a = $cat_row['id'];
																						if ($a == $row['cat_id']) {
																							echo "selected";
																						}
																						?>>
											<?php echo $cat_row['title']; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Title :-</label>
							<div class="col-sm-9">
								<input type="text" name="title" id="title" <?php if (isset($_GET['add'])) { ?>onkeyup="OnTitle(this);" <?php } ?> value="<?php if (isset($_GET['edit_id'])) {
																																							echo $row['title'];
																																						} ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Page Name :- <br> [ex- page-name.php]</label>
							<div class="col-sm-9">
								<input type="text" name="page_name" id="page_name" <?php if (isset($_GET['add'])) { ?>onkeyup="OnWebpageName(this);" <?php } ?> pattern="[a-z0-9._%+-]+\.php" title="Must contain have lowercase letter, use - as special charactor and ednding with .php extension" value="<?php if (isset($_GET['edit_id'])) {
																																																																												echo $row['page_name'];
																																																																											} ?>" class="form-control" required <?php if (isset($_GET['edit_id'])) {
																																																																																																			echo "readonly";
																																																																																																		} ?> readonly>
							</div>

							<?php if (isset($_GET['add'])) { ?>
								<div class="col-md-2">
									<input onclick="onWebPage();" type="checkbox" id="web_page" checked /> <label for="web_page"> Readonly Text</label>
								</div>
							<?php } ?>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Page Type :-</label>
							<div class="col-sm-9">
								<input type="text" name="page_type" id="page_type" value="<?php if (isset($_GET['add'])) { ?>products<?php } ?><?php echo $meta_row['page_type']; ?>" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Image :- </label>
							<div class="col-sm-9">
								<div class="fileupload_block">
									<input type="file" name="image" id="fileupload" onchange="setImage(this.value);">
									<input type="hidden" name="browse_image" id="browse_image" class="form-control">

									<?php if (isset($_GET['edit_id']) and $row['image'] != "") { ?><img type="image" src="images/product/<?php echo $row['image']; ?>" alt="product image" style="height: 102px;width:auto;margin-bottom:10px;" />
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
							<label class="col-sm-3 col-form-label">Description :-</label>
							<div class="col-sm-9">
								<div class="fileupload_block">
									<textarea name="long_desc" id="tinymce-example" class="tinymce-editor"><?php if (isset($_GET['edit_id'])) {
																												echo $row['long_desc'];
																											} ?></textarea>
								</div>
							</div>
						</div>

						<?php include_once('seo.php'); ?>

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