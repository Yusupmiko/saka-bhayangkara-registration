<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('session');
    }

    public function index() {
        // Memuat halaman login
        $this->load->view('login');
    }

    public function aksi_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->M_login->cek_login($username, $password);

        if ($result) {
            // Jika login berhasil, set session dan arahkan ke halaman dashboard
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('username', $result->username);
            $this->load->view('dashboard/index');

        } else {
            // Jika login gagal, set flash data 'error' dan arahkan kembali ke halaman login
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id'); // Contoh, sesuaikan dengan data session Anda
        $this->session->unset_userdata('username'); // Juga disesuaikan dengan data session Anda
        redirect('login'); // Redirect ke halaman login atau halaman lain setelah logout
    }
    
}
?>
