<?php
session_start();
$id_customer = $_SESSION['loggedin'];
require '../koneksi/function.php';
if (isset($_POST['submit_password'])) {
  $pass_lama = htmlspecialchars($_POST['old_password']);
  $new_password = htmlspecialchars($_POST['confirm_password']);
  $sql = $conn -> query("SELECT * FROM tbl_customer WHERE id_customer = '$id_customer'");
  $row = $sql -> fetch_assoc();
  if (password_verify($pass_lama, $row['password_customer'])) {
    $newest_password = password_hash($new_password, PASSWORD_DEFAULT, ['cost' => 12]);
    $query = "UPDATE tbl_customer SET
      password_customer = '$newest_password'
      WHERE id_customer = '$id_customer'";
    $conn -> query($query);
    echo "good";
  } else {
    echo "salah password";
  }
}
$conn -> close();
?>