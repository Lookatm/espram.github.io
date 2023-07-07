<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <br>
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/img/pramuka1.png'); ?>" width="20%">
                                    <br>
                                    <br>
                                    <h1 class="h4 text-gray-900 mb-4"><strong>Selamat Datang di E-SKU Pramuka!</strong>
                                    </h1>
                                </div>

                                <form class="user" action="<?php echo site_url('auth/login_user'); ?>" method="post">

                                    <?php echo $this->session->flashdata('msg'); ?>
                                    <div class="form-group">
                                        <input type="text" name="username_" class="form-control form-control-user"
                                            id="username_" placeholder="Username" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="pass_"
                                            name="pass_" placeholder="Password" required>
                                    </div>

                                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                </form>



                                <hr>


                                <div class="text-center">
                                    <a class="small" href="<?= site_url('auth'); ?>">Masuk sebagai
                                        <b>ADMIN</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>