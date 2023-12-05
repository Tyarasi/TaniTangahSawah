<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['aktif'] = 'karyawan';
        $this->load->model('Mod_karyawan', 'mod_karyawan');
    }

    public function index()
    {
        $this->data['data_karyawan'] = $this->mod_karyawan->lihat();

        //menampilkan halaman karyawan utama/index
        $this->load->view('karyawan/index', $this->data);
    }

    public function tambah()
    {
        $this->load->view('karyawan/tambah', $this->data);
    }

    public function tambah_data()
    {

        $data = [
            'kode_karyawan' => $this->input->post('kode_karyawan'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'no_hp' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];

        if ($this->mod_karyawan->tambah($data)) {
            $this->session->set_flashdata('success', 'Data Karyawan <b>Berhasil</b> Ditambahkan!');
            redirect('karyawan');
        } else {
            $this->session->set_flashdata('error', 'Data Karyawan <b>Gagal</b> Ditambahkan!');
            redirect('karyawan');
        }
    }

    public function update($karyawan_id)
    {

        $this->data['karyawan'] = $this->mod_karyawan->lihat_id_karyawan($karyawan_id);

        $this->load->view('karyawan/update', $this->data);
    }

    public function update_data($karyawan_id)
    {

        $data = [
            'kode_karyawan' => $this->input->post('kode_karyawan'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'no_hp' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];

        if ($this->mod_karyawan->update($data, $karyawan_id)) {
            $this->session->set_flashdata('success', 'Data Karyawan <b>Berhasil</b> Diubah!');
            redirect('karyawan');
        } else {
            $this->session->set_flashdata('error', 'Data Karyawan <b>Gagal</b> Diubah!');
            redirect('karyawan');
        }
    }

    public function hapus($karyawan_id)
    {

        if ($this->mod_karyawan->hapus($karyawan_id)) {
            $this->session->set_flashdata('success', 'Data Karyawan <b>Berhasil</b> Dihapus!');
            redirect('karyawan');
        } else {
            $this->session->set_flashdata('error', 'Data Karyawan <b>Gagal</b> Dihapus!');
            redirect('karyawan');
        }
    }

    public function edit_password($karyawan_id)
    {
        // Mendapatkan data karyawan berdasarkan karyawan_id dari database
        $data['karyawan'] = $this->mod_karyawan->get_by_id($karyawan_id);

        // Tampilkan view form dengan data karyawan
        $this->load->view('edit_password_form', $data);
    }

    public function ubah_password($karyawan_id)
    {

        $this->data['karyawan'] = $this->mod_karyawan->lihat_id_karyawan($karyawan_id);

        $this->load->view('karyawan/ubah_password', $this->data);
    }
    public function update_password($karyawan_id)
    {
        $password_lama = $this->input->post('password');
        $password_baru = $this->input->post('password_baru');
        $konfirmasi_password = $this->input->post('konfirmasi_password');

        // Periksa apakah password lama sesuai dengan password yang ada di database
        $karyawan = $this->mod_karyawan->get_by_id($karyawan_id);
        if ($password_lama !== $karyawan->password) {
            $this->session->set_flashdata('error', 'Password lama tidak sesuai.');
            redirect('karyawan/ubah_password/' . $karyawan_id);
        }

        // Periksa apakah password baru dan konfirmasi password baru cocok
        if ($password_baru !== $konfirmasi_password) {
            $this->session->set_flashdata('error', 'Konfirmasi password baru tidak sesuai.');
            redirect('karyawan/ubah_password/' . $karyawan_id);
        }

        // Update password baru ke dalam database
        $data = array('password' => $password_baru);
        if ($this->mod_karyawan->update($data, $karyawan_id)) {
            $this->session->set_flashdata('success', 'Password Berhasil Diubah!');
        } else {
            $this->session->set_flashdata('error', 'Password Gagal Diubah!');
        }

        // Lakukan logout untuk memastikan pengguna harus login kembali dengan password baru
        $this->session->sess_destroy();

        // Arahkan pengguna ke halaman login
        redirect('login');
    }
}
