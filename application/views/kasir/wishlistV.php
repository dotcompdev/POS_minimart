<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Wishlist</h1>
                    </div>
                </div>

                <div class="row">
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="card lg-12">
            <!-- Main content -->
            <div class="p-3 col-lg">

                <div class="row">
                    <div class="col-lg-4">
                        <?= form_open_multipart('kasir/wishlist'); ?>
                        <div class="row-lg">
                            <div class="form-group">
                                <label for="nama_wish">Nama Barang</label>
                                <input type="text" class="form-control form-control-user form-control-sm" id="nama_wish" name="nama_wish" placeholder="Nama Barang">
                                <?= form_error('nama_wish', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                            </div>
                         

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary btn-sm">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>



                <div class="col-lg-7">
                    <div class="card-body table-responsive p-0" style="height: 270px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th width="100px">Aksi</th>
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