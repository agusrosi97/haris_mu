<?php
  session_start();
  // setcookie("loggedin", "", time() - 60 * 60 * 24 * 90, '/', '', 0, 0);
  unset($_SESSION['loggedin']);
  header('location: login.php');
  exit();
?>