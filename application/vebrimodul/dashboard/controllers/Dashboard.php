<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Dashboard');

        $this->check_login_siswa();

        if ($this->session->userdata('dia_admin') == '1') {
            redirect('beranda', 'refresh');
        } else if ($this->session->userdata('siswa_login') != "1") {
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_siswa_aktif();
        $data = array(
            'namamodule'     => "dashboard",
            'namafileview'     => "v_dashboard",
            'menu'      => "Dashboard Siswa - " . $user_aktif['nm_kelas'],
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'jmlKelas' => $this->M_Dashboard->jmlKelas(),
            'jmlMapel' => $this->M_Dashboard->jmlMapel(),
            'jmlSiswa' => $this->M_Dashboard->jmlSiswa(),
            'jmlTugas' => $this->M_Dashboard->jmlTugas(),
            'jmlSelesai' => $this->M_Dashboard->jmlSelesai(),
        );
        echo Modules::run('template/TemplateSiswa_Utama', $data);
    }
}
