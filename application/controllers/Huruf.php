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
			return $this->response
			->withAddedHeader('Access-Control-Allow-Origin', '*')
			->withAddedHeader('X-Frame-Options', 'deny')	
			->json($data);
		} catch (\Throwable $th) {
			redirect("/errors");
		}
	}

	protected function getDetailsByHija($param){
		$data = [];
		$hijaiyah = "/ا|يْ|وْ|ء|ه|ع|ح|غ|خ|ق|ك|ج|ش|ي|ض|ل|ن|ر|ت|ط|د|س|ز|ص|ظ|ذ|ث|ف|م|و|ب/";
		if (is_array($param)) {
			foreach ($param as $h) {
				if(preg_match($hijaiyah,$h,$match)){
					$huruf = $this->Huruf_model->getHurufByHija($match[0]);
					$data[] = $this->pack($huruf,200);
				}
			}
		}else {
			if(preg_match($hijaiyah,$param,$match)){
				$huruf = $this->Huruf_model->getHurufByHija($match[0]);
				$data = $this->pack($huruf,200);
			}else {
				$data = $this->pack(false,404,"Not Found, Parameter should be h01-h29");
			}
		}
		return $data;
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
			return $this->response
			->withAddedHeader('Access-Control-Allow-Origin', '*')
			->withAddedHeader('X-Frame-Options', 'deny')	
			->json($data);			
		} catch (\Throwable $th) {
			redirect("/errors");
		}
	}

	public function showByHija()
	{
		try {
			$param = $this->request->getBodyParams();
			$data = $this->getDetailsByHija($param['huruf']);
			return $this->response
			->withAddedHeader('Access-Control-Allow-Origin', '*')
			->withAddedHeader('X-Frame-Options', 'deny')	
			->json($data);			
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
			return $this->response
			->withAddedHeader('Access-Control-Allow-Origin', '*')
			->withAddedHeader('X-Frame-Options', 'deny')	
			->json($data);		
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
			return $this->response
			->withAddedHeader('Access-Control-Allow-Origin', '*')
			->withAddedHeader('X-Frame-Options', 'deny')	
			->json($data);		
		} catch (\Throwable $th) {
			redirect("/errors");
		}
	}
}



?>
