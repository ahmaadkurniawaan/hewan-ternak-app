<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{

    public function get_produk_all()
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->order_by('idhewan', 'DESC');
        return $this->db->get()->result_array();
    }
    public function get_voucher_all()
    {
        $this->db->select('*');
        $this->db->from('tb_voucher');
        return $this->db->get()->result_array();
    }

    public function get_produk_kategori($kategori)
    {
        if ($kategori > 0) {
            $this->db->where('kategori', $kategori);
        }
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->order_by('idhewan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_kategori_all()
    {
        $query = $this->db->get('tb_kategori');
        return $query->result_array();
    }

    public  function get_produk_id($id)
    {
        $this->db->select('tb_hewan.*,nama_kategori');
        $this->db->from('tb_hewan');
        $this->db->join('tb_kategori', 'kategori=tb_kategori.id', 'left');
        $this->db->where('idhewan', $id);
        return $this->db->get();
    }

    public function tambah_pelanggan($data)
    {
        $this->db->insert('tb_pelanggan', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function tambah_order($data)
    {
        $this->db->insert('tb_order', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function tambah_detail_order($data)
    {
        $this->db->insert('tb_detail_order', $data);
    }
    public function tambahdataSubscribe()
    {
        $email            =  $this->input->post('email', true);

        $data = [
            "email"            => $email
        ];

        return $this->db->insert('tb_subscribe', $data);
    }

    public function get_data_order()
    {
        $this->load->from('tb_detail_order');
        $this->db->join('tb_order', 'tb_detail_order.order_id = tb_order.id');
        $this->db->join('tb_hewan', 'tb_detail_order.idhewan = tb_hewan.idhewan');

        return $this->db->get()->result_array();
        // $query = $this->db->get();
        // return $query->result();
    }
}
