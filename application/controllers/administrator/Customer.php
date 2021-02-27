<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HewanTernak_m');
        $this->load->model('Keranjang_model');
    }

    public function index()
    {
        $data['title'] = "HETER - Customer";
        $data['pelanggan'] = $this->HewanTernak_m->getAllDataPelanggan();

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/siedbar');
        $this->load->view('administrator/customer/index', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function delete($id)
    {
        if (empty($id)) {
            show_404();
        } else {

            $this->HewanTernak_m->hapusDataPelanggan($id);

            $this->session->set_flashdata('message', ' <div class="row mt-3">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data <strong>berhasil</strong> Dihapus
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>');

            redirect('administrator/customer/index');
        }
    }
}
