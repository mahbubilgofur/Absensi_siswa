
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('M_kelas');
    }

    public function index()
    {
        $kelas = $this->M_kelas->getDataKelas();
        $DATA = array('data_kls' => $kelas);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('kelas/daftarkelas', $DATA);
        $this->load->view('layout/footer');
    }

    public function InputKelas()
    {
        $id_kelas = $this->input->post('id_kelas');
        $nama_kelas = $this->input->post('nama_kelas');

        $DataInsert = array(
            'id_kelas' => $id_kelas,
            'nama_kelas' => $nama_kelas
        );

        $this->M_kelas->InsertDataKelas($DataInsert);
        redirect(base_url('kelas/'));
    }

    public function update($id_kelas)
    {
        $kelas = $this->M_kelas->getDataKelasDetail($id_kelas);
        $DATA = array('data_kls' => $kelas);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('kelas/editkelas', $DATA);
        $this->load->view('layout/footer');
    }

    public function updateKelas()
    {
        $id_kelas = $this->input->post('id_kelas');
        $nama_kelas = $this->input->post('nama_kelas');

        $DataUpdate = array(
            'id_kelas' => $id_kelas,
            'nama_kelas' => $nama_kelas
        );

        $this->M_kelas->UpdateDataKelas($DataUpdate, $id_kelas);
        redirect(base_url('kelas/'));
    }

    public function delete($id_kelas)
    {
        $this->M_kelas->DeleteDataKelas($id_kelas);
        redirect(base_url('kelas/'));
    }
}
