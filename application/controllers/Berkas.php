<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_berkas');
        $this->load->model('m_registrasi_anggota'); // untuk dropdown anggota
        $this->load->helper(array('url', 'form'));
        $this->load->library('upload');
    }

    public function index() {
        $data['berkas'] = $this->m_berkas->get_all();
        $this->load->view('dashboard/header');
        $this->load->view('berkas/index', $data);
        $this->load->view('dashboard/footer');
    }

  public function tambah() {
    $data['anggota'] = $this->m_registrasi_anggota->get_all();  // ambil data anggota
    $this->load->view('dashboard/header');
    $this->load->view('berkas/tambah', $data);  // kirim data anggota ke view
    $this->load->view('dashboard/footer');
}


    public function get_all()
{
    return $this->db->get('registrasi_anggota')->result(); // Ambil semua anggota dari tabel
}


   public function tambah_aksi() {
    $config['upload_path'] = './uploads/berkas/';
    $config['allowed_types'] = 'jpg|jpeg|png|pdf';
    $config['max_size'] = 2048;

    $this->upload->initialize($config);

    if (!$this->upload->do_upload('unggah_berkas')) {
        echo "Gagal Upload: " . $this->upload->display_errors();
    } else {
        $upload_data = $this->upload->data();

        // Ambil input id_berkas
        $id_berkas_input = $this->input->post('id_berkas');

        // Buat data array
        $data = [
            'id_anggota'    => $this->input->post('id_anggota'),
            'nama_berkas'   => $this->input->post('nama_berkas'),
            'unggah_berkas' => $upload_data['file_name'],
            'keterangan'    => $this->input->post('keterangan'),
            'created_at'    => date('Y-m-d H:i:s')
        ];

        // Jika id_berkas diisi, tambahkan ke data insert (manual id)
        // if (!empty($id_berkas_input)) {
        //     $data['id_berkas'] = (int) $id_berkas_input;
        // }

        $this->m_berkas->insert($data);
        redirect('berkas');
    }
}


    public function hapus($id) {
        $berkas = $this->m_berkas->get_by_id($id);
        if ($berkas && file_exists('./uploads/berkas/' . $berkas->unggah_berkas)) {
            unlink('./uploads/berkas/' . $berkas->unggah_berkas);
        }
        $this->m_berkas->delete($id);
        redirect('berkas');
    }

    public function edit($id) {
    $data['anggota'] = $this->m_registrasi_anggota->get_all();
    $data['berkas'] = $this->m_berkas->get_by_id($id);
    $this->load->view('dashboard/header');
    $this->load->view('berkas/edit', $data);
    $this->load->view('dashboard/footer');
}

public function update()
{
    $id_berkas = $this->input->post('id_berkas');
    $id_berkas_baru = $this->input->post('id_berkas_baru');
    $id_anggota = $this->input->post('id_anggota');
    $nama_berkas = $this->input->post('nama_berkas');
    $keterangan = $this->input->post('keterangan');

    $berkas_lama = $this->m_berkas->get_by_id($id_berkas);

    $config['upload_path'] = './uploads/berkas/';
    $config['allowed_types'] = 'jpg|jpeg|png|pdf';
    $config['max_size'] = 2048;
    $config['file_name'] = time() . '_' . $_FILES['unggah_berkas']['name'];

    $this->upload->initialize($config);

    if (!empty($_FILES['unggah_berkas']['name'])) {
        if ($this->upload->do_upload('unggah_berkas')) {
            if ($berkas_lama && file_exists('./uploads/berkas/' . $berkas_lama->unggah_berkas)) {
                unlink('./uploads/berkas/' . $berkas_lama->unggah_berkas);
            }

            $upload_data = $this->upload->data();
            $nama_file_baru = $upload_data['file_name'];
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('berkas/edit/' . $id_berkas);
            return;
        }
    } else {
        $nama_file_baru = $berkas_lama->unggah_berkas;
    }

    $data_update = [
        'id_berkas' => $id_berkas_baru,
        'id_anggota' => $id_anggota,
        'nama_berkas' => $nama_berkas,
        'unggah_berkas' => $nama_file_baru,
        'keterangan' => $keterangan,
    ];

    $this->m_berkas->update($id_berkas, $data_update);
    $this->session->set_flashdata('success', 'Data berkas berhasil diperbarui.');
    redirect('berkas');
}




public function cetak()
{
    $this->load->model('m_berkas');
    $data['berkas'] = $this->m_berkas->get_all();
    $this->load->view('dashboard/header');
        $this->load->view('berkas/cetak', $data);
        $this->load->view('dashboard/footer');
}
   public function search() {
        $keyword = $this->input->get('cari');
        $data['berkas'] = $this->m_berkas->search($keyword);
        $this->load->view('dashboard/header', $data);
        $this->load->view('berkas/index', $data);
        $this->load->view('dashboard/footer');
    }

}
