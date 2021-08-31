<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Returment</h1>
                </div>
            </div>

            <div class="row">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card lg-10">
        <!-- Main content -->
        <div class="p-3 col-lg">

            <?= form_open_multipart('Kasir/returment'); ?>

            <div class="row">
                <div class="col-lg-5">
                    <div class="row-lg">
                        <div class="form-group">
                            <label for="id_transaksi">ID Transaksi</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-user form-control-sm" id="id_transaksi" name="id_transaksi" placeholder="ID Transaksi" value="<?= set_value('id_transaksi'); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#modalTransJual" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_barang">ID Barang</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-user form-control-sm" id="id_barang" name="id_barang" placeholder="ID Barang">
                                <div class="input-group-append">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#modalTransItem" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control form-control-user form-control-sm" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                        </div>

                        <div class="form-group">
                            <label for="harga_barang">Harga Barang</label>
                            <input type="text" class="form-control form-control-user form-control-sm" id="harga_barang" name="harga_barang" placeholder="Harga Barang">
                        </div>



                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="qty_retur">QTY Retur</label>
                        <input type="text" class="form-control form-control-user form-control-sm" id="qty_retur" name="qty_retur" placeholder="QTY Retur" autocomplete="off">
                        <?= form_error('qty_retur', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Opsi</label>
                        <select id="opsi" name="opsi" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <option value="tukar barang" <?= set_value('opsi') == 'tukar barang' ? "selected" : null ?>>tukar barang</option>
                            <option value="uang kembali" <?= set_value('opsi') == 'uang kembali' ? "selected" : null ?>>uang kembali</option>
                        </select>
                        <?= form_error('opsi', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control form-control-sm" rows="5" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="form-group col-lg-1">
                    <button type="button" class="btn btn-danger btn-user btn-block btn-sm">
                        Batal
                    </button>
                </div>
                <div class="form-group col-lg-1 float-lg-left">
                    <button type="submit" class="btn btn-success btn-user btn-block btn-sm">
                        Simpan
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTransJual">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih ID Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md">
                    <div class="card">
                        <div class="row card-header">
                            <div class="col-md-4">
                                <a href="#" type="button" data-toggle="modal" data-target="#modalBarangBaru" class="btn btn-primary btn-sm">Tambah Barang</a>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-sm">
                                    <input type="text" id="table_search" name="table_search" class="form-control float-right" placeholder="Cari..">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div id="container" class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Waktu</th>
                                        <th>Invoice</th>
                                        <th>QTY</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $det) : ?>
                                        <tr>
                                            <td><?= date('d-m-Y', $det['waktu_trans']); ?></td>
                                            <td><?= $det['invoice']; ?></td>
                                            <td><?= $det['total_qty']; ?></td>
                                            <td><button id="pilihID" class="btn btn-primary btn-sm" type="submit" data-invoice="<?= $det['invoice']; ?>">Pilih</button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

<div class="modal fade" id="modalTransItem">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md">
                    <div class="card">
                        <div class="row card-header">
                            <div class="col-md-4">
                                <a href="#" type="button" data-toggle="modal" data-target="#modalBarangBaru" class="btn btn-primary btn-sm">Tambah Barang</a>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group input-group-sm">
                                    <input type="text" id="table_search" name="table_search" class="form-control float-right" placeholder="Cari..">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div id="container" class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <input type="text" id="invoice_item" name="invoice_item" hidden>
                                <thead>
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>QTY</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="containerItem">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>