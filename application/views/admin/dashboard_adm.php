<!DOCTYPE html>
<html lang="en">

<?php
$this->load->view('admin/_partials/header'); ?>


<body id="page-top">
    <?php $this->load->view('admin/_partials/sidebar_adm'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('admin/_partials/topbar'); ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-ivory"><?= $title; ?></h1>
                <div class="alert alert-ivory" role="alert">
                    <h6>Selamat Datang, <strong><?php echo $user['nama_adm']; ?></strong></h6>
                </div>

                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <a class="collapse-item" href="<?= site_url('admin/dt_adm'); ?>">Pembina</a>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jmlAdmin; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Annual) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <a class="collapse-item" href="<?= site_url('admin/dt_user'); ?>">Anggota
                                                Pramuka</a>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jmlAnggota; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tasks Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a
                                                class="collapse-item"
                                                href="<?= site_url('admin/dt_user/datapenempuhbtr'); ?>">Penempuh SKU
                                                Bantara</a>
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php echo $jmlskuBantara; ?></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> <a
                                                class="collapse-item"
                                                href="<?= site_url('admin/dt_user/datapenempuhlks'); ?>">
                                                Penempuh SKU Laksana</a></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $jmlskuLaksana; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4 text-center ">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body float-center">
                                <div class="alert alert-ivory">
                                    <div class="text-xs text-center text-ivory text-uppercase mb-1 float-center">
                                        <?php echo $kalender; ?></div>
                                    <div class="text-xs text-center text-ivory text-uppercase mb-1 float-center">
                                        <a
                                            href="<?= site_url('admin/dashboard_adm/jadwal'); ?>"><strong>Penjadwalan</strong></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-9 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="text-xs text-center text-ivory text-uppercase mb-1 float-center">
                                    <strong>Jadwal Latihan</strong>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-ivory" id="table-id"
                                        style="font-size:13px;">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">No</th>
                                                <th class="text-center">Materi</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($jadwal as $data) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>

                                                <td>
                                                    <?php echo $data->materi_;
                                                        ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->tanggal_ ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->keterangan_ ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>

        <!-- End of Main Content -->
        <?php $this->load->view('admin/_partials/footer'); ?>