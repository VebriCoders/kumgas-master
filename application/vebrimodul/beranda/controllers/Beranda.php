<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Beranda');

        $this->check_login();

        if ($this->session->userdata('siswa_login') == '1') {
            redirect('dashboard', 'refresh');
        } else if ($this->session->userdata('id_role') != "1") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "beranda",
            'namafileview'     => "v_beranda",
            'menu'      => "Beranda",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'jmlKelas' => $this->M_Beranda->jmlKelas(),
            'jmlMapel' => $this->M_Beranda->jmlMapel(),
            'jmlSiswa' => $this->M_Beranda->jmlSiswa(),
            'jmlTugas' => $this->M_Beranda->jmlTugas(),
        );
        echo Modules::run('template/TemplateAdmin_Utama', $data);
    }
}
