<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

    public function __construct() {
        parent::__construct();
    
        // Fungsi yang boleh diakses tanpa login & tanpa role admin
        $allowed_unauthenticated = ['scan_qr', 'get_status_kendaraan'];
    
        // Ambil nama method yang sedang diakses
        $current_method = $this->router->fetch_method();
    
        // Jika method yang diakses bukan pengecualian, lakukan proteksi login dan role
        if (!in_array($current_method, $allowed_unauthenticated)) {
            if (!$this->session->userdata('logged_in')) {
                redirect('auth');
            }
    
            if ($this->session->userdata('role_id') != 1) {
                redirect('dashboard');
            }
        }
    
        $this->load->model('m_kendaraan');
        $this->load->helper(array('url', 'form'));
    }
    
    

    public function index() {
        $data['kendaraan'] = $this->m_kendaraan->get_all_kendaraan();
        $this->load->view('dashboard/header', $data);
        $this->load->view('kendaraan/index', $data);
        $this->load->view('dashboard/footer');
    }

    public function tambah() {
        $this->load->view('dashboard/header');
        $this->load->view('kendaraan/tambah');
        $this->load->view('dashboard/footer');
    }

    public function tambah_aksi() {
        $data = array(
            'id_kendaraan' => $this->input->post('id_kendaraan'),
            'nomor_polisi' => $this->input->post('nomor_polisi'),
            'status_kendaraan' => $this->input->post('status_kendaraan'),
            'wilayah' => $this->input->post('wilayah'),
            'tanggal_mulai_beroperasi' => $this->input->post('tanggal_mulai_beroperasi'),
            'tanggal_akhir_beroperasi' => $this->input->post('tanggal_akhir_beroperasi'),
            'id_jenis_kendaraan' => $this->input->post('id_jenis_kendaraan')
        );

        $this->m_kendaraan->insert_kendaraan($data);
        redirect('kendaraan/index');
    }




    

    public function edit($id_kendaraan) {
        $data['kendaraan'] = $this->m_kendaraan->get_kendaraan_by_id($id_kendaraan);
        $this->load->view('dashboard/header', $data);
        $this->load->view('kendaraan/edit', $data);
        $this->load->view('dashboard/footer');
    }

    public function update() {
        $id_kendaraan = $this->input->post('id_kendaraan');
        $data = array(
            'nomor_polisi' => $this->input->post('nomor_polisi'),
            'status_kendaraan' => $this->input->post('status_kendaraan'),
             'wilayah' => $this->input->post('wilayah'),
            'tanggal_mulai_beroperasi' => $this->input->post('tanggal_mulai_beroperasi'),
            'tanggal_akhir_beroperasi' => $this->input->post('tanggal_akhir_beroperasi'),
            'id_jenis_kendaraan' => $this->input->post('id_jenis_kendaraan')
        );

        $this->m_kendaraan->update_kendaraan($id_kendaraan, $data);
        redirect('kendaraan/index');
    }

    public function hapus($id_kendaraan) {
        $this->m_kendaraan->delete_kendaraan($id_kendaraan);
        redirect('kendaraan/index');
    }

    public function cetak() {
        $data['kendaraan'] = $this->m_kendaraan->get_all_kendaraan();
        $this->load->view('dashboard/header');
        $this->load->view('kendaraan/cetak', $data);
        $this->load->view('dashboard/footer');
    }

    public function search() {
        $cari = $this->input->get('cari');
        $data['kendaraan'] = $this->m_kendaraan->search_kendaraan($cari);
        $this->load->view('dashboard/header', $data);
        $this->load->view('kendaraan/index', $data);
        $this->load->view('dashboard/footer');
    }

    public function generate_qrcode($id_kendaraan)
{
    $this->load->library('ciqrcode');

    // Buat folder penyimpanan jika belum ada
    $path = FCPATH . 'uploads/qrcode/';
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    $filename = 'qr_' . $id_kendaraan . '.png';
    $params['data'] = $id_kendaraan; // Atau ganti jadi base_url() . 'kendaraan/detail/' . $id_kendaraan
    $params['level'] = 'H';
    $params['size'] = 10;
    $params['savename'] = $path . $filename;

    $this->ciqrcode->generate($params);

    $data['qr_image'] = base_url('uploads/qrcode/' . $filename);
    $data['id_kendaraan'] = $id_kendaraan;

    $this->load->view('kendaraan/qr_view', $data);
}


public function scan_qr()
{
    $this->load->view('scan_qr');
}

public function get_status_kendaraan($id)
{
    $this->load->model('m_kendaraan');
    $data = $this->m_kendaraan->get_by_id($id);

    if ($data) {
        // Kirim data dalam format JSON
        echo json_encode($data);
    } else {
        // Jika tidak ditemukan, kirim error
        echo json_encode(null);
    }
}


}
