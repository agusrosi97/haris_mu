<?php
  if(isset($_POST["viewbar"]))
  {
    require '../koneksi/function.php';
    $queryBarang = $conn->query("SELECT * FROM tbl_barang WHERE id_barang = '". $_POST['viewbar'] ."'");
      foreach($queryBarang as $row_pop_barang) : ?>
          <div class="row">
            <div class="col-md-12">
              <div class="col d-flex justify-content-center mb-4 text-center">
                <div class="input-file input-file-image">
                  <img class="img-upload-preview" width="150" alt="preview" src="assets/upload_image/<?=$row_pop_barang['foto_barang'] ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group form-group-default mb-4">
              <label for="edt-bahan-barang"><b>Bahan barang</b></label>
              <input type="text" class="form-control" id="edt-bahan-barang" value="<?=$row_pop_barang['bahan_barang'] ?>" readonly>
            </div>
            <div class="form-group form-group-default mb-4 position-relative">
              <label for="edt-jenis-barang"><b>Jenis barang</b></label>
              <input type="text" class="form-control" id="edt-jenis-barang" value="<?=$row_pop_barang['jenis_barang'] ?>" readonly>
            </div>
            <div class="form-group form-group-default mb-4 position-relative">
              <label for="edt-harga-barang"><b>Harga barang</b></label>
              <input type="text" class="form-control" id="edt-harga-barang" value="<?=$row_pop_barang['harga_barang'] ?>" readonly>
            </div>
            <div class="form-group form-group-default mb-4">
              <label>Keterangan</label>
              <select class="form-control bg-white border" disabled>
                <option <?= $row_pop_barang['keterangan_barang'] == 'ada' ? 'selected' : "" ; ?>>Tersedia</option>
                <option <?= $row_pop_barang['keterangan_barang'] == 'kosong' ? 'selected' : "" ; ?>>Habis</option>
              </select>
            </div>
          </div>
      <?php endforeach;
  }
  $conn -> close();
?>