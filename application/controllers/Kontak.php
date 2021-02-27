<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
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
        $this->load->view('templates_home/header');
        $this->load->view('home/kontak');
        $this->load->view('templates_home/footer');
    }
}
