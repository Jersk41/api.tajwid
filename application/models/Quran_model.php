<?php
class Quran_model extends CI_Model
{
	protected $table = "quran_text";

	public function __construct() {
		parent::__construct();
	}

	public function findAyat($ayah)
	{
		// var_dump($ayah);
		$dbquran = $this->load->database('quran',true);
		$indexQuran = $dbquran->select('*')
								->from('quran_text')
								->like('text',$ayah)
								->get()
								->result_array();
		return $indexQuran;
	}
}



?>
