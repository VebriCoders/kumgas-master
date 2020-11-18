<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_utama/header_admin_utama');
?>

<!-- Main Content -->
<?php $this->load->view($namamodule . '/' . $namafileview); ?>
<!-- End Main Content -->

<?php $this->load->view('_utama/footer_admin_utama'); ?>