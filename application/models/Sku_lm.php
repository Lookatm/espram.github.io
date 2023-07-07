<?php

class Sku_lm extends CI_Model
{

    private $data_ = 'sku_';
    public $_data = 'user_';
    private $dt_jawaban = 'penempuhan_';
    public $unggah = 'unggah_';




    // public function getById($u_id)
    // {
    //     return $this->db->get_where($this->data_, ["u_id" => $u_id])->row();
    // }

    // function getWelcome()
    // {

    //     $query = $this->db->get($this->data_);
    //     return $query->result();
    // }
    function edit_form($id_usr)
    {

        $query = $this->db->query("select * from unggah_ where golongan_='laksana' and id_siswa='$id_usr'");
        return $query->result_array();
    }
    function data_penempuhLks()
    {

        $query = $this->db->get($this->dt_jawaban);
        $this->db->select('*');
        $this->db->from('penempuhan_');
        $this->db->where('tingkat_sku', 'laksana');
        $this->db->group_by('id_siswa');
        $query = $this->db->get();
        return $query->result();
    }
    function data_sku()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('sku_');
        $this->db->where('id_gol', '3');

        $query = $this->db->get();
        return $query->result();
    }
    function view_soal($id_sku)
    {

        $query = $this->db->query("select * from sku_ where id_sku='$id_sku'");
        return $query->result();
    }
    public function viewEdit($id_sku)
    {
        $query = $this->db->query("select * from penempuhan_ where id_soal='$id_sku'");
        return $query->result();
    }
    public function viewDetail($id_usr)
    {
        $query = $this->db->query("select * from penempuhan_ where id_tempuh='$id_usr'");
        return $query->result();
    }

    public function viewUlang($id_jawaban)
    {
        $query = $this->db->query("select * from penempuhan_ where id_tempuh='$id_jawaban'");
        return $query->result();
    }
    public function updateUlang($id_siswa, $data)
    {
        $this->db->where('id_tempuh', $id_siswa);
        return $this->db->update("penempuhan_", $data);
    }
    function jawaban_($dt_jawaban)
    {
        $this->db->insert('penempuhan_', $dt_jawaban);
    }
    public function edit_jawab($id_sku)
    {
        $query = $this->db->query("select * from penempuhan_ where tingkat_sku='laksana' and id_tempuh='$id_sku'");
        return $query->result();
    }
    public function update_jwb($id_jawab, $data)
    {
        $this->db->where('id_jawab', $id_jawab);
        return $this->db->update("penempuhan_", $data);
    }
    public function insertData($data)
    {

        $this->db->insert('sku_', $data);
    }
    function update_profil($id_adm, $data)
    {
        $this->db->where('id_adm', $id_adm);
        return $this->db->update("admin_", $data);
    }
    public function edit_skul($id_sku)
    {
        $query = $this->db->query("select * from sku_ where id_sku='$id_sku'");
        return $query->result_array();
    }
    public function update_skul($id_sku, $data)
    {
        $this->db->where('id_sku', $id_sku);
        return $this->db->update("sku_", $data);
    }
    public function unggah_file($data)
    {
        $this->db->insert('unggah_', $data);
    }
    function view_form($id_usr)
    {
        $query = $this->db->query("select * from unggah_ where golongan_='laksana' and id_siswa='$id_usr'");
        return $query->result_array();
    }
    public function update_file($id_siswa, $data)
    {
        $this->db->where('id_unggah', $id_siswa);
        return $this->db->update("unggah_", $data);
    }

    function hapus_skul($id_sku)
    {
        $this->db->where('id_sku', $id_sku);
        return $this->db->delete('sku_');
    }
}