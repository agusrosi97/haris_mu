<?php
  if(isset($_POST["editbar"]))
  {
    require '../koneksi/function.php';
    $queryBarang = $conn->query("SELECT * FROM tbl_barang WHERE id_barang = '". $_POST['editbar'] ."'");
      foreach($queryBarang as $row_pop_barang) : ?>
        <input type="hidden" value="<?=$row_pop_barang['id_barang'] ?>" name="edt_id_barang">
        <input type="hidden" value="<?=$row_pop_barang['foto_barang'] ?>" name="foto_barang_lama">
          <div class="row">
            <div class="col-md-12">
              <div class="col d-flex justify-content-center mb-4 text-center">
                <div class="input-file input-file-image">
                  <img class="img-upload-preview" width="150" alt="preview" src="assets/upload_image/<?=$row_pop_barang['foto_barang'] ?>">
                  <input type="file" class="form-control form-control-file" id="foto-barang-edit" name="edt_foto_barang" accept="image/*" value="<?=$row_pop_barang['foto_barang'] ?>">
                  <label for="foto-barang-edit" class="label-input-file btn btn-black btn-round">
                    Ganti gambar
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group form-group-default mb-4">
              <label for="edt-bahan-barang"><b>Bahan barang</b></label>
              <input type="text" class="form-control" id="edt-bahan-barang" name="edt_bahan_barang" required placeholder="Bahan barang" value="<?=$row_pop_barang['bahan_barang'] ?>">
            </div>
            <div class="form-group form-group-default mb-4 position-relative">
              <label for="edt-jenis-barang"><b>Jenis barang</b></label>
              <input type="text" class="form-control" id="edt-jenis-barang" name="edt_jenis_barang" required placeholder="Jenis barang" value="<?=$row_pop_barang['jenis_barang'] ?>">
            </div>
            <div class="form-group form-group-default mb-4 position-relative">
              <label for="edt-jenis-barang"><b>Harga barang</b></label>
              <input type="text" class="form-control" id="edt-harga-barang" name="edt_harga_barang" required placeholder="Harga barang" value="<?=$row_pop_barang['harga_barang'] ?>">
            </div>
            <div class="form-group form-group-default mb-4">
              <label>Keterangan</label>
              <select name="edt_ket_barang" class="form-control bg-light border">
                <option value="ada" <?= $row_pop_barang['keterangan_barang'] == 'ada' ? 'selected' : "" ; ?>>Tersedia</option>
                <option value="kosong" <?= $row_pop_barang['keterangan_barang'] == 'kosong' ? 'selected' : "" ; ?>>Habis</option>
              </select>
            </div>
          </div>
          <script type="text/javascript">
            $(document).ready(function(){
              function readURL(input) {
                if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                    $(input).parent(".input-file-image").find(".img-upload-preview").attr("src", e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
                }
              }
              $(".input-file-image input[type=file").change(function () {
                readURL(this);
              });
            })
          </script>
      <?php endforeach;
  }
  $conn -> close();
?>