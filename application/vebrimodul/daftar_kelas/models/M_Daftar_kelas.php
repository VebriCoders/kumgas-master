<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Daftar_kelas extends CI_Model
{
    private $_table = 'tbl_kelas';

    function tampilData()
    {
        $this->db->select('tbl_kelas.*,')
            ->from('tbl_kelas')
            ->order_by('tbl_kelas.id', 'DESC');
        return $this->db->get();
    }

    public function getById($code)
    {
        return $this->db->get_where($this->_table, ["id" => $code])->row();
    }

    function Tambah_Data()
    {
        date_default_timezone_set("Asia/Bangkok");

        $nama_slug = trim(strtolower($this->input->post('kelas')));
        $out = explode(" ", $nama_slug);
        $slug = implode("-", $out);

        $data = array(
            'id' => uniqid(),
            'slug' => $slug,
            'kelas'    => $this->input->post('kelas'),
            'nama_wakel' => $this->input->post('nama_wakel'),
            'no_telp_wakel' => $this->input->post('no_telp_wakel'),
            'photo' => $this->_uploadImage(),
            'created_on' => date('Y-m-d  H:i:s'),
        );

        $this->db->insert($this->_table, $data);
    }

    function Edit_Data()
    {
        date_default_timezone_set("Asia/Bangkok");

        $nama_slug = trim(strtolower($this->input->post('kelas')));
        $out = explode(" ", $nama_slug);
        $slug = implode("-", $out);

        if (!empty($_FILES["photo"]["name"])) {
            $data = array(
                'slug' => $slug,
                'kelas'    => $this->input->post('kelas'),
                'nama_wakel' => $this->input->post('nama_wakel'),
                'no_telp_wakel' => $this->input->post('no_telp_wakel'),
                'photo' => $this->_uploadImage(),
                'edited_on' => date('Y-m-d  H:i:s'),
            );
        } else {
            $data = array(
                'slug' => $slug,
                'kelas'    => $this->input->post('kelas'),
                'nama_wakel' => $this->input->post('nama_wakel'),
                'no_telp_wakel' => $this->input->post('no_telp_wakel'),
                'photo' => $this->input->post('old_image'),
                'edited_on' => date('Y-m-d  H:i:s'),
            );
        }

        $this->db->where('id', $this->input->post('code_query'))->update($this->_table, $data);
    }

    function Hapus_Data($code)
    {
        $this->_deleteImage($code);
        $this->db->where('id', $code)->delete($this->_table);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/upload/foto_kelas/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = "LOGO KELAS - " . $this->input->post('kelas') . " - " . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteImage($code)
    {
        $data = $this->getById($code);
        if ($data->photo != "default.jpg") {
            $filename = explode(".", $data->photo)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/foto_kelas/$filename.*"));
        }
    }
}
