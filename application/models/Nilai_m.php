<?php

class Nilai_m extends CI_Model
{

    private $data_ = 'penempuhan_';
    public $_data = 'nilai_';
    public $data_form = 'unggah_';


    function data_tidakLulus()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('penempuhan_');
        $this->db->where('hasil_', 'tidak lulus');
        $this->db->group_by('id_siswa');
        $query = $this->db->get();
        return $query->result();
    }
    function data_Bantara()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('penempuhan_');
        $this->db->where('hasil_', 'lulus');
        $this->db->where('tingkat_sku', 'bantara');
        $this->db->group_by('id_siswa');
        $query = $this->db->get();
        return $query->result();
    }
    function data_Laksana()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('penempuhan_');
        $this->db->where('hasil_', 'lulus');
        $this->db->where('tingkat_sku', 'laksana');
        $this->db->group_by('id_siswa');
        $query = $this->db->get();
        return $query->result();
    }
    function data_tdkLulus($id_siswa = null)
    {

        $query = $this->db->query("select * from penempuhan_ where hasil_='tidak lulus' and id_siswa='$id_siswa'");
        return $query->result_array();
    }
    function dataLulus($id_siswa = null)
    {

        $query = $this->db->query("select * from penempuhan_ where hasil_='lulus' and id_siswa='$id_siswa'");
        return $query->result_array();
    }
    function data_ubahBtr($id_siswa)
    {

        $query = $this->db->query("select * from user_ where id_usr='$id_siswa'");
        return $query->result();
    }
    function data_form($id_siswa)
    {

        $query = $this->db->query("select * from unggah_ where golongan_='bantara' and id_siswa='$id_siswa'");
        return $query->result();
    }
    function data_formLks($id_siswa)
    {

        $query = $this->db->query("select * from unggah_ where golongan_='laksana' and id_siswa='$id_siswa'");
        return $query->result();
    }
    function data_jawaban($id_tempuh = null)
    {

        $query = $this->db->query("select * from penempuhan_ where id_tempuh='$id_tempuh'");
        return $query->result_array();
    }
    function data_jawab($id_siswa = null)
    {

        $query = $this->db->query("select * from penempuhan_ where id_siswa='$id_siswa'");
        return $query->result_array();
    }
    public function tambah_nilai($id_tempuh, $data)
    {
        $this->db->where('id_tempuh', $id_tempuh);
        return $this->db->update("penempuhan_", $data);
    }
    public function nilai_ulang($id_tempuh)
    {
        $query = $this->db->query("select * from penempuhan_ where id_tempuh='$id_tempuh'");
        return $query->result_array();
    }
    public function update_nilai($id_tempuh, $data)
    {
        $this->db->where('id_tempuh', $id_tempuh);
        return $this->db->update("penempuhan_", $data);
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
    function data_skub()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('sku_');
        $this->db->where('jenis_sku', '6');
        $query = $this->db->get();
        return $query->result();
    }
    function data_skui()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('sku_');
        $this->db->where('jenis_sku', '1');
        $query = $this->db->get();
        return $query->result();
    }
    function data_skuh()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('sku_');
        $this->db->where('jenis_sku', '2');
        $query = $this->db->get();
        return $query->result();
    }
    function data_skubu()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('sku_');
        $this->db->where('jenis_sku', '3');
        $query = $this->db->get();
        return $query->result();
    }
    function data_skuk()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('sku_');
        $this->db->where('jenis_sku', '4');
        $query = $this->db->get();
        return $query->result();
    }
    function data_skup()
    {

        $query = $this->db->get($this->data_);
        $this->db->select('*');
        $this->db->from('sku_');
        $this->db->where('jenis_sku', '5');
        $query = $this->db->get();
        return $query->result();
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

    public function jawab_soal($data2)
    {
        $this->db->insert('jawaban_', $data2);
    }


    function hapus_skub($id_sku)
    {
        $this->db->where('id_sku', $id_sku);
        return $this->db->delete('sku_');
    }
    public function view_nilai($id_usr)
    {
        $query = $this->db->query("select * from penempuhan_ where hasil_ = 'tidak lulus' and id_siswa='$id_usr'");
        return $query->result();
    }
    public function view_lulus($id_usr)
    {
        $query = $this->db->query("select * from penempuhan_ where hasil_ = 'lulus' and id_siswa='$id_usr'");
        return $query->result();
    }
}