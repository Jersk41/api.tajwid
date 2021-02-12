<?php
class Makhroj_model extends CI_Model
{
	protected $table = "makhroj";

	//ambil semua data
	public function getAll()
	{
		return $this->db->get($this->table)->result_array();
	}

	// ambil makhroj berdasarkan id makhoj
	public function getMakhrojById($id)
	{
		$this->db->where("id_makhroj", $id);
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result_array()[0];
	}

	// ambil makhroj berdasarkan nama
	public function getMakhrojByName($name)
	{
		return $this->db->where('nama',$name)->result_array();
	}

	// ambil makhroj berdasarkan tempat utama
	public function getMakhrojGroup($groupname)
	{
		$query = $this->db->select("*")
			->from($this->table)
			->where("tempat_makhroj",$groupname)
			->get()
			->result_array();
		return $query;
	}
}


?>
