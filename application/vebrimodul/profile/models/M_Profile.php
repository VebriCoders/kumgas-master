<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_Profile extends CI_Model
{
    public function tampil_user_aktif()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('tbl_user.slug', $this->session->userdata('slug'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tampil_siswa_aktif()
    {
        $this->db->select('*, tbl_siswa.photo as siswa_poto, tbl_kelas.kelas as nm_kelas, tbl_siswa.created_on as siswa_akun');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id');
        $this->db->where('tbl_siswa.id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->row_array();
    }

    function tampilData()
    {
        $this->db->select('tbl_user.*,')
            ->from('tbl_user')
            ->where('tbl_user.slug', $this->session->userdata('slug'))
            ->order_by('tbl_user.id', 'ASC'); //DESC
        return $this->db->get();
    }

    function Edit_Profile()
    {
        date_default_timezone_set("Asia/Bangkok");

        $slug_query     = $this->input->post('slug_query');
        $nama     = $this->input->post('nama');

        $phone     = $this->input->post('phone');
        $bio     = $this->input->post('bio');
        // $id_role     = $this->input->post('id_role');

        $this->load->library('upload');
        $nmfile = "$nama" . "_" . time();
        $config['upload_path'] = 'assets/img/upload/user-photo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '5120';
        $config['max_width'] = '4300';
        $config['max_height'] = '4300';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);

        if ($_FILES['photo']['name']) {
            if ($this->upload->do_upload('photo')) {
                $gbr = $this->upload->data();
                $data = array(
                    'phone' => $phone,
                    'bio' => $bio,
                    'photo' => $gbr['file_name'],
                    'update_at' => date('Y-m-d  H:i:s'),
                );
                $this->db->where('slug', $slug_query)->update('tbl_user', $data);
            }
        } else {
            $data = array(
                'phone' => $phone,
                'bio' => $bio,
                'update_at' => date('Y-m-d  H:i:s'),
            );
            $this->db->where('slug', $slug_query)->update('tbl_user', $data);
        }
    }

    function Ubah_Password()
    {
        $slug_query     = $this->input->post('slug_query');
        $data = array(
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        );
        $this->db->where('slug', $slug_query)->update('tbl_user', $data);
    }
}
