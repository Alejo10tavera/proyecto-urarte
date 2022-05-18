<?php 

/*=============================================
Trater texto para eventos
=============================================*/

$sectionEvents = CurlController::dataTemplates("index_section_eight");
$dataSectionEvents = json_decode($sectionEvents[0]->text_template,true);


/*=============================================
Traer todos los eventos
=============================================*/
$select = "*";
$url = CurlController::api()."events?linkTo=process_event&equalTo=1&linkTo_=status_event&equalTo_=1&orderBy=id_event&orderMode=DESC&startAt=0&endAt=3&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$events = CurlController::request($url, $method, $fields, $header)->results;
$detailsEvent = json_decode($events[0]->details_event,true);
$venueEvent = json_decode($events[0]->venue_event,true);


?>

<section class="section events"><img class="events__bg" src="<?php echo $backoffice ?>views/img/template/events_bg.png" alt="<?php echo $organization[0]->name_organization ?>"/>
	<div class="container">
		<div class="row margin-bottom">
			<div class="col-12">
				<div class="heading heading--primary heading--center"><span class="heading__pre-title">Eventos</span>
					<h2 class="heading__title"><span><?php echo $dataSectionEvents[0]["title"] ?></span></h2>
					<p class="no-margin-bottom"><?php echo $dataSectionEvents[0]["description"] ?></p>
				</div>
			</div>
		</div>
		<div class="row">

			<?php 

				foreach ($events as $key => $value) {
					
					echo '<div class="col-md-6 col-lg-4">
							<div class="event-item">
								<div class="event-item__img"><img class="img--bg" src="'.$backoffice.'views/img/events/post/'.$value->image_event.'" alt="'.$value->name_event.'"/></div>
								<div class="event-item__content">
									<h6 class="event-item__title"><a href="'.$value->route_event.'">'.$value->name_event.'</a></h6>

									<p><b>'.$venueEvent[1]["city"].',</b> '.$venueEvent[0]["address"].'</p>


									<p><b>'.$detailsEvent[0]["start"].' - '.$detailsEvent[0]["time"].'</p>
									<p><b>'.$detailsEvent[1]["finish"].' - '.$detailsEvent[1]["time"].'</p>

								</div>
							</div>
						</div>';

				}

			?>
			
		</div>
		<div class="row">
			<div class="col-12 text-center"><a class="button button--primary" href="events">Ver más</a></div>
		</div>
	</div>
</section>