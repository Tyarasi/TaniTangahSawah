<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_penjualan_tahun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['aktif'] = 'laporan_penjualan_tahun';
        $this->load->model('Mod_penjualan', 'mod_penjualan');
        $this->load->model('Mod_detail_penjualan', 'mod_detail_penjualan');
    }

    public function index()
    {
        // Menampilkan form untuk memasukkan tahun dan bulan
        $tahun = $this->input->post('tahun');
        $this->data['laporan'] = $this->mod_penjualan->getLaporanTahun($tahun);
        $this->load->view('penjualan/laporan_tahun', $this->data);
    }

    public function generate()
    {
        // Mengambil data tahun dan bulan dari form
        $tahun = $this->input->post('tahun');

        // Memanggil model untuk mendapatkan data barang masuk
        $this->data['laporan'] = $this->mod_penjualan->getLaporanTahun($tahun);

        // Menampilkan laporan barang masuk
        $this->load->view('penjualan/laporan_tahun', $this->data);
    }
}
