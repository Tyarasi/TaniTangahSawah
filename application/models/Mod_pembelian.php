<?php

class Mod_pembelian extends CI_Model
{
    protected $table = 'pembelian_barang';

    public function lihat()
    {
        $query = $this->db->query("SELECT p.*, dp.nama_barang, dp.jumlah_barang, dp.nama_satuan, dp.harga_beli
        FROM pembelian_barang p
        JOIN detail_pembelian dp ON p.kode_pembelian = dp.kode_pembelian
        ORDER BY p.kode_pembelian DESC;");
        return $query->result();
    }
 
    public function jumlah()
    {
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function lihat_kode_pembelian($kode_pembelian)
    {
        return $this->db->get_where($this->table, ['kode_pembelian' => $kode_pembelian])->row();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function hapus($kode_pembelian)
    {
        return $this->db->delete($this->table, ['kode_pembelian' => $kode_pembelian]);
    }

    public function getLaporanTahun($tahun)
    {
        $this->db->select('pembelian_barang.kode_pembelian, pembelian_barang.tanggal_pembelian, pembelian_barang.jam_pembelian, detail_pembelian.nama_barang, detail_pembelian.jumlah_barang, detail_pembelian.nama_satuan, detail_pembelian.harga_beli, (detail_pembelian.harga_beli * detail_pembelian.jumlah_barang) as total_harga');
        $this->db->from('pembelian_barang');
        $this->db->join('detail_pembelian', 'pembelian_barang.kode_pembelian = detail_pembelian.kode_pembelian', 'left');
        $this->db->where('YEAR(pembelian_barang.tanggal_pembelian)', $tahun);
        $query = $this->db->get();

        return $query->result();
    }

    public function getLaporanBulan($bulan)
    {
        $this->db->select('pembelian_barang.kode_pembelian, pembelian_barang.nama_distributor, pembelian_barang.tanggal_pembelian, pembelian_barang.jam_pembelian, detail_pembelian.nama_barang, detail_pembelian.jumlah_barang, detail_pembelian.nama_satuan, detail_pembelian.harga_beli, (detail_pembelian.harga_beli * detail_pembelian.jumlah_barang) as total_harga');
        $this->db->from('pembelian_barang');
        $this->db->join('detail_pembelian', 'pembelian_barang.kode_pembelian = detail_pembelian.kode_pembelian', 'left');
        $this->db->where('MONTH(pembelian_barang.tanggal_pembelian)', $bulan);
        $query = $this->db->get();

        return $query->result();
    }
}