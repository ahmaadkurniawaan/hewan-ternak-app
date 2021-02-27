<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['title'] = "HETER - Dashboard";

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/siedbar');
        $this->load->view('administrator/index');
        $this->load->view('templates_administrator/footer');
    }
}
