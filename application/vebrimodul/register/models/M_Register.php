<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Register extends CI_Model
{
    function joinKelas()
    {
        $this->db->select('*')
            ->from('tbl_kelas');
        $query = $this->db->get();
        return $query;
    }
}
