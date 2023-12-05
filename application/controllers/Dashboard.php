<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['aktif'] = 'dashboard';
        $this->load->model('Mod_distributor', 'mod_distributor');
        $this->load->model('Mod_barang', 'mod_barang');
        $this->load->model('Mod_penjualan', 'mod_penjualan');
        $this->load->model('Mod_pembelian', 'mod_pembelian');
        $this->load->model('Mod_detail_penjualan', 'mod_detail_penjualan');
        $this->load->model('Mod_detail_pembelian', 'mod_detail_pembelian');
        $this->load->model('Mod_expired', 'mod_expired');
    }

    public function index()
    {
        //memanggil model  lalu ke method jumlah, menghitung banyak data. Akan tampil pada bagian card
        $this->data['jumlah_distributor'] = $this->mod_distributor->jumlah();
        $this->data['jumlah_barang'] = $this->mod_barang->jumlah();
        $this->data['jumlah_penjualan'] = $this->mod_penjualan->jumlah();
        $this->data['jumlah_pembelian'] = $this->mod_pembelian->jumlah();

        $this->data['dataPenjualan'] = $this->mod_detail_penjualan->dataPenjualan();
        $this->data['penjualan_akhir'] = $this->mod_detail_penjualan->get_tampil_dashboard();
        $this->data['pembelian_akhir'] = $this->mod_detail_pembelian->get_tampil_dashboard();
        $this->data['jumlah_barang_sell'] = $this->mod_detail_penjualan->get_jumlah_barang_terjual();

        $this->load->view('masuk/dashboard', $this->data);
    }
}