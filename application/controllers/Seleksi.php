<?php

class Seleksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_log_status_pendaftaran');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

public function index() {
    $data['peserta'] = $this->m_log_status_pendaftaran->get_peserta_diterima_terakhir();
    $this->load->view('dashboard/header', $data);
    $this->load->view('seleksi/index', $data);
    $this->load->view('dashboard/footer');
}
public function cetak()
{
    $this->load->database();

    // Ambil data peserta dengan status terakhir 'Diterima'
    $this->db->select('a.nama, a.nik, a.ttl, a.asal_sekolah, a.no_hp, l.status, l.waktu_update');
    $this->db->from('log_status_pendaftaran l');
    $this->db->join('(SELECT id_anggota, MAX(waktu_update) as max_time 
                      FROM log_status_pendaftaran 
                      GROUP BY id_anggota) last_log', 
                    'l.id_anggota = last_log.id_anggota AND l.waktu_update = last_log.max_time');
    $this->db->join('registrasi_anggota a', 'a.id_anggota = l.id_anggota');
    $this->db->where('l.status', 'Diterima');
    $this->db->order_by('l.waktu_update', 'DESC');

    $data['peserta'] = $this->db->get()->result();
    // Load view cetak
     $this->load->view('dashboard/header', $data);
    $this->load->view('seleksi/cetak', $data);
    $this->load->view('dashboard/footer');

}


}
