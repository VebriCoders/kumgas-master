<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Page');

        // $this->check_login();
        // if ($this->session->userdata('id_role') != "1" && $this->session->userdata('id_role') != "2") {
        //     redirect('', 'refresh');
        // }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "page",
            'namafileview'     => "v_awal",
            'menu'      => "KUMGAS - Kumpul Tugas",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            // 'tampilData' => $this->M_Setting->tampilData(),
        );
        echo Modules::run('template/TemplateLandingPages', $data);
    }

    public function about()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "page",
            'namafileview'     => "v_about",
            'menu'      => "KUMGAS - Kumpul Tugas",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            // 'tampilData' => $this->M_Setting->tampilData(),
        );
        echo Modules::run('template/TemplateLandingPages', $data);
    }

    public function how_to_operate()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "page",
            'namafileview'     => "v_how_to_operate",
            'menu'      => "KUMGAS - Kumpul Tugas",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            // 'tampilData' => $this->M_Setting->tampilData(),
        );
        echo Modules::run('template/TemplateLandingPages', $data);
    }

    public function contact_us()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "page",
            'namafileview'     => "v_contact_us",
            'menu'      => "KUMGAS - Kumpul Tugas",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            // 'tampilData' => $this->M_Setting->tampilData(),
        );
        echo Modules::run('template/TemplateLandingPages', $data);
    }
}
