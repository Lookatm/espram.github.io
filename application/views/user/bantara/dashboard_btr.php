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
                <div class="alert alert-ivory" role="alert">
                    <h6>Selamat Datang, <strong><?php echo $user['nama_usr']; ?></strong></h6>
                </div>
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
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="text-xs text-center font-weight-bold text-ivory text-uppercase mb-1">
                                    <h6 class="Card-title"><strong><?= $user['nama_usr']; ?></strong></h6>
                                </div>
                                <p class="card-text text-center">Status anda adalah <b>"<?php if ($user['level_'] == '2') {
                                                                                            echo "Tamu Ambalan";
                                                                                        } elseif ($user['level_'] == '3') {
                                                                                            echo "Penegak Bantara";
                                                                                        } elseif ($user['level_'] == '4') {
                                                                                            echo "Penegak Laksana";
                                                                                        } ?>"</b></p>
                                <p class="Card-text text-center">
                                    <small class="text-muted ">Menjadi Penegak Bantara sejak
                                        <?= $user['waktu_tempuh']; ?></small>
                                </p>

                            </div>
                        </div>
                    </div>
                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-8 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="text-xs text-center font-weight-bold text-ivory text-uppercase mb-1">
                                    <h6 class="Card-title"><strong>Jadwal Latihan</strong></h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-ivory" id="table-id"
                                        style="font-size:13px;">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">No</th>
                                                <th class="text-center">Materi</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($jadwal as $data) : ?>
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
                                                    <?php echo $data->keterangan_ ?>
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

                <div class="row">
                    <div class="col-xl-6  col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 alert-ivory">
                            <div class="card-body">
                                <div class="text-center">
                                    <img img src="<?php echo base_url('assets/img/pramuka1.png'); ?>" width="15%">
                                </div>
                                <br>
                                <div class="text-xs text-center font-weight-bold text-ivory text-uppercase mb-1">
                                    <h6 class="Card-title"><strong>TRI SATYA</strong></h6>
                                </div>
                                <p class="card-text text-center">
                                    Demi kehormatanku aku berjanji akan bersungguh-sungguh:<br>
                                    - Menjalankan kewajibanku terhadap Tuhan, Negara Kesatuan Republik Indonesia
                                    dan
                                    mengamalkan Pancasila.<br>
                                    - Menolong sesama hidup dan mempersiapkan diri membangun masyarakat<br>
                                    - Menepati dasa Dharma
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 alert-ivory">
                            <div class="card-body">
                                <div class="text-center">
                                    <img img src="<?php echo base_url('assets/img/pramuka1.png'); ?>" width="15%">
                                </div>
                                <br>
                                <div class="text-xs text-center font-weight-bold text-ivory text-uppercase mb-1">
                                    <h6 class="Card-title"><strong>Dasa Dharma</strong></h6>
                                </div>
                                <p class="card-text text-center">
                                    Pramuka itu:<br>
                                    1. Takwa kepada Tuhan Yang Maha Esa <br>
                                    2. Cinta alam dan kasih sayang sesama manusia <br>
                                    3. Patriot yang sopan dan kesatria <br>
                                    4. Patuh dan suka bermusyawarah <br>
                                    5. Rela menolong dan tabah <br>
                                    6. Rajin terampil dan gembira <br>
                                    7. Hemat cermat dan bersahaja <br>
                                    8. Disiplin, berani, dan setia <br>
                                    9. Bertanggung jawab dan dapat dipercaya <br>
                                    10. Suci dalam pikiran, perkataan dan perbuatan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- /.container-fluid -->

        </div>

        <!-- End of Main Content -->
        <?php $this->load->view('user/bantara/_partials/footer'); ?>