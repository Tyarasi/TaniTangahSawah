<?php

class Mod_detail_penjualan extends CI_Model
{

    protected $_table = 'detail_penjualan';
    protected $table = 'penjualan_barang';

    public function tambah($data)
    {
        //tabel detail_penjualan
        return $this->db->insert_batch($this->_table, $data);
    }


    public function lihat_kode_penjualan($kode_penjualan)
    {
        return $this->db->select('dp.kode_penjualan, dp.nama_barang, dp.jumlah_barang, dp.nama_satuan, dp.harga_jual, (dp.jumlah_barang * dp.harga_jual) AS total, p.expired_date')
        ->from('detail_penjualan dp')
        ->join('penjualan_barang p', 'dp.kode_penjualan = p.kode_penjualan')
        ->where('dp.kode_penjualan', $kode_penjualan)
        ->get()
        ->result();
    }

    public function hapus($kode_penjualan)
    {
        return $this->db->delete($this->_table, ['kode_penjualan' => $kode_penjualan]);
    }

    public function dataPenjualan()
    {
        $year = date("Y");
        $month = date('m');
        $hasil = $this->db->query("SELECT b.tanggal_penjualan, SUM(b.penjualan) AS penjualan
		FROM (
			SELECT p.tanggal_penjualan, SUM(dk.jumlah_barang * dk.harga_jual) AS penjualan, 0 AS pembelian
			FROM detail_penjualan dk
			INNER JOIN penjualan_barang p ON p.kode_penjualan = dk.kode_penjualan
			WHERE YEAR(p.tanggal_penjualan) = $year
			GROUP BY p.tanggal_penjualan
		) b
		WHERE b.penjualan != 0
		GROUP BY b.tanggal_penjualan")->result();

        return $hasil;
    }

    public function get_tampil_dashboard($limit = 3)
    {
        $this->db->order_by('kode_penjualan', 'desc');
        $this->db->limit($limit);
        $query = $this->db->get('detail_penjualan');
        return $query->result();
    }

    public function get_jumlah_barang_terjual()
    {
        $this->db->select_sum('jumlah_barang');
        $query = $this->db->get('detail_penjualan');
        $result = $query->row();
        return $result->jumlah_barang;
    }
}