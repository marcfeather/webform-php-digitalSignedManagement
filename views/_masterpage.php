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
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- page_share and page content -->
        <div id="page_share">
            <?php 
              if (isset($page_share)) {
                include($page_share);
              }
            ?>
        </div>

        <!-- <div class="right_col" role="main">-->
        <div id="page_content">
          <?php 
            if (isset($page_share)) {
              echo "<div class='right_col' role='main'> ";
                if (isset($page_content)) { 
                  include($page_content); 
                }
              echo "</div>";
              include('_footer.php');
            }else if (isset($page_content)) {
              include($page_content);
            }
          ?>
        </div>
        <!-- /page_share and page content -->

        <!-- modal loading -->
        <div id="modalLoading">
            <?php include('_modal_loading.php');?>
        </div>
        <!-- /modal loading -->

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
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>

    <?php 
      if (!isset($page_share)) {
          echo "<script src='script/login.js'></script>";
      }
    ?>

  </body>
</html>