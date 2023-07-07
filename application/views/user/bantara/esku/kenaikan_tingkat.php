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
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <?php echo $this->session->flashdata('msg'); ?>
                <?php if (validation_errors()) { ?>
                <div class="alert alert-danger">
                    <strong><?php echo strip_tags(validation_errors()); ?></strong>
                    <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i
                            class="fas fa-times"></i></a>
                </div>
                <?php } ?>

                <div class="row">
                    <div class="col-xl-6  col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 alert-ivory ">
                            <div class="card-body">
                                <div class="text-xs text-center font-weight-bold text-ivory text-uppercase mb-1">
                                    <label>
                                        <h6>Unduh Form Pelantikan Bantara Disini.</h6>
                                    </label>
                                </div>
                                </br>
                                <br>
                                <br>
                                <br>
                                <div class="modal-footer">
                                    <a href="<?= site_url('user/esku_laksana/do_unduh'); ?>"
                                        class="btn btn-success col-md-4 mb-2" role="button">Unduh File</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 alert-ivory">
                            <div class="card-body">
                                <div class="text-xs text-center font-weight-bold text-ivory text-uppercase mb-1">
                                    <label for="unggah">
                                        <h6>Unggah Persetujuan Pembina Disini.</h6>
                                    </label>
                                </div>
                                <?php echo form_open_multipart('user/esku_laksana/unggah_file/' . $user['id_usr']); ?>

                                <input name="tanggal_" class="form-control" value="<?php echo date('d/m/Y'); ?>" hidden>

                                <input name="id_siswa" type="text" class="form-control"
                                    value="<?php echo $user['id_usr'] ?>" hidden>

                                <input name="nama_" type="text" class="form-control"
                                    value="<?php echo $user['nama_usr']; ?>" hidden>

                                <input name="golongan_" type="text" class="form-control" value="laksana" hidden>
                                <br>
                                <div class="col-sm-9">
                                    <div class="form-group">

                                        <input type="file" class="form-control-file" name="unggah">
                                    </div>
                                    <div class="form-group">
                                        <h10>*Format file jpg, jpeg, png, dan pdf</h10>
                                        <br>
                                        <h10>*max-size 100mb</h10>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info col-md-4 mb-2" name="btn">Unggah
                                        Form</button>


                                    <a href="#" class="tombol-edit btn btn-warning col-md-4 mb-2" data-toggle="modal"
                                        data-target="#edit<?php echo $user['id_usr'] ?>">Edit Form</a>
                                </div>

                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="edit<?php echo $user['id_usr'] ?>" tabindex="-1" role="dialog"
                aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Form</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <?php
                                foreach ($edit as $data) : ?>
                                <form class="user" method="post"
                                    action="<?= site_url('user/esku_laksana/edit_unggah/' . $data['id_siswa']) ?>"
                                    enctype="multipart/form-data">

                                    <input name="tanggal_" class="form-control" value="<?php echo date('Y/m/d'); ?>"
                                        hidden>

                                    <input name="id_siswa" type="text" class="form-control"
                                        value="<?php echo $user['id_usr'] ?>" hidden>

                                    <input name="nama_" type="text" class="form-control"
                                        value="<?php echo $user['nama_usr']; ?>" hidden>

                                    <input name="golongan_" type="text" class="form-control" value="laksana" hidden>

                                    <div class="text-center">
                                        <embed type="application/pdf"
                                            src="<?php echo base_url('assets/form/bantara/') . $data['unggah']; ?>"
                                            class="img-thumbnail text-center"
                                            style="width:500px;height:300px; float:center;"></embed>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label for="unggah">Unggah Persetujuan Pembina Disini.</label>
                                            <input type="file" class="form-control-file" name="unggah">
                                        </div>
                                        <div class="form-group">
                                            <h10>*Format file jpg, jpeg, png, dan pdf</h10>
                                            <br>
                                            <h10>*max-size 100mb</h10>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="modal-footer">
                                        <button type="submit" style="float:right; " class="btn btn-success">
                                            Update Form
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


            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('user/bantara/_partials/footer'); ?>