<?php 
  if (session_status() == PHP_SESSION_NONE) { session_start();}
  
  if(!isset($_SESSION['session_key'])){
    header("Location: login.php");
    return;
  }
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

          <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="" alt=""><?php echo $_SESSION['session_username']; ?> &nbsp;&nbsp;
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
          
      </nav>
  </div>
</div>
<!-- /top navigation -->