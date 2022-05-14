<?php 

class GetController{

	/*=============================================
	Peticiones GET sin filtro
	=============================================*/

	public function getData($table, $orderBy, $orderMode, $startAt, $endAt, $select){

		$response = GetModel::getData($table, $orderBy, $orderMode, $startAt, $endAt, $select);

		$return = new GetController();
		$return -> fncResponse($response, "getData");

	}

	/*=============================================
	Peticiones GET con filtro
	=============================================*/

	public function getFilterData($table, $linkTo, $equalTo, $linkTo_, $equalTo_, $orderBy, $orderMode, $startAt, $endAt, $select){

		$response = GetModel::getFilterData($table, $linkTo, $equalTo, $linkTo_, $equalTo_, $orderBy, $orderMode, $startAt, $endAt, $select);

		$return = new GetController();
		$return -> fncResponse($response, "getFilterData");

	}

	/*=============================================
	Peticiones GET tablas relacionadas sin filtro
	=============================================*/

	public function getRelData($rel, $type, $orderBy, $orderMode, $startAt, $endAt, $select){

		$response = GetModel::getRelData($rel, $type, $orderBy, $orderMode, $startAt, $endAt, $select);

		$return = new GetController();
		$return -> fncResponse($response, "getRelData");

	}

	/*=============================================
	Peticiones GET tablas relacionadas con filtro
	=============================================*/

	public function getRelFilterData($rel, $type, $linkTo, $equalTo, $linkTo_, $equalTo_, $orderBy, $orderMode, $startAt, $endAt, $select){

		$response = GetModel::getRelFilterData($rel, $type, $linkTo, $equalTo, $linkTo_, $equalTo_, $orderBy, $orderMode, $startAt, $endAt, $select);

		$return = new GetController();
		$return -> fncResponse($response, "getRelFilterData");

	}

	/*=============================================
	Peticiones GET para el buscador
	=============================================*/

	public function getSearchData($table, $linkTo, $linkTo_, $equalTo_, $search, $orderBy, $orderMode, $startAt, $endAt, $select){

		$response = GetModel::getSearchData($table, $linkTo, $linkTo_, $equalTo_, $search, $orderBy, $orderMode, $startAt, $endAt, $select);

		$return = new GetController();
		$return -> fncResponse($response, "getFilterData");

	}

	/*=============================================
	Peticiones GET para el buscador entre tablas relacionadas
	=============================================*/

	public function getSearchRelData($rel, $type, $linkTo, $linkTo_, $equalTo_, $search, $orderBy, $orderMode, $startAt, $endAt, $select){

		$response = GetModel::getSearchRelData($rel, $type, $linkTo, $linkTo_, $equalTo_, $search, $orderBy, $orderMode, $startAt, $endAt, $select);

		$return = new GetController();
		$return -> fncResponse($response, "getSearchRelData");

	}

	/*=============================================
	Respuestas del controlador
	=============================================*/

	public function fncResponse($response, $method){

		if(!empty($response)){

			$json = array(
				'status' => 200,
				'total' => count($response),
				"results" => $response
			);

		}else{

			$json = array(
				'status' => 404,
				"results" => "Not Found",
				'method' => $method
			);

		}

		echo json_encode($json, http_response_code($json["status"]));

		return;

	}

}
