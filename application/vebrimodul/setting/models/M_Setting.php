<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Setting extends CI_Model
{
    private $_table = "tbl_setting";

    public function set_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $query = $this->db->get();
        return $query->row_array();
    }

    function tampilData()
    {
        $this->db->select('tbl_setting.*,')
            ->from('tbl_setting')
            ->order_by('tbl_setting.id', 'ASC'); //DESC
        return $this->db->get();
    }

    function Edit_Utama()
    {
        date_default_timezone_set("Asia/Bangkok");

        $slug_query     = $this->input->post('slug_query');
        $nama_website     = $this->input->post('nama_website');
        $deskripsi     = $this->input->post('deskripsi');

        $this->load->library('upload');
        $nmfile = "$nama_website" . "_" . time();
        $config['upload_path'] = 'assets/img/icon/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '5120';
        $config['max_width'] = '4300';
        $config['max_height'] = '4300';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);

        $nama_slug = trim(strtolower($this->input->post('nama_website')));
        $out = explode(" ", $nama_slug);
        $slug = implode("-", $out);

        if ($_FILES['logo']['name']) {
            if ($this->upload->do_upload('logo')) {
                $gbr = $this->upload->data();
                $data = array(
                    'slug' => $slug,
                    'nama_website' => $nama_website,
                    'deskripsi' => $deskripsi,
                    'logo' => $gbr['file_name'],
                    'update_at' => date('Y-m-d  H:i:s'),
                );
                // print_r($data);
                $this->db->where('slug', $slug_query)->update('tbl_setting', $data);
            }
        } else {
            $data = array(
                'slug' => $slug,
                'nama_website' => $nama_website,
                'deskripsi' => $deskripsi,
                'update_at' => date('Y-m-d  H:i:s'),
            );
            $this->db->where('slug', $slug_query)->update('tbl_setting', $data);
        }
    }

    function Edit_Sosmed()
    {
        date_default_timezone_set("Asia/Bangkok");
        $slug_query     = $this->input->post('slug_query');
        $email    = $this->input->post('email');
        $phone     = $this->input->post('phone');
        $ig     = $this->input->post('ig');
        $fb     = $this->input->post('fb');
        $tw     = $this->input->post('tw');
        $yt     = $this->input->post('yt');

        $data = array(
            'email'    => $email,
            'phone'    => $phone,
            'ig' => $ig,
            'fb' => $fb,
            'tw' => $tw,
            'yt' => $yt,
            'update_at' => date('Y-m-d  H:i:s'),
        );
        $this->db->where('slug', $slug_query)->update('tbl_setting', $data);
    }

    function Edit_Pemilih()
    {
        date_default_timezone_set("Asia/Bangkok");
        $slug_query     = $this->input->post('slug_query');
        $nomor_daftar    = $this->input->post('nomor_daftar');
        $verifikasi_pemilih     = $this->input->post('verifikasi_pemilih');

        $data = array(
            'nomor_daftar'    => $nomor_daftar,
            'verifikasi_pemilih'    => $verifikasi_pemilih,
            'update_at' => date('Y-m-d  H:i:s'),
        );
        $this->db->where('slug', $slug_query)->update('tbl_setting', $data);
    }
}
