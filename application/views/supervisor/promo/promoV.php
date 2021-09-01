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
                        <a href="<?= base_url('supervisor/tenPromo'); ?>" type="button" class="btn btn-block btn-success mt-1">
                            Tambah Promo
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
                                                <button id="updateP" data-toggle="modal" data-target="#modalViewPromo" type="button" class="btn btn-info far fa-eye btn-sm" data-id="<?= $itemPromo[$i]['idPromo']; ?>" data-nama="<?= $itemPromo[$i]['namaPromo']; ?>" data-mulai="<?= date('d M Y ~ H:i', $itemPromo[$i]['waktuAwal']); ?>" data-berakhir="<?= date('d M Y ~ H:i', $itemPromo[$i]['waktuAkhir']); ?>" data-hari="<?= $itemPromo[$i]['hari']; ?>"></button>
                                                <!-- <a href="<?= base_url('supervisor/editPromo/') . $itemPromo[$i]['idPromo']; ?>" type="button" class="btn btn-warning far fa-edit btn-sm"></a> -->
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

<!-- View detail promo -->
<div class="modal fade" id="modalViewPromo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Promo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="namaP">Nama Promo</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm form-control-user" id="namaP" name="namaP" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="tglMulai">Tanggal mulai</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm form-control-user" id="tglMulai" name="tglMulai" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="tglAkhir">Tanggal berakhir</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm form-control-user" id="tglAkhir" name="tglAkhir" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="hariP">Hari</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm form-control-user" id="hariP" name="hariP" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <input type="text" id="idP" hidden>
                    <div id="containerPromo" class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>QTY</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                </tr>
                            </thead>
                            <tbody id="containerItemPromo">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>