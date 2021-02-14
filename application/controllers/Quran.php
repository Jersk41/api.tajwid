<?php
class Quran extends yidas\rest\Controller
{
	protected $quran;
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Quran_model');
	}

	public function find()
	{
		$param = $this->request->getBodyParams();
		$ayat = $this->Quran_model->findAyat($param['keyword']);
		if (isset($param['tajwid'])&&$param['tajwid']==true) {
			foreach ($ayat as $data) {
				$index = $data['index'];
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => "http://api.alquran.cloud/ayah/$index/quran-tajweed",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => 'UTF-8',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'GET',
					CURLOPT_HTTPHEADER => array(
						'Cookie: __cfduid=dfd0d83de2d217994c2a159173cc87cd41612881678'
					),
				));
				$response = curl_exec($curl);
				$json = json_decode($response);
				// var_dump($json);
				if(isset($param['parse'])&&$param['parse']==true){
					$parser = new \AlQuranCloud\Tools\Parser\Tajweed();
					$html = $parser->parse($json->data->text);
					$data = $this->pack(["html"=>$html],200);
				}else{
					$data = $this->pack(["tajwid"=>$json]);
				}
				curl_close($curl);
			}
		}else{
			$data = (!empty($ayat)) ? $this->pack($ayat,200) : $this->pack(false,404,"Not Found, We can't find that, try another ayah");
		}
		return $this->response->json($data);
	}
}
?>
