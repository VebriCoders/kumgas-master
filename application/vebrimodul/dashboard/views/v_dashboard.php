<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $menu; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><?= $menu; ?></div>
                <!-- <div class="breadcrumb-item"><a href="">Master Data</a></div> -->
                <!-- <div class="breadcrumb-item">Surat Suara</div> -->
            </div>
        </div>

        <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama_siswa') ?> (<?= $user_aktif['nm_kelas']; ?>) - <?php if ($this->session->userdata('id_role') == "1") { ?> Admin <?php } else { ?>Siswa <?php } ?>!</h2>
        <p class="section-lead">
            Selamat Datang Di <?= $website['nama_website']; ?>.
        </p>

        <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Info File Yang Di Kumpulkan</div>
                File Kamu Harus Berupa PDF Jika Tidak File Kamu Tidak Akan Terbaca Ke Server Kami. Maka Dari Itu Kamu Harus Merubah File Pengumpulan Menjadi PDF. Ubah Pdf Bisa Di <a target="_blank" href="https://topdf.com/id/">
                    <p>Klik To PDF</p>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-check-square"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tugas Selesai</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jmlSelesai ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tugas Yang Harus Di Kumpulkan</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jmlTugas ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        <?= $this->session->flashdata('selamat-datang'); ?>

        function selamat_datang() {
            iziToast.info({
                title: 'Selamat Datang Di ',
                message: '<?= $website['nama_website']; ?> - <?= $user_aktif['nama_siswa']; ?>',
                position: 'topCenter'
            });
        }
    });
</script>