<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterData extends CI_Controller
{

    public function index()
    {
        $data['title'] = "HETER - Master Data";

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/siedbar');
        $this->load->view('administrator/master_data/index');
        $this->load->view('templates_administrator/footer');
    }
}
