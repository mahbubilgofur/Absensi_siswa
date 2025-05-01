<?php

class M_siswa extends CI_Model
{

	public function insert($data)
	{
		$insert = $this->db->insert_batch('tbl_siswa', $data);
		if ($insert) {
			return true;
		}
	}

	// public function getDataSiswa3()
	// {
	// 	$query = $this->db->query("SELECT tbl_siswa.*, tbl_kelas.nama_kelas, jenis_kelamin.jk, COUNT(data_absen.keterangan) as total,
	//     SUM(IF(data_absen.keterangan='s',1,0)) as sakit,
	//     SUM(IF(data_absen.keterangan='i',1,0)) as ijin,
	//     SUM(IF(data_absen.keterangan='h',1,0)) as hadir,
	//     SUM(IF(data_absen.keterangan='t',1,0)) as terlambat
	//     FROM tbl_siswa
	//     JOIN tbl_kelas ON tbl_kelas.id_kelas = tbl_siswa.id_kelas
	//     JOIN jenis_kelamin ON jenis_kelamin.id_jk = tbl_siswa.id_jk
	//     JOIN data_absen ON tbl_siswa.nis = data_absen.nis
	//     GROUP BY tbl_siswa.nis
	//     ORDER BY tbl_siswa.nis ASC");

