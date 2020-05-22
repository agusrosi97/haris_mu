<?php 
session_start();
if (!empty($_SESSION['loggedin_customer'])) :
  $id_customer = $_SESSION['loggedin_customer'];
else:
  header('location:customer/masuk.php');
endif;
empty($_SESSION['pilihan_barang']) == '' ? '' : header('location: welcome.php');
empty($_SESSION['pilihbarang']) == null ? '' : header('location:welcome.php');
  // $_SESSION['loggedin'] = '';
require 'koneksi/function.php';
$select_customer = $conn->query("SELECT * FROM tbl_customer WHERE id_customer = '".$id_customer."'");
$row_customer = $select_customer -> fetch_assoc();
// $session_barang = $conn -> query("SELECT * FROM tbl_barang WHERE id_barang = '".$_SESSION['pilihbarang']."'");
// $row_pilihan_barang = $session_barang -> fetch_assoc();
// $data_barang = $conn -> query("SELECT * FROM tbl_barang WHERE keterangan_barang = 'ada'");
include 'components/query_notif.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Sindycart - Pembayaran</title>
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
  <link rel="stylesheet" href="assets/css/atlantis2.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
  <div class="wrapper">

    <div class="main-header" data-background-color="purple">
      <div class="nav-top">
        <div class="container d-flex flex-row">
          <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <i class="icon-menu"></i>
            </span>
          </button>
          <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
          <!-- Logo Header -->
          <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo2.png" alt="navbar brand" class="navbar-brand" height="70" width="130">
          </a>
          <!-- End Logo Header -->

          <!-- Navbar Header -->
          <nav class="navbar navbar-header navbar-expand-lg p-0">

            <div class="container-fluid p-0">
              <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <?php if(!empty($_SESSION['loggedin_customer'])) :?>
                <li class="nav-item" <?=$count > 0 ? "title='Ada ".$count." pesanan belum dilunasi!'" : "title='Pesanan'" ?>>
                  <a href="pesanan.php" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <?php if ($count > 0) {
                      echo "<span class='notification bg-danger'>".$count."</span>";
                    } else {} ?>
                  </a>
                </li>
                <?php endif; ?>
                <li class="nav-item dropdown hidden-caret">
                  <?php if(empty($_SESSION['loggedin_customer'])) : ?>
                    <a href="masuk.php" class="text-white font-weight-bold">Masuk / Daftar</a>
                  <?php else : ?>
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                      <div class="avatar-sm">
                        <img src="assets/img/profile.jpg" alt="profile" class="avatar-img rounded-circle">
                      </div>
                    </a>
                  <?php endif; ?>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg"><img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
                          <div class="u-text">
                            <h4 class="pb-2">Hizrian</h4>
                            <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item font-weight-bold" href="keluar.php" style="color: red"><i class="fas fa-power-off"></i> Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
      </div>
      <div class="nav-bottom bg-white">
        <h3 class="title-menu d-flex d-lg-none">
          Menu
          <div class="close-menu"> <i class="flaticon-cross"></i></div>
        </h3>
        <div class="container d-flex flex-row">
          <ul class="nav page-navigation page-navigation-secondary">
            <li class="nav-item submenu active">
              <a class="nav-link" href="#">
                <i class="link-icon icon-home"></i>
                <span class="menu-title">Beranda</span>
              </a>
            </li>
            <li class="nav-item submenu mega-menu dropdown">
              <a class="nav-link" href="#">
                <i class="link-icon icon-layers"></i>
                <span class="menu-title">Produk</span>
              </a>
              <div class="navbar-dropdown animated fadeIn">
                <div class="col-group-wrapper row">
                  <div class="col-group col-md-4">
                    <div class="row">
                      <div class="col-12">
                        <p class="category-heading">Topi</p>
                        <div class="submenu-item">
                          <div class="row">
                            <div class="col-md-6">
                              <ul>
                                <li><a href="#">Accordion</a></li>
                                <li><a href="#">Buttons</a></li>
                                <li><a href="#">Badges</a></li>
                                <li><a href="#">Breadcrumbs</a></li>
                                <li><a href="#">Dropdown</a></li>
                                <li><a href="#">Modals</a></li>
                              </ul>
                            </div>
                            <div class="col-md-6">
                              <ul>
                                <li><a href="#">Progress bar</a></li>
                                <li><a href="#">Pagination</a></li>
                                <li><a href="#">Tabs</a></li>
                                <li><a href="#">Typography</a></li>
                                <li><a href="#">Tooltip</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-group col-md-4">
                    <div class="row">
                      <div class="col-12">
                        <p class="category-heading">Baju</p>
                        <div class="submenu-item">
                          <div class="row">
                            <div class="col-md-6">
                              <ul>
                                <li><a href="#">Datatables</a></li>
                                <li><a href="#">Carousel</a></li>
                                <li><a href="#">Clipboard</a></li>
                                <li><a href="#">Chart.js</a></li>
                                <li><a href="#">Loader</a></li>
                                <li><a href="#">Slider</a></li>
                              </ul>
                            </div>
                            <div class="col-md-6">
                              <ul>
                                <li><a href="#">Popup</a></li>
                                <li><a href="#">Notification</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-group col-md-4">
                    <p class="category-heading">Celana</p>
                    <ul class="submenu-item">
                      <li><a href="#">Flaticons</a></li>
                      <li><a href="#">Font Awesome</a></li>
                      <li><a class="3">Simple Line Icons</a></li>
                    </ul>
                  </div>
                  <div class="col-group col-md-4">
                    <p class="category-heading">Jaket</p>
                    <ul class="submenu-item">
                      <li><a href="#">Flaticons</a></li>
                      <li><a href="#">Font Awesome</a></li>
                      <li><a class="3">Simple Line Icons</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item submenu">
              <a class="nav-link" href="#">
                <i class="link-icon icon-information"></i>
                <span class="menu-title">Tentang Kami</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main-panel">
      <div class="container">
        <div class="page-inner py-3 rounded my-4 bg-white border">
          <form method="POST" id="form-pembayaran" enctype="multipart/form-data" class="row">
            <div class="col-md-5">
              <div class="col mb-4"><h3 class="border-bottom">Total pembayaran : Rp.<?=number_format($_SESSION['pilihan_barang']['total_harga'],2,",","."); ?></h3></div>
              <div class="col">
                <!-- SISA BAYAR -->
                <input type="hidden" name="sisa_bayar" id="sisa-bayar">
                <fieldset class="border rounded p-2">
                  <div class="form-group">
                    <p class="text-danger mb-0">*Harap tranfer sesuai dengan nomor rekenig!</p>
                  </div>
                  <div class="form-group">
                    <h5><b>Pilih metode pembayaran</b></h5>
                    <!-- METODE -->
                    <div class="custom-control custom-radio custom-control-inline" id="dp-trigger">
                      <input type="radio" id="dp" name="metode_pembayaran" class="custom-control-input trigger-radio" required value="dp">
                      <label class="custom-control-label" for="dp">DP (<i>Down Payment</i>)</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline" id="tranfer-trigger">
                      <input type="radio" id="tranfer" name="metode_pembayaran" class="custom-control-input trigger-radio" value="transfer_lunas">
                      <label class="custom-control-label" for="tranfer">Transfer lunas</label>
                    </div>
                  </div>
                  <div class="form-group pt-0 d-none" id="ket-bayar">
                    <h4 id="inp-ket" class="pt-0"></h4>
                  </div>
                  <div class="form-group">
                    <h5><b>Pilih bank :</b></h5>
                    <!-- BANK -->
                    <select name="bank" class="form-control col-sm-6" required id="bank" disabled>
                      <option value='0'>Pilih ...</option>
                      <option value="bca">BCA</option>
                      <option value="bni">BNI</option>
                      <option value="mandiri">MANDIRI</option>
                      <option value="bri">BRI</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <h5><b>Nomor rekening :</b></h5>
                    <input type="text" readonly class="form-control-plaintext" id="nomor-req" value="XXX-XXX-XXXX">
                  </div>
                  <?php if($row_customer['notelp_customer'] == '') : ?>
                    <div class="form-group">
                      <label>*Masukkan nomor telepon Anda :</label>
                      <!-- INPUT NO TELP -->
                      <input type="number" name="inp_telepon_customer" class="form-control col-md-7" required>
                    </div>
                  <?php else : ?>
                    <label class="pl-2">*Nomor telepon Anda :</label>
                    <div class="input-group mb-3 px-2">
                      <!-- INPUT NO TELP -->
                      <input value="<?=$row_customer['notelp_customer'] ?>" type="number" name="inp_telepon_customer" class="form-control" required readonly id="inp-telp">
                      <div class="input-group-append">
                        <button type="button" class="btn btn-secondary" id="btn-edit-telp"><i class="fas fa-pencil-alt"></i></button>
                      </div>
                    </div>
                  <?php endif ?>
                </fieldset>
              </div>
            </div>
            <div class="col-md-7 border-left mt-3">
              <div class="col d-flex justify-content-center mb-4 text-center align-items-center h-100" id="wrapper-foto">
                <div id="wrapper-btn-tanya"><button type="button" class="btn btn-primary" id="btn-tanya" disabled><h2 class="mb-0">Sudah membayar?</h2></button></div>
                <div class="input-file input-file-image d-none" id="wrapper-foto-transaksi">
                  <img class="img-upload-preview" width="300" src="https://via.placeholder.com/300x300" alt="preview">
                  <!-- foto transaksi -->
                  <input type="file" class="form-control form-control-file" id="foto-bukti-transaksi" name="foto_bukti_transaksi" accept="image/*" required>
                  <label for="foto-bukti-transaksi" class="label-input-file btn btn-black btn-round">
                    <span class="btn-label">
                      <i class="fa fa-file-image"></i>
                    </span>
                    <span id="text-ganti">Masukkan bukti transaksi ...</span>
                  </label>
                </div>
              </div>
              <div class="d-flex justify-content-xl-end justify-content-center">
                <div class="mt-4 d-none" id="wrapper-btn-konfirmasi">
                  <button class="btn btn-primary" type="submit"  id="btn-konfirmsi" name="btn_proses_transaksi" disabled><b>PROSES PESANAN</b></button>
                  <button class="btn btn-danger" type="button" onclick="window.location.href = 'components/clear_session_pilihan_barang_to_welcome.php'"><b>BATAL</b></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php include 'footer/footer-customer.php'; ?>
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
  <script src="assets/js/plugin/chart.js/chart.min.js"></script>

  <!-- jQuery Sparkline -->
  <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

  <!-- Chart Circle -->
  <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

  <!-- Datatables -->
  <script src="assets/js/plugin/datatables/datatables.min.js"></script>

  <!-- Bootstrap Notify -->
  <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!-- Bootstrap Toggle -->
  <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

  <!-- Dropzone -->
  <script src="assets/js/plugin/dropzone/dropzone.min.js"></script>

  <!-- Fullcalendar -->
  <script src="assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

  <!-- DateTimePicker -->
  <script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

  <!-- Bootstrap Tagsinput -->
  <script src="assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

  <!-- Bootstrap Wizard -->
  <script src="assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

  <!-- jQuery Validation -->
  <script src="assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

  <!-- Summernote -->
  <script src="assets/js/plugin/summernote/summernote-bs4.min.js"></script>

  <!-- Select2 -->
  <script src="assets/js/plugin/select2/select2.full.min.js"></script>

  <!-- Select2 -->
  <!-- <script src="assets/js/plugin/bootstrap-select/bootstrap.select.min.js"></script> -->

  <!-- Sweet Alert -->
  <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

  <!-- Owl Ccarousel -->
  <script type="text/javascript" src="assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

  <!-- Atlantis JS -->
  <script src="assets/js/atlantis2.min.js"></script>

  <!-- Atlantis DEMO methods, don't include it in your project! -->
  <!-- <script src="assets/js/demo.js"></script> -->

  <script type="text/javascript">
    $(document).ready(function () {
      function formatRupiah(angka, prefix){
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
        split       = number_string.split(','),
        sisa        = split[0].length % 3,
        rupiah      = split[0].substr(0, sisa),
        ribuan      = split[0].substr(sisa).match(/\d{3}/gi);
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
      };
      $('#dp-trigger').click(function () {
        var total_bayar = <?=$_SESSION['pilihan_barang']['total_harga'] ?>;
        var hasil = (total_bayar/2);
        $('#inp-ket').html("*Anda bisa mentransfer <b>Rp."+formatRupiah(hasil,' ')+"</b> terlebih dahulu sebagai uang muka.");
        $('#ket-bayar').removeClass('d-none');
        $('#sisa-bayar').val(hasil);
      });
      $('#tranfer-trigger').click(function () {
        $('#inp-ket').html("*Anda harus mentransfer sebanyak nominal yang tertera.");
        $('#ket-bayar').removeClass('d-none');
        $('#sisa-bayar').val(0);
      });
      // NEXT
      $('.trigger-radio').click(function () {
        $('#bank').prop("disabled", false);
      });
      // NEXT
      $('#bank').change(function () {
        var bank = $(this).val();
        if (bank !== '0') {
          $('#btn-tanya').prop("disabled", false);
        } else {
          $('#btn-tanya').prop("disabled", true);
        }
      });
      $('#btn-tanya').click(function () {
        $('#wrapper-foto').removeClass('align-items-center h-100');
        $('#wrapper-btn-tanya').addClass('d-none');
        $('#wrapper-foto-transaksi').removeClass('d-none');
        $('#wrapper-btn-konfirmasi').removeClass('d-none');
      });
      $('#foto-bukti-transaksi').change(function () {
        if ($(this).val() !== '') {
          $('#btn-konfirmsi').prop("disabled", false);
          $('#text-ganti').html("Ganti foto bukti transaksi ...");
        } else {
          $('#btn-konfirmsi').prop("disabled", true);
          $('#text-ganti').html("Masukkan bukti transaksi ...");
        }
      });
      $('#btn-edit-telp').click(function () {
        $('#inp-telp').prop('readonly', false);
      });
      $('#form-pembayaran').validate({
        messages: {
          inp_telepon_customer: {
            required: 'Harap isi bidang ini!'
          },
        },
        submitHandler: submit_pembayaran
      });
      function submit_pembayaran() {
        let data_pembayaran = new FormData($('#form-pembayaran')[0]);
        $.ajax({
          method: 'POST',
          url: 'ajax/proses_simpan_transaksi.php',
          data: data_pembayaran,
          beforeSend: function () {
            $('#btn-konfirmsi').html(`<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Mohon menunggu...`);
          },
          success: function (response) {
            if (response == 'Sukses') {
              Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: 'Terimakasih, pesanan Anda akan kami proses.',
                showConfirmButton: false,
                timer: 2000
              })
              .then(function() {
                window.location.href = 'components/clear_session_pilihan_barang_to_welcome.php';
              })
            } else if (response == 'Error') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi masalah, silahkan coba beberapa saat lagi.',
                showConfirmButton: false,
                timer: 2000
              })
            } else if (response == 'terjadi masalah') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi masalah, silahkan coba beberapa saat lagi.',
                showConfirmButton: false,
                timer: 2000
              })
            } else if (response == 'bukan gambar') {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'File yang anda unggah bukan file gambar!',
                showConfirmButton: false,
                timer: 2000
              })
            }
          },
          processData: false,
          contentType: false,
          complete: function () {
            $('#btn-konfirmsi').html("PROSES PESANAN");
          },
          error: function () {
            alert('Terjadi masalah, silahkan coba beberapa saat lagi!');
          }
        })
      }
    });
  </script>
</body>

</html>