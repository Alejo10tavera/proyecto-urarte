<?php 

/*=============================================
Traer los sliders
=============================================*/
$select = "*";
$url = CurlController::api()."sliders?linkTo=status_slider&equalTo=1&linkTo_=bdelete_slider&equalTo_=0&orderBy=order_slider&orderMode=ASC&startAt=0&endAt=6&select=".$select;
$method = "GET";
$fields = array();
$header = array();

$sliders = CurlController::request($url, $method, $fields, $header)->results;

/*=============================================
Sección video
=============================================*/

$videoSlider = CurlController::dataTemplates("index_section_slider");
$dataVideoSlider = json_decode($videoSlider[0]->text_template,true);

?>

<div class="container-fluid preloadTrue">
    
   <!--  <div class="spinner-border text-muted my-5"></div> -->

   <div class="container">

       <div class="ph-item border-0">

            <div class="ph-col-4">
                
                <div class="ph-row">
                    
                    <div class="ph-col-10"></div>  

                    <div class="ph-col-10 big"></div>  

                    <div class="ph-col-6 big"></div>  

                    <div class="ph-col-6 empty"></div>  

                    <div class="ph-col-6 big"></div> 

                </div>

            </div>

            <div class="ph-col-8">

               <div class="ph-picture"></div> 

            </div>
            
        </div>

    </div>

</div>

<section class="promo promo--front_3 preloadFalse">
	
	<div class="promo-slider">
		<?php 

			foreach ($sliders as $key => $value) {

				switch ($value->type_slider) {

					case 1:
						
						echo '<div class="promo-slider__item promo-slider__item--style-1">
								<picture>
									<source srcset="'.$backoffice.'views/img/slider/'.$value->image_slider.'" media="(min-width: 835px)" style="filter: brightness(50%)"/>
									<source srcset="'.$backoffice.'views/img/slider/'.$value->imagemobile_slider.'" media="(min-width: 376px)" style="filter: brightness(50%)"/><img class="img--bg" src="'.$backoffice.'views/img/slider/'.$value->imagemobile_slider.'" alt="'.$organization[0]->name_organization.'" style="filter: brightness(50%)"/>
								</picture>
								<div class="container">
									<div class="row">
										<div class="col-12">
											<div class="align-container">
												<div class="align-container__item">
													<div class="promo-slider__wrapper-1">
														<h2 class="promo-slider__title"><span>'.$value->title_slider.'</span><br/><span>'.$value->subtitle_slider.'</span></h2>
													</div>
													<div class="promo-slider__wrapper-2">
														<p class="promo-slider__subtitle">'.$value->description_slider.'</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>';

						break;

					case 2:
						
						echo '<div class="promo-slider__item promo-slider__item--style-2">
								<picture>
									<source srcset="'.$backoffice.'views/img/slider/'.$value->image_slider.'" media="(min-width: 835px)" style="filter: brightness(50%)"/>
									<source srcset="'.$backoffice.'views/img/slider/'.$value->imagemobile_slider.'" media="(min-width: 376px)" style="filter: brightness(50%)"/><img class="img--bg" src="'.$backoffice.'views/img/slider/'.$value->imagemobile_slider.'" alt="'.$organization[0]->name_organization.'" style="filter: brightness(50%)"/>
								</picture>
								<div class="container">
									<div class="row">
										<div class="col-xl-7">
											<div class="align-container">
												<div class="align-container__item">
													<div class="promo-slider__wrapper-1">
														<h2 class="promo-slider__title"><span>'.$value->title_slider.'</span><br/><span>'.$value->subtitle_slider.'</span></h2>
													</div>
													<div class="promo-slider__wrapper-2">
														<p class="promo-slider__subtitle">'.$value->description_slider.'</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>';

						break;

					case 3:

						echo '<div class="promo-slider__item promo-slider__item--style-3">
								<picture>
									<source srcset="'.$backoffice.'views/img/slider/'.$value->image_slider.'" media="(min-width: 835px)" style="filter: brightness(50%)"/>
									<source srcset="'.$backoffice.'views/img/slider/'.$value->imagemobile_slider.'" media="(min-width: 376px)" style="filter: brightness(50%)"/><img class="img--bg" src="'.$backoffice.'views/img/slider/'.$value->imagemobile_slider.'" alt="'.$organization[0]->name_organization.'" style="filter: brightness(50%)"/>
								</picture>
								<div class="container">
									<div class="row">
										<div class="col-xl-6 offset-xl-6 text-left">
											<div class="align-container">
												<div class="align-container__item">
													<div class="promo-slider__wrapper-1">
														<h2 class="promo-slider__title"><span>'.$value->title_slider.'</span><br/><span>'.$value->subtitle_slider.'</span></h2>
													</div>
													<div class="promo-slider__wrapper-2">
														<p class="promo-slider__subtitle">'.$value->description_slider.'</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>';

						break;

				}
				
			}

		?>
		
	</div>

	<?php if ($dataVideoSlider[0]["status"] != 0): ?>

		<!-- promo pannel start-->
		<div class="promo-pannel">

			<div class="promo-pannel__video">

				<img class="img--bg" src="<?php echo $backoffice ?>views/img/template/<?php echo $dataVideoSlider[0]["imagen"] ?>" alt="image"/>

				<a class="video-trigger" href="https://www.youtube.com/watch?v=<?php echo $dataVideoSlider[0]["route"] ?>">

					<span>Ver video</span>
					<i class="fa fa-play" aria-hidden="true"></i>

				</a>

			</div>

		</div>
		
	<?php endif ?>

	<!-- slider nav start-->
	<div class="slider__nav slider__nav--promo">

		<div class="promo-slider__count"></div>

		<div class="slider__arrows">

			<div class="slider__prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>

			<div class="slider__next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

		</div>

	</div>

</section>