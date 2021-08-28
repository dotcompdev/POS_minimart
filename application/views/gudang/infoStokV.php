<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Info Stok</h1>
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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 ">
                        <button type="button" class="btn btn-block btn-info mt-1">
                            Pesan Barang
                        </button>
                    </div>
                    <div class="col-md-2 ">
                        <a href="<?= base_url('gudang/inputBarang'); ?>" type="button" class="btn btn-block btn-primary mt-1">
                            Tambah Barang
                        </a>
                    </div>

                    <br><br><br>

                </div>
            </div>
        </section>


       <!-- Main content -->
       <div class="card col-lg-10">
              <!-- /.card-header -->
              <div class="card-body">
                <!-- TABEL -->
                <div class="row">
                    <div class="col">
                        <div class="card-body table-responsive p-0" style="height: 350px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" width="100px">Aksi</th>
                                        <th width="100px">Kode Barang</th>
                                        <th width="200px">Nama Barang</th>
                                        <th width="150px">Kategori</th>
                                        <th width="100px">Harga Jual</th>
                                        <th style="text-align: center;" width="100px">QTY</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($barang as $brg) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('gudang/ubah/') . $brg['id_brg']; ?>" type="button" class="btn btn-warning far fa-edit btn-sm"></a>
                                            <a href="<?= base_url('gudang/hapus/') . $brg['id_brg']; ?>" type="button" class="btn btn-danger far fa-trash-alt btn-sm"></a>
                                        </td>
                                        <td><?= $brg['kode_brg']; ?></td>
                                        <td><?= $brg['nama_brg']; ?></td>
                                        <td><?= $brg['kategori']; ?></td>
                                        <td><?= $brg['harga_jual']; ?></td>
                                        <td style="text-align: center;"><?= $brg['qty']; ?></td>
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