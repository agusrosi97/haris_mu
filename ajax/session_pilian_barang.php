<?php
session_start();
if(empty($_SESSION['pilihbarang'])):
  header('Location:../welcome.php');
endif;
if (isset($_POST['btn_simpan_pesanan']))
{
  $jenis_barang = $_POST['inp_jenis_barang'];
  $bahan_barang = $_POST['inp_bahan_barang'];
  $pesanan = implode(', ', $_POST['inp_pesanan_untuk']);
  $ukuran = implode(', ', $_POST['inp_ukuran_barang']);
  $pcs = implode(', ', $_POST['inp_pcs_barang']);
  $total_pcs = $_POST['inp_total_pcs'];
  $warna = $_POST['inp_warna_barang'];
  $foto_desain = $_POST['inp_foto_desain'];
  $foto_item = $_POST['inp_foto_barang'];
  $harga = $_POST['inp_total_harga'];
  // PINDAH SEMENTARA FOTO DESAIN;
  $targetDir = "../assets/upload_foto_desain/";
  $foto_desain_customer = basename($_FILES["foto_desain_customer"]["name"]);
  $targetFilePath = $targetDir . $foto_desain_customer;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
  if (!empty($foto_desain_customer)) {
    if (in_array($fileType, $allowTypes)) {
      if (move_uploaded_file($_FILES["foto_desain_customer"]["tmp_name"], $targetFilePath)) {
        $_SESSION['pilihan_barang'] = array();
        $_SESSION['pilihan_barang']['jenis_barang'] = $jenis_barang;
        $_SESSION['pilihan_barang']['pesanan_untuk'] = $pesanan;
        $_SESSION['pilihan_barang']['bahan_barang'] = $bahan_barang;
        $_SESSION['pilihan_barang']['ukuran_barnag'] = $ukuran;
        $_SESSION['pilihan_barang']['psc'] = $pcs;
        $_SESSION['pilihan_barang']['warna'] = $warna;
        $_SESSION['pilihan_barang']['foto_desain'] = $foto_desain;
        $_SESSION['pilihan_barang']['foto_item'] = $foto_item;
        $_SESSION['pilihan_barang']['total_harga'] = $harga;
        $_SESSION['pilihan_barang']['total_pcs'] = $total_pcs;
        header('location:../pembayaran.php');
      } else {
        echo "<!DOCTYPE html>
        <html>
        <head>
          <meta http-equiv='X-UA-Compatible' content='IE=edge' />
          <title>Sindycart - Warning</title>
          <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
          <link rel='icon' href='../assets/img/icon.ico' type='image/x-icon' />
          <link rel='stylesheet' href='../assets/css/bootstrap.min.css'>
        </head>
        <body>
        <script src='../assets/js/core/jquery.3.2.1.min.js'></script>
        <script src='../assets/js/core/popper.min.js'></script>
        <script src='../assets/js/core/bootstrap.min.js'></script>
        <script src='../assets/js/plugin/sweetalert/sweetalert.min.js'></script>
          <script type='text/javascript'>
            Swal.fire({
              icon: 'error',
              title: 'Gagal!',
              text: 'Terjadi masalah.',
              showConfirmButton: false,
              timer: 3000
            })
              .then(function() {
              window.location.href = '../pilihan_barang.php';
            })
          </script>
        </body>
        </html>";
      }
    } else {
      echo "<!DOCTYPE html>
      <html>
      <head>
        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <title>Sindycart - Warning</title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel='icon' href='../assets/img/icon.ico' type='image/x-icon' />
        <link rel='stylesheet' href='../assets/css/bootstrap.min.css'>
      </head>
      <body>
      <script src='../assets/js/core/jquery.3.2.1.min.js'></script>
      <script src='../assets/js/core/popper.min.js'></script>
      <script src='../assets/js/core/bootstrap.min.js'></script>
      <script src='../assets/js/plugin/sweetalert/sweetalert.min.js'></script>
        <script type='text/javascript'>
          Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Terjadi masalah.',
            showConfirmButton: false,
            timer: 3000
          })
            .then(function() {
            window.location.href = '../pilihan_barang.php';
          })
        </script>
      </body>
      </html>";
    }
  } else {
    $_SESSION['pilihan_barang'] = array();
    $_SESSION['pilihan_barang']['jenis_barang'] = $jenis_barang;
    $_SESSION['pilihan_barang']['pesanan_untuk'] = $pesanan;
    $_SESSION['pilihan_barang']['bahan_barang'] = $bahan_barang;
    $_SESSION['pilihan_barang']['ukuran_barnag'] = $ukuran;
    $_SESSION['pilihan_barang']['psc'] = $pcs;
    $_SESSION['pilihan_barang']['warna'] = $warna;
    $_SESSION['pilihan_barang']['foto_desain'] = $foto_desain;
    $_SESSION['pilihan_barang']['foto_item'] = $foto_item;
    $_SESSION['pilihan_barang']['total_harga'] = $harga;
    $_SESSION['pilihan_barang']['total_pcs'] = $total_pcs;
    header('location:../pembayaran.php');
  }
}
?>