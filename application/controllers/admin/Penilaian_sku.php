<?php

class Penilaian_sku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_m');
        $this->load->model('user_m');
        $this->load->model('nilai_m');
        $this->load->model('sku_bm');
        $this->load->model('sku_lm');
        $this->load->model('auth_m');
    }
    public function datatidakLulus()
    {
        $data['title'] = 'Data | Nilai';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->nilai_m->data_tidakLulus();
        $this->load->view('admin/dt_tempuh/tidak_lulus.php', $data);
    }
    public function dataBantara()
    {
        $data['title'] = 'Data | Penempuhan';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->nilai_m->data_Bantara();

        $this->load->view('admin/dt_tempuh/data_bantara.php', $data);
    }
    public function dataLaksana()
    {
        $data['title'] = 'Data | Penempuhan';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->nilai_m->data_Laksana();

        $this->load->view('admin/dt_tempuh/data_laksana.php', $data);
    }
    function detail_tdkLulus($id_siswa = null)
    {
        $data['title'] = 'Detail Nilai';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->nilai_m->data_tdkLulus($id_siswa);

        $this->load->view('admin/tempuh_esku/nilai_ulang', $data);
    }
    function detail_Lulus($id_siswa = null)
    {
        $data['title'] = 'Detail Penempuhan';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->nilai_m->dataLulus($id_siswa);

        $this->load->view('admin/tempuh_esku/nilai_lulus', $data);
    }
    function detail_jawabanBtr($id_siswa = null)
    {
        $data['title'] = 'Detail Jawaban';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->nilai_m->data_jawab($id_siswa);

        $this->load->view('admin/tempuh_esku/detail_jawabanbtr', $data);
    }
    function detail_jawabanLks($id_siswa = null)
    {
        $data['title'] = 'Detail Jawaban';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->nilai_m->data_jawab($id_siswa);

        $this->load->view('admin/tempuh_esku/detail_jawabanlks', $data);
    }

    public function viewNilaibtr($id_tempuh = null)
    {
        $data['title'] = 'Data | Nilai';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['jawaban_'] = $this->nilai_m->data_jawaban($id_tempuh);

        $this->load->view('admin/tempuh_esku/penilaianbtr', $data);
    }
    public function viewNilailks($id_jawab = null)
    {
        $data['title'] = 'Data | Nilai';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['jawaban_'] = $this->nilai_m->data_jawaban($id_jawab);

        $this->load->view('admin/tempuh_esku/penilaianlks', $data);
    }

    function tambah_nilaibtr($id_tempuh = null)
    {
        $data = array(
            'tgl_nilai' => $this->input->post('tgl_nilai'),
            'nilai1_' => $this->input->post('nilai1_'),
            'nilai2_' => $this->input->post('nilai2_'),
            'nilai3_' => $this->input->post('nilai3_'),
            'nilai_akhir' => $this->input->post('nilai_akhir'),
            'hasil_' => $this->input->post('hasil_'),
            'catatan_' => $this->input->post('catatan_'),

        );
        $this->nilai_m->tambah_nilai($id_tempuh, $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda Telah Menambahkan Nilai.</div>');
        redirect('admin/dt_user/datapenempuhbtr');
    }
    function tambah_nilailks($id_tempuh = null)
    {
        $data = array(
            'tgl_nilai' => $this->input->post('tgl_nilai'),
            'nilai1_' => $this->input->post('nilai1_'),
            'nilai2_' => $this->input->post('nilai2_'),
            'nilai3_' => $this->input->post('nilai3_'),
            'nilai_akhir' => $this->input->post('nilai_akhir'),
            'hasil_' => $this->input->post('hasil_'),
            'catatan_' => $this->input->post('catatan_'),

        );
        $this->nilai_m->tambah_nilai($id_tempuh, $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda Telah Menambahkan Nilai.</div>');
        redirect('admin/dt_user/datapenempuhlks');
    }
    public function nilai_()
    {
        $jawaban = $this->input->post('id_jawaban');
        $nim = $this->input->post('id_siswa');
        $sql = $this->db->query("SELECT * FROM nilai_ where id_jawaban = '$jawaban' and id_siswa = '$nim'");
        $cek_nim = $sql->num_rows();

        if ($cek_nim > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda Sudah Memberikan Nilai.</div>');
            redirect('admin/dt_user/datapenempuhbtr');
        } else {
            $data = array(
                'tanggal_' => $this->input->post('tanggal_'),
                'tingkat_sku' => $this->input->post('tingkat_sku'),
                'id_soal' => $this->input->post('id_soal'),
                'soal_' => $this->input->post('soal_'),
                'id_jawaban' => $this->input->post('id_jawaban'),
                'jawaban_' => $this->input->post('jawaban_'),
                'id_siswa' => $this->input->post('id_siswa'),
                'nama_' => $this->input->post('nama_'),
                'nilai1_' => $this->input->post('nilai1_'),
                'nilai2_' => $this->input->post('nilai2_'),
                'nilai3_' => $this->input->post('nilai3_'),
                'nilai_akhir' => $this->input->post('nilai_akhir'),
                'ket_' => $this->input->post('ket_'),
                'catatan_' => $this->input->post('catatan_'),
            );
            $this->nilai_m->nilai_($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Nilai Berhasil Ditambahkan.</div>');
            redirect('admin/dt_user/datapenempuhbtr');
        }
    }
    public function nilai_ulang($id_tempuh = null)
    {
        $data['title'] = 'Data | Nilai Tugas';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['nilai_'] = $this->nilai_m->nilai_ulang($id_tempuh);

        $this->load->view('admin/tempuh_esku/edit_nilai', $data);
    }

    function update_nilai($id_tempuh)
    {
        $data = array(
            'tgl_nilai' => $this->input->post('tgl_nilai'),
            'nilai1_' => $this->input->post('nilai1_'),
            'nilai2_' => $this->input->post('nilai2_'),
            'nilai3_' => $this->input->post('nilai3_'),
            'nilai_akhir' => $this->input->post('nilai_akhir'),
            'hasil_' => $this->input->post('hasil_'),
            'catatan_' => $this->input->post('catatan_'),

        );
        $this->nilai_m->update_nilai($id_tempuh, $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Nilai Berhasil Diubah.</div>');
        redirect('admin/penilaian_sku/datatidakLulus');
    }
    public function view_form($id_siswa)
    {
        $data['title'] = 'Form Kenaikan Tingkat';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->nilai_m->data_form($id_siswa);
        $data['siswa_'] = $this->nilai_m->data_ubahBtr($id_siswa);

        $this->load->view('admin/tempuh_esku/view_form.php', $data);
    }
    public function view_formLks($id_siswa)
    {
        $data['title'] = 'Form Kenaikan Tingkat';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();

        $data['data_'] = $this->nilai_m->data_formLks($id_siswa);

        $this->load->view('admin/tempuh_esku/view_form.php', $data);
    }
    public function do_unduh($id_unggah)
    {
        $data['title'] = 'Form Kenaikan Tingkat';

        $data['user'] = $this->db->get_where('admin_', ['username_adm' =>
        $this->session->userdata('username_adm')])->row_array();
        $data['data_'] = $this->nilai_m->do_unduh($id_unggah);
        force_download('./assets/form/bantara/', null);
    }
}