<!DOCTYPE html>
<html lang="en">

<?php 

    include("admin/includes/connection.php");
    include("admin/includes/function.php");
    include_once "head.php";
    
    $relative_path = $_SERVER['PHP_SELF'];
    $current_page= basename($relative_path);
    $blog_qry="SELECT * FROM tbl_blog where page_name='".$current_page."'";
    $blog_result=mysqli_query($mysqli,$blog_qry); 
    $blog_row=mysqli_fetch_array($blog_result);
    $blog_id = $blog_row['id'];
    

        if(mysqli_num_rows($blog_result)< 0){
            header("Location:'.$current_page.'");
        }
		
		$last_count=$blog_row['no_of_click']+1;
	
		$data = array(
		'no_of_click' => $last_count
		);

		$edit=Update('tbl_blog', $data, "WHERE id = '".$blog_row['id']."'");

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
    <section class="page-title pt-30 pb-30 text-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo $path ?>index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $path ?>blogs.php">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $blog_row['title']; ?></li>
              </ol>
            </nav>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
      Blog Single
    ========================= -->
    <section class="blog blog-single pt-0 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="post-item mb-0">
              <div class="post__img">
                <a href="#">
                  <img src="<?php echo $path ?>assets/images/blog/single/1.jpg" alt="post image" loading="lazy">
                </a>
              </div><!-- /.post-img -->
              <div class="post__body pb-0">
                
                <div class="post__meta d-flex align-items-center mb-20" style="margin-top:47px">
                  <span class="post__meta-date"><?php echo convertDateFormat($blog_row['create_date']);  ?></span>
                  <a class="post__meta-author" href="#"><?php echo $blog_row['credit_name']; ?></a>
                  <a class="post__meta-comments" href="#"><?php echo $blog_row['no_of_click']; ?> Views</a>
                </div><!-- /.blog-meta -->
                <h1 class="post__title mb-30">
                  <?php echo $blog_row['title']; ?>
                </h1>
                <div class="post__desc">
                    <p>
                        <?php echo $blog_row['long_desc']; ?>
                    </p>
                </div><!-- /.blog-desc -->
              </div>
            </div><!-- /.post-item -->
          </div><!-- /.col-lg-8 -->
          <div class="col-sm-12 col-md-12 col-lg-4">
            <aside class="sidebar">
              <!--<div class="widget widget-search">-->
              <!--  <h5 class="widget__title">Search</h5>-->
              <!--  <div class="widget__content">-->
              <!--    <form class="widget__form-search">-->
              <!--      <input type="text" class="form-control" placeholder="Search...">-->
              <!--      <button class="btn" type="submit"><i class="icon-search"></i></button>-->
              <!--    </form>-->
              <!--  </div><!-- /.widget-content -->
              <!--</div><!-- /.widget-search -->
              
              <div class="widget widget-posts">
                <h5 class="widget__title">Recent Posts</h5>
                <div class="widget__content">
                  <!-- post item #1 -->
                <?php $blogliststmt = "SELECT * FROM tbl_blog where page_name<>'".$current_page."' ORDER BY id desc"; 
                  $bloglist = mysqli_query($mysqli,$blogliststmt); 
                        while($blog =mysqli_fetch_array($bloglist)){ ?>
                        
                  <div class="widget-post-item d-flex align-items-center">
                    <div class="widget-post__img">
                      <a href="#"><img src="<?php echo $path ?>admin/images/blog/<?php echo $blog['image'];  ?>" alt="thumb"></a>
                    </div><!-- /.widget-post-img -->
                    <div class="widget-post__content">
                      <span class="widget-post__date"><?php echo convertDateFormat($blog['create_date']);  ?></span>
                      <h4 class="widget-post__title"><a href="#"><?php echo $blog['title'] ?></a>
                      </h4>
                    </div><!-- /.widget-post-content -->
                  </div><!-- /.widget-post-item -->
                  <?php } ?>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-posts -->
            </aside><!-- /.sidebar -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.blog Single -->

    <!-- ========================
      Footer
    ========================== -->
     <?php include "footer.php"; ?>
  </div><!-- /.wrapper -->

  <script src="<?php echo $path ?>assets/js/jquery-3.5.1.min.js"></script>
  <script src="<?php echo $path ?>assets/js/plugins.js"></script>
  <script src="<?php echo $path ?>assets/js/main.js"></script>
</body>



</html>