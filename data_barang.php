<?php
session_start();
// setcookie('cross-site-cookie', 'Sindycart', ['samesite' => 'strict', 'secure' => true]);
if (empty($_SESSION['loggedin'])) header('location: login.php');
// echo $_SESSION['loggedin']; 
require_once './koneksi/function.php';
// user login
$id_user = $_SESSION['loggedin'];
$data_user = $conn->query("SELECT * FROM tbl_user WHERE id_user = '$id_user'");
$row = $data_user->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Sindycart - Data Barang</title>
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
            <li class="nav-item">
              <a href="data_customer.php">
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
            <li class="nav-item active">
              <a href="">
                <i class="fas fa-box"></i>
                <p>Data Barang</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="#maps">
                <i class="fas fa-tshirt"></i>
                <p>Contoh Barang</p>
              </a>
            </li> -->
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
                <h2 class="text-white pb-2 fw-bold">Data Barang</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-inner mt--5">
          <div class="row mt--2">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <button class="btn btn-primary btn-sm shadow-sm" data-toggle="modal" data-target="#mdl-data-barang" title="Tambah data"><i class="fas fa-plus"></i> Data</button>
                </div>
                <div class="card-body" id="load-data-user">
                  <!-- <div class="table-responsive"> -->
                    <table id="tabel-barang" class="display table table-striped table-hover">
                      <thead>
                        <tr>
                          <th class="d-none"></th>
                          <th style="width: 130px">Opsi</th>
                          <th style="width: 120px">Foto barang</th>
                          <th>Bahan</th>
                          <th>Jenis</th>
                          <th>Harga</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th class="d-none"></th>
                          <th style="width: 130px">Opsi</th>
                          <th style="width: 120px">Foto barang</th>
                          <th>Bahan</th>
                          <th>Jenis</th>
                          <th>Harga</th>
                          <th>Keterangan</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        $tabel_barang = $conn->query("SELECT * FROM tbl_barang ORDER BY id_barang DESC");
                        foreach ($tabel_barang as $row_tabel_barang) : ?>
                          <tr>
                            <td class="d-none"></td>
                            <td class="d-flex align-items-center">
                              <button title="Lihat data" data-viewbar="<?=$row_tabel_barang['id_barang'] ?>" type="button" class="btn btn-primary lihat_data btn-sm mr-1"><i class="fas fa-eye"></i></button>
                              <button title="Edit data" data-editbar="<?=$row_tabel_barang['id_barang'] ?>" type="button" class="btn btn-primary edit_data btn-sm"><i class="fas fa-edit"></i></button>
                            </td>
                            <td><img height="40px" src="<?="assets/upload_image/" . $row_tabel_barang['foto_barang'] == '' ? "-" : "assets/upload_image/" . $row_tabel_barang['foto_barang'] ?>"></td>
                            <td><?=$row_tabel_barang['bahan_barang'] == '' ? "-" : $row_tabel_barang['bahan_barang'] ?></td>
                            <td class="text-nowrap"><?=$row_tabel_barang['jenis_barang'] == '' ? "-" : $row_tabel_barang['jenis_barang'] ?></td>
                            <td class="text-nowrap"><?=$row_tabel_barang['harga_barang'] == '' ? "-" : "Rp.".number_format($row_tabel_barang['harga_barang'], 2, ",", ".") ?></td>
                            <td class="text-nowrap"><?=$row_tabel_barang['keterangan_barang'] == 'ada' ? "Tersedia" : ($row_tabel_barang['keterangan_barang'] == 'kosong' ? 'Habis' : "Tersedia") ?></td>
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
  <!-- tambah data barang -->
  <div class="modal fade" id="mdl-data-barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog shadow" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah data</h5>
          <button type="button" class="close position-absolute mt-n3" data-dismiss="modal" aria-label="Close" title="close" style="right: 20px; z-index: 2">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="form-tambah-barang" enctype="multipart/form-data">
          <input type="hidden" name="add_ket_barang" value="ada">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="col d-flex justify-content-center mb-4 text-center">
                  <div class="input-file input-file-image">
                    <img class="img-upload-preview" width="150" src="https://via.placeholder.com/150" alt="preview">
                    <input type="file" class="form-control form-control-file" id="foto-barang" name="add_foto_barang" accept="image/*">
                    <label for="foto-barang" class="label-input-file btn btn-black btn-round">
                      <span class="btn-label">
                        <i class="fa fa-file-image"></i>
                      </span>
                      Upload gambar
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group form-group-default mb-4 position-relative">
                <label for="add-jenis-barang"><b>Jenis barang</b></label>
                <input type="text" class="form-control" id="add-jenis-barang" name="add_jenis_barang" required placeholder="Jenis barang">
              </div>
              <div class="form-group form-group-default mb-4">
                <label for="add-bahan-barang"><b>Bahan barang</b></label>
                <input type="text" class="form-control" id="add-bahan-barang" name="add_bahan_barang" required placeholder="Bahan barang">
              </div>
              <div class="form-group form-group-default mb-4">
                <label for="add-bahan-barang"><b>Harga barang</b></label>
                <input type="text" class="form-control" id="add-harga-barang" name="add_harga_barang" required placeholder="Harga barang">
              </div>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-right">
            <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Batal</button>
            <button type="submit" id="btn-save-data-barang" class="btn btn-primary" name="btn_tambah_barang"><i class="fas fa-save"></i> Simpan</button>
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
        <div class="modal-body" id="lihatDatabarang-Detail">  
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
        <form method="POST" id="form-edit-barang" enctype="multipart/form-data">
          <div class="modal-body" id="EditDatabarang-Edit">
          </div>
          <div class="modal-footer">
            <button id="btn-simpan-edit-barang" type="submit" name="btn-simpan-edit-barang" class="btn btn-secondary">Simpan</button>
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

      $('#tabel-barang').DataTable({
        "columnDefs": [
          { "orderable": false, "targets": 1 }
        ]
      });

      // ================= Tambah data barang =================== //
      $('#form-tambah-barang').validate({
        messages: {
          add_bahan_barang: {
            required: 'Harap isi bidang ini!'
          },
          add_jenis_barang: {
            required: 'Harap isi bidang ini!',
          },
          add_harga_barang: {
            required: 'Harap isi bidang ini!',
          }
        },
        submitHandler: submitForm_addbarang
      });
      function submitForm_addbarang() {
        // e.preventDefault();
        let data_barang_add = new FormData($('#form-tambah-barang')[0]);
        $.ajax({
          method: 'POST',
          url: 'ajax/proses_Tambahdata_barang.php',
          data: data_barang_add,
          beforeSend: function () {
            $("#btn-save-data-barang").html(`<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Menyimpan...`);
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
            else if(response == 'alamat salah') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Data gagal ditambahkan.',
                showConfirmButton: false,
                timer: 2000
              })
            }
            else if(response == 'ukuran besar') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Ukuran gambar terlalu besar!',
                showConfirmButton: false,
                timer: 2000
              })
            }
            else if(response == 'bukan gambar') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gambar yang diunggah bukan gambar!',
                showConfirmButton: false,
                timer: 2000
              });
            }
            else if(response == 'upload gambar') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Harap unggah gambar!',
                showConfirmButton: false,
                timer: 2000
              });
            }
          },
          processData: false,
          contentType: false,
          complete: function () {
            $("#btn-save-data-barang").html(`<i class="fas fa-save"></i> Simpan`);
          },
          error: function () {
            alert("Terjadi masalah, silahkan coba beberapa saat lagi.");
          }
        })
        return false;
      };
      // =============== popup view & edit ================== //
      $('.lihat_data').click(function(){
        let viewbar = $(this).data('viewbar');
        $.ajax({  
          url:"ajax/popup_lihat_barang.php",
          method: 'POST',
          data:{viewbar:viewbar},
          success:function(data){
            $('#lihatDatabarang-Detail').html(data);  
            $('#modal-LihatData').modal("show");  
          }  
        });  
      });
      $('.edit_data').click(function(){
        var editbar = $(this).data('editbar');
        $.ajax({  
          url:"ajax/popup_edit_barang.php",  
          method:"POST",  
          data:{editbar:editbar},  
          success:function(data){
            $('#EditDatabarang-Edit').html(data);  
            $('#modal-EditData').modal("show");  
          }  
        });  
      });
      // =============== proses edit data barang ================= //
      $('#form-edit-barang').validate({
        messages: {
          edt_bahan_barang: {
            required: 'Harap isi bidang ini!'
          },
          edt_jenis_barang: {
            required: 'Harap isi bidang ini!',
          },
          edt_harga_barang: {
            required: 'Harap isi bidang ini!',
          },
          edt_ket_barang: {
            required: 'Harap isi bidang ini!',
          }
        },
        submitHandler: submitForm_editbarang
      });
      function submitForm_editbarang() {
        let data_edt_barang = new FormData($('#form-edit-barang')[0]);
        $.ajax({
          method: 'POST',
          url: 'ajax/proses_Editdata_barang.php',
          data: data_edt_barang,
          beforeSend: function () {
            $('#btn-simpan-edit-barang').html(`<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Mengubah...`);
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
            } else if(response == 'alamat salah') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Data gagal ditambahkan.',
                showConfirmButton: false,
                timer: 2000
              })
            }
            else if(response == 'ukuran besar') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Ukuran gambar terlalu besar!',
                showConfirmButton: false,
                timer: 2000
              })
            }
            else if(response == 'bukan gambar') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gambar yang diunggah bukan gambar!',
                showConfirmButton: false,
                timer: 2000
              });
            }
            else if(response == 'upload gambar') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Harap unggah gambar!',
                showConfirmButton: false,
                timer: 2000
              });
            }
          },
          processData: false,
          contentType: false,
          complete: function () {
            $('#btn-simpan-edit-barang').html(`Simpan`);
          },
          error: function () {
            alert('Terjadi masalah, silahkan coba beberapa saat lagi.');
          }
        });
        return false;
      }
    });
  </script>
</body>

</html>