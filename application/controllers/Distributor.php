<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distributor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_distributor', 'mod_distributor');
        $this->data['aktif'] = 'distributor';
    }

    public function index()
    {
        $this->data['data_distributor'] = $this->mod_distributor->lihat();

        //menampilkan halaman distributor utama/index
        $this->load->view('distributor/index', $this->data);
    }

    public function tambah()
    {
        $this->load->view('distributor/tambah', $this->data);
    }

    public function tambah_data()
    {

        $data = [
            'kode_distributor' => $this->input->post('kode_distributor'),
            'nama_distributor' => $this->input->post('nama_distributor'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
        ];

        if ($this->mod_distributor->tambah($data)) {
            $this->session->set_flashdata('success', 'Data Distributor <b>Berhasil</b> Ditambahkan!');
            redirect('distributor');
        } else {
            $this->session->set_flashdata('error', 'Data Distributor <b>Gagal</b> Ditambahkan!');
            redirect('distributor');
        }
    }

    public function update($kode_distributor)
    {
        //lihat_idsup untuk mengubah
        $this->data['distributor'] = $this->mod_distributor->lihat_idsup($kode_distributor);

        $this->load->view('distributor/update', $this->data);
    }

    public function update_data($kode_distributor)
    {

        $data = [
            'kode_distributor' => $this->input->post('kode_distributor'),
            'nama_distributor' => $this->input->post('nama_distributor'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
        ];

        if ($this->mod_distributor->update($data, $kode_distributor)) {
            $this->session->set_flashdata('success', 'Data Distributor <b>Berhasil</b> Diubah!');
            redirect('distributor');
        } else {
            $this->session->set_flashdata('error', 'Data Distributor <b>Gagal</b> Diubah!');
            redirect('distributor');
        }
    }

    public function hapus($kode_distributor)
    {

        if ($this->mod_distributor->hapus($kode_distributor)) {
            $this->session->set_flashdata('success', 'Data Distributor <b>Berhasil</b> Dihapus!');
            redirect('distributor');
        } else {
            $this->session->set_flashdata('error', 'Data Distributor <b>Gagal</b> Dihapus!');
            redirect('distributor');
        }
    }
}
