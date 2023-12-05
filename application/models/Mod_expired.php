<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_expired extends CI_Model
{
    protected $table = 'expired_barang';
    protected $table1 = 'barang';
    
    public function lihat_barang()
    {
        $query = $this->db->query(" SELECT eb.id, eb.kode_barang, eb.stok_barang, eb.expired_barang, b.nama_barang
        FROM expired_barang eb JOIN barang b ON eb.id_barang = b.barang_id
        WHERE eb.expired_barang IS NOT NULL AND eb.expired_barang <> '0000-00-00'
        AND eb.stok_barang <> 0 AND eb.access_expired = 1
        ORDER BY eb.expired_barang ASC;");
        return $query->result();
    }

    public function tambah($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function min_stok2($stok_barang, $kode_barang) {
        $this->db->select('MIN(expired_barang) AS tanggal_expired_min');
        $this->db->where('kode_barang', $kode_barang);
        $this->db->where('stok_barang >', 0);
        $query = $this->db->get($this->table);
        $result = $query->row();
    
        if ($result) {
            $tanggal_expired_min = $result->tanggal_expired_min;
    
            $this->db->select('stok_barang');
            $this->db->where('kode_barang', $kode_barang);
            $this->db->where('expired_barang', $tanggal_expired_min);
            $query_stok = $this->db->get($this->table);
            $result_stok = $query_stok->row();
    
            if ($result_stok) {
                $stok_terendah = $result_stok->stok_barang;
    
                if ($stok_terendah >= $stok_barang) {
                    $this->db->set('stok_barang', 'stok_barang - ' . $stok_barang, false);
                    $this->db->where('kode_barang', $kode_barang);
                    $this->db->where('expired_barang', $tanggal_expired_min);
                    $this->db->update($this->table);
    
                    if ($stok_terendah == $stok_barang) {
                        $this->db->where('stok_barang', 0);
                        $this->db->where('kode_barang', $kode_barang);
                        $this->db->where('expired_barang', $tanggal_expired_min);
                        $this->db->delete($this->table);
                    }
                } else {
                    $this->db->set('stok_barang', 'stok_barang - ' . $stok_terendah, false);
                    $this->db->where('kode_barang', $kode_barang);
                    $this->db->where('expired_barang', $tanggal_expired_min);
                    $this->db->update($this->table);
    
                    $stok_sisa = $stok_barang - $stok_terendah;
                    $this->min_stok2($stok_sisa, $kode_barang);
                }
    
                return true;
            }
        }
    }
         
    
    public function plus_stok2($stok_barang, $kode_barang){
        $this->db->select('MIN(expired_barang) AS tanggal_expired_min');
        $this->db->where('kode_barang', $kode_barang);
        $this->db->where('stok_barang >', 0);
        $query = $this->db->get($this->table);
        $result = $query->row();
    
        if ($result) {
            $tanggal_expired_min = $result->tanggal_expired_min;
            $$this->db->set('stok_barang', 'stok_barang + ' . $stok_barang, false);
            $this->db->where('kode_barang', $kode_barang);
            $this->db->where('expired_barang', $tanggal_expired_min);
            $this->db->update($this->table);
            
            $this->db->where('stok_barang', 0);
            $this->db->delete($this->table);
    
            return true;
        }
    
        return false;
    }   
    
    public function get_expired($kode_barang)
    {
        $this->db->select('MIN(expired_barang) AS min_expired_date');
        $this->db->where('kode_barang', $kode_barang);
        $this->db->where('stok_barang >', 0);
        $query = $this->db->get('expired_barang');

        $result = $query->row();

        if ($result) {
            return $result->min_expired_date;
        }

        return null;
    }

    public function hapus($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function change_brg($id){
        $this->db->where('id', $id);
        $data = array(
            'access_expired' => 0);
        $this->db->update('expired_barang', $data);
    }

    public function exmin($stok_barang, $clean_nama_barang){
        $this->db->where('nama_barang', $clean_nama_barang);
        $this->db->set('stok_barang', 'stok_barang - ' . $stok_barang, false);
        $this->db->update($this->table1);
    }    

    public function get_log(){
        $query = $this->db->query(" SELECT eb.id, eb.kode_barang, eb.stok_barang, 
        eb.expired_barang, b.nama_barang FROM expired_barang eb JOIN barang b ON eb.id_barang = b.barang_id
        WHERE eb.expired_barang IS NOT NULL AND eb.expired_barang <> '0000-00-00'
        AND eb.stok_barang <> 0 AND eb.access_expired = 0
        ORDER BY eb.expired_barang ASC;");
        return $query->result();
    }

    public function log_update($id)
    {
        $query = $this->db->set(['access_expired' => 1]);
        $query = $this->db->where(['id' => $id]);
        $query = $this->db->update($this->table);
        return $query;
    } 

    public function getData($id)
    {
        $query = $this->db->query(" SELECT eb.id, eb.kode_barang, eb.stok_barang, 
        eb.expired_barang, b.nama_barang FROM expired_barang eb JOIN barang b ON eb.id_barang = b.barang_id
        WHERE eb.expired_barang IS NOT NULL AND eb.expired_barang <> '0000-00-00'
        AND eb.stok_barang <> 0 AND eb.id = $id
        ORDER BY eb.expired_barang ASC;");
        return $query->result();
    }

    public function update($data, $id){
        $query = $this->db->set($data);
        $query = $this->db->where(['id' => $id]);
        $query = $this->db->update($this->table);
        return $query;
    }

    public function explus($stok_barang, $clean_nama_barang){
        $this->db->where('nama_barang', $clean_nama_barang);
        $this->db->set('stok_barang', 'stok_barang + ' . $stok_barang, false);
        $this->db->update($this->table1);
    }

    
}