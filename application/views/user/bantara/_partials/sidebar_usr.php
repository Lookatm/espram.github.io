<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
            href="<?= site_url('user/dashboard_usr/indexBantara'); ?>">
            <img src="<?= base_url('assets/img/pramuka2.png'); ?>" width="30%">

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('user/dashboard_usr/indexBantara'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Beranda</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">



        <!-- Heading -->
        <div class="sidebar-heading">
            User
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('user/esku_laksana'); ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>E-SKU Laksana</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penilaian" aria-expanded="true"
                aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Nilai</span>
            </a>
            <div id="penilaian" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-ivory py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Penilaian:</h6>
                    <a class="collapse-item"
                        href="<?= site_url('user/esku_laksana/viewNilailulus/' . $user['id_usr']); ?>">Lulus</a>
                    <a class="collapse-item"
                        href="<?= site_url('user/esku_laksana/viewNilai/' . $user['id_usr']); ?>">Belum Lulus</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('user/esku_laksana/kenaikan_tkt/' . $user['id_usr']); ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Formulir</span></a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-fw "></i>
                <span>Logout</span>
            </a>

        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->