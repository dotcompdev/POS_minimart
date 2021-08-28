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
                <div class="col-lg-8">
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


                    <?= form_open_multipart('kasir'); ?>


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-control-sm form-control-user" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="<?= set_value('kode_barang'); ?>">
                                    <input type="text" name="nama_barang" id="nama_barang" hidden>
                                    <input type="number" name="harga_jual" id="harga_jual" hidden>
                                    <input type="text" name="invoice" value="<?= $invoice; ?>" hidden>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" data-toggle="modal" data-target="#modalBarang" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                                    </div>
                                    <?= form_error('kode_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group d-flex">
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 32px;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="row d-flex justify-content-end">
                        <div class="form-group">
                            <h5><b><span><?= $invoice; ?></span></b></h5>
                            <input type="text" name="invoice" value="<?= $invoice; ?>" hidden>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
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
                                    <th>AKSI</th>
                                    <th width="400px">Barang</th>
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
                                            <a href="<?= base_url('kasir/ubah/') . $t['id_trans']; ?>" type="button" class="btn btn-sm btn-warning far fa-edit"></a>
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
            </form>


            <div class="row d-flex justify-content-end">
                <div class="form-group col-lg-2">
                    <button type="button" class="btn btn-danger btn-user btn-block btn-sm">
                        Batal
                    </button>
                </div>
                <div class="form-group col-lg-2 float-lg-left">
                    <button data-invoice="<?= $invoice; ?>" type="button" class="btn btn-success btn-user btn-block btn-sm  delete-record" data-toggle="modal" data-target="#modal-default">
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
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
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
                                                <td><button id="pilih" class="btn btn-primary btn-sm" type="submit" data-kode="<?= $brg['kode_brg']; ?>" data-nama="<?= $brg['nama_brg']; ?>" data-kategori="<?= $brg['kategori']; ?>" data-satuan="<?= $brg['unit']; ?>" data-harga="<?= $brg['harga_jual']; ?>" data-qty="<?= $brg['qty']; ?>">Pilih</button></td>
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
                    <input type="text" name="invoice" value="<?= $invoice; ?>" hidden>
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