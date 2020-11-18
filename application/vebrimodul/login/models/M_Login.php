<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Login extends CI_Model
{
    public $table       = 'tbl_siswa';
    public $id          = 'tbl_siswa.id';

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email_siswa, $nisn_siswa)
    {
        $query = $this->db->get_where('tbl_siswa', array('email_siswa' => $email_siswa, 'nisn_siswa' => $nisn_siswa));
        return $query->row_array();
    }

    public function check_account($email_siswa)
    {
        //cari email lalu lakukan validasi
        $this->db->where('email_siswa', $email_siswa);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->active == 0) {
            return 2;
        }
        //jika bernilai 3 maka nisn salah
        if ($this->input->post('nisn_siswa') != $query->nisn_siswa) {
            return 3;
        }

        return $query;
    }

    public function logout($date, $id)
    {
        $this->db->where('tbl_siswa.id', $id);
        $this->db->update('tbl_siswa', $date);
    }
}
