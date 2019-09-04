<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- no cache browser-->
    <meta http-equiv="expires" content="Mon, 26 Jul 1997 05:00:00 GMT"/> 
    <meta http-equiv="pragma" content="no-cache" />

    <title>DSM - CORETERA</title>
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Datatable -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-laptop"></i> <span>ระบบจัดการข้อมูล</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar">
              <?php include('_sidebar.php');?>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <nav>
                  <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
              </nav>
          </div>
      </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div id="page_content">
            <?php include($page_content);?>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- <div id="footer">
          <?php include('_footer.php');?>
        </div> -->
        <!-- /footer content -->

        <button onclick="topFunction()" id="BtnGoToTop" title="Go to top">Top</button>

      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Datatable -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>

  </body>
</html>