<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Input Barang</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card lg-10">
        <!-- Main content -->
        <div class="p-3 col-lg">
            <div class="row mb-2">
                <div class="ml-2">
                    <a href="" type="button" data-toggle="modal" data-target="#modalBarangBaru" class="btn btn-success">Barang baru</a>
                </div>
                <div class="ml-3">
                    <a href="<?= base_url('gudang/infoStok'); ?>" type="button" class="btn btn-info">Info Stok</a>
                </div>
            </div>
            <?= form_open_multipart('gudang/inputBarang'); ?>
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Supplier</label>
                        <select name="supplier" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <?php foreach ($supplier as $sup) : ?>
                                <option value="<?= $sup['nama_supplier']; ?>" <?= set_value('supplier') == $sup['nama_supplier'] ? "selected" : null ?>><?= $sup['nama_supplier']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('supplier', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control form-control-sm form-control-user" id="kategori" name="kategori" placeholder="kategori" value="<?= set_value('kategori'); ?>" readonly>
                        <?= form_error('kategori', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm form-control-user" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="<?= set_value('kode_barang'); ?>">
                            <div class="input-group-append">
                                <button class="btn btn-info" data-toggle="modal" data-target="#modalBarang" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <?= form_error('kode_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control form-control-sm form-control-user" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?= set_value('nama_barang'); ?>">
                        <?= form_error('nama_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control form-control-sm form-control-user" id="satuan" name="satuan" placeholder="Satuan" value="<?= set_value('satuan'); ?>" readonly>
                            <?= form_error('satuan', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="qtyA">QTY awal</label>
                            <div class="input-group input-group-sm">
                                <input readonly type="number" class="form-control form-control-sm form-control-user" id="qtyA" name="qtyA" placeholder="Jumlah" value="<?= set_value('qtyA'); ?>">
                            </div>
                            <?= form_error('qtyA', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="qtyM">QTY masuk</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" id="qtyM" name="qtyM" placeholder="Jumlah" value="<?= set_value('qtyM'); ?>">
                        </div>
                        <?= form_error('qtyM', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli /satuan</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control form-control-sm form-control-user" id="harga_beli" name="harga_beli" placeholder="Harga Beli" value="<?= set_value('harga_beli'); ?>">
                        </div>
                        <?= form_error('harga_beli', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control form-control-sm form-control-user" id="harga_jual" name="harga_jual" placeholder="Harga Jual" value="<?= set_value('harga_jual'); ?>">
                        </div>
                        <?= form_error('harga_jual', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                </div>

            </div>
            <div class="row d-flex justify-content-end">
                <div class="form-group col-lg-2">
                    <a href="<?= base_url('gudang/infoStok'); ?>" type="button" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
                </div>
                <div class="form-group col-lg-2 float-lg-left">
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        Simpan
                    </button>
                </div>
            </div>
            </form>
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
                                            <td><button id="pilih" class="btn btn-primary btn-sm" type="button" data-kode="<?= $brg['kode_brg']; ?>" data-nama="<?= $brg['nama_brg']; ?>" data-kategori="<?= $brg['kategori']; ?>" data-satuan="<?= $brg['unit']; ?>" data-harga="<?= $brg['harga_jual']; ?>" data-qty="<?= $brg['qty']; ?>">Pilih</button></td>
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


<div class="modal fade" id="modalBarangBaru">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah barang baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('gudang/barangBaru'); ?>
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm form-control-user" id="kode_barang" name="kode_barang" autocomplete="off" placeholder="Kode Barang" value="<?= set_value('kode_barang'); ?>">
                    </div>
                    <?= form_error('kode_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control form-control-sm form-control-user" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?= set_value('nama_barang'); ?>" autocomplete="off">
                    <?= form_error('nama_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kategori</label>
                        <select id="kategori" name="kategori" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <option value="ATK" <?= set_value('kategori') == 'ATK' ? "selected" : null ?>>ATK</option>
                            <option value="Makanan" <?= set_value('kategori') == 'Makanan' ? "selected" : null ?>>Makanan</option>
                            <option value="Minuman" <?= set_value('kategori') == 'Minuman' ? "selected" : null ?>>Minuman</option>
                        </select>
                        <?= form_error('kategori', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Satuan</label>
                        <select id="satuan" name="satuan" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <option value="buah" <?= set_value('satuan') == 'buah' ? "selected" : null ?>>buah</option>
                            <option value="bungkus" <?= set_value('satuan') == 'bungkus' ? "selected" : null ?>>bungkus</option>
                            <option value="kilogram" <?= set_value('satuan') == 'kilogram' ? "selected" : null ?>>kilogram</option>
                            <option value="liter" <?= set_value('satuan') == 'liter' ? "selected" : null ?>>liter</option>
                            <option value="dus" <?= set_value('satuan') == 'dus' ? "selected" : null ?>>dus</option>
                        </select>
                        <?= form_error('satuan', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>