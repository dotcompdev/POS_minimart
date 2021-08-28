<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Profil</h1>
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


      <?= form_open_multipart('user/editProfil'); ?>
      <div class="row">
        <!-- /.col -->
        <div class="col-lg-6">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" name="nama" value="<?= $user['nama_user']; ?>">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="username" value="<?= $user['username']; ?>">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control text-muted" name="email" value="<?= $user['email']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>No. Telepon</label>
            <input class="form-control" name="no_telp" value="<?= $user['no_telp']; ?>">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label>Foto</label>
            <div class="row">
              <div class="col-sm-6 form-group">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="form-group col-sm-3">
          <a href="<?= base_url('user'); ?>" type="button" class="btn btn-danger btn-block"><i class="fas fa-times"></i> Batal</a>
        </div>
        <div class="form-group col-sm-3">
          <button type="submit" class="btn btn-success btn-block swalDefaultSuccess"><i class="far fa-save"></i> Simpan</button>
        </div>
      </div>
      </form>
  </section>

</div>