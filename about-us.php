<!DOCTYPE html>
<html lang="en">



<?php 
include("admin/includes/connection.php");
include("admin/includes/function.php");
include_once "head.php";
?>

<body>
    <div class="wrapper">
        <!--<div class="preloader">-->
        <!--    <div class="loading"><span></span><span></span><span></span><span></span></div>-->
        <!--</div>-->
        <!-- /.preloader -->

        <!-- =========================
        Header
    =========================== -->
    <?php include "header.php"; ?>    
    <!-- /.Header -->

      <!-- ========================
       page title 
    =========================== -->
    <?php 
                $aboutustmt = "SELECT * FROM `tbl_about_us`";
                $aboutus = mysqli_query($mysqli,$aboutustmt);
                $aboutus = mysqli_fetch_array($aboutus);
    ?>
    <section class="page-title page-title-layout5 bg-overlay">
      <div class="bg-img"><img src="<?php echo $path;?>admin/images/pageBanner/<?php echo PAGE_BANNER_IMAGE ?>" alt="<?php echo PAGE_BANNER_ALT_TAG ?>"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading">About Us</h1>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
              </ol>
            </nav>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

        <!-- ========================
      About Layout 1
    =========================== -->
        <section class="about-layout1 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="heading-layout2">
                            <h3 class="heading__title mb-40" style="color:#29156e !important;" ><?php echo $aboutus['title']; ?>
                            </h3>
                        </div><!-- /heading -->
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="about__Text">
                            <p class="mb-30"><?php echo $aboutus['small_title']; ?>
                            </p>
                            <p class="mb-30"><?php echo $aboutus['description']; ?></p></p>
                        </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="video-banner">
                            <img src="assets/images/about/1.jpg" alt="about">
                            <!--<a class="video__btn video__btn-white popup-video"-->
                            <!--    href="https://www.youtube.com/watch?v=nrJtHemSPW4">-->
                            <!--    <div class="video__player">-->
                            <!--        <i class="fa fa-play"></i>-->
                            <!--    </div>-->
                            <!--</a>-->
                        </div><!-- /.video-banner -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.About Layout 1 -->
 
        <!-- ======================
    Features Layout 1
    ========================= -->
        <section class="features-layout1 pt-130 pb-50 mt--90">
            <div class="bg-img"><img src="assets/images/backgrounds/1.jpg" alt="background"></div>
            <div class="container">
                <div class="row mb-40">
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="heading__layout2">
                            <h3 class="heading__title"></h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1">
                        <p class="heading__desc font-weight-bold"
                        </p>
                    </div>
                </div>
                <div class="row">
                    <!-- Feature item #1 -->
                    <div class="col-sm-6 col-md-6 col-lg-4" style="margin-top:5px">
                        <div class="process-item">
                                    <!--<span class="process__number">01</span>-->
                                    <div class="process__icon">
                                        <i class="icon-health-report"></i>
                                    </div>
                                    <h4 class="process__title"><?php echo $aboutus['mission_title']; ?></h4>
                                    <p class="process__desc"><?php echo $aboutus['mission_description']; ?></p>
                                    <!--<a href="#" class="btn btn__secondary btn__link">-->
                                    <!--    <span>Doctors’ Timetable</span>-->
                                    <!--    <i class="icon-arrow-right"></i>-->
                                    <!--</a>-->
                                </div><!-- /.feature-item -->
                    </div><!-- /.col-lg-3 -->
                    <!-- Feature item #2 -->
                    <div class="col-sm-6 col-md-6 col-lg-4" style="margin-top:5px">
                                                 <div class="process-item">
                                    <!--<span class="process__number">01</span>-->
                                    <div class="process__icon">
                                        <i class="icon-health-report"></i>
                                    </div>
                                    <h4 class="process__title"><?php echo $aboutus['vission_title']; ?></h4>
                                    <p class="process__desc"> <?php echo $aboutus['vission_description']; ?></p>
                                    <!--<a href="#" class="btn btn__secondary btn__link">-->
                                    <!--    <span>Doctors’ Timetable</span>-->
                                    <!--    <i class="icon-arrow-right"></i>-->
                                    <!--</a>-->
                                </div><!-- /.feature-item -->
                    </div><!-- /.col-lg-3 -->
                    <!-- Feature item #3 -->
                    <div class="col-sm-6 col-md-6 col-lg-4" style="margin-top:5px">
                                               <div class="process-item">
                                    <!--<span class="process__number">01</span>-->
                                    <div class="process__icon">
                                        <i class="icon-health-report"></i>
                                    </div>
                                    <h4 class="process__title"><?php echo $aboutus['goals_title']; ?></h4>
                                    <p class="process__desc"><?php echo $aboutus['goals_description']; ?>.</p>
                                    <!--<a href="#" class="btn btn__secondary btn__link">-->
                                    <!--    <span>Doctors’ Timetable</span>-->
                                    <!--    <i class="icon-arrow-right"></i>-->
                                    <!--</a>-->
                                </div><!-- /.feature-item -->
                    </div><!-- /.col-lg-3 -->
                    <!-- Feature item #4 -->
                    <!-- Feature item #5 -->
                    <!-- Feature item #6 -->
                    <!-- Feature item #7 -->
                    <!-- Feature item #8 -->
                    
                    </div><!-- /.col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Features Layout 1 -->
        <!-- ======================
    Features Layout 2
    ========================= -->
    
     <!-- ======================
      Certificates
    ========================= -->
        <section class="team-layout2 pb-80 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="heading text-center mb-40">
                            <h3 class="heading__title" style="color:#29156e !important;">Certificates</h3>
                            <p class="heading__desc">Our administration and support staff all have exceptional people
                                skills and
                                trained to assist you with all enquiries.
                            </p>
                        </div><!-- /.heading -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
              
                <div class="row">
                    <div class="col-12">
                        <div class="slick-carousel"
                            data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                            
                              <?php
                                    $certificatestmt = "SELECT * FROM `tbl_certificate`";
                                    $certificates = mysqli_query($mysqli, $certificatestmt);
                                    
                                    while ($certificat = mysqli_fetch_assoc($certificates)) { ?>
                                        
                                        <!-- Member #1 -->
                                            <div class="member">
                                                <div class="member__img">
                                                    <img src="admin/images/certificate/<?php echo $certificat['image']; ?>" alt="member img">
                                                </div><!-- /.member-img -->
                                            </div><!-- /.member -->
                          <?php  }
                        ?>
                        </div><!-- /.carousel -->
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Certificates -->
        
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
     Work Process 
    ========================= -->
        <!--<section class="work-process work-process-carousel pt-130 pb-0 bg-overlay bg-overlay-secondary">-->
        <!--    <div class="bg-img"><img src="assets/images/banners/1.jpg" alt="background"></div>-->
        <!--    <div class="container">-->
        <!--        <div class="row heading-layout2">-->
        <!--            <div class="col-12">-->
        <!--                <h2 class="heading__subtitle color-primary">Caring For The Health Of You And Your Family.</h2>-->
        <!--            </div>-->
        <!--            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">-->
        <!--                <h3 class="heading__title color-white" style="color:white !important">We Provide All Aspects Of Medical Practice For Your Whole-->
        <!--                    Family!-->
        <!--                </h3>-->
        <!--            </div>-->
        <!--            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-xl-1">-->
        <!--                <p class="heading__desc font-weight-bold color-gray mb-40">We will work with you to develop-->
        <!--                    individualised-->
        <!--                    care-->
        <!--                    plans, including-->
        <!--                    management of chronic diseases. If we cannot assist, we can provide referrals or advice-->
        <!--                    about the type of-->
        <!--                    practitioner you require. We treat all enquiries sensitively and in the strictest-->
        <!--                    confidence.-->
        <!--                </p>-->
        <!--                <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled">-->
        <!--                    <li>Fractures and dislocations</li>-->
        <!--                    <li>Health Assessments</li>-->
        <!--                    <li>Desensitisation injections</li>-->
        <!--                    <li>High Quality Care</li>-->
        <!--                    <li>Desensitisation injections</li>-->
        <!--                </ul>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="row">-->
        <!--            <div class="col-12">-->
        <!--                <div class="carousel-container mt-90">-->
        <!--                    <div class="slick-carousel"-->
        <!--                        data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite":false, "arrows": false, "dots": false, "responsive": [{"breakpoint": 1200, "settings": {"slidesToShow": 3}}, {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>-->
                               
        <!--                        <div class="process-item">-->
        <!--                            <span class="process__number">01</span>-->
        <!--                            <div class="process__icon">-->
        <!--                                <i class="icon-health-report"></i>-->
        <!--                            </div>-->
        <!--                            <h4 class="process__title">Fill In Our Medical Application</h4>-->
        <!--                            <p class="process__desc">Medcity offers low-cost health coverage for adults with-->
        <!--                                limited income, you-->
        <!--                                can-->
        <!--                                enroll.</p>-->
        <!--                            <a href="#" class="btn btn__secondary btn__link">-->
        <!--                                <span>Doctors’ Timetable</span>-->
        <!--                                <i class="icon-arrow-right"></i>-->
        <!--                            </a>-->
        <!--                        </div>-->
                               
        <!--                        <div class="process-item">-->
        <!--                            <span class="process__number">02</span>-->
        <!--                            <div class="process__icon">-->
        <!--                                <i class="icon-dna"></i>-->
        <!--                            </div>-->
        <!--                            <h4 class="process__title">Review Your Family Medical History</h4>-->
        <!--                            <p class="process__desc">Regular health exams can help find all the problems, also-->
        <!--                                can find it early-->
        <!--                                chances.</p>-->
        <!--                            <a href="#" class="btn btn__secondary btn__link">-->
        <!--                                <span>Start A Check Up</span>-->
        <!--                                <i class="icon-arrow-right"></i>-->
        <!--                            </a>-->
        <!--                        </div>-->
                           
        <!--                        <div class="process-item">-->
        <!--                            <span class="process__number">03</span>-->
        <!--                            <div class="process__icon">-->
        <!--                                <i class="icon-medicine"></i>-->
        <!--                            </div>-->
        <!--                            <h4 class="process__title">Choose Between Our Care Programs</h4>-->
        <!--                            <p class="process__desc">We have protocols to protect our patients while continuing-->
        <!--                                to provide-->
        <!--                                necessary-->
        <!--                                care.</p>-->
        <!--                            <a href="#" class="btn btn__secondary btn__link">-->
        <!--                                <span>Explore Programs</span>-->
        <!--                                <i class="icon-arrow-right"></i>-->
        <!--                            </a>-->
        <!--                        </div>-->
                                
        <!--                        <div class="process-item">-->
        <!--                            <span class="process__number">04</span>-->
        <!--                            <div class="process__icon">-->
        <!--                                <i class="icon-stethoscope"></i>-->
        <!--                            </div>-->
        <!--                            <h4 class="process__title">Introduce You To Highly Qualified Doctors</h4>-->
        <!--                            <p class="process__desc">Our administration and support staff have exceptional-->
        <!--                                skills and trained to-->
        <!--                                assist you. </p>-->
        <!--                            <a href="#" class="btn btn__secondary btn__link">-->
        <!--                                <span>Meet Our Doctors</span>-->
        <!--                                <i class="icon-arrow-right"></i>-->
        <!--                            </a>-->
        <!--                        </div>-->
                                
        <!--                        <div class="process-item">-->
        <!--                            <span class="process__number">05</span>-->
        <!--                            <div class="process__icon">-->
        <!--                                <i class="icon-head"></i>-->
        <!--                            </div>-->
        <!--                            <h4 class="process__title">Your custom Next process</h4>-->
        <!--                            <p class="process__desc">Our administration and support staff have exceptional-->
        <!--                                skills to assist you.-->
        <!--                            </p>-->
        <!--                            <a href="#" class="btn btn__secondary btn__link">-->
        <!--                                <span>Meet Our Doctors</span>-->
        <!--                                <i class="icon-arrow-right"></i>-->
        <!--                            </a>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="cta bg-primary">-->
        <!--        <div class="container">-->
        <!--            <div class="row align-items-center">-->
        <!--                <div class="col-sm-12 col-md-2 col-lg-2">-->
        <!--                    <img src="assets/images/icons/alert.png" class="cta__img" alt="alert">-->
        <!--                </div>-->
        <!--                <div class="col-sm-12 col-md-7 col-lg-7">-->
        <!--                    <h4 class="cta__title" style="color:#29156e !important;">True Healthcare For Your Family!</h4>-->
        <!--                    <p class="cta__desc">Serve the community by improving the quality of life through better-->
        <!--                        health. We have-->
        <!--                        put protocols to protect our patients and staff while continuing to provide medically-->
        <!--                        necessary care.-->
        <!--                    </p>-->
        <!--                </div>-->
        <!--                <div class="col-sm-12 col-md-12 col-lg-3">-->
        <!--                    <a href="appointment.php"-->
        <!--                        class="btn btn__secondary btn__secondary-style2 btn__rounded mr-30">-->
        <!--                        <span>Healthcare Programs</span>-->
        <!--                        <i class="icon-arrow-right"></i>-->
        <!--                    </a>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->

        <!-- ======================
      Team
    ========================= -->
        <section class="team-layout2 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                        <div class="heading text-center mb-40">
                            <h3 class="heading__title" style="color:#29156e !important;">Meet Our Faculty</h3>
                            <p class="heading__desc">Our administration and support staff all have exceptional people
                                skills and
                                trained to assist you with all enquiries.
                            </p>
                        </div><!-- /.heading -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="slick-carousel"
                            data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                            <!-- Member #1 -->
                    -     <?php 
                            $facultystmt = "SELECT * FROM tbl_team ORDER BY position_order ASC";
                            $faculties = mysqli_query($mysqli,$facultystmt);
                            
                        while($faculty=mysqli_fetch_array($faculties))
                        {
                    ?>
                            <div class="member border 2">
                                <div class="member__img">
                                    <img src="admin/images/team/<?php echo $faculty['image']; ?>" alt="member img">
                                </div><!-- /.member-img -->
                                <div class="member__info">
                                    <h5 class="member__name"><span><?php echo $faculty['name']; ?></span></h5>
                                    <p class="member__job"><?php echo $faculty['design']; ?></p>
                                    <!--<p class="member__desc"><?php echo $faculty['sort_desc']; ?></p>-->
                                </div><!-- /.member-info -->
                            </div><!-- /.member -->
                            <?php } ?>
                        </div><!-- /.carousel -->
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Team -->

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
      <div class="container pt-70 ">
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
                            $imagestmt= "select * from tbl_gallery where file_type='Image'";
                            $images = mysqli_query($mysqli,$imagestmt);
                            
                            while($image = mysqli_fetch_assoc($images)){
                            ?>
                            <a class="popup-gallery-item " href="admin/images/gallery/<?php echo $image['gallery_image']; ?>">
                                <img src="admin/images/gallery/<?php echo $image['gallery_image']; ?>" alt="gallery img">
                            </a>
                            <?php 
                            }                            
                            ?>
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