<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Daftar_tugas extends CI_Model
{
    private $_table = 'tbl_tugas';

    function tampilData()
    {
        $this->db->select('tbl_tugas.*, tbl_kelas.kelas as nm_kelas, tbl_mapel.nama_mapel as nm_mapel ')
            ->from('tbl_tugas')
            ->order_by('tbl_tugas.id', 'DESC')
            ->join('tbl_kelas', 'tbl_tugas.id_kelas = tbl_kelas.id')
            ->join('tbl_mapel', 'tbl_tugas.id_mapel = tbl_mapel.id');
        return $this->db->get();
    }

    function joinKelas()
    {
        $this->db->select('*')
            ->from('tbl_kelas');
        $query = $this->db->get();
        return $query;
    }

    function joinMapel()
    {
        $this->db->select('*')
            ->from('tbl_mapel');
        $query = $this->db->get();
        return $query;
    }

    public function getById($code)
    {
        return $this->db->get_where($this->_table, ["id" => $code])->row();
    }

    function Tambah_Data()
    {
        date_default_timezone_set("Asia/Bangkok");

        $nama_slug = trim(strtolower($this->input->post('nama_tugas')));
        $out = explode(" ", $nama_slug);
        $slug = implode("-", $out);

        $data = array(
            'id' => uniqid(),
            'id_kelas'    => $this->input->post('id_kelas'),
            'id_mapel'    => $this->input->post('id_mapel'),
            'slug' => $slug,
            'nama_tugas'    => $this->input->post('nama_tugas'),
            'tgl_awal' => date('Y-m-d H:i'),
            'tgl_akhir' => $this->input->post('tgl_akhir'),
            'photo' => $this->_uploadImage(),
            'created_on' => date('Y-m-d  H:i:s'),
            'active' => $this->input->post('active'),
        );

        $this->db->insert($this->_table, $data);
    }

    function Edit_Data()
    {
        date_default_timezone_set("Asia/Bangkok");

        $nama_slug = trim(strtolower($this->input->post('nama_tugas')));
        $out = explode(" ", $nama_slug);
        $slug = implode("-", $out);

        if (!empty($_FILES["photo"]["name"])) {
            $data = array(
                'id_kelas'    => $this->input->post('id_kelas'),
                'id_mapel'    => $this->input->post('id_mapel'),
                'slug' => $slug,
                'nama_tugas'    => $this->input->post('nama_tugas'),
                'tgl_akhir' => $this->input->post('tgl_akhir'),
                'photo' => $this->_uploadImage(),
                'edited_on' => date('Y-m-d  H:i:s'),
                'active' => $this->input->post('active'),
            );
        } else {
            $data = array(
                'id_kelas'    => $this->input->post('id_kelas'),
                'id_mapel'    => $this->input->post('id_mapel'),
                'slug' => $slug,
                'nama_tugas'    => $this->input->post('nama_tugas'),
                'tgl_akhir' => $this->input->post('tgl_akhir'),
                'photo' => $this->input->post('old_image'),
                'edited_on' => date('Y-m-d  H:i:s'),
                'active' => $this->input->post('active'),
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
        $config['upload_path']          = 'assets/upload/foto_tugas/';
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
            return array_map('unlink', glob(FCPATH . "assets/upload/foto_tugas/$filename.*"));
        }
    }
}
