<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengumuman extends CI_Model {

    // Ambil semua data pengumuman
public function get_all() {
    $this->db->select('pengumuman.*, registrasi_anggota.nama');
    $this->db->from('pengumuman');
    $this->db->join('registrasi_anggota', 'registrasi_anggota.id_anggota = pengumuman.id_anggota', 'left');
    $this->db->order_by('pengumuman.tgl_pengumuman', 'DESC');
    return $this->db->get()->result();
}


    // Ambil 1 data berdasarkan ID
    public function get_by_id($id) {
        $this->db->where('id_pengumuman', $id);
        return $this->db->get('pengumuman')->row();
    }

    // Tambah data
    public function insert($data) {
        return $this->db->insert('pengumuman', $data);
    }

    // Update data
    public function update($id, $data) {
        $this->db->where('id_pengumuman', $id);
        return $this->db->update('pengumuman', $data);
    }

    // Hapus data
    public function delete($id) {
        $this->db->where('id_pengumuman', $id);
        return $this->db->delete('pengumuman');
    }

    // Pencarian data
public function search($keyword) {
    $this->db->select('pengumuman.*, registrasi_anggota.nama');
    $this->db->from('pengumuman');
    $this->db->join('registrasi_anggota', 'pengumuman.id_anggota = registrasi_anggota.id_anggota');

    // Grup pencarian untuk LIKE
    $this->db->group_start();
    $this->db->like('pengumuman.judul', $keyword);
    $this->db->or_like('pengumuman.isi', $keyword);
    $this->db->or_like('registrasi_anggota.nama', $keyword); // pencarian berdasarkan nama anggota
    $this->db->group_end();

    $this->db->order_by('pengumuman.tgl_pengumuman', 'DESC');

    return $this->db->get()->result();
}
public function get_by_status($status) {
    return $this->db->get_where('pengumuman', ['status' => $status])->result();
}


}
