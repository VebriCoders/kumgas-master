<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></div>
                <!-- <div class="breadcrumb-item"><a href="">Master Data</a></div> -->
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>

        <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama') ?> - <?php if ($this->session->userdata('id_role') == "1") { ?> Admin <?php } else { ?>Panitia <?php } ?>!</h2>
        <p class="section-lead">
            Ubah Dan Sesuaikan Identitas Anda.
        </p>


        <div class="row mt-sm-4">
            <?php foreach ($tampilData->result() as $data) { ?>
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?php echo base_url() ?>assets/img/upload/user-photo/<?php echo $data->photo ?>" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Akun Di Buat</div>
                                    <div class="profile-widget-item-value"><?php echo $data->created_on ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Terakhir Login</div>
                                    <div class="profile-widget-item-value"><?php echo $data->last_login ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Terakhir Logout</div>
                                    <div class="profile-widget-item-value"><?php echo $data->last_logout ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><?php echo $data->nama ?> <div class="text-muted d-inline font-weight-normal">
                                    <!-- <div class="slash"></div> Web Developer & Securty -->
                                </div>
                            </div>
                            <?php echo $data->bio ?>
                        </div>
                        <!-- <div class="card-footer text-center">
                        <div class="font-weight-bold mb-2">Follow Vebri Pradana On</div>
                        <a href="#" target="_blank" class="btn btn-social-icon btn-facebook mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" target="_blank" class="btn btn-social-icon btn-twitter mr-1">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" target="_blank" class="btn btn-social-icon btn-github mr-1">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" target="_blank" class="btn btn-social-icon btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div> -->
                        <div class="card-footer text-left">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#ubahpassword">Ubah Password</button>
                            <!-- <button class="btn btn-success" id="simpan-profile">tes</button> -->
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <?php foreach ($tampilData->result() as $data) { ?>
                        <!-- <form method="post" class="needs-validation" novalidate=""> -->
                        <?php echo form_open_multipart('profile/Edit_Profile'); ?>
                        <div class="card-header">
                            <h4>Ubah Profile</h4>
                        </div>
                        <input type="hidden" name="slug_query" value="<?php echo $data->slug; ?>" />
                        <input type="hidden" name="nama" value="<?php echo $data->nama; ?>" />
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" name="phone" value="<?php echo $data->phone ?>" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Bio</label>
                                    <textarea class="form-control summernote-simple" name="bio"><?php echo $data->bio ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Foto</label>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="photo" id="image-upload" />
                                    </div>
                                    <p>File Saat ini : <?php echo $data->photo ?></p>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                        <?php echo form_close(); ?>
                        <!-- </form> -->
                    <?php } ?>
                </div>
            </div>
        </div>

    </section>
</div>


<?php foreach ($tampilData->result() as $data) { ?>
    <?php echo form_open_multipart('profile/Ubah_Password'); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="ubahpassword">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Password Anda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="slug_query" value="<?php echo $data->slug; ?>" />
                <div class="modal-body">
                    <div class="form-group col-md-12 col-12">
                        <label>Password Baru</label>
                        <input type="text" class="form-control" name="password" required="">
                        <div class="invalid-feedback">
                            Password Baru Tidak Bolek Kosong
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
<?php } ?>


<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        <?= $this->session->flashdata('edit-profile'); ?>

        function edit_profile() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Pengubahan Profile Anda Telah Tersimpan',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('ubah-password'); ?>

        function ubah_password() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Passoword Profile Anda Telah Di Perbarui',
                position: 'topRight'
            });
        }
    });

    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Pilih File", // Default: Choose File
        label_selected: "Uabh File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
</script>