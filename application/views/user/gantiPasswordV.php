<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ganti Password</h1>
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


    </div>
    <!-- /.col -->
    <div class="col-md-6">
      <div class="card card-primary card-outline">
        <?= $this->session->flashdata('message'); ?>

        <!-- /.card-header -->
        <?= form_open_multipart('user/gantiPassword'); ?>
        <div class="card-body">
          <div class="form-group">
            <label>Password Saat ini</label>
            <input type="password" class="form-control" name="passwordSaatIni" placeholder="Password saat ini">
            <?= form_error('passwordSaatIni', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Password Baru</label>
            <input type="password" class="form-control" name="passwordBaru" placeholder="Password baru">
            <?= form_error('passwordBaru', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label>Ulangi Password</label>
            <input type="password" class="form-control" name="ulangiPassword" placeholder="Ulangi Password">
            <?= form_error('ulangiPassword', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="float-right">
            <button type="button" class="btn btn-danger"><i class="fas fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Simpan</button>
          </div>
        </div>
        </form>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->


</div>
</section>

</div>