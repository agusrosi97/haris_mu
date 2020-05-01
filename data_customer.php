<?php
session_start();
// setcookie('cross-site-cookie', 'Sindycart', ['samesite' => 'strict', 'secure' => true]);
if (empty($_SESSION['loggedin'])) header('location: login.php');
// echo $_SESSION['loggedin']; 
require_once './koneksi/function.php';
// user
$id_user = $_SESSION['loggedin'];
$data_user = $conn->query("SELECT * FROM tbl_user WHERE id_user = '$id_user'");
$row = $data_user->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Sindycart - Data Customer</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Poppins:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
          "simple-line-icons"
        ],
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

  <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
  <div class="wrapper">
    <div class="main-header">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="blue">
        <a href="index.html" class="logo">
          <img src="assets/img/logo2.png" alt="navbar brand" class="navbar-brand" width="170" height="55">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="icon-menu"></i>
          </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="icon-menu"></i>
          </button>
        </div>
      </div>
      <!-- End Logo Header -->
      <!-- Navbar Header -->
      <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        <div class="container-fluid">
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                <div class="avatar-sm">
                  <img src="<?= $row['foto_user'] == "" ? "assets/img/profile.png" : "assets/upload_image/" . $row['foto_user']; ?>" alt="..." class="avatar-img rounded-circle">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                  <li>
                    <div class="user-box">
                      <div class="avatar-lg">
                        <img src="<?= $row['foto_user'] == "" ? "assets/img/profile.png" : "assets/upload_image/" . $row['foto_user']; ?>" alt="image profile" class="avatar-img rounded">
                      </div>
                      <div class="u-text">
                        <h4><?= $row['nama_user'] ?></h4>
                        <button type="button" class="btn btn-xs btn-secondary btn-sm show_profile">Lihat Akun</button>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php"><b><i class="fas fa-sign-out-alt"></i>Logout</b></a>
                  </li>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
    </div>
    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <div class="user">
            <div class="avatar-sm float-left mr-2">
              <img src="<?= $row['foto_user'] == "" ? "assets/img/profile.png" : "assets/upload_image/" . $row['foto_user']; ?>" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
              <a data-toggle="collapse" href="#" aria-expanded="true" class="cursor-default">
                <span>
                  <span class="font-weight-bold"><?= $row['username_user']; ?></span>
                  <span class="text-small"><?=$row['hak_akses_user'] ?></span>
                  <span class="cog show_profile cursor-pointer" title="pengaturan akun"><i class="fas fa-cog"></i></span>
                  <span class="cog show_index cursor-pointer d-none" title="kembali"><i class="fas fa-arrow-left"></i></span>
                </span>
              </a>
              <div class="clearfix"></div>
            </div>
          </div>
          <ul class="nav nav-primary">
            <li class="nav-item">
              <a href="index.php">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Master Data</h4>
            </li>
            <li class="nav-item">
              <a href="data_user.php">
                <i class="fas fa-user-cog"></i>
                <p>Data User</p>
              </a>
            </li>
            <li class="nav-item active">
              <a href="">
                <i class="fas fa-user"></i>
                <p>Data Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#forms">
                <i class="fas fa-shopping-cart"></i>
                <p>Data Pesanan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#tables">
                <i class="fas fa-box"></i>
                <p>Data Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#maps">
                <i class="fas fa-tshirt"></i>
                <p>Contoh Barang</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->
    <div class="main-panel">
      <div class="container container-index">
        <div class="panel-header " style="background-image: url('./assets/img/bg-home.jpg'); background-size: cover; background-position: center">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                <h2 class="text-white pb-2 fw-bold">Data Customer</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-inner mt--5">
          <div class="row mt--2">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <button class="btn btn-primary btn-sm shadow-sm" data-toggle="modal" data-target="#mdl-data-customer"><i class="fas fa-plus"></i> Data</button>
                </div>
                <div class="card-body" id="load-data-customer">
                  <!-- <div class="table-responsive"> -->
                    <table id="tabel-customer" class="table-responsive display table table-striped table-hover">
                      <thead>
                        <tr>
                          <th class="d-none"></th>
                          <th class="text-center">Opsi</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Telp</th>
                          <th>Tgl Lahir</th>
                          <th>Kelamin</th>
                          <th>Alamat</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th class="d-none"></th>
                          <th class="text-center">Opsi</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Telp</th>
                          <th>Tgl Lahir</th>
                          <th>Kelamin</th>
                          <th>Alamat</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        $tabel_customer = $conn->query("SELECT * FROM tbl_customer ORDER BY id_customer DESC");
                        foreach ($tabel_customer as $row_tabel_customer) : ?>
                          <tr>
                            <td class="d-none"></td>
                            <td class="d-flex align-items-center">
                              <button title="Lihat data" data-viewcus="<?=$row_tabel_customer['id_customer'] ?>" type="button" class="btn btn-primary lihat_data btn-sm mr-1"><i class="fas fa-eye"></i></button>
                              <button title="Edit data" data-editcus="<?=$row_tabel_customer['id_customer'] ?>" type="button" class="btn btn-primary edit_data btn-sm"><i class="fas fa-edit"></i></button>
                            </td>
                            <td class="text-nowrap"><?=$row_tabel_customer['nama_customer'] == '' ? "-" : $row_tabel_customer['nama_customer'] ?></td>
                            <td><?=$row_tabel_customer['username_customer'] == '' ? "-" : $row_tabel_customer['username_customer'] ?></td>
                            <td><?=$row_tabel_customer['email_customer'] == '' ? "-" : $row_tabel_customer['email_customer'] ?></td>
                            <td><?=$row_tabel_customer['notelp_customer'] == '' ? "-" : $row_tabel_customer['notelp_customer']?></td>
                            <td class="text-nowrap"><?=date_format(new DateTime($row_tabel_customer['dob_customer']), "d-m-Y") ?></td>
                            <td><?php if ($row_tabel_customer['jk_customer'] == "L") : ?>Laki-laki <?php elseif ($row_tabel_customer['jk_customer'] == "P") : ?>Perempuan <?php else : ?>-<?php endif; ?></td>
                            <td><?=$row_tabel_customer['alamat_customer'] == '' ? "-" : $row_tabel_customer['alamat_customer'] ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- profile -->
      <?php include './components/profile_setting.php' ?>
      <!-- end profile -->
      <?php include 'footer/footer.php'; ?>
    </div>
  </div>
  <!-- tambah data customer -->
  <div class="modal fade" id="mdl-data-customer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog shadow" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah data</h5>
          <button type="button" class="close position-absolute mt-n3" data-dismiss="modal" aria-label="Close" title="close" style="right: 20px; z-index: 2">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="form-tambah-customer">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group form-group-default mb-4">
                <label><b>Nama</b></label>
                <input id="nama-customer" type="text" class="form-control" required name="add_nama_customer" placeholder="Nama customer">
              </div>
              <div class="form-group form-group-default mb-4 position-relative">
                <label for="email-customer"><b>Email</b></label>
                <input type="email" class="form-control" id="add-email-customer" name="add_email_customer" required placeholder="Email customer">
                <span id="notif-email-terdaftar-add" class="position-absolute pt-1 text-danger d-none" style="font-size: 85%">Email sudah terdaftar!</span>
              </div>
              <div class="form-group form-group-default mb-4">
                <label for="tlp-customer"><b>Telepon</b></label>
                <input type="number" class="form-control" id="tlp-customer" name="add_notelp_customer" required min="0" placeholder="Telepon customer">
              </div>
              <div class="form-group form-group-default mb-4">
                <label for="datepicker"><b>Tgl lahir</b></label>
                <input type="text" class="form-control bg-white" id="datepicker-dob-customer" name="add_dob_customer" required placeholder="Tanggal lahir customer" readonly>
              </div>
              <div class="form-group form-group-default mb-4">
                <label for="jk-customer"><b>Gender</b></label>
                <select id="jk-customer" name="add_jk_customer" class="selectpicker form-control bg-light border" title="Pilih" required>
                  <option value="L">Pria</option>
                  <option value="P">Wanita</option>
                </select>
              </div>
              <div class="form-group form-group-default mb-4">
                <label for="alamat-customer"><b>Alamat</b></label>
                <textarea class="form-control" name="add_alamat_customer" id="alamat-customer" autocomplete="on" required placeholder="Alamat customer"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-right">
            <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="btn-save-data-customer" class="btn btn-primary" name="btn_tambah_customer"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- lihat data -->
  <div id="modal-LihatData" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog shadow modal-dialog-scrollable" role="document"">  
      <div class="modal-content">  
        <div class="modal-header">  
          <h5 class="modal-title">Lihat data</h5>
          <button type="button" class="close position-absolute mt-n3" data-dismiss="modal" aria-label="Close" title="close" style="right: 20px; z-index: 2">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>  
        <div class="modal-body" id="lihatDatacustomer-Detail">  
        </div>  
        <div class="modal-footer">  
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div>  
      </div>  
    </div>  
  </div>
  <!-- Edit data -->
  <div id="modal-EditData" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">  
    <div class="modal-dialog shadow" role="document"">  
      <div class="modal-content">  
        <div class="modal-header">  
          <h5 class="modal-title">Edit data</h5>
          <button type="button" class="close position-absolute mt-n3" data-dismiss="modal" aria-label="Close" title="close" style="right: 20px; z-index: 2">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" id="form-edit-customer">
          <div class="modal-body" id="EditDatacustomer-Edit">
          </div>
          <div class="modal-footer">
            <button id="btn-simpan-edit-customer" type="submit" name="btn-simpan-edit-customer" class="btn btn-secondary">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>

  <!-- jQuery UI -->
  <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

  <!-- Moment JS -->
  <script src="assets/js/plugin/moment/moment.min.js"></script>

  <!-- Chart JS -->
  <!-- <script src="assets/js/plugin/chart.js/chart.min.js"></script> -->

  <!-- jQuery Sparkline -->
  <!-- <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script> -->

  <!-- Chart Circle -->
  <!-- <script src="assets/js/plugin/chart-circle/circles.min.js"></script> -->

  <!-- Datatables -->
  <script src="assets/js/plugin/datatables/datatables.min.js"></script>

  <!-- Bootstrap Notify -->
  <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!-- Bootstrap Toggle -->
  <!-- <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script> -->

  <!-- Dropzone -->
  <!-- <script src="assets/js/plugin/dropzone/dropzone.min.js"></script> -->

  <!-- Fullcalendar -->
  <!-- <script src="assets/js/plugin/fullcalendar/fullcalendar.min.js"></script> -->

  <!-- DateTimePicker -->
  <script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

  <!-- Bootstrap Tagsinput -->
  <!-- <script src="assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script> -->

  <!-- Bootstrap Wizard -->
  <!-- <script src="assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script> -->

  <!-- jQuery Validation -->
  <script src="assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

  <!-- Summernote -->
  <!-- <script src="assets/js/plugin/summernote/summernote-bs4.min.js"></script> -->

  <!-- Select2 -->
  <script src="assets/js/plugin/bootstrap-select/bootstrap.select.min.js"></script>

  <!-- Sweet Alert -->
  <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

  <!-- Owl Carousel -->
  <!-- <script src="assets/js/plugin/owl-carousel/owl.carousel.min.js"></script> -->

  <!-- Magnific Popup -->
  <!-- <script src="assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script> -->

  <!-- Atlantis JS -->
  <script src="assets/js/atlantis.js"></script>
  <!-- <script src="assets/js/demo.js"></script> -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('.cog.show_profile').on('click', function() {
        $('.cog.show_profile').toggleClass('d-none');
        $('.cog.show_index').toggleClass('d-block');
        $('.btn.btn-xs.btn-secondary.btn-sm.show_profile').addClass('d-none');
      });
      $('.cog.show_index').on('click', function() {
        $('.cog.show_profile').toggleClass('d-none');
        $('.cog.show_index').toggleClass('d-block');
        $('.btn.btn-xs.btn-secondary.btn-sm.show_profile').removeClass('d-none');
      });
      $('.btn.btn-xs.btn-secondary.btn-sm.show_profile').on('click', function() {
        $('.cog.show_index').toggleClass('d-block');
        $('.cog.show_profile').toggleClass('d-none');
      });
      $('#datepicker').datetimepicker({
        format: 'DD-MM-YYYY',
        ignoreReadonly: true
      });
      $('#datepicker-dob-customer').datetimepicker({
        format: 'DD-MM-YYYY',
        ignoreReadonly: true
      });
      $('.btn.btn-danger.show_index').on('click', function() {
        $('.btn.btn-xs.btn-secondary.btn-sm.show_profile').removeClass('d-none');
        $('.cog.show_index').toggleClass('d-block');
        $('.cog.show_profile').toggleClass('d-none');
      });
      // update form profile
      $('#form_profile').validate({
        rules: {
          nama_user: {
            required: true,
          },
          email_user: {
            required: true,
          },
          dob_user: {
            required: true,
          },
          jk_user: {
            required: true,
          },
          notelp_user: {
            required: true,
          },
          alamat_user: {
            required: true,
          },
          username_user: {
            required: true,
          }
        },
        messages: {
          nama_user: {
            required: "Harap isi bidang ini!"
          },
          email_user: {
            required: "Harap isi bidang ini!"
          },
          dob_user: {
            required: "Harap isi bidang ini!"
          },
          jk_user: {
            required: "Harap isi bidang ini!"
          },
          notelp_user: {
            required: "Harap isi bidang ini!"
          },
          alamat_user: {
            required: "Harap isi bidang ini!"
          },
          username_user: {
            required: "Harap isi bidang ini!"
          },
          agree: {
            required: "<b>Harap centang bagian ini!</b>"
          },
        },
        submitHandler: submitForm
      });

      function submitForm() {
        let form_data = new FormData($('#form_profile')[0]);
        $.ajax({
          method: 'POST',
          url: 'ajax/update_profile.php',
          data: form_data,
          beforeSend: function() {
            $('#btn-save').html(
              `<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Loading...`
            );
          },
          success: function(response) {
            if (response == 'success') {
              $.notify({
                icon: 'fas fa-check',
                title: "Sindycart menyatakan :",
                message: "<span class='text-success'>Anda berhasil memperbarui data diri Anda.</span>",
              }, {
                type: 'success',
                placement: {
                  from: "top",
                  align: "right"
                },
                time: 1000,
              });
            } else if (response == 'bukan gambar') {
              $.notify({
                icon: 'fas fa-times',
                title: "Sindycart menyatakan :",
                message: "<span class='text-danger'>File yang Anda unggah bukan gambar!</span>",
              }, {
                type: 'danger',
                placement: {
                  from: "top",
                  align: "right"
                },
                time: 1000,
              });
            } else if (response == 'ukuran besar') {
              $.notify({
                icon: 'fas fa-times',
                title: "Sindycart menyatakan :",
                message: "<span class='text-danger'>Ukuran file yang Anda unggah terlalu besar!</span>",
              }, {
                type: 'danger',
                placement: {
                  from: "top",
                  align: "right"
                },
                time: 1000,
              });
            } else if (response == 'username ada') {
              $.notify({
                icon: 'fas fa-times',
                title: "Sindycart menyatakan :",
                message: "<span class='text-danger'>Username sudah dipakai!</span>",
              }, {
                type: 'danger',
                placement: {
                  from: "top",
                  align: "right"
                },
                time: 1000,
              });
              // copy
              $('#user-ada').removeClass('d-none');
              $('#user-ada').html(`Username tidak tersedia!`);
            }
          },
          processData: false,
          contentType: false,
          complete: function() {
            $('#btn-save').html('Save');
            $('#agree').prop("checked", false);
          },
          error: function() {
            alert('Sistem dalam pembaruan');
          }
        });
        return false;
      };

      $('#form_password').validate({
        rules: {
          old_password: {
            required: true
          },
          new_password: {
            required: true,
            minlength: 8
          },
          confirm_password: {
            required: true,
            minlength: 8,
            equalTo: '#new_password'
          }
        },
        messages: {
          old_password: {
            required: 'Masukkan password lama Anda!'
          },
          new_password: {
            required: 'Masukkan password baru Anda!',
            minlength: 'Minimal 8 karakter!'
          },
          confirm_password: {
            required: 'Masukkan password baru Anda!',
            minlength: 'Minimal 8 karakter!',
            equalTo: 'Password tidak sesuai!'
          },
          agree2: {
            required: '<b>Harap centang bagian ini, jika Anda yakin.</b>'
          }
        },
        submitHandler: submitForm_password
      });

      function submitForm_password() {
        let data = $('#form_password').serialize();
        $.ajax({
          method: 'POST',
          url: './ajax/gantipassword_proses.php',
          data: data,
          beforeSend: function() {
            $('#btn-save2').html(
              `<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Loading...`
            );
          },
          success: function(response) {
            if (response == 'good') {
              $.notify({
                icon: 'fas fa-check',
                title: "Sindycart menyatakan :",
                message: "<span class='text-success'>Anda berhasil memperbarui password.</span>",
              }, {
                type: 'success',
                placement: {
                  from: "top",
                  align: "right"
                },
                time: 1000,
              });
            } else if (response == 'salah password') {
              $.notify({
                icon: 'fas fa-times',
                title: "Sindycart menyatakan :",
                message: "<span class='text-danger'>Password lama Anda salah!</span>",
              }, {
                type: 'danger',
                placement: {
                  from: "top",
                  align: "right"
                },
                time: 1000,
              });
            }
          },
          complete: function() {
            $('#btn-save2').html('Save');
          },
          error: function() {
            alert('ada kesalahan');
          }
        });
      };

      $('#input_username').focus(function () {
        $('#user-ada').addClass("d-none");
      });

      $('#tabel-customer').DataTable({
        "columnDefs": [
          { "orderable": false, "targets": 1 }
        ]
      });

      // ================= Tambah data customer =================== //
      $('#add-email-customer').focus(function () {
        $('#notif-email-terdaftar-add').addClass("d-none");
      });
      $('#form-tambah-customer').validate({
        messages: {
          add_nama_customer: {
            required: 'Harap isi bidang ini!'
          },
          add_email_customer: {
            required: 'Harap isi bidang ini!',
          },
          add_notelp_customer: {
            required: 'Harap isi bidang ini!',
          },
          add_dob_customer: {
            required: 'Harap isi bidang ini!',
          },
          add_alamat_customer: {
            required: 'Harap isi bidang ini!',
          }
        },
        submitHandler: submitForm_addcustomer
      });
      function submitForm_addcustomer() {
        // e.preventDefault();
        let data_customer_add = $('#form-tambah-customer').serialize();
        $.ajax({
          method: 'POST',
          url: 'ajax/proses_Tambahdata_customer.php',
          data: data_customer_add,
          beforeSend: function () {
            $("#btn-save-data-customer").html(`<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Menyimpan...`);
          },
          success: function (response) {
            if (response == 'Sukses') {
              Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: 'Data berhasil ditambahkan.',
                showConfirmButton: false,
                timer: 2000
              }).then(function() {
                window.location.href = '';
              })
            }
            else if(response == 'Gagal') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Data gagal ditambahkan.',
                showConfirmButton: false,
                timer: 2000
              }).then(function() {
                window.location.href = '';
              })
            }
            else if(response == 'email terdaftar') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Email sudah terdaftar!',
                showConfirmButton: false,
                timer: 2000
              });
              $('#notif-email-terdaftar-add').removeClass('d-none');
            }
          },
          complete: function () {
            $("#btn-save-data-customer").html(`<i class="fas fa-save"></i> Simpan`);
          },
          error: function () {
            alert("Terjadi masalah, silahkan coba beberapa saat lagi.");
          }
        });
      };
      // =============== popup view & edit ================== //
      $('.lihat_data').click(function(){
        let viewcus = $(this).data('viewcus');
        $.ajax({  
          url:"ajax/popup_lihat_customer.php",  
          method: 'POST',  
          data:{viewcus:viewcus},  
          success:function(data){
            $('#lihatDatacustomer-Detail').html(data);  
            $('#modal-LihatData').modal("show");  
          }  
        });  
      });
      $('.edit_data').click(function(){
        var editcus = $(this).data('editcus');
        $.ajax({  
          url:"ajax/popup_edit_customer.php",  
          method:"POST",  
          data:{editcus:editcus},  
          success:function(data){
            $('#EditDatacustomer-Edit').html(data);  
            $('#modal-EditData').modal("show");  
          }  
        });  
      });
      // =============== proses edit data customer ================= //
      $('#form-edit-customer').validate({
        messages: {
          edt_nama_customer: {
            required: 'Harap isi bidang ini!'
          },
          edt_email_customer: {
            required: 'Harap isi bidang ini!',
          },
          edt_notelp_customer: {
            required: 'Harap isi bidang ini!',
          },
          edt_dob_customer: {
            required: 'Harap isi bidang ini!',
          },
          edt_alamat_customer: {
            required: 'Harap isi bidang ini!',
          }
        },
        submitHandler: submitForm_editcustomer
      });
      function submitForm_editcustomer() {
        let data_edt_customer = $('#form-edit-customer').serialize();
        $.ajax({
          method: 'POST',
          url: 'ajax/proses_Editdata_customer.php',
          data: data_edt_customer,
          beforeSend: function () {
            $('#btn-simpan-edit-customer').html(`<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Mengubah...`);
          },
          success: function (response) {
            if (response == 'Sukses') {
              Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: 'Data berhasil diubah.',
                showConfirmButton: false,
                timer: 2000
              }).then(function() {
                window.location.href = '';
              })
            } else if(response == 'email sudah terdaftar') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Email sudah terdaftar',
                showConfirmButton: false,
                timer: 2000
              });
              $('#notif-email-terdaftar').removeClass('d-none');
            }
          },
          complete: function () {
            $('#btn-simpan-edit-customer').html(`Simpan`);
          },
          error: function () {
            alert('Terjadi masalah, silahkan coba beberapa saat lagi.');
          }
        })
      }
    });
  </script>
</body>

</html>