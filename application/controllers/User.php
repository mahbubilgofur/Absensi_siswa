
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('M_user');
    }

    public function index()
    {
        $user = $this->M_user->getDataUser();
        $DATA = array('data_user' => $user);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('user/daftaruser', $DATA);
        $this->load->view('layout/footer');
    }

    public function InputUser()
    {
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');

        $DataInsert = array(
            'nis' => $nis,
            'password' => $password
        );

        $this->M_user->InsertDataUser($DataInsert);
        redirect(base_url('user/'));
    }

    public function update($id)
    {
        $user = $this->M_user->getDataUserDetail($id);
        $DATA = array('data_user' => $user);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('user/edituser', $DATA);
        $this->load->view('layout/footer');
    }

    public function updateUser()
    {
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');

        $DataUpdate = array(
            'nis' => $nis,
            'password' => $password
        );

        $this->M_user->UpdateDataUser($DataUpdate, $nis);
        redirect(base_url('user/'));
    }

    public function delete($nis)
    {
        $this->M_user->DeleteDataUser($nis);
        redirect(base_url('user/'));
    }
}
