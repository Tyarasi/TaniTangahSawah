<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->data['aktif'] = 'penjualan';
        $this->load->model('Mod_penjualan', 'mod_penjualan');
        $this->load->model('Mod_barang', 'mod_barang');
        $this->load->model('Mod_satuan', 'mod_satuan');
        $this->load->model('Mod_expired', 'mod_expired');
        $this->load->model('Mod_detail_penjualan', 'mod_detail_penjualan');
    }

    public function index()
    {
        $this->data['data_penjualan'] = $this->mod_penjualan->lihat();
        $this->load->view('penjualan/index', $this->data);
    }

    public function tambah()
    {
        $this->data['data_barang'] = $this->mod_barang->cek_stok_barang();
        $this->data['data_satuan'] = $this->mod_satuan->lihat_satuan();
        $this->data['expired_date'] = $this->mod_expired->lihat_barang();
        $this->load->view('penjualan/tambah', $this->data);
    }

    public function tambah_data()
    {
        $jumlah_barang_terjual = count($this->input->post('nama_barang_hidden'));

        //Nambah data pada tabel penjualan
        $data_terjual = [
            'kode_penjualan' => $this->input->post('kode_penjualan'),
            'tanggal_penjualan' => date('Y-m-d', strtotime($this->input->post('tanggal_penjualan'))),
            'jam_penjualan' => $this->input->post('jam_penjualan'),
            'expired_date' => $this->input->post('expired_date'),
        ];

        $data_detail_penjualan = [];

        for ($i = 0; $i < $jumlah_barang_terjual; $i++) {
            array_push($data_detail_penjualan, ['kode_penjualan' => $this->input->post('kode_penjualan')]);
            $data_detail_penjualan[$i]['nama_barang'] = $this->input->post('nama_barang_hidden')[$i];
            $data_detail_penjualan[$i]['jumlah_barang'] = $this->input->post('jumlah_barang_hidden')[$i];
            $data_detail_penjualan[$i]['nama_satuan'] = $this->input->post('nama_satuan_hidden')[$i];
            $data_detail_penjualan[$i]['harga_jual'] = $this->input->post('harga_jual_hidden')[$i];
        }
 
        if ($this->mod_penjualan->tambah($data_terjual) && $this->mod_detail_penjualan->tambah($data_detail_penjualan)) {
            for ($i = 0; $i < $jumlah_barang_terjual; $i++) {
                $this->mod_barang->min_stok($data_detail_penjualan[$i]['jumlah_barang'], $data_detail_penjualan[$i]['nama_barang']) or die('gagal min stok');
                $jmlBrg = $this->input->post('jumlah_barang_hidden')[$i];
                $kodeBrg = $this->input->post('kode_barang_hidden')[$i];
                $this->mod_expired->min_stok2($jmlBrg, $kodeBrg) or die('gagal min stok');
            }
            $this->session->set_flashdata('success', 'Transaksi <b> penjualan</b> Berhasil Dibuat!');
            redirect('penjualan');
        }
    }

    public function detail($kode_penjualan)
    {
        $this->data['penjualan'] = $this->mod_penjualan->lihat_kode_penjualan($kode_penjualan);
        $this->data['data_detail_penjualan'] = $this->mod_detail_penjualan->lihat_kode_penjualan($kode_penjualan);
        $this->load->view('penjualan/detail', $this->data);
    }

    public function hapus($kode_penjualan)
    {
        if ($this->mod_penjualan->hapus($kode_penjualan) && $this->mod_detail_penjualan->hapus($kode_penjualan)) {
            $this->session->set_flashdata('success', 'Transaksi Penjualan <b>Berhasil</b> Dihapus!');
            redirect('penjualan');
        } else {
            $this->session->set_flashdata('error', 'Transaksi Penjualan <b>Gagal</b> Dihapus!');
            redirect('penjualan');
        }
    }

    public function get_data_barang()
    {
        $data = $this->mod_barang->lihat_nama_barang($_POST['nama_barang']);
        echo json_encode($data);
    }
    
    public function get_min_expired()
    {
        $kode_barang = $this->input->post('kode_barang');
        $min_expired = $this->mod_expired->get_expired($kode_barang);
    
        echo json_encode(['min_expired_date' => $min_expired]);
    }


    public function get_data_satuan()
    {
        $data = $this->mod_satuan->lihat_nama_satuan($_POST['nama_satuan']);
        echo json_encode($data);
    }

    public function proses_barang()
    {
        $this->load->view('penjualan/proses');
    }

    public function get_data_penjualan()
    {
        $grafik_penjualan = $this->mod_penjualan->get_data();
        echo json_encode($grafik_penjualan);
    }
}