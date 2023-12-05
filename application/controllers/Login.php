<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->login)
            redirect('dashboard');
        $this->load->model('Mod_owner', 'mod_owner');
        $this->load->model('Mod_karyawan', 'mod_karyawan');
    }

    public function index()
    {
        $this->load->view('awal/halaman_login');
    }

    public function user_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        if ($this->is_owner($username)) {
            $this->login_owner($username, $password);
        } elseif ($this->is_karyawan($username)) {
            $this->login_karyawan($username, $password);
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('login');
        }
    }

    private function is_owner($username)
    {

        $this->load->model('mod_owner'); // Load model untuk owner
        $owner = $this->mod_owner->lihat_username($username);

        return ($owner !== null);
    }

    private function is_karyawan($username)
    {

        $this->load->model('mod_karyawan'); // Load model untuk karyawan
        $karyawan = $this->mod_karyawan->lihat_username($username);

        return ($karyawan !== null);
    }

    private function login_owner($username, $password)
    {

        $this->load->model('mod_owner'); // Load model untuk owner
        $owner = $this->mod_owner->lihat_username($username);
        $status = "owner";
        if ($owner) {
            // Jika data owner ditemukan, verifikasi password
            if ($owner->password === $password) {
                $session = [
                    'username' => $owner->username,
                    'password' => $owner->password,
                    'status'   => $status,
                ];
                $this->session->set_userdata('login', $session);
                $this->session->set_flashdata('success', '<b>Login</b> Berhasil!');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Password Salah!');
                redirect();
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan!');
            redirect();
        }
    }


    private function login_karyawan($username, $password)
    {

        $this->load->model('mod_karyawan'); // Load model untuk karyawan
        $karyawan = $this->mod_karyawan->lihat_username($username);
        $status = "karyawan";
        if ($karyawan) {

            if ($karyawan->password === $password) {
                $session = [
                    'username' => $karyawan->username,
                    'password' => $karyawan->password,
                    'status'   => $status,
                ];
                $this->session->set_userdata('login', $session);
                $this->session->set_flashdata('success', '<b>Login</b> Berhasil!');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Password Salah!');
                redirect();
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi Kesalahan!');
            redirect();
        }
    }
}
