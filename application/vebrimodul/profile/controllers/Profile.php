<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Profile');

        $this->check_login();
        // if ($this->session->userdata('id_role') != "1" && $this->session->userdata('dia_admin') != "1") {
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
            'namamodule'     => "profile",
            'namafileview'     => "v_profile",
            'menu'      => "Profile",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'tampilData' => $this->M_Profile->tampilData(),
        );
        echo Modules::run('template/TemplateAdmin_Utama', $data);
    }

    function Edit_Profile()
    {
        $this->M_Profile->Edit_Profile();
        $this->session->set_flashdata('edit-profile', 'edit_profile();');

        redirect('profile');
    }

    function Ubah_Password()
    {
        $this->M_Profile->Ubah_Password();
        $this->session->set_flashdata('ubah-password', 'ubah_password();');

        redirect('profile');
    }
}
