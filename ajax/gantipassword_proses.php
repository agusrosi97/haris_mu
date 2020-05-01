<?php
session_start();
$id_user = $_SESSION['loggedin'];
if (isset($_POST['submit_password'])) {
  require '../koneksi/function.php';
  $pass_lama = htmlspecialchars($_POST['old_password']);
  $new_password = htmlspecialchars($_POST['confirm_password']);
  $sql = $conn -> query("SELECT * FROM tbl_user WHERE id_user = '$id_user'");
  $row = $sql -> fetch_assoc();
  if (password_verify($pass_lama, $row['password_user'])) {
    $newest_password = password_hash($new_password, PASSWORD_DEFAULT, ['cost' => 12]);
    $query = "UPDATE tbl_user SET
      password_user = '$newest_password'
      WHERE id_user = '$id_user'";
    $conn -> query($query);
    echo "good";
  } else {
    echo "salah password";
  }
}
$conn -> close();
?>