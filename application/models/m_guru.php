<?php

class M_guru extends CI_Model
{
	public function getDataGuru()
	{
		$this->db
			->select('tbl_guru.*', 'jenis_kelamin.jk')
			->from('tbl_guru', 'jenis_kelamin')
			->join('jenis_kelamin', 'jenis_kelamin.id_jk = tbl_guru.id_jk');
		$query = $this->db->get();
		return $query->result();
	}

	public function InsertDataGuru($data)
	{
		$this->db->insert('tbl_guru', $data);
	}

	public function UpdateDataGuru($data, $id)
	{
		$this->db->where('id_guru', $id);
		$this->db->update('tbl_guru', $data);
	}

	public function getDataGuruDetail($id)
	{
		$this->db->where('id_guru', $id);
		$query = $this->db->get('tbl_guru');
		return $query->row();
	}

	public function DeleteDataGuru($id)
	{
		$this->db->where('id_guru', $id);
		$this->db->delete('tbl_guru');
	}
	public function getdataguru1()
	{
		$this->db->select('RIGHT(tbl_guru.id_guru,5) as id_guru', FALSE);
		$this->db->order_by('id_guru', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_guru');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->id_guru) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
		$kodetampil = "G" . $batas;
		return $kodetampil;
	}
}
