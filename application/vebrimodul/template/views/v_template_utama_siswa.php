<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_siswa/header_siswa_utama');
?>

<!-- Main Content -->
<?php $this->load->view($namamodule . '/' . $namafileview); ?>
<!-- End Main Content -->

<?php $this->load->view('_siswa/footer_siswa_utama'); ?>