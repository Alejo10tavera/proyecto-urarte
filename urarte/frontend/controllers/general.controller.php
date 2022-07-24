<?php 

class GeneralController{

	/*=================================================
	=            Nuevo mensaje de contacto            =
	=================================================*/
	
	static public function ctrNewMessage(){

		if(isset($_POST["contFirstName"])){

			/*=============================================
			Validamos la sintaxis de los campos
			=============================================*/
			if(preg_match('/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/', $_POST["contFirstName"]) &&
			   preg_match('/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/', $_POST["contLastName"]) &&
			   preg_match('/^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["contEmail"]) &&
			   preg_match('/^[-\\(\\)\\0-9 ]{1,}$/', $_POST["contPhone"]) &&
			   preg_match('/^[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}$/', $_POST["contMessage"])){

				$person = TemplateController::capitalize(strtolower($_POST["contFirstName"]))." ".TemplateController::capitalize(strtolower($_POST["contLastName"]));
			   	$email =  strtolower($_POST["contEmail"]);

			   	$url = CurlController::api()."messages?token=no&except=type_message,person_message,email_message,phone_message,content_message,process_message,status_message,bdelete_message,date_add_message";
				$method = "POST";
				$fields = array(

					"type_message" => 1,
					"person_message" => $person,
					"email_message" => $email,
					"phone_message" => $_POST["contPhone"],
					"content_message" => $_POST["contMessage"],
					"process_message" => 0,
					"status_message" => 1,
					"bdelete_message" => 0					

				);

				$header = array(

				   "Content-Type" =>"application/x-www-form-urlencoded"

				);

				$newMessage = CurlController::request($url, $method, $fields, $header);

				if($newMessage->status == 200){

					$name = $person;
					$subject = "solicitud";
					$email = $email;
					$message = "Hemos recibido su solicitud, pronto recibiras una respuesta de nuestra parte. ¡Gracias por contactarnos!";
					$url = TemplateController::path();

					$sendEmail = TemplateController::sendEmail($name, $subject, $email, $message, $url);

					if($sendEmail == "ok"){


						echo '<script>

							fncFormatInputs()

							fncSweetAlert("success", "Su mensaje ha sido registrado con exito.", "'.TemplateController::path().'")

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
	
	/*=====  End of Nuevo mensaje de contacto  ======*/
	

}