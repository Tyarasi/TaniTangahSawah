<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_karyawan extends CI_Model
{
	protected $table = 'karyawan';

	public function lihat()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function jumlah()
	{
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	public function lihat_id_karyawan($karyawan_id)
	{
		$query = $this->db->get_where($this->table, ['karyawan_id' => $karyawan_id]);
		return $query->row();
	}

	public function lihat_username($username)
	{
		$query = $this->db->get_where($this->table, ['username' => $username]);
		return $query->row();
	}

	public function tambah($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $karyawan_id)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['karyawan_id' => $karyawan_id]);
		$query = $this->db->update($this->table);
		return $query;
	}

	public function hapus($karyawan_id)
	{
		return $this->db->delete($this->table, ['karyawan_id' => $karyawan_id]);
	}

	public function get_by_id($karyawan_id) {
		// Lakukan query database untuk mendapatkan data karyawan berdasarkan ID
		// Misalnya:
		$query = $this->db->get_where('karyawan', array('karyawan_id' => $karyawan_id));
	
		// Kembalikan hasil query sebagai objek karyawan jika data ditemukan
		return $query->row();
	}
}