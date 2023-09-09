<?php 

$contactstmt = "SELECT * FROM tbl_contact_us";
$contactinfo = mysqli_query($mysqli,$contactstmt);

$contact = mysqli_fetch_array($contactinfo);

$headerstmt = "SELECT * FROM tbl_header_setting";
$headers = mysqli_query($mysqli,$headerstmt);

$header = mysqli_fetch_array($headers);
?>

<header class="header header-layout1">
    <div class="header-topbar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between" style="margin-top:12px;">
                        <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                            <li>
                                <i class="icon-phone"></i><a href="tel:+91 <?php echo $contact['phone']; ?>">Contact :+91 <?php echo $contact['phone']; ?></a>
                                    <?php if(!empty($contact['phone1'])) { ?> 
                                    <a href="tel:+91 <?php echo $contact['phone1']; ?>">, +91 <?php echo $contact['phone1']; ?></a>
                                    <?php } ?>
                            </li>
                            <li>
                                <i class="icon-location"></i><a href="https://goo.gl/maps/ifmBmmd3v9Tx2SSw6">Location:<?php echo $contact['address']; ?></a>
                            </li>
                            <li>
                                <i class="icon-clock"></i><a href="<?php echo $path ?>contact-us.php">Mon - Sat: 9:00 am - 5:00 pm</a>
                            </li>
                        </ul>
                        <!-- /.contact__list -->
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
                <img src="<?php echo $path;?>assets/images/logo/logo-light.png" class="logo-light" alt="logo">
                <img src="<?php echo $path;?>admin/images/header/<?php echo $header['logo'] ;?>" class="logo-dark" alt="logo">
            </a>
            <button class="navbar-toggler" type="button">
                <span class="menu-lines"><span></span></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav ml-auto" style="margin-right:20px">
                    <?php $menustmt = "SELECT * FROM tbl_menu WHERE visibility_status=0 order by position_order"; 
                          $menus = mysqli_query($mysqli,$menustmt);
                          
                          if(mysqli_num_rows($menus)){
                             while($menu = mysqli_fetch_array($menus)){ ?>
                             <?php if($menu['page_link']== 'gallery.php'){ ?>
                                   <li class="nav__item has-dropdown">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link"><?php echo $menu['page_name'];?></a>
                                        <ul class="dropdown-menu">
                                          <li class="nav__item">
                                            <a href="<?php if($page_status=='true'){echo '../';}?>image-gallery.php" class="nav__item-link">Image Gallery</a>
                                          </li><!-- /.nav-item -->
                                          <li class="nav__item">
                                            <a href="<?php if($page_status=='true'){echo '../';}?>video-gallery.php" class="nav__item-link">Video Gallery</a>
                                          </li><!-- /.nav-item -->
                                        </ul><!-- /.dropdown-menu -->
                                    </li><!-- /.nav-item -->
                             <?php }elseif($menu['page_link'] == 'student-corner.php'){?>
                                  <li class="nav__item has-dropdown">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link <?php if($currentPage ==  $menu['page_link'] ){ echo "active"; } ?>"><?php echo $menu['page_name'];?></a>
                                        <ul class="dropdown-menu">
                                          <li class="nav__item">
                                            <a href="<?php if($page_status=='true'){echo '../';}?>achievements.php" class="nav__item-link">Achievements</a>
                                          </li>
                                          <li class="nav__item">
                                            <a href="<?php if($page_status=='true'){echo '../';}?>activity-events.php" class="nav__item-link">Activity & Events</a>
                                          </li>
                                          <li class="nav__item">
                                            <a href="<?php if($page_status=='true'){echo '../';}?>journal-club.php" class="nav__item-link">Journal Club</a>
                                          </li>
                                        </ul>
                                    </li><!-- /.nav-item -->
                               <?php }elseif($menu['page_link'] == 'cppd.php'){?>   
                               <li class="nav__item has-dropdown">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link <?php if($currentPage ==  $menu['page_link'] ){ echo "active"; } ?>"><?php echo $menu['page_name'];?></a>
                                        <ul class="dropdown-menu">
                                          <li class="nav__item">
                                            <a href="<?php if($page_status=='true'){echo '../';}?>achievements.php" class="nav__item-link">International Level Webinar</a>
                                          </li>
                                          <li class="nav__item">
                                            <a href="<?php if($page_status=='true'){echo '../';}?>activity$events.php" class="nav__item-link">National Level Webinar</a>
                                          </li>
                                          <li class="nav__item">
                                            <a href="<?php if($page_status=='true'){echo '../';}?>journalclub.php" class="nav__item-link">State Level Webinar</a>
                                          </li>
                                        </ul>
                                    </li><!-- /.nav-item -->
                                <?php }else{?> 
                                  <li class="nav__item">
                                    <a href="<?php if($page_status=='true'){echo '../';}?><?php echo $menu['page_link']; ?>"
                                    class="nav__item-link <?php if($currentPage == $menu['page_link']){ echo "active"; } ?>" 
                                   >
                                        <?php echo $menu['page_name'];?>
                                    </a>
                                </li>
                       <?php      }
                          }
                         }
                    ?>
                </ul><!-- /.navbar-nav -->
                <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
            </div><!-- /.navbar-collapse -->
             <div class="d-none d-xl-flex align-items-center position-relative ">
                <a href="appointment.php" class="btn btn__secondary btn__rounded mr-10">
                    <i class="icon-calendar"></i>
                    <span>Appointment</span>
                </a>
            </div>
        </div><!-- /.container -->
    </nav><!-- /.navabr -->
</header>