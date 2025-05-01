<?php

class M_user extends CI_Model
{
    public function getDataUser()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDataUser($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    public function UpdateDataUser($data, $id)
    {
        $this->db->where('nis', $id);
        $this->db->update('tbl_user', $data);
    }

    public function getDataUserDetail($id)
    {
        $this->db->where('nis', $id);
        $query = $this->db->get('tbl_user');
        return $query->row();
    }

    public function DeleteDataUser($id)
    {
        $this->db->where('nis', $id);
        $this->db->delete('tbl_user');
    }
    public function get_user_by_email($email)
    {
        return $this->db->where('email', $email)->get('tbl_user')->row();
    }
}
