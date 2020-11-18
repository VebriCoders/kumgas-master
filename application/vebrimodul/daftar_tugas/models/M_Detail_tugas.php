<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Detail_tugas extends CI_Model
{
    public function getDataTugas($slug_tugas)
    {
        return $this->db->get_where('tbl_tugas', ["slug" => $slug_tugas])->row();
    }

    function tampilData($id)
    {
        $this->db->select('tbl_tugas.*, tbl_kelas.kelas as nm_kelas, tbl_mapel.nama_mapel as nm_mapel ')
            ->from('tbl_tugas')
            ->order_by('tbl_tugas.id', 'DESC')
            ->where('tbl_tugas.id', $id)
            ->join('tbl_kelas', 'tbl_tugas.id_kelas = tbl_kelas.id')
            ->join('tbl_mapel', 'tbl_tugas.id_mapel = tbl_mapel.id');
        return $this->db->get();
    }

    function tampilDataFile($id)
    {
        $this->db->select('tbl_tugas_siswa.*, tbl_kelas.kelas as nm_kelas, tbl_mapel.nama_mapel as nm_mapel,
                           tbl_siswa.photo as photo_siswa ,tbl_siswa.nama_siswa as nm_siswa, tbl_tugas.nama_tugas as nm_tugas ')
            ->from('tbl_tugas_siswa')
            ->order_by('tbl_tugas_siswa.id', 'DESC')
            ->where('tbl_tugas_siswa.id_tugas', $id)
            ->join('tbl_kelas', 'tbl_tugas_siswa.id_kelas = tbl_kelas.id')
            ->join('tbl_mapel', 'tbl_tugas_siswa.id_mapel = tbl_mapel.id')
            ->join('tbl_tugas', 'tbl_tugas_siswa.id_tugas = tbl_tugas.id')
            ->join('tbl_siswa', 'tbl_tugas_siswa.id_siswa = tbl_siswa.id');
        return $this->db->get();
    }
}
