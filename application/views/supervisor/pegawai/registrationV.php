<?php if ($this->session->userdata('role_id') == 1) { ?>
    <div class="content-wrapper">
        <div class="p-3 text-start">
            <h4 class="text-gray-900" id="akunbaru">Tambah Pegawai</h4>
        </div>
        <div class="p-3 col-lg registrasi">
            <?= form_open_multipart('supervisor/registration'); ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row-lg">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama lengkap.." value="<?= set_value('name'); ?>" autocomplete="off">
                            <?= form_error('name', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat email.." value="<?= set_value('email'); ?>" autocomplete="off">
                            <?= form_error('email', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="telp">No. Telepon</label>
                            <input type="text" class="form-control form-control-user" id="telp" name="telp" placeholder="Nomer Telepon.." value="<?= set_value('telp'); ?>" autocomplete="off">
                            <?= form_error('telp', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Posisi Pekerjaan</label>
                            <select name="posisi" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="2" <?= set_value('posisi') == 2 ? "selected" : null ?>>Kasir</option>
                                <option value="3" <?= set_value('posisi') == 3 ? "selected" : null ?>>Petugas Gudang</option>
                            </select>
                            <?= form_error('posisi', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username.." value="<?= set_value('username'); ?>" autocomplete="off">
                        <?= form_error('username', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan Password.." value="<?= set_value('password'); ?>">
                        <?= form_error('password1', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password2">Ulangi password</label>
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password..">
                        <?= form_error('password2', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="file">Pilih foto</label>
                        <div class="custom-file" id="file">
                            <input type="file" class="custom-file-input" id="image" name="image" value="<?= set_value('image'); ?>">
                            <label class="custom-file-label" for="image">Choose file</label>
                            <?= form_error('image', '<small class="text-danger font-weight-bold pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4">
                    <div class="form-group">
                        <img src="<?= base_url('assets/dist/img/avatar.png'); ?>" class="img-thumbnail">
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <a href="<?= base_url('user'); ?>" type="button" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
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
<?php } else {
    redirect('supervisor');
} ?>