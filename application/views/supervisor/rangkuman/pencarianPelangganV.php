<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pencarian dari Pelanggan</h1>
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

                    <div class="col-md-4 ml-1 mt-1">
                        <form action="#" class="justify-content-end">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-md" placeholder="Cari list pemesanan">
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
            <div class="row">
                <div class="col-md-4 pl-3 pt-3">
                    <div class="row-md">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>AKSI</th>
                                    <th>Nama Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($wish as $w) : ?>
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-warning far fa-edit"></button>
                                            <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                                        </td>
                                        <td><?= $w['nama_brg']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabel kanan -->
                <div class="col-md-6 pt-3">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>AKSI</th>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>QTY</th>
                                <th>Id Supplier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-warning far fa-edit"></button>
                                    <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                                </td>
                                <td>1</td>
                                <td>Surya 12</td>
                                <td>15</td>
                                <td>001</td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-warning far fa-edit"></button>
                                    <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                                </td>
                                <td>1</td>
                                <td>Surya 12</td>
                                <td>15</td>
                                <td>001</td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-warning far fa-edit"></button>
                                    <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                                </td>
                                <td>1</td>
                                <td>Surya 12</td>
                                <td>15</td>
                                <td>001</td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-warning far fa-edit"></button>
                                    <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                                </td>
                                <td>1</td>
                                <td>Surya 12</td>
                                <td>15</td>
                                <td>001</td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-warning far fa-edit"></button>
                                    <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                                </td>
                                <td>1</td>
                                <td>Surya 12</td>
                                <td>15</td>
                                <td>001</td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="button" class="btn btn-warning far fa-edit"></button>
                                    <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                                </td>
                                <td>1</td>
                                <td>Surya 12</td>
                                <td>15</td>
                                <td>001</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- 
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="#">Dotcomp</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer> -->

    </div>