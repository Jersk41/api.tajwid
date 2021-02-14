<?php
class Huruf extends yidas\rest\Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Huruf_model');
		$this->load->model('Sifat_model');
	}

	public function index()
	{
		try {
			$huruf = $this->Huruf_model->getAll();
			$data = $this->pack($huruf,200);
			return $this->response->json($data);
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}

	public function showDetails($id)
	{
		try {
			$huruf = $this->Huruf_model->getHurufById($id);
			$data = ($huruf) ? $this->pack($huruf,200) : $this->pack(false,404,"Not Found, Parameter should be h01-h29");	
			return $this->response->json($data);			
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}

	public function findMakhroj($id)
	{
		try {
			$makroj = $this->Huruf_model->getMakhrojByIdHuruf($id);
			$data = ($makroj) ? $this->pack($makroj) : $this->pack(false,404,"Not Found, Parameter should be h01-h31 (2 more is huruf mad)");
			return $this->response->json($data);		
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}

	public function findSifat($id)
	{
		try {
			$sifat = $this->Huruf_model->getSifatByIdHuruf($id);
			$data = ($sifat) ? $this->pack($sifat) : $this->pack(false,404,"Not Found, Parameter should be h01-h29");
			return $this->response->json($data);		
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}
}



?>
