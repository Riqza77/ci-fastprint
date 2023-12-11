<?php
class Status_model extends CI_Model {

    public function get_status_id_by_name($nama_status) {
        $query = $this->db->get_where('status', array('nama_status' => $nama_status));
        $result = $query->row();

        if ($result) {
            // Jika status sudah ada, kembalikan ID status yang sudah ada
            return $result->id_status;
        } else {
            return false;
        }
    }

    public function insert_status($data) {
        // Periksa apakah status sudah ada
        $existing_status_id = $this->get_status_id_by_name($data['nama_status']);

        if ($existing_status_id !== false) {
            // Kembalikan ID status yang sudah ada jika status sudah ada
            return $existing_status_id;
        } else {
            // Jika status belum ada, masukkan data baru
            $this->db->insert('status', $data);
            return $this->db->insert_id();
        }
    }

    public function get()
    {
        return $this->db->get('status');
    }
}
