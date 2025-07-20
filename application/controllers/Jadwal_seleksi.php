<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_seleksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        if ($this->session->userdata('role_id') != 1) {
            redirect('dashboard');
        }

        $this->load->model('m_jadwal_seleksi');
        $this->load->helper(array('url', 'form'));
    }

    public function index() {
        $data['jadwal'] = $this->m_jadwal_seleksi->get_all();
        $this->load->view('dashboard/header', $data);
        $this->load->view('jadwal_seleksi/index', $data);
        $this->load->view('dashboard/footer');
    }

    public function tambah() {
        $this->load->view('dashboard/header');
        $this->load->view('jadwal_seleksi/tambah');
        $this->load->view('dashboard/footer');
    }

 public function tambah_aksi() {
    $tanggal_kegiatan = $this->input->post('tanggal_kegiatan'); // ← Tambahkan baris ini!

    $data = [
        'nama_kegiatan'     => $this->input->post('nama_kegiatan'),
        'tanggal_kegiatan'  => $tanggal_kegiatan,
        'lokasi'            => $this->input->post('lokasi'),
        'keterangan'        => $this->input->post('keterangan')
    ];

    $this->m_jadwal_seleksi->insert($data); // cukup satu insert saja, tidak perlu $this->db->insert lagi
    redirect('jadwal_seleksi/index');
}


    public function edit($id) {
        $data['jadwal'] = $this->m_jadwal_seleksi->get_by_id($id);
        $this->load->view('dashboard/header', $data);
        $this->load->view('jadwal_seleksi/edit', $data);
        $this->load->view('dashboard/footer');
    }

public function update() {
    $id_lama = $this->input->post('id_jadwal');
    
    $data = array(
         'nama_kegiatan'            => $this->input->post('nama_kegiatan'),
        'tanggal_kegiatan'           => $this->input->post('tanggal_kegiatan'),   // ✅ sesuai form
     
        'lokasi'            => $this->input->post('lokasi'),
        'keterangan'        => $this->input->post('keterangan')
    );

    $this->m_jadwal_seleksi->update($id_lama, $data);
    redirect('jadwal_seleksi/index');
}


    public function hapus($id) {
        $this->m_jadwal_seleksi->delete($id);
        redirect('jadwal_seleksi/index');
    }

    public function cetak() {
        $data['jadwal'] = $this->m_jadwal_seleksi->get_all();
        $this->load->view('dashboard/header');
        $this->load->view('jadwal_seleksi/cetak', $data);
        $this->load->view('dashboard/footer');
    }

    public function search() {
        $keyword = $this->input->get('cari');
        $data['jadwal'] = $this->m_jadwal_seleksi->search($keyword);
        $this->load->view('dashboard/header', $data);
        $this->load->view('jadwal_seleksi/index', $data);
        $this->load->view('dashboard/footer');
    }
}
