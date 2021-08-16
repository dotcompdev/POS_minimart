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

    <!-- Main content -->
        <div class="p-3 col-lg registrasi">
            <?= form_open_multipart('supervisor/registration'); ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row-lg">
                        <div class="form-group">
                            <label for="id_barang">ID Barang</label>
                            <input type="text" class="form-control form-control-user" id="id_barang" name="id_barang" placeholder="ID Barang">
                        </div>

                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control form-control-user" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="text" class="form-control form-control-user" id="harga_beli" name="harga_beli" placeholder="Harga Beli">
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" class="form-control form-control-user" id="harga_jual" name="harga_jual" placeholder="Harga Jual">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="id_supplier">ID Supplier</label>
                        <input type="text" class="form-control form-control-user" id="id_supplier" name="id_supplier" placeholder="ID Supplier">
                    </div>
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                        <input type="text" class="form-control form-control-user" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier">
                    </div>
                    <div class="form-group">
                        <label for="alamat_supplier">Alamat Supplier</label>
                        <input type="text" class="form-control form-control-user" id="alamat_supplier" name="alamat_supplier" placeholder="Alamat Supplier">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="No. Telepon">
                    </div>
                   
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <button type="button" class="btn btn-danger btn-user btn-block">
                        Batal
                    </button>
                </div>
                <div class="form-group col-lg-4 float-lg-left">
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        Simpan
                    </button>
                </div>
            </div>
            </form>
        </div>
    
</div>
