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
  <!-- CSS Just for demo purpose, don't include it in your project -->
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
                  <img src="assets/img/<?= empty($_SESSION['loggedin']) ? "profile.png" : $row['foto_customer']; ?>" alt="user photo" class="avatar-img rounded-circle">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                  <li>
                    <div class="user-box">
                      <div class="avatar-lg"><img src="assets/img/<?= empty($_SESSION['loggedin']) ? "profile.png" : $row['foto_customer']; ?>" alt="image profile" class="avatar-img rounded"></div>
                      <div class="u-text">
                        <h4>Hizrian</h4>
                        <p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="#">My Balance</a>
                    <a class="dropdown-item" href="#">Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Account Setting</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php"><b><i class="fas fa-sign-out-alt"></i> Logout</b></a>
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
              <img src="assets/img/<?= empty($_SESSION['loggedin']) ? "profile.png" : $row['foto_customer']; ?>" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
              <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                <span>
                  Hizrian
                  <span class="user-level">Administrator</span>
                  <span class="caret"></span>
                </span>
              </a>
              <div class="clearfix"></div>

              <div class="collapse in" id="collapseExample">
                <ul class="nav">
                  <li>
                    <a href="#profile">
                      <span class="link-collapse">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="#edit">
                      <span class="link-collapse">Setting</span>
                    </a>
                  </li>
                  <li>
                    <a href="logout.php">
                      <span class="link-collapse text-danger">Logout</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <ul class="nav nav-primary">
            <li class="nav-item active">
              <a href="">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Components</h4>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#base">
                <i class="fas fa-layer-group"></i>
                <p>Base</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="base">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="components/avatars.html">
                      <span class="sub-item">Avatars</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/buttons.html">
                      <span class="sub-item">Buttons</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/gridsystem.html">
                      <span class="sub-item">Grid System</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/panels.html">
                      <span class="sub-item">Panels</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/notifications.html">
                      <span class="sub-item">Notifications</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/sweetalert.html">
                      <span class="sub-item">Sweet Alert</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/lists.html">
                      <span class="sub-item">Lists</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/owl-carousel.html">
                      <span class="sub-item">Owl Carousel</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/magnific-popup.html">
                      <span class="sub-item">Magnific Popup</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/font-awesome-icons.html">
                      <span class="sub-item">Font Awesome Icons</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/simple-line-icons.html">
                      <span class="sub-item">Simple Line Icons</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/flaticons.html">
                      <span class="sub-item">Flaticons</span>
                    </a>
                  </li>
                  <li>
                    <a href="components/typography.html">
                      <span class="sub-item">Typography</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#sidebarLayouts">
                <i class="fas fa-th-list"></i>
                <p>Sidebar Layouts</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="sidebarLayouts">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="sidebar-style-1.html">
                      <span class="sub-item">Sidebar Style 1</span>
                    </a>
                  </li>
                  <li>
                    <a href="overlay-sidebar.html">
                      <span class="sub-item">Overlay Sidebar</span>
                    </a>
                  </li>
                  <li>
                    <a href="compact-sidebar.html">
                      <span class="sub-item">Compact Sidebar</span>
                    </a>
                  </li>
                  <li>
                    <a href="static-sidebar.html">
                      <span class="sub-item">Static Sidebar</span>
                    </a>
                  </li>
                  <li>
                    <a href="icon-menu.html">
                      <span class="sub-item">Icon Menu</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#forms">
                <i class="fas fa-pen-square"></i>
                <p>Forms</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="forms/forms.html">
                      <span class="sub-item">Basic Form</span>
                    </a>
                  </li>
                  <li>
                    <a href="forms/formvalidation.html">
                      <span class="sub-item">Form Validation</span>
                    </a>
                  </li>
                  <li>
                    <a href="forms/formwidget.html">
                      <span class="sub-item">Form Widget</span>
                    </a>
                  </li>
                  <li>
                    <a href="forms/formwizard.html">
                      <span class="sub-item">Form Wizard</span>
                    </a>
                  </li>
                  <li>
                    <a href="forms/formupload.html">
                      <span class="sub-item">Multiple Upload</span>
                    </a>
                  </li>
                  <li>
                    <a href="forms/formwysiwyg.html">
                      <span class="sub-item">WYSIWYG Editor</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#tables">
                <i class="fas fa-table"></i>
                <p>Tables</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="tables/tables.html">
                      <span class="sub-item">Basic Table</span>
                    </a>
                  </li>
                  <li>
                    <a href="tables/datatables.html">
                      <span class="sub-item">Datatables</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#maps">
                <i class="fas fa-map-marker-alt"></i>
                <p>Maps</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="maps">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="maps/googlemaps.html">
                      <span class="sub-item">Google Maps</span>
                    </a>
                  </li>
                  <li>
                    <a href="maps/fullscreenmaps.html">
                      <span class="sub-item">Full Screen Maps</span>
                    </a>
                  </li>
                  <li>
                    <a href="maps/jqvmap.html">
                      <span class="sub-item">JQVMap</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#charts">
                <i class="far fa-chart-bar"></i>
                <p>Charts</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="charts/charts.html">
                      <span class="sub-item">Chart Js</span>
                    </a>
                  </li>
                  <li>
                    <a href="charts/sparkline.html">
                      <span class="sub-item">Sparkline</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a href="calendar.html">
                <i class="far fa-calendar-alt"></i>
                <p>Calendar</p>
                <span class="badge badge-info">1</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="widgets.html">
                <i class="fas fa-desktop"></i>
                <p>Widgets</p>
                <span class="badge badge-success">4</span>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Snippets</h4>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#email-nav">
                <i class="far fa-envelope"></i>
                <p>Email</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="email-nav">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="email-inbox.html">
                      <span class="sub-item">Inbox</span>
                    </a>
                  </li>
                  <li>
                    <a href="email-compose.html">
                      <span class="sub-item">Email Compose</span>
                    </a>
                  </li>
                  <li>
                    <a href="email-detail.html">
                      <span class="sub-item">Email Detail</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#messages-app-nav">
                <i class="far fa-paper-plane"></i>
                <p>Messages App</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="messages-app-nav">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="messages.html">
                      <span class="sub-item">Messages</span>
                    </a>
                  </li>
                  <li>
                    <a href="conversations.html">
                      <span class="sub-item">Conversations</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a href="projects.html">
                <i class="fas fa-file-signature"></i>
                <p>Projects</p>
                <span class="badge badge-count">5</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="boards.html">
                <i class="fas fa-th-list"></i>
                <p>Boards</p>
                <span class="badge badge-count">4</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="invoice.html">
                <i class="fas fa-file-invoice-dollar"></i>
                <p>Invoices</p>
                <span class="badge badge-count">6</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="pricing.html">
                <i class="fas fa-tag"></i>
                <p>Pricing</p>
                <span class="badge badge-count">6</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="faqs.html">
                <i class="far fa-question-circle"></i>
                <p>Faqs</p>
                <span class="badge badge-count">6</span>
              </a>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#custompages">
                <i class="fas fa-paint-roller"></i>
                <p>Custom Pages</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="custompages">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="login.html">
                      <span class="sub-item">Login & Register 1</span>
                    </a>
                  </li>
                  <li>
                    <a href="login2.html">
                      <span class="sub-item">Login & Register 2</span>
                    </a>
                  </li>
                  <li>
                    <a href="login3.html">
                      <span class="sub-item">Login & Register 3</span>
                    </a>
                  </li>
                  <li>
                    <a href="profile.html">
                      <span class="sub-item">User Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="404.html">
                      <span class="sub-item">404</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-toggle="collapse" href="#submenu">
                <i class="fas fa-bars"></i>
                <p>Menu Levels</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="submenu">
                <ul class="nav nav-collapse">
                  <li>
                    <a data-toggle="collapse" href="#subnav1">
                      <span class="sub-item">Level 1</span>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="subnav1">
                      <ul class="nav nav-collapse subnav">
                        <li>
                          <a href="#">
                            <span class="sub-item">Level 2</span>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span class="sub-item">Level 2</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a data-toggle="collapse" href="#subnav2">
                      <span class="sub-item">Level 1</span>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="subnav2">
                      <ul class="nav nav-collapse subnav">
                        <li>
                          <a href="#">
                            <span class="sub-item">Level 2</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a href="#">
                      <span class="sub-item">Level 1</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="container">
        <div class="page-inner">
          <h4 class="page-title">User Profile</h4>
          <div class="row">
            <div class="col-md-8">
              <div class="card card-with-nav">
                <div class="card-header">
                  <div class="row row-nav-line">
                    <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                      <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Timeline</a> </li>
                      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
                      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="form-group form-group-default">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="Hizrian">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-group-default">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Name" value="hello@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-4">
                      <div class="form-group form-group-default">
                        <label>Birth Date</label>
                        <input type="text" class="form-control" id="datepicker" name="datepicker" value="03/21/1998" placeholder="Birth Date">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-group-default">
                        <label>Gender</label>
                        <select class="form-control" id="gender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-group-default">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="+62008765678" name="phone" placeholder="Phone">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <div class="form-group form-group-default">
                        <label>Address</label>
                        <input type="text" class="form-control" value="st Merdeka Putih, Jakarta Indonesia" name="address" placeholder="Address">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3 mb-1">
                    <div class="col-md-12">
                      <div class="form-group form-group-default">
                        <label>About Me</label>
                        <textarea class="form-control" name="about" placeholder="About Me" rows="3">A man who hates loneliness</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="text-right mt-3 mb-3">
                    <button class="btn btn-success">Save</button>
                    <button class="btn btn-danger">Reset</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-header" style="background-image: url('assets/img/blogpost.jpg')">
                  <div class="profile-picture">
                    <div class="avatar avatar-xl">
                      <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="user-profile text-center">
                    <div class="name">Hizrian, 19</div>
                    <div class="job">Frontend Developer</div>
                    <div class="desc">A man who hates loneliness</div>
                    <div class="social-media">
                      <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                        <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                      </a>
                      <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                        <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span>
                      </a>
                      <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                        <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span>
                      </a>
                      <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                        <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span>
                      </a>
                    </div>
                    <div class="view-profile">
                      <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row user-stats text-center">
                    <div class="col">
                      <div class="number">125</div>
                      <div class="title">Post</div>
                    </div>
                    <div class="col">
                      <div class="number">25K</div>
                      <div class="title">Followers</div>
                    </div>
                    <div class="col">
                      <div class="number">134</div>
                      <div class="title">Following</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="pull-left">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="http://www.themekita.com">
                  ThemeKita
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Help
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright ml-auto">
            2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <!-- jQuery UI -->
  <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
  <!-- Moment JS -->
  <script src="assets/js/plugin/moment/moment.min.js"></script><!-- DateTimePicker -->
  <script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
  <!-- Bootstrap Toggle -->
  <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
  <!-- jQuery Scrollbar -->
  <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <!-- Atlantis JS -->
  <script src="assets/js/atlantis.min.js"></script>
  <!-- Atlantis DEMO methods, don't include it in your project! -->
  <script src="assets/js/setting-demo.js"></script>
  <script>
    $('#datepicker').datetimepicker({
      format: 'MM/DD/YYYY',
    });
  </script>
</body>

</html>