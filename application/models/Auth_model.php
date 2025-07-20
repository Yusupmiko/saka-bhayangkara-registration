<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    // public function check_login($username, $password) {
    //     // Cek ke database
    //     $this->db->where('username', $username);
    //     $this->db->where('password', md5($password)); // Gunakan password_hash() jika lebih aman
    //     $query = $this->db->get('users');

    //     return $query->row(); // Kembalikan data user jika ada
    // }
    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get('user')->row(); // Pastikan kolom: id, nama, username, password, role_id
    }



}
