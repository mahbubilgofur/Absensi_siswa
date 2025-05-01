<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Modelteam');
        $this->load->model('Modelalamat');
        $this->load->model('Modelwilayah'); //load model mahasiswa
        $this->load->model('Modelabsen');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $queryALLabsen = $this->Modelabsen->getdataabsen1();
        $queryALLalamat = $this->Modelalamat->getdataalamat();
        $queryALLteam = $this->Modelteam->getdatateam();
        $queryALLwilayah = $this->Modelwilayah->getdatawilayah();
        $data = array('queryALLteam' => $queryALLteam, 'queryALLalamat' => $queryALLalamat, 'queryALLwilayah' => $queryALLwilayah, 'queryALLabsen' => $queryALLabsen);
        $this->load->view('dasboard/header');
        $this->load->view('dasboard/navbar');
        $this->load->view('dasboard/content', $data);
        $this->load->view('dasboard/footer');
    }


    public function absen3()
    {
        $json = file_get_contents('php://input');
        $res = json_decode($json, true);

        $nis = $res["nis"];
        $password = $res["password"];
        $tgl = date("Y-m-d");
        date_default_timezone_set("Asia/Jakarta");
        $jam = date("H:i:s");
        $keterangan = 'h'; //keterangan hadir
        $keteranganT = 't'; //keterangan terlambat 
        $query = $this->db->query("select * from tbl_siswa where binary nis='$nis' and password='$password'");
        $rows = $query->num_rows();

        if ($rows > 0) {
            // Cek jadwal libur hari ini
            $query = $this->db->query("SELECT * FROM tbl_skedule WHERE tgl_thn = '$tgl'");
            $skedul = $query->row();
            if ($skedul) {
                $status = "9"; // Tidak boleh absen karena hari ini adalah hari libur
            } else {
                $query = $this->db->query("select * from data_absen where binary nis='$nis' and tgl_absen='$tgl'");
                $rows = $query->num_rows();

                if ($rows > 0) {
                    if ($jam < '15:30:00') { //belum waktunya untuk absen pulang
                        $status = "5";
                    } elseif ($jam < '17:00:00') { // Masih bisa absen pulang
                        $query = $this->db->query("update data_absen set jam_pulang='$jam' where binary nis='$nis' and tgl_absen='$tgl' and jam_pulang is null");
                        if ($this->db->affected_rows() > 0) {
                            $status = "2"; // Berhasil absen pulang
                        } else {
                            $status = "4"; // Gagal absen pulang
                        }
                    } else { // Sudah melewati batas waktu absen pulang
                        $status = "6";
                    }
                } else {
                    // belum melakukan absensi hari ini
                    if ($jam < '06:00:00') { // jam masuk belum dimulai
                        $status = "7"; // belum waktunya untuk melakukan absensi
                    } elseif ($jam > '07:00:00') { // batas jam masuk telah berakhir
                        $query = $this->db->query("insert into data_absen set nis='$nis', password='$password',keterangan='$keteranganT', tgl_absen='$tgl', jam_masuk='$jam'");
                        if ($this->db->affected_rows() > 0) {
                            $status = "8"; // berhasil melakukan absensi untuk masuk
                        } else {
                            $status = "3"; // gagal melakukan absensi
                        }
                    } else { // waktu absensi masuk
                        $query = $this->db->query("insert into data_absen set nis='$nis', password='$password',keterangan='$keterangan', tgl_absen='$tgl', jam_masuk='$jam'");
                        if ($this->db->affected_rows() > 0) {
                            $status = "1"; // berhasil melakukan absensi untuk masuk
                        } else {
                            $status = "3"; // gagal melakukan absensi
                        }
                    }
                }
            }
        } else {
            $status = "0"; //nis tidak terdaftar
        }

        $data["status"] = $status;
        echo json_encode($data);
    }

    public function sakit()
    {
        // Mengambil data dari FormData()
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');
        $tgl = date("Y-m-d");
        date_default_timezone_set("Asia/Jakarta");
        $jam = date("H:i:s");
        $keterangan2 = 's';
        // Query ke database untuk cek login
        $query = $this->db->query("select * from tbl_siswa where binary nis='$nis' and password='$password'");
        $rows = $query->num_rows();

        if ($rows > 0) {
            // Cek jadwal libur hari ini
            $query = $this->db->query("SELECT * FROM tbl_skedule WHERE tgl_thn = '$tgl'");
            $skedul = $query->row();
            if ($skedul) {
                $status = "6"; // Tidak boleh absen karena hari ini adalah hari libur
            } else {
                $query = $this->db->query("select * from data_absen where binary nis='$nis' and tgl_absen='$tgl'");
                $rows = $query->num_rows();

                if ($rows > 0) {
                    // Sudah absen
                    $status = "5";
                } else {
                    if ($jam < '06:00:00') { // jam masuk belum dimulai
                        $status = "4"; // belum waktunya untuk melakukan absensi
                    } elseif ($jam > '12:00:00') { // batas jam masuk telah berakhir
                        $query = $this->db->query("select * from data_absen where binary nis='$nis' and tgl_absen='$tgl'");
                        $rows = $query->num_rows();
                        $status = "3"; // gagal melakukan absensi masuk
                    } else {
                        // Absen dengan menyertakan file surat ijin
                        $config['upload_path'] = './surat/sakit';
                        $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf|webp';
                        $config['max_size'] = 10000;
                        $config['max_width'] = 10000;
                        $config['max_height'] = 10000;
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('keterangan1')) {
                            $status = "2"; // Gagal upload surat ijin
                        } else {
                            $file_data = $this->upload->data();
                            $keterangan = $file_data['file_name'];
                            $query = $this->db->query("insert into data_absen set nis='$nis', password='$password', tgl_absen='$tgl', keterangan='$keterangan2',jam_masuk='$jam',jam_pulang='$jam'");
                            $status = "1"; // Berhasil absen
                        }
                    }
                }
            }
        } else {
            $status = "0"; //nis tidak terdaftar
        }

        $data["status"] = $status;
        echo json_encode($data);
    }

    public function ijin()
    {
        // Mengambil data dari FormData()
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');
        $tgl = date("Y-m-d");
        date_default_timezone_set("Asia/Jakarta");
        $jam = date("H:i:s");
        $keterangan2 = 'i';
        // Query ke database untuk cek login
        $query = $this->db->query("select * from tbl_siswa where binary nis='$nis' and password='$password'");
        $rows = $query->num_rows();

        if ($rows > 0) {
            // Cek jadwal libur hari ini
            $query = $this->db->query("SELECT * FROM tbl_skedule WHERE tgl_thn = '$tgl'");
            $skedul = $query->row();
            if ($skedul) {
                $status = "6"; // Tidak boleh absen karena hari ini adalah hari libur
            } else {
                $query = $this->db->query("select * from data_absen where binary nis='$nis' and tgl_absen='$tgl'");
                $rows = $query->num_rows();

                if ($rows > 0) {
                    // Sudah absen
                    $status = "5";
                } else {
                    if ($jam < '06:00:00') { // jam masuk belum dimulai
                        $status = "4"; // belum waktunya untuk melakukan absensi
                    } elseif ($jam > '12:00:00') { // batas jam masuk telah berakhir
                        $query = $this->db->query("select * from data_absen where binary nis='$nis' and tgl_absen='$tgl'");
                        $rows = $query->num_rows();
                        $status = "3"; // gagal melakukan absensi masuk
                    } else {
                        // Absen dengan menyertakan file surat ijin
                        $config['upload_path'] = './surat/ijin';
                        $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf|webp';
                        $config['max_size'] = 10000;
                        $config['max_width'] = 10000;
                        $config['max_height'] = 10000;
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('keterangan')) {
                            $status = "2"; // Gagal upload surat ijin
                        } else {
                            $file_data = $this->upload->data();
                            $keterangan = $file_data['file_name'];
                            $query = $this->db->query("insert into data_absen set nis='$nis', password='$password', tgl_absen='$tgl', keterangan='$keterangan2',jam_masuk='$jam',jam_pulang='$jam'");
                            $status = "1"; // Berhasil absen
                        }
                    }
                }
            }
        } else {
            $status = "0"; //nis tidak terdaftar
        }

        $data["status"] = $status;
        echo json_encode($data);
    }
}
