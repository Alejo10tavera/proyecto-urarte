<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

	/*=============================================
	Función para mayúscula inicial
	=============================================*/

	static public function capitalize($value){

		$text = str_replace("_", " ", $value);

		return ucwords($text);
		
	}

	/*================================================================
	=            Funcion para enviar correos electronicos            =
	================================================================*/
	
	static public function sendEmail($name, $subject, $email, $message, $url){

		date_default_timezone_set("America/Bogota");

		$mail = new PHPMailer;

		$mail->Charset = "UTF-8";

		$mail->isMail();

		$mail->setFrom("urarte@urarte.com", "Soporte urarte");

		$mail->Subject = "Hi ".$name." - ".$subject;

		$mail->addAddress($email);

		$mail->msgHTML(' 

			<div>

				Hi, '.$name.':

				<p>'.$message.'</p>

				<a href="'.$url.'">Click aquí para más información</a>

				If you didn’t ask to verify this address, you can ignore this email.

				Thanks,

				Your Urarte Team

			</div>

		');

		$send = $mail->Send();

		if(!$send){

			return $mail->ErrorInfo;	

		}else{

			return "ok";

		}

	}
	
	/*=====  End of Funcion para enviar correos electronicos  ======*/
	

}