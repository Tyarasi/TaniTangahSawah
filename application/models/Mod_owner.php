<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_owner extends CI_Model
{
    protected $table = 'pemilik';

    public function lihat()
    {
        $query = $this->db->get($this->table);
        //result() mengambil hasil query data dari tabel
        return $query->result();
    }
    
    public function get_by_id($pemilik_id) {
        $this->db->where('pemilik_id', $pemilik_id);
        return $this->db->get('pemilik')->row();
    }

    public function lihat_id_owner($pemilik_id)
    {
        $query = $this->db->get_where($this->table, ['pemilik_id' => $pemilik_id]);
        return $query->row();
    }

    public function update($data, $pemilik_id)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['pemilik_id' => $pemilik_id]);
        $query = $this->db->update($this->table);
        return $query;
    }

    public function lihat_username($username)
    {
        $query = $this->db->get_where($this->table, ['username' => $username]);
        return $query->row();
    }

    public function ubah($data, $pemilik_id)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['pemilik_id' => $pemilik_id]);
        $query = $this->db->update($this->table);
        return $query;
    }
}