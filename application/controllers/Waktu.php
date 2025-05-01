
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Waktu extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('M_waktu');
    }
    public function index()
    {
        $waktu = $this->M_waktu->getDatawaktu();
        $DATA = array('data_sk' => $waktu);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('waktu/daftarwaktu', $DATA);
        $this->load->view('layout/footer');
    }
    public function Inputwaktu()
    {
        $jam_masuk = $this->input->post('jam_masuk');
        $jam_pulang = $this->input->post('jam_pulang');


        $DataInsert = array(
            'jam_masuk' => $jam_masuk,
            'jam_pulang' => $jam_pulang,

        );
        $this->M_waktu->InsertDatawaktu($DataInsert);
        redirect(base_url('waktu/'));
    }

    public function update($id)
    {
        $waktu = $this->M_waktu->getDatawaktuDetail($id);
        $DATA = array('data_sk' => $waktu);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('waktu/editwaktu', $DATA);
        $this->load->view('layout/footer');
    }

    public function updatewaktu()
    {
        $jam_masuk = $this->input->post('jam_masuk');
        $jam_pulang = $this->input->post('jam_pulang');


        $DataUpdate = array(
            'jam_masuk' => $jam_masuk,
            'jam_pulang' => $jam_pulang,

        );

        $this->M_waktu->UpdateDatawaktu($DataUpdate, $id);
        redirect(base_url('waktu/'));
    }


    public function delete($id)
    {
        $this->M_waktu->DeleteDatawaktu($id);
        redirect(base_url('waktu/'));
    }
}
