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

		return $this->response->json($data);
	}

	public function getHurufSifat($id)
	{
		$sifat = $this->Sifat_model->getSifatByIdHuruf($id);
		$data = ($sifat) ? $this->pack($sifat,200) : $this->pack(false,404,"Not Found Huruf ID should be h01-h29");
		
		return $this->response->json($data);
	}

	public function getSifatGroup($no)
	{
		$group = $this->Sifat_model->getGroup($no);
		$data = ($group) ? $this->pack($group) : $this->pack(false,404,"Not Found, Group number should be 1-13");
		return  $this->response->json($data); 
	}
}



?>
