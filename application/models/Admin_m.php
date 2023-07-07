<?php

class Admin_m extends CI_Model
{

    private $data_ = 'admin_';
    public $_data = 'user_';
    public $data = 'penempuhan_';
    public $data1 = 'penjadwalan_';


    // public function getById($u_id)
    // {
    //     return $this->db->get_where($this->data_, ["u_id" => $u_id])->row();
    // }

    // function getWelcome()
    // {

    //     $query = $this->db->get($this->data_);
    //     return $query->result();
    // }
    public function jmlAdmin()
    {
        $query = $this->db->query(
            "SELECT COUNT(id_adm) as pembina
                               FROM admin_
                               WHERE is_active = '1'"

        );
        if ($query->num_rows() > 0) {
            return $query->row()->pembina;
        } else {
            return 0;
        }
    }
    public function jmlAnggota()
    {
        $query = $this->db->query(
            "SELECT COUNT(id_usr) as anggota
                               FROM user_
                               WHERE is_active = '1'"

        );
        if ($query->num_rows() > 0) {
            return $query->row()->anggota;
        } else {
            return 0;
        }
    }
    public function eskuBantara()
    {
        $query = $this->db->get('penempuhan_');
        $this->db->select('id_tempuh');
        $this->db->from('penempuhan_');
        $this->db->where('tingkat_sku', 'bantara');
        $this->db->group_by('id_siswa');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function eskuLaksana()
    {
        $query = $this->db->get('penempuhan_');
        $this->db->select('id_tempuh');
        $this->db->from('penempuhan_');
        $this->db->where('tingkat_sku', 'laksana');
        $this->db->group_by('id_siswa');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function data_admin()
    {

        // $query = $this->db->get($this->data_);
        // return $query->result();
        // $query = $this->db->get($this->_data);
        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('admin_');
        $this->db->where('is_active', '1');
        $query = $this->db->get();
        return $query->result();

        // $this->db->or_where('gol_', 'bantara');
        // $this->db->or_where('gol_', 'laksana');
        // $query = $this->db->get();
        // return $query->result();
    }
    function Tdk_aktif()
    {


        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('admin_');
        $this->db->where('is_active', '0');
        $query = $this->db->get();
        return $query->result();
    }
    function Penjadwalan()
    {
        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('penjadwalan_');
        $query = $this->db->get();
        return $query->result();
    }
    function jadwal_aktif()
    {
        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('penjadwalan_');
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result();
    }
    public function insertJadwal($data)
    {

        $this->db->insert('penjadwalan_', $data);
    }
    public function ubah_jadwal($id_jadwal, $data)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        return $this->db->update("penjadwalan_", $data);
    }
    function hapus_jadwal($id_jadwal)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        return $this->db->delete('penjadwalan_');
    }
    public function rules()
    {
        return [
            [
                'field' => 'is_active',
                'label' => 'Status',
                'rules' => 'required'
            ]


        ];
    }

    public function edit_adm($id_adm)
    {
        $query = $this->db->query("select * from admin_ where id_adm='$id_adm'");
        return $query->result_array();
    }
    public function update_adm($id_adm, $data)
    {
        $this->db->where('id_adm', $id_adm);
        return $this->db->update("admin_", $data);
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

        $this->db->insert('admin_', $data);
    }
    function update_profil($id_adm, $data)
    {
        $this->db->where('id_adm', $id_adm);
        return $this->db->update("admin_", $data);
    }
    function hapus_adm($id_adm)
    {
        $this->db->where('id_adm', $id_adm);
        return $this->db->delete('admin_');
    }
    public function count()
    {
        return $this->db->count_all($this->_table);
    }
}