<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AddNews extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form', 'url', 'file');
        $this->load->model('main_models');
        $this->load->library(array('upload', 'image_lib'));
    }

    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            $this->load->view('admin/login');
        } else {
            $data['front'] = $this->main_models->all_data('news')->result();
            $data['category'] = $this->main_models->all_data('category')->result();
            $this->load->view('admin/addNews', $data);
        }
    }


    public function delete($id)
    {
        if ($this->session->userdata('status') != "login") {
            $this->load->view('admin/login');
        } else {
            $where = array('idcategory' => $id);
            $this->main_models->deleteData($where, 'category');
            $this->session->set_flashdata('category_success', 'Data Berhasil Terhapus');
            redirect('newsData');
        }
    }

    public function insert()
    {
        if ($this->session->userdata('status') != "login") {
            $this->load->view('admin/login');
        } else {
            $gambar = "";
            $config['upload_path'] = './assets/img/berita/'; //path folder
            $config['allowed_types'] = 'jpg'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
            //            $config['max_width'] = 750;
            //            $config['min_width'] = 750;


            $config3['upload_path'] = './assets/img/berita/'; //path folder
            $config3['allowed_types'] = 'jpg'; //type yang dapat diakses bisa anda sesuaikan
            $config3['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
            //            $config['max_width'] = 750;
            //            $config['min_width'] = 750;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gbr2')) {
                $gbrx = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/berita/' . $gbrx['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '80%';
                $config['new_image'] = './assets/img/berita/' . $gbrx['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $gbrx['file_name'];
                if (!empty($_POST['file']['gbr3'])) {
                    if ($this->upload->do_upload('gbr3')) {
                        $gbrz = $this->upload->data();
                        $config3['image_library'] = 'gd2';
                        $config3['source_image'] = './assets/img/berita/' . $gbrz['file_name'];
                        $config3['create_thumb'] = FALSE;
                        $config3['maintain_ratio'] = FALSE;
                        $config3['quality'] = '80%';
                        $config3['new_image'] = './assets/img/berita/' . $gbrz['file_name'];
                        $this->load->library('image_lib', $config3);
                        $this->image_lib->resize();
                        $gambar3 = $gbrz['file_name'];
                    } else {
                        $b1 = $this->upload->display_errors();
                        $this->session->set_flashdata('category_success', $b1);
                        redirect('AddNews');
                    }
                } else {
                }
            } else {
                $a1 = $this->upload->display_errors();
                $this->session->set_flashdata('category_success', $a1);
                redirect('AddNews');
            }

            $aa = $this->input->post('kategori');
            $a = $this->input->post('nama');
            $c = $this->input->post('isi');
            $b = strip_tags($c);
            $date = $this->input->post('tanggal');
            $month = $this->input->post('bulan');
            $year = $this->input->post('tahun');
            $fulldate = $date . " " . $month . " " . $year;
            $e = $this->input->post('penulis');

            $data = array(
                'idcategory' => $aa,
                'title_news' => $a,
                'no_char' => $b,
                'detail_news' => $c,
                'img_news' => $gambar,
                'date_news' => $date,
                'month_news' => $month,
                'year_news' => $year,
                'full_date_news' => $fulldate,
                'queue_news' => '0',
                'author_news' => $e
            );
            $this->main_models->insert($data, 'news');
            $this->session->set_flashdata('category_success', 'Data Berhasil Tersimpan');
            redirect('newsData');
        }
    }

    public function store($idnews)
    {
        if ($this->session->userdata('status') != "login") {
            $this->load->view('admin/login');
        } else {
            $where = array('idnews' => $idnews);
            $data['data'] = $this->db->query("SELECT * FROM news nw, category ct WHERE nw.idcategory=ct.idcategory AND nw.idnews = '$idnews'")->row();
            $data['category'] = $this->main_models->all_data('category')->result();
            $this->load->view('admin/updateNews', $data);
        }
    }

    public function update($idnews)
    {
        $where1 = array('idnews' => $idnews);
        $data['data'] = $this->db->query("SELECT * FROM news nw, category ct WHERE nw.idcategory=ct.idcategory AND nw.idnews = '$idnews'")->row();
        $data['category'] = $this->main_models->all_data('category')->result();


        if ($this->session->userdata('status') != "login") {
            $this->load->view('admin/login');
        } else {
            $gambar = "";
            $config['upload_path'] = './assets/img/berita/'; //path folder
            $config['allowed_types'] = 'jpg'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
            //            $config['max_width'] = 750;
            //            $config['min_width'] = 750;


            $config3['upload_path'] = './assets/img/berita/'; //path folder
            $config3['allowed_types'] = 'jpg'; //type yang dapat diakses bisa anda sesuaikan
            $config3['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
            //            $config['max_width'] = 750;
            //            $config['min_width'] = 750;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gbr2')) {
                $gbrx = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/berita/' . $gbrx['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '80%';
                $config['new_image'] = './assets/img/berita/' . $gbrx['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $gbrx['file_name'];
                if (!empty($_POST['file']['gbr3'])) {
                    if ($this->upload->do_upload('gbr3')) {
                        $gbrz = $this->upload->data();
                        $config3['image_library'] = 'gd2';
                        $config3['source_image'] = './assets/img/berita/' . $gbrz['file_name'];
                        $config3['create_thumb'] = FALSE;
                        $config3['maintain_ratio'] = FALSE;
                        $config3['quality'] = '80%';
                        $config3['new_image'] = './assets/img/berita/' . $gbrz['file_name'];
                        $this->load->library('image_lib', $config3);
                        $this->image_lib->resize();
                        $gambar3 = $gbrz['file_name'];
                    } else {
                        $b1 = $this->upload->display_errors();
                        $this->session->set_flashdata('category_success', $b1);
                        $this->load->view('admin/updateNews', $data);
                    }
                } else {
                }
            } else {
                $a1 = $this->upload->display_errors();
                $this->session->set_flashdata('category_success', $a1);
                $this->load->view('admin/updateNews', $data);
            }

            $idnews = $this->input->post('idnews');
            $idcategory = $this->input->post('idcategory');
            $aa = $this->input->post('kategori');
            $a = $this->input->post('nama');
            $c = $this->input->post('isi');
            $b = strip_tags($c);
            $date = $this->input->post('tanggal');
            $month = $this->input->post('bulan');
            $year = $this->input->post('tahun');
            $fulldate = $date . " " . $month . " " . $year;
            $e = $this->input->post('penulis');

            $data = array(
                'idcategory' => $aa,
                'title_news' => $a,
                'no_char' => $b,
                'detail_news' => $c,
                'img_news' => $gambar,
                'date_news' => $date,
                'month_news' => $month,
                'year_news' => $year,
                'full_date_news' => $fulldate,
                'queue_news' => '0',
                'author_news' => $e
            );

            $where = array(
                'idnews' => $idnews
            );

            $this->main_models->update_data('news', $data, $where);
            $this->session->set_flashdata('category_success', 'Data Berhasil Diubah');
            redirect('newsData');
        }
    }

    public function edit()
    {
        if ($this->session->userdata('status') != "login") {
            $this->load->view('admin/login');
        } else {
            $a = $this->input->post('kategori');
            $where = array(
                'idcategory' => $a
            );

            $b = $this->input->post('visibilitas');
            $data = array(
                'status_category' => $b
            );

            $this->main_models->edit($where, $data, 'category');
            $this->session->set_flashdata('category_success', 'Data Berhasil Diubah');
            redirect('newsData');
        }
    }

    /*function tinymce_upload() {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        } else {
            $file = $this->upload->data();
            $this->output
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode(['location' => base_url() . './assets/images/' . $file['file_name']]))
                    ->_display();
            exit;
        }
    }

*/
}
