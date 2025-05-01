
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('M_mapel');
    }

    public function index()
    {
        $mapel = $this->M_mapel->getDataMapel();
        $DATA = array('data_mapel' => $mapel);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('mapel/tambahmapel');
        $this->load->view('layout/footer');
    }

    public function InputMapel()
    {
        $kode_mapel = $this->input->post('kode_mapel');
        $nama_mapel = $this->input->post('nama_mapel');

        $DataInsert = array(
            'kode_mapel' => $kode_mapel,
            'nama_mapel' => $nama_mapel
        );

        $this->M_mapel->InsertDataMapel($DataInsert);
        redirect(base_url('mapel/'));
    }

    public function update($id)
    {
        $mapel = $this->M_mapel->getDataMapelDetail($id);
        $DATA = array('data_mapel' => $mapel);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('mapel/editmapel', $DATA);
        $this->load->view('layout/footer');
    }
    public function updateMapel()
    {
        $kode_mapel = $this->input->post('kode_mapel');
        $nama_mapel = $this->input->post('nama_mapel');

        $DataUpdate = array(
            'kode_mapel' => $kode_mapel,
            'nama_mapel' => $nama_mapel
        );

        $this->M_mapel->UpdateDataMapel($DataUpdate, $kode_mapel);
        redirect(base_url('mapel/'));
    }

    public function delete($kode_mapel)
    {
        $this->M_mapel->DeleteDataMapel($kode_mapel);
        redirect(base_url('mapel/'));
    }
}
