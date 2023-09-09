<!DOCTYPE html>
<html lang="en">

<?php 
include("admin/includes/connection.php");
include("admin/includes/function.php");
include_once "head.php";
?>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    <!-- =========================
        Header
    =========================== -->
   <?php include "header.php"; ?>
    <!-- /.Header -->

    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout5 bg-overlay">
      <div class="bg-img"><img src="admin/images/pageBanner/<?php echo PAGE_BANNER_IMAGE ?>" alt="<?php echo PAGE_BANNER_ALT_TAG ?>"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading">Blogs</h1>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
              </ol>
            </nav>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
      Blog Grid
    ========================= -->
    <section class="blog-grid">
      <div class="container">
        <div class="row">
          <?php 
          $qry="SELECT * FROM tbl_blog order by position_order desc";               
                        $result=mysqli_query($mysqli,$qry); 
                        while($row=mysqli_fetch_array($result))
                        {
          ?>
           <!-- Post Item #1 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="post-item">
              <div class="post__img">
                <a href="<?php echo $path;?>blogs/<?php echo $row['page_name'];?>">
                  <img src="admin/images/blog/<?php echo $row['image'] ?>" alt="post image" loading="lazy">
                </a>
              </div><!-- /.post__img -->
              <div class="post__body">
                <!--<div class="post__meta-cat">-->
                <!--  <a href="#">Mental Health</a>-->
                <!--</div>-->
                <div class="post__meta d-flex" style="margin-top:47px">
                  <span class="post__meta-date"><?php echo convertDateFormat($row['create_date']) ?></span>
                  <a class="post__meta-author" href="#"><?php echo $row['credit_name']; ?></a>
                </div>
                <h4 class="post__title"><a href="<?php echo $path;?>blogs/<?php echo $row['page_name'];?>"><?php echo $row['title']; ?></a></h4>

                <p class="post__desc"><?php echo $row['sort_desc']; ?>
                </p>
                <a href="<?php echo $path;?>blogs/<?php echo $row['page_name'];?>" class="btn btn__secondary btn__link btn__rounded">
                  <span>Read More</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div><!-- /.post__body -->
            </div><!-- /.post-item -->
          </div>
          <?php }?>
         
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.blog Grid -->

    <!-- ========================
      Footer
    ========================== -->
     <?php include "footer.php"; ?>
  </div><!-- /.wrapper -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
</body>



</html>