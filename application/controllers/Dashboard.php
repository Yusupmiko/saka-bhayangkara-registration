<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


   public function __construct() {
    parent::__construct();
    
    if (!$this->session->userdata('logged_in')) {
        redirect('auth');
    }

    // Hanya izinkan role_id = 1
    if ($this->session->userdata('role_id') != 1) {
        redirect('dashboard');
    }
}

//     public function index()
// {
//     $this->load->model('m_registrasi_anggota');
 

//     $data['total_registrasi'] = $this->m_registrasi_anggota->jumlah_registrasi();
   

//     $this->load->view('dashboard/index', $data);
// }

public function index()
{
    // Ambil jumlah pendaftar hari ini
    $today = date('Y-m-d');
    $this->db->where('DATE(created_at)', $today);
    $data['pendaftar_hari_ini'] = $this->db->count_all_results('registrasi_anggota');

    // Ambil jumlah pendaftar bulan ini
    $bulan = date('m');
    $tahun = date('Y');
    $this->db->where('MONTH(created_at)', $bulan);
    $this->db->where('YEAR(created_at)', $tahun);
    $data['pendaftar_bulan_ini'] = $this->db->count_all_results('registrasi_anggota');

    // Jumlah yang lolos seleksi administrasi
    $this->db->where('status', 'Diterima');
    $data['lolos_administrasi'] = $this->db->count_all_results('log_status_pendaftaran');

    // Jumlah yang tidak lolos
    $this->db->where('status', 'Ditolak');
    $data['tidak_lolos'] = $this->db->count_all_results('log_status_pendaftaran');


     $this->db->where('status', 'Lulus');
    $data['jumlah_lulus'] = $this->db->count_all_results('pengumuman');


         $this->db->where('status', 'Tidak Lulus');
    $data['jumlah_tidak_lulus'] = $this->db->count_all_results('pengumuman');
    // Load ke view
    
    $this->load->view('dashboard/index', $data);

     
}


}

/* End of file Controllername.php */
