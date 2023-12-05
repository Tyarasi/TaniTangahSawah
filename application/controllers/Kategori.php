<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_kategori', 'mod_kategori');
        $this->data['aktif'] = 'kategori';
    }

    public function index()
    {
        $this->data['data_kategori'] = $this->mod_kategori->lihat();

        //menampilkan halaman data kategori utama/index
        $this->load->view('kategori/index', $this->data);
    }

    public function tambah()
    {
        $this->load->view('kategori/tambah', $this->data);
    }

    public function tambah_data()
    {

        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];

        if ($this->mod_kategori->tambah($data)) {
            $this->session->set_flashdata('success', 'Data Kategori <b>Berhasil</b> Ditambahkan!');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', 'Data Kategori <b>Gagal</b> Ditambahkan!');
            redirect('kategori');
        }
    } 

    public function update($kategori_id)
    {
        //lihat_idkate untuk mengubah
        $this->data['kategori'] = $this->mod_kategori->lihat_idkate($kategori_id);

        $this->load->view('kategori/update', $this->data);
    }

    public function update_data($kategori_id)
    {

        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];

        if ($this->mod_kategori->update($data, $kategori_id)) {
            $this->session->set_flashdata('success', 'Data Kategori <b>Berhasil</b> Diubah!');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', 'Data Kategori <b>Gagal</b> Diubah!');
            redirect('kategori');
        }
    }

    public function hapus($kategori_id)
    {

        if ($this->mod_kategori->hapus($kategori_id)) {
            $this->session->set_flashdata('success', 'Data Kategori <b>Berhasil</b> Dihapus!');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('error', 'Data Kategori <b>Gagal</b> Dihapus!');
            redirect('kategori');
        }
    }
}