<?php

class Esku_Laksana extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('nilai_m');
        $this->load->model('sku_lm');
        $this->load->model('sku_bm');
        $this->load->model('auth_m');
        $this->load->helper(array('url', 'download'));
    }
    function update_profillaksana($id_usr)
    {
        $data['title'] = 'E-SKU | Edit Profil';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();



        $data = array(
            // 'id_usr' => $this->input->post('id_usr'),
            'nama_usr' => $this->input->post('nama_usr'),
            'jk_' => $this->input->post('jk_'),
            'tempat_lhr' => $this->input->post('tempat_lhr'),
            'tgl_lhr' => $this->input->post('tgl_lhr'),
            'alamat_usr' => $this->input->post('alamat_usr'),
            'email_' => $this->input->post('email_'),
            'daftar_' => $this->input->post('daftar_'),
        );
        $this->user_m->update_profil($id_usr, $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Status Penempuhan Berhasil Diubah</div>');
        redirect('user/esku_Laksana');
    }
    public function index()
    {
        $data['title'] = 'E-SKU Laksana';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();
        $data['data_'] = $this->sku_lm->data_sku();
        $this->load->view('user/bantara/esku/esku_laksana', $data);
    }
    public function kenaikan_tkt($id_usr)
    {
        $data['title'] = 'Form Kenaikan Tingkat';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();
        $data['edit'] = $this->sku_lm->edit_form($id_usr);
        $this->load->view('user/bantara/esku/kenaikan_tingkat', $data);
    }
    public function do_unduh()
    {
        $data['title'] = 'Form Kenaikan Tingkat';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        force_download('./assets/form/form_laksana.pdf', null);
    }
    public function unggah_file($id_usr)
    {

        $golongan_ = $this->input->post('golongan_');
        $nim = $this->input->post('id_siswa');
        $sql = $this->db->query("SELECT * FROM unggah_ where golongan_ = '$golongan_' and id_siswa = '$nim'");
        $cek_nim = $sql->num_rows();

        if ($cek_nim > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Anda Telah Mengunggah Form</div>');
            redirect('user/esku_laksana/kenaikan_tkt/' . $id_usr);
        } else {

            $unggah = $_FILES['unggah'];
            if ($unggah) {
                $config['allowed_types'] = 'jpg|png|jpeg|PNG|pdf';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/form/bantara';

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('unggah')) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda belum memilih file</div>');
                    redirect('user/esku_laksana/kenaikan_tkt/' . $id_usr);
                } else {
                    $unggah = $this->upload->data('file_name');
                    $tanggal_ = $this->input->post('tanggal_');
                    $id_siswa = $this->input->post('id_siswa');
                    $nama_ = $this->input->post('nama_');
                    $golongan_ = $this->input->post('golongan_');

                    $data = array(
                        'tanggal_' => $tanggal_,
                        'id_siswa' => $id_siswa,
                        'nama_' => $nama_,
                        'golongan_' => $golongan_,
                        'unggah' => $unggah,
                    );


                    $this->sku_lm->unggah_file($data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Form Berhasil Diunggah.</div>');
                    redirect('user/esku_laksana/kenaikan_tkt/' . $id_usr);
                }
            }
        }
    }

    public function edit_unggah($id_siswa)
    {
        $this->form_validation->set_rules('tanggal_', 'tanggal_', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Kenaikan Tingkat';
            $data['user'] = $this->db->get_where('user_', ['username_' =>
            $this->session->userdata('username_')])->row_array();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal Menyimpan</div>');
            redirect('user/esku_laksana/kenaikan_tingkat/' . $id_siswa);
        } else {

            $unggah = $_FILES['unggah'];
            if ($unggah) {
                $config['allowed_types'] = 'jpg|png|jpeg|PNG|pdf';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/form/bantara';

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('unggah')) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda belum memilih file</div>');
                    redirect('user/esku_laksana/kenaikan_tkt/' . $id_siswa);
                } else {
                    $unggah = $this->upload->data('file_name');
                    $tanggal_ = $this->input->post('tanggal_');
                    $id_siswa = $this->input->post('id_siswa');
                    $nama_ = $this->input->post('nama_');
                    $golongan_ = $this->input->post('golongan_');

                    $data = array(
                        'tanggal_' => $tanggal_,
                        'id_siswa' => $id_siswa,
                        'nama_' => $nama_,
                        'golongan_' => $golongan_,
                        'unggah' => $unggah,
                    );
                    $this->sku_lm->update_file($id_siswa, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Form Berhasil Diubah</div>');
                    redirect('user/esku_laksana/kenaikan_tkt/' . $id_siswa);
                }
            }
        }
    }
    function viewSoal($id_sku)
    {
        $data['title'] = 'Data | Soal';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        $data['jawab_'] = $this->sku_lm->view_soal($id_sku);
        $data['edit'] = $this->sku_lm->viewEdit($id_sku);

        $this->load->view('user/bantara/esku/soal_', $data);
    }
    function detail_soal($id_sku)
    {
        $data['title'] = 'Admin | Profil Saya';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        $data['data_'] = $this->sku_lm->edit_skub($id_sku);

        $this->load->view('user/bantara/soal_', $data);
    }
    public function jawaban_()
    {

        $soal = $this->input->post('id_soal');
        $nim = $this->input->post('id_siswa');
        $sql = $this->db->query("SELECT * FROM penempuhan_ where id_soal = '$soal' and id_siswa = '$nim'");
        $cek_nim = $sql->num_rows();

        if ($cek_nim > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Sudah Mengerjakan.</div>');
            redirect('user/esku_laksana');
        } else {
            $jawaban_ = $_FILES['jawaban_'];
            if ($jawaban_) {
                $config['allowed_types'] = 'jpg|png|jpeg|PNG|pdf';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/jawaban';

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('jawaban_')) {
                    $tanggal_ = $this->input->post('tanggal_');
                    $id_siswa = $this->input->post('id_siswa');
                    $nama_ = $this->input->post('nama_');
                    $tingkat_sku = $this->input->post('tingkat_sku');
                    $soal_ = $this->input->post('soal_');
                    $id_soal = $this->input->post('id_soal');
                    $jawab = $this->input->post('jawaban_');
                    $data = array(
                        'tanggal_' => $tanggal_,
                        'tingkat_sku' => $tingkat_sku,
                        'id_soal' => $id_soal,
                        'soal_' => $soal_,
                        'id_siswa' => $id_siswa,
                        'nama_' => $nama_,
                        'jawaban_' => $jawab,
                    );
                    $this->sku_lm->jawaban_($data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Jawaban berhasil ditambah.</div>');
                    redirect('user/esku_laksana');
                } else {
                    $jawaban_ = $this->upload->data('file_name');
                    $tanggal_ = $this->input->post('tanggal_');
                    $id_siswa = $this->input->post('id_siswa');
                    $nama_ = $this->input->post('nama_');
                    $tingkat_sku = $this->input->post('tingkat_sku');
                    $soal_ = $this->input->post('soal_');
                    $id_soal = $this->input->post('id_soal');
                    $jawab = $this->input->post('jawaban_');

                    $data = array(
                        'tanggal_' => $tanggal_,
                        'tingkat_sku' => $tingkat_sku,
                        'id_soal' => $id_soal,
                        'soal_' => $soal_,
                        'id_siswa' => $id_siswa,
                        'nama_' => $nama_,
                        'jawaban_' => $jawab,
                        'jawaban_' => $jawaban_
                    );
                    $this->sku_lm->jawaban_($data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Jawaban berhasil ditambah.</div>');
                    redirect('user/esku_laksana');
                }
            }
        }
    }

    public function edit_jawaban($id_tempuh)
    {
        $this->form_validation->set_rules('soal_', 'soal_', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Jawaban Anda';
            $data['user'] = $this->db->get_where('user_', ['username_' =>
            $this->session->userdata('username_')])->row_array();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal Menyimpan</div>');
            redirect('user/esku_laksana');
        } else {

            $jawaban_ = $_FILES['jawaban_'];
            if ($jawaban_) {
                $config['allowed_types'] = 'jpg|png|jpeg|PNG|pdf';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/jawaban';

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('jawaban_')) {
                    $tanggal_ = $this->input->post('tanggal_');
                    $id_siswa = $this->input->post('id_siswa');
                    $nama_ = $this->input->post('nama_');
                    $tingkat_sku = $this->input->post('tingkat_sku');
                    $soal_ = $this->input->post('soal_');
                    $id_soal = $this->input->post('id_soal');
                    $jawab = $this->input->post('jawaban_');
                    $data = array(
                        'tanggal_' => $tanggal_,
                        'tingkat_sku' => $tingkat_sku,
                        'id_soal' => $id_soal,
                        'soal_' => $soal_,
                        'id_siswa' => $id_siswa,
                        'nama_' => $nama_,
                        'jawaban_' => $jawab,
                    );
                    $this->sku_lm->updateJawaban($id_tempuh, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Jawaban berhasil diubah.</div>');
                    redirect('user/esku_laksana');
                } else {
                    $jawaban_ = $this->upload->data('file_name');
                    $tanggal_ = $this->input->post('tanggal_');
                    $id_siswa = $this->input->post('id_siswa');
                    $nama_ = $this->input->post('nama_');
                    $tingkat_sku = $this->input->post('tingkat_sku');
                    $soal_ = $this->input->post('soal_');
                    $id_soal = $this->input->post('id_soal');
                    $jawab = $this->input->post('jawaban_');

                    $data = array(
                        'tanggal_' => $tanggal_,
                        'tingkat_sku' => $tingkat_sku,
                        'id_soal' => $id_soal,
                        'soal_' => $soal_,
                        'id_siswa' => $id_siswa,
                        'nama_' => $nama_,
                        'jawaban_' => $jawab,
                        'jawaban_' => $jawaban_
                    );
                    $this->sku_lm->updateJawaban($id_tempuh, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Jawaban berhasil diubah.</div>');
                    redirect('user/esku_laksana');
                }
            }
        }
    }
    public function tempuh_ulang($id_siswa)
    {
        $this->form_validation->set_rules('soal_', 'soal_', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tempuh Ulang';
            $data['user'] = $this->db->get_where('user_', ['username_' =>
            $this->session->userdata('username_')])->row_array();
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal Menyimpan</div>');
            redirect('user/esku_laksana/viewNilai/' . $id_siswa);
        } else {

            $jawaban_ = $_FILES['jawaban_'];
            if ($jawaban_) {
                $config['allowed_types'] = 'jpg|png|jpeg|PNG|pdf';
                $config['max_size']     = '10000';
                $config['upload_path'] = './assets/jawaban';

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('jawaban_')) {
                    $tanggal_ = $this->input->post('tanggal_');
                    $id_siswa = $this->input->post('id_siswa');
                    $nama_ = $this->input->post('nama_');
                    $tingkat_sku = $this->input->post('tingkat_sku');
                    $soal_ = $this->input->post('soal_');
                    $id_soal = $this->input->post('id_soal');
                    $jawab = $this->input->post('jawaban_');
                    $data = array(
                        'tanggal_' => $tanggal_,
                        'tingkat_sku' => $tingkat_sku,
                        'id_soal' => $id_soal,
                        'soal_' => $soal_,
                        'id_siswa' => $id_siswa,
                        'nama_' => $nama_,
                        'jawaban_' => $jawab,
                    );
                    $this->sku_lm->updateUlang($id_siswa, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Penempuhan ulang berhasil.</div>');
                    redirect('user/esku_laksana/viewNilai/' . $id_siswa);
                } else {
                    $jawaban_ = $this->upload->data('file_name');
                    $tanggal_ = $this->input->post('tanggal_');
                    $id_siswa = $this->input->post('id_siswa');
                    $nama_ = $this->input->post('nama_');
                    $tingkat_sku = $this->input->post('tingkat_sku');
                    $soal_ = $this->input->post('soal_');
                    $id_soal = $this->input->post('id_soal');
                    $jawab = $this->input->post('jawaban_');

                    $data = array(
                        'tanggal_' => $tanggal_,
                        'tingkat_sku' => $tingkat_sku,
                        'id_soal' => $id_soal,
                        'soal_' => $soal_,
                        'id_siswa' => $id_siswa,
                        'nama_' => $nama_,
                        'jawaban_' => $jawab,
                        'jawaban_' => $jawaban_
                    );
                    $this->sku_lm->updateUlang($id_siswa, $data);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Penempuhan ulang berhasil.</div>');
                    redirect('user/esku_laksana/viewNilai/' . $id_siswa);
                }
            }
        }
    }
    public function tambah_skub()
    {

        $data = array(
            'id_sku' => $this->input->post('id_sku'),
            'id_gol' => $this->input->post('id_gol'),
            'jenis_sku' => $this->input->post('jenis_sku'),
            'nama_sku' => $this->input->post('nama_sku'),
        );
        $this->sku_lm->insertData($data);
        redirect('admin/esku_bantara');
    }
    function edit_skub($id_sku)
    {
        $data['title'] = 'Edit | E-SKU';

        $this->load->view('template/auth_header', $data);
        $sku_ = $this->sku_lm->edit_skub($id_sku);
        $data = array(
            'sku_'                => $sku_,

        );

        $this->load->view('admin/esku_/edit_skub.php', $data);
        $this->load->view('template/auth_footer');
    }

    function update_skub($id_sku)
    {
        $data = array(
            // 'id_adm' => $this->input->post('id_adm'),
            'tugas_' => $this->input->post('tugas_'),
            'activate' => $this->input->post('activate'),

        );
        $this->sku_lm->update_skub($id_sku, $data);
        redirect('admin/esku_bantara');
    }
    function hapus_skub($id_sku)
    {
        $deleted = $this->sku_lm->hapus_skub($id_sku);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Article was deleted');
            redirect('admin/esku_bantara');
        }
    }
    function viewNilai($id_usr)
    {
        $data['title'] = 'Data | Nilai Anda';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        $data['nilai_'] = $this->nilai_m->view_nilai($id_usr);

        $this->load->view('user/bantara/esku/hasil_esku', $data);
    }
    function viewNilailulus($id_usr)
    {
        $data['title'] = 'Data | Nilai Anda';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        $data['nilai_'] = $this->nilai_m->view_lulus($id_usr);
        $data['detail_'] = $this->sku_lm->viewDetail($id_usr);
        $this->load->view('user/bantara/esku/hasil_eskululus', $data);
    }
    function viewUlang($id_jawaban)
    {
        $data['title'] = 'Data | Tempuh Ulang';

        $data['user'] = $this->db->get_where('user_', ['username_' =>
        $this->session->userdata('username_')])->row_array();

        $data['jawab_'] = $this->sku_lm->viewUlang($id_jawaban);

        $this->load->view('user/bantara/esku/tempuh_ulang', $data);
    }
    function updateUlang($id_jawab)
    {

        $data = array(
            'tanggal_' => $this->input->post('tanggal_'),
            'jawaban_' => $this->input->post('jawaban_'),

        );
        $this->sku_lm->updateUlang($id_jawab, $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Jawaban Anda Berhasil Diubah.</div>');
        redirect('user/esku_Laksana');
    }
}