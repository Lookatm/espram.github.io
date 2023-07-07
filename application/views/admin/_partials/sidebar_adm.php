<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
            href="<?= site_url('admin/dashboard_adm'); ?>">
            <img src="<?= base_url('assets/img/pramuka2.png'); ?>" width="30%">

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/dashboard_adm'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Beranda</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user"></i>
                <span>Manage Data</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data-data:</h6>
                    <a class="collapse-item" href="<?= site_url('admin/dt_user'); ?>">Anggota Aktif</a>
                    <a class="collapse-item" href="<?= site_url('admin/dt_user/Tk_Aktif'); ?>">Anggota Nonaktif</a>
                    <a class="collapse-item" href="<?= site_url('admin/dt_adm'); ?>">Admin Aktif</a>
                    <a class="collapse-item" href="<?= site_url('admin/dt_adm/Tk_Aktif'); ?>">Admin Nonaktif</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-book"></i>
                <span>Manage e-SKU</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">e-SKU:</h6>
                    <a class="collapse-item" href="<?= site_url('admin/esku_bantara'); ?>">e-SKU Bantara</a>
                    <a class="collapse-item" href="<?= site_url('admin/esku_laksana'); ?>">e-SKU Laksana</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penilaian" aria-expanded="true"
                aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Penilaian</span>
            </a>
            <div id="penilaian" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Penilaian:</h6>
                    <a class="collapse-item" href="<?= site_url('admin/dt_user/datapenempuhbtr'); ?>">e-SKU Bantara</a>
                    <a class="collapse-item" href="<?= site_url('admin/dt_user/datapenempuhlks'); ?>">e-SKU Laksana</a>
                    <a class="collapse-item" href="<?= site_url('admin/penilaian_sku/datatidakLulus'); ?>">Belum
                        Lulus</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penempuhan" aria-expanded="true"
                aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-list"></i>
                <span>Status Penempuhan</span>
            </a>
            <div id="penempuhan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Status:</h6>
                    <a class="collapse-item" href="<?= site_url('admin/penilaian_sku/dataBantara'); ?>">Penempuh
                        Bantara</a>
                    <a class="collapse-item" href="<?= site_url('admin/penilaian_sku/dataLaksana'); ?>">Penempuh
                        Laksana</a>
                </div>
            </div>
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