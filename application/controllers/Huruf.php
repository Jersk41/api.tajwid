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
			redirect("/errors");
		}
	}

	public function showDetails($id)
	{
		try {
			$regex = "/h[012][0-9]$/";
			if(preg_match($regex,$id,$match)){
				$huruf = $this->Huruf_model->getHurufById($match[0]);
				$data = $this->pack($huruf,200);
			}else {
				$data = $this->pack(false,404,"Not Found, Parameter should be h01-h29");
			}
			return $this->response->json($data);			
		} catch (\Throwable $th) {
			redirect("/errors");
		}
	}

	public function findMakhroj($id)
	{
		try {
			$regex = "/h[012][0-9]$/";
			if(preg_match($regex,$id,$match)){
				$makroj = $this->Huruf_model->getMakhrojByIdHuruf($id);
				$data = $this->pack($makroj);
			}else{
				$data = $this->pack(false,404,"Not Found, Parameter should be h01-h31 (2 more is huruf mad)");
			}
			return $this->response->json($data);		
		} catch (\Throwable $th) {
			redirect("/errors");
		}
	}

	public function findSifat($id)
	{
		try {
			$regex = "/h[012][0-9]$/";
			if(preg_match($regex,$id,$match)){
				$sifat = $this->Huruf_model->getSifatByIdHuruf($id);
				$data = $this->pack($sifat);
			}else{
				$data = $this->pack(false,404,"Not Found, Parameter should be h01-h29");
			}
			return $this->response->json($data);		
		} catch (\Throwable $th) {
			redirect("/errors");
		}
	}
}



?>
