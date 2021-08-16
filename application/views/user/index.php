<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="row-lg-2">
                <div class="col-lg-6">
                    <div class="info-box">
                        <span class="info-box-img">
                            <!-- <i class="far fa-envelope"></i> -->
                            <img class="img-thumbnail" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" style="border-radius: 10px;">
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Nama : <?= $user['nama_user']; ?></span>
                            <span class="info-box-text">Username : <?= $user['username']; ?></span>
                            <span class="info-box-text">email : <?= $user['email']; ?></span>
                            <span class="info-box-text">No. Telp : <?= $user['no_telp']; ?></span>
                            <span class="info-box-text">Posisi :
                                <?php
                                if ($user['role_id'] == 1) {
                                    echo " Supervisor";
                                } elseif ($user['role_id'] == 2) {
                                    echo " Kasir";
                                } else {
                                    echo " Petugas Gudang";
                                }
                                ?>
                            </span>
                            <span class="info-box-text">Terdaftar dari : <?= date('d F Y', $user['created_date']); ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>


        </div>
    </section>

</div>