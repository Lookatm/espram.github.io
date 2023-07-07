<!DOCTYPE html>
<html lang="en">

<?php
$this->load->view('user/bantara/_partials/header'); ?>


<body id="page-top">
    <?php $this->load->view('user/bantara/_partials/sidebar_usr'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('user/bantara/_partials/topbar'); ?>

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

                                        <th class="text-center" style="width: 10%;">No</th>
                                        <th class="text-center">Tugas SKU</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center" style="width: 25%;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($nilai_ as $data) : ?>
                                    <tr>

                                        <td>
                                            <?php echo $i++;
                                                ?>
                                        </td>
                                        <td>
                                            <?php echo $data->soal_;
                                                ?>
                                        </td>
                                        <td>
                                            <?php echo $data->nilai_akhir;
                                                ?>
                                        </td>
                                        </td>
                                        <td class="text-center">

                                            <a href="#" class="tombol-edit btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#detail<?php echo $data->id_tempuh ?>">Detail</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal -->
                        <?php
                        foreach ($nilai_ as $data) : ?>
                        <div class="modal fade" id="detail<?php echo $data->id_tempuh ?>" tabindex="-1" role="dialog"
                            aria-labelledby="addNewDonaturLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" title-id="addNewDonaturLabel">Detail Nilai</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="box-body">

                                            <form class="user" method="post" action="" enctype="multipart/form-data">

                                                <div class=" form-group row">
                                                    <label class="col-sm-4 col-form-label">Soal</label>
                                                    <div class="col-sm-8">
                                                        <textarea type="text" class="form-control"
                                                            readonly><?php echo $data->soal_; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class=" form-group row">
                                                    <label class="col-sm-4 col-form-label">Jawaban</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="jawaban_" type="text" class="form-control"
                                                            readonly><?php echo $data->jawaban_; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class=" form-group row">
                                                    <label class="col-sm-4 col-form-label">Nilai</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="nilai_akhir" type="text" class="form-control"
                                                            readonly><?php echo $data->nilai_akhir; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class=" form-group row">
                                                    <label class="col-sm-4 col-form-label">Status</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="hasil_" type="text" class="form-control"
                                                            readonly><?php echo $data->hasil_; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class=" form-group row">
                                                    <label class="col-sm-4 col-form-label">Catatan Pembina</label>
                                                    <div class="col-sm-8">
                                                        <textarea type="text" class="form-control"
                                                            readonly><?php echo $data->catatan_; ?></textarea>
                                                    </div>
                                                </div>


                                            </form>

                                        </div>

                                    </div>
                                    <!-- /.modal-content -->

                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                        </div>
                        <?php endforeach; ?>

                    </div>



                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('user/bantara/_partials/footer'); ?>