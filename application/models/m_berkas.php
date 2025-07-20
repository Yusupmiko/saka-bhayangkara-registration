<?php
class M_berkas extends CI_Model {

    public function get_all() {
        return $this->db->select('berkas.*, registrasi_anggota.nama')
                        ->from('berkas')
                        ->join('registrasi_anggota', 'berkas.id_anggota = registrasi_anggota.id_anggota')
                        ->get()->result();
    }

    public function insert($data) {
        return $this->db->insert('berkas', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('berkas', ['id_berkas' => $id])->row();
    }

    public function update($id, $data) {
        $this->db->where('id_berkas', $id);
        return $this->db->update('berkas', $data);
    }

    public function update_id_berkas($id_lama, $id_baru, $data) {
        $this->db->where('id_berkas', $id_lama);
        $data['id_berkas'] = $id_baru;
        $this->db->update('berkas', $data);
    }

    public function delete($id) {
        return $this->db->delete('berkas', ['id_berkas' => $id]);
    }
     public function search($keyword) {
    $this->db->select('berkas.*, registrasi_anggota.nama'); // pilih kolom yang dibutuhkan
    $this->db->from('berkas');
    $this->db->join('registrasi_anggota', 'berkas.id_anggota = registrasi_anggota.id_anggota');
    
    // LIKE berdasarkan kolom dari kedua tabel
    $this->db->like('berkas.id_berkas', $keyword);
    $this->db->or_like('registrasi_anggota.nama', $keyword);
    $this->db->or_like('berkas.nama_berkas', $keyword);

    return $this->db->get()->result();
}

}

