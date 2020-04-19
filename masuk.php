<?php
session_start();
if (!empty($_SESSION['loggedin_customer'])) header('location: welcome.php');
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
      <div class="mt-n2 pb-4">
        <a href="welcome.php">
          <i class="fas fa-long-arrow-alt-left" style="font-size: 20px; vertical-align: middle; padding-bottom: 1.3px;"></i> Kembali
        </a>
      </div>
      <h3 class="text-center">Login</h3>
      <form id="login_form" method="POST">
        <div class="login-form">
          <div class="form-group">
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
          <div class="login-account">
            <span class="msg">Belum memiliki akun?</span>
            <button type="button" id="show-signup" class="btn btn-primary btn-link w-100 fw-bold">Daftar</button>
          </div>
        </div>
      </form>
    </div>
    <!-- SIGN UP -->
    <div class="container container-signup animated fadeIn">
      <div class="mt-n2 pb-2">
        <a href="welcome.php">
          <i class="fas fa-long-arrow-alt-left" style="font-size: 20px; vertical-align: middle; padding-bottom: 1.3px;"></i> Kembali
        </a>
      </div>
      <h3 class="text-center">Daftar</h3>
      <form id="signup_form" method="POST">
        <div class="login-form">
          <div class="form-group">
            <label for="namedisplay" class="placeholder"><b>Username</b></label>
            <input id="namedisplay" name="namedisplay" type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="email" class="placeholder"><b>Email</b></label>
            <input id="email" name="email" type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="passwordsignin" class="placeholder"><b>Password</b></label>
            <div class="position-relative">
              <input id="passwordsignin" name="passwordsignin" type="password" class="form-control" required>
              <div class="show-password">
                <i class="icon-eye"></i>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="confirmpassword" class="placeholder"><b>Ulangi Password</b></label>
            <div class="position-relative">
              <input id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
              <div class="show-password">
                <i class="icon-eye"></i>
              </div>
            </div>
          </div>
          <div class="row form-action">
            <div class="col-md-6">
              <button type="button" id="show-signin" class="btn btn-primary btn-link w-100 fw-bold">Masuk</button>
            </div>
            <div class="col-md-6">
              <button id="signup-btn" type="submit" name="submit_signup" class="btn btn-primary w-100 fw-bold">Buat Akun</button>
            </div>
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
          username: "Masukkan username/email Anda!",
          password: {
            required: "Masukkan password Anda!"
          },
        },
        submitHandler: submitForm
      });

      function submitForm() {
        $.ajax({
          type: "post",
          url: 'ajax/masuk_proses.php',
          data: $('#login_form').serialize(),
          beforeSend: function() {
            $('#login-btn').html(`<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Loading...`);
          },
          success: function(response) {
            if (response == 'halo') {
              window.location.href = 'welcome.php';
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

      // sign up
      $("#signup_form").validate({
        rules: {
          namedisplay: {
            required: true,
          },
          email: {
            required: true,
            email: true
          },
          passwordsignin: {
            required: true,
            minlength: 8
          },
          confirmpassword: {
            required: true,
            minlength: 8,
            equalTo: "#passwordsignin"
          },
        },
        messages: {
          namedisplay: "Masukkan username Anda!",
          email: {
            required: "Masukkan email Anda!",
            email: "Harap masukkan email dengan benar!"
          },
          passwordsignin: {
            required: "Masukkan password Anda!",
            minlength: "Harap masukkan minimal 8 karakter!"
          },
          confirmpassword: {
            required: "Masukkan password Anda!",
            minlength: "Harap masukkan minimal 8 karakter!",
            equalTo: "Password tidak sama!"
          },
        },
        submitHandler: submitForm_signup
      });

      function submitForm_signup() {
        $.ajax({
          type: 'post',
          url: 'ajax/signup_proses.php',
          data: $('#signup_form').serialize(),
          beforeSend: function() {
            $('#signup-btn').html(`<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Loading...`);
          },
          success: function(response) {
            if (response == 'yeah') {
              Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: 'Akun Anda berhasil dibuat!',
                showConfirmButton: false,
                timer: 2500
              }).then(function() {
                window.location.href = 'masuk.php';
              });
            } else if (response == 'email sama') {
              $.notify({
                icon: 'flaticon-cross',
                title: "<b>Sindycart menyatakan :</b>",
                message: '<span class="text-danger">Email sudah terdaftar!</span>',
              }, {
                type: 'danger',
                placement: {
                  from: "top",
                  align: "center"
                },
                time: 1000,
              });
            } else if (response == 'username sama') {
              $.notify({
                icon: 'flaticon-cross',
                title: "<b>Sindycart menyatakan :</b>",
                message: "<span class='text-danger'>Username tersebut sudah dipakai!</span>",
              }, {
                type: 'danger',
                placement: {
                  from: "top",
                  align: "center"
                },
                time: 1000,
              });
              console.log('username sama');
            } else if (response == 'sama semua') {
              $.notify({
                icon: 'flaticon-cross',
                title: "<b>Sindycart menyatakan :</b>",
                message: "<span class='text-danger'>Username dengan email tersebut sudah terdaftar!</span>",
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
            $('#signup-btn').html('Sign Up');
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