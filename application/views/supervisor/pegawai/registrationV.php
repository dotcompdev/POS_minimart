<div class="content-wrapper">
    <div class="p-3 text-start">
        <h4 class="text-gray-900" id="akunbaru">Buat akun baru!</h4>
    </div>
    <div class="p-3 col-lg registrasi">
        <form method="post" action="<?= base_url('supervisor/registration'); ?>" class="user">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row-lg">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama lengkap.." value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat email.." value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="telp">No. Telepon</label>
                            <input type="text" class="form-control form-control-user" id="telp" name="telp" placeholder="Nomer Telepon.." value="<?= set_value('telp'); ?>">
                            <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Posisi Pekerjaan</label>
                            <select name="posisi" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="2">Kasir</option>
                                <option value="3">Petugas Gudang</option>
                            </select>
                            <?= form_error('posisi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username.." value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan Password.." value="<?= set_value('password'); ?>">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password2">Ulangi password</label>
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password..">
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="file">Pilih foto</label>
                        <div class="custom-file" id="file">
                            <input type="file" class="custom-file-input" id="image" name="image" value="<?= set_value('image'); ?>">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <img src="<?= base_url('assets/dist/img/avatar.png'); ?>" class="img-thumbnail">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <button type="button" class="btn btn-danger btn-user btn-block">
                        Batal
                    </button>
                </div>
                <div class="form-group col-lg-4 float-lg-left">
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        Tambah Akun
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>