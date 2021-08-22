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
                            <option value="2" <?= set_value('supplier') == 1 ? "selected" : null ?>>buah</option>
                        </select>
                        <?= form_error('supplier', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <option value="2" <?= set_value('kategori') == 1 ? "selected" : null ?>>ATK</option>
                            <option value="3" <?= set_value('kategori') == 2 ? "selected" : null ?>>Makanan</option>
                            <option value="3" <?= set_value('kategori') == 3 ? "selected" : null ?>>Minuman</option>
                        </select>
                        <?= form_error('kategori', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm form-control-user" id="kode_barang" name="kode_barang" placeholder="Kode Barang">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <?= form_error('kode_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control form-control-sm form-control-user" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                        <?= form_error('nama_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <select name="satuan" class="form-control form-control-sm">
                            <option value="">- Pilih -</option>
                            <option value="2" <?= set_value('satuan') == 1 ? "selected" : null ?>>buah</option>
                            <option value="3" <?= set_value('satuan') == 2 ? "selected" : null ?>>bungkus</option>
                            <option value="3" <?= set_value('satuan') == 3 ? "selected" : null ?>>kilogram</option>
                            <option value="3" <?= set_value('satuan') == 4 ? "selected" : null ?>>liter</option>
                            <option value="3" <?= set_value('satuan') == 5 ? "selected" : null ?>>dus</option>
                        </select>
                        <?= form_error('satuan', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control form-control-sm form-control-user" id="harga_beli" name="harga_beli" placeholder="Harga Beli">
                        </div>
                        <?= form_error('harga_beli', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control form-control-sm form-control-user" id="harga_jual" name="harga_jual" placeholder="Harga Jual">
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