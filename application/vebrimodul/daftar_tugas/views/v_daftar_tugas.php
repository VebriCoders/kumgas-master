<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $menu; ?></h1>
            <div class="section-header-button">
                <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambah-data"><i class="far fa-edit"></i> Tambah</button>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></div>
                <div class="breadcrumb-item"><a href="">Master Tugas</a></div>
                <div class="breadcrumb-item"><?= $menu; ?></div>
            </div>
        </div>

        <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama') ?> - <?php if ($this->session->userdata('id_role') == "1") { ?> Admin <?php } else { ?>Panitia <?php } ?>!</h2>
        <p class="section-lead">
            Tambahkan Tugas Baru, Agar Siswa Mengumpulkan Sesuai Dengan Tepat Waktu!
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
                                        <th>Judul Tugas (Status)</th>
                                        <th>Mata Pelajaran (Kelas)</th>
                                        <th>Tanggal Berakhir</th>
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
                                                <img alt="image" src="<?php echo base_url() ?>/assets/upload/foto_tugas/<?php echo $data->photo ?>" class="rounded-circle" width="100" height="100" data-toggle="tooltip" title="<?php echo $data->nama_tugas ?>">
                                            </td>
                                            <td class="align-middle"><?php echo $data->nama_tugas ?> (<?php if ($data->active == "1") { ?> Aktif <?php } else { ?> Tidak Aktif <?php } ?>) </td>
                                            <td class="align-middle"><?php echo $data->nm_kelas ?> (<?php echo $data->nm_mapel ?>)</td>
                                            <td class="align-middle"><?php echo $data->tgl_akhir ?></td>
                                            <td class="align-middle">
                                                <button class="btn btn-icon  btn-warning" data-toggle="modal" data-target="#edit-data<?php echo $data->id ?>" title="Edit"><i class="ion-edit"></i> </button>
                                                <button class="btn btn-icon  btn-danger" data-toggle="modal" data-target="#hapus-data<?php echo $data->id ?>" title="Hapus"><i class="ion-trash-a"></i> </button>
                                                <a href="daftar_tugas/detail/<?php echo $data->slug ?>" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="List Tugas Di Kumpulkan Oleh Siswa"><i class="fa fa-th-list"></i></a>
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
    <?php echo form_open_multipart('daftar_tugas/Edit_Data'); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-data<?php echo $data->id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Tugas (<?php echo $data->nama_tugas ?>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" value="<?php echo $data->id ?>" required="" name="code_query">
                <div class="modal-body">

                    <div class="form-group col-md-12 col-12">
                        <label>Tugas Kelas</label>
                        <select class="form-control selectric" id="id_kelas" name="id_kelas" required="" data-toggle="tooltip" data-placement="left" title="Tugas Kelas">
                            <?php foreach ($joinKelas->result() as $tbl_kelas) {
                                if ($tbl_kelas->id == $data->id_kelas) {
                                    echo "<option selected = 'selected' value='" . $tbl_kelas->id . "'>" . $tbl_kelas->kelas . "</option>";
                                } else {
                                    echo "<option value='" . $tbl_kelas->id . "'>" . $tbl_kelas->kelas . "</option>";
                                }
                            } ?>
                        </select>
                        <div class="invalid-feedback">
                            Tugas Kelas
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Tugas Mapel</label>
                        <select class="form-control selectric" id="id_mapel" name="id_mapel" required="" data-toggle="tooltip" data-placement="left" title="Tugas Mapel">
                            <?php foreach ($joinMapel->result() as $tbl_mapel) {
                                if ($tbl_mapel->id == $data->id_mapel) {
                                    echo "<option selected = 'selected' value='" . $tbl_mapel->id . "'>" . $tbl_mapel->nama_mapel . "</option>";
                                } else {
                                    echo "<option value='" . $tbl_mapel->id . "'>" . $tbl_mapel->nama_mapel . "</option>";
                                }
                            } ?>
                        </select>
                        <div class="invalid-feedback">
                            Tugas Mapel
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Judul Tugas</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?php echo $data->nama_tugas ?>" required="" placeholder="Masukkan Judul Tugas" name="nama_tugas" data-toggle="tooltip" data-placement="left" title="Judul Tugas">
                        </div>
                        <div class="invalid-feedback">
                            Judul Tugas
                        </div>
                    </div>

                    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery.datetimepicker.css">
                    <div class="form-group col-md-12 col-12">
                        <label>Akhir Pengumpulan</label>
                        <div class="input-group">
                            <input type="text" id="picker_edit<?php echo $i ?>" class="form-control" value="<?php echo $data->tgl_akhir ?>" required="" placeholder="Masukkan Tanggal Akhir Pengumpulan" name="tgl_akhir" data-toggle="tooltip" data-placement="left" title="Tanggal & Jam Akhir Pengumpulan" datetimepicker>
                        </div>
                        <div class="invalid-feedback">
                            Akhir Pengumpulan
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Status Tugas</label>
                        <select class="form-control selectric" id="active" name="active" required="" data-toggle="tooltip" data-placement="left" title="Status Tugas">
                            <?php if ($data->active == '1') { ?>
                                <option value="1" selected>Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            <?php } else { ?>
                                <option value="0" selected>Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Status Tugas
                        </div>
                    </div>



                    <div class="form-group col-md-12 col-12">
                        <label>Ubah Foto Kategori</label>
                        <div class="input-group">
                            <div id="image-preview<?php echo $i ?>" class="image-preview">
                                <label for="image-upload" id="image-label<?php echo $i ?>">Ubah Foto</label>
                                <input type="file" name="photo" id="image-upload<?php echo $i ?>" value="<?php echo $data->photo ?>" data-toggle="tooltip" data-placement="left" title="Ubah Foto Kelas" />
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
    <script src="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery.datetimepicker.full.min.js"></script>
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

        $('#picker_edit<?php echo $i ?>').datetimepicker({
            timepicker: true,
            datepicker: true,
            format: 'Y-m-d H:i',
            weeks: true
        })
    </script>

<?php $i++;
} ?>

<?php foreach ($tampilData->result() as $data) { ?>
    <!-- Modal Hapus Data -->
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus-data<?php echo $data->id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Tugas (<?php echo $data->nama_tugas ?>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Inggin Menghapus Data Tugas (<?php echo $data->nama_tugas ?>). Pada Kelas (<?php echo $data->nm_kelas ?>). Mata Pelajaran (<?php echo $data->nm_mapel ?>) ?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a class="btn btn-danger" href="<?php echo base_url('daftar_tugas/Hapus/' . $data->id) ?>">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Tambah Data -->
<?php echo form_open_multipart('daftar_tugas/Tambah_Data'); ?>
<div class="modal fade" tabindex="-1" role="dialog" id="tambah-data">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tugas Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group col-md-12 col-12">
                    <label>Tugas Kelas</label>
                    <select class="form-control selectric" id="id_kelas" name="id_kelas" required="" data-toggle="tooltip" data-placement="left" title="Tugas Kelas">
                        <option>----- Pilih Kelas -----</option>
                        <?php foreach ($joinKelas->result() as $tbl_kelas) { ?>
                            <option value="<?php echo $tbl_kelas->id; ?>"><?php echo $tbl_kelas->kelas; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Tugas Kelas
                    </div>
                </div>

                <div class="form-group col-md-12 col-12">
                    <label>Tugas Mapel</label>
                    <select class="form-control selectric" id="id_mapel" name="id_mapel" required="" data-toggle="tooltip" data-placement="left" title="Tugas Mata Pelajaran">
                        <option>----- Pilih Mapel -----</option>
                        <?php foreach ($joinMapel->result() as $tbl_mapel) { ?>
                            <option value="<?php echo $tbl_mapel->id; ?>"><?php echo $tbl_mapel->nama_mapel; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Tugas Mapel
                    </div>
                </div>

                <div class="form-group col-md-12 col-12">
                    <label>Judul Tugas</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="" required="" placeholder="Masukkan Judul Tugas" name="nama_tugas" data-toggle="tooltip" data-placement="left" title="Judul Tugas">
                    </div>
                    <div class="invalid-feedback">
                        Judul Tugas
                    </div>
                </div>

                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery.datetimepicker.css">
                <div class="form-group col-md-12 col-12">
                    <label>Akhir Pengumpulan</label>
                    <div class="input-group">
                        <input type="text" id="picker_tambah" class="form-control" value="" required="" placeholder="Masukkan Tanggal Akhir Pengumpulan" name="tgl_akhir" data-toggle="tooltip" data-placement="left" title="Tanggal & Jam Akhir Pengumpulan" datetimepicker>
                    </div>
                    <div class="invalid-feedback">
                        Akhir Pengumpulan
                    </div>
                </div>

                <div class="form-group col-md-12 col-12">
                    <label>Status Tugas</label>
                    <select class="form-control selectric" id="active" name="active" required="" data-toggle="tooltip" data-placement="left" title="Status Tugas">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <div class="invalid-feedback">
                        Status Tugas
                    </div>
                </div>

                <div class="form-group col-md-12 col-12">
                    <label>Foto / Logo Tugas</label>
                    <div class="input-group">
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Pilih File</label>
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
<script src="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery.datetimepicker.full.min.js"></script>

<script type="text/javascript">
    $("#table-1").dataTable({
        "columnDefs": [{
            "sortable": false,
            "targets": [2, 3]
        }]
    });

    $('#picker_tambah').datetimepicker({
        timepicker: true,
        datepicker: true,
        format: 'Y-m-d H:i',
        weeks: true
    })

    $(document).ready(function() {
        <?= $this->session->flashdata('simpan-data'); ?>

        function simpan_data() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Tugas Baru Telah Di Tambahkan',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('edit-data'); ?>

        function edit_data() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Data Tugas Telah Di Perbaruhi',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('hapus-data'); ?>

        function hapus_data() {
            iziToast.warning({
                title: 'Berhasil!',
                message: 'Data Tugas Telah Di Hapus',
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