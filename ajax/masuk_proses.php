<?php
session_start();
if (isset($_POST['submit_login'])) {
  require '../koneksi/function.php';
  $usermail = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $result = $conn -> query("SELECT * FROM tbl_customer WHERE username_customer = '$usermail' OR email_customer = '$usermail'");
  $row = $result -> fetch_assoc();
  if ($result -> num_rows === 1) {
    $id = $row['id_customer'];
    $username_ready = $row['username_customer'];
    $email_ready = $row['email_customer'];
    if (($usermail === $username_ready) OR (strtolower($usermail) == $email_ready)) {
      if (password_verify($password, $row['password_customer'])) {
        // setcookie("loggedin", $id, time() + 60 * 60 * 24 * 90, '/', '', 0, 0);
        $_SESSION['loggedin_customer'] = $id;
        echo "halo";
      } else {
        echo "salah password";
      }
    } else {
      echo "salah password";
    }
  } else {
    echo "bodong";
  }
}
$conn -> close();
?>