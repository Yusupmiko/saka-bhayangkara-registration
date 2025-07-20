<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_anggota extends CI_Controller {

public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('logged_in')) {
        redirect('auth');
    }

    if (!in_array($this->session->userdata('role_id'), [1, 2])) {
        redirect('dashboard');
    }

    $this->load->model('m_registrasi_anggota');
    $this->load->helper(array('url', 'form'));
}


    public function index() {
        $data['anggota'] = $this->m_registrasi_anggota->get_all();
        $this->load->view('dashboard/header', $data);
        $this->load->view('registrasi_anggota/index', $data);
        $this->load->view('dashboard/footer');
    }

    public function tambah() {
        $this->load->view('dashboard/header');
        $this->load->view('registrasi_anggota/tambah');
        $this->load->view('dashboard/footer');
    }

  public function tambah_aksi() {
    $data = array(
        'id_anggota'    => $this->input->post('id_anggota'),
        'nama'          => $this->input->post('nama'),
        'nik'           => $this->input->post('nik'),
        'ttl'           => $this->input->post('ttl'),
        'alamat'        => $this->input->post('alamat'),
        'asal_sekolah'  => $this->input->post('asal_sekolah'),
        'no_hp'         => $this->input->post('no_hp')
    );

    $this->m_registrasi_anggota->insert($data);
    redirect('registrasi_anggota/index');
}


    public function edit($id) {
        $data['anggota'] = $this->m_registrasi_anggota->get_by_id($id);
        $this->load->view('dashboard/header', $data);
        $this->load->view('registrasi_anggota/edit', $data);
        $this->load->view('dashboard/footer');
    }

public function update() {
    $id_lama = $this->input->post('id_anggota_lama');
    $id_baru = $this->input->post('id_anggota');

    $data = array(
        'id_anggota'    => $id_baru,
        'nama'          => $this->input->post('nama'),
        'nik'           => $this->input->post('nik'),
        'ttl'           => $this->input->post('ttl'),
        'alamat'        => $this->input->post('alamat'),
        'asal_sekolah'  => $this->input->post('asal_sekolah'),
        'no_hp'         => $this->input->post('no_hp')
    );

    // Cek apakah id_anggota diganti dan id baru belum dipakai
    if ($id_lama != $id_baru) {
        $cek = $this->m_registrasi_anggota->get_by_id($id_baru);
        if ($cek) {
            // ID baru sudah ada, tampilkan pesan error atau redirect dengan flashdata
            $this->session->set_flashdata('error', 'ID Anggota baru sudah digunakan.');
            redirect('registrasi_anggota/edit/' . $id_lama);
            return;
        }
    }

    $this->m_registrasi_anggota->update($id_lama, $data);
    redirect('registrasi_anggota/index');
}


    public function hapus($id) {
        $this->m_registrasi_anggota->delete($id);
        redirect('registrasi_anggota/index');
    }

    public function cetak() {
        $data['anggota'] = $this->m_registrasi_anggota->get_all();
        $this->load->view('dashboard/header');
        $this->load->view('registrasi_anggota/cetak', $data);
        $this->load->view('dashboard/footer');
    }

    public function search() {
        $keyword = $this->input->get('cari');
        $data['anggota'] = $this->m_registrasi_anggota->search($keyword);
        $this->load->view('dashboard/header', $data);
        $this->load->view('registrasi_anggota/index', $data);
        $this->load->view('dashboard/footer');
    }
}
