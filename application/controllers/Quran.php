<?php
class Quran extends yidas\rest\Controller
{
	protected $quran;
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Quran_model');
	}

	public function find()
	{
		$param = $this->request->getBodyParams();
		$ayat = $this->Quran_model->findAyat($param['keyword']);
		// var_dump($ayat);
		$data = (!empty($ayat)) ? $this->pack($ayat,200) : $this->pack("We can't find that, try another ayah",404,"Not Found");
		return $this->response->json($data);
	}
}
?>
