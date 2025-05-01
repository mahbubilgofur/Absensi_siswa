<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('PHPExcel.php');

class Excel extends PHPExcel
{

	public function __construct()
	{
		parent::__construct();
	}
	public function import_excel()
	{

		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 6; $row <= $highestRow; $row++) {
					$nis = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nama_siswa = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$id_kelas = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$id_jk = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$ttl = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$number = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$password = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

					$DataUpdate = array(
						'nis' => $nis,
						'nama_siswa' => $nama_siswa,
						'id_kelas' => $id_kelas,
						'id_jk' => $id_jk,
						'ttl' => $ttl,
						'number' => $number,
						'password' => $password
					);
				}
			}
			$this->load->model('tbl_siswa');
			$insert = $this->M_siswa->insert($DataUpdate);
			if ($insert) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}
}
