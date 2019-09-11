<?php 
  include('controllers/_session_use.php');
  include('controllers/_session_check.php');
?>

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

          <?php
            if ($_SESSION['session_package_id'] == 1) {
              echo '<div style="float: left; margin: 0; padding-top: 16px; width: 400px; color: red; font-size: 16px">
              <p>ใช้งานได้ถึงวันที่ ' . $_SESSION['session_expire_date'] . ' คงเหลือ '. $_SESSION['session_countdown_date'] . '</p>
              </div>';
            }
          ?>

          <ul class="nav navbar-nav navbar-right">
              <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="" alt=""><?php echo $_SESSION['session_username']; ?> &nbsp;&nbsp;
                      <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a data-toggle="modal" data-target="#priceUserModal"> ข้อมูลแพ็คเกจ</a></li>
                      <li>
                          <a href="login.php"><i class="fa fa-sign-out pull-right"></i> ออกจากระบบ</a>
                      </li>
                  </ul>
              </li>
          </ul>
          
      </nav>
  </div>
</div>
<!-- /top navigation -->

<div id="modal_price">
    <?php 
        include("views/price_table_user.php");
    ?>
</div>