<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
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

        $this->load->model('Modelteam');
        $this->load->model('Modelalamat');
        $this->load->model('Modelwilayah'); //load model mahasiswa
        $this->load->model('Modelabsen');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {


        $queryALLabsen = $this->Modelabsen->getdataabsen1();
        $queryALLalamat = $this->Modelalamat->getdataalamat();
        $queryALLteam = $this->Modelteam->getdatateam();
        $queryALLwilayah = $this->Modelwilayah->getdatawilayah();
        $data = array('queryALLteam' => $queryALLteam, 'queryALLalamat' => $queryALLalamat, 'queryALLwilayah' => $queryALLwilayah, 'queryALLabsen' => $queryALLabsen);
        $this->load->view('dasboard/header');
        $this->load->view('dasboard/navbar');
        $this->load->view('dasboard/content', $data);
        $this->load->view('dasboard/footer');
    }
    public function fungsiabsen()
    {
        $queryALLabsen = $this->Modelabsen->getdataabsen1();
        $confiq['upload_path']      = './surat';
        $confiq['allowed_types']    = 'gif|jpg||png|PNG|jpeg|pdf|webp';
        $confiq['max_size']         = 10000;
        $confiq['max_width']        = 10000;
        $confiq['max_height']       = 10000;
        $path = $_FILES['ijin']['name'];
        $ijin  = date("Y-m-d") . "." . pathinfo($path, PATHINFO_EXTENSION);
        $this->load->library('upload', $confiq);

        if (!$this->upload->do_upload('ijin')) {

            $confiq['upload_path']      = './surat';
            $confiq['allowed_types']    = 'gif|jpg||png|PNG|jpeg|pdf|webp';
            $confiq['max_size']         = 10000;
            $confiq['max_width']        = 10000;
            $confiq['max_height']       = 10000;
            $path = $_FILES['sakit']['name'];
            $sakit  = date("Y-m-d") . "." . pathinfo($path, PATHINFO_EXTENSION);

            $this->load->library('upload', $confiq);
            if (!$this->upload->do_upload('sakit')) {
                $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                $data = array('upload_data' => $this->upload->data());
                $id = $this->input->post('id', 'queryALLabsen' . $queryALLabsen);
                $username = $this->input->post('username');
                $keterangan = $this->input->post('keterangan');
                $tgl_absen = $this->input->post('tgl_absen');
                $jam_masuk = $this->input->post('jam_masuk');
                $jam_pulang = $this->input->post('jam_pulang');

                $ArrInsert = array(
                    'id' => $queryALLabsen,
                    'username' => $username,
                    'ijin' => "0",
                    'sakit' => "0",
                    'keterangan' => "hadir",
                    'tgl_absen' =>  date("Y-m-d"),
                    'jam_masuk' => $date->format(' H:i:s'),
                    'jam_pulang' => "0",

                );
                $this->Modelabsen->insertDataabsen($ArrInsert);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="text-align: center;">
               berhasil absen
               </div>');
                redirect(base_url('index'));
            } else {
                $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                $data = array('upload_data' => $this->upload->data());
                $id = $this->input->post('id', 'queryALLabsen' . $queryALLabsen);
                $username = $this->input->post('username');
                $keterangan = $this->input->post('keterangan');
                $tgl_absen = $this->input->post('tgl_absen');
                $jam_masuk = $this->input->post('jam_masuk');
                $jam_pulang = $this->input->post('jam_pulang');

                $ArrInsert = array(
                    'id' => $queryALLabsen,
                    'username' => $username,
                    'ijin' => "0",
                    'sakit' => $sakit,
                    'keterangan' => "sakit",
                    'tgl_absen' =>  date("Y-m-d"),
                    'jam_masuk' => $date->format(' H:i:s'),
                    'jam_pulang' => "0",

                );
                $this->Modelabsen->insertDataabsen($ArrInsert);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="text-align: center;">
                file surat sakit berhasil terkirim
               </div>');
                redirect(base_url('index'));
            }
        } else {
            $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
            $data = array('upload_data' => $this->upload->data());
            $id = $this->input->post('id', 'queryALLabsen' . $queryALLabsen);
            $username = $this->input->post('username');
            $keterangan = $this->input->post('keterangan');
            $tgl_absen = $this->input->post('tgl_absen');
            $jam_masuk = $this->input->post('jam_masuk');
            $jam_pulang = $this->input->post('jam_pulang');

            $ArrInsert = array(
                'id' => $queryALLabsen,
                'username' => $username,
                'ijin' => $ijin,
                'sakit' => "0",
                'keterangan' => "ijin",
                'tgl_absen' =>  date("Y-m-d"),
                'jam_masuk' => $date->format(' H:i:s'),
                'jam_pulang' => "0",

            );
            $this->Modelabsen->insertDataabsen($ArrInsert);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="text-align: center;">
            file surat ijin berhasil terkirim
           </div>');
            redirect(base_url('index'));
        }
    }
}
