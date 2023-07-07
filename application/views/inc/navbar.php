<nav class="navbar">
    <div class="navbar-header">
        <a href="<?= site_url() ?>" class="navbar-brand" style="color:black">
            <span class="logo-expand">Ujian Online</span>
            <span class="logo-collapse">v.1</span>
        </a>
    </div>
    <ul class="nav navbar-nav">
        <li class="sidebar-toggle">
            <a href="javascript:void(0)" class="ripple">
                <i class="feather feather-menu list-icon fs-20"></i>
            </a>
        </li>
    </ul>
    <div class="spacer"></div>
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown">
                <span class="avatar thumb-xs2"><img src="<?= base_url() ?>/assets/images/icon-user.png"
                        class="rounded-circle" alt="">
                    <span style="margin-right:20px"><?= $this->session->userdata('fullName'); ?></span>
                    <i class="feather feather-chevron-down list-icon"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-left dropdown-card-profile animated flipInY">
                <div class="card">
                    <ul class="list-unstyled card-body" style="padding:5px">
                        <li>
                            <a href="<?= site_url('page/logout') ?>">
                                <span>
                                    <span class="align-middle">
                                        <i class="feather feather-log-out"></i> Keluar
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</nav>