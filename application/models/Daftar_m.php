<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_m extends CI_Model
{
    private $data_ = 'daftar_';
    public function rules()
    {
        return [
            [
                'field' => 'nama_',
                'label' => 'nama_',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'id_user',
                'label' => 'id_user',
                'rules' => 'required|trim'
            ]
        ];
    }
    function data_daftar()
    {



        // $query = $this->db->get($this->data_);
        // return $query->result();
        // $query = $this->db->get($this->_data);
        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('daftar_');
        $query = $this->db->get();
        return $query->result();
        // $this->db->where('level_', 'user');
        // $this->db->or_where('gol_', 'bantara');
        // $this->db->or_where('gol_', 'laksana');
        // $query = $this->db->get();
        // return $query->result();
    }
    function validate($nama_, $id_user)
    {

        $this->db->where('nama_', $nama_);
        $this->db->where('id_user', $id_user);
        $result = $this->db->get('daftar_', 1);
        return $result;
    }
    public function login_($id_usr)
    {
        $this->db->select('*');
        $this->db->from('daftar_');
        $this->db->join('user_', 'user_ . id_usr = daftar_ . id_usr');
        $query = $this->db->get();
        return $query->result();
    }
    public function insertData($data)
    {

        $this->db->insert('daftar_sku', $data);
    }
}