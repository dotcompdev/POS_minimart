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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card lg-10">
    <!-- Main content -->
        <div class="p-3 col-lg">
            
            <div class="row">
                <div class="col-lg-5">
                    <div class="row-lg">
                        <div class="form-group">
                            <label for="id_transaksi">ID Transaksi</label>
                            <input type="text" class="form-control form-control-user form-control-sm" id="id_transaksi" name="id_transaksi" placeholder="ID Transaksi">
                        </div>

                        <div class="form-group">
                            <label for="id_barang">ID Barang</label>
                            <input type="text" class="form-control form-control-user form-control-sm" id="id_barang" name="id_barang" placeholder="ID Barang">
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
                        <input type="text" class="form-control form-control-user form-control-sm" id="qty_retur" name="qty_retur" placeholder="QTY Retur">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control form-control-sm" rows="5" name="keterngan" id="keterangan" placeholder="Keterangan"></textarea>
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
