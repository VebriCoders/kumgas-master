<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class M_User_management extends CI_Model
{
    private $_table = "tbl_user";

    function tampilData()
    {
        $this->db->select('tbl_user.*, tbl_role.jabatan as jabatan_tampil')
            ->from('tbl_user')
            ->join('tbl_role', 'tbl_user.id_role = tbl_role.id')
            ->order_by('tbl_user.id', 'ASC'); //DESC
        return $this->db->get();
    }

    function joinRole()
    {
        $this->db->select('*')
            ->from('tbl_role');
        $query = $this->db->get();
        return $query;
    }

    function Tambah_Data()
    {
        date_default_timezone_set("Asia/Bangkok");

        $nama     = $this->input->post('nama');
        $email     = $this->input->post('email');
        $phone     = $this->input->post('phone');
        $active     = $this->input->post('active');
        $id_role     = $this->input->post('id_role');

        $this->load->library('upload');
        $nmfile = "$nama" . "_" . time();
        $config['upload_path'] = 'assets/img/upload/user-photo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '5120';
        $config['max_width'] = '4300';
        $config['max_height'] = '4300';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);

        $nama_slug = trim(strtolower($this->input->post('nama')));
        $out = explode(" ", $nama_slug);
        $slug = implode("-", $out);

        if ($_FILES['photo']['name']) {
            if ($this->upload->do_upload('photo')) {
                $gbr = $this->upload->data();
                $data = array(
                    'slug' => $slug,
                    'nama'    => $nama,
                    'email' => $email,
                    'phone' => $phone,
                    'active' => $active,
                    'photo' => $gbr['file_name'],
                    'bio' => 'Hai Saya Adalah Admin Dari Evoting Lite, By Pradana Industries',
                    'created_on' => date('Y-m-d  H:i:s'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'id_role' => $id_role,
                );
                $this->db->insert('tbl_user', $data);
            }
        } else {
            $data = array(
                'slug' => $slug,
                'nama'    => $nama,
                'email' => $email,
                'phone' => $phone,
                'active' => $active,
                'bio' => 'Hai Saya Adalah Admin Dari Evoting Lite, By Pradana Industries',
                'created_on' => date('Y-m-d  H:i:s'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_role' => $id_role,
            );
            $this->db->insert('tbl_user', $data);
        }
    }

    function Edit_Data()
    {
        date_default_timezone_set("Asia/Bangkok");

        $slug_query     = $this->input->post('slug_query');
        $nama     = $this->input->post('nama');
        $email     = $this->input->post('email');
        $phone     = $this->input->post('phone');
        $active     = $this->input->post('active');
        $id_role     = $this->input->post('id_role');

        $this->load->library('upload');
        $nmfile = "$nama" . "_" . time();
        $config['upload_path'] = 'assets/img/upload/user-photo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '5120';
        $config['max_width'] = '4300';
        $config['max_height'] = '4300';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);

        $nama_slug = trim(strtolower($this->input->post('nama')));
        $out = explode(" ", $nama_slug);
        $slug = implode("-", $out);

        if ($_FILES['photo']['name']) {
            if ($this->upload->do_upload('photo')) {
                $gbr = $this->upload->data();
                $data = array(
                    'slug' => $slug,
                    'nama'    => $nama,
                    'email' => $email,
                    'phone' => $phone,
                    'active' => $active,
                    'photo' => $gbr['file_name'],
                    // 'bio' => 'Hai Saya Adalah Admin Dari Evoting Lite, By Pradana Industries',
                    'update_at' => date('Y-m-d  H:i:s'),
                    // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'id_role' => $id_role,
                );
                $this->db->where('slug', $slug_query)->update('tbl_user', $data);
            }
        } else {
            $data = array(
                'slug' => $slug,
                'nama'    => $nama,
                'email' => $email,
                'phone' => $phone,
                'active' => $active,
                // 'bio' => 'Hai Saya Adalah Admin Dari Evoting Lite, By Pradana Industries',
                'update_at' => date('Y-m-d  H:i:s'),
                // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_role' => $id_role,
            );
            $this->db->where('slug', $slug_query)->update('tbl_user', $data);
        }
    }

    public function getById($slug)
    {
        return $this->db->get_where($this->_table, ["slug" => $slug])->row();
    }

    function Hapus_Data($slug)
    {
        $this->_deleteImage($slug);
        $this->db->where('slug', $slug)->delete('tbl_user');
    }

    private function _deleteImage($slug)
    {
        $user = $this->getById($slug);
        if ($user->photo != "default.jpg") {
            $filename = explode(".", $user->photo)[0];
            return array_map('unlink', glob(FCPATH . "assets/img/upload/user-photo/$filename.*"));
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
