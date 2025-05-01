<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataabsen extends CI_Controller
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
     * map to /index.php/welcome/<met   hod_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->helper("url");
        $this->load->model('Modelabsen'); //load model mahasiswa
        $this->load->library('form_validation');
    }
    public function index()
    {
        $queryALLabsen = $this->Modelabsen->getdataabsen();
        $data = array('queryALLabsen' => $queryALLabsen);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('dataabsen/daftarabsen', $data);
        $this->load->view('layout/footer');
    }
    public function tambahabsen()
    {
        $this->load->model('Modelabsen');
        $queryALLabsen = $this->Modelabsen->getdataabsen1();
        $data = array('queryALLabsen' => $queryALLabsen);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('dataabsen/tambahabsen', $data);
        $this->load->view('layout/footer');
    }
    public function editabsen($id)
    {
        $this->load->model('Modelabsen');
        $queryALLabsen = $this->Modelabsen->getdataabsen1();
        $queryDataabsendetaill = $this->Modelabsen->getDataabsendetail($id);
        // echo "<pre>";
        // print_r($queryDataabsendetaill);
        // echo "</pre>";
        $data = array('querydataabsen' => $queryDataabsendetaill, 'queryALLabsen' => $queryALLabsen);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('dataabsen/editabsen', $data);
        $this->load->view('layout/footer');
    }
    public function fungsiabsen()
    {
        $data['ijin'] = '';
        $ijin = $_FILES['ijin']['name'];
        $confiq['upload_path']      = './surat';
        $confiq['allowed_types']    = 'gif|jpg||png|PNG|jpeg|pdf';
        $confiq['max_size']         = 10000;
        $confiq['max_width']        = 10000;
        $confiq['max_height']       = 10000;

        $this->load->library('upload', $confiq);

        if (!$this->upload->do_upload('ijin')) {
            if (!$this->upload->do_upload('sakit')) {

                $id = $this->input->post('id');
                $username = $this->input->post('username');
                $hadir = $this->input->post('hadir');
                $time = $this->input->post('time');

                $ArrInsert = array(
                    'id' => $id,
                    'username' => $username,
                    'ijin' => "0",
                    'sakit' => "0",
                    'hadir' => "hadir",
                    'time' => $time
                );
                $this->Modelabsen->insertDataabsen($ArrInsert);
                redirect(base_url('index'));
            } else {
                $sakit = $this->upload->data('file_name');
                $data['sakit'] = $sakit;
                $id = $this->input->post('id');
                $username = $this->input->post('username');
                $hadir = $this->input->post('hadir');
                $time = $this->input->post('time');

                $ArrInsert = array(
                    'id' => $id,
                    'username' => $username,
                    'ijin' => "0",
                    'sakit' => $sakit,
                    'hadir' => "sakit",
                    'time' => $time
                );
                $this->Modelabsen->insertDataabsen($ArrInsert);
                redirect(base_url('index'));
            }
        } else {
            $ijin = $this->upload->data('file_name');
            $data['ijin'] = $ijin;
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $hadir = $this->input->post('hadir');
            $time = $this->input->post('time');

            $ArrInsert = array(
                'id' => $id,
                'username' => $username,
                'ijin' => $ijin,
                'sakit' => "0",
                'hadir' => "ijin",
                'time' => $time
            );
            $this->Modelabsen->insertDataabsen($ArrInsert);
            redirect(base_url('index'));
        }
    }

    public function delete($id)
    {
        $this->Modelabsen->DeleteDataAbsen($id);
        redirect(base_url('dataabsen'));
    }
    public function contoh()
    {
        $this->load->view('contoh');
    }
}
