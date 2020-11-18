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
            Selamat Datang Di Menu <?= $menu; ?> - <?= $website['nama_website']; ?>.
        </p>

        <div class="row">

            <?php
            $i = 1;
            foreach ($TampilData_Tugas_Aktif->result() as $data) { ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image" data-background="<?php echo base_url() ?>/assets/upload/foto_tugas/<?php echo $data->photo ?>">
                            </div>
                            <div class="article-badge">
                                <?php if ($data->active == "1") { ?>
                                    <div class="article-badge-item bg-success"><i class="fas fa-check-square"></i> Aktif</div>
                                <?php } else { ?>
                                    <div class="article-badge-item bg-danger"><i class="fas fa-window-close"></i> Non Aktif</div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title">
                                <h6><a href="#"><?php echo $data->nama_tugas ?> - <?php echo $data->nm_kelas ?></a></h6>
                            </div>
                            <p>Tugas Di Buat : <?php echo $data->tgl_awal ?> <br>
                                Terakhir : <?php echo $data->tgl_akhir ?></p>
                            <div class="article-cta">
                                <?php
                                $tgl_akhir_kumpul = $data->tgl_akhir
                                ?>
                                <?php
                                date_default_timezone_set("Asia/Bangkok");
                                $tgl_skrg = date('Y-m-d H:i');
                                ?>

                                <?php
                                // echo "Id KElas : " . $IdKelas = $this->session->userdata('id_kelas') . "<br>";
                                // echo "Id Mapel : " . $IdMapel = $data->id_mapel_mapel . "<br>";
                                // echo "Id Siswa : " . $IdSiswa = $this->session->userdata('id') . "<br>";
                                // echo "Id Tugas : " . $IdTugas = $data->id . "<br>";
                                ?>

                                <?php
                                $query = $this->db->get_where('tbl_tugas_siswa', ['id_kelas' => $this->session->userdata('id_kelas'), 'id_mapel' => $data->id_mapel_mapel, 'id_siswa' => $this->session->userdata('id'), 'id_tugas' => $data->id]);
                                $cek = $query->num_rows();
                                if ($cek > 0) { ?>
                                    <button class="btn btn-success" disabled>Sudah Mengumpulkan</button>
                                <?php } else { ?>

                                    <?php if ($tgl_skrg > $tgl_akhir_kumpul) { ?>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal_terlambat<?php echo $data->id ?>">Terlambat!</button>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('kumpul_tugas/detail/') ?><?php echo $data->slug ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Klik Untuk Kumpulkan Tugas">Kumpulkan</a>
                                    <?php } ?>

                                <?php } ?>
                            </div>
                        </div>
                    </article>
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
                    <p>
                        Kamu Terlambat Mengumpulkan Tugas Silahkan Konfirmasi Ke Guru Bersangkutan.
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $data->telp_nm_g_mapel ?>&text=Assalamualaikum%20<?php echo $data->nm_g_mapel ?> %20Saya%20<?php $this->session->userdata('nama_siswa') ?>%20dari%20kelas%20<?php echo $data->nm_kelas  ?>%20ingin%20bertanya%20untuk%20tugas%20<?php echo $data->nm_mapel ?>%20<?php echo $data->nama_tugas ?>%20.....">
                            <p>Hubungi WA <?php echo $data->nm_g_mapel ?></p>
                        </a>
                    </p>
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