<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Beranda extends CI_Model
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

    public function jmlTugas()
    {
        $query = $this->db->get('tbl_tugas');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
