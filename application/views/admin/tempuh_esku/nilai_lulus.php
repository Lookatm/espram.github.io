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

                <div class="card mb-3">

                    <div class="card-body">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>">
                        </div>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger">
                            <strong><?php echo strip_tags(validation_errors()); ?></strong>
                            <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i
                                    class="fas fa-times"></i></a>
                        </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-bordered text-ivory" id="table-id" style="font-size:13px;">
                                <thead>
                                    <tr>

                                        <th class="text-center" style="width: 5%;">No</th>
                                        <th class="text-center">Soal SKU</th>
                                        <th class="text-center">Tanggal Penilaian</th>
                                        <th class="text-center" style="width: 15%;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data_ as $data) : ?>
                                    <tr>

                                        <td>
                                            <?php echo $i++;
                                                ?>
                                        </td>
                                        <td>
                                            <?php echo $data['soal_'];
                                                ?>
                                        </td>
                                        <td>
                                            <?php echo $data['tgl_nilai'];
                                                ?>
                                        </td>

                                        <td>

                                            <?php echo $data['hasil_'];
                                                ?>
                                        </td>


                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>



                </div>
                <!-- /.container-fluid -->
            </div>

        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('admin/_partials/footer'); ?>