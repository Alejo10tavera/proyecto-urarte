<?php 

class UsersController{

	/*=============================================
	Registro de usuarios
	=============================================*/	

	static public function ctrRegister(){

		if(isset($_POST["regEmail"])){

			/*=============================================
			Validamos la sintaxis de los campos
			=============================================*/	

			if(preg_match('/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/', $_POST["regFirstName"]) &&
			   preg_match('/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/', $_POST["regLastName"]) &&
			   preg_match('/^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
			   preg_match('/^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}$/', $_POST["regPassword"])){

			   	$displayname = TemplateController::capitalize(strtolower($_POST["regFirstName"]))." ".TemplateController::capitalize(strtolower($_POST["regLastName"]));
				$username = strtolower(explode("@",$_POST["regEmail"])[0]);
				$email =  strtolower($_POST["regEmail"]);

				$url = CurlController::api()."users?register=true";
				$method = "POST";
				$fields = array(

					"rol_user" => "default",
					"displayname_user" => $displayname,
					"username_user" => $username,
					"email_user" => $email,
					"password_user" => $_POST["regPassword"],
					"method_user" => "direct"

				);

				$header = array(

				   "Content-Type" =>"application/x-www-form-urlencoded"

				);

				$register = CurlController::request($url, $method, $fields, $header);
				echo '<pre>'; print_r($register); echo '</pre>';

			}else{

				echo '<div class="alert alert--error alert--transparent">
									Error en la sintaxis de los campos.<span class="alert__close">
										<svg class="icon">
											<use xlink:href="#close"></use>
										</svg></span>
								</div>

				<script>

					fncFormatInputs()

				</script>

				';

			}

		}

	}

}