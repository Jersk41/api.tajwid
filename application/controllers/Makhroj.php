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
			$makroj = $this->Makhroj_model->getMakhrojById($id);
			$data = (!empty($makroj)) ? $this->pack($makroj,200) : $this->pack("ID Makhroj sebaiknya dari m1 sampai m17",404,"Not Found");
			return $this->response->json($data);
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}

	public function groups($groupName)
	{
		try {
			$makhroj = $this->Makhroj_model->getMakhrojGroup($groupName);
			$data = (!empty($makhroj)) ? $this->pack($makhroj,200) : $this->pack("Parameter Tempat keluar seharusnya antara Al-Jauf, Al-Halaq, Al-Lisan, dan Al-Khoisyum",404,"Not Found");
			return $this->response->json($data);			
		} catch (\Throwable $th) {
			return $this->response->json($this->pack($th,404,"Not Found"));
		}
	}
}



?>
