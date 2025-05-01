<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelalamat extends CI_Model
{
    function getdataalamat()
    {
        $query = $this->db->get('alamat');
        return $query->result();
    }
    function insertDataalamat($data)
    {
        $this->db->insert('alamat', $data);
    }
    function getDataalamatdetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('alamat');
        return $query->row();
    }
    function updateDataalamat($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('alamat', $data);
    }
}
