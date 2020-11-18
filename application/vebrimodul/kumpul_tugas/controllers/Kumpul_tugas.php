<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kumpul_tugas extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kumpul_tugas');

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
            'namamodule'     => "kumpul_tugas",
            'namafileview'     => "v_kumpul_tugas",
            'menu'      => "Kumpul Tugas - " . $user_aktif['nm_kelas'],
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'TampilData_Tugas_Aktif' => $this->M_Kumpul_tugas->TampilData_Tugas_Aktif(),
        );
        echo Modules::run('template/TemplateSiswa_Utama', $data);
    }

    public function detail($slug_tugas)
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_siswa_aktif();
        $tugas_data_query = $this->M_Kumpul_tugas->getDataTugas($slug_tugas);

        $data = array(
            'namamodule'     => "kumpul_tugas",
            'namafileview'     => "v_kumpul_tugas_detail",
            'menu'      => "Kumpul Tugas - " . $user_aktif['nm_kelas'],
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'TampilData_Tugas_Aktif' => $this->M_Kumpul_tugas->TampilData_Tugas_Aktif_Detail($tugas_data_query->id),
        );
        echo Modules::run('template/TemplateSiswa_Utama', $data);
    }

    function kumpul_tugas_siswa()
    {
        $this->M_Kumpul_tugas->kumpul_tugas_siswa();
        $this->session->set_flashdata('selamat-selesai', 'selamat_selesai();');

        redirect('kumpul_tugas');
    }
}
