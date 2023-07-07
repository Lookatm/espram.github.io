<?php
class Dashboard_adm extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
        $this->load->model('admin_m');
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('auth');
        }
    }

    function index($tahun = NULL, $bulan = NULL)
    {
        $data['title'] = 'Dashboard | Admin';
        $data['jmlAdmin'] = $this->admin_m->jmlAdmin();
        $data['jmlAnggota'] = $this->admin_m->jmlAnggota();
        $data['jmlskuBantara'] = $this->admin_m->eskuBantara();
        $data['jmlskuLaksana'] = $this->admin_m->eskuLaksana();
        $data['jadwal'] = $this->admin_m->jadwal_aktif();
        $kalender = array(
            'start_day' => 'monday',
            'show_next_prev' => TRUE,
            'next_prev_url' => base_url("admin/dashboard_adm")
        );
        $this->load->library('calendar', $kalender);

        $data['kalender'] = $this->calendar->generate($tahun, $bulan);

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();


        $this->load->view('admin/dashboard_adm.php', $data);
    }

    public function jadwal()
    {
        $data['title'] = 'Admin | Jadwal Latihan';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->admin_m->Penjadwalan();

        $this->load->view('admin/jadwal/jadwal.php', $data);
    }
    public function tambah_jadwal()
    {

        $data['title'] = 'Tambah Jadwal';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();
        $this->load->view('admin/jadwal/jadwal.php', $data);

        $data = array(
            'materi_' => $this->input->post('materi_'),
            'tanggal_' => $this->input->post('tanggal_'),
            'status' => $this->input->post('status'),
            'keterangan_' => $this->input->post('keterangan_'),

        );
        $this->admin_m->insertJadwal($data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Jadwal berhasil ditambahkan.</div>');
        redirect('admin/dashboard_adm/jadwal');
    }
    function ubah_jadwal($id_jadwal)
    {
        $data = array(

            'materi_' => $this->input->post('materi_'),
            'tanggal_' => $this->input->post('tanggal_'),
            'status' => $this->input->post('status'),
            'keterangan_' => $this->input->post('keterangan_'),

        );
        $this->admin_m->ubah_jadwal($id_jadwal, $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Jadwal berhasil diubah.</div>');
        redirect('admin/dashboard_adm/jadwal');
    }
    function hapus_jadwal($id_jadwal)
    {
        $deleted = $this->admin_m->hapus_jadwal($id_jadwal);
        if ($deleted) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.</div>');
            redirect('admin/dashboard_adm/jadwal');
        }
    }
    public function profil_adm()
    {

        $data['title'] = 'Admin | Profil Saya';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->admin_m->data_admin();

        $this->load->view('admin/profil_adm', $data);
    }
    function update_profil($id_adm)
    {
        $this->form_validation->set_rules('nama_adm', 'nama_adm', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'E-SKU | Edit Profil';
            $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
            $this->session->userdata('username_adm')])->row_array();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal Menyimpan</div>');
            redirect('admin/dashboard_adm/profil_adm');
        } else {

            $image_ = $_FILES['image'];
            if ($image_) {
                $config['allowed_types'] = 'jpg|png|jpeg|PNG';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/img/profil/admin';
                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')) {
                    $data = array(
                        'nama_adm' => $this->input->post('nama_adm'),
                        'jk' => $this->input->post('jk'),
                        'agama_' => $this->input->post('agama_'),
                        'jabatan_' => $this->input->post('jabatan_'),
                        'tpt_lhr' => $this->input->post('tpt_lhr'),
                        'tgl_lhr' => $this->input->post('tgl_lhr'),
                        'alamat_adm' => $this->input->post('alamat_adm'),
                        'email_adm' => $this->input->post('email_adm')
                    );
                    $this->admin_m->update_profil($id_adm, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    redirect('admin/dashboard_adm/profil_adm');
                } else {
                    $image_ = $this->upload->data('file_name');
                    $nama = $this->input->post('nama_adm');
                    $jk = $this->input->post('jk');
                    $agama = $this->input->post('agama_');
                    $jabatan = $this->input->post('jabatan_');
                    $tanggal_lahir = $this->input->post('tgl_lhr');
                    $tempat_lahir = $this->input->post('tpt_lhr');
                    $alamat = $this->input->post('alamat_adm');
                    $email = $this->input->post('email_adm');
                    $data = array(
                        'nama_adm' => $nama,
                        'jk' => $jk,
                        'agama_' => $agama,
                        'jabatan_' => $jabatan,
                        'tpt_lhr' => $tempat_lahir,
                        'tgl_lhr' => $tanggal_lahir,
                        'alamat_adm' => $alamat,
                        'email_adm' => $email,
                        'image' => $image_,
                    );


                    $this->admin_m->update_profil($id_adm, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
                    redirect('admin/dashboard_adm/profil_adm');
                }
            }
        }
    }
    function ubah_pass()
    {
        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirm Password Baru', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin | Profil Saya';
            $data['user'] = $this->db->get_where('admin_', ['username_adm' => $this->session->userdata('username_adm')])->row_array();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Konfirmasi password anda tidak cocok</div>');
            $this->load->view('admin/profil_adm', $data);
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));

            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                redirect('admin/dashboard_adm/profil_adm');
            } else {
                ($password_hash = ($new_password));
                $this->db->set('pass_adm', $password_hash);
                $this->db->where('username_adm', $this->session->userdata('username_adm'));
                $this->db->update('admin_');
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
                redirect('admin/dashboard_adm/profil_adm');
            }
        }
    }
}