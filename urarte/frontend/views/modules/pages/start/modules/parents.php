<?php 

/*=============================================
Traer todas los fundadores
=============================================*/
$select = "image_sponsor,name_sponsor";
$url = CurlController::api()."sponsors?linkTo=status_sponsor&equalTo=1&linkTo_=bdelete_sponsor&equalTo_=0&orderBy=id_sponsor&orderMode=ASC&startAt=0&endAt=6&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$sponsors = CurlController::request($url, $method, $fields, $header)->results;

?>

<section class="section donors donors--style-2 no-padding-top no-padding-bottom">
	<div class="container">
		<div class="row margin-bottom">
			<div class="col-12">
				<div class="heading heading--primary heading--center"><span class="heading__pre-title">Patrocinadores</span>
					<h2 class="heading__title no-margin-bottom"><span>Equipo</span> <span>de ayuda</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- donors slider start-->
				<div class="slider-holder">
					<div class="donors-slider donors-slider--style-1">

						<?php 

							foreach ($sponsors as $key => $value) {
									
								echo '<div class="donors-slider__item">
										<div class="donors-slider__img"><img src="'.$backoffice.'views/img/sponsors/'.$value->image_sponsor.'" alt="'.$value->name_sponsor.'"/></div>
									</div>';

							}

						?>
					</div>
				</div>
				<!-- donors slider end-->
			</div>
		</div>
	</div>
</section>