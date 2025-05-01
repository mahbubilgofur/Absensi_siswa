<?php

class M_kelas extends CI_Model
{
	public function getDataKelas()
	{
		$this->db->select('*');
		$this->db->from('tbl_kelas');
		$query = $this->db->get();
		return $query->result();
	}

	public function InsertDataKelas($data)
	{
		$this->db->insert('tbl_kelas', $data);
	}

	public function UpdateDataKelas($data, $id_kelas)
	{
		$this->db->where('id_kelas', $id_kelas);
		$this->db->update('tbl_kelas', $data);
	}

	public function getDataKelasDetail($id_kelas)
	{
		$this->db->where('id_kelas', $id_kelas);
		$query = $this->db->get('tbl_kelas');
		return $query->row();
	}

	public function DeleteDataKelas($id_kelas)
	{
		$this->db->where('id_kelas', $id_kelas);
		$this->db->delete('tbl_kelas');
	}
}
