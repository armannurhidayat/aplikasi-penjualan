<!DOCTYPE html>
<?php date_default_timezone_set('Asia/Jakarta') ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url('assets/img/favicon.png') ?>" type="image/ico"/>
  <title><?= $title ?> | Sistem Penjualan</title>
  <link href="<?= base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/css/datepicker3.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/css/styles.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/vendors/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?= base_url('assets') ?>/vendors/datatables/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

  <!--Custom Font-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Select2 -->
  <link href="<?= base_url('assets') ?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Autocomplate -->
  <link href="<?= base_url('assets') ?>/vendors/autocomplete/css/jquery-ui.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span></button>
          <a class="navbar-brand" href="<?= base_url('admin/home') ?>"><span>Sistem</span>Penjualan</a>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
      <div class="profile-userpic">
        <img src="<?= base_url('assets/img/admin_img.png') ?>" class="img-responsive" alt="">
      </div>
      <div class="profile-usertitle">
        <div class="profile-usertitle-name"><?= ucfirst($user['username']) ?></div>
        <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="divider"></div>
      <ul class="nav menu">
        <li <?= $this->uri->segment(3) == 'home' ? 'class="active"' : null ?>><a href="<?= base_url('admin/home') ?>"><em class="fa fa-desktop">&nbsp;</em> Dashboard</a></li>
        <li <?= $this->uri->segment(3) == 'barang' ? 'class="active"' : null ?>><a href="<?= base_url('admin/barang') ?>"><em class="fa fa-database">&nbsp;</em> Data Barang</a></li>
        <li <?= $this->uri->segment(3) == 'pelanggan' ? 'class="active"' : null ?>><a href="<?= base_url('admin/pelanggan') ?>"><em class="fa fa-users">&nbsp;</em> Data Pelanggan</a></li>
        <li <?= $this->uri->segment(3) == 'transaksi' ? 'class="active"' : null ?>><a href="<?= base_url('admin/transaksi') ?>"><em class="fa fa-money">&nbsp;</em> Transaksi</a></li>
        <li <?= $this->uri->segment(4) == 'laporan' ? 'class="active"' : null ?>><a href="<?= base_url('admin/transaksi/laporan') ?>"><em class="fa fa-money">&nbsp;</em> Laporan Transaksi</a></li>

        <li>
          <a href="javascript:void(0)" data-toggle="modal" data-target="#logout"><span class="fa fa-power-off">&nbsp;</span> Logout</a>
        </li>
      </ul>
    </div>
    <!-- /.Sidebar -->


    <!-- Modal Logout -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          </div>
          <div class="modal-body">
            Apakah anda yakin ingin keluar dari sistem ini?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </div>
    </div>