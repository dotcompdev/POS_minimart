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
                                        <th style="text-align: center;" width="70px">Total Diskon</th>
                                        <th style="text-align: center;" width="100px">Jadwal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($ItemPromo as $item) : ?>
                                        <tr>
                                            <td>
                                                <a href="" type="button" class="btn btn-info far fa-eye btn-sm"></a>
                                                <a href="" type="button" class="btn btn-warning far fa-edit btn-sm"></a>
                                                <a href="" type="button" class="btn btn-danger far fa-trash-alt btn-sm"></a>
                                            </td>
                                            <td align="center"><?= $item['nama_promo']; ?></td>
                                            <td align="center"><?= $item['diskon_brg']; ?></td>
                                            <td align="center"><?= $item['jadwal']; ?></td>
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