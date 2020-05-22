<?php
session_start();
if (!empty($_SESSION['loggedin_customer'])) :
  $id_customer = $_SESSION['loggedin_customer'];
else :
  header('location:welcome.php');
endif;
require 'koneksi/function.php';
$data_pesanan = $conn->query("
  SELECT tbl_pesanan.*, tbl_barang.*, tbl_customer.*, tbl_user.*, tbl_transaksi_pembayaran.*
  FROM tbl_pesanan
  LEFT JOIN tbl_barang ON tbl_pesanan.id_barang = tbl_barang.id_barang
  LEFT JOIN tbl_customer ON tbl_pesanan.id_customer = tbl_customer.id_customer
  LEFT JOIN tbl_user ON tbl_pesanan.id_user = tbl_user.id_user
  LEFT JOIN tbl_transaksi_pembayaran ON tbl_pesanan.id_transaksi_pembayaran = tbl_transaksi_pembayaran.id_transaksi_pembayaran
  WHERE tbl_pesanan.id_customer = '".$id_customer."'
  ORDER BY tbl_pesanan.id_pesanan DESC
  ");
$count_pesanan = $data_pesanan->num_rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Sindycart</title>
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
  <style type="text/css">
    .transition-3d-hover:hover, .transition-3d-hover:focus {
      -webkit-transform: translateY(-3px);
      transform: translateY(-3px);
    }
    .transition-3d-hover {
      transition: all 0.2s ease-in-out;
    }
  </style>
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
              <!-- <div class="collapse" id="search-nav">
                <form class="navbar-left navbar-form nav-search ml-md-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <button type="submit" class="btn btn-search pr-1">
                        <i class="fa fa-search search-icon"></i>
                      </button>
                    </div>
                    <input type="text" placeholder="Pencarian ..." class="form-control">
                  </div>
                </form>
              </div> -->
              <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <!-- <li class="nav-item toggle-nav-search hidden-caret">
                  <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                  </a>
                </li> -->
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
        <div class="page-inner bg-white my-4">
          <?php if($count_pesanan <= 0 ) : ?>
            <div class="text-center mx-auto col-3">
              <figure id="iconEmptyCart" class="ie-height-111 max-width-15 mx-auto mb-3" style="">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" style="enable-background:new 0 0 120 120;" xml:space="preserve" class="injected-svg js-svg-injector" data-parent="#iconEmptyCart">
                <style type="text/css">
                  .icon-66-0{fill:none;stroke:#BDC5D1;}
                  .icon-66-1{fill:#377DFF;}
                  .icon-66-2{fill:#FFFFFF;}
                  .icon-66-3{fill:#BDC5D1;}
                </style>
                <polygon class="icon-66-0 fill-none stroke-gray-400" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="102.6,89.5 42.8,89.5 17.7,32.1 2.1,32.1 2.1,24.9 22.4,24.9 47.5,82.3 102.6,82.3 "></polygon>
                <path class="icon-66-1 fill-primary" d="M66.7,107.4c0,5.9-4.8,10.8-10.8,10.8s-10.8-4.8-10.8-10.8S50,96.7,55.9,96.7S66.7,101.5,66.7,107.4z"></path>
                <path class="icon-66-1 fill-primary" d="M102.6,107.4c0,5.9-4.8,10.8-10.8,10.8S81,113.4,81,107.4s4.8-10.8,10.8-10.8S102.6,101.5,102.6,107.4z"></path>
                <path class="icon-66-2 fill-white" d="M95.1,107.4c0,1.8-1.5,3.3-3.3,3.3s-3.3-1.5-3.3-3.3s1.5-3.3,3.3-3.3S95.1,105.6,95.1,107.4z"></path>
                <path class="icon-66-2 fill-white" d="M59.2,107.4c0,1.8-1.5,3.3-3.3,3.3c-1.8,0-3.3-1.5-3.3-3.3s1.5-3.3,3.3-3.3C57.7,104.2,59.2,105.6,59.2,107.4z"></path>
                <circle class="icon-66-3 fill-gray-400" opacity=".5" cx="95.1" cy="30.3" r="24.9"></circle>
                <circle class="icon-66-2 fill-white" opacity=".5" cx="91.8" cy="26.9" r="24.9"></circle>
                <path class="icon-66-1 fill-primary" d="M91.8,1.8C77.9,1.8,66.7,13,66.7,26.9S77.9,52,91.8,52s25.1-11.2,25.1-25.1S105.7,1.8,91.8,1.8z M104.5,34.5  l-5.1,5.1L91.8,32l-7.6,7.6l-5.1-5.1l7.6-7.6l-7.6-7.6l5.1-5.1l7.6,7.6l7.6-7.6l5.1,5.1l-7.6,7.6L104.5,34.5z"></path>
                <path class="icon-66-3 fill-gray-400" d="M91.8,60.8c-13.7,0-25.4-8.7-30-20.8c-0.2-0.4-0.6-0.7-1-0.7H39.6c-0.8,0-1.3,0.8-1,1.5L52,74.4  c0.2,0.4,0.6,0.7,1,0.7h48.7c0.5,0,0.9-0.3,1-0.7l6.7-16.7c0.4-1-0.7-1.9-1.6-1.4C103.2,59.2,97.7,60.8,91.8,60.8z"></path>
                </svg>
              </figure>
            </div>
            <div class="col-sm-5 mx-auto text-center">
              <div class="mb-5">
                <h1 class="h1 font-weight-bold">Pesanan Anda saat ini kosong 😥</h1>
                <p>Anda belum pernah memesan apapun pada "Toko" Kami, silahkan memesan terlebih dahulu.</p>
              </div>
              <a class="btn btn-primary btn-round transition-3d-hover px-5 font-weight-bold" style="font-size: 20px" href="welcome.php">Pesan sekarang!</a>
            </div>
          <?php else : ?>
            <div class="row">
              <div class="col-12">
                <div>
                  <a href="#" onclick="window.history.go(-1)">
                    <i class="fas fa-long-arrow-alt-left" style="font-size: 20px; vertical-align: middle; padding-bottom: 1.3px;">
                    </i> Kembali
                  </a>
                </div>
                <div class="text-center mb-3"><h1 class="text-uppercase">pesanan anda</h1></div>
              </div>
            </div>
            <div class="row">
              <table class="table table-responsive table-striped table-hover" id="tbl-pesanan" style="border-spacing: 0px 10px !important">
                <thead>
                  <tr>
                    <th class="d-none"></th>
                    <th scope="col">Nomor</th>
                    <th scope="col" class="text-uppercase">Tanggal pesanan</th>
                    <th scope="col">Item pilihan</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Jenis bahan</th>
                    <th scope="col">Pesanan untuk</th>
                    <th scope="col">Ukuran - Pcs</th>
                    <th scope="col">Jumlah pesanan</th>
                    <th scope="col">Desain</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Sisa pembayaran</th>
                    <th scope="col" class="text-center">Aksi</th>
                    <th scope="col" class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($data_pesanan as $row_pesanan) {
                  $pesanan_untuk = explode(',', $row_pesanan['pesanan_untuk']);
                  $ukuran = explode(',', $row_pesanan['ukuran']);
                  $pcs = explode(',', $row_pesanan['pcs']);
                  $timestamp = $row_pesanan["jam_transaksi"];
                  $datetime = explode(" ",$timestamp);
                  $date = $datetime[0];
                  $time = $datetime[1];
                  $time12Hour = date_format(new Datetime($time), "h:i:s A");
                  ?>
                  <tr>
                    <td class="d-none"></td>
                    <th scope="row" class="py-5 my-5" <?php if($row_pesanan['sisa_pembayaran'] > 0) : ?> style="border-left: 4px solid #fc4545 !important;" <?php endif; ?>><?="PES#0".$row_pesanan['id_pesanan'] ?>
                    </th>
                    <td class="text-nowrap"><?=tgl_indo($date)."</br>".$time12Hour ?></td>
                    <td>
                      <div class="data_foto_item" style="cursor: pointer; width: 30px !important" data-fotoitem="<?=$row_pesanan['id_pesanan'] ?>">
                        <img style="width: 40px !important" src="assets/upload_image/<?=$row_pesanan['foto_item']?>" alt="" data-toggle="modal" data-target="#modal-foto-item">
                      </div>
                    </td>
                    <td><?=ucwords(str_replace('_',' ', $row_pesanan['warna'])) ?></td>
                    <td><?=ucwords($row_pesanan['bahan']) ?></td>
                    <td class="text-nowrap"><?php foreach ($pesanan_untuk as $value_pesanan_untuk) {
                      echo "<i class='fas fa-caret-right'></i> ".$value_pesanan_untuk."</br>";
                    } ?>
                    </td>
                    <td class="text-nowrap">
                      <?php foreach ($ukuran as $key => $value_ukpcs) {
                        echo $value_ukpcs." - ".$pcs[$key]." Pcs</br>";
                      } ?>
                    </td>
                    <td><?=$row_pesanan['jumlah_pesanan']." Pcs" ?></td>
                    <td>
                      <?php if($row_pesanan['foto_desain'] == '') : ?>
                      <?php else : ?>
                        <div class="data_foto" style="cursor: pointer;" data-fotodesain="<?=$row_pesanan['id_pesanan'] ?>">
                          <img src="assets/upload_foto_desain/<?=$row_pesanan['foto_desain']?>" alt="" data-toggle="modal" data-target="#modal-foto-desain">
                        </div>
                      <?php endif; ?>
                    </td>
                    <td><?="Rp.".number_format($row_pesanan['total_pembayaran'],2,",",".") ?></td>
                    <td><?=strtoupper((str_replace('_',' ', $row_pesanan['metode_pembayaran']))) ?></td>
                    <td><?="Rp.".number_format($row_pesanan['sisa_pembayaran'],0,",",".") ?></td>
                    <td>
                      <div class="p-3 d-flex">
                        <button type="button" class="btn btn-primary p-2 btn-sisa-bayar" data-sisapembayaran="<?=$row_pesanan['id_pesanan'] ?>" <?php if($row_pesanan['sisa_pembayaran'] <= 0) {echo'disabled';} ?>>Selesaikan pembayaran</button>
                        <!-- BTN BATAL PESANAN -->
                        <!-- <button class="btn btn-danger p-2 ml-2" <?php #if($row_pesanan['sisa_pembayaran'] <= 0) {echo'disabled';} ?>>Batalkan</button> -->
                      </div>
                    </td>
                    <td>
                      <?php if($row_pesanan['status_pesanan'] == NULL) : ?>
                        <button class="btn btn-dark text-nowrap" type="button">Menunggu konfirmasi</button>
                      <?php endif ?>
                    </td>
                  </tr>
                <?php
                ++$no;
                } ?>
                </tbody>
              </table>
              <span class="ml-3 mt-3" style="border-left: 4px solid #fc4545; padding-left: 4px"> = Belum melunasi sisa pembayaran.</span>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php include 'footer/footer-customer.php'; ?>
  </div>
  <!-- POPUP FOTO ITEM -->
  <div class="modal fade" id="modal-foto-item" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content shadow">
        <div class="modal-header">
          <h5 class="modal-title">Foto item pilihan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="wrapper-data-foto-item">
        </div>
        <button type="button" class="btn btn-secondary" style="border-top-left-radius: 0px !important; border-top-right-radius: 0px !important" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
  <!-- POPUP FOTO DESAIN -->
  <div class="modal fade" id="modal-foto-desain" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content shadow">
        <div class="modal-header">
          <h5 class="modal-title">Foto Desain</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="wrapper-data-foto-desain">
        </div>
        <button type="button" class="btn btn-secondary" style="border-top-left-radius: 0px !important; border-top-right-radius: 0px !important" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
  <!-- POPUP SISA PEMBAYARAN -->
  <div class="modal fade" id="modal-sisa-pembayaran" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <form method="POST" id="form-pembayaran" enctype="multipart/form-data" class="modal-content shadow">
        <div class="modal-header">
          <h5 class="modal-title">Masukkan Foto pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="wrapper-data-sisa-pembayaran">
        </div>
        <div class="modal-footer text-right mt-4 pt-3" style="border-top: 1px solid #dee2e6">
          <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Jangan sekarang</button>
          <button type="submit" class="btn btn-primary text-uppercase" disabled id="btn-proses-transaksi" name="btn_sisa_pembayaran">Proses Transaksi</button>
        </div>
      </form>
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
      $('#tbl-pesanan').dataTable({
        "language": {
          "emptyTable": "<span class='lead'>Anda belum pernah melakukan pemesanan. 😔</span>"
        }
      });
      // LIHAT FOTO item
      $('.data_foto_item').click(function () {
        let ajxdt_item = $(this).data('fotoitem');
        $.ajax({
          method: 'POST',
          data: {ajxdt_item:ajxdt_item},
          url: 'ajax/popup_foto_item.php',
          success: function (data) {
            $('#wrapper-data-foto-item').html(data);
            $('#modal-foto-item').modal("show");
          }
        })
      });
      // LIHAT FOTO desain
      $('.data_foto').click(function () {
        let ajxdt = $(this).data('fotodesain');
        $.ajax({
          method: 'POST',
          data: {ajxdt:ajxdt},
          url: 'ajax/popup_foto_desain.php',
          success: function (data) {
            $('#wrapper-data-foto-desain').html(data);
            $('#modal-foto-desain').modal("show");
          }
        })
      });
      // POPUP UPLOAD TRANSAKASI
      $('.btn-sisa-bayar').click(function () {
        let data_sisa_bayar = $(this).data('sisapembayaran');
        $.ajax({
          method: 'POST',
          data: {data_sisa_bayar:data_sisa_bayar},
          url: 'ajax/popup_sisa_pembayaran.php',
          success: function (data) {
            $('#wrapper-data-sisa-pembayaran').html(data);
            $('#modal-sisa-pembayaran').modal("show");
          }
        })
      });
      // PROSES SIMPAN DATA
      $('#btn-proses-transaksi').click(function () {
        $('#form-pembayaran').validate({
          submitHandler: prosesBayar
        });
        function prosesBayar() {
          let data_pembayaran = new FormData($('#form-pembayaran')[0]);
          $.ajax({
            method: 'POST',
            data: data_pembayaran,
            url: 'ajax/proses_sisa_pembayaran.php',
            beforeSend: function () {
              $('#btn-proses-transaksi').html(`<span class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></span><span class="sr-only"></span> Mohon menunggu...`);
            },
            success: function (response) {
              if (response == 'Sukses') {
                Swal.fire({
                  icon: 'success',
                  title: 'Sukses!',
                  text: 'Transaksi berhasil diproses.',
                  showConfirmButton: false,
                  timer: 2000
                })
                .then(function() {
                  window.location.href = '';
                })
              } else if (response == 'Error') {
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal!',
                  text: 'Terjadi masalah, silahkan coba beberapa saat lagi.',
                  showConfirmButton: false,
                  timer: 2000
                })
              } else if (response == 'gagal') {
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
              $('#btn-proses-transaksi').html("PROSES TRANSAKSI");
            },
            error: function () {
              alert('Terjadi kesalahan, silahkan coba beberapa saat lagi.');
            }
          })
        }
      })
    });
  </script>
</body>

</html>