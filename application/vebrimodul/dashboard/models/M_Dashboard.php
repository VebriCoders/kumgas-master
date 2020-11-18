<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Dashboard extends CI_Model
{
    public function jmlKelas()
    {
        $query = $this->db->get('tbl_kelas');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlMapel()
    {
        $query = $this->db->get('tbl_mapel');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlSiswa()
    {
        $query = $this->db->get('tbl_siswa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlSelesai()
    {
        $query = $this->db->where('id_siswa', $this->session->userdata('id'))->get('tbl_tugas_siswa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlTugas()
    {
        $query = $this->db->where('active', 1)->get('tbl_tugas');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
