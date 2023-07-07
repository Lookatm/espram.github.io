<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->model('auth_m');
    }
    public function index()
    {
        $data['title'] = 'E-SKU Pramuka';

        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
    }
    public function index_anggota()
    {
        $data['title'] = 'E-SKU Pramuka';

        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/login_anggota');
        $this->load->view('template/auth_footer');
    }
    public function daftar_()
    {
        $data['title'] = 'E-SKU Pramuka';

        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/register');
        $this->load->view('template/auth_footer');
    }
    public function login_adm()
    {
        $username    = $this->input->post('username_adm', TRUE);
        $password = md5($this->input->post('pass_adm', TRUE));
        $validate = $this->auth_m->validate($username, $password);
        $admin = $this->db->get_where('admin_', ['username_adm' => $username])->row_array();
        if ($admin['is_active'] == 1) {
            if ($validate->num_rows() > 0) {
                $data  = $validate->row_array();
                $username  = $data['username_adm'];
                $level_adm = $data['level_adm'];
                $sesdata = array(
                    'username_adm'  => $username,
                    'pass_adm'     => $password,
                    'level_adm'     => $level_adm,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($sesdata);
                // access login for admin
                if ($level_adm === '1') {
                    redirect('admin/dashboard_adm');
                } else {
                    redirect('auth');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">User Tidak aktif</div>');
            redirect('auth');
        }
    }
    public function login_user()
    {
        $username    = $this->input->post('username_', TRUE);
        $password = md5($this->input->post('pass_', TRUE));
        $validate = $this->auth_m->validate_usr($username, $password);
        $user = $this->db->get_where('user_', ['username_' => $username])->row_array();
        if ($user['is_active'] == 1) {
            if ($validate->num_rows() > 0) {
                $data  = $validate->row_array();
                $username  = $data['username_'];
                $level_ = $data['level_'];
                $sesdata = array(
                    'username_'  => $username,
                    'pass_'     => $password,
                    'level_'     => $level_,
                    'log_in' => TRUE
                );
                $this->session->set_userdata($sesdata);
                // access login for admin
                if ($level_ === '1') {
                    redirect('auth/index_anggota');
                } elseif ($level_ === '2') {
                    redirect('user/dashboard_usr/indexTamu');
                } elseif ($level_ === '3') {
                    redirect('user/dashboard_usr/indexBantara');
                } elseif ($level_ === '4') {
                    redirect('user/dashboard_usr/indexLaksana');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
                redirect('auth/index_anggota');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">User Tidak aktif</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}