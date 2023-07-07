<?php

class Esku_bantara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_m');
        $this->load->model('sku_bm');
        $this->load->model('auth_m');
    }
    public function index()
    {
        $data['title'] = 'Data | E-SKU Bantara';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->sku_bm->data_sku();

        $this->load->view('admin/esku_/esku_btr', $data);
    }
    public function tambah_skub()
    {

        $data = array(
            'id_sku' => $this->input->post('id_sku'),
            'id_gol' => $this->input->post('id_gol'),
            'jenis_sku' => $this->input->post('jenis_sku'),
            'nama_sku' => $this->input->post('nama_sku'),


        );
        $this->sku_bm->insertData($data);
        redirect('admin/esku_bantara');
    }
    function edit_skub($id_sku)
    {
        $data['title'] = 'Data | Tambah Tugas';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['sku_'] = $this->sku_bm->edit_skub($id_sku);

        $this->load->view('admin/esku_/edit_skub.php', $data);
    }

    function update_skub($id_sku)
    {
        $data = array(
            // 'id_adm' => $this->input->post('id_adm'),
            'tugas_' => $this->input->post('tugas_'),


        );
        $this->sku_bm->update_skub($id_sku, $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Tugas berhasil ditambahkan</div>');
        redirect('admin/esku_bantara');
    }
    function hapus_skub($id_sku)
    {
        $deleted = $this->sku_bm->hapus_skub($id_sku);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Article was deleted');
            redirect('admin/esku_bantara');
        }
    }
}