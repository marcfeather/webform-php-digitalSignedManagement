<?php
if(!isset($_SESSION['session_key'])){
    header("Location: login.php");
    return;
}
if(!isset($_SESSION['session_package_id'])){
    header("Location: login.php");
    return;
  }
?>