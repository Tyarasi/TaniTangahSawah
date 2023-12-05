<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_barang extends CI_Model
{
    protected $table = 'barang';
    protected $table1 = 'expired_barang';

    public function lihat_barang()
    {
        //mengambil data dari tabel barang dan mengurutkan bedasarkan id barang, desc describe
        $query = $this->db->query("select * from barang order by barang_id desc");
        return $query->result();
    }

    public function jumlah()
    {
        $query = $this->db->get($this->table);
        //num_rows() menghitung jumlah baris pada data tabel yang dituju
        return $query->num_rows();
    }

    public function lihat_id_barang($kode_barang)
    {
        $query = $this->db->get_where($this->table, ['kode_barang' => $kode_barang]);
        return $query->row();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($data, $kode_barang)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['kode_barang' => $kode_barang]);
        $query = $this->db->update($this->table);
        return $query;
    } 

    public function hapus($kode_barang)
    {
        return $this->db->delete($this->table, ['kode_barang' => $kode_barang]);
    }

    public function lihat_nama_barang($nama_barang)
    {
        $query = $this->db->select('*');
        $query = $this->db->where(['nama_barang' => $nama_barang]);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function cek_stok_barang()
    {
        $query = $this->db->get_where($this->table, 'stok_barang > -1');
        return $query->result();
    }

    public function plus_stok($stok_barang, $nama_barang)
    {
        $query = $this->db->set('stok_barang', 'stok_barang+' . $stok_barang, false);
        $query = $this->db->where('nama_barang', $nama_barang);
        $query = $this->db->update($this->table);
        return $query;
    }

    public function min_stok($stok_barang, $nama_barang)
    {
        $query = $this->db->set('stok_barang', 'stok_barang-' . $stok_barang, false);
        $query = $this->db->where('nama_barang', $nama_barang);
        $query = $this->db->update($this->table);
        return $query;
    }

    public function getStokRendahBarang()
    {
        $query = $this->db->where('stok_barang <=', 'rop')->get('barang');
        return $query->result();
    }
}