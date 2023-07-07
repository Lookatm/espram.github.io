<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->model('daftar_m');
        $this->load->model('auth_m');
        $this->load->model('user_m');
    }
    function index()
    {
        $data['title'] = 'Dashboard | User';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        $this->load->view('user/daftar_esku', $data);
    }
    public function tambah_data()
    {
        $data = array(

            'id_siswa' => $this->input->post('id_siswa'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'tingkat_sku' => $this->input->post('tingkat_sku')
        );
        $this->daftar_m->insertData($data);
        redirect('user/esku_bantara');
    }

    function daftar_()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user_login', ['username' => $username])->row_array();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'level' => $user['level']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['level'] == 'Admin') {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth/index');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">User Tidak aktif</div>');
                redirect('auth/index');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username dan Password tidak sama</div>');
            redirect('auth/index');
        }
    }


    function login_()
    {

        $nama_ = $this->input->post('nama_', TRUE);
        $id_user = $this->input->post('id_user', TRUE);
        $validate = $this->daftar_m->validate($nama_, $id_user);
        if ($validate->num_rows() > 0) {
            $data  = $validate->row_array();
            $nama_  = $data['nama_'];
            $_golongan = $data['_golongan'];

            $sesdata = array(
                'nama_'  => $nama_,
                'id_user'  => $id_user,
                '_golongan'  => $_golongan,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if ($_golongan === '1') {
                redirect('bantara/dashboard_btr');
            } elseif ($_golongan === '2') {
                redirect('laksana/dashboard_lks');
            } elseif ($_golongan === '3') {
                redirect('daftar');
            }
        } else {
            echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
            redirect('daftar');
        }
    }
    public function daftar_laksana()
    {
        $username    = $this->input->post('username_', TRUE);
        $password = md5($this->input->post('pass_', TRUE));
        $validate = $this->daftar_m->validate_usr($username, $password);
        if ($validate->num_rows() > 0) {
            $data  = $validate->row_array();
            $username  = $data['username_'];
            $golongan_ = $data['golongan_'];
            $sesdata = array(
                'username_'  => $username,
                'pass_'     => $password,
                'golongan_'     => $golongan_,
                'log_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if ($golongan_ === '1') {
                redirect('auth/index_anggota');
            } elseif ($golongan_ === '2') {
                redirect('user/dashboard_usr');
            }
        } else {
            echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
            redirect('auth/index_anggota');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}