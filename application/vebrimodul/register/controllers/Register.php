<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Register');

        $this->load->helper('form');
        $this->load->library('form_validation');

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
            'namamodule'     => "register",
            'namafileview'     => "v_register",
            'menu'      => $website['nama_website'] . " - " . "Register Siswa",
            'cpyweb' => "Pradana Indistries 2020",
            //variable
            'website' => $website,
            'user_aktif' => $user_aktif,
            'joinKelas' => $this->M_Register->joinKelas(),
            // 'tampilData' => $this->M_Setting->tampilData(),
        );
        // echo Modules::run('template/TemplateAdmin_Utama', $data);
        $this->load->view('v_register', $data);
    }

    public function register_add()
    {
        //Cek Data NISN
        $nisn_siswa = $this->input->post('nisn_siswa');
        $sql = $this->db->query("SELECT nisn_siswa FROM tbl_siswa where nisn_siswa='$nisn_siswa'");
        $cek_nisn = $sql->num_rows();
        if ($cek_nisn > 0) {
            $this->session->set_flashdata('message_register_nisn_double', '<div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Gagal</div>
                Nomor NISN Sudah Terdaftar Sebelumnya.
                </div>
            </div>');

            $website = $this->M_Setting->set_setting();
            $user_aktif = $this->M_Profile->tampil_user_aktif();
            $data = array(
                'namamodule'     => "register",
                'namafileview'     => "v_register",
                'menu'      => $website['nama_website'] . " - " . "Register Siswa",
                'cpyweb' => "Pradana Indistries 2020",
                //variable
                'website' => $website,
                'user_aktif' => $user_aktif,
                'joinKelas' => $this->M_Register->joinKelas(),
                // 'tampilData' => $this->M_Setting->tampilData(),
            );
            $this->load->view('v_register', $data);
        } else {
            date_default_timezone_set("Asia/Bangkok");

            $nama_slug = trim(strtolower($this->input->post('nama_siswa')));
            $out = explode(" ", $nama_slug);
            $slug = implode("-", $out);

            $email = $this->input->post('eml_a', true);

            $data = [
                'id' => uniqid(),
                'id_kelas' => $this->input->post('id_kelas'),
                'slug' => $slug,
                'nisn_siswa' => $this->input->post('nisn_siswa'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'email_siswa' => $email,
                'no_telp_siswa' => $this->input->post('no_telp_siswa'),
                'photo' => 'default.jpg',
                'created_on' => date('Y-m-d  H:i:s'),
                'active' => 0,
            ];

            // print_r($data);

            $this->db->insert('tbl_siswa', $data);

            $this->session->set_flashdata('message_berhasil_membuat_akun', '<div class="alert alert-success alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Success</div>
                Akun Kamu Telah Di Buat, Silahkan Login.
                </div>
            </div>');

            redirect('login');
        }
    }
}
