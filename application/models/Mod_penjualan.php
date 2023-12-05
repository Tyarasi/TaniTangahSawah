<?php

class Mod_penjualan extends CI_Model
{
    protected $table = 'penjualan_barang';

    public function lihat()
    {
        $query = $this->db->query("SELECT p.*, dp.nama_barang, dp.jumlah_barang, dp.nama_satuan, dp.harga_jual
        FROM penjualan_barang p
        JOIN detail_penjualan dp ON p.kode_penjualan = dp.kode_penjualan
        ORDER BY p.kode_penjualan DESC;
        ");
        return $query->result();
    }

    public function jumlah()
    {
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function lihat_kode_penjualan($kode_penjualan)
    {
        return $this->db->get_where($this->table, ['kode_penjualan' => $kode_penjualan])->row();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function hapus($kode_penjualan)
    {
        return $this->db->delete($this->table, ['kode_penjualan' => $kode_penjualan]);
    }

    public function getData()
    {
        // Ambil data laporan penjualan dari database
        $this->db->select('penjualan_barang.tanggal_penjualan, detail_penjualan.kode_penjualan, detail_penjualan.nama_barang, detail_penjualan.jumlah_barang, detail_penjualan.harga_jual, (detail_penjualan.jumlah_barang * detail_penjualan.harga_jual) AS total_harga');
        $this->db->from('detail_penjualan');
        $this->db->join('penjualan_barang', 'detail_penjualan.kode_penjualan = penjualan_barang.kode_penjualan');
        $query = $this->db->get();
        return $query->result();
    }


    public function getLaporanTahun($tahun)
    {
        $this->db->select('penjualan_barang.kode_penjualan, penjualan_barang.tanggal_penjualan, penjualan_barang.jam_penjualan, detail_penjualan.nama_barang, detail_penjualan.jumlah_barang, detail_penjualan.nama_satuan, detail_penjualan.harga_jual, (detail_penjualan.harga_jual * detail_penjualan.jumlah_barang) as total_harga');
        $this->db->from('penjualan_barang');
        $this->db->join('detail_penjualan', 'penjualan_barang.kode_penjualan = detail_penjualan.kode_penjualan', 'left');
        $this->db->where('YEAR(penjualan_barang.tanggal_penjualan)', $tahun);
        $query = $this->db->get();

        return $query->result();
    }

    public function getLaporanBulan($bulan)
    {
        $this->db->select('penjualan_barang.kode_penjualan, penjualan_barang.tanggal_penjualan, penjualan_barang.jam_penjualan, detail_penjualan.nama_barang, detail_penjualan.jumlah_barang, detail_penjualan.nama_satuan, detail_penjualan.harga_jual, (detail_penjualan.harga_jual * detail_penjualan.jumlah_barang) as total_harga');
        $this->db->from('penjualan_barang');
        $this->db->join('detail_penjualan', 'penjualan_barang.kode_penjualan = detail_penjualan.kode_penjualan', 'left');
        $this->db->where('MONTH(penjualan_barang.tanggal_penjualan)', $bulan);
        $query = $this->db->get();

        return $query->result();
    }
}