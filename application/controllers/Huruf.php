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
			$data = (isset($huruf)) ? $this->pack($huruf,200) : $this->pack("ID Huruf seharusnya dari h01 sampai h29",404,"Not Found");	
			return $this->response->json($data);			
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}

	public function findMakhroj($id)
	{
		try {
			$makroj = $this->Huruf_model->getMakhrojByIdHuruf($id);
			$data = (isset($makroj)) ? $this->pack($makroj) : $this->pack("ID Makhroj sebaiknya dari m1 sampai m17");
			return $this->response->json($data);		
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}

	public function findSifat($id)
	{
		try {
			$sifat = $this->Huruf_model->getSifatByIdHuruf($id);
			$data = (isset($sifat)) ? $this->pack($sifat) : $this->pack("ID Makhroj sebaiknya dari m1 sampai m17");
			return $this->response->json($data);		
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}
}



?>
