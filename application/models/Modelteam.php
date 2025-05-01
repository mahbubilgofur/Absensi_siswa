<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelteam extends CI_Model
{
    function getdatateam()
    {
        $query = $this->db->get('team');
        return $query->result();
    }
    function insertDatateam($data)
    {
        $this->db->insert('team', $data);
    }
    function getDatateamdetail($id_team)
    {
        $this->db->where('id_team', $id_team);
        $query = $this->db->get('team');
        return $query->row();
    }
    function updateDatateam($id_team, $data)
    {
        $this->db->where('id_team', $id_team);
        $this->db->update('team', $data);
    }
}
