<?php 

class UsersController{

	/*============================================
	=            Registro de usuarios            =
	============================================*/
	
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
					"method_user" => "direct",
					"status_user" => 1,
					"bdelete_user" => 0

				);

				$header = array(

				   "Content-Type" =>"application/x-www-form-urlencoded"

				);

				$register = CurlController::request($url, $method, $fields, $header);
				
				if($register->status == 200){

					$name = $displayname;
					$subject = "Verify your account";
					$email = $email;
					$message = "We must verify your account so that you can enter our Marketplace";
					$url = TemplateController::path()."account&login&".base64_encode($email);

					$sendEmail = TemplateController::sendEmail($name, $subject, $email, $message, $url);

					if($sendEmail == "ok"){

						echo '<div class="alert alert-success">Registered user successfully, confirm your account in your email (check spam)</div>

						<script>

							fncFormatInputs()

						</script>';

					}else{

						echo '<div class="alert alert-danger">'.$sendEmail.'</div>

						<script>

							fncFormatInputs()

						</script>';	

					}

				}

			}else{

				echo '<div class="alert alert--error alert--transparent">
						Error en la sintaxis de los campos.<span class="alert__close">
							<svg class="icon">
								<use xlink:href="#close"></use>
							</svg></span>
					</div>

				<script>

					fncFormatInputs()

				</script>';

			}

		}

	}
	
	/*=====  End of Registro de usuarios  ======*/

	/*=========================================
	=            Login de usuarios            =
	=========================================*/
	
	public function ctrLogin(){

		if(isset($_POST["loginEmail"])){

			/*=============================================
			Validamos la sintaxis de los campos
			=============================================*/	

			if(preg_match('/^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["loginEmail"]) &&
			   preg_match('/^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}$/', $_POST["loginPassword"])
			){

				$url = CurlController::api()."users?login=true";
				$method = "POST";
				$fields = array(

					"email_user" => $_POST["loginEmail"],
					"password_user" => $_POST["loginPassword"]

				);

				$header = array(

				   "Content-Type" =>"application/x-www-form-urlencoded"

				);

				$login = CurlController::request($url, $method, $fields, $header);
												
				if($login->status == 200){

					if($login->results[0]->verification_user == 1){

						echo '<div class="alert alert-info">verified.</div>';

					}else{

						echo '<div class="alert alert--error alert--transparent">
								Tu cuenta aun no ha sido verificada, revisa tu correo electrónico.<span class="alert__close">
									<svg class="icon">
										<use xlink:href="#close"></use>
									</svg></span>
							</div>';

					}

				}else{

					echo '<div class="alert alert--error alert--transparent">
							'.$login->results.'<span class="alert__close">
								<svg class="icon">
									<use xlink:href="#close"></use>
								</svg></span>
						</div>';

				}

			}else{

				echo '<div class="alert alert--error alert--transparent">
						Error en la sintaxis de los campos.<span class="alert__close">
							<svg class="icon">
								<use xlink:href="#close"></use>
							</svg></span>
					</div>

				<script>

					fncFormatInputs()

				</script>';

			}

		}

	}

	
	/*=====  End of Login de usuarios  ======*/
	

}