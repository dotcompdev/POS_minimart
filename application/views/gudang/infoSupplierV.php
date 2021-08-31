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
        <br>

       <!-- Main content -->
       <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <!-- TABEL -->
                <div class="row">
                    <div class="col">
                        <div class="card-body table-responsive p-0" style="height: 350px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="100px">Aksi</th>
                                        <th width="100px">Nama Supplier</th>
                                        <th width="150px">Alamat Supplier</th>
                                        <th width="100px">No. Telepon</th>
                                        <th width="150px">Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($supplier as $sup) : ?>
                                    <tr>
                                        <!-- <td><?= ++$start; ?></td> -->
                                        <td>
                                            <button type="button" class="btn btn-warning far fa-edit btn-sm"></button>
                                            <button type="button" class="btn btn-danger far fa-trash-alt btn-sm"></button>
                                        </td>
                                        <td><?= $sup['nama_supplier']; ?></td>
                                        <td><?= $sup['alamat_supplier']; ?></td>
                                        <td><?= $sup['no_telp']; ?></td>
                                        <td><?= $sup['keterangan']; ?></td>
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
    

</div>