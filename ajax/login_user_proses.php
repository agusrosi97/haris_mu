<?php
session_start();
if (isset($_POST['submit_login'])) {
  require '../koneksi/function.php';
  $usermail = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $result = $conn -> query("SELECT * FROM tbl_user WHERE username_user = '$usermail' OR email_user = '$usermail'");
  $row = $result -> fetch_assoc();
  if ($result -> num_rows === 1) {
    $id = $row['id_user'];
    $username_ready = $row['username_user'];
    $email_ready = $row['email_user'];
    if (($usermail === $username_ready) OR (strtolower($usermail) == $email_ready)) {
      if (password_verify($password, $row['password_user'])) {
        // setcookie("loggedin", $id, time() + 60 * 60 * 24 * 90, '/', '', 0, 0);
        $_SESSION['loggedin'] = $id;
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