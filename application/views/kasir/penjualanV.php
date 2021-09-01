<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Penjualan</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="row">
                        <!-- <div class="col-lg-4">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input type="date" class="form-control form-control-sm form-control-user" id="date" name="date" placeholder="Tanggal Transaksi" value="<?= date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div> -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <!-- <label for="nama_kasir">Nama Kasir</label> -->
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-control-sm form-control-user" id="nama_kasir" name="nama_kasir" value="<?= $user['username']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <!-- <input type="text" name="nama_barang" id="nama_barang" hidden>
                                    <input type="number" name="harga_jual" id="harga_jual" hidden>
                                    <input type="text" name="invoice" value="<?= $invoice_item; ?>" hidden> -->
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalBarang" type="button" id="button-addon2"><i class="fas fa-search mr-2"></i>Pilih barang</button>
                                    <?= form_error('kode_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div style="margin-bottom: -10px;" class="row d-flex justify-content-end">
                        <div class="form-group">
                            <h5><b><span><?= $invoice_item; ?></span></b></h5>
                            <input type="text" name="invoice_item" value="<?= $invoice_item; ?>" hidden>
                        </div>
                    </div>
                    <div style="margin-bottom: -5px;" class="row d-flex justify-content-end">
                        <div class="form-group">
                            <h1><b><span id="hasil"></span></b></h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABEL -->
            <div class="row">
                <div class="col-lg">
                    <div class="card-body table-responsive p-0" style="height: 230px;">
                        <table id="nilai" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>

                                    <th width="100px">Aksi</th>
                                    <th width="300px">Barang</th>
                                    <th style="text-align: center;" width="100px">QTY</th>
                                    <th style="text-align: right;" width="100px">Harga Jual</th>
                                    <th style="text-align: center;" width="150px">Diskon</th>
                                    <th style="text-align: right;" width="100px">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($tampung as $t) : ?>
                                    <?php if ($muncul != null) : ?>
                                        <input hidden type="number" name="id_trans" id="id_trans" value="<?= $t['id_trans']; ?>">
                                        <input hidden type="number" name="qtyTrans" id="qtyTrans" value="<?= $t['qty']; ?>">
                                    <?php endif; ?>
                                    <tr>
                                        <td>
                                            <button id="editTam" data-toggle="modal" data-target="#modalEditBrg" type="button" class="btn btn-sm btn-warning far fa-edit" data-kode="<?= $t['kode_barang']; ?>" data-nama="<?= $t['barang']; ?>" data-harga="<?= $t['harga_jual']; ?>" data-qty="<?= $t['qty']; ?>" data-diskon="<?= $t['diskon']; ?>"></button>
                                            <a href="<?= base_url('kasir/hapus/') . $t['id_trans']; ?>" type="button" class="btn btn-sm btn-danger far fa-trash-alt"></a>
                                        </td>
                                        <td><?= $t['barang']; ?></td>
                                        <td align="center"><?= $t['qty']; ?></td>
                                        <td align="right"><?= $t['harga_jual']; ?></td>
                                        <td align="center"><?= $t['diskon']; ?></td>
                                        <td align="right"><?= $t['subtotal']; ?></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END TABEL -->


            <div class="row d-flex justify-content-end">
                <div class="form-group col-lg-2">
                    <a href="<?= base_url('kasir/hapusAll'); ?>" type="button" class="btn btn-danger btn-user btn-block btn-sm">
                        reset
                    </a>
                </div>
                <div class="form-group col-lg-2 float-lg-left">
                    <button data-invoice="<?= $invoice_item; ?>" type="button" class="btn btn-success btn-user btn-block btn-sm delete-record" data-toggle="modal" data-target="#modal-default">
                        Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalBarang">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="row card-header">
                            <div class="col-md-4">
                                <a href="#" type="button" data-toggle="modal" data-target="#modalBarangBaru" class="btn btn-primary btn-sm">Tambah Barang</a>
                            </div>
                            <!-- <div class="col-md-8">
                                <div class="input-group input-group-sm">
                                    <input type="text" id="table_search" name="table_search" class="form-control float-right" placeholder="Cari.." autocomplete="off">
                                </div>
                            </div> -->
                        </div>
                        <!-- /.card-header -->
                        <div id="container" class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="containerBrg">
                                    <?php foreach ($barang as $brg) : ?>
                                        <tr>
                                            <td><?= $brg['kode_brg']; ?></td>
                                            <td><?= $brg['nama_brg']; ?></td>
                                            <td><?= indo_currency($brg['harga_jual']); ?></td>
                                            <!-- <td><button id="pilih" class="btn btn-primary btn-sm" type="submit" data-kode="<?= $brg['kode_brg']; ?>" data-nama="<?= $brg['nama_brg']; ?>" data-kategori="<?= $brg['kategori']; ?>" data-satuan="<?= $brg['unit']; ?>" data-harga="<?= $brg['harga_jual']; ?>" data-qty="<?= $brg['qty']; ?>">Pilih</button></td> -->
                                            <td><a href="<?= base_url('kasir/tampung/') . $brg['kode_brg']; ?>" id="pilih" class="btn btn-primary btn-sm" type="button">Pilih</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

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

    <?= form_open_multipart('Kasir/editTam'); ?>
    <div class="modal fade" id="modalEditBrg">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kodBrg">Kode barang</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm form-control-user" id="kodBrg" name="kodBrg" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="namBrg">Nama barang</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm form-control-user" id="namBrg" name="namBrg" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="harBrg">Harga</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" id="harBrg" name="harBrg" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="qtyBrg">QTY</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" id="qtyBrg" name="qtyBrg">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="disk">Diskon</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" id="disk" name="disk">
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

                <div class="modal-footer justify-content-between">
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
    <!-- /.modal -->


    <div class="modal fade" id="modalPromo">
        <div class="modal-dialog">
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
                                    <thead>
                                        <tr>
                                            <th>Nama Promo</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($barang as $brg) : ?>
                                            <tr>
                                                <td><?= $brg['kode_brg']; ?></td>
                                                <td><?= $brg['nama_brg']; ?></td>
                                                <td><?= indo_currency($brg['harga_jual']); ?></td>
                                                <!-- <td><button id="pilih" class="btn btn-primary btn-sm" type="submit" data-kode="<?= $brg['kode_brg']; ?>" data-nama="<?= $brg['nama_brg']; ?>" data-kategori="<?= $brg['kategori']; ?>" data-satuan="<?= $brg['unit']; ?>" data-harga="<?= $brg['harga_jual']; ?>" data-qty="<?= $brg['qty']; ?>">Pilih</button></td> -->
                                                <td><a href="<?= base_url('kasir/tampung/') . $brg['kode_brg']; ?>" id="pilih" class="btn btn-primary btn-sm" type="button">Pilih</a></td>
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

    <!-- Modal Box -->
    <?= form_open_multipart('transaksi/cetakStruk'); ?>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="invoice_item" value="<?= $invoice_item; ?>" hidden>
                    <input type="text" name="nama_kasir" value="<?= $user['username']; ?>" hidden>
                    <!-- 
                    <div class="form-group">
                        <label for="total_diskon">Total Diskon</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" id="total_diskon" name="total_diskon" placeholder="Total Diskon" readonly>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="total">Total</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" id="total" name="total" placeholder="Total" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cash">Cash</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" id="cash" name="cash" placeholder="Cash">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kembali">Kembali</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" id="kembali" name="kembali" placeholder="Kembali" readonly>
                        </div>
                    </div>

                </div>

                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="delete_id" required>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        Print Sturk
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </form>
    <!-- /.modal -->

</div>