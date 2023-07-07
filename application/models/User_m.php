<?php

class User_m extends CI_Model
{

    private $data_ = 'user_';
    public $unggah = 'unggah_';


    function data_user()
    {


        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('user_');
        $this->db->where('is_active', '1');
        $query = $this->db->get();
        return $query->result();
    }
    public function jmlTamu()
    {
        $query = $this->db->query(
            "SELECT COUNT(id_usr) as tamu
                               FROM user_
                               WHERE level_ = '2'"

        );
        if ($query->num_rows() > 0) {
            return $query->row()->tamu;
        } else {
            return 0;
        }
    }
    public function jmlBantara()
    {
        $query = $this->db->query(
            "SELECT COUNT(id_usr) as bantara
                               FROM user_
                               WHERE level_ = '3'"

        );
        if ($query->num_rows() > 0) {
            return $query->row()->bantara;
        } else {
            return 0;
        }
    }
    public function jmlLaksana()
    {
        $query = $this->db->query(
            "SELECT COUNT(id_usr) as laksana
                               FROM user_
                               WHERE level_ = '4'"

        );
        if ($query->num_rows() > 0) {
            return $query->row()->laksana;
        } else {
            return 0;
        }
    }
    public function jmlPr()
    {
        $query = $this->db->query(
            "SELECT COUNT(id_usr) as perempuan
                               FROM user_
                               WHERE jk_ = 'perempuan'"

        );
        if ($query->num_rows() > 0) {
            return $query->row()->perempuan;
        } else {
            return 0;
        }
    }
    public function jmlLk()
    {
        $query = $this->db->query(
            "SELECT COUNT(id_usr) as laki
                               FROM user_
                               WHERE jk_ = 'laki-laki'"

        );
        if ($query->num_rows() > 0) {
            return $query->row()->laki;
        } else {
            return 0;
        }
    }
    function dataTamu()
    {


        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('user_');
        $this->db->where('level_', '2');
        $query = $this->db->get();
        return $query->result();
    }
    function dataBantara()
    {


        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('user_');
        $this->db->where('level_', '3');
        $query = $this->db->get();
        return $query->result();
    }
    function dataLaksana()
    {


        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('user_');
        $this->db->where('level_', '4');
        $query = $this->db->get();
        return $query->result();
    }
    function dataPr()
    {


        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('user_');
        $this->db->where('jk_', 'perempuan');
        $query = $this->db->get();
        return $query->result();
    }
    function dataLk()
    {


        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('user_');
        $this->db->where('jk_', 'laki-laki');
        $query = $this->db->get();
        return $query->result();
    }
    public function edit_usr($id_usr)
    {
        $query = $this->db->query("select * from user_ where id_usr='$id_usr'");
        return $query->result_array();
    }
    public function update_usr($id_usr, $data)
    {
        $this->db->where('id_usr', $id_usr);
        return $this->db->update("user_", $data);
    }
    function data_form($id_usr)
    {
        $query = $this->db->query("select * from unggah_ where id_siswa='$id_usr'");
        return $query->result();
    }
    function Tdk_aktif()
    {
        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('user_');
        $this->db->where('is_active', '0');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id_usr)
    {
        return $this->db->get_where($this->data_, ["id_usr" => $id_usr])->row();
    }
    public function data_login()
    {
        $this->db->select('*');
        $this->db->from('login_session');
        $this->db->join('login' . 'login.u_id=user.u_id');
        $query = $this->db->get();
        return $query;
    }
    public function data_join2tabel()
    {
        $this->db->select('*');
        $this->db->from('login_session');
        $this->db->join('login' . 'login.u_id=user.u_id');
        $query = $this->db->get();
        return $query;
    }
    public function insertData($data)
    {

        $this->db->insert('user_', $data);
    }
    function edit_profil()
    {
        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('user_');
        $this->db->where('id_usr');
        $query = $this->db->get();
        return $query->result();
    }

    function update_profil($id_usr, $data)
    {
        $this->db->where('id_usr', $id_usr);
        return $this->db->update("user_", $data);
    }
    function hapus_usr($id_usr)
    {
        $this->db->where('id_usr', $id_usr);
        return $this->db->delete('user_');
    }

    public function count()
    {
        return $this->db->count_all($this->_table);
    }
    public function ubah_status($id_usr, $data)
    {
        $this->db->where('id_usr', $id_usr);
        return $this->db->update("user_", $data);
    }
}