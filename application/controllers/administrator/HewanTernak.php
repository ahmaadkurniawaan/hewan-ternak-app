<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HewanTernak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('HewanTernak_m');
        $this->load->model('Kategori_m');
        $this->load->model('Keranjang_model');
    }

    public function index()
    {
        $data['title'] = "HETER - Hewan Ternak";

        $data['hewan']               = $this->HewanTernak_m->getAllDataHewan();

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/siedbar');
        $this->load->view('administrator/hewan_ternak/index', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function insert()
    {
        $data['title']              = "HETER - Hewan Ternak";
        $data['kategori']           = $this->Kategori_m->getAllDataKategori();
        $data['hewan']              = $this->HewanTernak_m->getAllDataHewan();


        $this->form_validation->set_rules('img_hewan', 'Foto Hewan');
        $this->form_validation->set_rules('nama_hewan', 'Nama Hewan', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('link_alamat', 'Link Alamat');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('kelamin', 'Kelamin', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/siedbar');
            $this->load->view('administrator/hewan_ternak/tambah_data', $data);
            $this->load->view('templates_administrator/footer');
        } else {

            $this->HewanTernak_m->tambahdataHewan();

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

            redirect('administrator/hewanternak/index');
        }
    }
    public function update($idhewan)
    {
        $data['title'] = "HETER - Hewan Ternak";
        $data['hewan']               = $this->HewanTernak_m->getAllDataHewan();
        $data['hewanrow']            = $this->HewanTernak_m->getAllDataHewanById($idhewan);


        $this->form_validation->set_rules('img_hewan', 'Foto Hewan');
        $this->form_validation->set_rules('nama_hewan', 'Nama Hewan', 'required');
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('link_alamat', 'Link Alamat');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('kelamin', 'Kelamin', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/siedbar');
            $this->load->view('administrator/hewan_ternak/ubah', $data);
            $this->load->view('templates_administrator/footer');
        } else {

            $this->HewanTernak_m->ubahdataHewan($idhewan);

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

            redirect('administrator/hewanternak');
        }
    }

    public function delete($idhewan)
    {
        if (empty($idhewan)) {
            show_404();
        } else {

            $this->HewanTernak_m->hapusDataHewan($idhewan);

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

            redirect('administrator/hewanternak/index');
        }
    }
}
