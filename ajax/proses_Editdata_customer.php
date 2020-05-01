<?php
  if (isset($_POST['btn-simpan-edit-customer'])) {
    require '../koneksi/function.php';
    $id_customer_edt = $_POST['edt_id_customer'];
    $nama_customer_edt = htmlspecialchars(strip_tags($_POST['edt_nama_customer']));
    $email_customer_edt = strtolower(htmlspecialchars(strip_tags($_POST['edt_email_customer'])));
    $notelp_customer_edt = htmlspecialchars(strip_tags($_POST['edt_notelp_customer']));
    $dob_customer_edt = htmlspecialchars(strip_tags($_POST['edt_dob_customer']));
    $jk_customer_edt = htmlspecialchars(strip_tags($_POST['edt_jk_customer']));
    $alamat_customer_edt = htmlspecialchars(strip_tags($_POST['edt_alamat_customer']));
    // tanggal baru
    $new_dob_customer = date_format(new DateTime($dob_customer_edt), "Y-m-d");
    // cek email terdaftar
    $cek_email = $conn -> query ("SELECT email_customer FROM tbl_customer WHERE email_customer = '$email_customer_edt'");
    $row_proses_edit = $cek_email -> fetch_assoc();
    // cek email milik sendiri
    $cek_email_sendiri = $conn -> query ("SELECT email_customer FROM tbl_customer WHERE id_customer = '$id_customer_edt'");
    $row_email_sendiri = $cek_email_sendiri -> fetch_assoc();
    // proses ubah data
    if (($email_customer_edt != $row_proses_edit['email_customer']) OR ($email_customer_edt == $row_email_sendiri['email_customer'])) {
      $query_customer_edt = "UPDATE tbl_customer SET
                          nama_customer = '$nama_customer_edt',
                          email_customer = '$email_customer_edt',
                          notelp_customer = '$notelp_customer_edt',
                          dob_customer = '$new_dob_customer',
                          jk_customer = '$jk_customer_edt',
                          alamat_customer = '$alamat_customer_edt'
                          WHERE id_customer = '$id_customer_edt'";
      $conn->query($query_customer_edt);
      echo "Sukses";
      return $conn -> affected_rows;
    } else {
      echo "email sudah terdaftar";
    }
  }
  $conn -> close();
?>