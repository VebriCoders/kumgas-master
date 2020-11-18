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
            Tambahkan Daftar Mata Pelajaran, Untuk Menambah Pengumpulan Tugas Bagi Siswa!
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
                                        <th>Nama Mapel (Kelas)</th>
                                        <th>Nama Guru Mapel</th>
                                        <th>No Telp Guru Mapel</th>
                                        <th>Jam Pelajaran Mapel</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($tampilData->result() as $data) { ?>
                                        <tr>
                                            <td class="align-middle" width="1px">
                                                <?php echo $i ?>
                                            </td>
                                            <td class="align-middle" width="100px">
                                                <img alt="image" src="<?php echo base_url() ?>/assets/upload/foto_mapel/<?php echo $data->photo ?>" class="rounded-circle" width="100" height="100" data-toggle="tooltip" title="<?php echo $data->nama_mapel ?>">
                                            </td>
                                            <td class="align-middle" width="100px"><?php echo $data->nama_mapel ?> (<?php echo $data->nm_kelas ?>)</td>
                                            <td class="align-middle" width="100px"><?php echo $data->nama_guru_mapel ?></td>
                                            <td class="align-middle" width="100px">+<?php echo $data->no_telp_guru_mapel ?></td>
                                            <td class="align-middle" width="150px"><?php echo $data->jam_pelajaran ?></td>
                                            <td class="align-middle" width="50px">
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
    <?php echo form_open_multipart('daftar_mapel/Edit_Data'); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-data<?php echo $data->id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Mata Pelajaran (<?php echo $data->nama_mapel ?>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" value="<?php echo $data->id ?>" required="" name="code_query">
                <div class="modal-body">

                    <div class="form-group col-md-12 col-12">
                        <label>Kelas Mapel</label>
                        <select value="" <?php echo $data->id_kelas; ?> class="form-control selectric" name="id_kelas">
                            <?php foreach ($joinKelas->result() as $tbl_kelas) {
                                if ($tbl_kelas->id == $data->id_kelas) {
                                    echo "<option selected = 'selected' value='" . $tbl_kelas->id . "'>" . $tbl_kelas->kelas . "</option>";
                                } else {
                                    echo "<option value='" . $tbl_kelas->id . "'>" . $tbl_kelas->kelas . "</option>";
                                }
                            } ?>
                        </select>
                        <div class="invalid-feedback">
                            Kelas Mapel
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Nama Mapel</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?php echo $data->nama_mapel ?>" required="" placeholder="Masukkan Nama Mapel" name="nama_mapel" data-toggle="tooltip" data-placement="left" title="Nama Mata Pelajaran">
                        </div>
                        <div class="invalid-feedback">
                            Nama Mapel
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Nama Jam Pelajaran Mapel</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?php echo $data->jam_pelajaran ?>" required="" placeholder="Masukkan Jam Pelajaran Mapel" name="jam_pelajaran" data-toggle="tooltip" data-placement="left" title="Nama Jam Pelajaran Mata Pelajaran">
                        </div>
                        <div class="invalid-feedback">
                            Nama Jam Pelajaran Mapel
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Nama Guru Mapel</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?php echo $data->nama_guru_mapel ?>" required="" placeholder="Masukkan Nama Guru Mapel" name="nama_guru_mapel" data-toggle="tooltip" data-placement="left" title="Nama  Guru Mapel">
                        </div>
                        <div class="invalid-feedback">
                            Nama Guru Mapel
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-12">
                        <label>Nomor Telpon Guru Mapel</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="<?php echo $data->no_telp_guru_mapel ?>" required="" placeholder="Masukkan Nomor Telpon Guru Mapel" name="no_telp_guru_mapel" data-toggle="tooltip" data-placement="left" title="Telephone / WA Guru Mapel">
                        </div>
                        <div class="invalid-feedback">
                            Nomor Telpon Guru Mapel
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Ubah Foto Mapel</label>
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
                    <h5 class="modal-title">Hapus Data Mapel (<?php echo $data->nama_mapel ?> - <?php echo $data->nm_kelas ?>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Ingin Menghapus Data Mapel <?php echo $data->nama_mapel ?>, Pada kelas <?php echo $data->nm_kelas ?>, Dengan Guru Mapel <?php echo $data->nama_guru_mapel ?> ?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a class="btn btn-danger" href="<?php echo base_url('daftar_mapel/Hapus/' . $data->id) ?>">Hapus</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Tambah Data -->
<?php echo form_open_multipart('daftar_mapel/Tambah_Data'); ?>
<div class="modal fade" tabindex="-1" role="dialog" id="tambah-data">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mapel Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group col-md-12 col-12">
                    <label>Kelas Mapel</label>
                    <select class="form-control selectric" id="id_kelas" name="id_kelas" required="" data-toggle="tooltip" data-placement="left" title="Kelas Mata Pelajaran">
                        <option>----- Pilih Kelas -----</option>
                        <?php foreach ($joinKelas->result() as $tbl_kelas) { ?>
                            <option value="<?php echo $tbl_kelas->id; ?>"><?php echo $tbl_kelas->kelas; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Kelas Mapel
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Nama Mapel</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="" required="" placeholder="Masukkan Nama Mapel" name="nama_mapel" data-toggle="tooltip" data-placement="left" title="Nama Mata Pelajaran">
                    </div>
                    <div class="invalid-feedback">
                        Nama Mapel
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Nama Jam Pelajaran Mapel</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="" required="" placeholder="Masukkan Jam Pelajaran Mapel" name="jam_pelajaran" data-toggle="tooltip" data-placement="left" title="Nama Jam Pelajaran Mata Pelajaran">
                    </div>
                    <div class="invalid-feedback">
                        Nama Jam Pelajaran Mapel
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Nama Guru Mapel</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="" required="" placeholder="Masukkan Nama Guru Mapel" name="nama_guru_mapel" data-toggle="tooltip" data-placement="left" title="Nama  Guru Mapel">
                    </div>
                    <div class="invalid-feedback">
                        Nama Guru Mapel
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Nomor Telpon Guru Mapel</label>
                    <div class="input-group">
                        <input type="number" class="form-control" value="62" required="" placeholder="Masukkan Nomor Telpon Guru Mapel" name="no_telp_guru_mapel" data-toggle="tooltip" data-placement="left" title="Telephone / WA Guru Mapel">
                    </div>
                    <div class="invalid-feedback">
                        Nomor Telpon Guru Mapel
                    </div>
                </div>
                <div class="form-group col-md-12 col-12">
                    <label>Foto Mapel</label>
                    <div class="input-group">
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Pilih File</label>
                            <input type="file" name="photo" id="image-upload" data-toggle="tooltip" data-placement="left" title="Foto Mapel" />
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
                message: 'Mapel Baru Telah Di Tambahkan',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('edit-data'); ?>

        function edit_data() {
            iziToast.success({
                title: 'Tersimpan!',
                message: 'Data Mapel Telah Di Perbaruhi',
                position: 'topRight'
            });
        }
    });

    $(document).ready(function() {
        <?= $this->session->flashdata('hapus-data'); ?>

        function hapus_data() {
            iziToast.warning({
                title: 'Berhasil!',
                message: 'Data Mapel Telah Di Hapus',
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