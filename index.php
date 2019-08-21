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

    <title>CVM - CORETERA</title>
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-home"></i> <span>ระบบจัดการข้อมูล</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Decive id : 123456789</h3>
                <h3>เมนู</h3>
                <ul class="nav side-menu" style="font-size: 16px;">
                    <li id="menu1"><a><i class="fa fa-image"></i> รูปภาพ </span></a>
                    </li>
                    <li id="menu2"><a><i class="fa fa-upload"></i> อัพโหลดรูป </span></a>
                    </li>
                    <li id="menu3"><a><i class="fa fa-upload"></i> อัพโหลดไฟล์ zip </span></a>
                    </li>
                </ul>
              </div>

              <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                  <p style="margin-left:15px">Version 1.0</p>
              </div>
              <!-- /menu footer buttons -->
            </div>

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
          <div id="panelMenu1">
            <?php include("media_gallery.php");?>
          </div>
          <div id="panelMenu2" style="display:none">
            <?php include("media_upload.php");?>
          </div>
          <div id="panelMenu3" style="display:none">
            <?php include("zip_upload.php");?>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <!-- <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div> -->
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Dropzone.js -->
    <script src="vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- Addition Scripts -->
    <script src="script/index.js"></script>
  </body>
</html>