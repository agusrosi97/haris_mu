<?php
  if(isset($_POST['btn_tambah_customer']))
  {
    require '../koneksi/function.php';
    $nama_customer_add = htmlspecialchars(strip_tags($_POST['add_nama_customer']));
    $email_customer_add = strtolower(htmlspecialchars(strip_tags($_POST['add_email_customer'])));
    $notelp_customer_add = strip_tags($_POST['add_notelp_customer']);
    $dob_customer_add = htmlspecialchars(strip_tags($_POST['add_dob_customer']));
    $jk_customer_add = htmlspecialchars(strip_tags($_POST['add_jk_customer']));
    $alamat_customer_add = htmlspecialchars(strip_tags($_POST['add_alamat_customer']));
    // tanggal baru
    $new_dob_customer_add = date_format(new DateTime($dob_customer_add), "Y-m-d");
    // password
    $password_customer_add = password_hash($notelp_customer_add, PASSWORD_DEFAULT, ['cost' => 12]);
    // cek email
    $cek_email = $conn -> query("SELECT email_customer FROM tbl_customer WHERE email_customer = '$email_customer_add'");
    $row_email_terdaftar = $cek_email -> fetch_assoc();
    if ($email_customer_add != $row_email_terdaftar['email_customer']) {
      // proses tambah
      $query_customer_add = "INSERT INTO tbl_customer (nama_customer, email_customer, notelp_customer, dob_customer, jk_customer, alamat_customer, password_customer) VALUES ('$nama_customer_add','$email_customer_add','$notelp_customer_add','$new_dob_customer_add','$jk_customer_add','$alamat_customer_add','$password_customer_add')";
      if ($conn -> query($query_customer_add)) {
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