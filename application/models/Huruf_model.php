<?php
class Huruf_model extends CI_Model
{
	protected $table = "huruf";

	public function getAll()
	{
		return $this->db->get($this->table)->result_array();
	}

	public function getHurufById($id)
	{
		if(!ereg("/h[012][0-9]/",$id)){
			redirect('/errors');
		};
		// $id = ($num >= 1 && $num <= 29) ? $num : redirect('/errors');
		$huruf = $this->db->select("huruf.id_huruf,huruf.nama_huruf,huruf.hijaiyah,makhroj.nama_makhroj AS makhroj")
							->from($this->table)
							->join("makhroj","makhroj.id_makhroj=huruf.makhroj")
							->where("id_huruf", $id)
							->get()
							->result_array()[0];

		$querySifat = $this->db->select("sifat.nama_sifat")
								->from("relasi_sifat_huruf")
								->join("sifat","sifat.id_sifat=relasi_sifat_huruf.sifat","left")
								->where("huruf",$id)
								->get()
								->result_array();
		
		if ($querySifat) {
			$sifat = [];
			foreach ($querySifat as $q => $val) {
				$sifat[] = $val['nama_sifat'];
			}
			$huruf["sifat"] = $sifat;
			return $huruf;
		}else {
			return false;
		}
	}

	public function getMakhrojByIdHuruf($id)
	{
		$query = $this->db->select('huruf.id_huruf,huruf.nama_huruf,huruf.hijaiyah,makhroj.nama_makhroj,makhroj.tempat_makhroj')
							->from("huruf")
							->join("makhroj","makhroj.id_makhroj=huruf.makhroj")
							->where("id_huruf",$id)
							->get()
							->result_array()[0];
		
		return $query;
	}

	public function getSifatByIdHuruf($id)
	{
		$response['id_huruf'] = $id;
		$query = $this->db->select('sifat.nama_sifat,sifat.deskripsi')
							->from("relasi_sifat_huruf")
							// ->join("relasi_sifat_huruf","relasi_sifat_huruf.huruf=huruf.id_huruf")
							->join("sifat","sifat.id_sifat=relasi_sifat_huruf.sifat")
							->where("huruf",$id)
							->get()
							->result_array();
		$response['sifat'] = $query;
		return $response;
	}
}

?>
