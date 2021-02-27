<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('keranjang_model');
        $this->load->model('HewanTernak_m');
    }

    public function index()
    {
        $data['title'] = "HETER - Home";
        $data['slider'] = $this->HewanTernak_m->get_slider_all();
        $data['hewan'] = $this->keranjang_model->get_produk_all();
        $this->load->view('templates_home/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates_home/footer');
    }
}
