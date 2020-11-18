<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Management Toko Komputer">
    <meta name="keywords" content="Aplikasi Management Toko Komputer">
    <meta name="author" content="Pradana Industries">
    <title> <?php echo $title ?> </title>

    <!-- BEGIN: CSS Assets-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/'); ?>img/icon/icon.png">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>midone-template/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login loading">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="#" class="-intro-x flex items-center pt-5">
                    <img alt="Logo" class="w-6" src="<?php echo base_url(); ?>assets/img/icon/<?= $website['logo']; ?>">
                    <span class="text-white text-lg ml-3"><span class="font-medium"><?= $website['nama_website']; ?></span> </span>
                </a>
                <div class="my-auto">
                    <img alt="Foto Login" class="-intro-x w-1/2 -mt-16" src="<?php echo base_url('assets/'); ?>img/auth/register.png">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Daftarkan Akun Anda
                        <br>
                        Untuk Memulai Session.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white"><?= $website['nama_website']; ?> Hadir Untuk Anda <br> Mudahnya Belanja</div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Register Akun
                    </h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center"><?= $website['nama_website']; ?></div>
                    <form method="post" action="<?php echo base_url('auth/register'); ?>" role="register">
                        <div class="intro-x mt-8">
                            <div class="form-group">
                                <input type="text" name="nama" required minlength="5" value="<?= set_value('nama'); ?>" placeholder="Nama Lengkap" class="form-control intro-x login__input input input--lg border border-gray-300 block">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="email" name="email_a" value="<?= set_value('email_a'); ?>" placeholder="Email Aktif" class="form-control intro-x login__input input input--lg border border-gray-300 block">
                                <?= form_error('email_a', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="number" name="phone" required minlength="5" value="<?= set_value('phone'); ?>" placeholder="No Telephone Aktif" class="form-control intro-x login__input input input--lg border border-gray-300 block">
                                <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="password" name="password" required minlength="5" value="<?= set_value('password'); ?>" placeholder="Password Anda" class="form-control intro-x login__input input input--lg border border-gray-300 block">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="password" name="password_konfirmasi" required minlength="5" placeholder="Password Konfirmasi Anda" class="form-control intro-x login__input input input--lg border border-gray-300 block">
                            </div>
                            <!-- <div class="flex flex-col sm:flex-row mt-2">
                                <div class="flex items-center text-gray-700 mr-2">
                                    <input type="radio" class="input border mr-2" id="horizontal-radio-chris-evans" name="id_role" value="1"> <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">Admin</label>
                                </div>
                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                    <input type="radio" class="input border mr-2" id="horizontal-radio-liam-neeson" name="id_role" value="2"> <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">Kasir</label>
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="intro-x flex items-center text-gray-700 mt-4 text-xs sm:text-sm">
                            <input type="checkbox" class="input border mr-2" id="remember-me">
                            <label class="cursor-pointer select-none" for="remember-me">I agree to the Rules</label>
                            <a class="text-theme-1 ml-1" href="#">Privacy Policy</a>.
                        </div> -->
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <div class="flex items-center mr-auto">
                                <input type="submit" name="submit" value="Register" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:text-left"></input>
                                <a class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 xl:text-right" href="<?php echo base_url('auth/login') ?>" style="margin-left: 10px;">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Register Form -->
        </div>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="<?php echo base_url('assets/'); ?>midone-template/js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>