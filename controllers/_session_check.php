<?php
if(!isset($_SESSION['session_key'])){
    header("Location: login.php");
    return;
}
if(!isset($_SESSION['session_package_id'])){
    header("Location: login.php");
    return;
}
if(!isset($_SESSION['session_expire_date'])){
  header("Location: login.php");
  return;
}
if(!isset($_SESSION['session_countdown_date'])){
  header("Location: login.php");
  return;
}
?>