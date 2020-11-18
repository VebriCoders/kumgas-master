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
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>modules/jquery-selectric/selectric.css">

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
                                <h4>Register - <?= $website['nama_website']; ?></h4>
                            </div>

                            <div class="card-body">
                                <?= $this->session->flashdata('message_register_nisn_double'); ?>
                                <form method="POST" action="<?php echo base_url('register/register_add'); ?>" class="needs-validation" novalidate="">

                                    <div class="form-group">
                                        <label for="nisn_siswa">NISN</label>
                                        <input id="nisn_siswa" type="number" class="form-control" value="<?= set_value('nisn_siswa'); ?>" name="nisn_siswa" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Masukkan NISN Kamu
                                        </div>
                                        <?= form_error('nisn_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control selectric" id="id_kelas" name="id_kelas" required data-toggle="tooltip" data-placement="left" title="Kelas Siswa">
                                            <option>---- Pilih Kelas ----</option>
                                            <?php foreach ($joinKelas->result() as $tbl_kelas) {
                                                if ($tbl_kelas->id == set_value('id_kelas')) {
                                                    echo "<option selected = 'selected' value='" . $tbl_kelas->id . "'>" . $tbl_kelas->kelas . "</option>";
                                                } else {
                                                    echo "<option value='" . $tbl_kelas->id . "'>" . $tbl_kelas->kelas . "</option>";
                                                }
                                            } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Masukkan Kelas Kamu
                                        </div>
                                        <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_siswa">Nama Lengkap</label>
                                        <input id="nama_siswa" type="text" class="form-control" value="<?= set_value('nama_siswa'); ?>" name="nama_siswa" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Masukkan Nama Lengkap Kamu
                                        </div>
                                        <?= form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="eml_a">Email</label>
                                        <input id="eml_a" type="text" class="form-control" value="<?= set_value('eml_a'); ?>" name="eml_a" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Masukkan Email Kamu
                                        </div>
                                        <?= form_error('eml_a', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>


                                    <div class="form-group">
                                        <label for="no_telp_siswa">Nomor Hp / Wa</label>
                                        <input id="no_telp_siswa" type="number" class="form-control" value="62<?= set_value('no_telp_siswa'); ?>" name="no_telp_siswa" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Masukkan Nomor Hp / Wa Kamu
                                        </div>
                                        <?= form_error('no_telp_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>


                                <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">Sudah Punya Akun ?</div>
                                </div>
                                <div class="text-center mt-4 mb-3">
                                    <div class="col-12">
                                        <a href="<?php echo base_url('login') ?>" type=" submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
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
    <script src="<?php echo base_url('assets/') ?>modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>modules/jquery-selectric/jquery.selectric.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo base_url('assets/') ?>js/scripts.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/custom.js"></script>
</body>

</html>