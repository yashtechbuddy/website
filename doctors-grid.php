<!DOCTYPE html>
<html lang="en">

<?php 
include_once "./includes/head.php";
?>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    <!-- =========================
        Header
    =========================== -->
    <header class="header header-layout1">
      <div class="header-topbar">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="d-flex align-items-center justify-content-between">
                <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                  <li>
                    <button class="miniPopup-emergency-trigger" type="button">24/7 Emergency</button>
                    <div id="miniPopup-emergency" class="miniPopup miniPopup-emergency text-center">
                      <div class="emergency__icon">
                        <i class="icon-call3"></i>
                      </div>
                      <a href="tel:+201061245741" class="phone__number">
                        <i class="icon-phone"></i> <span>+2 01061245741</span>
                      </a>
                      <p>Please feel free to contact our friendly reception staff with any general or medical enquiry.
                      </p>
                      <a href="appointment.php" class="btn btn__secondary btn__link btn__block">
                        <span>Make Appointment</span> <i class="icon-arrow-right"></i>
                      </a>
                    </div><!-- /.miniPopup-emergency -->
                  </li>
                  <li>
                    <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: (002) 01061245741</a>
                  </li>
                  <li>
                    <i class="icon-location"></i><a href="#">Location: Brooklyn, New York</a>
                  </li>
                  <li>
                    <i class="icon-clock"></i><a href="contact-us.php">Mon - Fri: 8:00 am - 7:00 pm</a>
                  </li>
                </ul><!-- /.contact__list -->
                <div class="d-flex">
                  <ul class="social-icons list-unstyled mb-0 mr-30">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  </ul><!-- /.social-icons -->
                  <form class="header-topbar__search">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
                  </form>
                </div>
              </div>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.header-top -->
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo/logo-light.png" class="logo-light" alt="logo">
            <img src="assets/images/logo/logo-dark.png" class="logo-dark" alt="logo">
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav ml-auto">
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link active">Home</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="index.php" class="nav__item-link">Home Main</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="home-modern.php" class="nav__item-link">Home Modern</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="home-classic.php" class="nav__item-link">Home Classic</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="home-dentist.php" class="nav__item-link">Home Dentist</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="home-pharmacy.php" class="nav__item-link">Home pharmacy</a>
                  </li><!-- /.nav-item -->
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">About Us</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="about-us.php" class="nav__item-link">About Us</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="services.php" class="nav__item-link">Our Services</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="services-single.php" class="nav__item-link">single Services</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="pricing.php" class="nav__item-link">Pricing & Plans</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="appointment.php" class="nav__item-link">Appointments</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="faqs.php" class="nav__item-link">Help & FAQs</a>
                  </li> <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="gallery.php" class="nav__item-link">Our Gallery</a>
                  </li><!-- /.nav-item -->
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Doctors</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="doctors-timetable.php" class="nav__item-link">Doctors Timetable</a>
                  </li> <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="doctors-standard.php" class="nav__item-link">Our Doctors Standard</a>
                  </li> <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="doctors-modern.php" class="nav__item-link">Our Doctors Modern</a>
                  </li> <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="doctors-grid.php" class="nav__item-link">Our Doctors Grid</a>
                  </li> <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="doctors-single-doctor1.php" class="nav__item-link">Single Doctor 01</a>
                  </li> <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="doctors-single-doctor2.php" class="nav__item-link">Single Doctor 02</a>
                  </li> <!-- /.nav-item -->
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="blog.php" class="nav__item-link">Blog Grid</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="blog-single-post.php" class="nav__item-link">Single Blog Post</a>
                  </li><!-- /.nav-item -->
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Shop</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="shop.php" class="nav__item-link">Our Products</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="shop-single-product.php" class="nav__item-link">Products Single</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="cart.php" class="nav__item-link">Cart</a>
                  </li><!-- /.nav-item -->
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="contact-us.php" class="nav__item-link">Contacts</a>
              </li><!-- /.nav-item -->
            </ul><!-- /.navbar-nav -->
            <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
          </div><!-- /.navbar-collapse -->
          <div class="d-none d-xl-flex align-items-center position-relative ml-30">
            <div class="miniPopup-departments-trigger">
              <span class="menu-lines" id="miniPopup-departments-trigger-icon"><span></span></span>
              <a href="departments.php">Departments</a>
            </div>
            <ul id="miniPopup-departments" class="miniPopup miniPopup-departments dropdown-menu">
              <li class="nav__item">
                <a href="department-single.php" class="nav__item-link">Neurology Clinic</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="department-single.php" class="nav__item-link">Cardiology Clinic</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="department-single.php" class="nav__item-link">Pathology Clinic</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="department-single.php" class="nav__item-link">Laboratory Clinic</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="department-single.php" class="nav__item-link">Pediatric Clinic</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="department-single.php" class="nav__item-link">Cardiac Clinic</a>
              </li><!-- /.nav-item -->
            </ul> <!-- /.miniPopup-departments -->
            <a href="appointment.php" class="btn btn__primary btn__rounded ml-30">
              <i class="icon-calendar"></i>
              <span>Appointment</span>
            </a>
          </div>
        </div><!-- /.container -->
      </nav><!-- /.navabr -->
    </header><!-- /.Header -->

    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout1 bg-overlay">
      <div class="bg-img"><img src="assets/images/page-titles/7.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
            <h1 class="pagetitle__heading">Providing Care for The Sickest In Community. </h1>
            <p class="pagetitle__desc">Medcity has been present in Europe since 1990, offering innovative solutions,
              specializing in medical services for treatment of medical infrastructure.
            </p>
            <a href="appointment.php" class="btn btn__primary btn__rounded">
              <span>Make Appointment</span>
              <i class="icon-arrow-right"></i>
            </a>
          </div><!-- /.col-xl-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ========================
        Team layout 3
    ========================== -->
    <section class="team-layout3 pb-40">
      <div class="container">
        <div class="row">
          <!-- Member #1 -->
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="member">
              <div class="member__img">
                <img src="assets/images/team/1.jpg" alt="member img">
              </div><!-- /.member-img -->
              <div class="member__info">
                <h5 class="member__name"><a href="doctors-single-doctor1.php">Mike Dooley</a></h5>
                <p class="member__job">Cardiology Specialist</p>
                <p class="member__desc">Muldoone obtained his undergraduate degree in Biomedical Engineering at Tulane
                  University prior to attending St George's University School of Medicine</p>
                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  <a href="doctors-single-doctor1.php" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>
              </div><!-- /.member-info -->
            </div><!-- /.member -->
          </div><!-- /.col-lg-4 -->
          <!-- Member #2 -->
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="member">
              <div class="member__img">
                <img src="assets/images/team/2.jpg" alt="member img">
              </div><!-- /.member-img -->
              <div class="member__info">
                <h5 class="member__name"><a href="doctors-single-doctor1.php">Richard Muldoone</a></h5>
                <p class="member__job">Cardiology Specialist</p>
                <p class="member__desc">Brian specializes in treating skin, hair, nail, and mucous membrane. He also
                  address cosmetic issues, helping to revitalize the appearance of the skin</p>
                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  <a href="doctors-single-doctor1.php" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>
              </div><!-- /.member-info -->
            </div><!-- /.member -->
          </div><!-- /.col-lg-4 -->
          <!-- Member #3 -->
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="member">
              <div class="member__img">
                <img src="assets/images/team/3.jpg" alt="member img">
              </div><!-- /.member-img -->
              <div class="member__info">
                <h5 class="member__name"><a href="doctors-single-doctor1.php">Maria Andaloro</a></h5>
                <p class="member__job">Pediatrician</p>
                <p class="member__desc">Andaloro graduated from medical school and completed 3 years residency program
                  in pediatrics. She passed rigorous exams by the American Board of Pediatrics.</p>
                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  <a href="doctors-single-doctor1.php" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>
              </div><!-- /.member-info -->
            </div><!-- /.member -->
          </div><!-- /.col-lg-4 -->
          <!-- Member #4 -->
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="member">
              <div class="member__img">
                <img src="assets/images/team/4.jpg" alt="member img">
              </div><!-- /.member-img -->
              <div class="member__info">
                <h5 class="member__name"><a href="doctors-single-doctor1.php">Dupree Black</a></h5>
                <p class="member__job">Urologist</p>
                <p class="member__desc">Black diagnose and treat diseases of the urinary tract in both men and women. He
                  also diagnose and treat anything involving the reproductive tract in men.</p>
                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  <a href="doctors-single-doctor1.php" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>
              </div><!-- /.member-info -->
            </div><!-- /.member -->
          </div><!-- /.col-lg-4 -->
          <!-- Member #5 -->
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="member">
              <div class="member__img">
                <img src="assets/images/team/5.jpg" alt="member img">
              </div><!-- /.member-img -->
              <div class="member__info">
                <h5 class="member__name"><a href="doctors-single-doctor1.php">Markus skar</a></h5>
                <p class="member__job">Laboratory</p>
                <p class="member__desc">Skar play a very important role in your health care. People working in the
                  clinical laboratory are responsible for conducting tests that provide crucial information.</p>
                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  <a href="doctors-single-doctor1.php" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>
              </div><!-- /.member-info -->
            </div><!-- /.member -->
          </div><!-- /.col-lg-4 -->
          <!-- Member #6 -->
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="member">
              <div class="member__img">
                <img src="assets/images/team/6.jpg" alt="member img">
              </div><!-- /.member-img -->
              <div class="member__info">
                <h5 class="member__name"><a href="doctors-single-doctor1.php">Kiano Barker</a></h5>
                <p class="member__job">Pathologist </p>
                <p class="member__desc">Barker help care for patients every day by providing their doctors with the
                  information needed to ensure appropriate care. He also valuable resources for other physicians.</p>
                <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                  <a href="doctors-single-doctor1.php" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>
              </div><!-- /.member-info -->
            </div><!-- /.member -->
          </div><!-- /.col-lg-4 -->
        </div> <!-- /.row -->
        <div class="row">
          <div class="col-12 text-center">
            <nav class="pagination-area">
              <ul class="pagination justify-content-center">
                <li><a class="current" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#"><i class="icon-arrow-right"></i></a></li>
              </ul>
            </nav><!-- .pagination-area -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Team layout 3  -->

    <!-- ========================
      Footer
    ========================== -->
     <?php include "./includes/footer.php"; ?>
  </div><!-- /.wrapper -->

  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>