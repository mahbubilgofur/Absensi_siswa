<?php

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        $this->load->model('M_kelas');
        $this->load->model('M_siswa');
        $this->load->model('M_jk');
        $this->load->library('session');
    }

    public function index()
    {
        $jk = $this->M_jk->getDatajk();
        $kelas = $this->M_kelas->getDataKelas();
        $data_siswa = $this->M_siswa->getDataSiswa();
        $queryALLsiswa = $this->M_siswa->getdatasiswa1();
        $DATA = array('data_siswa' => $data_siswa, 'queryALLsiswa' => $queryALLsiswa, 'data_kls' => $kelas, 'data_jk' => $jk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datasiswa/daftarsiswa', $DATA);
        $this->load->view('layout/footer');
    }
    public function InputSiswa()
    {
        $nis = $this->input->post('nis');
        $nama_siswa = $this->input->post('nama_siswa');
        $id_kelas = $this->input->post('id_kelas');
        $id_jk = $this->input->post('id_jk');
        $ttl = $this->input->post('ttl');
        $number = $this->input->post('number');
        $password = $this->input->post('password');

        $DataInsert = array(
            'nis' => $nis,
            'nama_siswa' => $nama_siswa,
            'id_kelas' => $id_kelas,
            'id_jk' => $id_jk,
            'ttl' => $ttl,
            'number' => $number,
            'password' => $password
        );

        if ($this->M_siswa->InsertDataSiswa($DataInsert)) {
            // Input berhasil
            $this->session->set_flashdata('success', 'Data siswa berhasil ditambahkan.');
            redirect(base_url('siswa/'));
        } else {
            // Input gagal
            $this->session->set_flashdata('error', 'Gagal menambahkan data siswa.');
            redirect(base_url('siswa/'));
        }
    }

    public function update($id)
    {
        $jk = $this->M_jk->getDatajk();
        $kelas = $this->M_kelas->getDataKelas();
        $siswa = $this->M_siswa->getDataSiswaDetail($id);
        $queryALLsiswa = $this->M_siswa->getdatasiswa1();
        $DATA = array('data_siswa' => $siswa, 'queryALLsiswa' => $queryALLsiswa, 'data_kls' => $kelas, 'data_jk' => $jk);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datasiswa/editsiswa', $DATA);
        $this->load->view('layout/footer');
    }

    public function updateSiswa()
    {
        $nis = $this->input->post('nis');
        $nama_siswa = $this->input->post('nama_siswa');
        $id_kelas = $this->input->post('id_kelas');
        $id_jk = $this->input->post('id_jk');
        $ttl = $this->input->post('ttl');
        $number = $this->input->post('number');
        $password = $this->input->post('password');

        $data_siswa = $this->M_siswa->getDataSiswaByNIS($nis);
        if ($data_siswa) {
            $id_kelas = ($id_kelas) ? $id_kelas : $data_siswa->id_kelas;
            $id_jk = ($id_jk) ? $id_jk : $data_siswa->id_jk;

            $DataUpdate = array(
                'nis' => $nis,
                'nama_siswa' => $nama_siswa,
                'id_kelas' => $id_kelas,
                'id_jk' => $id_jk,
                'ttl' => $ttl,
                'number' => $number,
                'password' => $password
            );

            $this->M_siswa->UpdateDataSiswa($DataUpdate, $nis);

            // Menampilkan pesan toastr jika berhasil edit
            $this->session->set_flashdata('successupdate', 'Data siswa berhasil diperbarui.');
        } else {
            // Data siswa tidak ditemukan, tampilkan pesan toastr error
            $this->session->set_flashdata('errorupdate', 'Gagal mengedit data siswa.');
        }

        redirect(base_url('siswa/'));
    }


    public function delete($nis)
    {
        $data_siswa = $this->M_siswa->getDataSiswaByNIS($nis);

        if ($data_siswa) {
            $this->M_siswa->DeleteDataSiswa($nis);
            $this->session->set_flashdata('successdelete', 'Data siswa berhasil dihapus.');
        } else {
            $this->session->set_flashdata('errordelete', 'Data siswa tidak ditemukan.');
        }

        redirect(base_url('siswa/'));
    }


    public function form()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('formabsen');
        $this->load->view('layout/footer');
    }
    public function waktu()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('datasiswa/waktu');
        $this->load->view('layout/footer');
    }
}
