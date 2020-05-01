<?php
  session_start();
  // setcookie("loggedin", "", time() - 60 * 60 * 24 * 90, '/', '', 0, 0);
  $_SESSION['loggedin_customer'] = '';
  unset($_SESSION['loggedin_customer']);
  session_destroy($_SESSION['loggedin_customer']);
  header('location: welcome.php');
  exit();
?>