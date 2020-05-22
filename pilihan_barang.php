<?php 
session_start();
if (!empty($_SESSION['loggedin_customer'])) :
  $id_customer = $_SESSION['loggedin_customer'];
endif;
empty($_SESSION['pilihbarang']) == null ? '' : header('location:welcome.php') ;
require 'koneksi/function.php';
$session_barang = $conn -> query("SELECT * FROM tbl_barang WHERE id_barang = '".$_SESSION['pilihbarang']."'");
$row_pilihan_barang = $session_barang -> fetch_assoc();
$data_barang = $conn -> query("SELECT * FROM tbl_barang WHERE keterangan_barang = 'ada'");
include 'components/query_notif.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Sindycart - pilihan barang</title>
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
            <li class="nav-item submenu">
              <a class="nav-link" href="welcome.php">
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
        <div class="page-inner border py-3 rounded shadow-sm my-4 bg-white">
          <div class="row">
            <div class="col-12">
              <div>
                <a href="welcome.php">
                  <i class="fas fa-long-arrow-alt-left" style="font-size: 20px; vertical-align: middle; padding-bottom: 1.3px;"></i> Kembali
                </a>
              </div>
              <div class="text-center mb-3">
                <h1>Buat Pesanan</h1>
              </div> 
            </div>
          </div>
          <div class="row">
            <!-- FOTO -->
            <div class="col-sm-2 text-center">
              <div class="col">
                <span class="text-muted"><h5>Item yang dipilih</h5></span>
                <img width="300" class="img-fluid rounded my-2" src="assets/img/<?=$row_pilihan_barang['foto_barang'] ?>" alt="">
                <span class="text-muted"><h5>Harga: Rp.<?=number_format($row_pilihan_barang['harga_barang'],2,",",".") ?>,-</h5></span>
              </div>
            </div>
            <!-- FORM PESANAN -->
            <div class="col-sm-7">
              <form action="./ajax/session_pilian_barang.php" method="POST" id="form_pilihan_barang" enctype="multipart/form-data">
                <input type="hidden" name="inp_total_pcs" id="total-pcs-session">
                <input type="hidden" name="inp_foto_barang" value="<?=$row_pilihan_barang['foto_barang'] ?>">
                <input type="hidden" name="inp_total_harga" class="total_harga_ihdden">
                <input type="hidden" id="inp-foto-desain" name="inp_foto_desain">
                <div class="form-group row">
                  <label for="inp-jenis-barang" class="col-sm-2 col-form-label">Jenis :</label>
                  <div class="col-sm-5">
                    <input type="text" name="inp_jenis_barang" readonly class="form-control" id="inp-jenis-barang" value="<?=$row_pilihan_barang['jenis_barang'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inp-bahan-barang" class="col-sm-2 col-form-label">Bahan :</label>
                  <div class="col-sm-5">
                    <input type="text" name="inp_bahan_barang" readonly class="form-control" id="inp-bahan-barang" value="<?=$row_pilihan_barang['bahan_barang'] ?>">
                  </div>
                </div>
                <div id="input-wrapper">
                  <div id="bungkus1" class="form-row" style="padding: 10px">
                    <div class="form-group col-sm-4">
                      <label for="inp-pesanan-untuk">Pesanan untuk :</label>
                      <select class="form-control" id="inp-pesanan-untuk" name="inp_pesanan_untuk[]" required>
                        <option value="">Pilih</option>
                        <option value="Pria Dewasa">Pria dewasa</option>
                        <option value="Wanita Dewasa">Wanita dewasa</option>
                        <option value="Anak Laki-laki">Anak laki-laki</option>
                        <option value="Anak Perempuan">Anak perempuan</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-3">
                      <label for="inp-ukuran-barang">Ukuran :</label>
                      <select class="form-control" id="inp-ukuran-barang" name="inp_ukuran_barang[]" required>
                        <option value="">Pilih</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-2">
                      <label for="inp-pcs-barang">Jumlah /Pcs :</label>
                      <input type="number" min="0" name="inp_pcs_barang[]" class="inp-pcs-barang form-control" required>
                    </div>
                    <div class="form-group col-sm-2">
                      <label>&nbsp;</label>
                      <button id="add1" type="button" class="btn btn-primary btn-round form-control px-0">Tambah lagi</button>
                    </div>
                    <div class="form-group col-sm-1 btn_delete_append"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Warna :</label>
                  <div class="row gutters-xs">
                    <div class="col-auto">
                      <label class="colorinput">
                        <input name="inp_warna_barang" type="radio" value="hitam" class="colorinput-input" required>
                        <span class="colorinput-color bg-black"></span>
                      </label>
                    </div>
                    <div class="col-auto">
                      <label class="colorinput">
                        <input name="inp_warna_barang" type="radio" value="biru" class="colorinput-input">
                        <span class="colorinput-color bg-primary"></span>
                      </label>
                    </div>
                    <div class="col-auto">
                      <label class="colorinput">
                        <input name="inp_warna_barang" type="radio" value="ungu" class="colorinput-input">
                        <span class="colorinput-color bg-secondary"></span>
                      </label>
                    </div>
                    <div class="col-auto">
                      <label class="colorinput">
                        <input name="inp_warna_barang" type="radio" value="biru_muda" class="colorinput-input">
                        <span class="colorinput-color bg-info"></span>
                      </label>
                    </div>
                    <div class="col-auto">
                      <label class="colorinput">
                        <input name="inp_warna_barang" type="radio" value="hijau" class="colorinput-input">
                        <span class="colorinput-color bg-success"></span>
                      </label>
                    </div>
                    <div class="col-auto">
                      <label class="colorinput">
                        <input name="inp_warna_barang" type="radio" value="merah" class="colorinput-input">
                        <span class="colorinput-color bg-danger"></span>
                      </label>
                    </div>
                    <div class="col-auto">
                      <label class="colorinput">
                        <input name="inp_warna_barang" type="radio" value="oranye" class="colorinput-input">
                        <span class="colorinput-color bg-warning"></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row px-2">
                  <div class="form-group col-sm-3">
                    <label>Total Pcs :</label>
                    <input type="text" class="total form-control" readonly value="0" id="total-pcs">
                  </div>
                  <div class="form-group col-sm-5">
                    <label>Total harga :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                      </div>
                      <input type="text" class="form-control total_harga font-weight-bold" value="0" disabled>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <span class="text-muted">*Total pesanan harus 12Pcs / lebih.</span>
                </div>
                <div class="d-flex justify-content-center border-top pt-3">
                  <button id="btn-simpan-pesanan" type="button" class="btn btn-primary btn-round font-weight-bolder px-5" data-toggle="modal" data-target="#popup_konfirmasi" disabled>PESAN</button>
                  <button class="btn btn-primary btn-border btn-round ml-3" type="button" onclick="window.location.href = 'components/clear_session_pilihan_barang.php'">Ulangi</button>
                </div>
              </form>
            </div>
            <div class="col-sm-3">
              <div class="text-center d-sm-none d-md-block">
                <h3>Punya desain sendiri?</h3>
              </div>
              <div class="col d-flex justify-content-center mb-4 text-center">
                <div class="input-file input-file-image">
                  <img class="img-upload-preview" width="300" src="https://via.placeholder.com/300x400" alt="preview">
                  <input type="file" class="form-control form-control-file" id="foto-barang" accept="image/*" form="form_pilihan_barang" name="foto_desain_customer">
                  <label for="foto-barang" class="label-input-file btn btn-black btn-round">
                    <span class="btn-label">
                      <i class="fa fa-file-image"></i>
                    </span>
                    Masukkan desain ...
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer/footer-customer.php'; ?>
  </div>
  <!-- popup konfirmasi -->
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
          <button type="submit" class="btn btn-primary" name="btn_simpan_pesanan" form="form_pilihan_barang">Iya!</button>
        </div>
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
      var i = 1;
      $('#add1').click(function () {
        i++;
        $('#input-wrapper').append(
          `<div id="bungkus`+i+`" class="form-row" style="padding: 10px">
            <div class="form-group col-sm-4">
              <select class="form-control" name="inp_pesanan_untuk[]" required>
                <option value="">Pilih</option>
                <option value="Pria Dewasa">Pria dewasa</option>
                <option value="Wanita Dewasa">Wanita dewasa</option>
                <option value="Anak Laki-laki">Anak laki-laki</option>
                <option value="Anak Perempuan">Anak perempuan</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <select class="form-control" name="inp_ukuran_barang[]" required>
                <option value="">Pilih</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
              </select>
            </div>
            <div class="form-group col-sm-2">
              <input type="number" min="0" name="inp_pcs_barang[]" class="inp-pcs-barang form-control" required>
            </div>
            <div class="form-group col-sm-2">
              <button id="add`+i+`" type="button" class="add_btn btn-round btn btn-primary form-control px-0">Tambah lagi</button>
            </div>
            <div class="form-group col-sm-1">
              <button id="`+i+`" type="button" class="btn btn-danger btn-round form-control remove_btn"><i class="fas fa-trash-alt" style="margin-left: -6px"></i></button>
            </div>
          </div>`);
        $(this).html(`<i class="fas fa-check"></i>`);
        $(this).prop('disabled', true);
        $('.btn_delete_append').append(`<label>&nbsp;</label>
              <button id="1" type="button" class="btn btn-danger btn-round form-control remove_btn"><i class="fas fa-trash-alt" style="margin-left: -6px"></i></button>`);
      });
      $(document).on('click','.add_btn', function(){
        i++;
        $('#input-wrapper').append(`<div id="bungkus`+i+`" class="form-row" style="padding: 10px">
            <div class="form-group col-sm-4">
              <select class="form-control" name="inp_pesanan_untuk[]" required>
                <option value="">Pilih</option>
                <option value="Pria Dewasa">Pria dewasa</option>
                <option value="Wanita Dewasa">Wanita dewasa</option>
                <option value="Anak Laki-laki">Anak laki-laki</option>
                <option value="Anak Perempuan">Anak perempuan</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <select class="form-control" name="inp_ukuran_barang[]" required>
                <option value="">Pilih</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
              </select>
            </div>
            <div class="form-group col-sm-2">
              <input type="number" min="0" name="inp_pcs_barang[]" class="inp-pcs-barang form-control">
            </div>
            <div class="form-group col-sm-2">
              <button id="add`+i+`" type="button" class="add_btn btn btn-primary btn-round form-control px-0">Tambah lagi</button>
            </div>
            <div class="form-group col-sm-1">
              <button id="`+i+`" type="button" class="btn btn-danger btn-round form-control remove_btn"><i class="fas fa-trash-alt" style="margin-left: -6px"></i></button>
            </div>
          </div>`);
        $(this).html("<i class='fas fa-check'></i>");
        $(this).prop('disabled', true);
      });
      $(document).on('click','.remove_btn', function(){
        var sum_a = 0;
        var btn_id = $(this).attr("id");
        $("#bungkus"+btn_id+"").remove();
        $(".inp-pcs-barang").each(function(){
          sum_a += +$(this).val();
        });
        $(".total").val(sum_a);
      });
      $(document).on("focus change keyup", ".inp-pcs-barang", function() {
        var sum = 0;
        $(".inp-pcs-barang").each(function(){
          sum += +$(this).val();
        });
        $(".total").val(sum);
      });
      $(document).on("focus change keyup", ".inp-pcs-barang", function () {
        var total_Harga = <?=$row_pilihan_barang['harga_barang'] ?>;
        var jml_pcs = $('.total').val();
        var jumlah_bayar = (total_Harga * jml_pcs);
        $('#total-pcs-session').val(jml_pcs);
        $('.total_harga').val(formatRupiah(jumlah_bayar,' '));
        $('.total_harga_ihdden').val(jumlah_bayar);
        // harus >= 12
        if ($('#total-pcs').val() >= 12) {
          $('#btn-simpan-pesanan').prop("disabled", false);
        }else{
          $('#btn-simpan-pesanan').prop("disabled", true);
        }
      });
      $('#foto-barang').change(function () {
        var gmbr = document.getElementById('foto-barang').files[0].name;
        $('#inp-foto-desain').val(gmbr);
      });
    });
  </script>
</body>

</html>