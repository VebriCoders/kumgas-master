<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Module_kosongan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Module_kosongan');

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
            'namamodule'     => "module_kosongan",
            'namafileview'     => "v_module_kosongan",
            'menu'      => "module_kosongan",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            // 'tampilData' => $this->M_Setting->tampilData(),
        );
        echo Modules::run('template/TemplateAdmin_Utama', $data);
    }
}
