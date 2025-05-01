<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <!-- <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> -->
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->


            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa-sharp fa-solid fa-square-arrow-right"></i>
                    <button class="badge badge-danger navbar-badge btn btn-info">Logout</button>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('login/logout');  ?>" class="dropdown-item dropdown-footer">LOGOUT</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">APK ABSENSI</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= base_url() ?>assets/dist/img/gambar/default.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">rpl</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= base_url('welcome') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <!-- E X A M P L E -->
                    <li class="nav-header">Menu</li>

                    <li class="nav-item">
                        <a href="<?= base_url('skedul') ?>" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check-o"></i>
                            <p>
                                Scedule
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('dataabsen') ?>" class="nav-link">
                            <i class="nav-icon fas  fa-file"></i>
                            <p>
                                DataAbsen
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('kelas') ?>" class="nav-link">
                            <i class="nav-icon fas fa-university"></i>
                            <p>
                                Kelas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('waktu') ?>" class="nav-link">
                            <i class="nav-icon fas fa-university"></i>
                            <p>
                                Waktu
                            </p>
                        </a>
                    </li>

                    <!-- E N D -->



                    <!-- D A T E -->
                    <li class="nav-header">DATE</li>

                    <!-- Bagian data guru -->

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Rekap
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('rekap') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Rekap Vitulasi</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('rekap/detail') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Detail Rekap</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End -->

                    <!-- Bagian data siswa -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Siswa
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= base_url('siswa') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Siswa</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">SETTING</li>
                    <li class="nav-item">
                        <a href="<?= base_url('team') ?>" class="nav-link">
                            <i class="nav-icon fas fa-hand-rock-o"></i>
                            <p>
                                Team
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('alamat') ?>" class="nav-link">
                            <i class="nav-icon fas fa-street-view"></i>
                            <p>
                                Alamat
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('wilayah') ?>" class="nav-link">
                            <i class="nav-icon fas fa-map-marker"></i>
                            <p>
                                wilayah
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>