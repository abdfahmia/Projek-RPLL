<?php

class M_produk extends CI_Model
{
    function tampil()
    {
        return $this->db->get('produk')->result();
    }
    public function detail_cart($id)
    {
        return $this->db->get_where('produk', array('id_produk' => $id))->row_array();
    }
    public function tambahcart($id_produk)
    {
        $result = $this->db->where('id_produk', $id_produk)
            ->limit(1)
            ->get('produk');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
