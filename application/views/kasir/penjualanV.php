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

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <!-- <label for="date">Tanggal Transaksi</label> -->
                                <div class="input-group input-group-sm">
                                    <input type="number" class="form-control form-control-sm form-control-user" id="date" name="date" placeholder="Tanggal Transaksi" value="<?= date('Y-m-d'); ?>">
                                </div>    
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <!-- <label for="nama_kasir">Nama Kasir</label> -->
                                <div class="input-group input-group-sm">
                                    <input type="number" class="form-control form-control-sm form-control-user" id="nama_kasir" name="nama_kasir" placeholder="Nama Kasir" readonly>
                                </div>  
                            </div>
                        </div>
                    </div>

                
                    <div class="row">
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
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group d-flex">
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 30px;">
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
                                <h5><b><span>BM017PDIP</span></b></h5>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="form-group">
                                <h1><b><span>Rp. 60.000</span></b></h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABEL -->
            <div class="row">
                <div class="col-lg">
                    <div class="card-body table-responsive p-0" style="height: 250px;">
                        <table class="table table-head-fixed text-nowrap">
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
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-warning far fa-edit btn-sm"></button>
                                        <button type="button" class="btn btn-danger far fa-trash-alt btn-sm"></button>
                                    </td>
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-warning far fa-edit btn-sm"></button>
                                        <button type="button" class="btn btn-danger far fa-trash-alt btn-sm"></button>
                                    </td>    
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-warning far fa-edit btn-sm"></button>
                                        <button type="button" class="btn btn-danger far fa-trash-alt btn-sm"></button>
                                    </td>
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-warning far fa-edit btn-sm"></button>
                                        <button type="button" class="btn btn-danger far fa-trash-alt btn-sm"></button>
                                    </td>    
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-warning far fa-edit btn-sm"></button>
                                        <button type="button" class="btn btn-danger far fa-trash-alt btn-sm"></button>
                                    </td>
                                    <td>Umbul-umbul PDIP Kemerdekaan</td>
                                    <td align="center">1</td>
                                    <td align="right">15000</td>
                                    <td align="center">-</td>
                                    <td align="right">15000</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END TABEL -->

            <div class="row d-flex justify-content-end pt-3">
                <div class="form-group col-lg-2">
                    <button type="button" class="btn btn-danger btn-user btn-block btn-sm">
                        Batal
                    </button>
                </div>
                <div class="form-group col-lg-2 float-lg-left">
                    <button type="submit" class="btn btn-success btn-user btn-block btn-sm" data-toggle="modal" data-target="#modal-default">
                        Pembayaran
                    </button>
                </div>
            </div>

            
        </div>
    </div>

    <!-- Modal Box -->
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
              
                <div class="form-group">
                    <label for="total_diskon">Total Diskon</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" 
                                    id="total_diskon" name="total_diskon" placeholder="Total Diskon" readonly>
                        </div>
                </div>
                
                <div class="form-group">
                    <label for="total">Total</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" 
                                    id="total" name="total" placeholder="Total" readonly>
                        </div>
                </div>

                <div class="form-group">
                    <label for="kembali">Kembali</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control form-control-sm form-control-user" 
                                    id="kembali" name="kembali" placeholder="Kembali" readonly>
                        </div>
                </div>

            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('transaksi/cetakStruk'); ?>" target="_blank">
                    <button type="button" class="btn btn-primary">
                        Print Sturk
                    </button>
              </a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</div>