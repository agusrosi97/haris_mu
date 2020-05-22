<?php 
if (isset($_POST['btn_tambah_barang'])) {
  require '../koneksi/function.php';
  // $foto_barang_add = $_POST['add_foto_barang'];
  $bahan_barang_add = $_POST['add_bahan_barang'];
  $jenis_barang_add = $_POST['add_jenis_barang'];
  $harga_barang_add = $_POST['add_harga_barang'];
  $keterangan_barang_add = $_POST['add_ket_barang'];
  // Tambah data
  $targetDir = "../assets/upload_image/";
  $fileName = basename($_FILES["add_foto_barang"]["name"]);
  $FileSize = $_FILES['add_foto_barang']['size'];
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
  if (!empty($fileName)) {
    if (in_array($fileType, $allowTypes)) {
      if ($FileSize <= 3000000) {
        if (move_uploaded_file($_FILES["add_foto_barang"]["tmp_name"], $targetFilePath)) {
          $query_barang_add = "INSERT INTO tbl_barang (jenis_barang, bahan_barang, harga_barang, foto_barang, keterangan_barang) VALUES ('$jenis_barang_add','$bahan_barang_add','$harga_barang_add','$fileName','$keterangan_barang_add')";
          $conn -> query($query_barang_add);
          echo "Sukses";
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
    echo "upload gambar";
  }
}
$conn -> close();
?>