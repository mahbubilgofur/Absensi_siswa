<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/Rekap
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
        $this->load->model('m_siswa');
        $this->load->model('Modelabsen');
        $this->load->model('M_siswa');
        $this->load->model('M_kelas');
    }

    public function index()
    {


        $data_siswa = $this->M_siswa->getdatasiswa3();
        $data = array('data_siswa' => $data_siswa);

        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datarekap/daftarrekap', $data);
        $this->load->view('layout/footer');
    }
    public function detail()
    {
        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');
        $nis = $this->input->post('nis');
        $kelas = $this->input->post('nama_kelas');

        // Query data siswa berdasarkan periode, nis, dan kelas
        $data_siswa = $this->M_siswa->getDataSiswa2($startdate, $enddate, $nis, $kelas);

        // Query semua data siswa (untuk dropdown)
        $queryALLsiswa = $this->M_siswa->getdatasiswa1();

        // Query untuk mengambil daftar nama_kelas dari tbl_kelas
        $list_kelas = $this->M_siswa->getListKelas();

        $data = array(
            'queryALLsiswa' => $queryALLsiswa,
            'data_siswa' => $data_siswa,
            'list_kelas' => $list_kelas  // Pass the list of classes to the view
        );

        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datarekap/detailrekap', $data);
        $this->load->view('layout/footer');
    }
}
