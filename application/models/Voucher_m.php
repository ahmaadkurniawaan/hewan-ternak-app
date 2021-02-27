<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voucher_m extends CI_Model
{
    public function getAllDataVoucher()
    {
        return $this->db->get('tb_voucher')->result_array();
    }

    public function tambahDataVoucher()
    {

        $voucher                   =  $this->input->post('voucher', true);
        $diskon                    =  $this->input->post('diskon', true);

        $data = [

            "voucher"          => $voucher,
            "diskon"                => $diskon

        ];

        return $this->db->insert('tb_voucher', $data);
    }

    public function hapusDataVoucher($id)
    {
        //Mengambil data Slider 
        $this->db->where('id', $id);
        $query = $this->db->get('tb_voucher');
        $row = $query->row();

        $this->db->delete('tb_voucher', array('id' => $id));
    }
}
