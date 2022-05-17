<?php 

/*=============================================
Traer los proyectos mas vistos
=============================================*/
$select = "logo_project,name_project,route_project,headline_project,id_category,color_category,name_category";
$url = CurlController::api()."relations?rel=projects,categories&type=project,category&linkTo=status_project&equalTo=1&linkTo_=bdelete_project&equalTo_=0&orderBy=views_project&orderMode=ASC&startAt=0&endAt=5&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$projectsViews = CurlController::request($url, $method, $fields, $header)->results;


?>

<section class="section">
	<div class="container">
		<div class="row align-items-end margin-bottom">
			<div class="col-sm-6">
				<div class="heading heading--primary">
					<h2 class="heading__title no-margin-bottom"><span>Proyectos</span> <span>más vistos</span></h2>
				</div>
			</div>
			<div class="col-sm-6 text-sm-right">
				<!-- slider nav start-->
				<div class="slider__nav projects-slider__nav">
					<div class="slider__arrows">
						<div class="slider__prev"><i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="slider__next"><i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
				<!-- slider nav end-->
			</div>
		</div>

	</div>
	<div class="projects-slider">

		<?php 

			foreach ($projectsViews as $key => $value) {
				
				echo '<div class="projects-slider__item">
						<div class="projects-masonry__item projects-masonry__item--primary projects-masonry__item--height-2">
							<div class="projects-masonry__img"><img class="img--bg" style="filter: brightness(40%)" src="'.$backoffice.'views/img/projects/'.$value->id_category.'/logo/'.$value->logo_project.'" alt="'.$value->name_project.'"/>
								<div class="projects-masonry__inner"><span class="projects-masonry__badge" style="background: '.$value->color_category.';">'.$value->name_category.'</span>
									<h3 class="projects-masonry__title"> <a href="'.$value->route_project.'">'.$value->name_project.'</a></h3>
									<p>'.$value->headline_project.'</p>
									
								</div>
							</div>
						</div>
					</div>';

			}

		?>

	</div>
		
</section>