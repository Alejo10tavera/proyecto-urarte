<?php 

class TemplateController{

	/*=============================================
	Traemos la Vista Principal de la plantilla
	=============================================*/

	public function index(){

		include "views/template.php";

	}

	/*=============================================
	Ruta Principal o Dominio del sitio
	=============================================*/

	static public function path(){

		return "http://urarte.com/";

	}

	/*=============================================
	Ruta BackOffice o Dominio administrativo del sitio
	=============================================*/

	static public function backoffice(){

		return "http://urarte.backoffice.com/";

	}


}