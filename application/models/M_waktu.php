<?php

class M_waktu extends CI_Model
{
    public function getDatawaktu()
    {
        $this->db->select('*');
        $this->db->from('tbl_waktu');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDataWaktu($data)
    {
        $this->db->insert('tbl_waktu', $data);
    }

    public function UpdateDataWaktu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_waktu', $data);
    }

    public function getDataWaktuDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_waktu');
        return $query->row();
    }

    public function DeleteDataWaktu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_waktu');
    }
}
