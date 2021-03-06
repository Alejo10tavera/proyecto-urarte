<?php 

/*=============================================
Traer los proyectos recien agregados
=============================================*/
$select = "logo_project,name_project,route_project,headline_project,social_project,status_project,id_category,name_category,color_category";
$url = CurlController::api()."relations?rel=projects,categories&type=project,category&linkTo=process_project&equalTo=2&linkTo_=bdelete_project&equalTo_=0&orderBy=id_project&orderMode=DESC&startAt=0&endAt=5&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$projectsRecent = CurlController::request($url, $method, $fields, $header)->results;


?>

<?php if ($projectsRecent != "Not Found"): ?>

	<?php 

		$projectsRecentSocial = json_decode($projectsRecent[0]->social_project,true);

	?>

	<div class="container-fluid preloadTrue">

		<div class="container">

			<div class="ph-item border-0">

			    <div class="ph-col-6">
			        <div class="ph-picture"></div>
			    </div>

			    <div>
			        <div class="ph-row">
			            <div class="ph-col-6"></div>
			            <div class="ph-col-6 empty"></div>
			            <div class="ph-col-2"></div>
			            <div class="ph-col-10 empty"></div>
			            <div class="ph-col-8"></div>
			            <div class="ph-col-4 empty"></div>
			            <div class="ph-col-12 big"></div>
			        </div>
			    </div>

			</div>

		</div>

	</div>

	
	<section class="section causes background--brown preloadFalse"><img class="causes__bg" src="<?php echo $backoffice ?>views/img/template/causes_img.png" alt="<?php echo $organization[0]->name_organization ?>"/>
		<div class="container">
			<div class="row align-items-start margin-bottom">

				<div class="col-12">
					<div class="heading heading--primary"><span class="heading__pre-title">Lo que hacemos</span>
						<h2 class="heading__title"><span>Proyectos</span> <span>recientes</span></h2>
					</div>
				</div>						
			</div>
			<div class="row offset-margin">
				<div class="col-12">
					<div class="items-slider-wrapper">
						<div class="items-slider">

							<?php 

								foreach ($projectsRecent as $key => $value) {

									if($value->status_project != 0){

										echo '<div class="items-slider__item">
											<div class="causes-item causes-item--style-3 causes-item--slider no-padding">
												<div class="causes-item__body">
													<div class="row align-items-center">
														<div class="col-xl-8">
															<div class="causes-item__img">
																<!-- slider nav start-->
																<div class="slider__nav items-slider__nav">
																	<div class="slider__arrows">
																		<div class="slider__prev"><i class="fa fa-chevron-left" aria-hidden="true"></i>
																		</div>
																		<div class="slider__next"><i class="fa fa-chevron-right" aria-hidden="true"></i>
																		</div>
																	</div>
																</div>
																
																<img class="img--bg" src="'.$backoffice.'views/img/projects/'.$value->id_category.'/logo/'.$value->logo_project.'" alt="'.$value->name_project.'"/>
															</div>
														</div>
														<div class="col-xl-4">
															<div class="causes-item__wrapper">
																<div class="causes-item__action">
																	<div class="causes-item__badge" style="background-color: '.$value->color_category.';">'.TemplateController::capitalize(strtolower($value->name_category)).'</div>
																</div>
																<div class="causes-item__top">
																	<h6 class="causes-item__title"> <a href="'.$path.$value->route_project.'">'.TemplateController::capitalize(strtolower($value->name_project)).'</a></h6>
																	<p>'.$value->headline_project.'</p>
																</div>
																<div class="causes-item__lower">
																	<ul class="aside-socials">';

																		foreach ($projectsRecentSocial as $key => $value_) {

																			if($value_['status'] != 0){

																				echo '<li class="aside-socials__item"><a class="aside-socials__link" href="'.$value_["url"].'" target="_blank"><i class="fa '.$value_["red"].'" aria-hidden="true"></i></a></li>';

																			}
																			
																		}
																		
																	echo '</ul>
																	<div class="causes-item__details-holder">
																		<div class="causes-item__details-item"><a class="causes-item__button button button--primary" href="'.$path.$value->route_project.'">Ver m??s</a></div>
																	</div>

																	
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>';
									
									}
										
								}

							?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif ?>