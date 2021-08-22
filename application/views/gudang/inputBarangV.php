<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
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
        <div class="p-3 col-lg registrasi">
            <?= form_open_multipart('gudang/inputBarang'); ?>
            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Supplier</label>
                        <select name="supplier" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <option value="PT. Penyuplai" <?= set_value('supplier') == 'PT. Penyuplai' ? "selected" : null ?>>PT. Penyuplai</option>
                        </select>
                        <?= form_error('supplier', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <option value="ATK" <?= set_value('kategori') == 'ATK' ? "selected" : null ?>>ATK</option>
                            <option value="Makanan" <?= set_value('kategori') == 'Makanan' ? "selected" : null ?>>Makanan</option>
                            <option value="Minuman" <?= set_value('kategori') == 'Minuman' ? "selected" : null ?>>Minuman</option>
                        </select>
                        <?= form_error('kategori', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm form-control-user" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="<?= set_value('kode_barang'); ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <?= form_error('kode_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control form-control-sm form-control-user" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?= set_value('nama_barang'); ?>">
                        <?= form_error('nama_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <select name="satuan" class="form-control form-control-sm">
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

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="qty">QTY</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" id="qty" name="qty" placeholder="Jumlah" value="<?= set_value('qty'); ?>">
                        </div>
                        <?= form_error('qty', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
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