<?php 
if (isset($_POST['btn-simpan-edit-barang'])) {
  require '../koneksi/function.php';
  $id_barang = $_POST['edt_id_barang'];
  $bahan_barang_edt = htmlspecialchars(strip_tags($_POST['edt_bahan_barang']));
  $jenis_barang_edt = htmlspecialchars(strip_tags($_POST['edt_jenis_barang']));
  $harga_barang_edt = htmlspecialchars(strip_tags($_POST['edt_harga_barang']));
  $foto_barang_lama = htmlspecialchars(strip_tags($_POST['foto_barang_lama']));
  $keterangan_barang_edt = htmlspecialchars(strip_tags($_POST['edt_ket_barang']));
  // Edit data
  $targetDir = "../assets/upload_image/";
  $fileName = basename($_FILES["edt_foto_barang"]["name"]);
  $FileSize = $_FILES['edt_foto_barang']['size'];
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
  if (!empty($fileName)) {
    if (in_array($fileType, $allowTypes)) {
      if ($FileSize <= 3000000) {
        if (move_uploaded_file($_FILES["edt_foto_barang"]["tmp_name"], $targetFilePath)) {
          $query_barang_edt = "UPDATE tbl_barang SET
            jenis_barang = '$jenis_barang_edt',
            bahan_barang = '$bahan_barang_edt',
            harga_barang = '$harga_barang_edt',
            foto_barang = '$fileName',
            keterangan_barang = '$keterangan_barang_edt'
            WHERE id_barang = '$id_barang'";
          $conn -> query($query_barang_edt);
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
    $query_barang_edt = "UPDATE tbl_barang SET
      jenis_barang = '$jenis_barang_edt',
      bahan_barang = '$bahan_barang_edt',
      harga_barang = '$harga_barang_edt',
      foto_barang = '$foto_barang_lama',
      keterangan_barang = '$keterangan_barang_edt'
      WHERE id_barang = '$id_barang'";
    $conn -> query($query_barang_edt);
    echo "Sukses";
    return $conn -> affected_rows;
  }
}
$conn -> close();
?>