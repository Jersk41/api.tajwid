<?php
class Makhroj extends yidas\rest\Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Makhroj_model');
	}

	public function index()
	{
		try {
			$makroj = $this->Makhroj_model->getAll();
			$data = $this->pack($makroj,200);
			return $this->response->json($data);
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}

	public function show($id)
	{
		try {
			$regex = "/m[1][0-7]$|m[0-9]$/";
			if (preg_match($regex,$id,$match)) {
				$makroj = $this->Makhroj_model->getMakhrojById($match[0]);
				$data = $this->pack($makroj,200);				
			}else {
				$data = $this->pack(false,404,"Not Found, Parameter should be m1-m17");
			}
			return $this->response->json($data);
		} catch (\Throwable $th) {
			redirect("/errors");
		}
	}

	public function groups($groupName)
	{
		try {
			$makhroj = $this->Makhroj_model->getMakhrojGroup($groupName);
			$data = ($makhroj) ? $this->pack($makhroj,200) : $this->pack(false,404,"Not Found, Parameter should be between these values Al-Jauf, Al-Halaq, Al-Lisan, dan Al-Khoisyum");
			return $this->response->json($data);			
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}
}



?>
