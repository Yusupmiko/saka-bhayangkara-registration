<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

    public function get_all_pengguna()
    {
        return $this->db->get('user')->result(); // Ambil semua data dari tabel user
    }
    public function insert_pengguna($data)
{
    return $this->db->insert('user', $data);
}
public function get_user_by_username($username)
{
    return $this->db->get_where('user', ['username' => $username])->row();
}
public function hapus_data($id_user)
{
    $this->db->where('id_user', $id_user);
    $this->db->delete('user'); // pastikan nama tabel-nya benar
}

}
