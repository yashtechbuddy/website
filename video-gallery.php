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
    <?php include "header.php" ?>
    <!-- /.Header -->

    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout5 bg-overlay">
      <div class="bg-img"><img src="admin/images/pageBanner/<?php echo PAGE_BANNER_IMAGE ?>" alt="<?php echo PAGE_BANNER_ALT_TAG ?>"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading">Our Video Gallery</h1>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!--<li class="breadcrumb-item"><a href="about-us.php">About</a></li>-->
                <li class="breadcrumb-item active" aria-current="page">Our Video Gallery</li>
              </ol>
            </nav>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->
   
<section class="page-content">
    <div class="container"style="margin-top: 30px;">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div align="center" class="portfolio_menu tabs">
                    <ul class="row list-unstyled justify-content-center">
                        <li>
                    <a class="btn filter-button" data-filter="all">All</a></li>
                        <?php
                          $categorystmt = "SELECT * from tbl_gallery_category order by position_order";
                          $categorys = mysqli_query($mysqli,$categorystmt);
                          while ($category = mysqli_fetch_assoc($categorys)) {
                              
                        ?>
                            <li> <a class="btn  filter-button" data-filter="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></a></li>
                                        
                        <?php }?>
                                      
                    </ul>
                </div>
            </div>
                 <?php
                          $videostmt = "SELECT * from tbl_gallery WHERE file_type='Video'";
                          $videos = mysqli_query($mysqli,$videostmt);
                          while ($video = mysqli_fetch_assoc($videos)) {
                                $data = $video['video_link'];
                                $final = str_replace('watch?v=', 'embed/', $data);
                        ?>
                <div class="gallery_product photo col-lg-4 col-md-6 col-sm-3 col-xs-4 filter <?php echo $video['category_id']; ?> html5lightbox popup-video" >
                    
                   <iframe width="100%" height="315" src="<?php echo $final ?>" class="popup-video" 
                   title="YouTube video player" frameborder="0" 
                   allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                   allowfullscreen></iframe>
                </div>
           
                <?php 
                          }
                ?>
    
            
      </div>
    </div>
</section>
<style>

.gallery-title
{
    font-size: 36px;
    color: #75a2c5;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.gallery{
    
}
.filter-button
{
    font-size: 12px;
    border: 1px solid #75a2c5;
    border-radius: 10px;
    text-align: center;
    color: #75a2c5;
    /*margin-bottom: 30px;*/
    margin-left: 20px;
    display:inline;
    padding:5px;

}
.filter-button:hover
{   
    transform: scale(1.1);
    /*font-size: 12.5px;*/
    border: 1px solid #75a2c5;
    border-radius:  10px;
    text-align: center;
    color: white;
    background-color: #2e1d6b;
    display:inline;
    padding:5px;

}
.btn-default:active .filter-button:active
{
    background-color: #75a2c5;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}
.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 0px;
}
.photo {
/*! width: 443px; */
  height: 332px;
  overflow: hidden;
  padding:10px;
}

img {
  transition: transform 0.25s;
}

.gallery_product img {
  /*border-radius: 17px;*/
    width: 367px;
    height: 322px;
}
.gallery_product:hover img {
  transform: scale(0.9);
  /*border-radius: 20px;*/
   /*height: 332px;*/
  /*overflow: hidden;*/
  /*padding:10px;*/
}

.tabs li {
   margin:4px;
}

</style>
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