<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Setting Aplikasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></div>
                <div class="breadcrumb-item"><a href="">Setting</a></div>
                <div class="breadcrumb-item">Setting Aplikasi</div>
            </div>
        </div>

        <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama') ?> - <?php if ($this->session->userdata('id_role') == "1") { ?> Admin <?php } else { ?>Panitia <?php } ?>!</h2>
        <p class="section-lead">
            Sesuaikan Pengaturan Toko Online Anda.
        </p>

        <div id="output-status"></div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu Setting</h4>
                        </div>
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="setting-utama-tab" data-toggle="tab" href="#setting-utama" role="tab" aria-controls="setting-utama" aria-selected="true">Wesite Setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sosmed-tab" data-toggle="tab" href="#sosmed" role="tab" aria-controls="sosmed" aria-selected="false">Social Media & Email</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pemilih-tab" data-toggle="tab" href="#pemilih" role="tab" aria-controls="pemilih" aria-selected="false">Pembeli Setting</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8">
                    <div class="tab-content no-padding" id="myTab2Content">
                        <div class="tab-pane fade show active" id="setting-utama" role="tabpanel" aria-labelledby="setting-utama-tab">
                            <?php foreach ($tampilData->result() as $data) { ?>
                                <!-- <form id="setting-website"> -->
                                <?php echo form_open_multipart('setting/Edit_Utama'); ?>
                                <div class="card" id="settings-card">
                                    <div class="card-header">
                                        <h4>Wesite Setting</h4>
                                    </div>
                                    <input type="hidden" name="slug_query" value="<?php echo $data->slug; ?>" />
                                    <div class="card-body">
                                        <p class="text-muted">Setting Nama, Deskripsi & Logo Toko Online Anda.</p>
                                        <div class="form-group row align-items-center">
                                            <label for="nama_website" class="form-control-label col-sm-3 text-md-right">Nama Website</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text" name="nama_website" class="form-control" id="nama_website" value="<?php echo $data->nama_website ?>" placeholder="Nama Website">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="deskripsi" class="form-control-label col-sm-3 text-md-right">Deskripsi Website</label>
                                            <div class="col-sm-6 col-md-9">
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Website"><?php echo $data->deskripsi ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="form-control-label col-sm-3 text-md-right">Website Logo</label>
                                            <div class="col-sm-6 col-md-9">
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input" id="logo" value="<?php echo $data->logo ?>">
                                                    <label class="custom-file-label">Pilih File</label>
                                                </div>
                                                <div class="form-text text-muted">Ukuran Maksimal File Logo 2MB</div>
                                                <p>File Saat Ini : <?php echo $data->logo ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="form-control-label col-sm-3 text-md-right">Preview Logo</label>
                                            <div class="col-sm-6 col-md-9">
                                                <img class="img-fluid" src="<?php echo base_url() ?>assets/img/icon/<?php echo $data->logo ?>" alt="Logo Website" width="250">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-whitesmoke text-md-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- </form> -->
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="sosmed" role="tabpanel" aria-labelledby="sosmed-tab">
                            <?php foreach ($tampilData->result() as $data) { ?>
                                <!-- <form id="setting-sosmed-email"> -->
                                <?php echo form_open_multipart('setting/Edit_Sosmed'); ?>
                                <div class="card" id="settings-card">
                                    <div class="card-header">
                                        <h4>Setting Social Media & Email</h4>
                                    </div>
                                    <input type="hidden" name="slug_query" value="<?php echo $data->slug; ?>" />
                                    <div class="card-body">
                                        <p class="text-muted">Setting Social Media & Email Toko Online Anda.</p>
                                        <div class="form-group row align-items-center">
                                            <label for="email" class="form-control-label col-sm-3 text-md-right">Email</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $data->email ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="phone" class="form-control-label col-sm-3 text-md-right">Whatsapp / Nomor Telephone</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Nomor Whatsapp/Telephone" value="<?php echo $data->phone ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="ig" class="form-control-label col-sm-3 text-md-right">Instagram</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text" name="ig" class="form-control" id="ig" placeholder="https://www.instagram.com/...." value="<?php echo $data->ig ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="tw" class="form-control-label col-sm-3 text-md-right">Twitter</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text" name="tw" class="form-control" id="tw" placeholder="https://www.twitter.com/...." value="<?php echo $data->tw ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="fb" class="form-control-label col-sm-3 text-md-right">Facebook</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text" name="fb" class="form-control" id="fb" placeholder="https://www.facebook.com/...." value="<?php echo $data->fb ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="yt" class="form-control-label col-sm-3 text-md-right">Youtube</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text" name="yt" class="form-control" id="yt" placeholder="https://www.youtube.com/...." value="<?php echo $data->yt ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-whitesmoke text-md-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- </form> -->
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="pemilih" role="tabpanel" aria-labelledby="pemilih-tab">
                            <?php foreach ($tampilData->result() as $data) { ?>
                                <!-- <form id="setting-website"> -->
                                <?php echo form_open_multipart('setting/Edit_Pemilih'); ?>
                                <div class="card" id="settings-card">
                                    <div class="card-header">
                                        <h4>Pembeli Setting</h4>
                                    </div>
                                    <input type="hidden" name="slug_query" value="<?php echo $data->slug; ?>" />
                                    <div class="card-body">
                                        <p class="text-muted">Setting Pembeli Untuk Verifikasi.</p>
                                        <!-- <div class="form-group row align-items-center">
                                            <label for="yt" class="form-control-label col-sm-3 text-md-right">Nomor Yang Di Daftarkan</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text" name="nomor_daftar" class="form-control" id="nomor_daftar" placeholder="Contoh: NIK/NISN/NO.INDUK dll" value="<?php echo $data->nomor_daftar ?>">
                                            </div>
                                        </div> -->
                                        <div class=" form-group row align-items-center">
                                            <label for="nama_website" class="form-control-label col-sm-3 text-md-right">Verifikasi Email</label>
                                            <div class="col-sm-6 col-md-9">
                                                <select class="form-control selectric" name="verifikasi_pemilih" value="<?php echo $data->verifikasi_pemilih ?>">
                                                    <?php if ($data->verifikasi_pemilih == '1') { ?>
                                                        <option selected="selected" value="1">Ya</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    <?php } else { ?>
                                                        <option selected="selected" value="0">Tidak Aktif</option>
                                                        <option value="1">Ya</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-whitesmoke text-md-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- </form> -->
                            <?php } ?>
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
        <?= $this->session->flashdata('edit-utama'); ?>

        function edit_utama() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Pengubahan Pengaturan Website Anda Telah Di Perbarui',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('edit-sosmed'); ?>

        function edit_sosmed() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Pengubahan Pengaturan Sosmed & Email Website Anda Telah Di Perbarui',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('edit-pemilih'); ?>

        function edit_pemilih() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Pengubahan Pengaturan Pemilih Website Anda Telah Di Perbarui',
                position: 'topRight'
            });
        }
    });
</script>