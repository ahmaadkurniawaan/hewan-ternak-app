<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login()
    {
        $data['title'] = "HETER - Login";

        $this->load->view('templates_home/header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates_home/footer');
    }
}
