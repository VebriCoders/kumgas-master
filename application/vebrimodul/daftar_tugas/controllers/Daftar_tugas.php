<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_tugas extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Daftar_tugas');
        $this->load->model('M_Detail_tugas');

        $this->check_login();
        // if ($this->session->userdata('id_role') != "1" && $this->session->userdata('id_role') != "2") {
        //     redirect('', 'refresh');
        // }
        if ($this->session->userdata('dia_customer') == '1') {
            redirect('customer', 'refresh');
        } else if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "daftar_tugas",
            'namafileview'     => "v_daftar_tugas",
            'menu'      => "Daftar Tugas",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'tampilData' => $this->M_Daftar_tugas->tampilData(),
            'joinKelas' => $this->M_Daftar_tugas->joinKelas(),
            'joinMapel' => $this->M_Daftar_tugas->joinMapel(),
        );
        echo Modules::run('template/TemplateAdmin_Utama', $data);
    }

    function Tambah_Data()
    {
        $this->M_Daftar_tugas->Tambah_Data();
        $this->session->set_flashdata('simpan-data', 'simpan_data();');

        redirect('daftar_tugas');
    }

    function Edit_Data()
    {
        $this->M_Daftar_tugas->Edit_Data();
        $this->session->set_flashdata('edit-data', 'edit_data();');

        redirect('daftar_tugas');
    }

    function Hapus($code)
    {
        $this->M_Daftar_tugas->Hapus_Data($code);
        $this->session->set_flashdata('hapus-data', 'hapus_data();');

        redirect('daftar_tugas');
    }

    public function detail($slug_tugas)
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $tugas_data_query = $this->M_Detail_tugas->getDataTugas($slug_tugas);

        $data = array(
            'namamodule'     => "daftar_tugas",
            'namafileview'     => "v_daftar_tugas_detail",
            'menu'      => "Detail Pengumpulan Tugas",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'tampilData' => $this->M_Detail_tugas->tampilData($tugas_data_query->id),
            'joinKelas' => $this->M_Daftar_tugas->joinKelas(),
            'joinMapel' => $this->M_Daftar_tugas->joinMapel(),
            'tampilDataFile' => $this->M_Detail_tugas->tampilDataFile($tugas_data_query->id),
        );
        echo Modules::run('template/TemplateAdmin_Utama', $data);
    }
}
