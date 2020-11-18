<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Beranda</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">Beranda</div>
                <!-- <div class="breadcrumb-item"><a href="">Master Data</a></div> -->
                <!-- <div class="breadcrumb-item">Surat Suara</div> -->
            </div>
        </div>

        <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama') ?> - <?php if ($this->session->userdata('id_role') == "1") { ?> Admin <?php } else { ?>Panitia <?php } ?>!</h2>
        <p class="section-lead">
            Selamat Datang Di <?= $website['nama_website']; ?>.
        </p>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-check-square"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kelas</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jmlKelas ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-arrow-alt-circle-down"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Mata Pelajaran</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jmlMapel ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-arrow-alt-circle-up"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Siswa</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $jmlSiswa ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-file-invoice-dollar"></i>
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

        <div class="row">


            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Aktifitas Pengumpulan Tugas (Soon)</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="http://localhost/stisla-ci/assets/img/avatar/avatar-1.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">20/10/2020 11:00</div>
                                    <div class="media-title">Vebri Pradana</div>
                                    <span class="text-small text-muted">Mengumpulkan Tugas PKK PROD (XII RPL D).</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="http://localhost/stisla-ci/assets/img/avatar/avatar-2.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">20/10/2020 10:45</div>
                                    <div class="media-title">Hafidh Febri</div>
                                    <span class="text-small text-muted">Mengumpulkan Tugas PKK PROD (XII RPL D).</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="http://localhost/stisla-ci/assets/img/avatar/avatar-3.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">20/10/2020 10:33</div>
                                    <div class="media-title">Maulana Nathan</div>
                                    <span class="text-small text-muted">Mengumpulkan Tugas PKK PROD (XII RPL D).</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="http://localhost/stisla-ci/assets/img/avatar/avatar-4.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">20/10/2020 09:00</div>
                                    <div class="media-title">David Wahid</div>
                                    <span class="text-small text-muted">Mengumpulkan Tugas MATEMATIKA (XII RPL D).</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="http://localhost/stisla-ci/assets/img/avatar/avatar-5.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">20/10/2020 08:59</div>
                                    <div class="media-title">Reyhan Burhan</div>
                                    <span class="text-small text-muted">Mengumpulkan Tugas MATEMATIKA (XII RPL D).</span>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center pt-1 pb-1">
                            <a href="#" class="btn btn-primary btn-lg btn-round">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Tugas Masuk (Soon)</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-4">
                            <div class="text-small float-right font-weight-bold text-muted">100</div>
                            <div class="font-weight-bold mb-1">PKK PROD (XII RPL D)</div>
                            <div class="progress" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="text-small float-right font-weight-bold text-muted">60</div>
                            <div class="font-weight-bold mb-1">MATEMATIKA (XII RPL D)</div>
                            <div class="progress" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
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
                message: '<?= $website['nama_website']; ?>',
                position: 'topCenter'
            });
        }
    });
</script>