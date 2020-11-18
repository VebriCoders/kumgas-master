<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');

        // $this->check_login();
        // if ($this->session->userdata('id_role') != "1" && $this->session->userdata('id_role') != "2") {
        //     redirect('', 'refresh');
        // }
    }

    public function check_account()
    {
        //validasi login
        $email_siswa      = $this->input->post('email_siswa');
        $nisn_siswa   = $this->input->post('nisn_siswa');

        //ambil data dari database untuk validasi login
        $query = $this->M_Login->check_account($email_siswa, $nisn_siswa);
        $website = $this->M_Setting->set_setting();

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-has-icon">
                                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                                    <div class="alert-body">
                                                        <div class="alert-title">Gagal!</div>
                                                        Email Akun Kamu Tidak Terdaftar.
                                                        </div>
                                                    </div>');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-has-icon">
                                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                                    <div class="alert-body">
                                                        <div class="alert-title">Gagal!</div>
                                                        Email Akun Kamu Tidak Aktif, Hub Administrator (' . $website['phone'] . ').
                                                        </div>
                                                    </div>');
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-has-icon">
                                                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                                    <div class="alert-body">
                                                        <div class="alert-title">Gagal!</div>
                                                        NISN Kamu Salah.
                                                        </div>
                                                    </div>');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
                'is_login'      => true,
                'id'            => $query->id,
                'id_kelas'      => $query->id_kelas,
                'slug'          => $query->slug,
                'nisn_siswa'    => $query->nisn_siswa,
                'nama_siswa'    => $query->nama_siswa,
                'email_siswa'   => $query->email_siswa,
                'no_telp_siswa' => $query->no_telp_siswa,
                'photo'         => $query->photo,
                'created_on'    => $query->created_on,
                'edited_on'     => $query->edited_on,
                'active'        => $query->active,
                'last_login'    => $query->last_login,
                'siswa_login'   => '1',
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "login",
            'namafileview'     => "v_login",
            'menu'      => $website['nama_website'] . " - " . "Login Siswa",
            'cpyweb' => "Pradana Indistries 2020",
            'website' => $website,
            'user_aktif' => $user_aktif,
        );

        //Jika Siswa Sudah Login
        if ($this->session->userdata('siswa_login') == "1") {
            redirect('dashboard');
        }

        $this->load->view('v_login', $data);
    }

    public function proses_login()
    {
        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'namamodule'     => "login",
            'namafileview'     => "v_login",
            'menu'      => $website['nama_website'] . " - " . "Login Siswa",
            'cpyweb' => "Pradana Indistries 2020",
            'website' => $website,
            'user_aktif' => $user_aktif,
        );

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('email_siswa', 'Email Siswa', 'trim|required|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('nisn_siswa', 'NISN Siswa', 'trim|required|min_length[10]|max_length[15]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->M_Login->check_account($this->input->post('email_siswa'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman dashboard
                //Update Last Login
                date_default_timezone_set("Asia/Bangkok");
                $id = $this->session->userdata('id');
                $data = [
                    'last_login' => date('Y-m-d  H:i:s'),
                ];
                $this->db->where('id', $id)->update('tbl_siswa', $data);

                $this->session->set_flashdata('selamat-datang', 'selamat_datang();');
                redirect('dashboard');
            } else {
                $this->load->view('v_login', $data);
            }
        }
    }

    public function logout()
    {
        date_default_timezone_set("Asia/Bangkok");

        $id = $this->session->userdata('id');
        $data = [
            'last_logout' => date('Y-m-d  H:i:s'),
        ];
        // $this->db->update('tbl_user', $data);
        $this->db->where('id', $id)->update('tbl_siswa', $data);

        $this->session->sess_destroy();
        redirect('login');
    }
}
