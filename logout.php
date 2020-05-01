<?php
  session_start();
  $_SESSION['loggedin'] = '';
  unset($_SESSION['loggedin']);
  session_destroy($_SESSION['loggedin']);
  header('location: login.php');
  exit();
?>