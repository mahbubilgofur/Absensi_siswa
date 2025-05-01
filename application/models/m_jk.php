<?php

class M_jk extends CI_Model
{
    public function getDatajk()
    {
        $this->db->select('*');
        $this->db->from('jenis_kelamin');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDatajk($data)
    {
        $this->db->insert('jenis_kelamin', $data);
    }

    public function UpdateDatajk($data, $id_jk)
    {
        $this->db->where('id_jk', $id_jk);
        $this->db->update('jenis_kelamin', $data);
    }

    public function getDatajkDetail($id_jk)
    {
        $this->db->where('id_jk', $id_jk);
        $query = $this->db->get('jenis_kelamin');
        return $query->row();
    }

    public function DeleteDatajk($id_jk)
    {
        $this->db->where('id_jk', $id_jk);
        $this->db->delete('jenis_kelamin');
    }
}
