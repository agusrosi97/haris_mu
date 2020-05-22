<?php 
if (isset($_POST['btn_sisa_pembayaran'])) {
  require '../koneksi/function.php';
  date_default_timezone_set('Asia/Makassar');
  $jam_transaksi = date('Y-m-d H:i:s a', time());
  $bank = $_POST['bank'];
  $id_transaksi = $_POST['id_transaksi'];
  // CEK FOTO
  $targetDir = "../assets/upload_foto_transaksi/";
  $foto = basename($_FILES['inp_foto_sisa_transaksi']['name']);
  $targetFilePath = $targetDir . $foto;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
  // JIKA PHPMAILER
  // $query_sisa = $conn->query("
  //   SELECT tbl_pesanan.*, tbl_barang.*, tbl_customer.*, tbl_user.*, tbl_transaksi_pembayaran.*
  //   FROM tbl_pesanan
  //   LEFT JOIN tbl_barang ON tbl_pesanan.id_barang = tbl_barang.id_barang
  //   LEFT JOIN tbl_customer ON tbl_pesanan.id_customer = tbl_customer.id_customer
  //   LEFT JOIN tbl_user ON tbl_pesanan.id_user = tbl_user.id_user
  //   LEFT JOIN tbl_transaksi_pembayaran ON tbl_pesanan.id_transaksi_pembayaran = tbl_transaksi_pembayaran.id_transaksi_pembayaran
  //   WHERE tbl_pesanan.id_transaksi_pembayaran = '".$id_transaksi."'
  // ");
  // $row_sisa_transaksi = $query_sisa->fetch_assoc();
  // echo $row_sisa_transaksi['email_customer'];
  if (in_array($fileType, $allowTypes)) {
    if (move_uploaded_file($_FILES["inp_foto_sisa_transaksi"]["tmp_name"], $targetFilePath)) {
     $query_simpan_sisa_transaksi = "
      UPDATE tbl_transaksi_pembayaran
      SET
      foto_bukti_transaksi = '".$foto."',
      sisa_pembayaran = '0',
      bank_pilihan = '".$bank."',
      jam_transaksi_sisa_pembayaran = '".$jam_transaksi."'
      WHERE id_transaksi_pembayaran = '".$id_transaksi."'
      ";
      if ($conn->query($query_simpan_sisa_transaksi)) {
        echo "Sukses";
      } else {
        echo "gagal";
      }
    } else {
      echo "Error";
    }    
  } else {
    echo "bukan gambar";
  }
}else{
  echo "Error";
}
?>