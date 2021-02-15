<?php
class Sifat extends yidas\rest\Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Sifat_model');
	}

	public function index()
	{
		$sifat = $this->Sifat_model->getAll();
		$data = $this->pack($sifat,200);
		return $this->response
		->withAddedHeader('Access-Control-Allow-Origin', '*')
		->withAddedHeader('X-Frame-Options', 'deny')
		->json($data);
	}

	public function getSifatGroup($no)
	{
		try {
			if ($no >= 1 && $no <= 13) {
				$group = $this->Sifat_model->getGroup($no);
				$data = $this->pack($group);
			}else {
				$data = $this->pack(false,404,"Not Found, Group number should be 1-13");
			}
			return  $this->response
			->withAddedHeader('Access-Control-Allow-Origin', '*')
			->withAddedHeader('X-Frame-Options', 'deny')	
			->json($data); 
		} catch (\Throwable $th) {
			redirect("/errors");
		}
	}
}



?>
