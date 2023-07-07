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
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <?php echo $this->session->flashdata('msg'); ?>
                <?php if (validation_errors()) { ?>
                <div class="alert alert-danger">
                    <strong><?php echo strip_tags(validation_errors()); ?></strong>
                    <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i
                            class="fas fa-times"></i></a>
                </div>
                <?php } ?>

                <div class="alert alert-primary" role="alert">
                    <h6><strong><?php echo $user['nama_usr']; ?></strong>, pastikan anda telah yakin dengan jawaban anda
                        sebelum mengumpulkan
                        jawaban.
                    </h6>
                </div>

                <div class="card mb-3">
                    <div class="card shadow h-100 py-2 alert-ivory col mb-4">
                        <div class="card-body">
                            <?php
                            foreach ($jawab_ as $sku) : ?>
                            <form class="user" method="post" action="" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tugas!
                                    </h5>

                                </div>
                                <br>
                                <div class=" h5 mb-0 font-weight-bold text-ivory text-center">
                                    <p><small>
                                            <a>
                                                <?php

                                                    if ($sku->tugas_ == "") {
                                                        echo "Soal belum tersedia, kerjakan poin yang lain.";
                                                    } else {
                                                        echo $sku->tugas_;
                                                    }
                                                    ?>

                                            </a>
                                        </small>
                                    </p>
                                </div>
                            </form>
                            <?php endforeach; ?>
                            <div class="modal-footer">

                                <?php if ($sku->tugas_ == "") : ?>
                                <?php else : ?>
                                <a href="#" class="tombol-edit btn btn-warning col-md-2 mb-2" data-toggle="modal"
                                    data-target="#edit<?php echo $user['id_usr'] ?>">Edit
                                    Jawaban</a>
                                <button type="submit" style="float:right; " class="btn btn-primary col-md-2 mb-2"
                                    data-toggle="modal" data-target="#add-jawaban">
                                    Upload Jawaban
                                </button>
                                <?php endif; ?>

                                <!-- Modal -->
                                <div class="modal fade" id="add-jawaban">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Jawab Tugas</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <?php
                                                    foreach ($jawab_ as $data) : ?>
                                                    <form class="user" method="post"
                                                        action="<?php echo site_url('user/esku_bantara/jawaban_'); ?>"
                                                        enctype="multipart/form-data">

                                                        <input name="tanggal_" class="form-control"
                                                            value="<?php echo date('Y/m/d'); ?>" hidden>


                                                        <input name="id_soal" type="text" class="form-control"
                                                            value="<?php echo $data->id_sku; ?>" hidden>

                                                        <input name="soal_" type="text" class="form-control"
                                                            value="<?php echo $data->tugas_; ?>" hidden>


                                                        <input name="id_siswa" type="text" class="form-control"
                                                            value="<?php echo $user['id_usr']; ?>" hidden>

                                                        <input name="nama_" type="text" class="form-control"
                                                            value="<?php echo $user['nama_usr']; ?>" hidden>


                                                        <input name="tingkat_sku" type="text" class="form-control"
                                                            value="bantara" hidden>


                                                        <div class=" form-group row">
                                                            <label class="col-sm-4 col-form-label">Jawaban</label>
                                                            <div class="col-sm-8">
                                                                <textarea name="jawaban_" type="text"
                                                                    class="form-control"></textarea>

                                                            </div>

                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                <div class="row">

                                                                    <div class="col-sm-9">
                                                                        <div class="form-group">
                                                                            <label>Upload
                                                                                Tugas</label>
                                                                            <input type="file" class="form-control-file"
                                                                                name="jawaban_">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>

                                                        <div class="modal-footer">

                                                            <button type="submit" style="float:right; "
                                                                class="btn btn-primary">
                                                                Simpan
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>

                                <!-- Modal -->
                                <?php
                                foreach ($edit as $data) : ?>
                                <div class="modal fade" id="edit<?php echo $user['id_usr'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Jawaban</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">

                                                    <form class="user" method="post"
                                                        action="<?= site_url('user/esku_bantara/edit_jawaban/' . $data->id_tempuh) ?>"
                                                        enctype="multipart/form-data">

                                                        <input name="tanggal_" class="form-control"
                                                            value="<?php echo date('Y/m/d'); ?>" hidden>
                                                        <input name="id_soal" type="text" class="form-control"
                                                            value="<?php echo $data->id_soal; ?>" hidden>

                                                        <input name="soal_" type="text" class="form-control"
                                                            value="<?php echo $data->soal_; ?>" required hidden>
                                                        <input name="id_siswa" type="text" class="form-control"
                                                            value="<?php echo $user['id_usr']; ?>" hidden>

                                                        <input name="nama_" type="text" class="form-control"
                                                            value="<?php echo $user['nama_usr']; ?>" hidden>


                                                        <input name="tingkat_sku" type="text" class="form-control"
                                                            value="bantara" hidden>

                                                        <div class=" form-group row">
                                                            <label class="col-sm-3 col-form-label">Soal</label>
                                                            <div class="col-sm-9">
                                                                <textarea type="text" class="form-control"
                                                                    readonly><?php echo $data->soal_; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class=" form-group row">
                                                            <label class="col-sm-3 col-form-label">Jawaban</label>
                                                            <div class="col-sm-8">
                                                                <textarea name="jawaban_" type="text"
                                                                    class="form-control"><?php echo $data->jawaban_; ?></textarea>
                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                <div class="row">
                                                                    <div class="col-sm-9">
                                                                        <div class="form-group">
                                                                            <label>Upload
                                                                                Tugas</label>
                                                                            <input type="file" class="form-control-file"
                                                                                name="jawaban_">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" style="float:right; "
                                                                class="btn btn-primary">
                                                                Simpan Jawaban
                                                            </button>
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
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('user/tamu/_partials/footer'); ?>