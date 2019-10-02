<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/home') ?>">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Tambah Data Barang</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Tambah Data Barang</h1>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div class="alert bg-info" role="alert">
        <em class="fa fa-lg fa-warning">&nbsp;</em> Inputan yang ditandai (*) harus diisi.<a href="#" class="pull-right"></a>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          <a href="<?= base_url('admin/barang') ?>" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>

        <div class="panel-body">
          <div class="col-md-6 col-md-offset-3">
            <form action="<?= base_url('admin/barang/tambah') ?>" method="POST">
              <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
              <div class="form-group <?= form_error('nama_barang') ? 'has-error' : null ?>">
                <label for="nama_barang">Nama Barang <span class="text-danger">*</span></label>
                <input name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Komputer" autofocus="" value="<?= set_value('nama_barang') ?>">
                <small class="text-success"><?= form_error('nama_barang') ?></small>
              </div>
              <div class="form-group <?= form_error('harga_barang') ? 'has-error' : null ?>">
                <label for="harga_barang">Harga Barang <span class="text-danger">*</span></label>
                <input name="harga_barang" id="harga_barang" type="number" class="form-control" placeholder="Rp.1000.000" value="<?= set_value('harga_barang') ?>">
                <small class="text-success"><?= form_error('harga_barang') ?></small>
              </div>
              <div class="form-group <?= form_error('stock_barang') ? 'has-error' : null ?>">
                <label for="stock_barang">Stock Barang <span class="text-danger">*</span></label>
                <input name="stock_barang" id="stock_barang" type="number" class="form-control" placeholder="10" value="<?= set_value('stock_barang') ?>">
                <small class="text-success"><?= form_error('stock_barang') ?></small>
              </div>
              <div class="form-group text-center">
                <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-reply"></i> Reset</button>
                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div><!--/.row-->
