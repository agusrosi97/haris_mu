<!DOCTYPE html>
<html>
<head>
  <title>asd</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/atlantis2.css">
</head>
<body>
<form method="post" id="p">
  <input type="text" name="p">
  <button type="button" id="d" name="b" data-toggle="modal" data-target="#popup_konfirmasi">submit</button>
  
</form>


<div class="modal fade" id="popup_konfirmasi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3>Anda sudah yakin ingin memesan barang tersebut?</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Ubah pesanan</button>
          <button type="submit" class="btn btn-primary" name="btn_simpan_pesanan" form="p" id="f">Iya!</button>
        </div>
      </div>
    </div>
  </div>


<script src="assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#p').validate({
        submitHandler: PP
      })
      function PP() { // handle the submit event
        // e.preventDefault();
        let formData = $('#p').serialize();

        $.ajax({
          type: 'POST',
          url: 'tes.php',
          data: formData
        })
      };
      $('#f').click(function() {
        $('#popup_konfirmasi').modal('hide');
        $('#p').submit(); // trigger the submit event
      });
    })
  </script>
</body>
</html>