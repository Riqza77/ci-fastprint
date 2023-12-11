<?php
class Produk_model extends CI_Model {

    public function insert_produk($data) {
        $this->db->insert('produk', $data);
    }

    public function get_join()
    {
    	return $this->db->select('*')
    			 ->from('produk as a')
    			 ->join('kategori as b', 'a.kategori_id = b.id_kategori', 'right')
    			 ->join('status as c', 'a.status_id = c.id_status', 'right')
    			 ->where('a.status_id = 1')
    			 ->order_by('a.id_produk','desc')
    			 ->get();
    }

    public function get_id($id)
    {
    	return $this->db->select('*')
    			 ->from('produk as a')
    			 ->join('kategori as b', 'a.kategori_id = b.id_kategori', 'right')
    			 ->join('status as c', 'a.status_id = c.id_status', 'right')
    			 ->where('a.status_id = 1')
    			 ->where('id_produk',$id)
    			 ->order_by('a.id_produk','desc')
    			 ->get();
    }
}
