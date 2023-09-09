<!DOCTYPE html>
<html lang="en">

<?php 
include("admin/includes/connection.php");
include("admin/includes/function.php");
include_once "head.php";
?>
<style>
/*    .wrapper {*/
/*  margin-top: 5vh;*/
/*}*/

.dataTables_filter {
  float: right;
}

.table-hover > tbody > tr:hover {
  background-color: #ccffff;
}

@media only screen and (min-width: 768px) {
  .table {
    table-layout: fixed;
    max-width: 100% !important;
  }
}

thead {
  background: #ddd;
}

.table td:nth-child(2) {
  overflow: hidden;
  text-overflow: ellipsis;
}

.highlight {
  background: #ffff99;
}

@media only screen and (max-width: 767px) {
  /* Force table to not be like tables anymore */
  table,
thead,
tbody,
th,
td,
tr {
    display: block;
  }

  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr,
tfoot tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50% !important;
  }

  td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
  }

  .table td:nth-child(1) {
    background: #ccc;
    height: 100%;
    top: 0;
    left: 0;
    font-weight: bold;
  }

  /*
  Label the data
  */
  td:nth-of-type(1):before {
    content: "Name";
  }

  td:nth-of-type(2):before {
    content: "Position";
  }

  td:nth-of-type(3):before {
    content: "Office";
  }

  td:nth-of-type(4):before {
    content: "Age";
  }

  td:nth-of-type(5):before {
    content: "Start date";
  }

  td:nth-of-type(6):before {
    content: "Salary";
  }

  .dataTables_length {
    display: none;
  }
}
</style>
<!-- Bootstrap 5 CSS -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">-->
<!-- Data Table CSS -->
<!--<link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>-->
<!-- Font Awesome CSS -->
<!--<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>-->
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
    <section class="page-title page-title-layout5 bg-overlay">
      <div class="bg-img"><img src="admin/images/pageBanner/<?php echo PAGE_BANNER_IMAGE ?>" alt="<?php echo PAGE_BANNER_ALT_TAG ?>"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading">Journal Club</h1>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Journal Club</li>
              </ol>
            </nav>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
      Blog Grid
    ========================= -->
    <section class="blog-grid">
      <div class="container">
        <div class="row">
         
           <!-- Post Item #1 -->
          <div class="col-sm-12 col-md-12 col-lg-12">
           <table id="example" class="table table-striped" style="width:100%">
               
                                    <div class="row">
                                        <div class="col-md-6">
                                        <h5 class="heading__title" style="color:#29156e !important"><span>Journal Club</span></h5>
                                        </div>
                                        
                                        <!--<div class="col-md-6">-->
                                           
                                        <!--    <div id="wrap">-->
                                        <!--      <form action="https://www.shreyaspharmaceuticals.com/our-products" autocomplete="on">-->
                                        <!--      <input id="search" name="search" type="text" value="" placeholder="Search Product Here...">-->
                                        <!--      <input id="" value="" type="submit">-->
                                        <!--      </form>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                              
        <thead>
            <tr>
                <th>SR NO</th>
                <th>NAME OF PRESENTER</th>
                <th>TOPIC</th>
                <th>DATE</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
             $journalstmt = "SELECT * FROM tbl_journal_club";
             $journals = mysqli_query($mysqli,$journalstmt);
             $j=1;
             while($journal = mysqli_fetch_assoc($journals)){
             ?>
            <tr>
                <td><?php echo $j; ?></td>
                <td><?php echo $journal['presenter']; ?></td>
                <td><?php echo $journal['topic']; ?></td>
                <td><?php echo date("d-m-Y", strtotime($journal['perform_date'])); ?></td>
                <td><a href="admin/images/journal/<?php echo $journal['file']; ?>" target="_black">View Detail</a></td>
            </tr>
            <?php
            $j++;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>SR NO</th>
                <th>NAME OF PRESENTER</th>
                <th>TOPIC</th>
                <th>DATE</th>
                <th>Details</th>
            </tr>
        </tfoot>
    </table>
          </div>
       
         
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.blog Grid -->
  
  <!-- jQuery -->

<script>

    $(document).ready(function() {
    $('#example').DataTable({
      //disable sorting on last column
      "columnDefs": [
        { "orderable": false, "targets": 5 }
      ],
      language: {
        //customize pagination prev and next buttons: use arrows instead of words
        'paginate': {
          'previous': '<span class="fa fa-chevron-left"></span>',
          'next': '<span class="fa fa-chevron-right"></span>'
        },
        //customize number of elements to be displayed
        // "lengthMenu": 'Display <select class="form-control input-sm">'+
        // '<option value="10">10</option>'+
        // '<option value="20">20</option>'+
        // '<option value="30">30</option>'+
        // '<option value="40">40</option>'+
        // '<option value="50">50</option>'+
        // '<option value="-1">All</option>'+
        // '</select> results'
      }
    })  
} );
</script>
<!--<script src='https://code.jquery.com/jquery-3.7.0.js'></script>-->
<!-- Data Table JS -->
<!--<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>-->
<!--<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>-->
<!--<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>  -->
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