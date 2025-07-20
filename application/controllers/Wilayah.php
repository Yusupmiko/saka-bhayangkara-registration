<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        if ($this->session->userdata('role_id') != 1) {
            redirect('dashboard');
        }

        $this->load->model('m_kendaraan');
        $this->load->helper(['url', 'form']);
    }

  public function index()
{
    $this->load->model('m_kendaraan');
    
    $data['jumlah_sambas'] = $this->m_kendaraan->jumlah_per_wilayah('Sambas');
    $data['jumlah_singkawang'] = $this->m_kendaraan->jumlah_per_wilayah('Singkawang');
    $data['jumlah_bengkayang'] = $this->m_kendaraan->jumlah_per_wilayah('Bengkayang');

     $this->load->view('dashboard/header');
    $this->load->view('wilayah/index', $data);
   
     
        $this->load->view('dashboard/footer');
}



    public function search() {
        $keyword = $this->input->get('cari');
        $data['wilayah'] = $this->m_wilayah->search_wilayah($keyword);
        $this->load->view('dashboard/header', $data);
        $this->load->view('wilayah/index', $data);
        $this->load->view('dashboard/footer');
    }

 public function cetak()
{
    $this->load->model('m_kendaraan');
    
    $data['jumlah_sambas'] = $this->m_kendaraan->jumlah_per_wilayah('Sambas');
    $data['jumlah_singkawang'] = $this->m_kendaraan->jumlah_per_wilayah('Singkawang');
    $data['jumlah_bengkayang'] = $this->m_kendaraan->jumlah_per_wilayah('Bengkayang');

$this->load->view('dashboard/header', $data);
    $this->load->view('wilayah/cetak', $data);
    $this->load->view('dashboard/footer', $data);
}

}
