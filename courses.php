<!DOCTYPE html>
<html lang="en">

<?php 
include("admin/includes/connection.php");
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
            <h1 class="pagetitle__heading">Courses</h1>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Courses</li>
              </ol>
            </nav>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ========================
        Services Layout 2
    =========================== -->
    <section class="services-layout2 pt-130" style="padding-bottom:0px">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-60">
              <h3 class="heading__title" style="color:#29156e !important">Available Courses</h3>
              <p class="heading__desc">The Best Medical And General Practice Care!</p>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <!-- service item #1 -->
          <?php 
          $qry="SELECT * FROM tbl_courses order by position_order";               
                        $result=mysqli_query($mysqli,$qry); 
                        while($row=mysqli_fetch_array($result))
                        {
          ?>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__img">
                <img src="admin/images/courses/<?php echo $row['icon'] ?>" alt="img" loading="lazy">
              </div><!-- /.service__img -->
              <div class="service__content">
                <h4 class="service__title"><?php echo $row['title']; ?></h4>
                <p class="service__desc"><?php echo $row['sort_desc'] ?></p>
                <a href="<?php echo $path;?>courses/<?php echo $row['page_name'];?>" class="btn btn__secondary btn__outlined btn__rounded">
                  <span>Read More</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div><!-- /.service__content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <?php } ?>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.courses Layout 2 -->

    <!-- ======================
     Work Process 
    ========================= -->

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