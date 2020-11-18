<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User Management</h1>
            <div class="section-header-button">
                <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambah-data"><i class="far fa-edit"></i> Tambah</button>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></div>
                <div class="breadcrumb-item"><a href="">Setting</a></div>
                <div class="breadcrumb-item">User Management</div>
            </div>

        </div>

        <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama') ?> - <?php if ($this->session->userdata('id_role') == "1") { ?> Admin <?php } else { ?>Panitia <?php } ?>!</h2>
        <p class="section-lead">
            Tambah User Untuk Management Data Toko Online Anda.
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data User</h4>
                        <p id="tes-inner"></p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_data">
                                    <?php
                                    $i = 1;
                                    foreach ($tampilData->result() as $data) { ?>
                                        <tr>
                                            <td class="align-middle">
                                                <?php echo $i ?>
                                            </td>
                                            <td class="align-middle">
                                                <img alt="image" src="<?php echo base_url() ?>/assets/img/upload/user-photo/<?php echo $data->photo ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?php echo $data->nama ?>">
                                            </td>
                                            <td class="align-middle"><?php echo $data->nama ?> (<?php echo $data->jabatan_tampil ?>)</td>
                                            <td class="align-middle"><?php echo $data->email ?></td>
                                            <td class="align-middle"><?php echo $data->phone ?></td>
                                            <td class="align-middle">
                                                <?php if ($data->active == '1') { ?>
                                                    <div class="badge badge-success">Aktif</div>
                                                <?php } else { ?>
                                                    <div class="badge badge-danger">Tidak Aktif</div>
                                                <?php } ?>
                                            </td>
                                            <td class="align-middle">
                                                <div class="buttons">
                                                    <?php if ($this->session->userdata('nama') == $data->nama) { ?>
                                                        <button disabled class="btn btn-icon  btn-info" data-toggle="modal" data-target="#ubah-password<?php echo $data->slug ?>" title="Ubah Password"><i class="ion-key"></i> </button>
                                                        <button disabled class="btn btn-icon  btn-warning" data-toggle="modal" data-target="#edit-data<?php echo $data->slug ?>" title="Edit"><i class="ion-edit"></i> </button>
                                                        <button disabled class="btn btn-icon  btn-danger" data-toggle="modal" data-target="#hapus-data<?php echo $data->slug ?>" title="Hapus"><i class="ion-trash-a"></i> </button>
                                                    <?php } else { ?>
                                                        <button class="btn btn-icon  btn-info" data-toggle="modal" data-target="#ubah-password<?php echo $data->slug ?>" title="Ubah Password"><i class="ion-key"></i> </button>
                                                        <button class="btn btn-icon  btn-warning" data-toggle="modal" data-target="#edit-data<?php echo $data->slug ?>" title="Edit"><i class="ion-edit"></i> </button>
                                                        <button class="btn btn-icon  btn-danger" data-toggle="modal" data-target="#hapus-data<?php echo $data->slug ?>" title="Hapus"><i class="ion-trash-a"></i> </button>
                                                    <?php } ?>
                                                </div>
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
    <?php echo form_open_multipart('user_management/Edit_Data'); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-data<?php echo $data->slug ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="slug_query" value="<?php echo $data->slug; ?>" />
                <div class="modal-body">
                    <div class="form-group col-md-12 col-12">
                        <label>Foto</label>
                        <div>
                            <img alt="image" src="<?php echo base_url() ?>/assets/img/upload/user-photo/<?php echo $data->photo ?>" width="150px" />
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Nama</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?php echo $data->nama ?>" required="" placeholder="Masukkan Nama User" name="nama">
                        </div>
                        <div class="invalid-feedback">
                            Nama User
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" value="<?php echo $data->email ?>" required="" placeholder="Masukkan Email User" name="email">
                        </div>
                        <div class="invalid-feedback">
                            Email Tidak Boleh Kosong
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>No.Hp</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="<?php echo $data->phone ?>" required="" placeholder="Masukkan Nomor Handphone User" name="phone">
                        </div>
                        <div class="invalid-feedback">
                            Nomor Telephone User
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Jabatan User</label>
                        <select value="" <?php echo $data->id_role; ?> class="form-control selectric" name="id_role">
                            <?php foreach ($joinRole->result() as $tbl_role) {
                                if ($tbl_role->id == $data->id_role) {
                                    echo "<option selected = 'selected' value='" . $tbl_role->id . "'>" . $tbl_role->jabatan . "</option>";
                                } else {
                                    echo "<option value='" . $tbl_role->id . "'>" . $tbl_role->jabatan . "</option>";
                                }
                            } ?>
                        </select>
                        <div class="invalid-feedback">
                            Jabatan User
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Status User</label>
                        <select class="form-control selectric" name="active" value="<?php echo $data->active ?>">
                            <?php if ($data->active == '1') { ?>
                                <option selected="selected" value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            <?php } else { ?>
                                <option selected="selected" value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Status User
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Ubah Foto User</label>
                        <div class="input-group">
                            <div id="image-preview<?php echo $i ?>" class="image-preview">
                                <label for="image-upload" id="image-label<?php echo $i ?>">Pilih File</label>
                                <input type="file" name="photo" id="image-upload<?php echo $i ?>" value="<?php echo $data->photo ?>" />
                            </div>
                        </div>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus-data<?php echo $data->slug ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Inggin Menghapus User (<?php echo $data->nama ?>) ?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a class="btn btn-danger" href="<?php echo base_url('user_management/Hapus/' . $data->slug) ?>">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php foreach ($tampilData->result() as $data) { ?>
    <!-- Modal Uabah Password -->
    <?php echo form_open_multipart('user_management/Ubah_Password'); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="ubah-password<?php echo $data->slug ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="slug_query" value="<?php echo $data->slug; ?>" />
                <div class="modal-body">
                    <p>Anda Akan Mengubah Password (<?php echo $data->nama ?>).</p>
                    <div class="form-group col-md-12 col-12">
                        <label>Ubah Password User</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="" required="" placeholder="Masukkan Password Baru User" name="password">
                        </div>
                        <div class="invalid-feedback">
                            Password Baru Tidak Boleh Kosong
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">Simpan Password</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
<?php } ?>

<!-- Modal Tambah Data -->
<?php echo form_open_multipart('user_management/Tambah_Data'); ?>
<div class="modal fade" tabindex="-1" role="dialog" id="tambah-data">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12 col-12">
                    <label>Nama</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="" required="" placeholder="Masukkan Nama User" name="nama">
                    </div>
                    <div class="invalid-feedback">
                        Nama User
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" value="" required="" placeholder="Masukkan Email User" name="email">
                    </div>
                    <div class="invalid-feedback">
                        Email Tidak Boleh Kosong
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>No.Hp</label>
                    <div class="input-group">
                        <input type="number" class="form-control" value="" required="" placeholder="Masukkan Nomor Handphone User" name="phone">
                    </div>
                    <div class="invalid-feedback">
                        Nomor Telephone User
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Jabatan User</label>
                    <select class="form-control selectric" id="id_role" name="id_role" required="required">
                        <!-- <option value="">Pilih Role</option> -->
                        <?php foreach ($joinRole->result() as $tbl_role) { ?>
                            <option value="<?php echo $tbl_role->id; ?>"><?php echo $tbl_role->jabatan; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Jabatan User
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Status User</label>
                    <select class="form-control selectric" name="active">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <div class="invalid-feedback">
                        Status User
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Password</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="" required="" placeholder="Masukkan Password User" name="password">
                    </div>
                    <div class="invalid-feedback">
                        Password Tidak Boleh Kosong
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Foto User</label>
                    <div class="input-group">
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Pilih File</label>
                            <input type="file" name="photo" id="image-upload" required="" />
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
                message: 'User Baru Telah Di Tambahkan',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('edit-data'); ?>

        function edit_data() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Data User Telah Di Perbaruhi',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('hapus-data'); ?>

        function hapus_data() {
            iziToast.warning({
                title: 'Berhasil!',
                message: 'Data User Telah Di Hapus',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('ubah-password'); ?>

        function ubah_password() {
            iziToast.info({
                title: 'Berhasil!',
                message: 'Password User Telah Di Perbarui',
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