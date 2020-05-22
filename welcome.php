<?php
session_start();
// if (empty($_SESSION['loggedin'])) header('location: login.php');
if (!empty($_SESSION['loggedin_customer'])) :
  $id_customer = $_SESSION['loggedin_customer'];
endif;
  // $_SESSION['loggedin'] = '';
require 'koneksi/function.php';
$data_barang = $conn -> query("SELECT * FROM tbl_barang WHERE keterangan_barang = 'ada'");
include 'components/query_notif.php';
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
							<div class="collapse" id="search-nav">
								<div class="navbar-left navbar-form nav-search ml-md-3">
									<div class="input-group">
										<div class="input-group-prepend" onclick="$('#box-search').focus()">
											<button type="button" class="btn btn-search pr-1">
												<i class="fa fa-search search-icon"></i>
											</button>
										</div>
										<input id="box-search" type="text" placeholder="Cari jenis barang, jenis bahan ..." class="form-control">
									</div>
								</div>
							</div>
							<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
								<li class="nav-item toggle-nav-search hidden-caret">
									<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
										<i class="fa fa-search"></i>
									</a>
								</li>
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
				<div class="page-inner">
					<div class="row">
            <div class="col-12 mb-2">
              <div class="owl-carousel owl-theme owl-img-responsive">
                <div class="item"><img src="assets/img/CC WEB PHOTO  (45 of 164).jpg" class="rounded" alt="" height="200px"><!-- <div class="position-absolute p-2 m-1 rounded shadow font-weight-bold" style="top: 0px; background-color: #E64A19 !important; color: white">NEW</div> --></div>
                <div class="item"><img src="assets/img/CC WEB PHOTO  (30 of 164).jpg" alt="" class="rounded" height="200px"></div>
                <div class="item"><img src="assets/img/CC WEB PHOTO  (70 of 164).jpg" alt="" height="200px" class="rounded"></div>
                <div class="item"><img src="assets/img/CC WEB PHOTO  (53 of 164) copy.jpg" alt="" height="200px" class="rounded"></div>
                <div class="item"><img src="assets/img/CC WEB PHOTO  (26 of 164) copy.jpg" alt="" height="200px" class="rounded"></div>
                <div class="item"><img src="assets/img/CC WEB PHOTO  (34 of 164).jpg" alt="" height="200px" class="rounded"></div>
              </div>
            </div>
  					<div class="col-12">
              <div class="text-center mb-3"><h1 class="text-uppercase">Contoh Barang</h1></div>
            </div>
          </div>
          <div class="row" id="wrapper-hasil-cari-barang"></div>
          <div class="row" id="wrapper-data-barang">
            <?php if ($data_barang -> num_rows <= 0) {?>
              <div class="col text-center"><h1>Mohon maaf barang saat ini sudah habis.</h1></div>
            <?php } else { 
              foreach ($data_barang as $row_barang) : ?>
                <div class="col-4 col-sm-2">
                  <label class="imagecheck mb-4 position-relative" data-pilihbarang="<?=$row_barang['id_barang'] ?>">
                    <!-- <input name="imagecheck" type="radio" class="imagecheck-input"> -->
                    <figure class="imagecheck-figure">
                      <img src="assets/img/<?=$row_barang['foto_barang'] ?>" alt="cnth-barang" class="imagecheck-image img-fluid">
                    </figure>
                    <div style="position: absolute; bottom: 0; width: 100%; background: rgba(255,255,255,.8); backdrop-filter: blur(20px);"><h4 class="m-0 p-2 text-dark"><?=ucfirst($row_barang['bahan_barang']) ?></h4></div>
                  </label>
                </div>
              <?php endforeach; 
            } ?>
          </div>
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

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Google Maps Plugin -->
	<script src="assets/js/plugin/gmaps/gmaps.js"></script>

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
	<script src="assets/js/demo.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      // load_data();
      $('.owl-carousel').owlCarousel({
        margin:10,
        loop:true,
        autoplay:true,
        autoplayTimeout:4000,
        merge:true,
        center: true,
        responsiveClass:true,
        responsive:{
          0:{
            items:1,
            margin:30,
            stagePadding:30,
            smartSpeed:450,
            dots : false,
            autoHeigh: true,
            autoWidth: false,
          },
          600:{
            items:3,
            dots : true,
            autoHeigh: false,
            autoWidth: true,
          },
          1000:{
            items:3,
            dots : true,
            autoHeigh: false,
            autoWidth: true,
          }
        }
      });
      $('.imagecheck').click(function () {
        let data_pilihan = $(this).data('pilihbarang');
        $.ajax({
          url: 'ajax/select_barang.php',
          method: 'POST',
          data: {databarang:data_pilihan},
          success: function () {
            window.location.href = 'pilihan_barang.php';
          },
          error: function () {
            alert('Terjadi kesalahan, harap coba bebrapa saat lagi!');
          }
        })
      });
      $('#box-search').keyup(function () {
        var search = $(this).val();
        if($(this).val() != ""){
          load_data(search);
          $('#wrapper-data-barang').fadeOut();
        } else {
          load_data();
          $('#wrapper-data-barang').fadeIn();
        }
      });
      function load_data(query) {
        $.ajax({
          url:"ajax/cus_cari_data_barang.php",
          method:"POST",
          data:{cari_data_barang:query},
          success:function(data) {
            $('#wrapper-hasil-cari-barang').html(data).fadeIn();
          }
        });
      };
    });
  </script>
</body>

</html>