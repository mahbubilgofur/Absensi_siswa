
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class enis_kelamin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('M_jk');
    }

    public function index()
    {
        $jk = $this->M_jk->getDatajk();
        $DATA = array('data_jk' => $jk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('jk/daftarjk', $DATA);
        $this->load->view('layout/footer');
    }

    public function Inputjk()
    {
        $id_jk = $this->input->post('id_jk');
        $jk = $this->input->post('jk');

        $DataInsert = array(
            'id_jk' => $id_jk,
            'jk' => $jk
        );

        $this->M_jk->InsertDatajk($DataInsert);
        redirect(base_url('jk/'));
    }

    public function update($id_jk)
    {
        $jk = $this->M_jk->getDatajkDetail($id_jk);
        $DATA = array('data_jk' => $jk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('jk/editjk', $DATA);
        $this->load->view('layout/footer');
    }

    public function updatejk()
    {
        $id_jk = $this->input->post('id_jk');
        $jk = $this->input->post('jk');

        $DataUpdate = array(
            'id_jk' => $id_jk,
            'jk' => $jk
        );

        $this->M_jk->UpdateDatajk($DataUpdate, $id_jk);
        redirect(base_url('jk/'));
    }

    public function delete($id_jk)
    {
        $this->M_jk->DeleteDatajk($id_jk);
        redirect(base_url('jk/'));
    }
}
