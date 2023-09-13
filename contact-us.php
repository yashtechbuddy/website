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

        <!-- ========================= 
            Google Map
    =========================  -->
        <section class="google-map py-0">
           <iframe width="100%" height="500" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d29921.339619028142!2d72.88917877168024!3d20.375984491332474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3be0cfcba593d3ed%3A0x7f9b6a5337846520!2srofel%20nursing%20college%20vapi!3m2!1d20.381500199999998!2d72.92216719999999!5e0!3m2!1sen!2sin!4v1694241718845!5m2!1sen!2sin"></iframe> </section><!-- /.GoogleMap -->
        <!-- ==========================
        contact layout 1
    =========================== -->
        <section class="contact-layout1 pt-0 mt--100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-panel d-flex flex-wrap">
                            <form class="contact-panel__form" method="post"
                                action="https://7oroof.com/demos/medcity/assets/php/contact.php" id="contactForm">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="contact-panel__title">How Can We Help? </h4>
                                        <p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly
                                            reception staff
                                            with any general or medical enquiry. Our doctors will receive or return any
                                            urgent calls.
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <i class="icon-user form-group-icon"></i>
                                            <input type="text" class="form-control" placeholder="Name" id="contact-name"
                                                name="contact-name" required>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <i class="icon-email form-group-icon"></i>
                                            <input type="email" class="form-control" placeholder="Email"
                                                id="contact-email" name="contact-email" required>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <i class="icon-phone form-group-icon"></i>
                                            <input type="text" class="form-control" placeholder="Phone"
                                                id="contact-Phone" name="contact-phone" required>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <i class="icon-news form-group-icon"></i>
                                            <select class="form-control">
                                                <option value="0" disabled selected>Subject</option>
                                                <option value="1">Subject 1</option>
                                                <option value="2">Subject 1</option>
                                            </select>
                                        </div>
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <i class="icon-alert form-group-icon"></i>
                                            <textarea class="form-control" placeholder="Message" id="contact-message"
                                                name="contact-message"></textarea>
                                        </div>
                                        <button type="submit"
                                            class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                            <span>Submit Request</span> <i class="icon-arrow-right"></i>
                                        </button>
                                        <div class="contact-result"></div>
                                    </div><!-- /.col-lg-12 -->
                                </div><!-- /.row -->
                            </form>
                            <div
                                class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
                                <div class="bg-img"><img src="assets/images/banners/1.jpg" alt="banner"></div>
                                <div>
                                    <h4 class="contact-panel__title color-white">Quick Contacts</h4>
                                    <p class="contact-panel__desc font-weight-bold color-white mb-30">Please feel free
                                        to contact our
                                        friendly staff with any medical enquiry.
                                    </p>
                                </div>
                                <div>
                                    <ul class="contact__list list-unstyled mb-30">
                                        <li>
                                            <i class="icon-phone"></i><a href="tel:+91 <?php echo $contact['phone']; ?>">Phone No:+91 <?php echo $contact['phone']; ?></a>
                                        </li>
                                        <li>
                                            <i class="icon-location"></i><a class="text-justified" href="#">Location: <?php echo $contact['address']; ?></a>
                                        </li>
                                        <li>
                                            <i class="icon-clock"></i><a href="contact-us.php">Mon - Fri: 8:00 am - 7:00
                                                pm</a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact layout 1 -->

        <!-- ========================= 
      Testimonials layout 2
      =========================  -->
        <!-- /.testimonials layout 2 -->

        <!-- ========================
     gallery
    =========================== -->

        <!-- /.gallery 2 -->

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