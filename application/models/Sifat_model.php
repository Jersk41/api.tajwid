<?php
class Sifat_model extends CI_Model
{
	protected $table = "sifat";

	public function getAll($limit = null)
	{
		return $this->db->get($this->table)->result_array();
	}

	public function getGroup($id)
	{
		$i = $id-1;
		$sifatGroup = [
			["ا","ذ","ز","ع","و","ي"],
			["ث","س","ش","ح","ه"],
			["ج","د","ء"],
			["ت","ك"],
			["ب"],
			["ض","ظ"],
			["ص"],
			["خ"],
			["ف"],
			["ط"],
			["ق"],
			["غ"],
			["ل","ن","م","ر"],
		];
		$result = $this->db->select("sifat.nama_sifat")
					->from("sifat")
					->join('relasi_sifat_huruf',"relasi_sifat_huruf.sifat=sifat.id_sifat")
					->join('huruf','relasi_sifat_huruf.huruf=huruf.id_huruf')
					->where_in("huruf.hijaiyah",$sifatGroup[$i])
					->distinct()
					->get()
					->result_array();
		$sifat = [];
		foreach ($result as $k => $val) {
			$sifat[] = $val['nama_sifat'];
		}
		$data = [
			'group_no'=> (int)$id,
			'huruf' => $sifatGroup[$i],
			'sifat' => $sifat,
		];
		return $data;
	}

}

?>
