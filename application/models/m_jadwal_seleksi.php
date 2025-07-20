<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal_seleksi extends CI_Model {

    private $table = 'jadwal_seleksi';

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id_jadwal) {
        return $this->db->get_where($this->table, array('id_jadwal' => $id_jadwal))->row();
    }

public function insert($data) {
    return $this->db->insert('jadwal_seleksi', $data);
}


    public function update($id_lama, $data) {
        $this->db->where('id_jadwal', $id_lama);
        return $this->db->update($this->table, $data);
    }

    public function delete($id_jadwal) {
        return $this->db->delete($this->table, array('id_jadwal' => $id_jadwal));
    }

    public function search($keyword) {
        $this->db->like('nama_kegiatan', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('keterangan', $keyword);
        return $this->db->get($this->table)->result();
    }
}
