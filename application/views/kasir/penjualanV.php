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
                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-user" id="tgl_transaksi" name="tgl_transaksi" placeholder="Tanggal Transaksi">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_kasir">Nama Kasir</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-user" id="nama_kasir" name="nama_kasir" placeholder="Nama Kasir">
                            </div>
                        </div>

                        
                    </div>
                </div>

                <!-- <div class="col-lg-2">
                    <div class="form-group">
                        <label for="nama_kasir">Nama Kasir</label>
                        <input type="text" class="form-control form-control-user" id="nama_kasir" name="nama_kasir" placeholder="Nama Kasir">
                    </div> -->
                    
                    <!-- <div class="form-group">
                        <label for="id_kasir">ID Kasir</label>
                        <input type="text" class="form-control form-control-user" id="id_kasir" name="id_kasir" placeholder="ID Kasir">
                    </div> -->
                <!-- </div> -->

                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm form-control-user" id="kode_barang" name="kode_barang" placeholder="Kode Barang" value="<?= set_value('kode_barang'); ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="qty">QTY</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-user" id="qty" name="qty" placeholder="QTY">
                        </div>
                    </div>

                    

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Tambah
                            </button>
                        </div>
                    
                                   
                </div>
                
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
                        <th>Harga</th>
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
                        <td>2.000</td>
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
                        <td>10.000</td>
                        <td>1</td>
                    </tr>
                  
                  </tbody>
                 
                </table>
              </div>
              
            </div>
            <!-- End TABLE -->

            <!-- PEMBAYARAN -->
            <div class="col-lg-2">
                <div class="row-lg">
                    <div class="form-group">
                        <label for="total">Total</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-user" id="total" name="total" placeholder="Total">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-user" id="diskon" name="diskon" placeholder="Diskon">
                        </div>
                    </div>          
                </div>              
            </div>

            <div class="col-lg-2">
                <div class="row-lg">
                   <div class="form-group">
                        <label for="bayar">Bayar</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-user" id="bayar" name="bayar" placeholder="Bayar">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kembalian">Kembalian</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-user" id="kembalian" name="kembalian" placeholder="Kembalian">
                        </div>
                    </div>
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
                    <button type="submit" class="btn btn-success btn-user btn-block" data-toggle="modal" data-target="#modal-lg">
                        Cetak Struk
                    </button>
                </div>
            </div>
        
        </div>
    </div>
</div>
