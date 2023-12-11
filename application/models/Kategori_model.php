<?php
class Kategori_model extends CI_Model {
    
    public function get_kategori_id_by_name($nama_kategori) {
        $query = $this->db->get_where('kategori', array('nama_kategori' => $nama_kategori));
        $result = $query->row();

        if ($result) {
            // Jika kategori sudah ada, kembalikan ID kategori yang sudah ada
            return $result->id_kategori;
        } else {
            return false;
        }
    }

    public function insert_kategori($data) {
        // Periksa apakah kategori sudah ada
        $existing_kategori_id = $this->get_kategori_id_by_name($data['nama_kategori']);

        if ($existing_kategori_id !== false) {
            // Kembalikan ID kategori yang sudah ada jika kategori sudah ada
            return $existing_kategori_id;
        } else {
            // Jika kategori belum ada, masukkan data baru
            $this->db->insert('kategori', $data);
            return $this->db->insert_id();
        }
    }
}
