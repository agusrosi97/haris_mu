<?php
  if (isset($_POST['btn-simpan-edit-user'])) {
    require '../koneksi/function.php';
    $id_user_edt = $_POST['edt_id_user'];
    $nama_user_edt = htmlspecialchars(strip_tags($_POST['edt_nama_user']));
    $email_user_edt = strtolower(htmlspecialchars(strip_tags($_POST['edt_email_user'])));
    $notelp_user_edt = htmlspecialchars(strip_tags($_POST['edt_notelp_user']));
    $dob_user_edt = htmlspecialchars(strip_tags($_POST['edt_dob_user']));
    $jk_user_edt = htmlspecialchars(strip_tags($_POST['edt_jk_user']));
    $alamat_user_edt = htmlspecialchars(strip_tags($_POST['edt_alamat_user']));
    $hak_akses_user_edt = htmlspecialchars(strip_tags($_POST['edt_hak_akses_user']));
    $status_user_edt = htmlspecialchars(strip_tags($_POST['edt_status_user']));
    // tanggal baru
    $new_dob_user = date_format(new DateTime($dob_user_edt), "Y-m-d");
    // cek email terdaftar
    $cek_email = $conn -> query ("SELECT email_user FROM tbl_user WHERE email_user = '$email_user_edt'");
    $row_proses_edit = $cek_email -> fetch_assoc();
    // cek email milik sendiri
    $cek_email_sendiri = $conn -> query ("SELECT email_user FROM tbl_user WHERE id_user = '$id_user_edt'");
    $row_email_sendiri = $cek_email_sendiri -> fetch_assoc();
    // proses ubah data
    if (($email_user_edt != $row_proses_edit['email_user']) OR ($email_user_edt == $row_email_sendiri['email_user'])) {
      $query_user_edt = "UPDATE tbl_user SET
                          nama_user = '$nama_user_edt',
                          email_user = '$email_user_edt',
                          notelp_user = '$notelp_user_edt',
                          dob_user = '$new_dob_user',
                          jk_user = '$jk_user_edt',
                          alamat_user = '$alamat_user_edt',
                          hak_akses_user = '$hak_akses_user_edt',
                          status_user = '$status_user_edt'
                          WHERE id_user = '$id_user_edt'";
      $conn->query($query_user_edt);
      echo "Sukses";
      return $conn -> affected_rows;
    } else {
      echo "email sudah terdaftar";
    }
  }
  $conn -> close();
?>