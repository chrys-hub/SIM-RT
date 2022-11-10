
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= (isset($pageTittle)) ? $pageTittle : 'Document';?></title>
    <base href="/">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery.table2excel.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <style>
 
</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper ">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <input type="button" class="btn btn-primary" onclick="location.href='/logoutwarga';" value="KELUAR" />
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4 layout-fixed">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Warga Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info">
          <p>Selamat datang,<?= (isset($username_warga)) ? $username_warga : 'Unknow';?></p>
          <a href="/editprofilewarga" class="btn btn-info" style="color: white;">Edit Profile</a>
          <!--<p>Dev information only:</p>
          <p>id desa akun warga=<?= (isset($id_desa_akunwarga)) ? $id_desa_akunwarga : 'Unknow';?></p>
          <p>id akun warga=<?= $id_akun_warga ?></p> -->
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


               <?php if ($role_warga == 'Kepala Keluarga'  ) { ?> 
                <li class="nav-item">
            <a href=" <?= route_to('keuanganwarga') ?>" class="nav-link <?= (current_url() == base_url('keuanganwarga'))? 'active' : '';?>">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Lihat Data Keuangan RT
              </p>
            </a>
          </li>
              <?php } ?>
      
          <li class="nav-item">
            <a href=" <?= route_to('pengumumanwarga') ?>" class="nav-link <?= (current_url() == base_url('pengumumanwarga'))? 'active' : '';?>">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Lihat Pengumuman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href=" <?= route_to('laporwarga') ?>" class="nav-link <?= (current_url() == base_url('laporwarga'))? 'active' : '';?>">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Lapor ke RT
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= (isset($pageTittle)) ? $pageTittle : 'Document';?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
 <?= $this->renderSection('content'); ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    
    </div>
    <!-- Default to the left -->

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="/js/jquery.table2excel.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(258378)</script>  
</body>
</html>
