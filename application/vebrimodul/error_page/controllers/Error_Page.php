<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error_Page extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "error_page",
            'namafileview'     => "v_error_404",
            'menu'      => "Error 404",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            // 'tampilData' => $this->M_Setting->tampilData(),
        );
        echo Modules::run('template/TemplateErrorPage', $data);
    }
}
