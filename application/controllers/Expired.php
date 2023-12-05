<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expired extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_expired', 'mod_expired');
        $this->data['aktif'] = 'expired';
    }
    public function index() 
    {
        $this->data['expired'] = $this->mod_expired->lihat_barang();
        $this->load->view('expired/index', $this->data);
    } 

    public function hapus($id)
    {
        if ($this->mod_expired->hapus($id)) {
            $this->session->set_flashdata('success', 'Data Barang Expired <b>Berhasil</b> Dihapus!');
            redirect('expired');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <b>Gagal</b> Dihapus!');
            redirect('expired');
        }
    }
    
    public function log_expired($id, $stok_barang, $clean_nama_barang)
    {
        $this->mod_expired->change_brg($id);
        $clean_nama_barang1 = base64_decode(urldecode($clean_nama_barang));
        $this->mod_expired->exmin($stok_barang, $clean_nama_barang1);
        $data['log_ex'] = $this->mod_expired->get_log();
        $data['aktif'] = 'log_ex';
        $this->load->view('expired/log_expired', $data);
    }


    public function riwayat(){
        $data['log_ex'] = $this->log_expired->get_log();
        $data['aktif'] = 'log_ex';
        $this->load->view('expired/log_expired', $data);
    }
    
    public function update($id)
    {
        $this->data['expired'] = $this->mod_expired->getData($id);
        $this->load->view('expired/log_update', $this->data);
    }

    public function update_data($id){
        $data = [
            'access_expired' => $this->input->post('access_expired'),
            'expired_barang' => $this->input->post('expired_barang'),
        ];

        $data1 = $this->input->post('stok_barang');
        $nama_barang = $this->input->post('nama_barang');

        if ($this->mod_expired->update($data, $id) && $this->mod_expired->explus($data1, $nama_barang)) {
            $this->session->set_flashdata('success', 'Data Barang <b>Berhasil</b> Diubah!');
            redirect('expired');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <b>Gagal</b> Diubah!');
            redirect('expired');
        }
    }
}