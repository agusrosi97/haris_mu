<?php
session_start();
// if (empty($_SESSION['loggedin'])) header('location: login.php');
if (!empty($_SESSION['loggedin_customer'])) : 
  $id_customer = $_SESSION['loggedin_customer'];
endif;
  // $_SESSION['loggedin'] = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Atlantis Bootstrap 4 Admin Dashboard</title>
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
							</div>
							<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
								<li class="nav-item toggle-nav-search hidden-caret">
									<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
										<i class="fa fa-search"></i>
									</a>
								</li>
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
  					<div class="col-12 d-none d-md-block">
              <div class="text-center mb-3 card-title">Contoh Barang</div>
              <div class="d-flex justify-content-center flex-wrap">
                <div class="col-4 col-sm-4 col-lg-2">
                  <div class="card" style="height: 130px">
                    <div class="card-body p-3 text-center" style="background-image: url(assets/img/tshirt.png);background-size: contain; background-repeat: no-repeat; background-position: center;">
                    </div>
                  </div>
                </div>
                <div class="col-4 col-sm-4 col-lg-2">
                  <div class="card" style="height: 130px">
                    <div class="card-body p-3 text-center" style="background-image: url(assets/img/celana_pendek_08.png);background-size: contain; background-repeat: no-repeat; background-position: center;">
                    </div>
                  </div>
                </div>
                <div class="col-4 col-sm-4 col-lg-2">
                  <div class="card" style="height: 130px">
                    <div class="card-body p-3 text-center" style="background-image: url(assets/img/jaket.png);background-size: contain; background-repeat: no-repeat; background-position: center;">
                    </div>
                  </div>
                </div>
                <div class="col-4 col-sm-4 col-lg-2">
                  <div class="card" style="height: 130px">
                    <div class="card-body p-3 text-center" style="background-image: url(assets/img/jean.png);background-size: contain; background-repeat: no-repeat; background-position: center;">
                    </div>
                  </div>
                </div>
              </div>     
            </div>
					</div>
					<!-- <div class="row">
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Top Products</div>
								</div>
								<div class="card-body pb-0">
									<div class="d-flex">
										<div class="avatar">
											<img src="assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
										</div>
										<div class="flex-1 pt-1 ml-2">
											<h6 class="fw-bold mb-1">CSS</h6>
											<small class="text-muted">Cascading Style Sheets</small>
										</div>
										<div class="d-flex ml-auto align-items-center">
											<h3 class="text-info fw-bold">+$17</h3>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar">
											<img src="assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
										</div>
										<div class="flex-1 pt-1 ml-2">
											<h6 class="fw-bold mb-1">J.CO Donuts</h6>
											<small class="text-muted">The Best Donuts</small>
										</div>
										<div class="d-flex ml-auto align-items-center">
											<h3 class="text-info fw-bold">+$300</h3>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar">
											<img src="assets/img/logoproduct3.svg" alt="..." class="avatar-img rounded-circle">
										</div>
										<div class="flex-1 pt-1 ml-2">
											<h6 class="fw-bold mb-1">Ready Pro</h6>
											<small class="text-muted">Bootstrap 4 Admin Dashboard</small>
										</div>
										<div class="d-flex ml-auto align-items-center">
											<h3 class="text-info fw-bold">+$350</h3>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="pull-in">
										<canvas id="topProductsChart"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<div class="card-title fw-mediumbold">Suggested People</div>
									<div class="card-list">
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">Jimmy Denis</div>
												<div class="status">Graphic Designer</div>
											</div>
											<button class="btn btn-icon btn-primary btn-round btn-xs">
												<i class="fa fa-plus"></i>
											</button>
										</div>
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">Chad</div>
												<div class="status">CEO Zeleaf</div>
											</div>
											<button class="btn btn-icon btn-primary btn-round btn-xs">
												<i class="fa fa-plus"></i>
											</button>
										</div>
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">Talha</div>
												<div class="status">Front End Designer</div>
											</div>
											<button class="btn btn-icon btn-primary btn-round btn-xs">
												<i class="fa fa-plus"></i>
											</button>
										</div>
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">John Doe</div>
												<div class="status">Back End Developer</div>
											</div>
											<button class="btn btn-icon btn-primary btn-round btn-xs">
												<i class="fa fa-plus"></i>
											</button>
										</div>
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">Talha</div>
												<div class="status">Front End Designer</div>
											</div>
											<button class="btn btn-icon btn-primary btn-round btn-xs">
												<i class="fa fa-plus"></i>
											</button>
										</div>
										<div class="item-list">
											<div class="avatar">
												<img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">Jimmy Denis</div>
												<div class="status">Graphic Designer</div>
											</div>
											<button class="btn btn-icon btn-primary btn-round btn-xs">
												<i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-primary bg-primary-gradient">
								<div class="card-body">
									<h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Active user right now</h4>
									<h1 class="mb-4 fw-bold">17</h1>
									<h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per minutes</h4>
									<div id="activeUsersChart"></div>
									<h4 class="mt-5 pb-3 mb-0 fw-bold">Top active pages</h4>
									<ul class="list-unstyled">
										<li class="d-flex justify-content-between pb-1 pt-1"><small>/product/readypro/index.html</small> <span>7</span></li>
										<li class="d-flex justify-content-between pb-1 pt-1"><small>/product/atlantis/demo.html</small> <span>10</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Feed Activity</div>
								</div>
								<div class="card-body">
									<ol class="activity-feed">
										<li class="feed-item feed-item-secondary">
											<time class="date" datetime="9-25">Sep 25</time>
											<span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
										</li>
										<li class="feed-item feed-item-success">
											<time class="date" datetime="9-24">Sep 24</time>
											<span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
										</li>
										<li class="feed-item feed-item-info">
											<time class="date" datetime="9-23">Sep 23</time>
											<span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
										</li>
										<li class="feed-item feed-item-warning">
											<time class="date" datetime="9-21">Sep 21</time>
											<span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
										</li>
										<li class="feed-item feed-item-danger">
											<time class="date" datetime="9-18">Sep 18</time>
											<span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
										</li>
										<li class="feed-item">
											<time class="date" datetime="9-17">Sep 17</time>
											<span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
										</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Support Tickets</div>
										<div class="card-tools">
											<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<div class="avatar avatar-online">
											<span class="avatar-title rounded-circle border border-white bg-info">J</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
											<span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">8:40 PM</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-offline">
											<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
											<span class="text-muted">I have some query regarding the license issue.</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">1 Day Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-away">
											<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
											<span class="text-muted">Is there any update plan for RTL version near future?</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Days Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-offline">
											<span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
											<span class="text-muted">I have some query regarding the license issue.</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Day Ago</small>
										</div>
									</div>
									<div class="separator-dashed"></div>
									<div class="d-flex">
										<div class="avatar avatar-away">
											<span class="avatar-title rounded-circle border border-white bg-danger">L</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
											<span class="text-muted">Is there any update plan for RTL version near future?</span>
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">2 Days Ago</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
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
    $(document).ready(function (argument) {
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
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
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
      })
    });
  </script>
</body>

</html>