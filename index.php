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
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
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
              <a href="index.php" class="site_title"><i class="fa fa-home"></i> <span>ระบบจัดการข้อมูล</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>Decive id : 123456789</h3> -->
                <h3>เมนู</h3>
                <ul class="nav side-menu" style="font-size: 16px;">
                    <!-- <li id="menu11"><a><i class="fa fa-tablet"></i>อุปกรณ์</span></a>
                    </li> -->
                    <li>
                        <a><i class="fa fa-tablet"></i>อุปกรณ์<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li id="menu11"><a href="index.php"><i class="fa fa-list-alt"></i>รายการอุปกรณ์</a></li>
                            <li id="menu12"><a><i class="fa fa-th-list"></i>กลุ่มอุปกรณ์</a></li>
                        </ul>
                    </li>
                    <li id="menu31"><a><i class="fa fa-html5"></i>ข้อมูลรูปแบบ HTML</span></a>
                    </li>
                    <!-- <li>
                        <a><i class="fa fa-android"></i>ข้อมูลรูปแบบ Native<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li id="menu21"><a><i class="fa fa-image"></i>Gallery</a></li>
                            <li id="menu22"><a><i class="fa fa-upload"></i>Upload Images</a></li>
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a><i class="fa fa-html5"></i>ข้อมูลรูปแบบ HTML<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li id="menu31"><a><i class="fa fa-desktop"></i>Demo</a></li>
                            <li id="menu32"><a><i class="fa fa-file-archive-o"></i>Upload zip</a></li>
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a><i class="fa fa-film"></i>Screen Server<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li id="menu41"><a><i class="fa fa-play-circle"></i>Simple</a></li>
                            <li id="menu42"><a><i class="fa fa-file-video-o"></i>Upload video</a></li>
                        </ul>
                    </li> -->
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
          <div id="panelMenu11">
            <?php include("views/device_list.php");?>
          </div>
          <div id="panelMenu12" style="display:none">
            <?php include("views/device_group.php");?>
          </div>
          <div id="panelMenu21" style="display:none">
            <?php include("views/native_image_gallery.php");?>
          </div>
          <div id="panelMenu22" style="display:none">
            <?php include("views/native_image_upload.php");?>
          </div>
          <div id="panelMenu31" style="display:none">
            <?php include("views/html_zip_list.php");?>
          </div>
          <div id="panelMenu32" style="display:none">
            <?php include("views/html_zip_upload.php");?>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <!-- <div class="pull-right">
            Coretera <a href="http://www.coretera.co.th">coretera</a>
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
    <!-- Datatable -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <?php 
    if (isset($_GET['id'])) {
      $menu = intval($_GET['id']);
    }else {
      $menu = 0;
    }

    if (isset($_GET['err'])) {
      $error = intval($_GET['err']);
    }else {
      $error = 0;
    }
    ?>
    <script> 
      var menu = "<?php echo $menu; ?>";
      var error = "<?php echo $error; ?>";
    </script>

    <!-- Addition Scripts -->
    <script src="script/index.js"></script>
    <script src="script/device_group.js"></script>
    <script src="script/html_zip_list.js"></script>
  </body>
</html>