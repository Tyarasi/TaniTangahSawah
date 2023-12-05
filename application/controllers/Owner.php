<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['aktif'] = 'owner';
        $this->load->model('Mod_owner', 'mod_owner');
    }

    public function index()
    {
        $this->data['data_owner'] = $this->mod_owner->lihat();

        //menampilkan halaman owner utama/index
        $this->load->view('owner/index', $this->data);
    }


    public function update($pemilik_id)
    {

        $this->data['owner'] = $this->mod_owner->lihat_id_owner($pemilik_id);

        $this->load->view('owner/update', $this->data);
    }

    public function update_data($pemilik_id)
    {

        $data = [
            'nama_toko' => $this->input->post('nama_toko'),
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
        ];

        if ($this->mod_owner->update($data, $pemilik_id)) {
            $this->session->set_flashdata('success', 'Data Owner <b>Berhasil</b> Diubah!');
            redirect('owner');
        } else {
            $this->session->set_flashdata('error', 'Data Owner <b>Gagal</b> Diubah!');
            redirect('owner');
        }
    }

    public function hapus($pemilik_id)
    {

        if ($this->mod_owner->hapus($pemilik_id)) {
            $this->session->set_flashdata('success', 'Data Owner <b>Berhasil</b> Dihapus!');
            redirect('owner');
        } else {
            $this->session->set_flashdata('error', 'Data Owner <b>Gagal</b> Dihapus!');
            redirect('owner');
        }
    }

    public function update_password($pemilik_id)
    {
        $password_lama = $this->input->post('password');
        $password_baru = $this->input->post('password_baru');
        $konfirmasi_password = $this->input->post('konfirmasi_password');

        // Periksa apakah password lama sesuai dengan password yang ada di database
        $owner = $this->mod_owner->get_by_id($pemilik_id);
        if ($password_lama !== $owner->password) {
            $this->session->set_flashdata('error', 'Password lama tidak sesuai.');
            redirect('owner/update_password/' . $pemilik_id);
        }

        // Periksa apakah password baru dan konfirmasi password baru cocok
        if ($password_baru !== $konfirmasi_password) {
            $this->session->set_flashdata('error', 'Konfirmasi password baru tidak sesuai.');
            redirect('owner/update_password/' . $pemilik_id);
        }

        // Update password baru ke dalam database
        $data = array('password' => $password_baru);
        if ($this->mod_owner->update($data, $pemilik_id)) {
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
