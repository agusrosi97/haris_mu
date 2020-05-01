<?php
session_start();
if (!empty($_SESSION['loggedin'])) header('location: index.php');
require_once 'koneksi/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Sindycart - Login</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['assets/css/fonts.min.css']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>
  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/atlantis.css">
</head>

<body class="login">
  <!-- LOGIN -->
  <div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
      <h3 class="text-center">Login</h3>
      <form id="login_form" method="POST">
        <div class="login-form">
          <div class="form-group mb-2">
            <label for="username" class="placeholder"><b>Username / email</b></label>
            <input id="username" name="username" type="text" class="form-control" autofocus>
          </div>
          <div class="form-group">
            <label for="password" class="placeholder"><b>Password</b></label>
            <div class="position-relative">
              <input id="password" name="password" type="password" class="form-control" required autocomplete="on">
              <div class="show-password">
                <i class="icon-eye"></i>
              </div>
            </div>
          </div>
          <div class="form-action mb-3">
            <button id="login-btn" type="submit" name="submit_login" class="btn btn-primary col-md-5 mt-3 mt-sm-0 fw-bold btn-round">Masuk</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/atlantis.js"></script>
  <script src="assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>
  <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
  <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      // login
      $("#login_form").validate({
        rules: {
          username: {
            required: true,
          },
          password: {
            required: true,
          },
        },
        messages: {
          username: "Harap isi bidang ini!",
          password: {
            required: "Harap isi bidang ini!"
          },
        },
        submitHandler: submitForm
      });

      function submitForm() {
        $.ajax({
          type: "post",
          url: 'ajax/login_user_proses.php',
          data: $('#login_form').serialize(),
          beforeSend: function() {
            $('#login-btn').html(`<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Loading...`);
          },
          success: function(response) {
            if (response == 'halo') {
              window.location.href = 'index.php';
            } else if (response == 'bodong') {
              $.notify({
                icon: 'icon-user-unfollow',
                title: "<b>Sindycart menyatakan :</b>",
                message: '<span class="text-danger">"Anda belum terdaftar dalam sistem!"</span>',
              }, {
                type: 'danger',
                placement: {
                  from: "top",
                  align: "center"
                },
                time: 1000,
              });
            } else if (response == 'salah password') {
              $.notify({
                icon: 'icon-lock',
                title: "<b>Sindycart menyatakan :</b>",
                message: "<span class='text-danger'>Username/email atau password Anda salah!</span>",
              }, {
                type: 'danger',
                placement: {
                  from: "top",
                  align: "center"
                },
                time: 1000,
              });
            }
          },
          complete: function() {
            $('#login-btn').html('Sign In');
          },
          error: function() {
            alert("Terjadi kesalahan!");
          },
        });
        return false;
      };
    });
  </script>
</body>

</html>
