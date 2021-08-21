<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penjualan</h1>
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
                <div class="col-lg-2">
                    <div class="row-lg">
                        <div class="form-group">
                            <label for="id_barang">ID Transaksi</label>
                            <input type="text" class="form-control form-control-user" id="id_transaksi" name="id_transaksi" placeholder="ID Transaksi">
                        </div>

                        <div class="form-group">
                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                            <input type="text" class="form-control form-control-user" id="tgl_transaksi" name="tgl_transaksi" placeholder="Tanggal Transaksi">
                        </div>
                        
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="id_kasir">ID Kasir</label>
                        <input type="text" class="form-control form-control-user" id="id_kasir" name="id_kasir" placeholder="ID Kasir">
                    </div>
        
        
                    <div class="form-group">
                        <label for="nama_kasir">Nama Kasir</label>
                        <input type="text" class="form-control form-control-user" id="nama_kasir" name="nama_kasir" placeholder="Nama Kasir">
                    </div>
                                    
                </div>

                <!-- <div class="col-lg-4">
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
                </div> -->
                
            </div>
            
            

            <!-- TABEL -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>AKSI</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>QTY</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                        <td>
                            <!-- <button type="button" class="btn btn-warning far fa-edit"></button> -->
                            <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                        </td>
                        <td>KD001</td>
                        <td>Good Day</td>
                        <td>Minuman</td>
                        <td>1</td>
                    </tr>

                    <tr>
                        <td>
                            <!-- <button type="button" class="btn btn-warning far fa-edit"></button> -->
                            <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                        </td>
                        <td>KD002</td>
                        <td>Lays</td>
                        <td>Snack</td>
                        <td>1</td>
                    </tr>
                  
                  </tbody>
                 
                </table>
              </div>
              
            </div>
            <!-- End TABLE -->

            <!-- PEMBAYARAN -->
            <div class="col-lg-2" style="position: right;">
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" class="form-control form-control-user" id="total" name="total" placeholder="Total">
                    </div>
        
        
                    <div class="form-group">
                        <label for="bayar">Bayar</label>
                        <input type="text" class="form-control form-control-user" id="bayar" name="bayar" placeholder="Bayar">
                    </div>

                    <div class="form-group">
                        <label for="kembalian">Kembalian</label>
                        <input type="text" class="form-control form-control-user" id="kembalian" name="kembalian" placeholder="Kembalian">
                    </div>
                                    
            </div>
            <!-- END PEMBAYARAN -->

            <div class="row">
                <div class="form-group col-lg-2">
                    <button type="button" class="btn btn-danger btn-user btn-block">
                        Batal
                    </button>
                </div>
                <div class="form-group col-lg-2 float-lg-left">
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        Cetak
                    </button>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
