<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class Template extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_Template');

        //Di Matikan MAsih Develop Mode
        // $this->check_login();
        // if (empty($this->session->userdata('id_role'))) {
        //     redirect('', 'refresh');
        // }
    }

    // view core templating
    public function index()
    {
        $this->load->view('v_template_utama_kosongan');
    }

    public function TemplateAdmin_Utama($data)
    {
        $this->load->view('v_template_utama', $data);
    }

    public function TemplateSiswa_Utama($data)
    {
        $this->load->view('v_template_utama_siswa', $data);
    }

    public function TemplateLandingPages($data)
    {
        $this->load->view('v_landing_pages', $data);
    }

    public function TemplateCustomer_Utama($data)
    {
        $this->load->view('v_template_utama_customer', $data);
    }

    public function TemplatePemilih($data)
    {
        $this->load->view('v_template_pemilih', $data);
    }

    public function TemplateErrorPage($data)
    {
        $this->load->view('v_error_page', $data);
    }

    public function TemplatePenjualan($data)
    {
        $this->load->view('v_template_penjualan', $data);
    }
}
