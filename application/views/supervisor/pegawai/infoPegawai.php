<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Info Pegawai</h1>
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
                        <a href="<?= base_url('supervisor/registration'); ?>" type="button" class="btn btn-block btn-success mt-1">
                            Tambah Pegawai
                        </a>
                    </div>
                    <div class="col-md-4 ml-1 mt-1 ">
                        <form action="#" class="justify-content-end">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-md" placeholder="Cari pegawai">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default mb-4">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="row">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>AKSI</th>
                            <th>ID Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $us) : ?>
                            <tr>
                                <td>
                                    <a href="" type="button" class="btn btn-warning far fa-edit"></a>
                                    <a href="<?= base_url('supervisor/hapus/') . $us['id_user']; ?>" type="button" class="btn btn-danger far fa-trash-alt"></a>
                                </td>
                                <td><?= $us['id_user']; ?></td>
                                <td><?= $us['nama_user']; ?></td>
                                <td><?php
                                    if ($us['role_id'] == 2) {
                                        echo "Kasir";
                                    } elseif ($us['role_id'] == 3) {
                                        echo "Petugas Gudang";
                                    }
                                    ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>
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