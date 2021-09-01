<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Tentukan Promo</h1>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <!-- TABEL -->
        <div class="row">

          <div class="col-lg-9">
            <div class="form-group">
              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNewModal">Pilih barang</button>
            </div>
            <div class="card-body table-responsive p-0" style="height: 320px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th width="100px">Kode Barang</th>
                    <th width="100px">Nama Barang</th>
                    <th width="50px">QTY</th>
                    <th width="100px" style="text-align: center;">Harga</th>
                    <th width="100px" style="text-align: center;">Diskon</th>
                    <th width="70px">aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($items as $item) : ?>
                    <tr>
                      <td><?= $item['kode_brg']; ?></td>
                      <td><?= $item['nama_brg']; ?></td>
                      <td><?= $item['qty_brg']; ?></td>
                      <td align="right"><?= indo_currency($item['harga_brg']); ?></td>
                      <td align="right"><?= indo_currency($item['diskon_brg']); ?></td>
                      <td>
                        <button data-toggle="modal" data-target="#modalUpdatePromo" id="updateItemPromo" type="button" class="btn btn-warning far fa-edit btn-sm" data-id="<?= $item['id_promo']; ?>" data-kode="<?= $item['kode_brg']; ?>" data-nama="<?= $item['nama_brg']; ?>" data-harga="<?= $item['harga_brg']; ?>" data-qty="<?= $item['qty_brg']; ?>" data-diskon="<?= $item['diskon_brg']; ?>"></button>
                        <a href="<?= base_url('supervisor/hapusItemPromo/') . $item['id_promo']; ?>" id="hapusItemPromo" type="button" class="btn btn-danger far fa-trash-alt btn-sm"></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

          </div>

          <div class="col-lg-3">
            <?= form_open_multipart('supervisor/tambahPromo'); ?>
            <div class="form-group">
              <label for="nama_promo">Nama Promo</label>
              <input type="text" class="form-control form-control-user form-control-sm" id="nama_promo" name="nama_promo" placeholder="Nama Promo">
            </div>

            <div class="form-group">
              <div class="form-group">
                <label for="harga_promo">Awal</label>
                <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                  <input name="tglAwal" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#datetimepicker7" placeholder="Pilih tanggal mulai     -------->" />
                  <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="harga_promo">Akhir</label>
                <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                  <input name="tglAkhir" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#datetimepicker8" placeholder="Pilih tanggal berakhir -------->" />
                  <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Pilih hari</label>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-sm form-control-user" id="hari" name="hari" placeholder="Pilih Hari             -------------->" value="<?= set_value('kode_barang'); ?>" autocomplete="off">
                <div class="input-group-append">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalPilihHari"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg">
                <a href="<?= base_url('Supervisor/promoBatal'); ?>" type="button" class="btn btn-danger btn-user btn-block btn-sm">
                  Batal
                </a>
              </div>
              <div class="form-group col-lg">
                <button type="submit" class="btn btn-success btn-user btn-block btn-sm">
                  Simpan
                </button>
              </div>
            </div>
            </form>
          </div>


        </div>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

<!-- Modal Add New Produk-->
<form action="<?php echo site_url('supervisor/tampungPromo'); ?>" method="post">
  <div class="modal fade" id="addNewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Barang</label>
            <div class="col-sm-10">
              <select class="bootstrap-select" name="barang[]" data-width="100%" data-live-search="true" multiple required>
                <?php foreach ($product as $row) : ?>
                  <option value="<?= $row['kode_brg']; ?>"><?= $row['nama_brg']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- modal pilih hari -->
<div class="modal fade" id="modalPilihHari" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Hari</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Hari</label>
          <div class="col-sm-10">
            <select class="bootstrap-select" id="selectHari" name="hari[]" data-width="100%" data-live-search="true" multiple required>
              <option value="Senin" <?= set_value('hari') == 1 ? "selected" : null ?>>Senin</option>
              <option value="Selasa" <?= set_value('hari') == 2 ? "selected" : null ?>>Selasa</option>
              <option value="Rabu" <?= set_value('hari') == 3 ? "selected" : null ?>>Rabu</option>
              <option value="Kamis" <?= set_value('hari') == 4 ? "selected" : null ?>>Kamis</option>
              <option value="Jumat" <?= set_value('hari') == 5 ? "selected" : null ?>>Jumat</option>
              <option value="Sabtu" <?= set_value('hari') == 6 ? "selected" : null ?>>Sabtu</option>
              <option value="Minggu" <?= set_value('hari') == 7 ? "selected" : null ?>>Minggu</option>
            </select>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button id="pilihHari" type="button" class="btn btn-success btn-sm" data-hari="<?= set_value('hari'); ?>">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- edit item promo -->
<?= form_open_multipart('supervisor/updateItemPromo'); ?>
<div class="modal fade" id="modalUpdatePromo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tentukan diskon</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="number" id="idPromo" name="idPromo" hidden>
        <div class="form-group">
          <label for="kodeBrg">Kode Barang</label>
          <div class="input-group input-group-sm">
            <input type="text" class="form-control form-control-sm form-control-user" id="kodeBrg" name="kodeBrg" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="namaBrg">Nama Barang</label>
          <div class="input-group input-group-sm">
            <input type="text" class="form-control form-control-sm form-control-user" id="namaBrg" name="namaBrg" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="hargaJual">Harga Jual</label>
          <div class="input-group input-group-sm">
            <input type="text" class="form-control form-control-sm form-control-user" id="hargaJual" name="hargaJual" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="qty">QTY</label>
          <div class="input-group input-group-sm">
            <input type="number" class="form-control form-control-sm form-control-user" id="qty" name="qty">
          </div>
        </div>

        <div class="form-group">
          <label for="diskon">Diskon</label>
          <div class="input-group input-group-sm">
            <input type="number" class="form-control form-control-sm form-control-user" id="diskon" name="diskon">
          </div>
        </div>

      </div>

      <div class="modal-footer justify-content-between">
        <input type="hidden" name="delete_id" required>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
          Simpan
        </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</form>
<!-- /.modal -->