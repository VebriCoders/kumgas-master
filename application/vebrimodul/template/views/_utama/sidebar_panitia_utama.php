<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">Evoting Lite</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">Vote!</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Beranda</li>
            <!-- Menu home dashboard -->

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
            <li><a class="nav-link" href=""><i class="fas fa-book"></i> <span>Surat Suara</span></a></li>
            <li><a class="nav-link" href=""><i class="fas fa-user"></i> <span>Saksi</span></a></li>
            <li><a class="nav-link" href=""><i class="fas fa-user-friends"></i> <span>Kandidat</span></a></li>
            <li><a class="nav-link" href=""><i class="fas fa-users"></i> <span>Pemilih</span></a></li>

            <li class="menu-header">Hasil Pemilihan</li>
            <li><a class="nav-link" href=""><i class="fas fa-chart-bar"></i> <span>Hasil Pemilihan</span></a></li>


        </ul>

    </aside>
</div>