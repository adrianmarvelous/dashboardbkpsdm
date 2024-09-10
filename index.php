<?php
require_once 'config/koneksi.php';
ini_set('display_errors', 1);
error_reporting(~0);
if(htmlentities(!isset($_SESSION['nama']))){
	header("Location: auth/login_page.php");
	exit(); // Make sure to exit after redirection
}

$query_tahun_dokumen = $db->prepare("SELECT DISTINCT tahun FROM dok_perencanaan WHERE jenis_dokumen != 'BPK' ORDER BY tahun ASC");
$query_tahun_dokumen->execute();
$array_tahun_dokumen = $query_tahun_dokumen->fetchAll(PDO::FETCH_ASSOC);

$query_tahun_bpk = $db->prepare("SELECT DISTINCT tahun FROM dok_perencanaan WHERE jenis_dokumen = 'BPK' ORDER BY tahun ASC");
$query_tahun_bpk->execute();
$array_tahun_bpk = $query_tahun_bpk->fetchAll(PDO::FETCH_ASSOC);

$query_tahun_realisasi = $db->prepare("SELECT DISTINCT year(date) as tahun FROM info_apbd_anggaran ORDER BY date ASC");
$query_tahun_realisasi->execute();
$array_tahun_realisasi = $query_tahun_realisasi->fetchAll(PDO::FETCH_ASSOC);

// $nip_nik = htmlentities($_SESSION['nip']);
// $query_role = $db->prepare("SELECT * FROM dwp_user WHERE nip_nik = :nip_nik");
// $query_role->bindParam(':nip_nik',$nip_nik);
// $query_role->execute();
// $role_ = $query_role->fetch(PDO::FETCH_ASSOC);
// $role = $role_['role'];

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard BKPSDM</title>

    <meta name="description" content="" />

    <!-- Favicon -->
	<link rel="icon" href="../sijaka/source/logo/Logo Kota Surabaya.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    
    <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <!-- <link rel="stylesheet" href="assets/css/global.css" /> -->

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="demo menu-text fw-bolder ms-2">Dashboard BKPSDM</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Menu</span>
            </li>
            
            <li class="menu-item <?= (htmlentities($_GET['pages']) == 'view_jadwal_acara' || htmlentities($_GET['pages']) == 'index_jadwal_acara') ? 'active' : '' ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-calendar"></i>
                <div data-i18n="Account Settings">Jadwal Rapat</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <?php
                    if(htmlentities(isset($_SESSION['role'])) && htmlentities($_SESSION['role'] == 'admin_dashboard')){
                  ?>
                  <a href="?pages=index_jadwal_acara" class="menu-link">
                    <div data-i18n="Notifications">Input Jadwal Rapat</div>
                  </a>
                  <?php }?>
                  <a href="?pages=view_jadwal_acara" class="menu-link">
                    <div data-i18n="Notifications">View Jadwal Rapat</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item <?= (htmlentities($_GET['pages']) == 'view_dokumen_perencanaan' || htmlentities($_GET['pages']) == 'index_dokumen') ? 'active' : '' ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Account Settings">Dokumen</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <?php
                    if(htmlentities(isset($_SESSION['role'])) && htmlentities($_SESSION['role'] == 'admin_dashboard')){
                  ?>
                  <a href="?pages=index_dokumen" class="menu-link">
                    <div data-i18n="Notifications">Input Dokumen</div>
                  </a>
                  <?php }?>
                  <a href="?pages=view_dokumen_perencanaan" class="menu-link">
                    <div data-i18n="Notifications">View Dokumen</div>
                  </a>
                <!-- </li> -->
                <?php
                  foreach($array_tahun_dokumen as $tahun_dokumen){
                ?>
                <!-- <li class="menu-item"> -->
                  <a href="?pages=view_dokumen_perencanaan&tahun=<?=$tahun_dokumen['tahun']?>" class="menu-link">
                    <div data-i18n="Notifications"><?=$tahun_dokumen['tahun']?></div>
                  </a>
                <?php }?>
                </li>
              </ul>
            </li>
            <li class="menu-item <?= (htmlentities($_GET['pages']) == 'view_bpk') ? 'active' : '' ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-briefcase-alt-2"></i>
                <div data-i18n="Account Settings">BPK</div>
              </a>
              <ul class="menu-sub">
                <?php
                  foreach($array_tahun_bpk as $tahun_bpk){
                ?>
                <li class="menu-item">
                  <a href="?pages=view_bpk&tahun=<?=$tahun_bpk['tahun']?>" class="menu-link">
                    <div data-i18n="Notifications"><?=$tahun_bpk['tahun']?></div>
                  </a>
                </li>
                <?php }?>
              </ul>
            </li>

            <li class="menu-item <?= (htmlentities($_GET['pages']) == 'view_realisasi') ? 'active' : '' ?>">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Account Settings">Realisasi</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <?php
                    if(htmlentities(isset($_SESSION['role'])) && htmlentities($_SESSION['role'] == 'admin_dashboard')){
                  ?>
                  <a href="?pages=index_realisasi" class="menu-link">
                    <div data-i18n="Notifications">Input Realisasi</div>
                  </a>
                  <?php }?>
                  <?php
                    foreach($array_tahun_realisasi as $tahun_realisasi){
                  ?>
                    <a href="?pages=view_realisasi&tahun=<?=$tahun_realisasi['tahun']?>" class="menu-link">
                      <div data-i18n="Notifications"><?=$tahun_realisasi['tahun']?></div>
                    </a>
                  <?php }?>
                </li>
              </ul>
            </li>
            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <!-- <div class="avatar avatar-online"> -->
                        <span>
                              <i class="bx bx-cog"></i>
                        </span>
                    <!-- </div> -->
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <!-- <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div> -->
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?=htmlentities($_SESSION['nama'])?></span>
                            <!-- <small class="text-muted">Admin</small> -->
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth/logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row" style="padding: 20px;">
                      <?php
                        if(htmlentities(!isset($_GET['pages']))){
                          include 'home.php';
                        }elseif(htmlentities($_GET['pages']) == 'view_jadwal_acara'){
                          include 'controller/jadwal_rapat/jadwal_rapat_controller.php';
                        }elseif(htmlentities(($_GET['pages']) == 'view_dokumen_perencanaan')){
                          include 'controller/dok_perencanaan/dok_perencanaan.php';
                        }elseif(htmlentities($_GET['pages']) == 'view_realisasi'){
                          include 'controller/realisasi/realisasi_controller.php';
                        }elseif(htmlentities($_GET['pages']) == 'view_bpk'){
                          include 'controller/bpk/bpk_controller.php';
                        }

                        elseif(htmlentities($_GET['pages']) == 'index_jadwal_acara'){
                          include 'controller/jadwal_rapat/admin_jadwal_rapat.php';
                        }elseif(htmlentities($_GET['pages']) == 'index_dokumen'){
                          include 'controller/dok_perencanaan/admin_dok_perencanaan.php';
                        }elseif(htmlentities($_GET['pages']) == 'index_realisasi'){
                          include 'controller/realisasi/admin_realisasi.php';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  Badan Kepegawaian dan Pengembangan Sumber Daya Manusia
                  <!-- <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a> -->
                </div>
                <!-- <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div> -->
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script>
        new DataTable('#example');
    </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
