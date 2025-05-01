<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelwilayah extends CI_Model
{
    function getdatawilayah()
    {
        $query = $this->db->get('wilayah');
        return $query->result();
    }
    function insertDatawilayah($data)
    {
        $this->db->insert('wilayah', $data);
    }
    function getDatawilayahdetail($id_wilayah)
    {
        $this->db->where('id_wilayah', $id_wilayah);
        $query = $this->db->get('wilayah');
        return $query->row();
    }
    function updateDatawilayah($id_wilayah, $data)
    {
        $this->db->where('id_wilayah', $id_wilayah);
        $this->db->update('wilayah', $data);
    }
}
