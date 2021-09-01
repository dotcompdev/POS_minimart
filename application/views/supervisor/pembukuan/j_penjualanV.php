<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jurnal Penjualan</h1>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <!-- <h2 class="text-center display-4">Search</h2> -->
                <div class="row">
                    <div class="col-md-1 ">
                        <a href="<?= base_url('supervisor/cetakJurnalJual'); ?>" target="_blank">
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
                                        <th style="text-align: center;" width="150px">Waktu</th>
                                        <th width="100px">User</th>
                                        <th width="150px">Invoice</th>
                                        <th width="70px">QTY</th>
                                        <th style="text-align: center;" width="100px">Total</th>
                                        <th style="text-align: right;" width="100px">Cash</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($penjualan as $jual) : ?>
                                        <tr>
                                            <td align="center"><?= date('d-m-Y H:i', $jual['waktu_trans']); ?></td>
                                            <td><?= $jual['user']; ?></td>
                                            <td><?= $jual['invoice']; ?></td>
                                            <td><?= $jual['total_qty']; ?></td>
                                            <td align="right"><?= indo_currency($jual['total_bayar']); ?></td>
                                            <td align="right"><?= indo_currency($jual['cash']); ?></td>
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
    <!-- End Content Wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="#">Dotcomp</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>

</div>