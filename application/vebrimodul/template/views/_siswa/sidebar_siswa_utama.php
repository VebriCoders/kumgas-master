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

            <li class="menu-header">Menu</li>

            <?php if ($this->uri->segment('1') == 'dashboard') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('dashboard'); ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('dashboard'); ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <?php } ?>


            <li class="menu-header">Pengumpulan Tugas</li>

            <?php if ($this->uri->segment('1') == 'kumpul_tugas') { ?>
                <li class="active"><a class="nav-link" href="<?php echo base_url('kumpul_tugas'); ?>"><i class="fas fa-book"></i> <span>Kumpul Tugas</span></a></li>
            <?php } else { ?>
                <li><a class="nav-link" href="<?php echo base_url('kumpul_tugas'); ?>"><i class="fas fa-book"></i> <span>Kumpul Tugas</span></a></li>
            <?php } ?>

        </ul>

    </aside>
</div>