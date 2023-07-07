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
                <div class="card-body">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <strong><?php echo strip_tags(validation_errors()); ?></strong>
                        <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i
                                class="fas fa-times"></i></a>
                    </div>
                    <?php } ?>

                    <div class="text-center">
                        <img class="profile-user-img img-fluid rounded-circle"
                            src="<?php echo base_url('assets/img/profil/' . $user['image_']); ?>"
                            alt="User profile picture" style="width:120px;height:120px;">

                    </div>

                    <br>
                    <div class=" col mb-4">
                        <div class="card h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="row">
                                            <div
                                                class="col-md-10 text-xs font-weight-bold text-ivory text-uppercase mb-1">
                                                <h6><strong>DATA DIRI</strong></h6>
                                            </div>
                                            <div class="col-md-2 text-xs font-weight-bold text-success mb-1">
                                                <a class=" btn btn-primary btn-sm btn-block" data-toggle="modal"
                                                    data-target="#ubah-data"><b>Ubah
                                                        Data Diri</b>
                                                </a>
                                            </div>
                                        </div>

                                        <div class=" h5 mb-0 font-weight-bold text-gray-800">
                                            <div class="alert alert-ivory" role="alert">
                                                <p><small>
                                                        <b>NIM/NIS</b>
                                                        <br>
                                                        <a><?php echo $user['id_usr']; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Username</b>
                                                        <br>
                                                        <a><?php echo $user['username_']; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Nama Lengkap</b>
                                                        <br>
                                                        <a><?php echo $user['nama_usr']; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Jenis Kelamin</b>
                                                        <br>
                                                        <a><?php echo $user['jk_']; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Agama</b>
                                                        <br>
                                                        <a><?php echo $user['agama_']; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Tempat Lahir</b>
                                                        <br>
                                                        <a><?php echo $user['tempat_lhr']; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Tanggal Lahir</b>
                                                        <br>
                                                        <a><?php echo $user['tgl_lhr']; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Alamat</b>
                                                        <br>
                                                        <a><?php echo $user['alamat_usr']; ?></a>
                                                    </small>
                                                </p>
                                                <p><small>
                                                        <b>Email</b>
                                                        <br>
                                                        <a><?php echo $user['email_']; ?></a>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                        <br>

                                        <!-- Modal Ubah data diri-->
                                        <div class="modal fade" id="ubah-data">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Data Diri</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="box-body">

                                                            <?php echo form_open_multipart('user/dashboard_usr/update_profilBantara/' . $user['id_usr']); ?>

                                                            <div>
                                                                <label for="nama_usr">Nama Lengkap</label>

                                                                <input class="form-control" type="text" name="nama_usr"
                                                                    placeholder="Nama Lengkap"
                                                                    value="<?php echo $user['nama_usr']; ?>">
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label class="col-sm col-form-label">Jenis
                                                                    Kelamin</label>
                                                                <div class="col-sm-10">
                                                                    <label class="radio-inline">
                                                                        <input required type="radio" name="jk_"
                                                                            id="inlineRadio1" value="laki-laki"
                                                                            <?php echo ($user['jk_'] == 'laki-laki' ? 'checked' : ''); ?>>
                                                                        Laki-laki
                                                                    </label>
                                                                    <br>
                                                                    <label class="radio-inline">
                                                                        <input required type="radio" name="jk_"
                                                                            id="inlineRadio2" value="perempuan"
                                                                            <?php echo ($user['jk_'] == 'perempuan' ? 'checked' : ''); ?>>
                                                                        Perempuan
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label for="agama_">Agama</label>
                                                                <input class="form-control" type="text" name="agama_"
                                                                    placeholder="Agama"
                                                                    value="<?php echo $user['agama_']; ?>">
                                                            </div>
                                                            <br>
                                                            <div>
                                                                <label for="tempat_lhr">Tempat Lahir</label>
                                                                <input class="form-control" type="text"
                                                                    name="tempat_lhr" placeholder="Tempat Lahir"
                                                                    value="<?php echo $user['tempat_lhr']; ?>">
                                                            </div>
                                                            <br>
                                                            <div>
                                                                <label for="tgl_lhr">Tanggal Lahir</label>
                                                                <input class="form-control" type="date" name="tgl_lhr"
                                                                    placeholder="Tanggal Lahir"
                                                                    value="<?php echo $user['tgl_lhr']; ?>">
                                                            </div>
                                                            <br>
                                                            <div>
                                                                <label for="alamat_usr">Alamat</label>
                                                                <input class="form-control" type="text"
                                                                    name="alamat_usr" placeholder="Alamat"
                                                                    value="<?php echo $user['alamat_usr']; ?>">
                                                            </div>
                                                            <br>
                                                            <div>
                                                                <label for="email_">Email</label>
                                                                <input class="form-control" type="text" name="email_"
                                                                    placeholder="Email"
                                                                    value="<?php echo $user['email_']; ?>">
                                                            </div>
                                                            <br>

                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <img src="<?php echo base_url('assets/img/profil/') . $user['image_']; ?>"
                                                                                class="img-thumbnail">
                                                                        </div>

                                                                        <div class="col-sm-9">
                                                                            <div class="form-group">
                                                                                <label>Upload
                                                                                    Photo</label>
                                                                                <input type="file"
                                                                                    class="form-control-file"
                                                                                    name="image_">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <button type="submit"
                                                                    class="btn btn-primary float-right"
                                                                    name="btn">Update</button>
                                                                <button type="button"
                                                                    class="btn btn-default float-right ml-1"
                                                                    data-dismiss="modal">Tutup</button>

                                                            </div>
                                                            <?php echo form_close(); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Ubah data diri-->

                                        <div class="row">
                                            <div
                                                class="col-md-9 text-xs font-weight-bold text-ivory text-uppercase mb-1">
                                                <h6><strong>Security & Password</strong></h6>
                                            </div>
                                            <div class="col-md-3 text-xs font-weight-bold text-success mb-1 ">
                                                <a class=" btn btn-primary btn-sm btn-block" data-toggle="modal"
                                                    data-target="#ubah-password"><b>Ubah Password</b>
                                                </a>
                                            </div>
                                        </div>

                                        <div class=" h5 mb-0 font-weight-bold text-gray-800">
                                            <div class="alert alert-ivory" role="alert">

                                                <p><small>
                                                        <b>Password</b>
                                                        <br>
                                                        <a>**********</a>
                                                    </small>
                                                </p>

                                            </div>
                                        </div>

                                        <!-- Modal Ubah password-->
                                        <div class="modal fade" id="ubah-password">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Password</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="<?php echo site_url('user/dashboard_usr/ubah_passwordBantara'); ?>"
                                                            method="post">
                                                            <div class="form-group">
                                                                <label for="current_password">Password Lama</label>
                                                                <input type="password" class="form-control"
                                                                    id="current_password" name="current_password"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="new_password1">Password Baru</label>
                                                                <input type="password" class="form-control"
                                                                    id="new_password1" name="new_password1" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="new_password2">Ulang Password Baru</label>
                                                                <input type="password" class="form-control"
                                                                    id="new_password2" name="new_password2"
                                                                    placeholder="Ketik ulang password baru" required>
                                                            </div>
                                                            <button type="button"
                                                                class="btn btn-default float-right ml-1"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit"
                                                                class="btn btn-primary float-right">Simpan
                                                                Perubahan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End ubah password-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php $this->load->view('user/bantara/_partials/footer'); ?>