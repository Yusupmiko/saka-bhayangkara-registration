<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    // Konstruktor untuk memuat library dan model
    public function __construct()
    {
        parent::__construct();
        
        // Memuat library form_validation
        $this->load->library('form_validation');
        
        // Memuat model pengguna
        $this->load->model('Pengguna_model');
    }
public function index()
    {
        $data['user'] = $this->Pengguna_model->get_all_pengguna();
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/footer', $data);
        $this->load->view('pengguna/index', $data);
    
    }
 public function tambah() {
        $this->load->view('dashboard/header');
        $this->load->view('pengguna/tambah');
        $this->load->view('dashboard/footer');
    }

    // Fungsi untuk menambah pengguna
    public function tambah_aksi()
    {
        // Validasi form
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        // Jika validasi gagal, tampilkan form tambah
       if ($this->form_validation->run() == FALSE) {
    $this->load->view('dashboard/header');
    $this->load->view('pengguna/tambah');
    $this->load->view('dashboard/footer');
}
else {
            // Ambil data dari input form
            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Password di-hash
                'role_id' => $this->input->post('role_id'),
            );

            // Panggil model untuk menambah data pengguna
            $this->Pengguna_model->insert_pengguna($data);
            redirect('pengguna'); // Redirect ke halaman pengguna setelah berhasil
        }
    }

    // Tambahkan fungsi lainnya sesuai kebutuhan
    public function hapus($id_user)
{
    $this->Pengguna_model->hapus_data($id_user);  // atau sesuai model kamu
    $this->session->set_flashdata('success', 'Data pengguna berhasil dihapus.');
    redirect('pengguna');
}

}
