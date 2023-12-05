<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_satuan extends CI_Model
{

    protected $table = 'satuan';

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

    public function update($data, $satuan_id)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['satuan_id' => $satuan_id]);
        $query = $this->db->update($this->table);
        return $query;
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function hapus($satuan_id)
    {
        return $this->db->delete($this->table, ['satuan_id' => $satuan_id]);
    }

    public function lihat_idsatuan($satuan_id)
    {
        $query = $this->db->get_where($this->table, ['satuan_id' => $satuan_id]);
        return $query->row();
    }

    public function lihat_satuan()
    {
        $query = $this->db->select('nama_satuan');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function lihat_nama_satuan($nama_satuan)
    {
        $query = $this->db->select('*');
        $query = $this->db->where(['nama_satuan' => $nama_satuan]);
        $query = $this->db->get($this->table);
        return $query->row();
    }
}
