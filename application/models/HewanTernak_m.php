<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HewanTernak_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->helper('form');
    }

    public function getAllDatahewan()
    {
        $this->db->select('*');
        $this->db->from('tb_hewan');
        $this->db->order_by('idhewan', 'DESC');
        return $this->db->get()->result_array();
    }
    public function get_slider_all()
    {
        $this->db->select('*');
        $this->db->from('tb_slider');
        // $this->db->order_by('idslider', 'DESC');
        return $this->db->get()->result_array();
    }
    public function getAllDataPelanggan()
    {
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }
    public function hapusDataPelanggan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pelanggan');
    }

    public function get_data_order()
    {
        $this->db->from('tb_detail_order');
        $this->db->join('tb_hewan', 'tb_detail_order.produk = tb_hewan.idhewan');
        $this->db->join('tb_order', 'tb_detail_order.order_id = tb_order.id');
        $this->db->join('tb_pelanggan', 'tb_order.pelanggan = tb_pelanggan.id');
        return $this->db->get()->result_array();
    }

    public function getAllDataHewanById($idhewan)
    {
        return $this->db->get_where('tb_hewan', array('idhewan' => $idhewan))->row();
    }


    public function tambahDatahewan()
    {

        $nama_hewan             =  $this->input->post('nama_hewan', true);
        $nama_pemilik           =  $this->input->post('nama_pemilik', true);
        $alamat                 =  $this->input->post('alamat', true);
        $link_alamat            =  $this->input->post('link_alamat', true);
        $berat                  =  $this->input->post('berat', true);
        $harga                  =  $this->input->post('harga', true);
        $stok                   =  $this->input->post('stok', true);
        $umur                   =  $this->input->post('umur', true);
        $deskripsi              =  $this->input->post('deskripsi', true);
        $kelamin                =  $this->input->post('kelamin', true);
        $kondisi                =  $this->input->post('kondisi', true);
        $kategori               =  $this->input->post('kategori', true);

        $config['upload_path'] = './uploads/hewan/'; //path folder
        $config['allowed_types'] = 'png|jpg|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
            $gbr = $this->upload->data();
            //Compress Image               
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/hewan/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width']         = 350;
            $config['height']       = 350;
            $config['new_image'] = './uploads/hewan/' . $gbr['file_name'];

            $this->image_lib->initialize($config);
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar = $gbr['file_name'];
        }


        $data = [

            "nama_hewan"            => $nama_hewan,
            "nama_pemilik"          => $nama_pemilik,
            "alamat"                => $alamat,
            "link_alamat"           => $link_alamat,
            "berat"                 => $berat,
            "harga"                 => $harga,
            "stok"                  => $stok,
            "umur"                  => $umur,
            "deskripsi"             => $deskripsi,
            "kelamin"               => $kelamin,
            "kondisi"               => $kondisi,
            "kategori"              => $kategori,
            "img_hewan"             => $gambar,
            "date_created"          => date('Y-m-d')


        ];

        return $this->db->insert('tb_hewan', $data);
    }
    public function UbahDatahewan($idhewan = true)
    {

        //Ambil data Image Hewan
        $_image = $this->db->get_where('tb_hewan', ['idhewan' => $idhewan])->row();

        $nama_hewan             =  $this->input->post('nama_hewan', true);
        $nama_pemilik           =  $this->input->post('nama_pemilik', true);
        $alamat                 =  $this->input->post('alamat', true);
        $link_alamat            =  $this->input->post('link_alamat', true);
        $berat                  =  $this->input->post('berat', true);
        $harga                  =  $this->input->post('harga', true);
        $stok                   =  $this->input->post('stok', true);
        $umur                   =  $this->input->post('umur', true);
        $deskripsi              =  $this->input->post('deskripsi', true);
        $kelamin                =  $this->input->post('kelamin', true);
        $kondisi                =  $this->input->post('kondisi', true);
        $kategori               =  $this->input->post('kategori', true);
        $gambar                 =  $_FILES['image']['name'];

        $config['upload_path'] = './uploads/hewan/'; //path folder
        $config['allowed_types'] = 'png|jpg|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = FALSE; //Enkripsi nama yang terupload
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
            $gbr = $this->upload->data();
            //Compress Image               
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/hewan/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width']         = 350;
            $config['height']       = 350;
            $config['new_image'] = './uploads/hewan/' . $gbr['file_name'];

            $this->image_lib->initialize($config);
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar = $gbr['file_name'];

            //jika gambar nya ada maka hapus gambar nya lalu Diubah
            if ($_image != 0) {
                unlink("./uploads/hewan/$_image->img_hewan");
            }
        }

        $data = [

            "nama_hewan"            => $nama_hewan,
            "nama_pemilik"          => $nama_pemilik,
            "alamat"                => $alamat,
            "link_alamat"           => $link_alamat,
            "berat"                 => $berat,
            "harga"                 => $harga,
            "stok"                  => $stok,
            "umur"                  => $umur,
            "deskripsi"             => $deskripsi,
            "kelamin"               => $kelamin,
            "kondisi"               => $kondisi,
            "kategori"              => $kategori,
            "img_hewan"             => $gambar,
            "date_created"          => date('Y-m-d')


        ];

        return $this->db->update('tb_hewan', $data, array('idhewan' => $idhewan));
    }

    public function hapusDataHewan($idhewan)
    {

        //Mengambil data Slider 
        $this->db->where('idhewan', $idhewan);
        $query = $this->db->get('tb_hewan');
        $row = $query->row();

        //Menghapus Image pada Folder
        unlink("./uploads/hewan/$row->img_hewan");

        $this->db->delete('tb_hewan', array('idhewan' => $idhewan));
    }
}
