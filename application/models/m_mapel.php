<?php

class M_mapel extends CI_Model
{
	public function getDataMapel()
	{
		$this->db->select('*');
		$this->db->from('tbl_mapel');
		$query = $this->db->get();
		return $query->result();
	}

	public function InsertDataMapel($data)
	{
		$this->db->insert('tbl_mapel', $data);
	}

	public function UpdateDataMapel($data, $id)
	{
		$this->db->where('kode_mapel', $id);
		$this->db->update('tbl_mapel', $data);
	}

	public function getDataMapelDetail($id)
	{
		$this->db->where('kode_mapel', $id);
		$query = $this->db->get('tbl_mapel');
		return $query->row();
	}

	public function DeleteDataMapel($id)
	{
		$this->db->where('kode_mapel', $id);
		$this->db->delete('tbl_mapel');
	}
}
