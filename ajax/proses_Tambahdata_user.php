<?php
  if(isset($_POST['btn_tambah_user']))
  {
    require '../koneksi/function.php';
    $nama_user_add = htmlspecialchars(strip_tags($_POST['add_nama_user']));
    $email_user_add = strtolower(htmlspecialchars(strip_tags($_POST['add_email_user'])));
    $notelp_user_add = strip_tags($_POST['add_notelp_user']);
    $dob_user_add = htmlspecialchars(strip_tags($_POST['add_dob_user']));
    $jk_user_add = htmlspecialchars(strip_tags($_POST['add_jk_user']));
    $alamat_user_add = htmlspecialchars(strip_tags($_POST['add_alamat_user']));
    $hak_akses_user_add = htmlspecialchars(strip_tags($_POST['add_hak_akses_user']));
    $status_user_add = htmlspecialchars(strip_tags($_POST['add_status_user']));
    // tanggal baru
    $new_dob_user_add = date_format(new DateTime($dob_user_add), "Y-m-d");
    // password
    $password_user_add = password_hash($notelp_user_add, PASSWORD_DEFAULT, ['cost' => 12]);
    // cek email
    $cek_email = $conn -> query("SELECT email_user FROM tbl_user WHERE email_user = '$email_user_add'");
    $row_email_terdaftar = $cek_email -> fetch_assoc();
    if ($email_user_add != $row_email_terdaftar['email_user']) {
      // proses tambah
      $query_user_add = "INSERT INTO tbl_user (nama_user, email_user, notelp_user, dob_user, jk_user, alamat_user, password_user, hak_akses_user, status_user) VALUES ('$nama_user_add','$email_user_add','$notelp_user_add','$new_dob_user_add','$jk_user_add','$alamat_user_add','$password_user_add','$hak_akses_user_add','$status_user_add')";
      if ($conn -> query($query_user_add)) {
        echo 'Sukses';
        return $conn -> affected_rows;
      } else {
        echo "Gagal";
      }
    } else {
      echo "email terdaftar";
    }
  }
  $conn -> close();
?>