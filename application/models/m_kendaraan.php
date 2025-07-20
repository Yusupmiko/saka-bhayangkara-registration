<?php
class M_kendaraan extends CI_Model {

    public function get_all_kendaraan() {
        return $this->db->get('kendaraan')->result();
    }

    public function insert_kendaraan($data) {
        return $this->db->insert('kendaraan', $data);
    }

    public function get_kendaraan_by_id($id_kendaraan) {
        return $this->db->get_where('kendaraan', array('id_kendaraan' => $id_kendaraan))->row();
    }

    public function update_kendaraan($id_kendaraan, $data) {
        $this->db->where('id_kendaraan', $id_kendaraan);
        return $this->db->update('kendaraan', $data);
    }

    public function delete_kendaraan($id_kendaraan) {
        $this->db->where('id_kendaraan', $id_kendaraan);
        return $this->db->delete('kendaraan');
    }

    public function search_kendaraan($cari) {
        $this->db->or_like('nomor_polisi', $cari);
        $this->db->or_like('status_kendaraan', $cari);
        return $this->db->get('kendaraan')->result();
    }

    public function jumlah_kendaraan()
{
    return $this->db->count_all('kendaraan');
}
// public function get_kendaraan_by_id($id)
// {
//     return $this->db->get_where('kendaraan', ['id_kendaraan' => $id])->row();
// }
public function get_by_id($id)
{
    return $this->db->get_where('kendaraan', ['id_kendaraan' => $id])->row();
}
public function jumlah_per_wilayah($wilayah)
{
    $this->db->where('wilayah', $wilayah);
    return $this->db->count_all_results('kendaraan');
}

public function get_all() {
    return $this->db->get('kendaraan')->result();
}


}
?>
