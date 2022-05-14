<?php 

class CurlController{

	/*=============================================
	Ruta API
	=============================================*/	

	static public function api(){

		return "http://api.urarte.com/";

	}

	/*=============================================
	Peticiones a la API
	=============================================*/	

	static public function request($url, $method, $fields, $header){

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_POSTFIELDS => $fields,
			CURLOPT_HTTPHEADER => $header
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$response = json_decode($response);

		return $response;

	}

	/*=============================================
	Traer los datos del template
	=============================================*/

	static public function dataTemplates($code){

		$select = "text_template,html_template";
		$url = CurlController::api()."templates?linkTo=code_template&equalTo=".$code."&linkTo_=bdelete_template&equalTo_=0&select=".$select;
		$method = "GET";
		$fields = array();
		$header = array();

		$dataResponse = CurlController::request($url, $method, $fields, $header)->results;
		
		return $dataResponse;

	}


}