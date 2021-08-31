<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
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
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNewModal">Pilih barang</button><br />
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 320px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="100px">Kode Barang</th>
                                        <th width="100px">Nama Barang</th>
                                        <th width="50px">QTY</th>
                                        <th width="100px" style="text-align: center;">Harga</th>
                                        <th width="100px">Diskon</th>
                                        <th width="70px">aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php for ($i = 0; $i < count($items['kode']); $i++) : ?>
                                        <tr>
                                            <td><?= $items['kode'][$i]; ?></td>
                                            <td><?= $items['nama'][$i]; ?></td>
                                            <td><?= $items['qty'][$i]; ?></td>
                                            <td align="right"><?= indo_currency($items['harga'][$i]); ?></td>
                                            <td><?= $items['diskon'][$i]; ?></td>
                                            <td>
                                                <a href="" id="updateItemPromo" type="button" class="btn btn-warning far fa-edit btn-sm"></a>
                                                <a href="" id="hapusItemPromo" type="button" class="btn btn-danger far fa-trash-alt btn-sm"></a>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="nama_promo">Nama Promo</label>
                            <input type="text" class="form-control form-control-user form-control-sm" id="nama_promo" name="nama_promo" placeholder="Nama Promo">
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="harga_promo">Awal</label>
                                <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                    <input type="text" class="form-control form-control-sm datetimepicker-input" data-target="#datetimepicker7" placeholder="Pilih tanggal mulai     -------->" />
                                    <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga_promo">Akhir</label>
                                <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                                    <input type="text" class="form-control form-control-sm datetimepicker-input" data-target="#datetimepicker8" placeholder="Pilih tanggal berakhir -------->" />
                                    <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Pilih hari</label>
                            <select name="posisi" class="form-control form-control-sm">
                                <option value="">- Pilih -</option>
                                <option value="2" <?= set_value('posisi') == 2 ? "selected" : null ?>>Kasir</option>
                                <option value="3" <?= set_value('posisi') == 3 ? "selected" : null ?>>Petugas Gudang</option>
                            </select>
                            <?= form_error('posisi', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg">
                                <button type="button" class="btn btn-danger btn-user btn-block btn-sm">
                                    Batal
                                </button>
                            </div>
                            <div class="form-group col-lg">
                                <button type="submit" class="btn btn-success btn-user btn-block btn-sm">
                                    Simpan
                                </button>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- Modal Add New Package-->
<form action="<?php echo site_url('supervisor/buatPromo'); ?>" method="post">
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