<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    public function cek_login($username, $password) {
        // Menggunakan database absen_pegawai
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

  
}
?>
