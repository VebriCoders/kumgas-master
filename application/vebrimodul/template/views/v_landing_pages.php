<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $menu; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/icon/<?= $website['logo']; ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing_pages/') ?>css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing_pages/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing_pages/') ?>css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing_pages/') ?>css/bootstrap-dropdownhover.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing_pages/') ?>css/aos.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing_pages/') ?>css/lightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing_pages/') ?>css/style.css">
</head>

<body>

    <?php $this->load->view('_partial_landing_page/menu'); ?>

    <!-- Main Content -->
    <?php $this->load->view($namamodule . '/' . $namafileview); ?>
    <!-- End Main Content -->

    <?php $this->load->view('_partial_landing_page/footer'); ?>
    <?php $this->load->view('_partial_landing_page/js'); ?>

</body>

</html>