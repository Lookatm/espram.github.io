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
                        foreach ($form_ as $data) : ?>
                        <form class="user" method="post" action="" enctype="multipart/form-data">

                            <div class="text-center">
                                <embed type="application/pdf"
                                    src="<?php echo base_url('assets/form/bantara/') . $data->unggah; ?>"
                                    class="img-thumbnail text-center"
                                    style="width:500px;height:300px; float:center;"></embed>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>

                </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <?php $this->load->view('admin/_partials/footer'); ?>