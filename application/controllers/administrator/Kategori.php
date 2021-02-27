<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kategori_m');
        $this->load->model('Keranjang_model');
    }
    public function index()
    {
        $data['title'] = "HETER - Kategori";

        $data['kategori'] = $this->Kategori_m->getAllDataKategori();


        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/siedbar');
        $this->load->view('administrator/kategori/index', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function insert()
    {
        $data['title'] = "HETER - kategori";
        $data['kategori']               = $this->Kategori_m->getAllDataKategori();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/siedbar');
            $this->load->view('administrator/kategori/index', $data);
            $this->load->view('templates_administrator/footer');
        } else {

            $this->Kategori_m->tambahDataKategori();

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

            redirect('administrator/kategori', $data);
        }
    }

    public function update($id = true)
    {
        $data['title']                  = "HETER - kategori";
        $data['kategorirow']              = $this->Kategori_m->getAllDataKategoriById($id);
        $data['kategori']                 = $this->Kategori_m->getAllDataKategori();


        $this->form_validation->set_rules('img_hewan', 'Foto Hewan');
        $this->form_validation->set_rules('link', 'Link kategori', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/siedbar');
            $this->load->view('administrator/kategori/ubah', $data);
            $this->load->view('templates_administrator/footer');
        } else {

            $this->Kategori_m->ubahdatakategori($id);

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

            redirect('administrator/kategori', $data);
        }
    }

    public function delete($id)
    {



        if (empty($id)) {
            show_404();
        } else {


            $this->Kategori_m->hapusDatakategori($id);

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

            redirect('administrator/kategori');
        }
    }
}
