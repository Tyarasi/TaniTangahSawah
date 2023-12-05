<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthHook
{
    public function checkLogin()
    {
        $CI =& get_instance();
        $loggedIn = $CI->session->userdata('login');
        if (!$loggedIn && $CI->uri->segment(1) === 'dashboard') {
            redirect('login'); // Ganti 'login' dengan URL halaman login sesuai proyek Anda
        }
    }
}