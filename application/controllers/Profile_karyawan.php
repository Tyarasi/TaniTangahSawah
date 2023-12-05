<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile_karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['aktif'] = 'karyawan';
        $this->load->model('Mod_karyawan', 'mod_karyawan');
    }
    public function index()
    {
        $this->data['data_karyawan'] = $this->mod_karyawan->lihat();
        //menampilkan halaman owner utama/index
        $this->load->view('karyawan/profile', $this->data);
    }
}