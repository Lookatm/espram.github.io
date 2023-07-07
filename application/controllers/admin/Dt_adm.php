<?php

class Dt_adm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_m');
        $this->load->model('auth_m');
    }

    public function index()
    {
        $data['title'] = 'Data | Admin';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->admin_m->data_admin();

        $this->load->view('admin/dt_admin/data_admin.php', $data);
    }
    public function Tk_Aktif()
    {
        $data['title'] = 'Data | Admin Nonaktif';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->admin_m->Tdk_aktif();

        $this->load->view('admin/dt_admin/tdk_aktif.php', $data);
    }

    public function addDataUsr()
    {
        $data['title'] = 'Tambah Data';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $this->load->view('admin/dt_user/tambah_dt.php', $data);
    }
    public function tambah_adm()
    {

        $data['title'] = 'Tambah Data';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();
        $this->load->view('admin/dt_admin/data_admin.php', $data);

        $data = array(
            'id_adm' => $this->input->post('id_adm'),
            'nama_adm' => $this->input->post('nama_adm'),
            'username_adm' => $this->input->post('username_adm'),
            'pass_adm' => md5($this->input->post('pass_adm')),
            'level_adm' => $this->input->post('level_adm'),
            'jabatan_' => $this->input->post('jabatan_'),
            'is_active' => $this->input->post('is_active'),

        );
        $this->admin_m->insertData($data);
        redirect('admin/dt_adm');
    }
    function edit_adm($id_adm)
    {
        $data['title'] = 'Edit | Admin';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['admin_'] = $this->admin_m->edit_adm($id_adm);

        $this->load->view('admin/dt_admin/edit_dt.php', $data);
    }

    function update_adm($id_adm)
    {
        $data = array(
            // 'id_adm' => $this->input->post('id_adm'),
            'is_active' => $this->input->post('is_active'),

        );
        $this->admin_m->update_adm($id_adm, $data);
        redirect('admin/dt_adm');
    }
    function detail_adm($id_adm)
    {
        $data['title'] = 'Detail | Admin';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['admin_'] = $this->admin_m->edit_adm($id_adm);

        $this->load->view('admin/dt_admin/detail_dt.php', $data);
    }
    function hapus_adm($id_adm)
    {
        $deleted = $this->admin_m->hapus_adm($id_adm);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Article was deleted');
            redirect('admin/dt_adm');
        }
    }


    function delete($u_id = null)
    {
        if (!$u_id) {
            show_404();
        }

        $deleted = $this->user_model->delete($u_id);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Article was deleted');
            redirect('admin/dt_user');
        }
    }
}