<?php 

/*=============================================
Traer los proyectos mas vistos
=============================================*/
$select = "logo_project,name_project,route_project,headline_project,status_project,id_category,color_category,name_category";
$url = CurlController::api()."relations?rel=projects,categories&type=project,category&linkTo=process_project&equalTo=2&linkTo_=bdelete_project&equalTo_=0&orderBy=views_project&orderMode=ASC&startAt=0&endAt=5&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$projectsViews = CurlController::request($url, $method, $fields, $header)->results;

?>

<?php if ($projectsViews != "Not Found"): ?>

	<div class="container-fluid preloadTrue">

		<div class="container">

			<div class="row">
	            <div class="col-12 col-sm-4">

	                <div class="ph-item border-0">
	                    <div class="ph-col-12">
	                        <div class="ph-picture"></div>
	                        <div class="ph-row">
	                            <div class="ph-col-4"></div>
	                            <div class="ph-col-8 empty"></div>
	                            <div class="ph-col-12"></div>
	                            <div class="ph-col-12"></div>
	                        </div>
	                    </div>
	                </div>

	            </div>
	            <div class="col-12 col-sm-4">

	                <div class="ph-item border-0">
	                    <div class="ph-col-12">
	                        <div class="ph-picture"></div>
	                        <div class="ph-row">
	                            <div class="ph-col-4"></div>
	                            <div class="ph-col-8 empty"></div>
	                            <div class="ph-col-12"></div>
	                            <div class="ph-col-12"></div>
	                        </div>
	                    </div>
	                    
	                </div>

	            </div>
	            <div class="col-12 col-sm-4">

	                <div class="ph-item border-0">
	                    <div class="ph-col-12">
	                        <div class="ph-picture"></div>
	                        <div class="ph-row">
	                            <div class="ph-col-4"></div>
	                            <div class="ph-col-8 empty"></div>
	                            <div class="ph-col-12"></div>
	                            <div class="ph-col-12"></div>
	                        </div>
	                    </div>
	                    
	                </div>

	            </div>
	        </div>

		</div>
		
	</div>

	<section class="section preloadFalse">
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

					if($value->status_project != 0){
					
						echo '<div class="projects-slider__item">
							<div class="projects-masonry__item projects-masonry__item--primary projects-masonry__item--height-2">
								<div class="projects-masonry__img"><img class="img--bg" style="filter: brightness(40%)" src="'.$backoffice.'views/img/projects/'.$value->id_category.'/logo/'.$value->logo_project.'" alt="'.$value->name_project.'"/>
									<div class="projects-masonry__inner"><span class="projects-masonry__badge" style="background: '.$value->color_category.';">'.TemplateController::capitalize(strtolower($value->name_category)).'</span>
										<h3 class="projects-masonry__title"> <a href="'.$path.$value->route_project.'">'.TemplateController::capitalize(strtolower($value->name_project)).'</a></h3>
										<p>'.$value->headline_project.'</p>
										
									</div>
								</div>
							</div>
						</div>';

					}

				}

			?>

		</div>
			
	</section>


<?php endif ?>