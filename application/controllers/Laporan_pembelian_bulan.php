<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pembelian_bulan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['aktif'] = 'laporan_pembelian_bulan';
        $this->load->model('Mod_pembelian', 'mod_pembelian');
        $this->load->model('Mod_detail_pembelian', 'mod_detail_pembelian');
    }

    public function index()
    {
        // Menampilkan form untuk memasukkan tahun dan bulan
        $bulan = $this->input->post('bulan');
        $this->data['laporan'] = $this->mod_pembelian->getLaporanBulan($bulan);

        $this->load->view('pembelian/laporan_bulanan', $this->data);
    }

    public function generate()
    {
        // Mengambil data tahun dan bulan dari form
        $bulan = $this->input->post('bulan');

        // Memanggil model untuk mendapatkan data barang masuk
        $this->data['laporan'] = $this->mod_pembelian->getLaporanBulan($bulan);

        // Menampilkan laporan barang masuk
        $this->load->view('pembelian/laporan_bulanan', $this->data);
    }
}
