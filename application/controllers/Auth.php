<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Pengguna_model'); // ✅ Tambahkan baris ini
        $this->load->helper(array('url', 'form'));
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('auth/login');
    }

    // public function login() {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     $user = $this->Auth_model->check_login($username, $password);

    //     if ($user) {
    //         // Login sukses: simpan semua data yang dibutuhkan di session
    //         $this->session->set_userdata([
    //             'user_id'   => $user->id,
    //             'username'  => $user->username,
    //             'nama'      => $user->nama,
    //             'role_id'   => $user->role_id,
    //             'logged_in' => TRUE
    //         ]);
    //         redirect('dashboard');
    //     } else {
    //         // Login gagal
    //         $this->session->set_flashdata('error', 'Username atau password salah!');
    //         redirect('auth');
    //     }
    // }
public function login()
{
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->Pengguna_model->get_user_by_username($username);
    
    if ($user && password_verify($password, $user->password)) {
        // Password cocok, simpan data ke session
        $data = [
            'id_user'   => $user->id_user,
            'username'  => $user->username,
            'role_id'   => $user->role_id,
            'logged_in' => true
        ];
        $this->session->set_userdata($data);

        // ✅ Arahkan sesuai role
        if ($user->role_id == 1) {
            redirect('dashboard'); // Admin
        } elseif ($user->role_id == 2) {
            redirect('registrasi_anggota'); // Pegawai langsung ke registrasi
        } else {
            // Role tidak dikenal, kembali ke login
            $this->session->set_flashdata('error', 'Akses ditolak: role tidak dikenali');
            redirect('auth');
        }

    } else {
        // Password salah
        $this->session->set_flashdata('error', 'Username atau password salah');
        redirect('auth');
    }
}



    public function logout() {
        $this->session->sess_destroy();
        redirect('');
    }
}
