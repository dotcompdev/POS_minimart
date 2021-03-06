<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jurnal Pembelian</h1>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1 ">
                        <a href="<?= base_url('supervisor/cetakJurnalBeli'); ?>" target="_blank">
                            <button type="button" class="btn btn-block btn-success mt-1">
                                Cetak
                            </button>
                        </a>
                    </div>
                    <div class="col-md-4 ml-1 mt-1">
                        <form action="" method="post" class="justify-content-end">
                            <div class="input-group">
                                <input id="keywordPembelian" name="keywordPembelian" type="text" class="form-control form-control-md" placeholder="Cari" autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default mb-4">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <div class="card">
            <div class="card-body">
                <!-- TABEL -->
                <div class="row">
                    <div class="col-lg">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="70px">Supplier</th>
                                        <th width="150px">Nama Barang</th>
                                        <th style="text-align: right;" width="100px">Harga Beli</th>
                                        <th style="text-align: center;" width="50px">QTY</th>
                                        <th width="100px">Tanggal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($pembelian as $beli) : ?>
                                        <tr>
                                            <td><?= $beli['supplier_nama']; ?></td>
                                            <td><?= $beli['brg_nama']; ?></td>
                                            <td align="right"><?= indo_currency($beli['harga_beli']); ?></td>
                                            <td align="center"><?= $beli['qty_beli']; ?></td>
                                            <td><?= date('d-m-y ~ H:i', $beli['tgl_beli']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END TABEL -->
            </div>
        </div>
        <!-- END CARD -->

    </div>

</div>