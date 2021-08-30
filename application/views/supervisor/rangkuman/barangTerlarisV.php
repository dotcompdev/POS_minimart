<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Barang Terlaris</h1>
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
                    <!-- <div class="col-md-1 ">
                    <button type="button" class="btn btn-block btn-success mt-1">
                        Cetak
                    </button>
                </div> -->
                    <div class="col-md-4 ml-1 mt-1">
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

        <!-- Main content -->
        <div class="card col-lg-8">
            <!-- /.card-header -->
            <div class="card-body">
                <!-- TABEL -->
                <div class="row">
                    <div class="col">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="100px">ID Barang</th>
                                        <th width="50px">QTY</th>
                                        <th style="text-align: center;" width="100px">Waktu</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($trans as $t) : ?>
                                        <tr>
                                            <td><?= $t['barang_id']; ?></td>
                                            <td><?= $t['qty_jual']; ?></td>
                                            <td align="center"><?= date('d M Y', $t['tgl_transaksi']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END TABEL -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="#">Dotcomp</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>

</div>