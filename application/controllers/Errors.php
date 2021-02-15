<?php
class Errors extends yidas\rest\Controller
{
	public function index()
	{
		// $this->load->helper('url');
		$this->page_missing();
	}
	public function page_missing()
	{
		$response = $this->pack("Invalid Endpoints or Resources",404,"Not Found");
		return $this->response
		->withAddedHeader('Access-Control-Allow-Origin', '*')
		->withAddedHeader('X-Frame-Options', 'deny')
		->json($response);
	}
}



?>
