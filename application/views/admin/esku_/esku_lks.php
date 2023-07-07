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
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
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
                                        <th class="text-center" style="width: 30%;">Nama SKU</th>
                                        <th class="text-center" style="width: 30%;">Tugas</th>
                                        <th class="text-center" style="width: 10%;">Jenis</th>
                                        <th class="text-center" style="width: 10%;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data_ as $data) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $i++;
                                                ?>
                                        </td>
                                        <td>
                                            <?php echo $data->nama_sku;
                                                ?>
                                        </td>
                                        <td>
                                            <?php echo $data->tugas_ ?>
                                        </td>

                                        <td>
                                            <?php if ($data->jenis_sku == '1') {
                                                    echo "Poin Spiritual Islam";
                                                } elseif ($data->jenis_sku == '2') {
                                                    echo "Poin Spiritual Hindu";
                                                } elseif ($data->jenis_sku == '3') {
                                                    echo "Poin Spiritual Buddha";
                                                } elseif ($data->jenis_sku == '4') {
                                                    echo "Poin Spiritual Katolik";
                                                } elseif ($data->jenis_sku == '5') {
                                                    echo "Poin Spiritual Protestan";
                                                } elseif ($data->jenis_sku == '6') {
                                                    echo "Poin Umum";
                                                } elseif ($data->jenis_sku == '7') {
                                                    echo "Lainnya";
                                                } ?>
                                        </td>

                                        <td class="text-center">

                                            <a href="#" class="tombol-edit btn btn-primary btn-sm" role="button"
                                                data-toggle="modal" data-target="#edit<?php echo $data->id_sku ?>"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-sku">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah SKU</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <form class="user" method="post"
                                        action="<?php echo site_url('admin/esku_bantara/tambah_skub'); ?>"
                                        enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><strong>Poin SKU*</strong> </label>
                                            <div class="col-sm-8">
                                                <input name="nama_sku" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><strong>Tingkat SKU*</strong></label>
                                            <div class="col-sm-8" required>
                                                <label class="radio-inline">
                                                    <input type="radio" name="id_gol" id="inlineRadio1" value="2">
                                                    Tingkat Bantara
                                                </label>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><strong>Jenis SKU*</strong></label>
                                            <div class="col-sm-8" required>
                                                <label class="radio-inline">
                                                    <input type="radio" name="jenis_sku" id="inlineRadio1" value="1">
                                                    Poin Spiritual Islam
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="jenis_sku" id="inlineRadio2" value="2">
                                                    Poin Spiritual Hindu
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="jenis_sku" id="inlineRadio2" value="3">
                                                    Poin Spiritual Buddha
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="jenis_sku" id="inlineRadio2" value="4">
                                                    Poin Spiritual Katolik
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="jenis_sku" id="inlineRadio2" value="5">
                                                    Poin Spiritual Protestan
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="jenis_sku" id="inlineRadio2" value="6">
                                                    Poin Umum
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="jenis_sku" id="inlineRadio2" value="7">
                                                    Lainnya
                                                </label>
                                            </div>
                                        </div>

                                        <div>
                                            <label style="color: red;">*wajib diisi</label>
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

                <!-- Modal -->
                <?php
                foreach ($data_ as $data) : ?>
                <div class="modal fade" id="edit<?php echo $data->id_sku ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tugas SKU</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <form class="user" method="post"
                                        action="<?php echo site_url(); ?>/admin/esku_laksana/update_skul/<?php echo $data->id_sku ?>"
                                        enctype="multipart/form-data">

                                        <div>
                                            <label for="tugas_">Tugas SKU</label>
                                            <textarea class="form-control" type="textarea" name="tugas_"
                                                placeholder="Tugas SKU" rows="6"><?php echo $data->tugas_; ?></textarea>

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
                <?php endforeach; ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('admin/_partials/footer'); ?>