<?php
  if (session_status() == PHP_SESSION_NONE) { session_start(); session_destroy(); }

  $page_content = "views/login_page.php";
  include("views/_masterpage.php");
?>