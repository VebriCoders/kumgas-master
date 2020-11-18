<div class="main-content">
    <section class="section">
        <div class="section-header">
            <?php
            $i = 1;
            foreach ($TampilData_Tugas_Aktif->result() as $data) { ?>
                <h1><?= $menu; ?> - <?php echo $data->nm_mapel ?>(<?php echo $data->nama_tugas ?>)</h1>
            <?php $i++;
            } ?>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><?= $menu; ?></div>
                <!-- <div class="breadcrumb-item"><a href="">Master Data</a></div> -->
                <!-- <div class="breadcrumb-item">Surat Suara</div> -->
            </div>
        </div>

        <?php
        $i = 1;
        foreach ($TampilData_Tugas_Aktif->result() as $data) { ?>
            <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama_siswa') ?> (<?= $user_aktif['nm_kelas']; ?>) - <?php if ($this->session->userdata('id_role') == "1") { ?> Admin <?php } else { ?>Siswa <?php } ?>!</h2>
            <p class="section-lead">
                Selamat Datang Di Menu <?= $menu; ?> - <?= $website['nama_website']; ?>.
            </p>
        <?php $i++;
        } ?>

        <div class="row mt-sm-4">

            <?php
            $i = 1;
            foreach ($TampilData_Tugas_Aktif->result() as $data) { ?>
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?php echo base_url() ?>/assets/upload/foto_tugas/<?php echo $data->photo ?>" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Dibuat</div>
                                    <div class="profile-widget-item-value"><?php echo $data->tgl_awal ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Terakhir</div>
                                    <div class="profile-widget-item-value"><?php echo $data->tgl_akhir ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Status</div>
                                    <div class="profile-widget-item-value"><?php if ($data->active == '1') { ?> Aktif <?php } else { ?> Tidak Aktif <?php } ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><?php echo $data->nama_tugas ?> <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> <?php echo $data->nm_mapel ?> (<?php echo $data->nm_kelas ?>)
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Hub Guru Mapel</div>
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $data->telp_nm_g_mapel ?>&text=Assalamualaikum%20<?php echo $data->nm_g_mapel ?> %20Saya%20<?php $this->session->userdata('nama_siswa') ?>%20dari%20kelas%20<?php echo $data->nm_kelas  ?>%20ingin%20bertanya%20untuk%20tugas%20<?php echo $data->nm_mapel ?>%20<?php echo $data->nama_tugas ?>%20....." class="btn btn-success">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php $i++;
            } ?>


            <?php
            $i = 1;
            foreach ($TampilData_Tugas_Aktif->result() as $data) { ?>


                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <?php echo form_open_multipart('kumpul_tugas/kumpul_tugas_siswa'); ?>
                        <!-- <form method="post" class="needs-validation" novalidate=""> -->
                        <div class="card-header">
                            <h4>Form Pengumpulan Tugas <?php echo $data->nama_tugas ?> (1 File)</h4>
                        </div>
                        <input type="hidden" name="ambil_id_mapel" value="<?php echo $data->id_mapel_mapel ?>">
                        <input type="hidden" name="ambil_id_tugas" value="<?php echo $data->id ?>">
                        <input type="hidden" name="ambil_nama_tugas" value="<?php echo $data->nama_tugas ?>">
                        <input type="hidden" name="ambil_nama_mapel" value="<?php echo $data->nm_mapel ?>">
                        <input type="hidden" name="ambil_nama_kelas" value="<?php echo $data->nm_kelas ?>">
                        <?php
                        // echo "Id KElas : " . $IdKelas = $this->session->userdata('id_kelas') . "<br>";
                        // echo "Id Mapel : " . $IdMapel = $data->id_mapel_mapel . "<br>";
                        // echo "Id Siswa : " . $IdSiswa = $this->session->userdata('id') . "<br>";
                        // echo "Id Tugas : " . $IdTugas = $data->id . "<br>";
                        ?>
                        <div class="card-body">
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
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama Siswa</label>
                                    <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama_siswa') ?>" required="" readonly>
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Siswa Kelas</label>
                                    <input type="text" class="form-control" value="<?php echo $data->nm_kelas ?>" required="" readonly>
                                    <div class="invalid-feedback">
                                        Kelas Siswa
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>File Tugas (Wajif PDF)</label>
                                    <input type="file" class="form-control" name="file_tugas" value="" required="">
                                    <div class="invalid-feedback">
                                        File Tugas (Wajif PDF)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Kirim Tugas</button>
                        </div>
                        <!-- </form> -->
                        <?php echo form_close(); ?>
                    </div>
                </div>
            <?php $i++;
            } ?>

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

    $(document).ready(function() {
        <?= $this->session->flashdata('selamat-selesai'); ?>

        function selamat_selesai() {
            iziToast.info({
                title: 'Terimakasih Tugas Kamu Sudah Terkirim ',
                message: 'Semoga Mendapat Nilai Terbaik, Aamiin',
                position: 'topCenter'
            });
        }
    });
</script>


<?php
$i = 1;
foreach ($TampilData_Tugas_Aktif->result() as $data) { ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal_terlambat<?php echo $data->id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terlambat!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Kamu Terlambat Mengumpulkan Tugas Silahkan Konfirmasi Ke Guru Bersangkutan.</p>
                    <p>DETAIL TUGAS <br>
                        Nama Tugas : <?php echo $data->nama_tugas ?> <br>
                        Kelas : <?php echo $data->nm_kelas ?> <br>
                        Mapel : <?php echo $data->nm_mapel ?> <br>
                        Guru Mapel : <?php echo $data->nm_g_mapel ?> <br>
                        Nomor HP Guru Mapel : +<?php echo $data->telp_nm_g_mapel ?> <br>
                    </p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $i++;
} ?>