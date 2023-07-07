<?php

class Sku_bm extends CI_Model
{

    private $data_ = 'sku_';
    public $data1 = 'user_';
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

    function data_penempuhBtr()
    {

        $query = $this->db->get($this->dt_jawaban);
        $this->db->select('*');
        $this->db->from('penempuhan_');
        $this->db->where('tingkat_sku', 'bantara');
        $this->db->group_by('id_siswa');
        $query = $this->db->get();
        return $query->result();
    }

    function data_sku()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('sku_');
        $this->db->where('id_gol', '2');

        $query = $this->db->get();
        return $query->result();
    }
    function data_jawaban()
    {

        $query = $this->db->get($this->dt_jawaban);
        $this->db->select('*');
        $this->db->from('penempuhan_');
        $query = $this->db->get();
        return $query->row_array();
    }
    function edit_form($id_usr)
    {

        $query = $this->db->query("select * from unggah_ where golongan_='bantara' and id_siswa='$id_usr'");
        return $query->result_array();
    }
    function data_tempuh($id_usr)
    {

        $query = $this->db->query("select * from penempuhan_ where tingkat_sku='bantara' and id_siswa='$id_usr'");
        return $query->result_array();
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

    public function insertData($data)
    {

        $this->db->insert('sku_', $data);
    }
    public function edit_skub($id_sku)
    {
        $query = $this->db->query("select * from sku_ where id_sku='$id_sku'");
        return $query->result_array();
    }
    public function update_skub($id_sku, $data)
    {
        $this->db->where('id_sku', $id_sku);
        return $this->db->update("sku_", $data);
    }
    public function unggah_file($data)
    {
        $this->db->insert('unggah_', $data);
    }
    function data_form($id_usr)
    {
        $query = $this->db->query("select * from unggah_ where golongan_='bantara' and id_unggah='$id_usr'");
        return $query->result_array();
    }
    public function update_file($id_siswa, $data)
    {
        $this->db->where('id_unggah', $id_siswa);
        return $this->db->update("unggah_", $data);
    }

    function jawaban_($dt_jawaban)
    {
        $this->db->insert('penempuhan_', $dt_jawaban);
    }

    public function edit_jawab($id_sku)
    {
        $query = $this->db->query("select * from penempuhan_ where id_tempuh='$id_sku'");
        return $query->result();
    }
    public function updateJawaban($id_tempuh, $data)
    {
        $this->db->where('id_tempuh', $id_tempuh);
        return $this->db->update("penempuhan_", $data);
    }
    public function viewDetail($id_usr)
    {
        $query = $this->db->query("select * from penempuhan_ where id_tempuh='$id_usr'");
        return $query->result();
    }

    public function viewUlang($id_tempuh)
    {
        $query = $this->db->query("select * from penempuhan_ where id_tempuh='$id_tempuh'");
        return $query->result();
    }

    public function updateUlang($id_siswa, $data)
    {
        $this->db->where('id_tempuh', $id_siswa);
        return $this->db->update("penempuhan_", $data);
    }
    public function pelantikan_()
    {
        $query = $this->db->query("select * from penempuhan_");
        return $query->result();
    }
    public function update_unggah($new_data)
    {
        $this->db->where('id_jawab');
        return $this->db->update("penempuhan_", $new_data);
    }

    function hapus_skub($id_sku)
    {
        $this->db->where('id_sku', $id_sku);
        return $this->db->delete('sku_');
    }
}