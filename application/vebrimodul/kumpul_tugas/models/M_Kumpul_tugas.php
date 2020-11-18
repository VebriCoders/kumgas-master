<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Kumpul_tugas extends CI_Model
{
    function TampilData_Tugas_Aktif()
    {
        $this->db->select('tbl_tugas.*, tbl_kelas.kelas as nm_kelas, tbl_mapel.nama_mapel as nm_mapel,tbl_mapel.no_telp_guru_mapel as telp_nm_g_mapel,tbl_mapel.nama_guru_mapel as nm_g_mapel, tbl_mapel.slug as nm_url_slug_mapel,tbl_mapel.id as id_mapel_mapel ')
            ->from('tbl_tugas')
            ->order_by('tbl_tugas.id', 'DESC')
            ->where('tbl_tugas.id_kelas', $this->session->userdata('id_kelas'))
            ->join('tbl_kelas', 'tbl_tugas.id_kelas = tbl_kelas.id')
            ->join('tbl_mapel', 'tbl_tugas.id_mapel = tbl_mapel.id');
        return $this->db->get();
    }

    function TampilData_Tugas_Aktif_Detail($slug_tugas)
    {
        $this->db->select('tbl_tugas.*, tbl_kelas.kelas as nm_kelas, tbl_mapel.nama_mapel as nm_mapel,tbl_mapel.no_telp_guru_mapel as telp_nm_g_mapel,tbl_mapel.nama_guru_mapel as nm_g_mapel, tbl_mapel.slug as nm_url_slug_mapel ,tbl_mapel.id as id_mapel_mapel')
            ->from('tbl_tugas')
            ->order_by('tbl_tugas.id', 'DESC')
            ->where('tbl_tugas.id', $slug_tugas)
            ->join('tbl_kelas', 'tbl_tugas.id_kelas = tbl_kelas.id')
            ->join('tbl_mapel', 'tbl_tugas.id_mapel = tbl_mapel.id');
        return $this->db->get();
    }

    public function getDataTugas($slug_tugas)
    {
        return $this->db->get_where('tbl_tugas', ["slug" => $slug_tugas])->row();
    }

    function kumpul_tugas_siswa()
    {
        date_default_timezone_set("Asia/Bangkok");

        $data = array(
            'id' => uniqid(),
            'id_kelas'    => $this->session->userdata('id_kelas'),
            'id_mapel'    => $this->input->post('ambil_id_mapel'),
            'id_siswa'    => $this->session->userdata('id'),
            'id_tugas'    => $this->input->post('ambil_id_tugas'),
            'file_tugas'  => $this->_PdfUpload(),
            'created_on'  => date('Y-m-d  H:i:s'),
        );

        $this->db->insert("tbl_tugas_siswa", $data);
    }

    private function _PdfUpload()
    {
        $config['upload_path']          = 'assets/upload/file_tugas_siswa/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $this->session->userdata('nama_siswa') . ' - ' . $this->input->post('ambil_nama_tugas') . ' - ' . $this->input->post('ambil_nama_mapel') . ' - ' . $this->input->post('ambil_nama_kelas') . ' - ' . date('Y-m-d');
        $config['overwrite']            = true;
        $config['max_size']             = 23024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_tugas')) {
            return $this->upload->data("file_name");
        }

        return "default.pdf";
    }
}
