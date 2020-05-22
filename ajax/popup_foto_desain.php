<?php 
if (isset($_POST['ajxdt'])) {
  require '../koneksi/function.php';
  $query_foto_desain = $conn->query("SELECT * FROM tbl_pesanan WHERE id_pesanan = '". $_POST['ajxdt'] ."'");
  foreach($query_foto_desain as $row_pop_foto_desain) : ?>
    <div class="row">
      <div class="col-md-12">
        <div class="col d-flex justify-content-center mb-4 text-center">
          <div class="input-file input-file-image">
            <img class="img-upload-preview" width="100%" alt="preview" src="assets/upload_foto_desain/<?=$row_pop_foto_desain['foto_desain'] ?>">
          </div>
        </div>
      </div>
    </div>
  <?php endforeach;
  $conn -> close();
}
?>