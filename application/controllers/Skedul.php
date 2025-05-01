
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skedul extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('M_skedule');
    }
    public function index()
    {
        $skedule = $this->M_skedule->getDataSkedule();
        $DATA = array('data_sk' => $skedule);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('skedul/daftarskedul', $DATA);
        $this->load->view('layout/footer');
    }
    public function InputSkedule()
    {
        $tgl_thn = $this->input->post('tgl_thn');


        $DataInsert = array(
            'tgl_thn' => $tgl_thn,

        );
        $this->M_skedule->InsertDataSkedule($DataInsert);
        redirect(base_url('skedul/'));
    }

    public function update($id)
    {
        $skedule = $this->M_skedule->getDataSkeduleDetail($id);
        $DATA = array('data_sk' => $skedule);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('skedul/editskedule', $DATA);
        $this->load->view('layout/footer');
    }

    public function updateSkedule()
    {
        $tgl_thn = $this->input->post('tgl_thn');


        $DataUpdate = array(
            'tgl_thn' => $tgl_thn,

        );

        $this->M_skedule->UpdateDataSkedule($DataUpdate, $id);
        redirect(base_url('skedul/'));
    }


    public function delete($id)
    {
        $this->M_skedule->DeleteDataSkedule($id);
        redirect(base_url('skedul/'));
    }
}
