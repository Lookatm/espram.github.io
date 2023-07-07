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

                <div class="card mb-3">



                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-bordered text-ivory" id="table-id" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">No</th>
                                        <th class="text-center">NIM</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center" style="width: 20%;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data_ as $data) : ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td>
                                            <?php echo $data->id_siswa;
                                                ?>
                                        </td>
                                        <td>
                                            <?php echo $data->nama_;
                                                ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= site_url('admin/penilaian_sku/detail_jawabanlks/' . $data->id_siswa) ?>"
                                                class="tombol-edit btn btn-primary btn-sm col-md-8 mb-2"
                                                data-id="<?php echo $data->id_siswa ?>"><i class="fas fa-info-circle">
                                                    Lihat Progress</i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-user">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Anggota</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <form class="user" method="post"
                                        action="<?php echo site_url('admin/dt_user/tambah_usr'); ?>"
                                        enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-8">
                                                <input name="nama_usr" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Username*</label>
                                            <div class="col-sm-8">
                                                <input name="username_" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Password*</label>
                                            <div class="col-sm-8">
                                                <input name="pass_" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Golongan*</label>
                                            <div class="col-sm-8">
                                                <select name="golongan_" class="form-control" required>
                                                    <option></option>
                                                    <option value="1">Tamu Ambalan</option>
                                                    <option value="2">Penegak Bantara</option>
                                                    <option value="3">Penegak Laksana</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 col-form-label">Level Session*</label>
                                            <div class="col-sm-8" required>

                                                <label class="radio-inline">
                                                    <input type="radio" name="level_" id="inlineRadio2" value="2">
                                                    Tamu Ambalan
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="level_" id="inlineRadio2" value="3">
                                                    Bantara
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="level_" id="inlineRadio2" value="4">
                                                    Laksana
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 col-form-label">Status Anggota*</label>
                                            <div class="col-sm-8" required>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_active" id="inlineRadio1" value="0">
                                                    Tidak Aktif
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_active" id="inlineRadio2" value="1">
                                                    Aktif
                                                </label>
                                            </div>
                                        </div>

                                        <div>
                                            <label style="color:red;">*wajib diisi</label>
                                        </div>

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