<div class="main-content">
    <section class="section">
        <div class="section-header">
            <?php
            $i = 1;
            foreach ($tampilData->result() as $data) { ?>
                <h1><?= $menu; ?> - <?php echo $data->nm_mapel ?> (<?php echo $data->nm_kelas ?>)</h1>
            <?php $i++;
            } ?>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></div>
                <div class="breadcrumb-item"><a href="">Master Tugas</a></div>
                <div class="breadcrumb-item"><?= $menu; ?></div>
            </div>
        </div>

        <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama') ?> - <?php if ($this->session->userdata('id_role') == "1") { ?> Admin <?php } else { ?>Panitia <?php } ?>!</h2>
        <p class="section-lead">
            Simpan Atau Download Semua Tugas Yang Sudah Di Kumpulkan Siswa!
        </p>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                        $i = 1;
                        foreach ($tampilData->result() as $data) { ?>
                            <h4><?= $menu; ?> - <?php echo $data->nm_mapel ?> (<?php echo $data->nm_kelas ?>)</h4>
                        <?php $i++;
                        } ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Photo Siswa</th>
                                        <th>Nama Siswa (Kelas)</th>
                                        <th>Nama Tugas (Mapel)</th>
                                        <!-- <th>Lihat File (PDF)</th> -->
                                        <th>Tanggal Di Kumpulkan</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($tampilDataFile->result() as $data) { ?>
                                        <tr>
                                            <td class="align-middle">
                                                <?php echo $i ?>
                                            </td>
                                            <td class="align-middle">
                                                <img alt="image" src="<?php echo base_url() ?>/assets/upload/foto_siswa/<?php echo $data->photo_siswa ?>" class="rounded-circle" width="50" height="50" data-toggle="tooltip" title="<?php echo $data->nm_siswa ?>">
                                            </td>
                                            <td class="align-middle"><?php echo $data->nm_siswa ?> (<?php echo $data->nm_kelas ?>)</td>
                                            <td class="align-middle"><?php echo $data->nm_tugas ?> (<?php echo $data->nm_mapel ?>)</td>
                                            <!-- <td class="align-middle"> <button class="btn btn-icon  btn-primary" data-toggle="modal" data-target="#modal_lihat<?php echo $data->id ?>" title="Lihat File PDF Tugas Siswa"><i class="fa fa-file-pdf"></i> </button></td> -->
                                            <td class="align-middle"><?php echo $data->created_on ?></td>
                                            <td class="align-middle">
                                                <a href="<?php echo base_url() ?>/assets/upload/file_tugas_siswa/<?php echo $data->file_tugas ?>" class="btn btn-icon  btn-primary" data-toggle="tooltip" data-placement="top" title="Download File Tugas Siswa"><i class="fa fa-download"></i> </a>
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
foreach ($tampilDataFile->result() as $data) { ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal_lihat<?php echo $data->id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lihat PDF Tugas <?php echo $data->nm_siswa ?>!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="<?php echo base_url() ?>/assets/upload/file_tugas_siswa/<?php echo $data->file_tugas ?>" type='application/pdf' width='100%'>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $i++;
} ?>


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