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
                <div class="card-body">


                    <div class="card mb-3">

                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="toolbar">
                                <a href="#" class=" btn btn-success fas fa-calendar " role="button" data-toggle="modal"
                                    data-target="#add-jadwal"><strong>Tambah Jadwal</strong></a>
                            </div>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered text-ivory" id="table-id" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th class="text-center">Materi</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($data_ as $data) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>

                                            <td>
                                                <?php echo $data->materi_;
                                                    ?>
                                            </td>
                                            <td>
                                                <?php echo $data->tanggal_ ?>
                                            </td>
                                            <td>
                                                <?php if ($data->status == '0') {
                                                        echo "Tidak aktif";
                                                    } elseif ($data->status == '1') {
                                                        echo "Aktif";
                                                    }  ?>
                                            </td>
                                            <td>
                                                <?php echo $data->keterangan_ ?>
                                            </td>
                                            <td class="text-center">

                                                <a href="#" class="tombol-edit btn btn-primary btn-sm col-md-4 mb-2"
                                                    data-toggle="modal"
                                                    data-target="#edit<?php echo $data->id_jadwal ?>"><i
                                                        class="fas fa-edit"></i></a>

                                                <a href="" class="tombol-hapus btn btn-danger btn-sm col-md-4 mb-2"
                                                    data-id="<?php echo $data->id_jadwal ?>" data-toggle="modal"
                                                    data-target="#delete<?php echo $data->id_jadwal ?>"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>

                                            <div class="modal fade" id="delete<?php echo $data->id_jadwal ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus Data
                                                                Anggota
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Anda yakin ingin menghapus jadwal
                                                                materi <?= $data->materi_ ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <a href="<?= site_url('admin/dashboard_adm/hapus_jadwal/' . $data->id_jadwal) ?>"
                                                                class="btn btn-danger" role="button"
                                                                onclick="deleteConfirm(this)">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="add-jadwal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Jadwal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body">
                                        <form class="user" method="post"
                                            action="<?php echo site_url('admin/dashboard_adm/tambah_jadwal'); ?>"
                                            enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Materi</label>
                                                <div class="col-sm-8">
                                                    <textarea name="materi_" type="text"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="col-sm-8">
                                                    <input name="tanggal_" type="date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <select name="status" class="form-control">
                                                        <option></option>
                                                        <option value="0">Tidak Aktif</option>
                                                        <option value="1">Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Keterangan</label>
                                                <div class="col-sm-8">
                                                    <textarea name="keterangan_" type="text"
                                                        class="form-control"></textarea>
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

                    <!-- Modal -->
                    <?php
                    foreach ($data_ as $data) : ?>
                    <div class="modal fade" id="edit<?php echo $data->id_jadwal ?>" tabindex="-1" role="dialog"
                        aria-labelledby="updateJadwal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="updateJadwal">Edit Jadwal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body">
                                        <form class="user" method="post"
                                            action="<?php echo site_url('admin/dashboard_adm/ubah_jadwal/' . $data->id_jadwal); ?>"
                                            enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Materi</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" type="textarea" name="materi_"
                                                        placeholder="Materi"><?php echo $data->materi_; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="col-sm-8">
                                                    <input name="tanggal_" type="date" class="form-control"
                                                        value="<?php echo $data->tanggal_; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <select name="status" class="form-control">
                                                        <option></option>
                                                        <option value="0">Tidak Aktif</option>
                                                        <option value="1">Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Keterangan</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" type="textarea" name="keterangan_"
                                                        placeholder="keterangan"><?php echo $data->keterangan_; ?></textarea>
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
                    <?php endforeach; ?>

                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('admin/_partials/footer'); ?>