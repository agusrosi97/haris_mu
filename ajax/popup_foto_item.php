<?php 
if (isset($_POST['ajxdt_item'])) {
  require '../koneksi/function.php';
  $query_foto_item = $conn->query("SELECT * FROM tbl_pesanan WHERE id_pesanan = '". $_POST['ajxdt_item'] ."'");
  foreach($query_foto_item as $row_pop_foto_item) : ?>
    <div class="row">
      <div class="col-md-12">
        <div class="col d-flex justify-content-center mb-4 text-center">
          <div class="input-file input-file-image">
            <img class="img-upload-preview" width="100%" alt="preview" src="assets/upload_image/<?=$row_pop_foto_item['foto_item'] ?>">
          </div>
        </div>
      </div>
    </div>
  <?php endforeach;
  $conn -> close();
}
?>