<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Pemesanan</h1>
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
                    <div class="col-md-4 ml-1 mt-1">
                        <div class="row-md">
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
            </div>
        </section>

        <!-- Main content -->
        <div class="card">
            <!-- /.card-header -->
            <div class="row">
                <div class="col-md-6 pl-3 pt-3">
                    <div class="row-md">
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="80px">Aksi</th>
                                        <th width="200px">Nama Barang</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($wish as $w) : ?>
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-warning far fa-edit btn-sm"></button>
                                            <button type="button" class="btn btn-danger far fa-trash-alt btn-sm"></button>
                                        </td>
                                        <td><?= $w['nama_brg']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="#">Dotcomp</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

    </div>