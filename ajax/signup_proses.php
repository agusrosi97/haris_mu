<?php
session_start();
require '../koneksi/function.php';
if (isset($_POST['submit_signup'])) {
  $namedisplay = htmlspecialchars($_POST['namedisplay']);
  $email = htmlspecialchars($_POST['email']);
  $confirmpassword = htmlspecialchars($_POST['confirmpassword']);
  $result = $conn -> query("SELECT * FROM tbl_customer WHERE email_customer = '$email' OR username_customer = '$namedisplay'");
  $row = $result -> fetch_assoc();
  if ($result -> num_rows > 0) {
    if ($namedisplay == $row['username_customer'] AND $email == $row['email_customer']) {
      echo "sama semua";
    } elseif ($namedisplay == $row['username_customer']) {
      echo "username sama";
    } elseif ($email == $row['email_customer']) {
      echo "email sama";
    }
  } else {
    $hash_password = password_hash($confirmpassword, PASSWORD_DEFAULT, ['cost' => 12]);
    $sql = "INSERT INTO tbl_customer VALUES(null,null,'$email',null,null,'$namedisplay','$hash_password',null,null,null)";
    $conn -> query($sql);
    // $get_current = $conn -> query("SELECT * FROM tbl_customer WHERE username_customer = '$namedisplay'");
    // if ($get_current -> num_rows > 0) {
    //   $row_curr = $get_current -> fetch_assoc();
    //   // setcookie("loggedin", $row_curr['id_customer'], time() + 60 * 60 * 24 * 90, '/', '', 0, 0);
    //   // $_SESSION['loggedin_customer'] = $row_curr['id_customer'];
    // }
    echo "yeah";
    return $conn -> affected_rows;
  }
}
$conn -> close();
?>