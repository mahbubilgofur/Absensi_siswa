<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
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
        $this->load->model('Modelteam'); //load model mahasiswa
        $this->load->library('form_validation');
    }
    public function index()
    {
        $queryALLteam = $this->Modelteam->getdatateam();
        $data = array('queryALLteam' => $queryALLteam);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datateam/daftarteam', $data);
        $this->load->view('layout/footer');
    }
    public function tambahteam()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datateam/tambahteam');
        $this->load->view('layout/footer');
    }
    public function editteam($id_team)
    {
        $queryDatateamdetaill = $this->Modelteam->getDatateamdetail($id_team);
        // echo "<pre>";
        // print_r($queryDatateamdetaill);
        // echo "</pre>";
        $data = array('querydatateam' => $queryDatateamdetaill);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datateam/editteam', $data);
        $this->load->view('layout/footer');
    }
    public function fungsiteam()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|min_length[10]');

        $data['foto'] = '';
        $foto = $_FILES['foto']['name'];
        $confiq['upload_path']      = './gambar';
        $confiq['allowed_types']    = 'gif|jpg||png|PNG|jpeg';
        $confiq['max_size']         = 10000;
        $confiq['max_width']        = 10000;
        $confiq['max_height']       = 10000;

        $this->load->library('upload', $confiq);

        if (!$this->upload->do_upload('foto')) {
            echo "maaf";
        } else {
            $foto = $this->upload->data('file_name');
            $data['foto'] = $foto;
            $id_team = $this->input->post('id_team');
            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');

            $ArrInsert = array(
                'id_team' => $id_team,
                'nama' => $nama,
                'foto' => $foto,
                'jabatan' => $jabatan
            );
            $this->Modelteam->insertDatateam($ArrInsert);
            redirect(base_url('team'));
        }
    }
    public function fungsiedit()
    {
        $id_team = $this->input->post('id_team');
        $foto = $_FILES['foto']['name'];
        $confiq['upload_path']      = './gambar';
        $confiq['allowed_types']    = 'gif|jpg||png|PNG|jpeg|webp';
        $confiq['max_size']         = 10000;
        $confiq['max_width']        = 10000;
        $confiq['max_height']       = 10000;

        $this->load->library('upload', $confiq);

        if (!$this->upload->do_upload('foto')) {
            $id_team = $this->input->post('id_team');
            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');

            $ArrUpdate = array(
                'id_team' => $id_team,
                'nama' => $nama,
                'jabatan' => $jabatan
            );
            $this->db->where('id_team', $id_team);
            $this->Modelteam->updateDatateam($id_team, $ArrUpdate);
            redirect(base_url('team'));
        } else {
            $foto = $this->upload->data('file_name');
            $data['foto'] = $foto;
            $id_team = $this->input->post('id_team');
            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');

            $ArrUpdate = array(
                'id_team' => $id_team,
                'nama' => $nama,
                'foto' => $foto,
                'jabatan' => $jabatan
            );
            $this->db->where('id_team', $id_team);
            $this->Modelteam->updateDatateam($id_team, $ArrUpdate);
            redirect(base_url('team'));
        }
    }
}
