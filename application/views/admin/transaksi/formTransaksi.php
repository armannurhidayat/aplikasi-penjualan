<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin/home') ?>">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Form Transaksi Penjualan</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Form Transaksi Penjualan</h1>
    </div>
  </div><!--/.row-->

  <?php $this->load->view('layouts/__alert') ?>

  <!-- Form Transaksi -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          <a href="<?= base_url('admin/transaksi/form_pinjam') ?>" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>

        <div class="col-md-3 col-md-offset-3" style="margin-top: 10px">
          <div class="form-group">
            <label for="no_struk">Nomor Struk</label>
            <input type="text" name="no_struk" id="no_struk" value="<?= $struk ?>" class="form-control" readonly="">
          </div>
        </div>
        <div class="col-md-3" style="margin-top: 10px">
          <div class="form-group">
            <label for="tanggal">Tanggal Transaksi</label>
            <input type="date" name="tanggal" id="tanggal" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" class="form-control">
          </div>
        </div>


        <div class="panel-body">
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Pelanggan</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Stock</th>
                  <th>Harga</th>
                  <th>Subtotal</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="table-transaksi">
                <tr id="baris">
                  <td width="20%">
                    <select name="id_pelanggan" id="id_pelanggan" class="form-control">
                      <option value="">- Pilih -</option>
                      <?php foreach($pelanggan as $value): ?>
                        <option value="<?= $value['id_pelanggan'] ?>"><?= ucwords($value['nama_pelanggan']) ?></option>
                      <?php endforeach ?>
                    </select>
                  </td>
                  <td width="20%">
                    <select name="barang[]" id="barang1" data-row="1" class="form-control barang">
                      <option value="">- Pilih -</option>
                      <?php foreach($barang as $value): ?>
                        <?php if ($value['stock_barang'] > 0): ?>
                          <option value="<?= $value['id_barang'] ?>" stockbarang1="<?= $value['stock_barang'] ?>" hargabarang1="<?= $value['harga_barang'] ?>"><?= ucwords($value['nama_barang']) ?></option>
                        <?php endif ?>
                      <?php endforeach ?>
                    </select>
                  </td>
                  <td width="10%">
                    <input type="number" name="jumlah[]" id="jumlah1" value="1" min="1" class="form-control jumlah">
                  </td>
                  <td width="10%">
                    <input type="text" name="stock" id="stockbarang1" class="form-control" readonly="">
                  </td>
                  <td width="20%">
                    <input type="text" name="harga" id="hargabarang1" class="form-control" readonly="">
                  </td>
                  <td width="20%">
                    <input type="text" name="subtotal" id="subtotal1" class="form-control subtotal" readonly="">
                  </td>
                  <td class="text-center" width="20%">
                    <button id="addTabel" class="btn btn-success"><i class="fa fa-plus"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3 col-md-offset-8">
                <label for="grand_total">Grand Total</label>
                <input type="text" name="grand_total" id="grand_total" value="0" class="form-control" readonly="">
              </div>
            </div>
          </div>
          <button type="submit" id="saveTabel" class="btn btn-primary btn-block">Simpan</button>
        </div>

      </div>
    </div>
  </div>