	// 	return $query->result();
	// }
	public function getDataSiswa3()
	{
		$query = $this->db->query("SELECT tbl_siswa.*, tbl_kelas.nama_kelas, jenis_kelamin.jk, COUNT(data_absen.keterangan) as total,
        SUM(IF(data_absen.keterangan='s',1,0)) as sakit,
        SUM(IF(data_absen.keterangan='i',1,0)) as ijin,
        SUM(IF(data_absen.keterangan='h',1,0)) as hadir,
        SUM(IF(data_absen.keterangan='t',1,0)) as terlambat,
        GROUP_CONCAT(data_absen.tgl_absen) as tgl_absen
        FROM tbl_siswa
        JOIN tbl_kelas ON tbl_kelas.id_kelas = tbl_siswa.id_kelas
        JOIN jenis_kelamin ON jenis_kelamin.id_jk = tbl_siswa.id_jk
        JOIN data_absen ON tbl_siswa.nis = data_absen.nis
        GROUP BY tbl_siswa.nis
        ORDER BY tbl_siswa.nis ASC");

		$result = $query->result();

		// Periksa data siswa dan tambahkan informasi alpa
		date_default_timezone_set("Asia/Jakarta");
		$tanggal_hari_ini = date("Y-m-d");
		$querySkedule = $this->db->query("SELECT * FROM tbl_skedule WHERE tgl_thn = '$tanggal_hari_ini'");
		$skedul = $querySkedule->row();
		$isHariLibur = ($skedul !== null);

		foreach ($result as $siswa) {
			$tanggal_absen = explode(",", $siswa->tgl_absen);

			// Jika hari ini adalah hari libur, abaikan pengecekan absen dan tandai siswa tidak "alpa"
			if ($isHariLibur) {
				$siswa->alpa = false;
			} else {
				// Jika siswa tidak absen hari ini, atau dalam tanggal libur, tandai sebagai "alpa"
				if (!in_array($tanggal_hari_ini, $tanggal_absen)) {
					$siswa->alpa = true;
				} else {
					$siswa->alpa = false;
				}
			}
		}

		return $result;
	}

	// Model: M_siswa.php

	public function getDataSiswa2($startdate, $enddate, $nis = null, $kelas = null)
	{
		// Query untuk mengambil data siswa berdasarkan periode, nis, dan kelas
		$this->db->select('tbl_siswa.*, tbl_kelas.nama_kelas, jenis_kelamin.jk, COUNT(data_absen.keterangan) as total,
            SUM(IF(data_absen.keterangan="s",1,0)) as sakit,
            SUM(IF(data_absen.keterangan="i",1,0)) as ijin,
            SUM(IF(data_absen.keterangan="h",1,0)) as hadir,
            SUM(IF(data_absen.keterangan="t",1,0)) as terlambat,
            GROUP_CONCAT(data_absen.tgl_absen) as tgl_absen
        ');
		$this->db->from('tbl_siswa');
		$this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas');
		$this->db->join('jenis_kelamin', 'jenis_kelamin.id_jk = tbl_siswa.id_jk');
		$this->db->join('data_absen', 'tbl_siswa.nis = data_absen.nis', 'left');

		// Lakukan filtering berdasarkan nis, kelas, dan periode
		if (!empty($nis)) {
			$this->db->where('tbl_siswa.nis', $nis);
		}

		if (!empty($kelas)) {
			$this->db->where('tbl_kelas.nama_kelas', $kelas);
		}

		if (!empty($startdate) && !empty($enddate)) {
			$this->db->where('data_absen.tgl_absen >=', $startdate);
			$this->db->where('data_absen.tgl_absen <=', $enddate);
		}

		$this->db->group_by('tbl_siswa.nis');
		$this->db->order_by('tbl_siswa.nis ASC');

		$query = $this->db->get();
		$result = $query->result();

		// Periksa data siswa dan tambahkan informasi alpa
		$tanggal_hari_ini = date("Y-m-d");
		$querySkedule = $this->db->query("SELECT * FROM tbl_skedule WHERE tgl_thn = ?", array($tanggal_hari_ini));
		$skedul = $querySkedule->row();
		$isHariLibur = ($skedul !== null);


		foreach ($result as $siswa) {
			// Check if tgl_absen is not null before using explode
			$tanggal_absen = ($siswa->tgl_absen !== null) ? explode(",", $siswa->tgl_absen) : [];

			// Jika hari ini adalah hari libur, abaikan pengecekan absen dan tandai siswa tidak "alpa"
			if ($isHariLibur) {
				$siswa->alpa = false;
			} else {
				// Jika siswa tidak absen hari ini, atau dalam tanggal libur, tandai sebagai "alpa"
				if (!in_array($tanggal_hari_ini, $tanggal_absen)) {
					$siswa->alpa = true;
				} else {
					$siswa->alpa = false;
				}
			}
		}

		return $result;
	}

	public function getListKelas()
	{
		$query = $this->db->select('nama_kelas')->get('tbl_kelas');
		return $query->result();
	}


	// public function getDataSiswa2($startdate, $enddate, $nis = null)
	// {
	// 	$query = $this->db->query("SELECT tbl_siswa.nis, tbl_siswa.nama_siswa, tbl_siswa.id_kelas, tbl_kelas.nama_kelas, jenis_kelamin.jk,
	// 		COUNT(data_absen.keterangan) as total,
	// 		SUM(IF(data_absen.keterangan='s',1,0)) as sakit,
	// 		SUM(IF(data_absen.keterangan='i',1,0)) as ijin,
	// 		SUM(IF(data_absen.keterangan='h',1,0)) as hadir,
	// 		SUM(IF(data_absen.keterangan='t',1,0)) as terlambat
	// 		FROM tbl_siswa
	// 		JOIN tbl_kelas ON tbl_kelas.id_kelas = tbl_siswa.id_kelas
	// 		JOIN jenis_kelamin ON jenis_kelamin.id_jk = tbl_siswa.id_jk
	// 		JOIN data_absen ON tbl_siswa.nis = data_absen.nis
	// 		WHERE data_absen.tgl_absen BETWEEN '$startdate' AND '$enddate'
	// 		" . ($nis ? "AND tbl_siswa.nis = '$nis'" : "") . "
	// 		GROUP BY tbl_siswa.nis
	// 		ORDER BY tbl_siswa.nis ASC");

	// 	return $query->result();
	// }



	public function getDataSiswa()
	{
		$this->db
			->select('tbl_siswa.*, tbl_kelas.nama_kelas, jenis_kelamin.jk')
			->from('tbl_siswa')
			->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas')
			->join('jenis_kelamin', 'jenis_kelamin.id_jk = tbl_siswa.id_jk');

		$query = $this->db->get();
		return $query->result();
	}



	// public function InsertDataSiswa($data)
	// {
	// 	$this->db->insert('tbl_siswa', $data);
	// }
	public function InsertDataSiswa($data)
	{
		// Perform the database insertion operation
		$result = $this->db->insert('tbl_siswa', $data);

		// Return the result of the insertion operation
		return $result;
	}


	public function UpdateDataSiswa($data, $id)
	{
		$this->db->where('nis', $id);
		$this->db->update('tbl_siswa', $data);
	}

	public function getDataSiswaDetail($id)
	{
		$this->db->where('nis', $id);
		$query = $this->db->get('tbl_siswa');
		return $query->row();
	}

	public function DeleteDataSiswa($id)
	{
		$this->db->where('nis', $id);
		$this->db->delete('tbl_siswa');
	}
	public function getdatasiswa1()
	{
		$this->db->select('RIGHT(tbl_siswa.nis,5) as nis', FALSE);
		$this->db->order_by('nis', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_siswa');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->nis) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
		$kodetampil = "S" . $batas;
		return $kodetampil;
	}
	public function get_siswa_by_nis($nis)
	{
		$query = $this->db->query("SELECT * FROM tbl_siswa WHERE BINARY nis = '$nis'");
		return $query->num_rows();
	}

	// public function join($table,$tbljoin,$join)
	// {
	// 	$this->db->join($tbljoin,$join);
	// 	return $this->db->get($table);
	// }
	public function getDataSiswaByNIS($nis)
	{
		$this->db->where('nis', $nis);
		$query = $this->db->get('tbl_siswa');
		return $query->row();
	}
}
