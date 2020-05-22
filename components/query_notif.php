<?php
if (!empty($_SESSION['loggedin_customer'])) :
$notif_pesanan = $conn -> query("
  SELECT tbl_pesanan.*, tbl_transaksi_pembayaran.* 
  FROM tbl_pesanan
  LEFT JOIN tbl_transaksi_pembayaran ON tbl_pesanan.id_transaksi_pembayaran = tbl_transaksi_pembayaran.id_transaksi_pembayaran
  WHERE tbl_pesanan.id_customer = '".$id_customer."' AND tbl_transaksi_pembayaran.sisa_pembayaran > 0");
$count = $notif_pesanan->num_rows;
endif;
?>