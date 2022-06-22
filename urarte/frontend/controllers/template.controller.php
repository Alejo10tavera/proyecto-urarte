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
	
	/*=======================================================
	=            Funcion para almacenar imagenes            =
	=======================================================*/
	
	static public function saveImage($image, $folder, $path, $width, $height, $name){

		if(isset($image["tmp_name"]) && !empty($image["tmp_name"])){

			/*=============================================
			Configuramos la ruta del directorio donde se guardará la imagen
			=============================================*/

			$directory = strtolower("views/".$folder."/".$path);

			/*=============================================
			Preguntamos primero si no existe el directorio, para crearlo
			=============================================*/

			if(!file_exists($directory)){

				mkdir($directory, 0755);

			}

			/*=============================================
			Eliminar todos los archivos que existan en ese directorio
			=============================================*/

			$files = glob($directory."/*");

			foreach ($files as $file) {
				
				unlink($file);

			}

			/*=============================================
			Capturar ancho y alto original de la imagen
			=============================================*/

			list($lastWidth, $lastHeight) = getimagesize($image["tmp_name"]);

			/*=============================================
			De acuerdo al tipo de imagen aplicamos las funciones por defecto
			=============================================*/

			if($image["type"] == "image/jpeg"){

				//definimos nombre del archivo
				$newName  = $name.'.jpg';

				//definimos el destino donde queremos guardar el archivo
				$folderPath = $directory.'/'.$newName;

				//Crear una copia de la imagen
				$start = imagecreatefromjpeg($image["tmp_name"]);

				//Instrucciones para aplicar a la imagen definitiva
				$end = imagecreatetruecolor($width, $height);

				imagecopyresized($end, $start, 0, 0, 0, 0, $width, $height, $lastWidth, $lastHeight);

				imagejpeg($end, $folderPath);

			}

			if($image["type"] == "image/png"){

				//definimos nombre del archivo
				$newName  = $name.'.png';

				//definimos el destino donde queremos guardar el archivo
				$folderPath = $directory.'/'.$newName;

				//Crear una copia de la imagen
				$start = imagecreatefrompng($image["tmp_name"]);

				//Instrucciones para aplicar a la imagen definitiva
				$end = imagecreatetruecolor($width, $height);

				imagealphablending($end, FALSE);
				
				imagesavealpha($end, TRUE);	

				imagecopyresampled($end, $start, 0, 0, 0, 0, $width, $height, $lastWidth, $lastHeight);

				imagepng($end, $folderPath);

			}

			return $newName;

		}else{

			return "error";

		}

	}
	
	/*=====  End of Funcion para almacenar imagenes  ======*/
	
}