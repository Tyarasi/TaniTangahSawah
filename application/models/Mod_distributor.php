<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_distributor extends CI_Model
{

    protected $table = 'distributor';

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

    public function update($data, $kode_distributor)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['kode_distributor' => $kode_distributor]);
        $query = $this->db->update($this->table);
        return $query;
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function hapus($kode_distributor)
    {
        return $this->db->delete($this->table, ['kode_distributor' => $kode_distributor]);
    }

    public function lihat_idsup($kode_distributor)
    {
        $query = $this->db->get_where($this->table, ['kode_distributor' => $kode_distributor]);
        return $query->row();
    }

    public function lihat_nama_distributor()
    {
        $query = $this->db->select('nama_distributor');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function cek_kode_dis()
    {
        $query = $this->db->query("SELECT MAX(kode_distributor) as kode_distributor from distributor");
        $hasil = $query->row();
        return $hasil->kode_distributor;
    }
}
