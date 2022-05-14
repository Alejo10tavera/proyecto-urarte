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

					include "modules/pages/index/categories.php";


				?>

				<!-- section start-->
				
				<!-- section end-->
				<!-- causes start-->
				<section class="section causes background--brown"><img class="causes__bg" src="<?php echo $backoffice ?>views/img/template/causes_img.png" alt="img"/>
					<div class="container">
						<div class="row align-items-start margin-bottom">

							<div class="col-12">
								<div class="heading heading--primary"><span class="heading__pre-title">What we Do</span>
									<h2 class="heading__title"><span>Helpo</span> <span>Causes</span></h2>
								</div>
							</div>						
						</div>
						<div class="row offset-margin">
							<div class="col-12">
								<div class="items-slider-wrapper">
									<div class="items-slider">
										<div class="items-slider__item">
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
																<!-- slider nav end--><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0001/logo/1.jpg" alt="img"/>
															</div>
														</div>
														<div class="col-xl-4">
															<div class="causes-item__wrapper">
																<div class="causes-item__action">
																	<div class="causes-item__badge" style="background-color: #49C2DF">Water Delivery</div>
																</div>
																<div class="causes-item__top">
																	<h6 class="causes-item__title"> <a href="cause-details.html">Clean Water in Africa</a></h6>
																	<p>Sharksucker sea toad candiru rocket danio tilefish stingray deepwater stingray Sacramento splittail canthigaster rostrata. </p>
																</div>
																<div class="causes-item__lower">
																	<div class="progress-bar">
																		<div class="progress-bar__inner" style="width: 78%;">
																			<div class="progress-bar__value">78%</div>
																		</div>
																	</div>
																	<div class="causes-item__details-holder">
																		<div class="causes-item__details-item"><span>Goal: </span><span>25 000$</span></div>
																		<div class="causes-item__details-item text-right"><span>Pledged: </span><span>20 350$</span></div>
																	</div><a class="causes-item__button button button--primary" href="#">+ Donate</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="items-slider__item">
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
																<!-- slider nav end--><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0001/logo/2.jpg" alt="img"/>
															</div>
														</div>
														<div class="col-xl-4">
															<div class="causes-item__wrapper">
																<div class="causes-item__action">
																	<div class="causes-item__badge" style="background-color: #F36F8F">Medicine</div>
																</div>
																<div class="causes-item__top">
																	<h6 class="causes-item__title"> <a href="cause-details.html">Health in other Countries</a></h6>
																	<p>Sea chub demoiselle whalefish zebra lionfish mud cat pelican eel. Minnow snoek icefish velvet-belly shark, California halibut round stingray northern sea robin.</p>
																</div>
																<div class="causes-item__lower">
																	<div class="progress-bar">
																		<div class="progress-bar__inner" style="width: 23%;">
																			<div class="progress-bar__value">23%</div>
																		</div>
																	</div>
																	<div class="causes-item__details-holder">
																		<div class="causes-item__details-item"><span>Goal: </span><span>14 000$</span></div>
																		<div class="causes-item__details-item text-right"><span>Pledged: </span><span>6 098$</span></div>
																	</div>
																</div><a class="causes-item__button button button--primary" href="#">+ Donate</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- causes end-->
				<!-- section start-->
				<section class="section">
					<div class="container">
						<div class="row align-items-end margin-bottom">
							<div class="col-sm-6">
								<div class="heading heading--primary"><span class="heading__pre-title">What we Did</span>
									<h2 class="heading__title no-margin-bottom"><span>Helpo</span> <span>Projects</span></h2>
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
						<div class="projects-slider__item">
							<div class="projects-masonry__item projects-masonry__item--primary projects-masonry__item--height-2">
								<div class="projects-masonry__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0002/logo/1.jpg" alt="img"/>
									<div class="projects-masonry__inner"><span class="projects-masonry__badge" style="background: #F36F8F;">Medicine</span>
										<h3 class="projects-masonry__title"> <a href="cause-details.html">More than One Life Changed</a></h3>
										<p>Rockweed gunnel; candlefish mail-cheeked fish, yellowtail snapper cuskfish elasmobranch seamoth triggerfish gar </p>
										<div class="projects-masonry__details-holder">
											<div class="projects-masonry__details-item"><span>Goal: </span><span>25 000$</span></div>
											<div class="projects-masonry__details-item"><span>Date: </span><span>23 Jan'19</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="projects-slider__item">
							<div class="projects-masonry__item projects-masonry__item--primary projects-masonry__item--height-2">
								<div class="projects-masonry__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0002/logo/2.jpg" alt="img"/>
									<div class="projects-masonry__inner"><span class="projects-masonry__badge" style="background: #49C2DF;">Water Delivery</span>
										<h3 class="projects-masonry__title"> <a href="cause-details.html">Helpo for Help</a></h3>
										<p>Gray eel-catfish longnose whiptail catfish smalleye squaretail queen danio unicorn fish shortnose greeneye fusilier fish silver carp</p>
										<div class="projects-masonry__details-holder">
											<div class="projects-masonry__details-item"><span>Goal: </span><span>25 000$</span></div>
											<div class="projects-masonry__details-item"><span>Date: </span><span>23 Jan'19</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="projects-slider__item">
							<div class="projects-masonry__item projects-masonry__item--primary projects-masonry__item--height-2">
								<div class="projects-masonry__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0002/logo/3.jpg" alt="img"/>
									<div class="projects-masonry__inner"><span class="projects-masonry__badge" style="background: #F36F8F;">Medicine</span>
										<h3 class="projects-masonry__title"> <a href="cause-details.html">He Needs Your Protection</a></h3>
										<p>Sea snail bigeye zebra turkeyfish mola mola sunfish roach. Southern Dolly Varden, lightfish ray long-whiskered catfish; burbot dealfish</p>
										<div class="projects-masonry__details-holder">
											<div class="projects-masonry__details-item"><span>Goal: </span><span>35 000$</span></div>
											<div class="projects-masonry__details-item"><span>Date: </span><span>23 Jan'19</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="projects-slider__item">
							<div class="projects-masonry__item projects-masonry__item--primary projects-masonry__item--height-2">
								<div class="projects-masonry__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0002/logo/4.jpg" alt="img"/>
									<div class="projects-masonry__inner"><span class="projects-masonry__badge" style="background: #F36F8F;">Medicine</span>
										<h3 class="projects-masonry__title"> <a href="cause-details.html">More than One Life Changed</a></h3>
										<p>Rockweed gunnel; candlefish mail-cheeked fish, yellowtail snapper cuskfish elasmobranch seamoth triggerfish gar </p>
										<div class="projects-masonry__details-holder">
											<div class="projects-masonry__details-item"><span>Goal: </span><span>25 000$</span></div>
											<div class="projects-masonry__details-item"><span>Date: </span><span>23 Jan'19</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
						
				</section>
				<!-- section end-->
				<!-- text section start-->
				<section class="section text-section text-section--front_2 no-padding-bottom"><img class="text-section__bg" src="<?php echo $backoffice ?>views/img/template/text-section_2.png" alt="img"/>
					<div class="container">
						<div class="row">
							<div class="col-12 text-center">
								<h2 class="text-section__heading">Sponsor</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8 offset-lg-4 col-xl-7 offset-xl-4">
								<h3 class="text-section__title">Delivering help and hope to children through sponsorship.</h3>
								<p>Sharksucker sea toad candiru rocket danio tilefish stingray deepwater stingray Sacramento splittail, Canthigaster rostrata. Midshipman dartfish Modoc sucker, yellowtail kingfish</p><a class="button button--primary" href="#">More information</a>
							</div>
						</div>
					</div>
				</section>
				<!-- text section end-->
				<!-- events start-->
				<section class="section events events--front_2"><img class="events__bg" src="<?php echo $backoffice ?>views/img/template/events_bg.png" alt="img"/>
					<div class="container">
						<div class="row margin-bottom">
							<div class="col-12">
								<div class="heading heading--primary heading--center"><span class="heading__pre-title">Events</span>
									<h2 class="heading__title"><span>Helpo Holds</span> <span>for You</span></h2>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-lg-4">
								<div class="event-item">
									<div class="event-item__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0003/logo/1.jpg" alt="img"/></div>
									<div class="event-item__content">
										<h6 class="event-item__title"><a href="#">Help for Language. Voluanteer</a></h6>
										<p><b>Dark Spurt,</b> San Francisco, CA 94528, USA</p>
										<p><b>September 30 - October 31,</b> 2019</p>
										<p><b>10:00 AM - 18:00 PM,</b> Everyday</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-4">
								<div class="event-item">
									<div class="event-item__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0003/logo/2.jpg" alt="img"/></div>
									<div class="event-item__content">
										<h6 class="event-item__title"><a href="#">The Culture of Africa. Rebirth</a></h6>
										<p><b>Dark Spurt,</b> San Francisco, CA 94528, USA</p>
										<p><b>September 30 - October 31,</b> 2019</p>
										<p><b>10:00 AM - 18:00 PM,</b> Everyday</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-4">
								<div class="event-item">
									<div class="event-item__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0003/logo/3.jpg" alt="img"/></div>
									<div class="event-item__content">
										<h6 class="event-item__title"><a href="#">Help for Language. Voluanteer</a></h6>
										<p><b>Dark Spurt,</b> San Francisco, CA 94528, USA</p>
										<p><b>April 15 - April 20,</b> 2019</p>
										<p><b>10:00 AM - 15:00 PM,</b> Everyday</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 text-center"><a class="button button--primary" href="#">View all events</a></div>
						</div>
					</div>
				</section>
				<!-- events end-->
				<!-- section start-->
				<section class="section no-padding-top no-padding-bottom">
					<div class="row no-gutters">
						<div class="col-xl-6">
							<div class="action-block">
								<div class="action-block__inner"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/volunteer.jpg" alt="img"/>
									<h3 class="action-block__title">We are Awesome Volounteer Team</h3>
									<p class="action-block__text">Gray eel-catfish longnose whiptail catfish smalleye squaretail queen danio unicorn fish shortnose greeneye fusilier fish silver carp nibbler sharksucker tench lookdown catfish</p><a class="action-block__link button button--primary" href="#">Become</a>
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="action-block">
								<div class="action-block__inner"><img class="img--bg" src="<?php echo $backoffice ?>views/img/template/donation_img.jpg" alt="img"/>
									<h3 class="action-block__title">All donations can help change a life</h3>
									<p class="action-block__text">Gray eel-catfish longnose whiptail catfish smalleye squaretail queen danio unicorn fish shortnose greeneye fusilier fish silver carp nibbler sharksucker tench lookdown catfish</p><a class="action-block__link button button--primary" href="#">Donate</a>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- section end-->
				<!-- testimonials style-1 start-->
				<section class="section testimonials testimonials--style-1">
					<div class="container">
						<div class="row align-items-end margin-bottom">
							<div class="col-lg-8 col-xl-7 offset-xl-1">
								<div class="heading heading--primary"><span class="heading__pre-title">Testimonials</span>
									<h2 class="heading__title"><span>What People</span> <span>Says About Us</span></h2>
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
									<div class="testimonials-slider__item">
										<div class="testimonials-slider__icon">“</div>
										<div class="testimonials-slider__text">
											<p>Slickhead grunion lake trout. Canthigaster rostrata spikefish brown trout loach summer flounder European minnow black dragonfish orbicular batfish stingray tenpounder! Flying characin herring, Moses sole sea snail grouper discus. European eel slender snipe eel. Gulper eel dealfish ocean sunfish; rohu yellow-and-black triplefin Atlantic saury</p>
											<div class="testimonials-slider__author"><span class="testimonials-slider__name">Jack Wolfskin, </span><span class="testimonials-slider__position">Volunteer</span></div>
										</div>
									</div>
									<div class="testimonials-slider__item">
										<div class="testimonials-slider__icon">“</div>
										<div class="testimonials-slider__text">
											<p>Slickhead grunion lake trout. Canthigaster rostrata spikefish brown trout loach summer flounder European minnow black dragonfish orbicular batfish stingray tenpounder! Flying characin herring, Moses sole sea snail grouper discus. European eel slender snipe eel. Gulper eel dealfish ocean sunfish; rohu yellow-and-black triplefin Atlantic saury</p>
											<p>Slickhead grunion lake trout. Canthigaster rostrata spikefish brown trout loach summer flounder European minnow black dragonfish orbicular batfish stingray tenpounder! Flying characin herring, Moses sole sea snail grouper discus. European eel slender snipe eel. Gulper eel dealfish ocean sunfish; rohu yellow-and-black triplefin Atlantic saury</p>
											<div class="testimonials-slider__author"><span class="testimonials-slider__name">Jack Wolfskin, </span><span class="testimonials-slider__position">Volunteer</span></div>
										</div>
									</div>
									<div class="testimonials-slider__item">
										<div class="testimonials-slider__icon">“</div>
										<div class="testimonials-slider__text">
											<p>Slickhead grunion lake trout. Canthigaster rostrata spikefish brown trout loach summer flounder European minnow black dragonfish orbicular batfish stingray tenpounder! Flying characin herring, Moses sole sea snail grouper discus. European eel slender snipe eel. Gulper eel dealfish ocean sunfish; rohu yellow-and-black triplefin Atlantic saury</p>
											<div class="testimonials-slider__author"><span class="testimonials-slider__name">Jack Wolfskin, </span><span class="testimonials-slider__position">Volunteer</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- testimonials style-1 end-->
				<!-- blog start-->
				<section class="section blog blog--front_3"><img class="blog__bg" src="<?php echo $backoffice ?>views/img/projects/0004/logo/1.jpg" alt="img"/>
					<div class="container">
						<div class="row margin-bottom">
							<div class="col-12">
								<div class="heading heading--primary heading--center"><span class="heading__pre-title">News</span>
									<h2 class="heading__title no-margin-bottom"><span>Helpo</span> <span>Blog</span></h2>
								</div>
							</div>
						</div>
						<div class="row offset-margin">
							<div class="col-md-6 col-xl-4">
								<div class="blog-item blog-item--style-1">
									<div class="blog-item__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0004/logo/2.jpg" alt="img"/><span class="blog-item__badge" style="background-color: #49C2DF;">Water Delivery</span></div>
									<div class="blog-item__content">
										<h6 class="blog-item__title"><a href="#">Save the Children's Role in Fight Against Malnutrition Hailed</a></h6>
										<p>Sharksucker sea toad candiru rocket danio tilefish stingray deepwater stingray Sacramento splittail canthigaster</p>
										<div class="blog-item__details"><span class="blog-item__date">23 Jan' 19</span><span>
											<svg class="icon">
												<use xlink:href="#comment"></use>
											</svg> 501</span></div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xl-4">
								<div class="blog-item blog-item--style-1">
									<div class="blog-item__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0004/logo/3.jpg" alt="img"/><span class="blog-item__badge" style="background-color: #F36F8F;">Medicine</span></div>
									<div class="blog-item__content">
										<h6 class="blog-item__title"><a href="#">Save the Children's Role in Fight Against Malnutrition Hailed</a></h6>
										<p>Sharksucker sea toad candiru rocket danio tilefish stingray deepwater stingray Sacramento splittail canthigaster</p>
										<div class="blog-item__details"><span class="blog-item__date">23 Jan' 19</span><span>
											<svg class="icon">
												<use xlink:href="#comment"></use>
											</svg> 501</span></div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xl-4">
								<div class="blog-item blog-item--style-1">
									<div class="blog-item__img"><img class="img--bg" src="<?php echo $backoffice ?>views/img/projects/0004/logo/4.jpg" alt="img"/><span class="blog-item__badge" style="background-color: #F8AC3A;">Food</span></div>
									<div class="blog-item__content">
										<h6 class="blog-item__title"><a href="blog-post.html">Back to the future: Quality education through respect, </a></h6>
										<p>Sharksucker sea toad candiru rocket danio tilefish stingray deepwater stingray Sacramento splittail canthigaster</p>
										<div class="blog-item__details"><span class="blog-item__date">23 Jan' 19</span><span>
											<svg class="icon">
												<use xlink:href="#comment"></use>
											</svg> 5</span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- blog end-->
				<!-- donors start-->
				<section class="section donors donors--style-2 no-padding-top no-padding-bottom">
					<div class="container">
						<div class="row margin-bottom">
							<div class="col-12">
								<div class="heading heading--primary heading--center"><span class="heading__pre-title">Donors</span>
									<h2 class="heading__title no-margin-bottom"><span>Who Help</span> <span>Us</span></h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<!-- donors slider start-->
								<div class="slider-holder">
									<div class="donors-slider donors-slider--style-1">
										<div class="donors-slider__item">
											<div class="donors-slider__img"><img src="<?php echo $backoffice ?>views/img/sponsors/1.png" alt="donor"/></div>
										</div>
										<div class="donors-slider__item">
											<div class="donors-slider__img"><img src="<?php echo $backoffice ?>views/img/sponsors/2.png" alt="donor"/></div>
										</div>
										<div class="donors-slider__item">
											<div class="donors-slider__img"><img src="<?php echo $backoffice ?>views/img/sponsors/3.png" alt="donor"/></div>
										</div>
										<div class="donors-slider__item">
											<div class="donors-slider__img"><img src="<?php echo $backoffice ?>views/img/sponsors/4.png" alt="donor"/></div>
										</div>
									</div>
								</div>
								<!-- donors slider end-->
							</div>
						</div>
					</div>
				</section>
				<!-- donors end-->
				<!-- bottom bg start-->
				<section class="bottom-background">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="bottom-background__img"><img src="<?php echo $backoffice ?>views/img/template/bottom-bg.png" alt="img"/></div>
							</div>
						</div>
					</div>
				</section>
				<!-- bottom bg end-->
			</main>
			<!-- footer front_3 start-->
			<footer class="footer footer--front_3">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="footer-logo"><a class="footer-logo__link" href="index.html"><img class="footer-logo__img" src="<?php echo $backoffice ?>views/img/template/logo_white.png" alt="logo"/></a></div>
							<div class="footer-contacts">
								<p class="footer-contacts__address">Elliott Ave, Parkville VIC 3052, Melbourne Canada</p>
								<p class="footer-contacts__phone">Phone: <a href="tel:+31859644725">+31 85 964 47 25</a></p>
								<p class="footer-contacts__mail">Email: <a href="mailto:support@helpo.org">support@helpo.org</a></p>
							</div>
							<!-- footer socials start-->
							<ul class="footer-socials">
								<li class="footer-socials__item"><a class="footer-socials__link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="footer-socials__item"><a class="footer-socials__link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="footer-socials__item"><a class="footer-socials__link" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li class="footer-socials__item"><a class="footer-socials__link" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
							<!-- footer socials end-->
						</div>
						<div class="col-lg-8">
							<!-- footer nav start-->
							<nav>
								<ul class="footer-menu">
									<li class="footer-menu__item footer-menu__item--active"><a class="footer-menu__link" href="#">Home Page</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Blog & News</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Donations</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Clean Water</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">About Us</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Contact Us</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Animals</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Madicine</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Pages</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Elements</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Children</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Food</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Causes</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Documentation</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Old People</a></li>
									<li class="footer-menu__item"><a class="footer-menu__link" href="#">Documentation</a></li>
								</ul>
							</nav>
							<!-- footer nav end-->
						</div>
					</div>
				</div>
				<div class="footer__lower">
					<div class="container">
						<div class="row align-items-baseline">
							<div class="col-md-6 col-xl-7">
								<p class="footer-copyright">© 2020 Helpo Charity Template by Artureanec</p>
							</div>
							<div class="col-md-6 col-xl-5">
								<div class="footer__form">
									<input class="footer__form-input" type="email" placeholder="Enter your E-mail"/>
									<button class="footer__form-submit button button--primary" type="submit">Subscribe</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
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