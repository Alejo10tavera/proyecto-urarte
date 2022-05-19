<?php 

/*=============================================
Traer el dominio principal
=============================================*/

$path = TemplateController::path();

/*=============================================
Traer el backoffice dominio principal
=============================================*/

$backoffice = TemplateController::backoffice();

/*=============================================
Traer datos de la empresa
=============================================*/
$select = "*";
$url = CurlController::api()."organizations?linkTo=id_organization&equalTo=1&linkTo_=bdelete_organization&equalTo_=0&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$organization = CurlController::request($url, $method, $fields, $header)->results;

$keywords = json_decode($organization[0]->keywords_organization,true);
$dataSocial = json_decode($organization[0]->social_organization,true);

/*=============================================
Capturar las rutas de la URL
=============================================*/

$routesArray = explode("/", $_SERVER['REQUEST_URI']);

if(!empty(array_filter($routesArray)[1])){

    $urlParams = explode("&", array_filter($routesArray)[1]);   
    
}

if(!empty($urlParams[0])){

	/*=============================================
    Filtrar categorías con el parámetro URL
    =============================================*/

    $url = CurlController::api()."categories?linkTo=route_category&equalTo=".$urlParams[0]."&linkTo_=status_category&equalTo_=1&select=route_category";
    $method = "GET";
    $fields = array();
    $header = array();

    $urlCategories = CurlController::request($url, $method, $fields, $header);
    
    if($urlCategories->status == 404){

    	/*=============================================
	    Filtrar proyectos con el parámetro URL
	    =============================================*/

	    $url = CurlController::api()."projects?linkTo=route_project&equalTo=".$urlParams[0]."&linkTo_=status_project&equalTo_=1&select=route_project";
	    $method = "GET";
	    $fields = array();
	    $header = array();

	    $urlProjects = CurlController::request($url, $method, $fields, $header);
	    
	    if($urlProjects->status == 404){

	    	/*=============================================
		    Filtrar productos con el parámetro URL
		    =============================================*/

		    $url = CurlController::api()."products?linkTo=route_product&equalTo=".$urlParams[0]."&linkTo_=status_product&equalTo_=1&select=route_product";
		    $method = "GET";
		    $fields = array();
		    $header = array();

		    $urlProducts = CurlController::request($url, $method, $fields, $header);
		   
		   	if($urlProducts->status == 404){

		   		/*=============================================
			    Filtrar blog con el parámetro URL
			    =============================================*/

			    $url = CurlController::api()."blogs?linkTo=route_blog&equalTo=".$urlParams[0]."&linkTo_=status_blog&equalTo_=1&select=route_blog";
			    $method = "GET";
			    $fields = array();
			    $header = array();

			    $urlBlogs = CurlController::request($url, $method, $fields, $header);
			    
			    if($urlBlogs->status == 404){

			    	/*=============================================
				    Filtrar equipo con el parámetro URL
				    =============================================*/

				    $url = CurlController::api()."teams?linkTo=route_team&equalTo=".$urlParams[0]."&linkTo_=status_team&equalTo_=1&select=route_team";
				    $method = "GET";
				    $fields = array();
				    $header = array();

				    $urlTeams = CurlController::request($url, $method, $fields, $header);

				    if($urlTeams->status == 404){

				    	/*=============================================
					    Filtrar eventos con el parámetro URL
					    =============================================*/

					    $url = CurlController::api()."events?linkTo=route_event&equalTo=".$urlParams[0]."&linkTo_=status_event&equalTo_=1&select=route_event";
					    $method = "GET";
					    $fields = array();
					    $header = array();

					    $urlEvents = CurlController::request($url, $method, $fields, $header);

					    if($urlEvents->status == 404){

					    	/*=============================================
						    Filtrar paginas con el parámetro URL
						    =============================================*/

						    $url = CurlController::api()."pages?linkTo=route_page&equalTo=".$urlParams[0]."&linkTo_=status_page&equalTo_=1&select=route_page";
						    $method = "GET";
						    $fields = array();
						    $header = array();

						    $urlPages = CurlController::request($url, $method, $fields, $header);

						}

				    }

			    }

		   	}

	    }

    }

}

?>

<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="UTF-8"/>

		<meta name="description" content="<?php echo $organization[0]->description_organization ?>"/>

		<meta name="keywords" content="
			<?php 

				foreach($keywords as $key => $value){

					echo " ".$value;

				}

			?> 
		"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>

		<link rel="shortcut icon" href="<?php echo $backoffice ?>views/img/template/<?php echo $organization[0]->icon_organization ?>"/>

		<title><?php echo $organization[0]->name_organization ?></title>

		<!-- styles-->
		<link rel="stylesheet" href="views/css/styles.min.css"/>

		<!-- web-font loader-->
		<script>
			WebFontConfig = {

				google: {

					families: ['Quicksand:300,400,500,700', 'Permanent+Marker:400'],

				}

			}

			function font() {

				var wf = document.createElement('script')

				wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js'
				wf.type = 'text/javascript'
				wf.async = 'true'

				var s = document.getElementsByTagName('script')[0]

				s.parentNode.insertBefore(wf, s)

			}

			font()
		</script>

	</head>

	<body>

		<div class="page-wrapper">

			<?php 

				/*Menu mobile*/
				include "modules/structure/menu_mobile.php";

				/*Tob bar*/
				include "modules/structure/top_bar.php";

				/*Menu*/
				include "modules/structure/menu.php"

			?>

			<!-- Pagina inicio -->
			<main class="main">

				<?php 

					if(!empty($urlParams[0])){

						if($urlCategories->status == 200){

							/*Mostrar todos los proyectos de una categoria*/
							include "modules/pages/projects/projects.php";

						}else if($urlProjects->status == 200){

							/*Mostrar informacion del proyecto*/
							include "modules/pages/projects/project.php";

						}else if($urlProducts->status == 200){

							/*Mostrar informacion del producto de una tienda*/
							include "modules/pages/products/product.php";

						}else if($urlBlogs->status == 200){

							/*Mostrar informacion del blog*/
							include "modules/pages/blogs/blog.php";

						}else if($urlTeams->status == 200){

							/*Mostrar informacion del miembro del equipo*/
							include "modules/pages/teams/team.php";

						}else if($urlEvents->status == 200){

							/*Mostrar informacion de info evento*/
							include "modules/pages/events/event.php";

						}else if($urlPages->status == 200){

							include "modules/pages/".$urlPages->results[0]->route_page."/".$urlPages->results[0]->route_page.".php";

						}else{

							/*Mostrar informacion cuando no encuentra pagina*/
							include "modules/pages/404/404.php";

						}

					}else{

						include "modules/pages/start/start.php";

					}

					/*Imagen al pie de pagina*/
					include "modules/structure/parents.php";

					
					include "modules/structure/img_footer.php";

				?>

			</main>

			<!-- footer -->
			<?php include "modules/structure/footer.php"; ?>
			
		</div>
		<!-- libs-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="views/js/libs.min.js"></script>
		<!-- scripts-->
		<script src="views/js/common.min.js"></script>
		<?php include "complement/svg.php" ?>
	</body>
</html>