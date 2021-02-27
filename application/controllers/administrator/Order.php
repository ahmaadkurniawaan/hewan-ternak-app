<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HewanTernak_m');
        $this->load->model('Keranjang_model');
    }
    public function index()
    {
        $data['title'] = "HETER - Transaksi";
        $data['order'] = $this->HewanTernak_m->get_data_order();

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/siedbar');
        $this->load->view('administrator/customer/order', $data);
        $this->load->view('templates_administrator/footer');
    }
}
