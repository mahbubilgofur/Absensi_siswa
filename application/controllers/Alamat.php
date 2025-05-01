<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alamat extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('Modelalamat'); //load model mahasiswa
    }
    public function index()
    {
        $queryALLalamat = $this->Modelalamat->getdataalamat();
        $data = array('queryALLalamat' => $queryALLalamat);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('dataalamat/daftaralamat', $data);
        $this->load->view('layout/footer');
    }
    public function tambahalamat()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('dataalamat/tambahalamat');
        $this->load->view('layout/footer');
    }
    public function fungsialamat()
    {

        $id = $this->input->post('id');
        $icon = $this->input->post('icon');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $link = $this->input->post('link');

        $ArrInsert = array(
            'id' => $id,
            'icon' => $icon,
            'judul' => $judul,
            'isi' => $isi,
            'link' => $link
        );
        $this->Modelalamat->insertDataalamat($ArrInsert);
        redirect(base_url('alamat'));
    }
    public function editalamat($id)
    {
        $queryDataalamatdetail = $this->Modelalamat->getDataalamatdetail($id);
        $data = array('querydataalamat' => $queryDataalamatdetail);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('dataalamat/editalamat', $data);
        $this->load->view('layout/footer');
    }

    public function fungsiedit()
    {
        $id = $this->input->post('id');
        $icon = $this->input->post('icon');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $link = $this->input->post('link');
        $isi2 = $this->input->post('isi2');
        $link2 = $this->input->post('link2');

        $ArrUpdate = array(
            'icon' => $icon,
            'judul' => $judul,
            'isi' => $isi,
            'link' => $link,
            'isi2' => $isi2,
            'link2' => $link2
        );
        $this->Modelalamat->updateDataalamat($id, $ArrUpdate);
        redirect(base_url('alamat'));
    }
}
