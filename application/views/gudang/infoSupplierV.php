<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Info Supplier</h1>
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
                        <button type="button" class="btn btn-block btn-primary mt-1" data-toggle="modal" data-target="#modal-lg">
                            Tambah Supplier
                        </button>
                    </div>

                    <br><br>

                    <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Supplier</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= form_open_multipart('gudang/inputSupplier'); ?>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="nama_sup">Nama Supplier</label>
                                            <input type="text" class="form-control form-control-sm form-control-user" id="nama_sup" name="nama_sup" placeholder="Nama..">
                                            <?= form_error('nama_sup', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea type="text" class="form-control form-control-sm form-control-user" id="alamat" name="alamat" placeholder="Alamat.."></textarea>
                                            <?= form_error('alamat', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_telp">Nomer Telepon</label>
                                            <input type="text" class="form-control form-control-sm form-control-user" id="no_telp" name="no_telp" placeholder="Nomer telp..">
                                            <?= form_error('no_telp', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea type="text" class="form-control form-control-sm form-control-user" id="keterangan" name="keterangan" placeholder="Keterangan.."></textarea>
                                            <?= form_error('keterangan', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->


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
                            <th>ID Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat Supplier</th>
                            <th>No. Telepon</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning far fa-edit"></button>
                                <button type="button" class="btn btn-danger far fa-trash-alt"></button>
                            </td>
                            <td>1</td>
                            <td>PT. Wakanda</td>
                            <td>Wakanda Empire</td>
                            <td>085250041000</td>
                        </tr>

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