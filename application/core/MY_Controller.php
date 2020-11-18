<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_hmvc_fixes();
        $this->userdata = $this->session->userdata('userdata');
        $this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));
    }

    function _hmvc_fixes()
    {
        //fix callback form_validation
        //https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc
        $this->load->library('form_validation');
        // $this->form_validation->CI = &$this;
        // $this->form_validation->set_ci_reference($this);
    }

    public function check_login()
    {
        // pengecekan jika tidak ada email dari session maka diarahkan untuk login
        if (!$this->session->userdata('is_login')) {
            redirect('auth/login');
        }
    }

    public function check_login_siswa()
    {
        // pengecekan jika tidak ada email dari session maka diarahkan untuk login
        if (!$this->session->userdata('is_login')) {
            redirect('login');
        }
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
