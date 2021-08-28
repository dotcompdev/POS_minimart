<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Barang</h1>
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
      <?= form_open_multipart('gudang/ubahBarang'); ?>
      <input type="text" id="id_brg" name="id_brg" value="<?= $barang['id_brg']; ?>" hidden>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control form-control-sm form-control-user" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="<?= $barang['kode_brg']; ?>">
            <?= form_error('kode_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
          </div>

          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control form-control-sm form-control-user" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?= $barang['nama_brg']; ?>">
            <?= form_error('nama_barang', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="satuan">Satuan</label>
              <select id="satuan" name="satuan" class="form-control form-control-sm">
                <option value="">- Pilih -</option>
                <option value="buah" <?= $barang['unit'] == 'buah' ? "selected" : null ?>>buah</option>
                <option value="bungkus" <?= $barang['unit'] == 'bungkus' ? "selected" : null ?>>bungkus</option>
                <option value="kilogram" <?= $barang['unit'] == 'kilogram' ? "selected" : null ?>>kilogram</option>
                <option value="liter" <?= $barang['unit'] == 'liter' ? "selected" : null ?>>liter</option>
                <option value="dus" <?= $barang['unit'] == 'dus' ? "selected" : null ?>>dus</option>
              </select>
              <?= form_error('satuan', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-md-6">
              <label for="kategori">Kategori</label>
              <select id="kategori" name="kategori" class="form-control form-control-sm">
                <option value="">- Pilih -</option>
                <option value="ATK" <?= $barang['kategori'] == 'ATK' ? "selected" : null ?>>ATK</option>
                <option value="Makanan" <?= $barang['kategori'] == 'Makanan' ? "selected" : null ?>>Makanan</option>
                <option value="Minuman" <?= $barang['kategori'] == 'Minuman' ? "selected" : null ?>>Minuman</option>
              </select>
              <?= form_error('kategori', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
            </div>


          </div>
          <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="number" class="form-control form-control-sm form-control-user" id="harga_jual" name="harga_jual" placeholder="Harga Jual" value="<?= $barang['harga_jual']; ?>">
            </div>
            <?= form_error('harga_jual', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
          </div>

        </div>

      </div>
      <div class="row">
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