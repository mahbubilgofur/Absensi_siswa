<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelabsen extends CI_Model
{

    function getdataabsen()
    {
        $this->db->select('data_absen.*, tbl_siswa.nama_siswa, tbl_siswa.id_kelas, tbl_kelas.nama_kelas');
        $this->db->from('data_absen');
        $this->db->join('tbl_siswa', 'data_absen.nis = tbl_siswa.nis');
        $this->db->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas'); // Add the join for the class table
        $this->db->order_by('tgl_absen', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getdataabsen1()
    {
        $this->db->select('RIGHT(data_absen.id,5) as id', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('data_absen');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodetampil = "0" . $batas;
        return $kodetampil;
    }

    function insertDataabsen($data)
    {
        $this->db->insert('data_absen', $data);
    }
    function getDataabsendetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('data_absen');
        return $query->row();
    }
    function updateDataabsen($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('data_absen', $data);
    }
    public function DeleteDataAbsen($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_absen');
    }
    public function updateAbsen($nis, $tgl_absen, $jam_pulang, $startdate, $enddate)
    {
        $data = array(
            'jam_pulang' => $jam_pulang
        );
        $this->db->where('tgl_absen >=', $startdate[1]);
        $this->db->where('tgl_absen <=', $enddate[1]);
        // $this->db->where('nis'   , $nis);
        // $this->db->where('tgl_absen', $tgl_absen);
        $this->db->update('data_absen', $data);
        return $this->db->affected_rows();
    }
}
