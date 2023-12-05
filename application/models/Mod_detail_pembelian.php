<?php

class Mod_detail_pembelian extends CI_Model
{
    protected $table = 'detail_pembelian';

    public function tambah($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }

    public function lihat_kode_pembelian($kode_pembelian)
    {
        return $this->db->query("SELECT kode_pembelian, nama_barang, jumlah_barang, nama_satuan, harga_beli, 
		(jumlah_barang*harga_beli) AS total FROM detail_pembelian where kode_pembelian='$kode_pembelian'", ['kode_pembelian' => $kode_pembelian])->result();
    }

    public function get_tampil_dashboard($limit = 3)
    {
        $this->db->order_by('kode_pembelian', 'desc');
        $this->db->limit($limit);
        $query = $this->db->get('detail_pembelian');
        return $query->result();
    }
}
