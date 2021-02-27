<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
    public function getAllDataKategori()
    {
        return $this->db->get('tb_kategori')->result_array();
    }

    public function tambahDataKategori()
    {

        $kategori                   =  $this->input->post('kategori', true);

        $data = [

            "nama_kategori"           => $kategori

        ];

        return $this->db->insert('tb_kategori', $data);
    }

    public function hapusDataKategori($id)
    {
        //Mengambil data Slider 
        $this->db->where('id', $id);
        $query = $this->db->get('tb_kategori');
        $row = $query->row();

        $this->db->delete('tb_kategori', array('id' => $id));
    }
}
