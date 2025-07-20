<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_status_pendaftaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        if ($this->session->userdata('role_id') != 1) {
            redirect('dashboard');
        }
 $this->load->model('m_registrasi_anggota'); // << Tambahkan ini
        $this->load->model('m_log_status_pendaftaran');
        $this->load->helper(array('url', 'form'));
    }

public function index()
{
    $this->load->model('m_log_status_pendaftaran');
    $data['log_status'] = $this->m_log_status_pendaftaran->get_all(); // pastikan ini ada
    $this->load->view('dashboard/header', $data);
    $this->load->view('log_status_pendaftaran/index', $data);
    $this->load->view('dashboard/footer', $data);
}

public function tambah()
{
    $this->load->model('m_log_status_pendaftaran');

    $data['status_options'] = $this->m_log_status_pendaftaran->get_enum_values('log_status_pendaftaran', 'status');
    $data['anggota'] = $this->db->get('registrasi_anggota')->result();

    $this->load->view('dashboard/header', $data);
    $this->load->view('log_status_pendaftaran/tambah', $data);
    $this->load->view('dashboard/footer', $data);
}



    public function tambah_aksi() {
        $data = array(
            'id_anggota'   => $this->input->post('id_anggota'),
            'status'       => $this->input->post('status'),
            'waktu_update' => date('Y-m-d H:i:s'),
            'keterangan'   => $this->input->post('keterangan')
        );

        $this->m_log_status_pendaftaran->insert($data);
        redirect('log_status_pendaftaran/index');
    }

 
// Controller: Log_status_pendaftaran.php
public function edit($id)
{
    $data['status_options'] = $this->m_log_status_pendaftaran->get_enum_values('log_status_pendaftaran', 'status');
    $data['log'] = $this->m_log_status_pendaftaran->get_by_id($id); // Ambil 1 baris log
    $data['anggota'] = $this->m_registrasi_anggota->get_all(); // Untuk dropdown nama anggota
     $this->load->view('dashboard/header', $data);
        $this->load->view('log_status_pendaftaran/edit', $data);
        $this->load->view('dashboard/footer');
}
    public function update() {
        $id = $this->input->post('id_log');

        $data = array(
            'id_anggota'   => $this->input->post('id_anggota'),
            'status'       => $this->input->post('status'),
            'waktu_update' => date('Y-m-d H:i:s'),
            'keterangan'   => $this->input->post('keterangan')
        );

        $this->m_log_status_pendaftaran->update($id, $data);
        redirect('log_status_pendaftaran/index');
    }

    public function hapus($id) {
        $this->m_log_status_pendaftaran->delete($id);
        redirect('log_status_pendaftaran/index');
    }
    

public function cetak() {
    $data['log'] = $this->m_log_status_pendaftaran->get_log_with_nama(); // <-- ini hasil join ke registrasi_anggota
    $this->load->view('dashboard/header', $data);
        $this->load->view('log_status_pendaftaran/cetak', $data);
        $this->load->view('dashboard/footer');
}

  public function search() {
        $keyword = $this->input->get('cari');
        $data['log_status'] = $this->m_log_status_pendaftaran->search($keyword);
        $this->load->view('dashboard/header', $data);
        $this->load->view('log_status_pendaftaran/index', $data);
        $this->load->view('dashboard/footer');
    }

}
