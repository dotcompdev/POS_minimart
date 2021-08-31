<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Info Promo</h1>
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
                    <div class="col-md-2 ">
                        <a href="<?= base_url('supervisor/tenPromo'); ?>">
                            <button type="button" class="btn btn-block btn-success mt-1">
                                Tentukan Promo
                            </button>
                        </a>
                    </div>
                    <div class="col-md-4 ml-1 mt-1">
                        <form action="#" class="justify-content-end">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-md" placeholder="Cari promo">
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
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <!-- TABEL -->
                <div class="row">
                    <div class="col">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" width="100px">Aksi</th>
                                        <th style="text-align: center;" width="100px">Nama Promo</th>
                                        <th style="text-align: center;" width="100px">Mulai</th>
                                        <th style="text-align: center;" width="100px">Akhir</th>
                                        <th style="text-align: center;" width="100px">Hari</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php for ($i = 1; $i < count($itemPromo); $i++) : ?>
                                        <tr>
                                            <td align="center">
                                                <a href="" type="button" class="btn btn-info far fa-eye btn-sm"></a>
                                                <a href="<?= base_url('supervisor/editPromo/') . $itemPromo[$i]['idPromo']; ?>" type="button" class="btn btn-warning far fa-edit btn-sm"></a>
                                                <a href="<?= base_url('supervisor/hapusPromo/') . $itemPromo[$i]['idPromo']; ?>" type=" button" class="btn btn-danger far fa-trash-alt btn-sm"></a>
                                            </td>
                                            <td align="center"><?= $itemPromo[$i]['namaPromo']; ?></td>
                                            <td align="center"><?= date('d M Y ~ H:i', $itemPromo[$i]['waktuAwal']); ?></td>
                                            <td align="center"><?= date('d M Y ~ H:i', $itemPromo[$i]['waktuAkhir']); ?></td>
                                            <td align="center"><?= $itemPromo[$i]['hari']; ?></td>
                                        </tr>
                                    <?php endfor; ?>
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
</div>