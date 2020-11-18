<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">

                <!-- Search Di hapus (di taruh vebri di dist controller) -->
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
                    </ul>
                </form>

                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo base_url() ?>assets/upload/foto_siswa/<?= $user_aktif['siswa_poto']; ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $user_aktif['nama_siswa']; ?> (<?= $user_aktif['nm_kelas']; ?>)</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
                            <div class="dropdown-title">Menu</div>
                            <a href="#" class="dropdown-item has-icon" data-toggle="modal" data-target="#exampleModal">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>


            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Siswa (<?= $user_aktif['nm_kelas']; ?>)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mt-sm-12">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card profile-widget">
                                        <div class="profile-widget-header">
                                            <img alt="image" src="<?php echo base_url() ?>assets/upload/foto_siswa/<?= $user_aktif['siswa_poto']; ?>" class="rounded-circle profile-widget-picture">
                                            <div class="profile-widget-items">
                                                <div class="profile-widget-item">
                                                    <div class="profile-widget-item-label">Di Buat</div>
                                                    <div class="profile-widget-item-value"><?= $user_aktif['siswa_akun']; ?></div>
                                                </div>
                                                <div class="profile-widget-item">
                                                    <div class="profile-widget-item-label">Terakhir Login</div>
                                                    <div class="profile-widget-item-value"><?= $user_aktif['last_login']; ?></div>
                                                </div>
                                                <div class="profile-widget-item">
                                                    <div class="profile-widget-item-label">Terakhir Logout</div>
                                                    <div class="profile-widget-item-value"><?= $user_aktif['last_logout']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-widget-description">
                                            <div class="profile-widget-name"><?= $user_aktif['nama_siswa']; ?> <div class="text-muted d-inline font-weight-normal">
                                                    <div class="slash"></div> <?= $user_aktif['nm_kelas']; ?>
                                                </div>
                                            </div>
                                            <p>
                                                NISN : <?= $user_aktif['nisn_siswa']; ?> <br>
                                                Email : <?= $user_aktif['email_siswa']; ?> <br>
                                                Nomor HP / WA : <?= $user_aktif['no_telp_siswa']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>