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
                                        <th class="text-center">Soal SKU</th>
                                        <th class="text-center">Tanggal Pengerjaan</th>
                                        <th class="text-center" style="width: 15%;">Opsi</th>
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
                                            <?php echo $data['tanggal_'];
                                                ?>
                                        </td>

                                        <td class="text-center">

                                            <!-- <a href="<?= site_url('admin/penilaian_sku/viewNilaibtr/' . $data['id_tempuh']) ?>"
                                            class="tombol-edit btn btn-primary btn-sm"
                                            data-id="<?php echo $data['id_tempuh'] ?>">Detail</a> -->
                                            <a href="#" class="tombol-detail btn btn-primary btn-sm" role="button"
                                                data-toggle="modal"
                                                data-target="#detail<?php echo $data['id_tempuh'] ?>">Penilaian
                                            </a>
                                        </td>


                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal -->
                    <?php
                    foreach ($data_ as $data) : ?>
                    <div class="modal fade" id="detail<?php echo $data['id_tempuh'] ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Penilaian</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body">
                                        <form class="user" method="post"
                                            action="<?= site_url('admin/penilaian_sku/update_nilai/' . $data['id_tempuh']) ?>"
                                            enctype="multipart/form-data">

                                            <input name="tgl_nilai" class="form-control"
                                                value="<?php echo date('Y/m/d'); ?>" hidden>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">NIM/NIS</label>
                                                <div class="col-sm-12">
                                                    <input name="id_siswa" type="text" class="form-control"
                                                        value="<?php echo $data['id_siswa']; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" value="<?php echo $data['nama_']; ?>"
                                                        readonly>
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">Tugas</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control"
                                                        readonly><?php echo $data['soal_']; ?></textarea>

                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">Jawaban</label>
                                                <div class="col-sm-12">
                                                    <embed type="application/pdf"
                                                        src="<?php echo base_url('assets/jawaban/') . $data['jawaban_']; ?>"
                                                        class="img-thumbnail text-center"
                                                        style="width:500px;height:300px; float:center;"></embed>
                                                    <textarea class="form-control"
                                                        readonly><?php echo $data['jawaban_']; ?></textarea>

                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">Nilai Sikap</label>
                                                <div class="col-sm-8">
                                                    <input name="nilai1_" type="text" class="form-control"
                                                        value="<?php echo $data['nilai1_']; ?>" min="0" max="100">
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">Nilai Pengetahuan</label>
                                                <div class="col-sm-8">
                                                    <input name="nilai2_" type="text" class="form-control"
                                                        value="<?php echo $data['nilai2_']; ?>" min="0" max="100">
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">Nilai Keterampilan</label>
                                                <div class="col-sm-8">
                                                    <input name="nilai3_" type="text" class="form-control"
                                                        value="<?php echo $data['nilai3_']; ?>" min="0" max="100">
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">Nilai Akhir</label>
                                                <div class="col-sm-8">
                                                    <input name="nilai_akhir" type="text" class="form-control"
                                                        value="<?php echo $data['nilai_akhir']; ?>" min="0" max="100">
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <select name="hasil_" class="form-control">
                                                        <option></option>
                                                        <option value="lulus">Lulus</option>
                                                        <option value="tidak lulus">Tidak Lulus</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class=" form-group row">
                                                <label class="col-sm-4 col-form-label">Catatan</label>
                                                <div class="col-sm-8">
                                                    <textarea name="catatan_" type="text"
                                                        class="form-control"><?php echo $data['catatan_']; ?></textarea>
                                                </div>
                                            </div>


                                            <div class="modal-footer">
                                                <p>n.b. Skala Penilaian: 0 - 100</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" style="float:right; " class="btn btn-success">
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
                    <?php endforeach; ?>

                </div>
                <!-- /.container-fluid -->
            </div>

        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('admin/_partials/footer'); ?>