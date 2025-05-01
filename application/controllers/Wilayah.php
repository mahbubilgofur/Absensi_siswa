<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends CI_Controller
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
        $this->load->model('Modelwilayah'); //load model mahasiswa
    }
    public function index()
    {
        $queryALLwilayah = $this->Modelwilayah->getdatawilayah();
        $data = array('queryALLwilayah' => $queryALLwilayah);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datawilayah/daftarwilayah', $data);
        $this->load->view('layout/footer');
    }
    public function tambahwilayah()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datawilayah/tambahwilayah');
        $this->load->view('layout/footer');
    }
    public function fungsiwilayah()
    {
        $id_wilayah = $this->input->post('id_wilayah');
        $link_wilayah = $this->input->post('link_wilayah');

        $ArrInsert = array(
            'id_wilayah' => $id_wilayah,
            'link_wilayah' => $link_wilayah
        );
        $this->Modelwilayah->insertDatawilayah($ArrInsert);
        redirect(base_url('wilayah'));
    }
    public function editwilayah($id_wilayah)
    {
        $queryDatawilayahdetaill = $this->Modelwilayah->getDatawilayahdetail($id_wilayah);
        // echo "<pre>";
        // print_r($queryDatawilayahdetaill);
        // echo "</pre>";
        $data = array('querydatawilayah' => $queryDatawilayahdetaill);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datawilayah/editwilayah', $data);
        $this->load->view('layout/footer');
    }
    public function fungsiedit()
    {
        $id_wilayah = $this->input->post('id_wilayah');
        $link_wilayah = $this->input->post('link_wilayah');

        $ArrUpdate = array(
            'id_wilayah' => $id_wilayah,
            'link_wilayah' => $link_wilayah
        );
        $this->db->where('id_wilayah', $id_wilayah);
        $this->Modelwilayah->updateDatawilayah($id_wilayah, $ArrUpdate);
        redirect(base_url('wilayah'));
    }
}
