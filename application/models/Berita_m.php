<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_m extends CI_Model
{
    public function getDataNews()
    {
        $this->db->order_by('idnews', 'DESC');
        return $this->db->get('news')->result_array();
    }
    public function getDataNewsById($idnews)
    {
        return $this->db->get_where('news', array('idnews' => $idnews))->row();
    }
    public function getDataNewsPaginate($limit, $start)
    {
        $this->db->order_by('idnews', 'DESC');
        return $this->db->get('news', $limit, $start)->result_array();
    }

    public function countAllNews()
    {
        return $this->db->get('news')->num_rows();
    }

    public function getDataKategori()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('idcategory', 'DESC');
        return $this->db->get()->result_array();
    }
    public function kategori($idcategory)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('idcategory', $idcategory);
        return $this->db->get()->row();
    }
    public function getDataNewsCategory($slug)
    {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->join('category', 'news.slug_category = category.slug');
        $this->db->where('news.slug_category', $slug);
        return $this->db->get()->result_array();
    }
}
