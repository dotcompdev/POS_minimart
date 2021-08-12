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

    </ul>
</nav>
<!-- /.navbar -->


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="<?= base_url('assets'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">Minimart</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('supervisor'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a type="button"" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview small ml-1">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-check nav-icon"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-edit nav-icon"></i>
                                <p>Edit profil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-key nav-icon"></i>
                                <p>Ganti password</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a type="button" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pembukuan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview small ml-1">
                        <li class="nav-item">
                            <a href="<?= base_url('supervisor/j_penjualan'); ?>" class="nav-link">
                                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                <p>Jurnal Penjualan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('supervisor/j_pembelian'); ?>" class="nav-link">
                                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                <p>Jurnal Pembelian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('supervisor/j_retur'); ?>" class="nav-link">
                                <i class="fas fa-file-invoice nav-icon"></i>
                                <p>Jurnal Retur</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a type="button" class="nav-link">
                        <i class="nav-icon fas fa-percent"></i>
                        <p>
                            Promo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview small ml-1">
                        <li class="nav-item">
                            <a href="<?= base_url('supervisor/promo'); ?>" class="nav-link">
                                <i class="fas fa-info-circle nav-icon"></i>
                                <p>Info Promo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('supervisor/tenPromo'); ?>" class="nav-link">
                                <i class="fas fa-tags nav-icon"></i>
                                <p>Tentukan Promo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a type="button" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Rangkuman Bisnis
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview small ml-1">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <p>Barang terlaris</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-business-time nav-icon"></i>
                                <p>Waktu terpadat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-search-dollar nav-icon"></i>
                                <p>Pencarian dari pelanggan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a type="button" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Gudang
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview small ml-1">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Input barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-info-circle nav-icon"></i>
                                <p>Info stok</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-address-card nav-icon"></i>
                                <p>Info supplier</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>