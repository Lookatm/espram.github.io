<!DOCTYPE html>
<html lang="en">

<?php
$this->load->view('user/tamu/_partials/header'); ?>


<body id="page-top">
    <?php $this->load->view('user/tamu/_partials/sidebar_usr'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('user/tamu/_partials/topbar'); ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-ivory"><?= $title; ?></h1>

                <div class="alert alert-primary" role="alert">
                    <h6><strong><?php echo $user['nama_usr']; ?></strong>, Kerjakan Poin Spiritual E-SKU Sesuai dengan
                        Keyakinan
                        Anda
                    </h6>
                </div>
                <div class="card-body">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <strong><?php echo strip_tags(validation_errors()); ?></strong>
                        <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i
                                class="fas fa-times"></i></a>
                    </div>
                    <?php } ?>

                    <div class=" col ">
                        <div class="card h-100 py-2">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <table class="table table-bordered text-ivory" id="table-id"
                                                style="font-size:13px; color:info; border-color:white;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Poin SKU</th>
                                                        <th class="text-center" style="width: 20%;">Jenis SKU</th>
                                                        <th class="text-center" style="width: 20%;">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($data_ as $data) : ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $data->nama_sku; ?></td>
                                                        <td>
                                                            <?php if ($data->jenis_sku == '1') {
                                                                    echo "Poin Spiritual Agama Islam";
                                                                } elseif ($data->jenis_sku == '2') {
                                                                    echo "Poin Spiritual Agama Hindu";
                                                                } elseif ($data->jenis_sku == '3') {
                                                                    echo "Poin Spiritual Agama Buddha";
                                                                } elseif ($data->jenis_sku == '4') {
                                                                    echo "Poin Spiritual Agama Katolik";
                                                                } elseif ($data->jenis_sku == '5') {
                                                                    echo "Poin Spiritual Agama Protestan";
                                                                } elseif ($data->jenis_sku == '6') {
                                                                    echo "Poin Umum";
                                                                } elseif ($data->jenis_sku == '7') {
                                                                    echo "Lainnya";
                                                                } ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="<?= site_url('user/esku_bantara/viewSoal/' . $data->id_sku) ?>"
                                                                class="tombol-edit btn btn-warning btn-sm"
                                                                data-id="<?php echo $data->id_sku ?>">
                                                                Kerjakan Tugas</a>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>

        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('user/tamu/_partials/footer'); ?>