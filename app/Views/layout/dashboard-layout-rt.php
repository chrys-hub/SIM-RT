
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
        <input type="button" class="btn btn-info" onclick="location.href='/logoutrt';" value="LOG OUT" />
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 layout-fixed">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">RT Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info">
          <p class="d-block" style="color:white;">Selamat datang,<?= (isset($namauser)) ? $namauser : 'Unknow';?></p>
          <a href="/editprofilert" class="btn btn-info" style="color: white;">Edit Profile</a>
         <!-- <p style="color:white;">Dev information only:</p>
          <p style="color:white;">id desa akun rt=<?= (isset($id_desa_akunrt)) ? $id_desa_akunrt : 'Unknow';?></p>
          <p style="color:white;">nik rt=<?= (isset($nik_rt)) ? $nik_rt : 'Unknow';?></p>
          <p style="color:white;">nomer hp rt=<?= (isset($no_hp_rt)) ? $no_hp_rt : 'Unknow';?></p>
          <p style="color:white;">nomer kk rt=<?= (isset($no_kk_rt)) ? $no_kk_rt : 'Unknow';?></p>-->
   
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
          <li class="nav-item">
            <a href=" <?= route_to('konfirmasiwarga') ?>" class="nav-link <?= (current_url() == base_url('konfirmasiwarga'))? 'active' : '';?>">
              <i class="nav-icon fas fa-check-square"></i>
              <p>
                Konfirmasi Akun Warga
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('warga') ?>" class="nav-link <?= (current_url() == base_url('warga'))? 'active' : '';?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Tambah Data Warga
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('kategori') ?>" class="nav-link <?= (current_url() == base_url('kategori'))? 'active' : '';?>">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Tambah Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('keuangan') ?>" class="nav-link <?= (current_url() == base_url('keuangan'))? 'active' : '';?>">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Tambah Keuangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('pengumuman') ?>" class="nav-link <?= (current_url() == base_url('pengumuman'))? 'active' : '';?>">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Tambah Pengumuman
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
<script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(258385)</script> 
</body>
</html>
