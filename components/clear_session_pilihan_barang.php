<?php
  session_start();
  $_SESSION['pilihan_barang'] = '';
  $_SESSION['pilihan_barang']['jenis_barang'] = '';
  $_SESSION['pilihan_barang']['pesanan_untuk'] = '';
  $_SESSION['pilihan_barang']['ukuran_barnag'] = '';
  $_SESSION['pilihan_barang']['psc'] = '';
  $_SESSION['pilihan_barang']['warna'] = '';
  $_SESSION['pilihan_barang']['foto_desain'] = '';
  $_SESSION['pilihan_barang']['foto_item'] = '';
  $_SESSION['pilihan_barang']['total_harga'] = '';
  unset($_SESSION['pilihan_barang'], $_SESSION['pilihan_barang']['jenis_barang'], $_SESSION['pilihan_barang']['pesanan_untuk'], $_SESSION['pilihan_barang']['ukuran_barnag'], $_SESSION['pilihan_barang']['psc'], $_SESSION['pilihan_barang']['warna'], $_SESSION['pilihan_barang']['foto_desain'], $_SESSION['pilihan_barang']['foto_item'], $_SESSION['pilihan_barang']['total_harga']);
  session_destroy($_SESSION['pilihan_barang']);
  header('location:../pilihan_barang.php');
  exit();
?>