<?php 
if (isset($_POST['data_sisa_bayar'])) {
  require '../koneksi/function.php';
  $query_sisa = $conn->query("
    SELECT tbl_pesanan.*, tbl_transaksi_pembayaran.*
    FROM tbl_pesanan
    LEFT JOIN tbl_transaksi_pembayaran ON tbl_pesanan.id_transaksi_pembayaran = tbl_transaksi_pembayaran.id_transaksi_pembayaran
    WHERE tbl_pesanan.id_pesanan = '".$_POST['data_sisa_bayar']."'
  ");
  $row_sisa = $query_sisa->fetch_assoc();
  ?>
  <div class="row">
    <input type="hidden" id="edt-bank" name="bank">
    <input type="hidden" name="id_transaksi" value="<?=$row_sisa['id_transaksi_pembayaran'] ?>">
    <div id="wrapper-form" class="w-100">
      <div class="col-md-12">
        <h3 class="px-2">Silahkan transfer sebesar Rp.<?=number_format($row_sisa['sisa_pembayaran'],2,",",".")  ?>,-</h3>
      </div>
      <div class="col">
        <div class="form-group">
        <label for="bank">Pilih bank :</label>
        <select class="form-control col-sm-6" required id="bank">
          <option value='0'>Pilih ...</option>
          <option value="bca">BCA</option>
          <option value="bni">BNI</option>
          <option value="mandiri">MANDIRI</option>
          <option value="bri">BRI</option>
        </select>
      </div>
      <div class="form-group">
        <label>Nomor rekening :</label>
        <input type="text" class="form-control-plaintext" value="XXX-XXX-XXXX" readonly>
      </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary ml-2" id="btn-tanya" disabled type="button">Sudah bayar?</button>
      </div>
    </div>
    <div class="col-md-12 d-none" id="wrapper-foto-transaksi2">
      <div class="col-md-12">
        <span class="btn btn-link px-0 pt-0" id="back-form">
          <i class="fas fa-long-arrow-alt-left" style="font-size: 20px; vertical-align: middle; padding-bottom: 1.3px;"></i> Kembali
        </span>
      </div>
      <div class="col d-flex justify-content-center mb-4 text-center">
        <div class="input-file input-file-image">
          <img class="img-upload-preview" width="300" alt="preview" src="https://via.placeholder.com/300x300">
          <input type="file" class="form-control form-control-file" id="foto-bukti-transaksi2" name="inp_foto_sisa_transaksi" accept="image/*" value="">
          <label for="foto-bukti-transaksi2" class="label-input-file btn btn-black btn-round" id="ganti-text">
            Masukkan foto bukti transaksi ...
          </label>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-12 text-right mt-4 pt-3" style="border-top: 1px solid #dee2e6">
      <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Jangan sekarang</button>
      <button type="submit" class="btn btn-primary text-uppercase" disabled id="btn-proses-transaksi" neme="btn_sisa_pembayaran">proses transaksi</button>
    </div> -->
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
    });
    $('#bank').change(function () {
      var bank = $(this).val();
      if (bank !== '0') {
        $('#btn-tanya').prop("disabled", false);
      } else {
        $('#btn-tanya').prop("disabled", true);
      };
      $('#edt-bank').val(bank);
    });
    $('#btn-tanya').click(function () {
      $('#wrapper-form').addClass('d-none');
      $('#wrapper-foto-transaksi2').removeClass('d-none');
    });
    $('#back-form').click(function () {
      $('#wrapper-form').removeClass('d-none');
      $('#wrapper-foto-transaksi2').addClass('d-none');
    });
    $('#foto-bukti-transaksi2').change(function () {
      if ($(this).val() !== '') {
        $('#btn-proses-transaksi').prop("disabled", false);
        $('#ganti-text').html("Ganti foto ...");
      } else {
        $('#btn-proses-transaksi').prop("disabled", true);
        $('#ganti-text').html("Masukkan foto bukti transaksi ...");
      }
    });
  </script>
  <?php
  $conn -> close();
}
?>