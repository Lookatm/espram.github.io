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

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="table-responsive">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <table class="table table-bordered text-ivory" id="table-id"
                                            style="font-size:13px;">
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
                                                    <td class="text-center">

                                                        <!-- <a href="<?= site_url('user/esku_bantara/viewUlang/' . $data->id_tempuh) ?>"
                                            class="tombol-edit btn btn-primary btn-sm"
                                            data-id="<?php echo $data->id_tempuh ?>">Tempuh ulang</a> -->

                                                        <a href="#" class="tombol-edit btn btn-primary btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#detail<?php echo $data->id_tempuh ?>">Tempuh
                                                            Ulang</a>
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

                <!-- Modal -->
                <?php
                foreach ($nilai_ as $data) : ?>
                <div class="modal fade" id="detail<?php echo $data->id_tempuh ?>" tabindex="-1" role="dialog"
                    aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tempuh Ulang</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">

                                    <form class="user" method="post"
                                        action="<?= site_url('user/esku_bantara/tempuh_ulang/' . $data->id_siswa) ?>"
                                        enctype="multipart/form-data">

                                        <input name="tanggal_" class="form-control" value="<?php echo date('Y/m/d'); ?>"
                                            hidden>
                                        <input name="id_soal" type="text" class="form-control"
                                            value="<?php echo $data->id_soal; ?>" hidden>

                                        <input name="soal_" type="text" class="form-control"
                                            value="<?php echo $data->soal_; ?>" required hidden>
                                        <input name="id_siswa" type="text" class="form-control"
                                            value="<?php echo $user['id_usr']; ?>" hidden>

                                        <input name="nama_" type="text" class="form-control"
                                            value="<?php echo $user['nama_usr']; ?>" hidden>


                                        <input name="tingkat_sku" type="text" class="form-control" value="bantara"
                                            hidden>

                                        <div class=" form-group row">
                                            <label class="col-sm-3 col-form-label">Soal</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control"
                                                    readonly><?php echo $data->soal_; ?></textarea>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label class="col-sm-3 col-form-label">Catatan Pembina</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control"
                                                    readonly><?php echo $data->catatan_; ?></textarea>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label class="col-sm-3 col-form-label">Jawaban</label>
                                            <div class="col-sm-9">
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
                                            <button type="submit" style="float:right; " class="btn btn-primary">
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
        <!-- End of Main Content -->
        <?php $this->load->view('user/tamu/_partials/footer'); ?>