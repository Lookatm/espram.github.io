<?php
class Dashboard_usr extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_m');
        $this->load->model('auth_m');
        $this->load->model('user_m');
        if ($this->session->userdata('log_in') !== TRUE) {
            redirect('auth');
        }
    }

    function indexTamu()
    {
        $data['title'] = 'Dashboard | Tamu Ambalan';
        $data['jadwal'] = $this->admin_m->jadwal_aktif();

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();
        // $user_id = $this->session->userdata('id_usr');

        $this->load->view('user/tamu/dashboard_tamu.php', $data);
    }
    function indexBantara()
    {
        $data['title'] = 'Dashboard | Penegak Bantara';
        $data['jadwal'] = $this->admin_m->jadwal_aktif();
        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();
        // $user_id = $this->session->userdata('id_usr');

        $this->load->view('user/bantara/dashboard_btr.php', $data);
    }
    function indexLaksana()
    {
        $data['title'] = 'Dashboard | Penegak Laksana';
        $data['jadwal'] = $this->admin_m->jadwal_aktif();
        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();
        // $user_id = $this->session->userdata('id_usr');

        $this->load->view('user/laksana/dashboard_lks.php', $data);
    }
    function penempuhan()
    {


        $data['title'] = 'E-SKU | Penempuhan SKU';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();
        $this->load->view('user/daftar_sku.php', $data);
    }
    public function profilTamu()
    {
        $data['title'] = 'E-SKU | Profil Saya';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        $data['data_'] = $this->user_m->data_user();

        $this->load->view('user/tamu/profil_saya', $data);
    }

    function update_profilTamu($id_usr)
    {

        $this->form_validation->set_rules('nama_usr', 'nama_usr', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'E-SKU | Edit Profil';
            $data['user'] = $this->db->get_where('user_', ['username_' =>
            $this->session->userdata('username_')])->row_array();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal Menyimpan</div>');
            redirect('user/dashboard_usr/profilTamu');
        } else {

            $image_ = $_FILES['image_'];
            if ($image_) {
                $config['allowed_types'] = 'jpg|png|jpeg|PNG';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/img/profil';

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('image_')) {
                    $nama = $this->input->post('nama_usr');
                    $jk = $this->input->post('jk_');
                    $tanggal_lahir = $this->input->post('tgl_lhr');
                    $tempat_lahir = $this->input->post('tempat_lhr');
                    $alamat = $this->input->post('alamat_usr');
                    $email = $this->input->post('email_');
                    $agama = $this->input->post('agama_');
                    $data = array(
                        'nama_usr' => $nama,
                        'jk_' => $jk,
                        'tempat_lhr' => $tempat_lahir,
                        'tgl_lhr' => $tanggal_lahir,
                        'alamat_usr' => $alamat,
                        'email_' => $email,
                        'agama_' => $agama,
                    );
                    $this->user_m->update_profil($id_usr, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    redirect('user/dashboard_usr/profilTamu');
                } else {
                    $image_ = $this->upload->data('file_name');
                    $nama = $this->input->post('nama_usr');
                    $jk = $this->input->post('jk_');
                    $tanggal_lahir = $this->input->post('tgl_lhr');
                    $tempat_lahir = $this->input->post('tempat_lhr');
                    $alamat = $this->input->post('alamat_usr');
                    $email = $this->input->post('email_');
                    $agama = $this->input->post('agama_');
                    $data = array(
                        'nama_usr' => $nama,
                        'jk_' => $jk,
                        'tempat_lhr' => $tempat_lahir,
                        'tgl_lhr' => $tanggal_lahir,
                        'alamat_usr' => $alamat,
                        'email_' => $email,
                        'agama_' => $agama,
                        'image_' => $image_,
                    );


                    $this->user_m->update_profil($id_usr, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    redirect('user/dashboard_usr/profilTamu');
                }
            }
        }
    }
    public function profilBantara()
    {
        $data['title'] = 'E-SKU | Profil Saya';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        $data['data_'] = $this->user_m->data_user();

        $this->load->view('user/bantara/profil_saya', $data);
    }

    function update_profilBantara($id_usr)
    {

        $this->form_validation->set_rules('nama_usr', 'nama_usr', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'E-SKU | Edit Profil';
            $data['user'] = $this->db->get_where('user_', ['username_' =>
            $this->session->userdata('username_')])->row_array();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal Menyimpan</div>');
            redirect('user/dashboard_usr/profilBantara');
        } else {

            $image_ = $_FILES['image_'];
            if ($image_) {
                $config['allowed_types'] = 'jpg|png|jpeg|PNG';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/img/profil';

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('image_')) {
                    $nama = $this->input->post('nama_usr');
                    $jk = $this->input->post('jk_');
                    $tanggal_lahir = $this->input->post('tgl_lhr');
                    $tempat_lahir = $this->input->post('tempat_lhr');
                    $alamat = $this->input->post('alamat_usr');
                    $email = $this->input->post('email_');
                    $agama = $this->input->post('agama_');
                    $data = array(
                        'nama_usr' => $nama,
                        'jk_' => $jk,
                        'tempat_lhr' => $tempat_lahir,
                        'tgl_lhr' => $tanggal_lahir,
                        'alamat_usr' => $alamat,
                        'email_' => $email,
                        'agama_' => $agama,
                    );
                    $this->user_m->update_profil($id_usr, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    redirect('user/dashboard_usr/profilBantara');
                } else {
                    $image_ = $this->upload->data('file_name');
                    $nama = $this->input->post('nama_usr');
                    $jk = $this->input->post('jk_');
                    $tanggal_lahir = $this->input->post('tgl_lhr');
                    $tempat_lahir = $this->input->post('tempat_lhr');
                    $alamat = $this->input->post('alamat_usr');
                    $email = $this->input->post('email_');
                    $agama = $this->input->post('agama_');
                    $data = array(
                        'nama_usr' => $nama,
                        'jk_' => $jk,
                        'tempat_lhr' => $tempat_lahir,
                        'tgl_lhr' => $tanggal_lahir,
                        'alamat_usr' => $alamat,
                        'email_' => $email,
                        'agama_' => $agama,
                        'image_' => $image_,
                    );


                    $this->user_m->update_profil($id_usr, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    redirect('user/dashboard_usr/profilBantara');
                }
            }
        }
    }
    public function profilLaksana()
    {
        $data['title'] = 'E-SKU | Profil Saya';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        $data['data_'] = $this->user_m->data_user();

        $this->load->view('user/laksana/profil_saya', $data);
    }

    function update_profilLaksana($id_usr)
    {

        $this->form_validation->set_rules('nama_usr', 'nama_usr', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'E-SKU | Edit Profil';
            $data['user'] = $this->db->get_where('user_', ['username_' =>
            $this->session->userdata('username_')])->row_array();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal Menyimpan</div>');
            redirect('user/dashboard_usr/profilLaksana');
        } else {

            $image_ = $_FILES['image_'];
            if ($image_) {
                $config['allowed_types'] = 'jpg|png|jpeg|PNG';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/img/profil';

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('image_')) {
                    $nama = $this->input->post('nama_usr');
                    $jk = $this->input->post('jk_');
                    $tanggal_lahir = $this->input->post('tgl_lhr');
                    $tempat_lahir = $this->input->post('tempat_lhr');
                    $alamat = $this->input->post('alamat_usr');
                    $email = $this->input->post('email_');
                    $agama = $this->input->post('agama_');
                    $data = array(
                        'nama_usr' => $nama,
                        'jk_' => $jk,
                        'tempat_lhr' => $tempat_lahir,
                        'tgl_lhr' => $tanggal_lahir,
                        'alamat_usr' => $alamat,
                        'email_' => $email,
                        'agama_' => $agama,
                    );
                    $this->user_m->update_profil($id_usr, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    redirect('user/dashboard_usr/profilLaksana');
                } else {
                    $image_ = $this->upload->data('file_name');
                    $nama = $this->input->post('nama_usr');
                    $jk = $this->input->post('jk_');
                    $tanggal_lahir = $this->input->post('tgl_lhr');
                    $tempat_lahir = $this->input->post('tempat_lhr');
                    $alamat = $this->input->post('alamat_usr');
                    $email = $this->input->post('email_');
                    $agama = $this->input->post('agama_');
                    $data = array(
                        'nama_usr' => $nama,
                        'jk_' => $jk,
                        'tempat_lhr' => $tempat_lahir,
                        'tgl_lhr' => $tanggal_lahir,
                        'alamat_usr' => $alamat,
                        'email_' => $email,
                        'agama_' => $agama,
                        'image_' => $image_,
                    );


                    $this->user_m->update_profil($id_usr, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    redirect('user/dashboard_usr/profilLaksana');
                }
            }
        }
    }


    function ubah_passwordTamu()
    {
        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirm Password Baru', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Konfirmasi password anda tidak cocok</div>');
            redirect('user/dashboard_usr/profilTamu');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));

            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                redirect('user/dashboard_usr/profilTamu');
            } else {
                ($password_hash = ($new_password));
                $this->db->set('pass_adm', $password_hash);
                $this->db->where('username_adm', $this->session->userdata('username_adm'));
                $this->db->update('admin_');
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
                redirect('user/dashboard_usr/profilTamu');
            }
        }
    }
    function ubah_passwordBantara()
    {
        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirm Password Baru', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Konfirmasi password anda tidak cocok</div>');
            redirect('user/dashboard_usr/profilBantara');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));

            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                redirect('user/dashboard_usr/profilBantara');
            } else {
                ($password_hash = ($new_password));
                $this->db->set('pass_adm', $password_hash);
                $this->db->where('username_adm', $this->session->userdata('username_adm'));
                $this->db->update('admin_');
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
                redirect('user/dashboard_usr/profilBantara');
            }
        }
    }
    function ubah_passwordLaksana()
    {
        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirm Password Baru', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Konfirmasi password anda tidak cocok</div>');
            redirect('user/dashboard_usr/profilLaksana');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));

            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                redirect('user/dashboard_usr/profilLaksana');
            } else {
                ($password_hash = ($new_password));
                $this->db->set('pass_adm', $password_hash);
                $this->db->where('username_adm', $this->session->userdata('username_adm'));
                $this->db->update('admin_');
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
                redirect('user/dashboard_usr/profilLaksana');
            }
        }
    }
}