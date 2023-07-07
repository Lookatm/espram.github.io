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

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div class="toolbar">
                            <a href="#" class=" btn btn-success fas fa-user-plus" role="button" data-toggle="modal"
                                data-target="#add-user"><i class="fas fa-user-plus">Tambah Data</i></a>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered text-ivory" id="table-id" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>

                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Username</th>

                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data_ as $data) : ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $data->nama_adm; ?></td>
                                        <td><?php echo $data->username_adm; ?></td>

                                        <td><?php echo $data->jabatan_; ?></td>
                                        <td>
                                            <?php if ($data->is_active == '0') {
                                                    echo "Tidak Aktif";
                                                } elseif ($data->is_active == '1') {
                                                    echo "Aktif";
                                                } ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="tombol-detail btn btn-secondary btn-sm col-md-2 mb-2"
                                                role="button" data-toggle="modal"
                                                data-target="#detail<?php echo $data->id_adm ?>"><i
                                                    class="fas fa-info-circle"></i>
                                            </a>

                                            <a href="#" class="tombol-edit btn btn-primary btn-sm col-md-2 mb-2"
                                                role="button" data-toggle="modal"
                                                data-target="#edit<?php echo $data->id_adm ?>"><i
                                                    class="fas fa-edit"></i></a>

                                            <a href="" class="tombol-hapus btn btn-danger btn-sm col-md-2 mb-2"
                                                data-id="<?php echo $data->id_adm ?>" data-toggle="modal"
                                                data-target="#delete<?php echo $data->id_adm ?>"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>

                                        <div class="modal fade" id="delete<?php echo $data->id_adm ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
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
                                                        <p>Anda yakin ingin menghapus <?= $data->nama_adm ?>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="<?= site_url('admin/dt_adm/hapus_adm/' . $data->id_adm) ?>"
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
                <div class="modal fade" id="add-user">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Admin</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <form class="user" method="post"
                                        action="<?php echo site_url('admin/dt_adm/tambah_adm'); ?>"
                                        enctype="multipart/form-data">
                                        <input name="date_created" class="form-control"
                                            value="<?php echo date('Y/m/d'); ?>" hidden>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><strong>Nama Lengkap</strong>
                                            </label>
                                            <div class="col-sm-8">
                                                <input name="nama_adm" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><strong>Username*</strong> </label>
                                            <div class="col-sm-8">
                                                <input name="username_adm" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><strong>Password*</strong> </label>
                                            <div class="col-sm-8">
                                                <input name="pass_adm" type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <input type="text" name="level_adm" id="inlineRadio1" value="1" hidden>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><strong>Jabatan</strong>
                                            </label>
                                            <div class="col-sm-8">
                                                <input name="jabatan_" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label"><strong>Status Admin*</strong>
                                            </label>
                                            <div class="col-sm-8" required>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_active" id="inlineRadio1" value="0">
                                                    Tidak Aktif
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_active" id="inlineRadio2" value="1">
                                                    Aktif
                                                </label>
                                            </div>
                                        </div>

                                        <div>
                                            <label style="color: red;">*wajib diisi</label>
                                        </div>

                                        <div class="m odal-footer">
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

                <?php
                foreach ($data_ as $data) : ?>
                <div class="modal fade" id="detail<?php echo $data->id_adm ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Detail Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <form class="user" method="post" action="" enctype="multipart/form-data">

                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid rounded-circle "
                                                src="<?php echo base_url('assets/img/profil/' . $data->image); ?>"
                                                alt="User profile picture" style="width:120px;height:120px;">
                                        </div>
                                        <br>

                                        <div class=" h5 mb-0 font-weight-bold text-gray-800 text-center">
                                            <div class="alert alert-ivory" role="alert">
                                                <p><small>
                                                        <b>Nama Lengkap</b>
                                                        <br>
                                                        <a><?php echo $data->nama_adm; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Username</b>
                                                        <br>
                                                        <a><?php echo $data->username_adm; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Jenis Kelamin</b>
                                                        <br>
                                                        <a><?php echo $data->jk; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Tempat Lahir</b>
                                                        <br>
                                                        <a><?php echo $data->tpt_lhr; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Tanggal Lahir</b>
                                                        <br>
                                                        <a><?php echo $data->tgl_lhr; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Agama</b>
                                                        <br>
                                                        <a><?php echo $data->agama_; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Jabatan</b>
                                                        <br>
                                                        <a><?php echo $data->jabatan_; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Alamat</b>
                                                        <br>
                                                        <a><?php echo $data->alamat_adm; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Email</b>
                                                        <br>
                                                        <a><?php echo $data->email_adm; ?></a>
                                                    </small>
                                                </p>
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

                <!-- Modal -->
                <?php
                foreach ($data_ as $data) : ?>
                <div class="modal fade" id="edit<?php echo $data->id_adm ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <form class="user" method="post"
                                        action="<?php echo site_url(); ?>/admin/dt_adm/update_adm/<?php echo $data->id_adm ?>"
                                        enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="col-sm-4 col-form-label"><strong>Status Admin</strong>
                                            </label>
                                            <div class="col-sm-8" required>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_active" id="inlineRadio1" value="0"
                                                        <?php echo ($data->is_active == '0' ? 'checked' : ''); ?>>
                                                    Tidak Aktif
                                                </label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="is_active" id="inlineRadio2" value="1"
                                                        <?php echo ($data->is_active == '1' ? 'checked' : ''); ?>>
                                                    Aktif
                                                </label>
                                            </div>
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