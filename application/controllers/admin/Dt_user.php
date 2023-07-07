<?php

class Dt_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('auth_m');
        $this->load->model('sku_bm');
        $this->load->model('sku_lm');
    }
    public function index()
    {


        $data['title'] = 'Data | Anggota Pramuka';
        $data['jmlTamu'] = $this->user_m->jmlTamu();
        $data['jmlBantara'] = $this->user_m->jmlBantara();
        $data['jmlLaksana'] = $this->user_m->jmlLaksana();
        $data['jmlPr'] = $this->user_m->jmlPr();
        $data['jmlLk'] = $this->user_m->jmlLk();

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->user_m->data_user();


        $this->load->view('admin/dt_user/data_anggota.php', $data);
    }
    public function dataTamu()
    {
        $data['title'] = 'Data | Anggota Pramuka';
        $data['jmlTamu'] = $this->user_m->jmlTamu();
        $data['jmlBantara'] = $this->user_m->jmlBantara();
        $data['jmlLaksana'] = $this->user_m->jmlLaksana();
        $data['jmlPr'] = $this->user_m->jmlPr();
        $data['jmlLk'] = $this->user_m->jmlLk();

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->user_m->dataTamu();


        $this->load->view('admin/dt_user/data_anggota.php', $data);
    }
    public function dataBantara()
    {
        $data['title'] = 'Data | Anggota Pramuka';
        $data['jmlTamu'] = $this->user_m->jmlTamu();
        $data['jmlBantara'] = $this->user_m->jmlBantara();
        $data['jmlLaksana'] = $this->user_m->jmlLaksana();
        $data['jmlPr'] = $this->user_m->jmlPr();
        $data['jmlLk'] = $this->user_m->jmlLk();

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->user_m->dataBantara();


        $this->load->view('admin/dt_user/data_anggota.php', $data);
    }
    public function dataLaksana()
    {
        $data['title'] = 'Data | Anggota Pramuka';
        $data['jmlTamu'] = $this->user_m->jmlTamu();
        $data['jmlBantara'] = $this->user_m->jmlBantara();
        $data['jmlLaksana'] = $this->user_m->jmlLaksana();
        $data['jmlPr'] = $this->user_m->jmlPr();
        $data['jmlLk'] = $this->user_m->jmlLk();

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->user_m->dataLaksana();


        $this->load->view('admin/dt_user/data_anggota.php', $data);
    }
    public function dataPr()
    {
        $data['title'] = 'Data | Anggota Pramuka';
        $data['jmlTamu'] = $this->user_m->jmlTamu();
        $data['jmlBantara'] = $this->user_m->jmlBantara();
        $data['jmlLaksana'] = $this->user_m->jmlLaksana();
        $data['jmlPr'] = $this->user_m->jmlPr();
        $data['jmlLk'] = $this->user_m->jmlLk();

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->user_m->dataPr();


        $this->load->view('admin/dt_user/data_anggota.php', $data);
    }
    public function dataLk()
    {
        $data['title'] = 'Data | Anggota Pramuka';
        $data['jmlTamu'] = $this->user_m->jmlTamu();
        $data['jmlBantara'] = $this->user_m->jmlBantara();
        $data['jmlLaksana'] = $this->user_m->jmlLaksana();
        $data['jmlPr'] = $this->user_m->jmlPr();
        $data['jmlLk'] = $this->user_m->jmlLk();

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->user_m->dataLk();


        $this->load->view('admin/dt_user/data_anggota.php', $data);
    }
    public function lihat_form($id_usr)
    {


        $data['title'] = 'Data | Form Penempuhan';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['form_'] = $this->user_m->data_form($id_usr);


        $this->load->view('admin/dt_user/lihat_form.php', $data);
    }
    public function Tk_Aktif()
    {


        $data['title'] = 'Data | Anggota Nonaktif';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->user_m->Tdk_aktif();

        $this->load->view('admin/dt_user/tdk_aktif.php', $data);
    }
    public function dataPenempuhBtr()
    {
        $data['title'] = 'Data | Penempuh SKU Bantara';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->sku_bm->data_penempuhBtr();
        $this->load->view('admin/dt_tempuh/data_userbtr.php', $data);
    }
    public function dataPenempuhLks()
    {
        $data['title'] = 'Data | Penempuh SKU Laksana';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->sku_lm->data_penempuhLks();
        $this->load->view('admin/dt_tempuh/data_userlks.php', $data);
    }

    public function addDataUsr()
    {
        $data['title'] = 'Tambah Data';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $this->load->view('admin/dt_user/tambah_dt.php', $data);
    }
    public function tambah_usr()
    {

        $data['title'] = 'Tambah Data';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();
        $this->load->view('admin/dt_user/data_anggota.php', $data);

        $data = array(
            'id_usr' => $this->input->post('id_usr'),
            'nama_usr' => $this->input->post('nama_usr'),
            'username_' => $this->input->post('username_'),
            'pass_' => md5($this->input->post('pass_')),
            'level_' => $this->input->post('level_'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created'),
            'waktu_tempuh' => $this->input->post('waktu_tempuh'),

        );
        $this->user_m->insertData($data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.</div>');
        redirect('admin/dt_user');
    }
    function edit_usr($id_usr)
    {
        $data['title'] = 'Edit Data User';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['user_'] = $this->user_m->edit_usr($id_usr);

        $this->load->view('admin/dt_user/edit_dt.php', $data);
    }

    function update_usr($id_usr)
    {
        $data = array(
            // 'id_adm' => $this->input->post('id_adm'),
            'waktu_tempuh' => $this->input->post('waktu_tempuh'),
            'level_' => $this->input->post('level_'),
            'is_active' => $this->input->post('is_active'),

        );
        $this->user_m->update_usr($id_usr, $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data berhasil diubah.</div>');
        redirect('admin/dt_user');
    }
    function ubah_status($id_usr)
    {
        $data = array(
            // 'id_adm' => $this->input->post('id_adm'),
            'waktu_tempuh' => $this->input->post('waktu_tempuh'),
            'level_' => $this->input->post('level_'),
            'is_active' => $this->input->post('is_active'),

        );

        $this->user_m->ubah_status($id_usr, $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Status berhasil diubah.</div>');
        redirect('admin/penilaian_sku/dataBantara');
    }
    function detail_usr($id_usr)
    {
        $data['title'] = 'Detail Data User';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['user_'] = $this->user_m->edit_usr($id_usr);

        $this->load->view('admin/dt_user/detail_dt.php', $data);
    }

    function hapus_($id_usr)
    {
        $deleted = $this->user_m->hapus_usr($id_usr);
        if ($deleted) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.</div>');
            redirect('admin/dt_user');
        }
    }
}