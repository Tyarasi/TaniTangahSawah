<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->data['aktif'] = 'pembelian';
        $this->load->model('Mod_distributor', 'mod_distributor');
        $this->load->model('Mod_barang', 'mod_barang');
        $this->load->model('Mod_pembelian', 'mod_pembelian');
        $this->load->model('Mod_detail_pembelian', 'mod_detail_pembelian');
        $this->load->model('Mod_satuan', 'mod_satuan');
        $this->load->model('Mod_expired', 'mod_expired');///Last change
    }

    public function index()
    {
        $this->data['data_pembelian'] = $this->mod_pembelian->lihat();

        $this->load->view('pembelian/index', $this->data);
    }

    public function tambah()
    {
        $this->data['data_barang'] = $this->mod_barang->cek_stok_barang();
        $this->data['data_distributor'] = $this->mod_distributor->lihat_nama_distributor();
        $this->data['data_satuan'] = $this->mod_satuan->lihat_satuan();
        $this->load->view('pembelian/tambah', $this->data);
    }

    public function tambah_data()
    {
        $jumlah_barang_dibeli = count($this->input->post('nama_barang_hidden'));

        //Nambah data pada tabel pembelian
        $data_beli = [
            'kode_pembelian' => $this->input->post('kode_pembelian'),
            'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
            'jam_pembelian' => $this->input->post('jam_pembelian'),
            'nama_distributor' => $this->input->post('nama_distributor'),
        ];

        $data_detail_pembelian = [];

        for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
            array_push($data_detail_pembelian, ['kode_pembelian' => $this->input->post('kode_pembelian')]);
            $data_detail_pembelian[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
            $data_detail_pembelian[$i]['harga_beli'] = $this->input->post('harga_beli_hidden')[$i];
            $data_detail_pembelian[$i]['jumlah_barang'] = $this->input->post('jumlah_barang_hidden')[$i];
            $data_detail_pembelian[$i]['nama_satuan'] = $this->input->post('nama_satuan_hidden')[$i];
        }

        if ($this->mod_pembelian->tambah($data_beli) && $this->mod_detail_pembelian->tambah($data_detail_pembelian)) {
            for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
                $this->mod_barang->plus_stok($data_detail_pembelian[$i]['jumlah_barang'], $data_detail_pembelian[$i]['nama_barang']) or die('gagal min stok');
        
                for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
                    $nama_barang = $this->input->post('nama_barang_hidden')[$i];
                    $idBarangQuery = $this->db->query("SELECT barang_id FROM barang WHERE nama_barang = '$nama_barang';");
                    $idBarangResult = $idBarangQuery->row();
                    $idBarang = $idBarangResult->barang_id;
            
                    $kode_barangQuery = $this->db->query("SELECT kode_barang FROM barang WHERE barang_id = '$idBarang'");
                    $kode_barangResult = $kode_barangQuery->row();
                    $kode_barang = $kode_barangResult->kode_barang;
                    $tanggal_expired = $this->input->post('expired_date');
                    $kodePm = $this->input->post('kode_pembelian');
            
                    $data_expired = [
                        'id_barang' => $idBarang,
                        'kode_barang' => $kode_barang,
                        'kode_pembelian' => $kodePm,
                        'stok_barang' => $this->input->post('jumlah_barang_hidden')[$i],
                        'expired_barang' => $tanggal_expired
                    ];
        
                $this->mod_expired->tambah($data_expired);
                } 
            }
            
            $this->session->set_flashdata('success', 'Transaksi <b> Pembelian</b> Berhasil Dibuat!');
            redirect('pembelian');
        }
    }        

    public function detail($kode_pembelian)
    {
        $this->data['pembelian'] = $this->mod_pembelian->lihat_kode_pembelian($kode_pembelian);
        $this->data['data_detail_pembelian'] = $this->mod_detail_pembelian->lihat_kode_pembelian($kode_pembelian);

        $this->load->view('pembelian/detail', $this->data);
    }

    public function hapus($kode_pembelian)
    {

        if ($this->mod_pembelian->hapus($kode_pembelian) && $this->mod_detail_pembelian->hapus($kode_pembelian)) {
            $this->session->set_flashdata('success', 'Transaksi Pembelian <b>Berhasil</b> Dihapus!');
            redirect('pembelian');
        } else {
            $this->session->set_flashdata('error', 'Transaksi Pembelian <b>Gagal</b> Dihapus!');
            redirect('pembelian');
        }
    }

    public function get_data_barang()
    {
        $data = $this->mod_barang->lihat_nama_barang($_POST['nama_barang']);
        echo json_encode($data);
    }

    public function get_data_satuan()
    {
        $data = $this->mod_satuan->lihat_nama_satuan($_POST['nama_satuan']);
        echo json_encode($data);
    }

    public function proses_barang()
    {
        $this->load->view('pembelian/proses');
    }
}