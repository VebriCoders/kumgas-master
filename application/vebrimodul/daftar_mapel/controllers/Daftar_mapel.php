<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_mapel extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Daftar_mapel');

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
            'namamodule'     => "daftar_mapel",
            'namafileview'     => "v_daftar_mapel",
            'menu'      => "Daftar Mata Pelajaran",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'tampilData' => $this->M_Daftar_mapel->tampilData(),
            'joinKelas' => $this->M_Daftar_mapel->joinKelas(),
        );
        echo Modules::run('template/TemplateAdmin_Utama', $data);
    }

    function Tambah_Data()
    {
        $this->M_Daftar_mapel->Tambah_Data();
        $this->session->set_flashdata('simpan-data', 'simpan_data();');

        redirect('daftar_mapel');
    }

    function Edit_Data()
    {
        $this->M_Daftar_mapel->Edit_Data();
        $this->session->set_flashdata('edit-data', 'edit_data();');

        redirect('daftar_mapel');
    }

    function Hapus($code)
    {
        $this->M_Daftar_mapel->Hapus_Data($code);
        $this->session->set_flashdata('hapus-data', 'hapus_data();');

        redirect('daftar_mapel');
    }
}
