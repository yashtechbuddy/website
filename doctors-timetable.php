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
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link active">Doctors</a>
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
    <section class="page-title page-title-layout5">
      <div class="bg-img"><img src="assets/images/backgrounds/6.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading">Doctor’s Timetable</h1>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Doctor’s Timetable</li>
              </ol>
            </nav>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ========================
       Doctors Timetable
    ========================== -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="doctors-timetable w-100">
                <thead>
                  <tr>
                    <th></th>
                    <th>Sunday</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      08.00
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Neurology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>08.00</span><span>09.00</span>
                      </div>
                      <div class="doctor__name">Dr. Muldoone. R</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Cardiology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>08.00</span><span>09.00</span>
                      </div>
                      <div class="doctor__name">Dr. Brain.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Pathology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>08.00</span><span>09.00</span>
                      </div>
                      <div class="doctor__name">Dr. Andaloro.M</div>
                    </td>
                    <td class="event" rowspan="3">
                      <a class="event__header" href="#">Laboratory</a>
                      <div class="event__type">Analysis</div>
                      <div class="event__time">
                        <span>08.00</span><span>11.00</span>
                      </div>
                      <div class="doctor__name">Dr. Markus.S</div>
                      <hr>
                      <a class="event__header" href="#">Ophthalmology</a>
                      <div class="event__type">Analysis</div>
                      <div class="event__time">
                        <span>08.00</span><span>10.00</span>
                      </div>
                      <div class="doctor__name">Dr. Markus.S</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Pediatric</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>08.00</span><span>09.00</span>
                      </div>
                      <div class="doctor__name">Dr. Nicole. B</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Physiotherapy</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>08.00</span><span>09.00</span>
                      </div>
                      <div class="doctor__name">Dr. Alex.K</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Urology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>08.00</span><span>09.00</span>
                      </div>
                      <div class="doctor__name">Dr. Darlen.G</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      09.00
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Maternity</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>10.00</span>
                      </div>
                      <div class="doctor__name">Dr. Muldoone. R</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Oncology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>10.00</span>
                      </div>
                      <div class="doctor__name">Dr. Brain.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Pathology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>10.00</span>
                      </div>
                      <div class="doctor__name">Dr. Andaloro.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Audiology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>10.00</span>
                      </div>
                      <div class="doctor__name">Dr. Nicole. B</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Cardiac</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>10.00</span>
                      </div>
                      <div class="doctor__name">Dr. Alex.K</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Urology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>10.00</span>
                      </div>
                      <div class="doctor__name">Dr. Darlen.G</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      10.00
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Neurology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>11.00</span>
                      </div>
                      <div class="doctor__name">Dr. Muldoone. R</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Cardiology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>11.00</span>
                      </div>
                      <div class="doctor__name">Dr. Brain.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Pathology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>11.00</span>
                      </div>
                      <div class="doctor__name">Dr. Andaloro.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Maternity</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>11.00</span>
                      </div>
                      <div class="doctor__name">Dr. Nicole. B</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Oncology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>11.00</span>
                      </div>
                      <div class="doctor__name">Dr. Alex.K</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Urology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>09.00</span><span>11.00</span>
                      </div>
                      <div class="doctor__name">Dr. Darlen.G</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      11.00
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Physiotherapy</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>11.00</span><span>12.00</span>
                      </div>
                      <div class="doctor__name">Dr. Muldoone. R</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Cardiology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>11.00</span><span>12.00</span>
                      </div>
                      <div class="doctor__name">Dr. Brain.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Maternity</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>11.00</span><span>12.00</span>
                      </div>
                      <div class="doctor__name">Dr. Andaloro.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Pediatric</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>11.00</span><span>12.00</span>
                      </div>
                      <div class="doctor__name">Dr. Nicole. B</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Cardiac</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>11.00</span><span>12.00</span>
                      </div>
                      <div class="doctor__name">Dr. Alex.K</div>
                    </td>
                    <td class="event" rowspan="3">
                      <a class="event__header" href="#">Laboratory</a>
                      <div class="event__type">Analysis</div>
                      <div class="event__time">
                        <span>11.00</span><span>13.00</span>
                      </div>
                      <div class="doctor__name">Dr. Markus.S</div>
                      <hr>
                      <a class="event__header" href="#">Physiotherapy</a>
                      <div class="event__type">Analysis</div>
                      <div class="event__time">
                        <span>12.00</span><span>14.00</span>
                      </div>
                      <div class="doctor__name">Dr. Markus.S</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Urology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>11.00</span><span>12.00</span>
                      </div>
                      <div class="doctor__name">Dr. Darlen.G</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      12.00
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Neurology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>12.00</span><span>15.00</span>
                      </div>
                      <div class="doctor__name">Dr. Muldoone. R</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Ophthalmology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>12.00</span><span>15.00</span>
                      </div>
                      <div class="doctor__name">Dr. Brain.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Oncology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>12.00</span><span>15.00</span>
                      </div>
                      <div class="doctor__name">Dr. Andaloro.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Audiology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>12.00</span><span>15.00</span>
                      </div>
                      <div class="doctor__name">Dr. Nicole. B</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Physiotherapy</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>12.00</span><span>15.00</span>
                      </div>
                      <div class="doctor__name">Dr. Alex.K</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Urology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>12.00</span><span>15.00</span>
                      </div>
                      <div class="doctor__name">Dr. Darlen.G</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      13.00
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Oncology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>13.00</span><span>14.00</span>
                      </div>
                      <div class="doctor__name">Dr. Muldoone. R</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Audiology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>13.00</span><span>14.00</span>
                      </div>
                      <div class="doctor__name">Dr. Brain.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Pathology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>13.00</span><span>14.00</span>
                      </div>
                      <div class="doctor__name">Dr. Andaloro.M</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Pediatric</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>13.00</span><span>14.00</span>
                      </div>
                      <div class="doctor__name">Dr. Nicole. B</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Maternity</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>13.00</span><span>14.00</span>
                      </div>
                      <div class="doctor__name">Dr. Alex.K</div>
                    </td>
                    <td class="event">
                      <a class="event__header" href="#">Ophthalmology</a>
                      <div class="event__type">Consultation</div>
                      <div class="event__time">
                        <span>13.00</span><span>14.00</span>
                      </div>
                      <div class="doctor__name">Dr. Darlen.G</div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Doctors Timetable  -->

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