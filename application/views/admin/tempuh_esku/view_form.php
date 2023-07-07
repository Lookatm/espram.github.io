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

                        <?php
                        foreach ($data_ as $data) : ?>
                        <form class="user" method="post" action="" enctype="multipart/form-data">

                            <div class="text-center">
                                <embed type="application/pdf"
                                    src="<?php echo base_url('assets/form/bantara/') . $data->unggah; ?>"
                                    class="img-thumbnail text-center"
                                    style="width:500px;height:300px; float:center;"></embed>
                            </div>

                            <?php endforeach; ?>
                            <div class="modal-footer">

                                <a href="#" class="tombol-edit btn btn-primary btn-sm col-md-4 mb-2" role="button"
                                    data-toggle="modal" data-target="#edit<?php echo $data->id_siswa ?>">Ubah
                                    Status</i></a>
                            </div>
                        </form>

                    </div>

                </div>


                <div class="modal fade" id="edit<?php echo $data->id_siswa ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Ubah Status</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <?php
                                    foreach ($siswa_ as $data_) : ?>
                                    <form class="user" method="post"
                                        action="<?php echo site_url(); ?>/admin/dt_user/ubah_status/<?php echo $data_->id_usr ?>"
                                        enctype="multipart/form-data">
                                        <input name="waktu_tempuh" class="form-control"
                                            value="<?php echo date('Y/m/d'); ?>" hidden>
                                        <div class="form-group">
                                            <label class="col-sm-4 col-form-label"><strong>Golongan</strong>
                                            </label>

                                            <div class="col-sm-8" required>
                                                <label class="radio-inline">
                                                    <input type="radio" name="level_" id="inlineRadio1" value="2"
                                                        <?php echo ($data_->level_ == '2' ? 'checked' : ''); ?>>
                                                    Tamu Ambalan
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="level_" id="inlineRadio2" value="3"
                                                        <?php echo ($data_->level_ == '3' ? 'checked' : ''); ?>>
                                                    Penegak Bantara
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="level_" id="inlineRadio2" value="4"
                                                        <?php echo ($data_->level_ == '4' ? 'checked' : ''); ?>>
                                                    Penegak Laksana
                                                </label>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 col-form-label"><strong>Status
                                                    Anggota</strong>
                                            </label>
                                            <div class="col-sm-8" required>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_active" id="inlineRadio1" value="0"
                                                        <?php echo ($data_->is_active == '0' ? 'checked' : ''); ?>>
                                                    Tidak Aktif
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_active" id="inlineRadio2" value="1"
                                                        <?php echo ($data_->is_active == '1' ? 'checked' : ''); ?>>
                                                    Aktif
                                                </label>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>

                                        <div class="modal-footer">
                                            <button type="submit" style="float:right; " class="btn btn-primary">
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


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('admin/_partials/footer'); ?>