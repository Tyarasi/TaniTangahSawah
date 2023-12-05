<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_penjualan_bulan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['aktif'] = 'laporan_penjualan_bulan';
        $this->load->model('Mod_penjualan', 'mod_penjualan');
        $this->load->model('Mod_detail_penjualan', 'mod_detail_penjualan');
    }

    public function index()
    {
        // Menampilkan form untuk memasukkan tahun dan bulan
        $bulan = $this->input->post('bulan');
        $this->data['laporan'] = $this->mod_penjualan->getLaporanBulan($bulan);

        $this->load->view('penjualan/laporan_bulanan', $this->data);
    }

    public function generate()
    {
        // Mengambil data tahun dan bulan dari form
        $bulan = $this->input->post('bulan');

        // Memanggil model untuk mendapatkan data barang masuk
        $this->data['laporan'] = $this->mod_penjualan->getLaporanBulan($bulan);

        // Menampilkan laporan barang masuk
        $this->load->view('penjualan/laporan_bulanan', $this->data);
    }
}
