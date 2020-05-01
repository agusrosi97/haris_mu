<?php
  if(isset($_POST["editcus"]))
  {
    require '../koneksi/function.php';
    $queryCustomer = $conn->query("SELECT * FROM tbl_customer WHERE id_customer = '".$_POST['editcus']."'");
    while($row_popup_edit = $queryCustomer->fetch_assoc()) : ?>
      <div class="form-row">
        <input type="hidden" name="edt_id_customer" value="<?=$row_popup_edit['id_customer'] ?>">
        <div class="form-group form-group-default mb-4">
          <label><b>Nama</b></label>
          <input type="text" name="edt_nama_customer" class="form-control" required placeholder="Nama customer" value="<?=$row_popup_edit['nama_customer'] ?>">
        </div>
        <div class="form-group form-group-default mb-4 position-relative">
          <label><b>Email</b></label>
          <input id="edt-email-cus" type="email" name="edt_email_customer" class="form-control" placeholder="Email customer" value="<?=$row_popup_edit['email_customer'] ?>" required>
          <span id="notif-email-terdaftar" class="position-absolute pt-1 d-none text-danger text-muted" style="font-size: 85%">Email sudah terdaftar!</span>
        </div>
        <div class="form-group form-group-default mb-4">
          <label><b>Telepon</b></label>
          <input type="number" name="edt_notelp_customer" class="form-control" placeholder="Telepon customer" value="<?=$row_popup_edit['notelp_customer'] ?>" required>
        </div>
        <div class="form-group form-group-default mb-4">
          <label><b>Tgl lahir</b></label>
          <input type="text" id="edt-dob-cus" name="edt_dob_customer" class="form-control bg-white" placeholder="Tanggal lahir customer" value="<?=date_format(new DateTime($row_popup_edit['dob_customer']), "d-m-Y") ?>" readonly required>
        </div>
        <div class="form-group form-group-default mb-4">
          <label><b>Gender</b></label>
          <select name="edt_jk_customer" class="form-control bg-light border">
            <option>Pilih</option>
            <option value="L" <?php if($row_popup_edit['jk_customer'] == "L") {echo "selected";} ?>>Laki-laki</option>
            <option value="P" <?php if($row_popup_edit['jk_customer'] == "P") {echo "selected";} ?>>Perempuan</option>
          </select>
        </div>
        <div class="form-group form-group-default">
          <label><b>Alamat</b></label>
          <textarea class="form-control" placeholder="Alamat customer" name="edt_alamat_customer" required><?=$row_popup_edit['alamat_customer'] ?></textarea>
        </div>
      </div>
      <!-- SCRIPT -->
      <script type="text/javascript">
        $(document).ready(function () {
          $("#edt-dob-cus").datetimepicker({
            format: "DD-MM-YYYY",
            ignoreReadonly: true
          });
          $('#edt-email-cus').focus(function () {
            $('#notif-email-terdaftar').addClass("d-none");
          });
        });
      </script>
    <?php endwhile;
  }
  $conn -> close();
?>