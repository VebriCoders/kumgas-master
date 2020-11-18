<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Setting');

        $this->check_login();
        // if ($this->session->userdata('id_role') != "1") {
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
            'namamodule'     => "setting",
            'namafileview'     => "v_setting",
            'menu'      => "Setting Aplikasi",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'tampilData'    => $this->M_Setting->tampilData(),
        );
        echo Modules::run('template/TemplateAdmin_Utama', $data);
    }

    function Edit_Utama()
    {
        $this->M_Setting->Edit_Utama();
        $this->session->set_flashdata('edit-utama', 'edit_utama();');

        redirect('setting');
    }

    function Edit_Sosmed()
    {
        $this->M_Setting->Edit_Sosmed();
        $this->session->set_flashdata('edit-sosmed', 'edit_sosmed();');

        redirect('setting');
    }

    function Edit_Pemilih()
    {
        $this->M_Setting->Edit_Pemilih();
        $this->session->set_flashdata('edit-pemilih', 'edit_pemilih();');

        redirect('setting');
    }
}
