<?php 
if (isset($_POST['cari_data_barang'])) {
  require '../koneksi/function.php';
  $hasil = $conn -> real_escape_string($_POST['cari_data_barang']);
  $query_cari_barang = "SELECT * FROM tbl_barang WHERE jenis_barang LIKE '%".$hasil."%' OR bahan_barang LIKE '%".$hasil."%' AND keterangan_barang = 'ada'";
  $hasil_query_cari = $conn->query($query_cari_barang);
  $cek_ketersediaan = $hasil_query_cari->fetch_assoc();
  // $output = "";
  if (($hasil_query_cari -> num_rows > 0) AND ($cek_ketersediaan['keterangan_barang'] == 'ada'))  {
    foreach ($hasil_query_cari as $value_cari) {?>
      <div class="col-4 col-sm-2">
        <label class="imagecheck mb-4 position-relative" data-pilihbarang="<?=$value_cari['id_barang'] ?>">
          <figure class="imagecheck-figure">
            <img src="assets/img/<?=$value_cari['foto_barang'] ?>" alt="cnth-barang" class="imagecheck-image img-fluid">
          </figure>
          <div style="position: absolute; bottom: 0; width: 100%; background: rgba(255,255,255,.8); backdrop-filter: blur(20px);"><h4 class="m-0 p-2 text-dark"><?=ucfirst($value_cari['bahan_barang']) ?></h4></div>
        </label>
      </div>
      <script type="text/javascript">
        $('.imagecheck').click(function () {
          let data_pilihan = $(this).data('pilihbarang');
          $.ajax({
            url: 'ajax/select_barang.php',
            method: 'POST',
            data: {databarang:data_pilihan},
            success: function () {
              window.location.href = 'pilihan_barang.php';
            },
            error: function () {
              alert('Terjadi kesalahan, harap coba bebrapa saat lagi!');
            }
          })
        });
      </script>
      <?php 
    }
  } else {
    echo "<div class='col-12 text-center'><h1>Maaf barang yang Anda cari, tidak ada.</h1></div>";
  }
  $conn->close();
}
?>