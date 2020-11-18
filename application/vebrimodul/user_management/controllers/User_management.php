<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_management extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User_management');

        $this->check_login();
        if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "user_management",
            'namafileview'     => "v_user_management",
            'menu'      => "User Management",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'tampilData'    => $this->M_User_management->tampilData(),
            'joinRole' => $this->M_User_management->joinRole(),
        );
        echo Modules::run('template/TemplateAdmin_Utama', $data);
    }

    function Tambah_Data()
    {
        $this->M_User_management->Tambah_Data();
        $this->session->set_flashdata('simpan-data', 'simpan_data();');

        redirect('user_management');
    }

    function Edit_Data()
    {
        $this->M_User_management->Edit_Data();
        $this->session->set_flashdata('edit-data', 'edit_data();');

        redirect('user_management');
    }

    function Hapus($slug)
    {
        $this->M_User_management->Hapus_Data($slug);
        $this->session->set_flashdata('hapus-data', 'hapus_data();');

        redirect('user_management');
    }

    function Ubah_Password()
    {
        $this->M_User_management->Ubah_Password();
        $this->session->set_flashdata('ubah-password', 'ubah_password();');

        redirect('user_management');
    }
}
