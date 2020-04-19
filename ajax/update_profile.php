<?php
session_start();
$id_user = $_SESSION['loggedin'];
require '../koneksi/function.php';
if (isset($_POST['submit'])) {
  $nama_user = htmlspecialchars($_POST['nama_customer']);
  $email_user = htmlspecialchars($_POST['email_customer']);
  $dob_user = htmlspecialchars($_POST['dob_customer']);
  $jk_user = htmlspecialchars($_POST['jk_customer']);
  $notelp_user = htmlspecialchars($_POST['notelp_customer']);
  $alamat_user = htmlspecialchars($_POST['alamat_customer']);
  $newDate = date_format(new Datetime($dob_user), "Y-m-d");
  $username_user_input = htmlspecialchars($_POST['username_user']);

  $cek_username_lama = $conn -> query("SELECT username_customer FROM tbl_customer WHERE id_customer = '$id_user'");
  $row_username_lama = $cek_username_lama -> fetch_assoc();
  $username_lama = $row_username_lama['username_customer'];

  $cek_username = $conn -> query("SELECT username_customer FROM tbl_customer WHERE username_customer = '$username_user_input'");
  $row_username_sudah_ada = $cek_username -> fetch_array();
  $username_ada = $row_username_sudah_ada['username_customer'];

  $targetDir = "../assets/upload_image/";
  $fileName = basename($_FILES["foto_customer"]["name"]);
  $FileSize = $_FILES['foto_customer']['size'];
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

  if (($username_user_input === $username_lama) OR ($username_user_input !== $username_ada)) {
    if (!empty($fileName)) {
      if (in_array($fileType, $allowTypes)) {
        if ($FileSize <= 3000000) {
          if (move_uploaded_file($_FILES["foto_customer"]["tmp_name"], $targetFilePath)) {
            // Ganti USER
            $sql = "UPDATE tbl_customer SET
              nama_customer = '$nama_user',
              email_customer = '$email_user',
              dob_customer = '$newDate',
              jk_customer = '$jk_user',
              notelp_customer = '$notelp_user',
              alamat_customer = '$alamat_user',
              username_customer = '$username_user_input',
              foto_customer = '$fileName'
              WHERE id_customer = '$id_user'";
            $conn -> query($sql);
            echo "success";
            return $conn -> affected_rows;
          } else {
            echo "alamat salah";
          }
        } else {
          echo "ukuran besar";
        }
      } else {
        echo "bukan gambar";
      }
    } else {
      $sql = "UPDATE tbl_customer SET
        nama_customer = '$nama_user',
        email_customer = '$email_user',
        dob_customer = '$newDate',
        jk_customer = '$jk_user',
        username_customer = '$username_user_input',
        notelp_customer = '$notelp_user',
        alamat_customer = '$alamat_user'
        WHERE id_customer = '$id_user'";
      $conn -> query($sql);
      echo "success";
      return $conn -> affected_rows;
    }
  } else {
    echo "username ada";
  }
}
$conn -> close();
?>