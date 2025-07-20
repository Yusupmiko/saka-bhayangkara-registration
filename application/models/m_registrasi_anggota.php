<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_registrasi_anggota extends CI_Model {

    // Ambil semua data anggota
    public function get_all() {
        return $this->db->get('registrasi_anggota')->result();
    }

    // Tambah data anggota baru
    public function insert($data) {
        return $this->db->insert('registrasi_anggota', $data);
    }

    // Ambil data berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('registrasi_anggota', array('id_anggota' => $id))->row();
    }

    // Update data anggota
public function update($id_lama, $data) {
    $this->db->where('id_anggota', $id_lama);
    return $this->db->update('registrasi_anggota', $data);
}


    // Hapus data anggota
    public function delete($id) {
        $this->db->where('id_anggota', $id);
        return $this->db->delete('registrasi_anggota');
    }

    // Cari data berdasarkan nama, NIK, atau asal sekolah
    public function search($keyword) {
        $this->db->like('nama', $keyword);
        $this->db->or_like('nik', $keyword);
        $this->db->or_like('asal_sekolah', $keyword);
        return $this->db->get('registrasi_anggota')->result();
    }

    // Hitung jumlah total anggota
    public function jumlah_anggota() {
        return $this->db->count_all('registrasi_anggota');
    }
        public function jumlah_registrasi()
{
    return $this->db->count_all('registrasi_anggota');
}
}
?>
