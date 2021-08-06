<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow">
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img class="img-profile rounded-circle" 
                    src="<?= base_url('assets/dist/img/profile/default.jpg') . $user['image'];  ?>" 
                    style="max-width: 60px">

                 <span class="ml-2 d-none d-lg-inline text-white small"> <?= $user['nama_user']; ?> </span>
             </a>

             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                 <a class="dropdown-item" href="<?= base_url('minimart/user') ?>">
                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                     Profile
                 </a>

                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="<?= base_url('minimart/auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                     Logout
                 </a>
             </div>
         </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar --> 