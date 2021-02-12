<?php
class Resource extends yidas\rest\Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model("Makhroj_model");
	}

	public function index()
	{
		$data = "Api siap";
		
		return $this->response->json($data,200);
	}

	public function makhroj($id)
	{
		
	}
}
?>
