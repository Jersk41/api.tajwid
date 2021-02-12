<?php
class Sifat_model extends CI_Model
{
	protected $table = "sifat";

	public function getAll($limit = null)
	{
		return $this->db->get($this->table)->result_array();
	}

}

?>
