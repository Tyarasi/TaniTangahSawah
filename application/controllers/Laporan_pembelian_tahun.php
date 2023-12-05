<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pembelian_tahun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['aktif'] = 'laporan_pembelian_tahun';
        $this->load->model('Mod_pembelian', 'mod_pembelian');
        $this->load->model('Mod_detail_pembelian', 'mod_detail_pembelian');
    }

    public function index()
    {
        // Menampilkan form untuk memasukkan tahun dan bulan
        $tahun = $this->input->post('tahun');
        $this->data['laporan'] = $this->mod_pembelian->getLaporanTahun($tahun);

        $this->load->view('pembelian/laporan_tahun', $this->data);
    }

    public function generate()
    {
        // Mengambil data tahun dan bulan dari form
        $tahun = $this->input->post('tahun');

        // Memanggil model untuk mendapatkan data barang masuk
        $this->data['laporan'] = $this->mod_pembelian->getLaporanTahun($tahun);

        // Menampilkan laporan barang masuk
        $this->load->view('pembelian/laporan_tahun', $this->data);
    }
}
