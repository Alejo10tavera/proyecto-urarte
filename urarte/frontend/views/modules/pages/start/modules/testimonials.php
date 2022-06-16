<?php 

/*=============================================
Traer todas los testimonios
=============================================*/
$select = "approved_testimony,description_testimony,person_testimony,date_testimony";
$url = CurlController::api()."testimonials?linkTo=status_testimony&equalTo=1&linkTo_=bdelete_testimony&equalTo_=0&orderBy=date_testimony&orderMode=DESC&startAt=0&endAt=6&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$testimonials = CurlController::request($url, $method, $fields, $header)->results;

?>

<div class="container-fluid preloadTrue">

	<div class="container">

		<div class="ph-item border-0">

		    <div class="ph-col-12">
		        <div class="ph-picture"></div>
		        <div class="ph-row">
		            <div class="ph-col-6 big"></div>
		            <div class="ph-col-4 empty big"></div>
		            <div class="ph-col-2 big"></div>
		            <div class="ph-col-4"></div>
		            <div class="ph-col-8 empty"></div>
		        </div>
		    </div>

		</div>

	</div>

</div>

<section class="section testimonials testimonials--style-1 preloadFalse">
	<div class="container">
		<div class="row align-items-end margin-bottom">
			<div class="col-lg-8 col-xl-7 offset-xl-1">
				<div class="heading heading--primary"><span class="heading__pre-title">Testimonios</span>
					<h2 class="heading__title"><span>Lo que dicen</span> <span>sobre nosotros</span></h2>
				</div>
			</div>
			<div class="col-lg-4 col-xl-3">
				<!-- slider nav start-->
				<div class="slider__nav testimonials-style-1__nav">
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
		<div class="row">
			<div class="col-xl-10 offset-xl-1">
				<div class="testimonials-slider testimonials-slider--style-1">
					<?php 

						foreach ($testimonials as $key => $value) {

							if($value->approved_testimony != 0){

								echo '<div class="testimonials-slider__item">
										<div class="testimonials-slider__icon">“</div>
										<div class="testimonials-slider__text">
											<p>'.$value->description_testimony.'</p>
											<div class="testimonials-slider__author"><span class="testimonials-slider__name">'.$value->person_testimony.', </span><span class="testimonials-slider__position">'.$value->date_testimony.'</span></div>
										</div>
									</div>';

							}
							
						}

					?>
				</div>
			</div>
		</div>
	</div>
</section>