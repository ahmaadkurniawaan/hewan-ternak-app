<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voucher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Voucher_m');
        $this->load->model('Keranjang_model');
    }
    public function index()
    {
        $data['title'] = "HETER - voucher";

        // $data['voucher'] = $this->Keranjang_model->get_voucher_all();
        $data['voucher'] = $this->Voucher_m->getAllDataVoucher();


        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/siedbar');
        $this->load->view('administrator/voucher/index', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function insert()
    {
        $data['title'] = "HETER - voucher";
        $data['voucher']               = $this->Voucher_m->getAllDatavoucher();

        $this->form_validation->set_rules('voucher', 'voucher', 'required');
        $this->form_validation->set_rules('diskon', 'Diskon', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/siedbar');
            $this->load->view('administrator/voucher/index', $data);
            $this->load->view('templates_administrator/footer');
        } else {

            $this->Voucher_m->tambahDataVoucher();

            $this->session->set_flashdata('message', ' <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> Disimpan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>');

            redirect('administrator/voucher', $data);
        }
    }

    public function update($id = true)
    {
        $data['title']                  = "HETER - voucher";
        $data['voucherrow']              = $this->Voucher_m->getAllDatavoucherById($id);
        $data['voucher']                 = $this->Voucher_m->getAllDatavoucher();


        $this->form_validation->set_rules('img_hewan', 'Foto Hewan');
        $this->form_validation->set_rules('link', 'Link voucher', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/siedbar');
            $this->load->view('administrator/voucher/ubah', $data);
            $this->load->view('templates_administrator/footer');
        } else {

            $this->Voucher_m->ubahdatavoucher($id);

            $this->session->set_flashdata('message', ' <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>berhasil</strong> Diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>');

            redirect('administrator/voucher', $data);
        }
    }

    public function delete($id)
    {



        if (empty($id)) {
            show_404();
        } else {


            $this->Voucher_m->hapusDataVoucher($id);

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

            redirect('administrator/voucher');
        }
    }
}
