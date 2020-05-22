<?php
session_start();
if (isset($_POST['databarang'])) {
  $_SESSION['pilihbarang'] = $_POST['databarang'];
}
?>