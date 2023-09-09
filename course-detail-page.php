<!DOCTYPE html>
<html lang="en">

<?php 
    include "admin/includes/connection.php";
    include_once "head.php";

    $relative_path = $_SERVER['PHP_SELF'];
    $current_page= basename($relative_path);
    $data_qry="SELECT * FROM tbl_courses where page_name='".$current_page."'";
    $data_row=mysqli_query($mysqli,$data_qry); 
    $data_row=mysqli_fetch_array($data_row);
    $pro_id = $data_row['id'];
?>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    <!-- =========================
        Header
    =========================== -->
    <?php include_once 'header.php'; ?>

    <!-- ========================
       page title 
    =========================== -->
      <section class="page-title page-title-layout5 bg-overlay">
      <div class="bg-img"><img src="<?php echo $path ?>admin/images/pageBanner/<?php echo PAGE_BANNER_IMAGE ?>" alt="<?php echo PAGE_BANNER_ALT_TAG ?>"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading"><?php echo $data_row['title']; ?></h1>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo $path; ?>index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $path; ?>courses.php">Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $data_row['title']; ?></li>
              </ol>
            </nav>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <section id="content" class=" pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="text-block mb-50">
              <!--<p class="text-block__desc mb-20 font-weight-bold color-secondary">A neurologist is a medical doctor with-->
              <!--  specialized training-->
              <!--  in diagnosing, treating, and managing disorders of the brain and nervous system including, but not-->
              <!--  limited to, Alzheimer’s disease, amyotrophic lateral sclerosis (ALS), concussion, epilepsy, migraine,-->
              <!--  multiple sclerosis, Parkinson’s disease, and stroke.</p>-->
              <div class="video-banner-layout3 bg-overlay mb-50">
                <img src="<?php echo $path;?>assets/images/banners/7.jpg" alt="banner">
                <!--<a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">-->
                <!--  <div class="video__player">-->
                <!--    <i class="fa fa-play"></i>-->
                <!--  </div>-->
                <!--</a>-->
              </div><!-- /.video-banner -->
              <p class="text-block__desc mb-20"><?php echo $data_row['long_desc']; ?></p>

            </div><!-- /.text-block -->

            <!--<ul class="list-items list-unstyled mb-60 pl-40">-->
            <!--  <li>If your blood doesn’t clot properly – it’s a haematologist who will conduct the blood tests, confirm-->
            <!--    if you have haemophilia, and offer treatment.</li>-->
            <!--  <li>When there’s an outbreak of infection in a hospital, it’s a medical microbiologist or infection doctor-->
            <!--    who will advise the infection control teams and work hard to contain it.</li>-->
            <!--  <li>For those having trouble getting pregnant – it’s a reproductive scientist who will investigate,-->
            <!--    diagnose and, where possible, treat any infertility issues.</li>-->
            <!--</ul>-->
            <!--<div class="widget-plan mb-60">-->
            <!--  <div class="widget__body">-->
            <!--    <h5 class="widget__title">Health Care Plans</h5>-->
            <!--    <p>Our doctors include highly qualified male and female practitioners who come from a range of-->
            <!--      backgrounds-->
            <!--      and bring with a diversity of skills and special interests. Our administration and support staff all-->
            <!--      have exceptional people skills and trained to assist you with all medical enquiries.-->
            <!--    </p>-->
            <!--    <div class="row">-->
            <!--      <div class="col-sm-12 col-md-6">-->
            <!--        <div class="plan__items">-->
            <!--          <ul class="list-items list-items-layout2 list-unstyled mb-0">-->
            <!--            <li>Review your medical records.</li>-->
            <!--            <li>Check and test blood pressure.</li>-->
            <!--            <li>Run tests such as blood tests.</li>-->
            <!--          </ul>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div class="col-sm-12 col-md-6">-->
            <!--        <div class="plan__items">-->
            <!--          <ul class="list-items list-items-layout2 list-unstyled mb-0">-->
            <!--            <li>Check and test lung function.</li>-->
            <!--            <li>Narrowing of the arteries.</li>-->
            <!--            <li>Other specialized tests.</li>-->
            <!--          </ul>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--  <div class="widget__footer d-flex flex-wrap justify-content-between align-items-center">-->
            <!--    <div class="plan__price">$50<span class="period">/Month</span></div>-->
            <!--    <div class="d-flex align-items-center">-->
            <!--      <a href="#" class="btn btn__secondary btn__rounded mr-30">-->
            <!--        <span>Purchase Now</span> <i class="icon-arrow-right"></i>-->
            <!--      </a>-->
            <!--      <a href="#" class="btn btn__primary btn__link">-->
            <!--        <i class="icon-arrow-right icon-filled"></i> <span>Explore Other Plans</span>-->
            <!--      </a>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!--<div class="text-block mb-50">-->
            <!--  <h5 class="text-block__title">Our Core Values</h5>-->
            <!--  <p class="text-block__desc mb-20">Today the hospital is recognised as a world renowned institution, not-->
            <!--    only providing outstanding care and treatment, but improving the outcomes for all through a-->
            <!--    comprehensive medical research. For over 20 years, our hospital has touched lives of millions of people,-->
            <!--    and provide care and treatment for the sickest in our community including rehabilitation and aged care.-->
            <!--  </p>-->
            <!--</div>-->
            <!--<div class="fancybox-layout1">-->
            <!--  <div class="row">-->
            <!--    <div class="col-md-6">-->
                 
            <!--      <div class="fancybox-item d-flex">-->
            <!--        <div class="fancybox__icon">-->
            <!--          <i class="icon-heart"></i>-->
            <!--        </div>-->
            <!--        <div class="fancybox__content">-->
            <!--          <h4 class="fancybox__title">Medical Check Ups</h4>-->
            <!--          <p class="fancybox__desc">Recognised as a world renowned institution, you can consult any of our-->
            <!--            doctors by visiting our clinic.</p>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
               
            <!--      <div class="fancybox-item d-flex">-->
            <!--        <div class="fancybox__icon">-->
            <!--          <i class="icon-doctor"></i>-->
            <!--        </div>-->
            <!--        <div class="fancybox__content">-->
            <!--          <h4 class="fancybox__title">Medical Treatment</h4>-->
            <!--          <p class="fancybox__desc">Free or low cost coverage adults with limited income recognised as a-->
            <!--            world renowned institution.</p>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
                 
            <!--      <div class="fancybox-item d-flex">-->
            <!--        <div class="fancybox__icon">-->
            <!--          <i class="icon-call3"></i>-->
            <!--        </div>-->
            <!--        <div class="fancybox__content">-->
            <!--          <h4 class="fancybox__title">Emergency Help 24/7 </h4>-->
            <!--          <p class="fancybox__desc">Contact our reception staff with any medical enquiry any time for low-->
            <!--            cost coverage adults.</p>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
                 
            <!--      <div class="fancybox-item d-flex">-->
            <!--        <div class="fancybox__icon">-->
            <!--          <i class="icon-drugs"></i>-->
            <!--        </div>-->
            <!--        <div class="fancybox__content">-->
            <!--          <h4 class="fancybox__title">Research Professionals </h4>-->
            <!--          <p class="fancybox__desc">All medical aspects practice for family, our reception staff with any-->
            <!--            medical enquiry any time.</p>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!--<div class="text-block mb-50">-->
            <!--  <h5 class="text-block__title">Health Tips & Info</h5>-->
            <!--  <p class="text-block__desc mb-20">We help create a care plan that addresses your specific condition and we-->
            <!--    are here to answer all of your questions & acknowledge your concerns. Today the hospital is recognised-->
            <!--    as a world renowned institution, not only providing outstanding care and treatment, but improving the-->
            <!--    outcomes.-->
            <!--  </p>-->
            <!--</div>-->
            <!-- /.text-block -->
            <!--<div id="accordion" class="mb-70">-->
            <!--  <div class="accordion-item opened">-->
            <!--    <div class="accordion__header" data-toggle="collapse" data-target="#collapse3">-->
            <!--      <a class="accordion__title" href="#">What Payment Methods Are Available?</a>-->
            <!--    </div>-->
            <!--    <div id="collapse3" class="collapse show" data-parent="#accordion">-->
            <!--      <div class="accordion__body">-->
            <!--        <p>With any financial product that you buy, it is important that you know you are getting the best-->
            <!--          advice from a reputable company as often</p>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--  <div class="accordion-item">-->
            <!--    <div class="accordion__header" data-toggle="collapse" data-target="#collapse1">-->
            <!--      <a class="accordion__title" href="#">Which Plan Is Right For Me?</a>-->
            <!--    </div>-->
            <!--    <div id="collapse1" class="collapse" data-parent="#accordion">-->
            <!--      <div class="accordion__body">-->
            <!--        <p>With any financial product that you buy, it is important that you know you are getting the best-->
            <!--          advice from a reputable company as often</p>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--  <div class="accordion-item">-->
            <!--    <div class="accordion__header" data-toggle="collapse" data-target="#collapse2">-->
            <!--      <a class="accordion__title" href="#">Do I have to commit to a contract?</a>-->
            <!--    </div>-->
            <!--    <div id="collapse2" class="collapse" data-parent="#accordion">-->
            <!--      <div class="accordion__body">-->
            <!--        <p>With any financial product that you buy, it is important that you know you are getting the best-->
            <!--          advice from a reputable company as often</p>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--  <div class="accordion-item">-->
            <!--    <div class="accordion__header" data-toggle="collapse" data-target="#collapse4">-->
            <!--      <a class="accordion__title" href="#">What if I pick the wrong plan?</a>-->
            <!--    </div>-->
            <!--    <div id="collapse4" class="collapse" data-parent="#accordion">-->
            <!--      <div class="accordion__body">-->
            <!--        <p>With any financial product that you buy, it is important that you know you are getting the best-->
            <!--          advice from a reputable company as often</p>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--  <div class="accordion-item">-->
            <!--    <div class="accordion__header" data-toggle="collapse" data-target="#collapse5">-->
            <!--      <a class="accordion__title" href="#">Any contracts or commitments?</a>-->
            <!--    </div>-->
            <!--    <div id="collapse5" class="collapse" data-parent="#accordion">-->
            <!--      <div class="accordion__body">-->
            <!--        <p>With any financial product that you buy, it is important that you know you are getting the best-->
            <!--          advice from a reputable company as often</p>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div><!-- /#accordion -->

            <!--<div class="text-block mb-50">-->
            <!--  <h5 class="text-block__title">Our Core Values</h5>-->
            <!--  <p class="text-block__desc mb-20">Today the hospital is recognised as a world renowned institution, not-->
            <!--    only providing outstanding care and treatment, but improving the outcomes for all through a-->
            <!--    comprehensive medical research. For over 20 years, our hospital has touched lives of millions of people,-->
            <!--    and provide care and treatment for the sickest in our community including rehabilitation and aged care.-->
            <!--  </p>-->
            <!--</div><!-- /.text-block -->
            <!--<div class="row">-->
            <!--  <div class="collg-12 col-md-6">-->
            <!--    <div class="pricing-widget-layout1 mb-70">-->
            <!--      <h5 class="pricing__title">Investigations Price List</h5>-->
            <!--      <ul class="pricing__list list-unstyled mb-0">-->
            <!--        <li><span>Umbilical Cord Appearance</span><span class="price">$50</span></li>-->
            <!--        <li><span>Cardiac Electrophysiology</span><span class="price">$45</span></li>-->
            <!--        <li><span>Repositioning Techniques</span><span class="price">$60</span></li>-->
            <!--        <li><span>Geriatric Neurology</span><span class="price">$65</span></li>-->
            <!--        <li><span>Nuclear Cardiology</span><span class="price">$40</span></li>-->
            <!--        <li><span>Nuclear Cardiology</span><span class="price">$55</span></li>-->
            <!--      </ul>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--  <div class="collg-12 col-md-6">-->
            <!--    <div class="pricing-widget-layout2 mb-70">-->
            <!--      <h5 class="pricing__title">Treatments Price List</h5>-->
            <!--      <ul class="pricing__list list-unstyled mb-0">-->
            <!--        <li><span>Colonoscopy</span><span class="price">$50</span></li>-->
            <!--        <li><span>Allergy testing</span><span class="price">$45</span></li>-->
            <!--        <li><span>Gastroscopy</span><span class="price">$60</span></li>-->
            <!--        <li><span>Bronchoscopy</span><span class="price">$65</span></li>-->
            <!--        <li><span>Cardiac Ablation</span><span class="price">$40</span></li>-->
            <!--        <li><span>Holter monitoring</span><span class="price">$55</span></li>-->
            <!--      </ul>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- ======================
                 Team
             ========================= -->
            <!--<section class="team-layout2 pt-0 pb-30">-->
            <!--  <div class="heading mb-40">-->
            <!--    <h3 class="heading__title">Meet Our Doctors</h3>-->
            <!--    <p class="heading__desc">Our administration and support staff all have exceptional people skills and-->
            <!--      trained to assist you with all medical enquiries.-->
            <!--    </p>-->
            <!--  </div>-->
            <!--  <div class="slick-carousel"-->
            <!--    data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>-->
                
            <!--    <div class="member">-->
            <!--      <div class="member__img">-->
            <!--        <img src="<?php echo $path;?>assets/images/team/1.jpg" alt="member img">-->
            <!--      </div>-->
            <!--      <div class="member__info">-->
            <!--        <h5 class="member__name"><a href="doctors-single-doctor1.php">Mike Dooley</a></h5>-->
            <!--        <p class="member__job">Cardiology Specialist</p>-->
            <!--      </div>-->
            <!--    </div>-->
               
            <!--    <div class="member">-->
            <!--      <div class="member__img">-->
            <!--        <img src="<?php echo $path;?>assets/images/team/2.jpg" alt="member img">-->
            <!--      </div>-->
            <!--      <div class="member__info">-->
            <!--        <h5 class="member__name"><a href="doctors-single-doctor1.php">Dermatologists</a></h5>-->
            <!--        <p class="member__job">Cardiology Specialist</p>-->
            <!--      </div>-->
            <!--    </div>-->
              
            <!--    <div class="member">-->
            <!--      <div class="member__img">-->
            <!--        <img src="<?php echo $path;?>assets/images/team/3.jpg" alt="member img">-->
            <!--      </div>-->
            <!--      <div class="member__info">-->
            <!--        <h5 class="member__name"><a href="doctors-single-doctor1.php">Maria Andaloro</a></h5>-->
            <!--        <p class="member__job">Pediatrician</p>-->
            <!--      </div>-->
            <!--    </div>-->
             
            <!--    <div class="member">-->
            <!--      <div class="member__img">-->
            <!--        <img src="<?php echo $path;?>assets/images/team/4.jpg" alt="member img">-->
            <!--      </div>-->
            <!--      <div class="member__info">-->
            <!--        <h5 class="member__name"><a href="doctors-single-doctor1.php">Dupree Black</a></h5>-->
            <!--        <p class="member__job">Urologist</p>-->
            <!--      </div>-->
            <!--    </div>-->
               
            <!--    <div class="member">-->
            <!--      <div class="member__img">-->
            <!--        <img src="<?php echo $path;?>assets/images/team/5.jpg" alt="member img">-->
            <!--      </div>-->
            <!--      <div class="member__info">-->
            <!--        <h5 class="member__name"><a href="doctors-single-doctor1.php">Markus skar</a></h5>-->
            <!--        <p class="member__job">Laboratory</p>-->
            <!--      </div>-->
            <!--    </div>-->
                
            <!--    <div class="member">-->
            <!--      <div class="member__img">-->
            <!--        <img src="<?php echo $path;?>assets/images/team/6.jpg" alt="member img">-->
            <!--      </div>-->
            <!--      <div class="member__info">-->
            <!--        <h5 class="member__name"><a href="doctors-single-doctor1.php">Kiano Barker</a></h5>-->
            <!--        <p class="member__job">Pathologist </p>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</section>-->
          </div><!-- /.col-lg-8 -->
          <!-- left side-bar -->
          <div class="col-sm-12 col-md-12 col-lg-4">
            <aside class="sidebar has-marign-left sticky-top">
              <div class="widget widget-services">
                <h5 class="widget__title">More Courses</h5>
                <div class="widget-content">
                  <ul class="list-unstyled mb-0">
                     <?php 
                     $courseliststmt = "SELECT * FROM tbl_courses WHERE page_name <>'".$current_page."'";
                     $courselist = mysqli_query($mysqli,$courseliststmt); 
                        while($course=mysqli_fetch_array($courselist)){ ?>
                        <li><a href="<?php echo $path;?>courses/<?php echo $course['page_name'];?>"><span><?php echo $course['title'];?></span><i class="icon-arrow-right"></i></a></li>
                    <?php 
                       }
                     ?>
                    
                  </ul>
                </div>
              </div>
              <div class="widget widget-help bg-overlay bg-overlay-secondary-gradient">
                <div class="bg-img"><img src="assets/images/banners/5.jpg" alt="background"></div>
                <div class="widget-content">
                  <div class="widget__icon">
                    <i class="icon-call3"></i>
                  </div>
                  <h4 class="widget__title">Emergency Cases</h4>
                  <p class="widget__desc">Please feel welcome to contact our friendly reception staff with any general
                    or medical enquiry call us.
                  </p>
                  <a href="tel:+91 <?php echo $contact['phone']; ?>" class="phone__number">
                    <i class="icon-phone"></i> <span><?php echo $contact['phone']; ?></span>
                  </a>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-help -->
              <!--<div class="widget widget-schedule">-->
              <!--  <div class="widget-content">-->
              <!--    <div class="widget__icon">-->
              <!--      <i class="icon-charity2"></i>-->
              <!--    </div>-->
              <!--    <h4 class="widget__title">Opening Hours</h4>-->
              <!--    <ul class="time__list list-unstyled mb-0">-->
              <!--      <li><span>Monday - Saturday</span><span>9.00 am - 5:00 pm</span></li>-->
              <!--      <li><span>Sunday</span><span>Close</span></li>-->
              <!--    </ul>-->
              <!--  </div>-->
              <!--</div>-->
              <div class="widget widget-reports <?php ?>">
                <a href="<?php echo $path; ?>admin/images/courses/<?php echo  $data_row['syllabus'];  ?>" target="_blank" class="btn btn__primary btn__block">
                  <i class="icon-pdf-file"></i>
                  <span>Course Syllabus</span>
                </a>
              </div>
            </aside><!-- /.sidebar -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>

    <!-- ========================
      Footer
    ========================== -->
    <?php include_once 'footer.php'; ?>
    <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
  </div><!-- /.wrapper -->

  <script src="<?php echo $path;?>assets/js/jquery-3.5.1.min.js"></script>
  <script src="<?php echo $path;?>assets/js/plugins.js"></script>
  <script src="<?php echo $path;?>assets/js/main.js"></script>
</body>

</html>