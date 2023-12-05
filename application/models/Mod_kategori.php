<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_kategori extends CI_Model
{

    protected $table = 'kategori';

    public function lihat()
    {
        $query = $this->db->get($this->table);
        //result() mengambil hasil query data dari tabel
        return $query->result();
    }

    public function jumlah()
    {
        $query = $this->db->get($this->table);
        //num_rows() menghitung jumlah baris pada data tabel yang dituju
        return $query->num_rows();
    }

    public function update($data, $kategori_id)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['kategori_id' => $kategori_id]);
        $query = $this->db->update($this->table);
        return $query;
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function hapus($kategori_id)
    {
        return $this->db->delete($this->table, ['kategori_id' => $kategori_id]);
    }

    public function lihat_idkate($kategori_id)
    {
        $query = $this->db->get_where($this->table, ['kategori_id' => $kategori_id]);
        return $query->row();
    }

    public function lihat_kategori()
    {
        $query = $this->db->select('nama_kategori');
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
