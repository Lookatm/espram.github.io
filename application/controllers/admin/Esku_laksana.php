<?php

class Esku_laksana extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('sku_lm');
        $this->load->model('auth_m');
    }
    public function index()
    {


        $data['title'] = 'Data | E-SKU Laksana';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->sku_lm->data_sku();

        $this->load->view('admin/esku_/esku_lks.php', $data);
    }

    public function tambah_skul()
    {

        $data = array(
            'id_sku' => $this->input->post('id_sku'),
            'id_gol' => $this->input->post('id_gol'),
            'jenis_sku' => $this->input->post('jenis_sku'),
            'nama_sku' => $this->input->post('nama_sku'),


        );
        $this->sku_lm->insertData($data);
        redirect('admin/esku_laksana');
    }

    function edit_skul($id_sku)
    {
        $data['title'] = 'Edit | E-SKU';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['sku_'] = $this->sku_lm->edit_skul($id_sku);

        $this->load->view('admin/esku_/edit_skul.php', $data);
    }

    function update_skul($id_sku)
    {
        $data = array(
            // 'id_adm' => $this->input->post('id_adm'),
            'tugas_' => $this->input->post('tugas_'),


        );
        $this->sku_lm->update_skul($id_sku, $data);
        redirect('admin/esku_laksana');
    }

    function hapus_skul($id_sku)
    {
        $deleted = $this->sku_lm->hapus_skul($id_sku);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Article was deleted');
            redirect('admin/esku_laksana');
        }
    }
}