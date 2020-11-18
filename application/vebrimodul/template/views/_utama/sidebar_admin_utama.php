<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">KUMGAS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">KG</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Beranda</li>

            <?php if ($this->uri->segment('1') == 'beranda') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('beranda'); ?>"><i class="fas fa-home"></i> <span>Beranda</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('beranda'); ?>"><i class="fas fa-home"></i> <span>Beranda</span></a></li>
            <?php } ?>

            <?php if ($this->uri->segment('1') == 'profile') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('profile'); ?>"><i class="fas fa-user-circle"></i> <span>Profile</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('profile'); ?>"><i class="fas fa-user-circle"></i> <span>Profile</span></a></li>
            <?php } ?>


            <li class="menu-header">Master Data</li>

            <?php if ($this->uri->segment('1') == 'daftar_kelas') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('daftar_kelas'); ?>"><i class="fas fa-th-large"></i> <span>Daftar Kelas</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('daftar_kelas'); ?>"><i class="fas fa-th-large"></i> <span>Daftar Kelas</span></a></li>
            <?php } ?>

            <?php if ($this->uri->segment('1') == 'daftar_mapel') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('daftar_mapel'); ?>"><i class="fas fa-bookmark"></i> <span>Daftar Mapel</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('daftar_mapel'); ?>"><i class="fas fa-bookmark"></i> <span>Daftar Mapel</span></a></li>
            <?php } ?>

            <?php if ($this->uri->segment('1') == 'daftar_siswa') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('daftar_siswa'); ?>"><i class="fas fa-users"></i> <span>Daftar Siswa</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('daftar_siswa'); ?>"><i class="fas fa-users"></i> <span>Daftar Siswa</span></a></li>
            <?php } ?>


            <li class="menu-header">Tugas</li>

            <?php if ($this->uri->segment('1') == 'daftar_tugas') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('daftar_tugas'); ?>"><i class="fas fa-book"></i> <span>Daftar Tugas</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('daftar_tugas'); ?>"><i class="fas fa-book"></i> <span>Daftar Tugas</span></a></li>
            <?php } ?>



            <li class="menu-header">Setting</li>

            <?php if ($this->uri->segment('1') == 'user_management') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('user_management'); ?>"><i class="fas fa-users-cog"></i> <span>User Management</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('user_management'); ?>"><i class="fas fa-users-cog"></i> <span>User Management</span></a></li>
            <?php } ?>

            <?php if ($this->uri->segment('1') == 'setting') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('setting'); ?>"><i class="fas fa-cogs"></i> <span>Setting Aplikasi</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('setting'); ?>"><i class="fas fa-cogs"></i> <span>Setting Aplikasi</span></a></li>
            <?php } ?>


        </ul>

    </aside>
</div>