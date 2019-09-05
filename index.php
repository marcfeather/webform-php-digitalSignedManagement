<?php
  if (session_status() == PHP_SESSION_NONE) { session_start();}

  if(!isset($_SESSION['session_key'])){
    include("login.php");

  }else {
    include("11.php");
  }
?>