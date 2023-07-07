<!DOCTYPE html>
<html lang="en">

<?php
$this->load->view('admin/_partials/header'); ?>

<script src="<?php echo base_url('assets/chart.js/Chart.js'); ?>">

</script>

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
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> <a
                                                    class="collapse-item"
                                                    href="<?= site_url('admin/dt_user/dataLk'); ?>">
                                                    Anggota laki-laki</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $jmlLk; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> <a
                                                    class="collapse-item"
                                                    href="<?= site_url('admin/dt_user/dataTamu'); ?>">
                                                    Tamu Ambalan</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $jmlTamu; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> <a
                                                    class="collapse-item"
                                                    href="<?= site_url('admin/dt_user/dataBantara'); ?>">
                                                    Penegak Bantara</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $jmlBantara; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> <a
                                                    class="collapse-item"
                                                    href="<?= site_url('admin/dt_user/dataLaksana'); ?>">
                                                    Penegak Laksana</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $jmlLaksana; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> <a
                                                    class="collapse-item"
                                                    href="<?= site_url('admin/dt_user/dataPr'); ?>">
                                                    Anggota Perempuan</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $jmlPr; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card shadow col mb-4">

                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="toolbar">
                                <a href="#" class=" btn btn-success fas fa-user-plus" role="button" data-toggle="modal"
                                    data-target="#add-user"><i class="fas fa-user-plus">Tambah
                                        Data</i></a>
                            </div>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered text-ivory" id="table-id" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 5%;">No</th>

                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Username</th>

                                            <th class="text-center">Golongan</th>
                                            <th class="text-center">Tahun Ajaran</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center" style="width: 25%;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($data_ as $data) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>

                                            <td>
                                                <?php echo $data->nama_usr;
                                                    ?>
                                            </td>
                                            <td>
                                                <?php echo $data->username_ ?>
                                            </td>


                                            <td class="text-center">

                                                <a href="<?= site_url('admin/dt_user/lihat_form/' . $data->id_usr) ?>"
                                                    class="tombol-form btn btn-warning btn-sm" role="button"
                                                    data-toggle=""
                                                    data-target=""><?php if ($data->level_ == '2') {
                                                                                                                                                                                                                        echo "Tamu Ambalan";
                                                                                                                                                                                                                    } elseif ($data->level_ == '3') {
                                                                                                                                                                                                                        echo "Penegak Bantara";
                                                                                                                                                                                                                    } elseif ($data->level_ == '4') {
                                                                                                                                                                                                                        echo "Penegak Laksana";
                                                                                                                                                                                                                    } ?></a>
                                            </td>
                                            <td>
                                                <?php echo $data->tahun_ajaran ?>
                                            </td>
                                            <td>
                                                <?php if ($data->is_active == '0') {
                                                        echo "Tidak Aktif";
                                                    } elseif ($data->is_active == '1') {
                                                        echo "Aktif";
                                                    } ?>
                                            </td>
                                            <td class="text-center">
                                                <!-- <a href="<?= site_url('admin/dt_user/detail_usr/' . $data->id_usr) ?>"
                                                    class="tombol-edit btn btn-secondary btn-sm"
                                                    data-id="<?php echo $data->id_usr ?>"><i
                                                        class="fas fa-info-circle"></i></a> -->

                                                <a href="#" class="tombol-detail btn btn-secondary btn-sm col-md-2 mb-2"
                                                    role="button" data-toggle="modal"
                                                    data-target="#detail<?php echo $data->id_usr ?>"><i
                                                        class="fas fa-info-circle"></i>
                                                </a>
                                                <!-- <a href="<?= site_url('admin/dt_user/edit_usr/' . $data->id_usr) ?>"
                                                    class="tombol-edit btn btn-primary btn-sm"
                                                    data-id="<?php echo $data->id_usr ?>"><i
                                                        class="fas fa-edit"></i></a> -->

                                                <a href="#" class="tombol-edit btn btn-primary btn-sm col-md-2 mb-2"
                                                    role="button" data-toggle="modal"
                                                    data-target="#edit<?php echo $data->id_usr ?>"><i
                                                        class="fas fa-edit"></i></a>


                                                <a href="" class="tombol-hapus btn btn-danger btn-sm col-md-2 mb-2"
                                                    role="button" data-id="<?php echo $data->id_usr ?>"
                                                    data-toggle="modal"
                                                    data-target="#delete<?php echo $data->id_usr ?>"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>

                                            <div class="modal fade" id="delete<?php echo $data->id_usr ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus
                                                                Data
                                                                Anggota
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Anda yakin ingin menghapus <?= $data->nama_usr ?>?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <a href="<?= site_url('admin/dt_user/hapus_/' . $data->id_usr) ?>"
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
                                            <input name="date_created" class="form-control"
                                                value="<?php echo date('Y/m/d'); ?>" hidden>
                                            <input name="waktu_tempuh" class="form-control"
                                                value="<?php echo date('Y/m/d'); ?>" hidden>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">NIM/NIS</label>
                                                <div class="col-sm-8">
                                                    <input name="id_usr" type="text" class="form-control">
                                                </div>
                                            </div>
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
                                                    <input name="pass_" type="password" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Golongan*</label>
                                                <div class="col-sm-8">
                                                    <select name="level_" class="form-control" required>
                                                        <option></option>
                                                        <option value="2">Tamu Ambalan</option>
                                                        <option value="3">Penegak Bantara</option>
                                                        <option value="4">Penegak Laksana</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Tahun Ajaran*</label>
                                                <div class="col-sm-8">
                                                    <input name="tahun_ajaran" type="text" class="form-control"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 col-form-label">Status Anggota*</label>
                                                <div class="col-sm-8" required>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_active" id="inlineRadio1"
                                                            value="0">
                                                        Tidak Aktif
                                                    </label>
                                                    <br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="is_active" id="inlineRadio2"
                                                            value="1">
                                                        Aktif
                                                    </label>
                                                </div>
                                            </div>

                                            <div>
                                                <label style="color:red;">*wajib diisi</label>
                                                <label style="color:red;">*Username tidak boleh sama</label>
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
                    <div class="modal fade" id="detail<?php echo $data->id_usr ?>">
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
                                                    src="<?php echo base_url('assets/img/profil/' . $data->image_); ?>"
                                                    alt="User profile picture" style="width:120px;height:120px;">
                                            </div>
                                            <br>

                                            <div class=" h5 mb-0 font-weight-bold text-gray-800 text-center">
                                                <div class="alert alert-ivory" role="alert">
                                                    <p><small>
                                                            <b>Nama Lengkap</b>
                                                            <br>
                                                            <a><?php echo $data->nama_usr; ?></a>
                                                        </small>
                                                    </p>
                                                    <p><small>
                                                            <b>Username</b>
                                                            <br>
                                                            <a><?php echo $data->username_; ?></a>
                                                        </small>
                                                    </p>
                                                    <p><small>
                                                            <b>Jenis Kelamin</b>
                                                            <br>
                                                            <a><?php echo $data->jk_; ?></a>
                                                        </small>
                                                    </p>
                                                    <p><small>
                                                            <b>Tempat Lahir</b>
                                                            <br>
                                                            <a><?php echo $data->tempat_lhr; ?></a>
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
                                                            <b>Alamat</b>
                                                            <br>
                                                            <a><?php echo $data->alamat_usr; ?></a>
                                                        </small>
                                                    </p>
                                                    <p><small>
                                                            <b>Email</b>
                                                            <br>
                                                            <a><?php echo $data->email_; ?></a>
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
                    <div class="modal fade" id="edit<?php echo $data->id_usr ?>">
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
                                            action="<?php echo site_url(); ?>/admin/dt_user/update_usr/<?php echo $data->id_usr ?>"
                                            enctype="multipart/form-data">
                                            <input name="waktu_tempuh" class="form-control"
                                                value="<?php echo date('Y/m/d'); ?>" hidden>

                                            <div class="form-group">
                                                <label class="col-sm-4 col-form-label"><strong>Golongan</strong>
                                                </label>

                                                <div class="col-sm-8" required>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="level_" id="inlineRadio1" value="2"
                                                            <?php echo ($data->level_ == '2' ? 'checked' : ''); ?>>
                                                        Tamu Ambalan
                                                    </label>
                                                    <br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="level_" id="inlineRadio2" value="3"
                                                            <?php echo ($data->level_ == '3' ? 'checked' : ''); ?>>
                                                        Penegak Bantara
                                                    </label>
                                                    <br>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="level_" id="inlineRadio2" value="4"
                                                            <?php echo ($data->level_ == '4' ? 'checked' : ''); ?>>
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
            </div>


        </div>
        <!-- /.container-fluid -->

        <!-- End of Main Content -->
        <?php $this->load->view('admin/_partials/footer'); ?>