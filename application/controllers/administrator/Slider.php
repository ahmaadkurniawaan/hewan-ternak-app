<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Slider_m');
    }
    public function index()
    {
        $data['title'] = "HETER - Slider";

        $data['slider']               = $this->Slider_m->getAllDataSlider();


        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/siedbar');
        $this->load->view('administrator/slider/index', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function insert()
    {
        $data['title'] = "HETER - Slider";
        $data['slider']               = $this->Slider_m->getAllDataSlider();


        $this->form_validation->set_rules('img_hewan', 'Foto Hewan');
        $this->form_validation->set_rules('link', 'Link Slider', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/siedbar');
            $this->load->view('administrator/slider/tambah', $data);
            $this->load->view('templates_administrator/footer');
        } else {

            $this->Slider_m->tambahdataSlider();

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

            redirect('administrator/slider', $data);
        }
    }

    public function update($idslider = true)
    {
        $data['title']                  = "HETER - Slider";
        $data['sliderrow']              = $this->Slider_m->getAllDataSliderById($idslider);
        $data['slider']                 = $this->Slider_m->getAllDataSlider();


        $this->form_validation->set_rules('img_hewan', 'Foto Hewan');
        $this->form_validation->set_rules('link', 'Link Slider', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/siedbar');
            $this->load->view('administrator/slider/ubah', $data);
            $this->load->view('templates_administrator/footer');
        } else {

            $this->Slider_m->ubahdataSlider($idslider);

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

            redirect('administrator/slider', $data);
        }
    }

    public function delete($idslider)
    {



        if (empty($idslider)) {
            show_404();
        } else {


            $this->Slider_m->hapusDataSlider($idslider);

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

            redirect('administrator/slider');
        }
    }
}
