<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $menu; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>modules/fontawesome/css/all.min.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/icon/<?= $website['logo']; ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?php echo base_url(); ?>assets/img/icon/<?= $website['logo']; ?>" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login - <?= $website['nama_website']; ?></h4>
                            </div>

                            <div class="card-body">

                                <?= $this->session->flashdata('message_berhasil_membuat_akun'); ?>

                                <!-- Alert Login -->
                                <?php echo $this->session->flashdata('alert', true); ?>
                                <?= $this->session->flashdata('message'); ?>

                                <form method="post" action="<?php echo base_url('login/proses_login'); ?>" role="login">

                                    <div class="form-group">
                                        <label for="email_siswa">Email Siswa</label>
                                        <input id="email_siswa" type="email" class="form-control" name="email_siswa" tabindex="1" required placeholder="Masukkan Email" autofocus>
                                        <div class="invalid-feedback">
                                            Masukkan Email Siswa Kamu Untuk Login
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nisn_siswa">NISN</label>
                                        <input id="nisn_siswa" type="number" class="form-control" name="nisn_siswa" tabindex="1" placeholder="NISN Sebagai Password" required>
                                        <div class="invalid-feedback">
                                            Masukkan Password NISN Kamu Untuk Login
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-lg btn-block"></input>
                                    </div>
                                </form>


                                <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">Belum Punya Akun ?</div>
                                </div>
                                <div class="text-center mt-4 mb-3">
                                    <div class="col-12">
                                        <a href="<?php echo base_url('register') ?>" type=" submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="simple-footer">
                            <?= $cpyweb; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo base_url('assets/') ?>modules/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>modules/popper.js"></script>
    <script src="<?php echo base_url('assets/') ?>modules/tooltip.js"></script>
    <script src="<?php echo base_url('assets/') ?>modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>modules/moment.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo base_url('assets/') ?>js/scripts.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/custom.js"></script>
</body>

</html>