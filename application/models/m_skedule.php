<?php

class M_skedule extends CI_Model
{
    public function getDataSkedule()
    {
        $this->db->select('*');
        $this->db->from('tbl_skedule');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDataSkedule($data)
    {
        $this->db->insert('tbl_skedule', $data);
    }

    public function UpdateDataSkedule($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_skedule', $data);
    }

    public function getDataSkeduleDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_skedule');
        return $query->row();
    }

    public function DeleteDataSkedule($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_skedule');
    }
}
