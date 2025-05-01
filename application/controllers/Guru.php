
<?php

class Guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('M_guru');
        $this->load->model('M_jk');
    }

    public function index()
    {
        $queryALLguru = $this->M_guru->getdataguru1();
        $jk = $this->M_jk->getDatajk();
        $guru = $this->M_guru->getDataGuru();
        $DATA = array('data_guru' => $guru, 'data_jk' => $jk, 'queryALLguru' => $queryALLguru);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('dataguru/daftarguru', $DATA);
        $this->load->view('layout/footer');
    }

    public function InputGuru()
    {
        $id_guru = $this->input->post('id_guru');
        $nama_guru = $this->input->post('nama_guru');
        $id_jk = $this->input->post('id_jk');
        $ttl = $this->input->post('ttl');
        $telepone = $this->input->post('telepone');
        $password = $this->input->post('password');

        $DataInsert = array(
            'id_guru' => $id_guru,
            'nama_guru' => $nama_guru,
            'id_jk' => $id_jk,
            'ttl' => $ttl,
            'telepone' => $telepone,
            'password' => $password
        );

        $this->M_guru->InsertDataGuru($DataInsert);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        berhasil register
      </div>');
        redirect(base_url('guru/'));
    }


    public function update($id)
    {
        $jk = $this->M_jk->getDatajk();
        $queryALLguru = $this->M_guru->getdataguru1();
        $guru = $this->M_guru->getDataGuruDetail($id);
        $DATA = array('data_guru' => $guru, 'queryALLguru' => $queryALLguru, 'data_jk' => $jk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('dataguru/editguru', $DATA);
        $this->load->view('layout/footer');
    }

    public function updateGuru()
    {
        $id_guru = $this->input->post('id_guru');
        $nama_guru = $this->input->post('nama_guru');
        $id_jk = $this->input->post('id_jk');
        $ttl = $this->input->post('ttl');
        $telepone = $this->input->post('telepone');
        $password = $this->input->post('password');

        $DataUpdate = array(
            'id_guru' => $id_guru,
            'nama_guru' => $nama_guru,
            'id_jk' => $id_jk,
            'ttl' => $ttl,
            'telepone' => $telepone,
            'password' => $password
        );

        $this->M_guru->UpdateDataGuru($DataUpdate, $id_guru);
        redirect(base_url('guru/'));
    }

    public function delete($id_guru)
    {
        $this->M_guru->DeleteDataGuru($id_guru);
        redirect(base_url('guru/'));
    }
}
