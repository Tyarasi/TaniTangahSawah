<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_satuan', 'mod_satuan');
        $this->data['aktif'] = 'satuan';
    }

    public function index()
    {
        $this->data['data_satuan'] = $this->mod_satuan->lihat();

        //menampilkan halaman satuan utama/index
        $this->load->view('satuan/index', $this->data);
    }

    public function tambah()
    {

        $this->load->view('satuan/tambah', $this->data);
    }

    public function tambah_data()
    {
        $data = [
            'nama_satuan' => $this->input->post('nama_satuan'),
        ];

        if ($this->mod_satuan->tambah($data)) {
            $this->session->set_flashdata('success', 'Data Satuan <b>Berhasil</b> Ditambahkan!');
            redirect('satuan');
        } else {
            $this->session->set_flashdata('error', 'Data Satuan <b>Gagal</b> Ditambahkan!');
            redirect('satuan');
        }
    }

    public function update($satuan_id)
    {
        //lihat_idsatuan untuk mengubah 
        $this->data['satuan'] = $this->mod_satuan->lihat_idsatuan($satuan_id);

        $this->load->view('satuan/update', $this->data);
    }

    public function update_data($satuan_id)
    {

        $data = [
            'nama_satuan' => $this->input->post('nama_satuan'),
        ];

        if ($this->mod_satuan->update($data, $satuan_id)) {
            $this->session->set_flashdata('success', 'Data Satuan <b>Berhasil</b> Diubah!');
            redirect('satuan');
        } else {
            $this->session->set_flashdata('error', 'Data Satuan <b>Gagal</b> Diubah!');
            redirect('satuan');
        }
    }

    public function hapus($satuan_id)
    {

        if ($this->mod_satuan->hapus($satuan_id)) {
            $this->session->set_flashdata('success', 'Data Satuan <b>Berhasil</b> Dihapus!');
            redirect('satuan');
        } else {
            $this->session->set_flashdata('error', 'Data Satuan <b>Gagal</b> Dihapus!');
            redirect('satuan');
        }
    }
}
