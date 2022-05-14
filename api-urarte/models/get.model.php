<?php 

require_once "connection.php";

class GetModel{

	/*=============================================
	Peticiones GET sin filtro
	=============================================*/

	static public function getData($table, $orderBy, $orderMode, $startAt, $endAt, $select){
	
		if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $table ORDER BY $orderBy $orderMode");

		}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $table ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
		}else{

			$stmt = Connection::connect()->prepare("SELECT $select FROM $table");

		}

		$stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);

	}

	/*=============================================
	Peticiones GET con filtro
	=============================================*/

	static public function getFilterData($table, $linkTo, $equalTo, $linkTo_, $equalTo_, $orderBy, $orderMode, $startAt, $endAt, $select){

		if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $table WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode");
		
		}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $table WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
		}else{

			$stmt = Connection::connect()->prepare("SELECT $select FROM $table WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_");

		}

		$stmt -> bindParam(":".$linkTo, $equalTo, PDO::PARAM_STR);
		$stmt -> bindParam(":".$linkTo_, $equalTo_, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);

	}

	/*=============================================
	Peticiones GET tablas relacionadas sin filtro
	=============================================*/

	static public function getRelData($rel, $type, $orderBy, $orderMode, $startAt, $endAt, $select){

		$relArray = explode(",", $rel);
		$typeArray = explode(",", $type);

		/*=============================================
		Relacionar 2 tablas
		=============================================*/

		if(count($relArray) == 2 && count($typeArray) == 2){

			$on1 = $relArray[0].".id_".$typeArray[1]."_".$typeArray[0]; 
			$on2 = $relArray[1].".id_".$typeArray[1];

			if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1 = $on2 ORDER BY $orderBy $orderMode");

			}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1 = $on2 ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
			}else{

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1 = $on2");

			}

		}

		/*=============================================
		Relacionar 3 tablas
		=============================================*/

		if(count($relArray) == 3 && count($typeArray) == 3){

			$on1a = $relArray[0].".id_".$typeArray[1]."_".$typeArray[0]; 
			$on1b = $relArray[1].".id_".$typeArray[1];

			$on2a = $relArray[0].".id_".$typeArray[2]."_".$typeArray[0]; 
			$on2b = $relArray[2].".id_".$typeArray[2];

			if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b ORDER BY $orderBy $orderMode");

			}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
			}else{

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b");

			}

		}

		/*=============================================
		Relacionar 4 tablas
		=============================================*/

		if(count($relArray) == 4 && count($typeArray) == 4){

			$on1a = $relArray[0].".id_".$typeArray[1]."_".$typeArray[0]; 
			$on1b = $relArray[1].".id_".$typeArray[1];

			$on2a = $relArray[0].".id_".$typeArray[2]."_".$typeArray[0]; 
			$on2b = $relArray[2].".id_".$typeArray[2];

			$on3a = $relArray[0].".id_".$typeArray[3]."_".$typeArray[0]; 
			$on3b = $relArray[3].".id_".$typeArray[3];

			if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b INNER JOIN $relArray[3] ON $on3a = $on3b ORDER BY $orderBy $orderMode");

			}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b INNER JOIN $relArray[3] ON $on3a = $on3b ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
			}else{

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b INNER JOIN $relArray[3] ON $on3a = $on3b");

			}

		}

		$stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		
	}

	/*=============================================
	Peticiones GET tablas relacionadas con filtro
	=============================================*/

	static public function getRelFilterData($rel, $type, $linkTo, $equalTo, $linkTo_, $equalTo_, $orderBy, $orderMode, $startAt, $endAt, $select){

		$relArray = explode(",", $rel);
		$typeArray = explode(",", $type);

		/*=============================================
		Relacionar 2 tablas
		=============================================*/

		if(count($relArray) == 2 && count($typeArray) == 2){

			$on1 = $relArray[0].".id_".$typeArray[1]."_".$typeArray[0]; 
			$on2 = $relArray[1].".id_".$typeArray[1];

			if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1 = $on2 WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode");

			}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1 = $on2 WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
			}else{

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1 = $on2 WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_");

			}			

		}

		/*=============================================
		Relacionar 3 tablas
		=============================================*/

		if(count($relArray) == 3 && count($typeArray) == 3){

			$on1a = $relArray[0].".id_".$typeArray[1]."_".$typeArray[0]; 
			$on1b = $relArray[1].".id_".$typeArray[1];

			$on2a = $relArray[0].".id_".$typeArray[2]."_".$typeArray[0]; 
			$on2b = $relArray[2].".id_".$typeArray[2];

			if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode");

			}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
			}else{

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_");

			}

		}

		/*=============================================
		Relacionar 4 tablas
		=============================================*/

		if(count($relArray) == 4 && count($typeArray) == 4){

			$on1a = $relArray[0].".id_".$typeArray[1]."_".$typeArray[0]; 
			$on1b = $relArray[1].".id_".$typeArray[1];

			$on2a = $relArray[0].".id_".$typeArray[2]."_".$typeArray[0]; 
			$on2b = $relArray[2].".id_".$typeArray[2];

			$on3a = $relArray[0].".id_".$typeArray[3]."_".$typeArray[0]; 
			$on3b = $relArray[3].".id_".$typeArray[3];

			if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b INNER JOIN $relArray[3] ON $on3a = $on3b WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode");

			}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b INNER JOIN $relArray[3] ON $on3a = $on3b WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
			}else{

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b INNER JOIN $relArray[3] ON $on3a = $on3b WHERE $linkTo = :$linkTo AND $linkTo_ = :$linkTo_");

			}

		}

		$stmt -> bindParam(":".$linkTo, $equalTo, PDO::PARAM_STR);
		$stmt -> bindParam(":".$linkTo_, $equalTo_, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		
	}

	/*=============================================
	Peticiones GET para el buscador
	=============================================*/

	static public function getSearchData($table, $linkTo, $linkTo_, $equalTo_, $search, $orderBy, $orderMode, $startAt, $endAt, $select){

		if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $table WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode");

		}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $table WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
		}else{

			$stmt = Connection::connect()->prepare("SELECT $select FROM $table WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_");

		}

		$stmt -> bindParam(":".$linkTo_, $equalTo_, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);

	}

	/*=============================================
	Peticiones GET  para el buscador entre tablas relacionadas
	=============================================*/

	static public function getSearchRelData($rel, $type, $linkTo, $linkTo_, $equalTo_, $search, $orderBy, $orderMode, $startAt, $endAt, $select){

		$relArray = explode(",", $rel);
		$typeArray = explode(",", $type);

		/*=============================================
		Relacionar 2 tablas
		=============================================*/

		if(count($relArray) == 2 && count($typeArray) == 2){

			$on1 = $relArray[0].".id_".$typeArray[1]."_".$typeArray[0]; 
			$on2 = $relArray[1].".id_".$typeArray[1];

			if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1 = $on2 WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode");

			}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1 = $on2 WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
			}else{

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1 = $on2 WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_");

			}			

		}

		/*=============================================
		Relacionar 3 tablas
		=============================================*/

		if(count($relArray) == 3 && count($typeArray) == 3){

			$on1a = $relArray[0].".id_".$typeArray[1]."_".$typeArray[0]; 
			$on1b = $relArray[1].".id_".$typeArray[1];

			$on2a = $relArray[0].".id_".$typeArray[2]."_".$typeArray[0]; 
			$on2b = $relArray[2].".id_".$typeArray[2];

			if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode");

			}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

			$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
			}else{

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_");

			}

		}

		/*=============================================
		Relacionar 4 tablas
		=============================================*/

		if(count($relArray) == 4 && count($typeArray) == 4){

			$on1a = $relArray[0].".id_".$typeArray[1]."_".$typeArray[0]; 
			$on1b = $relArray[1].".id_".$typeArray[1];

			$on2a = $relArray[0].".id_".$typeArray[2]."_".$typeArray[0]; 
			$on2b = $relArray[2].".id_".$typeArray[2];

			$on3a = $relArray[0].".id_".$typeArray[3]."_".$typeArray[0]; 
			$on3b = $relArray[3].".id_".$typeArray[3];

			if($orderBy != null && $orderMode != null && $startAt == null && $endAt == null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b INNER JOIN $relArray[3] ON $on3a = $on3b WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode");

			}else if($orderBy != null && $orderMode != null && $startAt != null && $endAt != null){

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b INNER JOIN $relArray[3] ON $on3a = $on3b WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_ ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt");
		
			}else{

				$stmt = Connection::connect()->prepare("SELECT $select FROM $relArray[0] INNER JOIN $relArray[1] ON $on1a = $on1b INNER JOIN $relArray[2] ON $on2a = $on2b INNER JOIN $relArray[3] ON $on3a = $on3b WHERE $linkTo LIKE '%$search%' AND $linkTo_ = :$linkTo_");

			}

		}

		$stmt -> bindParam(":".$linkTo_, $equalTo_, PDO::PARAM_STR);

		$stmt_ = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$return = new GetController();

		$stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		
	}

}