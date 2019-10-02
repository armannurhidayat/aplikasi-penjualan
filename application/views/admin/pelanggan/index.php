<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/home') ?>">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Data Pelanggan</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Data Pelanggan</h1>
    </div>
  </div><!--/.row-->

  <?php $this->load->view('layouts/__alert') ?>

  <!-- Table -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          <a href="<?= base_url('admin/pelanggan/tambah') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>

        <div class="panel-body">
          <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Alamat Pelanggan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($pelanggan as $value): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= ucwords($value['nama_pelanggan']) ?></td>
                  <td><?= ucfirst($value['alamat_pelanggan']) ?></td>
                  <td align="center">
                    <a href="<?= base_url('admin/pelanggan/ubah/' . $value['id_pelanggan']) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Ubah</a>
                    <a href="<?= base_url('admin/pelanggan/hapus/' . $value['id_pelanggan']) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>