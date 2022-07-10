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


						echo '<script>

							fncFormatInputs()

							fncSweetAlert("success", "Usuario registrado con éxito, confirme su cuenta en su correo electrónico (revisar spam)", "'.TemplateController::path().'account&login")

						</script>';

					}else{

						echo '<script>

							fncFormatInputs()

							fncSweetAlert("error", "'.$sendEmail.'", "")

						</script>';

					}

				}

			}else{

					echo '<script>

						fncFormatInputs()

						fncSweetAlert("error", "Error en la sintaxis de los campos.", "")

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
			   preg_match('/^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}$/', $_POST["loginPassword"])){

			   	echo '<script>

					fncSweetAlert("loading", "", "");

				</script>';

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

						$_SESSION["user"] = $login->results[0];

						echo '<script>

								fncFormatInputs();

								window.location = "'.TemplateController::path().'account&profile";

							</script>
						';

					}else{

						echo '<script>

								fncSweetAlert("error", "Tu cuenta aun no ha sido verificada, revisa tu correo electrónico.", "")

								fncFormatInputs()

							</script>';

					}

				}else{

					echo '<script>

							fncFormatInputs()

							fncSweetAlert("error", "'.$login->results.'", "")

						</script>';

				}

			}else{

				echo '<script>

					fncFormatInputs()

					fncSweetAlert("error", "Error en la sintaxis de los campos.", "")

				</script>';

			}

		}

	}
	
	/*=====  End of Login de usuarios  ======*/
	
	/*============================================
	=            Recuperar contraseña            =
	============================================*/
	
	public function resetPassword(){

		if(isset($_POST["resetPassword"])){

			/*=============================================
			Validamos la sintaxis de los campos
			=============================================*/	

			if(preg_match('/^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["resetPassword"])){

				/*=============================================
				Preguntamos primero si el usuario está registrado
				=============================================*/	
				$url = CurlController::api()."users?linkTo=email_user&equalTo=".$_POST["resetPassword"]."&linkTo_=status_user&equalTo_=1&select=*";
				$method = "GET";
				$fields = array();
				$header = array();

				$user = CurlController::request($url, $method, $fields, $header);

				if($user->status == 200){

					if($user->results[0]->method_user == "direct"){

						function genPassword($length){

							$password = "";
							$chain = "123456789abcdefghijklmnopqrstuvwxyz";

							$max = strlen($chain)-1;

							for($i = 0; $i < $length; $i++){

								$password .= $chain[mt_rand(0,$max)];

							}

							return $password;

						}

						$newPassword = genPassword(11);
						
						$crypt = crypt($newPassword, '$2a$07$azybxcags23425sdg23sdfhsd$');

						/*=============================================
						Actualizar contraseña en base de datos
						=============================================*/

						$url = CurlController::api()."users?id=".$user->results[0]->id_user."&nameId=id_user&linkTo_=status_user&equalTo_=1&token=no&except=password_user";
						$method = "PUT";
						$fields =  "password_user=".$crypt;
						$header = array();

						$updatePassword = CurlController::request($url, $method, $fields, $header);		

						if($updatePassword->status == 200){	

							/*=============================================
							Enviamos nueva contraseña al correo electrónico
							=============================================*/							
						
							$name = $user->results[0]->displayname_user;
							$subject = "Request new password";
							$email = $user->results[0]->email_user;
							$message = "Your new password is ".$newPassword;
							$url = TemplateController::path()."account&login";

							$sendEmail = TemplateController::sendEmail($name, $subject, $email, $message, $url);

							if($sendEmail == "ok"){

								echo '<script>

										fncFormatInputs();

										fncSweetAlert("success", "Su nueva contraseña ha sido enviada con éxito, por favor revise su bandeja de entrada de correo electrónico.", "");

									</script>';

							}else{

								echo '<script>

										fncFormatInputs();

										fncSweetAlert("error", "'.$sendEmail.'", "")

									</script>';

							}

						}

					}

				}else{

					echo '<script>

							fncFormatInputs();

							fncSweetAlert("error", "Correo no encontrado en la base de datos.", "")

						</script>';
				}

			}else{

				echo '<script>

						fncFormatInputs();

						fncSweetAlert("error", "Error en la sintaxis de los campos.", "")

					</script>';

			}

		}

	}
	
	/*=====  End of Recuperar contraseña  ======*/

	/*==========================================
	=            Cambiar contraseña            =
	==========================================*/
	
	public function changePassword(){

		if(isset($_POST["changePassword"])){

			/*=============================================
			Validamos la sintaxis de los campos
			=============================================*/	

		  	if(preg_match('/^[#\\=\\$\\;\\*\\_\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-Z]{1,}$/', $_POST["changePassword"])){

		  		/*=============================================
				Encriptamos la contraseña
				=============================================*/
				
				$crypt = crypt($_POST["changePassword"], '$2a$07$azybxcags23425sdg23sdfhsd$');

				/*=============================================
				Actualizar contraseña en base de datos
				=============================================*/	

				$url = CurlController::api()."users?id=".$_SESSION["user"]->id_user."&nameId=id_user&linkTo_=status_user&equalTo_=1&token=".$_SESSION["user"]->token_user;
				$method = "PUT";
				$fields =  "password_user=".$crypt;
				$header = array();					

				$updatePassword = CurlController::request($url, $method, $fields, $header);
				
				if($updatePassword->status == 200){	

					/*=============================================
					Enviamos correo informando cambio de contraseña
					=============================================*/							
				
					$name = $_SESSION["user"]->displayname_user;
					$subject = "Change of password";
					$email = $_SESSION["user"]->email_user;
					$message = "You have changed your password";
					$url = TemplateController::path()."account&login";

					$sendEmail = TemplateController::sendEmail($name, $subject, $email, $message, $url);

					if($sendEmail == "ok"){

						echo '<script>

								fncFormatInputs();

								fncSweetAlert("success", "Su contraseña se ha cambiado exitosamente.", "")

							</script>';

					}else{

						echo '<script>

								fncFormatInputs();

								fncSweetAlert("error", "'.$sendEmail.'", "")

							</script>';

					}

				}else{

					if($updatePassword->status == 303){	

						echo '<script>

							fncFormatInputs();

							fncSweetAlert("error", "'.$updatePassword->results.'", "'.TemplateController::path().'account&logout");

						</script>';		


					}else{

						echo '<script>

								fncFormatInputs();

								fncSweetAlert("error", "La contraseña no se actualizó, intente nuevamente", "");

							</script>';

					}

				}

		  	}else{

				echo '<script>

					fncFormatInputs();

						fncSweetAlert("error", "Error en la sintaxis de los campos.", "")

				</script>';	

			}

		}

	}
	
	/*=====  End of Cambiar contraseña  ======*/

}