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
		$data = ($sifat) ? $this->pack($sifat,200) : $this->pack("ID Huruf seharusnya dari h01 sampai h29",404,"Not Found");
		
		return $this->response->json($data);
	}
}



?>
