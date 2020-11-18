<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->helper('form');
        // $this->load->library(array('my_form_validation'));
        // $this->form_validation->run($this);
        // $this->load->database();
        $this->load->model('M_Auth');

        if ($this->session->userdata('dia_customer') == '1') {
            redirect('customer', 'refresh');
        }
    }

    public function check_account()
    {
        //validasi login
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->M_Auth->check_account($email, $password);

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Email Anda Tidak Terdaftar! </div>');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Email Anda Tidak Aktif, Hubungi Administrator! </div>');
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Password Anda Salah! </div>');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
                'is_login'    => true,
                'id'          => $query->id,
                'password'    => $query->password,
                'id_role'     => $query->id_role,
                'slug'        => $query->slug,
                'nama'        => $query->nama,
                'email'       => $query->email,
                'phone'       => $query->phone,
                'photo'       => $query->photo,
                'created_on'  => $query->created_on,
                'last_login'  => $query->last_login,
                'dia_admin' => '1',
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }

    public function login()
    {
        // Identitas Halaman Melalui Setting
        // $site = $this->Konfigurasi_model->listing();
        // $data = array(
        //     'title'     => 'Login | '.$site['nama_website'],
        //     'favicon'   => $site['favicon'],
        //     'site'      => $site
        // );

        $website = $this->M_Setting->set_setting();
        $user_aktif = $this->M_Profile->tampil_user_aktif();
        $data = array(
            'title'     => 'Admin Login | ' . $website['nama_website'],
            'website' => $website,
            'user_aktif' => $user_aktif,
        );

        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('id_role') == "1") {
            redirect('beranda');
        }
        // if ($this->session->userdata('id_role') == "2") {
        //     redirect('beranda');
        // }
        // if ($this->session->userdata('id_role') == "3") {
        //     redirect('beranda');
        // }

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->M_Auth->check_account($this->input->post('email'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->id_role == '1') {
                    //Update Last Login
                    date_default_timezone_set("Asia/Bangkok");
                    $id = $this->session->userdata('id');
                    $data = [
                        'last_login' => date('Y-m-d  H:i:s'),
                    ];
                    $this->db->where('id', $id)->update('tbl_user', $data);
                    $this->session->set_flashdata('selamat-datang', 'selamat_datang();');
                    redirect('beranda');
                } elseif ($data->id_role == '2') {
                    //Update Last Login
                    date_default_timezone_set("Asia/Bangkok");
                    $id = $this->session->userdata('id');
                    $data = [
                        'last_login' => date('Y-m-d  H:i:s'),
                    ];
                    $this->db->where('id', $id)->update('tbl_user', $data);
                    redirect('beranda');
                } elseif ($data->id_role == '3') {
                    //Update Last Login
                    date_default_timezone_set("Asia/Bangkok");
                    $id = $this->session->userdata('id');
                    $data = [
                        'last_login' => date('Y-m-d  H:i:s'),
                    ];
                    $this->db->where('id', $id)->update('tbl_user', $data);
                    redirect('beranda');
                }
            } else {
                $this->load->view('v_login', $data);
            }
        } else {
            $this->load->view('v_login', $data);
        }
    }

    public function logout()
    {
        date_default_timezone_set("Asia/Bangkok");
        $id = $this->session->userdata('id');
        // echo "string ".$id;
        $data = [
            'last_logout' => date('Y-m-d  H:i:s'),
        ];
        // $this->db->update('tbl_user', $data);
        $this->db->where('id', $id)->update('tbl_user', $data);

        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function register()
    {
        date_default_timezone_set("Asia/Bangkok");

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('phone', 'phone', 'required|trim');
        $this->form_validation->set_rules('email_a', 'email_a', 'required|trim|valid_email');
        // $this->form_validation->set_rules('email_a', 'email_a', 'required|trim|valid_email|is_unique[tbl_user.email]', [
        //     'is_unique' => 'Email Ini Sudah Terdaftar!'
        // ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[22]|matches[password_konfirmasi]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password_konfirmasi', 'password_konfirmasi', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $website = $this->M_Setting->set_setting();
            $data = array(
                'title'     => 'Admin Registrasi | ' . $website['nama_website'],
                'website' => $website,
            );
            $this->load->view('v_register', $data);
        } else {
            $email = $this->input->post('email_a', true);
            $nama = $this->input->post('nama');
            $phone = $this->input->post('phone');
            // $id_role = $this->input->post('id_role');

            $nama_slug = trim(strtolower($this->input->post('nama')));
            $out = explode(" ", $nama_slug);
            $slug = implode("-", $out);

            $data = [
                'slug' => $slug,
                'nama' => $nama,
                'phone' => $phone,
                'email' => $email,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_role' => 2,
                'active' => 0,
                'photo' => "default.jpg",
                'created_on' => date('Y-m-d  h:i:s a'),
                'bio' => "Hai Saya Adalah User Dari Toko Online Pradana Komputer, By <b>Pradana Industries</b>",
                // 'date_created_email' => time(),
            ];

            // siapkan token
            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created_email' => time()
            // ];

            $this->db->insert('tbl_user', $data);
            // $this->db->insert('tbl_user_token', $user_token);
            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', ' <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> Berhasil ! Silahkan Cek Email Untuk Aktifikasi </div>');

            redirect('auth/login');
        }
    }
}
