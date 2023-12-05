<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_barang', 'mod_barang');
        $this->load->model('Mod_kategori', 'mod_kategori');
        $this->load->model('Mod_satuan', 'mod_satuan');
        $this->load->model('Mod_expired', 'mod_expired');

        $this->data['aktif'] = 'barang';
    }

    public function detail($kode_barang)
    {
        $this->data['barang'] = $this->mod_barang->lihat_id_barang($kode_barang);
        $this->data['data_kategori'] = $this->mod_kategori->lihat_kategori();
        $this->data['data_satuan'] = $this->mod_satuan->lihat_satuan();

        $this->load->view('barang/detail', $this->data);
    }

    public function index()
    {
        $this->data['data_barang'] = $this->mod_barang->lihat_barang();
        $this->data['data_kategori'] = $this->mod_kategori->lihat_kategori();

        //menampilkan halaman barang utama/index
        $this->load->view('barang/index', $this->data);
    }
 
    public function tambah()
    {
        $this->data['data_kategori'] = $this->mod_kategori->lihat_kategori();
        $this->data['data_satuan'] = $this->mod_satuan->lihat_satuan();


        $this->load->view('barang/tambah', $this->data);
    }

    public function tambah_data()
    {
        $data = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'stok_barang' => $this->input->post('stok_barang'),
            'nama_satuan' => $this->input->post('nama_satuan'),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),
            'biaya_pesan' => $this->input->post('biaya_pesan'),
            'biaya_simpan' => $this->input->post('biaya_simpan'),
            'lead_time' => $this->input->post('lead_time'),
            'safety_stock' => $this->input->post('safety_stock'),
        ];

        
        if ($this->mod_barang->tambah($data)) {
            $newBarangId = $this->db->insert_id(); 
            $expired = $this->input->post('expired');
            $kode_barang = $this->input->post('kode_barang');
            $stok_barang = $this->input->post('stok_barang');

            $expired_data = [
                'id_barang' => $newBarangId, 
                'kode_barang' => $kode_barang,
                'expired_barang' => $expired,
                'stok_barang' => $stok_barang,
            ];

            if ($this->mod_expired->tambah($expired_data)) {
                $this->session->set_flashdata('success', 'Data Barang <b>Berhasil</b> Ditambahkan!');
                redirect('barang');
            } else {
                $this->session->set_flashdata('error', 'Data Barang <b>Gagal</b> Ditambahkan!');
                redirect('barang');
            }
        } else {
            $this->session->set_flashdata('error', 'Data Barang <b>Gagal</b> Ditambahkan!');
            redirect('barang');
        }
    }

    public function update($kode_barang)
    {

        $this->data['barang'] = $this->mod_barang->lihat_id_barang($kode_barang);
        $this->data['data_kategori'] = $this->mod_kategori->lihat_kategori();
        $this->data['data_satuan'] = $this->mod_satuan->lihat_satuan();

        $this->load->view('barang/update', $this->data);
    }

    public function update_data($kode_barang)
    {
        $data = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'stok_barang' => $this->input->post('stok_barang'),
            'nama_satuan' => $this->input->post('nama_satuan'),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),
            'biaya_pesan' => $this->input->post('biaya_pesan'),
            'biaya_simpan' => $this->input->post('biaya_simpan'),
            'lead_time' => $this->input->post('lead_time'),
            'safety_stock' => $this->input->post('safety_stock'),
            'eoq' => $this->input->post('eoq'),
            'rop' => $this->input->post('rop'),

        ];

        if ($this->mod_barang->update($data, $kode_barang)) {
            $this->session->set_flashdata('success', 'Data Barang <b>Berhasil</b> Diubah!');
            redirect('barang');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <b>Gagal</b> Diubah!');
            redirect('barang');
        }
    }
  
    public function hapus($kode_barang)
    {
        if ($this->mod_barang->hapus($kode_barang)) {
            $this->session->set_flashdata('success', 'Data Barang <b>Berhasil</b> Dihapus!');
            redirect('barang');
        } else {
            $this->session->set_flashdata('error', 'Data Barang <b>Gagal</b> Dihapus!');
            redirect('barang');
        }
    }
}