<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from 7oroof.com/demos/medcity/services.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jul 2023 05:22:50 GMT -->
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
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Home</a>
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
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link active">About Us</a>
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
      <div class="bg-img"><img src="assets/images/page-titles/2.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
            <span class="pagetitle__subheading">Caring For The Health Of You And Your Family.</span>
            <h1 class="pagetitle__heading">We Provide All Aspects Of Medical Practice For Your Whole Family!</h1>
            <p class="pagetitle__desc">Medcity has been present in Europe since 1990, offering innovative
              solutions, specializing in medical services for treatment of medical infrastructure.
            </p>
            <div class="d-flex flex-wrap align-items-center">
              <a href="appointment.php" class="btn btn__secondary btn__rounded mr-30">
                <span>Find A Doctor</span>
                <i class="icon-arrow-right"></i>
              </a>
              <a href="about-us.php" class="btn btn__secondary btn__outlined btn__rounded">
                <span>More About Us</span>
              </a>
            </div>
          </div><!-- /.col-xl-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ========================
        Services Layout 1
    =========================== -->
    <section class="services-layout1 pt-130">
      <div class="bg-img"><img src="assets/images/backgrounds/2.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-60">
              <h2 class="heading__subtitle">The Best Medical And General Practice Care!</h2>
              <h3 class="heading__title">Providing Medical Care For The Sickest In Our Community.</h3>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <!-- service item #1 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__icon">
                <i class="icon-head"></i>
                <i class="icon-head"></i>
              </div><!-- /.service__icon -->
              <div class="service__content">
                <h4 class="service__title">Neurology Clinic</h4>
                <p class="service__desc">Some neurologists receive subspecialty training focusing on a particular area
                  of
                  the fields, these training programs are called fellowships, and are one to two years.
                </p>
                <ul class="list-items list-items-layout1 list-unstyled">
                  <li>Neurocritical Care</li>
                  <li>Neuro Oncology</li>
                  <li>Geriatric Neurology</li>
                </ul>
                <a href="services-single.php" class="btn btn__secondary btn__outlined btn__rounded">
                  <span>Read More</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div><!-- /.service__content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <!-- service item #2 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__icon">
                <i class="icon-heart"></i>
                <i class="icon-heart"></i>
              </div><!-- /.service__icon -->
              <div class="service__content">
                <h4 class="service__title">Cardiology Clinic</h4>
                <p class="service__desc">All cardiologists study the disorders of the heart, but the study of adult and
                  child heart disorders are trained to take care of small children and adult heart disease.
                </p>
                <ul class="list-items list-items-layout1 list-unstyled">
                  <li>Neurocritical Care</li>
                  <li>Neuro Oncology</li>
                  <li>Geriatric Neurology</li>
                </ul>
                <a href="services-single.php" class="btn btn__secondary btn__outlined btn__rounded">
                  <span>Read More</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div><!-- /.service__content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <!-- service item #3 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__icon">
                <i class="icon-microscope"></i>
                <i class="icon-microscope"></i>
              </div><!-- /.service__icon -->
              <div class="service__content">
                <h4 class="service__title">Pathology Clinic</h4>
                <p class="service__desc">Pathology is the study of disease, it is the bridge between science and
                  medicine.
                  Also it underpins every aspect of patient care, from diagnostic testing and treatment.
                </p>
                <ul class="list-items list-items-layout1 list-unstyled">
                  <li>Surgical Pathology</li>
                  <li>Histopathology</li>
                  <li>Cytopathology </li>
                </ul>
                <a href="services-single.php" class="btn btn__secondary btn__outlined btn__rounded">
                  <span>Read More</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div><!-- /.service__content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <!-- service item #4 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__icon">
                <i class="icon-dropper"></i>
                <i class="icon-dropper"></i>
              </div><!-- /.service__icon -->
              <div class="service__content">
                <h4 class="service__title">Laboratory Analysis</h4>
                <p class="service__desc">Analyzing the radon or radon progeny concentrations with passive devices, or
                  the
                  act of calibrating radon or radon progeny measurement devices.
                </p>
                <ul class="list-items list-items-layout1 list-unstyled">
                  <li>Newborn Care</li>
                  <li>Umbilical Cord Appearance </li>
                  <li>Repositioning Techniques</li>
                </ul>
                <a href="services-single.php" class="btn btn__secondary btn__outlined btn__rounded">
                  <span>Read More</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div><!-- /.service__content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <!-- service item #5 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__icon">
                <i class="icon-heart3"></i>
                <i class="icon-heart3"></i>
              </div><!-- /.service__icon -->
              <div class="service__content">
                <h4 class="service__title">Pediatric Clinic</h4>
                <p class="service__desc">Pediatric providers see patients from birth into early adulthood to make sure
                  children achieve stay healthy. Our care includes preventive health checkups.
                </p>
                <ul class="list-items list-items-layout1 list-unstyled">
                  <li>Clinical laboratory</li>
                  <li>Research Analyst</li>
                  <li>Quality Assurance</li>
                </ul>
                <a href="services-single.php" class="btn btn__secondary btn__outlined btn__rounded">
                  <span>Read More</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div><!-- /.service__content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <!-- service item #6 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__icon">
                <i class="icon-heart2"></i>
                <i class="icon-heart2"></i>
              </div><!-- /.service__icon -->
              <div class="service__content">
                <h4 class="service__title">Cardiac Clinic</h4>
                <p class="service__desc">For people requiring additional follow up, the Cardiac Clinic provides rapid
                  access to professionals specialized in diagnosing and treating heart disease.
                </p>
                <ul class="list-items list-items-layout1 list-unstyled">
                  <li>Macular degeneration</li>
                  <li>Diabetic retinopathy</li>
                  <li>Excessive tearing</li>
                </ul>
                <a href="services-single.php" class="btn btn__secondary btn__outlined btn__rounded">
                  <span>Read More</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div><!-- /.service__content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Services Layout 1 -->

    <!-- ======================
    Features Layout 2
    ========================= -->
    <section class="features-layout2 pt-130 bg-overlay bg-overlay-primary">
      <div class="bg-img"><img src="assets/images/backgrounds/2.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-1">
            <div class="heading__layout2 mb-50">
              <h3 class="heading__title color-white">Medcity Has Touched The Lives Of Patients & Providing Care for The
                Sickest In Our Community.</h3>
            </div>
          </div><!-- /col-lg-5 -->
        </div><!-- /.row -->
        <div class="row mb-100">
          <div class="col-sm-3 col-md-3 col-lg-1 offset-lg-5">
            <div class="heading__icon">
              <i class="icon-insurance"></i>
            </div>
          </div><!-- /.col-lg-5 -->
          <div class="col-sm-9 col-md-9 col-lg-6">
            <p class="heading__desc font-weight-bold color-white mb-30">Medcity has been present in Europe since 1990,
              offering innovative
              solutions, specializing in medical services for treatment of medical infrastructure. With over 100
              professionals actively participates in numerous initiatives aimed at creating sustainable change for
              patients!
            </p>
            <a href="#" class="btn btn__white btn__link">
              <i class="icon-arrow-right icon-filled"></i>
              <span>Our Core Values</span>
            </a>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <!-- Feature item #1 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/1.jpg" alt="service" loading="lazy">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-heart"></i>
                </div>
                <h4 class="feature__title">Medical Advices & Check Ups</h4>
              </div><!-- /.feature__content -->
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
          <!-- Feature item #2 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/2.jpg" alt="service" loading="lazy">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-doctor"></i>
                </div>
                <h4 class="feature__title">Trusted Medical Treatment </h4>
              </div><!-- /.feature__content -->
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
          <!-- Feature item #3 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/3.jpg" alt="service" loading="lazy">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-ambulance"></i>
                </div>
                <h4 class="feature__title">Emergency Help Available 24/7</h4>
              </div><!-- /.feature__content -->
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
          <!-- Feature item #4 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/4.jpg" alt="service" loading="lazy">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-drugs"></i>
                </div>
                <h4 class="feature__title">Medical Research Professionals </h4>
              </div><!-- /.feature__content -->
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
          <!-- Feature item #5 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/5.jpg" alt="service" loading="lazy">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-first-aid-kit"></i>
                </div>
                <h4 class="feature__title">Only Qualified Doctors</h4>
              </div><!-- /.feature__content -->
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
          <!-- Feature item #6 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/6.jpg" alt="service" loading="lazy">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-hospital"></i>
                </div>
                <h4 class="feature__title">Cutting Edge Facility</h4>
              </div><!-- /.feature__content -->
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
          <!-- Feature item #7 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/7.jpg" alt="service" loading="lazy">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-expenses"></i>
                </div>
                <h4 class="feature__title">Affordable Prices For All Patients</h4>
              </div><!-- /.feature__content -->
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
          <!-- Feature item #8 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/8.jpg" alt="service" loading="lazy">
              </div><!-- /.feature__img -->
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-bandage"></i>
                </div>
                <h4 class="feature__title">Quality Care For Every Patient</h4>
              </div><!-- /.feature__content -->
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div><!-- /.feature-item -->
          </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-md-12 col-lg-6 offset-lg-3 text-center">
            <p class="font-weight-bold color-gray mb-0">We hope you will allow us to care for you and strive to be the
              first and best choice for healthcare.
              <a href="#" class="color-secondary">
                <span>Contact Us For More Information</span> <i class="icon-arrow-right"></i>
              </a>
            </p>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

    <!-- ======================
      Team
    ========================= -->
    <section class="team-layout2 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-40">
              <h3 class="heading__title">Meet Our Doctors</h3>
              <p class="heading__desc">Our administration and support staff all have exceptional people skills and
                trained to assist you with all medical enquiries.
              </p>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <!-- Member #1 -->
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
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #2 -->
              <div class="member">
                <div class="member__img">
                  <img src="assets/images/team/2.jpg" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.php">Dermatologists</a></h5>
                  <p class="member__job">Cardiology Specialist</p>
                  <p class="member__desc">Brian specializes in treating skin, hair, nail, and mucous membrane. He also
                    address cosmetic issues, helping to revitalize the appearance of the skin</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    <a href="doctors-single-doctor1.php" class="btn btn__secondary btn__link btn__rounded">
                      <span>Read More</span>
                      <i class="icon-arrow-right"></i>
                    </a>
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #3 -->
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
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #4 -->
              <div class="member">
                <div class="member__img">
                  <img src="assets/images/team/4.jpg" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.php">Dupree Black</a></h5>
                  <p class="member__job">Urologist</p>
                  <p class="member__desc">Black diagnose and treat diseases of the urinary tract in both men and women.
                    He
                    also diagnose and treat anything involving the reproductive tract in men.</p>
                  <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                    <a href="doctors-single-doctor1.php" class="btn btn__secondary btn__link btn__rounded">
                      <span>Read More</span>
                      <i class="icon-arrow-right"></i>
                    </a>
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #5 -->
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
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #6 -->
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
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
            </div><!-- /.carousel -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Team -->

    <!-- ==========================
        contact layout 3
    =========================== -->
    <section class="contact-layout3 bg-overlay bg-overlay-primary-gradient pb-60">
      <div class="bg-img"><img src="assets/images/banners/3.jpg" alt="banner"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7">
            <div class="contact-panel mb-50">
              <form class="contact-panel__form" method="post" action="https://7oroof.com/demos/medcity/assets/php/contact.php" id="contactForm">
                <div class="row">
                  <div class="col-sm-12">
                    <h4 class="contact-panel__title">Book An Appointment</h4>
                    <p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly reception staff
                      with any general or medical enquiry. Our doctors will receive or return any urgent calls.
                    </p>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-widget form-group-icon"></i>
                      <select class="form-control">
                        <option value="0">Choose Clinic</option>
                        <option value="1">Pathology Clinic</option>
                        <option value="2">Pathology Clinic</option>
                      </select>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-user form-group-icon"></i>
                      <select class="form-control">
                        <option value="0">Choose Doctor</option>
                        <option value="1">Ahmed Abdallah</option>
                        <option value="2">Mahmoud Begha</option>
                      </select>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-news form-group-icon"></i>
                      <input type="text" class="form-control" placeholder="Name" id="contact-name" name="contact-name"
                        required>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-email form-group-icon"></i>
                      <input type="email" class="form-control" placeholder="Email" id="contact-email"
                        name="contact-email" required>
                    </div>
                  </div><!-- /.col-lg-6 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <i class="icon-phone form-group-icon"></i>
                      <input type="text" class="form-control" placeholder="Phone" id="contact-Phone"
                        name="contact-phone" required>
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group form-group-date">
                      <i class="icon-calendar form-group-icon"></i>
                      <input type="date" class="form-control" id="contact-date" name="contact-date" required>
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group form-group-date">
                      <i class="icon-clock form-group-icon"></i>
                      <input type="time" class="form-control" id="contact-time" name="contact-time" required>
                    </div>
                  </div><!-- /.col-lg-4 -->
                  <div class="col-12">
                    <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                      <span>Book Appointment</span> <i class="icon-arrow-right"></i>
                    </button>
                    <div class="contact-result"></div>
                  </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
              </form>
            </div>
          </div><!-- /.col-lg-7 -->
          <div class="col-sm-12 col-md-12 col-lg-5">
            <div class="heading heading-light mb-30">
              <h3 class="heading__title mb-30">Helping Patients From Around the Globe!!</h3>
              <p class="heading__desc">Our staff strives to make each interaction with patients clear, concise, and
                inviting. Support the important work of Medicsh Hospital by making a much-needed donation today.
              </p>
            </div>
            <div class="d-flex align-items-center">
              <a href="contact-us.php" class="btn btn__white btn__rounded mr-30">
                <i class="fas fa-heart"></i> <span>Make A Gift</span>
              </a>
              <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                <div class="video__player">
                  <i class="fa fa-play"></i>
                </div>
                <span class="video__btn-title color-white">Play Video</span>
              </a>
            </div>
            <div class="text__block">
              <p class="text__block-desc color-white font-weight-bold">We provide a comprehensive range of plans for
                families and individuals at every stage of life, with annual limits ranging from £1.5m to unlimited.</p>
              <div class="sinature color-white">
                <span class="font-weight-bold">Martin Qube</span><span>, Medcity Manager</span>
              </div>
            </div><!-- /.text__block -->
            <div class="slick-carousel clients-light mt-20"
              data-slick='{"slidesToShow": 3, "arrows": false, "dots": false, "autoplay": true,"autoplaySpeed": 2000, "infinite": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 3}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 2}}]}'>
              <div class="client">
                <img src="assets/images/clients/1.png" alt="client">
                <img src="assets/images/clients/1.png" alt="client">
              </div><!-- /.client -->
              <div class="client">
                <img src="assets/images/clients/2.png" alt="client">
                <img src="assets/images/clients/2.png" alt="client">
              </div><!-- /.client -->
              <div class="client">
                <img src="assets/images/clients/3.png" alt="client">
                <img src="assets/images/clients/3.png" alt="client">
              </div><!-- /.client -->
              <div class="client">
                <img src="assets/images/clients/4.png" alt="client">
                <img src="assets/images/clients/4.png" alt="client">
              </div><!-- /.client -->
              <div class="client">
                <img src="assets/images/clients/5.png" alt="client">
                <img src="assets/images/clients/5.png" alt="client">
              </div><!-- /.client -->
              <div class="client">
                <img src="assets/images/clients/6.png" alt="client">
                <img src="assets/images/clients/6.png" alt="client">
              </div><!-- /.client -->
              <div class="client">
                <img src="assets/images/clients/7.png" alt="client">
                <img src="assets/images/clients/7.png" alt="client">
              </div><!-- /.client -->
            </div><!-- /.carousel -->
          </div><!-- /.col-lg-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 3 -->

    <!-- ========================= 
      Testimonials layout 2
      =========================  -->
    <section class="testimonials-layout2 pt-130 pb-40">
      <div class="container">
        <div class="testimonials-wrapper">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="heading-layout2">
                <h3 class="heading__title">Inspiring Stories!</h3>
              </div><!-- /.heading -->
            </div><!-- /.col-lg-5 -->
            <div class="col-sm-12 col-md-12 col-lg-7">
              <div class="slider-with-navs">
                <!-- Testimonial #1 -->
                <div class="testimonial-item">
                  <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who come from a
                    range of backgrounds and bring with them a diversity of skills and special interests. They also have
                    registered nurses on staff who are available to triage any urgent matters, and the administration
                    and support staff all have exceptional people skills”
                  </h3>
                </div><!-- /. testimonial-item -->
                <!-- Testimonial #2 -->
                <div class="testimonial-item">
                  <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who come from a
                    range of backgrounds and bring with them a diversity of skills and special interests. They also have
                    registered nurses on staff who are available to triage any urgent matters, and the administration
                    and support staff all have exceptional people skills”
                  </h3>
                </div><!-- /. testimonial-item -->
                <!-- Testimonial #3 -->
                <div class="testimonial-item">
                  <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who come from a
                    range of backgrounds and bring with them a diversity of skills and special interests. They also have
                    registered nurses on staff who are available to triage any urgent matters, and the administration
                    and support staff all have exceptional people skills”
                  </h3>
                </div><!-- /. testimonial-item -->
              </div><!-- /.slick-carousel -->
              <div class="slider-nav mb-60">
                <div class="testimonial__meta">
                  <div class="testimonial__thmb">
                    <img src="assets/images/testimonials/thumbs/1.png" alt="author thumb">
                  </div><!-- /.testimonial-thumb -->
                  <div>
                    <h4 class="testimonial__meta-title">Sami Wade</h4>
                    <p class="testimonial__meta-desc">7oroof Inc</p>
                  </div>
                </div><!-- /.testimonial-meta -->
                <div class="testimonial__meta">
                  <div class="testimonial__thmb">
                    <img src="assets/images/testimonials/thumbs/2.png" alt="author thumb">
                  </div><!-- /.testimonial-thumb -->
                  <div>
                    <h4 class="testimonial__meta-title">Ahmed</h4>
                    <p class="testimonial__meta-desc">Web Inc</p>
                  </div>
                </div><!-- /.testimonial-meta -->
                <div class="testimonial__meta">
                  <div class="testimonial__thmb">
                    <img src="assets/images/testimonials/thumbs/3.png" alt="author thumb">
                  </div><!-- /.testimonial-thumb -->
                  <div>
                    <h4 class="testimonial__meta-title">Sonia Blake</h4>
                    <p class="testimonial__meta-desc">Web Inc</p>
                  </div>
                </div><!-- /.testimonial-meta -->
              </div><!-- /.slider-nav -->
            </div><!-- /.col-lg-7 -->
          </div><!-- /.row -->
        </div><!-- /.testimonials-wrapper -->
      </div><!-- /.container -->
    </section><!-- /.testimonials layout 2 -->

    <!-- ========================
     gallery
    =========================== -->
    <section class="gallery pt-0 pb-90">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <a class="popup-gallery-item" href="assets/images/gallery/1.jpg">
                <img src="assets/images/gallery/1.jpg" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="assets/images/gallery/2.jpg">
                <img src="assets/images/gallery/2.jpg" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="assets/images/gallery/3.jpg">
                <img src="assets/images/gallery/3.jpg" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="assets/images/gallery/4.jpg">
                <img src="assets/images/gallery/4.jpg" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="assets/images/gallery/5.jpg">
                <img src="assets/images/gallery/5.jpg" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="assets/images/gallery/6.jpg">
                <img src="assets/images/gallery/6.jpg" alt="gallery img">
              </a>
            </div><!-- /.gallery-images-wrapper -->
          </div><!-- /.col-xl-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.gallery 2 -->

    <!-- ========================
      Footer
    ========================== -->
     <?php include "./includes/footer.php"; ?>
  </div><!-- /.wrapper -->

  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from 7oroof.com/demos/medcity/services.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Jul 2023 05:22:51 GMT -->
</html>