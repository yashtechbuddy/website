<!DOCTYPE html>
<html lang="en">

<?php 
include("admin/includes/connection.php");
include("admin/includes/function.php");
include_once "head.php";
?>

<body>
    <style>
        .gallery.slick-slide {
        margin-right: 2px !important;
        }
    </style>
    <div class="wrapper">
        <!--<div class="preloader">-->
        <!--    <div class="loading"><span></span><span></span><span></span><span></span></div>-->
        <!--</div>-->
        <!-- /.preloader -->

        <!-- ========================= Header =========================== -->
        <?php include "header.php" ?>
        <!-- /.Header -->

        <!-- ============================
        Slider    ============================== -->
      <section class="slider">
            <div class="slick-carousel m-slides-0"
                data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700,"fade": true,"cssEase": "linear"}'>
                <?php 
                $bannerstmt = "SELECT * FROM tbl_banner";
                $banners = mysqli_query($mysqli,$bannerstmt);
                $result = mysqli_fetch_all($banners,MYSQLI_ASSOC);
                foreach($result as $banner){
                ?>
                <div class="slide-item align-v-h">
                    <div class="bg-img"><img src="admin/images/banner/<?php echo $banner['banner_image'];?>" alt="<?php echo $banner['alt_tag'];?>"></div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                                <div class="slide__content">
                                    <h2 class="slide__title"><?php echo $banner['banner_name'];?></h2>
                                    <p class="slide__desc"><?php echo $banner['banner_desc'];?></p>
                                    <ul class="features-list list-unstyled mb-0 d-flex flex-wrap">
                                        <!-- feature item #1 -->
                                        <!--<li class="feature-item">-->
                                        <!--    <div class="feature__icon">-->
                                        <!--        <i class="icon-heart"></i>-->
                                        <!--    </div>-->
                                        <!--    <h2 class="feature__title">Examination</h2>-->
                                        <!--</li>-->
                                        <!-- feature item #2 -->
                                        <!--<li class="feature-item">-->
                                        <!--    <div class="feature__icon">-->
                                        <!--        <i class="icon-medicine"></i>-->
                                        <!--    </div>-->
                                        <!--    <h2 class="feature__title">Prescription </h2>-->
                                        <!--</li>-->
                                        <!-- feature item #3 -->
                                        <!--<li class="feature-item">-->
                                        <!--    <div class="feature__icon">-->
                                        <!--        <i class="icon-heart2"></i>-->
                                        <!--    </div>-->
                                        <!--    <h2 class="feature__title">Cardiogram</h2>-->
                                        <!--</li>-->
                                        <!-- feature item #4 -->
                                        <!--<li class="feature-item">-->
                                        <!--    <div class="feature__icon">-->
                                        <!--        <i class="icon-blood-test"></i>-->
                                        <!--    </div>-->
                                        <!--    <h2 class="feature__title">Blood Pressure</h2>-->
                                        <!--</li>-->
                                    </ul><!-- /.features-list -->
                                </div><!-- /.slide-content -->
                            </div><!-- /.col-xl-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div><!-- /.slide-item -->
                <?php }?>
            </div><!-- /.carousel -->
        </section>
        <!-- /.slider -->

        <!-- ============================
        contact info
    ============================== -->
      <?php 
                             $home_extra ="SELECT * FROM tbl_extra_home";
                             $cards = mysqli_query($mysqli,$home_extra);
                             $card = mysqli_fetch_assoc($cards);
                            ?>
        <section class="contact-info py-0">
            <div class="container">
                <div class="row row-no-gutter boxes-wrapper">
                    <div class="col-sm-12 col-md-4">
                        <div class="contact-box d-flex">
                            <div class="contact__icon">
                                <i class="<?php echo $card['icon1']; ?>"></i>
                            </div><!-- /.contact__icon -->
                          
                            <div class="contact__content">
                                <h2 class="contact__title"><?php echo $card['field1']; ?></h2>
                                <p class="contact__desc"><?php echo $card['short_desc1']; ?></p>
                                <a href="tel:+91 <?php echo $card['phone_no']; ?>" class="phone__number">
                                    <i class="icon-phone"></i> <span>+91 <?php echo $card['phone_no']; ?></span>
                                </a>
                            </div><!-- /.contact__content -->
                        </div><!-- /.contact-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-sm-12 col-md-4">
                        <div class="contact-box d-flex">
                            <div class="contact__icon">
                                <i class="<?php echo $card['icon2']; ?>"></i>
                            </div><!-- /.contact__icon -->
                            <div class="contact__content">
                                <h2 class="contact__title"><?php echo $card['field2']; ?></h2>
                                <p class="contact__desc"><?php echo $card['short_desc2']; ?></p>
                                <a href="#" class="btn btn__white btn__outlined btn__rounded">
                                    <span>View Timetable</span><i class="icon-arrow-right"></i>
                                </a>
                            </div><!-- /.contact__content -->
                        </div><!-- /.contact-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-sm-12 col-md-4">
                        <div class="contact-box d-flex">
                            <div class="contact__icon">
                                <i class="<?php echo $card['icon3']; ?>"></i>
                            </div><!-- /.contact__icon -->
                            <div class="contact__content">
                                <h2 class="contact__title"><?php echo $card['field3']; ?></h2>
                                <ul class="time__list list-unstyled mb-0">
                                    <li><span>Monday - Friday</span><span><?php echo $card['mon-fri']; ?></span></li>
                                    <li><span>Saturday</span><span><?php echo $card['sat']; ?></span></li>
                                    <li><span>Sunday</span><span><?php echo $card['sun']; ?></span></li>
                                </ul>
                            </div><!-- /.contact__content -->
                        </div><!-- /.contact-box -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact-info -->

        <!-- ========================
      About Layout 2
    =========================== -->
      <section class="about-layout1 pb-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <?php 
                $aboutustmt = "SELECT * FROM `tbl_about_us`";
                $aboutus = mysqli_query($mysqli,$aboutustmt);
                $aboutus = mysqli_fetch_array($aboutus);
            ?>
            <div class="heading-layout2">
              <h3 class="heading__title mb-40" style="color:#29156e !important;"><?php echo $aboutus['title']; ?></h3>
            </div><!-- /heading -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="about__Text">
              <p class="mb-30"><?php echo $aboutus['small_title']; ?>
              </p>
              <p class="mb-30"><?php echo $aboutus['description']; ?></p>
              <div class="d-flex align-items-center mb-30">
                <a href="about-us.php" class="btn btn__secondary btn__rounded  mr-30">
                 Read More</a>
               
              </div>
            </div>
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="video-banner">
              <img src="admin/images/about-us/<?php echo $aboutus['image']; ?>" alt="about">
              <!--<a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">-->
              <!--  <div class="video__player">-->
              <!--    <i class="fa fa-play"></i>-->
              <!--  </div>-->
              <!--</a>-->
            </div><!-- /.video-banner -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>
    
        <!-- /.About Layout 2 -->

   <!-- ========================
     Banner Layout 1
    =========================== -->
    <?php 
    $whychooseustmt = "SELECT * FROM `tbl_chooseus`";
    $whychooseusr = mysqli_query($mysqli, $whychooseustmt);
    $whychooseus = mysqli_fetch_array($whychooseusr);
    ?>
    <section class="banner-layout1 py-0" style="margin-top:80px; background-color: #2e1d6b;">
      <div class="bg-img"><img src="" alt=""></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="banner-text">
              <div class="heading-layout2 heading-light text-white">
                <h2 class="heading__title"><?php echo  $whychooseus['name']; ?></h2>
                <p class="heading__desc mb-40"><?php echo  $whychooseus['long_desc'];  ?>
                </p>
              </div>
              <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled mb-50">
                <li><?php echo  $whychooseus['b1'];  ?></li>
                <li><?php echo  $whychooseus['b2'];  ?></li>
                <li><?php echo  $whychooseus['b3'];  ?></li>
                <li><?php echo  $whychooseus['b4'];  ?></li>
                <li><?php echo  $whychooseus['b5'];  ?></li>
              </ul>
              <div class="d-flex flex-wrap">
                <a href="courses.php" class="btn btn__yellow btn__rounded mr-30">
                  <span>Find Your Course</span> <i class="icon-arrow-right"></i>
                </a>
                <a href="contact-us.php" class="btn btn__white btn__outlined btn__rounded">
                  Contact us
                </a>
              </div>
            </div><!-- /.banner-text -->
            <div class="fancybox-layout3">
              <!-- fancybox item #1 -->
              <div class="fancybox-item d-flex">
                <div class="fancybox__icon">
                  <i class="<?php echo  $whychooseus['icon1'];  ?>"></i>
                </div><!-- /.fancybox__icon -->
                <div class="fancybox__content">
                  <h4 class="fancybox__title mb-0"><?php echo  $whychooseus['title1'];  ?></h4>
                </div><!-- /.fancybox-content -->
              </div><!-- /.fancybox-item -->
              <!-- fancybox item #2 -->
              <div class="fancybox-item d-flex">
                <div class="fancybox__icon">
                  <i class="<?php echo  $whychooseus['icon2'];  ?>"></i>
                </div><!-- /.fancybox__icon -->
                <div class="fancybox__content">
                  <h4 class="fancybox__title mb-0"><?php echo  $whychooseus['title2'];  ?></h4>
                </div><!-- /.fancybox-content -->
              </div><!-- /.fancybox-item -->
              <!-- fancybox item #3 -->
              <div class="fancybox-item d-flex">
                <div class="fancybox__icon">
                  <i class="<?php echo  $whychooseus['icon3'];  ?>"></i>
                </div><!-- /.fancybox__icon -->
                <div class="fancybox__content">
                  <h4 class="fancybox__title mb-0"><?php echo  $whychooseus['title3'];  ?></h4>
                </div><!-- /.fancybox-content -->
              </div><!-- /.fancybox-item -->
            </div><!-- /.fancybox-layout3 -->
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6 banner-img">
            <div class="bg-img">
              <img src="admin/images/chooseus/<?php echo  $whychooseus['image']; ?>" alt="<?php echo  $whychooseus['alt_tag']; ?>">
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Banner Layout 1 -->
    
       <!-- ========================
        courses Layout 2
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
          <!-- service item #1 -->
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
             data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
          <?php 
          $qry="SELECT * FROM tbl_courses order by position_order ";               
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
                <h4 class="service__title">
                    <?php  
                    
                    $text = $row['title'] ;
                     $words = explode(' ', $text);
                    if (count($words) <= 3) {
                        echo $text;
                    } else {
                        $truncatedText = implode(' ', array_slice($words, 0, 3)) . "...";
                        echo $truncatedText;
                    }
                    
                    ?>
                </h4>
                <p class="service__desc">
                    <?php  
                    
                    $text = $row['sort_desc'] ;
                     $words = explode(' ', $text);
                    if (count($words) <= 12) {
                        echo $text;
                    } else {
                        $truncatedText = implode(' ', array_slice($words, 0, 12)) . "...";
                        echo $truncatedText;
                    }
                    
                    ?>
                    </p>
                <a href="<?php echo $path;?>courses/<?php echo $row['page_name'];?>" class="btn btn__secondary btn__outlined btn__rounded">
                  <span>Read More</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div><!-- /.service__content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <?php } ?>
          </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.courses Layout 2 -->
         <!-- ======================
    Features Layout 2
    ========================= -->
        <section class="features-layout2 pt-130 bg-overlay bg-overlay-primary">
            <div class="bg-img"><img src="assets/images/backgrounds/2.jpg" alt="background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12  text-center">
                        <div class="heading__layout2 mb-60">
                            <h3 class="heading__title color-white">Facility We Offer</h3>
                        </div>
                    </div><!-- /col-lg-5 -->
                </div><!-- /.row -->
                <div class="row">
                    <!-- Feature item #1 -->
                    <?php 
                            $facilitystmt = "SELECT * FROM tbl_facility ORDER BY position_order ASC";
                            $facilities = mysqli_query($mysqli,$facilitystmt);
                            
                        while($row=mysqli_fetch_array($facilities))
                        {
                    ?>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <!--<div class="feature__img">-->
                            <!--    <img src="admin/images/facility/<?php echo $row['facility_image']; ?>" alt="<?php echo $row['alt_tag']; ?>" loading="lazy">-->
                            <!--</div>-->
                            <!-- /.feature__img -->
                            <div class="feature__content">
                                <div class="feature__icon">
                                    <i class="icon-<?php echo $row['facility_icon']; ?>"></i>
                                </div>
                                <h4 class="feature__title"><?php echo $row['facility_name']; ?></h4>
                            </div><!-- /.feature__content -->
                            <a href="#" class="btn__link">
                                <i class="icon-arrow-right icon-outlined"></i>
                            </a>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Features Layout 2 -->
         <!-- ======================
      Blog Grid
    ========================= -->
    <section class="blog-grid pb-50" style="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="heading text-center mb-40">
                            <h3 class="heading__title" style="color:#29156e !important">Recent Blogs</h3>
                            <p class="heading__desc">Resource</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-12">
                 <div class="slick-carousel"
                            data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                  <?php 
                  $qry="SELECT * FROM tbl_blog order by id desc";               
                                $result=mysqli_query($mysqli,$qry); 
                                while($row=mysqli_fetch_array($result))
                                {
                  ?>
                   
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="post-item">
                      <div class="post__img">
                        <a href="<?php echo $path;?>blogs/<?php echo $row['page_name'];?>">
                          <img src="admin/images/blog/<?php echo $row['image'] ?>" alt="post image" >
                        </a>
                      </div>
                      <div class="post__body">
                        <div class="post__meta d-flex" style="margin-top:47px">
                          <span class="post__meta-date"><?php echo convertDateFormat($row['create_date']) ?></span>
                          <a class="post__meta-author" href="<?php echo $path;?>blogs/<?php echo $row['page_name'];?>"><?php echo $row['credit_name']; ?></a>
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
                  </div>
                </div>
            </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog Grid -->
        <!-- ========================
        Services Layout 1
    =========================== -->

    <!-- department  -->
<!-- /.Services Layout 1 -->

        <!-- ========================
        Notses
    =========================== -->
       <!-- /.notes -->

        <!-- ======================
      Team
    ========================= -->

        <!-- ======================
     Work Process 
    ========================= -->

       <!-- ========================= 
      teacher's message layout 1
      =========================  -->
       <!--<section class="testimonials-layout1 pt-130 pb-80">-->
       <!--     <div class="container">-->
       <!--         <div class="testimonials-wrapper">-->
       <!--             <div class="row">-->
       <!--                 <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-5">-->
       <!--                     <div class="heading-layout2">-->
       <!--                         <h3 class="heading__title">Thoughts Of Teachers</h3>-->
       <!--                     </div>-->
       <!--                 </div>-->
       <!--                 <div class="col-sm-12 col-md-12 col-lg-5">-->
       <!--                     <div class="slider-nav mb-60">-->
                                     <?php 
                            // $testimonialstmt = "SELECT * FROM `tbl_testimonial`";
                            // $testimonials = mysqli_query($mysqli,$testimonialstmt);
                            
                        // while($testimonial=mysqli_fetch_array($testimonials))
                        // {
                    ?>
                                <!--<div class="testimonial__meta">-->
                                <!--    <div class="testimonial__thmb">-->
                                <!--        <img src="admin/images/testimonial/<?php echo $testimonial['image']; ?>" alt="author thumb">-->
                                <!--    </div>-->
                                <!--    <div>-->
                                <!--        <h4 class="testimonial__meta-title"><?php echo $testimonial['name']; ?></h4>-->
                                <!--        <p class="testimonial__meta-desc"><?php echo $testimonial['design']; ?></p>-->
                                <!--    </div>-->
                                <!--</div>-->
                           <?php 
                        // }
                           ?>     
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-sm-12 col-md-12 col-lg-7">-->
                        <!--    <div class="slider-with-navs">-->
                             
                    <?php 
                        //      $testimonialstmt = "SELECT * FROM `tbl_testimonial`";
                        //     $testimonials = mysqli_query($mysqli,$testimonialstmt);
                        // while($testimonial=mysqli_fetch_array($testimonials))
                        // {
                    ?>
                                <!--<div class="testimonial-item">-->
                                <!--    <h3 class="testimonial__title">“<?php echo $testimonial['long_desc']; ?>”-->
                                <!--    </h3>-->
                                <!--</div>-->
                                
                            <?php 
                        // }
                            ?>    
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->


        <!-- ========================
       gallery
      =========================== -->
      <div class="container pt-50">
          <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="heading text-center mb-40">
                            <h3 class="heading__title" style="color:#29156e !important;">Gallery</h3>
                            <p class="heading__desc">Events & activites </p>
                        </div><!-- /.heading -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
      </div>
        <section class="gallery pt-0" style="padding-bottom: 40px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slick-carousel"
                            data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                            
                            <?php 
                            $imagestmt = "SELECT * FROM tbl_gallery where file_type = 'Image' ";
                            $images = mysqli_query($mysqli,$imagestmt);
                            
                            while($image = mysqli_fetch_assoc($images)){
                            ?>
                            <a class="popup-gallery-item" href="admin/images/gallery/<?php echo $image['gallery_image']; ?>" style="margin-right:2px !important">
                                <img src="admin/images/gallery/<?php echo $image['gallery_image']; ?>" alt="gallery img">
                            </a>
                            <?php }?>
                        </div><!-- /.gallery-images-wrapper -->
                    </div><!-- /.col-xl-5 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.gallery 2 -->
        <div class="container pb-20">
            <div class="d-flex align-items-center justify-content-center mb-30">
                 <a href="image-gallery.php" class="btn btn__secondary btn__rounded  mr-30">
                    View More
                </a>
            </div>
        </div>

        <!-- ==========================
        contact layout 3
    =========================== -->
       

        <!-- ========================
      Footer
    ========================== -->
    <?php include "./footer.php"; ?>    
    <!-- /.Footer -->

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>



</html>