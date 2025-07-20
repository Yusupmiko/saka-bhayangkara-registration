<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_log_status_pendaftaran extends CI_Model {

    // Ambil semua data log status
    public function get_all() {
        $this->db->select('log_status_pendaftaran.*, registrasi_anggota.nama');
        $this->db->from('log_status_pendaftaran');
        $this->db->join('registrasi_anggota', 'log_status_pendaftaran.id_anggota = registrasi_anggota.id_anggota');
        return $this->db->get()->result();
    }

    // Tambah data log baru
    public function insert($data) {
        return $this->db->insert('log_status_pendaftaran', $data);
    }

    // Ambil data log berdasarkan ID log
    public function get_by_id($id) {
        return $this->db->get_where('log_status_pendaftaran', array('id_log' => $id))->row();
    }

    // Update data log
    public function update($id, $data) {
        $this->db->where('id_log', $id);
        return $this->db->update('log_status_pendaftaran', $data);
    }

    // Hapus data log
    public function delete($id) {
        $this->db->where('id_log', $id);
        return $this->db->delete('log_status_pendaftaran');
    }

    // (Opsional) Hitung jumlah log
    public function jumlah_log() {
        return $this->db->count_all('log_status_pendaftaran');
    }
    public function get_enum_values($table, $field)
{
    $query = $this->db->query("SHOW COLUMNS FROM $table LIKE '$field'");
    $row = $query->row();
    preg_match("/^enum\(\'(.*)\'\)$/", $row->Type, $matches);
    $enum = explode("','", $matches[1]);
    return $enum;
}
public function get_log_with_nama()
{
    $this->db->select('log_status_pendaftaran.*, registrasi_anggota.nama');
    $this->db->from('log_status_pendaftaran');
    $this->db->join('registrasi_anggota', 'log_status_pendaftaran.id_anggota = registrasi_anggota.id_anggota');
    return $this->db->get()->result();
}

public function get_peserta_diterima()
{
    $this->db->select('log.*, anggota.nama, anggota.nik, anggota.ttl, anggota.asal_sekolah, anggota.no_hp');
    $this->db->from('log_status_pendaftaran log');
    $this->db->join('registrasi_anggota anggota', 'anggota.id_anggota = log.id_anggota');
    $this->db->where('log.status', 'Diterima');
    $this->db->order_by('log.waktu_update', 'DESC');
    return $this->db->get()->result();
}

// public function get_peserta_diterima()
// {
//     $this->db->select('log.*, anggota.nama, anggota.nik, anggota.ttl, anggota.asal_sekolah, anggota.no_hp');
//     $this->db->from('log_status_pendaftaran log');
//     $this->db->join('registrasi_anggota anggota', 'anggota.id = log.id_anggota');
//     $this->db->where('log.status', 'Diterima');
//     $this->db->order_by('log.waktu_update', 'DESC');
//     return $this->db->get()->result();
// }
public function get_peserta_diterima_terakhir()
{
    $sql = "
        SELECT l.*, a.nama, a.nik, a.ttl, a.asal_sekolah, a.no_hp
        FROM log_status_pendaftaran l
        JOIN (
            SELECT id_anggota, MAX(waktu_update) AS max_time
            FROM log_status_pendaftaran
            GROUP BY id_anggota
        ) last_log ON l.id_anggota = last_log.id_anggota AND l.waktu_update = last_log.max_time
        JOIN registrasi_anggota a ON a.id_anggota = l.id_anggota
        WHERE l.status = 'Diterima'
        ORDER BY l.waktu_update DESC
    ";

    return $this->db->query($sql)->result();
}

public function search($keyword) {
    $this->db->select('log_status_pendaftaran.*, registrasi_anggota.nama'); // perbaikan select
    $this->db->from('log_status_pendaftaran');
    $this->db->join('registrasi_anggota', 'log_status_pendaftaran.id_anggota = registrasi_anggota.id_anggota');

    // Kelompokkan LIKE untuk akurasi
    $this->db->group_start();
    $this->db->like('log_status_pendaftaran.id_log', $keyword);
    $this->db->or_like('log_status_pendaftaran.keterangan', $keyword);
    $this->db->or_like('log_status_pendaftaran.status', $keyword);
    $this->db->or_like('registrasi_anggota.nama', $keyword); // tambah pencarian berdasarkan nama anggota
    $this->db->group_end();

    return $this->db->get()->result();
}



}
?>
