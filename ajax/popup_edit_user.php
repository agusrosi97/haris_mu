<?php
  if(isset($_POST["editusr"]))
  {
    require '../koneksi/function.php';
    $queryUser = $conn->query("SELECT * FROM tbl_user WHERE id_user = '".$_POST['editusr']."'");
    while($row_popup_edit = $queryUser->fetch_assoc()) : ?>
      <div class="form-row">
        <input type="hidden" name="edt_id_user" value="<?=$row_popup_edit['id_user'] ?>">
        <div class="form-group form-group-default mb-4">
          <label><b>Nama</b></label>
          <input type="text" name="edt_nama_user" class="form-control" required placeholder="Nama user" value="<?=$row_popup_edit['nama_user'] ?>">
        </div>
        <div class="form-group form-group-default mb-4 position-relative">
          <label><b>Email</b></label>
          <input id="edt-email-cus" type="email" name="edt_email_user" class="form-control" placeholder="Email user" value="<?=$row_popup_edit['email_user'] ?>" required>
          <span id="notif-email-terdaftar" class="position-absolute pt-1 d-none text-danger text-muted" style="font-size: 85%">Email sudah terdaftar!</span>
        </div>
        <div class="form-group form-group-default mb-4">
          <label><b>Telepon</b></label>
          <input type="number" name="edt_notelp_user" class="form-control" placeholder="Telepon user" value="<?=$row_popup_edit['notelp_user'] ?>" required>
        </div>
        <div class="form-group form-group-default mb-4">
          <label><b>Tgl lahir</b></label>
          <input type="text" id="edt-dob-cus" name="edt_dob_user" class="form-control bg-white" placeholder="Tanggal lahir user" value="<?=date_format(new DateTime($row_popup_edit['dob_user']), "d-m-Y") ?>" readonly required>
        </div>
        <div class="form-group form-group-default mb-4">
          <label><b>Gender</b></label>
          <select name="edt_jk_user" class="form-control bg-light border">
            <option>Pilih</option>
            <option value="L" <?php if($row_popup_edit['jk_user'] == "L") {echo "selected";} ?>>Laki-laki</option>
            <option value="P" <?php if($row_popup_edit['jk_user'] == "P") {echo "selected";} ?>>Perempuan</option>
          </select>
        </div>
        <div class="form-group form-group-default mb-4">
          <label><b>Alamat</b></label>
          <textarea class="form-control" placeholder="Alamat user" name="edt_alamat_user" required><?=$row_popup_edit['alamat_user'] ?></textarea>
        </div>
        <div class="form-group form-group-default mb-4">
          <label><b>Hak Akses</b></label>
          <select class="form-control bg-light border" name="edt_hak_akses_user">
            <option value="Owner" <?=$row_popup_edit['hak_akses_user'] == 'Owner' ? "selected" : "" ; ?>>Owner</option>
            <option value="Pegawai" <?=$row_popup_edit['hak_akses_user'] == 'Pegawai' ? "selected" : "" ; ?>>Pegawai</option>
            <option value="Admin" <?=$row_popup_edit['hak_akses_user'] == 'Admin' ? "selected" : "" ; ?>>Admin</option>
          </select>
        </div>
        <div class="form-group form-group-default mb-4">
          <label><b>Status</b></label>
          <select class="form-control bg-light border" name="edt_status_user">
            <option value="Aktif" <?=$row_popup_edit['status_user'] == 'Aktif' ? "selected" : "" ?>>Aktif</option>
            <option value="Tidak Aktif" <?=$row_popup_edit['status_user'] == 'Tidak Aktif' ? "selected" : "" ?>>Tidak Aktif</option>
          </select>
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