<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        // Akses hanya untuk Admin (role_id = 1)
        if ($this->session->userdata('role_id') != 1) {
            redirect('dashboard');
        }

        $this->load->model('m_pengumuman');
           $this->load->model('m_registrasi_anggota'); // Tambahkan ini
        $this->load->model('m_jadwal_seleksi');
          $this->load->helper('text'); // <-- Tambahkan ini
        $this->load->helper(['url', 'form']);
    }

public function index() {
    $status = $this->input->get('status'); // Ambil status dari query string

    if ($status) {
        $data['pengumuman'] = $this->m_pengumuman->get_by_status($status);
        $data['filter_status'] = $status;
    } else {
        $data['pengumuman'] = $this->m_pengumuman->get_all();
        $data['filter_status'] = null;
    }

     $this->load->view('dashboard/header', $data);
    $this->load->view('pengumuman/index', $data);
    $this->load->view('dashboard/footer');
}


public function tambah() {
    $this->load->model('m_log_status_pendaftaran'); // pastikan ini dimuat
    $data['peserta_diterima'] = $this->m_log_status_pendaftaran->get_peserta_diterima();
    $this->load->view('dashboard/header', $data);
    $this->load->view('pengumuman/tambah', $data);
    $this->load->view('dashboard/footer');
}


public function tambah_aksi()
{
    $id_anggota = $this->input->post('id_anggota');
    $anggota = $this->db->get_where('registrasi_anggota', ['id_anggota' => $id_anggota])->row();

    $data = [
        'judul'           => $this->input->post('judul'),
        'isi'             => $this->input->post('isi'),
        'tgl_pengumuman'  => $this->input->post('tgl_pengumuman'),
        'status'          => $this->input->post('status'),
        'id_anggota'      => $id_anggota,
        'nama'            => $anggota ? $anggota->nama : null
    ];

    $this->m_pengumuman->insert($data);
    $this->session->set_flashdata('success', 'Data pengumuman berhasil ditambahkan.');
    redirect('pengumuman');
}


   public function edit($id) {
    $data['pengumuman'] = $this->m_pengumuman->get_by_id($id);
    $this->load->view('dashboard/header', $data);
    $this->load->view('pengumuman/edit', $data);
    $this->load->view('dashboard/footer');
}

public function update() {
    $id = $this->input->post('id_pengumuman_lama'); // gunakan hidden input sebagai acuan ID
    $data = [
        'id_pengumuman'    => $this->input->post('id_pengumuman'),
        'nama'             => $this->input->post('nama'),
        'judul'            => $this->input->post('judul'),
        'isi'              => $this->input->post('isi'),
        'tgl_pengumuman'   => $this->input->post('tgl_pengumuman'),
        'status'           => $this->input->post('status')
    ];
    $this->m_pengumuman->update($id, $data);
    redirect('pengumuman');
}


    public function hapus($id) {
        $this->m_pengumuman->delete($id);
        redirect('pengumuman');
    }

  public function cetak() {
    $status = $this->input->get('status'); // Ambil filter status dari URL
    if ($status) {
        $data['pengumuman'] = $this->m_pengumuman->get_by_status($status);
        $data['judul_cetak'] = 'Data Pengumuman ' . $status;
    } else {
        $data['pengumuman'] = $this->m_pengumuman->get_all();
        $data['judul_cetak'] = 'Semua Data Pengumuman';
    }

       $this->load->view('dashboard/header', $data);
    $this->load->view('pengumuman/cetak', $data);
    $this->load->view('dashboard/footer');
}


    public function search() {
        $keyword = $this->input->get('cari');
        $data['pengumuman'] = $this->m_pengumuman->search($keyword);
        $this->load->view('dashboard/header', $data);
        $this->load->view('pengumuman/index', $data);
        $this->load->view('dashboard/footer');
    }
    public function cetak_kartu($id_pengumuman)
{
    $pengumuman = $this->m_pengumuman->get_by_id($id_pengumuman);

    if ($pengumuman->status != 'Lulus') {
        show_error('Peserta belum dinyatakan lulus.', 403, 'Akses Ditolak');
    }

    $data['anggota'] = $this->m_registrasi_anggota->get_by_id($pengumuman->id_anggota);
    $this->load->view('pengumuman/cetak_kartu', $data);
    
    
}

}
