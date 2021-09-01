<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jurnal Retur</h1>
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
                        <a href="<?= base_url('supervisor/cetakJurnalRetur'); ?>" target="_blank">
                            <button type="button" class="btn btn-block btn-success mt-1">
                                Cetak
                            </button>
                        </a>
                    </div>
                    <div class="col-md-4 ml-1 mt-1 ">
                        <form action="#" class="justify-content-end">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-md" placeholder="Cari">
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
                                        <th style="text-align: center;" width="150px">Invoice</th>
                                        <th style="text-align: center;" width="150px">Kode Barang</th>
                                        <th style="text-align: center;" width="200px">Nama Barang</th>
                                        <th style="text-align: center;" width="200px">Harga</th>
                                        <th style="text-align: center;" width="250px">QTY</th>
                                        <th style="text-align: center;" width="250px">Opsi</th>
                                        <th style="text-align: center;" width="250px">Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($retur as $r) : ?>
                                        <tr>
                                            <td align="center"><?= $r['invoice_jual']; ?></td>
                                            <td align="center"><?= $r['kode_brg_retur']; ?></td>
                                            <td align="center"><?= $r['nama_brg_retur']; ?></td>
                                            <td align="right"><?= indo_currency($r['harga_jual']); ?></td>
                                            <td align="center"><?= $r['qty_retur']; ?></td>
                                            <td align="center"><?= $r['opsi']; ?></td>
                                            <td><?= $r['keterangan']; ?></td>
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
    <!-- END Content Wrapper -->
</div>