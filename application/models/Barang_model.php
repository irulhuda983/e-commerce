<?php

class Barang_model extends CI_model {

    public function getAllData()
    {
        $query = $this->db->get('barang');

        return $query->result_array();
    }

    public function getData($id)
    {
        $query = $this->db->get_where('barang', ['id' => $id]);

        return $query->row_array();
    }
}