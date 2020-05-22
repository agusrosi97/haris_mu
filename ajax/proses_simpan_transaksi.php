<?php 
session_start();
if (isset($_POST['btn_proses_transaksi'])) {
  require '../koneksi/function.php';
  date_default_timezone_set('Asia/Makassar');
  $jam_transaksi = date('Y-m-d H:i:s a', time());
  // ID CUSTOMER
  $id_customer = $_SESSION['loggedin_customer'];
  // ID BARANG
  $id_barang = $_SESSION['pilihbarang'];
  // DATA BARANG
  $jenis_barang = $_SESSION['pilihan_barang']['jenis_barang'];
  $pesanan = $_SESSION['pilihan_barang']['pesanan_untuk'];
  $ukuran = $_SESSION['pilihan_barang']['ukuran_barnag'];
  $bahan_barang = $_SESSION['pilihan_barang']['bahan_barang'];
  $pcs = $_SESSION['pilihan_barang']['psc'];
  $warna = $_SESSION['pilihan_barang']['warna'];
  $foto_desain = $_SESSION['pilihan_barang']['foto_desain'];
  $foto_item = $_SESSION['pilihan_barang']['foto_item'];
  $harga = $_SESSION['pilihan_barang']['total_harga'];
  $total_pcs = $_SESSION['pilihan_barang']['total_pcs'];
  // DATA DARI FORM
  $sisa_bayar = $_POST['sisa_bayar'];
  $metode_pembayaran = htmlspecialchars($_POST['metode_pembayaran']);
  $bank = htmlspecialchars($_POST['bank']);
  $nomor_telepon = htmlspecialchars(strip_tags($_POST['inp_telepon_customer']));
  // SELECT CUSTOMER
  $cari_customer = $conn->query("SELECT * FROM tbl_customer WHERE id_customer = '".$id_customer."'");
  $row_customer = $cari_customer->fetch_assoc();
  $cek_nomor_hp = $row_customer['notelp_customer'];
  // PROSES CEK FOTO TRANSAKSI
  $targetDir = "../assets/upload_foto_transaksi/";
  $foto_transaksi = basename($_FILES["foto_bukti_transaksi"]["name"]);
  $targetFilePath = $targetDir . $foto_transaksi;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
  if (in_array($fileType, $allowTypes)) {
    if (move_uploaded_file($_FILES["foto_bukti_transaksi"]["tmp_name"], $targetFilePath)) {
      // UPDATE NOMOR TELEPON CUSTOMER
      if ($cek_nomor_hp !== $nomor_telepon) {
        $query_update_customer = "UPDATE tbl_customer SET notelp_customer = '".$nomor_telepon."' WHERE id_customer = '".$id_customer."'";
        if ($conn->query($query_update_customer)) {
          // SIMPAN PESANAN
          $sql_pesanan = "INSERT INTO tbl_pesanan (id_customer, id_barang, pesanan_untuk, ukuran, pcs, bahan, jenis, warna, foto_item, foto_desain, jumlah_pesanan) VALUES ('".$id_customer."','".$id_barang."','".$pesanan."','".$ukuran."','".$pcs."','".$bahan_barang."','".$jenis_barang."','".$warna."','".$foto_item."','".$foto_desain."','".$total_pcs."')";
          // SIMPAN TRANSAKSI
          if ($conn->query($sql_pesanan)) {
            $last_id_pesanan = $conn->insert_id;
            $query_transaksi = "INSERT INTO tbl_transaksi_pembayaran (id_pesanan, total_pembayaran, sisa_pembayaran, metode_pembayaran, bank_pilihan, foto_bukti_transaksi, jam_transaksi) VALUES ('".$last_id_pesanan."','".$harga."','".$sisa_bayar."','".$metode_pembayaran."','".$bank."','".$foto_transaksi."','".$jam_transaksi."')";
            // UPDATE TBL_PESANAN
            if ($conn->query($query_transaksi)) {
              $update_tbl_pesanan = "UPDATE tbl_pesanan SET id_transaksi_pembayaran = '".$last_id_pesanan."' WHERE id_pesanan = '".$last_id_pesanan."'";
              if ($conn->query($update_tbl_pesanan)) {
                echo "Sukses";
              } else {
                echo "Error: " . $update_tbl_pesanan . "<br>" . $conn->error;
              }
            } else {
              echo "Error";
              echo "Error: " . $query_transaksi . "<br>" . $conn->error;
            }
          } else {
            echo "Error";
          }
        }
      } else {
        // SIMPAN PESANAN
        $sql_pesanan = "INSERT INTO tbl_pesanan (id_customer, id_barang, pesanan_untuk, ukuran, pcs, bahan, jenis, warna, foto_item, foto_desain, jumlah_pesanan) VALUES ('".$id_customer."','".$id_barang."','".$pesanan."','".$ukuran."','".$pcs."','".$bahan_barang."','".$jenis_barang."','".$warna."','".$foto_item."','".$foto_desain."','".$total_pcs."')";
        // SIMPAN TRANSAKSI
        if ($conn->query($sql_pesanan)) {
          $last_id_pesanan = $conn->insert_id;
          $query_transaksi = "INSERT INTO tbl_transaksi_pembayaran (id_pesanan, total_pembayaran, sisa_pembayaran, metode_pembayaran, bank_pilihan, foto_bukti_transaksi, jam_transaksi) VALUES ('".$last_id_pesanan."','".$harga."','".$sisa_bayar."','".$metode_pembayaran."','".$bank."','".$foto_transaksi."', '".$jam_transaksi."')";
          // UPDATE TBL_PESANAN
          if ($conn->query($query_transaksi)) {
            $update_tbl_pesanan = "UPDATE tbl_pesanan SET id_transaksi_pembayaran = '".$last_id_pesanan."' WHERE id_pesanan = '".$last_id_pesanan."'";
            if ($conn->query($update_tbl_pesanan)) {
              echo "Sukses";
            } else {
              echo "Error";
            }
          } else {
            echo "Error";
          }
        } else {
          echo "Error";
        }
      }
    } else {
      echo "terjadi masalah";
    }
  } else {
    echo "bukan gambar";
  }
  $conn->close();
}
?>