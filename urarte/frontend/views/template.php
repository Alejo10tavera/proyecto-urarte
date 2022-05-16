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

					/*Slider*/
					include "modules/pages/index/sliders.php";

					/*Seccion 1 - Acerca de*/
					include "modules/pages/index/section_one.php";

					/*Categorias*/
					include "modules/pages/index/categories.php";

					/*Proyectos recien agregados*/
					include "modules/pages/index/project_recent.php";

					/*Proyectos mas vistos*/
					include "modules/pages/index/project_views.php";

					/*Seccion 2 - Proyecto de vida*/
					include "modules/pages/index/section_two.php";

					/*Proyectos mas viejos*/
					include "modules/pages/index/project_old.php";

					/*Seccion 3 - Voluntario y donador*/
					include "modules/pages/index/section_three.php";

					/*Testimonios*/
					include "modules/pages/index/testimonials.php";

					/*blog*/
					include "modules/pages/index/blog.php";

					/*Fundadores*/
					include "modules/pages/index/parents.php";

					/*Imagen al pie de pagina*/
					include "modules/structure/img_footer.php";

				?>

			</main>

			<!-- footer front_3 start-->
			<?php include "modules/structure/footer.php"; ?>
			<!-- footer front_3 end-->
		</div>
		<!-- libs-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="views/js/libs.min.js"></script>
		<!-- scripts-->
		<script src="views/js/common.min.js"></script>
		<?php include "complement/svg.php" ?>
	</body>
</html>