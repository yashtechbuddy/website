<?php 
$footerstmt = "SELECT * FROM `tbl_footer_setting` LIMIT 1";
$footers = mysqli_query($mysqli,$footerstmt);
$footer = mysqli_fetch_array($footers);
?>
<a href="https://api.whatsapp.com/send?phone=<?php echo $footer['phone1']; ?>&text=Hello%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
<i class="fab fa-whatsapp my-float"></i>
</a>
<footer class="footer">
    <div class="footer-primary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <div class="footer-widget-about">
                        <img src="<?php echo $path;?>admin/images/footer/<?php echo $footer['logo'];  ?>" alt="<?php echo $footer['alt-tag']; ?>" class="mb-10" style="height:100px;width:100px">
                        <p class="color-gray">
                            <?php echo $footer['about_us']; ?>
                        </p>
                        <a href="<?php echo $path; ?>contact-us.php" class="btn btn__primary btn__primary-style2 btn__link">
                            <span>Contact us</span> <i class="icon-arrow-right"></i>
                        </a>
                    </div><!-- /.footer-widget__content -->
                </div><!-- /.col-xl-2 -->
                <div class="col-sm-6 col-md-6 col-lg-2 offset-lg-1">
                    <div class="footer-widget-nav">
                        <h6 class="footer-widget__title">Courses</h6>
                        <nav>
                            <ul class="list-unstyled">
                            <?php 
                                $coursesstmt="SELECT * FROM tbl_courses order by position_order ";               
                                $courses=mysqli_query($mysqli,$coursesstmt); 
                                while($course=mysqli_fetch_array($courses))
                                {
                            ?>
                                <li><a href="<?php echo $path ?>courses/<?php echo $course['page_name']; ?>"><?php echo $course['title']; ?></a></li>
                                <?php } ?>
                            </ul>    
                        </nav>
                    </div><!-- /.footer-widget__content -->
                </div><!-- /.col-lg-2 -->
                <div class="col-sm-6 col-md-6 col-lg-2">
                    <div class="footer-widget-nav">
                        <h6 class="footer-widget__title">Links</h6>
                        <nav>
                            
                            <ul class="list-unstyled">
                                <?php $Quicklink = "SELECT * FROM tbl_menu WHERE quick_link_visibility=0 "; 
                          $links = mysqli_query($mysqli,$Quicklink);
                          
                          if(mysqli_num_rows($links)){
                             while($link = mysqli_fetch_array($links)){ ?>
                                <li>
                                    <a href="<?php if($page_status=='true'){echo '../';}?><?php echo $link['page_link']; ?>" class="nav__item-link px-0 <?php if($currentPage ==  $link['page_link']){ echo "active"; } ?>" style="margin-right: 16px;"><?php echo $link['page_name'];?></a>
                                </li>
                                 
                       <?php      }
                          }
                    
                    ?>
                                
                            </ul>
                        </nav>
                    </div><!-- /.footer-widget__content -->
                </div><!-- /.col-lg-2 -->
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="footer-widget-contact">
                        <h6 class="footer-widget__title color-heading">Quick Contacts</h6>
                        <ul class="contact-list list-unstyled">
                            <li>If you have any questions or need help, feel free to contact with our team.</li>
                            <li>
                                <a href="tel:+91 <?php echo $footer['phone1']; ?>" class="phone__number">
                                    <i class="icon-phone"></i> <span>+91 <?php echo $footer['phone1']; ?></span>
                                </a>
                            </li>
                         
                            <li class="color-body"> <a href="https://goo.gl/maps/ifmBmmd3v9Tx2SSw6"><?php echo $footer['address']; ?></a></li>
                        </ul>
                        <div class="d-flex align-items-center">
                            <a href="https://goo.gl/maps/ifmBmmd3v9Tx2SSw6" class="btn btn__primary btn__link mr-30">
                                <i class="icon-arrow-right"></i> <span>Get Directions</span>
                            </a>
                            <ul class="social-icons list-unstyled mb-0">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            </ul><!-- /.social-icons -->
                        </div>
                    </div><!-- /.footer-widget__content -->
                </div><!-- /.col-lg-2 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-primary -->
    <div class="footer-secondary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <span class="fz-14">&copy; <?php echo date("Y");?> SANDRA SHROFF ROFEL COLLEGE OF NURSING, All Rights Reserved. Designed & Developed By</span>
                    <a class="fz-14 color-primary" href="https://www.rndtechnosoft.com/" style="color:#29156e !important"><b></b>Rndtechnosoft</a>
                </div><!-- /.col-lg-6 -->
                <!--<div class="col-sm-12 col-md-6 col-lg-6">-->
                <!--    <nav>-->
                <!--        <ul class="list-unstyled footer__copyright-links d-flex flex-wrap justify-content-end mb-0">-->
                <!--            <li><a href="#">Terms & Conditions</a></li>-->
                <!--            <li><a href="#">Privacy Policy</a></li>-->
                <!--            <li><a href="#">Cookies</a></li>-->
                <!--        </ul>-->
                <!--    </nav>-->
                <!--</div>-->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-secondary -->
</footer>

 <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
    </div><!-- /.wrapper -->
