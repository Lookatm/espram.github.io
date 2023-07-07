<aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
    <!-- sidebar: style can be found in sidebar.less -->
    <nav id="navForSideBar" class="sidebar-nav" style="overflow-y:scroll">
        <ul class="nav in side-menu" data-widget="tree">
            <li class="current-page"><a href="<?= site_url() ?>">
                    <i class="list-icon feather feather-command"></i></a></li>
            <li class="menu-item-has-children <?= isset($master) ? 'active' : ''; ?>">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li <?= isset($guru) ? 'class="active"' : ''; ?>><a href="<?= site_url('master/guru'); ?>"><i
                                class="fa fa-angle-double-right"></i>
                            Guru</a></li>
                    <li <?= isset($siswa) ? 'class="active"' : ''; ?>><a href="<?= site_url('master/siswa'); ?>"><i
                                class="fa fa-angle-double-right"></i>
                            Siswa</a></li>
                    <li <?= isset($kelas) ? 'class="active"' : ''; ?>><a href="<?= site_url('master/kelas'); ?>"><i
                                class="fa fa-angle-double-right"></i>
                            Kelas</a></li>
                    <li <?= isset($mapel) ? 'class="active"' : ''; ?>><a href="<?= site_url('master/mapel'); ?>"><i
                                class="fa fa-angle-double-right"></i>
                            Mata Pelajaran</a>
                    </li>
                    <li <?= isset($pengguna) ? 'class="active"' : ''; ?>><a
                            href="<?= site_url('master/pengguna'); ?>"><i class="fa fa-angle-double-right"></i>
                            Pengguna</a></li>
                </ul>
            </li>
    </nav>

    <ul class="treeview-menu">
        <li <?= isset($academic_year) ? 'class="active"' : ''; ?>><a
                href="<?= base_url('configuration/academic_year'); ?>"><i class="fa fa-angle-double-right"></i>
                Tahun
                Pelajaran</a></li>
        <li <?= isset($date_print) ? 'class="active"' : ''; ?>><a href="<?= base_url('configuration/date_print'); ?>"><i
                    class="fa fa-angle-double-right"></i>
                Tanggal Cetak</a>
        </li>
    </ul>
    </li>

    <li class="treeview <?= isset($setting) ? 'active' : ''; ?>">
        <a href="#">
            <i class="fa fa-cog"></i>
            <span>Pengaturan</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li <?= isset($mengajar) ? 'class="active"' : ''; ?>><a href="<?= site_url('setting/mengajar'); ?>"><i
                        class="fa fa-angle-double-right"></i>
                    Mengajar</a></li>
            <li <?= isset($wali_kelas) ? 'class="active"' : ''; ?>><a href="<?= base_url('setting/wali_kelas'); ?>"><i
                        class="fa fa-angle-double-right"></i>
                    Wali Kelas</a></li>
            <li <?= isset($sett_kelas) ? 'class="active"' : ''; ?>><a href="<?= base_url('setting/set_kelas'); ?>"><i
                        class="fa fa-angle-double-right"></i>
                    Rombongan Belajar</a></li>
        </ul>
    </li>

</aside>