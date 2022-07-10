<?php 

/*=============================================
Traer los proyectos recien agregados
=============================================*/
$select = "logo_project,name_project,route_project,headline_project,social_project,city_project,email_project,phone_project,status_project,id_category,name_category,color_category";
$url = CurlController::api()."relations?rel=projects,categories&type=project,category&linkTo=process_project&equalTo=2&linkTo_=bdelete_project&equalTo_=0&orderBy=id_project&orderMode=ASC&startAt=0&endAt=3&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$projectsOld = CurlController::request($url, $method, $fields, $header)->results;


?>

<?php if ($projectsOld != "Not Found"): ?>

	<?php 

		$projectOldSocial = json_decode($projectsOld[0]->social_project,true);
		
	?>
	
	<div class="container-fluid preloadTrue">

		<?php 

	        $blocks = [0,1];

	    ?>

	    <?php foreach ($blocks as $key => $value): ?>

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
	    	
	    <?php endforeach ?>
		
	</div>

	<section class="section events events--front_2 preloadFalse"><img class="events__bg" src="<?php echo $backoffice ?>views/img/template/events_bg.png" alt="<?php echo $organization[0]->name_organization ?>"/>
		<div class="container">
			<div class="row margin-bottom">
				<div class="col-12">
					<div class="heading heading--primary heading--center"><span class="heading__pre-title">Nuestros</span>
						<h2 class="heading__title"><span>Primeros</span> <span>proyectos</span></h2>
						
					</div>
				</div>
			</div>
			<div class="row">
				<?php 

					foreach ($projectsOld as $key => $value) {

						if($value->status_project != 0){
						
							echo '<div class="col-md-6 col-lg-4">
								<div class="event-item">
									<div class="event-item__img"><img class="img--bg" src="'.$backoffice.'views/img/projects/'.$value->id_category.'/logo/'.$value->logo_project.'" alt="'.$value->name_project.'"/></div>

									<div class="event-item__content">
									
										<h6 class="event-item__title"><a href="'.$path.$value->route_project.'">'.TemplateController::capitalize(strtolower($value->name_project)).'</a></h6>
										<p>'.$value->email_project.'</p>
										<p>'.$value->phone_project.'</p>
										<ul class="aside-socials">';

											foreach ($projectOldSocial as $key => $value_) {

												if($value_['status'] != 0){

													echo '<li class="aside-socials__item"><a class="aside-socials__link" href="'.$value_["url"].'" target="_blank"><i class="fa '.$value_["red"].'" aria-hidden="true"></i></a></li>';

												}
												
											}
											
										echo '</ul>

									</div>
								</div>
							</div>';

						}

					}


				?>
				
			</div>
			<div class="row">
				<div class="col-12 text-center"><a class="button button--primary" href="<?php echo $path ?>projects">Ver más</a></div>
			</div>
		</div>
	</section>

<?php endif ?>