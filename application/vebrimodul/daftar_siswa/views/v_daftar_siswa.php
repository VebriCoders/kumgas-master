<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $menu; ?></h1>
            <div class="section-header-button">
                <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambah-data"><i class="far fa-edit"></i> Tambah</button>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></div>
                <div class="breadcrumb-item"><a href="">Master Data</a></div>
                <div class="breadcrumb-item"><?= $menu; ?></div>
            </div>
        </div>

        <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama') ?> - <?php if ($this->session->userdata('id_role') == "1") { ?> Admin <?php } else { ?>Panitia <?php } ?>!</h2>
        <p class="section-lead">
            Tambahkan Daftar Siswa, Agar Siswa Bisa Masuk Aplikasi Dan Mengumpulkan Tugas!
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?= $menu; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Photo</th>
                                        <th>NISN (Status Akun)</th>
                                        <th>Nama Siswa (Kelas)</th>
                                        <th>Email Siswa</th>
                                        <th>No Telp Siswa</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($tampilData->result() as $data) { ?>
                                        <tr>
                                            <td class="align-middle">
                                                <?php echo $i ?>
                                            </td>
                                            <td class="align-middle">
                                                <img alt="image" src="<?php echo base_url() ?>/assets/upload/foto_siswa/<?php echo $data->photo ?>" class="rounded-circle" width="50" height="50" data-toggle="tooltip" title="<?php echo $data->nama_siswa ?>">
                                            </td>
                                            <td class="align-middle"><?php echo $data->nisn_siswa ?> (<?php if ($data->active == "1") { ?> Aktif <?php } else { ?> Tidak Aktif <?php } ?>) </td>
                                            <td class="align-middle"><?php echo $data->nama_siswa ?> (<?php echo $data->nm_kelas ?>)</td>
                                            <td class="align-middle"><?php echo $data->email_siswa ?></td>
                                            <td class="align-middle">+<?php echo $data->no_telp_siswa ?></td>
                                            <td class="align-middle">
                                                <button class="btn btn-icon  btn-warning" data-toggle="modal" data-target="#edit-data<?php echo $data->id ?>" title="Edit"><i class="ion-edit"></i> </button>
                                                <button class="btn btn-icon  btn-danger" data-toggle="modal" data-target="#hapus-data<?php echo $data->id ?>" title="Hapus"><i class="ion-trash-a"></i> </button>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<?php
$i = 1;
foreach ($tampilData->result() as $data) { ?>
    <!-- Modal Edit Data -->
    <?php echo form_open_multipart('daftar_siswa/Edit_Data'); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-data<?php echo $data->id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Siswa (<?php echo $data->nama_siswa ?> - <?php echo $data->nm_kelas ?>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" value="<?php echo $data->id ?>" required="" name="code_query">
                <div class="modal-body">

                    <div class="form-group col-md-12 col-12">
                        <label>NISN Siswa</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="<?php echo $data->nisn_siswa ?>" required="" placeholder="Masukkan NISN Siswa" name="nisn_siswa" data-toggle="tooltip" data-placement="left" title="NISN Siswa">
                        </div>
                        <div class="invalid-feedback">
                            NISN Siswa
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Nama Siswa</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?php echo $data->nama_siswa ?>" required="" placeholder="Masukkan Nama Siswa" name="nama_siswa" data-toggle="tooltip" data-placement="left" title="Nama Lengkap Siswa">
                        </div>
                        <div class="invalid-feedback">
                            Nama Siswa
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Kelas Siswa</label>
                        <select class="form-control selectric" id="id_kelas" name="id_kelas" required="" data-toggle="tooltip" data-placement="left" title="Kelas Siswa">
                            <?php foreach ($joinKelas->result() as $tbl_kelas) {
                                if ($tbl_kelas->id == $data->id_kelas) {
                                    echo "<option selected = 'selected' value='" . $tbl_kelas->id . "'>" . $tbl_kelas->kelas . "</option>";
                                } else {
                                    echo "<option value='" . $tbl_kelas->id . "'>" . $tbl_kelas->kelas . "</option>";
                                }
                            } ?>
                        </select>
                        <div class="invalid-feedback">
                            Kelas Siswa
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Email Siswa</label>
                        <div class="input-group">
                            <input type="email" class="form-control" value="<?php echo $data->email_siswa ?>" required="" placeholder="Masukkan Email Siswa" name="email_siswa" data-toggle="tooltip" data-placement="left" title="Email Aktif Siswa">
                        </div>
                        <div class="invalid-feedback">
                            Email Siswa
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Nomor Siswa</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="<?php echo $data->no_telp_siswa ?>" required="" placeholder="Masukkan Nomor Siswa" name="no_telp_siswa" data-toggle="tooltip" data-placement="left" title="Telephone / WA Siswa">
                        </div>
                        <div class="invalid-feedback">
                            Nomor Siswa
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Status Akun Siswa</label>
                        <select class="form-control selectric" id="active" name="active" required="" data-toggle="tooltip" data-placement="left" title="Status Akun Siswa">
                            <?php if ($data->active == '1') { ?>
                                <option value="1" selected>Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            <?php } else { ?>
                                <option value="0" selected>Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Status Akun Siswa
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Ubah Foto Siswa</label>
                        <div class="input-group">
                            <div id="image-preview<?php echo $i ?>" class="image-preview">
                                <label for="image-upload" id="image-label<?php echo $i ?>">Ubah Foto</label>
                                <input type="file" name="photo" id="image-upload<?php echo $i ?>" value="<?php echo $data->photo ?>" data-toggle="tooltip" data-placement="left" title="Ubah Foto Siswa" />
                                <input type="hidden" name="old_image" value="<?php echo $data->photo ?>" />
                            </div>
                        </div>
                        <p>File Saat ini : <?php echo $data->photo ?> </p>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>

    <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script>
        $.uploadPreview({
            input_field: "#image-upload<?php echo $i ?>", // Default: .image-upload
            preview_box: "#image-preview<?php echo $i ?>", // Default: .image-preview
            label_field: "#image-label<?php echo $i ?>", // Default: .image-label
            label_default: "Pilih File", // Default: Choose File
            label_selected: "Uabh File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>

<?php $i++;
} ?>

<?php foreach ($tampilData->result() as $data) { ?>
    <!-- Modal Hapus Data -->
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus-data<?php echo $data->id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Siswa (<?php echo $data->nama_siswa ?>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Inggin Menghapus Data Siswa (<?php echo $data->nama_siswa ?> - <?php echo $data->nm_kelas ?>) ?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a class="btn btn-danger" href="<?php echo base_url('daftar_siswa/Hapus/' . $data->id) ?>">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Tambah Data -->
<?php echo form_open_multipart('daftar_siswa/Tambah_Data'); ?>
<div class="modal fade" tabindex="-1" role="dialog" id="tambah-data">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Siswa Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12 col-12">
                    <label>NISN Siswa</label>
                    <div class="input-group">
                        <input type="number" class="form-control" value="" required="" placeholder="Masukkan NISN Siswa" name="nisn_siswa" data-toggle="tooltip" data-placement="left" title="NISN Siswa">
                    </div>
                    <div class="invalid-feedback">
                        NISN Siswa
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Nama Siswa</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="" required="" placeholder="Masukkan Nama Siswa" name="nama_siswa" data-toggle="tooltip" data-placement="left" title="Nama Lengkap Siswa">
                    </div>
                    <div class="invalid-feedback">
                        Nama Siswa
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Kelas Siswa</label>
                    <select class="form-control selectric" id="id_kelas" name="id_kelas" required="" data-toggle="tooltip" data-placement="left" title="Kelas Siswa">
                        <option>----- Pilih Kelas -----</option>
                        <?php foreach ($joinKelas->result() as $tbl_kelas) { ?>
                            <option value="<?php echo $tbl_kelas->id; ?>"><?php echo $tbl_kelas->kelas; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Kelas Siswa
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Email Siswa</label>
                    <div class="input-group">
                        <input type="email" class="form-control" value="" required="" placeholder="Masukkan Email Siswa" name="email_siswa" data-toggle="tooltip" data-placement="left" title="Email Aktif Siswa">
                    </div>
                    <div class="invalid-feedback">
                        Email Siswa
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Nomor Siswa</label>
                    <div class="input-group">
                        <input type="number" class="form-control" value="62" required="" placeholder="Masukkan Nomor Siswa" name="no_telp_siswa" data-toggle="tooltip" data-placement="left" title="Telephone / WA Siswa">
                    </div>
                    <div class="invalid-feedback">
                        Nomor Siswa
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Status Akun Siswa</label>
                    <select class="form-control selectric" id="active" name="active" required="" data-toggle="tooltip" data-placement="left" title="Status Akun Siswa">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <div class="invalid-feedback">
                        Status Akun Siswa
                    </div>
                </div>

                <div class="form-group col-md-12 col-12">
                    <label>Foto Siswa</label>
                    <div class="input-group">
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Pilih Foto</label>
                            <input type="file" name="photo" id="image-upload" data-toggle="tooltip" data-placement="left" title="Foto Kelas" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>


<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<script type="text/javascript">
    $("#table-1").dataTable({
        "columnDefs": [{
            "sortable": false,
            "targets": [2, 3]
        }]
    });


    $(document).ready(function() {
        <?= $this->session->flashdata('simpan-data'); ?>

        function simpan_data() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Siswa Baru Telah Di Tambahkan',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('edit-data'); ?>

        function edit_data() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Data Siswa Telah Di Perbaruhi',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('hapus-data'); ?>

        function hapus_data() {
            iziToast.warning({
                title: 'Berhasil!',
                message: 'Data Siswa Telah Di Hapus',
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